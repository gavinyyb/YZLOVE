<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="addupdate") {
	if (!ereg("^[0-9]{1,9}$",$userid2) || empty($userid2))callmsg("����ȷ������(��)��ID�ţ�","-1");
	if (!ereg("^[1-5]{1}$",$sussflag) || empty($sussflag))callmsg("����ȷѡ������������","-1");
	if (strlen($title)>50 || strlen($title)<2)callmsg("���������⡱���ݹ������٣��������2~50�ֽ�����","-1");
	if (strlen($content)>10000 || strlen($content)<20)callmsg("���������ݡ��������٣��������20~10000�ֽ�����","-1");
	$rt = $db->query("SELECT nickname,sex,grade,photo_s FROM ".__TBL_MAIN__." WHERE id='$userid2'");
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		if ($row[1] == $cook_sex)callmsg("��(��)������������ԣ����飡","-1");
		$nicknamesexgradephoto_s2 = $row[0]."|".$row[1]."|".$row[2]."|".$row[3];
	} else {
		callmsg("��(��)��ID�Ų����ڣ����飡","-1");
	}
	$nicknamesexgradephoto_s = $cook_nickname."|".$cook_sex."|".$cook_grade."|".$cook_photo_s;
	$addtime = date("Y-m-d H:i:s");
	$db->query("INSERT INTO ".__TBL_STORY__."  (userid,nicknamesexgradephoto_s,userid2,nicknamesexgradephoto_s2,sussflag,title,content,addtime) VALUES ('$cook_userid','$nicknamesexgradephoto_s','$userid2','$nicknamesexgradephoto_s2','$sussflag','$title','$content','$addtime')");
	//header("Location: g_story.php?submitok=list");
	$fid = $db->insert_id();
	header("Location: g_story_photo_up.php?fid=".$fid."&storytitle=".$title);
} elseif ($submitok=="modupdate") {
	if (!ereg("^[0-9]{1,9}$",$fid) || empty($fid))callmsg("fid����","-1");
	if (!ereg("^[0-9]{1,9}$",$userid2) || empty($userid2))callmsg("����ȷ������(��)��ID�ţ�","-1");
	if (!ereg("^[1-5]{1}$",$sussflag) || empty($sussflag))callmsg("����ȷѡ������������","-1");
	if (strlen($title)>50 || strlen($title)<2)callmsg("���������⡱���ݹ������٣��������2~50�ֽ�����","-1");
	if (strlen($content)>10000 || strlen($content)<20)callmsg("���������ݡ��������٣��������20~10000�ֽ�����","-1");
	$rt = $db->query("SELECT nickname,sex,grade,photo_s FROM ".__TBL_MAIN__." WHERE id='$userid2'");
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		if ($row[1] == $cook_sex)callmsg("��(��)������������ԣ����飡","-1");
		$nicknamesexgradephoto_s2 = $row[0]."|".$row[1]."|".$row[2]."|".$row[3];
	} else {
		callmsg("��(��)��ID�Ų����ڣ����飡","-1");
	}
	$nicknamesexgradephoto_s = $cook_nickname."|".$cook_sex."|".$cook_grade."|".$cook_photo_s;
	$db->query("UPDATE ".__TBL_STORY__." SET userid='$cook_userid',nicknamesexgradephoto_s='$nicknamesexgradephoto_s',userid2='$userid2',nicknamesexgradephoto_s2='$nicknamesexgradephoto_s2',sussflag='$sussflag',title='$title',content='$content' WHERE id='$fid'");
	header("Location: g_story.php?submitok=list&p=".$p);
} elseif ($submitok=="delupdate") {
	if (!ereg("^[0-9]{1,9}$",$fid) || empty($fid))callmsg("fid����","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_STORY__." WHERE id=".$fid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$memberid = $row[0];
		if ($memberid !== $cook_userid)callmsg("Forbidden!","-1");
	} else {
		callmsg("Forbidden!","-1");
	}
	$rt = $db->query("SELECT path_s,path_b FROM ".__TBL_STORY_PHOTO__." WHERE fid='$fid'");
	$total = $db->num_rows($rt);
	if($total>0){
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$path1    = $rows[0];
			$path2    = $rows[1];
			if (file_exists(YZLOVE."up/photo/".$path1))unlink(YZLOVE."up/photo/".$path1);
			if (file_exists(YZLOVE."up/photo/".$path2))unlink(YZLOVE."up/photo/".$path2);
		}
	}
	$db->query("DELETE FROM ".__TBL_STORY_PHOTO__." WHERE fid=".$fid);
	$db->query("DELETE FROM ".__TBL_STORY_BBS__." WHERE fid=".$fid);
	$db->query("DELETE FROM ".__TBL_STORY__." WHERE id=".$fid);
	header("Location: g_story.php?submitok=list&p=".$p);
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
<li <?php if ($submitok == "list" || $submitok == "mod")echo "class='liselect'"; ?>><a href="g_story.php?submitok=list">�ҵĹ���</a></li>
<li <?php if ($submitok == "add")echo "class='liselect'"; ?>><a href="g_story.php?submitok=add">��������</a></li>
</ul>
<div class="main2">
<div class="main2_frame">
<?php if ($submitok=="add") { ?>
      <table width="520" border="0" cellpadding="8" cellspacing="1" bgcolor="FFD0E7" style="margin:20px 0 0 0">
        <tr>
          <td bgcolor="FFF0F7" style="line-height:20px;"><font color="FF6C96"><img src="images/tips3.gif"  hspace="5" vspace="3" align="absmiddle">��¼������<?php echo $Global['m_sitename'] ?>��ʶ��֪�మ��ÿһ���㼣��Ϊ��������һĨ������ɫ�ʣ������ĳɹ�ȥ�����������Ѱ�ٵ����ѣ��ô��һ���֤���ǵİ��飡<br>
          ����Ʒ����������ۣ���ζѰ�����ó̡�<?php echo $Global['m_sitename'] ?>�ڴ��������Ҹ��������Ҹ���</font></td>
        </tr>
      </table>
      <br>
      <table width="540" height="204" border="0" cellpadding="2" cellspacing="0" bgcolor="efefef" style="border:#dddddd 0px solid;">
<script language="javascript">
function chkform(){
if(document.yzloveform.userid2.value==""){
alert('��������/����ID�ţ�');
document.yzloveform.userid2.focus();
return false;
}
if(document.yzloveform.sussflag.value==""){
alert('��ѡ������������');
document.yzloveform.sussflag.focus();
return false;
}
if(document.yzloveform.title.value==""){
alert('�������������');
document.yzloveform.title.focus();
return false;
}
if(document.yzloveform.content.value==""){
alert('�������������');
document.yzloveform.content.focus();
return false;
}
if(document.yzloveform.content.value.length<10 || document.yzloveform.content.value.length>10000){
alert('�������ݳ���Ҫ��20-10000��ĸ��10-5000��֮�� ');
document.yzloveform.content.focus();
return false;
}
}
</script>
        <form action="g_story.php" method="post" name="yzloveform" onSubmit="return chkform()">
          <tr>
            <td height="30" align="right" bgcolor="#FFFFFF"><font color="6699CC"><?php if ($cook_sex == 1){echo '��';}else{echo '��';} ?>��ID�ţ�</font></td>
            <td width="454" bgcolor="#FFFFFF"><input name="userid2" type="text" class="input" id="userid2" size="8" maxlength="9" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
              ��
            [<a href="###" title="�� ����ߵĿ�������Ta��ID�ţ������û���Ҳ�����ǳ�Ӵ��<br>�� ���磺�������õĻ�Ա������ҳ��ַΪ �� <?php echo $Global['home_2domain']; ?>/<font color=blue>1688</font> ��<br>��ô����˵�ID�ž��������ַ�������Ǹ����� �� <font color=blue>1688</font> �� ��" class=uDF2C91>����</a>]</td>
          </tr>
          <tr>
            <td width="78" height="30" align="right" bgcolor="#FFFFFF"><font color="6699CC">����������</font></td>
            <td bgcolor="#FFFFFF"><select name="sussflag" id="sussflag">
              <option value="">ѡ��</option>
              <option value="1">Լ����</option>
              <option value="2">������</option>
              <option value="3">������</option>
              <option value="4">������</option>
              <option value="5">�����</option>
            </select>            </td>
          </tr>
          <tr>
            <td width="78" height="30" align="right" bgcolor="#FFFFFF"><font color="6699CC">�������⣺</font></td>
            <td bgcolor="#FFFFFF"><font color="#666666">
              <input name="title" type="text" class="input" id="title" size="65" maxlength="60" />
            </font></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#FFFFFF"><font color="6699CC">�������ݣ�</font></td>
            <td valign="top" bgcolor="#FFFFFF"><font color="#999999">���ݳ���Ҫ��20-10000��ĸ��10-5000��֮�� </font></td>
          </tr>
          <tr>
            <td colspan="2" align="center" valign="top" bgcolor="#FFFFFF"><font color="#666666">
              <textarea name="content" cols="80" rows="15" id="content" style="font-size:9pt;"></textarea>
            </font></td>
          </tr>
          <tr>
            <td height="27" colspan="2" align="center" bgcolor="#FFFFFF"><font color="#999999">&nbsp;</font>
              <input name="submitok" type="hidden" value="addupdate">
            <input type="submit" name="Submit" value=" �ύ " class="button"></td>
          </tr>
          <tr>
            <td height="50" colspan="2" align="center" bgcolor="#FFFFFF"><img src="images/tips3.gif" hspace="5" align="absmiddle"><b><font color="#FF0000">ע</font></b><font color="#999999">�������ύ���ɹ���Ա�ֹ���ˣ������ϴ��κκ��в�����Ϣ��ͼƬ�����֣�лл֧�֡� </font></td>
          </tr>
        </form>
      </table>
      <br>
      <br>
      <br>
      <?php } elseif ($submitok=="mod") {?>
<?php
if ( !ereg("^[0-9]{1,8}$",$fid) || $fid == 0 ){
	callmsg("��������ȷ��","-1");
} else {
	$rt = $db->query("SELECT userid2,sussflag,title,content FROM ".__TBL_STORY__." WHERE id='$fid'");
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$userid2 = $row[0];
		$sussflag = $row[1];
		$title = $row[2];
		$content = $row[3];
	} else {
		callmsg("�óɹ����²����ڻ��ѱ�ɾ����","-1");
		exit;
	}
}
?>
      <br>
      <table width="540" height="204" border="0" cellpadding="2" cellspacing="0" bgcolor="efefef" style="border:#dddddd 0px solid;">
<script language="javascript">
function chkform(){
if(document.yzloveform.userid2.value==""){
alert('��������/����ID�ţ�');
document.yzloveform.userid2.focus();
return false;
}
if(document.yzloveform.sussflag.value==""){
alert('��ѡ������������');
document.yzloveform.sussflag.focus();
return false;
}
if(document.yzloveform.title.value==""){
alert('�������������');
document.yzloveform.title.focus();
return false;
}
if(document.yzloveform.content.value==""){
alert('�������������');
document.yzloveform.content.focus();
return false;
}
if(document.yzloveform.content.value.length<10 || document.yzloveform.content.value.length>10000){
alert('�������ݳ���Ҫ��20-10000��ĸ��10-5000��֮�� ');
document.yzloveform.content.focus();
return false;
}
}
</script>
        <form action="g_story.php" method="post" name="yzloveform" onSubmit="return chkform()">
          <tr>
            <td height="30" align="right" bgcolor="#FFFFFF"><font color="6699CC">
              <?php if ($cook_sex == 1){echo '��';}else{echo '��';} ?>��ID�ţ�</font></td>
            <td width="454" bgcolor="#FFFFFF"><input name="userid2" type="text" class="input" id="userid2" value="<?php echo $userid2; ?>" size="8" maxlength="9" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >����[<a href="#" title="������ߵĿ�������Ta��ID�ţ������û���Ҳ�����ǳ�Ӵ��<br>�����磺�������õĻ�Ա������ҳ��ַΪ �� <?php echo $Global['home_2domain']; ?>/<font color=blue>1688</font> ��<br>��ô����˵�ID�ž��������ַ�������Ǹ����� �� <font color=blue>1688</font> �� ��" class=uDF2C91>����</a>]</td>
          </tr>
          <tr>
            <td width="78" height="30" align="right" bgcolor="#FFFFFF"><font color="6699CC">����������</font></td>
            <td bgcolor="#FFFFFF"><select name="sussflag">
                <option value="">ѡ��</option>
                <option value="1" <?php if ($sussflag == 1)echo 'selected'; ?>>Լ����</option>
                <option value="2" <?php if ($sussflag == 2)echo 'selected'; ?>>������</option>
                <option value="3" <?php if ($sussflag == 3)echo 'selected'; ?>>������</option>
                <option value="4" <?php if ($sussflag == 4)echo 'selected'; ?>>������</option>
                <option value="5" <?php if ($sussflag == 5)echo 'selected'; ?>>�����</option>
              </select>
            </td>
          </tr>
          <tr>
            <td width="78" height="30" align="right" bgcolor="#FFFFFF"><font color="6699CC">�������⣺</font></td>
            <td bgcolor="#FFFFFF"><font color="#666666">
              <input name="title" type="text" class="input" size="65" maxlength="60" value="<?php echo stripslashes($title)?>">
            </font></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#FFFFFF"><font color="6699CC">�������ݣ�</font></td>
            <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center" valign="top" bgcolor="#FFFFFF"><font color="#666666">
              <textarea name="content" cols="80" rows="15"><?php echo stripslashes($content)?></textarea>
            </font></td>
          </tr>
          <tr>
            <td height="27" colspan="2" align="center" bgcolor="#FFFFFF">
<input name="submitok" type="hidden" value="modupdate">
<input name="fid" type="hidden" value="<?php echo $fid; ?>">
<input name="p" type="hidden" value="<?php echo $p; ?>">
<input type="submit" name="Submit" value=" �ύ " class="button"></td>
          </tr>
          <tr>
            <td height="50" colspan="2" align="center" bgcolor="#FFFFFF"><img src="images/tips3.gif" hspace="5" align="absmiddle"><b><font color="#FF0000">ע</font></b><font color="#999999">�������ύ���ɹ���Ա�ֹ���ˣ������ϴ��κκ��в�����Ϣ��ͼƬ�����֣�лл֧�֡� </font></td>
          </tr>
        </form>
      </table>
      <br>
      <br>
      <?php } elseif ($submitok=="list") {?>
<?php
//�б����ʼ
	$rt=$db->query("SELECT id,title,addtime,click,bbsnum,flag,ifjh FROM ".__TBL_STORY__." WHERE  userid='$cook_userid' ORDER BY id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
		echo "<table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=dddddd style='margin:50px 0 50px 0'><tr><td align=center bgcolor=efefef><font color=#999999>..������Ϣ..</font><br><br><img src=images/add.gif hspace=3 align=absbottom><a href=g_story.php?submitok=add class=uDF2C91>��˷���</a></td></tr></table>";
	} else {
		$pagesize=10;
		require_once YZLOVE.'sub/class.php';
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="680" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF" style="margin:20px 0 0 0">

        <tr>
          <td width="343" height="22" align="center" style="border-bottom:#ddd 1px solid"> �� �� �� ��</td>
          <td width="95" align="center" style="border-bottom:#ddd 1px solid">��������</td>
          <td width="46" align="center" style="border-bottom:#ddd 1px solid">����</td>
          <td width="54" align="center" style="border-bottom:#ddd 1px solid">ף������</td>
          <td width="52" align="center" style="border-bottom:#ddd 1px solid">�޸�</td>
          <td width="48" align="center" style="border-bottom:#ddd 1px solid">ɾ��</td>
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
          <td height="35" style="border-bottom:#E9E8E8 1px solid;padding-left:5px;"><a href="../story/detail.php?fid=<?php echo $rows['id'];?>" class=333333 target="_blank"><img src="images/groupren.gif" width="16" height="13" hspace="3" border="0"><?php echo stripslashes($rows['title']); ?></a><?php 
if ($rows['flag']==0)echo " <font color=red>δ��</font>";
if ($rows['ifjh']==1)echo " <img src=images/jh.gif alt='����'>";
?> <a href=g_story_photo_list.php?fid=<?php echo $rows['id']; ?>&storytitle=<?php echo stripslashes($rows['title']); ?>><img src="images/storyup.gif" alt="�ϴ����ǵ�������Ƭ" width="69" height="21" border="0"></a></td>
          <td height="35" style="border-bottom:#E9E8E8 1px solid;padding-left:5px;"><font color="#999999"><?php echo date_format2($rows['addtime'],'%Y��%m��%d��');?></font></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><font color="#FF0000"><?php echo $rows['click']; ?></font></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><font color="#FF0000"><?php echo $rows['bbsnum']; ?></font></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><a href="g_story.php?submitok=mod&fid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>" class=666666><img src="images/modx.gif" hspace="3" border="0" align="absmiddle">�޸�</a></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><a href="g_story.php?submitok=delupdate&fid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>" onClick="return confirm('�� �� �� ��\n\n��ȷ��ɾ����\n\n�˲���������ɾ��������ȫ����Ƭ��ף�����ԡ����ò��ûָ���\n\n�����޸ġ�')" class=666666><img src="images/delx.gif" hspace="3" border="0">ɾ��</a></td>
        </tr>
        <?php }?>
    </table>
      <table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="587" height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        </tr>
    </table>
    <?php //lise end
			 }}?>
</div></div>


<div style="display:none;border:1px solid #000000;background-color:#FFFFCC;font-size:12px;position:absolute;padding:2;" id="_altlayer"></div>
<SCRIPT LANGUAGE="JavaScript">
document.body.onmousemove=quickalt;
document.body.onmouseover=getalt;
document.body.onmouseout=restorealt;
var tempalt='';
var UA=navigator.userAgent.toLowerCase();
var ISIE=(UA.indexOf("msie") > 0);
function $(hw_){return document.getElementById(hw_);}
function _Move(evn,o){
    _bW=document.body.clientWidth;
    _left1=document.body.scrollLeft+evn.clientX+10;
    _oW=o.offsetWidth;
    _left=((evn.clientX+_oW)>_bW)?(_left1-_oW-10):_left1;
    if((evn.clientX+_oW)>_bW){_left=(_oW<evn.clientX)?(_left1-_oW-10):_left1;}

    _bH=document.body.clientHeight;
    _top1=document.body.scrollTop+evn.clientY+6;
    _oH=o.offsetHeight;
    _top=((evn.clientY+_oH)>_bH)?(_top1-_oH-6):_top1;
    if((evn.clientY+_oH)>_bH){_top1=(_oH<evn.clientY)?(_top1-_oH-6):_top1;}
    o.style.left=_left;
    o.style.top=_top;
}
function getalt(hw_){
    if(ISIE){evn=event}else{evn=hw_}
    var eo = evn.srcElement?evn.srcElement:evn.target;
    if(eo.title && (eo.title!=""|| (eo.title=="" && tempalt!=""))){
        o = $("_altlayer");
        _Move(evn,o);
        o.style.display='';
        tempalt=eo.title;
        tempbg=eo.getAttribute("altbg");
        tempcolor=eo.getAttribute("altcolor");
        tempborder=eo.getAttribute("altborder");
        eo.title='';
        o.innerHTML=tempalt;
        if (tempbg!=null){o.style.background=tempbg}else{o.style.background="infobackground"}
        if (tempcolor!=null){o.style.color=tempcolor}else{o.style.color=tempcolor="infotext"}
        if (tempborder!=null){o.style.border="1px solid "+tempborder;}else{o.style.border="1px solid #000000";}
    }
}
function quickalt(hw_){
    if(ISIE){evn=event}else{evn=hw_}
    o = $("_altlayer");
    if(o.style.display==""){
        _Move(evn,o);
    }
}
function restorealt(hw_){
    if(ISIE){evn=event}else{evn=hw_}
    var eo = evn.srcElement?evn.srcElement:evn.target;
    eo.title=tempalt;
    tempalt="";
    $("_altlayer").style.display="none";
}
</SCRIPT>
<?php require_once YZLOVE.'my/bottommy.php';?>