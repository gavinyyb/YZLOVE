<?php
//��ӭʹ��Zeai2.0 ;
require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT grade,loveb,if2 FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_grade = $row[0];$data_loveb = $row[1];$data_if2 = $row[2];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok == "list") {
	$difftime = 2592000*6;//6 month
	$db->query("DELETE FROM ".__TBL_GBOOK__." WHERE ((unix_timestamp() -  unix_timestamp(addtime) ) > $difftime) AND userid=".$cook_userid);
}
if ($submitok=="addupdate") {
if ( !ereg("^[0-9]{1,10}$",$memberid) || empty($memberid) )callmsg("Forbidden","-1");
if ( !ereg("^[0-9]{1,2}$",$g) || empty($g) )callmsg("Forbidden","-1");
if ($g == 1) {
$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_GBOOK__." WHERE userid=".$memberid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$tmpgbookcount = $row[0];
}else{$tmpgbookcount = 0;}
if ($tmpgbookcount >= $Global['m_gbook_num'])callmsg("�Է��ռ�������������ʧ�ܣ�","-1");}
if (strlen($title)<1 || strlen($title)>100)callmsg("���������������1~100�ֽڣ�","-1");
if (strlen($content)<2 || strlen($content)>3000)callmsg("���������������1~3000�ֽڣ�","-1");
$addtime=date("Y-m-d H:i:s");
$rt = $db->query("SELECT nickname,logintime,email FROM ".__TBL_MAIN__." WHERE id=".$memberid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$membernickname  = $row[0];
$memberlogintime = $row[1];
$memberemail     = $row[2];
} else {
callmsg("Forbidden!","-1");
}
switch ($data_grade){ 
case 1:$tmpkcloveb = $Global['m_gbookloveb']*3;break;
case 2:$tmpkcloveb = $Global['m_gbookloveb']*2;break;
case 3:$tmpkcloveb = $Global['m_gbookloveb'];break;
default:$tmpkcloveb = 0;break;
}
if ($data_loveb < abs($tmpkcloveb)) {
callmsg("����Love�Ҳ��㣡����ʧ�ܡ�","k_getloveb.php");
exit;
} else {
$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$cook_userid." AND senduserid=".$memberid." AND ifhmd=1");
if ($db->num_rows($rt)) {
callmsg("�Է��ѽ�����Ϊ������������ʧ�ܣ�","-1");
} else {
$db->query("INSERT INTO ".__TBL_GBOOK__."  (userid,nickname,senduserid,sendnickname,title,content,addtime) VALUES ('$memberid','$membernickname','$cook_userid','$cook_nickname','$title','$content','$addtime')");
}
}
$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+'$tmpkcloveb' WHERE id=".$cook_userid);
$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$cook_userid','$cook_username','��������','$tmpkcloveb','$addtime')");
//m
//m end
header("Location: b_gbook.php?submitok=suss&membernickname=".$membernickname."&memberid=".$memberid."&g=".$g);
} elseif  ($submitok=="delupdate") {
$tmeplist = $list;
if (empty($tmeplist))callmsg("��ѡ����Ҫɾ������Ϣ��","-1");
if (!is_array($tmeplist))callmsg("Forbidden!","-1");
if (count($tmeplist) >= 1){
foreach ($tmeplist as $value) {
$db->query("DELETE FROM ".__TBL_GBOOK__." WHERE id=".$value);
}
}
header("Location: b_gbook.php?submitok=list");
}
function badcontact ($str,$to='*') {
	$contactlist  = "����,����ˬ,һҹ��,";
	$contactlist .= "sina.com,163.com,yahoo.com,qq.com,taobao.com,xici.net,";
	$contactlist .= "����:,����,QQȺ,qqȺ,�ѣ�Ⱥ,QQ��,qq��,�ѣѺ�,���,����,�ҵ�,�ҵ�Q,q��,Q:,Q��,q:,Q��,q��,oicq,��qq��,��QQ��,QQ,qq,�ѣ�,Q,��Q,Q��,Qq,qQ,";
	$contactlist .= "�ҵĵ绰,�ҵ��ֻ�,�绰,�ֻ�,��,��,��,��,��,��,��,��,��,��,";
	$contactlist .= "00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99";
	$from = $str;
	$rg_banname=$contactlist;
	$rg_banname=explode(',',$rg_banname);
	foreach($rg_banname as $value){
		if(strpos($str,$value)!==false){
			$from = str_replace($value,$to,$from);
		}
	}
	return($from);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* main1 */
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;}
.main1_tselect {float:left;width:64px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:64px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
--> 
</style>
</head>
<body>
<div class="main1">
<div class="main1_tselect"><a href="b_gbook.php?submitok=list" class="a6F9F00">�� �� ��</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_gbook2.php" class="a333">�� �� ��</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_friend.php" class="a333">�ҵĺ���</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_friend_news.php" class="a333">���Ѷ�̬</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_blacklist.php" class="a333">�� �� ��</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_request.php" class="a333">����Ҫ��</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_user.php" class="a333">������</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_rand.php" target="_blank" class="a333">����Ե��</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_viewuser.php" class="a333">����ÿ�</a></div></div>
<div class="main2">
<div class="main2_frame">
<table width="200" height="20" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php 
if ($cook_grade == 1){
	$tmpgbookcount = 0;
	$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_GBOOK__." WHERE userid=".$cook_userid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$tmpgbookcount = $row[0];
	}
	if ($tmpgbookcount >= $Global['m_gbook_num']){
?>
<table width="650" height="40" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffcc00" style="margin-bottom:20px">
  <tr>
    <td align="center" bgcolor="#ffffcc" ><img src="images/tips.gif" width="23" height="21" hspace="3" align="absmiddle" />�����ռ�������(�ѴＫ��<font color="#FF0000"><?php echo $Global['m_gbook_num']; ?></font>��)�����޷��յ����˵����ԣ�����ɾ�����֡������߼���Ա����������<a href="k_vip.php" class="uff6600"><b>�������</b></a></td>
  </tr>
</table>
<?php }}?>
<?php if ($submitok == "suss") { ?>
<table width="350" height="176" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#dddddd" style="margin:40px;margin-top:70px;">
<tr>
<td align="center" bgcolor="#f3f3f3" style="line-height:20px;"><img src="images/suss.gif" width="29" height="29" hspace="10" align="absmiddle" /><font color="#FF0000" style="font-size:10.3pt;font-weight:bold;">���ͳɹ�!</font><br />
<br />
<img src="images/backx.gif" width="16" height="14" hspace="5" /><a href="b_gbook2.php?submitok=list">�ص�������</a>������<img src="images/gbookx.gif" width="16" height="9" hspace="5" /><a href="b_gbook.php?submitok=add&memberid=<?php echo $memberid; ?>&membernickname=<?php echo $membernickname; ?>&g=<?php echo $g; ?>">�ٸ���<?php echo $membernickname; ?>����һ��</a><br />
<br /></td>
</tr>
</table>
<?php } elseif ($submitok == "add") { ?>
<table width="628" border="0" align="center" cellpadding="2" cellspacing="0">
<tr>
<td width="16" align="right" valign="top"><img src="images/tips.gif" width="23" height="21"></td>
<td width="504" valign="top" style="line-height:150%;color:#999999;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">ע������һ�����Ի���<font color="#FF6699">Love��</font><font color="#FF0000"><?php echo $Global['m_gbookloveb']*3; ?></font>�����Ż�Ա<font color="#FF0000"><?php echo $Global['m_gbookloveb']*2; ?></font>����ʯ��Ա<font color="#FF0000"><?php echo $Global['m_gbookloveb']; ?></font>������ǰΪ<?php
switch ($data_grade){ 
case 1:echo '��ͨ��Ա';break;
case 2:echo '���Ż�Ա';break;
case 3:echo '��ʯ��Ա';break;
default:echo '����Ա��δ֪';break;
}?>.</font></td>
</tr>
<tr>
  <td align="right" valign="top">&nbsp;</td>
  <td valign="top" style="line-height:150%;color:#999999;"><font color="#FF0000"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><?php echo $Global['m_area2']; ?>����������֣�����ѣ����衰�н��������Ѽ��桢���ƭ�֣��������Ը�</font></td>
</tr>
<tr>
  <td align="right" valign="top">&nbsp;</td>
  <td valign="top" style="line-height:150%;color:#999999;"><font color="#FF0000"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /></font>�Ͻ������������﹫���κ���ʽ����ϵ��ʽ������QQ�����䡢�绰����ַ����ַ�ȣ�����ϵͳ���������Ρ������Խ���ϵ�������뵽����������ø�������ϵ���㣬������д<a href="a4.php" class="uDF2C91"><b>��ϵ����</b></a>��</td>
</tr>
</table>
<br>
<table width="600" border="0" align="center" cellpadding="5" cellspacing="0" style="border:#ddd 1px solid;color:#666;">
<form action="b_gbook.php" method="post" name="FORM"  onSubmit="return chkform()">
<tr>
<td width="105" height="12" align="right" bgcolor="F7F7F7"><script language="javascript">
function chkform(){
if(document.FORM.title.value==""){
	alert('��������⣡');
	document.FORM.title.focus();
	return false;
}
if(document.FORM.content.value==""){
	alert('�������������ݣ�');
	document.FORM.content.focus();
	return false;
}
}
</script></td>
<td width="473"></td>
</tr>
<tr>
<td align="right" bgcolor="F7F7F7"><b>�� �� �ˣ�</b></td>
<td width="473"><?php echo $membernickname; ?></td>
</tr>
<tr>
<td align="right" bgcolor="F7F7F7"><b>�ꡡ���⣺</b></td>
<td><font color="#666666">
<input name="title" type="text" class="input" id="title" size="71" maxlength="100" style="font-size:14px;width:445px;">
</font></td>
</tr>
<tr>
<td align="right" bgcolor="F7F7F7"><b>�������ģ�</b></td>
<td><textarea name="content" cols="60" style="font-size:14px;width:440px;height:200px;overflow-y:auto;padding:5px"></textarea></td>
</tr>
<tr>
<td align="right" bgcolor="F7F7F7">&nbsp;</td>
<td height="60" valign="top"><input type="submit" name="Submit" value="��������" class="button"><input type=hidden name=memberid value=<?php echo $memberid; ?>><input type=hidden name=g value=<?php echo $g; ?>><input type=hidden name=submitok value="addupdate"></td>
</tr>
</form>
</table>
<?php } elseif ($submitok == "show") { ?>
<?php 
if ( !ereg("^[0-9]{1,10}$",$aid) || empty($aid))callmsg("Forbidden","-1");
if ( !ereg("^[0-9]{1,3}$",$sg) || empty($sg))callmsg("Forbidden","-1");
if ( !ereg("^[0-9]{1,2}$",$g) || empty($g))callmsg("Forbidden","-1");
$rt = $db->query("SELECT * FROM ".__TBL_GBOOK__." WHERE id=".$aid);
if($db->num_rows($rt))
$row = $db->fetch_array($rt);
if ($row['new'] == 1)$db->query("UPDATE ".__TBL_GBOOK__." SET new=0 WHERE id=".$aid);
?>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="30" colspan="2" bgcolor="#FFFFFF" style="color:#666;">�����ˣ�
<?php 
if ($row['senduserid'] == $Global['m_gbookadminuid']) {
echo "<font color=red>�ͷ�����</font>";
} else {
?>
<a href="<?php echo $Global['home_2domain'];?>/<?php echo $row['senduserid']; ?>"  target=_blank><?php echo geticon($sg).$row['sendnickname']; ?></a>
<?php
}?>������ʱ�䣺<?php echo $row['addtime'];?></td>
</tr>
<tr>
<td height="24" colspan="2" valign="top" style="color:#666;">�ꡡ�⣺<b><?php echo badcontact(htmlout(stripslashes($row['title']))); ?></b></td>
</tr>
<tr>
<td colspan="2" valign="top" bgcolor="#F7F7F7"  style="TABLE-LAYOUT: fixed; WORD-BREAK: break-all;font-size:10.3pt;line-height:200%;padding:20px;border:#ddd 1px solid;">
<?php
if ($row['senduserid'] == $Global['m_gbookadminuid']) {
echo stripslashes($row['content']);
}else{
echo badcontact(stripslashes($row['content']));
}?>
</td>
</tr>
<tr>
<td width="323" height="41" align="left" valign="top"><a href="javascript:history.back()"><img src="images/back.gif" width="66" height="26" vspace="10" border="0" /></a></td>
<td width="327" align="right" valign="top"><?php if ($row['senduserid'] != $Global['m_gbookadminuid']){?>
<a href="b_gbook.php?submitok=add&memberid=<?php echo $row['senduserid']; ?>&membernickname=<?php echo $row['sendnickname']; ?>&g=<?php echo $g; ?>"><img src="images/hf.gif" width="66" height="26" vspace="10" /></a>
<?php } ?></td>
</tr>
</table>
<?php } elseif ($submitok == "list") { ?><?php
//�б�
$rt=$db->query("SELECT a.id,a.senduserid,a.title,a.new,a.addtime,b.nickname,b.sex,b.grade,b.photo_s FROM ".__TBL_GBOOK__." a , ".__TBL_MAIN__." b  WHERE  a.userid=".$cook_userid." AND a.senduserid=b.id ORDER BY a.new DESC,a.id DESC");
$total = $db->num_rows($rt);
if ($total <= 0) {
echo "<br><br><table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd><tr><td align=center bgcolor=#f3f3f3><font color=666666>..������Ϣ..</font></td></tr></table>";
} else {
$pagesize=15;
require_once YZLOVE.'sub/class.php';
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?><?php if ($total > $pagesize) {?>
<table width="700" height="27" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<?php }?>
<table width="650" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
<form name=MYFORM method=post action=b_gbook.php>
<script LANGUAGE="JavaScript">
var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
return "��ȡ��"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
return "��ȫѡ"; }
}
</script>
<tr>
<td height="35" colspan="4" valign="top"><table width="646" height="28" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#ddd 1px solid;">
<tr>
<td width="71" align="left" valign="top"><input name="button" type="button" class="buttonx" onclick="this.value=check(this.form)" value="��ȫѡ" />
<input type=hidden name=submitok value=delupdate /></td>
<td width="509" align="center"><font color="#999999">�����ռ�������ݿ⼫Ϊ�Ӵ�ϵͳֻ��������ʱ�䡣</font></td>
<td width="66" align="right" valign="top"><input type="submit" class="buttonx" value="��ɾ��"  onclick="return confirm('ȷ��ɾ����')" /></td>
</tr>
</table></td>
</tr>
<?php
for($i=0;$i<$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
$id = $rows[0];
$senduserid = $rows[1];
$sendnickname = $rows[5];
$title = $rows[2];
$new = $rows[3];
$addtime = $rows[4];
$sex = $rows[6];
$grade = $rows[7];
$photo_s = $rows[8];
if ($new == 1){ 	
	if ($i % 2 == 0){
		$bg="bgcolor=#ffffcc";
		$overbg="#FFFF90";
		$outbg="#ffffcc";
	} else {
		$bg="bgcolor=#ffffcc";
		$overbg="#FFFF90";
		$outbg="#ffffcc";
	}
} else {	
	if ($i % 2 == 0){
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
	} else {
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
	}
}
?>
<tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'" >
<td width="10" height="28"><input type="checkbox" name="list[]" value="<?php echo $id; ?>"></td>
<td width="60" align="center">
<?php if ($senduserid != $Global['m_gbookadminuid']) {?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $senduserid; ?>" target="_blank"><?php }?>
<?php 
if (empty($photo_s)){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$sex.".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_s." width=41 height=50 border=0>";
}
?>
<?php if ($senduserid != $Global['m_gbookadminuid']) {?></a><?php }?></td>
<td width="120" align="left">
<?php
if ($senduserid == $Global['m_gbookadminuid']) {
echo "<font color=red>�ͷ�����</font>";
} else {
?>
<?php geticon($sex.$grade);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $senduserid; ?>"  target=_blank><?php if ( $sex == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo badstr($sendnickname);?></font></a>
<?php }?>
<br /></td>
<td width="450" align="left" style="line-height:200%;color:#999999;font-family:Verdana"><?php echo date_format2($addtime,'%Y-%m-%d %H:%M');?>��<a href="b_gbook.php?aid=<?php echo $id; ?>&submitok=show&sg=<?php echo $sex.$grade;?>&g=<?php echo $grade;?>"><?php if ($senduserid == $Global['m_gbookadminuid'])echo "<font color=red>";?>
<?php echo badcontact(htmlout(stripslashes($title))); ?></a>
<?php if ($new == 1)echo "��<img src=images/new2.gif alt='���ʼ�' align=absmiddle>";?></td>
</tr>
<?php }?>
</form>
</table>
<table width="650" height="20" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#ddd 1px solid;margin-top:10px;">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<?php
//lise end 
}
?>
<?php }?>	  
<br /><br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>