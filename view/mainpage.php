<?php namespace minigame\view;

use minigame\models\Current_sessions; ?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Зареєструватись</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
  </head>

  <body>

  <div class="container">
        <div class="row">
            <div class="col-4 offset-4 text-center">
  <div class="container">
      <header class="blog-header py-7">
      <form method="POST">
      <div class="text-center mb-6">
        <img class="mb-4" src="https://slack-files2.s3-us-west-2.amazonaws.com/avatars/2016-02-26/23343984289_ddecd105aae271e99656_512.png" alt="" width="72" height="72">

        <?php if (Current_sessions::isUserLogged() == TRUE): ?>
        
          <h1 class="h3 mb-3 font-weight-normal">Ви авторизовані під іменем <?php echo $_SESSION['logged_user'] ?></h1>
          <button class="btn btn-lg btn-primary btn-block" name="logout" type="submit">Вийти</button>
        <?php else: ?>
        
          <h1 class="h3 mb-3 font-weight-normal">Ви не авторизовані</h1>
          <h6><a href="/login">Увійти</a></h6>
          <h6><a href="/signup">Зареєстуватись</a></h6>
        <?php endif; ?> 


      </div>
     
  
    </form>
  </div>
  </div></div></div>


















https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css