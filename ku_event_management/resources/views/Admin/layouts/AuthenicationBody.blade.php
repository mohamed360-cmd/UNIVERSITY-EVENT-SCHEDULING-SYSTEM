<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Body</title>
    <link rel="stylesheet" href="css/adminCss/login.css">
</head>
<body>
    <div class="MainAdminAuthBody">
        <div class="leftSideAuthContainer">
        <div class="logoContainer">
            <img src="Images/KU_logo.png" alt="Ku Logo" />
        </div>
        </div>

        <div class="rightSideAuthContainer">
            @yield('Content')

            <div class="ErrorMessageContainer" id="ErrorMessageContainer">
                <p id="ErrorMessage">{{session("data")}}</p>

            </div>
            
        </div>
    </div>
</div>
    <script defer  src="js_files/admin_js/authPageScript.js">
        
    </script>
</body>
</html>