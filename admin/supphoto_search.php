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
if($_REQUEST['submitok']=="allupdate"){
		$coun = count($_POST['list']);
		for ($i = 0; $i < $coun; $i++)
        {
         //ɾ������
		  $rt = $db->query("SELECT path_b FROM ".__TBL_SUPPHOTO__." WHERE id=".$list[$i]);
		  if($db->num_rows($rt)){
		 	 $row = $db->fetch_array($rt);
			 $path1    = $row[0];
			 if (file_exists(YZLOVE."up/wzphoto/".$path1))unlink(YZLOVE."up/wzphoto/".$path1);
			 if ($ifmain==1)$db->query("UPDATE ".__TBL_STORY__." SET picurl_s='' WHERE id='$fid'");
		   }
		   $db->query("DELETE  FROM ".__TBL_SUPPHOTO__." where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('ɾ���ɹ���');window.location.href='supphoto_search.php'</script>";
		exit();
}
     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM ".__TBL_SUPPHOTO__."  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM ".__TBL_SUPPHOTO__." WHERE userid =".$adminkeyword." ORDER BY id DESC");
	 }
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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>����ͼƬ����:</b></td>
      </tr>
    </table></td>
    <td width="18%" align="center" style="padding-top:6px;">��¼���� <font color="#FF0000">
      <?php echo $total?>    </font> �� </td>
    <td width="62%" align="right" style="padding-right:5px;">
    <table width="400" height="22" border="0" cellpadding="0" cellspacing="0">
       <form name="form1" method="post" action="">
        <tr>
          <td align="right">���û�ID������
            <input name="adminkeyword" type="text" size="25" maxlength="12" class=input>
            <input type="submit" value=" ���� " class=buttonx></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>
<form name="FORM" method="post" action="?submitok=allupdate">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="66" height="35"><script LANGUAGE="JavaScript">
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
</script>
      <input type="button" style="border:#cccccc 1px solid;padding-top:1px;height:18;font-size:9pt;background:#ffffff;color:#333333;" onClick="this.value=check(this.form)" value="��ʼȫѡ"></td>
    <td width="94" align="right">&nbsp;</td>
    <td width="734" align="center" valign="bottom"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    <td width="79"><input name="submit" type="submit" class=buttonx id="submitok" value="������ɾ��" onClick="return confirm('����������\n\nȷ��ɾ����')"></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<?php
  $iii=1;
     while($rows=$db->fetch_array($rs)){
?>
        <td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px;">
		<table width="140" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;">
          <tr>
            <td height="140" weight="140" colspan="2" align="center" bgcolor=#ffffff><a href="###"   onClick="showModalDialog('piczoom.php?picurl=../up/wzphoto/<?php echo $rows['path_b']; ?>', window, 'dialogWidth:800px; dialogHeight:600px;status:0;help:0;scroll:auto;') ">
			<img src=../up/wzphoto/<?php echo $rows['path_b']; ?> alt="�Ŵ���Ƭ" border="0"></a></td>
          </tr>
          <tr>
             <td height="18" colspan="2" align="center"  bgcolor=#ffffff><font color="#666666"><?php echo $titles; ?></font></td>
          </tr>
          <tr>
             <td height="18" colspan="2" align="center"><font color="#666666"><?php echo $titles; ?></font></td>
          </tr>
          <tr>
             <td colspan="2" bgcolor="#efefef" bgcolor=#ffffff align=center>����ʱ�䣺<font color="#FF0000"><u><?php echo date_format2($rows['addtime'],'%Y��%m��%d�� %Hʱ%M��');?></u></font></td>
          <tr>
             <td width="60" height="5" align="right" bgcolor="#efefef"  style="color:#ff0000" title="����Ƭ"></td>
             <td width="90" align="right" bgcolor="#efefef"><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>" id="chk34" style="border:0px"><label for="chk<?php echo $rows['id']; ?>"><font color="#999999">ѡ��</font></label></td>
          </tr>
        </table>
		</td>
<?php	
	if ($iii%5==0){
       echo '</tr>' ;
    }
    $iii=$iii+1;
         
  }
  
}
    else{
       echo"<br/><br/><br/>&nbsp;&nbsp;&nbsp;Sorry! ...��������...";
 	}


?>
 </table></form>
<?php echo $pagelist; ?><?php echo $pagelistinfo; ?>
<br>
<br>
<br>

<br>
</body>
</html>
 