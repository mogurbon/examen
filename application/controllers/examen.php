<?php
 
class Examen extends CI_Controller {
 
 public function __construct() {
 parent::__construct();
  $this->load->helper('url');
  $this->load->library('upload');
  $this->load->helper('file');
 $this->load->model('examen_model'); //cargamos el modelo
 $this->load->library('session');
 }
 
 function index() {

    $this->load->view('form'); //llamada a la vista, que crearemos posteriormente
 }
 function up_images(){
    $name_array = array();
    $count = count($_FILES['fulp']['size']);
    //echo $count;
    foreach($_FILES as $key=>$value){
        for($s=0; $s<=$count-1; $s++) {
            $_FILES['userfile']['name']=$value['name'][$s];
            $_FILES['userfile']['type']    = $value['type'][$s];
            $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
            $_FILES['userfile']['error']       = $value['error'][$s];
            $_FILES['userfile']['size']    = $value['size'][$s];  
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'gif|jpg|png';
           $config['max_size']	= '5120';
            $config['max_width']  = '800';
            $config['max_height']  = '600';
            
            $this->upload->initialize($config);
            //$pic=$this->upload->do_upload();
            
            if ( ! $this->upload->do_upload())
            {
                     
                        $errores[$_FILES['userfile']['name']] = array('error' => $this->upload->display_errors('',''));
                      
             }
            else
            {
               $data[$_FILES['userfile']['name']] = array('upload_data' => $this->upload->data());
            }
        }
    
     
    }
   
    
  if (isset($errores) and count($errores)>0){
      if (isset($data)){
        $this->borra($data, $config['upload_path']);
      }
  }
  else{
      foreach ($data as $img =>$la){
        //UPLOAD_DIR."\\".$img;
        
        $this->examen_model->save_image(UPLOAD_DIR."\\".$img);//constants
        //echo UPLOAD_DIR.$img."<br>";
       //  $cadena=  read_file("./upload/'.$img);
        //echo $cadena;
    } 
    $imagenes=  $this->examen_model->get_images();
    //$this->session->set_flashdata('success', 'Yep! Upload complete');
    $data["imagenes"]=$imagenes;
    //echo $this->session->set_flashdata('success', 'Yep! Upload complete');
  }
  if (isset($errores)){
    $data['errores']=$errores;
  }
  //$data['formaterror']=$formaterror;
  $this->load->view('resultado',$data); //llamada a la vista, que crearemos posteriormente
}
function borra($data,$upload_path){
    //echo UPLOAD_DIR;
    foreach ($data as $img =>$la){
        unlink(UPLOAD_DIR."\\".$img);
      
    } 
}
}
?>