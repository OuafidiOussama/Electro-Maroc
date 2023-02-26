<?php
    class Admin{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getUser(){
            $this->db->query('SELECT * FROM client');
            
            $res = $this->db->resultSet();

            return $res;
        }
        public function getOrderLim(){
            $this->db->query('SELECT * FROM `order` INNER JOIN client ON `order`.client_id = client.id LIMIT 4');
            
            $res = $this->db->resultSet();

            return $res;
        }
        public function getOrder(){
            $this->db->query('SELECT `order`.*, client.full_name FROM `order` INNER JOIN client ON `order`.client_id = client.id ORDER BY (creation_date) DESC');
            
            
            $res = $this->db->resultSet();

            return $res;
        }
        public function getOrderById($id){
            $this->db->query('SELECT orderholder.*, client.full_name, product.reference, product.label, `order`.grand_total FROM orderholder 
            INNER JOIN `order` ON orderholder.order_id = `order`.id
            INNER JOIN product ON orderholder.product_id = product.id
            INNER JOIN client ON `order`.client_id = client.id
            WHERE `order_id` = :id');
            $this->db->bind(':id', $id);
            
            $row = $this->db->single();
            if($row){
                return $row;
            }else {
                return false;
            }
        }

        public function confirmOrder($data){
            $this->db->query("UPDATE `order` 
                              SET sending_date =  :sending,
                                  delevery_date = :delevery,
                                  status = :status
                              WHERE id = :id");
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':sending', $data['sending']);
            $this->db->bind(':delevery', $data['delevery']);
            $this->db->bind(':status', $data['status']);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function denyOrder($data){
            $this->db->query("UPDATE `order` 
                              SET sending_date =  :sending,
                                  status = :status
                              WHERE id = :id");
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':sending', $data['sending']);
            $this->db->bind(':status', $data['status']);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //Find User by email
        public function findAdminByEmail($email){
            $this->db->query('SELECT * FROM `admin` WHERE email = :email');
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
        public function login($email,$password){
            $this->db->query('SELECT * FROM `admin` WHERE email = :email AND password = :pwd');
            $this->db->bind(':email', $email);
            $this->db->bind(':pwd', $password);

            $row = $this->db->single();
            
            if($this->db->rowCount()){
                return $row;
            }else{
                return false;
            }
        }

    
    }