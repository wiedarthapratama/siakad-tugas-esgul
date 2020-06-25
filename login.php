<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>SIAKAD | LOGIN</title>
    <style>
        body{
            background-color: #ecf0f1 !important;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <br>
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">LOGIN SIAKAD</h5>
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <input type="submit" value="Masuk" name="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
  </body>
</html>
<?php
    session_start();
    if(isset($_POST['submit'])){
        $username =  $_POST['username'];
        $password = $_POST['password'];
        $password = sha1($password);
        // echo $username;
        // echo $password;
        include "./config/config_header.php";
        $sql = "SELECT * FROM pengguna where username='$username' and password='$password'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            // echo $_SESSION['username'];
            echo "<script>document.location='index.php'</script>";
        }else{
            echo "Your Login Name or Password is invalid";
        }
        include "./config/config_footer.php";
    }
?>