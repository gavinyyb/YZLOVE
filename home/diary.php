<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$fid) )callmsg("������󣬸���Ϣ�����ڻ��ѱ�ɾ����","-1");
require_once YZLOVE.'sub/conn.php';
if ($submitok == "addupdate"){
	if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
	callmsg("ֻ�б�վ��Ա�ſ��Է��������ȵ�¼��վ��","-1");exit;
	} else {
	$cook_password = trimm($cook_password);
	$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
	if (!$db->num_rows($rtglobal)) {
		callmsg("ֻ�б�վ��Ա�ſ��Է��������ȵ�¼��վ��","-1");
		exit;
	}}
	if ($cook_grade != 10){
		$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$cook_userid." AND senduserid=".$uid." AND ifhmd=1");
		if ($db->num_rows($rt)) {
			callmsg("�Է��ѽ�����Ϊ������������ʧ�ܣ�","-1");
			exit;
		}
	}
	if (strlen($content)<1 || strlen($content)>4000)callmsg("���ռ����ݡ��������1~4000�ֽ����ڡ�","-1");
	$addtime=date("Y-m-d H:i:s");
	$db->query("INSERT INTO ".__TBL_DIARY_BBS__."  (fid,content,userid,addtime) VALUES ('$fid','$content','$cook_userid','$addtime')");
	$db->query("UPDATE ".__TBL_DIARY__." SET hfnum=hfnum+1 WHERE id=".$fid);
	header("Location: diary.php?fid=".$fid."&p=".$redirectpage."#bottom");
}
$rt = $db->query("SELECT a.id,a.username,a.nickname,a.grade,a.loveb,a.alltime,a.logincount,a.mbkind,a.mbtitle,a.magic,a.bgpic,a.sex,a.photo_s,a.click,b.weather,b.feel,b.title,b.content,b.ifjh,b.click as diaryclick,b.hfnum,b.stime,b.flag FROM ".__TBL_MAIN__." a,".__TBL_DIARY__." b WHERE a.id=b.userid  AND a.flag=1 AND b.id=".$fid);
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
$weather     = $row['weather'];
$feel        = $row['feel'];
$feel        = $row['feel'];
$title       = htmlout(stripslashes($row['title']));
$content     = stripslashes($row['content']);
$ifjh        = $row['ifjh'];
$diaryclick  = '<font color=#ff0000>'.$row['diaryclick'].'</font>';
$hfnum       = $row['hfnum'];
$stime       = $row['stime'];
$flag       = $row['flag'];
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸���Ϣ���û������ڻ�δ��˻��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
exit;}
$db->query("UPDATE ".__TBL_DIARY__." SET click=click+1 WHERE id=".$fid);
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?php echo $title;?>,<?php echo $nickname;?>�ռ�,<?php echo $nickname;?>����">
<meta name="description" content="<?php echo $title;?>">
<title><?php echo $title;?> | <?php echo $nickname;?>�Ĳ����ռ�,��־ </title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homex.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/diary.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
<div class="left">
<?php require_once YZLOVE.'home/leftx.php'?>
<?php require_once YZLOVE.'home/left_ad.html'?>
</div>
<div class="right">
<div class="rightTitle"><h4>�ҵ��ռ�</h4><a href="mydiary<?php echo $uid; ?>.html">>>�����ռ�</a></div>
<div class="rightContent ul2">
	<h5><?php echo $title; ?> <?php if ($flag == 0)echo "<font color=#ff0000>(δ��)</font>"; ?> <?php if ($ifjh == 1)echo "<img src='images/jh.gif' />"; ?></h5>
	<div class="diaryTips">
������<font class=tiaose><?php 
switch ($weather){
case 1:echo "��";break;
case 2:echo "��";break;
case 3:echo "����";break;
case 4:echo "��";break;
case 5:echo "������";break;
case 6:echo "ѩ";break;
}
?></font>�����飺<font class=tiaose><?php 
switch ($feel){
case 1:echo "����";break;
case 2:echo "�Ծ�";break;
case 3:echo "ץ��";break;
case 4:echo "����";break;
case 5:echo "����";break;
case 6:echo "��ŭ";break;
case 7:echo "ɵЦ";break;
case 8:echo "�ɻ�";break;
case 9:echo "��̾";break;
case 10:echo "����";break;
case 11:echo "��ɥ";break;
case 12:echo "һ��";break;
}?></font>�����ڣ�<font class=tiaose><?php echo date_format2($stime,'%Y-%m-%d');?>��<?php echo getweek(date_format2($stime,'%Y-%m-%d'));?></font>���ѱ��Ķ� <font color="#FF0000"><?php echo $diaryclick; ?></font> �Ρ����� <font color="#FF0000"><?php echo $hfnum; ?></font> ������<a href="<?php echo $Global['www_2domain'].'/315.php'; ?>" class="ub666"><img src="images/jubao.gif" hspace="5" align="absmiddle" />�ٱ�����</a></div>
	<div class="diaryContent"><?php echo $content; ?></div>
	<div class="diaryAd">
		<div class="diaryAdL">�����ַ���ƣ�</div>
		<div class="diaryAdR">
	<script>
	function copyCode(o){o.select();var js=o.createTextRange();js.execCommand("Copy");alert("���Ƴɹ�������QQ�ϵĺ��Ѱɣ�");}document.write("<textarea onfocus=this.select() style='width:294px;height:14px;overflow-y:hidden;font-size:9pt' class='copyCode' onclick=copyCode(this) rows=1>");document.write(self.location+"</textarea>");
	</script>
		</div>
	</div>
	<div class="diaryAd">
	<div class="diaryAdL"></div>
	<div class="diaryAdR">[����ҳ��ַ��,ͨ��QQ��MSN����������]</div>
	</div>
	<div class="diaryAd" style="margin:10px 0 20px 0">
<a href="#content" class=A9BU_tiaose>��������</a> | <a href="<?php echo $Global['my_2domain']; ?>/?f_diary_favorite.php?fid=<?php echo $fid; ?>&submitok=addupdate" target="_parent" class=A9BU_tiaose>�ղش�����</a>  | <a href="<?php echo $Global['my_2domain']; ?>/?f_diary.php?submitok=add" target="_parent" class=A9BU_tiaose>��Ҫд�ռ�</a>
	</div>
	<div class="clear"></div>
</div>
<div class="rightTitle" style="margin:10px 0 0 0"><h4>��������</h4><a href="#content">>>��Ҫ����</a></div>
<div class="rightContent">
<?php
$rt=$db->query("SELECT a.nickname,a.grade,a.sex,a.photo_s,b.content,b.userid,b.addtime,b.flag FROM ".__TBL_MAIN__." a,".__TBL_DIARY_BBS__." b WHERE b.fid=".$fid." AND a.id=b.userid ORDER BY b.id");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/class.php';
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
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($p == 1){$n = $i;} else {$n = $i+$pagesize*($p-1);}
?>
	<div class="bbs">
		<div class="bbsL">
		
<a href="<?php echo $Global['home_2domain'];?>/<?php echo $rows['userid']; ?>" target="_blank">
<?php 
if (empty($rows['photo_s'])){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$rows['sex'].".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$rows['photo_s']." width=41 height=50 border=0>";
//echo "<img src=http://up.yzlove.com/photo/".$rows['photo_s']." width=41 height=50 border=0>";
}
?></a>		</div>
		<div class="bbsR">
			<div class="bbsR1"><?php echo geticon($rows['sex'].$rows['grade']);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $rows['userid']; ?>"  target=_blank><?php if ( $rows['sex'] == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo $rows['nickname'];?></font></a>�������ڣ�<?php echo $rows['addtime'];?></div>
			<div class="bbsR2">��<font color="#FF0000"><?php echo $n;?></font>¥</div>
			<div class="bbsR3"><?php	if ($rows['flag'] == 1) {echo badstr(htmlout(stripslashes($rows['content'])));} else {echo "<font color=#999999>�����ѱ������ɾ����</font>";}?></div>
		</div>
		<div class="clear"></div>
	</div>
<?php }?>
	<?php if($total>$pagesize){?><div class=pageshow><?php echo $pagelist; ?>��<?php echo $pagelistinfo; ?></div><?php }?>
<?php } else {?>
	<div class="nodata">...��������...</div>
<?php }?>
</div>
	<div class="rightContent ul2">
		<div class="bbsaddT">
		<div class="bbsaddTL"><img src="images/pl.gif" hspace="3" align="absmiddle">��������</div>
		<div class="bbsaddTR">ֻ�л�Ա�ſ��Է������ۣ�<a href="<?php echo $Global['www_2domain'].'/login.php' ?>" class=ub666>��¼</a> / <a href="<?php echo $Global['www_2domain'].'/reg.php' ?>"  class=ub666>ע��</a></div>
	  </div>
<script language="javascript">
function chkform(){
	if(document.www_yzlove_com.content.value==""){
	alert('���������ݣ�');
	document.www_yzlove_com.content.focus();
	return false;
	}
}
</script>
		<form action="" method="post" name=www_yzlove_com onSubmit="return chkform()">
		<textarea name="content" cols="95" rows="8" id="content" class="diarytextarea"></textarea>
		<br /><font color="#FF0000">��<?php echo $Global['m_area2']; ?>����������֣�����ѣ���ơ������������𷢱��������Ը���</font><br /><br />
		<input type="submit" class="button" value=" �� �� ">
		<input type="hidden" name="fid" value="<?php echo $fid; ?>">
		<input type="hidden" name="uid" value="<?php echo $uid; ?>">
		<input type="hidden" name="submitok" value="addupdate">
		<input type="hidden" name="redirectpage" value="<?php echo $redirectpage; ?>">
		</form><br><br><a name="#bottom"></a>
	</div>
</div>
<div class="clear"></div>
</div>
<?php
require_once YZLOVE.'sub/online.php';
$online = new online_yzlove;
$online->chk();
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
}return $xingqi;} 
?>