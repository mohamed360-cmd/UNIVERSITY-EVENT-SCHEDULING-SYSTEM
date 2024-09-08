@section("authForm")
<div>
    <p style="color: rgb(0, 255, 0); font-weight :bold">{{session("SuccessMsg")}}</p>
    
    <p style="color: red; font-weight :bold">{{session("ErrorMsg")}}</p>
<form class="userAuthForm" action="/register" method="POST">
    @csrf
    <h1>Register</h1>
    <p style="color: red; font-weight :bold">{{session("ErrorMsgEmailTaken")}}</p>

    <input type="text" placeholder="Enter Your School Email" name="email" class="userformInputs" required/>
    <br/>
    <p style="color: red; font-weight :bold">{{session("ErrorMsgPasswordNotSame")}}</p>

    <input type="password" placeholder="Enter Your Password" name="password" class="userformInputs" required/>
    <br/>
    <p style="color: red; font-weight :bold">{{session("ErrorMsgPasswordNotSame")}}</p>

    <input type="password" placeholder="Password Again" name="passwordAgain" class="userformInputs" required/>
    <br/>
    <input type="submit" value="Register" class="userFormSubmite"/>
</form>   
<span>Already Have An Account ? </span> 
<a href="/login" style="display: inline-block">
    <p class="userRegisterBtn"> Login</p>
</a>
</div>

@endsection
@extends('Users.Layouts.UserAuth')