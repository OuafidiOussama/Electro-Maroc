<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <!-- Icon -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- icon -->

    <!-- Google fonts End -->

    <!-- custon style Sheet & JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URLROOT;?>/css/index.css" />
    <link rel="stylesheet" href="<?= URLROOT;?>/css/shop.css">
    <link rel="stylesheet" href="<?= URLROOT;?>/css/login.css">
    <script src="<?= URLROOT;?>/js/index.js" defer></script>
    <!-- custon style Sheet & JavaScript -->
    <title><?= SITENAME;?></title>


  </head>
  <body>
    <main class="hero-section" style="height: 90vh; margin: 5vh; position: fixed;">
        <div class="login">
          
            <span class="text-white fs-900 uppercase lineheight-2 bold-bolder fs-poppins">LOGIN</span>
          <img class="block lineheight " src="<?= URLROOT;?>/img/image1.png" alt="" />

        </div>
      </main>
      <form action="<?php echo URLROOT;?>/users/login" method="POST">
      <section class="right">
      
        <label for="email" class="fs-poppins">Email</label>
        <input type="email" name="email" class="fs-poppins form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
        <label for="password" class="fs-poppins">Password</label>
        <input type="password" name="password" class="fs-poppins form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['password_err'];?></span>


          <div>
              <a href="<?= URLROOT;?>/users/register" class="register fs-poppins">Don't have an account ?</a>
          </div>
          <div>
              <button type="submit" class="login-btn fs-poppins">LOGIN</button>
          </div>
        </section>
      </form>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>