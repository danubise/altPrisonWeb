<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 24.09.18
 * Time: 21:30
 */



class Voicerecords extends Core_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->module_name = 'Главная страница';
    }

    public function index()
    {
        $voicerecords = $this->db->select("* from `voicerecords`");
        $this->view(
            array(
                'view' => 'voicerecords/index',
                'var' => array(
                    'voicerecords' => $voicerecords
                )
            )
        );
    }

    public function edit($id) {
        $voicerecord = $this->db->select("* from `voicerecords` where id='".$id."'", false);

        $this->view(
            array(
                'view' => 'voicerecords/edit',
                'var' => array(
                    'voicerecord' => $voicerecord
                )
            )
        );
    }

    public function editing() {
        if(trim($_POST['voicerecord']['description']) == ""
            || trim($_POST['voicerecord']['id']) == ""
            || trim($_POST['voicerecord']['description']) == ""){
            $this->index();
            return;
        }

        $voicerecordcount = $this->db->select("count(id) from `voicerecords` where `id`='".$_POST['voicerecord']['id']."'",false);

        if($voicerecordcount != 1){
            $this->index();
            return;
        }
        $voicerecord = $_POST['voicerecord'];
        $this->db->update("voicerecords",
            array(
                'description' =>  $voicerecord['description']
            )
            , "id='".$voicerecord['id']."'");
        $this->index();
    }

    public function delete($id) {
        $this->db->delete("from voicerecords where `id`='".$id."'");
        $this->index();
    }
}