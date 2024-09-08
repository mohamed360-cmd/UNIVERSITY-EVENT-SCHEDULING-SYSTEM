<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ku Events</title>
    <link rel="stylesheet" href="../../css/UsersCss/Main.css">
</head>
<body>
    <div class="NavBar">
        <div class="logoContainer">
            <img src="../../Images/KU_logo.png" alt="Logo"/>
        </div>
        <div >
            <p>Kenyatta University Event Managment</p>
        </div>
        @if(!$AuthStatus)
        <div class="user-navAuthBtnsContiner">
            <button class="userAuthBtns userLoginBtn" id="gotToLoginPageBtn">Login</button>
            <button class="userAuthBtns userRegisterBtn" id="gotToRegisterPageBtn">Register</button>
        </div>
        @else
        <div class="user-navBtnsContiner">
            <button class="userAuthBtns userRegisterBtn" onclick="gotToHomePage()">Home</button>
            <button class="userAuthBtns userLoginBtn" onclick="gotMyEventsPageBtn()">YourEvents</button>
            <button class="userAuthBtns userRegisterBtn" onclick="gotMyAccountPageBtn()">MyProfile</button>
        </div>
        @endif
    </div>
    <div class="mainContentContainer">
        @yield('content')
    </div>
    <script src="../../js_files/User_js/userAuth.js"></script>
    <script src="../../js_files/User_js/userMain.js"></script>

</body>
</html>