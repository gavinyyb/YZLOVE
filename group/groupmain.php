<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid))callmsg("������󣬸�Ȧ�Ӳ����ڻ��ѱ��������ѱ�ɾ��1��","-1");
require_once YZLOVE.'sub/conn.php';
if ($submitok == "loginupdate") {
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid))header("Location: ".$Global['www_2domain']."/login.php");
$rt = $db->query("SELECT nickname,sex,grade,photo_s FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
if($db->num_rows($rt) > 0){
$row = $db->fetch_array($rt);
$nicknamesexgradephoto_s = $row[0]."|".$row[1]."|".$row[2]."|".$row[3];
} else {
header("Location: ".$Global['www_2domain']."/login.php");
exit;
}
$rt = $db->query("SELECT ifopen FROM ".__TBL_GROUP_MAIN__." WHERE id='$mainid' AND flag=1");
$total = $db->num_rows($rt);
if($total>0){
$row = $db->fetch_array($rt);
$ifopen = $row[0];
} else {
callmsg("������󣬸�Ȧ�Ӳ����ڻ��ѱ��������ѱ�ɾ����","-1");
}
$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_USER__." WHERE userid='$cook_userid' AND mainid='$mainid'");
$row = $db->fetch_array($rt);
if ($row[0] > 0)callmsg("���Ѿ��Ǹ�Ȧ���е�һԱ���벻Ҫ�ظ����룡","-1");

if ($ifopen == 1) {
$addtime = date("Y-m-d H:i:s");
$db->query("INSERT INTO ".__TBL_GROUP_USER__."  (mainid,flag,addtime,userid,nicknamesexgradephoto_s) VALUES ('$mainid','1','$addtime','$cook_userid','$nicknamesexgradephoto_s')");
$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET allusrnum=allusrnum+1 WHERE id='$mainid'");
} else {
callmsg("��Ȧ���ѹرջ�Ա���룡","-1");
}
header("Location: groupmain.php?mainid=".$mainid);
}
$rt = $db->query("SELECT * FROM ".__TBL_GROUP_MAIN__." WHERE id='$mainid' AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$mbkind = $row['mbkind'];
$totalid = $row['totalid'];
$totaltitle = $row['totaltitle'];
$title = htmlout(stripslashes($row['title']));
$content = htmlout(stripslashes($row['content']));
$qgrade = $row['qgrade'];
$qloveb = $row['qloveb'];
$ifopen = $row['ifopen'];
$ifsh = $row['ifsh'];
$useropen = $row['useropen'];
$ifin = $row['ifin'];
$ifin2 = $row['ifin2'];
$area1 = $row['area1'];
$area2 = $row['area2'];
$allusrnum = $row['allusrnum'];
$wznum = $row['wznum'];
$bbsnum = $row['bbsnum'];
$photonum = $row['photonum'];
$picurl_s = $row['picurl_s'];
$picurl_b = $row['picurl_b'];
$click = $row['click'];
$addtime = $row['addtime'];
$userid = $row['userid'];
$nicknamesexgradephoto_s = $row['nicknamesexgradephoto_s'];
if (!empty($nicknamesexgradephoto_s)){
$tmpnickname = explode("|",$nicknamesexgradephoto_s);
$nickname = $tmpnickname[0];
$sex = $tmpnickname[1];
$grade = $tmpnickname[2];
$photo_s = $tmpnickname[3];
}
$userid1 = $row['userid1'];
$nicknamesexgradephoto_s1 = $row['nicknamesexgradephoto_s1'];
if (!empty($nicknamesexgradephoto_s1)){
$tmpnickname = explode("|",$nicknamesexgradephoto_s1);
$nickname1 = $tmpnickname[0];
$sex1 = $tmpnickname[1];
$grade1 = $tmpnickname[2];
}
$userid2 = $row['userid2'];
$nicknamesexgradephoto_s2 = $row['nicknamesexgradephoto_s2'];
if (!empty($nicknamesexgradephoto_s2)){
$tmpnickname = explode("|",$nicknamesexgradephoto_s2);
$nickname2 = $tmpnickname[0];
$sex2 = $tmpnickname[1];
$grade2 = $tmpnickname[2];
}
$userid3 = $row['userid3'];
$nicknamesexgradephoto_s3 = $row['nicknamesexgradephoto_s3'];
if (!empty($nicknamesexgradephoto_s3)){
$tmpnickname = explode("|",$nicknamesexgradephoto_s3);
$nickname3 = $tmpnickname[0];
$sex3 = $tmpnickname[1];
$grade3 = $tmpnickname[2];
}
if ($userid == $cook_userid || $userid1 == $cook_userid || $userid2 == $cook_userid || $userid3 == $cook_userid || $cook_grade == 10) {
	$authority_main = "OK";
} else {
	$authority_main = "NO";
}
} else {
//callmsg("������󣬸��û������ڻ��ѱ��������ѱ�ɾ����","-1");
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸�Ȧ�Ӳ����ڻ��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
exit;
}
/*
$shuaxin_groupindex = 'groupmain'.$mainid;
if ($_COOKIE["$shuaxin_groupindex"] != 'OK'){
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET click=click+1 WHERE id='$mainid'");
	setcookie("$shuaxin_groupindex",'OK');
}
*/
$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET click=click+1 WHERE id='$mainid'");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $area2; ?><?php echo $title; ?>��<?php echo $area1; ?><?php echo $totaltitle; ?>��<?php echo $nickname; ?>��Ȧ��!</title>
<link href="images/<?php echo $mbkind; ?>/group.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta content="<?php echo $area2; ?>����,<?php echo $area2; ?>����,<?php echo $area2; ?>���,<?php echo $area1; ?>������,<?php echo $area1; ?><?php echo $totaltitle; ?>" name="keywords">
<meta name="description" content="<?php echo $area2; ?>����,<?php echo $area2; ?>����,<?php echo $area2; ?>���,<?php echo $area1; ?>������,<?php echo $area1; ?><?php echo $totaltitle; ?>">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<table width="980" height="62" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#cccccc 1px solid;">
<tr>
<td valign="bottom" style="padding-top:2px;color:#cccccc;" class=tdbg2><img src="images/home.gif" hspace="5" vspace="2" align="absmiddle"><a href="<?php echo $Global['www_2domain']; ?>"><b><?php echo $Global['m_sitename']; ?>��ҳ</b></a></td>
<td align="right" valign="bottom" class=tdbg2 style="padding-top:2px;color:#cccccc;padding-right:4px;"><a href="<?php echo $Global['www_2domain']; ?>/login.php">��¼</a> | <a href="<?php echo $Global['www_2domain']; ?>/reg.php">ע��</a> | <a href="<?php echo $Global['www_2domain']; ?>/my" ><b>��������</b></a></td>
</tr>
<tr>
<td height="62" colspan="2" style="font-size:20px;color:#999999;">��<font color="#000000" face="����,����" style="letter-spacing:1px;"><?php echo $title; ?></font>��<font color="#666666" style="font-size:9pt;"><a href=<?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?> target=_blank class=666666><?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?></a></font></td>
</tr>
</table>
<table width="980" height="38" border="0" align="center" cellpadding="0" cellspacing="0" background="images/<?php echo $mbkind; ?>/1.gif" bgcolor="#FFFFFF">
<tr>
<td valign="top"><table height="36" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['www_2domain'];?>" class="title">������ҳ</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/3.gif" style="padding-top:5px;"><a href="<?php echo $mainid; ?>" class=titleselected>Ȧ����ҳ</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="article<?php echo $mainid; ?>.html" class="title">Ȧ�ڻ���</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="party<?php echo $mainid; ?>.html" class="title">��ۻ�</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="photo<?php echo $mainid; ?>.html" class="title">Ȧ�����</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="user<?php echo $mainid; ?>.html" class="title">Ȧ�ӳ�Ա</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['my_2domain']."/?i_group_invite.php?mainid=".$mainid;?>" class="title">��������</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="post<?php echo $mainid; ?>.html" class="title">�����»���</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['my_2domain']."/?i_group.php";?>" class="title">Ȧ�ӹ���</a></td>
</tr>
</table></td>
</tr>
</table>
<table width="980" height="310" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F9F8F9" style="border-left:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td width="657" valign="top" style="padding-left:5px;padding-top:2px;"><table width="670" height="305" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;">
<tr>
<td height="23" colspan="3" background="images/<?php echo $mbkind; ?>/5.gif" style="border-left:#ffffff 2px solid;border-right:#ffffff 2px solid;"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="93%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" hspace="5" align="absmiddle"> <b><font color="#FFFFFF">Ȧ����Ϣ</font></b></td>
<td width="7%" valign="bottom"><img src="images/<?php echo $mbkind; ?>/more.gif" width="36" height="11" hspace="2"></td>
</tr>
</table></td>
</tr>
<tr>
<td width="262" height="268" align="center" valign="top" style="color:#999999;padding-top:2px"><table width="240" height="200" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<?php if (!empty($picurl_s)) {?>
<table width="200" border="0" cellspacing="0" cellpadding="3" style="border:#efefef 1px solid;">
  <tr>
    <td align="center"><a href="<?php echo $Global['www_2domain']; ?>/piczoom.php?picurl=<?php echo $Global['up_2domain'];?>/photo/<?php echo  $picurl_b; ?>">
<img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo  $picurl_s; ?> border="0"></a></td>
  </tr>
</table>

<?php } else {?>
<a href="<?php echo $Global['my_2domain']; ?>/i_group_photo.php?mainid=<?php echo $mainid;?>"><img src=images/nophoto.gif border="0"></a><?php }?></td>
</tr>
</table>
<a href="photo<?php echo $mainid; ?>.html"><u>����Ȧ��ͼƬ</u></a> (��<font color="#FF0000" face="����"><?php echo $photonum; ?></font>��ͼƬ)
<table width="50" height="5" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
<td align="center" valign="top"></td>
</tr>
</table>
<font color="999999">Ȧ�ӵȼ�</font>:
<?php 
for($i=1;$i<=$qgrade;$i++) {
echo "<image src=images/x.gif align=absmiddle>";
}
for($i=1;$i<=(5-$qgrade);$i++) {
echo "<image src=images/hx.gif align=absmiddle>";
}
?>
<table width="50" height="4" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
<td align="center" valign="top"></td>
</tr>
</table>         
<font color="999999">����ʱ��</font><font color="666666">:</font> <font class="tiaose"><?php echo $addtime; ?></font></td>
<td width="246" valign="top" style="line-height:150%;padding:10px 10px 0 8px;font-family:����" class="tiaose"><table width="50" height="15" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0 0 5px 0">
<tr>
<td align="center" valign="top"><a href="groupmain.php?submitok=loginupdate&mainid=<?php echo $mainid;?>"><img src="images/<?php echo $mbkind; ?>/login.gif" border="0"></a></td>
</tr>
</table>
<font color="999999">�ء�����: </font><?php echo $area1; ?> -> <?php echo $area2; ?><br>
<font color="999999">�ࡡ����: </font><?php echo $totaltitle;?>��<font color="999999">������:</font>
<?php if ($ifin == 1) { echo "���л�Ա";} else { echo "��Ⱥ�ڳ�Ա";}?>
<br>
<font color="999999">���Ż�Ա����:</font>
<?php if ($ifopen == 1) { echo "��";} else { echo "��";}?>

<br>
<font color="999999">��������:</font>
<?php if ($ifin2 == 1) { echo "���л�Ա";} else { echo "��Ⱥ�ڳ�Ա";}?>��<font color="999999">�Ƿ����:</font>
<?php if ($ifsh == 1) { echo "��Ҫ���";} else { echo "����ͨ��";}?>
<br>
<font color="999999">�� Ա ��: </font><font color="#FF0000"><?php echo $allusrnum; ?></font> ��<font color="999999">����������:</font> <font color="#FF0000"><?php echo $click; ?></font> �˴�<br>
<font color="999999">��������: </font><font color="#FF0000"><?php echo $wznum; ?></font> ƪ����<font color="999999">��������: </font><font color="#FF0000"><?php echo $bbsnum; ?></font> ƪ<br>
<font color="999999">Ȧ�ӲƸ�<img src="images/qloveb.gif" width="11" height="12" hspace="3" vspace="3" align="absmiddle">:</font> <font color="#FF0000"><?php echo $qloveb; ?></font> ��Love���.
<table width="50" height="4" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
<td align="center" valign="top"></td>
</tr>
</table>
<font color="999999">Ȧ�ӽ���:</font><img src="images/zwh.gif" width="14" height="12" align="absbottom">
<table width="50" height="4" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
<td align="center" valign="top"></td>
</tr>
</table>
��<?php echo gylsubstr($content,100);?></td>
<td width="140" align="right" valign="top" style="padding-top:10px;"><table width="116" height="141" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="dddddd">
<tr>
<td align="center" bgcolor="#FFFFFF"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $userid; ?>" target=_blank>
<?php 
if (empty($photo_s)){
echo "<img src=".$Global['www_2domain']."/images/nopic".$sex.".gif border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_s." border=0>";
}
?>
</a></td>
</tr>
</table>
<br>
<table width="140" border="0" cellpadding="0" cellspacing="0">
<tr>
<td height="22" >
<font color="#999999">�ᡡ��:</font><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $userid; ?>" target=_blank><?php echo geticon($sex.$grade).$nickname; ?></a></td>
</tr>
<tr>
<td height="22" style='line-height:200%;'><font color="#999999">���᳤:</font><?php if (!empty($userid1)){ ?><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $userid1; ?>" target=_blank><?php echo geticon($sex1.$grade1).$nickname1; ?></a>
<?php }?></td>
</tr>
<tr>
<td height="22" style='line-height:200%;'><font color="#999999">���᳤:</font><?php if (!empty($userid2)){ ?>
<a href="<?php echo $Global['home_2domain']; ?>/<?php echo $userid2; ?>" target=_blank><?php echo geticon($sex2.$grade2).$nickname2; ?></a>
<?php }?></td>
</tr>
<tr>
<td height="22"><font color="#999999">���᳤:</font><?php if (!empty($userid3)){ ?>
<a href="<?php echo $Global['home_2domain']; ?>/<?php echo $userid3; ?>" target=_blank><?php echo geticon($sex3.$grade3).$nickname3; ?></a><?php }?></td>
</tr>
</table></td>
</tr>
</table></td>
<td align="center" valign="top" style="padding-left:1px;padding-top:2px;"><table width="293" height="305" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;">
<tr>
<td height="23" background="images/<?php echo $mbkind; ?>/5.gif" style="border-left:#ffffff 2px solid;border-right:#ffffff 2px solid;"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="86%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"> <b><font color="#FFFFFF">Ȧ�Ӿ���</font></b></td>
<td width="14%" valign="bottom"><a href="article.php?mainid=<?php echo $mainid;?>&listtype=1"><img src="images/<?php echo $mbkind; ?>/more.gif" width="36" height="11" hspace="7" border="0"></a></td>
</tr>
</table></td>
</tr>
<tr>
<td height="268" bgcolor="#FFFFFF" style="padding-left:8px;line-height:200%;">
<?php
$rtwz = $db->query("SELECT id,title FROM ".__TBL_GROUP_WZ__." WHERE mainid=".$mainid." AND ifjh=1 AND flag=1 ORDER BY id DESC LIMIT 11");
$totalwz = $db->num_rows($rtwz);
if($totalwz>0){
for($k=0;$k<$totalwz;$k++) {
	$rowswz = $db->fetch_array($rtwz);
	if(!$rowswz) break;
	$jhwztitle = htmlout(stripslashes($rowswz[1]));
	$jhwztitle = gylsubstr($jhwztitle,42);
	echo "<font color=666666 style='font-family:����'>��</font> ";
	echo "<a href=read".$rowswz[0].".html target=_blank class=333333>".$jhwztitle."</a><br>";
}
} else {
echo "<center><br><br><font color=999999>...������Ϣ...</font><br><br><br></center>";
}?>
</td>
</tr>
</table></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/<?php echo $mbkind; ?>/4.gif" width="980" height="4"></td>
</tr>
</table>
<table width="122" height="8" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr><td align="center"></td></tr></table>
<?php 
$rt=$db->query("SELECT id,title,num_n,num_r,flag,jzbmtime,bmnum FROM ".__TBL_GROUP_CLUB__." WHERE mainid=".$mainid." AND flag=1 ORDER BY id DESC");
$total = $db->num_rows($rt);
if($total>0){
?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/<?php echo $mbkind; ?>/4_1.gif" width="980" height="4"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F9F8F9" style="border-left:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td valign="top" style="padding-top:2px;"><table width="968" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#dddddd 1px solid;border-top:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td height="23" background="images/<?php echo $mbkind; ?>/5.gif" style="border-left:#ffffff 2px solid;border-right:#ffffff 2px solid;"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="93%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"><font color="#FFFFFF"><b>���»</b></font></td>
<td width="7%" align="right" valign="bottom"><a href="party<?php echo $mainid; ?>.html"><img src="images/<?php echo $mbkind; ?>/more.gif" alt="�鿴ȫ����Ա" width="36" height="11" hspace="7" border="0"></a></td>
</tr>
</table></td>
</tr>

</table>
  </td>
</tr>
</table>
<?php 
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
$bg="bgcolor=#FBF9F9";
$overbg="#ffffcc";
$outbg="#FBF9F9";
} else {
$bg="bgcolor=#ffffff";
$overbg="#ffffcc";
$outbg="#ffffff";
}
?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td>
<table width="950" height="50" border="0" align="center" cellpadding="0" cellspacing="0" <?php if ($i != $total)echo "style='border-bottom:#dddddd 1px solid'"; ?>>
<tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'"><td width="414" style="font-size:10.3pt;padding-left:5px;font-weight:bold;">
<?php
	echo "<a href=partyshow".$rows['id'].".html class=333333>";
	echo "<img src=images/party.gif hspace=6 border=0>".htmlout(stripslashes($rows['title']));
	echo "</a>";
if ($rows['flag'] == 1)echo "<img src=images/new2.gif hspace=6 border=0>";
?></td>
  <td width="99" align="left" style="color:#666666">�������� <?php if (($rows['num_n']+$rows['num_r']) <= 0){echo '<font color=red>����</font>';}else{echo '<b><font color=red>'.($rows['num_n']+$rows['num_r'])."</font></b> ��";}?></td>
<td width="118" align="left" style="color:#666666">�ѱ��� <a href=<?php echo $Global['group_2domain'];?>/partyuser.php?fid=<?php echo $rows['id'];?> target=_blank><u><font color="#ff0000"><b><?php echo $rows['bmnum'];?></b></font></u></a>����</td>
<td width="319" align="right" style="color:#999999">
<style type="text/css"> 
.timestyle {color:#f00;font-size:16px;font-weight:bold}
.timestyletext {color:#666;font-size:14px}
</style>
<?php 
$d1  = strtotime(date("Y-m-d H:i:s"));
$d2  = strtotime($rows['jzbmtime']);
$totals  = ($d2-$d1);
$day     = intval( $totals/86400 );
$hour    = intval(($totals % 86400)/3600);
$hourmod = ($totals % 86400)/3600 - $hour;
$minute  = intval($hourmod*60);
if ($rows['flag'] >2)$totals = -1;
//echo '<br><br>���趨�Ľ�ֹ����ʱ��Ϊ��'.date_format2($row['jzbmtime'],'%Y-%m-%d %H:%M').'��'.getweek(date_format2($row['jzbmtime'],'%Y-%m-%d')).'<br><br>';
if (($totals) > 0) {
	if ($day > 0){
		$outtime = "�������� <span class=timestyle>$day</span> �� ";
	} else {
		$outtime = "�������� ";
	}
	$outtime .= "<span class=timestyle>$hour</span> Сʱ <span class=timestyle>$minute</span> ��";
	$outtime .= "��<a href=partyshow".$rows['id'].".html><img src='images/bm2.gif' vspace=5 hspace=10 border=0 align=absmiddle></a>";
} else {
	$outtime = "<img src='images/jzbm.gif' border=0 align=absmiddle><font color=#999999><b>�����Ѿ�����</b></font>";
	if ($rows['flag'] == 1)$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET flag=3 WHERE id=".$rows['id']);
	$mainflag = 3;
}
echo '<span class=timestyletext>'.$outtime.'</span>';
?></td>
</tr>
</table>
</td>
</tr>
</table>
<?php }?>
<table width="980" height="5" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg2.gif">
<tr>
<td valign="top"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:8px">
<tr>
<td><img src="images/<?php echo $mbkind; ?>/4.gif" width="980" height="4"></td>
</tr>
</table>
<?php }?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/<?php echo $mbkind; ?>/4_1.gif" width="980" height="4"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F9F8F9" style="border-left:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td valign="top" style="padding-top:2px;padding-bottom:2px;"><table width="968" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#dddddd 1px solid;border-top:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td height="23" background="images/<?php echo $mbkind; ?>/5.gif" style="border-left:#ffffff 2px solid;border-right:#ffffff 2px solid;"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="93%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"> <font color="#FFFFFF"><b><?php echo $title; ?></b>��( �� <font color="#FF0000"><b><?php echo $allusrnum; ?></b></font> ����Ա )</font></td>
<td width="7%" align="right" valign="bottom"><a href="user<?php echo $mainid; ?>.html"><img src="images/<?php echo $mbkind; ?>/more.gif" alt="�鿴ȫ����Ա" width="36" height="11" hspace="7" border="0"></a></td>
</tr>
</table></td>
</tr>

</table>
<?php
$rttop1 = $db->query("SELECT userid,nicknamesexgradephoto_s FROM ".__TBL_GROUP_USER__." WHERE mainid=".$mainid." AND flag=1 ORDER BY id DESC LIMIT 9");
$totaltop1 = $db->num_rows($rttop1);
if($totaltop1>0){
?>
<table width="968" border="0" align="center" cellpadding="5" cellspacing="0" style="border-left:#dddddd 1px solid;border-bottom:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<?php
for($j=1;$j<=$totaltop1;$j++) {
$rowstop1 = $db->fetch_array($rttop1);
?>
<td align="center" bgcolor="#FFFFFF" style="padding-top:10px;"><table border="0" cellpadding="4" cellspacing="0" bgcolor="dddddd">
<tr>
<td height="100" align="center" bgcolor="#FFFFFF"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rowstop1[0]; ?>" target=_blank>
<?php 
if (!empty($rowstop1[1])){
$tmpusr = explode("|",$rowstop1[1]);
$nicknameusr = $tmpusr[0];
$sexusr = $tmpusr[1];
$gradeusr = $tmpusr[2];
$photo_susr = $tmpusr[3];
}
?>
<?php if (empty($photo_susr)){?><img src=<?php echo $Global['www_2domain'];?>/images/65x80<?php echo $sexusr; ?>.gif border=0 title="������Ƭ"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_susr; ?> width="65" height="80" border=0 title="<?php echo $nicknameusr.'����Ƭ'; ?>"><?php }?>
</a></td>
</tr>
<tr>
<td height="24" align="center" bgcolor="#FFFFFF"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rowstop1[0];?>" target=_blank><?php echo geticon($sexusr.$gradeusr).$nicknameusr;?></a></td>
</tr>
</table></td>
<?php if ($j % 9 == 0) {?>
</tr>
<tr>
<?php } ?>
<?php 	} ?>
</tr>
</table>
<?php 
} else {
echo "<br><br>...��������...";
}?></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/<?php echo $mbkind; ?>/4.gif" width="980" height="4"></td>
</tr>
</table>




<table width="122" height="8" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
<td align="center"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/<?php echo $mbkind; ?>/4_1.gif" width="980" height="4"></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F9F8F9" style="border-left:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td valign="top" style="padding-top:2px;"><table width="968" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#dddddd 1px solid;border-top:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td height="23" background="images/<?php echo $mbkind; ?>/5.gif" style="border-left:#ffffff 2px solid;border-right:#ffffff 2px solid;"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="93%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"> <font color="#FFFFFF"><b>Ȧ�ӻ���</b></font></td>
<td width="7%" align="right" valign="bottom"><a href="article<?php echo $mainid; ?>.html"><img src="images/<?php echo $mbkind; ?>/more.gif" title="����" width="36" height="11" hspace="7" border="0"></a></td>
</tr>
</table></td>
</tr>
</table>
</td>
</tr></table>
<?php
$rt=$db->query("SELECT id,bkid,bktitle,title,bbsnum,click,iftop,ifjh,flag,endtime,enduserid,endnicknamesexgradephoto_s,addtime,userid,nicknamesexgradephoto_s FROM ".__TBL_GROUP_WZ__." WHERE mainid=".$mainid." ORDER BY iftop DESC,endtime DESC LIMIT 20");
$total = $db->num_rows($rt);
if($total>0){
?>

<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:2px;padding-bottom:2px;"><table width="950" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="106"><a href="post.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>"><img src="images/<?php echo $mbkind; ?>/fb.gif" alt="�����»���" border="0" ></a></td>
<td width="521" align="center" valign="bottom"><table width="400" height="14" border="0" cellpadding="3" cellspacing="0">
  <form action="article.php"  method="get">
    <tr>
      <td width="100" align="right"><font color="#666666">�����±����ѯ��</font></td>
      <td width="242"><input name="keyword" type="text" size="40" class=input>
          <input name="mainid" type="hidden" value=<?php echo $mainid; ?>>
        <input name="bkid" type="hidden" value=<?php echo $bkid; ?>>
        <input name="bktitle" type="hidden" value=<?php echo $bktitle; ?>></td>
      <td width="26"><input type="image" src=images/so.gif></td>
    </tr>
  </form>
</table></td>
<td width="323" align="right" valign="bottom" style="font-family:����;color:#999999;padding-bottom:4px;">[ <a href="article.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>&listtype=1" class=tiaose title=������><b>����</b></a> ]��[ <a href="article.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>&listtype=2" class=tiaose title=�̶���><b>�̶�</b></a> ]��[ <a href="article.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>&listtype=3" class=tiaose title=����������><b>����</b></a> ]��[ <a href="article.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>&listtype=4" class=tiaose title=������������ʱ������><b>����</b></a> ]��[ <a href="article.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>&listtype=5" class=tiaose title=���ظ���Ŀ����><b>�ظ�</b></a> ]</td>
</tr>
</table>
<table width="950" height="26" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4 style="margin:0 0 9px 0" >
<tr>
<td align="left" style="color:#999999;padding-left:8px;padding-right:8px;line-height:200%;font-size:14px" class="tdbg"><font color="#666666">Ȧ�Ӱ�飺</font>  <?php
$rtbklist = $db->query("SELECT id,title FROM ".__TBL_GROUP_BK__." WHERE mainid=".$mainid." ORDER BY px DESC,id DESC");
$totalrtbklist = $db->num_rows($rtbklist);
if($totalrtbklist>0){
for($s=1;$s<=$totalrtbklist;$s++) {
$rowsrtbklist = $db->fetch_array($rtbklist);
echo "<a href=article.php?mainid=".$mainid."&bkid=".$rowsrtbklist[0]."&bktitle=".$rowsrtbklist[1]." class=tiaose style='font-size:14px'>".$rowsrtbklist[1]."</a>";
if ($s != $totalrtbklist)echo '��|��';
}
} else {
echo "<br><br>...����...";
}?></td>
</tr>
</table>
<table width="950" height="26" border="0" align="center" cellpadding="0" cellspacing="0" class=tdbg3>
<tr>
<td width="398" align="center" valign="bottom" class=tiaose><b>������</b></td>
<td width="111" align="center" valign="bottom"><b><a href="article<?php echo $mainid; ?>.html" title="����鿴ȫ������"><font class=tiaose><u>�������</u></font></a></b></td>
<td width="122" align="center" valign="bottom" class=tiaose><b>�� ��</b></td>
<td width="100" align="center" valign="bottom" class=tiaose><b>�ظ� / ����</b></td>
<td width="219" align="center" valign="bottom" class=tiaose><b>������</b></td>
</tr>
</table></td>
</tr>
</table>
<?php
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
$bg="bgcolor=#ffffff";
$overbg="#FBF9F9";
$outbg="#ffffff";
} else {
$bg="bgcolor=#ffffff";
$overbg="#FBF9F9";
$outbg="#ffffff";
}
$wztitle = htmlout(stripslashes($rows['title']));
?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td><table width="950" height="40" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#dddddd 1px solid;">
<tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'"><td width="398" style="font-size:10.3pt;padding-left:5px;">
<?php if ($rows['iftop'] == 1)echo "<img src=images/ding.gif alt=�̶���>";?> 
<?php
$userid_bk="NO";
if ($ifin == 0) {
	$rtbk = $db->query("SELECT userid FROM ".__TBL_GROUP_BK__." WHERE id=".$rows['bkid']);
	if($db->num_rows($rtbk)){
		$rowbk = $db->fetch_array($rtbk);
		$userid_bk = $rowbk[0];
		if ( !ereg("^[0-9]{1,8}$",$userid_bk) || empty($userid_bk))$userid_bk="NO";
	} else {
		callmsg("�����֤ʧ��!","-1");
	}
	if ($authority_main == "OK" || $userid_bk == $cook_userid) {
		echo "<a href=read".$rows['id'].".html class=333333>";
		echo "<img src=images/dian.gif hspace=6 align=absmiddle border=0>".$wztitle;
		echo "</a>";
	} else {
		$rt2 = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_USER__." WHERE userid='$cook_userid' AND mainid=".$mainid." AND flag=1");
		$row2 = $db->fetch_array($rt2);
		if ($row2[0] == 1){
			echo "<a href=read".$rows['id'].".html class=333333>";
			echo "<img src=images/dian.gif hspace=6 align=absmiddle border=0>".$wztitle;
			echo "</a>";
		} else {
			echo "<img src=images/dian.gif hspace=6 align=absmiddle border=0><font color=#999999>".$wztitle;
		}
	}
} elseif ($ifin == 1) {
	echo "<a href=read".$rows['id'].".html class=333333>";
	echo "<img src=images/dian.gif hspace=6 align=absmiddle border=0>".$wztitle;
	echo "</a>";
}
if ($ifin == 0)echo " <a href=./?submitok=loginupdate&mainid=".$mainid."><img src=images/m.gif border=0 alt=ֻ�б�Ȧ���ڳ�Ա�ſ��Բ鿴��������뱾Ȧ�ӡ�></a>";
$d1 = strtotime($rows['addtime']);
$d2 = strtotime(date("Y-m-d H:i:s"));
if (($d2-$d1) < 86400 )echo " <img src=images/new.gif border=0 alt=���췢��>";
if ( $rows['flag'] == 0 && ($authority_main == "OK" || $userid_bk == $cook_userid) )echo " <a href=readoperate.php?submitok=flag1&fid=".$rows['id']." title=������><font color=red><u>δ���</u></font></a>";
?>
 <?php if ($rows['ifjh'] == 1)echo "<img src=images/jh.gif alt=������>";?></td>
  <td width="111" align="center"><?php echo "<a href=article.php?mainid=".$mainid."&bkid=".$rows[1]."&bktitle=".htmlout(stripslashes($rows[2]))." class=tiaose>".htmlout(stripslashes($rows[2]))."</a>";?></td>
  <td width="123" align="center"><?php
$tmpnickname = explode("|",$rows['nicknamesexgradephoto_s']);
$tmpgrade = $tmpnickname[1].$tmpnickname[2];
geticon($tmpgrade);
echo "<a href=".$Global['home_2domain']."/".$rows['userid']." target=_blank>".$tmpnickname[0]."</a>";
?></td>
<td width="99" align="center"><font color="#FF0000"><b><?php echo $rows['bbsnum'];?></b></font> <font color="#999999">/</font> <font color="#FF0000"> <?php echo $rows['click'];?></font></td>
<td width="219">
<?php
echo " <font color=#666666>".date_format2($rows['endtime'],'%Y-%m-%d %H:%M')."</font> <font color=#cccccc>|</font> ";
$tmpnicknameend = explode("|",$rows['endnicknamesexgradephoto_s']);
$tmpgradeend = $tmpnicknameend[1].$tmpnicknameend[2];
geticon($tmpgradeend);
echo "<a href=".$Global['home_2domain']."/".$rows['userid']." target=_blank>".$tmpnicknameend[0]."</a>";
?></td>
</tr>
</table></td>
</tr>
</table>
<?php
}
} else {
?>
<table width="980" height="81" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td align="center" style="padding-top:2px;padding-bottom:2px;"><font color="#999999">..������Ϣ..</font></td>
</tr>
</table>
<?php }?>
<table width="980" height="20" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
  <tr>
    <td align="center" style="padding-top:2px;padding-bottom:2px;">&nbsp;</td>
  </tr>
</table>
<table width="980" height="5" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg2.gif">
<tr>
<td valign="top"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td><img src="images/<?php echo $mbkind; ?>/4.gif" width="980" height="4"></td></tr></table>
<table width="980" height="34" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="21">&nbsp;</td>
<td align="center"><font color="#999999">&copy;��Ȩ����<?php echo date("Y"); ?> <?php echo $Global['m_sitename']; ?> (<?php echo $Global['m_siteurl']; ?>) </font></td>
<td width="22"><a href="#top"><img src="images/bl_top.gif" alt="����ҳ��" width="22" height="15" border="0"></a></td>
</tr>
</table>
<?php if ( ereg("^[0-9]{1,9}$",$cook_userid) && !empty($cook_userid) ) {?>
<script charset="gb2312" language="javascript" src="<?php echo $Global['www_2domain']; ?>/ajax/YzlovePOP.js?t=��վ������-&u=<?php echo $Global['www_2domain']; ?>&c=<?php echo $cook_nickname; ?>" id="zeai2_1"></script>
<?php if ( $cook_grade == 2 || $cook_grade == 3 || $cook_grade == 10 ){?>
<script language="javascript" src="<?php echo $Global['www_2domain']; ?>/ajax/Zeai2PB.js?u=<?php echo $Global['my_2domain']; ?>" id="zeai2_2"></script>
<?php }?>
<?php }?>
<script language="javascript" src="<?php echo $Global['www_2domain']; ?>/ajax/Zeai2ONLINE.js?u=<?php echo $Global['www_2domain']; ?>" id="zeai2_3"></script>
</body>
</html>
<?php
require_once YZLOVE.'sub/online.php';
$online = new online_yzlove;
$online->chk();
$mtime = explode(' ', microtime());
$totaltime = number_format(($mtime[1] + $mtime[0] - $starttime), 6);
echo '<center><font color=#ffffff>'.$totaltime.'</font></center>';
ob_end_flush();
?>