class Department extends Core_controller {
    public function __construct() {
        parent::__construct();
        $this->module_name = 'Главная страница';
    }

    public function index() {
    $departments = $this->db->select("* from `groups`");
       $this->view(
            array(
                'view' => 'department/index',
                'departments' => $departments
            )
       );
    }

    public function logout() {
        $this->user_model->logout();
        header('Location: '.baseurl());
    }
}