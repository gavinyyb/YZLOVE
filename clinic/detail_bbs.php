<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid))callmsg("������󣬸���Ϣ�����ڣ�","-1");
switch ($submitok){ 
	case 'addupdate':
		$cook_userid  = $_COOKIE['cook_userid'];
		$cook_password = $_COOKIE['cook_password'];
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) ) {
		callmsg("ֻ�б�վ��Ա�ſ��Է��������ȵ�¼��վ��","-1");
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("ֻ�б�վ��Ա�ſ��Է��������ȵ�¼��վ��","-1");
			exit;
		}}
		if (strlen($content)<1 || strlen($content)>4000)callmsg("�����ݡ��������1~4000�ֽ����ڡ�","-1");
		$rt = $db->query("SELECT userid,flag FROM ".__TBL_ASK__." WHERE flag>0 AND id='$fid'");
		if(!$db->num_rows($rt)) {
			callmsg("�����ⲻ���ڻ��ѱ�ɾ����","0");
		} else {
			$rows = $db->fetch_array($rt);
			$uid = $rows[0];
			if ($rows[1]>1) {
				switch ($rows[1]){
					case '2':$tempvar = "�ѽ��";break;
					case '3':$tempvar = "�ѹ���";break;
					case '4':$tempvar = "�ѳ���";break;
					case '5':$tempvar = "������ش�";break;
				}
				callmsg("������������״̬���ܻش�\\n 1���ѽ��\\n 2���ѹ���\\n 3���ѳ���\\n 4��������ش�\\n_________________\\n\\n��ǰ״̬��$tempvar","-1");
			}
			if ($cook_grade != 10){
			$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$cook_userid." AND senduserid=".$uid." AND ifhmd=1");
			if ($db->num_rows($rt)) {
				callmsg("�Է��ѽ�����Ϊ������������Ҫ��İ�����","-1");
				exit;
			}}
			if ($rows[0]==$cook_userid)callmsg("���Ѳ��ܻش����ѣ��������޸����ⲹ��˵����","-1");
			$rt = $db->query("SELECT id FROM ".__TBL_ASK_BBS__." WHERE userid='$cook_userid' AND fid='$fid'");
			if($db->num_rows($rt))callmsg("���Ѿ��ش���ˣ�����ֻ���޸���Ļش�","-1");
			$addtime = date("Y-m-d H:i:s");
			$db->query("INSERT INTO ".__TBL_ASK_BBS__."  (fid,content,userid,addtime) VALUES ($fid,'$content',$cook_userid,'$addtime')");
			$db->query("UPDATE ".__TBL_ASK__." SET hfnum=hfnum+1 WHERE id=".$fid);
			header("Location: detail_bbs.php?fid=".$fid."&p=".$redirectpage);
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
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK_BBS__." WHERE id='$bbsid'");
		if(!$db->num_rows($rt))callmsg("�ûش𲻴��ڻ��ѱ�ɾ����","0");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$db->query("UPDATE ".__TBL_ASK_BBS__." SET content='$content' WHERE id=".$bbsid);
		header("Location: detail_bbs.php?fid=".$fid."&p=".$p);
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
		$db->query("UPDATE ".__TBL_ASK__." SET flag=2 WHERE id=".$fid);
		$db->query("UPDATE ".__TBL_ASK_BBS__." SET ifbest=1 WHERE id=".$bbsid);
		$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+".$addbestloveb." WHERE id=".$adduserid);
		$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$adduserid','$addnickname','�ش�����Ѵ�+ϵͳ����$tmploveb','$addbestloveb','$addtime')");
		header("Location: detail_bbs.php?fid=".$fid."&p=".$p);
	break;
	default:
		$rt = $db->query("SELECT userid,xsloveb,flag FROM ".__TBL_ASK__." WHERE id=".$fid);
		if($db->num_rows($rt)){
			$row = $db->fetch_array($rt);
			$userid  = $row[0];
			$xsloveb = $row[1];
			$flag    = $row[2];
			switch ($flag){ 
				case 1:$flagP = "<img src=images/56.gif align=absmiddle>";break;
				case 2:$flagP = "<img src=images/57.gif align=absmiddle>";break;
				case 3:$flagP = "<img src=images/58.gif align=absmiddle>";break;
				case 4:$flagP = "<img src=images/59.gif align=absmiddle>";break;
				case 5:$flagP = "<img src=images/60.gif align=absmiddle>";break;
			}
		}
	break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>zeai2.0</title>
<style type="text/css"> 
/* public */
body{background-color:#fff;font-family:Verdana,����;font-size:12px;text-align:center;padding:0;margin:0px auto;color:#444}
ul,li,img,form,input{margin:0px;padding:0px;border:0px}
li{list-style-type:none}
.clear{clear:both;height:0;width:1px;font-size:1px;visibility:hidden;}
a{text-decoration:underline;color:#444;font-family:Verdana,����}
a:hover {text-decoration:underline;color:#DF2C91} 
.input{font-size:12px;color:#444;background:#F8FCF5;border:#ccc 1px solid;height:17px;font-family:Arial,����}
input{font-size:12px;color:#444;font-family:"Arial,����";}
select{font-size:12px;color:#444;background:#fff;}
.modtextarea{width:400px;font-size:14px;color:#444;background:#FEF9FB;border:#ccc 1px solid;padding:5px}
.replyextarea{width:696px;height:90px;color:#444;background:#f8f8f8;border:#f7dbe8 1px solid}
.buttonx{cursor:pointer!important;cursor:hand;background-image:url(/images/bg_btn2.gif);background-color:#FFF5E6; text-align:center; height:22px;padding:0px!important;padding-top:3px; border:1px solid #FF7E00;color:#000}
.button{cursor:pointer!important;cursor:hand;background-image:url(/images/bg_btn.gif);background-color:#FFF5E6;text-align:center; height:32px;width:80px;padding:0px!important;padding-top:3px; border:1px solid #FF7E00;color:#000;font-size:10.3pt;font-weight:bold;}
h6{display:block;width:200px;height:80px;line-height:80px;color:#999;margin:0px auto;padding:20px;font-family:Verdana;font-weight:bold;font-size:12px;border:#ddd 1px solid;background:#f8f8f8}
/* public end*/
.bt{width:700px;height:30px;margin:0px auto;color:#999;padding:20px 0 0 0}
.bt .btadd {float:left;width:500px;text-align:left}
.bt .btadd span{color:#f00}
.bt .btadd a{font-size:14px;text-decoration:underline;color:#FF4B7E;font-weight:bold}
.bt .btadd a:hover{color:#6F9F00}
.bt .btPage{float:right;width:155px;height:26px;text-align:right}
.bt .btPage .Pl{float:left}
.bt .btPage .Pr{float:right}
.li{width:688px;border:#ddd 1px solid;padding:5px;margin:0px auto;margin-bottom:10px;display:inline-block}
.li .L{float:left;width:65px;height:80px;margin:0 15px 0 0;background:#eee}
.li .L img{width:65px;height:80px}
.li .R{float:left;width:608px}
.li .R .tt{width:608px;height:30px}
.tt1,.tt2,.tt3{height:25px;padding:5px 0 0 0}
.li .R .tt .tt1{float:left}
.li .R .tt .tt2{float:left;width:200px;color:#666;height:23px;padding:7px 0 0 10px;text-align:left}
.li .R .tt .tt2 span{font-size:11px}
.li .R .tt .tt3{float:right;width:60px}
.li .R .tt .tt3 span{color:#f00}
.li .R .cc{width:600px;background:#feeef8;text-align:left;padding:4px;color:#333;font-size:14px;line-height:150%}
.li .R .cc .sp1{font-weight:bold;color:#f00}
.li .R .cc .sp2{color:#999}
.li .R .set{width:600px;text-align:right;padding:5px}
.page{width:700px;height:20px;padding:10px 0 0 0;margin:0px auto;margin-bottom:5px;text-align:right}
.page .Pl{float:left}
.page .Pr{float:right}


.reply{width:700px;height:180px;margin:0px auto}
.reply .rpy1{height:28px;background-image:url(images/replybg.gif);border:#f7dbe8 1px solid}
.lll,.rrr{height:28px;line-height:28px}
.reply .rpy1 .lll{float:left;color:#ea6eac;padding:0 0 0 8px}
.reply .rpy1 .lll span{color:#DF2C91;font-size:14px;font-weight:bold}
.reply .rpy1 .rrr{float:right;text-align:right;padding:0 10px 0 0;color:#ff84c2}
.reply .rpy1 .rrr a{text-decoration:underline;color:#DF2C91}
.reply .rpy1 .rrr a:hover{color:#f60}
.reply .rpy2{height:100px}
.reply .rpy3{height:40px;padding:10px 0 0 0}
</style>
</head>
<body onLoad="window.parent.document.getElementById('zeaibbs').style.height = document.body.scrollHeight + 'px'">
<?php 
$rt=$db->query("SELECT a.id,a.content,a.userid,a.addtime,a.ifbest,a.flag,b.nickname,b.grade,b.sex,b.photo_s FROM ".__TBL_ASK_BBS__." a,".__TBL_MAIN__." b WHERE a.fid=".$fid." AND a.userid=b.id ORDER BY a.id");
$total = $db->num_rows($rt);
if ($total > 0){
	require_once YZLOVE.'sub/classcool.php';
	$pagesize = 20;
	if ($p<1)$p=1;
	$mypage = new zeaipage($total,$pagesize);
	$pagelistX = $mypage->pagebar(2);
	$pagelist  = $mypage->pagebar();
	mysql_data_seek($rt,($p-1)*$pagesize);
}
?>
<div class="bt">
	<div class="btadd"><?php if ( $flag == 1) {?><a href="#content"><img src="images/commend.gif" align="absmiddle" />�����ش�</a>
     (��Ļش�һ�����ɼ������ͱ�<img src="images/lovebx.gif" /><span><?php echo $xsloveb; ?></span>��+��վ����<span><?php echo $Global['m_askloveb']; ?></span>love��)<?php } else {?>�ش��ѽ����������� <?php echo $flagP; ?><?php }?></div>
	<div class="btPage"><div class="Pl"></div><div class="Pr"><?php echo $pagelistX; ?></div></div>
</div>
<?php 
if ($total > 0){
	for($i=1;$i<=$pagesize;$i++) {
	$rowsbbs = $db->fetch_array($rt);
	if(!$rowsbbs) break;
	if ($p == 1){$n = $i;} else {$n = $i+$pagesize*($p-1);}
	$bbsid    = $rowsbbs[0];
	$content  = htmlout(badstr(stripslashes($rowsbbs[1])));
	$fuserid  = $rowsbbs[2];
	$addtime  = $rowsbbs[3];
	$ifbest   = $rowsbbs[4];
	$fflag     = $rowsbbs[5];
	$nickname = badstr($rowsbbs[6]);
	$grade    = $rowsbbs[7];
	$sex      = $rowsbbs[8];
	$photo_s  = $rowsbbs[9];
	$href = $Global['home_2domain'].'/'.$fuserid;
?>
<div class="li">
	<div class="L"><a href="<?php echo $href; ?>" target=_blank><?php if (empty($photo_s)){?><img src=<?php echo $Global['www_2domain'];?>/images/65x80<?php echo $sex; ?>.gif title="������Ƭ"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?> title="<?php echo $nickname.'������'; ?>"><?php }?></a></div>
	<div class="R">
		<div class="tt">
			<div class="tt1"><?php echo geticon($sex.$grade);echo '<a href='.$href.' target=_blank>'.$nickname.'</a>'; ?></div>
			<div class="tt2">�ش��ڣ�<span><?php echo $addtime; ?></span></div>
			<div class="tt3">��<span><?php echo $n;?></span>¥</div>
		</div>
		<div class="cc">
			<?php
			if ( ($fuserid == $cook_userid) && ($flag == 1) ) {?>
			<form action="detail_bbs.php" method="post"><textarea name="content" cols="40" rows="5" class=modtextarea><?php echo stripslashes($rowsbbs['content']) ?></textarea><input name="fid" type="hidden" value="<?php echo $fid; ?>" /><input name="bbsid" type="hidden" value="<?php echo $bbsid; ?>" /><input name="p" type="hidden" value="<?php echo $p; ?>" /><input name="submitok" type="hidden" value="bbsmodupdate" /> <input type="submit" class="buttonx" value=" �� �� "></form>
			<?php
			} else {
				if ($ifbest == 1)echo "<img src=images/nb.gif title=��Ѵ� align=absmiddle> <span class=sp1>(��Ѵ�)</span> ";
				if ($fflag == 1) {
					echo $content;
				} else {
					echo "<span class=sp2>�����ѱ������ɾ����</span>";
				}
			}
			?>
		</div>
		<?php if ( ($userid == $cook_userid) && ($flag == 1) ) {?>
		<div class="set"><form action="detail_bbs.php" method="post"><input name="bbsid" type="hidden" value="<?php echo $bbsid; ?>" /><input name="p" type="hidden" value="<?php echo $p; ?>" /><input name="fid" type="hidden" value="<?php echo $fid; ?>" /><input name="submitok" type="hidden" value="bbsbestupdate" /><input type="image" src="images/best.gif" onClick="return confirm('�� �� �� ��\n\n������İѸ�������Ϊ��Ѵ���')" /></form></div>
		<?php }?>
	</div>
	
</div>
<?php }} else {echo '<h6>���޻ش�</h6>';}?>
<div class=clear></div>
<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
<br style="line-height:1"/>
<?php if ( $flag == 1) {?>
<div class=clear></div><script language="javascript">
function chk(){
if(document.yzloveform.content.value==""){
alert('���������ݣ�');
document.yzloveform.content.focus();
return false;
}}</script>
<form action="" method="post" name=yzloveform onsubmit="return chk()">
<div class="reply">
	<div class="rpy1">
		<div class="lll"><span>���ٻش�</span> (�����������4000����ĸ��2000����������)</div>
		<div class="rrr"><a href="../login.php">��Ա��¼</a>��|��<a href="../reg.php">���ע��</a></div>
	</div>
	<div class="rpy2"><textarea name="content" rows="6" class=replyextarea></textarea></div>
	<div class="rpy3"><input type="submit" class="button" value=" �� �� "><input type="hidden" name="fid" value="<?php echo $fid; ?>"><input type="hidden" name="submitok" value="addupdate"><input type="hidden" name="redirectpage" value="<?php echo $redirectpage; ?>"></div>
</div>
</form>
<?php }?>
</body>
</html>
<?php ob_end_flush();?>