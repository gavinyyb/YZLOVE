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
	 $userid2=$_REQUEST['userid2'];
	 $sussflag=$_REQUEST['sussflag'];
	 $title=$_REQUEST['title'];
	 $content=$_REQUEST['content'];
	 echo $title;
	/// exit;
     $db->query("update  ".__TBL_STORY__."  set userid2=".$userid2.",sussflag=".$sussflag.",title='".$title."',content='".$content."' where id=".$classid);
       header("Location: ?classid=".$classid);
	   exit();
  }
  $classid=$_REQUEST['classid'];
  $rs=$db->query("SELECT * FROM ".__TBL_STORY__." WHERE id=".$classid);
  $rows = $db->fetch_array($rs);
?>
      <table width="750" height="42" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" bgcolor="EDF8FF" style="font-size:10.3pt;font-weight:bold;"><?php echo $rows['title']; ?></td>
        </tr>
      </table>
      <br>
      <table width="540" height="204" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="efefef" style="border:#dddddd 0px solid;">
        <form action="" method="post" name="MYFORM">
          <tr>
            <td height="30" align="right" bgcolor="#FFFFFF"><font color="6699CC">
              ��              ��ID�ţ�</font></td>
            <td width="454" bgcolor="#FFFFFF"><input name="userid2" type="text" class="input" id="userid2" value="<?php echo $rows['userid2']; ?>" size="8" maxlength="9" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >��������������������              ��������������
              <font color="6699CC">
              <input type="button" value="�رմ���" onClick="javascript:window.close();" class="buttonx" />
              </font></td>
          </tr>
          <tr>
            <td width="78" height="30" align="right" bgcolor="#FFFFFF"><font color="6699CC">����������</font></td>
            <td bgcolor="#FFFFFF"><select name="sussflag">
                <option value="">ѡ��</option>
                <option value="1" <?php if($rows['sussflag']==1) echo "selected";?>>Լ����</option>
                <option value="2" <?php if($rows['sussflag']==2) echo "selected";?>>������</option>
                <option value="3" <?php if($rows['sussflag']==3) echo "selected";?>>������</option>
                <option value="4" <?php if($rows['sussflag']==4) echo "selected";?>>������</option>
                <option value="5" <?php if($rows['sussflag']==5) echo "selected";?>>�����</option>
              </select>            </td>
          </tr>
          <tr>
            <td width="78" height="30" align="right" bgcolor="#FFFFFF"><font color="6699CC">�������⣺</font></td>
            <td bgcolor="#FFFFFF"><font color="#666666">
              <input name="title" type="text" class="input" size="65" maxlength="60" value="<?php echo $rows['title']; ?>">
            </font></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#FFFFFF"><font color="6699CC">�������ݣ�</font></td>
            <td align="right" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center" valign="top" bgcolor="#FFFFFF"><font color="#666666">
              <textarea name="content" cols="80" rows="15"><?php echo $rows['content']; ?></textarea>
            </font></td>
          </tr>
          <tr>
            <td height="27" colspan="2" align="center" bgcolor="#FFFFFF"><input name="submitok" type="hidden" value="modupdate">
              <input name="classid" type="hidden" value="<?php echo $classid; ?>">
              <input type="submit" name="Submit" value=" �ύ " class="button"></td>
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
