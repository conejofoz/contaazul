<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of models
 *
 * @author conejo
 */
class Model {
    
    
       protected $db;


    public function __construct() {
        global $config;
        $this->db = new PDO("mysql:dbname=".$config['dbname'].';host='.$config['host'],$config['dbuser'], $config['dbpass']);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
     
    
}
