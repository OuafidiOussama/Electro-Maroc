<?php   
    class Categories extends Controller{
        public function __construct(){
            $this->categoryModel = $this->model('Category');

            if(!isAdminLogedIn()){
                redirect('auths/login');
            }
        }



        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //sanitize the post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //having the IMG
                $img = $_FILES['picture']['tmp_name'];
                $img_name = $_FILES['picture']['name'];
                move_uploaded_file($img, 'category/' . $img_name);
                

                $data = [
                     'name' => trim($_POST['name']),
                     'description' => trim($_POST['description']),
                     'picture' => trim($img_name),
                     'name_err' => '',
                     'description_err' => '',
                     'picture_err' => ''
                    ];

                    //Validate product
                    if(empty($data['name'])){
                        $data['name_err'] = 'Please enter the category name';
                    }

                    //Validate price
                    if(empty($data['description'])){
                        $data['description_err'] = 'Please enter the category Description';
                    }

                    //Validate image
                    if(empty($data['picture'])){
                        $data['picture_err'] = 'Please upload the category image';
                    }

                    //make sure no errors
                    if(empty($data['name_err']) && empty($data['description_err']) && empty($data['picture_err'])){
                        if($this->categoryModel->addCategory($data)){
                            redirect('admins/category');
                        } else{
                            die('Something Went Wrong');

                        }
                    }else{
                        //load view
                        $this->view('categories/add',$data);
                    }
            }else{
                $data = [
                     'name' => '',
                     'description' => '',
                     'picture' => '',
                     'name_err' => '',
                     'description_err' => '',
                     'picture_err' => ''
                    ];

            $this->view('categories/add', $data);
            }
            
        }


        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){


                $categoryId = $this->categoryModel->getCategoryById($id);
                $image_tmp = $_FILES['picture']['tmp_name'];
                $image_name = $_FILES['picture']['name'];
                move_uploaded_file($image_tmp, 'category/' . $image_name);

                if (!empty($_FILES['picture']['name'])) {
                    // update data
                    $data = [
                        'id' => $categoryId->id,
                        'picture' => trim($image_name),
                        'name' => trim($_POST['name']),
                        'description' => trim($_POST['description']),
                        'name_err' => '',
                        'description_err' => '',
                        'picture_err' => ''
                    ];
                } else {
                    // update data
                    $data = [
                        'id' => $categoryId->id,
                        'picture' => $categoryId->picture,
                        'name' => trim($_POST['name']),
                        'description' => trim($_POST['description']),
                        'name_err' => '',
                        'description_err' => '',
                        'picture_err' => ''
                    ];
                }

                //Validate product
                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter the category name';
                }

                //Validate price
                if(empty($data['description'])){
                    $data['description_err'] = 'Please enter the category Description';
                }

                //Validate image
                if(empty($data['picture'])){
                    $data['picture_err'] = 'Please upload the category image';
                }

                 //make sure no errors
                 if(empty($data['name_err']) && empty($data['description_err']) && empty($data['picture_err'])){
                    if($this->categoryModel->edit($data)){
                        redirect('admins/category');
                    } else{
                        die('Something Went Wrong');

                    }
                }else{
                    //load view
                    $this->view('categories/edit',$data);
                }

                
            }else {

                $categoryId = $this->categoryModel->getCategoryById($id);

                // init data
                $data = [
                    'id' => $categoryId->id,
                    'picture' => $categoryId->picture,
                    'name' => $categoryId->name,
                    'description' => $categoryId->description,
                    'name_err' => '',
                    'description_err' => '',
                    'picture_err' => ''
                    
                ];

                // load view
                $this->view('categories/edit', $data);
            }
        }

        public function delete($id) {
            if ($this->categoryModel->delete($id)) {
                redirect('admins/category');
            } else {
                die('ops something went wrong');
            }
        }
        
    }