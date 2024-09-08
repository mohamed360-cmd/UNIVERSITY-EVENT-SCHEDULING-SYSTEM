@section("authForm")
<div>
    <p id="ErrorMessageLogin" style="color: red">{{session("ErrorMsg")}}</p>
    
    <p id="SuccessMsgLogin" style="color: rgb(0, 223, 4)">{{session("SuccessMsg")}}</p>

<form class="userAuthForm" method="POST" action="/login" >
    @csrf
    <h1>Login</h1>
    <input type="text" placeholder="Enter Your School Email" name="email" class="userformInputs" required/>
    <br/>
    <input type="password" placeholder="Enter Your Password" name="password" class="userformInputs" required/>
    <br/>
    <input type="submit" value="login" class="userFormSubmite"/>
</form>   
<span>Dont Have An Account ? </span> 
<a href="/register" style="display: inline-block ">
    <p class="userRegisterBtn"> Register</p>
</a>

</div>

@endsection
@extends('Users.Layouts.UserAuth')