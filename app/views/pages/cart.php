<?php require APPROOT . '/views/inc/header.php';?>
    <!-- ===================Shop Feature Section============================ -->

    <section class="shop-feature bg-gray grid">
      <div>
        <p class="fs-montserrat text-black">
          Home <span aria-hidden="true" class="margin">></span> Cart
        </p>
      </div>
      <h2 class="fs-poppins fs-300 bold-700">Cart</h2>
    </section>

    <!-- ===============================Cart Section=================== -->

    <section class="table">
      <table>
        <thead class="thead fs-poppins text-black bold-700 bg-very-light-gray">
          <tr>
            <td>Reference</td>
            <td>Product</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
            <td>Update</td>
            <td>Delete</td>
          </tr>
        </thead>
        <tbody>
          <form method="POST">

            <?php foreach($data['cProduct'] as $cartpro):?>
            <tr>
              <td class="dis"><img src="<?= URLROOT . '/product/'. $cartpro->product_image;?>" alt=""></td>
              <td><?= $cartpro->product_name ;?></td>
              <td>$<?= $cartpro->product_price ;?></td>
              <input type="hidden" value="<?= $cartpro->product_price ;?>" name="price">
              <input type="hidden" name="u_pr[]" value="<?= $cartpro->product_price ;?>">

              <input type="hidden" name="qty[]" value="<?= $cartpro->quantity ?>">
              <input type="hidden" name="id[]" value="<?= $cartpro->product_id ?>">
              

                <td><input type="number" name="qty" value="<?= $cartpro->quantity ;?>"></td>
                
                <td>$<?= $cartpro->total_price ;?></td>
                <input type="hidden" name="t_pr[]" value="<?= $cartpro->total_price ;?>">
                <td><input type="submit" formaction="<?= URLROOT . '/users/updateCart/' . $cartpro->id ?>" style="color:black;" value="UPDATE"></td>
                <td><a href="<?= URLROOT . '/users/deleteFromCart/' . $cartpro->id ?>" id="confirm_del" style="color:black;"><i class="uil uil-trash"></i></a></td>


            </tr>
            <?php endforeach;?>
         
        </tbody>
      </table>
      
    </section>

    <section class="check-out grid">

        <div>

        </div>
        <div>
        <h3 class="fs-poppins fs-300 text-black bold-700">Cart totals</h3>

        <table>

            <thead class="thead fs-poppins text-black bold-700">
              <tr>
                <td class="bg-very-light-gray">Grand Total</td>
                <input type="hidden" name="grand" value="<?php echo $data['grand'] ?>">
                <td class="bold-700 grand-total">$<?php echo $data['grand'] ?></td>
              </tr>
            </thead>
            <tbody>
            </table>
            <div class="grid">
                <button type="button" id="checkout" class="fs-poppins text-black bold-800 fs-300 bg-gray" >Proceed to checkout</button>

            </div>
        </div>
        
    </section>

<div class="popcont hide">
    <section class="pop">
    <?php foreach($data['cProduct'] as $cartpro):?>
        <div class="checkcont">
          <h1><?= $cartpro->product_name ;?></h1>
          <p>$<?= $cartpro->product_price ;?> x <?= $cartpro->quantity ?></p>
          <h2>$<?= $cartpro->total_price ;?></h2>
          
        </div>
    <?php endforeach;?>
    <div class="inputs">
      <input type="submit" value="Confirm" formaction="<?php echo URLROOT . '/Users/sendOrder' ;?>">
      <input type="button" id="cancelor" value="Cancel">
    </div>
    </section>
</div>
    </form>

    <!-- ===============================Cart Section=================== -->
    <?php require APPROOT . '/views/inc/footer.php';?>

