<?php 
class ManagerController extends Controller{
	public $modelWidgets;
	public function __construct(){
		parent::__construct();
		$this->modelWidgets = $this->loadModel('Manager');

	}
	public function index(){
		global $_web;
		$this->view->data['categories'] = $this->modelWidgets->getCategories();
		$this->view->data['data'] = $this->modelWidgets->getWidgets();
		$this->view->render('manager_index');
	}	
	public function saveAjax(){
		if (!empty($_POST['data'])) {
			$title = $_POST['data']['title'];
			$id_cate = $_POST['data']['id_cate'];
			$number = $_POST['data']['number'];
			$countWidth = $this->modelWidgets->count();

			$data_insert = array(
				'title'		=> $title,
				'alias'		=> alias($title),
				'id_cate' 	=> $id_cate,
				'number' 	=> $number,
				'sort' 		=> $countWidth + 1
			);
			$id_widget = $this->modelWidgets->insertData($data_insert);
			 $html = '<li style="margin-left:20px;" class="dd-item post-item closed" id="listId_'.$id_widget.'" data-id="'.$id_widget.'">
                            <div class="dd-handle"></div>
                            <div class="dd-content">
                                <span class="text pull-left">&nbsp;'.$title.'</span>
                                <span class="text pull-right">'.$number.'</span>
                                <a href="#" title="" class="show-item-details"><i class="fa fa-angle-down"></i></a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="item-details">

                                        <label class="pad-bot-5">
                                            <span class="text pad-top-5 dis-inline-block">'.lang('title').'</span>
                                            <input type="text" id="title" name="title" value="'.$title.'" data-old="'.$title.'" class="form-control"/>
                                        </label>
                                        
                                        <div class="text-right button_update_widgets">
                                            <a href="#" class="btn btn-info btn-sm btn-update-widget">
                                                <i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;
                                                '.lang('update').'</a>

                                            <a href="#" class="btn btn-danger btn-sm btn-remove-widget">
                                                <i class="fa fa-times" aria-hidden="true"></i>&nbsp;
                                                '.lang('remove_manager').'</a>

                                            <a href="#" class="btn btn-success btn-sm btn-cancel-widget">'.lang('cancel').'</a>
                                        </div>

                            </div>
                        </li>';
			echo json_encode(array('status'=> true,'mess' => lang('insert_page_success'),'html'=> $html));
		}
	}
	public function sortable(){
		if (isset($_GET['listId'])) {
			foreach ($_GET['listId'] as $sort => $item) {
				$data = array(
					'sort'	=> $sort
				);
				$this->modelWidgets->update($data,$item);
			}
			$data_mess = array(
				'status'	=> true,
				'mess'		=> lang('update_page_success')
			);
			echo json_encode($data_mess);
		}
	}

	public function deleteAjaxWidgets(){

		if (isset($_POST['id']) && is_numeric($_POST['id'])) {
			$id = $_POST['id'];
			$this->modelWidgets->delete($id);
			$data_mess = array(
				'status'=> true,
				'mess'  => lang('delete_success')
			);
			echo json_encode($data_mess);
		}
	}	
	public function updateWidgets(){
		if (isset($_POST['title']) && is_numeric($_POST['id'])){
			$id = $_POST['id'];
			$title = trim(addslashes($_POST['title']));
			$data = array(
				'title'	=> $title
			);
			$this->modelWidgets->update($data,$id);
			$data_mess = array(
				'status'	=> true,
				'mess'		=> lang('update_page_success'),
				'title'	=> $title
			);
			echo json_encode($data_mess);
		}
	}
}