<?php
require_once '../sub/init.php';$navvar=1;
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)){header("Location: ".$Global['www_2domain']."/login.php");exit;}}
require_once YZLOVE.'sub/online.php';
$online = new online_yzlove;
$online->chk();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.top_login .top_login_c .L,.top_login .top_login_c .R{float:left;height:41px;line-height:41px;color:#FFCCD9}
.top_login .top_login_c .L{width:320px;padding:0 0 0 80px;text-align:left}
.top_login .top_login_c .R{width:497px;padding:0 75px 0 0;text-align:right}
.top_login .top_login_c .R a{text-decoration:underline;color:#ff0;font-weight:bold}
.top_login .top_login_c .R a:hover{color:#cf0}
.main1 {width:922px;height:20px;margin:0px auto;margin-top:15px;background-image:url(images/login1.gif)}
.main2 {width:922px;height:450px;margin:0px auto;background-image:url(images/login2.gif)}
.main2 .box{width:880px;height:448px;margin:0px auto;background:#FFF5F9;border:#F7E4ED 1px solid}
.main2 .box .line1{width:880px;height:60px;line-height:60px;padding:20px 0 0 0;font-size:18px;font-family:����,����;color:#6F9F00}
.main2 .box .line2{width:740px;height:250px;line-height:200%;text-align:left;padding:10px 70px 0 70px;font-family:Verdana;font-size:14px}
.main2 .box .line3{width:880px;height:50px;padding:10px 0 0 0}
.main3 {width:922px;height:20px;margin:0px auto;background-image:url(images/login3.gif);margin-bottom:20px}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main1"></div>
<div class="main2">
	<div class="box">
		<div class="line1"><?php echo $cook_nickname; ?>������ע��ɹ���<?php echo $Global['m_sitename']; ?>��ӭ���ĵ���</div>
	  <div class="line2">����<?php echo $Global['m_sitename']; ?>(<?php echo $Global['m_siteurl']; ?>)���й���õ����������վ֮һ�����й��ط�������վ�ı��Ҳ��<?php echo $Global['m_area2']; ?>��ģ�������Ч����õĻ�����վ������ͨ��������ƽ̨�����»�Ա����Ϊ����ṩ���ཻ�ѷ���<br />
	    ����<b>�ĸ���Ա�ȼ�</b>����ͨ��Ա�����Ż�Ա����ʯ��Ա������Ա���㵱ǰ����ͨ��Ա����<a href="/my/?k_vip.php" target="_blank" class="uDF2C91"><b>����˽���ȼ�������Ȩ</b></a>��<br />
	    ����<b>���ֽ���Ŀ��</b>���� Լ�ύ�� (־ͬ���ϵ�������꣬һ��Ժ����֣���Щ��Ҷ�����������)<br />
	  �������������� ������ �������� (Ѱ��һ��������¡�һ����ֿ���õĸ���)<br />
	  �������������� ������ �쳾֪�� (��ʼ�����Ż����氮��������氮��ֻ������Χ����) <br />
	  �������������� ������ ���̻��� (������ʿ��Դ��������ҵ������������ʵ������) <br />
	  ����Ϊ�˸��ù����Ϊ��ҷ������������ˡ�Love�ҡ��������ڱ�վ����������ѵ�������ҡ���<a href="/my/?k_getloveb.php" target="_blank" class="uDF2C91"><b>����˽�Love��</b></a><br />
	  </div>
		<div class="line3"><a href="./?a1.php"><img src="images/regnext.gif" width="176" height="36" border="0" /></a></div>
	</div>
</div>
<div class="main3"></div>
<?php require_once YZLOVE.'bottom.php';?>
