<?php

require_once(__DIR__.'/../models/adminModel.php');
require_once(__DIR__.'/../../core/View.php');


class AdminController {
    function __construct()
    {
        $this->model = new adminModel();
    }

    public function index(){
        $view = new View("admin/index");
        
    }
}




    ?>