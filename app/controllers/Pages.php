<?php
    class Pages extends Controller{
        public function __construct(){
            $this->categoryModel = $this->model('Category');
            $this->productModel = $this->model('Product');
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
            $grandTotal = 0;
            $cartProducts = $this->userModel->getCartProducts();
            for($i = 0; $i < count($cartProducts); $i++){
                $grandTotal += $cartProducts[$i]->total_price;
            }
            $data = [
                'cProduct' => $cartProducts,
                'grand' => $grandTotal,
            ];
            
            $this->view('pages/cart', $data);
        }
        public function contact(){

            $data = [
                
            ];

            $this->view('pages/contactus', $data);
        }
        public function index(){
            $categories = $this->categoryModel->getCategory();
            $products = $this->productModel->sortDesc();
            $data = [
                'category' => $categories,
                'product' => $products,
            ];

            $this->view('pages/index', $data);
        }
        public function product($id){
            $productId =$this->productModel->getProductById($id);

            $data = [
                'id' => $productId->id,
                'label' => $productId->label,
                'selling_price' => $productId->selling_price,
                'description' => $productId->description,
                'category' => $productId->name,
                'reference' => $productId->reference
            ];

            $this->view('pages/product', $data);
        }

        public function shop(){
            $categories = $this->categoryModel->getCategory();
            $products = $this->productModel->getProduct();

            // $totalPages = $this->productModel->pagination($i);

            $data = [
                'category' => $categories,
                'product' => $products,
                
                // 'pages' => $totalPages
            ];
            $this->view('pages/shop', $data);
        }
        
        public function selectByCat($idCat = NULL) {
            $categories = $this->categoryModel->getCategory();
            $filterProducts = $this->productModel->filterProduct($idCat);
            $data = [
                'category' => $categories,
                'product' => $filterProducts
            ];
            $this->view('pages/shop', $data);
        }

        public function sortDesc(){
            $sorted = $this->productModel->sortDesc();
            $data = [
                'product' => $sorted
            ];

            $this->view('pages/shop', $data);
        }

    }