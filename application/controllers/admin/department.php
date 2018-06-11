<?

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
        //echo $this->db->query->last;
        $this->db->insert("pincode",array(
            'groupid' => $groupid,
            'pincode' => $_POST['pincode'],
            'grouptype' => $_POST['grouptype']
        ));

        $this->index();
    }

    public function edit($groupid) {
        $department = $this->db->select("* from `groups` where groupid='".$groupid."'");
        $pincode = $this->db->select("* from `pincode` where groupid='".$groupid."'");
        $numbers = $this->db->select("* from `phonenumbers` where groupid='".$groupid."'");
        $this->view(
            array(
                'view' => 'department/edit',
                'var' => array(
                    'department' => $department[0],
                    'numbers' => $numbers,
                    'pincode' => $pincode[0]
                )
            )
        );
    }

    public function editing() {
        $department = $_POST['department'];
        //printarray($department);
        $this->db->update("groups", array(
            'name' =>  $department['name'],
            'emails' => $department['emails']) , "groupid='".$department['groupid']."'");
        //echo $this->db->query->last;
        $this->db->update("pincode", array(
            'pincode' => $department['pincode'],
            'grouptype' => $department['grouptype']), "groupid='".$department['groupid']."'");
//echo $this->db->query->last;
        $this->index();
    }

    public function addnumber(){
        $groupid = $this->db->insert("phonenumbers", $_POST['number']);
        $this->edit($_POST['number']['groupid']);
    }


    public function delete($groupid) {
        $this->db->delete("from groups where groupid='".$groupid."'");
        $this->index();
    }

    public function deletenumber($groupid, $numberid) {
        $this->db->delete("from phonenumbers where numberid='".$numberid."'");
        $this->edit($groupid);
    }

    public function logout() {
        $this->user_model->logout();
        header('Location: '.baseurl());
    }
}
?>