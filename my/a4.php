<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
//
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT ifopencontact,email,address,post,tel,qq,msn,popo,homepage FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ($submitok=="modupdate") {
if ( !ereg("^[1-3]{1}$",$ifopencontact) && !empty($ifopencontact) )callmsg("Forbidden","-1");
if ( strlen($address) > 50 )callmsg("��ַ(������50�ֽ�25��������)","-1");
if ( strlen($post) > 6 )callmsg("��������(������6������)","-1");
if ( strlen($tel) > 50 )callmsg("�绰/�ֻ�(������50�ֽ�����)","-1");
if ( !empty($form_email) && !ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$form_email))callmsg("��������ȷ��E-mail��","-1");
if ( strlen($qq) > 50 )callmsg("QQ(������50�ֽ�����)","-1");
if ( strlen($msn) > 50 )callmsg("msn(������50�ֽ�����)","-1");
if ( strlen($popo) > 50 )callmsg("popo(������50�ֽ�����)","-1");
if ( strlen($homepage) > 50 )callmsg("homepage(������100�ֽ�����)","-1");
$db->query("UPDATE ".__TBL_MAIN__." SET ifopencontact='$ifopencontact',email='$form_email',address='$address',post='$post',tel='$tel',qq='$qq',msn='$msn',popo='$popo',homepage='$homepage' WHERE id='$cook_userid'");
callmsg("�޸ĳɹ���","a5.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* main1 */
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;}
.main1_tselect {float:left;width:70px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:70px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
--> 
</style>
</head>
<body>
<div class="main1">
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a1.php" class="a333">��������</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a2.php" class="a333">��ϸ����</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a3.php" class="a333">���Ķ���</a></div>
<div class="main1_tselect">��ϵ����</div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a5.php" class="a333">Լ�ύ��</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a6.php" class="a333">��������</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a7.php" class="a333">�쳾֪��</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a8.php" class="a333">���̻���</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a9.php" class="a333">�޸�����</a></div>
</div>
<div class="main2">
<div class="main2_frame"> <br />
<br />
<table width="650" border="0" align="center" cellpadding="2" cellspacing="0">
<form action="" method="post" name="YZLOVEFORM" id="YZLOVEFORM">
<tr>
<td width="190" height="35" align="right"><font color="#666666">�ҵ���ϵ��ʽ��</font></td>
<td width="452" style="color:#666;">
  <input name="ifopencontact" type="radio" value="1" id="gyl1" <?php if ($row['ifopencontact']==1)echo "checked"; ?> />
  <label for="gyl1">����</label>
��
  <input type="radio" name="ifopencontact" value="2" id="gyl2" <?php if ($row['ifopencontact']==2)echo "checked"; ?> />
  <label for="gyl2">���ѿɼ�</label>
  
  ��
  <input type="radio" name="ifopencontact" value="3" id="gyl3" <?php if ($row['ifopencontact']==3)echo "checked"; ?> />
  <label for="gyl3">����</label>
    </td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">��ַ��</font></td>
<td width="452"><input name="address" type="text"  class="input" id="address" value="<?php echo stripslashes($row['address']);?>" size="60" maxlength="50"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">�������룺</font></td>
<td width="452"><input name="post" type="text"  class="input" value="<?php echo $row['post'];?>" size="8" maxlength="6"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">�绰/�ֻ���</font></td>
<td width="452"><input name="tel" type="text"  class="input" value="<?php echo stripslashes($row['tel']);?>" size="60" maxlength="50"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">�������䣺</font></td>
<td><input name="form_email" type="text" class="input" value="<?php echo $row['email'];?>" size="40" maxlength="25"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">QQ��</font></td>
<td><input name="qq" type="text"  class="input" value="<?php echo stripslashes($row['qq']);?>" size="40" maxlength="50"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">MSN��</font></td>
<td><input name="msn" type="text"  class="input" value="<?php echo stripslashes($row['msn']);?>" size="60" maxlength="50"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">POPO��</font></td>
<td><input name="popo" type="text"  class="input" value="<?php echo stripslashes($row['popo']);?>" size="60" maxlength="50"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">������ҳ��</font></td>
<td><input name="homepage" type="text"  class="input" value="<?php echo stripslashes($row['homepage']);?>" size="60" maxlength="100"></td>
</tr>
<tr>
<td height="55" colspan="2" align="center"><input type="hidden" name="submitok" value="modupdate" />
<input type="submit" name="Submit" value=" �� �� " class="button" /></td>
</tr>
</form>
</table>
<br />
<br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>