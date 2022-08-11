<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="registerStyle.css">
    <script defer src="validate.js"></script>
    <title>Create account</title>

</head>

<body>
    <div id="errors" class="card d-none mx-auto width mt-5  pt-4 text-danger">
        
    </div>
    <div class="card mx-auto width mt-5 d-flex  align-items-center">


        <h1>
            <span class="fs-3 mx-auto text-success">Login</span>
        </h1>

        <div class="container px-5 mt-4 mb-5">
            <form action="" method="POST" class="myform" id="myform">
                
                    
                <label class="mt-3" for="email">Username</label>
                <input class="form-control " type="text" class=" mb-3" placeholder="Username or Email" name="email" id="email" >
               
                <label class="mt-3" for="password">Password</label>
                <input class="form-control " type="password" class=" mb-3" placeholder="Enter your password" name="password" id="password">
               
                <div class="pt-4 d-flex justify-content-between align-items-center">
                    <div><a href="./register.php" class="text-decoration-none fs-5 fw-bold text-success">Creat Account</a>
                    </div>
                    <div><button type="submit" class="btn btn-success" name="submit">Login</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>

    
    <?php
    $jsonData = file_get_contents('users.json');
    $data = json_decode($jsonData, true);
    if (isset($_POST['submit'])) {
        $ok = false;
        $user = $_POST['email'];
        $password = $_POST['password'];
        foreach($data as $person){
            if($person['username'] == $user){
                $verify = $person['password'];
                $ok = true;
                $currentUser = $person['username'];
                break;
            }elseif($person['email']== $user){
                $verify = $person['password'];
                $currentUser = $person['username'];
                $ok = true;
                break;
            }
        }
        if($ok){
            if($password == $verify){
                $_SESSION['username'] = $currentUser;
                header("Location:chat.php");
            }else{
                echo "your password is not correct";
            }
        }else{
            echo "check if you spell username correctly or you don't have account";
        }

    }
    ?>


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>