<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Dashboard extends Fuel_base_controller {

	public function __construct()
	{
		parent::__construct();
		$this->js_controller = 'fuel.controller.DashboardController';
	}

	public function index()
	{
		if (is_ajax())
		{
			$this->ajax();
		}
		else
		{
			$this->fuel->load_model('fuel_users');
			$auth_user = $this->fuel->auth->user_data();
			$user = $this->fuel_users_model->find_by_key($auth_user['id'], 'array');
			$vars['change_pwd'] = ($user['password'] == $this->fuel_users_model->salted_password_hash($this->config->item('default_pwd', 'fuel'), $user['salt']));

			$dashboards = $this->fuel->admin->dashboards();
			$vars['dashboards'] = $dashboards;
			$crumbs = array('' => 'Dashboard');
			$this->fuel->admin->set_titlebar($crumbs, 'ico_dashboard');
			$this->fuel->admin->render('dashboard', $vars, Fuel_admin::DISPLAY_NO_ACTION);
		}

	}

	/* need to be outside of index so when you click back button it will not show the ajax */
	public function ajax()
	{
		if (is_ajax())
		{
			$this->load->module_model(FUEL_FOLDER, 'fuel_pages_model');
			$this->load->module_model(FUEL_FOLDER, 'fuel_logs_model');
			$vars['recently_modifed_pages'] = $this->fuel_pages_model->find_all_array(array(), 'last_modified desc', 10);
			$vars['latest_activity'] = $this->fuel_logs_model->latest_activity(10);
			$this->load->view('dashboard_ajax', $vars);
		}
	}

	public function recent()
	{
		$recent = $this->session->userdata('recent');
		if (!empty($recent[0]))
		{
			$redirect_to = $recent[0]['link'];
		}
		else
		{
			$redirect_to = $this->config->item('fuel_path', 'fuel').'dashboard';
		}
		redirect($redirect_to);
	}


}