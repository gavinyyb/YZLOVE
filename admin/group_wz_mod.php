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
	 $content=$_REQUEST['content'];
	 $title=$_REQUEST['title'];
	/// exit;
     $db->query("update  ".__TBL_GROUP_WZ__."  set content='".$content."',title='".$title."' where id=".$classid);
       header("Location: ?classid=".$classid);
	   exit();
  }
  $classid=$_REQUEST['classid'];
  $rs=$db->query("SELECT * FROM ".__TBL_GROUP_WZ__." WHERE id=".$classid);
  $rows = $db->fetch_array($rs);
?>
     <table width="500" height="63" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="dddddd" >
<form action="" method="post" name=myform target="testwinson">
<tr>

            <td width="580" valign="top">����:&nbsp;<input name="title" type="text" class=input value="<?php echo $rows['title']; ?>" size="80" maxlength="200"></td>
           
          </tr>
<tr>
<td cols=3 align="center" valign="top" bgcolor="efefef">
<textarea name="content" cols="120" onpropertychange='this.style.posHeight=this.scrollHeight' id=textarea onfocus='textarea.style.posHeight=this.scrollHeight'><?php echo $rows['content']; ?></textarea>
<br>
<input name="submitok" type="hidden" value="modupdate">
<input name="classid" type="hidden" value="<?php echo $classid; ?>">
<input name="�ύ" type="submit" class="button" value=" �� �� ">
<br>
<br></td>
</tr>
</form>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" align="center" bgcolor="9EDEFF"><b>Ԥ �� Ч ��</b></td>
  </tr>
</table>
<br>
<table width="750" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td valign="top" style="font-size:10.3pt;">���ݣ�<br/><?php echo $rows['content']; ?></td>
  </tr>
</table>
<table width="500" height="89" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
<td align="center"><input type="button" value="�رմ���" onClick="javascript:window.close();" class="buttonx" /></td>
</tr>
</table>
</body>
</html>
