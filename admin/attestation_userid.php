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

if($_REQUEST['submitok']=="modupdate"){
  $memberid=trim($_REQUEST['memberid']);
  $ifphoto=trim($_REQUEST['ifphoto']);
  if (empty($ifphoto)) $ifphoto=0 ;
  $ifbirthday=trim($_REQUEST['ifbirthday']);
  if (empty($ifbirthday)) $ifbirthday=0 ;
  $iflove=trim($_REQUEST['iflove']);
  if (empty($iflove)) $iflove=0 ;
  $ifpay=trim($_REQUEST['ifpay']);
  if (empty($ifpay)) $ifpay=0 ;
  $ifedu=trim($_REQUEST['ifedu']);
  if (empty($ifedu)) $ifedu=0 ;
  $ifhouse=trim($_REQUEST['ifhouse']);
  if (empty($ifhouse)) $ifhouse=0 ;
  $ifcar=trim($_REQUEST['ifcar']);
  if (empty($ifcar)) $ifcar=0 ;

  //���ID������
  $rt=$db->query("SELECT * FROM ".__TBL_MAIN__." where id=".$memberid);
  $total = $db->num_rows($rt);
  if($total==0){
     echo "<script language=\"javascript\">alert('�û�ID������,�޸�ʧ�ܣ�');history.go(-1)</script>";
	 exit();
  }
  //


  $db->query("update ".__TBL_MAIN__." set ifphoto=".$ifphoto.",ifbirthday=".$ifbirthday.",iflove=".$iflove.",ifpay=".$ifpay.",ifedu=".$ifedu.",ifhouse=".$ifhouse.",ifcar=".$ifcar." where id=".$memberid);
  echo "<script language=\"javascript\">alert('��֤�ɹ�');history.go(-1)</script>";
  exit();
}
?>


<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" bgcolor="efefef" style="border:#dddddd 1px solid;">
  <tr>
    <td width="16%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;font-weight:bold">�ֶ�ǿ����֤:</td>
      </tr>
    </table></td>
    <td width="69%" align="center" valign="bottom" style="color:#999999;font-size:14px;padding-bottom:3px">
	</td>
    <td width="15%" align="left">&nbsp;</td>
  </tr>
</table>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table width="700" height="116" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#FFFFFF">
  <form action=attestation_userid.php method=post>
    <tr>
      <td width="257" align="right" bgcolor="#efefef">&nbsp;</td>
      <td width="416" bgcolor="#efefef">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#efefef">�ɣġ��ţ�</td>
      <td width="416" bgcolor="#efefef"><font color="#666666">
        <input name="memberid" type="text" class="input" id="memberid"size="6" maxlength="20">
      ����д����</font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#f3f3f3"><b>��֤��Ŀ</b>��<br>
      <br>
      <font color=red>��Ϊͨ����֤������Ϊɾ����֤</font></td>
      <td bgcolor="#f3f3f3"><input name="ifphoto" type="checkbox" value="1">
        �� �� ��<br>
        <input name="ifbirthday" type="checkbox" value="1" >
          ��������<br>
        <input name="ifheigh" type="checkbox" value="1">
          ������<br>
          <input name="iflove" type="checkbox" value="1">
          �顡����<br />
          <input name="ifpay" type="checkbox" value="1">
          �ա�����
          <br>
          <input name="ifedu" type="checkbox" value="1">
          ѧ������<br>
        <input name="ifhouse" type="checkbox" value="1">
          ��������<br>
        <input name="ifcar" type="checkbox" value="1">
      ��������</td>
    </tr>
    <tr>
      <td height="50" align="right" bgcolor="#efefef">&nbsp;</td>
      <td bgcolor="#efefef"><input type="submit" name="Submit" value=" �ύ " class="buttonx">
        <font color="#666666">
        <input name="submitok" type="hidden" value="modupdate" />
      </font></td>
    </tr>
  </form>
</table>
</body>
</html>
 
