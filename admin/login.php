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
session_start();
?>
<html><head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Web manage publishing-<?php echo $m_sitename;?></title>
<link href="main.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#CFAFCE" leftmargin="0" topmargin="0">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br><br>
<br>
<?php 
if(empty($_POST['action'])){
	include 'include/code.php';
$s = new code();
$s->genimg();
?>
<script language="javascript">
function chkform() {
	if (myform.userr.value == ""){
		alert("Username:Empty!");
		document.myform.userr.focus();
		return false;
	}
	if (myform.pwd.value == ""){
		alert("Password:Empty!");
		document.myform.pwd.focus();
		return false;
	}
	if (myform.verifycode.value == ""){
		alert("Verifycode:Empty!");
		document.myform.verifycode.focus();
		return false;
	}
}
</script>
<form name="myform" method="post" action="<?php $_SERVER['PHP_SELF']?>" onSubmit="return chkform()">
<table width="530" height="218" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#cccccc" style="border-collapse: collapse;border:#F1B5CF 0px solid">
  <tr bgcolor="ff6600"> 
    <td height="12" align="left" bgcolor="#FFFFFF" style="color: #000000; "><img src="../images/logo.gif" width="210" height="45" vspace="10" align="absmiddle" ></td>
    <td height="12" align="right" bgcolor="#FFFFFF" style="color: #999999;padding-right:10px"><b><font face="Arial, Helvetica, sans-serif" style="font-size:16px;"><?php echo $m_sitename;?> </font></b><br>
  </tr>
  <tr bgcolor="ff6600">
    <td height="12" align="left" bgcolor="#F2D3F5">&nbsp;</td>
    <td height="12" align="left" bgcolor="#F2D3F5">&nbsp;</td>
  </tr>
  <tr> 
    <td height="30" align="right" bgcolor="#F2D3F5" style="color: #FFFFFF"><b><font color="#333333" face="Arial, Helvetica, sans-serif">��&nbsp;&nbsp;&nbsp;&nbsp;��</font></b><font color="#333333" face="Arial, Helvetica, sans-serif">��</font></td>
    <td width="318" height="9" bgcolor="#F2D3F5"><input name="userr" id="userr" style="font-family: ����; font-size: 12px; background-color: #ffffff;height:22px" size="28" maxlength="20" class="login"></td>
  </tr>
  <tr> 
    <td width="210" height="30" align="right" bgcolor="#F2D3F5" style="color: #FFFFFF"><b><font color="#333333" face="Arial, Helvetica, sans-serif">��&nbsp;&nbsp;&nbsp;&nbsp;��</font></b><font color="#333333" face="Arial, Helvetica, sans-serif">��</font></td>
    <td width="318" height="18" bgcolor="#F2D3F5"> 
    <input name="pwd"  type="password" style="font-family: ����;font-size:12px;height:22px" size="28" maxlength="20" class="login"></td>
  </tr>
  <tr> 
    <td width="210" height="30" align="right" bgcolor="#F2D3F5" style="color: #FFFFFF"><b><font color="#333333" face="Arial, Helvetica, sans-serif">��֤��</font></b><font color="#333333" face="Arial, Helvetica, sans-serif">��</font></td>
    <td width="318" height="18" bgcolor="#F2D3F5"><table width="100" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="42"><input name="verifycode" style="font-family: ����; font-size: 12px; background-color: #ffffff;height:22px" size="7" maxlength="4" class="login"></td>
          <td width="58">&nbsp;<IMG SRC='<?php echo 'imcode.png?'.time();?>' WIDTH='50' HEIGHT='25' BORDER=0 ALT='' style="cursor:pointer;" /></td>
        </tr>
    </table></td>
  </tr>
  <input name="action" type="hidden" id="action" value="add"> 
  <tr> 
    <td width="210" height="60" bgcolor="#F2D3F5">��</td>
    <td width="318" height="40" valign="top" bgcolor="#F2D3F5"> 
    <input type="submit" value=" Login " style="font-family:Arial; font-size: 12px;padding-top:2px;font-weight:bold;" class="buttonx"></td>
  </tr>
</table>
</form>
<?php 
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
		 $unum_temp=$_POST['verifycode'];
		 if($unum_temp==$_SESSION["code"])
		    {
			  $admin_user=trim($_POST['userr']);
              $admin_pass=md5(trim($_POST['pwd']));
			  

			  $rs = $db->query("select * from yzlove_admin where username='".$admin_user."' and password='".$admin_pass."'");
			  //echo $admin_pass ;
			  //echo exit;
				if(!$db->num_rows($rs)){
					echo "<script language=\"javascript\">alert('�ʺ����벻��ȷ�������벻��ȷ��');history.go(-1)</script>";
                } 
				else {
					    $row = $db->fetch_array($rs);
                        //����session
						$_SESSION['adminpass']=trim($admin_pass);
						$_SESSION['adminname']=trim($admin_user);
						$_SESSION['id']=$row[0];
					//	echo $id;
					//	exit;
						$ips=GetIP();
						$datetime= date("Y-m-d H:i:s");
						$db->query("update yzlove_admin set endip='".$ips."',endtime='".$datetime."',logincount=logincount+1 where id=".$row[0]);
				//		echo $_SESSION['flag'];
				//		exit;
						echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
						
					}
		}else{
			echo "<script language=\"javascript\">alert('�Բ�����֤�벻��ȷ�����������롭��');history.go(-1)</script>";
		}
?>
                </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php }?>
</body>
</html>
