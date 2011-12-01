<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Profiler
 *
 * @author sistemas
 */
class MY_Profiler extends CI_Profiler {
  /**
   * Run the Profiler
   *
   * @access	private
   * @return	string
   */
  function run(){
    $output = "";
    if ($this->CI->config->item('show_uri_string')) { 		$output .= $this->_compile_uri_string(); }
    if ($this->CI->config->item('show_controller_info')) { 	$output .= $this->_compile_controller_info(); }
    if ($this->CI->config->item('show_memory_usage')) { 	$output .= $this->_compile_memory_usage(); }
    if ($this->CI->config->item('show_benchmarks')) { 		$output .= $this->_compile_benchmarks(); }
    if ($this->CI->config->item('show_cookies')) { 			$output .= $this->_compile_variables('cookie_vars'); }
    if ($this->CI->config->item('show_get_vars')) { 		$output .= $this->_compile_variables('get_vars'); }
    if ($this->CI->config->item('show_post_vars')) { 		$output .= $this->_compile_variables('post_vars'); }
    if ($this->CI->config->item('show_uri_vars')) { 		$output .= $this->_compile_variables('uri_vars'); }
    if ($this->CI->config->item('show_tpl_vars')) { 		$output .= $this->_compile_variables('tpl_vars'); }
    if ($this->CI->config->item('show_session_userdata')) { $output .= $this->_compile_variables('session_userdata'); }
    if ($this->CI->config->item('show_db_multi_queries')) {

      // Include the autoload config to access the array of models in this app.
      include(APPPATH.'config/autoload'.EXT);

      // Loop through each model to set the database object
      foreach($autoload['model'] as $model) {

              // Define the database object name
              $database = $this->CI->$model->get_database_group();

              // Compile the output
              $output .= $this->_compile_multi_db_queries($database, $model);

      }

    } else {

            $output .= $this->_compile_queries();

    }

    $output .= '';

    return $output;
  }

  // --------------------------------------------------------------------

}