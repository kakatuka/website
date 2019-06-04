<?php 
class GrouppermissionController extends Controller{
    public $group_permission;
    public function __construct(){
        parent::__construct();
        $this->group_permission = $this->loadModel('Grouppermission');
    }
    public function index(){
        if ($_SESSION['group_id'] == '22' || $_SESSION['group_id'] == '20') {
            global $_web;
            if (isset($_SESSION['flash_success'])) {
                $this->view->data['flash_success'] = Session::get('flash_success');
                unset($_SESSION['flash_success']);
            }
            if (isset($_SESSION['flash_warning'])) {
                $this->view->data['flash_warning'] = Session::get('flash_warning');
                unset($_SESSION['flash_warning']);
            }

        $this->view->data['users'] = $this->group_permission->getList();

        $this->view->render('group_permission');
        }else{
            $mess = array(
                            'flash_warning' => "Bạn không có quyền này!!!"
                        );
            Session::create($mess);
            return redirect(base_url().'users/users/index');
        }
    }
    public function ajaxAdd(){
        $description = trim(addslashes($this->input->post('description')));
        $name = trim(addslashes($this->input->post('permissionname')));

        $data_insert = array(
            'name'  => $name,
            'description' => $description,
            'create_time'   => time()
            );
        $this->group_permission->insertData_Permission($data_insert);
        $data = array(
            'status'    => true,
            'mess'      => lang('success_user')
            );
        echo json_encode($data);

    }
    public function edit(){
        if ($_SESSION['group_id'] == '22' || $_SESSION['group_id'] == '20') {
        if (isset($_SESSION['flash_success'])) {
            $this->view->data['flash_success'] = Session::get('flash_success');
            unset($_SESSION['flash_success']);
        }else if(isset($_SESSION['flash_warning'])){
            $this->view->data['flash_warning'] = Session::get('flash_warning');
            unset($_SESSION['flash_warning']);
        }
        $this->view->data['getListPermission']=$this->group_permission->getListPermission();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $this->view->data['data']=$this->group_permission->getPerById($_GET['id']);
        }
        $this->view->render('group_permission_edit');
    }else{
         $mess = array(
                            'flash_warning' => "Bạn không có quyền này!!!"
                        );
            Session::create($mess);
            return redirect(base_url().'users/users/index');
    }
    }
    public function dellAll(){
        if (isset($_POST['all'])) {

            if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->group_permission->dellWhereInArray($names_id);
                $mess = array(
                    'flash_success' => lang('delete_all_success'),
                    );
                Session::create($mess);
                $data_mess = array(
                    'status'    => true,
                    'redirect'      => base_url().'users/grouppermission/index'
                    );
                echo json_encode($data_mess);
            }
        }
    }
    public function del(){
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $this->group_permission->delete($id);
            $mess = array(
                'flash_success' => lang('delete_success'),
                );
            Session::create($mess);
            redirect(base_url().'users/grouppermission/index');
        }
    }
    public function update(){
        if (isset($_POST['submit'])) {
            $name = trim(addslashes($this->input->post('name')));
            $description = trim(addslashes($this->input->post('description')));
            $permission_id = $this->input->post('permission_id');
            $list = ",";
            foreach ($permission_id as $key => $value) {
                if($value == co){
                    $list .= $key.",";
                }
            }
            $data_insert = array(
                'name'          => $name,
                'description'   => $description,
                'permission_id' => $list,
                'status' => 1,
                );
            if (is_numeric($_POST['id_posts']) && $_POST['id_posts'] != "") {
                $this->group_permission->update($data_insert,$_POST['id_posts']);
                $mess = array(
                    'flash_success' => lang('update_success'),
                    );
                Session::create($mess);
                if ($_POST['submit']=='save') {
                    redirect(base_url().'users/grouppermission/edit/'.$_POST['id_posts']);
                }else{
                    redirect(base_url().'users/grouppermission/edit');
                }
            }else{
                if($this->group_permission->dellWhereName($name) < 1){
                    $data_insert['create_time'] = time();
                    $this->group_permission->insertData_Permission($data_insert);
                    $mess = array(
                        'flash_success' => lang('insert_page_success'),
                        );
                }else{
                    $mess = array(
                        'flash_warning' => lang('warning_name_record'),
                        );
                    Session::create($mess);
                    if (is_numeric($_POST['id_posts']) && $_POST['id_posts'] != "") {
                        redirect(base_url().'users/grouppermission/edit/'.$_POST['id_posts']);
                    }else{
                        redirect(base_url().'users/grouppermission/edit');
                    }
                }
            }
            Session::create($mess);
            if ($_POST['submit']=='save') {
                redirect(base_url().'users/grouppermission/index');
            }else{
                redirect(base_url().'users/grouppermission/edit');
            }
        }
    }
}
?>