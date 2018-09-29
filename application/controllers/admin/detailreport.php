<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 27.09.18
 * Time: 19:06
 */

class Detailreport extends Core_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->module_name = 'Детальный отчет';
    }

    public function index($reportid)
    {
        $schedule =$schedules = $this->db->select("s.datetime, s.scheduleid, s.description, SUM(CASE WHEN d.status = 0 THEN 1 ELSE 0 END) AS noanswered, 
 SUM(CASE WHEN d.status = 1 THEN 1 ELSE 0 END) AS answered, 
 SUM(CASE WHEN d.status = 2 THEN 1 ELSE 0 END) AS listened 
FROM `dial` AS d , `schedule` AS s WHERE s.scheduleid=d.scheduleid AND s.scheduleid = '".$reportid."' GROUP BY s.description DESC", false);
        $allNumbersByScheduleId =  $this->db->select(" * FROM `dial` WHERE `scheduleid` ='".$reportid."'");

        $this->view(
            array(
                'view' => 'detailereport/index',
                'var' => array(
                    'schedule' => $schedule,
                    'allNumbersByScheduleId' => $allNumbersByScheduleId
                )
            )
        );
    }
}