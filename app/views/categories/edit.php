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


          

          <form action="<?php echo URLROOT .'/categories/edit/' . $data['id']; ?>" method="POST" id="form" enctype="multipart/form-data">
            <div class="products">
              <div class="recent-orders">
                <div class="card-header">
                  <h2>Categories</h2>
                </div>

                      <label>Category Image</label>
                      <div>
                        <input type="file" name="picture" class="form-control <?php echo (!empty($data['picture_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['picture']; ?>">
                        <span class="text-danger"><?php echo $data['picture_err'];?></span>
                      </div>
                      <label class="pt-4">Category Name</label>
                      <div>
                        <input type="text" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name'];?>">
                        <span class="text-danger"><?php echo $data['name_err'];?></span>
                      </div>
                      <label class="pt-4">Category Description</label>
                      <div>
                        <textarea name="description" class="form-control <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description'];?></textarea>
                        <span class="text-danger"><?php echo $data['description_err'];?></span>
                      </div>
                  

                <div class="row ms-1">
                <button class="col-2 mt-4 btn btn-success" type="submit">Update</button>
                </div>
                
            </div>
            </div>
            </form>
          </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>