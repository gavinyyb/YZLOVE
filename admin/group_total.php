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
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<link href="main.css" rel="stylesheet" type="text/css">
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"  bgcolor=#ffffff>
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" bgcolor="efefef" style="border:#dddddd 1px solid;">
  <tr>
    <td width="16%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>Ȧ�Ӵ������:</b></td>
      </tr>
    </table></td>
    <td width="53%" align="center">&nbsp;</td>
    <td width="31%" align="left">&nbsp;</td>
  </tr>
</table>
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">	
<?php
if(empty($_POST['action'])){

	if($_REQUEST['submitok']=="add"){
?>

<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">      <br>
      <br>
      <table width="700" height="116" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="dddddd">
<form action="?submitok=addupdate" method=post>
      <tr>
      <td width="123" align="right" bgcolor="#FFFFFF"><b>Ȧ�Ӵ�������</b>��</td>
      <td width="604" bgcolor="#FFFFFF"><font color="#666666">
        <input name="form_title" type="text" class=input id="form_title" size="30" maxlength="20">
      </font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF"><input type="submit" name="Submit" value=" �ύ " class="buttonx">
          <font color="#666666">
          <input name="submitok" type="hidden" value="addupdate">
          </font></td>
      </tr>
</form>
    </table>
      <br>
      <br>
<?php

	}
	 //���
	if($_REQUEST['submitok']=="addupdate"){
		$form_title=trim($_REQUEST['form_title']);
		if (empty($form_title)){
			echo "<script language=\"javascript\">alert('���ⲻ��Ϊ�գ�');history.go(-1)</script>";
			exit();
		}
		//�ж��Ƿ�����
		$rt=$db->query("SELECT * FROM ".__TBL_GROUP_TOTAL__."  WHERE title='".$form_title."'");
        $total = $db->num_rows($rt);
        if($total>0){
		  echo "<script language=\"javascript\">alert('�������Ѵ���,���ʧ��');history.go(-1)</script>";
		  exit();
		}
		else{
		$addtime= date("Y-m-d H:i:s");
		$db->query("INSERT INTO ".__TBL_GROUP_TOTAL__." (title,addtime)values('".$form_title."','".$addtime."')");
		echo "<script language=\"javascript\">alert('��ӳɹ���');window.location.href='group_total.php'</script>";
		exit();
		}
	}
	//ɾ��
	if($_REQUEST['submitok']=="delupdate"){
		$classid=$_REQUEST['classid'];
		//echo $username;
		$db->query("DELETE  FROM ".__TBL_GROUP_TOTAL__." where id=".$classid);
		echo "<script language=\"javascript\">alert('ɾ���ɹ���');window.location.href='group_total.php'</script>";
		exit();
	}

	//�޸�
	if($_REQUEST['submitok']=="modupdate"){
		$ifflag=trim($_REQUEST['ifflag']);
		$form_title=trim($_REQUEST['form_title']);
		$classid=$_REQUEST['classid'];
		echo $id;
		if (empty($form_title)){
			echo "<script language=\"javascript\">alert('���ⲻ��Ϊ�գ�');history.go(-1)</script>";
			exit();
		}
		$db->query("update ".__TBL_GROUP_TOTAL__." set title='".$form_title."',flag=".$ifflag." where id=".$classid);
		echo "<script language=\"javascript\">alert('�޸ĳɹ���');window.location.href='group_total.php'</script>";
		exit();
	}
?>

<table width="100%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="12%"><input type="button"  value="���Ȧ�Ӵ���" onClick="window.open('?submitok=add','_self')" class="buttonx"></td>
    <td align="right" style="padding-right:5px;"><table width="95%" border="0" cellpadding="0" cellspacing="0">
    </table></td>
  </tr>
</table></td></tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" >
   <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>ID</b></font></td>
    <td width="60" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">״̬</font></b></td>
    <td width="263" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">��������</font></b></td>
    <td width="128" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">Ȧ������</font></b></td>
    <td width="215" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">����ʱ��</font></b></td>
    <td width="35" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">ɾ��</font></b></td>
  </tr>
  <?php
    $rs=$db->query("SELECT * FROM ".__TBL_GROUP_TOTAL__." ORDER BY id DESC");
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 40;
       if ($p<1)$p=1;
       $mypage=new uobarpage($total,$pagesize);
       $pagelist = $mypage->pagebar(1);
       $pagelistinfo = $mypage->limit2();
       mysql_data_seek($rt,($p-1)*$pagesize);
       for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;
	//���	

?>
<form action="?submitok=modupdate" method=post>
    <tr bgcolor=#E5E5E5 onMouseOver="this.style.background='#ffffcc'" onMouseOut="this.style.background='#E5E5E5'">
    <td width="61" height="26" align="center">
      <font color="#666666"><b><?php echo $rows['id']; ?></b></font></td>
    <td align="right" >
      <select name="ifflag" style="font-size:9pt;">
<option value="0" style="color:red;" <?php if ($rows['flag']==0) echo "selected";?>>δ��</option>
<option value="1" style="color:green;" <?php if ($rows['flag']==1) echo "selected";?>>����</option>
<option value="-1" style="color:blue;" <?php if ($rows['flag']==-1) echo "selected";?>>����</option>
</select>
	  </td>
    <td >&nbsp;&nbsp;<input name="form_title" type="text" class="input" id="form_title" value="<?php echo $rows['title']; ?>" size="30" maxlength="20">
      <input type="submit" name="Submit" value="�޸�" class=buttonx>
	 <input type="hidden" name="classid" value="<?php echo $rows['id']; ?>" ></td>
    <td align="center" ><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><b><?php echo $rows['bknum']; ?></b></font></td>
    <td align="center" ><?php echo $rows['addtime']; ?></td>
    <td width="35" align="center" ><a href="?submitok=delupdate&classid=<?php echo $rows['id']; ?>" onClick="return confirm('�� �� �� ��\n\n��ȷ��ɾ����\n\n����ɾ�������������Ȧ�ӡ�')"><img src="images/delx.gif" alt="ɾ��" width="10" height="10" border="0"></a></td>
  </tr>
</form>

 <?php 
	 }
   } else{
       echo"<br/><br/><br/>&nbsp;&nbsp;&nbsp;Sorry! ...��������...";
 	}
}
else{
?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="10">
  <tr> 
    <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="15">
        <tr> 
          <td align="center"><table width="100%" border="0" cellpadding="6" cellspacing="0" class="border2">
              <tr>
                <td align="center">
    <?php
			  $formpassword1=trim($_POST['formpassword1']);
			  $formpassword2=trim($_POST['formpassword2']);
			  if ($formpassword1!=$formpassword2){
				 echo "<script language=\"javascript\">alert('�������벻һ�������������룡');history.go(-1)</script>";
				 exit();
			  }
			  if (strlen($formpassword1)<6||strlen($formpassword1)>12||strlen($formpassword2)<6||strlen($formpassword2)>12){
				 echo "<script language=\"javascript\">alert('���볤�ȱ�����6-20λ֮�䣬���������룡');history.go(-1)</script>";
				 exit();
			  }

			  //��ʼ�޸�����
			  $db->query("update yzlove_admin set password='".md5($formpassword1)."' where username='".$_SESSION['adminname']."'");
			  echo "<script language=\"javascript\">alert('�����޸ĳɹ���');history.go(-1)</script>";
		      exit();
?>
                </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php }?>
</table>
</body>
</html>
