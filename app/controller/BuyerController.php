<?php

require_once(__DIR__.'/../models/item.php');
require_once(__DIR__.'/../../core/View.php');


class BuyerController {
    function __construct()
    {
        $this->model = new item();
    }

    function getAll_get(){
        $result = $this->model->get_all();
        print_r($result);
        
    }
    public function index(){
        $view = new View("buyer/index");
        $result = $this->model->joinget();
        $class="org_active";
        $view->assign('data', $result);
        $view->assign('class', $class); 
        
        
    }
    public function organic(){
        $view = new View("buyer/index");
        $result = $this->model->joingetOrganic();
        $class="org_active";
        $view->assign('data', $result); 
        $view->assign('class', $class); 
        
        
    }

    public function itemLoad(){
        $view = new View("buyer/item_non_org");
        
    }
    public function book(){
        $view = new View("buyer/booksuccess");
        
    }

    public function selectDriver( ){
        $view = new View("buyer/selectDriver");
        $view->assign('data', []); 
        
    }
}


?>