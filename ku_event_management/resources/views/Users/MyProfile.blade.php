@section('content')
<div>
    <form class="updateProfileForm" id="updateProfileForm">
        @csrf
        <input type="email" placeholder="Enter Your Email" name="email" disabled value="{{$Email}}" />
        <button type="button" id="showPasswordFieldBtn" class="updateProfileFormBtn ShowPasswordFields" onclick="showPasswordField()">Change Password</button>
        <div id="passwordFieldContainer">
            <input type="password" placeholder="Enter Password" name="password"/>
            <br/>
            <input type="password" placeholder="Enter Password Again" name="passwordAgain"/>
            <button type="button" id="updateProfileBtn" class="updateProfileFormBtn ShowPasswordFields" onclick="updateProfile()">Update Profile</button>
        </div>
    </form>
    <div  class="DialogAlert SuccessAlert" id="successDialogAlert"> <p id="successDialogMessage">{{session("SuccessMsg")}}</p></div>
    <div  class="DialogAlert ErrorAlert" id="errorDialogAlert"> <p id="ErrorDialogMessage">{{session("ErrorMsg")}}</p></div>
</div>
@endsection
@extends('Users.Layouts.userLayout')