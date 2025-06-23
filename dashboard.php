<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <title>Dashboard</title>
    </head>
    <body>
        <?php
            include_once("config.php");
            $sql="SELECT * FROM users";
            $getUsers=$conn->prepare($sql);
            $getUsers->execute();
            $users=$getUsers->fetchAll();
        ?>
        <table class="table table-dark table-striped">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Username</th>
                <th scope="col">Delete / Update</th>
            </thead>
            <tbody>
                <?php
                    foreach($users as $user){
                ?>
                <tr>
                    <td><?= $user['id'];?></td>
                    <td><?= $user['firstname'];?></td>
                    <td><?= $user['lastname'];?></td>
                    <td><?= $user['username'];?></td>
                    <td><?= "<a href='delete.php?id=$user[id]'>Delete</a> | <a href='edit.php?id=$user[id]'>Update</a>"?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>