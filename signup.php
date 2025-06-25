<?php
    include_once("config.php");
    if(isset($_POST['submit'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $username=$_POST['username'];

        $sql="INSERT INTO users(firstname, lastname, username) VALUES (:firstname, :lastname, :username)";
        $sqlQuery = $conn->prepare($sql);
        
        $sqlQuery->bindParam(':firstname', $firstname);
        $sqlQuery->bindParam(':lastname', $lastname);
        $sqlQuery->bindParam(':username', $username);
        header("location:dashboard.php");
        $sqlQuery->execute();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <title>Sign Up</title>
    </head>
    <body>
        <form action="signup.php" method="post">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault01">First name</label>
                <input type="text" class="form-control" id="validationDefault01" name="firstname" required>
                </div>
                <div class="col-md-4 mb-3">
                <label for="validationDefault02">Last name</label>
                <input type="text" class="form-control" id="validationDefault02" name="lastname" required>
                </div>
                <div class="col-md-4 mb-3">
                <label for="validationDefaultUsername">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    </div>
                    <input type="text" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="username" required>
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                    Agree to terms and conditions
                </label>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
        </form>
    </body>
</html>