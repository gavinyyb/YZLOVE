<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}

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
font{font-family:Verdana}
</style>
</head>
<body>
<ul>
<li><a href="k_myloveb.php">�ҵ��ʻ�</a></li>
<li><a href="k_myloveb.php?submitok=list">�����嵥</a></li>
<li class='liselect'><a href="k_vip.php">��Ա����</a></li>
<li><a href="k_bidding.php">��������</a></li>
<li><a href="k_homepage.php">װ����ҳ</a></li>
<li><a href="k_sfz.php">ʵ����֤</a></li>
<li><a href="../news.php" target="_blank">��վ��̬</a></li>
<li><a href="k_getloveb.php">��ȡLove��</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <table width="650" height="42" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FBDDF1">
<tr>
<td bgcolor="#FDEEF8" style="color:#FF6600;font-size:20px;font-family:����,����;letter-spacing:1px"><img src="images/viptb.gif" width="30" height="42" hspace="5" align="absmiddle" />&nbsp;��Ա��������</td>
</tr>
<tr>
  <td bgcolor="#FFFFFF" style="line-height:150%;padding:20px;color:#666"><b><font color="#FF6600">����������</font></b><br>        
����<img src="images/li.gif" width="3" height="5" hspace="3" />����һ���ķ�����á�Ϊ�˱�֤��վ��˳������ȥ�������ĸ���ɱ�������������������á���Ա���ʺͶ����������ã�����ֻ����ȡ���ַ���ѣ�����Ҹ���֧�֡�<br>
����<img src="images/li.gif" width="3" height="5" hspace="3" />�м���ʿƾ���֤�������ֱ�����������Ż�Ա��ֱ��ϲ����Ե��<br>
����<img src="images/li.gif" width="3" height="5" hspace="3" />Ů��55�����ϣ�����60�����ϣ�ƾ���֤�������ֱ�����������Ż�Ա��ֱ��ϲ����Ե��<br />����<img src="images/li.gif" width="3" height="5" hspace="3" />���˻��ִﵽ̫��<img src="images/star160.gif" hspace="3" vspace="5" align="absmiddle"/>�����������������ʯ��Ա������<a href="#" class="uDF2C91"  onclick="alert('���־���������ʱ��(��λΪ����)�����㷽ʽ��\n\n����1��̫�� �� 160��\n\n����1������ �� 40��\n\n����1������ �� 10��\n\n��ֻҪÿ���¼��վ����Ҫ�˳���ϵͳ���Զ��ۼӻ��֣�1����1���������˵����Ͻ��˳���ťӴ�����򲻻���㡣\n\n\n���ֵ����ã�\n\n����1��̫�� �� ������ʯ��Ա (�˻��ֹ��2011��12��31��) \n\n����1������ �� ���ó��Ż�Ա (�˻��ֹ��2011��12��31��)  \n\nֻҪ���ִﵽ�˱�׼������ͷ���Ա�������Ҫ��')">�鿴����</a><br />
����<img src="images/li.gif" width="3" height="5" hspace="3" />���˻��ִﵽ����<img src="images/star40.gif" width="16" height="16" hspace="3" align="absmiddle"/>��������������ó��Ż�Ա������<a href="#" class="uDF2C91"  onclick="alert('���־���������ʱ��(��λΪ����)�����㷽ʽ��\n\n����1��̫�� �� 160��\n\n����1������ �� 40��\n\n����1������ �� 10��\n\n��ֻҪÿ���¼��վ����Ҫ�˳���ϵͳ���Զ��ۼӻ��֣�1����1���������˵����Ͻ��˳���ťӴ�����򲻻���㡣\n\n\n���ֵ����ã�\n\n����1��̫�� �� ������ʯ��Ա (�˻��ֹ��2011��12��31��)  \n\n����1������ �� ���ó��Ż�Ա (�˻��ֹ��2010��12��31��) \n\nֻҪ���ִﵽ�˱�׼������ͷ���Ա�������Ҫ��')">�鿴����</a></td>
</tr>
</table>
  <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center"><a href="k_bank.php"><img src="images/sj.gif" vspace="5" border="0" /></a></td>
    </tr>
  </table>
  <?php require_once YZLOVE.'price.html';?>
  <br>
<table width="650" border="0" align="center" cellpadding="8" cellspacing="1" bgcolor="#CCE1B5">
<tr bgcolor="#F9F9F9">
<td width="252" height="20" align="center" bgcolor="#F0FAE9" style="font-size:10.3pt;"><font color="FF3366"><b>������Ȩ</b></font></td>
<td width="114" height="20" align="center" bgcolor="#F0FAE9"><font color="FF3366"><b><img src="../images/grade/13.gif" width="16" height="16" hspace="1" vspace="4" align="absmiddle"><img src="../images/grade/23.gif" width="17" height="16" hspace="2" vspace="4" align="absmiddle">��ʯ��Ա</b></font></td>
<td width="112" height="20" align="center" bgcolor="#F0FAE9"><font color="FF3366"><b><img src="../images/grade/12.gif" width="13" height="18" hspace="3" align="absmiddle"><img src="../images/grade/22.gif" width="13" height="18" hspace="3" align="absmiddle">���Ż�Ա<br>
</b></font></td>
<td width="103" height="20" align="center" bgcolor="#F0FAE9"><font color="FF3366"><b><img src="../images/grade/11.gif" width="8" height="12" hspace="2"><img src="../images/grade/21.gif" width="8" height="12" hspace="2">��ͨ��Ա</b></font></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>����Ա��ʶ</b></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center"><b>����<font color="#FF6699">Love��</font></b></td>
  <td align="center"><font color="#FF0000">20000</font>~<font color="#FF0000">150000</font>��</td>
  <td align="center"><font color="#FF0000">10000</font>~<font color="#FF0000">100000</font>��</td>
  <td align="center"><font color="#FF0000"><?php echo $Global['m_regloveb']; ?></font>��</td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">�������ѵ���</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="24" align="center">�ϴ�������Ƭ(����������) </td>
<td align="center" bgcolor="#FFFFFF"><font color="#ff0000"><?php echo $Global['m_photo_num3']; ?></font> ��</td>
<td align="center"><font color="#ff0000"><?php echo $Global['m_photo_num2']; ?></font> ��</td>
<td align="center"><font color="#ff0000"><?php echo $Global['m_photo_num1']; ?></font> ��</td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">�ͷ�Э��������Ƭ</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">��������</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">�߼�����</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">��������</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">�������Ե��</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">�����Ա����</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center">������</td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>�鿴��ϵ��ʽ</b></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center">������</td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>�������� </b><font color="#FF0000"><i>new!</i></font> </td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center">���������¼</td>
  <td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center" bgcolor="#FFFFFF">�鿴���ԡ��������ԡ��ظ�����</td>
<td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF">�������Կ۳�Love��</td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $Global['m_gbookloveb']; ?></font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $Global['m_gbookloveb']*2; ?></font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $Global['m_gbookloveb']*3; ?></font></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF" style="line-height:150%">������һ����û��¼�Ļ�Ա�������ԣ��᳭��һ�ݷ����Է�����<b> </b><font color="#FF0000"><i>new!</i></font> <br />
    <font color="#6F9F00">(�����û�Ա)</font></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">���Է����ԣ���֪�Է��Ƿ��Ķ�</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>װ�������ҳ </b><span style="line-height:150%"><font color="#FF0000"><i>new!</i></font></span> </td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center" style="line-height:150%"><b>��������Ȧ��С��̳<br />
</b><font color="#6F9F00">(�����û�Ա)</font></td>
<td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" style="line-height:150%"><b>�����¼</b> <font color="#FF0000"><i>new!</i></font> <br />
    <font color="#6F9F00">(�����û�Ա)</font></td>
  <td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
  <td align="center">&nbsp;</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF"><b>�����ۻ�</b></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF">�μӻ</td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="11" align="center"><b>������<font color="FF3366">Love��</font>/����</b></td>
<td align="center" bgcolor="#FFFFFF"><font color="#ff0000">10</font> ��</td>
<td align="center" bgcolor="#FFFFFF"><font color="#ff0000">2</font> ��</td>
<td align="center" bgcolor="#FFFFFF"><font color="#ff0000">1</font> ��</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="5" align="center" style="line-height:150%">������Love�ҽ���ϵͳ�Զ�20�����ۼ�һ�Σ����ص���ͻȻ�ϵ硢��С�Ĺرմ��ڡ������ǵ���˳���ť��<b> </b><font color="#FF0000"><i>new!</i></font> </td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">�Զ�</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">�Զ�</font></td>
  <td align="center" bgcolor="#FFFFFF">�ֶ�</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="6" align="center">�����ݻ���<span style="line-height:150%">����</span>(ͬ��) <span style="line-height:150%"><b> </b><font color="#FF0000"><i>new!</i></font> </span></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">�Զ�</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">�Զ�</font></td>
  <td align="center" bgcolor="#FFFFFF">�ֶ�</td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>�����Ƽ�</b></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>���ڽ���Love��</b></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>����ÿ�</b></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="11" align="center" bgcolor="#FFFFFF">�����ռ�</td>
<td align="center" bgcolor="#FFFFFF"><font color="FD4F8E">ֱ��ͨ��</font></td>
<td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">ֱ��ͨ��</font></td>
<td align="center" bgcolor="#FFFFFF">��Ҫ���</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="12" align="center" bgcolor="#FFFFFF">�����ռ�����</td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center" bgcolor="#FFFFFF">������������</td>
<td align="center" bgcolor="#FFFFFF"><font color="FD4F8E">ֱ��ͨ��</font></td>
<td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">ֱ��ͨ��</font></td>
<td align="center" bgcolor="#FFFFFF">��Ҫ���</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF">��������������</td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF"><b>����1+1����Լ�� </b><font color="#FF0000"><i>new!</i></font> </td>
  <td align="center" bgcolor="#FFFFFF"><font color="FD4F8E">ֱ��ͨ��</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="FD4F8E">ֱ��ͨ��</font></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF">�μ�1+1Լ��</td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>¼��MTV��Ƶ</b></td>
<td align="center"><font color="FD4F8E">ֱ��ͨ��</font></td>
<td align="center"><font color="FD4F8E">ֱ��ͨ��</font></td>
<td align="center">��Ҫ���</td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="2" align="center">¼��MTV��Ƶ����</td>
<td align="center"><font color="FF3366"><?php echo $Global['m_photo_num3']; ?></font> ��</td>
<td align="center"><font color="#ff0000"><?php echo $Global['m_photo_num2']; ?></font> ��</td>
<td align="center"><font color="#ff0000"><?php echo $Global['m_photo_num1']; ?></font> ��</td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="0" align="center">�鿴�Է�������Ȧ</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="0" align="center"><b>��������֪ͨ</b><span style="line-height:150%"> <font color="#FF0000"><i>new!</i></font></span></td>
  <td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="0" align="center" style="line-height:150%"><b>���Ѷ�̬</b> (��ĺ���ֻҪ�����ռǣ�������������Ȧ����̳�������ӣ�����1+1˽��Լ�ᣬ�ϴ���Ƭ���������գ�¼����Ƶ���㽫�ڵ�һʱ����֪����ʱ�̹�ע�Է���̬) <font color="#FF0000"><i>new!<br />
  </i></font><font color="#6F9F00">(�����û�Ա)</font></td>
  <td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="2" align="center" bgcolor="#FFFFFF">�鿴�Է�����</td>
<td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="1" align="center">��������</td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">����</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">����</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $Global['m_friend_num']; ?></font> ��</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="0" align="center">��������</td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">����</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">����</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $Global['m_gbook_num']; ?></font> �� </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="0" align="center">��������</td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">����</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">����</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">����</font></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="40" colspan="4" align="center"><br>
<a href="k_bank.php"><img src="images/sj.gif" border="0"></a><br>
<br>
<br>
<br></td>
</tr>
</table>
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>