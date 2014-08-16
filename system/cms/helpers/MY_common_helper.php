<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('file_partial'))
{
	function theme_partial($file = '', $ext = 'php')
  {
    $CI = & get_instance();
    $data = & $CI->load->_ci_cached_vars;

    $path = $data['template_views'].'partials/'.$file;

    echo $CI->load->_ci_load(array(
      '_ci_path' => $data['template_views'].'partials/'.$file.'.'.$ext,
      '_ci_return' => true
    ));
  }
}
if ( ! function_exists('css'))
{
	function css($file = '')
  {
    $filePath = base_url().Asset::get_filepath_css($file.'.css');
    return "<link href='".$filePath."' rel='stylesheet' type='text/css'>";
  }
}
if ( ! function_exists('js'))
{
	function js($file = '')
  {
    $filePath = base_url(). Asset::get_filepath_js($file.'.js');
    return "<script type='text/javascript' src=".$filePath."></script>";
  }
}
if ( ! function_exists('img_path'))
{
	function img_path($file = '')
  {
    return base_url().Asset::get_filepath_img($file);
  }
}

if ( ! function_exists('file_path'))
{
	function file_path($file = '')
  {
    //return base_url().Asset::get_filepath($file, 'files');
    return  'https://a0.muscache.com/airbnb/static/London-P1-1.mp4';
  } 
}