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
            <td>Delete</td>
          </tr>
        </thead>
        <tbody>
          <form action="<?php echo URLROOT . '/Users/sendOrder' ;?>" method="POST">

            <?php foreach($data['cProduct'] as $cartpro):?>
            <tr>
              <td class="dis"><img src="<?= URLROOT . '/product/'. $cartpro->product_image;?>" alt=""></td>
              <td><?= $cartpro->product_name ;?></td>
              <td>$<?= $cartpro->product_price ;?></td>

              <input type="hidden" name="qty[]" value="<?= $cartpro->quantity ?>">
              <input type="hidden" name="id[]" value="<?= $cartpro->product_id ?>">
              <td><?= $cartpro->quantity ;?></td>
              <td>$<?= $cartpro->total_price ;?></td>
              <td><a href="<?= URLROOT . '/users/deleteFromCart/' . $cartpro->id ?>" id="confirm_del" style="color:black;"><i class="uil uil-trash"></i></a></td>
            </tr>
            <?php endforeach;?>
         
        </tbody>
      </table>

      <script>
      $('#confirm_del').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href')
        console.log(href);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = href;
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
      })
    </script>
      
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
                <button class="fs-poppins text-black bold-800 fs-300 bg-gray">Proceed to checkout</button>
            </div>
        </div>
        </form>
    </section>

    <!-- ===============================Cart Section=================== -->
    <?php require APPROOT . '/views/inc/footer.php';?>

