<?php defined('BASEPATH') or exit('No direct script access allowed');
class Fe_blog_m extends MY_Model
{
	protected $_table = 'blog';

	public function get_all_by($where='1', $offset=0, $limit=15)
	{
    if(empty($where)){
      $where = '1';
    }
		$this->db
			->select('blog.*, blog_categories.title AS category_title, blog_categories.slug AS category_slug')
			->select('users.username, profiles.display_name')
			->join('blog_categories', 'blog.category_id = blog_categories.id', 'left')
			->join('profiles', 'profiles.user_id = blog.author_id', 'left')
			->join('users', 'blog.author_id = users.id', 'left')
      //->join('files', 'blog.image = files.id', 'left')
      ->where($where)
      ->limit($limit, $offset)
			->order_by('created_on', 'DESC');

		return $this->db->get('blog')->result();
	}
}