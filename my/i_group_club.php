<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT grade FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_grade=$row[0];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid) )callmsg("Forbidden!","-1");
if ($submitok=="addupdate") {
	if ( strlen($title)<6 || strlen($title)>100 )callmsg("������������6~100���ֽ�����","-1");
	if ( strlen($kind)<2 || strlen($kind)>100 )callmsg("������������2~100���ֽ�����","-1");
	if ( strlen($hdtime)<2 || strlen($hdtime)>100 )callmsg("�ʱ���������2~100���ֽ�����","-1");
	if ( !ereg("^[0-9]{4}$",$year8))callmsg("��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�ꡱ�磺2009","-1");
	if ( !ereg("^[0-9]{2}$",$month8))callmsg("��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�¡��磺09","-1");
	if ( !ereg("^[0-9]{2}$",$day8))callmsg("��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�ա��磺09","-1");
	if ( !ereg("^[0-9]{2}$",$hour8))callmsg("��������ȷ��ʽ�Ľ�ֹ����ʱ��ġ�ʱ���磺18","-1");
	if ( !ereg("^[0-9]{2}$",$minute8))callmsg("��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�֡��磺30","-1");
	$jzbmtime1 = $year8.'-'.$month8.'-'.$day8;
	$jzbmtime2 = ' '.$hour8.':'.$minute8.':00';
	if ($hour8 <0 || $hour8 >24 || $minute8<0 || $minute8>59)callmsg("$jzbmtime2��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰ʱ���͡��֡��磺18:30","-1");
	if ( !preg_match('/(^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$)/', $jzbmtime1) )callmsg("��������ȷ�ĸ�ʽ�Ľ�ֹ����ʱ��$jzbmtime1","-1");
	$jzbmtime = $jzbmtime1.$jzbmtime2;
	if ( strlen($address)<2 || strlen($address)>100 )callmsg("��ص��������2~100���ֽ�����","-1");
	if ( strlen($jtlx)<2 || strlen($jtlx)>100 )callmsg("��ͨ·���������2~100���ֽ�����","-1");
	if ( !ereg("^[0-9]{1,5}$",$num_n))callmsg("����ʿ�������޶�������5λ��������","-1");
	if ( !ereg("^[0-9]{1,5}$",$num_r))callmsg("��Ůʿ�������޶�������5λ��������","-1");
	if ( !ereg("^[0-9]{1,5}$",$rmb_n))callmsg("����ʿ������ñ�����5λ��������","-1");
	if ( !ereg("^[0-9]{1,5}$",$rmb_r))callmsg("��Ůʿ������ñ�����5λ��������","-1");
	if ( strlen($tbsm)>500 )callmsg("�ر�˵���������500�ֽ�����","-1");
	if ( strlen($content)<10 || strlen($content)>60000 )callmsg("���ϸ˵���������10~50000�ֽ�����","-1");
	$addtime = date("Y-m-d H:i:s");
	$db->query("INSERT INTO ".__TBL_GROUP_CLUB__." (mainid,maintitle,title,kind,hdtime,address,jtlx,num_n,num_r,rmb_n,rmb_r,tbsm,content,jzbmtime,addtime) VALUES ('$mainid','$maintitle','$title','$kind','$hdtime','$address','$jtlx','$num_n','$num_r','$rmb_n','$rmb_r','$tbsm','$content','$jzbmtime','$addtime')");
	header("Location: i_group_club.php?submitok=list&mainid=".$mainid);
} elseif ($submitok=="modupdate") {
	if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid))callmsg("������ڻ��ѱ�ɾ��!","-1");
	if ( strlen($title)<6 || strlen($title)>100 )callmsg("������������6~100���ֽ�����","-1");
	if ( strlen($kind)<2 || strlen($kind)>100 )callmsg("������������2~100���ֽ�����","-1");
	if ( strlen($hdtime)<2 || strlen($hdtime)>100 )callmsg("�ʱ���������2~100���ֽ�����","-1");
	if ( !ereg("^[0-9]{4}$",$year8))callmsg("��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�ꡱ�磺2008","-1");
	if ( !ereg("^[0-9]{2}$",$month8))callmsg("��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�¡��磺08","-1");
	if ( !ereg("^[0-9]{2}$",$day8))callmsg("��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�ա��磺08","-1");
	if ( !ereg("^[0-9]{2}$",$hour8))callmsg("��������ȷ��ʽ�Ľ�ֹ����ʱ��ġ�ʱ���磺18","-1");
	if ( !ereg("^[0-9]{2}$",$minute8))callmsg("��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�֡��磺30","-1");
	$jzbmtime1 = $year8.'-'.$month8.'-'.$day8;
	$jzbmtime2 = ' '.$hour8.':'.$minute8.':00';
	if ($hour8 <0 || $hour8 >24 || $minute8<0 || $minute8>59)callmsg("$jzbmtime2��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰ʱ���͡��֡��磺18:30","-1");
	if ( !preg_match('/(^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$)/', $jzbmtime1) )callmsg("��������ȷ�ĸ�ʽ�Ľ�ֹ����ʱ��$jzbmtime1","-1");
	$jzbmtime = $jzbmtime1.$jzbmtime2;
	if ( strlen($address)<2 || strlen($address)>100 )callmsg("��ص��������2~100���ֽ�����","-1");
	if ( strlen($jtlx)<2 || strlen($jtlx)>100 )callmsg("��ͨ·���������2~100���ֽ�����","-1");
	if ( !ereg("^[0-9]{1,5}$",$num_n))callmsg("����ʿ�������޶�������5λ��������","-1");
	if ( !ereg("^[0-9]{1,5}$",$num_r))callmsg("��Ůʿ�������޶�������5λ��������","-1");
	if ( !ereg("^[0-9]{1,5}$",$rmb_n))callmsg("����ʿ������ñ�����5λ��������","-1");
	if ( !ereg("^[0-9]{1,5}$",$rmb_r))callmsg("��Ůʿ������ñ�����5λ��������","-1");
	if ( strlen($tbsm)>500 )callmsg("�ر�˵���������500�ֽ�����","-1");
	if ( strlen($content)<10 || strlen($content)>60000 )callmsg("���ϸ˵���������10~50000�ֽ�����","-1");
	$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET mainid='$mainid',maintitle='$maintitle',title='$title',kind='$kind',hdtime='$hdtime',address='$address',jtlx='$jtlx',num_n='$num_n',num_r='$num_r',rmb_n='$rmb_n',rmb_r='$rmb_r',tbsm='$tbsm',content='$content',jzbmtime='$jzbmtime' WHERE id='$fid'");
	header("Location: i_group_club.php?submitok=list&mainid=".$mainid."&p=".$p);
}
$rt = $db->query("SELECT title,userid FROM ".__TBL_GROUP_MAIN__." WHERE userid=".$cook_userid." AND id=".$mainid);
$total = $db->num_rows($rt);
if($total > 0){
	$row = $db->fetch_array($rt);
	$maintitle = $row[0];
	$memberid  = $row[1];
	if ($memberid !== $cook_userid)callmsg("�û���֤���󣬲���ʧ�ܣ�","-1");
} else {
	callmsg("Forbidden!","-1");
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
ul li a:link,li a:active,li a:visited{width:84px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:84px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:84px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:84px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:78px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
</style>
</head>
<body>
<ul>
<li class="liselect"><a href="i_group.php">�ҵ�Ȧ��</a></li>
<li><a href="i_group_add.php">����Ȧ��</a></li>
<li><a href="i_group_mylogin.php">�����Ȧ��</a></li>
<li><a href="i_group_myblog.php">�ҵ����� </a></li>
<li><a href="i_group_favorite.php">�����ղ� </a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <table width="670" height="40" border="0" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td bgcolor="#FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" align="absmiddle" /><b><a href="i_group.php"><?php echo $maintitle; ?></a></b> >> <a href="i_group_club.php?mainid=<?php echo $mainid; ?>&submitok=list" class="u666666"><b>�����</b></a><?php if ($submitok == "add") {echo " >> �����";} elseif ($submitok == "mod"){echo " >> ��޸�";} ?></td>
      <td width="109" bgcolor="#FDEEF8" style="font-size:10.3pt"><img src=images/add2.gif width="11" height="12" hspace=3 align=absmiddle><a href=i_group_club.php?mainid=<?php echo $mainid;?>&submitok=add ><b>�����»</b></a></td>
    </tr>
  </table>
  <br />
<?php if ($submitok=="add") { ?>
<?php if ($data_grade <3 ) {?>
<br /><br /><br /><br />
<table width=300 height=150 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd>
<tr>
<td align=center bgcolor=#f3f3f3><i><font color="#FF0000" face="Arial Black" style="font-size:21px;">Sorry!</font></i>��<font color="666666">ֻ����ʯ��Ա�ſ��Է������<br>
<br>
</font><br>
<img src="images/ok.gif" width="14" height="14"><a href="k_bank.php" class="u666666"><b>��������</b></a>����<img src="images/tips3.gif" width="11" height="15" hspace="5" align="absmiddle"><a href="k_vip.php" class="u666666">�߼���Ա������Щ��Ȩ��</a></td>
</tr>
</table>
<br /><br /><br /><br />
<?php } else {?>
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	if(document.FORM.title.value.length<6 || document.FORM.title.value.length>100)
	{
	alert('���������� 6~100 �ֽ�!');
	document.FORM.title.focus();
	return false;
	}
	if(document.FORM.kind.value.length<2 || document.FORM.kind.value.length>100)
	{
	alert('���������� 2~100 �ֽ�!');
	document.FORM.kind.focus();
	return false;
	}	
	if(document.FORM.hdtime.value.length<2 || document.FORM.hdtime.value.length>100){
	alert('�ʱ������� 2~100 �ֽ�!');
	document.FORM.hdtime.focus();
	return false;
	}	
	if(document.FORM.year8.value.length !== 4){
	alert('��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�ꡱ����������Ч��4λ���֣��磺2008');
	document.FORM.year8.focus();
	return false;
	}		
	if(document.FORM.month8.value.length !== 2){
	alert('��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�¡�����������Ч��2λ���֣��磺08');
	document.FORM.month8.focus();
	return false;
	}	
	if(document.FORM.day8.value.length !== 2){
	alert('��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�ա�����������Ч��2λ���֣��磺08');
	document.FORM.day8.focus();
	return false;
	}		
	if(document.FORM.hour8.value.length !== 2){
	alert('��������ȷ��ʽ�Ľ�ֹ����ʱ��ġ�ʱ������������Ч��2λ���֣��磺18');
	document.FORM.hour8.focus();
	return false;
	}
	if(document.FORM.minute8.value.length !== 2){
	alert('��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�֡�����������Ч��2λ���֣��磺30');
	document.FORM.minute8.focus();
	return false;
	}
	if(document.FORM.address.value.length<2 || document.FORM.address.value.length>100)
	{
	alert('��ص������ 2~100 �ֽ�!');
	document.FORM.address.focus();
	return false;
	}	
	if(document.FORM.jtlx.value.length<2 || document.FORM.jtlx.value.length>100)
	{
	alert('��ͨ·������� 2~100 �ֽ�!');
	document.FORM.jtlx.focus();
	return false;
	}	
	if(document.FORM.num_n.value.length<1 || document.FORM.num_n.value.length>5)
	{
	alert('����ʿ�������޶������ 1~5 �ֽ�!');
	document.FORM.num_n.focus();
	return false;
	}	
	if(document.FORM.num_r.value.length<1 || document.FORM.num_r.value.length>5)
	{
	alert('��Ůʿ�������޶������ 1~5 �ֽ�!');
	document.FORM.num_r.focus();
	return false;
	}
		
	if(document.FORM.tbsm.value.length<1 || document.FORM.tbsm.value.length>500)
	{
	alert('�ر�˵������� 1~500 �ֽ�!');
	document.FORM.tbsm.focus();
	return false;
	}	
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0].innerHTML;
	sContent = clearAllFormat(sContent);
	document.FORM.content.value = sContent;
	if(document.FORM.content.value.length<20 || document.FORM.content.value.length>30000){
	alert('���ϸ˵���������20~20000�ֽڣ�');
	oEditor = document.htmlletter;
	fContent.focus();
	return false;
	}
}
</script>
      <table width="670" border="0" align="center" cellpadding="5" cellspacing="0">
<form action="i_group_club.php" method="post" name="FORM"  onSubmit="return chkform()" onClick="clear2bx()">
<input type="hidden" name="content" value="">
<input type="hidden" id="htext" name="text">

          <tr >
            <td width="127" align="right">�� �� ��:</td>
            <td width="523" valign="top" ><?php geticon($cook_sex.$cook_grade); ?>
            <font face="Verdana, Arial, Helvetica, sans-serif"><?php echo $cook_nickname; ?> (<?php echo $cook_username; ?>)</font>��ID�ţ�<?php echo $cook_userid; ?></td>
          </tr>
          <tr >
            <td width="127" align="right">����Ⱥ��:</td>
            <td width="523" valign="top"><a href="<?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?>" target="_blank" class="u666666"><?php echo $maintitle; ?></a></td>
          </tr>
          <tr>
            <td align="right">�����:</td>
            <td valign="top"><input name="title" type="text" class=input size="64" maxlength="100"></td>
          </tr>


          <tr>
            <td align="right">�����:</td>
            <td valign="top"><input name="kind" type="text" class=input size="20" maxlength="100">              <img src="images/tips3.gif" width="11" height="15" hspace="3" align="absmiddle">���ѣ����飬���εȵ�</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#FDEEF8" style="padding-top:10px"><b>�ʱ������</b>:</td>
            <td valign="top" bgcolor="#FDEEF8" ><input name="hdtime" type="text" class=input id="hdtime" size="64" maxlength="100">
              <br>              <img src="images/tips3.gif" width="11" height="15" hspace="3" vspace="5" align="absmiddle">�����ʱ��Σ����ע�����<br>
              <font color="#DF2C91">��ʽ</font><font color="DF2C91">1��</font>2009��8��19�� ����13��00 �� 17��00<br>
              <font color="#DF2C91">��ʽ2��</font>2009��8��19�� ����08��00 �� 2009��8��21�� ����17��00</td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FDEEF8" ><b><font color="#FF0000">��ֹ����ʱ��</font></b><font color="#FF0000">:</font></td>
            <td valign="top" bgcolor="#FDEEF8">
              <input name="year8" type="text" class=input id="year8" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo date('Y') ?>" size="4" maxlength="4" style="width:40px;">
            ��
            <input name="month8" type="text" class=input id="month8" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" size="2" maxlength="2" style="width:20px;">
            ��
            <input name="day8" type="text" class=input id="day8" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" size="2" maxlength="2" style="width:20px;">
            �ա�
            <input name="hour8" type="text" class=input id="hour8" style="width:20px;" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="00" size="2" maxlength="2">
            ʱ
            <input name="minute8" type="text" class=input id="minute8" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="00" size="2" maxlength="2" style="width:20px;">
            �֡�            <img src="images/tips3.gif" width="11" height="15" hspace="3" vspace="5" align="absmiddle" /><font color="#FF0000">����д��ȷ�����������</font></td>
          </tr>
          <tr>
            <td align="right" >��ص�:</td>
            <td valign="top"><input name="address" type="text" class=input size="64" maxlength="100"></td>
          </tr>
          <tr>
            <td align="right">��ͨ·��:</td>
            <td valign="top"><input name="jtlx" type="text" class=input id="jtlx" size="64" maxlength="100"></td>
          </tr>
          <tr>
            <td align="right">�����޶�:</td>
            <td valign="top"><img src="images/nan.gif" alt="��" width="11" height="14">
              <input name="num_n" type="text" size="3" maxlength="5" class=input onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
              �� ��<img src="images/nv.gif" alt="Ů" width="11" height="14">
              <input name="num_r" type="text" size="3" maxlength="5" class=input onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
              �� ��</td>
          </tr>
          <tr>
            <td align="right">�����:</td>
            <td valign="top"><img src="images/nan.gif" alt="��" width="11" height="14">
              <input name="rmb_n" type="text" class=input value="0" size="3" maxlength="5" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
              Ԫ ��<img src="images/nv.gif" alt="Ů" width="11" height="14">
              <input name="rmb_r" type="text" class=input value="0" size="3" maxlength="5" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
              Ԫ��</td>
          </tr>
          <tr>
            <td align="right" valign="top">�ر�˵��:</td>
            <td valign="top"><textarea name="tbsm" cols="58" rows="4" id="tbsm" style="font-size:9pt;"></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="top" bgcolor="#FDEEF8"><b>���ϸ˵��</b>��</td>
          </tr>
          <tr>
            <td colspan="2" align="center"><iframe src="/gyleditor/gyleditor_party.htm" id="htmlletter" name="htmlletter" style="height:421px; width:100%;" scrolling="no" border="0" frameborder="0" tabindex="3" ></iframe></td>
          </tr>
          <tr>
            <td align="right">�ϴ���Ƭ:</td>
            <td align="left"><iframe src="<?php echo $Global['my_2domain'].'/up.php'; ?>" frameborder="0" allowTransparency="true" width="500" height="24" border=0 marginWidth="0" marginHeight="0" scroll="no"></iframe></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="submitok" type="hidden" value="addupdate" />
              <input name="mainid" type="hidden" value="<?php echo $mainid; ?>" />
              <input name="maintitle" type="hidden" value="<?php echo $maintitle; ?>" />
              <input type="submit" name="Submit" value=" ȷ�Ϸ��� " class="button" /></td>
          </tr>
        </form>
    </table>
<?php }?>
<?php } elseif ($submitok=="mod") {?>
<?php
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid)){
	callmsg("��������ȷ��","-1");
} else {
	$rt = $db->query("SELECT title,kind,hdtime,address,jtlx,num_n,num_r,rmb_n,rmb_r,tbsm,jzbmtime,content FROM ".__TBL_GROUP_CLUB__." WHERE id=".$fid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$title  = $row[0];
		$kind  = $row[1];
		$hdtime  = $row[2];
		$address  = $row[3];
		$jtlx  = $row[4];
		$num_n  = $row[5];
		$num_r  = $row[6];
		$rmb_n  = $row[7];
		$rmb_r  = $row[8];
		$tbsm  = $row[9];
		$jzbmtime  = $row[10];
		$content  = stripslashes($row[11]);
	} else {
		callmsg("�û�����ڻ��ѱ�ɾ����","-1");
		exit;
	}
}
?>
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	if(document.FORM.title.value.length<6 || document.FORM.title.value.length>100)
	{
	alert('���������� 6~100 �ֽ�!');
	document.FORM.title.focus();
	return false;
	}
	if(document.FORM.kind.value.length<2 || document.FORM.kind.value.length>100)
	{
	alert('���������� 2~100 �ֽ�!');
	document.FORM.kind.focus();
	return false;
	}	
	if(document.FORM.hdtime.value.length<2 || document.FORM.hdtime.value.length>100){
	alert('�ʱ������� 2~100 �ֽ�!');
	document.FORM.hdtime.focus();
	return false;
	}	
	if(document.FORM.year8.value.length !== 4){
	alert('��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�ꡱ����������Ч��4λ���֣��磺2008');
	document.FORM.year8.focus();
	return false;
	}		
	if(document.FORM.month8.value.length !== 2){
	alert('��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�¡�����������Ч��2λ���֣��磺08');
	document.FORM.month8.focus();
	return false;
	}	
	if(document.FORM.day8.value.length !== 2){
	alert('��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�ա�����������Ч��2λ���֣��磺08');
	document.FORM.day8.focus();
	return false;
	}		
	if(document.FORM.hour8.value.length !== 2){
	alert('��������ȷ��ʽ�Ľ�ֹ����ʱ��ġ�ʱ������������Ч��2λ���֣��磺18');
	document.FORM.hour8.focus();
	return false;
	}
	if(document.FORM.minute8.value.length !== 2){
	alert('��������ȷ��ʽ�Ľ�ֹ����ʱ�䡰�֡�����������Ч��2λ���֣��磺30');
	document.FORM.minute8.focus();
	return false;
	}
	if(document.FORM.address.value.length<2 || document.FORM.address.value.length>100)
	{
	alert('��ص������ 2~100 �ֽ�!');
	document.FORM.address.focus();
	return false;
	}	
	if(document.FORM.jtlx.value.length<2 || document.FORM.jtlx.value.length>100)
	{
	alert('��ͨ·������� 2~100 �ֽ�!');
	document.FORM.jtlx.focus();
	return false;
	}	
	if(document.FORM.num_n.value.length<1 || document.FORM.num_n.value.length>5)
	{
	alert('����ʿ�������޶������ 1~5 �ֽ�!');
	document.FORM.num_n.focus();
	return false;
	}	
	if(document.FORM.num_r.value.length<1 || document.FORM.num_r.value.length>5)
	{
	alert('��Ůʿ�������޶������ 1~5 �ֽ�!');
	document.FORM.num_r.focus();
	return false;
	}
		
	if(document.FORM.tbsm.value.length<1 || document.FORM.tbsm.value.length>500)
	{
	alert('�ر�˵������� 1~500 �ֽ�!');
	document.FORM.tbsm.focus();
	return false;
	}	
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0].innerHTML;
	sContent = clearAllFormat(sContent);
	document.FORM.content.value = sContent;
	if(document.FORM.content.value.length<20 || document.FORM.content.value.length>30000){
	alert('���ϸ˵���������20~20000�ֽڣ�');
	oEditor = document.htmlletter;
	fContent.focus();
	return false;
	}
}
</script>
<table width="670" border="0" align="center" cellpadding="5" cellspacing="0">
<form action="i_group_club.php" method="post" name="FORM"  onSubmit="return chkform()" onClick="clear2bx()">
<input type="hidden" name="content" value="">
          <tr >
            <td width="128" align="right">�� �� ��:</td>
            <td width="522" valign="top" ><?php geticon($cook_sex.$cook_grade); ?>
                <font face="Verdana, Arial, Helvetica, sans-serif"><?php echo $cook_nickname; ?> (<?php echo $cook_username; ?>)</font>��ID�ţ�<?php echo $cook_userid; ?></td>
          </tr>
          <tr >
            <td width="128" align="right">����Ⱥ��:</td>
            <td width="522" valign="top"><a href="<?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?>" target="_blank" class="u666666"><?php echo $maintitle; ?></a></td>
          </tr>
          <tr>
            <td align="right">�����:</td>
            <td valign="top"><input name="title" type="text" class=input value="<?php echo stripslashes($title);?>" size="64" maxlength="100"></td>
          </tr>
          <tr>
            <td align="right">�����:</td>
            <td valign="top"><input name="kind" type="text" class=input value="<?php echo stripslashes($kind);?>" size="20" maxlength="100">              <img src="images/tips3.gif" width="11" height="15" hspace="3" align="absmiddle">���ѣ����飬���εȵ�</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#FDEEF8" style="padding-top:10px"><b>�ʱ������</b>:</td>
            <td valign="top" bgcolor="#FDEEF8" ><input name="hdtime" type="text" class=input id="hdtime" value="<?php echo stripslashes($hdtime);?>" size="64" maxlength="100">
            <br>            <img src="images/tips3.gif" width="11" height="15" hspace="3" vspace="5" align="absmiddle">�����ʱ��Σ����ע�����<br>
            <font color="#DF2C91">��ʽ1</font>��2007��8��19�� ����13��00��17��00<br>
            <font color="#DF2C91">��ʽ2</font>��2007��8��19�� ����08��00��2007��8��21�� ����17��00</td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FDEEF8" ><b>��ֹ����ʱ��</b>:</td>
            <td valign="top" bgcolor="#FDEEF8" >
<?php
$year8    = date_format2($jzbmtime,'%Y');
$month8   = date_format2($jzbmtime,'%m');
$day8     = date_format2($jzbmtime,'%d');
$hour8    = date_format2($jzbmtime,'%H');
$minute8  = date_format2($jzbmtime,'%M');
?>
<input name="year8" type="text" class=input id="year8" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $year8;?>" size="4" maxlength="4" style="width:40px;">
��
<input name="month8" type="text" class=input id="month8" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $month8;?>" size="2" maxlength="2" style="width:20px;">
��
<input name="day8" type="text" class=input id="day8" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $day8;?>" size="2" maxlength="2" style="width:20px;">
�ա�
<input name="hour8" type="text" class=input id="hour8" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $hour8;?>" size="2" maxlength="2" style="width:20px;">
ʱ
<input name="minute8" type="text" class=input id="minute8" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $minute8;?>" size="2" maxlength="2" style="width:20px;">
�� </td>
          </tr>
          <tr>
            <td align="right" >��ص�:</td>
            <td valign="top"><input name="address" type="text" class=input value="<?php echo stripslashes($address);?>" size="64" maxlength="100"></td>
          </tr>
          <tr>
            <td align="right">��ͨ·��:</td>
            <td valign="top"><input name="jtlx" type="text" class=input id="jtlx" value="<?php echo stripslashes($jtlx);?>" size="64" maxlength="100"></td>
          </tr>
          <tr>
            <td align="right">�����޶�:</td>
            <td valign="top"><img src="images/nan.gif" alt="��" width="11" height="14">
                  <input name="num_n" type="text" class=input onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $num_n;?>" size="3" maxlength="5">
              �� ��<img src="images/nv.gif" alt="Ů" width="11" height="14">
              <input name="num_r" type="text" class=input onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $num_r;?>" size="3" maxlength="5">
              �� ��</td>
          </tr>
          <tr>
            <td align="right">�����:</td>
            <td valign="top"><img src="images/nan.gif" alt="��" width="11" height="14">
                  <input name="rmb_n" type="text" class=input value="<?php echo $rmb_n;?>" size="3" maxlength="5" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
              Ԫ ��<img src="images/nv.gif" alt="Ů" width="11" height="14">
              <input name="rmb_r" type="text" class=input value="<?php echo $rmb_r;?>" size="3" maxlength="5" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
              Ԫ��</td>
          </tr>
          <tr>
            <td align="right" valign="top">�ر�˵��:</td>
            <td valign="top"><textarea name="tbsm" cols="58" rows="4" id="tbsm" style="font-size:9pt;"><?php echo stripslashes($tbsm);?></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="top" bgcolor="FDEEF8"><strong>���ϸ˵��</strong>��</td>
          </tr>
          <tr>
            <td colspan="2" align="center"><iframe src="/gyleditor/gyleditor_party.htm" id="htmlletter" name="htmlletter" style="height:421px; width:100%;" scrolling="no" border="0" frameborder="0" tabindex="3" ></iframe></td>
          </tr>
          <tr>
            <td align="right">�ϴ���Ƭ:</td>
            <td align="left"><iframe src="<?php echo $Global['my_2domain'].'/up.php'; ?>" frameborder="0" allowTransparency="true" width="500" height="24" border=0 marginWidth="0" marginHeight="0" scroll="no"></iframe></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="submitok" type="hidden" value="modupdate">
<input name="mainid" type="hidden" value="<?php echo $mainid; ?>">
<input name="maintitle" type="hidden" value="<?php echo $maintitle; ?>">
<input name="p" type="hidden" value="<?php echo $p;?>">
<input name="fid" type="hidden" value="<?php echo $fid;?>">
<input type="submit" name="Submit" value=" �ύ " class="button"><input type="hidden" id="htext" name="text" value='<?php echo $content;?>'></td>
          </tr>
      </form>
    </table>
      <?php } elseif ($submitok=="list") {?>
      <?php
//�б����ʼ
	$rt=$db->query("SELECT id,title,flag,addtime,bmnum FROM ".__TBL_GROUP_CLUB__." WHERE mainid='$mainid' ORDER BY id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
?><br><br><table width=300 height=150 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=dddddd>
        <tr>
        <td align=center bgcolor=efefef><font color=#999999>..���޻..</font><br>
          <br><img src=images/add2.gif width="11" height="12" hspace=5 align=absbottom><a href=i_group_club.php?mainid=<?php echo $mainid;?>&submitok=add class=u666666>��˷����»</a></td>
      </tr></table>
      <?php
	} else {
		$pagesize=10;
		require_once YZLOVE.'sub/class.php';
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
?>
      <table width="670" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="385" height="22" style="border-bottom:#ddd 1px solid">������������������� </td>
          <td width="55" align="center" style="border-bottom:#ddd 1px solid">״̬</td>
          <td width="51" align="center" style="border-bottom:#ddd 1px solid;">��������</td>
          <td width="86" align="center" style="border-bottom:#ddd 1px solid">��������</td>
          <td width="43" align="center" style="border-bottom:#ddd 1px solid">&nbsp;</td>
        </tr>
        <?php
		for($i=0;$i<$pagesize;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			if ($i % 2 == 0){
				$bg="bgcolor=#f8f8f8";
				$overbg="#ffffcc";
				$outbg="#f8f8f8";
			} else {
				$bg="bgcolor=#ffffff";
				$overbg="#ffffcc";
				$outbg="#ffffff";
			}
?>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'">
          <td height="35" style="border-bottom:#ddd 1px solid"><img src="images/party.gif" width="17" height="12" align="absmiddle"> <a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows['id'];?>.html" class=uFF5494 target="_blank" style="font-size:14px"><?php echo stripslashes($rows['title']); ?></a> <font color="#999999"><?php echo date_format2($rows['addtime'],'%y-%m-%d');?></font>��<?php if ($rows['flag'] > 0) {?>
<a href="i_group_club_photo_list.php?mainid=<?php echo $mainid; ?>&clubid=<?php echo $rows['id'];?>&clubtitle=<?php echo stripslashes($rows['title']); ?>"><img src="images/lkup.gif" border="0" align="absmiddle" ></a>
<?php }?></td>
<td align="center" style="border-bottom:#ddd 1px solid">
<?php 
switch ($rows['flag']){ 
	case 0:
		echo "<font color=red>��δ���</font>";
	break;
	case 1:
		echo "<font color=#0066CC>������</font>";
	break;
	case 2:
		echo "<font color=#ff6600>������</font>";
	break;
	case 3:
		echo "<font color=#349933>Բ���ɹ�</font>";
	break;
}
?></td>
<td align="center" style="color:#999999;border-bottom:#ddd 1px solid">
(
<?php 
echo "<font color=#ff0000>".$rows['bmnum']."</font>";
?>)��<br />
</td>
<td align="center" style="border-bottom:#ddd 1px solid">
<?php if ($rows['flag'] == 1 || $rows['flag'] == 2) {?>
<a href="i_group_club_user.php?mainid=<?php echo $mainid; ?>&clubid=<?php echo $rows['id'];?>&clubtitle=<?php echo stripslashes($rows['title']); ?>" class="uFF5494"><img src="images/partybm.gif" border="0" ></a><?php }?></td>
<td align="center" style="border-bottom:#ddd 1px solid">
<?php if ($rows['flag'] <2) {?>
<a href="i_group_club.php?mainid=<?php echo $mainid;?>&submitok=mod&fid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>" class="u666666"><img src="images/modx.gif" hspace="3" border="0" align="absmiddle">�޸�</a>
<?php }?></td>
        </tr>
        <?php }?>
    </table>
      <table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        </tr>
    </table>
    <?php //lise end
			 }}?>
    <br>
  <br>

  <br />
  <br>
<br />
  <br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>