<?php require_once '../sub/init.php';
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT grade FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_grade=$row[0];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
$rtt = $db->query("SELECT COUNT(*) FROM ".__TBL_PHOTO__." WHERE userid=".$cook_userid);
$rowss = $db->fetch_array($rtt);
$tmpvideocount = $rowss[0];
$outinfo = 'YES';
if ($data_grade ==1 ) {
	if ($tmpvideocount >= $Global['m_photo_num1'])$outinfo = 'SORRY';
} elseif ($data_grade == 2) {
	if ($tmpvideocount >= $Global['m_photo_num2'] )$outinfo = 'SORRY';
} elseif ($data_grade == 3) {
	if ($tmpvideocount >= $Global['m_photo_num3'] )$outinfo = 'SORRY';
}
if ($submitok == "upload"){
	$uptypes=array('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/x-png'); 
	$max_file_size=900000;
	$watermark=1; //(1��,��������); 
	$watertype=2; //(1��,2ͼ) 
	$waterstring = $Global['m_waterimg'];
	$waterimg = 'images/waterimg.png';
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($_FILES["pic"][tmp_name])){ 
		$file = $_FILES["pic".$i];
		if($max_file_size < $file["size"])callmsg("��Ƭ̫�󣬲��ó���900K������!","-1");
		if(!in_array($file["type"], $uptypes))callmsg("��Ƭ���Ͳ�����ֻ����.jpg��.gif��ʽ������1","-1");
		$iinfo1=getimagesize($file[tmp_name],$iinfo1); 
		switch ($iinfo1[2]) { 
			case 1:$simage =imagecreatefromgif($file[tmp_name]);break; 
			case 2:$simage =imagecreatefromjpeg($file[tmp_name]);break; 
			case 3:$simage =imagecreatefrompng($file[tmp_name]);break; 
			case 6:$simage =imagecreatefromwbmp($file[tmp_name]);break; 
		} 
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($_FILES["pic"][tmp_name])){ 
		$file = $_FILES["pic"];
		$filepath = YZLOVE."up/photo/".date("y")."/".date("md")."/";
		$dbpath = date("y")."/".date("md")."/";
		mkpath($filepath);
		$savename = $cook_userid."_".cdstr(20).".";
		$filename=$file["tmp_name"];
		$image_size = getimagesize($filename); 
		$pinfo=pathinfo($file["name"]); 
		$ftype=$pinfo['extension']; 
		$destination =  $filepath."b_".$savename.$ftype; 
		if(!move_uploaded_file ($filename, $destination)) callmsg("�ƶ���Ƭ����","-1");
		$path_s = $dbpath."s_".$savename.$ftype;
		$path_b = $dbpath."b_".$savename.$ftype;
		// ���Կ�ʼ
		$RESIZEWIDTH=100;
		$RESIZEHEIGHT=100;
		$RESIZEWIDTH2=700;
		$RESIZEHEIGHT2=700;
		if ($ftype == "jpg" || $ftype == "JPG"){
			$im = imagecreatefromjpeg($destination);
		} else {
			$im = imagecreatefromgif($destination);
		}	
		makexiao($im,$RESIZEWIDTH2,$RESIZEHEIGHT2,$destination,$ftype);
		imagedestroy ($im);
		if ($ftype == "jpg" || $ftype == "JPG"){
			$im = imagecreatefromjpeg($destination);
		} else {
			$im = imagecreatefromgif($destination);
		}	
		makexiao($im,$RESIZEWIDTH,$RESIZEHEIGHT,$filepath."s_".$savename.$ftype,$ftype);
		imagedestroy ($im);
		$image_size = getimagesize($destination);
		//��ͼˮ��ʼ
		if($watermark==1) { 
			$iinfo=getimagesize($destination,$iinfo); 
			$nimage=imagecreatetruecolor($image_size[0],$image_size[1]); 
			$white=imagecolorallocate($nimage,255,255,255); 
			$black=imagecolorallocate($nimage,0,0,0); 
			$red=imagecolorallocate($nimage,255,0,0); 
			imagefill($nimage,0,0,$white); 
			switch ($iinfo[2]) { 
				case 1:$simage =imagecreatefromgif($destination);break; 
				case 2:$simage =imagecreatefromjpeg($destination);break; 
				case 3:$simage =imagecreatefrompng($destination);break; 
				case 6:$simage =imagecreatefromwbmp($destination);break; 
				default:callmsg("��֧�ֵ��ļ�����","-1");
			} 
			imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]); 
			switch($watertype) { 
			case 1: //�ַ� 
				imagefilledrectangle($nimage,$image_size[0],$image_size[1],$image_size[0]-140,$image_size[1]-20,$white); 
				imagestring($nimage,5,$image_size[0]-130,$image_size[1]-20,$waterstring,$black); 
				break; 
			case 2: //ͼƬ 
				$simage1 =imagecreatefrompng($waterimg); 
				imagecopy($nimage,$simage1,$image_size[0]-160,$image_size[1]-70,0,0,160,70); 
				imagedestroy($simage1); 
				break; 
			} 
			switch ($iinfo[2]) { 
				case 1:imagegif($nimage, $destination);break; 
				case 2:imagejpeg($nimage, $destination);break; 
				case 3:imagepng($nimage, $destination);break; 
				case 6:imagewbmp($nimage, $destination);break; 
			} 
			imagedestroy($nimage); 
			imagedestroy($simage); 
		}
		//��ͼˮ����
		$addtime = date("Y-m-d H:i:s");
		$db->query("INSERT INTO ".__TBL_PHOTO__."  (userid,path_s,path_b,title,addtime) VALUES ('$cook_userid','$path_s','$path_b','$title','$addtime')");
//
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
				$content = "�ϴ���һ����Ƭ<a href=".$Global['up_2domain']."/photo/".$path_b." target=_blank  class=uDF2C91><img src=".$Global['up_2domain']."/photo/".$path_s." width=40 height=30 align=absmiddle hspace=5>����鿴</a>";
				$addtime = strtotime("now");
				$db->query("INSERT INTO ".__TBL_FRIEND_NEWS__."  (userid,senduserid,content,addtime) VALUES ($uid,$cook_userid,'$content',$addtime)");
			}
		}
	}
//
	}//upload end
	callmsg("�ϴ��ɹ�����ȴ��ͷ���ˣ�ͨ���󷽿����������պ��ڸ�����ҳ��ʾ��","c_photo_list.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_sitetitle']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* main1 */
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;z-index: 100;}
.main1_tselect {float:left;width:74px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:74px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
img{border:0;} 
table{border-collapse:collapse;border-spacing:0;} 
--> 
</style>
</head>
<body>
<div class="main1">
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_list.php" class="a333">�ҵ����</a></div>
	<div class="main1_tselect">�ϴ���Ƭ</div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_dtt.php" class="a333">��������</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_main.php" class="a333">���������� </a></div>
</div>
<div class="main2">
  <div class="main2_frame"><br />
    <br />
<?php if ($outinfo == 'SORRY') {?>
<br /><br /><br />
<table width=392 height=176 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd>
  <tr>
    <td align=center bgcolor=#f3f3f3 style="line-height:20px;"><i><font color="#FF0000" face="Arial Black" style="font-size:21px;">Sorry!</font></i><font color="666666"> ��Ƭ�����ѵ����ޣ������ɾ�����֣��� <a href="c_photo_list.php">����ɾ��</a><br>
         <br>
      ��ͨ��Ա���<font color="#FF0000"><?php echo $Global['m_photo_num1'];?></font>��<br>
      ���Ż�Ա���<font color="#FF0000"><?php echo $Global['m_photo_num2'];?></font>��<br>
      ��ʯ��Ա���<font color="#FF0000"><?php echo $Global['m_photo_num3'];?></font>��<br>
      </font><br>
      <img src="images/yes.gif" width="16" height="14" hspace="3"><a href="k_bank.php" class="u666666"><b>����������Ա</b></a>����<img src="images/diamond.gif" width="20" height="16" hspace="3" align="absmiddle"><a href="k_vip.php" class="u666666">�߼���Ա������Щ��Ȩ��</a></td>
  </tr>
</table>
<br /><br /><br /><br /><br />
<?php } else { ?>
    <table width="540" border="0" align="center" cellpadding="3" cellspacing="0" style="border:#dddddd 0px solid;">
	<script language="javascript" src="images/chkphoto.js"></script>
      <form action="c_photo_up.php" method="post" enctype="multipart/form-data" name="up" id="up" onsubmit="return showtype()">

        <tr>
          <td width="133" height="40" align="right" style="font-size:10.3pt;color:#666">��Ƭ˵����</td>
          <td width="395"><input name="title" type="text" size="40" maxlength="50" class="input" />
          <input type="hidden" name="submitok" value="upload" /></td>
        </tr>
        <tr>
          <td width="133" height="40" align="right" style="font-size:10.3pt;color:#666">������Ƭ��</td>
          <td width="395">
            <input name="pic" type="file" id="inp"  size="42"  class="input" style="height:21px;" />
          </td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
          <td><input type="submit" name="Submit" value="��ʼ�ϴ�" class="button" /></td>
        </tr>
      </form>
    </table>
    <br />
    <table width="600" height="55" border="0" align="center" cellpadding="10" cellspacing="0">
        <tr>
          <td width="27" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif" width="23" height="21"></td>
          <td width="533" style="line-height:150%;color:#666;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle"><font color="#FF6699">������˺����Ƭ���ǽ�����Love�ҽ�����</font><br>
            <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><font color="#FF6699"><?php echo $Global['m_sitename']; ?>Ŭ��Ӫ����ʵ������Ľ��ѿռ䡣һ�������ϴ��Ǳ�����Ƭ��ϵͳ������ɾ����</font> <br>
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />����<a href="/law.html" target="_blank">���������ӹ���������涨</a>�Լ��л����񹲺͹����������йط��ɷ��档<br>
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />��Ƭ������<font color="#FF0000">.jpg</font>��<font color="#FF0000">.gif</font>��ʽ�� <br>
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><?php echo $Global['m_sitename']; ?>����������Ƭ�������վ���Ȩ��<br>
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />�����ͨ��ӡˢƷ����ҳ������;����������ͼƬ����������һ�к�������Լ��е���һ�����֣����۳�Love��<font color="#FF0000">1000</font>���ϣ�������صĽ�������ɾ����Ա�ʸ��������ϣ���������֪ͨ���������ʣ�����������ϵ�� </td>
        </tr>
    </table><br /><br /><br />
<?php }?>
  </div></div>
<?php require_once YZLOVE.'my/bottommy.php';
function makexiao($im,$maxwidth,$maxheight,$name,$ftype){
$width = imagesx($im);
$height = imagesy($im);
if(($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)){
if($maxwidth && $width > $maxwidth){
$widthratio = $maxwidth/$width;
$RESIZEWIDTH=true;}
if($maxheight && $height > $maxheight){
$heightratio = $maxheight/$height;
$RESIZEHEIGHT=true;}
if($RESIZEWIDTH && $RESIZEHEIGHT){
if($widthratio < $heightratio){
$ratio = $widthratio;
}else{
$ratio = $heightratio;}
}elseif($RESIZEWIDTH){
$ratio = $widthratio;
}elseif($RESIZEHEIGHT){
$ratio = $heightratio;}
$newwidth = $width * $ratio;
$newheight = $height * $ratio;
if(function_exists("imagecopyresampled")){
$newim = imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
}else{
$newim = imagecreate($newwidth, $newheight);
imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);}
if ($ftype == "jpg" || $ftype == "JPG"){
imagejpeg($newim,$name);
} else {
imagegif($newim,$name);}	
imagedestroy ($newim);
}else{
if ($ftype == "jpg" || $ftype == "JPG"){
imagejpeg ($im,$name);
} else {
imagegif($im,$name);}	
imagedestroy ($im);}}
?>