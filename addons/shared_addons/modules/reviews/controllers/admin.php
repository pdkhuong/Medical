<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 * @author  PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Blog\Controllers
 */
class Admin extends Admin_Controller
{
	/** @var string The current active section */
	protected $section = 'reviews';

	/** @var array The validation rules */
	protected $validation_rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|htmlspecialchars|required|max_length[200]'
		),
    'email' => array(
      'field' => 'email',
      'label' => 'Email',
      'rules' => 'required|max_length[60]|valid_email'
    ),
    'phone' => array(
      'field' => 'phone',
      'label' => 'Phone',
      'rules' => 'required|trim|max_length[12]'
    ),
    array(
      'field' => 'status',
      'label' => 'Status',
      'rules' => 'trim|alpha'
    ),
		array(
			'field' => 'body',
			'label' => 'Body',
      'rules' => 'trim|htmlspecialchars|required'
		),

	);

	/**
	 * Every time this controller controller is called should:
	 * - load the blog and blog_categories models
	 * - load the keywords and form validation libraries
	 * - set the hours, minutes and categories template variables.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('reviews_m'));
    $this->load->library('form_validation');
		$this->load->library(array('keywords/keywords', 'form_validation'));
    $this->load->library('files/files');

	}

	/**
	 * Show all created blog posts
	 */
	public function index()
	{
		//set the base/default where clause
		$base_where = array();

		// Create pagination links
		$total_rows = $this->reviews_m->count_by($base_where);
		$pagination = create_pagination('admin/reviews/index', $total_rows);

		// Using this data, get the relevant results
		$reviews = $this->reviews_m
			->limit($pagination['limit'], $pagination['offset'])
			->get_many_by($base_where);

		//do we need to unset the layout because the request is ajax?
		$this->input->is_ajax_request() and $this->template->set_layout(false);

		$this->template
			->title($this->module_details['name'])
			->set('pagination', $pagination)
			->set('reviews', $reviews);

		$this->input->is_ajax_request()
			? $this->template->build('admin/tables/posts')
			: $this->template->build('admin/index');

	}

	/**
	 * Create new post
	 */
	public function create()
	{
		$post = new stdClass();
    $post->type = 'wysiwyg-advanced';
    if($_POST){
      $this->form_validation->set_rules($this->validation_rules);
      if ($this->form_validation->run()) {

        $data = array(
          'name'            => $this->input->post('name'),
          'email'             => $this->input->post('email'),
          'phone'         => $this->input->post('phone'),
          'body'             => $this->input->post('body'),
          'status'           => $this->input->post('status'),
          'created'		   => date('Y-m-d H:i:s', time()),
          'created_by'        => $this->current_user->id,
          'type'             => $this->input->post('type')
        );

        if($id=$this->reviews_m->insert($data)){
          // Fire an event. A new keyword has been added.
          Events::trigger('keyword_created', $id);
          $this->session->set_flashdata('success', sprintf("Create %s success", $data['name']));
        }
        else
        {
          $this->session->set_flashdata('error', sprintf("Cannot create %s", $data['name']));
        }
        redirect('admin/reviews');
      }else{
          // Go through all the known fields and get the post values
          foreach ($this->validation_rules as $key => $field)
          {
            $post->$field['field'] = set_value($field['field']);
          }

          // if it's a fresh new article lets show them the advanced editor
          $post->type or $post->type = 'wysiwyg-advanced';
      }
    }
    $this->template
      ->title($this->module_details['name'], lang('blog:add_title'))
      ->set('post', $post)
      ->append_metadata($this->load->view('fragments/wysiwyg', array(), true))
      ->append_js('jquery/jquery.tagsinput.js')
      ->append_js('module::blog_form.js')
      ->append_js('module::blog_category_form.js')
      ->append_css('jquery/jquery.tagsinput.css')
      ->build('admin/form');
	}
 
	/**
	 * Edit blog post
	 *
	 * @param int $id The ID of the blog post to edit
	 */
	public function edit($id = 0)
	{
		$id or redirect('admin/reviews');

		$post = $this->reviews_m->get($id);
    if($_POST){
      $this->form_validation->set_rules($this->validation_rules);
      if ($this->form_validation->run()) {

        $data = array(
          'name'            => $this->input->post('name'),
          'email'             => $this->input->post('email'),
          'phone'         => $this->input->post('phone'),
          'body'             => $this->input->post('body'),
          'status'           => $this->input->post('status'),
          'updated'		   => date('Y-m-d H:i:s', time()),
          'created_by'        => $this->current_user->id,
          'type'             => $this->input->post('type')
        );

        if($id=$this->reviews_m->update($id, $data)){
          // Fire an event. A new keyword has been added.
          Events::trigger('keyword_created', $id);
          $this->session->set_flashdata('success', sprintf("Create %s success", $data['name']));
        }
        else
        {
          $this->session->set_flashdata('error', sprintf("Cannot create %s", $data['name']));
        }
        redirect('admin/reviews');
      }else{
        // Go through all the known fields and get the post values
        foreach ($this->validation_rules as $key => $field)
        {
          $post->$field['field'] = set_value($field['field']);
        }

        // if it's a fresh new article lets show them the advanced editor
        $post->type or $post->type = 'wysiwyg-advanced';
      }
    }
    $this->template
      ->title($this->module_details['name'], lang('blog:add_title'))
      ->set('post', $post)
      ->append_metadata($this->load->view('fragments/wysiwyg', array(), true))
      ->append_js('jquery/jquery.tagsinput.js')
      ->append_js('module::blog_form.js')
      ->append_js('module::blog_category_form.js')
      ->append_css('jquery/jquery.tagsinput.css')
      ->build('admin/form');
	}

	/**
	 * Helper method to determine what to do with selected items from form post
	 */
	public function action()
	{
		switch ($this->input->post('btnAction'))
		{
			case 'publish':
				$this->publish();
				break;

			case 'delete':
				$this->delete();
				break;

			default:
				redirect('admin/reviews');
				break;
		}
	}

	/**
	 * Publish blog post
	 *
	 * @param int $id the ID of the blog post to make public
	 */
	public function publish($id = 0)
	{
		role_or_die('reviews', 'put_live');

		// Publish one
		$ids = ($id) ? array($id) : $this->input->post('action_to');

		if ( ! empty($ids))
		{
			// Go through the array of slugs to publish
			$post_titles = array();
			foreach ($ids as $id)
			{
				// Get the current page so we can grab the id too
				if ($post = $this->reviews_m->get($id))
				{
					$this->reviews_m->publish($id);
					// Wipe cache for this model, the content has changed
					$this->pyrocache->delete('reviews_m');
					$post_titles[] = $post->name;
				}
			}
		}

		// Some posts have been published
		if ( ! empty($post_titles))
		{
			// Only publishing one post
			if (count($post_titles) == 1)
			{
				$this->session->set_flashdata('success', sprintf("Reviews '%s' publish success", $post_titles[0]));
			}
			// Publishing multiple posts
			else
			{
				$this->session->set_flashdata('success', sprintf("Reviews '%s' publish success", implode('", "', $post_titles)));
			}
		}
		// For some reason, none of them were published
		else
		{
			$this->session->set_flashdata('notice', "Reviews publish error");
		}

		redirect('admin/reviews');
	}

	/**
	 * Delete blog post
	 *
	 * @param int $id The ID of the blog post to delete
	 */
	public function delete($id = 0)
	{
		$this->load->model('comments/comment_m');

		role_or_die('blog', 'delete_live');

		// Delete one
		$ids = ($id) ? array($id) : $this->input->post('action_to');

		// Go through the array of slugs to delete
		if ( ! empty($ids))
		{
			$post_titles = array();
			$deleted_ids = array();
			foreach ($ids as $id)
			{
				// Get the current page so we can grab the id too
				if ($post = $this->reviews_m->get($id))
				{
					if ($this->reviews_m->delete($id))
					{
						// Wipe cache for this model, the content has changed
						$this->pyrocache->delete('reviews_m');
						$post_titles[] = $post->title;
						$deleted_ids[] = $id;
					}
				}
			}

			// Fire an event. We've deleted one or more blog posts.
			Events::trigger('post_deleted', $deleted_ids);
		}

		// Some pages have been deleted
		if ( ! empty($post_titles))
		{
			// Only deleting one page
			if (count($post_titles) == 1)
			{
				$this->session->set_flashdata('success', sprintf("Delete %s success", $post_titles[0]));
			}
			// Deleting multiple pages
			else
			{
				$this->session->set_flashdata('success', sprintf("Delete %s success", implode('", "', $post_titles)));
			}
		}
		// For some reason, none of them were deleted
		else
		{
			$this->session->set_flashdata('notice', "Delete '%s' error");
		}

		redirect('admin/reviews');
	}
}
