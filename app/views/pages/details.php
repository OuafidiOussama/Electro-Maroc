<?php require APPROOT . '/views/inc/header.php';?>
    <!-- ===================Shop Feature Section============================ -->

    <section class="shop-feature bg-gray grid">
      <div>
        <p class="fs-montserrat text-black">
          Home <span aria-hidden="true" class="margin">></span> Details
        </p>
      </div>
      <h2 class="fs-poppins fs-300 bold-700">Details</h2>
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
          </tr>
        </thead>
        <tbody>
          <form method="POST">

            <?php foreach($data['orders'] as $order):?>
            <tr>
                <td><img src="<?php echo URLROOT . '/product/' . $order->reference?>" alt="" width="100px"></td>
                <td><?= $order->label ?></td>
                <td>$<?= $order->unite_price?></td>
                <td><?= $order->qty ?></td>
                <td>$<?= $order->total_price ?></td>
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
        </div>
        
    </section>


    <!-- ===============================Cart Section=================== -->
    <?php require APPROOT . '/views/inc/footer.php';?>

