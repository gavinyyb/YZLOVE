<?php 
$currfilename = basename($_SERVER['PHP_SELF']);
function tselect($str) {
	global $currfilename;
	$strarr = explode(',',$str);
	foreach($strarr as $value){
		if(strpos($currfilename,$value)!==false){
			$t = 'class=navSelectA';
			break;
			exit;
		}
	}
	echo $t;
}
?>
<div class="home">
	<div class="homeleft">��<a href="<?php echo $Global['www_2domain'] ?>">������ҳ</a>����<a href="<?php echo $Global['www_2domain']; ?>/user">����</a>��<a href="<?php echo $Global['www_2domain']; ?>/dating">Լ��</a>��<a href="<?php echo $Global['www_2domain']; ?>/party">�</a>��<a href="<?php echo $Global['www_2domain'] ?>/clinic">����</a>��<a href="<?php echo $Global['www_2domain'] ?>/video">��Ƶ</a>��<a href="<?php echo $Global['www_2domain'] ?>/diary">����</a>��<a href="<?php echo $Global['www_2domain']; ?>/user/online.php">����</a>��<a href="<?php echo $Global['group_2domain'] ?>">Ȧ��</a>��<a href="<?php echo $Global['www_2domain'] ?>/photo">���</a></div>
	<div class="homeright"><?php if (empty($cook_userid)) {?>
������ã���ӭ����<?php echo $Global['m_sitename'] ?>�� <a href="<?php echo $Global['www_2domain']; ?>/reg.php" target="_parent">ע��</a> <a href="<?php echo $Global['www_2domain']; ?>/login.php">��¼</a>
<?php } else {  ?>
<font color="#666666" style="font-family:Arial,����;">��<?php echo $cook_nickname;?>�����<i>��</i></font> <a href="<?php echo $Global['my_2domain']; ?>" target="_parent">���˹�������</a>
<?php }?></div>
</div>
<div class="top">
	<div class="topkbox1"><h4><?php echo $nickname;?> | (<?php echo $username;?>)�ĸ�����ҳ</h4>
	<h3><?php echo $Global['home_2domain'] ?>/<?php echo $uid ?></h3>
	</div>
	<div class="topkbox2"><h3><?php 
	
	if (!empty($mbtitle)) {
	echo htmlout($mbtitle);
	} else {
	echo '���������� / ��������ʣ���ӭ�����ҵ���ҳ!';
	}
	?></h3>
	</div>
</div>
<div class="nav">
	<ul>
	<li><a href="<?php echo $uid; ?>" <?php tselect('index.php,mycontact.php');?>>��ҳ</a></li>
	<li><a href="myarchive<?php echo $uid; ?>.html" <?php tselect('myarchive.php');?>>����</a></li>
	<li><a href="myvideo<?php echo $uid; ?>.html" <?php tselect('myvideo.php,v.php');?>>��Ƶ</a></li>
	<li><a href="myphoto<?php echo $uid; ?>.html" <?php tselect('myphoto.php,p.php');?>>���</a></li>
	<li><a href="mydiary<?php echo $uid; ?>.html" <?php tselect('mydiary.php,diary.php');?>>�ռ�</a></li>
	<li><a href="myask<?php echo $uid; ?>.html" <?php tselect('myask.php,ask.php');?>>����</a></li>
	<li><a href="mydating<?php echo $uid; ?>.html" <?php tselect('mydating.php,dating.php');?>>Լ��</a></li>
	<li><a href="myfriend<?php echo $uid; ?>.html" <?php tselect('myfriend.php');?>>����</a></li>
	<li><a href="mybbs<?php echo $uid; ?>.html" <?php tselect('mybbs.php');?>>Ȧ��</a></li>
	<li><a href="<?php echo $Global['my_2domain'];?>/?k_homepage.php">����</a></li>
	</ul>
</div>
<div class="navbg"></div>