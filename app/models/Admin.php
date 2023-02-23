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
            $this->db->query('SELECT * FROM `order` LIMIT 4');
            
            $res = $this->db->resultSet();

            return $res;
        }
        public function getOrder(){
            $this->db->query('SELECT `order`.*, client.full_name FROM `order` INNER JOIN client ON `order`.client_id = client.id');
            
            
            $res = $this->db->resultSet();

            return $res;
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