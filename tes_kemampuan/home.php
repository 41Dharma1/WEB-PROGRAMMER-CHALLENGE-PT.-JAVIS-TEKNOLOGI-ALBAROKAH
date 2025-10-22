<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { 
            background: #e8f5e9; 
            font-family: Arial; 
            text-align: center; 
            padding-top: 100px;
        }
        a { 
            color: white; 
            background: #f44336; 
            padding: 10px 20px; 
            border-radius: 5px; 
            text-decoration: none; 
        }
        a:hover { background: #d32f2f; }
    </style>
</head>
<body>
    <h1>Selamat Datang, <?php echo $_SESSION['username']; ?> 🎉</h1>
    <p>Kamu berhasil login ke sistem!</p>
    <a href="logout.php">Logout</a>
</body>
</html>
