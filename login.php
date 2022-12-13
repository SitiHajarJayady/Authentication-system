<?php require "includes/header.php"; ?>


<?php require "config.php"; ?>

<?php
  /*when user already login, req to login and register page 
  will redirect to index page */
  if(isset($_SESSION['username'])){
    header("Location: http://localhost/auth-sys/index.php");
  }


  //submit 
  //take input data and do query
  //execute query
  //fetch data
  //check row count
  //use password_verify function

  


  if($_SERVER['REQUEST_METHOD']== 'POST' AND isset($_POST["submit"])){
    if($_POST["email"]== "" OR $_POST["username"]== "" OR $_POST["password"]== ""){
      echo "some inputs are empty";
    }
    else{

      $email=$_POST["email"];
      $username=$_POST["username"];
      $password=$_POST["password"];

      //do query

      $login = $conn->query("SELECT * FROM users WHERE email= '$email'");
      //execute query

      $login->execute();

      //fetch data inside the selected row/ resulting row from query 

      $data= $login->fetch(PDO::FETCH_ASSOC);

      //row count return "numbers" based on query (how many rows return)
      //query the email will only return no 1 as the email query only shows once
      //in the database

      if($login->rowCount()>0){
        //echo "Exists in database";

        //check password (password_verify) and username
        //function needs password entered and hash password, 'mypassword' in database
        if(password_verify($password, $data['mypassword']) AND $username== $data['username']){
         
          echo "successfully logged in";
          $_SESSION['username']=$data['username'];
          $_SESSION['email']=$data['email'];
          //$username= $data['username'];

          //$url= 'http://localhost/auth-sys/index.php';

          //header("location :$url?x=$username");
          

          $url = 'http://localhost/auth-sys/index.php';

          header("Location: $url");


        }
        else {
          echo "user password or username is wrong";
        }


      }
      else{
        echo "email is wrong";
      }






    }
  }

?>

<main class="form-signin w-50 m-auto">
  <form  method="POST" action="login.php">
    <!-- <img class="mb-4 text-center" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mt-5 fw-normal text-center">Please Log in</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="user.name">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Login</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>
