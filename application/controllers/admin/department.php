<?

class Department extends Core_controller {
    public function __construct() {
        parent::__construct();
        $this->module_name = 'Главная страница';
    }

    public function index() {
    $departments = $this->db->select("* from `groups`");
    var_dump($departments);
       $this->view(
            array(
                'view' => 'department/index',
                'var' => array(
                    'departments' => $departments
                )
            )
       );
    }

    public function add() {
       $this->view(
            array(
                'view' => 'department/add'
            )
       );
    }

    public function adding() {
        $groupid = $this->db->insert("groups", $_POST['department']);
        echo $this->db->query->last;
        $this->db->insert("pincode",array(
            'groupid' => $groupid,
            'pincode' => $_POST['pincode'],
            'grouptype' => $_POST['grouptype']
        ));
        echo $this->db->query->last;
        $this->index();
    }

    public function edit($groupid) {
        $department = $this->db->select("* from `groups` where groupid='".$groupid."'");
        $numbers = $this->db->select("* from `phonenumbers` where groupid='".$groupid."'");
        printarray($department);
        printarray($numbers);
        $this->view(
            array(
                'view' => 'department/edit',
                'var' => array(
                    'department' => $department,
                    'numbers' => $numbers
                )
            )
        );
    }


    public function delete($groupid) {
        $this->db->delete("from groups where groupid='".$groupid."'");
        $this->index();
    }

    public function logout() {
        $this->user_model->logout();
        header('Location: '.baseurl());
    }
}
?>