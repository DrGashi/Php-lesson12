<?php
    include_once('config.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];

        $sql = "UPDATE users SET firstname=:firstname, lastname=:lastname, username=:username WHERE id=:id";
        $prep = $conn->prepare($sql);
        $prep->bindParam(":id", $id);
        $prep->bindParam(':firstname', $firstname);
        $prep->bindParam(':lastname', $lastname);
        $prep->bindParam(':username', $username);

        $prep->execute();
        header('Location:dashboard.php');
    }

?>