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
        $errorMessage="";

        if(trim($_POST['pincode']) == "" || trim($_POST['department']['name']) == "" || trim($_POST['department']['emails']) == ""){
            $errorMessage ="Ошибка ввода данных";
        }else{

            $pincodeexist = $this->db->select("count(pincode) from `pincode` where `pincode`='".$_POST['pincode']."'",false);
            if($pincodeexist == 0){
                $groupid = $this->db->insert("groups", $_POST['department']);
                //echo $this->db->query->last;
                $this->db->insert("pincode",array(
                    'groupid' => $groupid,
                    'pincode' => $_POST['pincode'],
                    'grouptype' => $_POST['grouptype']
                ));
                $this->index();
                return;
            }else{
                $errorMessage="Указанный пинкод уже присутствует в базе";
            }
        }

        $this->view(
           array(
               'view' => 'department/add',
               'var' => array(
                     'formdata' => $_POST,
                     'errorMessage' => $errorMessage
                 )
           )
        );

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

        if(trim($_POST['pincode']) == "" || trim($_POST['department']['name']) == "" || trim($_POST['department']['emails']) == ""){
            $this->index();
            return;
        }
        $pincodeexist = $this->db->select("count(pincode) from `pincode` where `pincode`='".$_POST['pincode']."'",false);
        if($pincodeexist == 1){
            $this->index();
            return;
        }
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
        $this->db->delete("from pincode where groupid='".$groupid."'");
        $this->db->delete("from phonenumbers where groupid='".$groupid."'");
        $this->db->delete("from schedule where groupid='".$groupid."'");
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