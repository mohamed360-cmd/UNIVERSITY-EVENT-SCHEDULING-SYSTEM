<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\users;
use App\Models\event_register;
use Error;
use Exception;

class UserController extends Controller
{
    private function checkSession(){//function for checking sessions
        if(isset($_COOKIE["session_id"])){
            //check if that session is true
            $sessionValidation = users::where('session_id',$_COOKIE["session_id"])->first();
            if($sessionValidation && $sessionValidation->role  != "ADMIN" && $sessionValidation->status == 'active'){
            return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    private function genSaveSessionId($_email){//this function generates and save the tokent to the database and sets it iin a cookie
        $sessionId = session_create_id();
        users::where('email',$_email)->update(["session_id"=>$sessionId]);
        setcookie("session_id",$sessionId,time() +3600);
    }
    public function index(){
        if($this->checkSession()){
           $events =  event::all();
            return view("Users.Home",["Events"=>$events,"AuthStatus"=>true]);
        }else{
            $events =  event::all();
            return view("Users.Home",["Events"=>$events,"AuthStatus"=>false]);
        }
    }
    public function showLogin(){
        return view("Users.login");
    }
    public function showRegister(){
        return view("Users.register");

    }
    public function login(){
        $email = request('email');
        $password = request("password");
        try{
        $authStatusResult = users::where('email',$email)->firstOrFail();

            if($authStatusResult["role"] == "ADMIN"){//chech if the role is student else shows notpermited 
                return redirect("/login")->with("ErrorMsg","USER NOT PERMITED");
            }else{
                if(password_verify($password,$authStatusResult['password'])){
                    //generate token -> save token to database -> setCookie -> redirect the user to home '/'
                    $this->genSaveSessionId($email);
                    return redirect("/");
                }else{
                    return redirect("/login")->with("ErrorMsg","Wrong Email Or Password");

                }
            }
        }catch(Exception $e){
            error_log($e);
            return redirect("/login")->with("ErrorMsg","Wrong Email Or Password");

        }
    }
    public function register(){
        //check if email already exist-> create user  and assigne role -> genSession ->redirect the user to the home page 
        $email = request('email');
        $password = request('password');
        $passwordAgain = request('passwordAgain');
        if($password == $passwordAgain){
            try{
                $checkEmailResult = users::where('email',$email)->first();
                if($checkEmailResult){//meaning their is already an exisitng email 
                    return redirect("/register")->with("ErrorMsgEmailTaken","User Already Exists");
                }else{
                    $table = new users();
                    $table->email = $email;
                    $table->password = password_hash($password,PASSWORD_BCRYPT);
                    $table->role = "STUDENT";
                    $table->save();
                   return redirect('/login')->with("SuccessMsg","Successfuly Registered .  Login");
                }
            }catch(Exception $e){
                error_log($e);
                return redirect("/register")->with("ErrorMsgEmailTaken", "Error Has Occered");
            }

        }else{
            return redirect("/register")->with("ErrorMsgPasswordNotSame","Passwords Not the Same ");
        }
    }
    public function registerEvent(){
        if($this->checkSession()){
            $sessionOwner = users::where("session_id",$_COOKIE["session_id"])->first();
            if($sessionOwner){
                 $email = $sessionOwner->email;
                 $eventName = request("eventName");
                 $eventId= request("eventId");

                $checkRegistrationStatus = event_register::where("email",$email)
                ->where("event_id", $eventId) // Make sure event_id is used to check for a specific event
                ->where("registaration_status", "Active")
                ->first();
                error_log($eventId);

                if(!$checkRegistrationStatus){
                $table = new event_register();
                $table->email = $email;
                $table->event_Name = $eventName;
                $table->event_id = $eventId;
                $table->registration_time = date('Y/m/d');
                $table->registaration_status = "Active";
                $table->save();
                return redirect("/")->with("SuccessMsg","Event Registered");
                }else{
                    return redirect("/")->with("ErrorMsg","Already Registered For this Event");
                }
            }else{
               return redirect("/")->with("ErrorMsg","Action Not Permited");
            }
        }else{
            return redirect("/")->with("ErrorMsg","Session Ended , Log in");
        }
    }
    public function showMyEvents(){
        if($this->checkSession()){
            $userInfo = users::where('session_id',$_COOKIE["session_id"])->first();//getting the users email
            $EventList = event_register::where("email",$userInfo->email)->get();
            $length = $EventList->count();
            return view('Users.MyEvents',["Events"=> $EventList,"AuthStatus"=>true ,"length"=>$length]);
        }else{
            return redirect("/")->with("ErrorMsg","Session Ended , Log in");
        }
    }
    public function deregister (){
        if($this->checkSession()){
            $eventRegistrationId = request('eventRegistrationId');
            $deregisterResult = event_register::where('id',$eventRegistrationId)->update(["registaration_status"=> "Deregistared"]);
           return redirect("/myEvents")->with("SuccessMsg", "Dergistration Successfull");
        }else{
            return redirect("/")->with("ErrorMsg","Session Ended , Log in");
        }
    }
    public function showEvent($id){
        if($this->checkSession()){
            $searchResult = event::where('id',$id)->first();

            return view("Users.MoreEventInfo",["event"=> $searchResult,"AuthStatus"=>true]);
        }else{
            return redirect("/")->with("ErrorMsg","Session Ended , Log in");
        }
    }
    public function showAccount(){
        if($this->checkSession()){
            $userInfo = users::where('session_id',$_COOKIE["session_id"])->first();//getting the users email

            return view("Users.MyProfile",["Email"=>$userInfo->email,"AuthStatus"=>true]);
        }else{
            return redirect("/")->with("ErrorMsg","Session Ended , Log in");
        }
    }
    public function updateAccount (){
        if($this->checkSession()){
            $email = request('email');
            $password = request("password");
            $passwordAgain = request("passwordAgain");
            if($password == $passwordAgain && $password != ""){
                $hashedPassword = password_hash($password,PASSWORD_BCRYPT);
                users::where('email',$email)->update(["password"=>$hashedPassword]);
                return redirect("/myAccount")->with("SuccessMsg","Password Updated Successfuly");
            }else{
                return redirect("/myAccount")->with("ErrorMsg","Password not the Same");
            }
        }else{
            return redirect("/")->with("ErrorMsg","Session Ended , Log in");
        }
    }
    public function logout(){
        if($this->checkSession()){
            $deleteSesssionResult = users::where("session_id",$_COOKIE["session_id"])->update(["session_id"=>null]);
            setcookie('session_id', '', time() - 3600, '/');
            return redirect("/")->with("SuccessMsg","Loged out");
        }else{
            return redirect("/")->with("ErrorMsg","Session Ended , Log in");
        }
    }
}
