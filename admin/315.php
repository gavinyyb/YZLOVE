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
		$coun = count($_POST['list']);
		for ($i = 0; $i < $coun; $i++)
        {
         //ɾ������
		  $db->query("DELETE  FROM yzlove_315 where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('ɾ���ɹ���');window.location.href='315.php'</script>";
		exit();
}
?>
<form name="FORM" method="post" action="315.php">
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" style="border:#dddddd 1px solid;">
  <tr>
    <td width="23%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>�ٱ�����:</b></td>
      </tr>
    </table></td>
    <td width="22%" align="center"></td>
      </tr>
</table>
<?php
     $rs=$db->query("SELECT * FROM yzlove_315 ORDER BY id DESC");
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 40;
       if ($p<1)$p=1;
       $mypage=new uobarpage($total,$pagesize);
       $pagelist = $mypage->pagebar(1);
       $pagelistinfo = $mypage->limit2();
       mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td width="9%">
<script LANGUAGE="JavaScript">
<!-- Begin
var checkflag = "false";
function check(field) {
	if (checkflag == "false") {
		for (i = 0; i < field.length; i++) {
			field[i].checked = true;
		}
		checkflag = "true";
		return "ȡ��ȫѡ"; 
	} else {
		for (i = 0; i < field.length; i++) {
			field[i].checked = false;
		}
		checkflag = "false";
		return "��ʼȫѡ"; 
	}
}
//  End -->

    </script>
      <input type="button" style="border:#cccccc 1px solid;padding-top:1px;height:18;font-size:9pt;background:#ffffff;color:#333333;" onClick="this.value=check(this.form)" value="��ʼȫѡ"></td>
    <td width="18%">&nbsp;</td>
    <td width="65%" align="center">&nbsp;<?php echo $pagelist; ?><?php echo $pagelistinfo; ?>&nbsp;</td>
	<td width="22%" align="right" style="padding-right:5px;"><input name="submitok" type="submit" class=buttonx id="submitok" value="��ɾ��" onClick="return confirm('����������\n\nȷ��ɾ����')"></td>
  </tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
   <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>ID</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>�ٱ���</b></font></td>
    <td width="231" align="center" valign="bottom" bgcolor="D3DCE3"><b>�ٱ�ҳ���ַ</b></td>
    <td width="275" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">�ٱ�����</font></b></td>
    <td width="79" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>�ٱ�ʱ��</b></font></td>
  </tr>
  <?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;	

?>
  <tr bgcolor=E5E5E5  onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off';>
      <td width="46" height="26"><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>" id="chk<?php echo $rows['id']; ?>" class="input"> <label for="chk<?php echo $rows['id']; ?>"><?php echo $rows['id']; ?></label></td>
      <td width="112" align="center"><a href="../home/<?php echo $rows['userid']; ?>" class=u333333 target=_blank><?php echo $rows['usernamenickname']; ?></a></td><input type=hidden name=submitok value="modupdate">
      <td style="line-height:150%;"><a href="<?php echo $rows['url']; ?>" target="_blank"><?php echo $rows['url']; ?></a></td>
      <td style="line-height:150%;"><?php echo $rows['content']; ?></td>
      <td width="79" style="line-height:150%;"><b><font color=red>      <?php echo $rows['addtime']; ?></td>
    </tr>
<?php
	}
}else{
  echo"Sorry! ...��������...";
}
?>  </table>
<br></form>
<?php echo $pagelist; ?><?php echo $pagelistinfo; ?>
<br>
<br>
<br>

<br>
</body>
</html>
 
