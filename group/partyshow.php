<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) && !empty($mainid))callmsg("������󣬸�Ȧ�Ӳ����ڻ��ѱ��������ѱ�ɾ��1��","-1");
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid))callmsg("������󣬸���Ϣ�����ڻ��ѱ�ɾ����","-1");
require_once YZLOVE.'sub/conn.php';
if ($submitok == "addupdate" || $submitok == "bmupdate") {
	if ( (strlen($content)>30000 || strlen($content)<1) && ($submitok == "addupdate") )callmsg("����Թ������٣��������1~20000�ֽ�����","-1");
	if ( (strlen($tel)>200 || strlen($tel)<8) && ($submitok == "bmupdate") )callmsg("����������ֻ����绰","bm.php?mainid=".$mainid."&fid=".$fid."&mbkind=".$mbkind);
	if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;}
	$rt = $db->query("SELECT nickname,sex,grade,photo_s FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$nicknamesexgradephoto_s = $row[0]."|".$row[1]."|".$row[2]."|".$row[3];
	} else {
		header("Location: ".$Global['www_2domain']."/login.php");
		exit;
	}
	$addtime = date("Y-m-d H:i:s");
	if ($submitok == "addupdate") {
		$db->query("INSERT INTO ".__TBL_GROUP_CLUB_BBS__." (mainid,clubid,content,addtime,userid,nicknamesexgradephoto_s) VALUES ('$mainid','$fid','$content','$addtime','$cook_userid','$nicknamesexgradephoto_s')");
		$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET gbooknum=gbooknum+1 WHERE id=".$fid);
		header("Location: partyshow.php?fid=".$fid."&p=".$redirectpage."#bbs");
	} elseif ($submitok == "bmupdate") {
		$rt = $db->query("SELECT flag FROM ".__TBL_GROUP_CLUB__." WHERE flag>0 AND id=".$fid);
		if($db->num_rows($rt)){
			$row = $db->fetch_array($rt);
			$flag = $row[0];
		} else {
			echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸���Ϣ�����ڻ��ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
			exit;
		}
		if ($flag == 1) {
			$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_CLUB_USER__." WHERE clubid=".$fid." AND userid=".$cook_userid);
			$row = $db->fetch_array($rt);
			$tmpcnt = $row[0];
			if ($tmpcnt > 0)callmsg("���Ѿ��������ˣ��벻Ҫ�ظ�����!","-1");
			$db->query("INSERT INTO ".__TBL_GROUP_CLUB_USER__." (mainid,clubid,addtime,userid,nicknamesexgradephoto_s,tel) VALUES ('$mainid','$fid','$addtime','$cook_userid','$nicknamesexgradephoto_s','$tel')");
			$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET bmnum=bmnum+1 WHERE id=".$fid);
		} else {
			callmsg("����ѽ�ֹ����!","-1");
		}
		callmsg("�����ɹ�!","partyshow".$fid.".html");
		//header("Location: partyshow".$fid.".html");
	}
}

if ($p == 1 || empty($p)){
$rt = $db->query("SELECT * FROM ".__TBL_GROUP_CLUB__." WHERE flag>0 AND id=".$fid);
}else{
$rt = $db->query("SELECT mainid,maintitle,title,gbooknum FROM ".__TBL_GROUP_CLUB__." WHERE flag>0 AND id=".$fid);
}
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$mainid = $row['mainid'];
	$maintitle = $row['maintitle'];
	$title = htmlout(stripslashes($row['title']));
	if ($p == 1 || empty($p)){
		$kind = htmlout(stripslashes($row['kind']));
		$hdtime = htmlout(stripslashes($row['hdtime']));
		$address = htmlout(stripslashes($row['address']));
		$jtlx = htmlout(stripslashes($row['jtlx']));
		$num_n = $row['num_n'];
		$num_r = $row['num_r'];
		$rmb_n = $row['rmb_n'];
		$rmb_r = $row['rmb_r'];
		$tbsm = htmlout(stripslashes($row['tbsm']));
		$content = stripslashes($row['content']);
		$flag = $row['flag'];
		$click = $row['click'];
		$jzbmtime = $row['jzbmtime'];
		$addtime = $row['addtime'];
		$bmnum = $row['bmnum'];
	}
	$gbooknum = $row['gbooknum'];
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸���Ϣ�����ڻ��ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
exit;
}
$rt = $db->query("SELECT mbkind,title,ifin,userid,nicknamesexgradephoto_s,userid1,userid2,userid3 FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$mbkind = $row['mbkind'];
	$maintitle = stripslashes($row['title']);
	$ifin = $row['ifin'];
	$userid = $row['userid'];
	$userid_main = $userid;
	$tmpnickname = explode("|",$row['nicknamesexgradephoto_s']);
	$nickname = $tmpnickname[0];
	$sex = $tmpnickname[1];
	$grade = $tmpnickname[2];
	$userid1_main = $row['userid1'];
	$userid2_main = $row['userid2'];
	$userid3_main = $row['userid3'];
} else {
	echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸�Ȧ�Ӳ����ڻ��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
	exit;
}
if ($userid_main == $cook_userid || $userid1_main == $cook_userid || $userid2_main == $cook_userid || $userid3_main == $cook_userid) {
	$authority_main = "OK";
} else {
	$authority_main = "NO";
}
/*
$shuaxin_grouppartyshow = 'partyshow'.$fid;
if ($_COOKIE["$shuaxin_grouppartyshow"] != 'OK'){
	$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET click=click+1 WHERE id='$fid'");
	setcookie("$shuaxin_grouppartyshow",'OK');
}
*/
$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET click=click+1 WHERE id=".$fid);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $title; ?>_<?php echo $address; ?></title>
<meta name="keywords" content="<?php echo $title; ?>,<?php echo $address; ?>,<?php echo $nickname; ?>" />
<meta name="description" content="<?php echo $nickname; ?>��<?php echo $maintitle; ?>,�����˻�ۻ�:<?php echo $title; ?>" />
<link href="images/<?php echo $mbkind; ?>/group.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<script language='javascript' type='text/javascript'>
<!--
function recommend() {
if (document.all){
var clipBoardContent="";
clipBoardContent+="�����μ�Party���Ѿۻᣡ";
clipBoardContent+="\n";
clipBoardContent+="������ƣ�<?php echo $title; ?>";
clipBoardContent+="\n";
clipBoardContent+="�����ϱ�����ַ��<?php echo $Global['group_2domain']; ?>/partyshow<?php echo $fid; ?>.html";
window.clipboardData.setData("Text",clipBoardContent);
alert("���Ƴɹ��������ʹ��ճ����(Ctrl+V)��������������һͬ����");
}
}
//-->
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="980" height="62" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#cccccc 1px solid;">
<tr>
<td valign="bottom" style="padding-top:2px;color:#cccccc;" class=tdbg2><img src="images/home.gif" hspace="5" vspace="2" align="absmiddle"><a href="<?php echo $Global['www_2domain']; ?>"><b><?php echo $Global['m_sitename']; ?>��ҳ</b></a></td>
<td align="right" valign="bottom" class=tdbg2 style="padding-top:2px;color:#cccccc;padding-right:4px;"><a href="<?php echo $Global['www_2domain']; ?>/login.php">��¼</a> | <a href="<?php echo $Global['www_2domain']; ?>/reg.php">ע��</a> | <a href="<?php echo $Global['www_2domain']; ?>/my" ><b>��������</b></a></td>
</tr>
<tr>
<td height="62" colspan="2" style="font-size:20px;color:#999999;">��<font color="#000000" face="����,����" style="letter-spacing:1px;"><?php echo $maintitle; ?></font>��<font color="#666666" style="font-size:9pt;"><a href=<?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?> target=_blank class=666666><?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?></a></font></td>
</tr>
</table>
<table width="980" height="38" border="0" align="center" cellpadding="0" cellspacing="0" background="images/<?php echo $mbkind; ?>/1.gif" bgcolor="#FFFFFF">
<tr>
<td valign="top"><table height="36" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['www_2domain'];?>" class="title">������ҳ</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $mainid; ?>" class=title>Ȧ����ҳ</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="article<?php echo $mainid; ?>.html" class="title">Ȧ�ڻ���</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/3.gif" style="padding-top:5px;"><a href="party<?php echo $mainid; ?>.html" class="titleselected">��ۻ�</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="photo<?php echo $mainid; ?>.html" class="title">Ȧ�����</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="user<?php echo $mainid; ?>.html" class="title">Ȧ�ӳ�Ա</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['my_2domain']."/?i_group_invite.php?mainid=".$mainid;?>" class="title">��������</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="post<?php echo $mainid; ?>.html" class="title">�����»���</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['my_2domain']."/?i_group.php";?>" class="title">Ȧ�ӹ���</a></td>
</tr>
</table></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F9F8F9" style="border-left:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td valign="top" style="padding-top:2px;"><table width="968" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#dddddd 1px solid;border-top:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td height="23" background="images/<?php echo $mbkind; ?>/5.gif" style="border-left:#ffffff 2px solid;border-right:#ffffff 2px solid;"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="71%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"> <font color="#FFFFFF"><b><?php echo "<a href=".$Global['group_2domain']."/".$mainid." class=title>".$maintitle."</a>"; ?>
<?php
echo " >> "."<a href=party".$mainid.".html class=title>���ֲ��</a> >> </b>"."<a href=partyshow".$fid.".html class=title>".$title."</a>";
?></font></td>
    <td width="29%" align="right" valign="bottom" style="padding-bottom:2px;padding-right:8px;"><font class="tiaobgse"><b>>></b><a onclick=recommend() href="####"><font class="yq">���Ʊ�����ַ���ú�������һ��μӾۻᣡ</font></a><b><<</b></font></td>
  </tr>
</table></td>
</tr>
</table>
</td>
</tr></table>
<table width="980" height="8" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td valign="top"></td>
</tr>
</table>
<?php if ($p == 1 || empty($p)) {
$d1  = strtotime(date("Y-m-d H:i:s"));
$d2  = strtotime($jzbmtime);
$totals  = ($d2-$d1);
$day     = intval( $totals/86400 );
$hour    = intval(($totals % 86400)/3600);
$hourmod = ($totals % 86400)/3600 - $hour;
$minute  = intval($hourmod*60);
if ($flag >2)$totals = -1;
?>  
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td><table width="940" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4>
<form action="bm.php" method=get>
<tr>
  <td width="713" height="30" background="images/<?php echo $mbkind; ?>/tdbg.gif" style="font-size:10.3pt;font-weight:bold;padding-left:5px;border-left:#ffffff 1px solid;border-top:#ffffff 1px solid;">
    <table width="99%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="438" style="font-size:10.3pt;font-weight:bold;">
<font class=tiaose >����ƣ�<img src="images/party.gif" hspace="5"><?php echo $title; ?></font></td>
<td width="262" align="right">����<font color="#FF0000"><b><?php echo $click; ?></b></font> �Ρ�(�����<font color="#FF0000"><b><?php echo $gbooknum; ?></b></font> ����<a href="#bbs" onClick="javascript:oEditor.focus();"><img src="images/fb.gif" width="13" height="13" hspace="3" border="0" align="absmiddle"><u><font color="#333333"><b>��Ҫ����</b></font></u></a>)</td>
      </tr>
    </table></td>
  <td width="224" align="center" background="images/<?php echo $mbkind; ?>/tdbg.gif"  style="border-top:#ffffff 1px solid;border-right:#ffffff 1px solid;">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="46%" style="font-weight:bold;padding-left:5px;">�ѱ�����<font color="#FF0000" face="Verdana, Arial" style="font-size:9pt;"><b><?php echo $bmnum; ?></b></font> ��<input name="mainid" type="hidden" value="<?php echo $mainid;?>">
<input name="fid" type="hidden" value="<?php echo $fid;?>"><input name="mbkind" type="hidden" value="<?php echo $mbkind;?>">
<input name="submitok" type="hidden" value="bmupdate">
</td>
    <td width="54%" align="right" valign="bottom" style="padding-right:5px;padding-top:4px"><?php if ($totals > 0) {?>
<input type="image" src="images/bm2.gif">
<?php }else{  ?>
<img src="images/jzbm.gif" border=0 align=absmiddle><font color="#999999" style="font-size:9pt;">�ѽ�ֹ����</font>
<?php }?></td>
  </tr>
</table></td>
</tr>
<tr>
  <td align="center" valign="top" bgcolor="#FFFFFF"><br>    <table width="680" border="0" cellpadding="5" cellspacing="1">
    <tr class=tdbg>
      <td width="64" height="30" align="right"><font class=tiaose>�� �� ��:</font></td>
      <td width="593"><?php
geticon($sex.$grade);
echo "<a href=".$Global['home_2domain']."/".$userid." target=_blank><u>".$nickname."</u></a>";
?></td>
    </tr>
    <tr>
      <td height="30" align="right"><font class=tiaose>״����̬:</font></td>
      <td><?php 
switch ($flag){ 
	case 0:
		echo "<font color=red>��δ���</font>";
	break;
	case 1:
		echo "<img src=images/bm.gif> <font color=0066CC>���ڱ���...</font>";
	break;
	case 2:
		echo '<font color=ff6600>�������</font>';
	break;
	case 3:
		echo "<font color=349933>Բ���ɹ�</font>";
	break;
}
?></td>
    </tr>
    <tr class=tdbg>
      <td height="30" align="right" valign="top">&nbsp;</td>
      <td style="color:#666666">
<style type="text/css"> 
.timestyle {color:#f00;font-size:22px;font-weight:bold}
.timestyletext {color:#666;font-size:14px}
</style>
<?php 
if ($totals > 0) {
	$outtime = "<img src=images/date.gif align=absmiddle vspace=10>&nbsp;";
	if ($day > 0){
		$outtime .= "�������� <span class=timestyle>$day</span> �� ";
	} else {
		$outtime .= "�������� ";
	}
	$outtime .= "<span class=timestyle>$hour</span> Сʱ <span class=timestyle>$minute</span> ��";
	$outtime .= "����<input type='image' src='images/bm2.gif'>";

} else {
	$outtime = "<img src='images/jzbm.gif' border=0 align=absmiddle vspace=10><font color=#999999><b>�����Ѿ�����</b></font>";
	if ($flag == 1)$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET flag=3 WHERE id=".$fid);
	$mainflag = 3;
}
echo '<span class=timestyletext> '.$outtime.'</span>';
echo '<br>��ֹ�������ڵ���'.date_format2($jzbmtime,'%Y-%m-%d %H:%M').'��'.getweek(date_format2($jzbmtime,'%Y-%m-%d'));
?></td>
    </tr>
    <tr>
      <td height="30" align="right"><font class=tiaose>�ࡡ����:</font></td>
      <td><?php echo $kind; ?></td>
    </tr>
    <tr class=tdbg>
      <td height="30" align="right"><font class=tiaose>ʱ������:</font></td>
      <td><?php echo $hdtime; ?></td>
    </tr>
    <tr>
      <td height="30" align="right"><font class=tiaose>�ء�����:</font></td>
      <td><?php echo $address; ?></td>
    </tr>
    <tr class=tdbg>
      <td height="30" align="right"><font class=tiaose>��ͨ·��:</font></td>
      <td><?php echo $jtlx; ?></td>
    </tr>
    <tr>
      <td height="30" align="right"><font class=tiaose>��������:</font></td>
      <td><img src="images/nan.gif" alt="��" width="11" height="14"> <?php if ($num_n == 0){echo '����';}else{echo '<b><font color=#FF0000>'.$num_n.'</font></b> ��';}?> �� <img src="images/nv.gif" alt="Ů" width="11" height="14">
<?php if ($num_r == 0){echo '����';}else{echo '<b><font color=#FF0000>'.$num_r.'</font></b> ��';}?></td>
    </tr>
    <tr class=tdbg>
      <td height="30" align="right"><font class=tiaose>�ѡ�����:</font></td>
      <td><img src="images/nan.gif" alt="��" width="11" height="14"> 
         <?php if ($rmb_n == 0){echo '��ѻ�AA��';}else{echo '<b><font color=#FF0000>'.$rmb_n.'</font></b> Ԫ';}?>
 �� <img src="images/nv.gif" alt="Ů" width="11" height="14">
<?php if ($rmb_r == 0){echo '��ѻ�AA��';}else{echo '<b><font color=#FF0000>'.$rmb_r.'</font></b> Ԫ';}?>
</td>
    </tr>
    <tr>
      <td height="30" align="right"><font class=tiaose>�ر�˵��:</font></td>
      <td><?php echo $tbsm; ?></td>
</tr>
</table>
<table width="680" border="0" cellspacing="0" cellpadding="0" style="TABLE-LAYOUT: fixed; WORD-BREAK: break-all;">
<tr>
<td class=tdbg2 style="font-size:10.3pt;line-height:200%;"><font class=tiaose ><b>���ϸ˵��</b>��</font><font color="#000000"><?php echo badstr($content); ?></font></td>
</tr>
</table>
<br></td>
<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:5px;"><table width="184" border="0" cellpadding="0" cellspacing="3">
    <tr>
      <td width="15" bgcolor="#FFFF00" style="border:#ffcc00 1px solid;">&nbsp;</td>
      <td width="172" valign="bottom">��<font color="#999999">�߿��ɫ��ʾδ���δ�ɷ�</font></td>
    </tr>
    <tr>
      <td width="15" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;">&nbsp;</td>
      <td valign="bottom">��<font color="#999999">�߿��ɫ��ʾ��ʽͨ��</font></td>
    </tr>
  </table>
<?php
$rttop1 = $db->query("SELECT clubid,flag,userid,nicknamesexgradephoto_s FROM ".__TBL_GROUP_CLUB_USER__." WHERE clubid=".$fid." ORDER BY flag DESC,id DESC");
$totaltop1 = $db->num_rows($rttop1);
if($totaltop1>0){
?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<?php
for($j=1;$j<=$totaltop1;$j++) {
$rowstop1 = $db->fetch_array($rttop1);
if(!$rowstop1) break;
?>
<td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px;"><table width="45" height="54" border="0" cellpadding="2" cellspacing="0" bgcolor="dddddd" style="margin-bottom:5px">
<tr>
<td height="50" align="center" <?php if ($rowstop1[1] == 0){echo "bgcolor=#ffff00";}else{echo "bgcolor=#ffffff";} ?> style="border:#<?php if ($rowstop1[1] == 0){echo "ffcc00";}else{echo "dddddd";} ?> 1px solid;"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rowstop1[2]; ?>" target=_blank>
<?php 
if (!empty($rowstop1[2])){
$tmpusr = explode("|",$rowstop1[3]);
$nicknameusr = $tmpusr[0];
$sexusr = $tmpusr[1];
$gradeusr = $tmpusr[2];
$photo_susr = $tmpusr[3];
}
if (empty($photo_susr)){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$sexusr.".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_susr." width=41 height=50 border=0>";
}
?>
</a></td>
</tr>
</table>
  <a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rowstop1[2];?>" target=_blank><?php echo geticon($sexusr.$gradeusr).$nicknameusr;?></a></td>
<?php if ($j % 3 == 0) {?>
</tr>
<tr>
<?php } ?>
<?php 	} ?>
</tr>
</table>
<table width="200" height="33" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><b><font color="#FF6600">>></font></b> <a href="partyuser.php?fid=<?php echo $rowstop1[0];?>"><u><b>�鿴ȫ����������</b></u></a></td>
  </tr>
</table>
<?php 
} else {
?>
<br><br>
<font color="#999999">...��ʱ��û���˱���...</font><?php }?><br></td>
</tr>
</form>
</table></td>
</tr>
</table>
<table width="980" height="30" border="0" align="center" cellpadding="0" cellspacing="1" background="images/bkbg.gif">
  <tr>
    <td height="31" align="center" valign="bottom" style="padding:8px;"><table width="940" height="30" border="0" cellpadding="0" cellspacing="1" class=tdbg4>
      <tr>
        <td height="30" background="images/<?php echo $mbkind; ?>/tdbg.gif" style="padding-left:10px;border-left:#ffffff 1px solid;border-right:#ffffff 1px solid;border-top:#ffffff 1px solid;font-size:10.3pt;"><font class=tiaose ><b>���Ƭ����������������������������������������������������������������������������������������������������������<a href="partyphoto.php?fid=<?php echo $fid; ?>" class=tiaose style="font-size:10.3pt;"><u>������Ƭ</u></a></b></font></td>
        </tr>
      <tr>
        <td height="140" align="center" bgcolor="#FFFFFF"><style type="text/css"> 
.photo140X105{width: 140px;height: 105px;overflow: hidden;text-align:center;}
.photo140X105 img, .resultImg img {height: 105px !important;width: auto !important;} 
.page1{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;cursor: pointer;padding-top:2px;background:#FBF9F9;}
.page2{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;background-color:#ffffcc;color:red;padding-top:2px;}

        </style>
<?php
$rt=$db->query("SELECT path_s,path_b FROM ".__TBL_GROUP_CLUB_PHOTO__." WHERE clubid='$fid' ORDER BY id DESC LIMIT 5");
$total = $db->num_rows($rt);
if($total>0){
?>
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <?php
for($j=1;$j<=$total;$j++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
              <td width="960" align="center" valign="top" bgcolor="#FFFFFF"><table width="140" border="0" cellpadding="2" cellspacing="0" style="border:#dddddd 0px solid;">
                  <tr>
                    <td align="center" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;"><div class=photo140X105><a href="#" onClick="window.location.href='<?php echo $Global['www_2domain']; ?>/piczoom.php?picurl=<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rows['path_b']; ?>'"><img src=<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rows['path_s']; ?> alt="�Ŵ���Ƭ" border="0"></a></div></td>
                  </tr>
              </table></td>
              <?php if ($j % 5 == 0) {?>
            </tr>
            <tr>
              <?php	} ?>
              <?php } ?>
            </tr>
          </table>
          <?php } else {?>
          <br>
          <br>
          <font color="#999999">...������Ƭ...</font><br>
          <br>
          <br>
          <br>
          <?php }?></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php } //p?>
<?php
$rt=$db->query("SELECT * FROM ".__TBL_GROUP_CLUB_BBS__." WHERE clubid='$fid' ORDER BY id");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/classx.php';
$pagesize = 20;
if ($p<1)$p=1;
$pagemax = ceil($total / $pagesize);
if ($total % $pagesize == 0){
	$redirectpage = $pagemax+1;
} else {
	$redirectpage = $pagemax;
}
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="980" height="30" border="0" align="center" cellpadding="0" cellspacing="1" background="images/bkbg.gif">
  <tr>
    <td height="31" align="center" valign="bottom"><table width="940" height="30" border="0" cellpadding="0" cellspacing="1" class=tdbg4>
        <tr>
          <td width="719" background="images/<?php echo $mbkind; ?>/tdbg.gif" style="padding-left:10px;border-left:#ffffff 1px solid;border-top:#ffffff 1px solid;font-size:10.3pt;"><font class=tiaose >
<?php echo "<b>�������<a href=".$mainid.".html class=tiaose style=font-size:10.3pt>".$maintitle."</a>";
echo " >> "."<a href=party".$mainid.".html class=tiaose style=font-size:10.3pt>���ֲ��</a>";
echo " >> </b><img src=images/qzlist.gif hspace=5><a href=partyshow".$fid.".html class=tiaose style='font-size:10.3pt;'><u>".$title."</u></a>";
?></font></td>
          <td width="218" align="center" background="images/<?php echo $mbkind; ?>/tdbg.gif" style="padding-left:10px;border-top:#ffffff 1px solid;border-right:#ffffff 1px solid;font-size:10.3pt;">(�����<font color="#FF0000"><?php echo $gbooknum; ?></font> ����<a href="#bbs" onClick="javascript:oEditor.focus();"><img src="images/fb.gif" width="13" height="13" hspace="3" border="0" align="absmiddle"><u><font color="#333333"><b>��Ҫ����</b></font></u></a>)</td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="980" height="45" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
  <tr>
    <td width="961" align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    <td width="19" valign="top">&nbsp;</td>
  </tr>
</table>
<?php
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($p == 1){
	$n = $i;
} else {
	$n = $i+$pagesize*($p-1);
}
?>
<table width="980" height="64" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif" >
<tr>
  <td valign="top"style="padding-top:5px;padding-bottom:5px;"><table width="940" height="40" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4>
    <tr>
      <td width="100" align="center" valign="top" class=tdbg  style="padding:10px 0 10px 0">
          <table width="69" height="84" border="0" cellpadding="0" cellspacing="0" bgcolor="dddddd" style="border:#ddd 1px solid;margin:0 0 8px 0">
            <tr>
              <td align="center" bgcolor="#FFFFFF"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rows['userid'];?>" target=_blank>
<?php 
$nicknamesexgradephoto_swzbbs = $rows['nicknamesexgradephoto_s'];
$tmpnicknamewzbbs = explode("|",$nicknamesexgradephoto_swzbbs);
$nicknamewzbbs = $tmpnicknamewzbbs[0];
$sexwzbbs = $tmpnicknamewzbbs[1];
$gradewzbbs = $tmpnicknamewzbbs[2];
$photo_swzbbs = $tmpnicknamewzbbs[3];
if (empty($photo_swzbbs)){
echo "<img src=".$Global['www_2domain']."/images/65x80".$sexwzbbs.".gif border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_swzbbs." width=65 height=80 border=0>";
}
?></a></td>
            </tr>
          </table>
          <a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rows['userid'];?>" target=_blank class=333333><?php echo geticon($sexwzbbs.$gradewzbbs).$nicknamewzbbs; ?></a></td>
      <td valign="top" bgcolor="#FFFFFF" style="padding:15px;padding-top:0px;"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:#cccccc 1px dotted;">
          <tr>
            <td width="30%" height="27" valign="bottom" style="color:#666666;">����ʱ��: <?php echo date_format2($rows['addtime'],'%Y-%m-%d %H:%M'); ?></td>
            <td width="57%" align="right" valign="bottom" style="color:#999999;"><?php if ($authority_main == "OK" && $rows['flag'] == 1){ ?>[ <a href="readoperate.php?bbsid=<?php echo $rows['id'];?>&submitok=bbsclubdelupdate&p=<?php echo $redirectpage; ?>" class=tiaose onClick="return confirm('ȷ��ɾ����')"><b>ɾ��</b></a> ]����<?php }?><a href="<?php echo $Global['www_2domain']; ?>/315.php" target="_blank" class=tiaose><img src="images/jubao.gif" hspace="3" border="0">�ٱ�</a></td>
            <td width="9%" align="center" valign="bottom" style="color:#999999">[ <font color="#FF0000"><b><?php echo $n;?></b></font> ¥ ]</td>
            <td width="4%" align="right" valign="bottom"><a href="#top" class=tiaose><b>TOP</b></a></td>
          </tr>
        </table>
<br>
        <table width="810" border="0" cellspacing="0" cellpadding="0" style="TABLE-LAYOUT: fixed; WORD-BREAK: break-all;">
          <tr>
            <td style="font-size:10.3pt;line-height:200%;"><font color="#000000">
<?php
if ($rows['flag'] == 1) {
	echo stripslashes($rows['content']);
} else {
	echo "<font color=#999999>�����ѱ������ɾ����</font>";
}
?>
</font></td>
          </tr>
        </table></td>
    </tr>
  </table></td>
</tr>
</table>
<?php }?>
<?php } else { ?>
<table width="980" height="46" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
  <tr>
    <td height="31" align="center" valign="bottom"><font color="#999999" style=font-size:10.3pt;>...���޻����...</font> </td>
  </tr>
</table>
<?php } ?>

<table width="980" height="49" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
  <tr>
    <td width="961" align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    <td width="19" valign="top">&nbsp;</td>
  </tr>
</table>
<table width="980" height="64" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:8px;"><a name=#bbs></a>
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0].innerHTML;
	sContent = clearAllFormat(sContent);
	document.FORM.content.value = sContent;
	if(document.FORM.content.value.length<1 || document.FORM.content.value.length>30000){
	alert('������������1~20000�ֽڣ�');
	oEditor = document.htmlletter;
	fContent.focus();
	return false;
	}}
</script><form action="partyshow.php" method="post" name="FORM"  onSubmit="return chkform()" onClick="clear2bx()" style="margin:0px">
<input type="hidden" name="content" value="">
<input type="hidden" id="htext" name="text">
<input name="submitok" type="hidden" value="addupdate">
<input name="mainid" type="hidden" value="<?php echo $mainid; ?>">
<input name="fid" type="hidden" value="<?php echo $fid; ?>">
<input type="hidden" name="redirectpage" value="<?php echo $redirectpage; ?>">
<table width="940" height="40" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4>
<tr>
<td height="30" class=tdbg3 style="padding-left:10px;border-left:#ffffff 1px solid;border-top:#ffffff 1px solid;border-right:#ffffff 1px solid;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="96%" style="font-size:10.3pt;"><font class=tiaose >
<?php echo "<b>�������<a href=".$Global['group_2domain']."/".$mainid." class=tiaose style=font-size:10.3pt>".$maintitle."</a>";
echo " >> "."<a href=party".$mainid.".html class=tiaose style=font-size:10.3pt>���ֲ��</a>";
echo " >> </b><img src=images/party.gif hspace=5>".$title."";
?></font></td>
    <td width="4%"><a href="#top" class=tiaose><b>TOP</b></a></td>
  </tr>
</table></td>
        </tr>
      <tr>
        <td height="200" align="center" valign="top" class=tdbg><br>
          <iframe src="/gyleditor/gyleditor.htm" id="htmlletter" name="htmlletter" style="height:320px; width:90%;" scrolling="no" border="0" frameborder="0" tabindex="3" ></iframe>
          <br>
<table width="844" height="105" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="61" height="60" align="left"><font class=tiaose >�ϴ���Ƭ��</font></td>
<td width="783" align="left"><iframe src="<?php echo $Global['my_2domain'].'/up.php'; ?>" frameborder="0" allowtransparency="true" width="620" height="24" border=0 marginwidth="0" marginheight="0" scroll="no"></iframe></td>
</tr>
<tr>
<td height="60" colspan="2" align="center" valign="top"><input type="submit" name="Submit" value=" ��ʼ���� " class="button" <?php if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){echo "disabled='disabled'";} ?>></td>
</tr>
</table>
<br><br></td></tr>
</table></form>
<br></td>
  </tr>
</table>
<table width="980" height="5" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg2.gif">
<tr>
<td valign="top"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td><img src="images/<?php echo $mbkind; ?>/4.gif" width="980" height="4"></td></tr></table><table width="980" height="34" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td width="21">&nbsp;</td>
<td align="center"><font color="#999999">&copy;��Ȩ����<?php echo date("Y"); ?>��<?php echo $Global['m_sitename']; ?> (<a href="<?php echo $Global['www_2domain']; ?>" target="_blank"><?php echo $Global['m_siteurl']; ?></a>) </font></td>
<td width="22"><a href="#top"><img src="images/bl_top.gif" alt="����ҳ��" width="22" height="15" border="0"></a></td></tr></table><br><br>
<?php
if ( ereg("^[0-9]{1,8}$",$cook_userid) && !empty($cook_userid)) {
	$rtmail = $db->query("SELECT COUNT(id) FROM ".__TBL_GBOOK__." WHERE new=1 AND userid=".$cook_userid);
	if($db->num_rows($rtmail) > 0){
		$rowsmail = $db->fetch_array($rtmail);
		$rowsmailcount = $rowsmail[0];
	}
?>
<?php if ($rowsmailcount > 0) {?>
<bgsound src="<?php echo $Global['www_2domain'];?>/images/ring.wav" loop="1">
<script FOR=window EVENT=onload language="javascript">initAd2();</script>
<script language="javascript">
	function initAd2() {
		document.all.AdLayer2.style.posTop = -200;
		document.all.AdLayer2.style.visibility = 'visible'//���ò�Ϊ�ɼ�
		MoveLayer2('AdLayer2');
	}
	function MoveLayer2(layerName) {
		var x = 30;//x
		var y = 160;//y
		var diff = (document.body.scrollTop + y - document.all.AdLayer2.style.posTop)*.40;
		var y = document.body.scrollTop + y - diff;
		eval("document.all." + layerName + ".style.posTop = y");
		eval("document.all." + layerName + ".style.posRight = x");
		setTimeout("MoveLayer2('AdLayer2');", 50);//����20������ٵ��ú���MoveLayer()
	}
</script>
<div id=AdLayer2 style='position:absolute; width:70px; height:66px; z-index:21; visibility:hidden;right:2px;top:300px;color:#666666;' align=center>
<a href="<?php echo $Global['my_2domain'];?>/?b_gbook.php?submitok=list" class=u666666><img src='<?php echo $Global['www_2domain'];?>/images/newgbook.gif' border="0">������</a> <font style="color:red;"><?php echo $rowsmailcount; ?></font> ��</div> 
<?php
	}
}
?>
</body></html><?php
require_once YZLOVE.'sub/online.php';
$online = new online_yzlove;
$online->chk();
function getweek($date) {
$dateArr = explode("-", $date);
$weeknum = date("w", mktime(0,0,0,$dateArr[1],$dateArr[2],$dateArr[0]));
switch ($weeknum){
case 0:$xingqi='������';break;
case 1:$xingqi='����һ';break;
case 2:$xingqi='���ڶ�';break;
case 3:$xingqi='������';break;
case 4:$xingqi='������';break;
case 5:$xingqi='������';break;
case 6:$xingqi='������';break;
}
return $xingqi;
}
ob_end_flush();?>