<?php
/**************************************************
Copyright (C) 2008 ���� �ݽ��� ��  ������ 2.0
��  ��: supdes��
**************************************************/
require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,8}$",$uid) || empty($uid))callmsg("������󣬸��û������ڻ��ѱ��������ѱ�ɾ����","-1");
$rtchat = $db->query("SELECT id FROM ".__TBL_CHATIF__." WHERE (userid=".$uid." AND senduserid=".$cook_userid.") AND ifagree=1");
if ($db->num_rows($rtchat)) {
	$rowchat = $db->fetch_array($rtchat);
	$classid = $rowchat[0];
	$db->query("DELETE FROM ".__TBL_CHATIF__." WHERE id=".$classid);
}else{
	callmsg("û���ҵ��Ϸ���������","0");
}
$rt = $db->query("SELECT username,nickname,grade,sex,photo_s FROM ".__TBL_MAIN__." WHERE id=".$uid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$username    = $row['username'];
$nickname    = $row['nickname'];
$grade       = $row['grade'];
$sex         = $row['sex'];
$photo_s     = $row['photo_s'];
$uarray      = $uid.'|'.$nickname.'|'.$sex;
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸��û������ڻ��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
exit;}
$title = $cook_nickname." ������ ".$nickname."������...";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<bgsound src=images/security.wav loop=1>
<title><?php echo $title; ?></title>
<style type="text/css"> 
body{
background-color:#fff;font-family:Verdana;font-size:12px;text-align:center;padding:0;margin:0px auto;color:#000
SCROLLBAR-FACE-COLOR: #C4DFB7;/*����ɫ*/
SCROLLBAR-TRACK-COLOR: #f0f0f0;/*��������*/
SCROLLBAR-HIGHLIGHT-COLOR: #9FC989;/*�������Ͽ�ɫ*/
SCROLLBAR-SHADOW-COLOR: #9FC989;/*�������¿�ɫ*/
SCROLLBAR-ARROW-COLOR: #ffffff;/*С����*/
SCROLLBAR-3DLIGHT-COLOR: #ffffff;/*��Ӱ(����)*/
SCROLLBAR-DARKSHADOW-COLOR: #ffffff;/*��Ӱ(����)*/
}
img,form{border:0;padding:0;margin:0}
a:link,a:visited,a:active {text-decoration:underline;color:#000}
a:hover {text-decoration:underline;color: #FF5f07} 
TD{ FONT-SIZE: 9pt}
select,form{margin:0px;font-size:12px}
textarea{border:#ddd 0px solid;width:364px;height:90px;overflow-y:auto}
.send{width:75px;height:56px}
.send a:link,.send a:active,.send a:visited{width:75px;height:56px;display:block;background-image:url(images/send.gif)}
.send a:hover{width:75px;height:56px;display:block;background-image:url(images/send2.gif)}
#mess_box{line-height:150%;color:#808080}

.home {width:100%;height:29px;margin:0px auto;background:#fff;text-align:left;line-height:29px;color:#666;background-image:url("images/top_bg.gif");margin-bottom:30px}
.home .homeleft{float:left;width:450px;padding:0 0 0 10px;font-family:����,Arial;}
.home .homeleft a:link,.homeleft a:active,.homeleft a:visited{text-decoration:none;color:#666;}
.home .homeleft a:hover{color:#DF2C91;text-decoration:underline}
.home .homeright{float:right;width:350px;padding:0 10px 0 0;text-align:right;overflow:hidden;height:29px;}
.home .homeright a:link,.homeright a:active,.homeright a:visited{text-decoration:underline;color:#666;}
.home .homeright a:hover{color:#DF2C91;text-decoration:underline}
</style>
</head>
<script language="javascript" src="www_zeai_cn_ver2_0_chat.js"></script>
<body onload=getmess("<?php echo $uarray; ?>") onmouseover="self.status='<?php echo $title; ?>';return true">
<div class="home">
	<div class="homeleft">��<a href="<?php echo $Global['www_2domain'] ?>" target="_parent">������ҳ</a>����<a href="<?php echo $Global['www_2domain'] ?>/user" target="_parent">����</a>��<a href="<?php echo $Global['www_2domain'] ?>/dating" target="_parent">Լ��</a>��<a href="<?php echo $Global['www_2domain'] ?>/party" target="_parent">�</a>��<a href="<?php echo $Global['www_2domain'] ?>/clinic" target="_parent">����</a>��<a href="<?php echo $Global['www_2domain'] ?>/video" target="_parent">��Ƶ</a>��<a href="<?php echo $Global['www_2domain'] ?>/diary" target="_parent">����</a>��<a href="<?php echo $Global['group_2domain'] ?>" target="_parent">Ȧ��</a>��<a href="<?php echo $Global['www_2domain'] ?>/user/online.php" target="_parent">����</a></div>
	<div class="homeright"><?php if (empty($cook_userid)) {?>
������ã���ӭ����<?php echo $Global['m_sitename'] ?>�� <a href="<?php echo $Global['www_2domain']; ?>/reg.php" target="_parent">ע��</a> <a href="<?php echo $Global['www_2domain']; ?>/login.php">��¼</a>
<?php } else {  ?>
<font color="#666666" style="font-family:Arial,����;">��<?php echo $cook_nickname;?>�����<i>��</i></font> <a href="<?php echo $Global['my_2domain']; ?>" target="_parent">���˹�������</a>
<?php }?></div>
</div>



<table width="600" height="30" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9fc989">
<tr>
<td align="left" background="images/header_bg.gif" style="border-left:#ffffff 1px solid;border-right:#ffffff 1px solid;border-bottom:#ffffff 1px solid;padding-left:5px">������<?php geticon($sex.$grade); ?><a href="<?php echo $Global['home_2domain'].'/'.$uid; ?>" target=_blank><b><?php echo $nickname; ?></b></a> (<?php echo $username; ?>)������...</td>
</tr>
</table>
<table width="600" height="470" border="0" align="center" cellpadding="0" cellspacing="0" background="images/main_bg.gif" style="border-left:#9fc989 1px solid;border-right:#9fc989 1px solid;border-bottom:#9fc989 1px solid;">
<tr>
<td align="right" valign="top" style="border-left:#ffffff 1px solid;border-bottom:#ffffff 1px solid"><table width="460" height="304" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="margin-top:8px;border:#b7d7a7 1px solid">
<tr>
<td width="530"><div id="mess_box" align="left" style="width:98%; height:290px; overflow:auto;TABLE-LAYOUT: fixed; WORD-BREAK: break-all;"></div></td>
</tr>
</table>
<table width="460" height="141" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:#b7d7a7 1px solid;margin-top:8px">
<tr>
<td width="370" height="30" align="left" background="images/22.gif" bgcolor="#f8f8f8" style="padding-left:5px;border-bottom:#B7D7A7 1px solid">
  <select name="mfont" id="mfont" class="fcolor" title="���壬б��">
    <option value="0" selected="selected">һ��</option>
    <option value="1">����</option>
    <option value="2">б��</option>
  </select>
  <select name="mfcolor" id="mfcolor" size="1" class="fcolor" style="width:60px;" title="������ɫ">
    <option value="#000000" style="background-color:#000000" selected="selected"></option>
    <option value="#0000FF" style="background-color:#0000FF"></option>
    <option value="#00FF00" style="background-color:#00FF00"></option>
    <option value="#FF0000" style="background-color:#FF0000"></option>
    <option value="#FF00FF" style="background-color:#FF00FF"></option>
    <option value="#9900FF" style="background-color:#9900FF"></option>
    <option value="#FFFF00" style="background-color:#FFFF00"></option>
    <option value="#330000" style="background-color:#330000"></option>
    <option value="#6600FF" style="background-color:#6600FF"></option>
    <option value="#663333" style="background-color:#663333"></option>
    <option value="#CCCCCC" style="background-color:#CCCCCC"></option>
  </select>
  <select name="elist" id="elist" class="fcolor" title="����">
    <option value="" selected="selected">���ñ���</option>
    <option value="14.gif">΢Ц</option>
    <option value="1.gif">Ʋ��</option>
    <option value="2.gif">ɫ</option>
    <option value="3.gif">����</option>
    <option value="4.gif">����</option>
    <option value="5.gif">����</option>
    <option value="6.gif">����</option>
    <option value="7.gif">����</option>
    <option value="8.gif">˯</option>
    <option value="9.gif">���</option>
    <option value="10.gif">����</option>
    <option value="11.gif">��ŭ</option>
    <option value="12.gif">��Ƥ</option>
    <option value="13.gif">����</option>
    <option value="0.gif">����</option>
    <option value="15.gif">�ѹ�</option>
    <option value="16.gif">��</option>
    <option value="17.gif">�ǵ�</option>
    <option value="18.gif">ץ��</option>
    <option value="19.gif">��</option>
    <option value="20.gif">͵Ц</option>
    <option value="21.gif">�ɰ�</option>
    <option value="22.gif">����</option>
    <option value="23.gif">����</option>
    <option value="24.gif">����</option>
    <option value="25.gif">��</option>
    <option value="26.gif">����</option>
    <option value="27.gif">����</option>
    <option value="28.gif">��Ц</option>
    <option value="29.gif">���</option>
    <option value="30.gif">�ܶ�</option>
    <option value="31.gif">����</option>
    <option value="32.gif">����</option>
    <option value="33.gif">��..</option>
    <option value="34.gif">��</option>
    <option value="35.gif">��ĥ</option>
    <option value="36.gif">˥</option>
    <option value="37.gif">����</option>
    <option value="38.gif">�ô�</option>
    <option value="39.gif">�ټ�</option>
    <option value="40.gif">����</option>
    <option value="41.gif">����</option>
    <option value="42.gif">����</option>
    <option value="43.gif">��</option>
    <option value="44.gif">��</option>
    <option value="45.gif">��ü</option>
    <option value="46.gif">��ͷ</option>
    <option value="47.gif">è��</option>
    <option value="48.gif">С��</option>
    <option value="49.gif">Ǯ</option>
    <option value="50.gif">����</option>
    <option value="51.gif">�Ʊ�</option>
    <option value="52.gif">����</option>
  </select></td>
<td width="88" align="center" background="images/22.gif" bgcolor="#f8f8f8" style="border-bottom:#B7D7A7 1px solid">
<?php if ($cook_grade == 1){?>
<a href="####"  onClick="alert('ֻ�и߼���Ա�ſ��Ա��������¼!')">���������¼</a>
<?php } else {?>
<a href="javascript:yzlove(0)" onclick="savechat()" target="_blank">���������¼</a>
<?php }?></td>
</tr>
<tr>
<td align="center" valign="top" style="padding-left:5px;padding-top:5px"><textarea name="mess" cols="80" rows="15" id="mess" onkeydown="if(event.keyCode==13 ) SendMess();" style="border:#efefef 0px solid"></textarea><input type=hidden id="uarray" value='<?php echo $uarray; ?>'></td>
<td align="center"><div class="send" onclick="SendMess()"><a href=#></a></div></td>
</tr>
</table>
</td>
<td width="130" align="center" valign="top" style="border-bottom:#ffffff 1px solid;border-right:#ffffff 1px solid"><table width="116" height="20" border="0" cellpadding="0" cellspacing="0" style="margin-top:8px;border-left:#b7d7a7 1px solid;border-top:#b7d7a7 1px solid;border-right:#b7d7a7 1px solid;">
<tr>
<td align="center" valign="bottom" background="images/userbg.gif" bgcolor="#FF9900" style="border-left:#fff 1px solid;border-right:#fff 1px solid;padding-bottom:1px"><font color="#3E6A00">�Է�����</font></td>
</tr>
</table>
<table width="116" height="140" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#b7d7a7 1px solid;border-right:#b7d7a7 1px solid;border-bottom:#b7d7a7 1px solid">
<tr>
<td width="530" align="center"><a href="<?php echo $Global['home_2domain'].'/'.$uid; ?>" target=_blank><?php if (empty($photo_s)){?><img src=<?php echo $Global['www_2domain'];?>/images/nopic<?php echo $sex; ?>.gif border=0 title="������Ƭ"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?> border=0 title="<?php echo $nickname.'����Ƭ'; ?>"><?php }?></a></td>
</tr>
</table>
<table width="77" height="133" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<table width="116" height="20" border="0" cellpadding="0" cellspacing="0" style="border-left:#b7d7a7 1px solid;border-top:#b7d7a7 1px solid;border-right:#b7d7a7 1px solid;">
<tr>
<td align="center" valign="bottom" background="images/userbg.gif" bgcolor="#FF9900" style="border-left:#fff 1px solid;border-right:#fff 1px solid;padding-bottom:1px"><font color="#3E6A00">�ҵ�����</font></td>
</tr>
</table>
<table width="116" height="140" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#b7d7a7 1px solid;border-right:#b7d7a7 1px solid;border-bottom:#b7d7a7 1px solid">
<tr>
<td width="530" align="center"><?php if (empty($cook_photo_s)){?><img src=<?php echo $Global['www_2domain'];?>/images/nopic<?php echo $cook_sex; ?>.gif border=0 title="������Ƭ"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $cook_photo_s; ?> border=0 title="<?php echo $cook_nickname.'����Ƭ'; ?>"><?php }?></td>
</tr>
</table></td>
</tr>
</table>
<table width="449" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center"><font color="#999999">&copy;��Ȩ����<?php echo date("Y"); ?>��<?php echo $Global['m_sitename']; ?> (<a href="<?php echo $Global['www_2domain']; ?>" target="_blank"><font color="#999999"><?php echo $Global['m_siteurl']; ?></font></a>) </font></td>
</tr>
</table>
</body>
</html>
<?php ob_end_flush();?>
