<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <script>
            function togglePasswordVisibility() {
                var passwordInput = document.getElementById("password");
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            }
        </script>
    <body>
        <div class="container">
          <h1>Login</h1>
            <form action="read.php" method="post">
                <label>Username</label><br>
                <input type="text"><br>
                <label>Password</label><br>
                <input type="password" name="password" id="password">
                <div class="checkbox-container">
                <input type="checkbox" onclick="togglePasswordVisibility()">Show_Password<br><br></div>
                <button type="submit">Login</button>
                <p> Belum punya akun?
                  <a href="regist.html">Register di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>