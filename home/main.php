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
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("������󣬸��û������ڻ��ѱ��������ѱ�ɾ����",$Global['www_2domain']);
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT username,nickname,grade,loveb,regtime,regip,logintime,alltime,loginip,logincount,mbkind,mbtitle,magic,bgpic,bgmusic,sex,birthday,love,kind,area1,area2,area3,area4,photo_s,video_s,click,heigh,weigh,tx,star,blood,zhongjiao,house,car,clothing,edu,school,field,job,pay,aboutus,ifphoto,ifbirthday,ifheigh,ifedu,iflove,ifpay,ifhouse FROM ".__TBL_MAIN__." WHERE id=".$uid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$username = $row['username'];
$nickname = $row['nickname'];
$grade = $row['grade'];
$loveb = $row['loveb'];
$regtime = $row['regtime'];
$regip = $row['regip'];
$logintime = $row['logintime'];
$alltime = $row['alltime'];
$loginip = $row['loginip'];
$logincount = $row['logincount'];
$mbkind = $row['mbkind'];
$mbtitle = $row['mbtitle'];
$magic = $row['magic'];
$bgpic = $row['bgpic'];
$bgmusic = $row['bgmusic'];
$sex = $row['sex'];
$birthday = $row['birthday'];
$love = $row['love'];
$kind = $row['kind'];
$area1  = $row['area1'];
$area2  = $row['area2'];
$area3  = $row['area3'];
$area4  = $row['area4'];
$photo_s  = $row['photo_s'];
$click  = $row['click'];
$heigh  = $row['heigh'];
$weigh  = $row['weigh'];
$tx     = $row['tx'];
$star   = $row['star'];
$blood   = $row['blood'];
$zhongjiao   = $row['zhongjiao'];
$house   = $row['house'];
$car   = $row['car'];
$clothing   = $row['clothing'];
$edu   = $row['edu'];
$school   = $row['school'];
$field   = $row['field'];
$job   = $row['job'];
$pay   = $row['pay'];
$aboutus  = $row['aboutus'];
$aboutus = preg_replace("/[\r|\n]+/","\n",$aboutus); 
//$aboutus  = nl2br($aboutus);
$ifphoto     = $row['ifphoto'];
$ifbirthday  = $row['ifbirthday'];
$ifheigh  = $row['ifheigh'];
$ifedu  = $row['ifedu'];
$iflove  = $row['iflove'];
$ifpay  = $row['ifpay'];
$ifhouse  = $row['ifhouse'];
$tmpx = 0;
if ($ifphoto == 1)$tmpx = $tmpx+1;
if ($ifbirthday == 1)$tmpx = $tmpx+1;
if ($ifedu == 1)$tmpx = $tmpx+1;
if ($iflove == 1)$tmpx = $tmpx+1;
if ($ifpay == 1)$tmpx = $tmpx+1;
} else {
//callmsg("������󣬸��û������ڻ��ѱ��������ѱ�ɾ����","-1");
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸��û������ڻ��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
exit;
}
$db->query("UPDATE ".__TBL_MAIN__." SET click=click+1 WHERE id=".$uid);
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<!-- title -->
<title><?php echo $nickname;?>�ĸ��˲���,������ҳ</title>
<meta name="keywords" content="<?php echo $nickname;?>�ĸ�����ҳ">
<meta name="description" content="<?php echo $nickname;?>�ĸ�����ҳ">
<meta name="description" content="<?php echo htmlout(gylsubstr(stripslashes($aboutus),200)); ?>,<?php echo $nickname;?>�ĸ��˲���">
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homed.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
</head>
<SCRIPT src="images/scrollpic.js" type=text/javascript></SCRIPT>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
<!-- ���Ķ��� -->
<?php if (!empty($aboutus)) {?>
		<div class="leftTitle"><h4>���Ķ���</h4>
		</div>
		<div class="leftContent">
		  <p>��<?php echo gylsubstr(htmlout(stripslashes($aboutus)),168);?>����[ <a href="myarchive<?php echo $uid; ?>.html" class="A9BU_tiaose">�鿴��ϸ</a> ]</p>
		</div>
		<div class="clear"></div>
<?php }?>
<!-- ������� -->
		<div class="leftTitle">
		  <h4>�������</h4>
		</div>
		<div class="leftContent"><p>
<?php 
$rt = $db->query("SELECT sex,birthday1,birthday2,kind,area1,area2,area3,area4,love,heigh1,heigh2,weigh1,weigh2,house,car,edu,pay,field,job,smoking,drink FROM ".__TBL_REQUEST__." WHERE userid='$uid'");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
?>
��Ľ���Ŀ��<span class=tiaose><?php
switch ($row['kind']){ 
case 2:echo "ΪԼ�ύ��";break;
case 3:echo "Ϊ��������";break;
case 4:echo "Ϊ�쳾֪��";break;
case 5:echo "Ϊ���̻���";break;
default:echo "����";break;
}?></span>��
�Ա�<span class=tiaose><?php if (empty($row['sex'])){echo "����";}elseif ($row['sex'] == 1){echo "Ϊ����";}else{echo "ΪŮ��";}?></span>��
����<span class=tiaose><?php
if (empty($row['birthday1']) || empty($row['birthday2'])){
echo '����';
}else{
echo '��';
//echobirthday($row['birthday1']).'-'.echobirthday($row['birthday2']);
echo $row['birthday1'].'-'.$row['birthday2'];
echo '��֮��';
}?></span>��
���<span class=tiaose><?php
if (empty($row['heigh1']) || empty($row['heigh2'])){
echo '����';
}else{
echo '��'.$row['heigh1'].'-'.$row['heigh2'].'����֮��';
}?></span>��
����<span class=tiaose><?php
if (empty($row['weigh1']) || empty($row['weigh2'])){
echo '����';
}else{
echo '��'.$row['weigh1'].'-'.$row['weigh2'].'����֮��';
}?></span>��
����״��<span class=tiaose><?php
switch ($row['love']){ 
case 1:echo "����";break;
case 2:echo "Ϊ�ѻ�";break;
case 3:echo "Ϊ��������Ů";break;
case 4:echo "Ϊ��������Ů";break;
case 5:echo "Ϊɥż����Ů";break;
case 6:echo "Ϊɥż����Ů";break;
case 7:echo "����";break;
default:echo "����";break;
}?></span>��
ѧ��<span class=tiaose><?php
switch ($row['edu']){ 
case 1:echo "Ϊ���м�����";break;
case 2:echo "Ϊ���л���ר������";break;
case 3:echo "Ϊ��ר������";break;
case 4:echo "Ϊ���Ƽ�����";break;
case 5:echo "Ϊ˶ʿ������";break;
case 6:echo "Ϊ��ʿ������";break;
default:echo "����";break;
}?></span>��
������<span class=tiaose><?php
switch ($row['pay']){ 
case 1:echo "600Ԫ����";break;
case 2:echo "600-799Ԫ";break;
case 3:echo "800-999Ԫ";break;
case 4:echo "1000-1499Ԫ";break;
case 5:echo "1500-1999Ԫ";break;
case 6:echo "2000-2999Ԫ";break;
case 7:echo "3000-3999Ԫ";break;
case 8:echo "4000-4999Ԫ";break;
case 9:echo "5000-5999Ԫ";break;
case 10:echo "6000-6999Ԫ";break;
case 11:echo "7000-9999Ԫ";break;
case 12:echo "10000-19999Ԫ";break;
case 13:echo "20000Ԫ����";break;
default:echo "����";break;
}?></span>��
���ڵ���<span class=tiaose><?php
if (!empty($row['area1'])) {
echo 'Ϊ'.$row['area1'].' >> '.$row['area2'];
}else{
echo '����';
}?></span>��
��Ĺ���<span class=tiaose><?php
if (!empty($row['area3'])) {
echo 'Ϊ'.$row['area3'].' >> '.$row['area4'];
}else{
echo '����';
}?></span>��
ס��<span class=tiaose><?php
switch ($row['house']){ 
case 1:echo "Ϊ��ס��";break;
case 2:echo "Ϊ����������";break;
case 3:echo "Ϊ��ס��";break;
case 4:echo "Ϊ��ס�����ɽ��";break;
case 5:echo "Ϊ��ס��ϣ���Է����";break;
case 6:echo "Ϊ��ס��ϣ��˫�����";break;
default:echo "����";break;
}?></span>��
��ͨ����<span class=tiaose><?php
switch ($row['car']){ 
case 1:echo "Ϊ����";break;
case 2:echo "Ϊ�е�����";break;
case 3:echo "Ϊ�ߵ�����";break;
case 4:echo "Ϊ������������";break;
case 5:echo "Ϊ����";break;
default:echo "����";break;
}?></span>��
���µĹ�����ҵ<span class=tiaose><?php
switch ($row['field']){ 
case 1:echo "Ϊ�����/������";break;
case 2:echo "Ϊ�ʵ�/ͨѶ";break;
case 3:echo "Ϊ����/����/����";break;
case 4:echo "Ϊ����/���ز�";break;
case 5:echo "Ϊ��ҵ/����/����";break;
case 6:echo "ΪӰ��/����/����";break;
case 7:echo "Ϊ����/����/�赸";break;
case 8:echo "Ϊ���/ý��/����";break;
case 9:echo "Ϊ����/��װ";break;
case 10:echo "Ϊ����/����";break;
case 11:echo "Ϊ����/��ѵ/����";break;
case 12:echo "Ϊ����/����/��Դ";break;
case 13:echo "Ϊ����/����/����";break;
case 14:echo "Ϊҽ��/����";break;
case 15:echo "Ϊ˾��/��ʦ/��ѯ";break;
case 16:echo "Ϊ����/������֯";break;
case 17:echo "Ϊ����/����";break;
case 18:echo "Ϊ���һ���/����";break;
case 19:echo "Ϊũҵ";break;
case 20:echo "Ϊ��Уѧ��";break;
case 21:echo "Ϊ����";break;
default:echo "����";break;
}?></span>��
ְҵ<span class=tiaose><?php 
switch ($row['job']){ 
case 1:echo "Ϊ��ҵ������Ա";break;
case 2:echo "Ϊר��/����";break;
case 3:echo "Ϊ����/������Ա";break;
case 4:echo "Ϊ�г�/������Ա";break;
case 5:echo "Ϊ������Ա/��ְ����";break;
case 6:echo "Ϊ��ְͨԱ";break;
case 7:echo "Ϊ���ظɲ�/������Ա";break;
case 8:echo "Ϊ������/��Ա";break;
case 9:echo "Ϊ��ʦ";break;
case 10:echo "Ϊ����";break;
case 11:echo "Ϊũ��";break;
case 12:echo "Ϊ����";break;
case 13:echo "Ϊѧ��";break;
case 14:echo "Ϊ����ְҵ��";break;
case 15:echo "Ϊ��/������Ա";break;
case 16:echo "Ϊʧҵ/��ҵ";break;
case 17:echo "Ϊ����";break;
default:echo "����";break;
}
?></span>��
����<span class=tiaose><?php 
switch ($row['smoking']){ 
case 1:echo "����ǲ���";break;
case 2:echo "�����ż����";break;
case 3:echo "�����һ��һ��";break;
case 4:echo "��������̾���";break;
case 5:echo "��������ڽ���";break;
case 6:echo "������Ѿ�����";break;
default:echo "����";break;
}?></span>��
�Ⱦ�<span class=tiaose><?php
switch ($row['drink']){ 
case 1:echo "����ǵξƲ�մ";break;
case 2:echo "�������ʱ��һЩ";break;
case 3:echo "�����ϲ��������";break;
case 4:echo "����Ǻþ����������";break;
case 5:echo "��������ڽ��";break;
case 6:echo "������Ѿ�����";break;
default:echo "����";break;
}?></span>��
<?php
} else {
echo 'û��Ҫ�󣬶��������ҽ��ѣ�';
}
?>
��<font color="#999999">( ������Ҫ������ο�����������һ�������ӭ���������ԡ�<a href="<?php echo $Global['my_2domain']; ?>/?b_gbook.php?submitok=add&memberid=<?php echo $uid; ?>&membernickname=<?php echo $nickname; ?>&g=<?php echo $grade; ?>" target="_blank" class=A9BU_tiaose>��������</a> ) </font>
		</p>
		</div>
		<div class="leftTitle"><h4>��������</h4>
		</div>
		<div class="leftContent">
		  <p style="height:100px;">
		  <?php if ($cook_grade>=2){?>
		  ע��ʱ�䣺<span class=tiaose><?php echo $regtime; ?></span><br />
		  ע��IP��<span class=tiaose><?php echo $regip; ?></span><br />
		  �����¼��<span class=tiaose><?php echo $logintime; ?></span><br />
		  �����¼IP��<span class=tiaose><?php echo $loginip; ?></span>
		  <?php }else{?>
		  ע��ʱ�䣺�߼���Ա�ɼ� <a href="<?php echo $Global['my_2domain'];?>/?k_vip.php"> <span class=tiaose>[ ������� ]</span></a><br />
		  ע��IP���߼���Ա�ɼ� <a href="<?php echo $Global['my_2domain'];?>/?k_vip.php"> <span class=tiaose>[ ������� ]</span></a><br />
		  �����¼���߼���Ա�ɼ� <a href="<?php echo $Global['my_2domain'];?>/?k_vip.php"> <span class=tiaose>[ ������� ]</span></a><br />
		  �����¼IP���߼���Ա�ɼ� <a href="<?php echo $Global['my_2domain'];?>/?k_vip.php"> <span class=tiaose>[ ������� ]</span></a>
		  <?php }?>
		  </p>
	  </div>
	</div>
	<div class="right">
<!-- ������� -->
<?php
$rt=$db->query("SELECT id,path_s FROM ".__TBL_PHOTO__." WHERE userid=".$uid." AND flag=1 ORDER BY id DESC LIMIT 10");
$total = $db->num_rows($rt);
if($total>0){
?>	
	  <div class="rightTitle"><h4>�������</h4>
	  <a href="myphoto<?php echo $uid; ?>.html">>>����</a></div>
		<div class="rightContent">
			<div class="photoLeft" id="photoLeft"><a href="###"><img src="images/<?php echo $mbkind; ?>/play_L.gif" border="0" /></a></div>
			<div class="photoCenter" id="photoCenter">
	<ul>
<?php
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
	<li><div class="pbox"><a href="p<?php echo $rows['id']; ?>.html"><img src="<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rows['path_s']; ?>" border=0 class="img" ></a></div></li>
<?php }?>
	</ul>
			</div>
			<div class="photoRight" id="photoRight"><a href="###"><img src="images/<?php echo $mbkind; ?>/play_R.gif" border="0" /></a></div>
			<div class="clear"></div>
		</div>
		<script language=javascript type=text/javascript>
		var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "photoCenter";//��������ID
		scrollPic_02.arrLeftId      = "photoLeft";//���ͷID
		scrollPic_02.arrRightId     = "photoRight"; //�Ҽ�ͷID
		scrollPic_02.frameWidth     = 500;//��ʾ����
		scrollPic_02.pageWidth      = 126; //��ҳ���
		scrollPic_02.speed          = 20; //�ƶ��ٶ�(��λ���룬ԽСԽ��)
		scrollPic_02.space          = 10; //ÿ���ƶ�����(��λpx��Խ��Խ��)
		scrollPic_02.autoPlay       = true; //�Զ�����
		scrollPic_02.autoPlayTime   = 1.5; //�Զ����ż��ʱ��(��)
		scrollPic_02.initialize(); //��ʼ��
		</script>
		<div class="wspace"></div>
<?php }?>		
<!-- �������� -->
	<div class="rightTitle"><h4>��������</h4>
	<a href="myarchive<?php echo $uid; ?>.html" >>>����</a></div>
	<div class="rightContent2">
		<div class="userdataL">
			<div class="userdataL_l">�á�������</div>
			<div class="userdataL_r"><?php echo $username;?> <?php if ($ifphoto == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='����������֤'>";}?></div>
			<div class="userdataL_l">�ԡ�����</div>
			<div class="userdataL_r"><?php if ($sex==1){echo "��";}else{echo "Ů";} ?></div>			
			<div class="userdataL_l">�����ߣ�</div>
			<div class="userdataL_r"><?php echo $heigh;?>���� <?php if ($ifheigh == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='�������֤'>"; }?></div>	
			<div class="userdataL_l">�塡���Σ�</div>
			<div class="userdataL_r"><?php
switch ($tx){ 
case 1:echo "����";break;
case 2:echo "����";break;
case 3:echo "�е�";break;
case 4:echo "��׳";break;
case 5:echo "����";break;
case 6:echo "�ȳ�";break;
case 7:echo "��С";break;
case 8:echo "����";break;
case 9:echo "���";break;
case 10:echo "����";break;
case 11:echo "�Ը�";break;
}
?></div>
			<div class="userdataL_l">����״����</div>
			<div class="userdataL_r"><?php
switch ($love){ 
case 1:echo "δ��";break;
case 2:echo "�ѻ�";break;
case 3:echo "��������Ů";break;
case 4:echo "��������Ů";break;
case 5:echo "ɥż����Ů";break;
case 6:echo "ɥż����Ů";break;
case 7:echo "����";break;
}
?> <?php if ($iflove == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='����״������֤'>"; }?></div>			
			<div class="userdataL_l">ѧ��������</div>
			<div class="userdataL_r"><?php
switch ($edu){ 
case 1:echo "���м�����";break;
case 2:echo "���л���ר������";break;
case 3:echo "��ר������";break;
case 4:echo "���Ƽ�����";break;
case 5:echo "˶ʿ������";break;
case 6:echo "��ʿ������";break;
}
?> <?php if ($ifedu == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='ѧ������֤'>"; }?></div>
			<div class="userdataL_l">���ڵ�����</div>
			<div class="userdataL_r"><?php echo $area1; ?>&nbsp;&gt;&gt; <?php echo $area2; ?>��<font color="#999999">(���磺<?php echo $area3; ?>&nbsp;&gt;&gt; <?php echo $area4; ?>)</font></div>		
		</div>
		<div class="userdataR">
			<div class="userdataL_l">����Ŀ�ģ�</div>
			<div class="userdataL_r"><?php
switch ($kind){ 
case 1:echo "������";break;
case 2:echo "Լ�ύ��";break;
case 3:echo "��������";break;
case 4:echo "�쳾֪��";break;
case 5:echo "���̻���";break;
}
?></div>
			<div class="userdataL_l">�ꡡ���䣺</div>
			<div class="userdataL_r"><?php 
$tmpbirthday1 = substr($birthday,0,4);
$tmpbirthday2 = date("Y");
$tmpbirthday  = $tmpbirthday2 - $tmpbirthday1;
echo $tmpbirthday;
?>�� <font color="#999999">(<?php echo $birthday; ?>)</font> <?php if ($ifbirthday == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='��������֤'>"; }?></div>			
			<div class="userdataL_l">�塡���أ�</div>
			<div class="userdataL_r"><?php echo $weigh;?>����</div>	
			<div class="userdataL_l">�� �� �룺</div>
			<div class="userdataL_r"><?php
switch ($pay){ 
case 1:echo "600Ԫ����";break;
case 2:echo "600-799Ԫ";break;
case 3:echo "800-999Ԫ";break;
case 4:echo "1000-1499Ԫ";break;
case 5:echo "1500-1999Ԫ";break;
case 6:echo "2000-2999Ԫ";break;
case 7:echo "3000-3999Ԫ";break;
case 8:echo "4000-4999Ԫ";break;
case 9:echo "5000-5999Ԫ";break;
case 10:echo "6000-6999Ԫ";break;
case 11:echo "7000-9999Ԫ";break;
case 12:echo "10000-19999Ԫ";break;
case 13:echo "20000Ԫ����";break;
}
?> <?php if ($ifpay == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='����������֤'>"; }?></div>
			<div class="userdataL_l">�С���ҵ��</div>
			<div class="userdataL_r"><?php
switch ($field){ 
case 1:echo "�����/������";break;
case 2:echo "�ʵ�/ͨѶ";break;
case 3:echo "����/����/����/֤ȯ";break;
case 4:echo "����/���ز�";break;
case 5:echo "��ҵ/����/����";break;
case 6:echo "Ӱ��/����/����";break;
case 7:echo "����/����/�赸";break;
case 8:echo "���/ý��/����";break;
case 9:echo "����/��װ";break;
case 10:echo "����/����";break;
case 11:echo "����/��ѵ/����";break;
case 12:echo "����/����/��Դ";break;
case 13:echo "����/����/����";break;
case 14:echo "ҽ��/����";break;
case 15:echo "˾��/��ʦ/��ѯ";break;
case 16:echo "����/������֯";break;
case 17:echo "����/����";break;
case 18:echo "���һ���/����";break;
case 19:echo "ũҵ";break;
case 20:echo "��Уѧ��";break;
case 21:echo "����";break;
}
?></div>			
			<div class="userdataL_l">ְ����ҵ��</div>
			<div class="userdataL_r"><?php
switch ($job){ 
case 1:echo "��ҵ������Ա";break;
case 2:echo "ר��/����";break;
case 3:echo "����/������Ա";break;
case 4:echo "�г�/������Ա";break;
case 5:echo "������Ա/��ְ����";break;
case 6:echo "��ְͨԱ";break;
case 7:echo "���ظɲ�/������Ա";break;
case 8:echo "������/��Ա";break;
case 9:echo "��ʦ";break;
case 10:echo "����";break;
case 11:echo "ũ��";break;
case 12:echo "����";break;
case 13:echo "ѧ��";break;
case 14:echo "����ְҵ��";break;
case 15:echo "��/������Ա";break;
case 16:echo "ʧҵ/��ҵ";break;
case 17:echo "����";break;
}
?></div>
			<div class="userdataL_l">�顡������</div>
			<div class="userdataL_r"><?php
switch ($house){ 
case 1:echo "�л鷿";break;
case 2:echo "����������";break;
case 3:echo "�޻鷿";break;
case 4:echo "�޻鷿���ɽ��";break;
case 5:echo "�޻鷿ϣ���Է����";break;
case 6:echo "�޻鷿ϣ��˫�����";break;
}
?> <?php if ($ifhouse == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='ס������֤'>"; }?></div>
			<div class="userdataL_l"></div>
			<div class="userdataL_r" style="text-align:right;font-size:14px"><a href="myarchive<?php echo $uid; ?>.html" class="A9BU_tiaose">��ϸ����</a></div>

		</div>
	  </div>
	<div class="wspace"></div>
<!-- �ҵ��ռ� -->
<?php
$rt = $db->query("SELECT id,title,content,click,hfnum,stime FROM ".__TBL_DIARY__." WHERE flag=1 AND diaryopen=1 AND userid=".$uid." ORDER BY id DESC LIMIT 11");
$total = $db->num_rows($rt);
if($total>0){
$rows = $db->fetch_array($rt);
?>
	<div class="rightTitle">
	  <h4>�����ռ�</h4>
	  <a href="mydiary<?php echo $uid; ?>.html">>>����</a></div>
	<div class="rightContent">
		<div class="userdata">
			<div class="diaryTitle">[ <?php echo date_format2($rows['stime'],'%Y-%m-%d');?> <?php echo htmlout(stripslashes($rows['title'])); ?> ]</div>
			<div class="diaryContent">����<?php
			$s =gylsubstr(stripslashes($rows['content']),200); 
			echo strip_tags($s);
			//echo htmlout(gylsubstr(stripslashes($rows['content']),200));
			?>����</div>
			<div class="diaryHf">
		  �ظ�:[<font color="#FF0000"><?php echo $rows['hfnum']; ?></font>]���Ķ�:[<font color="#FF0000"><?php echo $rows['click']; ?></font>]��<a href="diary<?php echo $rows['id']; ?>.html" target="_blank" class="A9BU_tiaose">�Ķ�ȫ��</a>
			</div>
		</div>
		<div class="userdata"><?php 
for($i=1;$i<$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
				<div class="diaryList">��<?php echo date_format2($rows['stime'],'%m/%d');?> <a href="diary<?php echo $rows['id']; ?>.html" target="_blank"><?php echo $rows['title']; ?></a></div>
<?php }?>
		</div>
		<div class="wspace"></div>
	</div>
	<div class="wspace"></div>
<?php }?>
<!-- �ҵ�Լ�� -->
<?php
$rt=$db->query("SELECT id,kind,title,area1,area2,price,yhtime,maidian,contact,content,birthday1,birthday2,heigh1,heigh2,love,edu,area3,area4,addtime,bmnum,click,flag FROM ".__TBL_DATING__." WHERE userid=".$uid." AND flag=1 ORDER BY id DESC LIMIT 1");
$total = $db->num_rows($rt);
if($total>0){
$row = $db->fetch_array($rt);
?>
	<div class="rightTitle">
	  <h4>����Լ��</h4>
	  <a href="mydating<?php echo $uid; ?>.html">>>����</a></div>
	<div class="rightContent">
		<div class="userdata">
			<div class="datingTitle"><?php echo htmlout(stripslashes($row['title'])); ?></div>
			<div class="datingList">Լ�����ݣ�<span class=tiaose><?php
	switch ($row['kind']){ 
	case 1:echo "�Ȳ�С��";break;
	case 2:echo "�������";break;
	case 3:echo "��Լ����";break;
	case 4:echo "����Ӱ";break;
	case 5:echo "����K��";break;
	case 6:echo "����";break;
	default:echo "����";break;
	}?></span></div>
			<div class="datingList">Լ�����⣺<span class=tiaose><?php echo htmlout(stripslashes($row['title'])); ?></span></div>
			<div class="datingList">Լ��ʱ�䣺<span class=tiaose><?php echo date_format2($row['yhtime'],'%Y��%m��%d�� %Hʱ %M��').' '.getweek(date_format2($row['yhtime'],'%Y-%m-%d'));?></span></div>
			<div class="datingList">Լ����У�<span class=tiaose><?php echo $row['area1'].' >> '.$row['area2']; ?></span></div>
			<div class="datingList">����Ԥ�㣺<span class=tiaose><?php
	switch ($row['price']){ 
	case 1:echo "100Ԫ����";break;
	case 2:echo "100��300Ԫ";break;
	case 3:echo "300--500Ԫ";break;
	case 4:echo "500Ԫ����";break;
	default :echo "����";break;
	}?></span></div>
			<div class="datingList">˭���򵥣�<span class=tiaose><?php
	switch ($row['maidian']){ 
	case 1:echo "������";break;
	case 2:echo "ӦԼ����";break;
	case 3:echo "AA��";break;
	default :echo "����";break;
	}?></span></div>
			<div class="datingContent">Լ�ᰲ�ţ�<span class=tiaose><?php echo htmlout(stripslashes($row['content'])); ?></span></div>
			<div class="datingContent">Լ�������������<span class=tiaose><?php if (!empty($row['birthday1']) && !empty($row['birthday2'])){echo '������'.$row['birthday1'].'��'.$row['birthday2'].'��֮��';}else{echo '����';} ?></span>�����<span class=tiaose><?php if (!empty($row['heigh1']) && !empty($row['heigh2'])){echo '������'.$row['heigh1'].'��'.$row['heigh2'].'����֮��';}else{echo '����';} ?></span>��	����״��<span class=tiaose><?php
	switch ($row['love']){ 
	case 1:echo "Ϊδ��";break;
	case 2:echo "Ϊ�ѻ�";break;
	case 3:echo "Ϊ��������Ů";break;
	case 4:echo "Ϊ��������Ů";break;
	case 5:echo "Ϊɥż����Ů";break;
	case 6:echo "Ϊɥż����Ů";break;
	case 7:echo "����";break;
	default :echo "����";break;
	}?></span>��ѧ��<span class=tiaose><?php
	switch ($row['edu']){ 
	case 1:echo "Ϊ���м�����";break;
	case 2:echo "Ϊ���л���ר������";break;
	case 3:echo "Ϊ��ר������";break;
	case 4:echo "Ϊ���Ƽ�����";break;
	case 5:echo "Ϊ˶ʿ������";break;
	case 6:echo "Ϊ��ʿ������";break;
	default:echo "����";break;
	}?></span>�����ڵ���<span class=tiaose>Ϊ<?php echo $row['area3'].' >> '.$row['area4']; ?></span>
			</div>
			<div class="datingContent" style="font-size:14px;font-family:'����';text-align:right;height:40px;padding-top:5px">��Ӧ����:[<font color="#FF0000"><?php echo $row['bmnum']; ?></font>]������:[<font color="#FF0000"><?php echo $row['click']; ?></font>]��<a href="dating<?php echo $row['id']; ?>.html" target="_blank" class="A9BU_tiaose">������Լ</a></div>
		</div>
		<div class="clear"></div>
	</div>
<?php }?>


<?php $rt=$db->query("SELECT b.picurl FROM ".__TBL_PRESENT_USER__." a,".__TBL_PRESENT__." b WHERE a.kid=b.id AND a.userid=".$uid." ORDER BY b.id DESC LIMIT 6");
$total = $db->num_rows($rt);
if($total>0){
?>	
	<div class="rightTitle">
	  <h4>�յ����� <?php
$rtmail = $db->query("SELECT COUNT(*) FROM ".__TBL_PRESENT_USER__." WHERE userid=".$uid);
if($db->num_rows($rtmail)){
$rowsmail = $db->fetch_array($rtmail);
echo '<font style=font-weight:normal;font-size:12px;font-family:Verdana>( '.$rowsmail[0].' ) ����ֻ��ʾ����6�����Ta���˿��Բ鿴���ࡣ</font>';
}
?></h4>
	  <a href="<?php echo $Global['my_2domain'];?>/?b_present.php?submitok=list">>>����</a>
	  </div>
	<div class="rightContent">
	<div class="clear"></div>
<table width="610" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
<?php
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
    <td align="center" style="padding-top:10px;padding-bottom:10px;"><table width="50" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td height="50" align="center" style="border:#fff 0px solid;position:relative;"><?php echo "<img src=".$Global['up_2domain']."/present/".$rows[0]." border=0 width=64 height=64>";?></td>
      </tr>
    </table>
        </td>
    <?php if ($i % 6 == 0) {?>
  </tr>
  <tr>
    <?php } ?>
    <?php 	} ?>
  </tr>
</table>
<?php }?>


	</div>
	<div class="clear"></div>
</div>
<?php
$shuaxin_homeclick = 'homeclick'.$uid;
if ( $cook_userid != $uid && ereg("^[0-9]{1,9}$",$cook_userid) && $_COOKIE["$shuaxin_homeclick"] != 'OK') {
	$addtime = date("Y-m-d H:i:s");
	$db->query("INSERT INTO ".__TBL_CLICKHISTORY__."  (userid,senduserid,sendnickname,sex,grade,photo_s,addtime) VALUES ('$uid',$cook_userid,'$cook_nickname','$cook_sex','$cook_grade','$cook_photo_s','$addtime')");
	setcookie("$shuaxin_homeclick",'OK');
}
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
}
return $xingqi;
} 
?>