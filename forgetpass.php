<?php
require_once 'sub/init.php';$navvar=1;
if ($submitok == 'addupdate') {
/* 	if (!preg_match('/(^[a-z]{1})([a-z0-9]{2,11}$)/', $form_username)) {
		callmsg("��֤ʧ�ܣ���������ȷ���û�����","-1");
		exit;
	} */
	if (empty($form_username))callmsg("��֤ʧ�ܣ���������ȷ���û�����","-1");
	require_once YZLOVE.'sub/liamiaez.php';
	require_once YZLOVE.'sub/conn.php';
	$rt = $db->query("SELECT id,password,email FROM ".__TBL_MAIN__." WHERE username='$form_username'");
	if ($db->num_rows($rt)) {
		$row = $db->fetch_array($rt);
		$tmpid = $row[0];
		$key = $row[1];
		$email = $row[2];
		if (empty($email) || !ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email)) {
			callmsg("����ʱע��ʱû����������䲻��ȷ������ϵ�ͷ��һ����롣","help");
			exit;
		}
		$Mserver=explode('@',$email);
		$Mserver='http://mail.'.$Mserver[1];
		$memberemail = $email;
		$mail = new zeaimail();
		$mail->setSmtp_accname("����");//����QQ����,��Ҫ��ͨsmtp����kefu@qq.com
		$mail->setSmtp_password("��������");
		$mail->setLocalhost("YZLOVE.CoM");//��������ĺ������������ʱûʲô��
		$mail->setSmtp_host("����smtp��ַ");//��smtp.qq.com
		$mail->setFrom("����");//��kefu@qq.com
		$mail->setFromName($Global['m_sitename']."�ͷ�����");
		$title = $Global['m_sitename'].'�û��������һأ�';
		$content = $title."<br>����<b><a href=".$Global['www_2domain']."/findpass.php?uid=".$tmpid."&key=".$key." target=_blank>����������� ".$Global['www_2domain']."/findpass.php?uid=".$tmpid."&key=".$key."</a></b>";
		$err = $mail->send($memberemail,$title,$content);
		callmsg("������Ϣ���ύ����ȥ���� (".$memberemail.") �����һ����룡","$Mserver");
	} else {
		callmsg("��֤ʧ�ܣ��û������ڻ��������","-1");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�һ�����</title>
<link href="<?php echo $Global['www_2domain']; ?>/css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.top_login .top_login_c .L,.top_login .top_login_c .R{float:left;height:41px;line-height:41px;color:#FFCCD9}
.top_login .top_login_c .L{width:320px;padding:0 0 0 80px;text-align:left}
.top_login .top_login_c .R{width:497px;padding:0 75px 0 0;text-align:right}
.top_login .top_login_c .R a{text-decoration:underline;color:#ff0;font-weight:bold}
.top_login .top_login_c .R a:hover{color:#cf0}
.main1 {width:922px;height:20px;margin:0px auto;margin-top:15px;background-image:url(images/login1.gif)}
.main2 {width:922px;height:350px;margin:0px auto;background-image:url(images/login2.gif)}
.main2 .box{width:880px;height:348px;margin:0px auto;background:#FFF5F9;border:#F7E4ED 1px solid}
.main2 .box .line1{width:670px;height:18px;text-align:left;padding:120px 0 10px 210px;font-family:Verdana;font-size:14px}
.main2 .box .line2{width:670px;height:150px;line-height:200%;text-align:left;padding:10px 0 0 210px;font-family:Verdana;font-size:14px}
.main2 .box .line2 input{height:20px;line-height:20px;border:#ddd 1px solid}
.buttonx{cursor:pointer!important;cursor:hand;background-image:url(/images/bg_btn2.gif);background-color:#FFF5E6; text-align:center; height:24px;padding:0px!important;padding-top:3px;border:1px solid #FF7E00;color:#000}
.main3 {width:922px;height:20px;margin:0px auto;background-image:url(images/login3.gif);margin-bottom:20px}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main1"></div>
<div class="main2">
	<div class="box">
		<div class="line1"><img src="images/tips.gif" width="23" height="21" hspace="5" />�������㵱��ע��ʱ���û�����ϵͳ������뷢����ʱע�����䣺</div>
	    <div class="line2"><form action="forgetpass.php" method="post"><b>�����û���:</b>
			<input name="form_username" type="text" size="50" maxlength="200" />
			<input name="button2" type="submit" value=" �� �� " class="buttonx" style="height:22px">
			<input name="submitok" type="hidden" value="addupdate" />
			</form>
	  </div>
  </div>
</div>
<div class="main3"></div>
<?php require_once YZLOVE.'bottom.php';?>
