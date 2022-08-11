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
            <span class="fs-3 mx-auto text-success">create account</span>
        </h1>

        <div class="container px-5 mt-4 mb-5">
            <form action="" method="POST" class="myform" id="myform">
                <div class="d-flex">
                    <div class="d-flex flex-wrap w-50">
                        <label for="name" class="w-100">Name</label>
                        <input class="form-control" type="text" name="name" placeholder="name" id="name" >
                        
                    </div>
                    <div class="d-flex flex-wrap w-50">
                        <label for="lastname" class="w-100">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="username" id="username" >
                        
                    </div>
                </div>
                <label class="mt-3" for="email">Email</label>
                <input class="form-control " type="email" class=" mb-3" placeholder="Email" name="email" id="email" >
               
                <label class="mt-3" for="password">Password</label>
                <input class="form-control " type="password" class=" mb-3" placeholder="Enter your password" name="password" id="password">
               
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success" name="submit">Go to login</button>
                </div>
        </div>
        </form>
    </div>
    </div>

    
    <?php
    $jsonData = file_get_contents('users.json');
    $data = json_decode($jsonData, true);
    
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $a = [];
        $a['name'] = $name;
        $a['username'] = $username;
        $a['email'] = $email;
        $a['password'] = $password;
        $ok =true;
        foreach($data as $person){
            if($person['email'] == $email){
               $ok = false; 
               echo "your email is already taken";
               break;
            }if($person['username'] == $username){
                $ok = false;
                echo "your username is already taken";
                break;
            }
        }
        if($ok){
        array_push($data, $a);
        $json = json_encode($data);
        file_put_contents('users.json', $json);
        header("Location:index.php");
        }
    }
    ?>


    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>