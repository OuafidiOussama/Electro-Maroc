<?php require APPROOT . '/views/inc/header.php';?>

<?php 

  echo ceil(count($data['product'])/9);
  
?>

    <!-- ===================Shop Feature Section============================ -->

    <section class="shop-feature bg-gray grid">
      <div>
        <p class="fs-montserrat text-black">
          Home <span aria-hidden="true" class="margin">></span> Product
        </p>
      </div>
      <h2 class="fs-poppins fs-300 bold-700">Product</h2>
    </section>

    <!-- ===================Section 2---------------------- -->

   

    <main class="shop-main-container grid">
      <!-- -------------------Inner Section=============== -->

      <div>
        <div class="shop-title flex">
          <div>
            <h2 class="fs-poppins fs-300">Shop</h2>
            <p class="fs-montserrat">Showing <?php echo count($data['product'])-9;?>-<?php echo count($data['product']);?> of <?php echo count($data['product']);?> results</p>
          </div>
        </div>
        <!-- ---------------End----Inner Section=============== -->

        <!-- ==============Shop-product====================== -->

        <section class="shop-product grid">

        <?php foreach($data['product'] as $products) :?>
          <div class="product-list grid-list" data-id="<?= $products->id;?>">
            <a href="<?= URLROOT . '/pages/product/' . $products->id; ?>">
            <img src="<?php echo URLROOT. '/product/' . $products->reference ; ?>" alt="" />
            </a>
            <p class="fs-montserrat bold-600"><?php echo $products->label ; ?></p>
            <div class="shop-btn flex-list">
            <button class="bg-red text-white fs-montserrat add-to-cart">  
            <a href="<?= URLROOT . '/pages/product/' . $products->id; ?>">View Detail</a>
            </button>
            
              <p class="fs-montserrat bold-700">$<?php echo $products->selling_price;?></p>
            </div>
          </div>
        <?php endforeach;?>
        </section>



        <div class="next-page fs-poppins flex ">
          <?php for($i=1; $i<=ceil(count($data['product'])/9); $i++):?>
          
            <a href="<?= URLROOT . '/pages/shop/' .$i?>"><button type="submit" class="pagination bold-800 text-black"><?php echo $i ?></button></a>

          <?php endfor;?>
        </div>
      </div>
      <!-- ==============Shop-product====================== -->
      <section>
        <div class="sidebar-search text-black bg-gray flex">
          <input
            type="text"
            id="Search"
            placeholder="Search Here"
            class="fs-montserrat bg-gray"
          />
          <div>
            <i class="uil bg-red text-white uil-search"></i>
          </div>
        </div>

        <aside class="sidebar-category">
          <div class="category-list flex">
            <h3 class=" fs-poppins bold-700 fs-200">Product Categories</h3>
            <i id="arrow" class="uil uil-angle-right" data-category="false"></i>
          </div>

          <div class="shop-category-list">
            <ul id="side-nav" class="sidebar-nav grid" data-category="false">
              <li>
                <a class="fs-montserrat text-black bold-500" href="<?=URLROOT . '/pages/shop' ;?>">All</a>
              </li>
              <?php foreach($data['category'] as $categories):?>
              <li>

                <a class="fs-montserrat text-black bold-500" href="<?= URLROOT . '/pages/selectByCat/' . $categories->id;?>"
                  ><?php echo $categories->name;?></a
                >
              </li>
              <?php endforeach;?>
            </ul>
          </div>
        </aside>
      </section>
    </main>





    <?php require APPROOT . '/views/inc/footer.php';?>
