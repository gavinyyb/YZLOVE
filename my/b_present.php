<?php require_once '../sub/init.php';
if ((!ereg("^[0-9]{1,8}$",$uid) && !empty($uid)) && $submitok!='addupdate'){
callmsg("����ȷ������(��)��ID�ţ�","-1");
exit;
}
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT loveb FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_loveb=$row[0];}else{header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok == 'addupdate'){
	if (!ereg("^[0-9]{1,9}$",$userid2) || empty($userid2))callmsg("����ȷ������(��)��ID�ţ�","-1");
	if (!ereg("^[0-9]{1,9}$",$kid) || empty($kid))callmsg("Forbidden","-1");
	if (!ereg("^[0-9]{1,9}$",$price))callmsg("Forbidden","-1");
	if (strlen($content)>200 || strlen($content)<2)callmsg("��������Ϣ�����ݹ������٣��������2~200�ֽ�����","-1");
	$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE flag=1 AND id=".$userid2." LIMIT 1");
	if(!$db->num_rows($rt)){callmsg("���������ID�Ŵ�������!","-1");exit;}
	$price = abs($price);
	if ($data_loveb < $price) {
	callmsg("����Love�Ҳ��㣡����ʧ�ܡ�","k_getloveb.php");
	exit;}
	$addtime  = strtotime("now");
	$addtime2=date("Y-m-d H:i:s");
	$db->query("INSERT INTO ".__TBL_PRESENT_USER__."  (kid,userid,senduserid,content,addtime) VALUES ($kid,$userid2,$cook_userid,'$content',$addtime)");
	$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb-$price WHERE id=".$cook_userid);
	$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ($cook_userid,'$cook_username','��������',-$price,'$addtime2')");
	callmsg("���﷢�ͳɹ�!","b_present.php?submitok=list2");
} elseif  ($submitok=="delupdate") {
	$tmeplist = $list;
	if (empty($tmeplist))callmsg("��ѡ����Ҫɾ������Ϣ��","-1");
	if (!is_array($tmeplist))callmsg("Forbidden!","-1");
	if (count($tmeplist) >= 1){foreach ($tmeplist as $value) {$db->query("DELETE FROM ".__TBL_PRESENT_USER__." WHERE id=".$value);}}
	callmsg("�����ɹ�!","b_present.php?submitok=list");
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a{width:104px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:104px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a{width:104px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
</style>
</head>
<body>
<ul>
<li <?php if ($submitok == "list")echo "class='liselect'"; ?>><a href="b_present.php?submitok=list">���յ�������</a></li>
<li <?php if ($submitok == "list2")echo "class='liselect'"; ?>><a href="b_present.php?submitok=list2">���ͳ�ȥ������</a></li>
<li <?php if ($submitok == "add")echo "class='liselect'"; ?>><a href="b_present.php?submitok=add">��������</a></li>
</ul>
<div class="main2">
<div class="main2_frame">
<?php if ($submitok=="add") { ?>
<br />
<table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="left" valign="bottom" bgcolor="#F4FAF0" style="font-size:14px;font-weight:bold;color:#6F9F00"><img src="images/lw.png" hspace="5" align="absmiddle" />ѡ��һ������:</td>
  </tr>
  <tr>
<td height="25" align="center" valign="middle" bgcolor="#F4FAF0" style="color:#ccc">
<a href="b_present.php?submitok=add&uid=<?php echo $uid; ?>" class=<?php echo (empty($kind))?'a6F9F00':'u666';?>>ȫ��</a>��|��
<a href="b_present.php?submitok=add&kind=1&uid=<?php echo $uid; ?>" class=<?php echo ($kind == 1)?'a6F9F00':'u666';?>>ף��</a>��|��
<a href="b_present.php?submitok=add&kind=2&uid=<?php echo $uid; ?>" class=<?php echo ($kind == 2)?'a6F9F00':'u666';?>>����</a>��|��
<a href="b_present.php?submitok=add&kind=3&uid=<?php echo $uid; ?>" class=<?php echo ($kind == 3)?'a6F9F00':'u666';?>>����</a>��|��
<a href="b_present.php?submitok=add&kind=4&uid=<?php echo $uid; ?>" class=<?php echo ($kind == 4)?'a6F9F00':'u666';?>>����</a>��|��
<a href="b_present.php?submitok=add&kind=5&uid=<?php echo $uid; ?>" class=<?php echo ($kind == 5)?'a6F9F00':'u666';?>>����</a>��|��
<a href="b_present.php?submitok=add&kind=6&uid=<?php echo $uid; ?>" class=<?php echo ($kind == 6)?'a6F9F00':'u666';?>>����</a>��|��
<a href="b_present.php?submitok=add&kind=7&uid=<?php echo $uid; ?>" class=<?php echo ($kind == 7)?'a6F9F00':'u666';?>>����</a>��|��
<a href="b_present.php?submitok=add&kind=8&uid=<?php echo $uid; ?>" class=<?php echo ($kind == 8)?'a6F9F00':'u666';?>>���</a>��|��
<a href="b_present.php?submitok=add&kind=9&uid=<?php echo $uid; ?>" class=<?php echo ($kind == 9)?'a6F9F00':'u666';?>>���¼�</a></td>
</tr>
</table>
<?php 
$tmpsql=!ereg("^[0-9]{1,3}$",$kind)?'':" WHERE kind=$kind ";
$rt=$db->query("SELECT * FROM ".__TBL_PRESENT__." $tmpsql ORDER BY px DESC,id DESC");
$total = $db->num_rows($rt);
if ($total <= 0 ) {
	echo "<br><br><table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#efefef><tr><td align=center bgcolor=#f8f8f8><font color=#666666>..��������..</font></td></tr></table><br><br>";

} else {    
	$pagesize=16;
	if ($p<1)$p=1;
	require_once YZLOVE.'sub/class.php';
	$mypage=new uobarpage($total,$pagesize);
	$pagelist = $mypage->pagebar(1);
	$pagelistinfo = $mypage->limit2();
	mysql_data_seek($rt,($p-1)*$pagesize);
?>
<form action="b_present.php" method="post" name="yzloveform" onSubmit="return chkform()">
<script language="javascript">
function chkform(){
if(document.yzloveform.tmpkid.value==""){
alert('����ѡ��һ�����');
return false;}
if(document.yzloveform.userid2.value==""){
alert('����������˵�ID�ţ�');
document.yzloveform.userid2.focus();
return false;}
if(document.yzloveform.content.value.length<2 || document.yzloveform.content.value.length>200){
alert('������Ϣ�����������20-10000��ĸ��2-200�ֽ�֮�� ');
document.yzloveform.content.focus();
return false;
}}
function lwshow(str1,str2,str3,str4){
var str1,str2,str3,str4;
document.getElementById('lwshow' ).innerHTML='<img src='+str1+'>';
document.getElementById('tmpkid' ).value=str3;
document.getElementById('price' ).value=str4;
document.getElementById('lwprice' ).innerHTML='<font color=#ff0000>'+str2+'</font> Love��';}
</script>
<table width="680" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#efefef 1px solid">
  <tr>
    <?php
	for($i=1;$i<=$pagesize;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	if ($rows['flag']==0){
		$bg="bgcolor=#ffffff";
	} else {
		$bg="bgcolor=#ffffff";
	}
?>
    <td width="752" align="center" valign="top" bgcolor="#FFFFFF" style="padding:10px 0 10px 0;"><table width="70" border="0" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td height="64" align="center" style="color:#999999">
<?php if (!empty($rows['picurl'])){?>
<img src=<?php echo $Global['up_2domain']."/present/".$rows['picurl']; ?> width="64" height="64" border="0">
<?php }else{echo '��ͼ';}?></td>
      </tr>
      <tr>
        <td align="center"  style="color:#ff0000;font-family:Verdana;font-size:10px" title="<?php echo  $rows['price']; ?> Love��"><img src="images/lovebxx.gif"><?php echo  $rows['price']; ?></td>
      </tr><tr>
        <td align="center" valign="bottom" style="color:#999999" onclick="lwshow('<?php echo $Global['up_2domain']."/present/".$rows['picurl']; ?>',<?php echo  $rows['price']; ?>,<?php echo  $rows['id']; ?>,<?php echo  $rows['price']; ?>)"><input type=radio name=kid value="<?php echo $rows['id']; ?>" id="chk<?php echo $rows['id']; ?>" style="border:0px"><label for="chk<?php echo $rows['id']; ?>">ѡ��</label></td>
        </tr>
    </table></td>
    <?php if ($i % 8 == 0) {?>
  </tr>
  <tr>
    <?php } ?>
    <?php 	} ?>
  </tr>
</table>
<table width="680" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="35" align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    </tr>
</table>
<?php } ?>








<table width="680" height="204" border="0" cellpadding="5" cellspacing="0" bgcolor="efefef" style="border:#efefef 1px solid">
          <tr>
            <td width="126" height="30" align="right" bgcolor="#f8f8f8"><b>���������ID��:</b></td>
            <td width="81" bgcolor="#FFFFFF"><input name="userid2" type="text" class="input" id="userid2" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $uid; ?>" size="8" maxlength="8" ></td>
            <td width="443" bgcolor="#FFFFFF" style="color:#999;font-family:Verdana">�� ����ߵĿ�������Ta��ID�ţ������û���Ҳ�����ǳ�Ӵ��<br>
              �� ���磺Ta�ĸ�����ҳ��ַΪ   <?php echo $Global['home_2domain']; ?>/<font color=blue>1688</font>  <br>              ��ô����˵�ID�ž��������ַ�������Ǹ�����  <font color=blue>1688</font>  ��</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#f8f8f8"><b>������Ϣ:</b></td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF">��Ϣ��������200������<font color="#666666"><br />
              <textarea name="content" cols="60" rows="5" id="content" style="font-size:9pt;"></textarea>
            </font></td>
          </tr>
          <tr>
            <td height="6" align="right" bgcolor="#f8f8f8"><b>��ǰѡ��:</b></td>
            <td height="6" colspan="2" align="left" bgcolor="#FFFFFF"><span id="lwshow">δѡ��</span></td>
          </tr>
          <tr>
            <td height="7" align="right" bgcolor="#f8f8f8"><b>�ۡ�����:</b></td>
            <td height="7" colspan="2" align="left" bgcolor="#FFFFFF" style="font-family:Verdana"><span id="lwprice">δѡ��</span></td>
          </tr>
          <tr>
            <td height="14" align="center" bgcolor="#f8f8f8"><input name="submitok" type="hidden" value="addupdate" /><input name="tmpkid" id="tmpkid" type="hidden" value="" /><input name="price" id="price" type="hidden" value="" /></td>
            <td height="14" colspan="2" align="left" bgcolor="#FFFFFF"><input type="submit" name="Submit" value=" ���� " class="button" /></td>
          </tr>
    </table>
</form><br><br><br>
<?php } elseif ($submitok=="list") {
function badcontact ($str,$to='*') {
	$contactlist  = "����,����ˬ,һҹ��,";
	$contactlist .= "sina.com,163.com,yahoo.com,qq.com,taobao.com,xici.net,";
	$contactlist .= "����:,����,QQȺ,qqȺ,�ѣ�Ⱥ,QQ��,qq��,�ѣѺ�,���,����,�ҵ�Q,q��,Q:,Q��,q:,Q��,q��,oicq,��qq��,��QQ��,QQ,qq,�ѣ�,Q,��Q,Q��,Qq,qQ,";
	$contactlist .= "�ҵĵ绰,�ҵ��ֻ�,�绰,�ֻ�,��,��,��,��,��,��,��,��,��,��,";
	$contactlist .= "00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99";
	$from = $str;
	$rg_banname=$contactlist;
	$rg_banname=explode(',',$rg_banname);
	foreach($rg_banname as $value){
		if(strpos($str,$value)!==false){
			$from = str_replace($value,$to,$from);
		}
	}
	return($from);
}
	$rt=$db->query("SELECT a.id,a.kid,a.senduserid,a.content,a.new,a.addtime,b.picurl,c.nickname,c.sex,c.grade FROM ".__TBL_PRESENT_USER__." a , ".__TBL_PRESENT__." b , ".__TBL_MAIN__." c WHERE a.userid='$cook_userid' AND a.kid=b.id AND a.senduserid=c.id ORDER BY a.new DESC,a.id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
		echo "<table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#efefef style='margin:50px 0 50px 0'><tr><td align=center bgcolor=#f8f8f8><br><font color=#999999>..��ʱ��û������������..</font><br><br></td></tr></table>";
	} else {
		$pagesize=15;
		require_once YZLOVE.'sub/class.php';
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="680" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF" style="margin:20px 0 0 0">
<form name=MYFORM method=post action=b_present.php>
<script LANGUAGE="JavaScript">
var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
return "��ȡ��"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
return "��ȫѡ"; }
}
</script>
        <tr>
          <td width="54" height="30" align="left" style="border-bottom:#efefef 1px solid"><input name="button" type="button" class="buttonx" onclick="this.value=check(this.form)" value="��ȫѡ" /></td>
          <td width="64" align="center" style="border-bottom:#efefef 1px solid">����</td>
          <td width="150" align="center" style="border-bottom:#efefef 1px solid">�� �� ��</td>
          <td width="92" align="center" style="border-bottom:#efefef 1px solid">����ʱ��</td>
          <td width="221" align="center" style="border-bottom:#efefef 1px solid">������Ϣ</td>
          <td width="75" align="right" style="border-bottom:#efefef 1px solid"><input type=hidden name=submitok value=delupdate /><input type="submit" class="buttonx" value="��ɾ��"  onclick="return confirm('ȷ��ɾ����')" /></td>
        </tr>
<?php
for($i=0;$i<$pagesize;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	if ($i % 2 == 0){
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
	} else {
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
	}
	if ($rows['new'] == 1)$db->query("UPDATE ".__TBL_PRESENT_USER__." SET new=0 WHERE id=".$rows['id']);
?>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'">
          <td height="35" align="left"><input type="checkbox" name="list[]" value="<?php echo $rows['id']; ?>"></td>
          <td height="35" align="left"><?php if (!empty($rows['picurl'])){?>
            <img src=<?php echo $Global['up_2domain']."/present/".$rows['picurl']; ?> width="64" height="64" border="0" />
            <?php }else{echo '��ͼ';}?></td>
          <td height="35" align="center"><?php geticon($rows['sex'].$rows['grade']);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $rows['senduserid']; ?>"  target=_blank><?php if ( $rows['sex'] == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo badstr($rows['nickname']);?></font></a></td>
          <td align="center" style="font-family:Verdana;color:#999999;font-size:11px"><?php echo date_format2($rows['addtime'],'%Y-%m-%d %H:%M');?></td>
          <td align="left" style="font-family:Verdana;line-height:150%"><?php echo badcontact(stripslashes($rows['content'])); ?> <?php if ($rows['new'] == 1)echo "<img src=images/new2.gif  title='������' align=absmiddle>";?></td>
          <td align="right"><a href="b_present.php?submitok=add&uid=<?php echo $rows['senduserid']; ?>"><img src="images/hzlw.gif" width="75" height="20" border="0" title="����һ�������Ta" /></a></td>
        </tr>
        <?php }?>
</form>    </table>
      <table width="680" height="92" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="34" align="right" valign="middle" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        </tr>
    </table>
<?php }} elseif ($submitok=="list2"){
	$rt=$db->query("SELECT a.kid,a.userid,a.new,a.addtime,b.picurl,c.nickname,c.sex,c.grade FROM ".__TBL_PRESENT_USER__." a , ".__TBL_PRESENT__." b , ".__TBL_MAIN__." c WHERE a.senduserid='$cook_userid' AND a.kid=b.id AND a.userid=c.id ORDER BY a.id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
		echo "<table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd style='margin:50px 0 50px 0'><tr><td align=center bgcolor=efefef><font color=#999999>..������Ϣ..</font><br><br></td></tr></table>";
	} else {
		$pagesize=10;
		require_once YZLOVE.'sub/class.php';
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="680" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" style="margin:20px 0 0 0">

        <tr>
          <td width="123" height="22" align="left" style="border-bottom:#ddd 1px solid"> ������</td>
          <td width="178" align="center" style="border-bottom:#ddd 1px solid">�� �� ��</td>
          <td width="215" align="center" style="border-bottom:#ddd 1px solid">����ʱ��</td>
          <td width="124" align="center" style="border-bottom:#ddd 1px solid">�Է��Ƿ񿴹�</td>
        </tr>
        <?php
		for($i=0;$i<$pagesize;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			if ($i % 2 == 0){
				$bg="bgcolor=#ffffff";
				$overbg="#FBF9F9";
				$outbg="#ffffff";
			} else {
				$bg="bgcolor=#ffffff";
				$overbg="#FBF9F9";
				$outbg="#ffffff";
			}
?>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'">
          <td height="35" align="left" style="border-bottom:#E9E8E8 1px solid"><?php if (!empty($rows['picurl'])){?>
<img src=<?php echo $Global['up_2domain']."/present/".$rows['picurl']; ?> width="64" height="64" border="0">
<?php }else{echo '��ͼ';}?></td>
          <td height="35" align="center" style="border-bottom:#E9E8E8 1px solid;"><?php geticon($rows['sex'].$rows['grade']);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $rows['userid']; ?>"  target=_blank><?php if ( $rows['sex'] == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo badstr($rows['nickname']);?></font></a></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;font-family:Verdana;color:#999999;font-size:11px"><font color="#999999"><?php echo date_format2($rows['addtime'],'%Y-%m-%d %H:%M');?></font></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><?php if ($rows['new'] == 1){echo "<font color=#ff0000>��δ�鿴</font>";}else{echo "<font color=#009900>�ѿ���</font>";}?></td>
        </tr>
        <?php }?>
    </table>
      <table width="680" height="90" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="34" align="right" valign="middle" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        </tr>
    </table>
<?php }}?>
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>