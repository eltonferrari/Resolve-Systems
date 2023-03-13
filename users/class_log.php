<?php 
    require_once ("../connections/DBController.php");
    class Log {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }
        
        function addLogUser($iduser, $descricao) {
            $query = "INSERT INTO log_users (iduser, descricao) VALUES (?, ?)";
            $paramType = "is";
            $paramValue = array($iduser, $descricao);
            
            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertId;
        }
        
        function deleteLogUser($idLogUser, $active) {
            $query = "UPDATE users 
                        SET idloguser = ?,
                            active = ? 
                        WHERE idloguser = $idLogUser";
            $paramType = "ii";
            $paramValue = array($idLogUser, $active);
            
            $this->db_handle->update($query, $paramType, $paramValue);
        }
        
        function getLogUserByIdUser($idUser) {
            $query = "SELECT * FROM log_users WHERE iduser = ?";
            $paramType = "i";
            $paramValue = array($idUser);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }
        
        /*
        function getAllLogUserForCreate() {
            $sql = "SELECT * FROM log_users ORDER BY created_at";
            $result = $this->db_handle->runBaseQuery($sql);
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
        */
    }
?>