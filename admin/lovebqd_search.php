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
    $adminkeyword=$_REQUEST['adminkeyword'];
	if (empty($adminkeyword)){
      $rs=$db->query("SELECT * FROM yzlove_lovebhistory ORDER BY id DESC");
	}else{
	  $rs=$db->query("SELECT * FROM yzlove_lovebhistory WHERE  username='".$adminkeyword."'ORDER BY id DESC");
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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>Love���嵥:</b></td>
      </tr>
    </table></td>
    <td width="22%" align="center">��¼���� <font color="#FF0000"><?php echo $total; ?>    </font> ��</td>
    <td width="55%" align="right"><table width="278" height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="lovebqd_search.php">
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
    <td width="65%" align="center">&nbsp;<?php echo $pagelist; ?><?php echo $pagelistinfo; ?>&nbsp;</td>
  </tr>
</table>

<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
 <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>ID</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>�û���</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">����ʱ��</font></b></td>
    <td width="208" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>��������Ŀ</b></font></td>
    <td width="116" align="center" valign="bottom" bgcolor="D3DCE3"><b>�� ��</b></td>
  </tr>
  <?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;	

?>
  <tr bgcolor=E5E5E5  onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off';>
      <td width="44" height="26" align="center"><label for="chk2"><b><?php echo $rows['id']; ?></b></label></td>
      <td width="167" align="left"><a href="../home/2" class=u333333 target=_blank><?php echo $rows['username']; ?></a></td>
      <td style="line-height:150%;algin:center;"><?php echo $rows['addtime']; ?></td>
      <td align="center"><font color="#FF0000"><?php echo $rows['content']; ?></font></td>
	  <?php
	   if ($rows['num']>0){
	       $num="<font color=red><b>".$rows['num']."</b></font>";
       }else{
	   $num="<font color=Blue><b>".$rows['num']."</b></font>";
	   }
       ?>
      <td align="center"><font color="#FF0000"><?php echo $num; ?></font></td>
    </tr>
<?php
	}
?>
  </table>

   <?php
 
	}
?>
<br>
<?php echo $pagelist; ?><?php echo $pagelistinfo; ?>
<br>
<br>
<br>
<br>
</body>
</html>
 
