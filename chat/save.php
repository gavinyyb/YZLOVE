<?php 
require_once '../sub/init.php';
if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;}
if ($cook_grade == 1)callmsg("ֻ�и߼���Ա�ſ��Ա��������¼��","-1");
$content = "<span style='font-size:12px'>".stripslashes($_GET['savetext']).'</span>';
$filaname = 'chat'.date("YmdHis").'.html';
header("Content-type:text/html;charset=GBK");
header("Content-Disposition:attachment;filename=".$filaname);
echo $content;
?>