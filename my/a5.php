<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="modupdate") {
	if ( !ereg("^[1-6]{1}$",$a1) || empty($a1) )callmsg("��ѡ�񡰵�һ��Լ����ϣ��˫������ʲô����","-1");
	if ( !ereg("^[1-6]{1}$",$a1) || empty($a2) )callmsg("��ѡ��Լ���и�˭�򵥡���","-1");
	if (strlen($a3)<2 || strlen($a3)>250)callmsg("����ϲ����Լ�᳡�����������2~127���ڡ�","-1");
	if (strlen($a4)<2 || strlen($a4)>250)callmsg("����ϲ�������֡��������2~127���ڡ�","-1");
	if (strlen($a5)<2 || strlen($a5)>250)callmsg("���㳣�������������������2~127���ڡ�","-1");
	if (strlen($a6)<2 || strlen($a6)>250)callmsg("����ϲ��̸�ۡ��������2~127���ڡ�","-1");
	if (strlen($a7)<2 || strlen($a6)>250)callmsg("������Ϊ�����ǡ��������2~127���ڡ�","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
	if (!$db->num_rows($rt)) {
		$db->query("INSERT INTO ".__TBL_MAIN_DATA__."  (userid,a1,a2,a3,a4,a5,a6,a7) VALUES ('$cook_userid','$a1','$a2','$a3','$a4','$a5','$a6','$a7')");
	} else {
		$db->query("UPDATE ".__TBL_MAIN_DATA__." SET a1='$a1',a2='$a2',a3='$a3',a4='$a4',a5='$a5',a6='$a6',a7='$a7',ifmod=0 WHERE userid='$cook_userid'");
	}
	callmsg("�޸ĳɹ���","a6.php");
} elseif ($submitok=="emptyupdate") {
	$db->query("UPDATE ".__TBL_MAIN_DATA__." SET a1=0,a2=0,a3='',a4='',a5='',a6='',a7='' WHERE userid=".$cook_userid);
	callmsg("�Ѿ���գ���ĸ�����ҳ��������ʾ���������ϣ���Ҫ�ָ���ʾ�������޸ģ�","a5.php");
}
$rt = $db->query("SELECT a1,a2,a3,a4,a5,a6,a7 FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
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
#tipinfo1,#tipinfo2,#tipinfo3,#tipinfo4,#tipinfo5{display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;;overflow:scroll;overflow-x:hidden;}
--> 
</style>
</head>
<script language="JavaScript" type="text/javascript" src="a5.js"></script>
<body>
<ul>
<li><a href="a1.php">��������</a></li>
<li><a href="a2.php">��ϸ����</a></li>
<li><a href="a3.php">���Ķ���</a></li>
<li><a href="a4.php">��ϵ����</a></li>
<li class="liselect"><a href="a5.php">Լ�ύ��</a></li>
<li><a href="a6.php">��������</a></li>
<li><a href="a7.php">�쳾֪��</a></li>
<li><a href="a8.php">���̻���</a></li>
<li><a href="a9.php">�޸�����</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br /><br /><br />
  <table width="650" border="0" align="center" cellpadding="2" cellspacing="0" style="color:#666;">
<form action="" method="post" name=YZLOVEFORM onSubmit="return chkform()">    <tr>
      <td width="229" height="35" align="right">��һ��Լ����ϣ��˫������ʲô:</td>
      <td width="413"><select name="a1" >
                <option value="">��ѡ��</option>
                <option value=1 <?php if ($row['a1']==1)echo "selected"; ?>>�ȼ�һ���໥��ʶ��</option>
                <option value=2 <?php if ($row['a1']==2)echo "selected"; ?>>����һ��Է����Ȳ衣</option>
                <option value=3 <?php if ($row['a1']==3)echo "selected"; ?>>����ȥ������Ӱ�����裬���衣</option>
                <option value=4 <?php if ($row['a1']==4)echo "selected"; ?>>���ϲ�������������֡�</option>
                <option value=5 <?php if ($row['a1']==5)echo "selected"; ?>>���ϲ��������ӵ�����ǡ�</option>
                <option value=6 <?php if ($row['a1']==6)echo "selected"; ?>>���ų�����һ���Ŀ��ܡ�</option>
          </select></td>
    </tr>
    <tr>
      <td height="35" align="right">Լ���и�˭��:</td>
      <td><select name="a2">
                <option value="" selected>��ѡ��</option>
                <option value=1 <?php if ($row['a2']==1)echo "selected"; ?>>��Ȼ���еĸ�</option>
                <option value=2 <?php if ($row['a2']==2)echo "selected"; ?>>�еĶึһЩ</option>
                <option value=3 <?php if ($row['a2']==3)echo "selected"; ?>>˭��Ǯ˭��</option>
                <option value=4 <?php if ($row['a2']==4)echo "selected"; ?>>��㣬����ν</option>
                <option value=5 <?php if ($row['a2']==5)echo "selected"; ?>>AA��</option>
                <option value=6 <?php if ($row['a2']==6)echo "selected"; ?>>����ϵ��չ</option>
              </select></td>
    </tr>
    <tr>
      <td height="35" align="right">��ϲ����Լ�᳡��:</td>
      <td><input name="a3" type="text"  class=input id="a3" onFocus="setTagBehavior(this,'a3','tipinfo1');" value="<?php echo htmlout(stripslashes($row['a3']));?>" size="60" maxlength="240" ><div id="tipinfo1">ff</div>
	  </td>
    </tr>
    <tr>
      <td height="35" align="right">��ϲ��������:</td>
      <td><input name="a4" type="text"  class=input id="a4" onFocus="setTagBehavior(this,'a4','tipinfo2');" value="<?php echo htmlout(stripslashes($row['a4']));?>" size="60" maxlength="240" ><div id="tipinfo2"></div>
	  </td>
    </tr>
    <tr>
      <td height="35" align="right">�㳣����������:</td>
      <td><input name="a5" type="text"  class=input id="a5" onFocus="setTagBehavior(this,'a5','tipinfo3');" value="<?php echo htmlout(stripslashes($row['a5']));?>" size="60" maxlength="240" ><div id="tipinfo3"></div>
    </tr>
    <tr>
      <td height="35" align="right">��ϲ��̸��:</td>
      <td><input name="a6" type="text"  class=input id="a6" onFocus="setTagBehavior(this,'a6','tipinfo4');" value="<?php echo htmlout(stripslashes($row['a6']));?>" size="60" maxlength="240" ><div id="tipinfo4"></div>
    </tr>
    <tr>
      <td height="35" align="right">����Ϊ������:</td>
      <td><input name="a7" type="text"  class=input id="a7" onFocus="setTagBehavior(this,'a7','tipinfo5');" value="<?php echo htmlout(stripslashes($row['a7']));?>" size="60" maxlength="240" ><div id="tipinfo5"></div>
    </tr>
    <tr>
      <td height="35" align="right">&nbsp;</td>
      <td><input type="hidden" name="submitok" value="modupdate" />
        <input type="submit" name="Submit" value=" �� �� " class="button" />��
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?submitok=emptyupdate" class="uDF2C91" onClick="return confirm('�����أ�\n\n��ȷ������� ')"><b>��ա�Լ�ύ�ѡ��������</b></a></td>
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
  <br />
  <br /><br /><br />
<br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>