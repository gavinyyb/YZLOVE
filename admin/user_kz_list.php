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
//echo $_REQUEST['submitok']; exit;


//
if($_REQUEST['submitok']=="delupdate"){
  $fid=$_REQUEST['fid'];
  $db->query("update ".__TBL_MAIN_DATA__." set ifmod=2 where userid=".$fid);
  echo "<script language=\"javascript\">alert('���سɹ���');window.location.href='user_kz_list.php?p=".$p."";
  echo "'</script>";
  exit();

}//
elseif($_REQUEST['submitok']=="allupdate"){
		$coun = count($_REQUEST['list']);
		for ($i = 0; $i < $coun; $i++)
        {
         //
		  $db->query("update ".__TBL_MAIN_DATA__." set ifmod=1 where userid='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('��˳ɹ���');window.location.href='user_kz_list.php?p=".$p."";
		echo $kinds;
		echo "'</script>";
		exit();
}
else
{
    $rs=$db->query("SELECT * FROM ".__TBL_MAIN_DATA__." where ifmod=0");
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 30;
       if ($p<1)$p=1;
       $mypage=new uobarpage($total,$pagesize);
       $pagelist = $mypage->pagebar(1);
       $pagelistinfo = $mypage->limit2();
       mysql_data_seek($rs,($p-1)*$pagesize);
?>

<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" style="border:#dddddd 1px solid;">
  <tr>
    <td width="20%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>��չ�������:</b></td>
      </tr>
    </table></td>
    <td width="18%" align="center" style="padding-top:6px;">��¼���� <font color="#FF0000">
      <?php echo $total?>    </font> �� </td>
    <td width="62%" align="right" style="padding-right:5px;">&nbsp;</td>
  </tr>
</table>

<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
  <form name="FORM" method="post" action="?submitok=allupdate">
<table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td width="9%"><script LANGUAGE="JavaScript">
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
}</script>
      <input type="button" style="border:#cccccc 1px solid;padding-top:1px;height:18;font-size:9pt;background:#ffffff;color:#333333;" onClick="this.value=check(this.form)" value="��ʼȫѡ"></td>
    <td width="53"><input name="submit" type="submit" class=buttonx value="���������" onClick="return confirm('�̡̡̡̡�\n\nȷ��������ˣ�')"></td>
    <td align="center"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    <td width="53">&nbsp;</td>
  </tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
   <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>ID</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>�û���</b></font></td>
    <td width="441" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>�ı�����</b></font></td>
	<td width="62" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>�������</b></font></td>
  </tr>
<?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;
	   if ($rows['flag']==0){
	      $shenhe="δ���";
	   }else{
	      $shenhe="<font color=red>����</font>";
	   }
	   if ($rows['ifjh']==0){
	      $jinghua="��Ϊ����";
	   }else{
	      $jinghua="<img src='images/jh.gif' width='15' height='15' hspace='3' border='0' align='absmiddle'><font color='#FF0000'>ȡ��</font>";
	   }
       $rss=$db->query("SELECT username,regtime,logintime,password FROM ".__TBL_MAIN__."  WHERE id=".$rows['userid']);
       $rowss = $db->fetch_array($rss);
       $username=$rowss[0];
	   $regtime=$rowss[1];
	   $logintime=$rowss[2];
	   $password=$rowss[3];

?>
   <tr bgcolor=#E5E5E5  onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off';>
      <td width="70" height="26" align="center"><input type=checkbox name=list[] value="<?php echo $rows['userid']; ?>" id="chk<?php echo $rows['id']; ?>" class="inputno"> <label for="chk<?php echo $rows['userid']; ?>"><br>
      <?php echo $rows['userid']; ?></label></td>
      <td width="286" align="left" valign="top"><a href="../home/<?php echo $rows['userid']; ?>" class=u333333 target=_blank><?php echo $username; ?></a><font color="#999999"></font><br>
<b><font color=red>ע��ʱ�䣺<?php echo $regtime; ?></b><br>
      <font color="#999999">����¼��<?php echo $logintime; ?></font></td>
      <td valign="top" style="line-height:150%;">��<?php echo $rows['a3']; ?>��<?php echo $rows['a4']; ?>��<?php echo $rows['a5']; ?>��<?php echo $rows['a6']; ?>��<?php echo $rows['a7']; ?>��<?php echo $rows['b16']; ?>��<?php echo $rows['b17']; ?>��<?php echo $rows['b18']; ?>��<?php echo $rows['c8']; ?>��<?php echo $rows['c9']; ?>��<?php echo $rows['c10']; ?>��<?php echo $rows['c11']; ?><br />
	  <a href="../login.php?submitok=checkuseradmin&uid=<?php echo $rows['userid']; ?>&pwd=<?php echo $password; ?>&tmpurl=a2.php" target="_blank"title="���ֱ�ӽ������" class="uFF5494" >�������</a></td>
	  <td width="13" align="center"><a href="?submitok=delupdate&fid=<?php echo $rows['userid']; ?>&p=<?php echo $p;?>" onClick="return confirm('�� �� �� ��\n\n�������Ҫ���������')"><img src="images/delx.gif" width="10" height="10" border="0"></a></td>
    </tr>
 <?php
	}
}else{
  echo"Sorry! ...��������...";
 }


?>
</table>
</form>
</table>
<?php
	}	
?>
<br><br><br>
</body>
</html>
