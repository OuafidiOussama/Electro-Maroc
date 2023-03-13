<?php require APPROOT . '/views/inc/header.php';?>

    <!-- ===================Shop Feature Section============================ -->

    <section class="shop-feature bg-gray grid">
      <div>
        <p class="fs-montserrat text-black">
          Home <span aria-hidden="true" class="margin">></span> Orders
        </p>
      </div>
      <h2 class="fs-poppins fs-300 bold-700">Orders</h2>
    </section>

    <section class="orders">
    <table>
                  <thead>
                    <tr>
                      <td>Date</td>
                      <td>Grand Total</td>
                      <td>Status</td>
                      <td>Delevery Date</td>
                      <td>Details</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data['orders'] as $order) :?>
                        <tr>
                          <td><?php echo $order->creation_date ?></td>
                          <td>$<?php echo $order->grand_total ?></td>
                          <td><span class="status <?php echo $order->status ?>"><?php echo $order->status ?></span></td>

                          <?php if($order->status == 'Confirmed') : ?>
                            <td><?php echo $order->delevery_date?></td>
                            <td><a href="<?php echo URLROOT . '/pages/details/' . $order->id ?>">check</a></td>
                            
                          <?php else :?>
                            <td>xxxx-xx-xx</td>
                            <td><a href="<?php echo URLROOT . '/pages/details/' . $order->id ?>">check</a></td>
                          <?php endif ;?>
                          
                    </tr>
                  </form>
                    <?php endforeach; ?>
                  </tbody>
                </table>
    </section>

    <!-- ===================Contact Us======================== -->

    <?php require APPROOT . '/views/inc/footer.php';?>
