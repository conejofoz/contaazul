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
}