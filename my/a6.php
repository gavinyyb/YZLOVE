<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="modupdate") {
	if ( !ereg("^[0-9]{1}$",$b1) || empty($b1) )callmsg("��ѡ��������Ů�𡱣�","-1");
	if ( !ereg("^[0-9]{1}$",$b2) || empty($b2) )callmsg("��ѡ�񡰽�����ҪС���𡱣�","-1");
	if ( !ereg("^[0-9]{1}$",$b3) || empty($b3) )callmsg("��ѡ����Ը��Ϊ����Ǩ�ӱ��𡱣�","-1");
	if ( !ereg("^[0-9]{1,2}$",$b4) || empty($b4) )callmsg("��ѡ�񡰻�����е����ټ��񡱣�","-1");
	if ( !ereg("^[0-9]{1}$",$b5) || empty($b5) )callmsg("��ѡ��ϲ�������𡱣�","-1");
	if ( !ereg("^[0-9]{1}$",$b6) || empty($b6) )callmsg("��ѡ�񡰻�����˫���Ĺ�ϵӦ���ǡ���","-1");
	if ( !ereg("^[0-9]{1}$",$b7) || empty($b7) )callmsg("��ѡ����Ļ���̬�ȡ���","-1");
	if ( !ereg("^[0-9]{1}$",$b8) || empty($b8) )callmsg("��ѡ����ľ���״������","-1");
	if ( !ereg("^[0-9]{1}$",$b9) || empty($b9) )callmsg("��ѡ�񡰶Է��ļ�ͥ��Ҫ�𡱣�","-1");
	if ( !ereg("^[0-9]{1}$",$b10) || empty($b10) )callmsg("��ѡ��������ѹۡ���","-1");
	if ( !ereg("^[0-9]{1}$",$b11) || empty($b11) )callmsg("��ѡ��������ڹ�����̬�ȡ���","-1");
	if ( !ereg("^[0-9]{1}$",$b12) || empty($b12) )callmsg("��ѡ������С���𡱣�","-1");
	if ( !ereg("^[0-9]{1}$",$b13) || empty($b13) )callmsg("��ѡ�񡰼�ͥ��������","-1");
	if ( !ereg("^[0-9]{1}$",$b14) || empty($b14) )callmsg("��ѡ�񡰰��������𡱣�","-1");
	if ( !ereg("^[0-9]{1}$",$b15) || empty($b15) )callmsg("��ѡ���������ѡ���","-1");
	if (strlen($b16)<2 || strlen($b16)>250)callmsg("��ϣ�����ļ�ͥ��ϵ���������2~127���ڡ�","-1");
	if (strlen($b17)<2 || strlen($b17)>250)callmsg("������������ദ����Ҫ���ǡ��������2~127���ڡ�","-1");
	if (strlen($b18)<2 || strlen($b18)>250)callmsg("����ϣ���Ľ��������Ȧ���������2~127���ڡ�","-1");
	if (strlen($b19)<2 || strlen($b19)>250)callmsg("������ضԷ��ģ����������2~127���ڡ�","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
	if (!$db->num_rows($rt)) {
		$db->query("INSERT INTO ".__TBL_MAIN_DATA__."  (userid,b1,b2,b3,b4,b5,b6,b7,b8,b9,b10,b11,b12,b13,b14,b15,b16,b17,b18,b19) VALUES ('$cook_userid','$b1','$b2','$b3','$b4','$b5','$b6','$b7','$b8','$b9','$b10','$b11','$b12','$b13','$b14','$b15','$b16','$b17','$b18','$b19')");
	} else {
		$db->query("UPDATE ".__TBL_MAIN_DATA__." SET b1='$b1',b2='$b2',b3='$b3',b4='$b4',b5='$b5',b6='$b6',b7='$b7',b8='$b8',b9='$b9',b10='$b10',b11='$b11',b12='$b12',b13='$b13',b14='$b14',b15='$b15',b16='$b16',b17='$b17',b18='$b18',b19='$b19',ifmod=0 WHERE userid='$cook_userid'");
	}
	callmsg("�޸ĳɹ���","a7.php");
} elseif ($submitok=="emptyupdate") {
	$db->query("UPDATE ".__TBL_MAIN_DATA__." SET b1=0,b2=0,b3=0,b4=0,b5=0,b6=0,b7=0,b8=0,b9=0,b10=0,b11=0,b12=0,b13=0,b14=0,b15=0,b16='',b17='',b18='',b19='' WHERE userid=".$cook_userid);
	callmsg("�Ѿ���գ���ĸ�����ҳ��������ʾ���������ϣ���Ҫ�ָ���ʾ�������޸ģ�","a6.php");
}
$rt = $db->query("SELECT b1,b2,b3,b4,b5,b6,b7,b8,b9,b10,b11,b12,b13,b14,b15,b16,b17,b18,b19 FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
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
<script language="JavaScript" type="text/javascript" src="a6.js"></script>
<body>
<ul>
<li><a href="a1.php">��������</a></li>
<li><a href="a2.php">��ϸ����</a></li>
<li><a href="a3.php">���Ķ���</a></li>
<li><a href="a4.php">��ϵ����</a></li>
<li><a href="a5.php">Լ�ύ��</a></li>
<li class="liselect"><a href="a6.php">��������</a></li>
<li><a href="a7.php">�쳾֪��</a></li>
<li><a href="a8.php">���̻���</a></li>
<li><a href="a9.php">�޸�����</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <br />
<table width="650" border="0" align="center" cellPadding="2" cellSpacing="0" style="color:#666;">
<form action="" method="post" name=YZLOVEFORM onSubmit="return chkform()">
<tr>
<td width="228" height="30" align="right"> ������Ů��:</td>
<td width="414"><select id="b1" name="b1">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b1']==1)echo "selected"; ?>>����Ů</option>
<option value="2" <?php if ($row['b1']==2)echo "selected"; ?>>����Ů����ס��һ��</option>
<option value="3" <?php if ($row['b1']==3)echo "selected"; ?>>����Ů��ż����һ��</option>
<option value="4" <?php if ($row['b1']==4)echo "selected"; ?>>����Ů��ͬסһ��</option>
<option value="5" <?php if ($row['b1']==5)echo "selected"; ?>>��û�У�����Ҳû��ϵ</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ������ҪС����:</td>
<td width="414"><select id="b2" name="b2">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b2']==1)echo "selected"; ?>>��Ҫ����ϲ��</option>
<option value="2" <?php if ($row['b2']==2)echo "selected"; ?>>�������Ͼ�Ҫ</option>
<option value="3" <?php if ($row['b2']==3)echo "selected"; ?>>��������Ҫ</option>
<option value="4" <?php if ($row['b2']==4)echo "selected"; ?>>˳����Ȼ</option>
<option value="5" <?php if ($row['b2']==5)echo "selected"; ?>>��ʱ������</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ��Ը��Ϊ����Ǩ�ӱ���:</td>
<td><select  id="b3" name="b3">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b3']==1)echo "selected"; ?>>����</option>
<option value="2" <?php if ($row['b3']==2)echo "selected"; ?>>���ǶԷ��ᵽ��������</option>
<option value="3" <?php if ($row['b3']==3)echo "selected"; ?>>�������������</option>
<option value="4" <?php if ($row['b3']==4)echo "selected"; ?>>�����ϵ�Ѿ����ȶ������Կ���</option>
<option value="5" <?php if ($row['b3']==5)echo "selected"; ?>>Ҫ����ȥ�����ϲ���ĵط�����</option>
<option value="6" <?php if ($row['b3']==6)echo "selected"; ?>>Ϊ�˰��飬��Ȼ����</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ������е����ټ���:</td>
<td><select id="b4" name="b4">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b4']==1)echo "selected"; ?>>ȫ����(��)��</option>
<option value="2" <?php if ($row['b4']==2)echo "selected"; ?>>10%</option>
<option value="3" <?php if ($row['b4']==3)echo "selected"; ?>>20%</option>
<option value="4" <?php if ($row['b4']==4)echo "selected"; ?>>30%</option>
<option value="5" <?php if ($row['b4']==5)echo "selected"; ?>>40%</option>
<option value="6" <?php if ($row['b4']==6)echo "selected"; ?>>50%</option>
<option value="7" <?php if ($row['b4']==7)echo "selected"; ?>>60%</option>
<option value="8" <?php if ($row['b4']==8)echo "selected"; ?>>70%</option>
<option value="9" <?php if ($row['b4']==9)echo "selected"; ?>>80%</option>
<option value="10" <?php if ($row['b4']==10)echo "selected"; ?>>90%</option>
<option value="11" <?php if ($row['b4']==11)echo "selected"; ?>>ȫ������</option>
<option value="12" <?php if ($row['b4']==12)echo "selected"; ?>>�������˭��ʱ��˭��</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ϲ��������:</td>
<td><select  id="b5" name="b5">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b5']==1)echo "selected"; ?>>ϲ��</option>
<option value="2" <?php if ($row['b5']==2)echo "selected"; ?>>ÿ�궼ȥ���ζȼ�</option>
<option value="3" <?php if ($row['b5']==3)echo "selected"; ?>>ûʱ�䣬����ȥ</option>
<option value="4" <?php if ($row['b5']==4)echo "selected"; ?>>�������������Ȥ</option>
<option value="5" <?php if ($row['b5']==5)echo "selected"; ?>>�湻Ǯ������</option>
<option value="6" <?php if ($row['b5']==6)echo "selected"; ?>>ֻ�ڸ�������</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ������˫���Ĺ�ϵӦ����:</td>
<td><select  id="b6" name="b6">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b6']==1)echo "selected"; ?>>�˴���ȫռ��</option>
<option value="2" <?php if ($row['b6']==2)echo "selected"; ?>>�����޼䣬��������</option>
<option value="3" <?php if ($row['b6']==3)echo "selected"; ?>>��ȫ����</option>
<option value="4" <?php if ($row['b6']==4)echo "selected"; ?>>�˴˹��ĵ����־���</option>
<option value="5" <?php if ($row['b6']==5)echo "selected"; ?>>����Է���Ҫ��ͬʱ�ж����ռ�</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ��Ļ���̬��:<img height="5" src width="1"></td>
<td><select id="b7" name="b7">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b7']==1)echo "selected"; ?>>����ͬ�����</option>
<option value="2" <?php if ($row['b7']==2)echo "selected"; ?>>ϣ�����бȽϳ��õĹ�ϵ</option>
<option value="3" <?php if ($row['b7']==3)echo "selected"; ?>>���������İ���������</option>
<option value="4" <?php if ($row['b7']==4)echo "selected"; ?>>���ں��쳤�ؾã�ֻ�ں�����ӵ��</option>
<option value="5" <?php if ($row['b7']==5)echo "selected"; ?>>˳����Ȼ�����鲻��ǿ��</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ��ľ���״��:</td>
<td><select  id="b8" name="b8">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b8']==1)echo "selected"; ?>>����Ǯ��ʲô����</option>
<option value="2" <?php if ($row['b8']==2)echo "selected"; ?>>Ŀǰʲô��û�У��Ժ���е�</option>
<option value="3" <?php if ($row['b8']==3)echo "selected"; ?>>��Щ���</option>
<option value="4" <?php if ($row['b8']==4)echo "selected"; ?>>�д��з�</option>
<option value="5" <?php if ($row['b8']==5)echo "selected"; ?>>�д��з��г�</option>
<option value="6" <?php if ($row['b8']==6)echo "selected"; ?>>Ǯ���õ��ģ��Һܸ�ԣ</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> �Է��ļ�ͥ��Ҫ��:</td>
<td><select  id="b9" name="b9">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b9']==1)echo "selected"; ?>>����и�ԣ�ļ�ͥ</option>
<option value="2" <?php if ($row['b9']==2)echo "selected"; ?>>��Ҵ���������</option>
<option value="3" <?php if ($row['b9']==3)echo "selected"; ?>>���ܸ���̫��</option>
<option value="4" <?php if ($row['b9']==4)echo "selected"; ?>>����ν�������޹�</option>
<option value="5" <?php if ($row['b9']==5)echo "selected"; ?>>ֻҪ�మ��ʲô������</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ������ѹ�:</td>
<td><select  id="b10" name="b10">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b10']==1)echo "selected"; ?>>�Թ��ù⻨��</option>
<option value="2" <?php if ($row['b10']==2)echo "selected"; ?>>��һЩ����һЩ</option>
<option value="3" <?php if ($row['b10']==3)echo "selected"; ?>>��Щ����Ʒ�����������</option>
<option value="4" <?php if ($row['b10']==4)echo "selected"; ?>>��ʡ��ʡ���û���</option>
<option value="5" <?php if ($row['b10']==5)echo "selected"; ?>>����˵�����ģ��Ҿ����ǽ�ʡ</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ������ڹ�����̬��:</td>
<td><select  id="b11" name="b11">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b11']==1)echo "selected"; ?>>������</option>
<option value="2" <?php if ($row['b11']==2)echo "selected"; ?>>����������</option>
<option value="3" <?php if ($row['b11']==3)echo "selected"; ?>>�Ͻ�������ҵ��</option>
<option value="4" <?php if ($row['b11']==4)echo "selected"; ?>>8Сʱ�ھ��ľ���</option>
<option value="5" <?php if ($row['b11']==5)echo "selected"; ?>>��Ǯ���ֶζ���</option>
<option value="6" <?php if ($row['b11']==6)echo "selected"; ?>>�����ӣ���Ū�쵼</option>
<option value="7" <?php if ($row['b11']==7)echo "selected"; ?>>��������</option>
<option value="8" <?php if ($row['b11']==8)echo "selected"; ?>>Ŀǰ�Ĺ������ʺ���</option>
<option value="9" <?php if ($row['b11']==9)echo "selected"; ?>>����û����</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ����С����:</td>
<td><select  id="b12" name="b12">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b12']==1)echo "selected"; ?>>���޳ɣ������</option>
<option value="2" <?php if ($row['b12']==2)echo "selected"; ?>>���٣�����̫����</option>
<option value="3" <?php if ($row['b12']==3)echo "selected"; ?>>����򣬾���һ��</option>
<option value="4" <?php if ($row['b12']==4)echo "selected"; ?>>����һ�ֽ����ֶ�</option>
<option value="5" <?php if ($row['b12']==5)echo "selected"; ?>>������Т��</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ��ͥ����:</td>
<td><select  id="b13" name="b13">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b13']==1)echo "selected"; ?>>��̫�ں�</option>
<option value="2" <?php if ($row['b13']==2)echo "selected"; ?>>��̫�Ҿ���</option>
<option value="3" <?php if ($row['b13']==3)echo "selected"; ?>>ϲ������</option>
<option value="4" <?php if ($row['b13']==4)echo "selected"; ?>>ϲ�����˴�ɨ�ɾ�</option>
<option value="5" <?php if ($row['b13']==5)echo "selected"; ?>>�н��</option>
<option value="6" <?php if ($row['b13']==6)echo "selected"; ?>>��Ū������ʰ</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ����������:</td>
<td><select  id="b14" name="b14">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b14']==1)echo "selected"; ?>>��ò�Ҫ</option>
<option value="2" <?php if ($row['b14']==2)echo "selected"; ?>>ֻϲ���㡢���</option>
<option value="3" <?php if ($row['b14']==3)echo "selected"; ?>>ϲ������è��</option>
<option value="4" <?php if ($row['b14']==4)echo "selected"; ?>>��ð������԰</option>
<option value="5" <?php if ($row['b14']==5)echo "selected"; ?>>����������������չ�</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> ��������:</td>
<td height="32"><select  id="b15" name="b15">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['b15']==1)echo "selected"; ?>>�����ò�Ҫ����</option>
<option value="2" <?php if ($row['b15']==2)echo "selected"; ?>>������У�����֪������</option>
<option value="3" <?php if ($row['b15']==3)echo "selected"; ?>>������У���������֪��</option>
<option value="4" <?php if ($row['b15']==4)echo "selected"; ?>>���ԣ�ֻҪ��������</option>
<option value="5" <?php if ($row['b15']==5)echo "selected"; ?>>���и��ģ���������</option>
<option value="6" <?php if ($row['b15']==6)echo "selected"; ?>>��Ϊ��ͬ������</option>
</select></td>
</tr>
<tr>
<td height="30" align="right">ϣ�����ļ�ͥ��ϵ:</td>
<td height="32"><input name="b16" type="text"  class=input id="b16" onFocus="setTagBehavior(this,'b16','tipinfo1');" value="<?php echo htmlout(stripslashes($row['b16']));?>" size="60" maxlength="240" >
<div id="tipinfo1"></div></td>
</tr>
<tr>
<td height="30" align="right">����������ദ����Ҫ����:</td>
<td height="32"><input name="b17" type="text"  class=input id="b17" onFocus="setTagBehavior(this,'b17','tipinfo2');" value="<?php echo htmlout(stripslashes($row['b17']));?>" size="60" maxlength="240" >
<div id="tipinfo2"></div></td>
</tr>
<tr>
<td height="30" align="right">��ϣ���Ľ��������Ȧ:</td>
<td height="32"><input name="b18" type="text"  class=input id="b18" onFocus="setTagBehavior(this,'b18','tipinfo3');" value="<?php echo htmlout(stripslashes($row['b18']));?>" size="60" maxlength="240" >
<div id="tipinfo3"></div></td>
</tr>
<tr>
<td height="30" align="right">����ضԷ���:</td>
<td height="32"><input name="b19" type="text"  class=input id="b19" onFocus="setTagBehavior(this,'b19','tipinfo4');" value="<?php echo htmlout(stripslashes($row['b19']));?>" size="60" maxlength="240" >
<div id="tipinfo4"></div></td>
</tr>
<tr>
<td height="35" align="right">&nbsp;</td>
<td height="32"><input type="hidden" name="submitok" value="modupdate" />
<input type="submit" name="Submit" value=" �� �� " class="button" />��
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?submitok=emptyupdate" class="uDF2C91" onClick="return confirm('�����أ�\n\n��ȷ������� ')"><b>��ա������������������</b></a></td>
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