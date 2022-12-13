<?php
  session_start();
?>

<?php 
  /*adding if else statement :
    after logged in successfull, login and register element not 
    display on page
    
    <?php if(!isset($_SESSION['username'])) :  ?>
    <?php else: ?>
    <?php endif ?>
      
      */


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Carousel Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

    

    

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css
" rel="stylesheet">


<meta name="theme-color" content="#712cf9">

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">auth sys</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
   
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/auth-sys/index.php">Home</a>
        </li>

        <?php if(!isset($_SESSION['username'])) :  ?>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/auth-sys/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/auth-sys/register.php">Register</a>
          </li>

        <?php else: ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['username']; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="http://localhost/auth-sys/logout.php">Logout</a></li>
            
            </ul>
            
          </li>
        <?php endif ?>
       
      </ul>
    </div>
  </div>
</nav>
<div class="container marketing">