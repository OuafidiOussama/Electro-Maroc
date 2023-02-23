<?php require APPROOT . '/views/inc/header.php';?>
    <!-- ===========Hero Section===================== -->

    <main class="hero-section">
      <div>
        <h1 class="fs-200 fs-poppins">
          Beats Solo
          <span class="block lineheight fs-300 bold-900 big-wireless fs-poppins"
            >Wireless</span
          ><span
            class="text-white fs-900 uppercase lineheight-2 bold-bolder fs-poppins"
            >HeadPhone</span
          >
        </h1>
        <img src="<?= URLROOT;?>/img/image1.png" alt="" />
      </div>
      <div class="hero-inner flex">
        <div>
          <a href="<?=URLROOT?>/pages/shop"><button class="large-btn bg-red text-white fs-poppins fs-50">
            Shop By Category
          </button></a>
        </div>
        <div class="hero-info">
          <h4 class="fs-montserrat">Description</h4>
          <p class="fs-montserrat">
            There are many variations passages of Lorem Ipsum available, but the
            majority have suffered alteration
          </p>
        </div>
      </div>
    </main>

    <!-- =================Product Section======================= -->

    <section class="product-section">
      <?php foreach($data['category'] as $categories) : ?>
      <div class="category bg-black grid">
        <div>
          <h3 class="text-white fs-50 fs-montserrat bold">
            Enjoy <span class="block fs-300 fs-poppins bold"><?php echo $categories->name?></span
            >
          </h3>
          <a href="<?= URLROOT . '/pages/selectByCat/' . $categories->id;?>"><button class="prdduct-btn large-btn text-white bg-red fs-montserrat">
            Browse
          </button></a>
        </div>
        <div class="product-img1">
          <img src="<?php echo URLROOT. '/category/' . $categories->picture ; ?>" alt="" />
        </div>
      </div>
      <?php endforeach;?>
    </section>

    <!-- ========================================= -->
    <!-- =============Service section============== -->

    <section class="service-section">
      <div class="service">
        <img src="<?= URLROOT;?>/img/free.svg" alt="" />
        <div class="service-info">
          <h3 class="fs-poppins fs-200">Free Shippng</h3>
          <p class="fs-montserrat fs-50">Free Shipping On All Order</p>
        </div>
      </div>
      <div class="service">
        <img src="<?= URLROOT;?>/img/sett.svg" alt="" />
        <div class="service-info">
          <h3 class="fs-poppins fs-200">Money Guarantee</h3>
          <p class="fs-montserrat fs-50">30 Day Money Back</p>
        </div>
      </div>
      <div class="service">
        <img src="<?= URLROOT;?>/img/supt.svg" alt="" />
        <div class="service-info">
          <h3 class="fs-poppins fs-200">Online Support 24/7</h3>
          <p class="fs-montserrat fs-50">Technical Support 24/7</p>
        </div>
      </div>
      <div class="service">
        <img src="<?= URLROOT;?>/img/pay.svg" alt="" />
        <div class="service-info">
          <h3 class="fs-poppins fs-200">Secure Payment</h3>
          <p class="fs-montserrat fs-50">All Cards Accepted</p>
        </div>
      </div>
    </section>

    <!-- ===================Feature Section============= -->

    <section class="feature-section bg-red">
      <div class="feature-one grid">
        <img src="<?= URLROOT;?>/img/p-1.png" alt="" />
        <p class="text-white uppercase">20% OFF</p>
        <p
          class="font-size lineheight fs-500 text-white fs-poppins bold-900 uppercase"
        >
          fine <span class="smile">smile</span>
        </p>
        <p class="text-white fs-poppins fs-50">15 Nov To & Dec</p>
      </div>
      <div class="feature-info">
        <h2 class="fs-200 text-white fs-poppins bold-500">Beats Solo Air</h2>
        <p class="fs-poppins fs-300 bold-800 text-white">Summer Sale</p>
        <p class="fs-montserrat text-white fs-50">
          Company that’s grown from 270 to 480 employees in the last 12 months.
        </p>
        <a href="<?= URLROOT ?>/pages/shop"><button class="prdduct-btn large-btn text-red bg-white fs-poppins">
          Shop
        </button></a>
      </div>
    </section>
    <!-- =============================Best Sellar================== -->

    <section class="best-product container">
      <h2 class="letter-spacing bold-800 fs-poppins">Latest Products</h2>
      <p class="fs-montserrat fs-100">
        speakerThere are many variations passages
      </p>
    </section>

    <!-- ===========================Heading======================== -->
    <section class="best-Seller">
      <?php foreach ($data['product'] as $products):?>
      <div class="product grid">
        <a href="<?= URLROOT . '/pages/product/' . $products->id; ?>">
          <img src="<?= URLROOT . '/product/' . $products->reference ?>" alt="" />
        </a>
        <p class="fs-poppins bold-500"><?php echo $products->label?></p>
        <p class="fs-poppins bold-500">$<?php echo $products->selling_price?></p>

        <!-- ---------------------------- -->
        <div class="product-details grid bg-red">
          <i class="text-white uil uil-heart-alt"></i>
        </div>
        
        <!-- ===================================== -->
      </div>
      <?php endforeach;?>
    </section>

    <!-- =========================================== -->
    <section class="feature-section bg-green">
      <div class="feature-green feature-one grid">
        <img src="<?= URLROOT;?>/img/p12.png" alt="" />
        <p class="text-white uppercase">20% OFF</p>
        <p
          class="font-size lineheight fs-500 text-white fs-poppins bold-900 uppercase"
        >
          HAPPY <span class="smile">HOURSE</span>
        </p>
        <p class="text-white fs-poppins fs-50">15 Nov To & Dec</p>
      </div>
      <div class="feature-info">
        <h2 class="fs-200 text-white fs-poppins bold-500">Beats Solo Air</h2>
        <p class="fs-poppins fs-300 bold-800 text-white">Summer Sale</p>
        <p class="fs-montserrat text-white fs-50">
          Company that’s grown from 270 to 480 employees in the last 12 months.
        </p>
        <a href="<?= URLROOT ?>/pages/shop"><button class="prdduct-btn large-btn text-green bg-white fs-poppins">
          Shop
        </button></a>
      </div>
    </section>
    <!-- =========================================== -->

    <!-- =================Heading recent News================================ -->
    <section class="best-product container">
      <h2 class="letter-spacing bold-800 fs-poppins">Recent News</h2>
      <p class="fs-montserrat fs-100">There are many variations passages</p>
    </section>
    <!-- ============Recent News=========================== -->

    <section class="recent-news grid">
      <div class="news grid">
        <img src="<?= URLROOT;?>/img/news-1.png" alt="" />
        <div class="fs-montserrat fs-100 flex padding-inline">
          <p>Ocutober 5, 2022</p>
          <p>by Ecommercestore3/ Edit</p>
        </div>
        <h2 class="fs-poppins padding-inline fs-200 blod-600">
          How to choose perfect gadgets
        </h2>
        <p class="fs-montserrat padding-inline fs-100">
          When, while the lovely valley teems with vapour around me, and the
          meridian sun strikes the upper s ...
        </p>
      </div>

      <div class="news grid">
        <img src="<?= URLROOT;?>/img/news-2.png" alt="" />
        <div class="fs-montserrat fs-100 flex padding-inline">
          <p>Ocutober 5, 2022</p>
          <p>by Ecommercestore3/ Edit</p>
        </div>
        <h2 class="fs-poppins padding-inline fs-200 blod-600">
          How to choose perfect gadgets
        </h2>
        <p class="fs-montserrat padding-inline fs-100">
          When, while the lovely valley teems with vapour around me, and the
          meridian sun strikes the upper s ...
        </p>
      </div>

      <div class="news grid">
        <img src="<?= URLROOT;?>/img/news-1.png" alt="" />
        <div class="post-date fs-montserrat fs-100 flex padding-inline">
          <p>Ocutober 5, 2022</p>
          <p>by Ecommercestore3/ Edit</p>
        </div>
        <h2 class="fs-poppins padding-inline fs-200 blod-600">
          How to choose perfect gadgets
        </h2>
        <p class="fs-montserrat padding-inline fs-100">
          When, while the lovely valley teems with vapour around me, and the
          meridian sun strikes the upper s ...
        </p>
      </div>
    </section>

<?php require APPROOT . '/views/inc/footer.php';?>
