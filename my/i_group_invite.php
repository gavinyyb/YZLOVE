<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,9}$",$mainid) || empty($mainid) )callmsg("Forbidden!","-1");
$rt = $db->query("SELECT title,useropen,userid,userid1,userid2,userid3 FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$maintitle = stripslashes($row['title']);
	$useropen = $row['useropen'];
	$userid_main = $row['userid'];
	$userid1_main = $row['userid1'];
	$userid2_main = $row['userid2'];
	$userid3_main = $row['userid3'];
} else {
	callmsg("�������û�в���Ȩ��!","-1");
}
if ($userid_main == $cook_userid || $userid1_main == $cook_userid || $userid2_main == $cook_userid || $userid3_main == $cook_userid || $cook_grade == 10) {
	$authority_main = "OK";
} else {
	$authority_main = "NO";
}
if ($submitok == "adduser"){
	if ($authority_main == "NO"){
		if ($useropen == 1) {
			$rt2 = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_USER__." WHERE userid=".$cook_userid." AND mainid=".$mainid." AND flag=1");
			$row2 = $db->fetch_array($rt2);
			if ($row2[0] != 1)callmsg("ֻ�б�Ȧ�ӳ�Ա�ſ��Բ����˹��ܣ�","-1");
		} else {
			callmsg("ֻ�л᳤�ſ��Բ����˹��ܣ�","-1");
		}
	}
	if ( !ereg("^[0-9]{1,9}$",$form_userid) || empty($form_userid) )callmsg("��ԱID��ʽ��������������!","-1");
	$rt = $db->query("SELECT nickname FROM ".__TBL_MAIN__." WHERE id=".$form_userid." AND flag=1");
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$membernickname = $row[0];
	} else {
		callmsg("�˻�Ա�����ڣ����������룡","-1");
	}
	$rt2 = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_USER__." WHERE userid=".$form_userid." AND mainid=".$mainid." AND flag=1");
	$row2 = $db->fetch_array($rt2);
	if ($row2[0] >= 1)callmsg("�����Ѿ��Ǹ�Ȧ���е�һԱ���벻Ҫ�ظ����룡","-1");
	
	$addtime=date("Y-m-d H:i:s");
	$title   = $cook_nickname." ��������롰".$maintitle."�����Ȧ�ӣ�";
	$content = "�Ͽ�������ǡ�".$maintitle."��Ȧ�Ӱɣ��öྪϲ�����㣡��<br>";
	$content .= "<a href=".$Global['group_2domain']."/groupmain.php?submitok=loginupdate&mainid=".$mainid." target=_blank><u><font color=red>���������Ȧ��</font></u></a>";
	$content .= "��|��<a href=".$Global['group_2domain']."/".$mainid." target=_blank><u><font color=green>�Ƚ�ȥ������˵</font></u></a>";
	$db->query("INSERT INTO ".__TBL_GBOOK__."  (userid,nickname,senduserid,sendnickname,title,content,addtime) VALUES ('$form_userid','$membernickname','".$Global['m_gbookadminuid']."','�ͷ�����','$title','$content','$addtime')");
	callmsg("�����ѷ��ͳɹ���","i_group_invite.php?mainid=".$mainid);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:84px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:84px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:84px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:84px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:84px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
.img {
max-width: 150px;max-height: 150px;
/*
width: expression(this.width > 150 && this.width > this.height ? 150 : auto);
height: expression(this.height > 150 ? 150 : auto);
*/
}
</style>
</head>
<body>
<ul>
<li class="liselect"><a href="i_group.php">�ҵ�Ȧ��</a></li>
<li><a href="i_group_add.php">����Ȧ��</a></li>
<li><a href="i_group_mylogin.php">�����Ȧ��</a></li>
<li><a href="i_group_myblog.php">�ҵ����� </a></li>
<li><a href="i_group_favorite.php">�����ղ� </a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br>
<table width="670" height="40" border="0" cellpadding="0" cellspacing="0" bgcolor="F3FAFE" >
    <tr>
      <td bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" />��<b><a href="i_group_bk.php?mainid=<?php echo $mainid;?>"><?php echo $maintitle; ?></a></b>�����˼���</td>
      <td width="109" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;">&nbsp;</td>
    </tr>
  </table>
<br />
<table width="670" border="0" align="center" cellpadding="3" cellspacing="0" style="border:#f9d5e4 1px solid;">
        <form method=post action="i_group_invite.php">
          <tr bgcolor="#ECFAFF">
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="border-bottom:#f9d5e4 1px solid;"><font color="6699CC"><b><font color="#FF0000">������һ</font></b></font>�����뱾վ��Ա���뵽��<?php echo $maintitle; ?>�����Ȧ�ӡ�</td>
          </tr>
          <tr bgcolor="#ECFAFF">
            <td width="312" height="80" align="right" valign="bottom" bgcolor="#FFFFFF" style="color:#DF2C91;font-size:14px">
            ������Ta�ڽ�������ID�ţ�</td>
            <td width="344" height="0" valign="bottom" bgcolor="#FFFFFF"><input name="form_userid" type="text" class="input" id="form_userid" size="8" maxlength="9" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
              ��
            [<a href="#" title=" �� ����ߵĿ�������Ta��ID�ţ������û���Ҳ�����ǳ�Ӵ��<br> �� ���磺�������õĻ�Ա������ҳ��ַΪ �� <?php echo $Global['home_2domain']; ?>/<font color=blue>1688</font> ��<br> �� ��ô����˵�ID�ž��������ַ�������Ǹ����� �� <font color=blue>1688</font> �� ��<br> �� ɾ���˸��鳤����0��" class="uDF2C91">����</a>]</td>
          </tr>

          <tr bgcolor="#ECFAFF">
            <td height="80" align="center" bgcolor="#FFFFFF"><input type=hidden value="<?php echo $mainid; ?>" name="mainid">
            <input type=hidden value="adduser" name="submitok"></td>
            <td width="344" height="13" valign="top" bgcolor="#FFFFFF"><input type="submit" class="buttonx" value="��ʼ����" >
            <br>
            <br></td>
          </tr>
        </form>
    </table>
      <br>
<script language='javascript' type='text/javascript'>
<!--
function recommend() {
if (document.all){
var clipBoardContent="";
clipBoardContent+="�������ҵ�Ȧ�ӣ������������Ӵ��";
clipBoardContent+="\n";
clipBoardContent+="��Ȧ�����ƣ�<?php echo $maintitle; ?>";
clipBoardContent+="\n";
clipBoardContent+="��Ȧ�ӵ�ַ��<?php echo $Global['group_2domain']; ?>/<?php echo $mainid; ?>";
window.clipboardData.setData("Text",clipBoardContent);
alert("���Ƴɹ��������ʹ��ճ����(Ctrl+V)���ܷ���QQ��MSN�ϵĺ��ѣ��������������룡");
}
}
//-->
</script>
      <table width="670" border="0" align="center" cellpadding="3" cellspacing="0" style="border:#f9d5e4 1px solid;">
        <form method=post action="i_group_invite.php">
          <tr bgcolor="#ECFAFF">
            <td height="30" bgcolor="#FFFFFF" style="border-bottom:#f9d5e4 1px solid;"><font color="6699CC"><b><font color="#FF0000">��������</font></b></font>�������������Ѽ��뵽��<?php echo $maintitle; ?>�����Ȧ�ӡ�</td>
          </tr>
          <tr bgcolor="#ECFAFF">
            <td height="110" align="center" bgcolor="#FFFFFF" style="color:#DF2C91;font-size:14px"><b><br>
              <br>
            >> </b><a onclick=recommend() href="####"><font color="#333333">���Ʊ�Ⱥ��ַ������QQ��MSN�ϵĺ��ѣ��������������룡</font></a><b> <<<br>
            <br>
            <br>
            <br>
            </b></td>
          </tr>
        </form>
    </table>
<br /><br />
<br /><br />
</div></div>
<script Language="JavaScript">
tPopWait=0;
tPopShow=20000;
showPopStep=1000;
popOpacity=99;
sPop=null;
curShow=null;
tFadeOut=null;
tFadeIn=null;
tFadeWaiting=null;
document.write("<style type='text/css'id='defaultPopStyle'>");
document.write(".cPopText {  background-color: #ffffcc;color:#ff0000; border: 1px #ffcc00 solid;font-color: font-size: 12px; padding-right: 4px; padding-left: 4px; height: 70px; padding-top: 3px; padding-bottom: 2px; filter: Alpha(Opacity=0)}");
document.write("</style>");
document.write("<div id='dypopLayer' style='position:absolute;z-index:3;' class='cPopText'></div>");
function showPopupText(){
var o=event.srcElement;
	MouseX=event.x;
	MouseY=event.y;
	if(o.alt!=null && o.alt!=""){o.dypop=o.alt;o.alt=""};
        if(o.title!=null && o.title!=""){o.dypop=o.title;o.title=""};
	if(o.dypop!=sPop) {
			sPop=o.dypop;
			clearTimeout(curShow);
			clearTimeout(tFadeOut);
			clearTimeout(tFadeIn);
			clearTimeout(tFadeWaiting);	
			if(sPop==null || sPop=="") {
				dypopLayer.innerHTML="";
				dypopLayer.style.filter="Alpha()";
				dypopLayer.filters.Alpha.opacity=0;	
				}
			else {
				if(o.dyclass!=null) popStyle=o.dyclass 
					else popStyle="cPopText";
				curShow=setTimeout("showIt()",tPopWait);
			}
			
	}
}
function showIt(){
		dypopLayer.className=popStyle;
		dypopLayer.innerHTML=sPop;
		popWidth=dypopLayer.clientWidth;
		popHeight=dypopLayer.clientHeight;
		if(MouseX+12+popWidth>document.body.clientWidth) popLeftAdjust=-popWidth-24
			else popLeftAdjust=0;
		if(MouseY+12+popHeight>document.body.clientHeight) popTopAdjust=-popHeight-24
			else popTopAdjust=0;
		dypopLayer.style.left=MouseX+12+document.body.scrollLeft+popLeftAdjust;
		dypopLayer.style.top=MouseY+12+document.body.scrollTop+popTopAdjust;
		dypopLayer.style.filter="Alpha(Opacity=0)";
		fadeOut();
}
function fadeOut(){
	if(dypopLayer.filters.Alpha.opacity<popOpacity) {
		dypopLayer.filters.Alpha.opacity+=showPopStep;
		tFadeOut=setTimeout("fadeOut()",1);
		}
		else {
			dypopLayer.filters.Alpha.opacity=popOpacity;
			tFadeWaiting=setTimeout("fadeIn()",tPopShow);
			}
}

function fadeIn(){
	if(dypopLayer.filters.Alpha.opacity>0) {
		dypopLayer.filters.Alpha.opacity-=1;
		tFadeIn=setTimeout("fadeIn()",1);
		}
}
document.onmouseover=showPopupText;
</script>
<?php require_once YZLOVE.'my/bottommy.php';?>