<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="modupdate") {
if (strlen($form_password1)<6 || strlen($form_password1)>20)callmsg("�������롱�������2~20�ֽ����ڡ�","-1");
if (strlen($form_password2)<6 || strlen($form_password2)>20)callmsg("��ȷ�������롱�������2~20�ֽ����ڡ�","-1");
if ($form_password1 <> $form_password2)callmsg("�����������벻һ���������ԣ�","-1");
$password = trimm($form_password1);
$password = md5($password);
$old_password = md5($old_password);
$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$old_password'");
if(!$db->num_rows($rt))callmsg("��������֤�����ύʧ�ܣ�","-1");
$db->query("UPDATE ".__TBL_MAIN__." SET password='$password' WHERE id='$cook_userid'");
setcookie("cook_password",$password,null,"/",$Global['m_cookdomain']);
callmsg("�޸ĳɹ���","-1");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;width:68px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:68px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:68px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:68px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:68px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:68px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
</style>
</head>
<script language="javascript">
function chkform(){
if(document.myform.old_password.value==""){
alert('����������룡');
document.myform.old_password.focus();
return false;}
if(document.myform.form_password1.value==""){
alert('�����������룡');
document.myform.form_password1.focus();
return false;}
if(document.myform.form_password1.value.length>20 || document.myform.form_password1.value.length<6){
alert('�������������6~20���ֽ��ڣ�');
document.myform.form_password1.focus();
return false;}
if(document.myform.form_password2.value==""){
alert('��������һ�������룡');
document.myform.form_password2.focus();
return false;}
if(document.myform.form_password2.value.length>20 || document.myform.form_password2.value.length<6){
alert('�������������6~20���ֽ��ڣ�');
document.myform.form_password2.focus();
return false;}
if(document.myform.form_password1.value!=document.myform.form_password2.value) {
alert("�������벻һ��");
document.myform.form_password2.focus();
return false;		
}}
</script><body>
<ul>
<li><a href="a1.php">��������</a></li>
<li><a href="a2.php">��ϸ����</a></li>
<li><a href="a3.php">���Ķ���</a></li>
<li><a href="a4.php">��ϵ����</a></li>
<li><a href="a5.php">Լ�ύ��</a></li>
<li><a href="a6.php">��������</a></li>
<li><a href="a7.php">�쳾֪��</a></li>
<li><a href="a8.php">���̻���</a></li>
<li class="liselect"><a href="a9.php">�޸�����</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br /><br /><br /><br />
  <table width="509" border="0" align="center" cellpadding="2" cellspacing="0">
<form action="" method="post" name=myform  onSubmit="return chkform()">
<tr>
<td width="118" height="40" align="right"><font color="#666666">��������룺</font></td>
<td width="383"><font color="#666666">
  <input name="old_password" type="password"  class=input id="old_password" size="40" maxlength="50" >
  <img src="images/tips.gif" hspace="5" align="absmiddle">��ǰ��¼���룡</font></td>
</tr>
<tr>
<td height="40" align="right"><font color="#666666">�¡��ܡ��룺</font></td>
<td><font color="#666666">
  <input name="form_password1" type="password"  class=input id="form_password1" size="40" maxlength="50" >
  <img src="images/tips.gif" hspace="5" align="absmiddle" />6~20�ֽڣ�</font></td>
</tr>
<tr>
<td height="40" align="right"><font color="#666666">������ȷ�ϣ�</font></td>
<td><font color="#666666">
  <input name="form_password2" type="password"  class=input id="form_password2" size="40" maxlength="100" >
  <img src="images/tips.gif" hspace="5" align="absmiddle" />6~20�ֽڣ�</font></td>
</tr>
<tr>
<td height="55" colspan="2" align="center"><input type=hidden name=submitok value="modupdate">
<input type="submit" name="Submit" value=" �� �� " class="button"></td>
</tr>
</form>
</table><br /><br /><br /><br />
<br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>