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
?>
<base target=testwinson><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<script>name = "testwinson"</script>
<link href="main.css" rel="stylesheet" type="text/css">
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="2" marginwidth="0" marginheight="0"  bgcolor=#ffffff>
<?php
  if($_REQUEST['submitok']=="modupdate"){
     $classid=$_GET['classid'];
	 $okName=trim($_REQUEST['okName']);
	 $Singer=trim($_REQUEST['Singer']);
	 $movie1=trim($_REQUEST['movie1']);
	 $geci=trim($_REQUEST['geci']);
	/// exit;
     $db->query("update  oklist  set okName='".$okName."',Singer='".$Singer."',movie1='".$movie1."',geci='".$geci."' where id=".$classid);
       header("Location: ?classid=".$classid);
	   exit();
  }
  $classid=$_REQUEST['classid'];
  $rs=$db->query("SELECT * FROM oklist WHERE id=".$classid);
  $rows = $db->fetch_array($rs);
?>
     <table width="750" height="42" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" bgcolor="EDF8FF" style="font-size:10.3pt;font-weight:bold;">mmmmmmmm</td>
        </tr>
      </table>
      <br>
      <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
        <form action="" method="post" name="MYFORM">
          <tr>
            <td width="78" align="right"><font color="#6699CC">�������ƣ�</font></td>
            <td width="652" valign="top"><input name="okName" type="text" class=input value="<?php echo $rows['okName']; ?>" size="60" maxlength="100"></font></td>
          </tr>
          <tr>
            <td align="right" valign="top"><font color="#6699CC">�������֣�</font></td>
            <td align="left" valign="top"><input name="Singer" type="text" class="input" id="Singer" style="font-size:9pt;" value="<?php echo $rows['Singer']; ?>" size="20" maxlength="50"></td>
          </tr>
          <tr>
            <td align="right" valign="top"><font color="#6699CC">������ַ��</font></td>
            <td align="left" valign="top"><font color="#666666">
              <input name="movie1" type="text" class="input" id="movie1" style="font-size:9pt;" value="<?php echo $rows['movie1']; ?>" size="100" maxlength="100">
            </font></td>
          </tr>
          <tr>
            <td align="right" valign="top"><font color="#6699CC">�衡���ʣ�</font></td>
            <td align="left" valign="top" ><textarea name="geci" cols="100" rows="30"><?php echo $rows['geci']; ?></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="submitok" type="hidden" value="modupdate">
<input name="classid" type="hidden" value="<?php echo $classid; ?>">
<input type="submit" name="Submit" value=" �޸� " class="button">
              ��������������������������������
              <input type="button" value="�رմ���" onClick="javascript:window.close();" class="buttonx" />
            </td>
          </tr>
        </form>
</table>
      <table width="500" height="89" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
      </table>
</body>
</html>
