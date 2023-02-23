<?php
    class Product{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        // public function pagination($i){
            
        //     $productsPerPage=9;
        
        //     $start = ($i-1)*$productsPerPage;
            

        //     $this->db->query('SELECT product.*, category.name FROM product INNER JOIN category ON product.category = category.id ORDER BY (created_at) DESC LIMIT :start,:page');
        //     $this->db->bind(':start', $start);
        //     $this->db->bind(':page', $productsPerPage);

        //     $res = $this->db->resultSet();
        // }

        public function getProduct(){
            $this->db->query('SELECT product.*, category.name FROM product INNER JOIN category ON product.category = category.id ORDER BY (created_at) DESC ');

            $res = $this->db->resultSet();

            return $res;
        }
        public function filterProduct($id){
            $this->db->query('SELECT product.*, category.name FROM product INNER JOIN category ON product.category = category.id WHERE category.id = :id');
            $this->db->bind(':id', $id);
            $res = $this->db->resultSet();

            return $res;
        }

        public function sortDesc(){
            $this->db->query('SELECT * FROM `product` ORDER BY (created_at) DESC LIMIT 8');
            $res = $this->db->resultSet();

            return $res;
        }

        public function sortDescLim(){
            $this->db->query('SELECT * FROM `product` ORDER BY (created_at) DESC LIMIT 4');
            $res = $this->db->resultSet();

            return $res;
        }

        public function getProductById($id) {
            $this->db->query("SELECT product.*, category.name FROM product INNER JOIN category ON product.category = category.id WHERE product.id = :id");
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($row){
                return $row;
            }else {
                return false;
            }
        }

        public function addProduct($data){
            $sql = 'INSERT INTO `product` (`label`, `retail_price`, `final_price`, `selling_price`, `description`, `category`, `reference`) VALUES (:label, :retail_price, :final_price, :selling_price, :description, :category, :reference)';
            $this->db->query($sql);
            $this->db->bind(':label', $data['label']);
            $this->db->bind(':retail_price', $data['retail_price']);
            $this->db->bind(':final_price', $data['final_price']);
            $this->db->bind(':selling_price', $data['selling_price']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':reference', $data['reference']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function edit($data){
            $sql = 'UPDATE `product` SET `label`= :label, `retail_price` = :retail_price, `final_price`= :final_price, `selling_price`= :selling_price, `description`= :description, `category`= :category, `reference`= :reference WHERE id= :id';
            $this->db->query($sql);
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':label', $data['label']);
            $this->db->bind(':retail_price', $data['retail_price']);
            $this->db->bind(':final_price', $data['final_price']);
            $this->db->bind(':selling_price', $data['selling_price']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':reference', $data['reference']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete($id) {
            $this->db->query("DELETE FROM product WHERE id = :id");
            $this->db->bind(':id', $id);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }