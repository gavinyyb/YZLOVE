<?php require_once '../sub/init.php';?>
<?php
//if ( ($cook_grade == 2 || $cook_grade == 3 || $cook_grade == 10 ) && (end(explode('/',$_SERVER['PHP_SELF'])) != "f_diary.php") ){
if ( $cook_grade == 2 || $cook_grade == 3 || $cook_grade == 10 ){
?>
<script language="javascript">
function createXMLHttpRequest2(){ 
if(window.XMLHttpRequest) {
xmlHttp = new XMLHttpRequest();
} else if(window.ActiveXObject) { 
try{xmlHttp = new ActiveX0bject("Msxml2.XMLHTTP");}
catch(e) {} 
try {xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");}
catch(e) {} 
if(!xmlHttp){ 
window.alert("No Create XML"); 
return false; 
}}} 
function startRequest2() {  
createXMLHttpRequest2();
xmlHttp.open("GET","pb.php",true); 
xmlHttp.send(null);
} 
window.onload = function(){
/* window.setInterval('startRequest2()',1200000); */
window.setInterval('startRequest2()',1200000);
}
</script>
<?php }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css"> 
a{text-decoration: none;color:#333; font-family:Arial,����}
a:hover {text-decoration:underline;color: #DF2C91} 
a.title{text-decoration:none;color:#fff;font-family:����;font-size:10.3pt;}
a.title:hover {text-decoration: underline;color:#FDD4E5;font-family:����;font-size:10.3pt;}
body{font-size:12px}
TD{font-size:12px;color:#444}
span{font-family:Verdana}
</style>
<base target="mainframe" />
</head>
<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" oncontextmenu=self.event.returnValue=false>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td style="padding:5px;"><table width="100%" height="71" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="200" align="center" background="images/logobg.gif"><a href="<?php echo $Global['www_2domain']; ?>" target="_parent"><img src="images/logo.gif" alt="���ض�����Ե��������ҳ" width="190" height="50" border="0" /></a></td>
<td align="left" valign="top" bgcolor="#F7F7F7" style="border-top:#cdcdcd 1px solid;"><table width="97%" height="38" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="255" align="center">��ӭ������<span><?php echo $cook_nickname;?> (<?php echo $cook_username;?>)</span>��</td>
<td align="right" style="color:#999;"><span><a href="mainmy.php">������ҳ</a>��/��<a href="k_vip.php">��Ա����</a>��/��<a href="k_getloveb.php">Love�ҳ�ֵ</a>��/��<a href="../exit.php" target="_parent">�˳�����Love��</a></span></td>
</tr>
</table>
<table width="100%" height="32" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="48" align="center"><img src="images/zj.gif" width="48" height="32" /></td>
<td background="images/tbg.gif" >
<table width="730" border="0" cellspacing="0" cellpadding="0">
<tr>
<td style="font-size:10.3pt;color:#fff;padding-left:20px;"><a href="../" target="_parent" class="title">��ҳ</a><img src="images/hgt.gif"  hspace="19" align="absmiddle" /><a href="../user" target="_parent" class="title">����</a><img src="images/hgt.gif"  hspace="19" align="absmiddle" /><a href="<?php echo $Global['group_2domain']; ?>" target="_parent" class="title">Ȧ��</a><img src="images/hgt.gif"  hspace="19" align="absmiddle" /><a href="../dating" target="_parent" class="title">Լ��</a><img src="images/hgt.gif"  hspace="19" align="absmiddle" /><a href="../party" target="_parent" class="title">�</a><img src="images/hgt.gif"  hspace="19" align="absmiddle" /><a href="../user/online.php" target="_parent" class="title">����</a><img src="images/hgt.gif"  hspace="19" align="absmiddle" /><a href="../clinic" target="_parent" class="title">����</a><img src="images/hgt.gif"  hspace="19" align="absmiddle" /><a href="../video" target="_parent" class="title">��Ƶ</a><img src="images/hgt.gif"  hspace="19" align="absmiddle" /><a href="../diary" target="_parent" class="title">����</a><img src="images/hgt.gif"  hspace="19" align="absmiddle" /><a href="../photo" target="_parent" class="title">���</a><img src="images/hgt.gif"  hspace="19" align="absmiddle" /><a href="../story" target="_parent" class="title">����</a></td>
</tr>
</table></td>
</tr>
</table></td>
<td width="4"><img src="images/j.gif" width="4" height="71" /></td>
</tr>
</table></td>
</tr>
</table>
</body>
</html>
<?php ob_end_flush();?>