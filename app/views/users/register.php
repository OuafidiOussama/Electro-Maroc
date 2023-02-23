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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/register.css">
    <script src="<?= URLROOT;?>/js/index.js" defer></script>
    <!-- custon style Sheet & JavaScript -->
    <title>Ecommerce Website</title>


  </head>
  <body>
    <main class="hero-section" style="height: 90vh; margin: 5vh; position: fixed;">
        <div class="login">
          
            <span class="back-reg text-white fs-900 uppercase lineheight-2 bold-bolder fs-poppins">Register</span>
          <img class="block lineheight " src="<?= URLROOT;?>/img/image1.png" alt="" />

        </div>
      </main>

      <form action="<?php echo URLROOT;?>/users/register" method="POST">
      <section class="right">
      
        <label  class="fs-poppins">Full Name</label>
        <input type="text" name="full_name" class="fs-poppins form-control <?php echo (!empty($data['full_name_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['full_name_err'];?></span>
        <label class="fs-poppins">Phone Number</label>
        <input type="text" name="phone" class="fs-poppins form-control <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['phone_err'];?></span>
        <label class="fs-poppins">Address</label>
        <input type="text" name="address" class="fs-poppins form-control <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['address_err'];?></span>
        <label class="fs-poppins">City</label>
        <input type="text" name="city" class="fs-poppins form-control <?php echo (!empty($data['city_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['city_err'];?></span>
        <label for="email" class="fs-poppins">Email</label>
        <input type="email" name="email" class="fs-poppins form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
        <label for="password" class="fs-poppins">Password</label>
        <input type="password" name="password" class="fs-poppins form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
        <label class="fs-poppins">Confirm Password</label>
        <input type="password" name="confirm_password" class="fs-poppins form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>


        <div>
          <a href="<?= URLROOT;?>/users/login" class="login fs-poppins">Already have an account?</a>
        </div>
        <div>
            <button type="submit" class="register-btn fs-poppins">Register</button>
        </div>
        </section>
      </form>
    
  </body>
</html>