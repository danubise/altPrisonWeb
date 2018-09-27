<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 27.09.18
 * Time: 19:06
 */

class Reports extends Core_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->module_name = 'Отчет';
    }

    public function index()
    {
        $scheduleid = $this->db->select("`scheduleid` FROM `schedule` ORDER BY `scheduleid` DESC LIMIT 1 ", false);
        $allNumbersByScheduleId =  $this->db->select(" * FROM `dial` WHERE `scheduleid` ='".$scheduleid."'");
        $this->view(
            array(
                'view' => 'reports/index',
                'var' => array(
                    'allNumbersByScheduleId' => $allNumbersByScheduleId
                )
            )
        );
    }
}