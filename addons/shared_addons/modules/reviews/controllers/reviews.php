<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Reviews extends Public_Controller {

  public function __construct() {
    $this->load->model('reviews/reviews_m');
    parent::__construct();
  }

  function index() {
    $itemPerPage = Settings::get('records_per_page');
    $base_where = "`status`='live'";
    $total_rows = $this->reviews_m->count_by($base_where);
    $pagination = frontendPaging('reviews/page', $total_rows, $itemPerPage, 3);

    $reviews = $this->reviews_m
      ->limit($pagination['limit'], $pagination['offset'])
      ->get_many_by($base_where);


    $this->template
      ->title($this->module_details['name'])
      ->set_breadcrumb("Reviews")
      ->set_metadata('og:title', $this->module_details['name'], 'og')
      ->set_metadata('og:type', 'reviews', 'og')
      ->set_metadata('og:url', current_url(), 'og')
      ->set_metadata('og:description', "Reviews", 'og')
      ->set_metadata('description', "Reviews")
      ->set_metadata('keywords', "reviews")
      ->set('pagination', $pagination)
      ->set("reviews", $reviews)
      ->build('index');

  }
  function view($id){

  }
}
  