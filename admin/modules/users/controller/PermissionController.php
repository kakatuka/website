<?php 
    class PermissionController extends Controller{
        public $permission;
        public function __construct(){
        parent::__construct();
        $this->permission = $this->loadModel('Permission');

    }
    
    public function index(){
        global $_web;
        if ($_SESSION['group_id'] == '22' || $_SESSION['group_id'] == '20') {
            if (isset($_SESSION['flash_success'])) {
                $this->view->data['flash_success'] = Session::get('flash_success');
                unset($_SESSION['flash_success']);
            }
            if (isset($_SESSION['flash_warning'])) {
                $this->view->data['flash_warning'] = Session::get('flash_warning');
                unset($_SESSION['flash_warning']);
            }
            $this->view->data['users'] = $this->permission->getList();
            // dd($this->view->data['users']);
            $this->view->render('permission_index');
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
        $parent_id = trim(addslashes($this->input->post('parent_id')));
        $name = trim(addslashes($this->input->post('permissionname')));

        $data_insert = array(
            'name'  => $name,
            'description' => $description,
            'parent_id' => $parent_id,
            'create_time'   => time()
        );
        $this->permission->insertData_Permission($data_insert);
        $data = array(
            'status'    => true,
            'mess'      => lang('success_user')
        );
        echo json_encode($data);
    }
    public function edit(){
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $this->view->data['data_user']=$this->permission->getPerById($_GET['id']);
            $this->view->data['data_user1']   = $this->permission->getList();
            $this->view->render('permission_edit');
        }
    }
    public function dellAll(){
        if (isset($_POST['all'])) {
           
            if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->permission->dellWhereInArray($names_id);
                $mess = array(
                    'flash_success' => lang('delete_all_success'),
                );
                Session::create($mess);
                $data_mess = array(
                    'status'    => true,
                    'redirect'      => base_url().'users/permission/index'
                );
                echo json_encode($data_mess);
            }
        }
    }
    public function del(){
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $this->permission->delete($id);
            $mess = array(
                'flash_success' => lang('delete_success'),
            );
            Session::create($mess);
            redirect(base_url().'users/permission/index');
        }
    }
    public function update(){
        if (isset($_POST['submit'])) {
            $name = trim(addslashes($this->input->post('name')));
            $description = trim(addslashes($this->input->post('description')));
            $description = trim(addslashes($this->input->post('description')));
            $parent_id = trim(addslashes($this->input->post('parent_id')));

            $data_insert = array(
                'name'  => $name,
                'description' => $description,
                'create_time'   => time(),
                'parent_id'     =>$parent_id,
            );
            if (is_numeric($_POST['id_user'])) {
                $this->permission->update($data_insert,$_POST['id_user']);
                $mess = array(
                    'flash_success' => lang('update_success'),
                );
                Session::create($mess);
                redirect(base_url().'users/permission/index');
            }
        }
    }
}
