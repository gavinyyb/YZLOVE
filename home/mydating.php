<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$uid) )callmsg("������󣬸��û������ڻ��ѱ��������ѱ�ɾ����","-1");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT username,nickname,grade,loveb,alltime,logincount,mbkind,mbtitle,magic,bgpic,sex,photo_s,click,ifphoto,ifbirthday,ifedu,iflove,ifpay FROM ".__TBL_MAIN__." WHERE id=".$uid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$username    = $row['username'];
$nickname    = $row['nickname'];
$grade       = $row['grade'];
$loveb       = $row['loveb'];
$alltime     = $row['alltime'];
$logincount  = $row['logincount'];
$mbkind      = $row['mbkind'];
$mbtitle     = $row['mbtitle'];
$magic       = $row['magic'];
$bgpic       = $row['bgpic'];
$sex         = $row['sex'];
$photo_s     = $row['photo_s'];
$click       = $row['click'];
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
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸��û������ڻ��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
exit;}
if (empty($bgpic)) {
	$tmpbg = "images/".$mbkind."/bg.jpg";
}else{ 
	$tmpbg = $bgpic;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $nickname;?>��Լ�� ˽��Լ�� | <?php echo $Global['m_sitename'] ?></title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg; ?>")}
</style>
<link href="images/<?php echo $mbkind ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind ?>/homed.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind ?>/mydating.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
		<?php require_once YZLOVE.'home/left_ad.html'?>
	</div>
	<div class="right">
		<div class="rightTitle"><h4>�ҵ�Լ��</h4><a href="<?php echo $Global['my_2domain']; ?>/?e_dating_add.php">>>����Լ��</a></div>
		<div class="rightContent">
<?php
$rt=$db->query("SELECT id,kind,title,yhtime,bmnum,click,flag FROM ".__TBL_DATING__." WHERE userid=".$uid." AND flag>0 ORDER BY id DESC");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/class.php';
$pagesize = 15;
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
			<div class="Tdataline">
				<div class="Tdataline1">Լ������</div>
				<div class="Tdataline2">Լ��ʱ��</div>
				<div class="Tdataline3">����</div>
				<div class="Tdataline4">��Ӧ����</div>
				<div class="Tdataline5">��ϸ</div>
			</div>
<?php 
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
			<div class="dataline">
				<div class="dataline1"><img src="images/dating.gif" align="absmiddle" /><a href="dating<?php echo $rows['id'].'.html';?>" target="_blank"><?php echo htmlout(stripslashes($rows['title']));?></a> <?php if ($rows['ifjh'] == 1)echo "<img src=images/jh.gif>";?></div>
				<div class="dataline2"><?php echo date_format2($rows['yhtime'],'%Y-%m-%d %H:%M').' '.getweek(date_format2($rows['yhtime'],'%Y-%m-%d'));?><br />
<?php
$d1  = strtotime(date("Y-m-d H:i:s"));
$d2  = $rows['yhtime'];
$totals  = ($d2-$d1);
$day     = intval( $totals/86400 );
$hour    = intval(($totals % 86400)/3600);
$hourmod = ($totals % 86400)/3600 - $hour;
$minute  = intval($hourmod*60);
if ($rows['flag'] == 2)$totals = -1;
if (($totals) > 0) {
	if ($day > 0){
		$outtime = "��ʣ <span class=timestyle>$day</span> �� ";
	} else {
		$outtime = "��ʣ ";
	}
	$outtime .= "<span class=timestyle>$hour</span> Сʱ<span class=timestyle>$minute</span>��";
} else {
	$outtime = "��<font color=#999999><b>�Ѿ�����</b></font>";
}
echo '<span class=outtime>'.$outtime.'</font>';
?></div>
				<div class="dataline3"><font color="#FF0000"><?php echo $rows['click']; ?></font></div>
				<div class="dataline4">( <font color="#FF0000"><?php echo $rows['bmnum']; ?></font> �� )</div>
				<div class="dataline5"><a href="dating<?php echo $rows['id'].'.html';?>" class="A9BU_tiaose"><?php if ($rows['flag'] == 1){echo '��Ҫ��Լ';} else {echo '�鿴��ϸ';} ?></a></div>
			</div>	
<?php }?>
<?php if($total>$pagesize){?><div class=pageshow><?php echo $pagelist; ?>��<?php echo $pagelistinfo; ?></div><?php }?>
<?php } else {?>
			<div class="nodata">...����Լ��...<br />
			  <br />
			  <a href="<?php echo $Global['my_2domain']; ?>/?e_dating_add.php" class="A9BU_tiaose"><img src="images/pen.gif" hspace="5" border="0" align="absmiddle" /><b>��������Լ��</b></a>			</div>
            <?php }?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php
require_once YZLOVE.'home/foot.php';
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
?>