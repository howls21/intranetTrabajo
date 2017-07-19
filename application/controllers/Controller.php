<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->load->model("model");
    $this->load->model('BD_asistencia');
}

public function index(){
      
    if($this->session->userdata("connected")){
      $data['user'] = $this->session->userdata("userName");
      $this->load->view('header');
      $this->load->view('system',$data);

    }else{
      $this->load->view('header');
      $this->load->view('login');
    }
}
public function test(){
    date_default_timezone_set('America/Santiago');
    $hora = getdate();
    print_r($hora['hours'].":".$hora['minutes'].":".$hora['seconds']);

  }
/*--------Validar-------------------*/
function conection(){
    $user = $this->input->post("user");
    $password = $this->input->post("password");
    $query = $this->model->conection($user, $password);
    if($query!=FALSE){
      foreach ($query->result() as $row) {
        $userName = $row->nombre_usuario;
        $idUser = $row->id_usuario;
      }
      $datos = array(
       "userName" => $userName,
       "connected" => true,
       "idUser" => $idUser);
    }else{
     $datos = array(
       "user" => "",
       "connected" => false,
       "idUser" => "");
   }
   $this->session->set_userdata($datos);
 }
function validateSession(){
  if($this->session->userdata("connected")){
    $condition = true;
  }else{
    $condition = false;
  }
  $data = array(
    'condition' => $condition
    );
  echo json_encode($data);
}
function loadSystem(){
  if($this->session->userdata("connected")){
   $data['user'] = $this->session->userdata("userName");
   $this->load->view('system',$data);
 }else{
   $this->load->view('header');
   $this->load->view('login');
 }

}
function cookieCheck() {
  $condition=false;
  if ($this->session->userdata("connected")) {
    $condition = true;
  }
  $data = array(
   'condition' => $condition
   );

  echo json_encode($data);
}
function killCookie(){
 $this->session->sess_destroy();
 redirect(base_url());
}
/*-------------insertar-------------*/
function insertar_datos(){

    date_default_timezone_set('UTC');
    $id_tarjeta_= $this->input->get('id');

    $estado = $this->BD_asistencia->marcar_hora($id_tarjeta_);
    echo $estado;
                //recorremos el array con los datos de e
}
function loadFile(){
 $query = $this->model->obraList();
 $data['data'] = $query;
 $this->load->view('upload',$data);
}
function uploadFile(){
 $nombre = strtoupper(str_replace("ñ", "n", $_POST['nombreT']));
 $apellidoP = strtoupper(str_replace("ñ", "n", $_POST['apellidoP']));
 $apellidoM = strtoupper(str_replace("ñ", "n", $_POST['apellidoM']));
 $nombredir = $nombre . $apellidoP . $apellidoM;
 $obra = $_POST['select'];
 $dir = "C:/subidas/obras/$obra/$nombredir/";
 if (!file_exists($dir)) {
   mkdir($dir, 0777, true);
 }
 if ($_FILES['archivo']["error"] > 0)
 {
  echo "Error: " . $_FILES['archivo']['error'] . "<br>";
}
else
{
 $datos = array(
   "Nombre" => $_FILES['archivo']['name'],
   "Tipo" => $_FILES['archivo']['type'],
   "Tamaño" => ($_FILES["archivo"]["size"] / 2048)
   );
 if(!file_exists($dir.$_FILES['archivo']['name'])){
   move_uploaded_file($_FILES['archivo']['tmp_name'], $dir . $_FILES['archivo']['name']);
   print_r("no existen");
 }  else {
   print_r("Existe!");
 }

}

}
function addObra(){
          $query = $this->model->obraList();
          $data['data'] = $query;
          $this->load->view('showAddObra',$data);
}
function saveObra(){
        $obra = strtoupper(str_replace("ñ", "n", $this->input->post("nombreObra")));
        $data = array (
          "nombre_obra" => $obra
          );
        $query = $this->model->searchObra($obra);
        if($query->num_rows() > 0){
          $data = array(
            'message' => "existe"
            );
        }else{
         if($this->model->addObra($data)){
          $data = array (
            'message' => "correcto"
            );
          $dir = "C:/subidas/obras/$obra/vacaciones/";
          if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
          }
          $dir2 = "C:/subidas/obras/$obra/detallepago/";
          if (!file_exists($dir2)) {
            mkdir($dir2, 0777, true);
          }
          $dir3 = "C:/subidas/obras/$obra/finiquitos/";
          if (!file_exists($dir3)) {
            mkdir($dir3, 0777, true);
          }
        }else{
          $data = array (
            'message' => "Error"
            );
        }
      }

      echo json_encode($data);
    }
function uploadObra(){
      if($_POST['month'] !="" || $_POST['year'] !="" || $_POST['obra'] !="" || $_POST['cat'] !=""){
       $month = strtoupper($_POST['month']);
       $year = $_POST['year'];
       $obra = strtoupper($_POST['obra']);
       $cat = strtoupper($_POST['cat']);
       $dir = "C:/subidas/obras/$obra/$cat/$year/";
       if (!file_exists($dir)) {
         mkdir($dir, 0777, true);
       }
       if ($_FILES['archivo']["error"] > 0)
       {
        echo "Error: " . $_FILES['archivo']['error'] . "<br>";
      }
      else
      {

       $temp = explode(".", $_FILES['archivo']['name']);
       $filename = $cat. " ".$month . " ". $year . " " . $obra . "." . end($temp);
       if(!file_exists($dir.$filename)){
        move_uploaded_file($_FILES['archivo']['tmp_name'], $dir . $filename);
        redirect(base_url());
      }else{
        echo"<script type=\"text/javascript\">alert('Ya existe un archivo con ese nombre!'); window.location='/intranetTrabajo/index.php';</script>";
      }

    }
  }else{
   echo"<script type=\"text/javascript\">alert('Debe llenar todos los campos!'); window.location='/intranetTrabajo/index.php';</script>";
 }
}
/*------------Buscar----------------*/
function searchFile(){
  $query = $this->model->obraList();
  $data['data'] = $query;
  $this->load->view('searchFile', $data);
}
function download(){
  $var =  $_POST['nombre'];
  $this->load->helper('download');
          $data = file_get_contents("subidas/talca/vacaciones/2001/$var"); // Read the file's contents
          $name = $var;
          force_download($name, $data);
        }
function download2(){
          $this->load->helper('download');
          $var =  $_POST['nombre'];
          $dUrl = $_POST['url'];
          $data = file_get_contents("$dUrl"."$var"); // Read the file's contents
          $name = $var;
          force_download($name, $data);
        }
/*------------Carga de Vistas---------------*/
function showSearchFileWorker(){
  $query = $this->model->obraList();
  $data['data'] = $query;
  $query2 = $this->model->workerList();
  $data['data2'] = $query2;
  $this->load->view('searchFileWorker', $data);
}

function newObra(){
          $data = array(
           "nombre_obra" => $_POST['nombreObra']
           );
          if($this->model->addObra($data)){
           base_url();
         }
         header("index.php");

       }

function showUploadObra(){
      $query = $this->model->obraList();
      $data['data'] = $query;
      $this->load->view('uploadObra',$data);
    }

function showFiles(){
  $obra = strtoupper( $_POST['obra']);
  $year = strtoupper( $_POST['year']);
  $cat = strtoupper( $_POST['cat']);
  $data = array (
    "obra" => $obra,
    "year" => $year,
    "cat" => $cat
    );

  $this->load->view('showFiles', $data);
}
function showFilesWorker(){
  $obra = $this->input->post("obra");
  $rut = $this->input->post("rut");
  $id; $estado; $trabajador;
  $query = $this->model->searchObra($obra);
  foreach ($query->result() as $item){
    $id = $item->id_obra;
  }
  $data = array (
    "obra" => $obra,
    "rut" => $rut
    );
  $query2 = $this->model->stateSearch($id, $rut);
  if($query2->num_rows() > 0){
    foreach ($query2->result() as $items){
      $estado = $items->estado;
      $trabajador = $items->nombre." ".$items->apellido_paterno." ".$items->apellido_materno;
    }
    $data['estado'] = $estado;
    $data['trabajador'] = $trabajador;
    $data['obra'] = $obra;
  }else{
    $estado="";
    $data['estado'] = $estado;
  }
  $this->load->view('showFilesWorker', $data);
}
function showNewWorker(){
  $this->load->view('NewWorker');
}
function showEditWorker(){
  $query = $this->model->workerList();
  $data['cantidad'] = $query->num_rows();
  $data['resultado'] = $query->result();
  $this->load->view('editWorker',$data);
}
/*------*/
function deleteWorker(){
  $rut = $this->input->post('rut');
  $this->model->deleteWorker($rut);
}
function editWorkerRut(){
 $rut = $this->input->post('rut');
 $nombre = $this->input->post('nombre');
 $apellido_paterno = $this->input->post('apellido_paterno');
 $apellido_materno = $this->input->post('apellido_materno');

 $this->modelo->editWorkerRut($rut, $nombre, $apellido_paterno, $apellido_materno);
}
function showEditCard(){
  $query = $this->model->searchCard();
  $data['cantidad']= $query->num_rows();
  $data['resultado']= $query->result();
  $this->load->view('editCard', $data);
}
function deleteCard(){
    $id_tarjeta = $this->input->post('id_tarjeta');
    $this->model->deleteCard($id_tarjeta);
}
function deleteObra(){
    $id_obra = $this->input->post('id_obra');
    $this->model->deleteObra($id_obra);
}
function showEditObra(){
  $query = $this->model->obraList();
  $data['cantidad'] = $query->num_rows();
  $data['resultado'] = $query->result();
  $this->load->view('editObra',$data);
}
function editObraId(){
  $id_obra = $this->input->post('id_obra');
  $nombre_obra = strtoupper(str_replace("ñ", "n", $this->input->post('nombre_obra')));

  $query = $this->model->editObra($id_obra, $nombre_obra);

  if($query == true){
    $query = $this->model->obraList();
    $data['cantidad'] = $query->num_rows();
    $data['resultado'] = $query->result();
    $this->load->view('editObra', $data);
  }else{
    $query = $this->model->obraList();
    $data['cantidad'] = $query->num_rows();
    $data['resultado'] = $query->result();
    $this->load->view('editObra', $data);
  }
}
function editWorkerUpdate(){
  $rut = $this->input->post('rut');
  $nombre = strtoupper(str_replace("ñ", "n", $this->input->post('nombre')));
  $apellido_paterno = strtoupper(str_replace("ñ", "n", $this->input->post('apellido_paterno')));
  $apellido_materno = strtoupper(str_replace("ñ", "n", $this->input->post('apellido_materno')));

  $this->model->editWorkerUpdate($rut, $nombre, $apellido_paterno, $apellido_materno);
}
function saveNewWorker(){
  if($_POST['workerName'] != "" || $_POST['workerLastname1'] !="" || $_POST['workerLastname2'] !="" || $_POST['rutWorker'] !=""){
    $nombre = strtoupper(str_replace("ñ", "n", $_POST['workerName']));
    $apellidoP = strtoupper(str_replace("ñ", "n", $_POST['workerLastname1']));
    $apellidoM = strtoupper(str_replace("ñ", "n", $_POST['workerLastname2']));
    $rutT = $_POST['rutWorker'];
    $data = array (
      "rut" => $rutT,
      "nombre" => $nombre,
      "apellido_paterno" => $apellidoP,
      "apellido_materno" => $apellidoM
      );
    $query = $this->model->searchWorker($rutT);
    if($query->num_rows() > 0){
      echo"<script type=\"text/javascript\">alert('El trabajador ya existe '); window.location='/intranetTrabajo/index.php';</script>";
    }else{
     if($this->model->addWorker($data)){

      $dir = "C:/subidas/trabajadores/$rutT/";
      if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
      }
      echo"<script type=\"text/javascript\">alert('Trabajador guardado correctamente! '); window.location='/intranetTrabajo/index.php';</script>";
    }else{
      echo"<script type=\"text/javascript\">alert('Error al guardar! '); window.location='/intranetTrabajo/index.php';</script>";
    }
  }
}else{
  echo"<script type=\"text/javascript\">alert('Debe llenar todos los campos requeridos! '); window.location='/intranetTrabajo/index.php';</script>";
}



}
function showUploadWorker(){
  $query = $this->model->obraList();
  $data['data'] = $query;
  $query2 = $this->model->workerList();
  $data['data2'] = $query2;
  $this->load->view('uploadWorker', $data);
}
function uploadTest(){
  $worker = $_POST['worker'];
  $obra = $_POST['obra'];
  $estado = $_POST['estado'];
  $id;
  if($_FILES['filesToUpload']!=NULL && $worker != "" && $obra != ""){
    if($estado != ""){
      $query = $this->model->searchObra($obra);
      foreach ($query->result() as $item){
        $id = $item->id_obra;
      }
      $data = array (
       "rut" => $worker,
       "id_obra" => $id,
       "estado" => $estado
       );
      $this->model->addState($data);
    }

    $dir = "C:/subidas/trabajadores/$worker/$obra/";
    if (!file_exists($dir)) {
     mkdir($dir, 0777, true);
   }
   if(count($_FILES['filesToUpload']['name'])) {
    $i = 0;
    foreach ($_FILES['filesToUpload']['name'] as $file) {
      $dir2 = $dir.$file;
      if(!file_exists($dir2)){
        move_uploaded_file($_FILES['filesToUpload']['tmp_name'][$i], $dir2);
        $i++;
        echo"<script type=\"text/javascript\">alert('Subido correctamente! '); window.location='/intranetTrabajo/index.php';setTimeout ('showUploadWorker();', 500)</script>";
      }else{
        echo"<script type=\"text/javascript\">alert('Ya existe un archivo con ese nombre! '); window.location='/intranetTrabajo/index.php';setTimeout ('showUploadWorker();', 500)</script>";
      }



    }

  }
}  else {
  echo"<script type=\"text/javascript\">alert('Debe llenar todos los campos!'); window.location='/intranetTrabajo/index.php';</script>";
}
}
function searchState(){

 $worker = $this->input->post("worker");
 $obra   = $this->input->post("obra");
 $idObra;
 $queryObra = $this->model->searchObra($obra);
 foreach ($queryObra->result() as $item){
  $idObra = $item->id_obra;
}
$query = $this->model->searchState($worker,$idObra);

foreach ($query->result() as $item){

}
if($query->num_rows()==0){
  $condition = false;
}else{
  $condition = true;
}
$data = array(
 'condition' => $condition
 );

echo json_encode($data);
}
function showCreateCard(){
  $workers = $this->model->workerList();
  $obras = $this->model->obrasList();
  $data['obras']= $obras;
  $data['worker'] = $workers;
  $this->load->view('createcard', $data);
}
function saveCard(){
  $condition = false;
  $worker = $this->input->post("rut");
  $id = $this->input->post("id");
  $obra = $this->input->post("obra");
  $data = array (
   "id_tarjeta" => $id,
   "trabajador_rut" => $worker,
   "id_obra" => $obra,
   );
  $query = $this->model->insCard($data);
  if($query){
    $condition = true;
  }
  $data = array(
   'condition' => $condition
   );
  echo json_encode($data);
}
function showSearchReg(){
  date_default_timezone_set("America/Santiago");
  $año = $this->model->searchYear();
  $vaño = null;
  foreach ($año->result() as $item){
    foreach($item as $i => $a){
      $vaño = $a;
    }
  }
  $y = date("Y", strtotime($vaño));
  $añoactual = date('Y');
  $años = null;
  for($i = $y; $i <= $añoactual; $i++){
    $años[]=$i;
  }
  $data['años'] = $años;
  $obras = $this->model->obrasList();
  $data['obras']= $obras;
  $this->load->view('searchreg', $data);
}
function loadMonths(){
  date_default_timezone_set("America/Santiago");
  $year = $this->input->post("year");
  $meses = array("1" => 'Enero', "2" => 'Febrero', "3" => 'Marzo', "4" => 'Abril', "5" => 'Mayo', "6" => 'Junio', "7" => 'Julio', "8" => 'Agosto',
    "9" => 'Septiembre', "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre');
  $fmes = null;
  $añoactual = date('Y');
  if($year ==$añoactual){
   $mesactual = date('m');
   for($i= 1;$i <= $mesactual; $i++){
     $fmes[$i]=$meses[$i];
   }
   $data['meses']= $fmes;
   $this->load->view('meses', $data);
 }else{
   $data['meses']= $meses;
   $this->load->view('meses', $data);
 }
}
function loadAS(){
  $year = $this->input->post("year");
  $m = $this->input->post("month");
  $obra = $this->input->post("obra");
  $query = $this->model->aList($year,$m, $obra);
  $data['reg']=$query;
  $this->load->view('regtable', $data);
}
function showDet(){
          $year = $this->input->post("year");
          $m = $this->input->post("month");
          $obra = $this->input->post("obra");
          $rut = $this->input->post("rut");
          $dias = array('Lunes', 'Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
          $query = $this->model->awList($year,$m, $obra, $rut);
          $mes = null;
            if($m < 10){
                $mes = "0".$m;
            }  else {
               $mes = $m; 
            }
          $data['regw']=$query;
          $data['date']=$year."-".$mes."-01";
          $data['dias']=$dias;
          $this->load->view('workerdetail', $data);
      }
function passVer(){
        $pass              = $this->input->post("passw");
        $user              = $this->session->userdata("userName");
        $ver               = $this->userPassV($pass, $user);
        $data['condition'] = $ver;
        echo json_encode($data);
    }
function userPassV($pass, $user){
        $query = $this->model->queryUser($user);
        $ver   = false;
        $rpass = "";
        foreach ($query->result() as $key) {
            $rpass = $key->clave;
        }
        if ($rpass == $pass) {
            $ver = true;
        }
        return $ver;
    }
}
