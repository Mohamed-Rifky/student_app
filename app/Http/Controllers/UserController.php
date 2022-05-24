<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function changePassword(Request $request){
        return view('user.change_password');
    }
    public function changePasswordSave(Request $request){
        $validator = Validator::make($request->all(), [
            'current-password' => 'required',
            'new-password' => 'required_with:new-password-confirm|same:new-password-confirm|string|min:8',
            'new-password-confirm' => 'string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([

        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
    public function new_user(Request $request){
        $roles = Role::where('id',1)->get();
        $users = new User();
        $currentUser = Auth::user();
        $search = null;
        if ($request->search) {
            $users = $users->where('name', 'LIKE', "%{$request->search}%")->orWhere('email', 'LIKE', "%{$request->search}%")
                ->with('branch')->orderBy('name', 'ASC')->get();
            $search = $request->search;
        } else {
            $users = $users->orderBy('name', 'ASC')->paginate(20);
        }
        $method = $request->method();
        return view('user.new_user',compact('roles','method', 'search','users','currentUser'));
    }
    public function new_user_save(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $role = $request->role;
        $id = $user->id;
        $userObj = User::find($id);
        $userObj->assignRole($role);
        return redirect()->back()->with("success","New User Has Been Created");
    }
    public function reset_password(Request $request){
        $rules = [
            "current_password" => "required|min:8",
            "reset_password" => "required|min:8",
            "reset_c_password" => "required|same:reset_password|min:8",
            "user_id" => "required|exists:users,id",
            "current_user_id" => "required|exists:users,id",
        ];
        $Validator = Validator::make($request->toArray(), $rules);
        if ($Validator->fails()) {
            $messages = $Validator->messages();
            $Status['error'] = $messages;
            $Status['status'] = false;
            return $Status;
        }
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            $Status['error']['password'][0] = "Incorrect Current User's Password";
            $Status['status'] = false;
            return $Status;
        }
        $user = User::find($request->user_id);
        $user->password = bcrypt($request->get('reset_password'));
        $user->save();
        return Response()->json(['status' => true, 'msg' =>'Password Has Been Set']);
    }
}
