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
        $userid=$_REQUEST['userid'];
		$p=$_REQUEST['p'];
		$if2=$_REQUEST['if2'];
		$grade=$_REQUEST['grade'];
		$db->query("update ".__TBL_MAIN__." set if2=".$if2.",grade=".$grade." where id=".$userid);
		echo "<script language=\"javascript\">alert('�޸ĳɹ���');window.location.href='user_search.php?p=".$p."";
		echo "'</script>";
		exit();
}
if($_REQUEST['submitok']=="loveb"){
        $userid=$_REQUEST['userid'];
		$p=$_REQUEST['p'];
		$username=$_REQUEST['username'];
		$loveb=$_REQUEST['lovebb'];
		$num=$_REQUEST['num'];
		$kind=$_REQUEST['kind'];
	//	if ($loveb>"999999"){
	//		   echo "<script language=\"javascript\">alert('��磬��Ҳ�ӵ�̫���˰ɣ�Ҫ����999999Ŷ������Էֿ����ӣ�');history.go(-1)</script>";
	//	       exit();
	//	   }
	    if (empty($loveb)){
     	   echo "<script language=\"javascript\">alert('��磬������д����ô�޸�?');history.go(-1)</script>";
           exit();
        }
		if ($kind=="-"){
		   if ($loveb<$num){
			   echo "<script language=\"javascript\">alert('��磬����û��ô���ң����������٣����为���ˣ�̫�����˰ɣ���');history.go(-1)</script>";
		       exit();
		   }
		}
		//LOVE B ��¼
		$datetime= date("Y-m-d H:i:s");
	    $content="����Ա����";
		//$renshu=.$kind."".$num.;
        $db->query("INSERT INTO ".__TBL_LOVEBHISTORY__." (userid,username,content,num,addtime)values(".$userid.",'".$username."','".$content."','".$kind."".$num."','".$datetime."')");
		//
		$db->query("update ".__TBL_MAIN__." set loveb=loveb".$kind."".$num." where id=".$userid);
		echo "<script language=\"javascript\">alert('�޸ĳɹ���');window.location.href='user_search.php?p=".$p."";
		echo "'</script>";
		exit();
}
if($_REQUEST['submitok']=="suoding"){
       $userid=$_REQUEST['userid'];
	   $p=$_REQUEST['p'];
	   $rst=$db->query("SELECT flag FROM ".__TBL_MAIN__."  where id=".$userid);
	   $rowst = $db->fetch_array($rst);
       if ($rowst[0]==-1){
	      $flag=1;
	   }else{
		  $flag=-1;
	   }
       $db->query("update  ".__TBL_MAIN__."  set flag=".$flag." where id=".$userid);
       header("Location: user_search.php?p=".$p."");
	   exit();
}
    $adminkeyword=$_REQUEST['adminkeyword'];
	if (empty($adminkeyword)){
      $rs=$db->query("SELECT * FROM ".__TBL_MAIN__." ORDER BY id desc");
	}else{
	  $rs=$db->query("SELECT * FROM ".__TBL_MAIN__." WHERE username like '%".$adminkeyword."%' or and nickname like '%".$adminkeyword."%' ");
	}
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 40;
       if ($p<1)$p=1;
       $mypage=new uobarpage($total,$pagesize);
       $pagelist = $mypage->pagebar(1);
       $pagelistinfo = $mypage->limit2();
       mysql_data_seek($rs,($p-1)*$pagesize);
      
	//���	

?>
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" bgcolor="efefef" style="border:#dddddd 1px solid;">
  <tr>
    <td width="23%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>��Ա����/����</b></td>
      </tr>
    </table></td>
    <td width="22%" align="center">��¼���� <font color="#FF0000"><?php echo $total; ?>    </font> ��</td>
    <td width="55%" align="right"><table width="278" height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="vip_search.php">
        <tr>
          <td width="224">���û���/�ǳ�������
            <input name="adminkeyword" type="text" size="15" maxlength="15" class="input">          </td>
          <td width="54" align="right"><input type="submit" value=" ���� " class=buttonx></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>

<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="65%" align="center"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?>&nbsp;</td>
  </tr>
</table>

<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
  <tr bgcolor="#FFFFFF">
     <td width="54" height="20" align="center" valign="bottom" background="images/22.gif"><font color="#000000">ID ��<br>    
    </font></td>
    <td width="132" align="center" valign="bottom" background="images/22.gif"><font color="#000000">�û���</font></td>
    <td height="22" align="center" valign="bottom" background="images/22.gif" bgcolor="#FFFFFF"><font color="#000000">�ء���</font></td>
    <td width="201" align="center" valign="bottom" background="images/22.gif"><font color="#000000">Love��</font></td>
    <td width="167" align="center" valign="bottom" background="images/22.gif"><font color="#000000">��Ա�ȼ�</font></td>
    <td width="58" align="center" valign="bottom" background="images/22.gif"><font color="#000000">״ ̬</font></td>
    <td width="55" align="center" valign="bottom" background="images/22.gif"><font color="#000000">�� ��</font></td>
    <td width="33" align="center" valign="bottom" background="images/22.gif"><font color="#000000">��Ƭ</font></td>
    <td width="68" align="center" valign="bottom" background="images/22.gif"><font color="#000000">�� ¼</font></td>
  </tr>
  <?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;	

?>
<tr bgcolor=#ebf0f2 onMouseOver="this.style.background='#ffff88'" onMouseOut="this.style.background='#ebf0f2'">
    <td width="54" align="center"><a href="../login.php?submitok=checkuseradmin&uid=<?php echo $rows['id']; ?>&pwd=<?php echo $rows['password']; ?>" target="_blank"title="���ֱ�ӽ������" class="u000" ><b><?php echo $rows['id']; ?></b></a></td>
    <td align="center"  title="<span style=line-height:200%;>�û�����<?php echo $rows['username']; ?> (�ǳƣ�<?php echo $rows['nickname']; ?>)<br>ע��ʱ�䣺<?php echo $rows['regtime']; ?><br>����¼��<?php echo $rows['logintime']; ?><br>ע��IP��<?php echo $rows['regip']; ?><br>����¼IP��<?php echo $rows['loginip']; ?><br>��ʼ�绰��<?php echo $rows['yctel']; ?></span>"><a href="../home/4" class=u333333 target=_blank><?php echo $rows['username']; ?></a><br><img src="images/line_null.gif" width="16" height="12" vspace="5" align="absmiddle">( <font color="#999999"><?php echo $rows['nickname']; ?></font> )</td>
	<td width="137" align="center"><?php echo $rows['area1']; ?><?php echo $rows['area2']; ?></td>
	<td align="center" >
	  <table width="99%" height="22" border="0" cellpadding="0" cellspacing="0">
         <form action=?submitok=loveb&p=1 method="post" name=form>
         <tr>
           <td width="55" align="center"><font color="#FF0000"><?php echo $rows['loveb']; ?></font> </td>
           <td>
		     <input name="num" type="text" size="6" maxlength="9" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
             <select name="kind" id="kind" >
               <option value="+" selected>+</option>
               <option value="-">-</option>
             </select>
			 <input type="submit" name="Submit2" value="OK" class="buttonx">
             <input name="userid" type="hidden" value=<?php echo $rows['id']; ?>>
             <input name="username" type="hidden" value=<?php echo $rows['username']; ?>>
             <input name="lovebb" type="hidden" value=<?php echo $rows['loveb']; ?>></td>
         </tr>
         </form>
      </table>
	</td>
    <td style="line-height:150%;">
	    <table width="100%" height="22" border="0" cellpadding="0" cellspacing="0">
        <form action="?submitok=allupdate" method="post" name=lovebhihi>
        <tr>
          <td>
           <select name="if2">
            <option value="0"  <?php if ($rows['if2']==0) echo "selected"; ?> style="color:#cccccc;">����</option>
            <option value="1"  <?php if ($rows['if2']==1) echo "selected"; ?> style="color:#FF6600">����</option>
            <option value="2"  <?php if ($rows['if2']==2) echo "selected"; ?> style="color:#999999">��ʱ</option>
            <option value="3"  <?php if ($rows['if2']==3) echo "selected"; ?> style="color:#FF6600">����</option>
            <option value="4"  <?php if ($rows['if2']==4) echo "selected"; ?> style="color:#999999">����</option>
            <option value="5"  <?php if ($rows['if2']==5) echo "selected"; ?> style="color:#FF6600">����</option>
          </select>
		  <select name="grade" style="font-size:9pt;">
            <option value="1" <?php if ($rows['grade']==1) echo "selected"; ?>>��ͨ</option>
            <option value="2" <?php if ($rows['grade']==2) echo "selected"; ?>>����</option>
            <option value="3" <?php if ($rows['grade']==3) echo "selected"; ?>>��ʯ</option>
            <option value="10" <?php if ($rows['grade']==10) echo "selected"; ?>>����Ա</option>
          </select>
		  <input type="submit" name="Submit22" value="�ı�" class="buttonx">
          <input name="userid" type="hidden" value=<?php echo $rows['id']; ?>>
       </tr>
       </form>
      </table>
	  </td>
      <td align="center"><a href="?submitok=suoding&userid=<?php echo $rows['id']; ?>&p=1" title="����������߽⿪���û�" class="u000">
	  <?php 
	   if ($rows['flag']==1){
           echo "����";
       }
	   else{
	       echo"<font color=red><b>������</b></font>";
	   }
	   ?></a>
	  </td>
	  <td align="center"><font color="#FF0000"><?php echo $rows['alltime']; ?></font></td>
      <td align="center">
	  <?php 
	   if (empty($rows['photo_s'])){
           echo "";
       }
	   else{
		?>
	       <a href="javascript:void(0);"   onClick="showModalDialog('piczoom.php?picurl=../up/photo/<?php echo $rows['photo_s']; ?>', window, 'dialogWidth:800px; dialogHeight:600px;status:0;help:0;scroll:auto;') "><img src=images/pic.gif border=0>
	 <?php
	   }
	  ?>
	  </td>
      <td align="center"><font color="#FF0000"><?php echo $rows['logincount']; ?></font> ��</td>
    </tr>
<?php
	}
?>
  </table>

   <?php
 
	}
?>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
 
