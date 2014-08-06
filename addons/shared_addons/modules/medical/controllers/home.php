<?php

  defined('BASEPATH') OR exit('No direct script access allowed');
  class Home extends Public_Controller {

    public function __construct() {
      
      parent::__construct();
    }

    function index() {
      $data = array();
      $this->template->build('index', $data);
    }
    public function test(){
      echo "test";
    }

  }
  