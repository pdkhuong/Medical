<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  if (!function_exists('file_partial')) {

    function theme_partial($file = '', $ext = 'php') {
      $CI = & get_instance();
      $data = & $CI->load->_ci_cached_vars;

      $path = $data['template_views'] . 'partials/' . $file;

      echo $CI->load->_ci_load(array(
        '_ci_path' => $data['template_views'] . 'partials/' . $file . '.' . $ext,
        '_ci_return' => true
      ));
    }

  }
  if (!function_exists('css')) {

    function css($file = '') {
      $filePath = STATIC_PATH.'/css/'.$file . '.css';
      return "<link href='" . $filePath . "' rel='stylesheet' type='text/css'>";
    }

  }
  if (!function_exists('js')) {

    function js($file = '') {
      $filePath = STATIC_PATH.'/js/'.$file . '.js';
      return "<script type='text/javascript' src='" . $filePath . "'></script>";
    }

  }
  if (!function_exists('file_path')) {

    function file_path($file = '') {
      $filePath = STATIC_PATH.'/'.$file;
      return $filePath;
    }

  }
  function getBlogLink($created_on, $slug) {
    return site_url('blog/' . date('Y/m', $created_on) . '/' . $slug);
  }

  function getImageThumb($imageId, $width = null, $height = null) {
    return base_url('files/thumb/' . $imageId . '/' . $width . '/' . $height);
  }
function frontendPaging($uri='', $totalRow=10, $perPage=10, $segment=3){

  $ci = & get_instance();
  $ci->load->library('pagination');
  $current_page = $ci->uri->segment($segment);

  $config['base_url'] = site_url($uri);
  $config['total_rows'] = $totalRow;
  $config['per_page'] = $perPage;
  $config['use_page_numbers']		= true;
  //$config['reuse_query_string'] 	= true;

  $config['anchor_class'] = 'inactive';
  $config['num_tag_open'] = '';
  $config['num_tag_close'] = '';


  $config['last_link'] = 'Last';
  $config['last_tag_open'] = '';
  $config['last_tag_close'] = '';

  $config['first_link'] = 'First';
  $config['first_tag_open'] = '';
  $config['first_tag_close'] = '';

  $config['next_link'] = '»';
  $config['next_tag_open'] = '';
  $config['next_tag_close'] = '';

  $config['prev_link'] = '«';
  $config['prev_tag_open'] = '';
  $config['prev_tag_close'] = '';

  $config['cur_tag_open'] = '<a class="current">';
  $config['cur_tag_close'] = '</a>';


  $ci->pagination->initialize($config);


  $offset = $perPage * ($current_page - 1);

  //avoid having a negative offset
  if ($offset < 0) $offset = 0;

  return array(
    'current_page' => $current_page,
    'per_page' => $perPage,
    'limit' => $perPage,
    'offset' => $offset,
    'links' => $ci->pagination->create_links()
  );
}
  