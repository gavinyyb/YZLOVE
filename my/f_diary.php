<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="addupdate") {
	if ($Temp_diarynum >=1 )callmsg("һ��ֻ�ܷ�һƪ","-1");
	if (empty($title))callmsg("���ⲻ��Ϊ��","-1");
	if (empty($content))callmsg("���ݲ���Ϊ��","-1");
	if (strlen($title)>100)callmsg("����̫�����������100���ֽ�����","-1");
	if (strlen($content)>30000 || strlen($content)<20)callmsg("���ݹ������٣��������20~20000�ֽ�����","-1");
	if (!ereg("^[1-6]{1}$",$weather))callmsg("��ѡ����ȷ��ʽ�ġ�������","-1");
	if (!ereg("^[0-9]{1,2}$",$feel))callmsg("��ѡ����ȷ��ʽ�ġ����顱","-1");
	if (!ereg("^[0-1]{1}$",$diaryopen))callmsg("��ѡ����ȷ��ʽ�ġ���ƪ�ռ��Ƿ񹫿������ܡ�","-1");
	$addtime = date("Y-m-d H:i:s");
	if ($hour8 <0 || $hour8 >24 || $minute8<0 || $minute8>59)callmsg("$jzbmtime2��������ȷ��ʽ�����ڡ�ʱ���͡��֡��磺18:30","-1");
	$yhtime1 = $year8.'-'.$month8.'-'.$day8;
	$yhtime2 = ' '.$hour8.':'.$minute8.':00'; 
	if ( !preg_match('/(^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$)/', $yhtime1) )callmsg("��������ȷ�ĸ�ʽ������$yhtime1","-1");
	$stime = $yhtime1.$yhtime2;
	$flag = ($cook_grade > 1 )?1:0;
	setcookie("Temp_diarynum",$Temp_diarynum+1,null,"/",$Global['m_cookdomain']);  
	$db->query("INSERT INTO ".__TBL_DIARY__."  (userid,weather,feel,title,content,diaryopen,flag,stime,addtime) VALUES ('$cook_userid','$weather','$feel','$title','$content','$diaryopen',$flag,'$stime','$addtime')");
//
	if ($flag == 1 ){
		$tmpid = $db->insert_id();
		$rt = $db->query("SELECT a.userid,b.grade,b.if2 FROM ".__TBL_FRIEND__." a,".__TBL_MAIN__." b WHERE a.senduserid=".$cook_userid." AND a.userid=b.id AND a.ifagree=1 AND b.grade>=3");
		$total = $db->num_rows($rt);
		if ($total > 0 ) {
			for($i=0;$i<$total;$i++) {
				$rows = $db->fetch_array($rt);
				if(!$rows) break;
				$uid = $rows[0];
				$ugrade =  $rows[1];
				$uif2 =  $rows[2];
				if ( ($uif2 == 2 || $uif2 == 3 || $uif2 == 4) && $ugrade >= 3 ){
					$content = "������һƪ��Ϊ��".$title."�����ռǣ�<a href=".$Global['home_2domain']."/diary".$tmpid.".html target=_blank  class=uDF2C91>����鿴</a>";
					$addtime = strtotime("now");
					$db->query("INSERT INTO ".__TBL_FRIEND_NEWS__."  (userid,senduserid,content,addtime) VALUES ($uid,$cook_userid,'$content',$addtime)");
				}
			}
		}
	}
//
	header("Location: f_diary.php?submitok=list");
} elseif ($submitok=="modupdate") {
	if (empty($title))callmsg("���ⲻ��Ϊ��","-1");
	if (empty($content))callmsg("���ݲ���Ϊ��","-1");
	if (strlen($title)>100)callmsg("����̫�����������100���ֽ�����","-1");
	if (strlen($content)>30000 || strlen($content)<20)callmsg("���ݹ������٣��������20~20000�ֽ�����","-1");
	if (!ereg("^[1-6]{1}$",$weather))callmsg("��ѡ����ȷ��ʽ�ġ�������","-1");
	if (!ereg("^[0-9]{1,2}$",$feel))callmsg("��ѡ����ȷ��ʽ�ġ����顱","-1");
	if (!ereg("^[0-1]{1}$",$diaryopen))callmsg("��ѡ����ȷ��ʽ�ġ���ƪ�ռ��Ƿ񹫿������ܡ�","-1");
	if ($hour8 <0 || $hour8 >24 || $minute8<0 || $minute8>59)callmsg("$jzbmtime2��������ȷ��ʽ�����ڡ�ʱ���͡��֡��磺18:30","-1");
	$yhtime1 = $year8.'-'.$month8.'-'.$day8;
	$yhtime2 = ' '.$hour8.':'.$minute8.':00'; 
	if ( !preg_match('/(^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$)/', $yhtime1) )callmsg("��������ȷ�ĸ�ʽ������$yhtime1","-1");
	$stime = $yhtime1.$yhtime2;
	$flag = ($cook_grade > 1 )?1:0;
	$db->query("UPDATE ".__TBL_DIARY__." SET weather='$weather',feel='$feel',title='$title',content='$content',diaryopen='$diaryopen',flag='$flag',stime='$stime' WHERE id='$aid'");
	header("Location: f_diary.php?submitok=list&p=".$p);
} elseif ($submitok=="delupdate") {
	if ( !ereg("^[0-9]{1,10}$",$aid) )callmsg("Forbidden!","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_DIARY__." WHERE id=".$aid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$memberid = $row[0];
		if ($memberid !== $cook_userid)callmsg("Forbidden!","-1");
	} else {
		callmsg("Forbidden!","-1");
	}
	$db->query("DELETE FROM ".__TBL_DIARY__." WHERE id=".$aid);
	$db->query("DELETE FROM ".__TBL_DIARY_BBS__." WHERE fid=".$aid);
	header("Location: f_diary.php?submitok=list&p=".$p);
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
ul li a:link,li a:active,li a:visited{width:74px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:74px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:74px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:74px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:68px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
</style>
</head>
<body>
<ul>
<li <?php if ($submitok == "list" || $submitok == "mod")echo "class='liselect'"; ?>><a href="f_diary.php?submitok=list">�ҵ��ռ�</a></li>
<li <?php if ($submitok == "add")echo "class='liselect'"; ?>><a href="f_diary.php?submitok=add">�����ռ�</a></li>
<li><a href="f_diary_bbsed.php">�ҵ�����</a></li>
<li><a href="f_diary_favorite.php">�ռ��ղ� </a></li>
</ul>
<div class="main2">
<div class="main2_frame">
<?php if ($submitok=="add") { ?>
<br>
<form action="f_diary.php" method="post" name="FORM"  onSubmit="return chkform()" onClick="clear2bx()">
<input type="hidden" name="content" value="">
<input type="hidden" id="htext" name="text">
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	var year8 = document.FORM.year8.value;
	var month8 = document.FORM.month8.value;
	var day8 = document.FORM.day8.value;
	var hour8 = document.FORM.hour8.value;
	var minute8 = document.FORM.minute8.value;
	var dateerr = '��������ȷ��ʽ���ڣ�';
	if(year8 == "")	{
	alert(dateerr);
	document.FORM.year8.focus();
	return false;
	}
	if(month8 == ""){
	alert(dateerr);
	document.FORM.month8.focus();
	return false;
	}
	if(day8 == "" )	{
	alert(dateerr);
	document.FORM.day8.focus();
	return false;
	}
	if(hour8 == "")	{
	alert(dateerr);
	document.FORM.hour8.focus();
	return false;
	}
	if(minute8 == "" )	{
	alert(dateerr);
	document.FORM.minute8.focus();
	return false;
	}
	if(document.FORM.weather.value=="")
	{
	alert('��ѡ��������');
	document.FORM.weather.focus();
	return false;
	}
	if(document.FORM.feel.value=="")
	{
	alert('��ѡ�����飡');
	document.FORM.feel.focus();
	return false;
	}
	if(document.FORM.title.value=="")
	{
	alert('�������ռǱ��⣡');
	document.FORM.title.focus();
	return false;
	}
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0].innerHTML;
	sContent = clearAllFormat(sContent);
	document.FORM.content.value = sContent;
	if(document.FORM.content.value.length<20 || document.FORM.content.value.length>30000){
	alert('�ռ������������20~20000�ֽڣ�');
	oEditor = document.htmlletter;
	fContent.focus();
	return false;
	}}
</script>
      <table width="650" height="204" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td width="69" height="15" align="right">&nbsp;</td>
            <td colspan="3"><font color="#FF0000">��<?php echo $Global['m_area2']; ?>����������֣�����ѣ���ơ������������𷢱��������Ը���</font></td>
          </tr>
          <tr>
            <td height="15" align="right">�ա�����:</td>
            <td colspan="3"><input name="year8" type="text" class="input" id="year8" style="width:40px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo date("Y"); ?>" size="4" maxlength="4" />
��
  <input name="month8" type="text" class="input" id="month8" style="width:20px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo date("m"); ?>" size="2" maxlength="2" />
��
<input name="day8" type="text" class="input" id="day8" style="width:20px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo date("d"); ?>" size="2" maxlength="2" />
�ա�
<input name="hour8" type="text" class="input" id="hour8" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo date("H"); ?>" size="2" maxlength="2" style="width:20px;" />
ʱ
<input name="minute8" type="text" class="input" id="minute8" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo date("i"); ?>" size="2" maxlength="2" style="width:20px;" />
�� </td>
          </tr>
          <tr>
            <td width="69" height="30" align="right">�졡����:</td>
            <td width="66"><select name="weather" id="weather">
			<option value="" selected>ѡ��</option>
              <option value="1">��</option>
			  <option value="2">��</option>
			  <option value="3">����</option>
			  <option value="4">��</option>
			  <option value="5">������</option>
			  <option value="6">ѩ</option>
            </select></td>
            <td width="62" align="right">�ġ�����:</td>
            <td width="413"><select name="feel">
              <option value="" selected>ѡ��</option>
              <option value="1">����</option>
              <option value="2">�Ծ�</option>
              <option value="3">ץ��</option>
              <option value="4">����</option>
              <option value="5">����</option>
              <option value="6">��ŭ</option>
              <option value="7">ɵЦ</option>
              <option value="8">�ɻ�</option>
              <option value="9">��̾</option>
              <option value="10">����</option>
              <option value="11">��ɥ</option>
              <option value="12">һ��</option>
            </select></td>
          </tr>
          <tr>
            <td width="69" height="30" align="right">��ƪ�ռ�:</td>
            <td colspan="3"><input name="diaryopen" type="radio" value="1" checked="checked" />
              ����
              <input name="diaryopen" type="radio" value="0" />
����</td>
          </tr>
          <tr>
            <td width="69" height="30" align="right">�ꡡ����:</td>
            <td colspan="3">              <input name="title" type="text" class="input" id="title" size="90" maxlength="60" />            </td>
          </tr>
          <tr>
            <td align="right">��������:</td>
            <td colspan="3" align="center" valign="top"><iframe src="/gyleditor/gyleditor500.htm" id="htmlletter" name="htmlletter" style="height:421px; width:100%;" scrolling="no" border="0" frameborder="0" tabindex="3" ></iframe></td>
          </tr>
          <tr>
            <td height="27" align="right" bgcolor="#FFFFFF">�ϴ���Ƭ:</td>
            <td height="27" colspan="3" align="left" bgcolor="#FFFFFF"><iframe src="<?php echo $Global['my_2domain'].'/up.php'; ?>" frameborder="0" allowTransparency="true" width="500" height="24" border=0 marginWidth="0" marginHeight="0" scroll="no"></iframe></td>
          </tr>
          <tr>
            <td height="28" colspan="4" align="center" bgcolor="#FFFFFF"><input name="submitok" type="hidden" value="addupdate" />
              <input name="Submit" type="submit" class="button" value=" �ύ " /></td>
          </tr>
    </table>
	</form>
      <br>
      <table width="600" height="55" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td width="36" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif" width="23" height="21"></td>
          <td valign="top"><img src="images/li.gif" hspace="5" vspace="8" align="absmiddle">����<a href="/law.html" target="_blank" class=u666666>���������ӹ���������涨</a>�Լ��л����񹲺͹����������йط��ɷ��档<br>
          <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle">�Ͻ��������﹫���κ���ʽ����ϵ��ʽ������QQ�����䡢�绰����ַ����ַ�ȡ�<br>            <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle">�Ͻ���չ�Ƿ�����ҵ���ƹ���<br>            <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle">�Ͻ���ˮ���ҷ��򷢲���ͬ��Ϣ���ž����Ļ��<br>            <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle">Υ�����Ϲ涨��һ�����֣����۳�Love��1000���ϣ�������صĽ�������ɾ����Ա�ʸ��������ϣ���������֪ͨ���������ʣ�����������ϵ�� <br />
          <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" /><?php echo $Global['m_sitename']; ?>���������ռǱ������վ���Ȩ��</td>
        </tr>
    </table>
      <br>
      <br>
<?php } elseif ($submitok=="mod") {?>
<?php
if ( !ereg("^[0-9]{1,8}$",$aid) || $aid == 0 ){
	callmsg("��������ȷ��","-1");
} else {
	$rt = $db->query("SELECT weather,feel,title,content,diaryopen,stime FROM ".__TBL_DIARY__." WHERE id=".$aid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$weather = $row[0];
		$feel = $row[1];
		$title = $row[2];
		$content = $row[3];
		$diaryopen = $row[4];
		$stime = $row[5];
		$year8  = date_format2($stime,'%Y');
		$month8 = date_format2($stime,'%m');
		$day8   = date_format2($stime,'%d');
		$hour8  = date_format2($stime,'%H');
		$minute8= date_format2($stime,'%M');
	} else {
		callmsg("���ռǲ����ڻ��ѱ�ɾ����","./");
		exit;
	}
}
?>
      <br>
<form action="f_diary.php" method="post" name="FORM"  onSubmit="return chkform()" onClick="clear2bx()">
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	var year8 = document.FORM.year8.value;
	var month8 = document.FORM.month8.value;
	var day8 = document.FORM.day8.value;
	var hour8 = document.FORM.hour8.value;
	var minute8 = document.FORM.minute8.value;
	var dateerr = '��������ȷ��ʽ���ڣ�';
	if(year8 == "")	{
	alert(dateerr);
	document.FORM.year8.focus();
	return false;
	}
	if(month8 == ""){
	alert(dateerr);
	document.FORM.month8.focus();
	return false;
	}
	if(day8 == "" )	{
	alert(dateerr);
	document.FORM.day8.focus();
	return false;
	}
	if(hour8 == "")	{
	alert(dateerr);
	document.FORM.hour8.focus();
	return false;
	}
	if(minute8 == "" )	{
	alert(dateerr);
	document.FORM.minute8.focus();
	return false;
	}
	if(document.FORM.weather.value=="")
	{
	alert('��ѡ��������');
	document.FORM.weather.focus();
	return false;
	}
	if(document.FORM.feel.value=="")
	{
	alert('��ѡ�����飡');
	document.FORM.feel.focus();
	return false;
	}
	if(document.FORM.title.value=="")
	{
	alert('�������ռǱ��⣡');
	document.FORM.title.focus();
	return false;
	}
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0].innerHTML;
	sContent = clearAllFormat(sContent);
	document.FORM.content.value = sContent;
	if(document.FORM.content.value.length<20 || document.FORM.content.value.length>30000){
	alert('�ռ������������20~20000�ֽڣ�');
	oEditor = document.htmlletter;
	fContent.focus();
	return false;
	}}
</script>
<input type="hidden" name="content" value="">
<input type="hidden" id="htext" name="text" value='<?php echo stripslashes($row['content']);?>'>
      <table width="650" height="204" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="efefef" style="border:#dddddd 0px solid;">
          <tr>
            <td width="67" height="30" align="right" bgcolor="#FFFFFF">�ա�����:</td>
            <td colspan="3" bgcolor="#FFFFFF"><font color="#666666">
              <input name="year8" type="text" class="input" id="year8" style="width:40px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo $year8; ?>" size="4" maxlength="4" />
��
<input name="month8" type="text" class="input" id="month8" style="width:20px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo $month8; ?>" size="2" maxlength="2" />
��
<input name="day8" type="text" class="input" id="day8" style="width:20px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo $day8; ?>" size="2" maxlength="2" />
�ա�
<input name="hour8" type="text" class="input" id="hour8" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo $hour8; ?>" size="2" maxlength="2" style="width:20px;" />
ʱ
<input name="minute8" type="text" class="input" id="minute8" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo $minute8; ?>" size="2" maxlength="2" style="width:20px;" />
            </font></td>
          </tr>
          <tr>
            <td height="30" align="right" bgcolor="#FFFFFF">�졡����:</td>
            <td width="74" bgcolor="#FFFFFF"><select name="weather" id="weather">
                <option value="1" <?php if ($weather==1)echo "selected";?>>��</option>
                <option value="2" <?php if ($weather==2)echo "selected";?>>��</option>
                <option value="3" <?php if ($weather==3)echo "selected";?>>����</option>
                <option value="4" <?php if ($weather==4)echo "selected";?>>��</option>
                <option value="5" <?php if ($weather==5)echo "selected";?>>������</option>
                <option value="6" <?php if ($weather==6)echo "selected";?>>ѩ</option>
            </select></td>
            <td width="55" align="right" bgcolor="#FFFFFF">�ġ�����:</td>
            <td width="414" bgcolor="#FFFFFF"><select name="feel">
                <option value="1" <?php if ($feel==1)echo "selected";?>>����</option>
                <option value="2" <?php if ($feel==2)echo "selected";?>>�Ծ�</option>
                <option value="3" <?php if ($feel==3)echo "selected";?>>ץ��</option>
                <option value="4" <?php if ($feel==4)echo "selected";?>>����</option>
                <option value="5" <?php if ($feel==5)echo "selected";?>>����</option>
                <option value="6" <?php if ($feel==6)echo "selected";?>>��ŭ</option>
                <option value="7" <?php if ($feel==7)echo "selected";?>>ɵЦ</option>
                <option value="8" <?php if ($feel==8)echo "selected";?>>�ɻ�</option>
                <option value="9" <?php if ($feel==9)echo "selected";?>>��̾</option>
                <option value="10" <?php if ($feel==10)echo "selected";?>>����</option>
                <option value="11" <?php if ($feel==11)echo "selected";?>>��ɥ</option>
                <option value="12" <?php if ($feel==12)echo "selected";?>>һ��</option>
            </select></td>
          </tr>
          <tr>
            <td height="30" align="right" bgcolor="#FFFFFF">��ƪ�ռ�:</td>
            <td colspan="3" bgcolor="#FFFFFF"><input name="diaryopen" type="radio" value="1" <?php if ($diaryopen==1)echo "checked";?>>
                ����
                <input name="diaryopen" type="radio" value="0" <?php if ($diaryopen==0)echo "checked";?>>
                ����</td>
          </tr>
          <tr>
            <td height="30" align="right" bgcolor="#FFFFFF">�ꡡ����:</td>
            <td colspan="3" bgcolor="#FFFFFF">              <input name="title" type="text" class="input" id="title" value="<?php echo stripslashes($title)?>" size="90" maxlength="60" >            </td>
          </tr>
          <tr>
            <td align="right" valign="middle" bgcolor="#FFFFFF">��������: </td>
            <td colspan="3" align="center" valign="top" bgcolor="#FFFFFF"><iframe src="/gyleditor/gyleditor500.htm" id="htmlletter" name="htmlletter" style="height:421px; width:100%;" scrolling="no" border="0" frameborder="0" tabindex="3" ></iframe></td>
          </tr>
          <tr>
            <td height="27" align="right" bgcolor="#FFFFFF">�ϴ���Ƭ:</td>
            <td height="27" colspan="3" align="left" bgcolor="#FFFFFF"><iframe src="<?php echo $Global['my_2domain'].'/up.php'; ?>" frameborder="0" allowTransparency="true" width="500" height="24" border=0 marginWidth="0" marginHeight="0" scroll="no"></iframe></td>
          </tr>
          <tr>
            <td height="28" colspan="4" align="center" bgcolor="#FFFFFF"><input name="submitok" type="hidden" value="modupdate" />
              <input name="aid" type="hidden" value="<?php echo $aid; ?>" />
              <input name="p" type="hidden" value="<?php echo $p; ?>" />
              <input type="submit" name="Submit" value=" �ύ " class="button" /></td>
          </tr>
    </table>
</form>      <br>
<table width="600" height="55" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="36" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif" width="23" height="21" /></td>
    <td valign="top"><img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" />����<a href="/law.html" target="_blank" class="u666666">���������ӹ���������涨</a>�Լ��л����񹲺͹����������йط��ɷ��档<br />
        <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" />�Ͻ��������﹫���κ���ʽ����ϵ��ʽ������QQ�����䡢�绰����ַ����ַ�ȡ�<br />
        <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" />�Ͻ���չ�Ƿ�����ҵ���ƹ���<br />
        <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" />�Ͻ���ˮ���ҷ��򷢲���ͬ��Ϣ���ž����Ļ��<br />
        <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" />Υ�����Ϲ涨��һ�����֣����۳�Love��1000���ϣ�������صĽ�������ɾ����Ա�ʸ��������ϣ���������֪ͨ���������ʣ�����������ϵ�� <br />
        <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" /><?php echo $Global['m_sitename']; ?>���������ռǱ������վ���Ȩ��</td>
  </tr>
</table>
<br>
      <?php } elseif ($submitok=="list") {?>
      <?php
//�б����ʼ
	$rt=$db->query("SELECT id,title,diaryopen,ifjh,click,hfnum,flag,stime FROM ".__TBL_DIARY__." WHERE  userid='$cook_userid' ORDER BY id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
		echo "<br><br><table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=dddddd><tr><td align=center bgcolor=efefef><font color=#999999>..������Ϣ..</font><br><br><img src=images/add.gif hspace=3 align=absbottom><a href=f_diary.php?submitok=add class=u666666>��˷���</a></td></tr></table>";
	} else {
		$pagesize=10;
		require_once YZLOVE.'sub/class.php';
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
?>
      <table width="99" height="10" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
    </table>
      <table width="650" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="461" height="30" align="center" valign="middle" style="border-bottom:#ddd 1px solid;"> �ꡡ��</td>
          <td width="73" align="center" valign="middle" style="border-bottom:#ddd 1px solid;">����/���</td>
          <td width="53" align="center" valign="middle" style="border-bottom:#ddd 1px solid;">�޸�</td>
          <td width="55" align="center" valign="middle" style="border-bottom:#ddd 1px solid;">ɾ��</td>
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
          <td height="35" style="border-bottom:#E9E8E8 1px solid;padding-left:5px;"><font color="#999999"><?php echo date_format2($rows['stime'],'%Y-%m-%d');?></font> <a href="<?php echo $Global['home_2domain'];?>/diary<?php echo $rows['id'];?>.html" class=333333 target="_blank"><?php echo htmlout(stripslashes($rows['title'])); ?></a><?php 
if ($rows['flag']==0)echo " <font color=red>δ��</font>";
if ($rows['diaryopen']==0)echo " <img src=images/m.gif title='��'>";
if ($rows['ifjh']==1)echo " <img src=images/jh.gif title='����'>";
?></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><font color="#FF0000"><?php echo $rows['hfnum']; ?></font> <font color="#999999">/</font> <font color="#FF0000"><?php echo $rows['click']; ?></font></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><a href="f_diary.php?submitok=mod&aid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>" class=666666><img src="images/modx.gif" hspace="3" border="0" align="absmiddle">�޸�</a></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><a href="f_diary.php?submitok=delupdate&aid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>" onClick="return confirm('�� �� �� ��\n\n��ȷ��ɾ����\n\n�˲���������ɾ��������ȫ�����ۡ����ò��ûָ���\n\n�����޸ġ�')" class=666666><img src="images/delx.gif" hspace="3" border="0">ɾ��</a></td>
        </tr>
        <?php }?>
    </table>
      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="587" height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        </tr>
    </table>
    <?php //lise end
			 }}?>
<br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>