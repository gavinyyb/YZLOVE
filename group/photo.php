<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid))callmsg("������󣬸�Ⱥ�鲻���ڻ��ѱ��������ѱ�ɾ��1��","-1");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT mbkind,title FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
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
<title><?php echo $maintitle; ?> Ⱥ�����</title>
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
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="party<?php echo $mainid; ?>.html" class="title">��ۻ�</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/3.gif" style="padding-top:5px;"><a href="photo<?php echo $mainid; ?>.html" class="titleselected">Ȧ�����</a></td>
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
echo " >> "."</b>Ⱥ�����";
?></font></td>
<td width="29%" align="right" valign="bottom"></td>
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
<tr><td><table width="940" height="430" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4>
<tr>
<td width="160" height="30" align="center" background="images/<?php echo $mbkind; ?>/tdbg.gif" style="font-size:10.3pt;border-left:#ffffff 1px solid;border-top:#ffffff 1px solid;border-right:#ffffff 1px solid"><font class=tiaose>:: <b>���Ŀ¼</b> :: </font></td>
<td rowspan="2" align="center" valign="top" bgcolor="#FFFFFF" style="font-size:10.3pt;border-right:#ffffff 1px solid;border-top:#ffffff 1px solid;"><br>
<?php
if (empty($kind)){
$rt=$db->query("SELECT * FROM ".__TBL_GROUP_PHOTO__." WHERE mainid=".$mainid." ORDER BY id DESC");
} else {
if ( !ereg("^[0-9]{1,8}$",$kind) || empty($kind))callmsg("Forbidden!","-1");
$rt=$db->query("SELECT * FROM ".__TBL_GROUP_PHOTO__." WHERE mainid=".$mainid." AND kind='$kind' ORDER BY id DESC");
}
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/classx.php';
$pagesize = 16;
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
  <table width="701" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <?php
for($j=1;$j<=$pagesize;$j++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
  <td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px;"><table width="100" border="0" cellpadding="3" cellspacing="0" style="border:#dddddd 0px solid;">
  <tr>
  <td width="100" height="100" align="center" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;"><div class="photo150X150">
  <a href="#" onClick="window.location.href='<?php echo $Global['www_2domain'];?>/piczoom.php?picurl=<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows['path_b']; ?>'"><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows['path_s']; ?> alt="�Ŵ���Ƭ" border="0"></a></div></td>
  </tr>
  <tr>
  <td height="18" align="center" class=tiaose><?php echo  $rows['title']; ?></td>
  </tr>
  <tr>
  <td height="9" align="center" ><font color="#999999"><?php echo date_format2($rows['addtime'],'%Y-%m-%d %H:%M'); ?></font></td>
  </tr>
    
  </table></td>
  <?php if ($j % 4 == 0) {?>
  </tr>
  <tr>
  <?php	} ?>
  <?php } ?>
  </tr>
  </table>
  <table width="96%" height="64" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td height="64" align="right" style="color:#666666;"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
  </tr>
  </table>
  <?php } else {?>
  <br>
  <br>  <font color="#999999">...������Ƭ...</font><br>
  <br>
  <br>
  <br>
  <?php }?></td>
</tr>
<tr>
<td height="500" valign="top" bgcolor="#FFFFFF" class=tdbg style="padding:20px;">
<?php
$rtroot = $db->query("SELECT id,title FROM ".__TBL_GROUP_PHOTO_KIND__." WHERE mainid=".$mainid." ORDER BY px DESC,id DESC");
$totalroot = $db->num_rows($rtroot);
if($totalroot>0){
echo "<img src=images/root.gif align=absmiddle hspace=3 vspace=5><a href=photo".$mainid.".html class=tiaose>ȫ����Ƭ</a><br>";
for($k=0;$k<$totalroot;$k++) {
$rowsroot = $db->fetch_array($rtroot);
echo "<img src=images/root.gif align=absmiddle hspace=3 vspace=5><a href=photo.php?mainid=".$mainid."&kind=".$rowsroot['id'];
if ($rowsroot['id'] == $kind)echo " class=tiaose";
echo ">".$rowsroot['title']."</a><br>";
}
} else {
echo "<br><br><font color=#999999>...����Ŀ¼...</font>";
}?></td>
</tr>
</table></td>
</tr>
</table>
<table width="980" height="20" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
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