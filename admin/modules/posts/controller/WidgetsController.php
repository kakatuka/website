<?php 
class WidgetsController extends Controller{
	public $modelWidgets;
	public function __construct(){
		parent::__construct();
		$this->modelWidgets = $this->loadModel('Widgets');

	}
	public function index(){
		global $_web;
		if(preg_match("/,79,/",$_SESSION['permission_id'], $matches) || $_SESSION['group_id'] == '20'){
			$this->view->data['data'] = $this->modelWidgets->getWidgets();
			$this->view->data['menu'] = $this->modelWidgets->getCategories();
			$this->view->render('widgets_index');
		}else{
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!"
			);
			Session::create($mess);
			redirect(base_url()."posts/managerindex/index");
		}
	}	
	public function saveAjax(){
		if (!empty($_POST['data'])) {
			$type = $_POST['data']['type'];
			$options = $_POST['data']['options'];
			$number = $_POST['data']['number'];
			$id_post = $_POST['data']['id_post'];
			 $this->view->data['menu'] = $this->modelWidgets->getWidgetsById($id_post);
			$title='';
			switch ($type) {
				case 4:
					$title = $this->view->data['menu'][0]['title'];
					break;
			}
			$countWidth = $this->modelWidgets->count();

			$data_insert = array(
				'title'	=> $title,
				'type' => $type,
				'options' => $options,
				'number' => $number, 
				'id_post'=>$id_post,
				'sort' => $countWidth + 1
			);
			$id_widget = $this->modelWidgets->insertData($data_insert);
			 $html = '<li style="margin-left:20px;" class="dd-item post-item closed" id="listId_'.$id_widget.'" data-id="'.$id_widget.'">
                            <div class="dd-handle"></div>
                            <div class="dd-content">
                                <span class="text pull-left">&nbsp;'.$title.'</span>
                                <span class="text pull-right"></span>
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
                                                '.lang('remove_widget').'</a>

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