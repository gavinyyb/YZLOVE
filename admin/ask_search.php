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
  $fid=$_REQUEST['classid'];
  $p=$_REQUEST['p'];
  $db->query("DELETE FROM ".__TBL_ASK__." where id=".$fid);
   $db->query("DELETE FROM ".__TBL_ASK_BBS__." where fid=".$fid);
  echo "<script language=\"javascript\">alert('ɾ���ɹ���');window.location.href='ask_search.php?p=".$p."";
  echo "'</script>";
  exit();

}//
elseif($_REQUEST['submitok']=="allupdate"){
		$coun = count($_POST['list']);
		$kinds=$_REQUEST['kinds'];
		$p=$_REQUEST['p'];
		for ($i = 0; $i < $coun; $i++)
        {
         //
		  $db->query("update ".__TBL_ASK__." set flag=1 where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('��˳ɹ���');window.location.href='ask_search.php?p=".$p."";
		echo $kinds;
		echo "'</script>";
		exit();
}elseif($_REQUEST['submitok']=="jh1"){
       $classid=$_GET['classid'];
	   $p=$_REQUEST['p'];
	   $rst=$db->query("SELECT ifjh FROM ".__TBL_ASK__."  where id=".$classid);
	   $rowst = $db->fetch_array($rst);
       if ($rowst[0]==0){
	      $ifjh=1;
		   //LOVE B ��¼
		$userid=$_REQUEST['userid'];
		$username=$_REQUEST['username'];
		$loveb=$_REQUEST['lovebb'];
		$datetime= date("Y-m-d H:i:s");
	    $content="������������Ϊ��������";
		$renshu=+1000;
        $db->query("INSERT INTO ".__TBL_LOVEBHISTORY__." (userid,username,content,num,addtime)values(".$userid.",'".$username."','".$content."','".$renshu."','".$datetime."')");
		$db->query("update  ".__TBL_MAIN__."  set loveb=loveb".$fenshu." where id=".$userid);
		//
	   }else{
		  $ifjh=0;
	   }
	 //  echo $ifjh."<br>";
	 //  echo $rowst[0];
	//	   exit;
	   //��
       $db->query("update  ".__TBL_ASK__."  set ifjh=".$ifjh." where id=".$classid);
       header("Location: ask_search.php?p=".$p."");
	   exit();

}
else
{
     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM ".__TBL_ASK__."  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM ".__TBL_ASK__." WHERE title like '%".$adminkeyword."%' ORDER BY id DESC");
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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>��������:</b></td>
      </tr>
    </table></td>
    <td width="18%" align="center" style="padding-top:6px;">��¼���� <font color="#FF0000">
      <?php echo $total?>    </font> ƪ </td>
    <td width="62%" align="right" style="padding-right:5px;"><table width="306" height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="">
        <tr>
          <td>������������
            <input name="adminkeyword" type="text" size="25" maxlength="25" class=input>
                <input type="submit" value=" ���� " class=buttonx></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>

<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
  <form name="FORM" method="post" action="?submitok=allupdate">
<table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="53"><input name="submit" type="submit" class=buttonx value="���������" onClick="return confirm('�̡̡̡̡�\n\nȷ��������ˣ�')"></td>
    <td align="center"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    <td width="53">&nbsp;</td>
  </tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
  <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3">
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
      <input type="button" style="border:#cccccc 1px solid;padding-top:1px;height:18;font-size:9pt;background:#ffffff;color:#333333;" onClick="this.value=check(this.form)" value="��ʼȫѡ">    </td>
      <td width="63" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>����</b></font></td>
    <td width="326" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>�ꡡ��</b></font></td>
    <td width="25" align="center" valign="bottom" bgcolor="D3DCE3"><b>��</b></td>
    <td width="96" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>״̬</b></font></td>
    <td width="116" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>����</b></font></td>
    <td width="102" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>����/���</b></font></td>
    <td width="105" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>����</b></font></td>
	<td width="35" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">ɾ��</font></b></td>
  </tr>
<?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;
	   if ($rows['flag']==0){
	      $shenhe="δ���";
	   }elseif($rows['flag']==1){
	      $shenhe="<img src=images/56.gif border=0>";
	   }elseif($rows['flag']==2){
	      $shenhe="<img src=images/57.gif border=0>";
	   }elseif($rows['flag']==3){
	      $shenhe="<img src=images/58.gif border=0>";
	   }elseif($rows['flag']==4){
	      $shenhe="<img src=images/59.gif border=0>";
	   }elseif($rows['flag']==5){
	      $shenhe="<img src=images/60.gif border=0>";
       }

	   if ($rows['ifjh']==0){
	      $jinghua="��Ϊ����";
	   }else{
	      $jinghua="<img src='images/jh.gif' width='15' height='15' hspace='3' border='0' align='absmiddle'><font color='#FF0000'>ȡ��</font>";
	   }
       $rss=$db->query("SELECT username FROM ".__TBL_MAIN__."  WHERE id=".$rows['userid']);
       $rowss = $db->fetch_array($rss);
       $username=$rowss[0];
?>
 <tr bgcolor=#E5E5E5 onMouseOver="this.style.background='#9EDEFF'" onMouseOut="this.style.background='#E5E5E5'">
    <td width="108"><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>"  id="chk<?php echo $rows['id']; ?>" > <label for="chk1"><?php echo $rows['id']; ?></label></td>
    <td width="63" align="center"><a href="?classid=<?php echo $rows['id']; ?>&submitok=jh1&userid=<?php echo $rows['userid']; ?>&username=<?php echo $username; ?>&p=<?php echo $p;?>"><?php echo $jinghua;?></a></td>
    <td width="326"><a href="../clinic/detail<?php echo $rows['id']; ?>.html" target="_blank" class=u000000><img src="images/zoom.gif" width="13" height="13" hspace="3" border="0" align="absmiddle"><?php echo $rows['title']; ?></a><font color="#FF0000"><?php echo $rows['xsloveb']; ?></font></td>
    <td width="25"><a href="javascript:(void);" onClick="showModalDialog('ask_mod.php?classid=<?php echo $rows['id']; ?>', window, 'dialogWidth:800px; dialogHeight:600px;status:0;help:0;scroll:auto;') "><img src="images/fb.gif" alt="�޸�" hspace="2" border="0" align="absmiddle"></a></td>
    <td width="96" align="center"><?php echo $shenhe;?></td>
    <td width="116" align="center"><a href="../home/<?php echo $rows['userid']; ?>" class=u333333 target=_blank><?php echo $username;?></a></td>
    <td align="center" ><font color="#FF0000"><?php echo $rows['hfnum']; ?></font> <font color="#999999">/</font> <font color="#FF0000"><?php echo $rows['click']; ?></font></td>
    <td width="105" align="center"><?php echo $rows['addtime']; ?></td>
	<td width="35" align="center" ><a href="?submitok=delupdate&classid=<?php echo $rows['id']; ?>&p=<?php echo $p;?>" onClick="return confirm('�� �� �� ��\n\n��ȷ��ɾ����\n\n����ɾ������������лظ���')"><img src="images/delx.gif" alt="ɾ��" width="10" height="10" border="0"></a></td>
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
