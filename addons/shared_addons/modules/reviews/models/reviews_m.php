<?php

  defined('BASEPATH') or exit('No direct script access allowed');

  class Reviews_m extends MY_Model {

    protected $_table = 'reviews';

    public function get_all_by($where = '', $offset = 0, $limit = 15) {

      $this->db
        ->select('reviews.*')
        ->limit($limit, $offset)
        ->order_by('created', 'DESC');
      if (!empty($where)) {
        $this->db->where($where);
      }
      return $this->db->get('reviews')->result();
    }
    public function publish($id = 0)
    {
      return parent::update($id, array('status' => 'live'));
    }

  }
  