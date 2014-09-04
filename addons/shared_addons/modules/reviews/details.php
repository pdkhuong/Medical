<?php

  defined('BASEPATH') or exit('No direct script access allowed');

  class Module_Reviews extends Module {

    public $version = '1.0.0';

    public function info() {
      $info = array(
        'name' => array(
          'en' => 'Reviews'
        ),
        'description' => array(
          'en' => 'Reviews module.'
        ),
        'frontend' => true,
        'backend' => true,
        'skip_xss' => true,
        'menu' => 'content',

        'sections' => array(
          'reviews' => array(
            'name' => 'Reviews',
            'uri' => 'admin/reviews',
            'shortcuts' => array(
              array(
                'name' => 'global:add',
                'uri' => 'admin/reviews/create',
                'class' => 'add',
              ),
            ),
          ),
        ),
      );
      return $info;
    }

    public function install() {
      return true;
    }

    public function uninstall() {
      return false;
    }

    public function upgrade($old_version) {
      return true;
    }

    public function help() {
      // Return a string containing help info  
      // You could include a file and return it here.  
      return "No Help";
    }

  }
  