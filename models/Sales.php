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
    
    
    public function addSale($id_company, $id_client, $id_user, $quant, $status){
        $i = new Inventory();
        
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
        //$sql->bindvalue(":total_price",$total_price);
        $sql->bindvalue(":total_price",'0');
        $sql->bindvalue(":status",$status);
        $sql->execute();
        
        $id_sale = $this->db->lastInsertId();
        
        $total_price = 0;
        foreach ($quant as $id_prod => $quant_prod){
            $sql = $this->db->prepare("SELECT price FROM inventory WHERE id = :id AND id_company = :id_company");
            $sql->bindValue(":id", $id_prod);
            $sql->bindValue(":id_company", $id_company);
            $sql->execute();
            if($sql->rowCount() > 0){
                $row = $sql->fetch();
                $price = $row['price'];
                
                $sqlp = $this->db->prepare("INSERT INTO sales_products("
                        . "id_company, "
                        . "id_sale, "
                        . "id_product, "
                        . "quant, "
                        . "sale_price) "
                        . "VALUES("
                        . ":id_company, "
                        . ":id_sale, "
                        . ":id_product, "
                        . ":quant, "
                        . ":sale_price)");
                $sqlp->bindValue(":id_company", $id_company);
                $sqlp->bindValue(":id_sale", $id_sale);
                $sqlp->bindValue(":id_product", $id_prod);
                $sqlp->bindValue(":quant", $quant_prod);
                $sqlp->bindValue(":sale_price", $price);
                //var_dump($sqlp);
               // exit();
                $sqlp->execute();
                
                $i->decrease($id_prod, $id_company, $quant_prod, $id_user);
                
                $total_price += $price + $quant_prod;
            }
        }
        
        $sql = $this->db->prepare("UPDATE sales SET total_price = :total_price WHERE id = :id");
        $sql->bindValue(":total_price", $total_price);
        $sql->bindValue(":id", $id_sale);
        $sql->execute();
    }
    
    


}