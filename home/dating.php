<?php
/*
+--------------------------------+
+ ����̨�����޸İ�Ȩ���ڱ�������
+ Modified Author����С�ȣ�lyixian@126.com www.linxiaoxian.com��QQ��6154041
+ ���ļ�����޸����ڣ�2010��1��
+ �����޸ģ��뱣��������Ϣ������վû��Ӱ��
+--------------------------------+
*/
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$fid) )callmsg("������󣬸���Ϣ�����ڻ��ѱ�ɾ����","-1");
require_once YZLOVE.'sub/conn.php';
if ($submitok == 'addupdate'){
	if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("Forbidden","-1");
	if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid)) {
	callmsg("ֻ�б�վ��Ա�ſ���ӦԼ�������ȵ�¼��վ��","-1");
	exit;
	} else {
	$cook_password = trimm($cook_password);
	$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
	if (!$db->num_rows($rtglobal)) {
		callmsg("ֻ�б�վ��Ա�ſ���ӦԼ�������ȵ�¼��վ��","-1");
		exit;
	}}
	if ($cook_grade != 10){
		$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$cook_userid." AND senduserid=".$uid." AND ifhmd=1");
		if ($db->num_rows($rt)) {
			callmsg("�Է��ѽ�����Ϊ���������㲻�ܲμ�Ta��Լ�ᣡ","-1");
			exit;
		}
	}
	$rtglobal = $db->query("SELECT userid,flag FROM ".__TBL_DATING__." WHERE id=".$fid);
	if ($db->num_rows($rtglobal)) {
		$row = $db->fetch_array($rtglobal);
		if ($row[0] == $cook_userid)callmsg("���ܲ������ѣ�","-1");
		if ($row[1] != 1)callmsg("��Լ���Ѿ�������δ��ˣ�","-1");
	} else {
		callmsg("Forbidden","-1");
	}
	if (strlen($content)>1000 || strlen($content)<3)callmsg("��Ϣ���ݹ������٣��������3~1000�ֽ�����","-1");
	$rt = $db->query("SELECT id FROM ".__TBL_DATING_USER__." WHERE userid=".$cook_userid." AND fid=".$fid);
	if($db->num_rows($rt))callmsg("���Ѿ����������벻Ҫ�ظ�������","-1");
	$addtime = strtotime(date("Y-m-d H:i:s"));
	$db->query("INSERT INTO ".__TBL_DATING_USER__."  (fid,userid,content,addtime) VALUES ($fid,$cook_userid,'$content','$addtime')");
	$db->query("UPDATE ".__TBL_DATING__." SET bmnum=bmnum+1 WHERE id=".$fid);
	//header("Location: dating".$fid.'.html');
	callmsg("�����ɹ�����Ⱥ����˵�֪ͨ��","dating".$fid.".html");
}
$rt = $db->query("SELECT a.id,a.username,a.nickname,a.grade,a.loveb,a.alltime,a.logincount,a.mbkind,a.mbtitle,a.magic,a.bgpic,a.sex,a.photo_s,a.click,b.kind,b.title,b.area1,b.area2,b.price,b.yhtime,b.maidian,b.contact,b.content,b.sex as sex2,b.birthday1,b.birthday2,b.heigh1,b.heigh2,b.love,b.edu,b.area3,b.area4,b.addtime,b.bmnum,b.click as datingclick,b.flag FROM ".__TBL_MAIN__." a,".__TBL_DATING__." b WHERE a.id=b.userid  AND a.flag=1 AND b.id=".$fid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$uid         = $row['id'];
$username    = $row['username'];
$nickname    = $row['nickname'];
$grade       = $row['grade'];
$loveb       = $row['loveb'];
$alltime     = $row['alltime'];
$logincount = $row['logincount'];
$mbkind      = $row['mbkind'];
$mbtitle     = $row['mbtitle'];
$magic       = $row['magic'];
$bgpic       = $row['bgpic'];
$sex         = $row['sex'];
$photo_s     = $row['photo_s'];
$click       = $row['click'];

$kind        = $row['kind'];
$title       = htmlout(stripslashes($row['title']));
$area1       = $row['area1'];
$area2       = $row['area2'];
$price       = $row['price'];
$yhtime      = $row['yhtime'];
$maidian     = $row['maidian'];
$contact     = htmlout(stripslashes($row['contact']));
$content     = htmlout(stripslashes($row['content']));
$sex2        = $row['sex2'];
$birthday1   = $row['birthday1'];
$birthday2   = $row['birthday2'];
$heigh1      = $row['heigh1'];
$heigh2      = $row['heigh2'];
$love        = $row['love'];
$edu         = $row['edu'];
$area3       = $row['area3'];
$area4       = $row['area4'];
$addtime     = $row['addtime'];
$bmnum       = $row['bmnum'];
$datingclick = '<font color=#ff0000>'.$row['datingclick'].'</font>';
$flag        = $row['flag'];
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸���Ϣ���û������ڻ�δ��˻��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
exit;}
$db->query("UPDATE ".__TBL_DATING__." SET click=click+1 WHERE id=".$fid);
if ( ereg("^[0-9]{1,8}$",$cook_userid) ) {
	$rt = $db->query("SELECT flag FROM ".__TBL_DATING_USER__." WHERE userid=".$cook_userid." AND fid=".$fid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$ifbest = $row[0];
	}
}
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?php echo $title;?>,<?php echo $nickname;?>�ռ�,<?php echo $nickname;?>����">
<meta name="description" content="<?php echo $title;?>">
<title><?php echo $title;?> | <?php echo $nickname;?>��Լ��,˽��Լ��,1+1Լ��</title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homex.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/dating.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
<div class="left">
<?php require_once YZLOVE.'home/leftx.php'?>
<?php require_once YZLOVE.'home/left_ad.html'?>
</div>
<div class="right">
<div class="rightTitle"><h4>1+1Լ�᣺<?php echo $title; ?><?php if ($flag == 0)echo '<font color=#ff0000> (δ��) </font>'; ?></h4><a href="mydating<?php echo $uid.'.html'; ?>">>>����Լ��</a></div>
<div class="rightContent">
	<div class="rightContentL">
		<div class="LR">
			<div class="L1">Լ�����ݣ�</div>
			<div class="R1 tiaose"><?php
	switch ($kind){ 
	case 1:echo "�Ȳ�С��";break;
	case 2:echo "�������";break;
	case 3:echo "��Լ����";break;
	case 4:echo "����Ӱ";break;
	case 5:echo "����K��";break;
	case 6:echo "����";break;
	default:echo "����";break;
	}?>&nbsp;</div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">Լ�����⣺</div>
			<div class="R1 tiaose"><?php echo $title; ?></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">Լ��ʱ�䣺</div>
			<div class="R1 tiaose"><b><?php echo date_format2($yhtime,'%Y �� %m �� %d �� %H ʱ %M ��').' '.getweek(date_format2($yhtime,'%Y-%m-%d'));?></b></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">Լ����У�</div>
			<div class="R1 tiaose"><?php echo $area1.' >> '.$area2; ?></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">����Ԥ�㣺</div>
			<div class="R1 tiaose"><?php
	switch ($price){ 
	case 1:echo "100Ԫ����";break;
	case 2:echo "100��300Ԫ";break;
	case 3:echo "300--500Ԫ";break;
	case 4:echo "500Ԫ����";break;
	default :echo "����";break;
	}?></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">˭���򵥣�</div>
			<div class="R1 tiaose"><?php
	switch ($maidian){ 
	case 1:echo "������";break;
	case 2:echo "ӦԼ����";break;
	case 3:echo "AA��";break;
	default :echo "����";break;
	}?></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">��ϵ������</div>
			<div class="R1 tiaose"><b><?php if ($ifbest == 1){echo $contact;}else{echo 'ֻ�з������趨�������ѡ�ſ��Կ�����';} ?></b></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">Լ�ᰲ�ţ�</div>
			<div class="R1 tiaose"><?php echo $content; ?></div>
		</div>
		<div class="clear"></div>
		<div class="LR" style="margin:0 0 10px 0;padding-left:20px"><hr size=1 align=center width=90% class="hr"></div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">Լ�����</div>
			<div class="R1">
			�����Ա�Ϊ<span class=tiaose><?php if ($sex2==0){echo '����';}elseif ($sex2 == 1){echo '����';}else{echo 'Ů��';} ?></span>������<span class=tiaose><?php if (!empty($birthday1) && !empty($birthday2)){echo '������'.$birthday1.'��'.$birthday2.'��֮��';}else{echo '����';} ?></span>�����<span class=tiaose><?php if (!empty($heigh1) && !empty($heigh2)){echo '������'.$heigh1.'��'.$heigh2.'����֮��';}else{echo '����';} ?></span>������״��<span class=tiaose><?php
	switch ($love){ 
	case 1:echo "Ϊδ��";break;
	case 2:echo "Ϊ�ѻ�";break;
	case 3:echo "Ϊ��������Ů";break;
	case 4:echo "Ϊ��������Ů";break;
	case 5:echo "Ϊɥż����Ů";break;
	case 6:echo "Ϊɥż����Ů";break;
	case 7:echo "����";break;
	default :echo "����";break;
	}?></span>��ѧ��<span class=tiaose><?php
	switch ($edu){ 
	case 1:echo "Ϊ���м�����";break;
	case 2:echo "Ϊ���л���ר������";break;
	case 3:echo "Ϊ��ר������";break;
	case 4:echo "Ϊ���Ƽ�����";break;
	case 5:echo "Ϊ˶ʿ������";break;
	case 6:echo "Ϊ��ʿ������";break;
	default:echo "����";break;
	}?></span>�����ڵ���<span class=tiaose>Ϊ<?php echo $area3.$area4; ?></span>			</div>
		</div>
		<div class="clear"></div>

	</div>
	<div class="rightContentR">
		<div class="box">
			<div class="box1">��Լ��ʱ�仹�У�</div>
			<div class="box1"><?php
if ($flag == 1){
	$d1  = strtotime(date("Y-m-d H:i:s"));
	$d2  = $yhtime;
	$totals  = ($d2-$d1);
	$day     = intval( $totals/86400 );
	$hour    = intval(($totals % 86400)/3600);
	$hourmod = ($totals % 86400)/3600 - $hour;
	$minute  = intval($hourmod*60);
	if (($totals) > 0) {
		if ($day > 0){
			$outtime = "<span class=timestyle>$day</span> �� ";
		} else {
			$outtime = "";
		}
		$outtime .= "<span class=timestyle>$hour</span> Сʱ <span class=timestyle>$minute</span> ��";
	} else {
		$db->query("UPDATE ".__TBL_DATING__." SET flag=2,jjloveb=0 WHERE id=".$fid);
		$outtime = "��<font color=#999999><b>�Ѿ�����</b></font>";
	}
} else {
	$outtime = "��<font color=#999999><b>�Ѿ�����</b></font>";
}
echo $outtime;
?></div>
			<div class="box1">��Ӧ���� <font color="#FF0000"><?php echo $bmnum; ?></font> �� </div>
			<div class="box1"><?php if ($flag == 1){echo "<a href=#content><img src=images/$mbkind/datingbm.gif></a>";}else{echo "<img src=images/$mbkind/datingbmno.gif>";} ?></div>
			<div class="box1" style="padding:10px 0 0 0;">���� <?php echo $datingclick; ?></div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="rightTitle" style="margin:10px 0 0 0">
  <h4>����д��ʵ��ϵ��ʽ���Ա㷢�����ܼ�ʱ��ϵ����</h4>
</div>
<div class="rightContent">


<div class="bbsaddT">
	<div class="bbsaddTL"><img src="images/pl.gif" hspace="3" align="absmiddle">������Լ</div>
	<div class="bbsaddTR">ֻ�л�Ա�ſ��Ը�Լ��<a href="<?php echo $Global['www_2domain'].'/login.php' ?>" class=ub666>��¼</a> / <a href="<?php echo $Global['www_2domain'].'/reg.php' ?>"  class=ub666>ע��</a></div>
</div>
<script language="javascript">
function chkform(){
	if(document.www_yzlove_com.content.value==""){
	alert('���������ݣ�');
	document.www_yzlove_com.content.focus();
	return false;
	}
	var str;
	str = document.www_yzlove_com.content.value;
	str=str.replace(/\n/ig,""); 
	str=str.replace(/\r/ig,"");
	if(str =="��ϵ������ӦԼ˵����"){
	alert('��������ϵ������ӦԼ˵����');
	document.www_yzlove_com.content.focus();
	return false;}
}
</script>
		<form action="dating<?php echo $fid.'.html'; ?>" method="post" name=www_yzlove_com onSubmit="return chkform()" >
		<?php if ($flag == 1) {?>
		<textarea name="content" cols="95" rows="8" id="content" class="datingtextarea">��ϵ������
ӦԼ˵����</textarea>
		<?php } else {?>
		<textarea name="content" cols="95" rows="8" id="content" class="datingtextarea" disabled="disabled">��Լ���Ѿ����������������ѡ��������ֹ��</textarea>
		<?php }?>
		<?php if ($flag == 1) {?>
		<input type="submit" class="button" value="��ʼ��Լ">
		<input type="hidden" name="fid" value="<?php echo $fid; ?>">
		<input type="hidden" name="uid" value="<?php echo $uid; ?>">
		<input type="hidden" name="submitok" value="addupdate">
		<?php } else {?>
		<input type="submit" class="button" value="��ʼ��Լ" disabled="disabled">
		<?php }?>
		</form>
	<div class="bbsTips"><img src="images/tips.gif" width="23" height="21" hspace="5" />��д��ʵ��ϵ��ʽ���Ա㷢�����ܼ�ʱ��ϵ���㣬����ϵ��ʽ���ṫ����ֻ��Լ�ᷢ���˲��ܿ������������д��</div>


</div>
</div>
<div class="clear"></div>
</div>
<?php require_once YZLOVE.'home/foot.php';
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