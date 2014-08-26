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
  