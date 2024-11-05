<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <link rel="stylesheet" href="../../css/adminCss/adminDashboard.css">
    <link rel="stylesheet" href="../../css/adminCss/EventsPage.css">
</head>
<body>
    <div class="mainDashboardContainer">

        <div class="mainNavigationContainer">
            <div class="logoContainer">
                <img alt="ku Logo" src="../../Images/KU_logo.png"/>
            </div>
            <button class="navigationBtns" id="goToEventsPageBtn">Events</button>
            <button class="navigationBtns" onclick="gotToUsersPage()">Users</button>
            {{-- <button class="navigationBtns" id="goToAccountsPageBtn">Your Account</button> --}}
            <button class="navigationBtns" id="LogOutButton" onclick="logout()">Logout</button>
        </div>
        <div class="contentContainer">
            <div class="EventsNavContainer">
                @yield("navContent")
            </div>
            @yield('content')
        </div>
    </div>
    <div  class="DialogAlert SuccessAlert" id="successDialogAlert"> <p id="successDialogMessage">{{session("SuccessMsg")}}</p></div>
    <div  class="DialogAlert ErrorAlert" id="errorDialogAlert"> <p id="ErrorDialogMessage">{{session("ErrorMsg")}}</p></div>
    <script src="../../js_files/admin_js/Dashboard.js"></script>
</body>
</html>