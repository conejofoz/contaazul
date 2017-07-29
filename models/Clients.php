<?php

class Clients extends Model{
    public function getList($offset, $id_company){
        $array = array();
        $sql = $this->db->prepare("SELECT * FROM clients ");
        $sql->bindValue(":offset", $offset);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    
    public function add($id_company, $name, $email, $phone, $stars, $internal_obs, $address_zipcode, $address, $address_number, $address2, $address_city, $address_state, $address_country){
        $sql = $this->db->prepare("INSERT INTO clients ("
                . "id_company, "
                . "name, "
                . "email, "
                . "stars, "
                . "internal_obs, "
                . "address_zipcode, "
                . "address, "
                . "address_number, "
                . "address2, "
                . "address_city, "
                . "address_state, "
                . "address_country) "
                . "VALUES (:id_company, "
                . ":name, "
                . ":email, "
                . ":stars, "
                . ":internal_obs, "
                . ":address_zipcode, "
                . ":address, "
                . ":address_number, "
                . ":address2, "
                . ":address_city, "
                . ":address_state, "
                . ":address_country) ");
        $sql->bindValue(":id_company", $id_company);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":stars", $stars);
        $sql->bindValue(":internal_obs", $internal_obs);
        $sql->bindValue(":address_zipcode", $address_zipcode);
        $sql->bindValue(":address", $address);
        $sql->bindValue(":address_number", $address_number);
        $sql->bindValue(":address2", $address2);
        $sql->bindValue(":address_city", $address_city);
        $sql->bindValue(":address_state", $address_state);
        $sql->bindValue(":address_country", $address_country);
        $sql->execute();
                
    }
}