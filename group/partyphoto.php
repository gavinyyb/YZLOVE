<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) && !empty($mainid))callmsg("������󣬸�Ⱥ�鲻���ڻ��ѱ��������ѱ�ɾ��1��","-1");
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid))callmsg("������󣬸���Ϣ�����ڻ��ѱ�ɾ����","-1");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT mainid,title,flag,bmnum FROM ".__TBL_GROUP_CLUB__." WHERE flag>0 AND id='$fid'");
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$mainid = $row['mainid'];
	$title = htmlout(stripslashes($row['title']));
	$flag = $row['flag'];
	$bmnum = $row['bmnum'];
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸���Ϣ�����ڻ��ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
exit;
}
$rt = $db->query("SELECT mbkind,title FROM ".__TBL_GROUP_MAIN__." WHERE id='$mainid' AND flag=1");
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$mbkind = $row['mbkind'];
	$maintitle = stripslashes($row['title']);
} else {
	echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸�Ⱥ�鲻���ڻ��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
	exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $title; ?> ������Ա</title>
<link href="images/<?php echo $mbkind; ?>/group.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
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
    <td style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"> <font color="#FFFFFF"><b><?php echo "<a href=".$Global['group_2domain']."/".$mainid." class=title>".$maintitle."</a>"; ?>
<?php
echo " >> "."<a href=party".$mainid.".html class=title>���ֲ��</a> >> "."<a href=partyshow".$fid.".html class=title>".$title."</a> >> </b>"."���Ƭ";
?></font></td>
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
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td><table width="940" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4>
<tr>
  <td width="713" height="30" background="images/<?php echo $mbkind; ?>/tdbg.gif" style="font-size:10.3pt;font-weight:bold;padding-left:5px;border-left:#ffffff 1px solid;border-top:#ffffff 1px solid;">
    <table width="99%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="438" style="font-size:10.3pt;font-weight:bold;">
<font class=tiaose >����ƣ�<img src="images/party.gif" width="17" height="12" hspace="5"><?php echo $title; ?></font></td>
<td width="262" align="right">&nbsp;</td>
      </tr>
    </table></td>
  <td width="224" align="center" background="images/<?php echo $mbkind; ?>/tdbg.gif"  style="font-weight:bold;padding-left:5px;border-top:#ffffff 1px solid;border-right:#ffffff 1px solid;">&nbsp;</td>
</tr>
<tr>
  <td colspan="2" align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px;"><?php
$rttop1 = $db->query("SELECT id,mainid,clubid,title,path_s,path_b FROM ".__TBL_GROUP_CLUB_PHOTO__." WHERE clubid='$fid' ORDER BY id DESC");
$totaltop1 = $db->num_rows($rttop1);
if($totaltop1>0){
	require_once YZLOVE.'sub/classx.php';
	$pagesize = 20;
	if ($p<1)$p=1;
	$mypage=new uobarpage($totaltop1,$pagesize);
	$pagelist = $mypage->pagebar(1);
	$pagelistinfo = $mypage->limit2();
	mysql_data_seek($rttop1,($p-1)*$pagesize);
?>
<style type="text/css"> 
.page1{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;cursor: pointer;padding-top:2px;background:#FBF9F9;}
.page2{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;background-color:#ffffcc;color:red;padding-top:2px;}
</style>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<?php
for($j=1;$j<=$pagesize;$j++) {
	$rowstop1 = $db->fetch_array($rttop1);
	if(!$rowstop1) break;
?>
  <td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px;" class="tiaose"><table width="140" height="140" border="0" cellpadding="2" cellspacing="0" style="border:#dddddd 0px solid;">
    <tr>
      <td align="center" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;"><a href="#" onClick="window.location.href='<?php echo $Global['www_2domain']; ?>/piczoom.php?picurl=<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rowstop1['path_b']; ?>'"><img src=<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rowstop1['path_s']; ?> alt="�Ŵ���Ƭ" border="0"></a></td>
    </tr>
  </table>
  <table width="50" height="5" border="0" align="center" cellpadding="0" cellspacing="0" >
		<tr>
		<td align="center" valign="top"></td>
		</tr>
		</table>
<?php echo htmlout(stripslashes($rowstop1['title']));?></td>
<?php if ($j % 5 == 0) {?>
</tr>
<tr>
<?php	} ?>
<?php } ?>
</tr>
</table>
		<table width="882" height="80" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		<td align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
		</tr>
		</table>
<?php } else {?>
    <br>
    <br>
    <font color="#999999">...���޻��Ƭ...</font><br><br>
<?php }?>    <br></td>
</tr>
</table></td>
</tr>
</table>
<table width="980" height="32" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:8px;"><br></td>
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
<td width="22"><a href="#top"><img src="images/bl_top.gif" alt="����ҳ��" width="22" height="15" border="0"></a></td></tr></table><br><br></body></html><?php ob_end_flush();?>