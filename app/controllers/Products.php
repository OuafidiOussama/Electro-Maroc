<?php
    class Products extends Controller{
        public function __construct(){
            $this->productModel = $this->model('Product');
            $this->categoryModel = $this->model('Category');
            $this->userModel = $this->model('User');

            if(!isAdminLogedIn()){
                redirect('auths/login');
            }
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //sanitize the post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //having the IMG
                $img = $_FILES['reference']['tmp_name'];
                $img_name = $_FILES['reference']['name'];
                move_uploaded_file($img, 'product/' . $img_name);
                
                $categories = $this->categoryModel->getCategory();
                
                $data = [
                     'label' => trim($_POST['label']),
                     'retail_price' => trim($_POST['retail_price']),
                     'final_price' => trim($_POST['final_price']),
                     'selling_price' => trim($_POST['selling_price']),
                     'description' => trim($_POST['description']),
                     'category' => trim($_POST['category']),
                     'reference' => trim($img_name),
                     'label_err' => '',
                     'retail_price_err' => '',
                     'final_price_err' => '',
                     'selling_price_err' => '',
                     'description_err' => '',
                     'reference_err' => '',
                     'categories' => $categories
                    ];
                    // echo '<pre>';
                    // print_r($_POST);
                    // echo '</pre>';
                    // echo '<pre>';
                    // print_r($data);
                    // echo '</pre>';
                    // exit;

                    //Validate product
                    if(empty($data['label'])){
                        $data['label_err'] = 'Please enter the product name';
                    }
                    if(empty($data['retail_price'])){
                        $data['retail_price_err'] = 'Please enter the product retail price';
                    }
                    if(empty($data['final_price'])){
                        $data['final_price_err'] = 'Please enter the product final price';
                    }
                    if(empty($data['selling_price'])){
                        $data['selling_price_err'] = 'Please enter the product selling price';
                    }

                    //Validate price
                    if(empty($data['description'])){
                        $data['description_err'] = 'Please enter the product Description';
                    }
                    

                    //Validate image
                    if(empty($data['reference'])){
                        $data['reference_err'] = 'Please upload the product image';
                    }

                    //make sure no errors
                    if(empty($data['label_err']) && empty($data['retail_price_err']) && empty($data['final_price_err']) && empty($data['selling_price_err']) && empty($data['description_err']) && empty($data['category_err']) && empty($data['reference_err'])){
                        if($this->productModel->addProduct($data)){
                            redirect('admins/product');
                        } else{
                            die('Something Went Wrong');

                        }
                    }else{
                        //load view
                        $this->view('products/add',$data);
                    }
            }else{
                $categories = $this->categoryModel->getCategory();
                $data = [
                    'label' => '',
                    'retail_price' => '',
                    'final_price' => '',
                    'selling_price' => '',
                    'description' => '',
                    'category' => '',
                    'reference' => '',
                    'label_err' => '',
                    'retail_price_err' => '',
                    'final_price_err' => '',
                    'selling_price_err' => '',
                    'description_err' => '',
                    'reference_err' => '',
                    'categories' => $categories
                    ];

            $this->view('products/add', $data);
            }
            
        }


        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){


                $productId = $this->productModel->getProductById($id);
                $categories = $this->categoryModel->getCategory();


                $img = $_FILES['reference']['tmp_name'];
                $img_name = $_FILES['reference']['name'];
                move_uploaded_file($img, 'product/' . $img_name);

                if (!empty($_FILES['reference']['name'])) {
                    // update data
                    

                    $data = [
                        'id' => $productId->id,
                        'reference' => trim($img_name),
                        'label' => trim($_POST['label']),
                        'retail_price' => trim($_POST['retail_price']),
                        'final_price' => trim($_POST['final_price']),
                        'selling_price' => trim($_POST['selling_price']),
                        'description' => trim($_POST['description']),
                        'category' => trim($_POST['category']),
                        'reference_err' => '',
                        'label_err' => '',
                        'retail_price_err' => '',
                        'final_price_err' => '',
                        'selling_price_err' => '',
                        'description_err' => '',
                        'categories' => $categories
                    ];
                } else {
                    // update data
                    $data = [
                        'id' => $productId->id,
                        'reference' => $productId->reference,
                        'label' => trim($_POST['label']),
                        'retail_price' => trim($_POST['retail_price']),
                        'final_price' => trim($_POST['final_price']),
                        'selling_price' => trim($_POST['selling_price']),
                        'description' => trim($_POST['description']),
                        'category' => trim($_POST['category']),
                        'reference_err' => '',
                        'label_err' => '',
                        'retail_price_err' => '',
                        'final_price_err' => '',
                        'selling_price_err' => '',
                        'description_err' => '',
                        'categories' => $categories
                    ];
                }

                //Validate product
                if(empty($data['reference'])){
                    $data['reference_err'] = 'Please enter the product image';
                }

                //Validate price
                if(empty($data['label'])){
                    $data['label_err'] = 'Please enter the product name';
                }

                //Validate image
                if(empty($data['retail_price'])){
                    $data['retail_price_err'] = 'Please upload the retail price';
                }
                if(empty($data['final_price'])){
                    $data['final_price_err'] = 'Please upload the final price';
                }
                if(empty($data['selling_price'])){
                    $data['selling_price_err'] = 'Please upload the selling price';
                }
                if(empty($data['description'])){
                    $data['description_err'] = 'Please upload the product description';
                }
                if(empty($data['category'])){
                    $data['category_err'] = 'Please upload the category of the product';
                }

                 //make sure no errors
                 if(empty($data['label_err']) && empty($data['retail_price_err']) && empty($data['final_price_err']) && empty($data['selling_price_err']) && empty($data['description_err']) && empty($data['category_err']) && empty($data['reference_err'])){
                    if($this->productModel->edit($data)){
                        redirect('admins/product');
                    } else{
                        die('Something Went Wrong');

                    }
                }else{
                    //load view
                    $this->view('products/edit',$data);
                }

                
            }else {

                $productId = $this->productModel->getProductById($id);
                $categories = $this->categoryModel->getCategory();

                // init data
                $data = [
                    'id' => $productId->id,
                    'reference' => $productId->reference,
                    'label' => $productId->label,
                    'retail_price' => $productId->retail_price,
                    'final_price' => $productId->final_price,
                    'selling_price' => $productId->selling_price,
                    'description' => $productId->description,
                    'category' => $productId->category,
                    'reference_err' => '',
                    'label_err' => '',
                    'retail_price_err' => '',
                    'final_price_err' => '',
                    'selling_price_err' => '',
                    'description_err' => '',
                    'categories' => $categories
                ];

                // load view
                $this->view('products/edit', $data);
            }
        }

        public function delete($id) {
            if ($this->productModel->delete($id)) {
                redirect('admins/product');
            } else {
                die('ops something went wrong');
            }
        }

        
    }