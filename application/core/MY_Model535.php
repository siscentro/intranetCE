<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * This is the basic model class.
 *
 * @package - Infrastructure
 * @category - Model
 * @author - Udi Mosayev @ umNet
 * @property CI_DB_active_record $db
 */

class MY_Model535 extends CI_Model{

  // The main table name
  private $_table;
  private $_primaryKey;
  private $db_group_name = 'default';
  public function __construct() {
    parent::__construct();
    $this->{$this->db_group_name} = $this->load->database($this->db_group_name, TRUE);
  }

  /**
   * Setter/Getters for the table prop
   * @param String $table
   */
  public function setTable($tabla) {
	  $this->_table = $tabla;
	  $campos = $this->getCampos($tabla);
	  foreach($campos as $camp){
		  if($camp->primary_key == 1){
			  $this->_primaryKey = $camp->name;
		  }
	  }
  }
  public function getCampos($tabla){
	  return $this->{$this->db_group_name}->field_data($tabla);
  }
  public function getTable() {
          return $this->_table;
  }
  public function getPrimaryKey(){
	  return $this->_primaryKey;
  }

  // Log as Error each time nonexisting method called.
  public function __call($name, $arguments) {
          $args = implode(',',$arguments);
          log_message('error', $name.'('.$args.') Not exists.');
          return FALSE;
  }

  /**
   * Checks if certain field in any row has a certain value.
   * Its used to have a unique data like username, email etc.
   * @param String $field Name of the field in the table to check the data in
   * @param String $value The value to check if exists in that field
   * @return Bool TRUE if this data exists, FALSE if unique
   */
  public function is_duplicate($fieldName, $value) {
          if(empty($fieldName) OR empty($value)) {
                  log_message('error', 'Got some empty param. field: '.$fieldName.' | value: '.$value);
                  exit(0);
          } else {
                  $this->{$this->db_group_name}->select($fieldName);
                  $query = $this->{$this->db_group_name}->get_where($this->getTable(), array($fieldName => $value));
                  if($query->num_rows > 0) {
                          return TRUE;
                  } else {
                          return FALSE;
                  }
          }
          return FALSE;
  }

  /**
   * This method inserts some array of data into the db
   * @param Array $data
   * @return Int Insert ID
   */
  public function add($data, $field_control=FALSE) {
    $data['programa_id']=$this->session->userdata('programa_id');
    if(is_array($data)) {
      if($field_control){
        $duplicado = $this->is_duplicate($field_control,$data[$field_control]);
        if($duplicado){
          $this->update($data,$data[$field_control]);
          return true;
        }else{
          $this->{$this->db_group_name}->insert($this->getTable(), $data);
          return $this->{$this->db_group_name}->insert_id();
        }
      }else{
        $this->{$this->db_group_name}->insert($this->getTable(), $data);
        return $this->{$this->db_group_name}->insert_id();
      }
    } else {
      log_message('error', 'No es una matriz');
      return FALSE;
    }
  }

  /**
   * This method updates fields in my table.
   * @param String $fieldName
   * @param String $value
   * @param Integer $id
   */
  public function update_field($fieldName, $fieldValue, $id) {

          if(empty($fieldName)) {
                  log_message('error', 'nombre de campo vacio: '.$fieldName);
                  return FALSE;
          }
          else if(!is_numeric($id)) {
                  log_message('error', 'No numerico id: '.$id);
                  return FALSE;
          } else {
                  $this->{$this->db_group_name}->where('id', $id);
                  $query = $this->{$this->db_group_name}->update($this->getTable(), array($fieldName => $fieldValue));
          }
  }

  /**
   * Updates whole row [unlike update_field()]
   * @param Array $data
   * @param Integer $id
   */
  public function update($data, $id) {
          if(!is_array($data)) {
                  log_message('error', 'Supposed to get an array!');
                  return FALSE;
          } else if(!is_numeric($id)) {
                  log_message('error', 'Got non-numeric id: '.$id);
                  return FALSE;
          } else {
                  $this->{$this->db_group_name}->where($this->getPrimaryKey(), $id);
                  $this->{$this->db_group_name}->update($this->getTable(), $data);
          }
  }

  /**
   * This method returns all the rows of this model
   * @param Array $where Array of field=>value
   * @param Array $orderby field to order by and side - desc/asc.
   * @return CI_Query_Resource the $query object
   */
  public function get_where($where = array('is_deleted' => 0), $orderBy = null) {
          if($orderBy!=null)
                  $this->{$this->db_group_name}->order_by($orderBy[1], $orderBy[2]);
          $query = $this->{$this->db_group_name}->get_where($this->getTable(), $where);
          return $query;
  }

  /**
   * This method gets 1 row from a table and returns it.
   * @param Integer $id
   * @return DB_Res $query CodeIgniter's db resource
   */
  public function getById($id) {
	  if(!is_numeric($id)) {
			  log_message('error', 'Got not numeric id: '.$id);
			  return FALSE;
	  } else {
		  $this->{$this->db_group_name}->from($this->getTable());
		  $this->{$this->db_group_name}->where($this->getPrimaryKey(), $id);
		  return $this->{$this->db_group_name}->get()->row();
	  }
  }

  /**
   * This method logically deletes a row.
   * @param Integer $id
   * @return Boolean
   */
  public function delete($id) {
          if(is_numeric($id)) {
                  $this->update_field('is_deleted', 1, $id);
                  return TRUE;
          } else {
                  return FALSE;
          }
  }

  public function toDropDown($campoId, $campoNombre){
          $this->{$this->db_group_name}->select($campoId);
          $this->{$this->db_group_name}->select($campoNombre);
          $this->{$this->db_group_name}->from($this->getTable());
          $this->{$this->db_group_name}->order_by($campoNombre);
          $query = $this->{$this->db_group_name}->get();
          $datos = array();
          foreach($query->result() as $item){
                  $datos[$item->{$campoId}] = $item->{$campoNombre};
          }
          return $datos;
  }
  public function toDropDown_avanzado($campoId, $campoNombre, $campoRelacion){
          $this->{$this->db_group_name}->select($campoId);
          $this->{$this->db_group_name}->select($campoNombre);
          $this->{$this->db_group_name}->select($campoRelacion);
          $this->{$this->db_group_name}->from($this->getTable());
          $this->{$this->db_group_name}->order_by($campoRelacion);
          $this->{$this->db_group_name}->order_by($campoNombre);
          $query = $this->{$this->db_group_name}->get();
          $datos = array();
          foreach($query->result() as $item){
                  $datos[$item->{$campoId}][] = $item->{$campoNombre};
                  $datos[$item->{$campoId}][] = $item->{$campoRelacion};
          }
          return $datos;
  }
  public function getAll($orden=FALSE, $limite=false){
    $this->{$this->db_group_name}->from($this->getTable());
    if($orden)
	  $this->{$this->db_group_name}->order_by($orden);
    if($limite){
      $this->{$this->db_group_name}->limit($limite);
    };
	return $this->{$this->db_group_name}->get()->result();
  }
  public function borrar($id){
	  $this->{$this->db_group_name}->where($this->getPrimaryKey(),$id);
	  $this->{$this->db_group_name}->delete($this->getTable());
	  return true;
  }
  public function getConsulta($query){
    $resultado = $this->{$this->db_group_name}->query($query);
    if($resultado->num_rows()>0){
       if($resultado->num_rows==1){
         return $resultado->row();
       }else{
         return $resultado->result();
       };
    }else{
      return false;
    }
  }
 //function para estados
  public function setEstado($id,$estado){
    $this->{$this->db_group_name}->set('estado', $estado);
    $this->{$this->db_group_name}->where('id',$id);
    $this->{$this->db_group_name}->update($this->getTable());
    return true;
  }

}

/* End of file MY_Model.php*/
/* Location: ./application/model/MY_Model.php */

