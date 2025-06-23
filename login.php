<?php
session_start();
include 'config.php'; // This should create a PDO connection in $conn

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);

    // Prepare and execute using PDO
    $stmt = $conn->prepare("SELECT username FROM users WHERE firstname = :firstname AND lastname = :lastname AND username = :username");
    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid user! Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <style>
        body {
            background: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .login-container {
            width: 320px;
            margin: 100px auto;
            padding: 30px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background:rgb(0, 153, 255);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s ease-in-out
        }
        input[type="submit"]:hover {
            background:rgb(3, 124, 204);
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <input type="text" name="firstname" placeholder="First Name" required />
        <input type="text" name="lastname" placeholder="Last Name" required />
        <input type="text" name="username" placeholder="Username" required />
        <input type="submit" value="Login" />
    </form>
</div>

</body>
</html>
