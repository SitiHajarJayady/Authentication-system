<?php require "includes/header.php"; ?>



<?php require "config.php" ;?>

  <?php 
   /*when user already login, req to login and register page 
  will redirect to index page */
  if(isset($_SESSION['username'])){
    header("Location: http://localhost/auth-sys/index.php");
  }


    //validation when button is clicked
    if(isset($_POST["submit"])){

        //display message on page "empty"

        if($_POST["email"]== '' OR $_POST["username"] =='' OR $_POST["password"] == ''){
            echo "some inputs are empty";
        }

        // SENT INPUT TO DATABASE
        else{
            $email= $_POST["email"];
            $username= $_POST["username"];
            $password= $_POST["password"];

            //to check if email or username already exists

            $login = $conn->query("SELECT * FROM users WHERE email= '$email' OR username = '$username'");
            //execute query

            $login->execute();

            //fetch data inside the selected row/ resulting row from query 

            $data= $login->fetch(PDO::FETCH_ASSOC);
            if($login->rowCount()>0){
              echo "account already exists";

            }
            
            else{
              //write into users table in auth-sys db
              $insert = $conn ->prepare ("INSERT INTO users (email, username,mypassword)
              VALUES (:email, :username, :mypassword)");
              //":email" is a handler 


              //execute an array ; insert the value in the textbox into database using PDO

              $insert->execute([
                  ':email' =>$email,
                  ':username'=> $username,
                  //encrypt the password using hash function
                  ':mypassword' =>password_hash($password, PASSWORD_DEFAULT),

                  //':mypassword' =>$password,

              ]);

              //$url = 'http://localhost/auth-sys/login.php';

              //header("Location: $url");

           

           
            
            }

            

            

        }





    }

 

  ?>



<main class="form-signin w-50 m-auto">
  
  <form method="POST" action="register.php">
   
    <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

   

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">register</button>
    <h6 class="mt-3">Aleardy have an account?  <a href="login.php">Login</a></h6>

    

  </form>
</main>

<?php require "includes/footer.php"; ?>

