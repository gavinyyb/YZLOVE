<?php 
require_once '../sub/init.php';
if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid))callmsg("���¼","-1");
if ( !ereg("^[0-9]{1,8}$",$uid) || empty($uid))callmsg("������󣬸��û������ڻ��ѱ��������ѱ�ɾ����","-1");

require_once YZLOVE.'sub/conn.php';
$rtchat = $db->query("SELECT id,senduserid FROM ".__TBL_CHATIF__." WHERE userid=".$cook_userid." AND senduserid=".$uid." AND ifagree=0 ORDER BY id DESC LIMIT 1");
if($db->num_rows($rtchat) > 0){
	$rowchat = $db->fetch_array($rtchat);
	$classid = $rowchat[0];
	$uid     = $rowchat[1];
	//$db->query("UPDATE ".__TBL_CHATIF__." SET ifagree=1 WHERE id=".$classid);
	$db->query("UPDATE ".__TBL_CHATIF__." SET ifagree=1 WHERE userid=".$cook_userid." AND senduserid=".$uid);
	header("Location: ./".$uid.".html");
}else{
	callmsg("����ģʽ��δ֪����","-1");
}
ob_end_flush();?>