<?php
/*
+--------------------------------+
+ ����̨�����Ȩ���ڱ�������
+ Author��PSY��wjxxw@vip.qq.com www.linxiaoxian.com��QQ��8437645
+ ���ļ�����޸����ڣ�2010��1��
+ �����޸ģ��뱣��������Ϣ������վû��Ӱ��
+--------------------------------+
*/
require_once '../sub/init.php';
require_once '../sub/conn.php';
require_once '../sub/fun.php';
require_once 'session.php';
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<link href="main.css" rel="stylesheet" type="text/css">
<body bgcolor="FFF6FD">
<table width="778" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr valign="bottom"> 
    <td height="200" colspan="2" align="center" style="font-size:10.3pt;"><b><b><font color="0066CC" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $_SESSION['adminname'];?></font></b><font color="0066CC"><i>��</i></font>����ӭ����ͬ�ǽ�������̨����ϵͳ(С���޸İ�)
        Ver2.0</b></td>
  </tr>
  <tr> 
    <td width="483" align="right" valign="top">&nbsp;</td>
    <td width="295" valign="top"><br> 
<br>
      <font color="#666666">����ѡ�����Ҫ��������Ŀ��</font><br>
    <br></td>
  </tr>
</table>

</body>
</html>
