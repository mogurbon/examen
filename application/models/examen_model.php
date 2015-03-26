<?php
 class Examen_model extends CI_Model {
 
 function Examen_model() {
 	parent::__construct(); //llamada al constructor de Model.
	$this->load->database();
 }
 
function get_images() {
	 $images = $this->db->get('imagenes'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
	 return $images->result(); //devolvemos el resultado de lanzar la query.
	 }
function save_image($imagen) {
	 $this->db->set('imagen', $imagen);
	
	 $this->db->insert('imagenes');
 }
 
}
?>
