<?php !function_exists('cdstr') && exit('Forbidden');$tmpnav = 'nav'.$navvar;$$tmpnav = $lst;?>
<div class=top_fav>
<a onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $Global['www_2domain']; ?>');" href="javascript:">��Ϊ��ҳ</a>
 - <a href="<?php echo $Global['www_2domain']; ?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='<?php echo $Global['m_sitename']; ?>' rel="sidebar">�ղ�</a>
<?php if (empty($cook_userid)){?> 
- <a href="<?php echo $Global['www_2domain']; ?>/login.php">��¼</a><?php }?> 
- <a href="<?php echo $Global['www_2domain']; ?>/reg.php">ע��</a> 
- <a href="<?php echo $Global['www_2domain']; ?>/help">����</a>
</div>

<table width="980" border="0" cellspacing="0" cellpadding="0" style="background:url(sun_images/reg_bj_04_c.png) repeat-x" height="21" class="jy_top" align="center">
  <tr>
    <td width="1%">&nbsp;</td>
    <td width="46%" style="color:#595757">������ף�������ѳɹ���</td>
    <td width="53%" align="center" style="color:#595757;text-align:right; padding-right:19px;"><a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.jiayinzh.com');" href="#">��Ϊ��ҳ</a> / <a href="javascript:void(0);" onClick="window.external.AddFavorite(document.location.href,document.title)">�ղ�</a> / <a href="/login.php">��¼</a> / <a href="/reg.php" target="_blank">ע��</a></td>
  </tr>
</table>

<table width="980" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td >
	<table width="980" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="181" height="70" valign="middle"><a href=".."><img src="sun_images/logo.gif" /></a></td>
		<td width="799" height="70" align="right" valign="middle" style="padding-top:2px;"><img src="sun_images/index_08.gif" /></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<table width="980" border="0" cellspacing="0" cellpadding="0" height="47">
			  <tr>
				<td width="6" ><img src="sun_images/index_16.jpg" width="6" height="34" /></td>
				<td style="background:url(sun_images/index_18.jpg) repeat-x center">
					<table width="968" border="0" cellspacing="0" cellpadding="0" >
					  <tr>
						<td width="92" align="center"  class="jy_menu "><a href="../" target="_parent" class="top_title" title="���콻����">������ҳ</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/my" class="top_title" title="���콻����_�ҵļ���">�ҵļ���</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/dating/index.php" class="top_title" title="���콻����_����1+1">����1+1</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/party" class="top_title" title="���콻����_���ѻ">���ѻ</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/user/online.php" class="top_title" title="��������">��������</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/diary/index.php" class="top_title" title="�������">��в���</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/my/yfjy.php">Ե�ֽ���</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="/game/index.php">ͶƱ�齱</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/group">��Ա���ֲ�</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/yule/" class="top_title" title="����������_��������">��������</a></td>
					  </tr>
				  </table>
				</td>
				<td width="6"><img src="sun_images/index_21.jpg" /></td>
			  </tr>
			</table>
		</td>
		</tr>
	</table>
</td>
</tr>
</table>


<!-- 
	����� ע�͵�ԭ���� -->

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
</div></div>
<div class="top_login">
<div class="left_right"><img src="<?php echo $Global['www_2domain']; ?>/images/nav_l.gif" /></div>
<div class="top_login_c" <?php if (!empty($cook_nickname))echo 'lineheight';?>	>
<?php if (!empty($cook_nickname)) {?>	
<a href="<?php echo $Global['home_2domain']; ?>/<?php echo $cook_userid;?>" target=_blank class="uff0">��<?php echo $cook_nickname; ?>��</a>(<?php echo $cook_username; ?>)��ã���������<a href="<?php echo $Global['my_2domain']; ?>" class="nav">��������</a>����<img src="<?php echo $Global['www_2domain']; ?>/images/top_login_cl.gif" align="absmiddle" />����<a href="<?php echo $Global['my_2domain']; ?>/?b_gbook.php?submitok=list" class="nav">�ռ���</a>����<img src="<?php echo $Global['www_2domain']; ?>/images/top_login_cl.gif" align="absmiddle" />����<a href="<?php echo $Global['my_2domain']; ?>/?a2.php" class="nav">�޸�����</a>����<img src="<?php echo $Global['www_2domain']; ?>/images/top_login_cl.gif" align="absmiddle" />����<a href="<?php echo $Global['my_2domain']; ?>/?c_photo_up.php" class="nav">�ϴ���Ƭ</a>����<img src="<?php echo $Global['www_2domain']; ?>/images/top_login_cl.gif" align="absmiddle" />����<a href="<?php echo $Global['my_2domain']; ?>/?k_vip.php" class="nav">��Ա����</a>����<img src="<?php echo $Global['www_2domain']; ?>/images/top_login_cl.gif" align="absmiddle" />����<a href="<?php echo $Global['www_2domain']; ?>/exit.php" class="nav">��ȫ�˳�</a>
<?php } else {?>
<script language="javascript">
function checkform(){
if(document.zeaiform.form_username.value==""){
alert('�������¼�û�����');
document.zeaiform.form_username.focus();return false;}
if(document.zeaiform.form_username.value.length>12 || document.zeaiform.form_username.value.length<2){
alert('�û���������3~12λ��ɡ�');
document.zeaiform.form_username.focus();return false;}
if(document.zeaiform.form_password.value==""){
alert('���������룡');
document.zeaiform.form_password.focus();return false;}}
</script>
<form action="<?php echo $Global['www_2domain']; ?>/login.php" method="post"  name="zeaiform" onsubmit="return checkform()">
<div class="top_login_c_rows">
<div class="top_login_c_rows1">�û�����</div>
<div class="top_login_c_rows2"><input name="form_username" type="text" class=top_login_input /></div>
<div class="top_login_c_rows3">���룺</div>
<div class="top_login_c_rows4"><input name="form_password" type="password" class=top_login_input /></div>
<div class="top_login_c_rows5"><input name="stealth" type="checkbox" value="1" id=savepass /></div>
<div class="top_login_c_rows6"><label for="savepass">�����¼</label></div>
<div class="top_login_c_rows7"><input type="image" src="<?php echo $Global['www_2domain']; ?>/images/login.gif"/></div>
<div class="top_login_c_rows8"><a href="<?php echo $Global['www_2domain']; ?>/reg.php"><img src="<?php echo $Global['www_2domain']; ?>/images/reg.gif" border="0" /></a></div>
<div class="top_login_c_rows9"><a href="<?php echo $Global['www_2domain']; ?>/forgetpass.php">�������룿</a></div>
</div>
<input type="hidden" name="submitok" value="checkuser" />
</form>
<?php }?>
</div>
<div class="left_right"><img src="<?php echo $Global['www_2domain']; ?>/images/nav_r.gif" /></div>
</div>


