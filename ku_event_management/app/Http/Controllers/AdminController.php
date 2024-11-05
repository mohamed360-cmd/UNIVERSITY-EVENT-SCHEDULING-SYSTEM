<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use  App\Models\event;
use App\Models\event_register;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PhpParser\Node\Stmt\TryCatch;

class AdminController extends Controller
{
    private function verifySession() {//this function is to verify the 
        if (isset($_COOKIE['session_id'])) {
            //check the role of the session id assosication 
            $sessionIdCheck = users::where("session_id",$_COOKIE['session_id'])->first();
            if($sessionIdCheck->role == "ADMIN" && $sessionIdCheck->status == 'active'){
                 return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    public function index(){//this is the controler when the user goes to the / router when the visit the admin page
        return view('Admin.Login');
    }
    
    public function auth(){
            $email = request('email');
            $password = request('password');    
            try{
            $CheckResult = users::where('Email',$email)->firstOrFail();
    
            try{
                if(password_verify($password,$CheckResult->password))
                {
                    $session_id = session_create_id();
                    users::where('Email',$email)->update(["session_id"=>$session_id]);
                    setcookie('session_id',$session_id,time() + 3600);
                    return redirect("/admin/dashboard");
                }else{
                    return redirect("/admin")->with("data","Wrong Email Or password");
                }
            }catch(ModelNotFoundException $e){
                error_log("E1".$e);
                return redirect("/admin")->with("data","Wrong Email Or password");
            }
            }catch(ModelNotFoundException $e){
                error_log("e2".$e);
                 return redirect("/admin")->with("data","Wrong Email Or password") ;
            }

        
    }




public function dashboard(){//this function is when the user navigates to teh dashboard
    if($this->verifySession()){
        try{//the list of all events will be sent to the admins dashboardsinces the first page is the events page 
            $eventList = event::all();
            return view("Admin.Event",["eventList"=>$eventList,"status"=>true]);
        }catch(ModelNotFoundException $e){
            error_log("Error in dashboard function".$e);
            return view("Admin.Event",["status"=>false,"msg"=>"Some Error Has occured!!"]);

        }
       

    }else{
        return redirect("/admin")->with("data","Session Expired Please Login");

    }
}
public function  addEvent(){//this is when the admin wants to add an event 
    if($this->verifySession()){
        $userSessionToken  = $_COOKIE['session_id'];
        $sessionQuery = users::where("session_id",$userSessionToken)->firstOrFail();

        $eventName = request('eventName');
        $eventDescription = request('eventDescription');
        $eventDate = request('eventDate');
        $eventTime = request('eventTime');
        $eventVenue = request('eventVenue');
        $organizerName = request('organizerName');
        $capacity = request('capacity');
        $eventType = request('eventType');
        $registrationDeadline = request('registrationDeadline');
    

        $table = new event();
        $table->event_Name = $eventName;
        $table->event_Description = $eventDescription;
        $table->event_Date = $eventDate;
        $table->even_tTime = $eventTime;
        $table->event_Venue = $eventVenue;
        $table->organizerName = $organizerName;
        $table->event_Capacity = $capacity;
        $table->registration_Deadline = $registrationDeadline;
        $table->event_Type = $eventType;
        $table->user_id = $sessionQuery->id;
        $table->save();
       return redirect('/admin/dashboard')->with("msg","Event Succesfuly Created");
    }else{
        return redirect("/admin")->with("data","Session Expired Please Login");

    }
}
public function logout() {
    if ($this->verifySession()) {
        $session_id = $_COOKIE["session_id"];
        
        // Invalidate the session in the database
        users::where("session_id", $session_id)->update(["session_id" => null]);

        // Delete the cookie on the client-side
        setcookie('session_id', '', time() - 3600, '/'); // Adjust path if needed
        
        // Redirect with a success message
        return redirect("/admin")->with("data", "Logged out");
    } else {
        return redirect("/admin")->with("data", "Session Expired. Please Login");
    }
}

public function show($id){
    if($this->verifySession()){
        $specificEvent = event::where("id",$id)->firstOrFail();
        $eventregisteredUsers = event_register::where("event_id",$id)->get();

        return view('Admin.MoreEventOptions',["Event"=>$specificEvent,"userList"=>$eventregisteredUsers]);
    }else{
        return redirect("/admin")->with("data","Session Expired Please Login");

    }
}
public function updateEvent(){
    if($this->verifySession()){
        $eventId = intval(request('Id'));
        $eventName = request('eventName');
        $eventDescription = request('eventDescription');
        $eventDate = request('eventDate');
        $eventTime = request('eventTime');
        $eventVenue = request('eventVenue');
        $organizerName = request('organizerName');
        $capacity = request('capacity');
        $eventType = request('eventType');
        $registrationDeadline = request('registrationDeadline');
        event::where("id",$eventId)->update([
            "event_Name" => $eventName,
           "event_Description" => $eventDescription,
           "event_Date" => $eventDate,
            "even_tTime" => $eventTime,
            "event_Venue" => $eventVenue,
           "organizerName" => $organizerName,
            "event_Capacity" => $capacity,
            "registration_Deadline" => $registrationDeadline,
            "event_Type" => $eventType
        ]);
        return redirect('/admin/dashboard')->with("msg","Event Updated");
    }else{
        return redirect("/admin")->with("data","Session Expired Please Login");

    }
}
public function deleteEvent (){
    if($this->verifySession()){
        $eventId = intval(request('Id'));
        event::where("id",$eventId)->delete();
        return redirect('/admin/dashboard')->with("msg","Event Deleted");
    }else{
        return redirect("/admin")->with("data","Session Expired Please Login");
    }
}
public function searchEvent() {
    if ($this->verifySession()) {
        $eventName = request('searchEventName');
        try {
            $event = Event::where("event_Name", $eventName)->first();
            if (!$event) {
                return redirect("/admin/dashboard")->with("data", "Event Not Found");
            }
            error_log($event);
            return view("Admin.event", ["eventList" => [$event], "status" => true]);
        } catch (Exception $e) {
            error_log("Search Error: " . $e->getMessage());
            return redirect("/admin/dashboard")->with("data", "An error occurred during search");
        }
    } else {
        return redirect("/admin")->with("data", "Session Expired, Please Login");
    }
}

public function showUsers(){
    if($this->verifySession()){
        $userList = users::all();
        return view("Admin.Users",["Users"=>$userList]);
    }else{
        return redirect("/admin")->with("data","Session Expired Please Login"); 
    }
}
public function suspendAccount($id){
    if($this->verifySession()){
        $suspendAccountResults = users::where('id',$id)->update(['status'=> "suspended"]);
        return redirect('/admin/users')->with("SuccessMsg","Account Has Been Suspended");
    }else{
        return redirect("/admin")->with("data","Session Expired Please Login"); 
    }
}
public function activateAccount($id){
    if($this->verifySession()){
        $activateAccountResults = users::where('id',$id)->update(['status'=> "active"]);
        return redirect('/admin/users')->with("SuccessMsg","Account Has Been Activated");
    }else{
        return redirect("/admin")->with("data","Session Expired Please Login"); 
    }
}
}





// /*This is for creating an admin 
// $table = new users();
// $table->Email = request("email");
// $hashedPassword = password_hash(request("password"),PASSWORD_BCRYPT);
// $table->password = $hashedPassword;
// $table->role = "ADMIN";
// $table->save();
// 