<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            border: 3px solid black;
            padding: 20px;
            width: 300px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container form {
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container .login-button {
            background-color: #007BFF;
            color: white;
            margin-top: 10px;
        }
        .form-container .register-button {
            background-color: #28A745;
            color: white;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Log In</h2>
        <form action="/login" method="POST">
            @csrf
            <div>
                <label for="email">Email</label>
                <input name="email" type="text" placeholder="Email">
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" type="password" placeholder="Password">
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
        <form action="/register" method="GET">
            @csrf
            <button type="submit" class="register-button">Register</button>
        </form>
    </div>
</body>
</html>