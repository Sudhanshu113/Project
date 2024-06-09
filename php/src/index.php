<?php
//These are the defined authentication environment in the db service

    // The MySQL service named in the docker-compose.yml.
    $host = 'db';

    // Database use name
    $user = 'MYSQL_USER';

    //database user password
    $pass = 'MYSQL_PASSWORD';

    //database name
    $mydatabase = 'MYSQL_DATABASE';

$conn = new mysqli($host, $user, $pass, $mydatabase);

    $errors = [];

    $firstname = '';
    $lastname = '';
    $email = '';
    $password='';
    $phoneno='';
        
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // validate form
    $firstname= $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $phoneno = $_REQUEST['phoneno'];

    if(!$firstname){
        $errors[] = 'Enter First Name';
    }
    if(!$lastname){
        $errors[] = 'Enter Last Name';
    }
    if(!$email){
        $errors[] = 'Enter email';
    }
    if(!$password){
        $errors[] = 'Enter password';
    }

    if(!$phoneno){
        $errors[] = 'Enter phone_no';
    }

    if(empty($errors)){


        $sql = "INSERT INTO userdetails VALUES ('$firstname','$lastname','$email','$password','$phoneno')";

        if(mysqli_query($conn, $sql)){
                
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        
        $firstname = '';
        $lastname = '';
        $email = '';
        $password= '';
        $phoneno = '';
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Form Styling</title>
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <style>
      * {
     
       box-sizing: border-box;
       margin: 0;
       padding: 0;
      }

      body {
        font-family: 'Raleway', sans-serif;
        background: #9cff6e;
        color: black;
        
      }

      a {
       text-decoration: none;
      }

      #container {
        margin: 40px auto;
        max-width: 400px;
        padding: 20px;
      }

      .form-wrap {
      
        background-color: white;
        padding: 30px;
      }

      .form-wrap h1,
      .form-wrap p {
        text-align: center;
       
      }

      .form-wrap .form-group {
        margin-top: 20px;
        margin-bottom: 10px;
        
      }

      .form-wrap .form-group label {
        display: block;
        color: black;
        
      }

      .form-wrap .form-group input {
        width: 100%;
        padding: 10px;
        border: #ddd 1px solid;
        border-radius: 10px;
        
      }

      .form-wrap button {
        width: 100%;
        background-color: #3f69f2;
        color: black;
        font-size: 18px;
        padding: 5px 10px;
        
      }

      .form-wrap button:hover {
        background-color:#37a08e ;
        cursor: pointer;
       
      }

      .form-wrap .bottom-text {
       
        font-size: 13px;
      }

      footer {
        /* 
        Should be centered
       */
       text-align: center;
       color: white;
      }

      footer a {
       
        color: white;
      }
    </style>
  </head>
  <body>
    <div id="container">
      <div class="form-wrap">
        <h1>Register</h1>
        <p></p>
        <form method="POST">
          <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname"/>
          </div>
          <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
          </div>
          <div class="form-group">
            <label for="phone_no">Phone no.</label>
            <input type="number" name="phoneno" id="phoneno" />
          </div>
          <button type="submit" name="submit" class="btn">Submit</button>
          <p class="bottom-text">
            <a href="#">Terms & Conditions</a> and
            <a href="#">Privacy Policy</a>
          </p>
        </form>
      </div>
  
    </div>
  </body>
</html>