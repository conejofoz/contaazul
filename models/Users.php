<?php
class Users extends Model{
    private $userInfo;
    private $permissions;






    public function isLogged(){
        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
            return true;
        } else {
            return false;
        }
    }
    
    
    
    public function doLogin($email, $password){
        $sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password=:password");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', md5($password));
        $sql->execute(); 
        if($sql->rowCount() > 0){
            $row = $sql->fetch();
            $_SESSION['ccUser'] = $row['id'];
            return true;
        } else {
            return false;
        }
    }
    
    
    
    public function setLoggedUser(){
        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
            $id = $_SESSION['ccUser'];
            $sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                $this->userInfo = $sql->fetch();
                $this->permissions = new Permissions();
                $this->permissions->setGroup($this->userInfo['id_group'], $this->userInfo['id_company']);
            }
        }
    }
    
    
    public function logout(){
        unset($_SESSION['ccUser']);
    }
    
    
    public function hasPermission($name){
        return $this->permissions->hasPermission($name);
    }

    

    public function getCompany(){
        if(isset($this->userInfo['id_company'])){
            return $this->userInfo['id_company'];
        } else {
            return 0;
        }
        
    }
    
    
    
    public function getEmail(){
        if(isset($this->userInfo['email'])){
            return $this->userInfo['email'];
        } else {
            return '';
        }
    }
    
    
    
    public function findUsersInGroup($id){
        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE id_group = :group");
        $sql->bindValue(":group", $id);
        $sql->execute();
        $row = $sql->fetch();
        if($row['c'] == '0'){
            return false;
        } else {
            return true;
        }
    }
    
    
    public function getList($id_company){
        $array = array();
        $sql = $this->db->prepare("SELECT users.id, users.email, permission_groups.name "
                . "FROM users "
                . "LEFT JOIN permission_groups ON permission_groups.id = users.id_group "
                . "WHERE users.id_company = :id_company");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute(); 
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    
}