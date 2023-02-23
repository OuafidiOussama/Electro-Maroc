<?php require APPROOT . '/views/inc/header.php';?>

    <!-- ==================Single Product-============================= -->
    <section class="single-product grid">

    <form action="<?php echo URLROOT . '/users/addToCart/' . $data['id'];?>" method="POST" class="single-product grid">

      <div>
        <input type="hidden" name="reference" value="<?php echo $data['reference'];?>">
        <img src="<?= URLROOT . '/product/' . $data['reference'];?>" alt="" />
      </div>
      <div class="product-info grid">
        <input type="hidden" name="label" value="<?php echo $data['label']?>">
        <h1 class="fs-poppins fs-400 blod-900"><?php echo $data['label']?></h1>
        <div class="price">
          <input type="hidden" name="price" value="<?php echo $data['selling_price']?>">
          <p class="bold-700 fs-poppins fs-300" >$<?php echo $data['selling_price']?></p>
        </div>

        <div>
          <p class="fs-montserrat lineheight">
          <?php echo $data['description']?>
          </p>
        </div>

        <div class="product-add-cart flex">
          <input type="number" min="1" max="10" value="1" class="bg-gray fs-poppins" name="qty"/>
          
          
          <div>
            <button type="submit" class="product-btn large-btn bg-red text-white fs-poppins fs-50 add-to-cart">
              Add to cart
            </button>
          </div>
        </div>

        <div>
          <p class="fs-montserrat text-red">
            <span class="text-black">Category: </span><?php echo $data['category']?>
          </p>
        </div>
      </div>

      </form>

    </section>

    <!-- ==================Single Product-============================= -->


    <!-- ==============Footer section================================= -->

    <?php require APPROOT . '/views/inc/footer.php';?>
