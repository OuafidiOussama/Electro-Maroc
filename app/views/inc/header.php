<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>

    <!-- Icon -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <!-- icon -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google fonts End -->

    <!-- custon style Sheet & JavaScript -->
    <link rel="stylesheet" href="<?= URLROOT;?>/css/about.css" />
    <link rel="stylesheet" href="<?= URLROOT;?>/css/blog.css" />
    <link rel="stylesheet" href="<?= URLROOT;?>/css/cart.css" />
    <link rel="stylesheet" href="<?= URLROOT;?>/css/contactus.css" />
    <link rel="stylesheet" href="<?= URLROOT;?>/css/index.css" />
    <link rel="stylesheet" href="<?= URLROOT;?>/css/product.css" />
    <link rel="stylesheet" href="<?= URLROOT;?>/css/shop.css" />
    <script src="<?= URLROOT;?>/js/index.js" defer></script>
    <script src="<?= URLROOT;?>/js/product.js" defer></script>
    <script src="<?= URLROOT;?>/js/shop.js" defer></script>
    <script src="<?= URLROOT;?>/js/cart.js" defer></script>
    <!-- custon style Sheet & JavaScript -->
    <title><?= SITENAME;?></title>
  </head>
  <body class="home">
    <header class="primary-header container flex">
      <div class="header-inner-one flex">
        <div class="logo">
          <img width="60px" src="<?= URLROOT;?>/img/logo_200x200.png" alt="" />
        </div>
        <button
          class="mobile-close-btn"
          data-visible="false"
          aria-controls="primary-navigation"
        >
          <i class="uil uil-times-circle"></i>
        </button>
        <nav class="nav">
          <ul
            id="primary-navigation"
            data-visible="false"
            class="primary-navigation flex"
          >
            <li>
              <a class="fs-100 fs-montserrat bold-500" href="<?= URLROOT;?>"
                >Home</a
              >
            </li>
            <li>
              <a class="fs-100 fs-montserrat bold-500" href="<?= URLROOT;?>/pages/shop"
                >Shop</a
              >
            </li>
            <li>
              <a class="fs-100 fs-montserrat bold-500" href="<?= URLROOT;?>/pages/about"
                >About Us</a
              >
            </li>
            <li>
              <a class="fs-100 fs-montserrat bold-500" href="<?= URLROOT;?>/pages/blog"
                >Blog</a
              >
            </li>
            <li>
              <a class="fs-100 fs-montserrat bold-500" href="<?= URLROOT;?>/pages/contact"
                >Contact Us</a
              >
            </li>
          </ul>
        </nav>
      </div>

      <div class="header-login flex">
      <?php if(isset($_SESSION['user_email'])) : ?>
        <a href="<?=URLROOT . '/pages/cart'?>"><i
          id="cart-box"
          aria-controls="cart-icon"
          class="uil uil-shopping-bag"
        ></i></a>

        <div id="cart-icon" data-visible="false" class="cart-icon">
          
        </div>

        <!-- =================1111111111================== -->
        <?php else : ?>

        <?php endif; ?>

        <?php if(isset($_SESSION['user_email'])) : ?>
          <a href="<?= URLROOT;?>/users/logout"><button class="large-btn bg-red text-white fs-poppins fs-50">Logout</button></a>
          
          <?php elseif(isset($_SESSION['admin_email'])) : ?>
          <a href="<?= URLROOT;?>/admins/dash"><button class="large-btn bg-red text-white fs-poppins fs-50">dashboard</button></a>
        

        <?php else : ?>
        <a href="<?= URLROOT;?>/users/login"><button class="large-btn bg-red text-white fs-poppins fs-50">Login</button></a>
        
        <?php endif;?>

        
      </div>
      <div class="mobile-open-btn"><i class="uil uil-align-right"></i></div>
    </header>
