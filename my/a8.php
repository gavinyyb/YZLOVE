<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="modupdate") {
if (strlen($d1)>255)callmsg("�����̻���Ŀ�ġ��������2~127������","-1");
if (strlen($d2)>100)callmsg("����˾/�������ơ��������2~50������","-1");
if ( !ereg("^[0-9]{1,2}$",$d3) || empty($d3) )callmsg("��ѡ��ְ����ࡱ","-1");
if ( !ereg("^[0-9]{1,2}$",$d4) || empty($d4) )callmsg("��ѡ��ְλ�ȼ�:��","-1");
if (strlen($d5)>100)callmsg("��ְ�����ơ��������2~50������","-1");
if ( !ereg("^[0-9]{1,2}$",$d6) || empty($d4) )callmsg("��ѡ�񡰲�ҵ���:��","-1");
if (strlen($d7)>100)callmsg("��ѧУ��ϵ���������2~50������","-1");
if (strlen($d8)>100)callmsg("����Ϥ�����������2~50������","-1");
if (strlen($d9)>100)callmsg("��ר����Ȥ���������2~50������","-1");
if (strlen($d10)>100)callmsg("�������������������2~50������","-1");
if (strlen($d11)>2000)callmsg("�������������������2000���ֽڣ�1000��������","-1");
$rt = $db->query("SELECT userid FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
if (!$db->num_rows($rt)) {
$db->query("INSERT INTO ".__TBL_MAIN_DATA__."  (userid,d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,c11) VALUES ('$cook_userid','$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','$d11')");
} else {
$db->query("UPDATE ".__TBL_MAIN_DATA__." SET d1='$d1',d2='$d2',d3='$d3',d4='$d4',d5='$d5',d6='$d6',d7='$d7',d8='$d8',d9='$d9',d10='$d10',d11='$d11',ifmod=0 WHERE userid='$cook_userid'");
}
callmsg("�޸ĳɹ���","c_photo_up.php");
} elseif ($submitok=="emptyupdate") {
$db->query("UPDATE ".__TBL_MAIN_DATA__." SET d1='',d2='',d3=0,d4=0,d5='',d6=0,d7='',d8='',d9='',d10='',d11='' WHERE userid=".$cook_userid);
callmsg("�Ѿ���գ���ĸ�����ҳ��������ʾ���������ϣ���Ҫ�ָ���ʾ�������޸ģ�","a8.php");
}
$rt = $db->query("SELECT d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11 FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
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
#tipinfo1,#tipinfo2,#tipinfo3,#tipinfo4,#tipinfo5{display:none;width:230px;background:#F8FCF5;height:80px;margin:5px;line-height:200%;;overflow:scroll;overflow-x:hidden;}
--> 
</style>
</head>
<script language="JavaScript" type="text/javascript" src="a8.js"></script>
<body>
<ul>
<li><a href="a1.php">��������</a></li>
<li><a href="a2.php">��ϸ����</a></li>
<li><a href="a3.php">���Ķ���</a></li>
<li><a href="a4.php">��ϵ����</a></li>
<li><a href="a5.php">Լ�ύ��</a></li>
<li><a href="a6.php">��������</a></li>
<li><a href="a7.php">�쳾֪��</a></li>
<li class="liselect"><a href="a8.php">���̻���</a></li>
<li><a href="a9.php">�޸�����</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
<br />
<table width="650" border="0" align="center" cellpadding="2" cellspacing="0" style="color:#666;">
<form action="" method="post" name=YZLOVEFORM onSubmit="return chkform()">
<tr> 
<td width="169" height="35" align="right">���̻���Ŀ��:</td>
<td width="473">
<input name="d1" type="text" class=input id="d1" onFocus="setTagBehavior(this,'d1','tipinfo1');" value="<?php echo htmlout(stripslashes($row['d1']));?>" size="40" maxlength="120" >
<div id="tipinfo1"></div></td>
</tr>
<tr> 
<td height="35" align="right">��˾/��������:</td>
<td>  <input name="d2" type="text" id="d2" value="<?php echo htmlout(stripslashes($row['d2']));?>" size="40" maxlength="40" class=input></td>
</tr>
<tr> 
<td height="35" align="right">ְ�����:</td>
<td>
<select name="d3" id="d3">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['d3']==1)echo "selected"; ?>>��Ӫ����</option>
<option value="2" <?php if ($row['d3']==2)echo "selected"; ?>>��Ŀ����</option>
<option value="3" <?php if ($row['d3']==3)echo "selected"; ?>>������Դ</option>
<option value="4" <?php if ($row['d3']==4)echo "selected"; ?>>��������</option>
<option value="5" <?php if ($row['d3']==5)echo "selected"; ?>>����/���</option>
<option value="6" <?php if ($row['d3']==6)echo "selected"; ?>>��Ϣ/���Ϲ���</option>
<option value="7" <?php if ($row['d3']==7)echo "selected"; ?>>����ʦ(�����Ӳ��)</option>
<option value="8" <?php if ($row['d3']==8)echo "selected"; ?>>����ʦ(��������)</option>
<option value="9" <?php if ($row['d3']==9)echo "selected"; ?>>����ʦ(���������)</option>
<option value="10" <?php if ($row['d3']==10)echo "selected"; ?>>����ʦ(ϵͳ�밲ȫ)</option>
<option value="11" <?php if ($row['d3']==11)echo "selected"; ?>>����ʦ(����)</option>
<option value="12" <?php if ($row['d3']==12)echo "selected"; ?>>����/��������</option>
<option value="13" <?php if ($row['d3']==13)echo "selected"; ?>>��վ����/�߻�/���</option>
<option value="14" <?php if ($row['d3']==14)echo "selected"; ?>>����/԰��/�������</option>
<option value="15" <?php if ($row['d3']==15)echo "selected"; ?>>��ҵ���/����</option>
<option value="16" <?php if ($row['d3']==16)echo "selected"; ?>>�з�</option>
<option value="17" <?php if ($row['d3']==17)echo "selected"; ?>>��������</option>
<option value="18" <?php if ($row['d3']==18)echo "selected"; ?>>���̹���</option>
<option value="19" <?php if ($row['d3']==19)echo "selected"; ?>>��������/�豸</option>
<option value="20" <?php if ($row['d3']==20)echo "selected"; ?>>��������</option>
<option value="21" <?php if ($row['d3']==21)echo "selected"; ?>>����/ʩ��/������Ա</option>
<option value="22" <?php if ($row['d3']==22)echo "selected"; ?>>�������/Ԥ����</option>
<option value="23" <?php if ($row['d3']==23)echo "selected"; ?>>ũ������</option>
<option value="24" <?php if ($row['d3']==24)echo "selected"; ?>>�г�Ӫ��/������չ</option>
<option value="25" <?php if ($row['d3']==25)echo "selected"; ?>>�г����������</option>
<option value="26" <?php if ($row['d3']==26)echo "selected"; ?>>���/����/ý��</option>
<option value="27" <?php if ($row['d3']==27)echo "selected"; ?>>����/ó��</option>
<option value="28" <?php if ($row['d3']==28)echo "selected"; ?>>����/����</option>
<option value="29" <?php if ($row['d3']==29)echo "selected"; ?>>��������</option>
<option value="30" <?php if ($row['d3']==30)echo "selected"; ?>>�ͻ�����</option>
<option value="31" <?php if ($row['d3']==31)echo "selected"; ?>>�ɹ�</option>
<option value="32" <?php if ($row['d3']==32)echo "selected"; ?>>����/����/�ִ�</option>
<option value="33" <?php if ($row['d3']==33)echo "selected"; ?>>���ڱ���רҵ��Ա</option>
<option value="34" <?php if ($row['d3']==34)echo "selected"; ?>>���ڱ��վ�����</option>
<option value="35" <?php if ($row['d3']==35)echo "selected"; ?>>��ʦ/������Ա</option>
<option value="36" <?php if ($row['d3']==36)echo "selected"; ?>>��ͷ/�˲��н�</option>
<option value="37" <?php if ($row['d3']==37)echo "selected"; ?>>����</option>
<option value="38" <?php if ($row['d3']==38)echo "selected"; ?>>�߻�</option>
<option value="39" <?php if ($row['d3']==39)echo "selected"; ?>>��ѵʦ</option>
<option value="40" <?php if ($row['d3']==40)echo "selected"; ?>>����</option>
<option value="41" <?php if ($row['d3']==41)echo "selected"; ?>>����/���Ź�����</option>
<option value="42" <?php if ($row['d3']==42)echo "selected"; ?>>�༭/����/�İ�</option>
<option value="43" <?php if ($row['d3']==43)echo "selected"; ?>>����/����</option>
<option value="44" <?php if ($row['d3']==44)echo "selected"; ?>>��������</option>
<option value="45" <?php if ($row['d3']==45)echo "selected"; ?>>������Ա</option>
<option value="46" <?php if ($row['d3']==46)echo "selected"; ?>>����/����������</option>
<option value="47" <?php if ($row['d3']==47)echo "selected"; ?>>����</option>
<option value="48" <?php if ($row['d3']==48)echo "selected"; ?>>����/�˶�Ա</option>
<option value="49" <?php if ($row['d3']==49)echo "selected"; ?>>ҽ��/ҽʦ/������Ա</option>
<option value="50" <?php if ($row['d3']==50)echo "selected"; ?>>����/����/Ӫ��ʦ</option>
<option value="51" <?php if ($row['d3']==51)echo "selected"; ?>>��ҽ/�������/԰��</option>
<option value="52" <?php if ($row['d3']==52)echo "selected"; ?>>��ȫ����</option>
<option value="53" <?php if ($row['d3']==53)echo "selected"; ?>>����ҵ����</option>
<option value="54" <?php if ($row['d3']==54)echo "selected"; ?>>����ҵ������Ա</option>
<option value="55" <?php if ($row['d3']==55)echo "selected"; ?>>������Ա</option>
<option value="56" <?php if ($row['d3']==56)echo "selected"; ?>>��ʦ/����������</option>
<option value="57" <?php if ($row['d3']==57)echo "selected"; ?>>�幤/���Ź�����</option>
<option value="58" <?php if ($row['d3']==58)echo "selected"; ?>>����Ա</option>
<option value="59" <?php if ($row['d3']==59)echo "selected"; ?>>˽Ӫ��ҵ��</option>
<option value="60" <?php if ($row['d3']==60)echo "selected"; ?>>����ְҵ��</option>
<option value="61" <?php if ($row['d3']==61)echo "selected"; ?>>��ѵ��</option>
<option value="62" <?php if ($row['d3']==62)echo "selected"; ?>>��Уѧ��</option>
<option value="63" <?php if ($row['d3']==63)echo "selected"; ?>>����</option>
</select></td>
</tr>
<tr> 
<td height="35" align="right">ְλ�ȼ�:</td>
<td>
<select name="d4" id="d4">
<option value="" selected>��ѡ��</option>
<option value="1" <?php if ($row['d4']==1)echo "selected"; ?>>���ڽ׶�(2�����ڹ�������)</option>
<option value="2" <?php if ($row['d4']==2)echo "selected"; ?>>�м��׶�(2-5�깤������)</option>
<option value="3" <?php if ($row['d4']==3)echo "selected"; ?>>�߼��׶�(5�����Ϲ�������/�����ר��)</option>
<option value="4" <?php if ($row['d4']==4)echo "selected"; ?>>�ܼ�</option>
<option value="5" <?php if ($row['d4']==5)echo "selected"; ?>>�߼�������(CEO, EVP, GM)</option>
<option value="6" <?php if ($row['d4']==6)echo "selected"; ?>>����</option>
</select></td>
</tr>
<tr> 
<td height="35" align="right">ְ������:</td>
<td> 
<input name="d5" type="text" id="d5" value="<?php echo htmlout(stripslashes($row['d5']));?>" size="40" maxlength="40" class="input">
(�磺���³�,����,���۹���)</td>
</tr>
<tr> 
<td height="35" align="right">��ҵ���:</td>
<td>
<select name="d6" id="d6">
<option value='' selected>��ѡ��</option>
<option value="1" <?php if ($row['d6']==1)echo "selected"; ?>>������/��������</option>
<option value="2" <?php if ($row['d6']==2)echo "selected"; ?>>�����Ӳ��</option>
<option value="3" <?php if ($row['d6']==3)echo "selected"; ?>>��������</option>
<option value="4" <?php if ($row['d6']==4)echo "selected"; ?>>���ɵ�·</option>
<option value="5" <?php if ($row['d6']==5)echo "selected"; ?>>����</option>
<option value="6" <?php if ($row['d6']==6)echo "selected"; ?>>���������</option>
<option value="7" <?php if ($row['d6']==7)echo "selected"; ?>>���ͨ��</option>
<option value="8" <?php if ($row['d6']==8)echo "selected"; ?>>��ѧ����</option>
<option value="9" <?php if ($row['d6']==9)echo "selected"; ?>>ͨѶ</option>
<option value="10" <?php if ($row['d6']==10)echo "selected"; ?>>����繤</option>
<option value="11" <?php if ($row['d6']==11)echo "selected"; ?>>��ý��</option>
<option value="12" <?php if ($row['d6']==12)echo "selected"; ?>>��ҩ/ҽ���豸/���﹤��</option>
<option value="13" <?php if ($row['d6']==13)echo "selected"; ?>>����/�Ǳ�/��ҵ�Զ���</option>
<option value="14" <?php if ($row['d6']==14)echo "selected"; ?>>����/Ͷ��/֤ȯ</option>
<option value="15" <?php if ($row['d6']==15)echo "selected"; ?>>����/���</option>
<option value="16" <?php if ($row['d6']==16)echo "selected"; ?>>�˲��н�</option>
<option value="17" <?php if ($row['d6']==17)echo "selected"; ?>>��ѯ/רҵ����</option>
<option value="18" <?php if ($row['d6']==18)echo "selected"; ?>>�г�/���/����</option>
<option value="19" <?php if ($row['d6']==19)echo "selected"; ?>>�㲥/Ӱ��</option>
<option value="20" <?php if ($row['d6']==20)echo "selected"; ?>>��ý/���ų���</option>
<option value="21" <?php if ($row['d6']==21)echo "selected"; ?>>����ҵ</option>
<option value="22" <?php if ($row['d6']==22)echo "selected"; ?>>����/���ز�</option>
<option value="23" <?php if ($row['d6']==23)echo "selected"; ?>>��ҵ����</option>
<option value="24" <?php if ($row['d6']==24)echo "selected"; ?>>����/�˶�/����</option>
<option value="25" <?php if ($row['d6']==25)echo "selected"; ?>>����/����</option>
<option value="26" <?php if ($row['d6']==26)echo "selected"; ?>>ҽ��/����/��������</option>
<option value="27" <?php if ($row['d6']==27)echo "selected"; ?>>����/�Ƶ�/��������</option>
<option value="28" <?php if ($row['d6']==28)echo "selected"; ?>>ó��</option>
<option value="29" <?php if ($row['d6']==29)echo "selected"; ?>>����/����/���</option>
<option value="30" <?php if ($row['d6']==30)echo "selected"; ?>>����/�Ļ�</option>
<option value="31" <?php if ($row['d6']==31)echo "selected"; ?>>�н�/����ҵ</option>
<option value="32" <?php if ($row['d6']==32)echo "selected"; ?>>��е/����/�ع�ҵ</option>
<option value="33" <?php if ($row['d6']==33)echo "selected"; ?>>ʳƷ/����/�̾�</option>
<option value="34" <?php if ($row['d6']==34)echo "selected"; ?>>�칫/�Ľ�/����</option>
<option value="35" <?php if ($row['d6']==35)echo "selected"; ?>>ũ��������</option>
<option value="36" <?php if ($row['d6']==36)echo "selected"; ?>>���/������Ʒҵ</option>
<option value="37" <?php if ($row['d6']==37)echo "selected"; ?>>����</option>
<option value="38" <?php if ($row['d6']==38)echo "selected"; ?>>����/����/��ϸ����</option>
<option value="39" <?php if ($row['d6']==39)echo "selected"; ?>>��֯/��װ/����</option>
<option value="40" <?php if ($row['d6']==40)echo "selected"; ?>>����/��е����</option>
<option value="41" <?php if ($row['d6']==41)echo "selected"; ?>>�Ҿ�/�������/װ��</option>
<option value="42" <?php if ($row['d6']==42)echo "selected"; ?>>����/�մ�</option>
<option value="43" <?php if ($row['d6']==43)echo "selected"; ?>>�ҵ�ҵ</option>
<option value="44" <?php if ($row['d6']==44)echo "selected"; ?>>����Ʒ/���</option>
<option value="45" <?php if ($row['d6']==45)echo "selected"; ?>>ֽƷ/ӡˢ/��װ</option>
<option value="46" <?php if ($row['d6']==46)echo "selected"; ?>>����/����/��Դ</option>
<option value="47" <?php if ($row['d6']==47)echo "selected"; ?>>���/ұ��</option>
<option value="48" <?php if ($row['d6']==48)echo "selected"; ?>>����/�����о�������</option>
<option value="49" <?php if ($row['d6']==49)echo "selected"; ?>>��������</option>
<option value="50" <?php if ($row['d6']==50)echo "selected"; ?>>��ѵ����/����/����Ժ��</option>
<option value="51" <?php if ($row['d6']==51)echo "selected"; ?>>����/������ҵ</option>
<option value="52" <?php if ($row['d6']==52)echo "selected"; ?>>��ӯ������(Э��/����)</option>
<option value="53" <?php if ($row['d6']==53)echo "selected"; ?>>����</option>
</select></td>
</tr>
<tr> 
<td height="35" align="right">ѧУ��ϵ:</td>
<td> 
<input name="d7" type="text" id="d7" value="<?php echo htmlout(stripslashes($row['d7']));?>" size="40" maxlength="40" class=input>
(�磺���ݴ�ѧ�������Ӧ��)</td>
</tr>
<tr> 
<td height="35" align="right">��Ϥ����:</td>
<td> 
<input name="d8" type="text" id="d8" value="<?php echo htmlout(stripslashes($row['d8']));?>" size="40" maxlength="40" class=input>
(�磺���磬���ز�)</td>
</tr>
<tr> 
<td height="35" align="right">ר����Ȥ:</td>
<td> 
<input name="d9" type="text" id="d9" value="<?php echo htmlout(stripslashes($row['d9']));?>" size="40" maxlength="40" class=input>
(�磺Ӫ�����߻�)</td>
</tr>
<tr> 
<td height="35" align="right">��������:</td>
<td>  <input name="d10" type="text" id="d10" value="<?php echo htmlout(stripslashes($row['d10']));?>" size="40" maxlength="40" class=input></td>
</tr>
<tr> 
<td height="35" align="right">��������:</td>
<td> 
<textarea name="d11" cols="60" rows="5" id="d11"><?php echo htmlout(stripslashes($row['d11']));?></textarea>
<br>
�������2000�ֽڣ�1000���֡�</td>
</tr>
<tr> 
<td height="35" align="right">&nbsp;</td>
<td bgcolor="#FFFFFF"><input type="hidden" name="submitok" value="modupdate" />
<input type="submit" name="Submit" value=" �� �� " class="button" />��
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?submitok=emptyupdate" class="uDF2C91" onClick="return confirm('�����أ�\n\n��ȷ������� ')"><b>��ա����̻��ѡ��������</b></a></td>
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