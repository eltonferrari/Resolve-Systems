<?php 
    require_once ("../connections/DBController.php");
    class User {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }
        
        function addUser($email, $password) {
            $query = "INSERT INTO users (email, password) VALUES (?, ?)";
            $paramType = "ss";
            $paramValue = array($email, $password);
            
            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertId;
        }
        
        function editUser($idUser, $name, $email, $password, $image, $type, $active, $updated_at) {
            $query = "UPDATE users 
                        SET idUser = ?,
                            name = ?, 
                            email = ?,
                            password = ?, 
                            image = ?, 
                            type = ?, 
                            active = ?,
                            updated_at = ? 
                        WHERE idUser = $idUser";
            $paramType = "issssiis";
            $paramValue = array($idUser, $name, $email, $password, $image, $type, $active, $updated_at);
            
            $this->db_handle->update($query, $paramType, $paramValue);
        }
        
        function deleteUser($idUser) {
            $query = "DELETE FROM users WHERE id = ?";
            $paramType = "i";
            $paramValue = array($idUser);
            $this->db_handle->update($query, $paramType, $paramValue);
        }
        
        function getUserById($idUser) {
            $query = "SELECT * FROM users WHERE iduser = ?";
            $paramType = "i";
            $paramValue = array($idUser);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }
        
        function getUserByEmail($email) {
            $query = "SELECT * FROM users WHERE email = ?";
            $paramType = "s";
            $paramValue = array($email);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }
        
        function getUserByName($name) {
            $query = "SELECT * FROM users WHERE name LIKE ?";
            $paramType = "s";
            $paramValue = array($name);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }
        
        function getAllUsers() {
            $sql = "SELECT * FROM users ORDER BY name";
            $result = $this->db_handle->runBaseQuery($sql);
            return $result;
        }
    }
?>