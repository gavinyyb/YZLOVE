<?php !function_exists('cdstr') && exit('Forbidden');$tmpnav = 'nav'.$navvar;$$tmpnav = $lst;
?>
<div class=top_fav><a onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $Global['www_2domain']; ?>');" href="javascript:">��Ϊ��ҳ</a> - <a href="<?php echo $Global['www_2domain']; ?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='<?php echo $Global['m_sitename']; ?>' rel="sidebar">�ղ�</a><?php if (empty($cook_userid)){?> - <a href="<?php echo $Global['www_2domain']; ?>/login.php">��¼</a><?php }?> - <a href="<?php echo $Global['www_2domain']; ?>/reg.php">ע��</a> - <a href="<?php echo $Global['www_2domain']; ?>/help">����</a></div>
<div class=top_nav>
<div class=top_nav_left><a href="<?php echo $Global['www_2domain']; ?>"><img src="<?php echo $Global['www_2domain']; ?>/images/logo.gif"></a></div>
<div class=top_nav_right>
<ul>
<li<?php echo $nav1; ?>><a href="<?php echo $Global['www_2domain']; ?>">��ҳ</a></li>
<li<?php echo $nav2; ?>><a href="<?php echo $Global['www_2domain']; ?>/user">����</a></li>
<li<?php echo $nav3; ?>><a href="<?php echo $Global['group_2domain']; ?>">Ȧ��</a></li>
<li<?php echo $nav4; ?>><a href="<?php echo $Global['www_2domain']; ?>/clinic">����</a></li>
<li<?php echo $nav5; ?>><a href="<?php echo $Global['www_2domain']; ?>/party">�</a></li>
<li<?php echo $nav6; ?>><a href="<?php echo $Global['www_2domain']; ?>/dating">Լ��</a></li>
<li<?php echo $nav7; ?>><a href="<?php echo $Global['www_2domain']; ?>/user/online.php">����</a></li>
<li<?php echo $nav8; ?>><a href="<?php echo $Global['www_2domain']; ?>/video">��Ƶ</a></li>
<li<?php echo $nav9; ?>><a href="<?php echo $Global['www_2domain']; ?>/diary">����</a></li>
<li<?php echo $nav10; ?>><a href="<?php echo $Global['www_2domain']; ?>/photo">���</a></li>
<li<?php echo $nav11; ?>><a href="<?php echo $Global['www_2domain']; ?>/user/search.php">����</a></li>
<li<?php echo $nav12; ?>><a href="<?php echo $Global['www_2domain']; ?>/story">����</a></li>
</ul>
</div>
</div>
