<?php
namespace App\Models;
use CodeIgniter\Model;

class CharModel extends Model{

     private $con;

     public function __construct()
     {
        $this->con = \Config\Database::connect();
     }
    
     public function dataChar01($year)
     {
        $setvariable = array(
            array('countmonth1','workstatus1 = 1'),
            array('countmonth2','workstatus2 = 1'),
            array('countmonth3','workstatus3 = 1')
        );

     
        foreach ($setvariable as  $value) 
        {
            $query   = $this->con->query('SELECT COUNT( * ) AS provinceid
            FROM snpproject WHERE year(startdate) = '.$year.' and '.$value[1].'  GROUP BY MONTH(startdate) ');
            $results = $query->getResultArray();
            foreach ($results as $row)
            {
                $data[$value[0]][] = $row['provinceid'];
            }
       }
  
        $row1['name'] = 'ออกแบบขออนุญาติ';
        $row2['name'] = 'ประมูลงาน';
        $row3['name'] = 'ผู้รับเหมา';

        $row1['data'] = $data['countmonth1'];
        $row2['data'] = $data['countmonth2'];
        $row3['data'] = $data['countmonth3'];
     
        $rslt = array();
        array_push($rslt, $row1);
        array_push($rslt, $row2);
        array_push($rslt, $row3);
        print json_encode($rslt, JSON_NUMERIC_CHECK);
    }

  
}