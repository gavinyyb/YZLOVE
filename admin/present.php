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
switch ($kind){
  case 1:
    $title="ף��";
  break;
  case 2:
    $title="����";
  break;
  case 3:
    $title="����";
  break;
  case 4:
    $title="����";
  break;
  case 5:
    $title="����";
  break;
  case 6:
    $title="����";
  break;
  case 7:
    $title="����";
  break;
  case 8:
    $title="���";
  break;
  case 9:
    $title="���¼�";
  break;
  case "";
    $title="ȫ��";
  break;
}
 if ($kind==""||empty($kind)){
   $sql="select * from ".__TBL_PRESENT__." order by id desc";
 }else{
   $sql="select * from ".__TBL_PRESENT__." where kind=".$kind." order by id desc";
 }

?>
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" bgcolor="efefef" style="border:#dddddd 1px solid;">
  <tr>
    <td width="16%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;font-weight:bold">�������-<?php echo $title;?>:</td>
      </tr>
    </table></td>
      <td width="69%" align="center" valign="bottom" style="color:#999999;font-size:14px;padding-bottom:3px">
<a href="present.php" class=u333333>ȫ��</a> | 
<a href="present.php?kind=1" class=u333333>ף��</a> | 
<a href="present.php?kind=2" class=u333333>����</a> | 
<a href="present.php?kind=3" class=u333333>����</a> | 
<a href="present.php?kind=4" class=u333333>����</a> | 
<a href="present.php?kind=5" class=u333333>����</a> | 
<a href="present.php?kind=6" class=u333333>����</a> | 
<a href="present.php?kind=7" class=u333333>����</a> | 
<a href="present.php?kind=8" class=u333333>���</a> | 
<a href="present.php?kind=9" class=u333333>���¼�</a></td>
    <td width="15%" align="left">&nbsp;</td>
  </tr>
</table>

<?php
//
//=================
$submitok=$_REQUEST['submitok'];
switch ($submitok){
	case "addupdate":
		if ( !ereg("^[0-9]{1,3}$",$kinds) || empty($kinds))callmsg("��ѡ�����","-1");
		if ( !ereg("^[0-9]{1,9}$",$price))callmsg("������۸�","-1");
		$uptypes=array('image/jpg','image/jpeg','image/pjpeg','image/gif','image/x-png'); 
		$max_file_size=300000;
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($_FILES["pic"][tmp_name]) ){ 
			$file = $_FILES["pic"]; 
			if($max_file_size < $file["size"])callmsg("��Ƭ̫�󣬲��ó���300K������!","-1");
			if(!in_array($file["type"],$uptypes))callmsg("��Ƭ���Ͳ�����ֻ����.jpg��.gif��png������!","-1");
			$filepath = YZLOVE."up/present/";
			$savename = $kind."_".cdstr(20).".";
			$filename=$file["tmp_name"];
			$image_size = getimagesize($filename); 
			$pinfo=pathinfo($file["name"]); 
			$ftype=$pinfo['extension']; 
			$destination =  $filepath.$savename.$ftype; 
			if(!move_uploaded_file ($filename, $destination))callmsg("�ƶ���Ƭ����","-1");
			$picurl = $savename.$ftype;
		}
		$db->query("INSERT INTO ".__TBL_PRESENT__." (kind,price,picurl) VALUES ($kinds,$price,'$picurl')");
		header("Location: present.php?kind=".$kinds);
		exit;
	break;
	case "delupdate":
		$coun = count($_POST['list']);
		for ($i = 0; $i < $coun; $i++)
        {
         //ɾ������
		
				$rt = $db->query("SELECT picurl FROM ".__TBL_PRESENT__." WHERE id=".$list[$i]);
				if($db->num_rows($rt)){
					$row = $db->fetch_array($rt);
					$path1    = $row[0];
					if (file_exists(YZLOVE."up/present/".$path1))unlink(YZLOVE."up/present/".$path1);
				}
				$db->query("DELETE FROM ".__TBL_PRESENT__." WHERE id=".$list[$i]);
				$db->query("DELETE FROM ".__TBL_PRESENT_USER__." WHERE kid=".$list[$i]);
		}
		echo "<script language=\"javascript\">alert('ɾ���ɹ���');window.location.href='present.php'</script>";
		exit();
	break;
	case 'delpicupdate':
		if ( !ereg("^[0-9]{1,5}$",$classid) || empty($classid))callmsg("Forbidden!","-1");
		$rt = $db->query("SELECT picurl FROM ".__TBL_PRESENT__." WHERE id=".$classid);
		if($db->num_rows($rt)){
			$row = $db->fetch_array($rt);
			$path1    = $row[0];
			if (file_exists(YZLOVE."up/present/".$path1))unlink(YZLOVE."up/present/".$path1);
		}
		$db->query("UPDATE ".__TBL_PRESENT__." SET picurl='' WHERE id=".$classid);
		header("Location: present.php?submitok=mod&classid=".$classid."&p=".$p);
		exit;
	break;
	case "modupdate":
		if ( !ereg("^[0-9]{1,9}$",$classid) || empty($classid))callmsg("Forbidden","-1");
		if ( !ereg("^[0-9]{1,3}$",$kinds) || empty($kinds))callmsg("��ѡ�����","-1");
		if ( !ereg("^[0-9]{1,9}$",$price))callmsg("������۸�","-1");
		$uptypes=array('image/jpg','image/jpeg','image/pjpeg','image/gif','image/x-png'); 
		$max_file_size=300000;
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($_FILES["pic"][tmp_name]) ){ 
			$file = $_FILES["pic"]; 
			if($max_file_size < $file["size"])callmsg("��Ƭ̫�󣬲��ó���300K������!","-1");
			if(!in_array($file["type"],$uptypes))callmsg("��Ƭ���Ͳ�����ֻ����.jpg��.gif��png������!","-1");
			$filepath = YZLOVE."up/present/";
			$savename = $kind."_".cdstr(20).".";
			$filename=$file["tmp_name"];
			$image_size = getimagesize($filename); 
			$pinfo=pathinfo($file["name"]); 
			$ftype=$pinfo['extension']; 
			$destination =  $filepath.$savename.$ftype; 
			if(!move_uploaded_file ($filename, $destination))callmsg("�ƶ���Ƭ����","-1");
			$picurl = $savename.$ftype;
			$db->query("UPDATE ".__TBL_PRESENT__." SET picurl='$picurl' WHERE id=".$classid);
		}
		$db->query("UPDATE ".__TBL_PRESENT__." SET kind=$kinds,price=$price WHERE id=".$classid);
		header("Location: present.php?kind=".$kinds);
		exit;
	break;
	case "add":
		addpresent();
	break;
	case "add":
		addpresent();
	break;
	case "mod":
		//��ʼ�޸�
		 $classid=$_GET['classid'];
	     $SQL2="SELECT * FROM ".__TBL_PRESENT__." WHERE id=".$classid;
         $rs=$db->query($SQL2);
	     $rows = $db->fetch_array($rs);
?>
         <br>
         <br>
         <br>
         <script language="JavaScript" type="text/javascript">
           function chk(){
	         if(document.yzloveform.kinds.value==""){
	            alert('��ѡ�����');
	            document.yzloveform.kinds.focus();
	            return false;
	         }
            }
          </script>
          <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="dddddd" id="addpersent">
          <form name=yzloveform  method=post action="present.php"  enctype="multipart/form-data" onSubmit="return chk()">
           <tr bgcolor="#FFFFFF">
      <td width="12%" height="-1" align="right" bgcolor="#FFFFFF">�ࡡ����</td>
      <td width="88%" valign="bottom" bgcolor="#FFFFFF"><select name="kinds" id="kinds">
        <option value="" selected>ѡ��</option>
        <option value="1" <?php if ($rows['kind']==1) echo"selected"; ?>>ף��</option>
        <option value="2" <?php if ($rows['kind']==2) echo"selected"; ?>>����</option>
        <option value="3" <?php if ($rows['kind']==3) echo"selected"; ?>>����</option>
        <option value="4" <?php if ($rows['kind']==4) echo"selected"; ?>>����</option>
        <option value="5" <?php if ($rows['kind']==5) echo"selected"; ?>>����</option>
        <option value="6" <?php if ($rows['kind']==6) echo"selected"; ?>>����</option>
        <option value="7" <?php if ($rows['kind']==7) echo"selected"; ?>>����</option>
        <option value="8" <?php if ($rows['kind']==8) echo"selected"; ?>>���</option>
        <option value="9" <?php if ($rows['kind']==9) echo"selected"; ?>>���¼�</option>
                  </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="-1" align="right" bgcolor="#FFFFFF">�ۡ�����</td>
      <td valign="bottom" bgcolor="#FFFFFF"><font color="#666666">
        <input name="price" type="text" class="input" id="price" style="font-size:9pt;" value="<?php echo $rows['price'];?>" size="8" maxlength="8"  onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;">
        <font color="#FF6699">��Love��</font></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="2" align="right" bgcolor="#FFFFFF">ͼ����Ƭ</td>
      <td valign="bottom">
	     <?php if (empty($rows['picurl'])){
		 ?>
            <input name="pic" type="file" id="inp"  style="font-size:9pt;" size="40"  class="input" >(.gif��.jpg��.png ��ʽ)
	     <?php 
		  }else{
		 ?>
	        <img src=../up/present/<?php echo $rows['picurl'];?> border="0" align="absmiddle"> ��<a href="present.php?classid=<?php echo $rows['id'];?>&submitok=delpicupdate" onClick="return confirm('�� �� �� ��\n\n��ȷ��ɾ���� �˲���������ɾ����Ա֮����������ݿ⣬�����أ�')"><img src="images/del.gif" title="ɾ��" width="53" height="24" border="0"></a><br>
            <font color="7E937E"><img src="images/tips.gif" alt="��ʾ" width="16" height="16" hspace="2" vspace="5" align="absmiddle"><font color="#999999">ɾ��֮��Ϳ��������ϴ�</font></font>
	      <?php }?>
	  </td>
    </tr>
    <tr>
      <td height="13" align="right" bgcolor="#FFFFFF">
      <input name="submitok" type="hidden" value="modupdate">
      <input name="classid" type="hidden" value="<?php echo $rows['id'];?>">
      <td height="50" valign="top" bgcolor="#FFFFFF"><input type="submit" name="Submit222" value=" �� �� " class=buttonx></td>
    </tr>
  </form>
</table>
<br>
<br><hr size="5">
<br>

<?php
	break;
}
//
//��ʼ���ü�¼
    $rs=$db->query($sql);
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
<form name="FORM" method="post" action="present.php?p=1">
<table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#ddd 1px solid">
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
    <td width="94" align="right">
      <input type="button"  value="�������" onClick="window.open('present.php?submitok=add&kind=<?php echo $kind;?>#addpersent','_self')" class="buttonx"></td>
    <td width="734" align="center" valign="middle" style="color:#666"></td>
    <input name="submitok" type="hidden" value="delupdate">
    <td width="79"><input name="piliangshanchu" type="submit" class=buttonx id="piliangshanchu" value="������ɾ��" onClick="return confirm('����������\n\nȷ��ɾ����')"></td>
  </tr>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr>
<?php
	     $iii=1;
         while($rows=$db->fetch_array($rs)){
			 if (empty($rows['picurl'])){
			    $pic="��ͼ" ;
			 }else{
			    $pic="<img src=../up/present/".$rows['picurl']." width='64' height='64' border='0' />" ;
			 }
             $kindd=$rows['kind'];
             switch ($kindd){
               case 1:
                 $titles="ף��";
               break;
               case 2:
                 $titles="����";
               break;
               case 3:
                 $titles="����";
               break;
               case 4:
                 $titles="����";
               break;
               case 5:
                 $titles="����";
               break;
               case 6:
                 $titles="����";
               break;
               case 7:
                 $titles="����";
               break;
               case 8:
                 $titles="���";
               break;
               case 9:
                 $titles="���¼�";
               break;
               case "";
                 $titles="ȫ��";
               break;
}
?>


        <td align="center" valign="top" bgcolor="#FFFFFF" style="padding:10px 0 10px 0;">
		  <table width="70" border="0" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF" style="border:#efefef 1px solid;">
            <tr>
              <td height="64" colspan="2" align="center" bgcolor="#efefef" style="color:#999999"><?php echo $pic; ?></td>
            </tr>
            <tr>
              <td height="18" colspan="2" align="center" bgcolor="#FFFFCC"  style="color:#ff0000"><img src="images/loveb.gif"><?php echo $rows['price']; ?></td>
            </tr>
             <tr>
              <td colspan="2" align="center" style="color:#999999"><?php echo $titles; ?> px:<?php echo $rows['px']; ?></td>
            <tr>
              <td width="31" height="5" align="left" valign="bottom" bgcolor="#efefef" style="color:#999999"><a href="present.php?classid=<?php echo $rows['id']; ?>&submitok=mod"><img src="images/fb.gif" hspace="2"><font color="#999999">��</font></a></td>
              <td width="33" align="right" valign="bottom" bgcolor="#efefef" style="color:#999999"><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>" id="chk<?php echo $rows['id']; ?>" style="border:0px"><label for="chk<?php echo $rows['id']; ?>">ѡ</label></td>
           </tr>
          </table>
		 </td>
 
<?php	
	        if ($iii%10==0){
               echo '</tr>' ;
            }
            $iii=$iii+1;
         
         }
	}
      else{
         echo"<br/><br/><br/>&nbsp;&nbsp;&nbsp;Sorry! ...��������...<a href=present.php?submitok=add&kind=";
         echo $kind;
         echo "><b><u>����������</u></b></a>";
 	}

echo "</table></form>";



function addpresent(){
?>
<br>
<br>
<br>
<script language="JavaScript" type="text/javascript">
function chk(){
	if(document.yzloveform.kinds.value==""){
	alert('��ѡ�����');
	document.yzloveform.kinds.focus();
	return false;
	}
}
</script>
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="dddddd" id="addpersent">
  <form name=yzloveform  method=post action="present.php"  enctype="multipart/form-data" onSubmit="return chk()">
    <tr bgcolor="#FFFFFF">
      <td width="12%" height="-1" align="right" bgcolor="#FFFFFF">�ࡡ����</td>
      <td width="88%" valign="bottom" bgcolor="#FFFFFF"><select name="kinds" id="kinds">
        <option value="" selected>ѡ��</option>
        <option value="1">ף��</option>
        <option value="2">����</option>
        <option value="3">����</option>
        <option value="4">����</option>
        <option value="5">����</option>
        <option value="6">����</option>
        <option value="7">����</option>
        <option value="8">���</option>
        <option value="9">���¼�</option>
                  </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="-1" align="right" bgcolor="#FFFFFF">�ۡ�����</td>
      <td valign="bottom" bgcolor="#FFFFFF"><font color="#666666">
        <input name="price" type="text" class="input" id="price" style="font-size:9pt;" value="500" size="8" maxlength="8"  onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;">
        <font color="#FF6699">��Love��</font></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="2" align="right" bgcolor="#FFFFFF">ͼ����Ƭ</td>
      <td valign="bottom">
        <input name="pic" type="file" id="inp"  style="font-size:9pt;" size="40"  class="input" >
      (.gif��.jpg��.png ��ʽ)</td>
    </tr>
    <tr>
      <td height="13" align="right" bgcolor="#FFFFFF">
<input name="submitok" type="hidden" value="addupdate">
      <td height="50" valign="top" bgcolor="#FFFFFF"><input type="submit" name="Submit222" value=" �� �� " class=buttonx></td>
    </tr>
  </form>
</table>
<br>
<br><hr size="5">
<br>


<?php
}


?>
