<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * THIS SOFTWARE AND DOCUMENTATION IS PROVIDED "AS IS," AND COPYRIGHT
 * HOLDERS MAKE NO REPRESENTATIONS OR WARRANTIES, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY OR
 * FITNESS FOR ANY PARTICULAR PURPOSE OR THAT THE USE OF THE SOFTWARE
 * OR DOCUMENTATION WILL NOT INFRINGE ANY THIRD PARTY PATENTS,
 * COPYRIGHTS, TRADEMARKS OR OTHER RIGHTS.COPYRIGHT HOLDERS WILL NOT
 * BE LIABLE FOR ANY DIRECT, INDIRECT, SPECIAL OR CONSEQUENTIAL
 * DAMAGES ARISING OUT OF ANY USE OF THE SOFTWARE OR DOCUMENTATION.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://gnu.org/licenses/>.
 */

/**
 *	Extend CI's Profiler class adding support for displaying more profile data blocks.
 *
 *	@author		gotphp.com
 *	@version	1.0.0
 *	@date		2010-09-01
 */
class MY_Profiler extends CI_Profiler{
  // --------------------------------------------------------------------

  /**
   * 	Compile $this->_ci_cached_vars Data (This is the data that is passed
   * 	to the view template.)
   *
   * 	@access	private
   *	@param	string		The type of variables to compile.
   * 	@return	string
   */
  function _compile_variables($type = 'tpl_vars'){
    if ($type === 'session_userdata') {

            $title 	= 'Session Userdata';
            $data 	= $this->CI->session->userdata;
            $color	= '#660033';

    } elseif ($type === 'get_vars') {

            $title 	= 'Get Vars';
            $data 	= $_GET;
            $color	= '#cd6e00';

    } elseif ($type === 'post_vars') {

            $title 	= 'Post Vars';
            $data 	= $_POST;
            $color	= '#009900';

    } elseif ($type === 'cookie_vars') {

            $title 	= 'Cookie Vars';
            $data 	= $_COOKIE;
            $color	= '#009900';

    } elseif ($type === 'uri_vars') {

            $title 	= 'URI Vars';
            $data 	= $this->CI->uri->ruri_to_assoc();
            $color	= '#009900';

    } else {

            $title 	= 'Loaded Template Vars';
            $data 	= $this->CI->load->_ci_cached_vars;
            $color	= '#24006B';

    }

    if (count($data) == 0) {
            return '';
    }

    $output  = "\n\n";
    $output .= '<fieldset style="border:1px solid '.$color.';padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee">';
    $output .= "\n";
    $output .= '<legend style="color:'.$color.';">&nbsp;&nbsp;'.strtoupper($title).'&nbsp;&nbsp;</legend>';
    $output .= "\n";

    if (count($data) == 0)
    {
            $output .= "<div style='color:".$color.";font-weight:normal;padding:4px 0 4px 0'>No ".ucwords($title).".</div>";
    }
    else
    {
            $output .= "\n\n<table cellpadding='4' cellspacing='1' border='0' width='100%'>\n";

            foreach ($data as $key => $val)
            {

                    $output .= "<tr>";
                    $output .= "<td width='45%' style='color:".$color.";background-color:#ddd;'>";
                    $output .= "<b>&#36;".$key."</b>&nbsp;&nbsp;";
                    $output .= "</td>";

                    $output .= "<td width='5%' style='color:#666;background-color:#ddd;'>";
                    $output .= gettype($val);
                    $output .= "</td>";


                    $output .= "<td width='50%' style='color:".$color.";font-weight:normal;background-color:#ddd;'>";

                    switch(true)
                    {
                            case is_array($val) OR is_object($val):
                                    $output .= "<div style='border : padding : 4px; width : 600px; height : 100px; overflow : auto; '><pre>" . htmlspecialchars(stripslashes(print_r($val, true))) . "</pre></div>";
                            break;

                            case is_bool($val):
                                    $output .= ($val) ? "<i style='color:#666'>true</i>": "<i style='color:#666'>false</i>" ;
                            break;

                            case $val === "":
                                    $output .= "<i style='color:#666'>empty</i>" ;
                            break;

                            default:
                                    $output .= htmlspecialchars(stripslashes($val));
                            break;

                    }

                    $output .= "</td>";
                    $output .= "</tr>\n";
            }

            $output .= "</table>\n";
    }
    $output .= "</fieldset>";

    return $output;
  }

  // --------------------------------------------------------------------

  /**
   * Compile Multiple Database Queries
   * @return	string
   */
  function _compile_multi_db_queries($database, $model){

    $output  = "\n\n";
    $output .= '<fieldset style="border:1px solid #0000FF;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee">';
    $output .= "\n";

    if ( ! class_exists('CI_DB_driver'))
    {
            $output .= '<legend style="color:#0000FF;">&nbsp;&nbsp;'.strtoupper($database).'&nbsp;('.$model.')&nbsp;</legend>';
            $output .= "\n";
            $output .= "\n\n<table cellpadding='4' cellspacing='1' border='0' width='100%'>\n";
            $output .="<tr><td width='100%' style='color:#0000FF;font-weight:normal;background-color:#eee;'>".$this->CI->lang->line('profiler_no_db')."</td></tr>\n";
    }
    else
    {
            $output .= '<legend style="color:#0000FF;">&nbsp;&nbsp;'.strtoupper($database).'&nbsp;DATABASE&nbsp;('.$model.')&nbsp;('.count($this->CI->$model->$database->queries).')&nbsp;&nbsp;</legend>';
            $output .= "\n";
            $output .= "\n\n<table cellpadding='4' cellspacing='1' border='0' width='100%'>\n";

            if (count($this->CI->$model->$database->queries) == 0)
            {
                    $output .= "<tr><td width='100%' style='color:#0000FF;font-weight:normal;background-color:#eee;'>".$this->CI->lang->line('profiler_no_queries')."</td></tr>\n";
            }
            else
            {
                    $highlight = array('SELECT', 'FROM', 'WHERE', 'AND', 'LEFT JOIN', 'ORDER BY', 'LIMIT', 'INSERT', 'INTO', 'VALUES', 'UPDATE', 'OR', 'OFFSET');

                    foreach ($this->CI->$model->$database->queries as $key => $val)
                    {
                            $val = htmlspecialchars($val, ENT_QUOTES);
                            $time = number_format($this->CI->$model->$database->query_times[$key], 4);

                            foreach ($highlight as $bold)
                            {
                                    $val = str_replace($bold, '<strong style="color: blue">'.$bold.'</strong>', $val);
                            }

                            $output .= "<tr><td width='1%' valign='top' style='color:#990000;font-weight:normal;background-color:#ddd;'>".$time."&nbsp;&nbsp;</td><td style='color:#000;font-weight:normal;background-color:#ddd;'>".$val."</td></tr>\n";
                    }
            }

    }

    $output .= "</table>\n";
    $output .= "</fieldset>";
    return $output;
  }

  // --------------------------------------------------------------------

  /**
   * Run the Profiler
   *
   * @access	private
   * @return	string
   */
  function run()
  {
          $output = "<div id='codeigniter_profiler' style='clear:both;background-color:#fff;padding:10px;'>";

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
                  /*
                  foreach($autoload['model'] as $model) {

                          // Define the database object name
                          $database = $this->CI->$model->get_database_group();

                          // Compile the output
                          $output .= $this->_compile_multi_db_queries($database, $model);

                  }*/
                  $modelos = array('centrales/As535_model');
                  foreach($modelos as $model) {

                          // Define the database object name
                          $database = $this->CI->$model->get_database_group();

                          // Compile the output
                          $output .= $this->_compile_multi_db_queries($database, $model);

                  }


          } else {

                  $output .= $this->_compile_queries();

          }

          $output .= '</div>';

          return $output;
  }

  // --------------------------------------------------------------------

}

/* End of file MY_Profiler.php */
/* Location: ./apps/main/libraries/MY_Profiler.php */