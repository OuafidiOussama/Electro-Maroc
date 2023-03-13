<?php
    class User{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        //Find User by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM `client` WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //check row
            if($this->db->rowCount() > 0){
                return $row;
            } else{
                return false;
            }
        }  

        //login user
        public function login($email, $password){
            $this->db->query('SELECT * FROM `client` WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();
            
            $hashed = $row->password;
            if(password_verify($password, $hashed)){
                return $row;
            }else{
                return false;
            }
        }
        
        public function register($data){
            $this->db->query('INSERT INTO client (full_name, mobile, address, city, email, password) VALUES (:full_name, :phone, :address, :city, :email, :password)');
            $this->db->bind(':full_name' , $data['full_name']);
            $this->db->bind(':phone' , $data['phone']);
            $this->db->bind(':address' , $data['address']);
            $this->db->bind(':city' , $data['city']);
            $this->db->bind(':email' , $data['email']);
            $this->db->bind(':password' , $data['password']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getCartProducts(){
            $id = $_SESSION['user_id'];
            $this->db->query('SELECT * FROM cart WHERE client_id = :id');
            $this->db->bind(':id', $id);

            $res = $this->db->resultSet();

            return $res;
        }

        public function addToCart($data){
            $this->db->query('INSERT INTO cart (product_name, product_price, product_image, total_price, quantity, client_id, product_id) VALUES (:label, :price, :reference, :total, :qty, :client_id, :product_id)');
            $this->db->bind(':label' , $data['label']);
            $this->db->bind(':price' , $data['price']);
            $this->db->bind(':reference' , $data['reference']);
            $this->db->bind(':total' , $data['total']);
            $this->db->bind(':qty' , $data['qty']);
            $this->db->bind(':client_id' , $data['client_id']);
            $this->db->bind(':product_id' , $data['product_id']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteFromCart($id){
            $this->db->query("DELETE FROM cart WHERE id = :id");
            $this->db->bind(':id', $id);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        

        public function createCommande($data) {
            $this->db->beginTransaction();
            $this->db->query("INSERT INTO `order`(`creation_date`, `client_id`, `grand_total`) VALUES (:date, :id_c, :grand)");
            $this->db->bind(':id_c', $data['id_client']);
            $this->db->bind(':date', $data['creation_date']);
            $this->db->bind(':grand', $data['grand']);
            $this->db->execute();
            return $this->db->lastInserId();
        }

        public function addProductCommande($data) {
            $this->db->query("INSERT INTO orderholder(product_id, order_id, qty, unite_price, total_price) VALUES (:id_p, :id_c, :quantite, :unite, :tot)");
            $this->db->bind(':id_p', $data['id_product']);
            $this->db->bind(':id_c', $data['id_commande']);
            $this->db->bind(':quantite', $data['quantite']);
            $this->db->bind(':unite', $data['unite']);
            $this->db->bind(':tot', $data['tot']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function finishCommande() {
            return $this->db->commit();
        }

        public function clearPanier() {
            $this->db->query("DELETE FROM cart");
            $this->db->execute();
        }
    
        public function checkCart($id) {
            $this->db->query("SELECT * FROM cart WHERE product_id = :id");
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if ($this->db->rowCount() > 0) {
                return $row;
            } else {
                return false;
            }
        }
        public function update($data) {
            $this->db->query("UPDATE cart SET quantity= :qty, total_price = :total WHERE product_id = :id");
            $this->db->bind(':id', $data['product_id']);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':total', $data['total']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function updateCart($data) {
            $this->db->query("UPDATE cart SET quantity= :qty, total_price = :total WHERE id= :id");
            $this->db->bind(':id', $data['product_id']);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':total', $data['total']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getOrder(){
            $id = $_SESSION['user_id'];
            $this->db->query("SELECT * FROM `order` WHERE client_id = :id");
            $this->db->bind(':id', $id);

            $row = $this->db->resultSet();

            if($row){
                return $row;
            }else{
                return false;
            }
        }
        public function getOrderById($id){
            $this->db->query('SELECT orderholder.*, client.full_name, product.reference, product.label, `order`.grand_total FROM orderholder 
            INNER JOIN `order` ON orderholder.order_id = `order`.id
            INNER JOIN product ON orderholder.product_id = product.id
            INNER JOIN client ON `order`.client_id = client.id
            WHERE orderholder.order_id = :id');
            $this->db->bind(':id', $id);
            
            $row = $this->db->resultSet();
                return $row;
            
        }
        public function getUserAndTotal($id){
            $this->db->query('SELECT (order_id), client.full_name, `order`.grand_total FROM `orderholder` 
            INNER JOIN `order` ON orderholder.order_id = `order`.id 
            INNER JOIN client ON `order`.client_id = client.id
            WHERE orderholder.order_id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            if($row){
                return $row;
            } else {
                return false;
            }
        }
    }