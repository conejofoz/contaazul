<?php

class salesController extends controller {

    public function __construct() {
        parent::__construct();

        $u = new Users();
        if ($u->isLogged() == false) {
            header("Location: " . BASE_URL . "/login");
            exit;
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();
        $data['statuses'] = array(
            '0'=>'Aguardando Pgto.',
            '1'=>'Pago',
            '2'=>'Cancelado'
        );

        if ($u->hasPermission('sales_view')) {
            $s = new Sales();
            $offset = 0;

            $data['sales_list'] = $s->getList($offset, $u->getCompany());
            
            $data['sales_edit'] = $u->hasPermission('sales_edit');

            $this->loadTemplate("sales", $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();
        

        if ($u->hasPermission('sales_view')) {
            $s = new sales();
            
            if(isset($_POST['client_id']) && !empty($_POST['client_id'])){
                $client_id = addslashes($_POST['client_id']);
                $status = addslashes($_POST['status']);
                $quant = $_POST['quant']; //recebimento dos produtos
                
                
                //$total_price = addslashes($_POST['total_price']);
               // $total_price = str_replace('.', '', $total_price);
                //$total_price = str_replace(',', '.', $total_price);
                
                $s->addSale($u->getCompany(), $client_id, $u->getId(), $quant, $status); //qaunt são os produtos
                header("Location: " . BASE_URL."/sales");
            }



            $this->loadTemplate("sales_add", $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

}
