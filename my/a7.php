<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="modupdate") {
	if ( !ereg("^[1-7]{1}$",$c1) || empty($c1) )callmsg("��ѡ��������ס�ڡ�","-1");
	if ( !ereg("^[1-7]{1}$",$c2) || empty($c2) )callmsg("��ѡ������Ϊ�Լ��Ը���","-1");
	if ( !ereg("^[1-7]{1}$",$c3) || empty($c3) )callmsg("��ѡ�������԰�����ľ��顱","-1");
	if ( !ereg("^[1-7]{1}$",$c4) || empty($c4) )callmsg("��ѡ����Դ��԰���̬���ǡ�","-1");
	if ( !ereg("^[1-7]{1}$",$c5) || empty($c5) )callmsg("��ѡ�������԰������ڳ�����","-1");
	if ( !ereg("^[1-7]{1}$",$c6) || empty($c6) )callmsg("��ѡ������Ϊ�ԺͰ��Ĺ�ϵ�ǡ�","-1");
	if ( !ereg("^[1-7]{1}$",$c7) || empty($c7) )callmsg("��ѡ������Ϊ�Ը���Ҫ�����ڶԷ��ġ�","-1");
	if (strlen($c8)<2 || strlen($c8)>250)callmsg("�����԰��У��������ǡ��������2~127���ڡ�","-1");
	if (strlen($c9)<2 || strlen($c9)>250)callmsg("������Ѱ�ҡ��������2~127���ڡ�","-1");
	if (strlen($c10)<2 || strlen($c10)>250)callmsg("��ʲô�Ƚ��ܵ���������¡��������2~127���ڡ�","-1");
	if (strlen($c11)<2 || strlen($c11)>250)callmsg("�����ܹ�����(����İ���)�����������2~127���ڡ�","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
	if (!$db->num_rows($rt)) {
		$db->query("INSERT INTO ".__TBL_MAIN_DATA__."  (userid,c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11) VALUES ('$cook_userid','$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$c9','$c10','$c11')");
	} else {
		$db->query("UPDATE ".__TBL_MAIN_DATA__." SET c1='$c1',c2='$c2',c3='$c3',c4='$c4',c5='$c5',c6='$c6',c7='$c7',c8='$c8',c9='$c9',c10='$c10',c11='$c11',ifmod=0 WHERE userid='$cook_userid'");
	}
	callmsg("�޸ĳɹ���","a8.php");
} elseif ($submitok=="emptyupdate") {
	$db->query("UPDATE ".__TBL_MAIN_DATA__." SET c1=0,c2=0,c3=0,c4=0,c5=0,c6=0,c7=0,c8='',c9='',c10='',c11='' WHERE userid=".$cook_userid);
	callmsg("�Ѿ���գ���ĸ�����ҳ��������ʾ���������ϣ���Ҫ�ָ���ʾ�������޸ģ�","a7.php");
}
$rt = $db->query("SELECT c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11 FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;width:68px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:68px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:68px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:68px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:68px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:68px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
#tipinfo1,#tipinfo2,#tipinfo3,#tipinfo4,#tipinfo5{display:none;width:320px;background:#F8FCF5;height:100px;margin:5px;line-height:200%;;overflow:scroll;overflow-x:hidden;}
--> 
</style>
</head>
<script language="JavaScript" type="text/javascript" src="a7.js"></script>
<body>
<ul>
<li><a href="a1.php">��������</a></li>
<li><a href="a2.php">��ϸ����</a></li>
<li><a href="a3.php">���Ķ���</a></li>
<li><a href="a4.php">��ϵ����</a></li>
<li><a href="a5.php">Լ�ύ��</a></li>
<li><a href="a6.php">��������</a></li>
<li class="liselect"><a href="a7.php">�쳾֪��</a></li>
<li><a href="a8.php">���̻���</a></li>
<li><a href="a9.php">�޸�����</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <br />
<table width="650" border="0" align="center" cellpadding="2" cellspacing="0" style="color:#666;">
<form action="" method="post" name=YZLOVEFORM onSubmit="return chkform()">
  <tr>
    <td width="242" height="35" align="right">������ס��:</td>
    <td width="400"><select name="c1">
      <option value="">��ѡ��</option>
      <option value="1" <?php if ($row['c1']==1)echo "selected"; ?>>һ����ס���ܷ���</option>
      <option value="2" <?php if ($row['c1']==2)echo "selected"; ?>>�͸�ĸס</option>
      <option value="3" <?php if ($row['c1']==3)echo "selected"; ?>>�ͱ��˺�ס��������</option>
      <option value="4" <?php if ($row['c1']==4)echo "selected"; ?>>�ͱ���ס�����Ҽ䷿�Ӻ�����</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">����Ϊ�Լ��Ը���:<br />    </td>
    <td width="400"><select name="c2">
      <option value="">��ѡ��</option>
      <option value="1" <?php if ($row['c2']==1)echo "selected"; ?>>һ����ס�㣬ͦ�Ըе�</option>
      <option value="2" <?php if ($row['c2']==2)echo "selected"; ?>>��Ȼ��Ư������������</option>
      <option value="3" <?php if ($row['c2']==3)echo "selected"; ?>>һ��</option>
      <option value="4" <?php if ($row['c2']==4)echo "selected"; ?>>������ô˵����֪���������ô��</option>
      <option value="5" <?php if ($row['c2']==5)echo "selected"; ?>>��֪��</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">�����԰�����ľ���:</td>
    <td height="26"><select name="c3">
      <option value="">��ѡ��</option>
      <option value="1" <?php if ($row['c3']==1)echo "selected"; ?>>��û�о���</option>
      <option value="2" <?php if ($row['c3']==2)echo "selected"; ?>>�Թ�����</option>
      <option value="3" <?php if ($row['c3']==3)echo "selected"; ?>>���ǹ�����</option>
      <option value="4" <?php if ($row['c3']==4)echo "selected"; ?>>���о���</option>
      <option value="5" <?php if ($row['c3']==5)echo "selected"; ?>>�м�����</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">��Դ��԰���̬����:</td>
    <td height="19"><select name="c4">
      <option value="">��ѡ��</option>
      <option value="1" <?php if ($row['c4']==1)echo "selected"; ?>>��������ֵ���</option>
      <option value="2" <?php if ($row['c4']==2)echo "selected"; ?>>����������Ҫ����֮һ</option>
      <option value="3" <?php if ($row['c4']==3)echo "selected"; ?>>ʳ��ɫ��Ҳ��û�в���</option>
      <option value="4" <?php if ($row['c4']==4)echo "selected"; ?>>��ȱ����</option>
      <option value="5" <?php if ($row['c4']==5)echo "selected"; ?>>ϲ����Ҫ</option>
      <option value="6" <?php if ($row['c4']==6)echo "selected"; ?>>���п���</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">�����԰������ڳ�����:</td>
    <td><select name="c5">
      <option value="">��ѡ��</option>
      <option value="1" <?php if ($row['c5']==1)echo "selected"; ?>>�����������ԣ�Ը����϶Է�</option>
      <option value="2" <?php if ($row['c5']==2)echo "selected"; ?>>��ͳ������</option>
      <option value="3" <?php if ($row['c5']==3)echo "selected"; ?>>ֻ����������ʽ</option>
      <option value="4" <?php if ($row['c5']==4)echo "selected"; ?>>ֻҪϲ������������</option>
      <option value="5" <?php if ($row['c5']==5)echo "selected"; ?>>ϲ������</option>
      <option value="6" <?php if ($row['c5']==6)echo "selected"; ?>>û����û�Թ���</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">����Ϊ�ԺͰ��Ĺ�ϵ��:<br />    </td>
    <td><select name="c6">
      <option value="">��ѡ��</option>
      <option value="1" <?php if ($row['c6']==1)echo "selected"; ?>>���Բ��а�</option>
      <option value="2" <?php if ($row['c6']==2)echo "selected"; ?>>�а�������</option>
      <option value="3" <?php if ($row['c6']==3)echo "selected"; ?>>�ԺͰ��޹�</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">����Ϊ�Ը���Ҫ�����ڶԷ���:<br />    </td>
    <td height="28"><select name="c7">
      <option value="">��ѡ��</option>
      <option value="1" <?php if ($row['c7']==1)echo "selected"; ?>>����</option>
      <option value="2" <?php if ($row['c7']==2)echo "selected"; ?>>���</option>
      <option value="3" <?php if ($row['c7']==3)echo "selected"; ?>>����</option>
      <option value="4" <?php if ($row['c7']==4)echo "selected"; ?>>����</option>
      <option value="5" <?php if ($row['c7']==5)echo "selected"; ?>>����</option>
      <option value="6" <?php if ($row['c7']==6)echo "selected"; ?>>���</option>
      <option value="7" <?php if ($row['c7']==7)echo "selected"; ?>>̬��</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">���԰��У���������:</td>
    <td height="28"><input name="c8" type="text"  class=input id="c8" onFocus="setTagBehavior(this,'c8','tipinfo1');" value="<?php echo htmlout(stripslashes($row['c8']));?>" size="60" maxlength="240" >
<div id="tipinfo1"></div></td>
  </tr>
  <tr>
    <td height="35" align="right">����Ѱ��:</td>
    <td height="28"><input name="c9" type="text"  class=input id="c9" onFocus="setTagBehavior(this,'c9','tipinfo2');" value="<?php echo htmlout(stripslashes($row['c9']));?>" size="60" maxlength="240" >
<div id="tipinfo2"></div></td>
  </tr>
  <tr>
    <td height="35" align="right">ʲô�Ƚ��ܵ����������:</td>
    <td height="28"><input name="c10" type="text"  class=input id="c10" onFocus="setTagBehavior(this,'c10','tipinfo3');" value="<?php echo htmlout(stripslashes($row['c10']));?>" size="60" maxlength="240" >
<div id="tipinfo3"></div></td>
  </tr>
  <tr>
    <td height="35" align="right">���ܹ�����(����İ���):</td>
    <td height="28"><input name="c11" type="text"  class=input id="c11" onFocus="setTagBehavior(this,'c11','tipinfo4');" value="<?php echo htmlout(stripslashes($row['c11']));?>" size="60" maxlength="240" >
<div id="tipinfo4"></div></td>
  </tr>
  <tr>
    <td height="35" align="right">&nbsp;</td>
    <td height="28"><input type="hidden" name="submitok" value="modupdate" />
      <input type="submit" name="Submit" value=" �� �� " class="button" />��
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?submitok=emptyupdate" class="uDF2C91" onClick="return confirm('�����أ�\n\n��ȷ������� ')"><b>��ա��쳾֪�����������</b></a></td>
  </tr>
</form>
</table>
<table width="600" height="55" border="0" align="center" cellpadding="10" cellspacing="0" style="margin:20px 0 0 0">
  <tr>
    <td width="27" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif" width="23" height="21" /></td>
    <td width="533" style="line-height:150%;color:#666;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />�����޸ĺ󣬱�վ�ͷ���Ա��������Ͻ�����˺󷽿���ʾ��<br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />����<a href="/law.html" target="_blank">���������ӹ���������涨</a>�Լ��л����񹲺͹����������йط��ɷ��档<br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><?php echo $Global['m_sitename']; ?>�����������ϱ������վ���Ȩ��</td>
  </tr>
</table>
<br /><br /><br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>