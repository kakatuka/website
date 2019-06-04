<?php 
class DichvuController extends Controller{
	public $modelDichvu;
	public function __construct(){
		parent::__construct();
		$this->modelDichvu 	= $this->loadModel('dichvu');
	}
	
	public function index(){
        	global $_web;
            $this->view->data['dichvu'] = $this->modelDichvu->getDichvu();
	        $this->view->render('index_service');
	}	
}