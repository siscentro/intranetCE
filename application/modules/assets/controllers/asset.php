<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset extends CI_Controller {

	public function images() 
	{
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
	public function css() 
	{
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
	public function js() 
	{
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
}