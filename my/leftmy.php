<?php if ( !ereg("^[0-9]{1,8}$",$_COOKIE['cook_userid']) || empty($_COOKIE['cook_userid'])){header("Location: ../login.php");exit;}
ob_start();
?>
<HTML><HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css"> 
body{font-family:����;font-size:9pt;color:#333333;
SCROLLBAR-FACE-COLOR: #E1E1E1;/*����ɫ*/
SCROLLBAR-TRACK-COLOR: #F2F2F2;/*��������*/
SCROLLBAR-HIGHLIGHT-COLOR: #E1E1E1;/*�������Ͽ�ɫ*/
SCROLLBAR-3DLIGHT-COLOR: #E1E1E1;/*��Ӱ(����)*/
SCROLLBAR-SHADOW-COLOR: #E1E1E1;/*�������¿�ɫ*/
SCROLLBAR-DARKSHADOW-COLOR: #878787;/*��Ӱ(����)*/
SCROLLBAR-ARROW-COLOR: #ffffff;/*С����*/
}
a{text-decoration: none;color:#333333; font-family: ����}
a:hover{color:#6F9F00;text-decoration: none;} 
a.t{text-decoration:none;color:#810040}
a.t:hover{color:#BC2F75;position:relative;right:0px;top:1px} 
td{ FONT-SIZE: 9pt;color:#999999}
.td {FONT-SIZE: 12px; BACKGROUND-IMAGE: url(/images/1/35.gif); LINE-HEIGHT: 30px; FONT-STYLE: normal; HEIGHT: 30px}
.td2 {FONT-SIZE: 12px; BACKGROUND-IMAGE: url(/images/06/titlebg.gif); LINE-HEIGHT: 25px;}
.tblstyle{border-left:#F1BFD4 1px solid;border-right:#F1BFD4 1px solid;border-bottom:#F1BFD4 1px solid;}
</style>
<SCRIPT LANGUAGE="JScript">
function cancelLink() {
if (window.event.srcElement.tagName == "A" && window.event.shiftKey) 
window.event.returnValue = false;
}
</SCRIPT> 
<base target="main">
<SCRIPT LANGUAGE="JavaScript">
function expand(id){
Obj = eval(id);
if(Obj.style.display == 'none'){
Obj.style.display = 'block'
document.getElementById('d'+id).innerHTML = "<img src=images/b.gif>";
}else{
Obj.style.display = 'none'
document.getElementById('d'+id).innerHTML = "<img src=images/a.gif>";
}}
function gyl(){
//child0.style.display = 'none';
//child1.style.display = 'none'
//child2.style.display = 'none';
child3.style.display = 'none';
child4.style.display = 'none';
child5.style.display = 'none';
child6.style.display = 'none';
child7.style.display = 'none';
child8.style.display = 'none';
//child9.style.display = 'none';
document.getElementById("dchild0").innerHTML = "<img src=images/b.gif>";
document.getElementById("dchild1").innerHTML = "<img src=images/b.gif>";
document.getElementById("dchild2").innerHTML = "<img src=images/b.gif>";
document.getElementById("dchild3").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild4").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild5").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild6").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild7").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild8").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild9").innerHTML = "<img src=images/b.gif>";
}
</SCRIPT>
<base target="mainframe">
</HEAD>
<body onLoad="gyl()" bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgProperties=fixed oncontextmenu=self.event.returnValue=false onclick="cancelLink()">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td align="left" style="padding-left:5px;"><table width="150" height="31" border="0" cellpadding="0" cellspacing="0" background="images/left_top.gif" style="margin:0 0 1px 0">
<tr><td align="right" style="padding:8px 8px 0 0"><a href="mainmy.php" class="t">������ҳ</a></td>
  <td width="2" align="center"><img src="images/e.gif" align="absmiddle"></td>
  <td align="left" style="padding:8px 0 0 8px"><a href="<?php echo $_COOKIE['home_2domain'].'/'.$_COOKIE['cook_userid']; ?>" target="_blank" class="t">�ҵ���ҳ</a></td>
</tr></table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr><td height="10"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr  style="CURSOR: hand" onClick="expand('child0');return">
<td width="16" align="right"><span id="dchild0"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>�ҵ�����</b></td>
</tr></table></td></tr></table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child0' class="tblstyle">
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="a1.php" target="mainframe">��������</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="c_photo_main.php" target="mainframe">�� �� ��</a><img src="images/new.gif" width="28" height="11"></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" width="9" align="absmiddle" /><img src="images/none_normal.gif" align="absmiddle" /><a href="a2.php" target="mainframe">��ϸ����</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="a3.php" target="mainframe">���Ķ���</a></td></tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="a4.php" target="mainframe">��ϵ����</a></td></tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" width="9" align="absmiddle" /><img src="images/none_normal.gif" align="absmiddle" /><a href="a5.php">Լ�ύ�ѵ���</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" width="9" align="absmiddle" /><img src="images/none_normal.gif" align="absmiddle" /><a href="a6.php">������������</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" width="9" align="absmiddle" /><img src="images/none_normal.gif" align="absmiddle" /><a href="a7.php">�쳾֪������</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" width="9" align="absmiddle" /><img src="images/none_normal.gif" align="absmiddle" /><a href="a8.php">���̻��ѵ���</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="a9.php">�޸�����</a>
<table width="100" border="0" cellspacing="0" cellpadding="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table></td>
</tr></table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table><table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr><td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child1');return">
<td width="16" align="right"><span id="dchild1"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>���Ѳ���</b></td>
</tr></table></td></tr></table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child1'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="b_gbook.php?submitok=list">�� �� ��</a></td></tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_gbook2.php?submitok=list">�� �� ��</a></td></tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_friend.php">�ҵĺ���</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_friend_news.php">���Ѷ�̬</a><img src="images/new.gif" width="28" height="11"></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="b_blacklist.php">�� �� ��</A><a href="b3.php"></a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_present.php?submitok=list">�ҵ�����</a><img src="images/new.gif" width="28" height="11"></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_request.php">����Ҫ��</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_user.php">������</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_rand.php" target="_blank">����Ե��</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="b_viewuser.php">����ÿ�</a>
  <table width="100" border="0" cellspacing="0" cellpadding="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table></td></tr></table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table><table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr><td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr  style="CURSOR: hand" onClick="expand('child2');return">
<td width="16" align="right"><span id="dchild2"></span></td><td style="padding-top:2px;color:#000000;padding-left:5px;"><b>�ҵ����</b></td>
</tr></table></td></tr></table><table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child2'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="c_photo_list.php">�ҵ����</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="c_photo_up.php">�ϴ���Ƭ</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="c_photo_dtt.php">��������</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="c_photo_main.php">����������</a><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table></td>
</tr>
</table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child3');return">
<td width="16" align="right"><span id="dchild3"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>�ҵ���Ƶ</b><img src="images/new.gif" width="28" height="11"></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child3'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="d_video_list.php">�ҵ���Ƶ</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="d_video_record.php">¼����Ƶ</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="d_video_record.php">����K��</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="d_video_favorites.php">��Ƶ�ղ�</a></td>
</tr>
</table>

<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
  </tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child4');return">
<td width="16" align="right"><span id="dchild4"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>�ҵ�Լ��</b><img src="images/new.gif" width="28" height="11"></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child4'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="e_dating_list.php">�ҵ�Լ��</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="e_dating_add.php">����Լ��</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="e_dating_price.php">Լ�Ὰ������</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="e_dating_join.php">��Լ״̬��ѯ</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="e_dating_join.php">�μӵ�Լ��</a></td>
</tr>
</table>

<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
  </tr>
</table>


<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child5');return">
<td width="16" align="right"><span id="dchild5"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>�ҵ��ռ�</b></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child5'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><A href="f_diary.php?submitok=list">�ҵ��ռ�</A><a href="e1.php"></a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="f_diary.php?submitok=add">�����ռ�</A><a href="e2.php"></a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="f_diary_bbsed.php">�ҵ�����</A><A href="b_diary_favorite.php"></A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><A href="b_diary_bbsed.php"></A><a href="e7.php?submitok=list&kind=2"></a><A href="f_diary_favorite.php">�ռ��ղ�</A>
<table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table></td>
</tr>
</table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child6');return">
<td width="16" align="right"><span id="dchild6"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>�ɹ�����</b></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child6'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="g_story.php?submitok=list">�ҵĹ���</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="g_story.php?submitok=add">��������</a></td>
</tr>
</table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
  </tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child7');return">
<td width="16" align="right"><span id="dchild7"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>��������</b></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child7'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="h_ask.php?submitok=list">�ҵĲ���</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="h_ask.php?submitok=add">�Һſ���</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="h_ask_bbsed.php">�����Ĵ���</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="h_ask_favorite.php">�����ղ�</a>
<table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table></td>
</tr>
</table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child8');return">
<td width="16" align="right"><span id="dchild8"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>�ҵ�Ȧ��</b></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child8'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><A href="i_group.php">�ҵ�Ȧ��</A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="i_group_add.php">����Ȧ��</A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="i_group_mylogin.php">�����Ȧ��</A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="i_group_myblog.php">�ҵ�����</A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><A href="i_group_favorite.php">�����ղ�</A>
  <table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table></td>
</tr>
</table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child9');return">
<td width="16" align="right"><span id="dchild9"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>��������</b></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child9'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="k_myloveb.php">�ҵ��ʻ�</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="k_myloveb.php?submitok=list">�����嵥</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="k_vip.php">��Ա����</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="k_bidding.php">��������</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="k_homepage.php">װ����ҳ</A><img src="images/new.gif" width="28" height="11"></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="k_sfz.php">ʵ����֤</A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="k_getloveb.php">��ȡLove��</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="../news.php" target="_blank">��վ��̬</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><A href="<?php echo $Global['www_2domain']; ?>/help" target="_blank">�ͷ�����</A>
<table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table></td>
</tr>
</table>
<table width="150" height="10" border="0" cellpadding="0" cellspacing="0" style="margin:0 0 20px 0">
<tr>
<td><img src="images/c.gif" alt=" " width="150" height="10" align="absmiddle" /></td>
</tr>
</table>
</td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" />
</BODY>
</HTML>
<?php ob_end_flush();?>