<?php 
class WidgetsController extends Controller{
	public $modelWidgets;
	public function __construct(){
		parent::__construct();
		$this->modelWidgets = $this->loadModel('Widgets');

	}
	public function index(){
		global $_web;
		if ($_SESSION['group_id'] == '22' || $_SESSION['group_id'] == '20') {
			$this->view->data['data'] = $this->modelWidgets->getWidgets();
			$this->view->render('widgets_index');
		}else{
			$mess = array(
				'flash_warning' => "Bạn không có quyền này!!!"
			);
			Session::create($mess);
			return redirect(base_url().'settings/settings/manager');
		}
	}	
	public function saveAjax(){
		if (!empty($_POST['data'])) {
			$type = $_POST['data']['type'];
			$options = $_POST['data']['options'];
			$number = $_POST['data']['number'];
			$title='';
			switch ($type) {
				case 1:
					$title = lang('social');
					break;
				case 2:
					$title = lang('recent_posts');
					break;
				case 3:
					$title = lang('search');
					break;
				case 4:
					$title = lang('categories_posts');
					break;
			}
			$countWidth = $this->modelWidgets->count();

			$data_insert = array(
				'title'	=> $title,
				'type' => $type,
				'options' => $options,
				'number' => $number,
				'sort' => $countWidth + 1
			);
			$id_widget = $this->modelWidgets->insertData($data_insert);
			 $html = '<li style="margin-left:20px;" class="dd-item post-item closed" id="listId_'.$id_widget.'" data-id="'.$id_widget.'">
                            <div class="dd-handle">xxxx</div>
                            <div class="dd-content">
                                <span class="text pull-left">&nbsp;'.$title.'</span>
                                <span class="text pull-right">Primary sidebar</span>
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