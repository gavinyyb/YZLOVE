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
		$if2=$_REQUEST['if2'];
		$grade=$_REQUEST['grade'];
		$db->query("update ".__TBL_MAIN__." set if2=".$if2.",grade=".$grade." where id=".$userid);
		echo "<script language=\"javascript\">alert('�޸ĳɹ���');window.location.href='vip_search.php";
		echo "'</script>";
		exit();
}

    $adminkeyword=$_REQUEST['adminkeyword'];
	if (empty($adminkeyword)){
      $rs=$db->query("SELECT * FROM ".__TBL_MAIN__." WHERE grade<>1 ORDER BY logintime ASC");
	}else{
	  $rs=$db->query("SELECT * FROM ".__TBL_MAIN__." WHERE grade<>1 and username like '%".$adminkeyword."%' ");
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
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" style="border:#dddddd 1px solid;">
  <tr>
    <td width="23%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>VIP��������:</b></td>
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
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>ID</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">�û���</font></b></td>
    <td width="355" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">�ᡡԱ���ȡ���</font></b></td>
    <td width="59" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">Love��</font></b></td>
    <td width="31" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">״̬</font></b></td>
    <td width="46" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>����ֵ</b></font></td>
    <td width="48" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>��¼</b></font></td>
  </tr>
  <?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;	

?>
  <tr bgcolor=E5E5E5  onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off';>
      <td width="44" height="26" align="center"><label for="chk2"><b><?php echo $rows['id']; ?></b></label></td>
      <td width="167" align="left"><a href="../home/<?php echo $rows['id']; ?>" class=u333333 target=_blank><?php echo $rows['username']; ?></a>��(<font color="#999999"><?php echo $rows['nickname']; ?></font>)</td>
      <td style="line-height:150%;"><table width="100%" height="22" border="0" cellpadding="0" cellspacing="0">
     <form action="?submitok=allupdate" method="post" name=lovebhihi>
     <tr>
        <td><input name="sjtime" type="text" id="sjtime" value="<?php echo $rows['sjtime']; ?>" size="19">
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
        <input name="sjtimeold" type="hidden" value="2009-12-23 13:15:09">��ʣ<font color=red>365</font>��</td>
     </tr>
     </form>
    </table></td>
      <td align="center"><font color="#FF0000"><?php echo $rows['loveb']; ?></font></td>
      <td align="center">
	  <?php 
	   if ($rows['flag']==1){
           echo "����";
       }
	   else{
	       echo"<font color=red>������</font>";
	   }
	   ?>
	  </td>
      <td align="center"><font color="#FF0000"><?php echo $rows['alltime']; ?></font></td>
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
 
