<?php
    class Category{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getCategory(){
            $this->db->query('SELECT * FROM `category`');

            $res = $this->db->resultSet();

            return $res;
        }

        public function getCategoryById($id){
            $this->db->query("SELECT * FROM category WHERE id = :id");
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($row){
                return $row;
            }else {
                return false;
            }
        }

        public function addCategory($data){
            $sql = 'INSERT INTO `category` (`picture`, `name`, `description`) VALUES (:picture, :name, :description)';
            $this->db->query($sql);
            $this->db->bind(':picture', $data['picture']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        public function edit($data){
            $this->db->query("UPDATE `category` SET `picture`= :picture, `name`= :name ,`description`= :description WHERE id = :id");
            $this->db->bind(':picture', $data['picture']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':id', $data['id']);
            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function delete($id){
            $this->db->query("DELETE FROM category WHERE id = :id");
            $this->db->bind(':id', $id);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }


