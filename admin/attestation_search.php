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
  $db->query("DELETE FROM ".__TBL_ATTESTATION__." where id=".$fid);
   $db->query("DELETE FROM ".__TBL_ATTESTATION__." where fid=".$fid);
  echo "<script language=\"javascript\">alert('ɾ���ɹ���');window.location.href='diary_search.php?p=".$p."";
  echo "'</script>";
  exit();

}//
elseif($_REQUEST['submitok']=="allupdate"){
		$classid=$_REQUEST['classid'];
		$userid=$_REQUEST['userid'];
		$rzid=$_REQUEST['rzid'];
		$p=$_REQUEST['p'];
		$db->query("update ".__TBL_ATTESTATION__." set flag=1 where id=".$classid);
          switch ($rzid){ 
            case 1:$ifrzxm="ifphoto";break;
            case 2:$ifrzxm="ifbirthday";break;
            case 3:$ifrzxm="ifheigh";break;
            case 4:$ifrzxm="iflove";break;
            case 5:$ifrzxm="ifpay";break;
            case 6:$ifrzxm="ifedu";break;
            case 7:$ifrzxm="ifhouse";break;
            case 8:$ifrzxm="ifcar";break;
         }
        $db->query("update ".__TBL_MAIN__." set ".$ifrzxm."=1 where id=".$userid);
		echo "<script language=\"javascript\">alert('��˳ɹ���');window.location.href='attestation_search.php?p=".$p;
		echo $kinds;
		echo "'</script>";
		exit();
}elseif($_REQUEST['submitok']=="allno"){
     $classid=$_REQUEST['classid'];
	 $p=$_REQUEST['p'];
		$userid=$_REQUEST['userid'];
		$rzid=$_REQUEST['rzid'];
		$p=$_REQUEST['p'];
		$db->query("update ".__TBL_ATTESTATION__." set flag=0 where id=".$classid);
          switch ($rzid){ 
            case 1:$ifrzxm="ifphoto";break;
            case 2:$ifrzxm="ifbirthday";break;
            case 3:$ifrzxm="ifheigh";break;
            case 4:$ifrzxm="iflove";break;
            case 5:$ifrzxm="ifpay";break;
            case 6:$ifrzxm="ifedu";break;
            case 7:$ifrzxm="ifhouse";break;
            case 8:$ifrzxm="ifcar";break;
         }
        $db->query("update ".__TBL_MAIN__." set ".$ifrzxm."=0 where id=".$userid);
		echo "<script language=\"javascript\">alert('������˳ɹ���');window.location.href='attestation_search.php?p=".$p;
		echo $kinds;
		echo "'</script>";
		exit();
}
else
{
     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM ".__TBL_ATTESTATION__."  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM ".__TBL_ATTESTATION__." WHERE userid =".$adminkeyword." ORDER BY id DESC");
	 }
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 20;
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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>ʵ����֤:</b></td>
      </tr>
    </table></td>
    <td width="18%" align="center" style="padding-top:6px;">��¼���� <font color="#FF0000">
      <?php echo $total?>    </font> ƪ </td>
    <td width="62%" align="right" style="padding-right:5px;">
	<table width="306" height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="">
        <tr>
          <td>���û�ID��������
            <input name="adminkeyword" type="text" size="20" maxlength="20" class=input>
                <input type="submit" value=" ���� " class=buttonx></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>

<form name="FORM" method="post" action="/theadmins/attestation.php?p=1">
<table width="98%" height="52" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td width="9%" align="left" valign="bottom">
      </td>
      <td width="10%" align="left" valign="bottom" style="padding-right:5px;">&nbsp;</td>
      <td width="59%" align="center" style="padding-right:5px;"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
      <td width="22%" align="right" valign="bottom" style="padding-right:5px;">&nbsp;</td>
    </tr>
</table>
 <table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
      <tr bgcolor="#FFFFFF">
      <td height="20" align="center" valign="bottom" background="images/22.gif"><font color="#000000">�� ��</font></td>
      <td height="22" align="center" valign="bottom" background="images/22.gif"><font color="#000000">�ύ��</font></td>
      <td width="167" align="center" valign="bottom" background="images/22.gif"><font color="#000000">�ύʱ��</font></td>
      <td width="111" align="center" valign="bottom" background="images/22.gif"><font color="#000000">��֤��Ŀ</font></td>
      <td width="225" align="center" valign="bottom" background="images/22.gif">��������</td>
      <td width="110" align="center" valign="bottom" background="images/22.gif"><font color="#000000">֤�����������</font></td>
    </tr>
<?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;
	   if ($rows['flag']==0){
	      $shenhe="( δ��֤ )";
		  $color="#ffffaa";
	   }elseif($rows['flag']==1){
	      $shenhe="<font color=red>( ����֤ )</font>";
		  $color="#efefef";
	   }
       $rss=$db->query("SELECT username,birthday,heigh,love,pay,edu,house,car FROM ".__TBL_MAIN__."  WHERE id=".$rows['userid']);
       $rowss = $db->fetch_array($rss);
       $username=$rowss[0];
	   if ($rows['rzid']==1){
	      $rzid="��Ƭ��֤";
		  $rzxm="<img src=../up/papers/".$rows['path_b']." width=100 height=75 border=0 />";
	   }elseif ($rows['rzid']==2){
	      $rzid="������֤";
		  $rzxm=$rowss[1];
	   }
	   elseif ($rows['rzid']==3){
	      $rzid="�����֤";
		  $rzxm=$rowss[2]." CM";
	   }
	   elseif ($rows['rzid']==4){
	      $rzid="������֤";
		  
		  switch ($rowss[3]){ 
            case 1:$rzxm= "δ��";break;
            case 2:$rzxm= "�ѻ�";break;
            case 3:$rzxm= "��������Ů";break;
            case 4:$rzxm= "��������Ů";break;
            case 5:$rzxm= "ɥż����Ů";break;
            case 6:$rzxm= "ɥż����Ů";break;
            case 7:$rzxm= "����";break;
          }
	   }
	   elseif ($rows['rzid']==5){
	      $rzid="������֤";
		  switch ($rowss[4]){ 
            case 1:$rzxm= "600Ԫ����";break;
            case 2:$rzxm= "600-799Ԫ";break;
            case 3:$rzxm= "800-999Ԫ";break;
            case 4:$rzxm= "1000-1499Ԫ";break;
            case 5:$rzxm= "1500-1999Ԫ";break;
            case 6:$rzxm= "2000-2999Ԫ";break;
            case 7:$rzxm= "3000-3999Ԫ";break;
            case 8:$rzxm= "4000-4999Ԫ";break;
            case 9:$rzxm= "5000-5999Ԫ";break;
            case 10:$rzxm= "6000-6999Ԫ";break;
            case 11:$rzxm= "7000-9999Ԫ";break;
            case 12:$rzxm= "10000-19999Ԫ";break;
            case 13:$rzxm= "20000Ԫ����";break;
         }
	   }
	   elseif ($rows['rzid']==6){
	      $rzid="ѧ����֤";
		  switch ($rowss[5]){ 
            case 1:$rzxm= "���м�����";break;
            case 2:$rzxm= "���л���ר������";break;
            case 3:$rzxm= "��ר������";break;
            case 4:$rzxm= "���Ƽ�����";break;
            case 5:$rzxm= "˶ʿ������";break;
            case 6:$rzxm= "��ʿ������";break;
          }
	   }
	   elseif ($rows['rzid']==7){
	      $rzid="������֤";
		    switch ($rowss[6]){ 
              case 1:$rzxm=  "��ס��";break;
              case 2:$rzxm=  "����������";break;
              case 3:$rzxm=  "��ס��";break;
              case 4:$rzxm=  "��ס�����ɽ��";break;
              case 5:$rzxm=  "��ס��ϣ���Է����";break;
              case 6:$rzxm=  "��ס��ϣ��˫�����";break;
           }
	   }
	   elseif ($rows['rzid']==8){
	      $rzid="������֤";
		  switch ($rowss[7]){ 
            case 1:$rzxm=  "����";break;
            case 2:$rzxm=  "�е�����";break;
            case 3:$rzxm=  "�ߵ�����";break;
            case 4:$rzxm=  "������������";break;
            case 5:$rzxm=  "����";break;
          }
	   }

?>
<tr bgcolor=<?php echo $color;?> onMouseOver="this.style.background='#9EDEFF'" onMouseOut="this.style.background='<?php echo $color;?>'">
      <td width="94" height="26" align="center">
        <?php if ($rows['flag']==0){?>
	      &nbsp;&nbsp;<a href="?submitok=allupdate&classid=<?php echo $rows['id']; ?>&userid=<?php echo $rows['userid']; ?>&rzid=<?php echo $rows['rzid']; ?>&p=<?php echo $p;?>"><font color=blue><b>���ͨ�����</b></font></a>
		<?php }else{?>
		   <a href="?submitok=allno&classid=<?php echo $rows['id']; ?>&userid=<?php echo $rows['userid']; ?>&rzid=<?php echo $rows['rzid']; ?>&p=<?php echo $p;?>" onClick="return confirm('ȷ��������ˣ�')">�������</a>
		<?php }?>
	  </td>
      <td width="136" align="center"><a href="../home/<?php echo $rows['userid']; ?>" class=u333333 target=_blank><?php echo $username; ?></a><br></td>
      <td align="center" style="line-height:150%;"><b><font color=red>        <?php echo date_format2($rows['addtime'],'%Y��%m��%d�� %Hʱ%M��');?></b><br></td>
      <td align="center" style="font-weight:normal;font-size:14px"><b><?php echo $rzid; ?></b><br><br><?php echo $shenhe; ?></td>
      <td align="center" style="font-size:14px"><?php echo $rzxm;?></td>
      <td width="110" align="center" style="line-height:150%;">
<a href="###"   onClick="showModalDialog('piczoom.php?picurl=../up/papers/<?php echo $rows['path_b']; ?>', window, 'dialogWidth:800px; dialogHeight:600px;status:0;help:0;scroll:auto;') ">
<img src=../up/papers/<?php echo $rows['path_b']; ?> title="�Ŵ���Ƭ" width="100" height="75" border="0"></a>
	  </td>
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
