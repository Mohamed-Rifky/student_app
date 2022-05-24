<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\studentProfile;
use Illuminate\Support\Facades\Hash;
use App\Mail\sendStudnetDetailsMail;
use Validator;
use Mail;
class studentController extends Controller
{
    public function listStudent(Request $request){
        return view('students.student');
    }
    public function getStudents(Request $request){
        $method = $request->method();
        if ($method === 'POST') {
            $students = User::has('student_profile')->with('student_profile')->paginate(10);
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
        $mail = Mail::to($request->email)->send(new sendStudnetDetailsMail($data));
    }
    public function mail(Request $request){
        return view('email.email');
    }
}
