<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\studentProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\sendStudnetDetailsMail;
use Illuminate\Support\Str;
use Validator;
use Mail;
use Spatie\Permission\Models\Role;
class studentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function listStudent(Request $request){
        return view('students.student');
    }
    public function getStudents(Request $request){
        $method = $request->method();
        if ($method === 'POST') {
            $students = User::has('student_profile')->with('student_profile');
            if($request->search){
                $students->where('name', 'LIKE', "%{$request->search}%");
            }
            $students = $students->paginate(10);
        } else {
            $students = User::has('student_profile')->with('student_profile')->paginate(10);
        }
        return $students;
    }
    public function registerStudent(Request $request){
        $rules = [
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'contact_no' => 'required',
        ];
        $messages = [
            'email.required' => 'Email is Missing',
            'name.required' => 'Name is Missing',
            'address.required' => 'Address is Missing',
            'dob.required' => 'Date Of Birth is Missing',
            'contact_no.required' => 'Contact No is Missing',
        ];
        $Validator = Validator::make($request->all(), $rules, $messages);
        if ($Validator->fails()) {
            $messages = $Validator->messages();
            $Status['error'] = $messages;
            $Status['status'] = false;
            if (request()->is('api*')) {
                return apiResponse($Status,false);
            }
            return $Status;
        }
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make('123456789');
        $newUser->save();

        $studentProfile = new studentProfile();
        $studentProfile->user_id = $newUser->id;
        $studentProfile->student_reg_no = generateReg(new studentProfile(),'REG',8 );
        $studentProfile->address = $request->address;
        $studentProfile->dob = $request->dob;
        $studentProfile->contact_no = $request->contact_no;
        $studentProfile->save();
        $data = array('user' => $newUser,'profile' => $studentProfile);
        if (request()->is('api*')) {
            $Role = Role::where('name','student')->first();
            $student = User::find($newUser->id);
            $student->assignRole($Role);
        } else {
            $student = User::find($newUser->id);
            $student->assignRole('student');
        }

        $mail = Mail::to($request->email)->send(new sendStudnetDetailsMail($data));

        $data =  array('user_data' => $newUser , 'profile_data' => $studentProfile);
        if (request()->is('api*')) {
            return apiResponse($data,true);
        }
        return $data;
    }
    public function mail(Request $request){
        return view('email.email');
    }
    public function editProfile(){
        return view('students.edit_profile');
    }
    public function getProfile(){
        $user = Auth::user()->id;
        $data = User::where('id',$user)->with('student_profile')->first();
        if($data->student_profile) {
            if ($data->student_profile->image_path) {
                $data->student_profile->image_path = asset('images/profile_pictures/' . $data->student_profile->image_path);
                $data->student_profile->has_image = true;
            } else {
                $data->student_profile->image_path = asset("images/no_img.jpg");
                $data->student_profile->has_image = false;
            }
        }
        if (request()->is('api*')) {
            return apiResponse($data, true);
        }
        return $data;
    }
    public function updateProfile(Request $request){
        $id =  $request->user_id;
        $newUser = User::find($id);
        $newUser->name = $request->name;
        $newUser->save();

        $profileData = studentProfile::where('user_id',$id)->first();
        $studentProfile = studentProfile::find($profileData->id);
        $studentProfile->address = $request->address;
        $studentProfile->dob = $request->dob;
        $studentProfile->contact_no = $request->contact_no;
        $studentProfile->save();

        $data =  array('user_data' => $newUser , 'profile_data' => $studentProfile);
        if (request()->is('api*')) {
            return apiResponse($data, true);
        }
        return $data;
    }
    public function updateProfilePicture(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        if ($request->hasfile('image')) {
            $file = $request->image;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $mimeType = $file->getMimeType();
            $fileDb = str_replace(' ', '', $filename) . '_' . Str::random(20) . '.' . $extension;
            \Storage::disk('profile_pictures')->put($fileDb, file_get_contents($file));

            $id =  $request->id;
            $profileData = studentProfile::where('user_id',$id)->first();
            $studentProfile = studentProfile::find($profileData->id);
            $studentProfile->image_path = $fileDb;
            $studentProfile->save();

            $data =  array('profile_data' => $studentProfile);
            if (request()->is('api*')) {
                return apiResponse($data, true);
            }
        }
    }
}
