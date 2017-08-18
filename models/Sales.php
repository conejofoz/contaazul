<?php
class Sales extends Model{
    
    public function getList($offset, $id_company){
        $array = array();
        $sql = $this->db->prepare("SELECT "
                . "sales.id, "
                . "sales.date_sale, "
                . "sales.total_price, "
                . "sales.status, "
                . "clients.name "
                . "FROM sales "
                . "LEFT JOIN clients ON clients.id = sales.id_client "
                . "WHERE "
                . "sales.id_company = :id_company ORDER BY sales.date_sale DESC "
                . "LIMIT $offset, 10");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    
    public function addSale($id_company, $id_client, $id_user, $total_price, $status){
        $agora = date('Y-m-d');
        $sql = $this->db->prepare("INSERT INTO sales("
                . "id_company, "
                . "id_client, "
                . "id_user, "
                . "date_sale, "
                . "total_price, "
                . "status) "
                . "VALUES("
                . ":id_company, "
                . ":id_client, "
                . ":id_user, "
                . ":date_sale, "
                . ":total_price, "
                . ":status)");
        $sql->bindvalue(":id_company",$id_company);
        $sql->bindvalue(":id_client",$id_client);
        $sql->bindvalue(":id_user",$id_user);
        $sql->bindvalue(":date_sale", $agora);
        $sql->bindvalue(":total_price",$total_price);
        $sql->bindvalue(":status",$status);
        $sql->execute();
    }
    
    


}