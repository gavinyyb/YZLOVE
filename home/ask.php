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
if ( !ereg("^[0-9]{1,9}$",$fid) || empty($fid) )callmsg("������󣬸���Ϣ�����ڻ��ѱ�ɾ����","-1");
require_once YZLOVE.'sub/conn.php';
switch ($submitok){ 
	case 'bbsaddupdate':
		if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid) || !ereg("^[0-9]{1,9}$",$uid) || empty($uid)) {
		callmsg("ֻ�б�վ��Ա�ſ��Է��������ȵ�¼��վ��","-1");
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("ֻ�б�վ��Ա�ſ��Է��������ȵ�¼��վ��","-1");
			exit;
		}}
		if ($cook_grade != 10){
			$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$cook_userid." AND senduserid=".$uid." AND ifhmd=1");
			if ($db->num_rows($rt)) {
				callmsg("�Է��ѽ�����Ϊ������������Ҫ��İ�����","-1");
				exit;
			}
		}
		if (strlen($content)<1 || strlen($content)>4000)callmsg("�����ݡ��������1~4000�ֽ����ڡ�","-1");
		$rt = $db->query("SELECT userid,flag FROM ".__TBL_ASK__." WHERE flag>0 AND id=".$fid);
		if(!$db->num_rows($rt)) {
			callmsg("�����ⲻ���ڻ��ѱ�ɾ����","0");
		} else {
			$rows = $db->fetch_array($rt);
			if ($rows[1]>1) {
				switch ($rows[1]){
					case '2':$tempvar = "�ѽ��";break;
					case '3':$tempvar = "�ѹ���";break;
					case '4':$tempvar = "�ѳ���";break;
					case '5':$tempvar = "������ش�";break;
				}
				callmsg("������������״̬���ܻش�\\n 1���ѽ��\\n 2���ѹ���\\n 3���ѳ���\\n 4��������ش�\\n_________________\\n\\n��ǰ״̬��$tempvar","-1");
			}
			if ($rows[0]==$cook_userid)callmsg("���Ѳ��ܻش����ѣ��������޸����ⲹ��˵����","-1");
			$rt = $db->query("SELECT id FROM ".__TBL_ASK_BBS__." WHERE userid=".$cook_userid." AND fid=".$fid);
			if($db->num_rows($rt))callmsg("���Ѿ��ش���ˣ�����ֻ���޸���Ļش�","-1");
			$addtime = date("Y-m-d H:i:s");
			$db->query("INSERT INTO ".__TBL_ASK_BBS__."  (fid,content,userid,addtime) VALUES ($fid,'$content',$cook_userid,'$addtime')");
			$db->query("UPDATE ".__TBL_ASK__." SET hfnum=hfnum+1 WHERE id=".$fid);
			header("Location: ask.php?fid=".$fid."&p=".$redirectpage);
		}
	break;
	case 'bbsmodupdate':
		if ( !ereg("^[0-9]{1,10}$",$bbsid) || $bbsid == 0 )callmsg("��������ȷ��","-1");
		if (strlen(content)>4000 || strlen($content)<1)callmsg("�ش����ݹ������٣��������1~4000�ֽ�����","-1");
		$rt = $db->query("SELECT id,flag FROM ".__TBL_ASK__." WHERE flag>0 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("�����ⲻ���ڻ��ѱ�ɾ����","0");
		$row = $db->fetch_array($rt);
		if ($row[1]>1) {
			switch ($row[1]){
				case '2':$tempvar = "�ѽ��";break;
				case '3':$tempvar = "�ѹ���";break;
				case '4':$tempvar = "�ѳ���";break;
				case '5':$tempvar = "������ش�";break;
			}
			callmsg("������������״̬�����޸ģ�\\n 1���ѽ��\\n 2���ѹ���\\n 3���ѳ���\\n 4��������ش�\\n_________________\\n\\n��ǰ״̬��$tempvar","-1");
		}
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK_BBS__." WHERE id=".$bbsid);
		if(!$db->num_rows($rt))callmsg("�ûش𲻴��ڻ��ѱ�ɾ����","0");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$db->query("UPDATE ".__TBL_ASK_BBS__." SET content='$content' WHERE id=".$bbsid);
		header("Location: ask.php?fid=".$fid."&p=".$p);
	break;
	case 'bbsbestupdate':
		if ( !ereg("^[0-9]{1,10}$",$bbsid) || $bbsid == 0 )callmsg("Forbidden","-1");
		$addtime=date("Y-m-d H:i:s");
		$rt = $db->query("SELECT userid,xsloveb FROM ".__TBL_ASK__." WHERE flag=1 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("�����ⲻ���ڻ��ѱ�ɾ�����ѱ�����","-1");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$addbestloveb = $row[1];
		$addbestloveb = $addbestloveb+$Global['m_askloveb'];
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK_BBS__." WHERE id=".$bbsid);
		if(!$db->num_rows($rt))callmsg("�ûش𲻴��ڻ��ѱ�ɾ����","0");
		$row = $db->fetch_array($rt);
		$adduserid = $row[0];
		//$addnickname = $row[1];
		$tmploveb = $Global['m_askloveb'];
		$db->query("UPDATE ".__TBL_ASK__." SET flag=2 WHERE id=".$fid);
		$db->query("UPDATE ".__TBL_ASK_BBS__." SET ifbest=1 WHERE id=".$bbsid);
		$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+".$addbestloveb." WHERE id=".$adduserid);
		$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$adduserid','$addnickname','�ش�����Ѵ�+ϵͳ����$tmploveb','$addbestloveb','$addtime')");
		header("Location: ask.php?fid=".$fid."&p=".$p);
	break;
	case 'bcupdate':
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
			callmsg("�����ȵ�¼��վ��",$Global['www_2domain']);
			exit;
		} else {
			$cook_password = trimm($cook_password);
			$rtglobal = $db->query("SELECT mbkind FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
			if (!$db->num_rows($rtglobal)) {
				callmsg("�����ȵ�¼��վ��",$Global['www_2domain']);
				exit;
			}
		}
		if (strlen($content2)>4000 || strlen($content2)<1)callmsg("���ⲹ��˵�����ݹ������٣��������1~4000�ֽ�����","-1");
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag>0 AND id='$fid'");
		if(!$db->num_rows($rt))callmsg("�����ⲻ���ڻ��ѱ�ɾ����","0");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden!",$Global['www_2domain']);
		$db->query("UPDATE ".__TBL_ASK__." SET content2='$content2' WHERE id=".$fid);
		callmsg("���ⲹ��ɹ���","ask".$fid.".html");
	break;
	case 'addxslovebupdate':
		if ( !ereg("^[0-9]{1,4}$",$num) || $num == 0 || $num>5000)callmsg("������һ������0С��5000����Ч���֣�","-1");
		$str = intval($num);
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
		callmsg("�����ȵ�¼��վ��",$Global['www_2domain']);
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("�����ȵ�¼��վ��",$Global['www_2domain']);
			exit;
		}
		}
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag=1 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("�����ⲻ���ڻ��ѱ�ɾ�����ѱ�����","-1");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$rt = $db->query("SELECT loveb FROM ".__TBL_MAIN__." WHERE id=".$cook_userid);
		if(!$db->num_rows($rt))callmsg("Forbidden","-1");
		$row = $db->fetch_array($rt);
		$temploveb = $row[0];
		if ($temploveb<$str){
			callmsg("���Love�Ҳ���".$str."������������ʧ�ܣ�","-1");
		}else{
			$db->query("UPDATE ".__TBL_ASK__." SET xsloveb=xsloveb+".$str." WHERE id=".$fid);
			$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb-".$str." WHERE id=".$cook_userid);
		}
		$addtime2=date("Y-m-d H:i:s");
		$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$cook_userid','$cook_username','��������','-$str','$addtime2')");
		header("Location: ask".$fid.".html");
	break;
	break;
	case 'passqustionupdate':
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
		callmsg("�����ȵ�¼��վ��",$Global['www_2domain']);
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("�����ȵ�¼��վ��",$Global['www_2domain']);
			exit;
		}
		}
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag=1 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("�����ⲻ���ڻ��ѱ�ɾ�����ѱ�����","-1");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$db->query("UPDATE ".__TBL_ASK__." SET flag=4 WHERE id=".$fid);
		header("Location: ask".$fid.".html");
	break;
	case 'nosatisfactoryupdate':
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
		callmsg("�����ȵ�¼��վ��",$Global['www_2domain']);
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("�����ȵ�¼��վ��",$Global['www_2domain']);
			exit;
		}		}
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag=1 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("�����ⲻ���ڻ��ѱ�ɾ�����ѱ�����","-1");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$db->query("UPDATE ".__TBL_ASK__." SET flag=5 WHERE id=".$fid);
		header("Location: ask".$fid.".html");
	break;
	default:
		$rt = $db->query("SELECT a.id,a.username,a.nickname,a.grade,a.loveb,a.alltime,a.logincount,a.mbkind,a.mbtitle,a.magic,a.bgpic,a.sex,a.photo_s,a.click,b.title,b.content,b.content2,b.xsloveb,b.addtime,b.click as askclick,b.hfnum,b.flag,b.ifjh FROM ".__TBL_MAIN__." a,".__TBL_ASK__." b WHERE a.id=b.userid  AND a.flag=1 AND b.ifopen=1 AND b.id=".$fid);
		if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$uid         = $row['id'];
		$username    = $row['username'];
		$nickname    = $row['nickname'];
		$grade       = $row['grade'];
		$loveb       = $row['loveb'];
		$alltime     = $row['alltime'];
		$logincount     = $row['logincount'];
		$mbkind      = $row['mbkind'];
		$mbtitle     = $row['mbtitle'];
		//$magic       = $row['magic'];
		$bgpic       = $row['bgpic'];
		$sex         = $row['sex'];
		$photo_s     = $row['photo_s'];
		$click       = $row['click'];
		$title           = htmlout(stripslashes($row['title']));
		$content         = htmlout(stripslashes($row['content']));
		$content2        = htmlout(stripslashes($row['content2']));
		$xsloveb         = $row['xsloveb'];
		$addtime         = $row['addtime'];
		$askclick        = '<font color=#ff0000>'.$row['askclick'].'</font>';
		$hfnum           = $row['hfnum'];
		$flag            = $row['flag'];
		$ifjh            = $row['ifjh'];
		} else {
		echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸���Ϣ���û������ڻ�δ��˻��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
		exit;}
		$db->query("UPDATE ".__TBL_ASK__." SET click=click+1 WHERE id=".$fid);
		//--1�����,2�ѽ��,3�ѹ���,4�ѳ���,5�������--//
		$d1 =  strtotime("now");
		$d2 = strtotime($addtime);
		$totals  = ($d2+2592000-$d1);
		$day     = intval( $totals/86400 );
		$hour    = intval(($totals % 86400)/3600);
		$hourmod = ($totals % 86400)/3600 - $hour;
		$minute  = intval($hourmod*60);
		if ($flag==1){
			if (($d1-$d2) < 2592000) {
				$addtime = "�����������ʣ <font color=#ff0000>$day</font> �� <font color=#ff0000>$hour</font> Сʱ <font color=#ff0000>$minute</font> ����";
			} else {
				$db->query("UPDATE ".__TBL_ASK__." SET flag=3 WHERE id=".$fid);
				$rt8 = $db->query("SELECT loveb FROM ".__TBL_MAIN__." WHERE id=".$uid);
				if(!$db->num_rows($rt8))callmsg("Forbidden","-1");
				$row8 = $db->fetch_array($rt8);
				$myloveb = $row8[0];
				$subtractstudyb = $xsloveb*10;
				if ($myloveb>=$subtractstudyb){
					$addtime=date("Y-m-d H:i:s");
					$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb-'$subtractstudyb' WHERE id=".$uid);
					$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$uid','$username','��������δ����-$subtractstudyb','-$subtractstudyb','$addtime')");
				}else{
					$db->query("UPDATE ".__TBL_MAIN__." SET loveb=0 WHERE id=".$uid);
				}
				$addtime = "����ʱ�䣺".$addtime;
			}
		} else {
			$addtime = "����ʱ�䣺".$addtime;
		}
		if ( ($cook_userid == $uid) && ($flag==1) ){
			$ifmainedit=1;
		} else {$ifmainedit=0;}
	break;
}
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?php echo $title;?>,<?php echo $nickname;?>�ռ�,<?php echo $nickname;?>����">
<meta name="description" content="<?php echo $title;?>">
<title><?php echo $title;?> | <?php echo $nickname;?>�Ĳ���,����</title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homex.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/ask.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
<div class="left">
<?php require_once YZLOVE.'home/leftx.php'?>
<?php require_once YZLOVE.'home/left_ad.html'?>
</div>
<div class="right">
<div class="rightTitle"><h4>�ҵĲ���</h4><a href="myask<?php echo $uid; ?>.html">>>���ಡ��</a></div>
<div class="rightContent ul2">
	<h5><?php if ($ifjh == 1)echo "<img src='images/jh.gif' />"; ?> <?php echo $title; ?> <?php 
switch ($flag){ 
	case 0:echo "<font color=#ff0000>(δ��)</font>";break;
	case 1:echo "<img src=images/$mbkind/56.gif>";break;
	case 2:echo "<img src=images/$mbkind/57.gif>";break;
	case 3:echo "<img src=images/$mbkind/58.gif>";break;
	case 4:echo "<img src=images/$mbkind/59.gif>";break;
	case 5:echo "<img src=images/$mbkind/60.gif>";break;
}
?></h5>
	<div class="diaryTips">���ͷ�<img src="images/loveb.gif" hspace="3" align="absmiddle">��<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><b><?php echo $xsloveb; ?></b>Love��</font>��<img src="images/ask_clock.gif" width="12" height="12" hspace="3" align="absmiddle"><?php echo $addtime; ?></div>
	<div class="diaryTips" style="margin:8px 0 0 0">( ���� <font color="#FF0000"> <?php echo $hfnum; ?></font> �������<font color="#FF0000"> <?php echo $askclick; ?></font> �� )��<img src="images/pl.gif" width="20" height="20" align="absmiddle"><?php if ( $flag == 1) {echo "<a href='#content' class=ub666>������������</a>";}else{echo "<a href='#contentbbs' class=ub666>�鿴����</a>";}?></div>
	<!--�� -->
<?php if ($uid == $cook_userid && $flag == 1) {?>
	<div class="askManage">
	<div class="askManageT">��ز���:</div>
	<div class="askManageD">
	<a href="#content2" class=A9BU_tiaose>��������</a>��|��<a href=ask.php?submitok=addxsloveb&fid=<?php echo $fid;?> class="A9BU_tiaose"><?php if ($submitok == 'addxsloveb') {echo '<b><font color=#ff6600>��������</font></b>';} else {echo '<b>��������</b>';}?></a>��|��<a href="ask.php?submitok=passqustionupdate&fid=<?php echo $fid; ?>" onClick="return confirm('�� �� �� ��\n\n�������Ҫ������������')" class=A9BU_tiaose>��������</a>��|��<a href="ask.php?submitok=nosatisfactoryupdate&fid=<?php echo $fid; ?>" onClick="return confirm('�� �� �� ��\n\n������İѸ�������Ϊ������ش���')" class=A9BU_tiaose>������ش�</a>
	<?php if ($submitok == 'addxsloveb') {?>
	<div class="askManageForm">
		<form action="ask<?php echo $fid;?>.html" method="post">
		������������:
		  <input name="num" type="text" id="num" style="border:#ccc 1px solid;" size="5" maxlength="5" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" >
		<input type="submit" value="��������" class="buttonx">
		<input name="submitok" type="hidden" value="addxslovebupdate">
		</form>
	</div>
	<?php }?>
	<div class="clear"></div>
	</div>
	</div>
<?php }?>
	<!-- ���� -->
	<div class="diaryContent"><?php echo $content; ?></div>
	<?php if ($ifmainedit==1) { ?>
	<div class="askAnswer">
		<h1>���ⲹ�䣺</h1>
		<div align=center style="margin:0 0 20px 0;">
			<form action="ask<?php echo $fid; ?>.html" method="post">
			<textarea name="content2" rows="8" class="asktareamod"><?php echo $content2; ?></textarea><br>
			<input name="submitok" type="hidden" value="bcupdate">
			<input type="submit" class="buttonx" value=" �� �� ">
			</form>
		</div>
	</div>
	<?php } else {  ?>
	<div class="askAnswer" style="margin-bottom:20px">
		<h1>���ⲹ�䣺</h1>
		<?php
		if (empty($content2)) {
			echo "���޲�������";
		} else {
			echo $content2;
		}
		?>
	</div>
	<?php }?>
	
	<div class="diaryAd">
		<div class="diaryAdL">�����ַ���ƣ�</div>
		<div class="diaryAdR">
	<script>
	function copyCode(o){o.select();var js=o.createTextRange();js.execCommand("Copy");alert("���Ƴɹ�������QQ�ϵĺ��Ѱɣ�");}document.write("<textarea onfocus=this.select() style='width:294px;height:14px;overflow-y:hidden;font-size:9pt;' class='copyCode' onclick=copyCode(this) rows=1>");document.write(self.location+"</textarea>");
	</script>
		</div>
	</div>
	<div class="clear"></div>
	<div class="diaryAd">
	<div class="diaryAdL"></div>
	<div class="diaryAdR">[����ҳ��ַ��,ͨ��QQ��MSN����������]</div>
	</div>
	<div class="clear"></div>
	<div class="diaryAd" style="margin-top:10px;margin-bottom:20px">
<a href="#content" class=A9BU_tiaose>����������</a> | <a href="<?php echo $Global['my_2domain']; ?>/?h_ask_favorite.php?fid=<?php echo $fid; ?>&submitok=addupdate" class=A9BU_tiaose>�ղش˲���</a>  | <a href="<?php echo $Global['my_2domain']; ?>/?h_ask.php?submitok=add" class=A9BU_tiaose>�Һſ���</a>
	</div>
	<div class="clear"></div>
</div>
<div class="rightTitle" style="margin:10px 0 0 0"><h4>���Ѵ���</h4><a href="#content">>>�����ش�</a></div>
<a name="#contentbbs"></a>
<div class="rightContent<?php if ($flag!=1)echo " ul2";?>">
<?php
$rt=$db->query("SELECT a.nickname,a.grade,a.sex,a.photo_s,b.id,b.content,b.userid,b.addtime,b.ifbest,b.flag FROM ".__TBL_MAIN__." a,".__TBL_ASK_BBS__." b WHERE b.fid=".$fid." AND a.id=b.userid ORDER BY b.id");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/class.php';
$pagesize = 20;
if ($p<1)$p=1;
$pagemax = ceil($total / $pagesize);
if ($total % $pagesize == 0){
	$redirectpage = $pagemax+1;
} else {
	$redirectpage = $pagemax;
}
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($p == 1){$n = $i;} else {$n = $i+$pagesize*($p-1);}
?>
	<div class="bbs">
		<div class="bbsL">
		
<a href="<?php echo $Global['home_2domain'];?>/<?php echo $rows['userid']; ?>" target="_blank">
<?php 
if (empty($rows['photo_s'])){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$rows['sex'].".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$rows['photo_s']." width=41 height=50 border=0>";
}
?></a>		</div>
		<div class="bbsR">
			<div class="bbsR1"><?php echo geticon($rows['sex'].$rows['grade']);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $rows['userid']; ?>"  target=_blank><?php if ( $rows['sex'] == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo $rows['nickname'];?></font></a>�������ڣ�<?php echo $rows['addtime'];?></div>
			<div class="bbsR2">��<font color="#FF0000"><?php echo $n;?></font>¥</div>
			<div class="bbsR3">
			<?php if ( ($rows['userid'] == $cook_userid) && ($flag == 1) ) {?>
				<div align=center style="margin:0 0 20px 0">
					<form action="ask<?php echo $fid; ?>.html" method="post">
					<textarea name="content" rows="8" class="asktareamod"><?php echo $rows['content']; ?></textarea><br>
					<input name="fid" type="hidden" value="<?php echo $fid; ?>" />
					<input name="uid" type="hidden" value="<?php echo $uid; ?>" />
					<input name="bbsid" type="hidden" value="<?php echo $rows['id']; ?>" />
					<input name="p" type="hidden" value="<?php echo $p; ?>" />
					<input name="submitok" type="hidden" value="bbsmodupdate" />
					<input type="submit" class="buttonx" value=" �� �� ">
					</form>
				</div>
			<?php
			} else {
				if ($rows['ifbest']==1)echo "<img src=images/$mbkind/nb.gif title=��Ѵ�><b><font color=red style=font-size:10.3pt;>(��Ѵ�)</font></b>";
				if ($rows['flag'] == 1) {
					echo htmlout(stripslashes($rows['content']));
				} else {
					echo "<font color=#999999>�ô����ѱ������ɾ����</font>";
				}
			}
			?>
			</div>
			<?php if ( ($uid == $cook_userid) && ($flag == 1) ) {?>
			<div class="bbsR3" style="text-align:right;display:block;CURSOR:hand">
<form action="ask<?php echo $fid; ?>.html" method="post" onClick="return confirm('�� �� �� ��\n\n������İѸô�����Ϊ��Ѵ���')">
<input name="bbsid" type="hidden" value="<?php echo $rows['id']; ?>" />
<input name="p" type="hidden" value="<?php echo $p; ?>" />
<input name="fid" type="hidden" value="<?php echo $fid; ?>" />
<input name="addnickname" type="hidden" value="<?php echo $rows['nickname']; ?>" />
<input name="submitok" type="hidden" value="bbsbestupdate" />
<input type="image" src="images/<?php echo $mbkind; ?>/best.gif" />
</form>
			</div>
			<?php }?>
		</div>
		<div class="clear"></div>
	</div>
<?php }?>
	<?php if($total>$pagesize){?><div class=pageshow><?php echo $pagelist; ?>��<?php echo $pagelistinfo; ?></div><?php }?>
<?php } else {?>
	<div class="nodata">...���޴���...</div>
<?php }?>
</div>
<?php if ( $flag == 1) {?>
<div class="rightContent ul2">
		<div class="bbsaddT">
			<div class="bbsaddTL"><img src="images/pl.gif" hspace="3" align="absmiddle">����������</div>
			<div class="bbsaddTR">ֻ�л�Ա�ſ��Է���۵㣬<a href="<?php echo $Global['www_2domain'].'/login.php' ?>" class=ub666>��¼</a> / <a href="<?php echo $Global['www_2domain'].'/reg.php' ?>"  class=ub666>ע��</a></div>
		</div>
	  <div class="bbsaddT2">
<script language="javascript">
function chkform(){
	if(document.www_yzlove_com.content.value==""){
	alert('���������ݣ�');
	document.www_yzlove_com.content.focus();
	return false;
	}
}
</script>
		<form action="" method="post" name=www_yzlove_com onSubmit="return chkform()">
		<textarea name="content" cols="95" rows="8" id="content" class="asktarea"></textarea>
		<input type="submit" class="button" value=" �� �� ">
		<input type="hidden" name="fid" value="<?php echo $fid; ?>">
		<input type="hidden" name="uid" value="<?php echo $uid; ?>">
		<input type="hidden" name="submitok" value="bbsaddupdate">
		<input type="hidden" name="redirectpage" value="<?php echo $redirectpage; ?>">
		</form><br><br><a name="#bottom"></a>
	</div>
	</div>
<?php }?>
</div>
<div class="clear"></div>
</div>
<?php
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
}return $xingqi;} 
?>