<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // gunakan md5 untuk demo

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            transition: 0.3s;
        }
        :root {
            --bg: #f4f4f4;
            --text: #333;
            --card: #fff;
            --btn: #007BFF;
            --btn-hover: #0056b3;
        }
        .dark {
            --bg: #121212;
            --text: #eee;
            --card: #1e1e1e;
            --btn: #bb86fc;
            --btn-hover: #9a67ea;
        }
        .login-box {
            background-color: var(--card);
            padding: 30px;
            border-radius: 12px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: var(--btn);
            border: none;
            color: white;
            margin-top: 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: var(--btn-hover);
        }
        .toggle-container {
            text-align: right;
            margin-bottom: 10px;
        }
        .show-password {
            margin-top: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        @media (max-width: 500px) {
            .login-box {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="toggle-container">
            <label>
                🌞/🌙 <input type="checkbox" id="darkMode">
            </label>
        </div>

        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <div class="show-password">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label><input type="checkbox" onclick="togglePassword()"> Show</label>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>

    <script>
        // Toggle Show/Hide Password
        function togglePassword() {
            const passField = document.getElementById("password");
            passField.type = passField.type === "password" ? "text" : "password";
        }

        // Toggle Dark Mode
        const darkModeToggle = document.getElementById("darkMode");
        darkModeToggle.addEventListener("change", () => {
            document.body.classList.toggle("dark");
        });
    </script>
</body>
</html>
