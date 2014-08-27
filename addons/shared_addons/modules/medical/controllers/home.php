<?php

  defined('BASEPATH') OR exit('No direct script access allowed');
  class Home extends Public_Controller {

    public function __construct() {
      
      $this->load->model('fe_blog_m');
      parent::__construct();
    }

    function index() {
      $data = array();
      /*$blogs = $this->fe_blog_m->get_all_by("category_id=".BLOG_CATEGORY_TOP, 0, 15);
      $data['block_blog'] = $this->load->view("blocks/home/recent_news", array('data'=>$blogs), true);
      $data['block_why_choose'] = $this->load->view("blocks/home/why_choose", array(), true);
      $data['block_traveller_say'] = $this->load->view("blocks/home/traveller_say", array(), true);
      $data['block_visit'] = $this->load->view("blocks/home/visit", array(), true);
      $data['block_how_to_works'] = $this->load->view("blocks/home/how_to_works", array(), true);
      $data['block_did_you_know'] = $this->load->view("blocks/home/did_you_know", array(), true);
      $data['block_relation'] = $this->load->view("blocks/home/relation", array(), true);*/
      $this->template->build('home/index', $data);
    
    }
    public function test(){
      $this->pyrocache->delete_all('page_m');
      $this->pyrocache->delete_all('page_type_m');
      $this->pyrocache->delete_all('navigation_m');
      $this->pyrocache->delete_all('simplepie');
      $this->pyrocache->delete_all('streams_m');
      $this->pyrocache->delete_all('theme_m');
      $this->pyrocache->delete_all('image_files');
      echo "deleted!";
    }

  }
  