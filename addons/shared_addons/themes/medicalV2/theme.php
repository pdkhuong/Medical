<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Theme_MedicalV2 extends Theme {

    public $name = 'Medical Version 1.1.0';
    public $author = 'KhuongPham';
    public $author_website = '';
    public $website = '';
    public $description = 'Midical version 1.1.0';
    public $version = '1.0.0';
    public $options 		= array(
		
		'show_breadcrumbs' 	=> array(
			'title'         => 'Do you want to show breadcrumbs?',
			'description'   => 'If selected it shows a string of breadcrumbs at the top of the page.',
			'default'       => 'yes',
			'type'          => 'radio',
			'options'       => 'yes=Yes|no=No',
			'is_required'   => true
		),
	);
}

/* End of file theme.php */