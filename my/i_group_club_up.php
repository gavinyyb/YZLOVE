<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,10}$",$clubid) || empty($clubid) )callmsg("Forbidden!","-1");
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid) )callmsg("Forbidden!","-1");
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
		if ($title == "" )callmsg("��Ƭ˵������Ϊ��","-1");
		$iinfo1=getimagesize($file[tmp_name],$iinfo1); 
		switch ($iinfo1[2]) { 
			case 1:$simage =imagecreatefromgif($file[tmp_name]);break; 
			case 2:$simage =imagecreatefromjpeg($file[tmp_name]);break; 
			case 3:$simage =imagecreatefrompng($file[tmp_name]);break; 
			case 6:$simage =imagecreatefromwbmp($file[tmp_name]);break; 
		} 
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($_FILES["pic"][tmp_name])){ 
		$file = $_FILES["pic".$i];
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
		$RESIZEWIDTH=140;
		$RESIZEHEIGHT=140;
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
		$addtime = date("Y-m-d H:i:s");
		$db->query("INSERT INTO ".__TBL_GROUP_CLUB_PHOTO__." (mainid,clubid,title,path_s,path_b,addtime) VALUES ('$mainid','$clubid','$title','$path_s','$path_b','$addtime')");
		$tmpphotoid = $db->insert_id();
		$rt = $db->query("SELECT picurl_s FROM ".__TBL_GROUP_CLUB__." WHERE id=".$clubid);
		$total = $db->num_rows($rt);
		if($total > 0){
			$row = $db->fetch_array($rt);
			if (empty($row[0])) {
				$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET picurl_s='$path_s' WHERE id='$clubid'");
				$db->query("UPDATE ".__TBL_GROUP_CLUB_PHOTO__." SET ifmain=1 WHERE id='$tmpphotoid'");
			}
		} else {
			callmsg("���������!","-1");
		}
		header("Location: i_group_club_photo_list.php?mainid=".$mainid."&clubid=".$clubid."&clubtitle=".$clubtitle);
	}//upload end
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
      <td bgcolor="#FDEEF8" style="color:#333;font-size:14px;color:#999"><img src="images/qzlist.gif" width="21" height="18" hspace="5" /><b><a href="i_group.php"><?php echo $maintitle; ?></a></b> >> <a href="i_group_club.php?mainid=<?php echo $mainid; ?>&submitok=list" class="u666666"><b>�����</b></a> >> <a href="i_group_club_photo_list.php?mainid=<?php echo $mainid; ?>&clubid=<?php echo $clubid;?>&clubtitle=<?php echo $clubtitle; ?>"><b><?php echo $clubtitle; ?>�Ļ��Ƭ</b></a> >> <font color="#333333">�ϴ���Ƭ</font></td>
      </tr>
  </table>
  <br>
  <br />
  <br />
  <br />
  <script language="JavaScript" src="images/chkgroupclubphoto.js" type="text/javascript"></script>
    <form action="i_group_club_up.php" method="post" enctype="multipart/form-data" name="up" id="up" onsubmit="return showtype()">
  <table width="540" border="0" align="center" cellpadding="3" cellspacing="0" style="border:#dddddd 0px solid;">
      <tr>
        <td width="158" height="40" align="right">��˵����</td>
        <td width="390" style="line-height:200%;font-size:10.3pt;color:33333;"><input name="title" type="text" id="title" size="40" maxlength="50" class="input" />
		  </td>
      </tr>
      <tr>
        <td width="158" height="40" align="right">ѡ����Ƭ��</td>
        <td width="390""><span style="line-height:200%;font-size:10.3pt;color:33333;">
          <input name="pic" type="file" id="inp"  style="font-size:9pt;height:21px" size="42"  class="input" />
        </span></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td><input type="submit" name="Submit" value="��ʼ�ϴ�" class="button" />
            <input type="hidden" name="submitok" value="upload" />
		  <input type="hidden" name="clubid" value="<?php echo $clubid; ?>" />
		  <input type="hidden" name="clubtitle" value="<?php echo $clubtitle; ?>" />
		  <input type="hidden" name="mainid" value="<?php echo $mainid; ?>" />		</td>
      </tr>

  </table></form>
  <br />
  <br />
  <br />
  <br />
  <br>

  <br />
  <br>
<br />
  <br />
</div></div>
<?php
require_once YZLOVE.'my/bottommy.php';
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