<?php 
/*
+--------------------------------+
+ ����̨�����޸İ�Ȩ���ڱ�������
+ Modified Author����С�ȣ�lyixian@126.com www.linxiaoxian.com��QQ��6154041
+ ���ļ�����޸����ڣ�2010��1��
+ �����޸ģ��뱣��������Ϣ������վû��Ӱ��
+--------------------------------+
*/
require_once '../sub/init.php';
//
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){
header("Location: ".$Global['www_2domain']."/login.php");exit;
} else {
require_once YZLOVE.'sub/conn.php';
$cook_password = trimm($cook_password);
$rt = $db->query("SELECT id,username,nickname,grade,loveb,logintime,alltime,loginip,logincount,eb,ifmod,sjtime,if2,sex,photo_s,video_s,click,ifphoto,ifbirthday,ifheigh,ifedu,iflove,ifpay,zhenghun_jingjia FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag=1");
if ($db->num_rows($rt)) {
$row = $db->fetch_array($rt);
$ifphoto     = $row['ifphoto'];
$ifbirthday  = $row['ifbirthday'];
$ifedu  = $row['ifedu'];
$iflove  = $row['iflove'];
$ifpay  = $row['ifpay'];
$tmpx = 0;
if ($ifphoto == 1)$tmpx = $tmpx+1;
if ($ifbirthday == 1)$tmpx = $tmpx+1;
if ($ifedu == 1)$tmpx = $tmpx+1;
if ($iflove == 1)$tmpx = $tmpx+1;
if ($ifpay == 1)$tmpx = $tmpx+1;
} else {
header("Location: ".$Global['www_2domain']."/login.php");
exit;
}}
if ( ($row['zhenghun_jingjia'] <= $row['loveb']) &&  ($row['loveb'] > 0) && ($row['zhenghun_jingjia'] > 0) ){
	$rt=$db->query("SELECT id FROM ".__TBL_MAIN__." WHERE flag=1 AND zhenghun_jingjia>0 AND loveb>0 ORDER BY zhenghun_jingjia DESC,grade DESC");
	$total = $db->num_rows($rt);
	if($total>0){
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			$tmpid = $rows[0];
			if(!$rows) break;
			if ($tmpid == $cook_userid){
				$mc = $i;
				break;
			}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.main1 {width:770px;margin-left:28px;overflow:hidden;margin-bottom:15px;}
.main1_left {float:left;width:590px;text-align:left;margin-bottom:10px;}
.main1_right{float:right;width:170px}
.main1_right .T{width:170px;height:27px}
.main1_right .T .left{float:left;width:74px;height:27px}
.main1_right .T .right{float:left;width:91px;height:26px;line-height:26px;padding:0 5px 0 0;border-bottom:#CCE1B5 1px solid;text-align:right}
.main1_right .C{width:158px;background:#fff;border-left:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;padding:10px 5px 5px 5px}
.main1_right .C .box{width:152px;height:50px;padding:2px;margin:0 0 8px 0}
.main1_right .C .box .l_photo{float:left;width:41px;height:50px}
.main1_right .C .box .r_name{float:right;width:111px;height:50px}
.main1_right .C .box .r_name .ttt{width:111px;height:15px;padding:5px 0 0 0}
.main1_right .C .box .r_name .bbb{width:111px;height:30px;line-height:30px;text-align:center;color:#CCE1B5}
.main1_right .C .box .l_photo img{width:41px;height:50px}
.ttt a{text-decoration:none;color:#444;font-weight:bold}
.ttt a:hover{text-decoration:underline}
.bbb a{text-decoration:underline;color:#444}
.bbb a:hover{text-decoration:underline;color:#6F9F00}
.sex1{border:#dfead7 1px solid;background:#f4faf0}.sex1 span{color:#C3D590}
.sex2{border:#F7E4ED 1px solid;background:#FFF9FB}.sex2 span{color:#FCC8DE}
</style>
</head>
<body>
<div class="main1">
<div class="main1_left">
<table width="584" border="0" cellspacing="0" cellpadding="2" style="border:#ddd 1px solid;">
  <tr>
    <td width="540"><?php require_once YZLOVE.'myadv.html';?></td>
  </tr>
</table>
<br />
<table width="584" height="260" border="0" cellpadding="0" cellspacing="0" style="border:#dddddd 1px solid;">
<tr>
<td width="156" align="center" valign="top" style="padding-top:10px;"><table width="106" height="106" border="0" cellpadding="2" cellspacing="1" bgcolor="cccccc" style="border-right:#efefef 2px solid;border-bottom:#efefef 2px solid;">
<tr>
<td align="center" valign="middle" bgcolor="#FFFFFF" ><a href="c_photo_main.php"><?php if (empty($row['photo_s'])){?><img src=<?php echo $Global['www_2domain'];?>/images/nopic<?php echo $row['sex']; ?>.gif border=0 alt="�����������"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $row['photo_s']; ?> border=0 alt="�����������"><?php }?></a></td>
</tr>
</table>
<table width="88" height="10" border="0" cellpadding="0" cellspacing="0">
<tr>
<td></td>
</tr>
</table>
<a href="c_photo_main.php" class="u666">����������</a><br>
<table width="119" height="156" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="123" height="76" align="left" style="color:#999;font-size:10.3pt;padding-left:14px"><a href="b_gbook.php?submitok=list" class="uff6600"><b>������</b></a> (<?php
$rtmail = $db->query("SELECT COUNT(*) FROM ".__TBL_GBOOK__." WHERE new=1 AND userid=".$row['id']);
if($db->num_rows($rtmail)){
$rowsmail = $db->fetch_array($rtmail);
echo '<font color=red>'.$rowsmail[0].'</font>';
}
?>)��<br>
<br>                            
<a href="b_friend.php" class="uff6600"><b>������</b></a> (<?php
$rtmail = $db->query("SELECT COUNT(*) FROM ".__TBL_FRIEND__." WHERE new=1 AND ifhmd=0 AND userid=".$row['id']);
if($db->num_rows($rtmail)){
$rowsmail = $db->fetch_array($rtmail);
echo '<font color=red>'.$rowsmail[0].'</font>';
}
?>)��<br />
<br />
<a href="b_present.php?submitok=list" class="uff6600"><b>������</b></a> (<?php
$rtmail = $db->query("SELECT COUNT(*) FROM ".__TBL_PRESENT_USER__." WHERE new=1 AND userid=".$row['id']);
if($db->num_rows($rtmail)){
$rowsmail = $db->fetch_array($rtmail);
echo '<font color=red>'.$rowsmail[0].'</font>';
}
?>)��<br />
<br /></td>
</tr>
</table></td>
<td width="426" valign="top" style="padding-top:6px;">
<table width="395" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#666666">
<script language='javascript' type='text/javascript'>
<!--
function recommend() {
if (document.all){
var clipBoardContent="";
clipBoardContent+="<?php echo $Global['home_2domain']; ?>/<?php echo $row['id']; ?>";
window.clipboardData.setData("Text",clipBoardContent);
alert("���Ƴɹ��������ʹ��ճ����(Ctrl+V)���ܷ���QQ��MSN�ϵĺ��ѣ�ÿ����һ����������������ֵ������һ�㡣");
}
}
//-->
</script><tr>
<td width="72" height="26" align="right" style="border-bottom:#EDEAEA 1px solid;">�� �� ����</td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;font-family:Verdana"><font color="#666666"><?php echo $row['username'] ?>��(ID�ţ�<?php echo $row['id'] ?>)</font></td>
<td style="border-bottom:#EDEAEA 1px solid;">&nbsp;</td>
</tr>
<tr>
<td height="26" align="right" style="border-bottom:#EDEAEA 1px solid;">�ǡ����ƣ�</td>
<td width="185" align="left" style="border-bottom:#EDEAEA 1px solid;"><font color="#666666"><?php echo $row['nickname']; ?></font></td>
<td width="138" align="left" style="border-bottom:#EDEAEA 1px solid;"><a href="a1.php" class="uDF2C91"><img src="images/mod2.gif" hspace="3" border="0" align="absmiddle">�޸��ǳ�</a></td>
</tr>
<tr>
<td height="26" align="right" style="border-bottom:#EDEAEA 1px solid;">�ȡ�������</td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;"><font color="#666666">
<?php geticon($row['sex'].$row['grade']); ?><?php echo getgradetext($row['grade']) ?></font></td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;"><a href="k_vip.php" class="uDF2C91"><img src="images/vip.gif" width="15" height="9" hspace="3" border="0" align="absmiddle">��Ա����</a></td>
</tr>
<tr>
<td height="26" align="right" style="border-bottom:#EDEAEA 1px solid;">Love���ң�</td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;"><font color="#ff0000"><?php echo $row['loveb'];?></font> <font color="#666666">��</font></td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;"><img src="images/lovebx.gif" hspace="3" align="absmiddle"><a href="k_getloveb.php" class="uDF2C91">������ȡ</a></td>
</tr>
<tr>
<td height="26" align="right" style="border-bottom:#EDEAEA 1px solid;">�������֣�</td>
<?php $alltime = $row['alltime'];
$totalday = intval($alltime/1440);
$ty  = intval($totalday/160);
$ty_ = intval($totalday % 160);
$yl  = intval($ty_/40);
$yl_ = intval($ty_ % 40);
$xx  = intval($yl_/10);
$jftotals  = $alltime*60;
$jfday     = intval( $jftotals/86400 );
$jfhour    = intval(($jftotals % 86400)/3600);
$jfhourmod = ($jftotals % 86400)/3600 - $jfhour;
$jfminute  = intval($jfhourmod*60);
$timetips = '����: ';
if ($jfday > 0)$timetips .= $jfday.' �� ';
if ($jfhour > 0)$timetips     .= $jfhour.' Сʱ ';
if ($jfminute > 0)$timetips   .= $jfminute.' ���� ';?>
<td align="left" style="border-bottom:#EDEAEA 1px solid;CURSOR: hand;color:#f00" title="<?php echo $timetips; ?>"><?php
for($t=1;$t<=$ty;$t++){echo "<image src=images/star160.gif title='$timetips'>";}
for($y=1;$y<=$yl;$y++) {echo "<image src=images/star40.gif title='$timetips'>";}
for($x=1;$x<=$xx;$x++) {echo "<image src=images/star10.gif title='$timetips'>";}
if (($ty + $yl + $xx) <=0)echo $alltime;
?></td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;"><img src="images/star160.gif" width="16" height="16" hspace="3" align="absmiddle" /><a href="####" class="uDF2C91" onClick="alert('���־���������ʱ�������㷽ʽ��\n\n����1��̫�� �� 160��\n\n����1������ �� 40��\n\n����1������ �� 10��\n\n��ֻҪÿ���¼��վ����Ҫ�˳���ϵͳ���Զ��ۼӻ��֣�1����1���������˵����Ͻ��˳���ťӴ�����򲻻���㡣\n\n\n���ֵ����ã�\n\n����1��̫�� �� ������ʯ��Ա (��ֹ��2009��12��31��)\n\n����1������ �� ���ó��Ż�Ա (��ֹ��2009��12��31��)\n\nֻҪ���ִﵽ�˱�׼������ͷ���Ա�������Ҫ��')">������;</a></td>
</tr>
<tr>
  <td height="26" align="right" style="border-bottom:#EDEAEA 1px solid;">ʵ����֤��</td>
  <td align="left" style="border-bottom:#EDEAEA 1px solid"><a href="k_sfz.php" ><?php
for($x2=1;$x2<=$tmpx;$x2++) {
	echo "<image src=images/sfz_x.gif align=absmiddle width=10 vspace=5 height=10 border=0 title='ʵ����֤�Ǽ�����ǰ".$tmpx."�ǣ���5��'>";
}
for($x2=1;$x2<=(5-$tmpx);$x2++) {
echo "<image src=images/sfz_hx.gif align=absmiddle width=10 vspace=5 height=10 border=0  title='ʵ����֤�Ǽ�����ǰ".$tmpx."�ǣ���5��'>";
}
?></a></td>
  <td align="left" style="border-bottom:#EDEAEA 1px solid"><img src="images/sfz.gif" width="16" height="16" hspace="3" align="absmiddle" /><a href="k_sfz.php" class="uDF2C91">ʵ����֤</a></td>
</tr>
<tr>
<td height="26" align="right" style="border-bottom:#EDEAEA 1px solid;">�ǡ���¼��</td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;"><font color="#ff0000"><?php echo $row['logincount'];?></font> <font color="#666666">��</font></td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;cursor:hand;"><img src="images/dl.gif" width="16" height="16" hspace="3" align="absmiddle" /><a href="#" class="uDF2C91" onClick="alert('ÿ���¼��վ��ϵͳ������love��<?php echo $Global['m_firstlogin']; ?>��')">��¼�н�</a></td>
</tr>
<tr>
<td height="26" align="right" style="border-bottom:#EDEAEA 1px solid;"> �������ϣ�</td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;"><?php if ($row['ifmod'] == 0){ ?><font color="#999999">�����...</font><?php }elseif ($row['ifmod'] == 1){?><font color="#009900">����</font><?php }else{?><font color="#ff6600">���δͨ����������<a href="a2.php">�޸�</a></font><?php }?></td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;"><a href="a1.php" class="uDF2C91"><img src="images/mod2.gif" hspace="3" border="0" align="absmiddle">�޸�����</a></td>
</tr><tr>
<td height="26" align="right" style="border-bottom:#EDEAEA 1px solid;">����ָ����</td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;"><font color="#ff0000"><?php echo $row['click'];?></font> <font color="#666666">��</font></td>
<td align="left" style="border-bottom:#EDEAEA 1px solid;"><img src="images/author.gif" width="12" height="12"  hspace="4" align="absmiddle"><a href="b_viewuser.php" class="uDF2C91">����ÿ�</a></td>
</tr>
<tr>
  <td height="26" align="right" style="border-bottom:#EDEAEA 1px solid;">����������</td>
  <td align="left" style="border-bottom:#EDEAEA 1px solid"><?php 
if ( ($row['zhenghun_jingjia'] <= $row['loveb']) &&  ($row['loveb'] > 0) && ($row['zhenghun_jingjia'] > 0) ){
	echo '<img src=images/jj.gif align=absmiddle><font color=#008200>���ھ���</font>';
?>��(&nbsp;������&nbsp;<font color="#FF0000" ><b><?php echo $mc; ?></b></font>&nbsp;λ&nbsp;)
<?php 
} else {
	echo '<img src=images/jj2.gif align=absmiddle><font color=#999999>��ֹͣ����</font>';
}	
?></td>
  <td align="left" style="border-bottom:#EDEAEA 1px solid;"><img src="images/biddingx.gif" hspace="3" align="absmiddle" /><a href="k_bidding.php" class="uDF2C91">��Ҫ����</a></td>
</tr>
<tr>
  <td height="26" align="right">��¼״̬��</td>
  <td align="left"><?php if ($cook_stealth==1){echo '����';} else {echo '����';} ?></td>
  <td align="left">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
  <td height="40" colspan="2" align="center" bgcolor="#FAFAFA"  style="border-top:#EDEAEA 1px solid;"><table width="558" height="15" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="418" align="left" style="font-family:Verdana"><font color="#666666"><img src="images/safe.gif" width="17" height="20" hspace="5" align="absmiddle" />�����Ծʱ�䣺<?php echo $row['logintime']; ?>��IP��<?php echo $row['loginip']; ?></font></td>
        <td width="140" align="left"><a href="a9.php" class="uDF2C91"><img src="images/m.gif" width="12" height="14" hspace="3" border="0" align="absmiddle" />�޸�����</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="561" height="43" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#666666">
  <tr>
    <td width="416" align="center">�ҵ���ҳ��ַ��<a href="####" class="a666" onclick=recommend()><font color="#666666" style="font-family:Arial,����;font-size:10.3pt;"><?php echo $Global['home_2domain']; ?>/<?php echo $row['id'] ?></font></a>��( <a href="####" class="uDF2C91" onclick=recommend()>��˸���</a> )</td>
    <td width="145" align="left"><img src="images/home.gif" width="12" height="13" hspace="3" align="absmiddle" /><a href="k_homepage.php" class="uDF2C91"><b>װ����ҳ</b></a><img src="images/new.gif" width="28" height="11"></td>
  </tr>
</table>

<?php
$rt=$db->query("SELECT id,title,bmnum,jjloveb FROM ".__TBL_DATING__." WHERE flag=1 ORDER BY jjloveb DESC,yhtime LIMIT 5");
$total = $db->num_rows($rt);
if ($total > 0){
?>
<table width="584" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
<tr>
<td align="center" valign="bottom" bgcolor="#F8F8F8" style="padding-left:5px;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left" style="color:#000000;font-size:10.3pt;font-weight:bold">Լ��1+1</td>
      <td width="36%" align="right" style="color:#cccccc"><a href="e_dating_add.php" class="uDF2C91">��Ҫ����Լ��</a>��|��<a href="<?php echo $Global['www_2domain'];?>/dating" target="_blank" class="uDF2C91">�鿴����Լ��</a></td>
    </tr>
  </table></td>
</tr>
<tr>
<td bgcolor="#FFFFFF" style="color:#666666;font-family:Verdana">
<?php 
for($i=1;$i<=$total;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	$id = $rows[0];
	$title = $rows[1];
	$bmnum = $rows[2];
	$jjloveb = $rows[3];
	$did = $id*7+8848;
	if ($jjloveb > 0){
		$href = '../bidderdating'.$did.'.html';
	} else {
		$href = $Global['home_2domain']."/dating$id.html";
	}
?>
<img src="images/groupren.gif" hspace="5" vspace="10" align="absmiddle" /><a href="<?php echo $href;?>" target="_blank" style="font-size:14px;font-weight:bold"><?php echo htmlout(stripslashes($title));?></a>��(<font color=red><?php echo $bmnum; ?></font>����Ӧ) <a href="<?php echo $href;?>" target="_blank"><img src="../images/dating_libt.gif" align="absmiddle" /></a><br>
<?php }?>
</td>
</tr>
</table>
<br>
<?php }?>
<?php
$rt=$db->query("SELECT id,title,kind,num_n,num_r,flag,jzbmtime,bmnum,picurl_s FROM ".__TBL_GROUP_CLUB__." WHERE flag=1 ORDER BY flag,ifjh DESC,id DESC LIMIT 5");
$total = $db->num_rows($rt);
if ($total > 0){
?>
<table width="584" border="0" cellpadding="5" cellspacing="1" bgcolor="ffcc00">
<tr>
<td valign="bottom" bgcolor="FFE57B" style="color:#000000;font-size:10.3pt;font-weight:bold;padding-left:5px;">���»���������������������������������������������������� ����<a href="<?php echo $Global['www_2domain'];?>/party" target="_blank">&gt;&gt;����</a></td>
</tr>
<tr>
<td bgcolor="ffffcc" style="color:#666666;font-family:Verdana">
<?php
for($i=1;$i<=$total;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	$d1  = strtotime("now");
	$d2  = strtotime($rows[6]);
	$totals  = ($d2-$d1);
	$day     = intval( $totals/86400 );
	$hour    = intval(($totals % 86400)/3600);
	$hourmod = ($totals % 86400)/3600 - $hour;
	$minute  = intval($hourmod*60);
	if ($rows[5] >2)$totals = -1;
	if (($totals) > 0) {
		$outtime = ($day > 0)?'��������<font color=red style=font-size:11px> '.$day.' </font>��':'��������';
		$outtime .= '<font color=red style=font-size:11px>'.$hour.'</font>Сʱ<font color=red style=font-size:11px>'.$minute.'</font>����';
		$outPbt = '��Ҫ����';
	} else {
		$outtime = '[��Ѿ�����]';
		$outPbt = '�鿴����';
	}
?>
<img src="images/qzlist.gif" hspace="5" vspace="8" align="absmiddle" border=0>
<a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank" style="font-size:14px;font-weight:bold"><?php echo gylsubstr($rows[1],32); ?></a> (����<font color=red style=font-size:11px><?php echo $rows[3]+$rows[4]; ?></font>�ˣ�<?php echo $outtime; ?>) <img src="../images/Pd.gif" width="16" height="16" hspace="3" vspace="5" align="absmiddle" /><strong><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank"><font color="#FF0000">��Ҫ����</font></a></strong>
<br>
<?php }?></td>
</tr>
</table>
<br>
<?php }?>

<table width="584" height="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="286" height="28" border="0" cellpadding="0" cellspacing="0" background="images/user_tbg.gif" bgcolor="#F8F8F8" style="border:#dddddd 1px solid;">
      <tr>
        <td width="247" style="padding-left:6px"><strong><font color="#DF2C91">˭������</font></strong></td>
        <td width="37" style="padding-left:6px"><a href="b_viewuser.php" class="uDF2C91">����</a></td>
      </tr>
    </table>
<?php
$rt=$db->query("SELECT * FROM ".__TBL_CLICKHISTORY__." WHERE userid='$cook_userid' ORDER BY id DESC LIMIT 3");
$total = $db->num_rows($rt);
if($total>0){
?>
<table width="286" height="135" border="0" cellpadding="2" cellspacing="0" style="border-left:#dddddd 1px solid;border-right:#dddddd 1px solid;border-bottom:#dddddd 1px solid">
<tr>
<?php
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
$nickname = $rows['sendnickname'];
$id = $rows['senduserid'];
$sex = $rows['sex'];
$grade = $rows['grade'];
$photo_s = $rows['photo_s'];
$addtime = $rows['addtime'];
?>
          <td align="center" bgcolor="#FFFFFF" style="padding-top:5px;padding-bottom:5px;"><table height="90" border="0" cellpadding="2" cellspacing="0" bgcolor="ffffff">
              <tr>
                <td height="50" align="center"><a href="<?php echo $Global['home_2domain'].'/'.$id;?>" target="_blank">
                  <?php if (empty($photo_s)){?>
                  <img src="<?php echo $Global['www_2domain'];?>/images/65x80<?php echo $sex; ?>.gif" width="65" height="80" title="������Ƭ" />
                  <?php } else {?>
                  <img src="<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?>" width="65" height="80" title="<?php echo $nickname.'����Ƭ'; ?>" />
                  <?php }?>
                </a></td>
              </tr>
          </table>
              <table height="20" border="0" align="center" cellpadding="0" cellspacing="0" >
                <tr>
                  <td align="center" valign="bottom"><?php echo geticon($sex.$grade).$sendnickname;?><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $id;?>" target="_blank" class="666666"><?php echo $nickname;?></a></td>
                </tr>
            </table></td>
          <?php if ($i % 6 == 0) {?>
        </tr>
        <tr>
          <?php } ?>
          <?php 	} ?>
        </tr>
      </table>
      <?php }?></td>
    <td align="right" valign="top"><table width="286" height="28" border="0" cellpadding="0" cellspacing="0" background="images/user_tbg.gif" bgcolor="#F8F8F8" style="border:#dddddd 1px solid;">
      <tr>
        <td width="246" align="left" style="padding-left:6px"><strong><font color="#DF2C91">��վ����</font></strong></td>
        <td width="38" align="left" style="padding-left:6px"><a href="<?php echo $Global['www_2domain'].'/news.php'; ?>" target=_blank class="uDF2C91">����</a></td>
      </tr>
    </table>
	
	
      <table width="286" height="135" border="0" cellpadding="2" cellspacing="0" style="border-left:#dddddd 1px solid;border-right:#dddddd 1px solid;border-bottom:#dddddd 1px solid">
        <tr>
          <td align="left" bgcolor="#FFFFFF" style="padding-top:5px;padding-bottom:5px;font-family:����;line-height:200%">
		  
<?php 
	$rt=$db->query("SELECT id,title,addtime FROM ".__TBL_NEWS__." WHERE kind=1 ORDER BY id DESC LIMIT 5");
	if (!$db->num_rows($rt)){
		echo '<h6>������Ϣ</h6>';
	} else {
		$total = $db->num_rows($rt);
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
?>
��<a href=<?php echo $Global['www_2domain'].'/news'.$rows[0].'.html'; ?> target=_blank class="a666"><?php echo stripslashes($rows[1]); ?></a><br />
<?php }}?>		  </td>
        </tr>
        <tr>
        </tr>
      </table>
      </td>
  </tr>
</table>
</div>
<div class="main1_right">
	<div class="T">
		<div class="left"><img src="images/fri.gif" /></div>
		<div class="right"><img src="images/more.gif" hspace="3" /><a href="b_friend.php" class="uDF2C91">�������</a></div>
	</div>
	<div class="C">
<?php
	$rt=$db->query("SELECT a.senduserid,b.nickname,b.sex,b.grade,b.photo_s FROM ".__TBL_FRIEND__." a , ".__TBL_MAIN__." b  WHERE  a.userid=".$cook_userid." AND a.senduserid=b.id AND a.ifhmd=0 AND a.ifagree=1 ORDER BY b.logintime DESC LIMIT 13");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
		echo "..���޺���..";
	} else {
		for($i=0;$i<$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$senduserid  =  $rows[0];
			$sendnickname=  $rows[1];
			$sex         =  $rows[2];
			$grade       =  $rows[3];
			$photo_s     =  $rows[4];
?>
		<div class="box<?php echo ($sex == 1)?" sex1":" sex2";?>">
			<div class="l_photo"><a href="<?php echo $Global['home_2domain'];?>/<?php echo $senduserid; ?>" target="_blank"><?php 
echo (empty($photo_s))?"<img src=../images/noxpic".$sex.".gif>":"<img src=".$Global['up_2domain']."/photo/".$photo_s.">";
?></a></div>
			<div class="r_name">
				<div class="ttt"><?php geticon($sex.$grade);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $senduserid; ?>"  target=_blank><?php echo $sendnickname;?></a></div>
				<div class="bbb">��<a href="<?php echo $Global['chat_2domain']."/chksend$senduserid.html"; ?>" target=_blank>����</a>��<span>/</span>��<a href="b_gbook.php?submitok=add&memberid=<?php echo $senduserid; ?>&membernickname=<?php echo $sendnickname; ?>&g=<?php echo $grade; ?>">����</a></div>
			</div>
		</div>
<?php }}?>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
<?php
require_once YZLOVE.'sub/online.php';
$online = new online_yzlove;
$online->chk();
require_once YZLOVE.'my/bottommy.php';?>