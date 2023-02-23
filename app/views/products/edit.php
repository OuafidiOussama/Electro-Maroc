

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URLROOT;?>/css/dashboard.css" />
    <!-- <link rel="stylesheet" href="index.css" /> -->
    <script src="<?= URLROOT;?>/js/dash.js" defer></script>
    <!-- custon style Sheet & JavaScript -->
    <title><?= SITENAME;?></title>


  </head>
  <body>
    <div class="container fs-montserrat">
          
        <form action="<?php echo URLROOT .'/products/edit/' . $data['id']; ?>" method="POST" id="form" enctype="multipart/form-data">
            <div class="products">
              <div class="recent-orders">
                <div class="card-header">
                  <h2>Product</h2>
                </div>

                      <label>Product Reference</label>
                      <div>

                        <input type="file" name="reference" class="form-control <?php echo (!empty($data['reference_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['reference'];?>">
                        <span class="text-danger"><?php echo $data['reference_err'];?></span>
                      </div>
                      <label class="pt-4">Product Name</label>
                      <div>

                        <input type="text" name="label" class="form-control <?php echo (!empty($data['label_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['label'];?>">
                        <span class="text-danger"><?php echo $data['label_err'];?></span>
                      </div>
                      <label class="pt-4">Retail Price</label>
                      <div>

                        <input type="number" step="any" name="retail_price" class="form-control <?php echo (!empty($data['retail_price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['retail_price'];?>">
                        <span class="text-danger"><?php echo $data['retail_price_err'];?></span>
                      </div>
                      <label class="pt-4">Final Price</label>
                      <div>

                        <input type="number" step="any" name="final_price" class="form-control <?php echo (!empty($data['final_price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['final_price'];?>">
                        <span class="text-danger"><?php echo $data['final_price_err'];?></span>
                      </div>
                      <label class="pt-4">Selling Price</label>
                      <div>

                        <input type="number" step="any" name="selling_price" class="form-control <?php echo (!empty($data['selling_price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['selling_price'];?>">
                        <span class="text-danger"><?php echo $data['selling_price_err'];?></span>
                      </div>
                      <label class="pt-4">Description</label>
                      <div>

                        <textarea name="description" class="form-control <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description'];?></textarea>
                        <span class="text-danger"><?php echo $data['description_err'];?></span>
                      </div>
                      <label class="pt-4">Product Category</label>
                      <div>
                        <select class="form-select" aria-label="Default select example" name="category">
                        <?php foreach($data['categories'] as $categories): ?>
                          <option value="<?php echo $categories->id; ?>"><?php echo $categories->name; ?></option>
                        <?php endforeach ;?>
      
                      </select></div>
                  

                <div class="row ms-1">
                <button class="col-2 mt-4 btn btn-success" type="submit">Update</button>
                </div>
                
            </div>
            </div>
            </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>