<?php require_once "sub/init.php";
require_once "sub/conn.php";
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok == 'addupdate') {
	if (strlen($url) < 10 || strlen($url)>200)callmsg("�ٱ�ҳ���ַ����Ϊ�գ�","-1");
	if (strlen($content)>1000 || empty($content))callmsg("�ٱ�����˵���������1000�ֽ����ڣ�","-1");
	$addtime = date("Y-m-d H:i:s");
	$usernamenickname = $cook_username.'('.$cook_nickname.')';
	$db->query("INSERT INTO ".__TBL_315__."  (userid,usernamenickname,url,content,addtime) VALUES ('$cook_userid','$usernamenickname','$url','$content','$addtime')");
	callmsg("�ٱ���Ϣ���ͳɹ����ͻ�������Ա��������ľٱ���Ϣ��лл����֧�֣�","0");
}
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ٱ�����</title>
<style type="text/css"> 
<!--
A:link {text-decoration: none;color:#333333;font-family:Arial,����;}
A:visited {text-decoration: none;color:#333333;font-family:Arial,����;}
A:active {text-decoration: none;color:#333333;font-family:Arial,����;}
A:hover {color:#333333;text-decoration:underline;} 
body{font-family:����;font-size:9pt;color:#333333;}
td{FONT-SIZE:9pt;}
A.u6699CC:link {text-decoration: underline;color:#6699CC; font-family: Arial,����;}
A.u6699CC:visited {text-decoration: underline;color: #6699CC; font-family: Arial,����;}
A.u6699CC:active {text-decoration: underline;color: #6699CC; font-family: Arial,����;} 
A.u6699CC:hover {text-decoration:underline;color:#FF5494;}
A.000000:link {text-decoration:none;color:#000000;font-family: Arial,����;}
A.000000:visited {text-decoration:none;color: #000000;font-family: Arial,����;}
A.000000:active {text-decoration:none;color: #000000;font-family: Arial,����;} 
A.000000:hover {text-decoration:underline;color:#ff0000;}
.input{FONT-SIZE: 9pt;color:#333333;background:#ffffff;border:#dddddd 1px solid;height:20px;}
.button{cursor:pointer!important;cursor:hand;background-image:url(images/bg_btn.gif);background-color:#FFF5E6; text-align:center; height:32px;padding:0px!important;padding-top:3px; border:1px solid #FF7E00;color:#000000;font-size:10.3pt;font-weight:bold;}
--> 
</style></head>
<body leftmargin="0" topmargin="10" marginwidth="0" marginheight="0">
<form action="" method="post">
<table width="744" height="65" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="219" height="65"><a href="<?php echo $Global['www_2domain'];?>"><img src="images/logo.gif" border="0"></a></td>
    <td width="452" valign="bottom" style="font-size:10.3pt;font-weight:bold;padding-bottom:15px;">���� �� �� ��</td>
    <td width="73" valign="bottom" style="padding-bottom:8px;"><a href="./"><u><font color="B970A6"><b>������ҳ</b></font></u></a></td>
  </tr>
</table>
<table width="700" height="288" border="0" align="center" cellpadding="4" cellspacing="0" style="border:#EAC0F1 1px solid;">
  <tr>
    <td width="146" height="50" align="right" valign="bottom" bgcolor="FDF5FE" style="padding-bottom:6px;"><font color="B970A6">�ٱ�ҳ���ַ��</font> </td>
    <td width="552" valign="bottom" bgcolor="FDF5FE"><input name="url" type="text" class="input" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>" size="80" maxlength="200" /></td>
  </tr>
  <tr>
    <td height="161" align="right" bgcolor="FDF5FE"><br />
      <font color="B970A6">�ٱ�����˵����</font><br />
      <br />
<br /></td>
    <td bgcolor="FDF5FE"><textarea name="content" cols="67" rows="10" id="content" style="border:#dddddd 1px solid;"></textarea></td>
  </tr>
  <tr>
    <td align="right" bgcolor="FDF5FE">&nbsp;</td>
    <td bgcolor="FDF5FE"><span style="border-right:#C4C4C4 1px solid;font-size:10.3pt;">
      <input name="submitok" type="hidden" value="addupdate" />
    </span>
      <input name="button2" type="submit" value=" �� �� " class="button">
      <br />
      <br />
���Ͷ����ʵ�����л��ά��Love��<font color="#FF0000">1000</font>���ϻ�����������߼���Ա��<br />
<br />
<br /></td>
  </tr>
</table>
</form> 
</body>
</html>
<?php ob_end_flush();?>