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
     $classid=$_REQUEST['classid'];
	 $ifopen=$_REQUEST['ifopen'];
	 $flag=$_REQUEST['flag'];
	 $content=$_REQUEST['content'];
	 $content2=$_REQUEST['content2'];
	 $title=$_REQUEST['title'];
     $db->query("update  ".__TBL_ASK__."  set content='".$content."',content2='".$content2."',ifopen=".$ifopen.",flag=".$flag.",title='".$title."' where id=".$classid);
       header("Location: ?classid=".$classid);
	   exit();
  }
  $classid=$_REQUEST['classid'];
  $rs=$db->query("SELECT * FROM ".__TBL_ASK__." WHERE id=".$classid);
  $rows = $db->fetch_array($rs);
?>
       <table width="750" height="42" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" bgcolor="EDF8FF" style="font-size:10.3pt;font-weight:bold;"><?php echo $rows['title']; ?></td>
        </tr>
      </table>
      <br>
      <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
        <form action="" method="post" name="MYFORM">
          <tr>
            <td width="141" align="right"><font color="6699CC">�ꡡ���⣺</font></td>
            <td width="589" valign="top"><input name="title" type="text" class=input value="<?php echo $rows['title']; ?>" size="60" maxlength="100">����������������
              <font color="6699CC">
              <input type="button" value="�رմ���" onClick="javascript:window.close();" class="buttonx" />
            </font></td>
          </tr>
          <tr>
            <td align="right"><font color="6699CC">״����̬��</font></td>
            <td valign="top"><select name="flag" >
                <option value="0" <? if($rows['flag']==0) echo "selected"; ?>>δ��</option>
                <option value="1" <? if($rows['flag']==1) echo "selected"; ?>>�����</option>
                <option value="2" <? if($rows['flag']==2) echo "selected"; ?>>�ѽ��</option>
                <option value="3" <? if($rows['flag']==3) echo "selected"; ?>>�ѹ���</option>
                <option value="4" <? if($rows['flag']==4) echo "selected"; ?>>�ѳ���</option>
                <option value="5" <? if($rows['flag']==5) echo "selected"; ?>>������ش�</option>
            </select>			</td>
          </tr>
          <tr>
            <td align="right"><font color="#6699CC">�Ƿ�������</font></td>
            <td valign="top"><input type="radio" name="ifopen" value="1" style="border:0px" <? if($rows['ifopen']==1) echo "checked"; ?>>
            ����
              ����
              <input type="radio" name="ifopen" value="0" style="border:0px" <? if($rows['ifopen']==0) echo "checked"; ?>>
����</td>
          </tr>
          <tr>
            <td align="right"><font color="6699CC">�������ݣ�</font></td>
            <td valign="top"><textarea name="content2" cols="95" rows="10" id="content2"><?php echo $rows['content2']; ?></textarea></td>
          </tr>
          <tr>
            <td align="right" valign="top"><font color="6699CC">�ڡ����ݡ�</font></td>
            <td align="right" valign="top"  style="font-size:10.3pt;padding-right:20px"><a href="../home/v2.html" target="_blank"><b><font color="#FF0000"><img src="images/zoom.gif" width="13" height="13" hspace="3" border="0" align="texttop">Ԥ����</font></b></a></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><textarea name="content" cols="120" rows="20"><?php echo $rows['content']; ?></textarea></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="submitok" type="hidden" value="modupdate">
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
