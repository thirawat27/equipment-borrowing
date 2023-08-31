<?php 
  /** เชื่อมต่อฐานข้อมูล */
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "eb_database";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $conn->set_charset("utf8");

  /** ตรวจสอบข้อผิดพลาดต่างๆ */
  if ($conn->connect_errno) {
    echo "ไม่สามารถเชื่อมต่อฐานข้อมูล MySQL ได้: " . $conn->connect_error;
    exit();
  }
  date_default_timezone_set('Asia/Bangkok');

  /** แปลงวันที่ให้เป็นภาษาไทย */
  function dateThai($strDate){
    $strDay= date("j",strtotime($strDate));
    $strMonth= date("n",strtotime($strDate));
    $strYear= date("Y",strtotime($strDate))+543;
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
  }

?>