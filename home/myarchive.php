<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("������󣬸��û������ڻ��ѱ��������ѱ�ɾ����",$Global['www_2domain']);
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT username,nickname,grade,loveb,regtime,logintime,alltime,logincount,mbkind,mbtitle,magic,bgpic,ifmod,sex,birthday,love,kind,area1,area2,area3,area4,photo_s,click,heigh,weigh,tx,star,blood,zhongjiao,house,car,clothing,edu,school,field,job,pay,nianwang,xinyuan,smoking,drink,gexin,xinrong,youshi,xinqu,huoban,aboutus,ifphoto,ifbirthday,ifheigh,ifedu,iflove,ifpay,ifhouse,ifcar FROM ".__TBL_MAIN__." WHERE id='$uid' AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$username = $row['username'];
$nickname = $row['nickname'];
$grade = $row['grade'];
$loveb = $row['loveb'];
$regtime = $row['regtime'];
$logintime = $row['logintime'];
$alltime = $row['alltime'];
$logincount = $row['logincount'];
$mbkind = $row['mbkind'];
$mbtitle = $row['mbtitle'];
$magic = $row['magic'];
$bgpic = $row['bgpic'];
$ifmod = $row['ifmod'];
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
$nianwang   = $row['nianwang'];
$xinyuan   = $row['xinyuan'];
$smoking   = $row['smoking'];
$drink   = $row['drink'];
$gexin   = $row['gexin'];
$xinrong   = $row['xinrong'];
$youshi   = $row['youshi'];
$xinqu   = $row['xinqu'];
$huoban   = $row['huoban'];
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
$ifcar  = $row['ifcar'];
$tmpx = 0;
if ($ifphoto == 1)$tmpx = $tmpx+1;
if ($ifbirthday == 1)$tmpx = $tmpx+1;
if ($ifedu == 1)$tmpx = $tmpx+1;
if ($iflove == 1)$tmpx = $tmpx+1;
if ($ifpay == 1)$tmpx = $tmpx+1;
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸��û������ڻ��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
exit;}
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $nickname;?>_<?php
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
	?>_��������</title>
<meta name="keywords" content="<?php echo $nickname;?>,<?php
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
	?>,<?php
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
	?>����,<?php
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
	?>����" />
<meta name="description" content="<?php echo $nickname;?>��<?php
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
	?>���ϵĸ�����ϸ������Ϣ" />
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/myarchive.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homed.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
	</div>
	<div class="right">
	<!-- ���Ķ��� -->
<?php if (!empty($aboutus)) {?>
	  <div class="rightTitle"><h4>���Ķ���</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a3.php" target="_blank" >>>�޸�</a><?php }?></div>
		<div class="rightContent ul2"><p>��<?php echo htmlout(stripslashes($aboutus));?></p></div>
		<div class="wspace"></div>
<?php }?>
		<!-- �ҵ����� -->
	  <div class="rightTitle"><h4>�ҵ�����</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a1.php" target="_blank" >>>�޸�</a><?php }?></div>
		<div class="rightContent">
			<div class="userdataL">
				<div class="userdata_l">�á�������</div>
				<div class="userdata_r"><?php echo $username;?> <?php if ($ifphoto == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='����������֤'>"; }?></div>
				<div class="userdata_l">�ԡ�����</div>
				<div class="userdata_r"><?php if ($sex==1){echo "��";}else{echo "Ů";} ?></div>			
				<div class="userdata_l">�����ߣ�</div>
				<div class="userdata_r"><?php echo $heigh;?>���� <?php if ($ifheigh == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='�������֤'>"; }?></div>	
				<div class="userdata_l">�塡���Σ�</div>
				<div class="userdata_r"><?php
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
				<div class="userdata_l">����״����</div>
				<div class="userdata_r"><?php
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
				<div class="userdata_l">ѧ��������</div>
				<div class="userdata_r"><?php
	switch ($edu){ 
	case 1:echo "���м�����";break;
	case 2:echo "���л���ר������";break;
	case 3:echo "��ר������";break;
	case 4:echo "���Ƽ�����";break;
	case 5:echo "˶ʿ������";break;
	case 6:echo "��ʿ������";break;
	}
	?> <?php if ($ifedu == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='ѧ������֤'>"; }?></div>
				<div class="userdata_l">���ڵ�����</div>
				<div class="userdata_r"><?php echo $area1; ?>&nbsp;&gt;&gt; <?php echo $area2; ?></div>
				<div class="userdata_l">�ҵĹ��磺</div>
				<div class="userdata_r"><?php echo $area3; ?>&nbsp;&gt;&gt; <?php echo $area4; ?></div>
				<div class="userdata_l">�š���װ��</div>
				<div class="userdata_r"><?php
switch ($clothing){ 
case 1:echo "����";break;
case 2:echo "��ͳ";break;
case 3:echo "ǰ��";break;
case 4:echo "���";break;
}
?></div>
				<div class="userdata_l">Ѫ�����ͣ�</div>
				<div class="userdata_r"><?php
switch ($blood){ 
case 1:echo "A";break;
case 2:echo "B";break;
case 3:echo "AB";break;
case 4:echo "O";break;
case 5:echo "������δ֪";break;
}
?> ��</div>
				<div class="userdata_l">�Ƿ����̣�</div>
				<div class="userdata_r"><?php
switch ($smoking){ 
case 1:echo "����";break;
case 2:echo "ż����";break;
case 3:echo "һ��һ��";break;
case 4:echo "���̾���";break;
case 5:echo "���ڽ���";break;
case 6:echo "�Ѿ�����";break;
}
?></div>
			</div>
			<div class="userdataR">
				<div class="userdata_l">����Ŀ�ģ�</div>
				<div class="userdata_r"><?php
	switch ($kind){ 
	case 1:echo "������";break;
	case 2:echo "Լ�ύ��";break;
	case 3:echo "��������";break;
	case 4:echo "�쳾֪��";break;
	case 5:echo "���̻���";break;
	}
	?></div>
				<div class="userdata_l">�ꡡ���䣺</div>
				<div class="userdata_r"><?php 
$tmpbirthday1 = substr($birthday,0,4);
$tmpbirthday2 = date("Y");
$tmpbirthday  = $tmpbirthday2 - $tmpbirthday1;
echo $tmpbirthday;
?>�� <font color="#999999">(<?php echo $birthday; ?>)</font> <?php if ($ifbirthday == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='��������֤'>"; }?></div>			
				<div class="userdata_l">�塡���أ�</div>
				<div class="userdata_r"><?php echo $weigh;?>����</div>	
				<div class="userdata_l">�� �� �룺</div>
				<div class="userdata_r"><?php
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
				<div class="userdata_l">�С���ҵ��</div>
				<div class="userdata_r"><?php
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
				<div class="userdata_l">ְ����ҵ��</div>
				<div class="userdata_r"><?php
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
				<div class="userdata_l">ס��������</div>
				<div class="userdata_r"><?php
	switch ($house){ 
	case 1:echo "�л鷿";break;
	case 2:echo "����������";break;
	case 3:echo "�޻鷿";break;
	case 4:echo "�޻鷿���ɽ��";break;
	case 5:echo "�޻鷿ϣ���Է����";break;
	case 6:echo "�޻鷿ϣ��˫�����";break;
	}
	?> <?php if ($ifhouse == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='ס������֤'>"; }?></div>
				<div class="userdata_l">�ǡ�������</div>
				<div class="userdata_r">
					<?php
					switch ($star){ 
					case 1:echo "ħ����";break;
					case 2:echo "ˮƿ��";break;
					case 3:echo "˫����";break;
					case 4:echo "������";break;
					case 5:echo "��ţ��";break;
					case 6:echo "˫����";break;
					case 7:echo "��з��";break;
					case 8:echo "ʨ����";break;
					case 9:echo "��Ů��";break;
					case 10:echo "�����";break;
					case 11:echo "��Ы��";break;
					case 12:echo "������";break;
					}?></div>
				<div class="userdata_l">�ڽ�������</div>
				<div class="userdata_r"><?php
switch ($zhongjiao){ 
case 1:echo "��������";break;
case 2:echo "���";break;
case 3:echo "������";break;
case 4:echo "����";break;
case 5:echo "��˹����";break;
case 6:echo "������";break;
case 7:echo "��������";break;
case 8:echo "����";break;
}
?></div>
				<div class="userdata_l">��ͨ���ߣ�</div>
				<div class="userdata_r"><?php
switch ($car){ 
case 1:echo "����";break;
case 2:echo "�е�����";break;
case 3:echo "�ߵ�����";break;
case 4:echo "������������";break;
case 5:echo "����";break;
}
?> <?php if ($ifcar == 1){echo "<font color=#009900><img src=images/ok.gif hspace=3 align=absmiddle>����֤</font>"; }?></div>
				<div class="userdata_l">�Ƿ����ƣ�</div>
				<div class="userdata_r"><?php
switch ($drink){ 
case 1:echo "�ξƲ�մ";break;
case 2:echo "��ʱ��һЩ";break;
case 3:echo "ϲ��������";break;
case 4:echo "�þ����������";break;
case 5:echo "���ڽ��";break;
case 6:echo "�Ѿ�����";break;
}
?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="rightContent ul2" style="padding:0 0 15px 0">
			<?php if ($ifmod == 1) {?>
			<div class="userdata_Ml">��ҵԺУ��</div>
			<div class="userdata_Mr"><?php echo stripslashes($school);?>&nbsp;</div>
			<div class="userdata_Ml">���������£�</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($nianwang));?>&nbsp;</div>
			<div class="userdata_Ml">���ڵ���Ը��</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($xinyuan));?>&nbsp;</div>
			<div class="userdata_Ml">�ҵĸ��ԣ�</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($gexin));?>&nbsp;</div>
			<div class="userdata_Ml">���������ң�</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($xinrong));?>&nbsp;</div>
			<div class="userdata_Ml">�ҵ����ƣ�</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($youshi));?>&nbsp;</div>
			<div class="userdata_Ml">��Ȥ���ã�</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($xinqu));?>&nbsp;</div>
			<div class="userdata_Ml">��ҪѰ�ң�</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($huoban));?>&nbsp;</div>
			<?php }?>
			<div class="clear"></div>
		</div>
		<!-- ��չ���Ͽ�ʼ -->	
<?php 
$rt = $db->query("SELECT * FROM ".__TBL_MAIN_DATA__." WHERE ifmod=1 AND userid=".$uid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
if (!empty($row['a2'])) {?>
		<!-- Լ�ύ�� -->
		<div class="wspace"></div>
	  <div class="rightTitle"><h4>Լ�ύ������</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a5.php" target="_blank" >>>�޸�</a><?php }?></div>
		<div class="rightContent ul2" style="padding:10px 0 10px 0;">
			<div class="userdata_extMl">��һ��Լ����ϣ��˫������ʲô��</div>
			<div class="userdata_extMr"><?php
switch ($row['a1']){ 
case 1:echo "�ȼ�һ���໥��ʶ��";break;
case 2:echo "����һ��Է����Ȳ衣";break;
case 3:echo "����ȥ������Ӱ�����裬���衣";break;
case 4:echo "���ϲ�������������֡�";break;
case 5:echo "���ϲ��������ӵ�����ǡ�";break;
case 6:echo "���ų�����һ���Ŀ��ܡ�";break;
}
?>&nbsp;</div>
			<div class="userdata_extMl">Լ���и�˭�򵥣�</div>
			<div class="userdata_extMr"><?php
switch ($row['a2']){ 
case 1:echo "��Ȼ���еĸ�";break;
case 2:echo "�еĶึһЩ";break;
case 3:echo "˭��Ǯ˭��";break;
case 4:echo "��㣬����ν";break;
case 5:echo "AA��";break;
case 6:echo "����ϵ��չ";break;
}
?>&nbsp;</div>
			<div class="userdata_extMl">��ϲ����Լ�᳡����</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['a3']));?></div>
			<div class="userdata_extMl">��ϲ�������֣�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['a4']));?></div>
			<div class="userdata_extMl">�ҳ�������������</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['a5']));?></div>
			<div class="userdata_extMl">��ϲ��̸�ۣ�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['a6']));?></div>
			<div class="userdata_extMl">����Ϊ�����ǣ�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['a7']));?></div>
			<div class="clear"></div>
		</div>
<?php } if (!empty($row['b2'])) {?>
		<!-- �������� -->
		<div class="wspace"></div>
	  <div class="rightTitle"><h4>������������</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a6.php" target="_blank" >>>�޸�</a><?php }?></div>
		<div class="rightContent ul2" style="padding:10px 0 10px 0">
			<div class="userdata_extMl">����Ů��</div>
			<div class="userdata_extMr"><?php
switch ($row['b1']){ 
case 1:echo "����Ů";break;
case 2:echo "����Ů����ס��һ��";break;
case 3:echo "����Ů��ż����һ��";break;
case 4:echo "����Ů��ͬסһ��";break;
case 5:echo "��û�У�����Ҳû��ϵ";break;
}?>&nbsp;</div>
			<div class="userdata_extMl">������ҪС����</div>
			<div class="userdata_extMr"><?php
switch ($row['b2']){ 
case 1:echo "��Ҫ����ϲ��";break;
case 2:echo "�������Ͼ�Ҫ";break;
case 3:echo "��������Ҫ";break;
case 4:echo "˳����Ȼ";break;
case 5:echo "��ʱ������";break;
}?>&nbsp;</div>
			<div class="userdata_extMl">Ը��Ϊ����Ǩ�ӱ���:��</div>
			<div class="userdata_extMr"><?php
switch ($row['b3']){ 
case 1:echo "����";break;
case 2:echo "���ǶԷ��ᵽ��������";break;
case 3:echo "�������������";break;
case 4:echo "�����ϵ�Ѿ����ȶ������Կ���";break;
case 5:echo "Ҫ����ȥ�����ϲ���ĵط�����";break;
case 6:echo "Ϊ�˰��飬��Ȼ����";break;
}?></div>
			<div class="userdata_extMl">����һ�е����ټ���</div>
			<div class="userdata_extMr"><?php
switch ($row['b4']){ 
case 1:echo "ȫ����(��)��";break;
case 2:echo "10%";break;
case 3:echo "20%";break;
case 4:echo "30%";break;
case 5:echo "40%";break;
case 6:echo "50%";break;
case 7:echo "60%";break;
case 8:echo "70%";break;
case 9:echo "80%";break;
case 10:echo "90%";break;
case 11:echo "ȫ������";break;
case 12:echo "�������˭��ʱ��˭��";break;
}?></div>
			<div class="userdata_extMl">ϲ��������</div>
			<div class="userdata_extMr"><?php
switch ($row['b5']){ 
case 1:echo "ϲ��";break;
case 2:echo "ÿ�궼ȥ���ζȼ�";break;
case 3:echo "ûʱ�䣬����ȥ";break;
case 4:echo "�������������Ȥ";break;
case 5:echo "�湻Ǯ������";break;
case 6:echo "ֻ�ڸ�������";break;
}?></div>
			<div class="userdata_extMl">������˫���Ĺ�ϵӦ���ǣ�</div>
			<div class="userdata_extMr"><?php
switch ($row['b6']){ 
case 1:echo "�˴���ȫռ��";break;
case 2:echo "�����޼䣬��������";break;
case 3:echo "��ȫ����";break;
case 4:echo "�˴˹��ĵ����־���";break;
case 5:echo "����Է���Ҫ��ͬʱ�ж����ռ�";break;
}?></div>
			<div class="userdata_extMl">�ҵĻ���̬�ȣ�</div>
			<div class="userdata_extMr"><?php
switch ($row['b7']){ 
case 1:echo "����ͬ�����";break;
case 2:echo "ϣ�����бȽϳ��õĹ�ϵ";break;
case 3:echo "���������İ���������";break;
case 4:echo "���ں��쳤�ؾã�ֻ�ں�����ӵ��";break;
case 5:echo "˳����Ȼ�����鲻��ǿ��";break;
}?></div>
			<div class="userdata_extMl">�ҵľ���״����</div>
			<div class="userdata_extMr"><?php
switch ($row['b8']){ 
case 1:echo "����Ǯ��ʲô����";break;
case 2:echo "Ŀǰʲô��û�У��Ժ���е�";break;
case 3:echo "��Щ���";break;
case 4:echo "�д��з�";break;
case 5:echo "�д��з��г�";break;
case 6:echo "Ǯ���õ��ģ��Һܸ�ԣ";break;
}?></div>
			<div class="userdata_extMl">�Է��ļ�ͥ��Ҫ��</div>
			<div class="userdata_extMr"><?php
switch ($row['b9']){ 
case 1:echo "����и�ԣ�ļ�ͥ";break;
case 2:echo "��Ҵ���������";break;
case 3:echo "���ܸ���̫��";break;
case 4:echo "����ν�������޹�";break;
case 5:echo "ֻҪ�మ��ʲô������";break;
}?></div>
			<div class="userdata_extMl">�ҵ����ѹۣ�</div>
			<div class="userdata_extMr"><?php
switch ($row['b10']){ 
case 1:echo "�Թ��ù⻨��";break;
case 2:echo "��һЩ����һЩ";break;
case 3:echo "��Щ����Ʒ�����������";break;
case 4:echo "��ʡ��ʡ���û���";break;
case 5:echo "����˵�����ģ��Ҿ����ǽ�ʡ";break;
}?></div>
			<div class="userdata_extMl">�Ҷ����ڹ�����̬�ȣ�</div>
			<div class="userdata_extMr"><?php
switch ($row['b11']){ 
case 1:echo "������";break;
case 2:echo "����������";break;
case 3:echo "�Ͻ�������ҵ��";break;
case 4:echo "8Сʱ�ھ��ľ���";break;
case 5:echo "��Ǯ���ֶζ���";break;
case 6:echo "�����ӣ���Ū�쵼";break;
case 7:echo "��������";break;
case 8:echo "Ŀǰ�Ĺ������ʺ���";break;
case 9:echo "����û����";break;
}?></div>
			<div class="userdata_extMl">���С����</div>
			<div class="userdata_extMr"><?php
switch ($row['b12']){ 
case 1:echo "���޳ɣ������";break;
case 2:echo "���٣�����̫����";break;
case 3:echo "����򣬾���һ��";break;
case 4:echo "����һ�ֽ����ֶ�";break;
case 5:echo "������Т��";break;
}?></div>
			<div class="userdata_extMl">��ͥ������</div>
			<div class="userdata_extMr"><?php
switch ($row['b13']){ 
case 1:echo "��̫�ں�";break;
case 2:echo "��̫�Ҿ���";break;
case 3:echo "ϲ������";break;
case 4:echo "ϲ�����˴�ɨ�ɾ�";break;
case 5:echo "�н��";break;
case 6:echo "��Ū������ʰ";break;
}?></div>
			<div class="userdata_extMl">����������</div>
			<div class="userdata_extMr"><?php
switch ($row['b14']){ 
case 1:echo "��ò�Ҫ";break;
case 2:echo "ֻϲ���㡢���";break;
case 3:echo "ϲ������è��";break;
case 4:echo "��ð������԰";break;
case 5:echo "����������������չ�";break;
}?></div>
			<div class="userdata_extMl">�������ѣ�</div>
			<div class="userdata_extMr"><?php
switch ($row['b15']){ 
case 1:echo "�����ò�Ҫ����";break;
case 2:echo "������У�����֪������";break;
case 3:echo "������У���������֪��";break;
case 4:echo "���ԣ�ֻҪ��������";break;
case 5:echo "���и��ģ���������";break;
case 6:echo "��Ϊ��ͬ������";break;
}?></div>
			<div class="userdata_extMl">ϣ�����ļ�ͥ��ϵ��</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['b16']));?></div>
			<div class="userdata_extMl">�Ҿ��������ദ����Ҫ���ǣ�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['b17']));?></div>
			<div class="userdata_extMl">��ϣ���Ľ��������Ȧ��</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['b18']));?></div>
			<div class="userdata_extMl">����ضԷ��ģ�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['b19']));?></div>
			<div class="clear"></div>
		</div>
<?php } if (!empty($row['c2']) && $cook_grade > 2) {?>
		<!-- �쳾֪�� -->
		<div class="wspace"></div>
	  <div class="rightTitle"><h4>�쳾֪������</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a7.php" target="_blank" >>>�޸�</a><?php }?></div>
		<div class="rightContent ul2" style="padding:10px 0 10px 0">
			<div class="userdata_extMl">������ס�ڣ�</div>
			<div class="userdata_extMr"><?php
switch ($row['c1']){ 
case 1:echo "һ����ס���ܷ���";break;
case 2:echo "�͸�ĸס";break;
case 3:echo "�ͱ��˺�ס��������";break;
case 4:echo "�ͱ���ס�����Ҽ䷿�Ӻ�����";break;
}?></div>
			<div class="userdata_extMl">��Ϊ�Լ��Ը���</div>
			<div class="userdata_extMr"><?php
switch ($row['c2']){ 
case 1:echo "һ����ס�㣬ͦ�Ըе�";break;
case 2:echo "��Ȼ��Ư������������";break;
case 3:echo "һ��";break;
case 4:echo "������ô˵����֪���������ô��";break;
case 5:echo "��֪��";break;
}?></div>
			<div class="userdata_extMl">�����԰�����ľ��飺</div>
			<div class="userdata_extMr"><?php
switch ($row['c3']){ 
case 1:echo "��û�о���";break;
case 2:echo "�Թ�����";break;
case 3:echo "���ǹ�����";break;
case 4:echo "���о���";break;
case 5:echo "�м�����";break;
}?></div>
			<div class="userdata_extMl">�ҶԴ��԰���̬���ǣ�</div>
			<div class="userdata_extMr"><?php
switch ($row['c4']){ 
case 1:echo "��������ֵ���";break;
case 2:echo "����������Ҫ����֮һ";break;
case 3:echo "ʳ��ɫ��Ҳ��û�в���";break;
case 4:echo "��ȱ����";break;
case 5:echo "ϲ����Ҫ";break;
case 6:echo "���п���";break;
}?></div>
			<div class="userdata_extMl">���԰������ڳ�����</div>
			<div class="userdata_extMr"><?php
switch ($row['c5']){ 
case 1:echo "�����������ԣ�Ը����϶Է�";break;
case 2:echo "��ͳ������";break;
case 3:echo "ֻ����������ʽ";break;
case 4:echo "ֻҪϲ������������";break;
case 5:echo "ϲ������";break;
case 6:echo "û����û�Թ���";break;
}?></div>
			<div class="userdata_extMl">����Ϊ�ԺͰ��Ĺ�ϵ�ǣ�</div>
			<div class="userdata_extMr"><?php
switch ($row['c6']){ 
case 1:echo "���Բ��а�";break;
case 2:echo "�а�������";break;
case 3:echo "�ԺͰ��޹�";break;
}?></div>
			<div class="userdata_extMl">����Ϊ�Ը���Ҫ�����ڶԷ��ģ�</div>
			<div class="userdata_extMr"><?php
switch ($row['c7']){ 
case 1:echo "����";break;
case 2:echo "���";break;
case 3:echo "����";break;
case 4:echo "����";break;
case 5:echo "����";break;
case 6:echo "���";break;
case 7:echo "̬��";break;
}?></div>
			<div class="userdata_extMl">���԰��У��������ǣ�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['c8']));?></div>
			<div class="userdata_extMl">����Ѱ�ң�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['c9']));?></div>
			<div class="userdata_extMl">ʲô�Ƚ��ܵ����ҵ����£�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['c10']));?></div>
			<div class="userdata_extMl">���ܹ�����(���ҵİ���)��</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['c11']));?></div>
			<div class="clear"></div>
		</div>	
<?php } if (!empty($row['d3'])) {?>
		<!-- ���̻��� -->
		<div class="wspace"></div>
	  <div class="rightTitle"><h4>���̻�������</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a8.php" target="_blank" >>>�޸�</a><?php }?></div>
		<div class="rightContent ul2" style="padding:10px 0 10px 0">
			<div class="userdata_extMl">���̻���Ŀ�ģ�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d1']));?></div>
			<div class="userdata_extMl">��˾/�������ƣ�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d2']));?></div>
			<div class="userdata_extMl">ְ����ࣺ</div>
			<div class="userdata_extMr"><?php
switch ($row['d3']){ 
case 1:echo "��Ӫ����";break;
case 2:echo "��Ŀ����";break;
case 3:echo "������Դ";break;
case 4:echo "��������";break;
case 5:echo "����/���";break;
case 6:echo "��Ϣ/���Ϲ���";break;
case 7:echo "����ʦ(�����Ӳ��)";break;
case 8:echo "����ʦ(��������)";break;
case 9:echo "����ʦ(���������)";break;
case 10:echo "����ʦ(ϵͳ�밲ȫ)";break;
case 11:echo "����ʦ(����)";break;
case 12:echo "����/��������";break;
case 13:echo "��վ����/�߻�/���";break;
case 14:echo "����/԰��/�������";break;
case 15:echo "��ҵ���/����";break;
case 16:echo "�з�";break;
case 17:echo "��������";break;
case 18:echo "���̹���";break;
case 19:echo "��������/�豸";break;
case 20:echo "��������";break;
case 21:echo "����/ʩ��/������Ա";break;
case 22:echo "�������/Ԥ����";break;
case 23:echo "ũ������";break;
case 24:echo "�г�Ӫ��/������չ";break;
case 25:echo "�г����������";break;
case 26:echo "���/����/ý��";break;
case 27:echo "����/ó��";break;
case 28:echo "����/����";break;
case 29:echo "��������";break;
case 30:echo "�ͻ�����";break;
case 31:echo "�ɹ�";break;
case 32:echo "����/����/�ִ�";break;
case 33:echo "���ڱ���רҵ��Ա";break;
case 34:echo "���ڱ��վ�����";break;
case 35:echo "��ʦ/������Ա";break;
case 36:echo "��ͷ/�˲��н�";break;
case 37:echo "����";break;
case 38:echo "�߻�";break;
case 39:echo "��ѵʦ";break;
case 40:echo "����";break;
case 41:echo "����/���Ź�����";break;
case 42:echo "�༭/����/�İ�";break;
case 43:echo "����/����";break;
case 44:echo "��������";break;
case 45:echo "������Ա";break;
case 46:echo "����/����������";break;
case 47:echo "����";break;
case 48:echo "����/�˶�Ա";break;
case 49:echo "ҽ��/ҽʦ/������Ա";break;
case 50:echo "����/����/Ӫ��ʦ";break;
case 51:echo "��ҽ/�������/԰��";break;
case 52:echo "��ȫ����";break;
case 53:echo "����ҵ����";break;
case 54:echo "����ҵ������Ա";break;
case 55:echo "������Ա";break;
case 56:echo "��ʦ/����������";break;
case 57:echo "�幤/���Ź�����";break;
case 58:echo "����Ա";break;
case 59:echo "˽Ӫ��ҵ��";break;
case 60:echo "����ְҵ��";break;
case 61:echo "��ѵ��";break;
case 62:echo "��Уѧ��";break;
case 63:echo "����";break;
}?></div>
			<div class="userdata_extMl">ְλ�ȼ���</div>
			<div class="userdata_extMr"><?php
switch ($row['d4']){ 
case 1:echo "���ڽ׶�(2�����ڹ�������)";break;
case 2:echo "�м��׶�(2-5�깤������)";break;
case 3:echo "�߼��׶�(5�����Ϲ�������/�����ר��)";break;
case 4:echo "�ܼ�";break;
case 5:echo "�߼�������(CEO, EVP, GM)";break;
case 6:echo "����";break;
}?></div>
			<div class="userdata_extMl">ְ�����ƣ�</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d5']));?></div>
			<div class="userdata_extMl">��ҵ���</div>
			<div class="userdata_extMr"><?php
switch ($row['d6']){ 
case 1:echo "������/��������";break;
case 2:echo "�����Ӳ��";break;
case 3:echo "��������";break;
case 4:echo "���ɵ�·";break;
case 5:echo "����";break;
case 6:echo "���������";break;
case 7:echo "���ͨ��";break;
case 8:echo "��ѧ����";break;
case 9:echo "ͨѶ";break;
case 10:echo "����繤";break;
case 11:echo "��ý��";break;
case 12:echo "��ҩ/ҽ���豸/���﹤��";break;
case 13:echo "����/�Ǳ�/��ҵ�Զ���";break;
case 14:echo "����/Ͷ��/֤ȯ";break;
case 15:echo "����/���";break;
case 16:echo "�˲��н�";break;
case 17:echo "��ѯ/רҵ����";break;
case 18:echo "�г�/���/����";break;
case 19:echo "�㲥/Ӱ��";break;
case 20:echo "��ý/���ų���";break;
case 21:echo "����ҵ";break;
case 22:echo "����/���ز�";break;
case 23:echo "��ҵ����";break;
case 24:echo "����/�˶�/����";break;
case 25:echo "����/����";break;
case 26:echo "ҽ��/����/��������";break;
case 27:echo "����/�Ƶ�/��������";break;
case 28:echo "ó��";break;
case 29:echo "����/����/���";break;
case 30:echo "����/�Ļ�";break;
case 31:echo "�н�/����ҵ";break;
case 32:echo "��е/����/�ع�ҵ";break;
case 33:echo "ʳƷ/����/�̾�";break;
case 34:echo "�칫/�Ľ�/����";break;
case 35:echo "ũ��������";break;
case 36:echo "���/������Ʒҵ";break;
case 37:echo "����";break;
case 38:echo "����/����/��ϸ����";break;
case 39:echo "��֯/��װ/����";break;
case 40:echo "����/��е����";break;
case 41:echo "�Ҿ�/�������/װ��";break;
case 42:echo "����/�մ�";break;
case 43:echo "�ҵ�ҵ";break;
case 44:echo "����Ʒ/���";break;
case 45:echo "ֽƷ/ӡˢ/��װ";break;
case 46:echo "����/����/��Դ";break;
case 47:echo "���/ұ��";break;
case 48:echo "����/�����о�������";break;
case 49:echo "��������";break;
case 50:echo "��ѵ����/����/����Ժ��";break;
case 51:echo "����/������ҵ";break;
case 52:echo "��ӯ������(Э��/����)";break;
case 53:echo "����";break;
}?></div>
			<div class="userdata_extMl">ѧУ��ϵ��</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d7']));?></div>
			<div class="userdata_extMl">��Ϥ����</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d8']));?></div>
			<div class="userdata_extMl">ר����Ȥ��</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d9']));?></div>
			<div class="userdata_extMl">����������</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d10']));?></div>
			<div class="userdata_extMl">����������</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d11']));?></div>
			<div class="clear"></div>
		</div>	
<?php }}?>
		<!-- ��չ���Ͻ��� -->	
	</div>
	<div class="clear"></div>
</div>
<?php require_once YZLOVE.'home/foot.php'?>