<?php
class homecontroller extends t_controller{
  public function __construct(){
    parent::__construct();
  }
  public function index(){
    $this->model('homemodel');
    $this->view("index");
    $this->helper('uri');
    echo geturl(0);
   // $this->database();
    //global $DB;
   // print_r($DB->get_list('select * from ci_sessions'));
    if($this->input->post('up')){
    	print_r($_FILES['file']);
    	$this->library('upload');
    //  mkdir('public/a/',0777);
    	$a=$this->upload->doupload('file',['type'=>'image','maxsize'=>100000,'move'=>'public/a/']);
    	print_r($a);
    }
  }
}

 ?>
