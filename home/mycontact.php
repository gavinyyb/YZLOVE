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
if ( !ereg("^[0-9]{1,8}$",$uid) )callmsg("������󣬸��û������ڻ��ѱ��������ѱ�ɾ����","-1");
if ( !ereg("^[0-9]{1,2}$",$cook_grade) || empty($cook_grade) )callmsg("���ȵ�¼��",$Global['www_2domain']."/login.php");
if ($cook_grade <= 1)callmsg("ֻ�и߼���Ա���ܲ鿴��",$Global['my_2domain']."/?k_vip.php");
if ($uid == $cook_userid)callmsg("���ܲ������ѣ�","0");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT username,nickname,grade,loveb,alltime,logincount,mbkind,mbtitle,magic,bgpic,ifopencontact,sex,photo_s,click,address,post,tel,email,qq,msn,popo,homepage,ifphoto,ifbirthday,ifedu,iflove,ifpay FROM ".__TBL_MAIN__." WHERE id=".$uid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$username    = $row['username'];
$nickname    = $row['nickname'];
$grade       = $row['grade'];
$loveb       = $row['loveb'];
$alltime     = $row['alltime'];
$logincount = $row['logincount'];
$mbkind      = $row['mbkind'];
$mbtitle     = $row['mbtitle'];
$magic       = $row['magic'];
$bgpic       = $row['bgpic'];
$ifopencontact= $row['ifopencontact'];
$sex         = $row['sex'];
$photo_s     = $row['photo_s'];
$click       = $row['click'];
$address     = stripslashes($row['address']);
$post        = $row['post'];
$tel         = stripslashes($row['tel']);
$email       = stripslashes($row['email']);
$qq          = $row['qq'];
$msn         = stripslashes($row['msn']);
$popo        = stripslashes($row['popo']);
$homepage    = stripslashes($row['homepage']);
$ifphoto     = $row['ifphoto'];
$ifbirthday  = $row['ifbirthday'];
$ifedu  = $row['ifedu'];
$iflove  = $row['iflove'];
$ifpay  = $row['ifpay'];
$tmpx = 0;
if ($ifphoto == 1)$tmpx = $tmpx+1;
if ($ifbirthday == 1)$tmpx = $tmpx+1;
if ($ifedu == 1)$tmpx = $tmpx+1;
if ($iflove == 1)$tmpx = $tmpx+1;
if ($ifpay == 1)$tmpx = $tmpx+1;
if ($ifopencontact == 2){
	if ($cook_grade == 2){
		$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$uid." AND senduserid=".$cook_userid." AND ifagree=1");
		if (!$db->num_rows($rt)) {
			callmsg("�������".$nickname."�ĺ��ѣ��ſ��Բ鿴Ta����ϵ��ʽ��","0");
			exit;
		}
	}
} elseif ($ifopencontact == 3) {
	if ($cook_grade == 1 || $cook_grade == 2) {
	callmsg("�û�Ա�ѽ����ѵ���ϵ��ʽ����Ϊ����״̬������Ȩ�鿴��","0");
	exit;
	}
}
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )��ʾ��</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>������󣬸��û������ڻ��ѱ��������ѱ�ɾ����</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='����'></p>";
exit;}
if (empty($bgpic)) {
	$tmpbg = "images/".$mbkind."/bg.jpg";
}else{ 
	$tmpbg = $bgpic;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $nickname;?>����ϵ��ʽ | <?php echo $Global['m_sitename'] ?></title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg; ?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homed.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/mycontact.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
		<?php require_once YZLOVE.'home/left_ad.html'?>
	</div>
  <div class="right">
		<div class="rightTitle"><h4>�ҵ���ϵ��ʽ</h4><a href="<?php echo $Global['my_2domain']; ?>/?a4.php">>>�޸�</a></div>
      <div class="rightContent">
          <div class="clear"></div>
          <table width="509" border="0" align="center" cellpadding="2" cellspacing="0" style="position:relative;font-size:14px;margin-top:30px;margin-bottom:90px">
              <tr>
                <td width="154" height="35" align="right"><font color="#666666">�ء���ַ��</font></td>
                <td width="347" align="left" class=tiaose><?php echo $address;?></td>
              </tr>
              <tr>
                <td height="35" align="right"><font color="#666666">�������룺</font></td>
                <td width="347" align="left" class=tiaose><?php echo $post;?></td>
              </tr>
              <tr>
                <td height="35" align="right"><font color="#666666">�绰/�ֻ���</font></td>
                <td width="347" align="left" class=tiaose><?php echo $tel;?></td>
              </tr>
              <tr>
                <td height="35" align="right"><font color="#666666">�������䣺</font></td>
                <td align="left" class=tiaose><?php echo $email;?></td>
              </tr>
              <tr>
                <td height="35" align="right"><font color="#666666">QQ��</font></td>
                <td align="left" class=tiaose><?php echo $qq;?></td>
              </tr>
              <tr>
                <td height="35" align="right"><font color="#666666">MSN��</font></td>
                <td align="left" class=tiaose><?php echo $msn;?></td>
              </tr>
              <tr>
                <td height="35" align="right"><font color="#666666">POPO��</font></td>
                <td align="left" class=tiaose><?php echo $popo;?></td>
              </tr>
              <tr>
                <td height="35" align="right"><font color="#666666">������ҳ��</font></td>
                <td align="left" class=tiaose><?php echo $homepage;?></td>
              </tr>
          </table>
    </div>
		<div class="rightContent ul2"></div>
</div>
	<div class="clear"></div>
</div>
<?php require_once YZLOVE.'home/foot.php';?>