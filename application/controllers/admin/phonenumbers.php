<?php
class Phonenumbers extends Core_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->module_name = 'Редактирование номеров';
    }

    public function index()
    {
        $phonenumbers = $this->db->select("* from `phonenumbers`");
        $this->view(
            array(
                'view' => 'phonenumbers/index',
                'var' => array(
                    'phonenumbers' => $phonenumbers
                )
            )
        );
    }
    public function edit($id) {
        $phonenumber = $this->db->select("* from `phonenumbers` where id='".$id."'", false);

        $this->view(
            array(
                'view' => 'phonenumbers/edit',
                'var' => array(
                    'phonenumber' => $phonenumber
                )
            )
        );
    }
    public function editing() {
        if(trim($_POST['phonenumber']['phone']) == ""
            || trim($_POST['phonenumber']['id']) == ""
            || trim($_POST['phonenumber']['description']) == ""){
            $this->index();
            return;
        }

        $phonenumbercount = $this->db->select("count(id) from `phonenumbers` where `id`='".$_POST['phonenumber']['id']."'",false);

        if($phonenumbercount != 1){
            $this->index();
            return;
        }
        $phonenumberData = $_POST['phonenumber'];
        $this->db->update("phonenumbers",
            array(
                'description' =>  $phonenumberData['description'],
                'phone' =>  $phonenumberData['phone']
            )
            , "id='".$phonenumberData['id']."'");
        $this->index();
    }

    public function add() {
        $this->view(
            array(
                'view' => 'phonenumbers/add'
            )
        );
    }
    public function adding(){
        if(trim($_POST['number']['phone']) != ""){
            if (strpos($_POST['number']['phone'],",") === false && trim($_POST['number']['phone']) != "" && ctype_digit($_POST['number']['phone'])){
                $this->db->insert("phonenumbers", $_POST['number']);
            }
        }
        $this->index();
    }
    public function delete($numberid) {
        $this->db->delete("from phonenumbers where `id`='".$numberid."'");
        $this->index();
    }
}