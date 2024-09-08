<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/UsersCss/userAuth.css">
    <title>User Authentication </title>
</head>
<body>
    <div class="userMainAuthContainer">
        <div class="AuthLogoContainer">
            <img src="../../Images/KU_logo.png" alt="Logo"/>
        </div>
        <div class="userAuthForm">
            @yield('authForm')
        </div>
    </div>
</body>
</html>