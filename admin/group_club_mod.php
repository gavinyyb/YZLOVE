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
	 $content=$_REQUEST['content'];
	 $title=$_REQUEST['title'];
	 $flag=$_REQUEST['flag'];
	 $kind=$_REQUEST['kind'];
	 $hdtime=$_REQUEST['hdtime'];
	 $jzbmtime=$_REQUEST['jzbmtime'];
	 $address8=$_REQUEST['address8'];
	 $jtlx=$_REQUEST['jtlx'];
	 $num_n=$_REQUEST['num_n'];
	 $num_r=$_REQUEST['num_r'];
	 $rmb_n=$_REQUEST['rmb_n'];
	 $rmb_r=$_REQUEST['rmb_r'];
	 $tbsm=$_REQUEST['tbsm'];
     $db->query("update  ".__TBL_GROUP_CLUB__."  set content='".$content."',title='".$title."',hdtime='".$hdtime."',kind='".$kind."',flag='".$flag."',jzbmtime='".$jzbmtime."',address='".$address8."',jtlx='".$jtlx."',num_n='".$num_n."',num_r='".$num_r."',rmb_n='".$rmb_n."',rmb_r='".$rmb_r."',tbsm='".$tbsm."'  where id=".$classid);
       header("Location: ?classid=".$classid);
	   exit();
  }
  $classid=$_REQUEST['classid'];
  $rs=$db->query("SELECT * FROM ".__TBL_GROUP_CLUB__." WHERE id=".$classid);
  $rows = $db->fetch_array($rs);
?>
<script language="javascript">
function chkform(){
	if(document.MYFORM.title.value.length<6 || document.MYFORM.title.value.length>100)
	{
	alert('���������� 6~100 �ֽ�!');
	document.MYFORM.title.focus();
	return false;
	}
	if(document.MYFORM.kind.value.length<2 || document.MYFORM.kind.value.length>100)
	{
	alert('���������� 2~100 �ֽ�!');
	document.MYFORM.kind.focus();
	return false;
	}	
	if(document.MYFORM.hdtime.value.length<2 || document.MYFORM.hdtime.value.length>100)
	{
	alert('�ʱ������� 2~100 �ֽ�!');
	document.MYFORM.hdtime.focus();
	return false;
	}	
	if(document.MYFORM.address8.value.length<2 || document.MYFORM.address8.value.length>100)
	{
	alert('��ص������ 2~100 �ֽ�!');
	document.MYFORM.address8.focus();
	return false;
	}	
	if(document.MYFORM.jtlx.value.length<2 || document.MYFORM.jtlx.value.length>100)
	{
	alert('��ͨ·������� 2~100 �ֽ�!');
	document.MYFORM.jtlx.focus();
	return false;
	}	
	if(document.MYFORM.num_n.value.length<1 || document.MYFORM.num_n.value.length>5)
	{
	alert('����ʿ�������޶������ 1~5 �ֽ�!');
	document.MYFORM.num_n.focus();
	return false;
	}	
	if(document.MYFORM.num_r.value.length<1 || document.MYFORM.num_r.value.length>5)
	{
	alert('��Ůʿ�������޶������ 1~5 �ֽ�!');
	document.MYFORM.num_r.focus();
	return false;
	}
		
	if(document.MYFORM.tbsm.value.length<1 || document.MYFORM.tbsm.value.length>500)
	{
	alert('�ر�˵������� 1~500 �ֽ�!');
	document.MYFORM.tbsm.focus();
	return false;
	}	
	if(document.MYFORM.content.value.length<10 || document.MYFORM.content.value.length>60000)
	{
	alert('���ϸ˵������� 10~50000 �ֽ�!');
	oEditor.focus();
	return false;
	}
}
</script>
<SCRIPT LANGUAGE="JavaScript" src="../sub/Editor/Editor.js"></SCRIPT> 
<SCRIPT LANGUAGE="JavaScript">
<!--
function CheckForm(obj){
obj.content.value = getContent();
oEditor.document.body.innerHTML=obj.content.value;
}
function checklength(theform){
var len=0;
var str=theform.content.value;
for(var i=0;i<str.length;i++){
char = str.charCodeAt(i);
if(!(char>255)){
len = len + 1;
}else{
len = len + 2;
}
}
alert("�����Ϣ�����ֽ�����" + len + "\nϵͳ��������ֽ�����50000");
}

//-->
</SCRIPT>
<script>name = "testwinson"</script>
<link href="main.css" rel="stylesheet" type="text/css">
      <table width="750" height="42" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" bgcolor="EDF8FF" style="font-size:10.3pt;font-weight:bold;">hfghfghf</td>
        </tr>
      </table>
      <br>
      <table width="750" border="0" align="center" cellpadding="5" cellspacing="0">
        <form action="group_club_mod.php" method="post" name="MYFORM" onSubmit="return chkform()" onClick="return CheckForm(this);" >
          <TEXTAREA NAME="content" ROWS="1" COLS="1" style="display:none;"><?php echo $rows['content']; ?></TEXTAREA>
          <tr >
            <td width="133" align="right"><font color="6699CC">����Ⱥ�飺</font></td>
            <td width="597" valign="top"><?php echo $rows['maintitle']; ?></td>
          </tr>
          <tr>
            <td align="right"><font color="6699CC">����ƣ�</font></td>
            <td valign="top"><input name="title" type="text" class=input value="<?php echo $rows['title']; ?>" size="60" maxlength="100"></td>
          </tr>
          <tr>
            <td align="right"><font color="6699CC">�״̬��</font></td>
            <td valign="top">
			  <select name="flag">
                <option value="0"  style="color:red;" <?php if ($rows['flag']==0) echo "selected"; ?>>��δ���</option>
                <option value="1"  style="color:#0066CC;" <?php if ($rows['flag']==1) echo "selected"; ?>>(���ڱ���) ���ڱ�����</option>
                <option value="2"  style="color:#FF6600;" <?php if ($rows['flag']==2) echo "selected"; ?>>(���ڽ���) �������</option>
                <option value="3"  style="color:#349933;" <?php if ($rows['flag']==3) echo "selected"; ?>>(�Ѿ�����) Բ���ɹ�</option>
              </select>
			 </td>
          </tr>
          <tr>
            <td align="right"><font color="6699CC">����ͣ�</font></td>
            <td valign="top"><input name="kind" type="text" class=input value="<?php echo $rows['kind']; ?>" size="20" maxlength="100">
                <font color="6699CC"><img src="images/tips3.gif" width="11" height="15" hspace="3" align="absmiddle">���ѣ����飬���εȵ�</font></td>
          </tr>
          <tr>
            <td align="right" ><font color="6699CC">�ʱ�䣺</font></td>
            <td valign="top" ><input name="hdtime" type="text" class=input id="hdtime" value="<?php echo $rows['hdtime']; ?>" size="30" maxlength="100">
                <font color="6699CC"><img src="images/tips3.gif" width="11" height="15" hspace="3" align="absmiddle">���ǻ�������ʱ��
                 �������������������������� 
                 <input type="button" value="�رմ���" onClick="javascript:window.close();" class="buttonx" />
                </font></td>
          </tr>
          <tr>
            <td align="right" bgcolor="ffffcc" ><font color="#FF0000"><b>��ֹ����ʱ��</b>��</font></td>
            <td valign="top" bgcolor="ffffcc">
			  <input name="jzbmtime" type="text" class=input id="jzbmtime" value="<?php echo $rows['jzbmtime']; ?>" size="30" maxlength="100" style="font-size:10.3pt;">
			</td>
          </tr>
          <tr>
            <td align="right" ><font color="6699CC">��ص㣺</font></td>
            <td valign="top"><input name="address8" type="text" class=input id="address8" value="<?php echo $rows['address']; ?>" size="60" maxlength="100"></td>
          </tr>
          <tr>
            <td align="right"><font color="6699CC">��ͨ·�ߣ�</font></td>
            <td valign="top"><input name="jtlx" type="text" class=input id="jtlx" value="<?php echo $rows['jtlx']; ?>" size="60" maxlength="100"></td>
          </tr>
          <tr>
            <td align="right"><font color="6699CC">�����޶���</font></td>
            <td valign="top"><font color="#666666"><img src="images/nan.gif" alt="��" width="11" height="14">
                <input name="num_n" type="text" class=input onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $rows['num_n']; ?>" size="3" maxlength="5">�� ��<img src="images/nv.gif" alt="Ů" width="11" height="14">
                <input name="num_r" type="text" class=input onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $rows['num_r']; ?>" size="3" maxlength="5">�� ��</font>
		     </td>
          </tr>
          <tr>
            <td align="right"><font color="6699CC">����ã�</font></td>
            <td valign="top"><font color="#666666"><img src="images/nan.gif" alt="��" width="11" height="14">
                  <input name="rmb_n" type="text" class=input value="<?php echo $rows['rmb_n']; ?>" size="3" maxlength="5" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
              Ԫ ��<img src="images/nv.gif" alt="Ů" width="11" height="14">
              <input name="rmb_r" type="text" class=input value="<?php echo $rows['rmb_r']; ?>" size="3" maxlength="5" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
              Ԫ��</font></td>
          </tr>
          <tr>
            <td align="right" valign="top"><font color="6699CC">�ر�˵����</font></td>
            <td valign="top"><textarea name="tbsm" cols="58" rows="4" id="tbsm" style="font-size:9pt;color:#333333;"><?php echo $rows['tbsm']; ?></textarea></td>
          </tr>
          <tr>
            <td align="right" valign="top"><font color="6699CC">���ϸ˵����</font></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><TABLE width="98%" height="24" align="center" cellpadding="0" cellspacing="0" bgcolor="efefef" style="border-left:#dddddd 1px  solid;border-right:#dddddd 1px  solid;border-top:#dddddd 1px  solid;">
                <TR>
                  <TD align="right"><select name="font_name" id="select" onChange="FontName(this.options[this.selectedIndex].value)">
                      <option class="heading" selected>���� 
                      <option value="����">���� 
                      <option value="����">���� 
                      <option value="����_GB2312">���� 
                      <option value="����_GB2312">���� 
                      <option value="����">���� 
                      <option value="��Բ">��Բ 
                      <option value="������">������ 
                      <option value="Arial">Arial 
                      <option value="Arial Black">Arial Black
                      <option value="Courier">Courier 
                      <option value="System">System 
                      <option value="Times New Roman">Times
                      <option value="Verdana">Verdana 
                      <option value="Wingdings">Wingdings</option>
                    </select>                  </TD>
                  <TD><select name="font_size" id="select2" onChange="FontSize(this.options[this.selectedIndex].value)">
                      <option value="1">�ֺ�</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                    </select>                  </TD>
                  <TD width="22" align="center" OnClick="FontColor()" onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off'; onmousedown=this.className='Hand_Down';><IMG SRC="sub/Editor/images/fgcolor.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="������ɫ" ></TD>
                  <TD width="22" align="center" OnClick="BackColor()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/fbcolor.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="���ֱ�����ɫ"></TD>
                  <TD width="22" align="center" OnClick="bold()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/bold.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="�Ӵ�"></TD>
                  <TD width="22" align="center" OnClick="italic()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/italic.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="��б"></TD>
                  <TD width="22" align="center" OnClick="underline()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/underline.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="�»���"></TD>
                  <TD width="22" align="center" OnClick="ralign('left')" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/aleft.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="�����"></TD>
                  <TD width="22" align="center" OnClick="ralign('center')" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/center.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="����"></TD>
                  <TD width="22" height="26" align="center" OnClick="ralign('right')" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/aright.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="�Ҷ���"></TD>
                  <TD width="22" align="center" OnClick="url()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/wlink.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="��������"></TD>
                  <TD width="22" align="center" OnClick="unurl()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/unlink.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="�������"></TD>
                  <TD width="22" align="center" OnClick="image()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/img.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="����ͼƬ"></TD>
                  <TD width="22" align="center" OnClick="flash()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/swf.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="����Flash"></TD>
                  <TD width="22" align="center" OnClick="wmv()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/wmv.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="����Windows Media"></TD>
                  <TD width="22" align="center" OnClick="rm()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';><IMG SRC="sub/Editor/images/rm.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="����Real Media"></TD>
                  <TD width="24" align="center" OnClick="fh()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';ondrag='return false;'><IMG SRC="sub/Editor/images/bq.gif" WIDTH="19" HEIGHT="19" BORDER="0" ALT="�������"></TD>
                  <TD width="30" align="center" OnClick="unformat()" onmousedown=this.className='Hand_Down'; onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off'; this.className='Hand_Off';ondrag='return false;'><IMG SRC="sub/Editor/images/cleancode.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="�����ʽ"></TD>
                </TR>
              </TABLE>
                <table width="98%" height="400" border="0" align="center" cellpadding="0" cellspacing="1" id="oblog_Container" style="border:#dddddd 1px  solid;">
                  <tr>
                    <td><SCRIPT LANGUAGE="JavaScript">Editor(document.MYFORM.content.value);</SCRIPT></td>
                  </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="submitok" type="hidden" value="modupdate">
<input name="classid" type="hidden" value="<?php echo $classid;?>">
<input type="submit" name="Submit" value=" �ύ " class="button">
              ��
              <a href="javascript:checklength(document.MYFORM);" style="text-decoration: none">[<b><font color="#FF6600"><u>�鿴���ݳ���</u></font></b>]</a></td>
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
