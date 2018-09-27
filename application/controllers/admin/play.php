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
        $this->module_name = 'Проигравыние звуковой записи';
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
        printarray($_POST);
        $phonenumbers = $_POST['phonenumbers'];
        $voicerecord = $this->db->select ("`filename` from `voicerecords` where id='". $_POST['voicerecordid']."'",false);

        $scheduleid = $this->db->insert("schedule", array(
            "groupid" => $this->groupid,
            "voicefilename" => $voicerecord ,
            "status" => 1
        ));

        if($phonenumbers != null){
            $this->db->update("schedule", array("status" => 2), "scheduleid=".$_POST['voicerecordid']);
            //$this->log->debug($this->db->query->last);
            foreach($phonenumbers as $numberid => $numberData){
                //printarray($numberData);
                $this->db->insert("dial", array(
                    "groupid" => $_POST['voicerecordid'],
                    "phonenumber" => $numberData,
                    "status" => 0,
                    "scheduleid" => $scheduleid,
                    "dialcount" => 0,
                    "action" => 0,
                    "voicerecord" => $voicerecord
                ));
                //echo $this->db->query->last;
                //$this->log->debug($this->db->query->last);
            }
        }

        header('Location: '.baseurl()."voicerecords");
    }
}