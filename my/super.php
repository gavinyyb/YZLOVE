<?php
/***************************************************
Copyright (C) 2008  ������Ե������  v2.0
��  ��: PAN��
***************************************************/
require_once "../sub/init.php";
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,10}$",$uid) || empty($uid) )callmsg("Forbidden!",$Global['www_2domain']);
$rt = $db->query("SELECT nickname,grade FROM ".__TBL_MAIN__." WHERE flag>0  AND id=".$uid);
if (!$db->num_rows($rt)) {
	callmsg("������󣬸��û������ڻ��ѱ��������ѱ�ɾ����","-1");
	exit;
} else {
	$row = $db->fetch_array($rt);
	$membernickname = $row[0];
	$membergrade    = $row[1];
}
switch ($submitok) {
	case 'friend':
		if ($uid == $cook_userid)callmsg("������󣬲��ܲ������ѣ�","0");
		if ( !ereg("^[0-9]{1,2}$",$g) || empty($g) )callmsg("Forbidden","-1");
		if ($g == 1) {
		$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_FRIEND__." WHERE userid=".$uid);
		if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$tmpgbookcount = $row[0];
		}else{$tmpgbookcount = 0;}
		if ($tmpgbookcount >= $Global['m_friend_num'])callmsg("Sorry! �Է�������Ŀ����������ʧ�ܣ�","0");}
		$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$uid." AND senduserid=".$cook_userid);
		if ($db->num_rows($rt)) {
			callmsg("�ٸ��û��Ѿ��������\\n����(��)�ѽ�����Ϊ�������е�һԱ\\n�����ڴ��ڶԷ���֤�С�����","0");
		} else {
			$addtime=date("Y-m-d H:i:s");
			$db->query("INSERT INTO ".__TBL_FRIEND__."  (userid,senduserid,addtime) VALUES ($uid,$cook_userid,'$addtime')");
			callmsg("��ĺ��������ѷ��͸�".$membernickname."���뾲�����������","0");
		}
	break;
	case 'hmd':
		if ($uid == $cook_userid)callmsg("������󣬲��ܲ������ѣ�","0");
		$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$uid." AND senduserid=".$cook_userid);
		if ($db->num_rows($rt)) {
			callmsg("���Ѵ�����ĺ���������\\n�ڻ���û���������ѣ�\\n�����ڴ��ڶԷ���֤�С�����","0");
		} else {
			if ($membergrade == 10)callmsg("������󣬲��ܽ�����Ա��Ϊ��������","-1");
			$addtime=date("Y-m-d H:i:s");
			$db->query("INSERT INTO ".__TBL_FRIEND__."  (userid,senduserid,ifhmd,addtime) VALUES ($uid,$cook_userid,1,'$addtime')");
			header("Location: ".$Global['my_2domain']."/?b_blacklist.php");
		}
	break;
}
?>