<?php
/*
+--------------------------------+
+ ����̨�����Ȩ���ڱ�������
+ Author��PSY��wjxxw@vip.qq.com www.linxiaoxian.com��QQ��8437645
+ ���ļ�����޸����ڣ�2010��1��
+ �����޸ģ��뱣��������Ϣ������վû��Ӱ��
+--------------------------------+
*/
require_once '../sub/init.php';
require_once '../sub/conn.php';
require_once '../sub/fun.php';
require_once 'session.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<link href="main.css" rel="stylesheet" type="text/css">
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"  bgcolor=#ffffff>
<?php
$kind=$_GET['kind'];
if ($kind==1){
  $title="�޸�����:";
}
elseif($kind==2){
  $title="�޸��Ա�:";
}

if($_REQUEST['submitok']=="A"){
  $memberid=trim($_REQUEST['memberid']);
  $formpassword1=trim($_REQUEST['formpassword1']);

  //���ID������
  $rt=$db->query("SELECT * FROM ".__TBL_MAIN__." where id=".$memberid);
  $total = $db->num_rows($rt);
  if($total==0){
     echo "<script language=\"javascript\">alert('�û�ID������,�޸�ʧ�ܣ�');history.go(-1)</script>";
	 exit();
  }
  //
  if (strlen($formpassword1)<6||strlen($formpassword1)>12||strlen($memberid)<1){
	echo "<script language=\"javascript\">alert('���볤�Ȳ��Ի����û�ID����Ϊ�գ�');history.go(-1)</script>";
	exit();
  }
  $db->query("update ".__TBL_MAIN__." set password='".md5($formpassword1)."' where id=".$memberid);
  echo "<script language=\"javascript\">alert('�޸ĳɹ�');history.go(-1)</script>";
  exit();
}

if($_REQUEST['submitok']=="B"){
  $memberid=trim($_REQUEST['memberid']);
  $sex=trim($_REQUEST['sex']);

  //���ID������
  $rt=$db->query("SELECT * FROM ".__TBL_MAIN__." where id=".$memberid);
  $total = $db->num_rows($rt);
  if($total==0){
     echo "<script language=\"javascript\">alert('�û�ID������,�޸�ʧ�ܣ�');history.go(-1)</script>";
	 exit();
  }
  //
  if (strlen($memberid)<1){
	echo "<script language=\"javascript\">alert('�û�ID����Ϊ�գ�');history.go(-1)</script>";
	exit();
  }
  $db->query("update ".__TBL_MAIN__." set sex=".$sex." where id=".$memberid);
  echo "<script language=\"javascript\">alert('�޸ĳɹ�');history.go(-1)</script>";
  exit();
}
?>


<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" bgcolor="efefef" style="border:#dddddd 1px solid;">
  <tr>
    <td width="16%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;font-weight:bold"><?php echo $title;?></td>
      </tr>
    </table></td>
    <td width="69%" align="center" valign="bottom" style="color:#999999;font-size:14px;padding-bottom:3px">
	</td>
    <td width="15%" align="left">&nbsp;</td>
  </tr>
</table>
<?php
if ($kind==2){
?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table width="700" height="116" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#FFFFFF">
  <form action=user_pass.php method=post>
    <tr>
      <td width="192" align="right" bgcolor="E5E5E5">&nbsp;</td>
      <td width="478" bgcolor="E5E5E5">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#efefef">�ɣĺţ�</td>
      <td width="478" bgcolor="#efefef"><font color="#666666">
        <input name="memberid" type="text" class="input" id="memberid"size="8" maxlength="20">
      </font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="E5E5E5">�ԡ���</td>
      <td bgcolor="E5E5E5"><input name="sex" type="radio" class="inputno" value="1">�С�<input name="sex" type="radio" class="inputno" value="2">Ů
</td>
    </tr>
    <tr>
      <td align="right" bgcolor="E5E5E5">&nbsp;</td>
      <td bgcolor="E5E5E5"><input type="submit" name="Submit" value=" �ύ " onClick="return confirm('��ȷ���޸ģ� ���μǡ�')" class="buttonx"><input name="submitok" type="hidden" value="B" /><input name="kind" type="hidden" value="2" /></td>
    </tr>
  </form>
</table>
<?php
}
if ($kind==1){
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table width="700" height="116" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#FFFFFF">
  <form action=user_pass.php method=post>
    <tr>
      <td width="192" align="right" bgcolor="E5E5E5">&nbsp;</td>
      <td width="478" bgcolor="E5E5E5">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#efefef">�ɣĺţ�</td>
      <td width="478" bgcolor="#efefef"><font color="#666666">
        <input name="memberid" type="text" class="input" id="memberid"size="8" maxlength="20">
      </font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="E5E5E5">�����룺</td>
      <td bgcolor="E5E5E5"><font color="#666666">
        <input name="formpassword1" type="text" class="input" id="formpassword1" size="40" maxlength="20">
        6~20λ
        <input name="submitok" type="hidden" value="A" /><input name="kind" type="hidden" value="1" />
      </font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="E5E5E5">&nbsp;</td>
      <td bgcolor="E5E5E5"><input type="submit" name="Submit" value=" �ύ " onClick="return confirm('��ȷ���޸ģ� ���μǡ�')" class="buttonx"></td>
    </tr>
  </form>
</table>

<?php
}
?>
</body>
</html>
 
