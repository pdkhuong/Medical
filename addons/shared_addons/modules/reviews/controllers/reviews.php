<?php

  defined('BASEPATH') OR exit('No direct script access allowed');
  class Reviews extends Public_Controller {

    public function __construct() {
      
      $this->load->model('fe_blog_m');
      parent::__construct();
    }

    function index() {
      die();
      $data = array();
      $this->template->build('reviews/index', $data);
    
    }


  }
  