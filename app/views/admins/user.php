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
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    <span class="title">Orders</span>
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


          

            <div class="products">
              <div class="recent-orders">
                <div class="card-header">
                  <h2>Clients</h2>
                </div>
                <table>
                  <thead>
                    <tr>
                      <td>Full Name</td>
                      <td>Phone Number</td>
                      <td>Email</td>
                      <td>Address</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data['users'] as $user) :?>
                    <tr>
                      <td><?php echo $user->full_name?></td>
                      <td><?php echo $user->mobile?></td>
                      <td><?php echo $user->email?></td>
                      <td><?php echo $user->address?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                  </tbody>
                </table>
        
              </div>
            </div>
        </div>
    </div>

    <script>
      $('#confirm_delete').on('click', function(e){
        e.preventDefault();
        const href = $(this).parent().attr('href')
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

  </body>


</html>