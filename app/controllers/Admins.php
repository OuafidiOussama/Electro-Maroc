<?php
    class Admins extends Controller{
        public function __construct(){
            $this->adminModel = $this->model('Admin');
            $this->categoryModel = $this->model('Category');
            $this->productModel = $this->model('Product');
        }

        public function dash(){
            $products = $this->productModel->sortDescLim();
            $p_total = $this->productModel->getProduct();
            $c_total = $this->categoryModel->getCategory();
            $u_total = $this->adminModel->getUser();
            $o_total = $this->adminModel->getOrder();
            $order = $this->adminModel->getOrderLim();

            $data = [
                'product' => $products,
                'p_total' => $p_total,
                'c_total' => $c_total,
                'u_total' => $u_total,
                'o_total' => $o_total,
                'order' => $order
            ];
            // print_r($data['order']);
            // exit;

            $this->view('admins/dashboard', $data);
        }
        public function user(){
            $users = $this->adminModel->getUser();

            $data = [
                'users' => $users,
            ];

            $this->view('admins/user', $data);
        }
        public function order(){
            $orders = $this->adminModel->getOrder();

            $data = [
                'orders' => $orders,
            ];

            $this->view('admins/order', $data);
        }
        public function product(){
            $products = $this->productModel->getProduct();
            $data = [
                'product' => $products,
            ];

            $this->view('admins/product', $data);
        }
        public function category(){
            $categories = $this->categoryModel->getCategory();
            $data = [
                'category' => $categories,
            ];

            $this->view('admins/category',$data);
        }


        public function detail($id){
            $orderId = $this->adminModel->getOrderById($id);

            $data = [
                'order' => $orderId->full_name,
                'label' => $orderId->label,
                'unite' => $orderId->unite_price,
                'qty' => $orderId->qty,
                'sub' => $orderId->total_price,
                'reference' => $orderId->reference,
                'grand' => $orderId->grand_total,
            ];
            $this->view('admins/detail', $data);
        }

        public function login(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process from
                //Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    //Init data
                    $data = [
                        'email' => trim($_POST['email']),
                        'password' => trim($_POST['password']),
                        'email_err' =>'' ,
                        'password_err' => '',
                    ];
                //validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }
                
                //validate Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }


                //check for email
                if($this->adminModel->findAdminByEmail($data['email'])){
                    //user found

                }else{
                    //user not found
                    $data['email_err'] = 'No Admin Found' ;
                }

                //make sure erros are empty 
                if(empty($data['email_err']) && empty($data['password_err'])){
                    //Validated 
                    //check and set loged in user
                    $logedInAdmin = $this->adminModel->login($data['email'],$data['password']);

                    if($logedInAdmin){
                        //create session variables
                        $this->createAdminSession($logedInAdmin);
                    }else{
                        $data['password_err'] = 'Password Incorrect';

                        $this->view('auths/admin_login', $data);
                    }
                }else {
                    //load view with errors
                    $this->view('auths/admin_login', $data);
                }
                    
            }else{
                //Initialize data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                //Load view
                $this->view('auths/admin_login', $data);
            }
        }


        public function confirmOrder($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'id' => $id,
                    'sending' => date('d-m-y'),
                    'delevery' => date($_POST['delevery']),
                    'status' => 'Confirmed'
                ];
                if($this->adminModel->confirmOrder($data)){
                    redirect('admins/order');
                } else{
                    die('Something Went Wrong');

                }
            }
        }
        public function denyOrder($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'id' => $id,
                    'sending' => date('d-m-y'),
                    'status' => 'Denied'
                ];
                if($this->adminModel->denyOrder($data)){
                    redirect('admins/order');
                } else{
                    die('Something Went Wrong');

                }
            }
        }





        public function createAdminSession($admin){
            $_SESSION['admin_id']= $admin->id;
            $_SESSION['admin_email'] = $admin->email;
            redirect('admins/dash');
        }

        public function logout(){
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_email']);
            session_destroy();
            redirect('');

        }
    }