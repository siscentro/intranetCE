<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct(){
		parent::__construct();
                if(!$this->tank_auth->is_logged_in()){
                  redirect('auth/login');
                }
	}
	
	//--------------------------------------------------------------------

	function index(){
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
	public function blue(){
		Template::set_theme('blue');
	        Template::render();
	}
	
	//--------------------------------------------------------------------
	
	public function blocks() 
	{
		// Sets an override for block_two
		Template::set_block('block_two', 'blocks/block_2');
		
		// Data for Block Three
		$block_data = array(
			'one'	=> 'First',
			'two'	=> 'Second',
			'three'	=> 'Third'
		);
		Template::set('block_data', $block_data);
	
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
	public function messages() 
	{
		Template::set_message('Congratulations! Messages are working.', 'success');
		
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
	public function themers() 
	{
		Template::add_theme_path('more_themes');
		Template::set_theme('red');
		
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
	public function breadcrumbs() 
	{
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */