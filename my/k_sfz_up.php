<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
//
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT birthday,love,photo_s,heigh,house,car,edu,pay FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {
$row = $db->fetch_array($rt);
$data_birthday  =$row[0];
$data_love      =$row[1];
$data_photo_s   =$row[2];
$data_heigh     =$row[3];
$data_house     =$row[4];
$data_car       =$row[5];
$data_edu       =$row[6];
$data_pay       =$row[7];
} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ( !ereg("^[1-8]{1}$",$rzid) || empty($rzid) )callmsg("Forbidden","-1");
switch ($rzid) {
	case 1:
		if (empty($data_photo_s))callmsg("���������ø���������Ƭ��","c_photo_main.php");
	break;
	case 3:
		if ( empty($data_heigh) || ($data_heigh>220 && $data_heigh<130) )callmsg("�������ϡ���ߡ���д����","a1.php");
		if ( !ereg("^[0-9]{1,3}$",$data_heigh) )callmsg("�������ϡ���ߡ���д����","a1.php");
	break;
	case 4:
		if ( !ereg("^[1-6]{1}$",$data_love) )callmsg("�������ϡ�����״������ѡ��Ǳ��ܣ�","a1.php");
	break;
	case 5:
		if ( !ereg("^[0-9]{1,2}$",$data_pay) )callmsg("�������ϡ������롱������ѡ��","a2.php");
		if ($data_pay == 1)callmsg("�������ϡ������롱������ѡ��600Ԫ���ϣ�","a2.php");
	break;
	case 6:
		if ( !ereg("^[2-6]{1}$",$data_edu) )callmsg("�������ϡ������̶ȡ���ѡ���������ѧ����","a2.php");
	break;
	case 7:
		if ( $data_house != 1 )callmsg("�������ϡ�ס������ѡ���л鷿��","a2.php");
	break;
	case 8:
		if ( !ereg("^[1-3]{1}$",$data_car) )callmsg("�������ϡ���ͨ���ߡ���ѡ���������е��������ߵ����������������һ�","a2.php");
	break;
}
//
$rt = $db->query("SELECT id FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND flag=0 AND rzid=".$rzid);
if ($db->num_rows($rt))callmsg("���ύ���������ڴ���֮��...... �벻Ҫ�ظ��ύ��","-1");
if ($submitok == "upload"){
	$uptypes=array('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/x-png'); 
	$max_file_size=900000;
	$waterstring = $Global['m_waterimg'];
	$waterimg = 'images/waterimg.png';
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($_FILES["pic"][tmp_name])){ 
		$file = $_FILES["pic"];
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
		$filepath = YZLOVE."up/papers/".date("Ym")."/";
		$dbpath = date("Ym")."/";
		mkpath($filepath);
		$savename = $cook_userid."_".cdstr(20).".";
		$filename=$file["tmp_name"];
		$image_size = getimagesize($filename); 
		$pinfo=pathinfo($file["name"]); 
		$ftype=$pinfo['extension']; 
		$destination =  $filepath."b_".$savename.$ftype; 
		if(!move_uploaded_file ($filename, $destination)) callmsg("�ƶ���Ƭ����","-1");
		$path_b = $dbpath."b_".$savename.$ftype;
		// ��
		$RESIZEWIDTH2=980;
		$RESIZEHEIGHT2=980;
		if ($ftype == "jpg" || $ftype == "JPG"){
			$im = imagecreatefromjpeg($destination);
		} else {
			$im = imagecreatefromgif($destination);
		}	
		makexiao($im,$RESIZEWIDTH2,$RESIZEHEIGHT2,$destination,$ftype);
		imagedestroy ($im);
		$image_size = getimagesize($destination);
		//ˮ
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
		$simage1 =imagecreatefrompng($waterimg); 
		imagecopy($nimage,$simage1,$image_size[0]-160,$image_size[1]-70,0,0,160,70); 
		imagedestroy($simage1); 
		switch ($iinfo[2]) { 
			case 1:imagegif($nimage, $destination);break; 
			case 2:imagejpeg($nimage, $destination);break; 
			case 3:imagepng($nimage, $destination);break; 
			case 6:imagewbmp($nimage, $destination);break; 
		} 
		imagedestroy($nimage); 
		imagedestroy($simage); 
		//ˮ��
		$addtime = strtotime("now");
		$db->query("INSERT INTO ".__TBL_ATTESTATION__."  (rzid,userid,addtime,path_b) VALUES ('$rzid','$cook_userid','$addtime','$path_b')");

	}//upload end
	callmsg("������֤�����ѳɹ����Ϳͷ����ģ���ȴ����ǹ�����Ա���......","k_sfz.php");
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
ul li {float:left;width:70px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:70px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:70px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:70px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:70px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:70px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
.iframebox {margin:15px 0 0 0;border:#f60 1px solid;display:none}
.iframebox .iframeclose {text-align:right;height:25px;line-height:25px;background:#fc0;font-weight:bold;color:#000}
.iframebox .iframeclose .iframecloseL {float:left;padding:0 0 0 8px;}
.iframebox .iframeclose .iframecloseR {float:right;padding:5px 8px 0 0;height:20px;line-height:15px;}
.iframebox .iframeclose .iframecloseR a:link,.iframecloseR a:active,.iframecloseR a:visited {color:#000;}
.iframebox .iframeclose .iframecloseR a:hover {color:#f00;}
</style>
</head>
<body>
<ul>
<li><a href="k_myloveb.php">�ҵ��ʻ�</a></li>
<li><a href="k_myloveb.php?submitok=list">�����嵥</a></li>
<li><a href="k_vip.php">��Ա����</a></li>
<li><a href="k_bidding.php">��������</a></li>
<li><a href="k_homepage.php">װ����ҳ</a></li>
<li class='liselect'><a href="k_sfz.php">ʵ����֤</a></li>
<li><a href="../news.php" target="_blank">��վ��̬</a></li>
<li><a href="k_getloveb.php">��ȡLove��</a></li>
</ul>
<div class="main2">
<div class="main2_frame">
  <br />
  <table width="670" height="30" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FBDDF1">
    <tr>
      <td width="41" align="right" bgcolor="#FDEEF8" style="color:#FF6600;font-size:20px;font-family:����,����"><img src="images/sfz2.gif" width="34" height="20" align="absmiddle" /></td>
      <td width="609" align="left" valign="top" bgcolor="#FDEEF8" style="color:#FF6600;font-size:20px;font-family:����,����;padding-top:6px">&nbsp;<a href="k_sfz.php" style="font-family:����,����;">ʵ����֤</a> >> <?php 
	switch ($rzid) {
	case 1:$title = "��Ƭ��֤";break;
	case 2:$title = "������֤";break;
	case 3:$title = "�����֤";break;
	case 4:$title = "������֤";break;
	case 5:$title = "������֤";break;
	case 6:$title = "ѧ����֤";break;
	case 7:$title = "������֤";break;
	case 8:$title = "������֤";break;
}echo $title;?></td>
    </tr>
  </table>
  <br />
<?php if ($rzid == 1) {//��Ƭ��֤?>
<table width="650" border="0" align="center" cellpadding="4" cellspacing="0" style="color:#666666">
        <tr>
          <td width="31" align="right" valign="top"><img src="images/tips.gif" width="23" height="21" /></td>
          <td width="603" valign="top"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" />�����˽�����ʵ������Ƭ(����������)�ϴ�����վ֮��<b>�������ѰѸ���Ƭ�趨Ϊ�����������</b>�����ǻ�����ϴ���֤���ϵ���Ƭ��������������Աȡ�������<a href="c_photo_main.php" class="uDF2C91">��������������</a><br />            <img src="images/li.gif" hspace="5" vspace="12" align="absmiddle" />ͨ������ɨ�����<b>���֤</b>��<b>����֤</b>��<b>���֤</b>��<b>����</b>��<b>����֤</b>���������Ƭ��֤���ϴ�����վ���ɿͷ���Ա����������պ˶ԡ�</td>
        </tr>
    </table>
<?php }elseif ($rzid == 2) {//������֤?>
<table width="650" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td width="31" align="right" valign="top"><img src="images/tips.gif" width="23" height="21" /></td>
    <td width="603" valign="top"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" /><font color="#666666">�������ϡ��������¡�����д���������ϴ���֤����������µ����Ȩ��֤�����磺<b>���֤</b>��<b>���֤</b>��<b>���ڲ�</b>��<b>��ʻ֤</b>�ȡ�<br />
      <img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" />ͨ������ɨ����ϴ�����վ���ɿͷ���Ա����ĸ������Ϻ˶ԡ� </font></td>
  </tr>
</table>
<?php }elseif ($rzid == 3) {//�����֤?>
<table width="650" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td width="31" align="right" valign="top"><img src="images/tips.gif" width="23" height="21" /></td>
    <td width="603" valign="top"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" /><font color="#666666">�������ϡ���ߡ�����д���������ϴ���֤������ߵ����Ȩ��֤����<br />
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" />ͨ������ɨ����ϴ�����վ���ɿͷ���Ա����ĸ������Ϻ˶ԡ� </font></td>
  </tr>
</table>
<?php }elseif ($rzid == 4) {//������֤?>
<table width="650" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td width="31" align="right" valign="top"><img src="images/tips.gif" width="23" height="21" /></td>
    <td width="603" valign="top"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" /><font color="#666666">�������ϡ�����״������ѡ���Ƿ�<b>����</b>����ӵ��δ��֤�������֤�����֤����һ�֡�<br />
        <b><font color="#666666"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" />δ��</font></b><font color="#666666">:��������/��ί��/��λ����δ��֤����<b>�ѻ�</b>:���֤��<b>����</b>:���֤�����Э���顣</font><br />
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" />ͨ������ɨ����ϴ�����վ���ɿͷ���Ա����ĸ������Ϻ˶ԡ� </font></td>
  </tr>
</table>
<?php }elseif ($rzid == 5) {//������֤?>
<table width="650" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td width="31" align="right" valign="top"><img src="images/tips.gif" width="23" height="21" /></td>
    <td width="603" valign="top"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" /><font color="#666666">�������ϡ������롱�����600����ӵ������֤����<br />
          <b><font color="#666666"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" /></font></b>����֤���ɵ�λ���ߵ�����֤��������Ӹǹ�˾���¡�<br />
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" />ͨ������ɨ����ϴ�����վ���ɿͷ���Ա����ĸ������Ϻ˶ԡ� </font></td>
  </tr>
</table>
<?php }elseif ($rzid == 6) {//ѧ����֤?>
<table width="650" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td width="31" align="right" valign="top"><img src="images/tips.gif" width="23" height="21" /></td>
    <td width="603" valign="top"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" /><font color="#666666">�������ϡ������̶ȡ���ѡ���ǳ�������ѧ������ӵ��ѧ������ҵ֤��ѧλ֤�����һ�֡�
      <br />
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" />ͨ������ɨ����ϴ�����վ���ɿͷ���Ա����ĸ������Ϻ˶ԡ� </font></td>
  </tr>
</table>

<?php }elseif ($rzid == 7) {//������֤?>
<table width="650" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td width="31" align="right" valign="top"><img src="images/tips.gif" width="23" height="21" /></td>
    <td width="603" valign="top"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" /><font color="#666666">�������ϡ�ס������ѡ����<b>��ס��</b>����ӵ�з���֤�򷿲���Լ��<br />
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" />ͨ������ɨ����ϴ�����վ���ɿͷ���Ա����ĸ������Ϻ˶ԡ� </font></td>
  </tr>
</table>
<?php }elseif ($rzid == 8) {//������֤?>
<table width="650" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td width="31" align="right" valign="top"><img src="images/tips.gif" width="23" height="21" /></td>
    <td width="603" valign="top"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" /><font color="#666666">�������ϡ���ͨ���ߡ���ѡ����<b>����</b>��<b>�е�����</b>��<b>�ߵ�����</b>�ߣ���ӵ����������Ȩ֤�顣<br />
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="12" align="absmiddle" />ͨ������ɨ����ϴ�����վ���ɿͷ���Ա����ĸ������Ϻ˶ԡ� </font></td>
  </tr>
</table>
<?php }?>
<br />
<script language="javascript">
var img=null; 
function showtype(){ 
var fsize=0;
if(img)img.removeNode(true); 
img=document.createElement("img"); 
img.style.position="absolute"; 
img.style.visibility="hidden"; 
document.body.insertAdjacentElement("beforeend",img); 
img.src=up.inp.value; 
var ftype=img.src.substring(img.src.length-4,img.src.length) 
ftype=ftype.toUpperCase();
fsize=img.fileSize;
if((ftype.indexOf('JPG',0)==-1) && (ftype.indexOf('GIF', 0)==-1))
	{ alert("Sorry!�ϴ�ʧ�ܣ�\n\n����ѡ����Ҫ�ϴ�����Ƭ\n\n����ֻ����.JPG��.GIFͼƬ���͡�");
	return false;
	}
alert("��ȷ��Ҫ�ϴ����ļ���");
return true;
} 
</script>
<table width="473" border="0" align="center" cellpadding="3" cellspacing="0" style="border:#FFD0E7 1px solid;">
        <form action="k_sfz_up.php" method="post" enctype="multipart/form-data" name="up" id="up" onSubmit="return showtype()">
          <tr>
            <td height="40" colspan="2" align="center" bgcolor="FFF0F7" class=10_3 style="font-weight:bold;">
            ���ϴ�<font color="#FF0000"><?php echo $title; ?></font>�����֤����</td>
          </tr>
          <tr>
            <td width="108" height="40" align="right"><font color="#999999">��ѡ�񱾵�֤����</font></td>
            <td width="351"><span style="line-height:200%;font-size:10.3pt;color:33333;">
              <input name="pic" type="file" id="inp"  style="height:21px;" size="42"  class="input" />
            </span></td>
          </tr>
          <tr>
            <td align="center">
              <input type=hidden name=title value="<?php echo $title; ?>">
			  <input type=hidden name=rzid value="<?php echo $rzid; ?>">
              <input type=hidden name=submitok value="upload"></td>
            <td><input type="submit" name="Submit" value="�ϴ�֤��" class="button">
              <br>
            <br></td>
          </tr>
        </form>
    </table>
  <br />
  <br />
  <br />
  <br />
    <br />
</div>
</div>
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
ob_end_flush();
?>