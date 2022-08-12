<?php

class Fail extends Controller{
    /**
     * summary
     */
    public function __construct(){
    	parent::__construct();
        $this->view->render("/fail/fail");
    }

}

 ?>