<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        a.google-login {
            display: block;
            text-align: center;
            background-color: #4285F4;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        a.google-login:hover {
            background-color: #3367D6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <a href="/login/google" class="google-login">
            Login with Google
        </a>
        <a href="/login/facebook" class="facebook-login">
            Login with Facebook
        </a>
    </div>
</body>
</html>