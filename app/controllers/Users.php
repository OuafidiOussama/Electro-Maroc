<?php
    class Users extends Controller{
        private $userModel;
        public function __construct(){

            $this->userModel = $this->model('User');
        }

        public function about(){
            $data = [
                
            ];

            $this->view('pages/about', $data);
        }
        public function blog(){
            $data = [
                
            ];

            $this->view('pages/blog', $data);
        }
        public function cart(){
            $data = [
                
            ];

            $this->view('pages/cart', $data);
        }
        public function contact(){
            $data = [
                
            ];

            $this->view('pages/contactus', $data);
        }
        public function index(){
            $data = [
                
            ];

            $this->view('pages/index', $data);
        }
        public function product(){
            $data = [
                
            ];

            $this->view('pages/product', $data);
        }

        public function shop(){
            $data = [
                
            ];
            $this->view('pages/shop', $data);
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
                if($this->userModel->findUserByEmail($data['email'])){
                    //user found

                }else{
                    //user not found
                    $data['email_err'] = 'No User Found' ;
                }

                //make sure erros are empty 
                if(empty($data['email_err']) && empty($data['password_err'])){
                    //Validated 
                    //check and set loged in user
                    $logedInUser = $this->userModel->login($data['email'],$data['password']);

                    if($logedInUser){
                        //create session variables
                        $this->createUserSession($logedInUser);
                    }else{
                        $data['password_err'] = 'Password Incorrect';

                        $this->view('users/login', $data);
                    }
                }else {
                    //load view with errors
                    $this->view('users/login', $data);
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
                $this->view('users/login', $data);
            }
        }

        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $data = [
                    'full_name' => trim($_POST['full_name']),
                    'phone' => trim($_POST['phone']),
                    'address' => trim($_POST['address']),
                    'city' => trim($_POST['city']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'full_name_err' => '',
                    'phone_err' => '',
                    'address_err' => '',
                    'city_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                if(empty($data['full_name'])){
                    $data['full_name_err'] = 'Enter your Full Name';
                }
                if(empty($data['phone'])){
                    $data['phone_err'] = 'Enter your phone Number';
                }
                if(empty($data['address'])){
                    $data['address_err'] = 'Enter your Address';
                }
                if(empty($data['city'])){
                    $data['city_err'] = 'Enter your City';
                }
                if(empty($data['email'])){
                    $data['email_err'] = 'Enter your Email';
                } else {
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email Already Existing';
                    }
                }
                if(empty($data['password'])){
                    $data['password_err'] = 'Enter your Password';
                }
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Confirm your Password';
                } else {
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Password Do Not Match';
                    }
                }

                if(empty($data['full_name_err']) && empty($data['phone_err']) && empty($data['address_err']) && empty($data['city_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->userModel->register($data)){
                        redirect('users/login');
                    } else {
                        die('something went Wrong !!');
                    }
                } else {
                    $this->view('users/register', $data);
                }
            } else {
                $data = [
                    'full_name' => '',
                    'phone' => '',
                    'address' => '',
                    'city' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'full_name_err' => '',
                    'phone_err' => '',
                    'address_err' => '',
                    'city_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
                $this->view('users/register', $data);
            }
        }

        public function createUserSession($user){
            $_SESSION['full_name'] = $user->full_name;
            $_SESSION['user_id']= $user->id;
            $_SESSION['user_email'] = $user->email;
            redirect('');
        }

        public function logout(){
            unset($_SESSION['full_name']);
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            session_destroy();
            redirect('');

        }

        public function addToCart($id){
            if(!isUserLogedIn()){
                redirect('users/login');
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //sanitize the post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                //having the IMG
                
                $total = floatval(str_replace('$', '', $_POST['price'])) * $_POST['qty'];
                $data = [
                     'label' => trim($_POST['label']), 
                     'price' => trim($_POST['price']), 
                     'reference' => trim($_POST['reference']),
                     'total' => $total,
                     'qty' => trim($_POST['qty']), 
                     'client_id' => $_SESSION['user_id'],
                     'product_id' => $id,
                    ];

                    if($this->userModel->addToCart($data)){
                        redirect('pages/shop');
                    } else{
                        die('Something Went Wrong');

                    }
            }else{
                $data = [
                    'label' => '', 
                    'price' => '', 
                    'reference' => '',
                    'total' => '',
                    'qty' => '', 
                    'client_id' => '',
                    'product_id' => '',
                    ];

            $this->view('pages/product', $data);
            }
        }

        public function deleteFromCart($id) {
            if ($this->userModel->deleteFromCart($id)) {
                redirect('pages/cart');
            } else {
                die('ops something went wrong');
            }
        }

        public function sendOrder() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $products = $_POST['id'];
                $quantity = $_POST['qty'];
                $unite = $_POST['u_pr'];
                $tot = $_POST['t_pr'];
                // echo '<pre>';
                // print_r($products);
                // print_r($quantity);
                // echo '</pre>';
                // exit;
                // $total = $this->commandeModel->totalPrice();
                $data = [
                    'id_client' => $_SESSION['user_id'],
                    'creation_date' => date('d-m-y'),
                    'grand' => $_POST['grand'],
                    'unite' => $unite,
                    'tot' => $tot,
                ];
                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;
                $idCommande = $this->userModel->createCommande($data);
                
                if ($idCommande) {
                    for ($i = 0; $i < count($products); $i++) {
                        $data = [
                            'id_product' => $products[$i],
                            'id_commande' => $idCommande,
                            'quantite' => $quantity[$i],
                            'unite' => $unite[$i],
                            'tot' => $tot[$i]
                        ];
                        $this->userModel->addProductCommande($data);
                    }
                    if ($this->userModel->finishCommande()) {
                        $this->userModel->clearPanier();
                        redirect('Pages/cart');
                    } else {
                        die('SOMETHING WRONG ???');
                    }
                }
            }
        }
    }