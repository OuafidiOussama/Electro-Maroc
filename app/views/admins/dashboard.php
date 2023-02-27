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
    <link rel="stylesheet" href="<?= URLROOT;?>/css/dashboard.css" />
    <!-- <link rel="stylesheet" href="index.css" /> -->
    <script src="<?= URLROOT;?>/js/dash.js" defer></script>
    <!-- custon style Sheet & JavaScript -->
    <title><?= SITENAME;?></title>


  </head>
  <body>
    <div class="container fs-montserrat">
        <div class="navigation active">
            <ul>
                <li>
                  <a href="<?=URLROOT?>/admins/dash">
                    <span class="icon"></i></span>
                    <span class="title">Electro Maroc</span>
                  </a>
                </li>
                <li>
                  <a href="<?=URLROOT?>/admins/dash">
                    <span class="icon"><i class="uil uil-home"></i></span>
                    <span class="title">Dashboard</span>
                  </a>
                </li>
                <li>
                  <a href="<?=URLROOT?>/admins/user">
                    <span class="icon"><i class="uil uil-user"></i></span>
                    <span class="title">Costumers</span>
                  </a>
                </li>
                <li>
                  <a href="<?=URLROOT;?>/admins/product">
                    <span class="icon"><i class="uil uil-shopping-cart"></i></span>
                    <span class="title">Products</span>
                  </a>
                </li>
                <li>
                  <a href="<?=URLROOT?>/admins/category">
                    <span class="icon"><i class="uil uil-chart-pie-alt"></i></span>
                    <span class="title">Categories</span>
                  </a>
                </li>
                <li>
                  <a href="<?=URLROOT?>/admins/order">
                    <span class="icon"><i class="uil uil-comment"></i></span>
                    <span class="title">Orders</span>>
                  </a>
                </li>
                <li>
                  <a href="<?php echo URLROOT; ?>/admins/logout">
                    <span class="icon"><i class="uil uil-signout"></i></span>
                    <span class="title">Logout</span>
                  </a>
                </li>
            </ul>
        </div>

        <div class="main active">
          <div class="topbar">
            <div class="toggle">
              <i class="uil uil-bars"></i>
            </div>
            <div class="search">
              <label>
                <input type="text" placeholder="Search Here">
                <i class="uil uil-search"></i>
              </label>
            </div>
            <div>
            <a href="<?= URLROOT;?>/pages/shop"><button class="large-btn bg-red text-white fs-poppins fs-50">Shop</button></a>
            </div>
          </div>


          <div class="cardbox">
            <div class="card">
              <div>
                <div class="numbers"><?php echo count($data['p_total'])?></div>
                <div class="card-name">Products</div>
              </div>
              <div class="iconbx">
              <i class="uil uil-shopping-cart"></i>
              </div>
            </div>
            <div class="card">
              <div>
                <div class="numbers"><?php echo count($data['c_total'])?></div>
                <div class="card-name">Categories</div>
              </div>
              <div class="iconbx">
              <i class="uil uil-chart-pie-alt"></i>
              </div>
            </div>
            <div class="card">
              <div>
                <div class="numbers"><?php echo count($data['u_total'])?></div>
                <div class="card-name">Clients</div>
              </div>
              <div class="iconbx">
                <i class="uil uil-user"></i>
              </div>
            </div>
            <div class="card">
              <div>
                <div class="numbers"><?php echo count($data['o_total'])?></div>
                <div class="card-name">Orders</div>
              </div>
              <div class="iconbx">
                <i class="uil uil-comment"></i>
              </div>
            </div>
          </div>

            <div class="details">
              <div class="recent-orders">
                <div class="card-header">
                  <h2>Recent Orders</h2>
                  <a href="<?=URLROOT . '/admins/order' ;?>" class="btn">View All</a>
                </div>
                <table>
                  <thead>
                    <tr>
                      <td>Client</td>
                      <td>Grand Total</td>
                      <td>Order Date</td>
                      <td>Status</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data['order'] as $order) :?>
                    <tr>
                      <td><?php echo $order->full_name ?></td>
                      <td>$<?php echo $order->grand_total ?></td>
                      <td><?php echo $order->creation_date ?></td>
                      <td><span class="status delivered">Delivered</span></td>
                    </tr>
                    <?php endforeach ;?>
                    
                  </tbody>
                </table>
              </div>
              <div class="recent-products">
                <div class="card-header">
                  <h2>Recent Products</h2>
                </div>
                <table>
                  <?php foreach($data['product'] as $products) : ?>
                  <tr>
                    <td width="60px"><div class="imgbx"><img src="<?= URLROOT . '/product/' . $products->reference ?>" alt=""></div></td>
                    <td><h4><?php echo $products->label ?></h4></td>
                  </tr>
                  <?php endforeach ; ?>
                </table>
              </div>
            </div>
        </div>
    </div>
  </body>
</html>