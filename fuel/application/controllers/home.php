<?php

  require_once(FUEL_PATH . '/libraries/Fuel_base_controller.php');

  class Home extends Fuel_base_controller {

    public function __construct() {
      parent::__construct();
    }

    public function index($page = 'index') {
      $vars = array('page_title' => 'Contact : My Website');
      $this->fuel->pages->render('home/index', $vars);
    }

  }
  