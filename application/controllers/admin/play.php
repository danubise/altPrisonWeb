<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 26.09.18
 * Time: 12:51
 */

class Play extends Core_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->module_name = 'Проигрывание звуковой записи';
    }

    public function index($recordid)
    {
        $voicerecord = $this->db->select("* from `voicerecords` WHERE `id`='".$recordid."'", false);
        $phonenumbers = $this->db->select("* from `phonenumbers`");
        $this->view(
            array(
                'view' => 'play/index',
                'var' => array(
                    'voicerecord' => $voicerecord,
                    'phonenumbers' => $phonenumbers
                )
            )
        );
    }

    public function start()
    {
        $phonenumbers = $_POST['phonenumbers'];
        $voicerecord = $this->db->select ("`filename`,`description` from `voicerecords` where id='". $_POST['voicerecordid']."'", false);

        $scheduleid = $this->db->insert("schedule", array(
            "groupid" => $this->groupid,
            "voicefilename" => $voicerecord['filename'] ,
            "description" => $voicerecord['description'] ,
            "status" => 1
        ));

        if($phonenumbers != null){

            $query = "update `schedule` set `status`='2', `datetime`=now() where scheduleid=".$scheduleid;
            $this->db->query($query);

            foreach($phonenumbers as $numberid => $numberData){
                $this->db->insert("dial", array(
                    "groupid" => $_POST['voicerecordid'],
                    "phonenumber" => $numberData,
                    "status" => 0,
                    "scheduleid" => $scheduleid,
                    "dialcount" => 0,
                    "action" => 0,
                    "voicerecord" => $voicerecord['filename']
                ));
            }
        }

        header('Location: '.baseurl()."voicerecords");
    }
}