<?php
	/**
	*
	*/
	class Home extends t_Controller
	{

		public function __construct()
		{
			parent::__construct();
		}
		public function index(){
			$this->view('welcome');
		}
	}

 ?>
