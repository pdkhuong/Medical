<?php

  defined('BASEPATH') or exit('No direct script access allowed');

  class Module_Medical extends Module {

    public $version = '1.0.0';

    public function info() {
      $info = array(
        'name' => array(
          'en' => 'Medical'
        ),
        'description' => array(
          'en' => 'Medical project module.'
        ),
        'frontend' => true,
        'backend' => true,
        'skip_xss' => true,
        ///'menu' => 'content',
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
  