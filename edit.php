<?php
    include_once('config.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=:id";
    $prep = $conn->prepare($sql);
    $prep->bindParam(':id', $id);
    $prep->execute();
    $data = $prep->fetch();
?>
                


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Edit User</title>
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
        <form method="post" action="update.php">
            <input type="text" name="firstname" id="name" value="<?php echo $data['firstname']?>"><br>
            <input type="text" name="lastname" id="surname" value="<?php echo $data['lastname']?>"><br>
            <input type="text" name="username" id="email" value="<?php echo $data['username']?>"><br>
            <input type="submit" name="update" value="submit">
        </form>
    </div>
    </body>
</html>
