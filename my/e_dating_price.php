<?php require_once '../sub/init.php';
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT loveb FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_loveb = $row[0];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ($submitok == 'jjupdate'){
	if ( !ereg("^[0-9]{1,8}$",$fid) || $fid == 0 )callmsg("Forbidden!","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_DATING__." WHERE id=".$fid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$memberid = $row[0];
		if ($memberid !== $cook_userid)callmsg("Forbidden!","-1");
	} else {
		callmsg("Forbidden!","-1");
	}
	if (!ereg("^[0-9]{1,5}$",$jjloveb) && !empty($jjloveb))callmsg("����love�ұ�����5λ�����ڵ���������0","-1");
	$jjloveb = intval(abs($jjloveb));
	if ($jjloveb > $data_loveb) {
		callmsg("��Ǹ�����Love�Ҳ��㣬����ʧ�ܣ����Ȼ�ȡLove�Һ��������룡","k_getloveb.php");
	} else {
		$db->query("UPDATE ".__TBL_DATING__." SET jjloveb=".$jjloveb." WHERE id=".$fid);
	}
	callmsg("��ϲ�����۳ɹ�������ļ�Ϊ��".$jjloveb."��Love��","e_dating_price.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_sitetitle']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* .main1 */
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;z-index: 100;}
.main1_tselect {float:left;width:84px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:84px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;text-align:center;}
img{border:0;} 
table{border-collapse:collapse;border-spacing:0;} 
</style>
</head>
<body>
<div class="main1">
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_list.php" class="a333">�ҵ�Լ��</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_add.php" class="a333">����Լ��</a></div>
	<div class="main1_tselect" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background='F0FAE9'"><a href="e_dating_price.php" class="a6F9F00">Լ�Ὰ������</a></div>
	<div class="main1_t"  onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_join.php" class="a333">�Ҳμӵ�Լ��</a></div>
</div>
<div class="main2">
  <div class="main2_frame">
<br />

<?php
//�б����ʼ
	$rt=$db->query("SELECT id,title,bmnum,jjloveb FROM ".__TBL_DATING__." WHERE flag=1 AND userid=".$cook_userid." ORDER BY id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
	$jjok = 0;
?>
		<br><br><table width=392 height=176 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=dddddd>
		  <tr>
		    <td height="40" align=center bgcolor=#FFFFFF style="line-height:20px;color:#666"><i><font color="#FF0000" face="Arial Black" style="font-size:21px">Sorry!</font></i>���޷����뾺�ۣ�����ԭ��</td>
		  </tr>
		  <tr>
		    <td align=left bgcolor=#f8f8f8 style="color:#666;padding-left:50px">�� �㻹û�з���Լ����Ϣ��<img src=images/fb.gif hspace=3 vspace="15" align=absmiddle /><a href=e_dating_add.php class=uDF2C91><b>��˷���</b></a><br />
�� ����Ч��Լ��(δ��˻�������Լ�᲻���Ծ�������)<br />
<br /></td>
	      </tr>
		</table><br><br><br><br>
<?php } else {
$jjok = 1;
?>
      <table width="670" height="55" border="0" cellpadding="5" cellspacing="0">
        <tr>
          <td width="23" align="right" valign="top" style="padding-top:5px;"><img src="images/tips.gif" width="23" height="21" /></td>
          <td align="left" valign="top" style="line-height:150%;color:#666666;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />���뾺�ۺ󣬸��������ļ۸����������ҳ��Լ��Ƶ������������<br />
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />���˵��һ�ν�����ĸ��˲Ƹ��п۳���Ӧ��������㵽���Love��Ϊ0Ϊֹ(���㲻�ۣ�ֻ�۵�һ�ε��)��<br />
            ��<font color="#FF0000">�벻Ҫ��ľ���ۣ��Ե��²���Ҫ���˷ѡ�</font>���˼ҳ�100����ʵ��ֻҪ��101�����ŵ���(��)ǰ�档<br />
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />��Ҫ���㹻���Love���������������������������ļ۸�������Love�Ҳ��������� <a href="k_getloveb.php" class="uDF2C91"><b>��ȡLove��</b></a> ��</td>
        </tr>
      </table>
      <table width="98" height="15" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
    </table>
      <table width="650" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF" style="border:#EDD4F0 1px solid;color:#666;">
        <tr>
          <td height="22" colspan="3" align="left" valign="bottom" bgcolor="#FDEEF8" style="color:#DF2C91;font-weight:bold;padding-left:8px;font-size:14px">�ҵ�Լ��</td>
        </tr>
<?php
for($i=0;$i<$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
	$bg="bgcolor=#ffffff";
	$overbg="#ffffcc";
	$outbg="#ffffff";
} else {
	$bg="bgcolor=#f3f3f3";
	$overbg="#ffffcc";
	$outbg="#f3f3f3";
}
?>
<form action=e_dating_price.php method=post>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'">
          <td width="414" align="left" style="padding-left:5px;"><a href="<?php echo $Global['home_2domain'];?>/dating<?php echo $rows['id'].'.html';?>" class=333333 target="_blank" style='font-size:10.3pt;'><img src="images/groupren.gif" hspace="5" border="0" align="absmiddle"><?php echo stripslashes($rows['title']); ?></a><?php 
?>��(<font color="#FF0000"><?php echo $rows['bmnum'];?></font>�˱���)<input type=hidden name=fid value="<?php echo $rows['id'];?>"></td>
          <td width="136" height="40" align="right" style="color:#666;font-size:14px">�ҳ��ۣ�<input name="jjloveb" type="text" style="font-family:Verdana,Arial;text-align: center;color:#ff0000" value="<?php echo $rows['jjloveb']; ?>" size="8" maxlength="5" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" />
          <br /></td>
          <td width="92" align="left"><input type=image src=images/jjloveb.gif><input type=hidden name=submitok value="jjupdate"></td>
        </tr>
</form>		
        <?php }?>
    </table>
      <?php }if ($jjok  == 1) {?>
      <br />
      <table width="650" height="36" border="0" cellpadding="0" cellspacing="0" bgcolor="ffffcc" style="border:#EDD4F0 1px solid;color:#666;">
        <tr>
          <td align="center" style="color:#666"><b>�ҵ�ǰ��<font color="#FF6699" face="Arial, Helvetica, sans-serif">Love��</font>Ϊ</b>��<font color="#FF0000"><?php echo $data_loveb; ?></font>��������<font style="font-size:9pt;">(���������ı�������һ��С��<font color="#FF0000"><?php echo $data_loveb; ?></font>�����֣�ֹͣ��������<font color="#FF0000">0</font></font>)</td>
        </tr>
      </table>
      <br />
<?php
}
$rt=$db->query("SELECT a.id,a.nickname,a.grade,a.sex,b.id as fid,b.title,b.bmnum,b.jjloveb FROM ".__TBL_MAIN__." a,".__TBL_DATING__." b WHERE a.id=b.userid AND b.flag=1 ORDER BY b.jjloveb DESC");
$total = $db->num_rows($rt);
if($total>0){
$pagesize=20;
require_once YZLOVE.'sub/class.php';
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?><table width="650" border="00" align="center" cellpadding="3" cellspacing="0" style="border:#EDD4F0 1px solid;">
<tr>
<td width="71" height="22" align="center" bgcolor="#FDEEF8"><font color="#DF2C91"><b>������</b></font></td>
<td width="134" align="center" bgcolor="#FDEEF8"><font color="#DF2C91"><b>������</b></font></td>
<td width="307" align="center" bgcolor="#FDEEF8"><b><font color="#DF2C91">����Լ������</font></b></td>
<td width="112" align="center" bgcolor="#FDEEF8"><font color="#DF2C91"><b>��ǰ����</b></font></td>
</tr>
<?php
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
		$bg="bgcolor=#f3f3f3";
		$overbg="#ffffcc";
		$outbg="#f3f3f3";
} else {
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
}
?><tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'" >
<td height="29" align="center" style="border-bottom:#DDDDDD 1px solid;color:#7E7E7E;">��<b><font color="ff6600" face="Geneva, Arial, Helvetica, sans-serif">
<?php
if ($i < 10)echo '0';
echo $i;
?>
</font></b> ��</td>
<td align="center" style="border-bottom:#DDDDDD 1px solid;color:#ff0000;">
<?php if ($rows['id'] == $cook_userid){ ?>
������
<?php }else{?>
<a href=<?php echo $Global['home_2domain'];?>/<?php echo $rows['id'];?> target=_blank class="u333333"><?php geticon($rows['sex'].$rows['grade']);?><?php echo htmlout(stripslashes($rows['nickname']));?></a>
<?php }?></td>
    <td align="left" style="border-bottom:#DDDDDD 1px solid;color:#7E7E7E;"><a href="<?php echo $Global['home_2domain'];?>/dating<?php echo $rows['fid'].'.html';?>" class=333333 target="_blank" style='font-size:10.3pt;'><img src="images/groupren.gif" hspace="5" border="0" align="absmiddle"><?php echo stripslashes($rows['title']); ?></a><?php 
?>��(<font color="#FF0000"><?php echo $rows['bmnum'];?></font>�˱���)</td>
    <td align="center" style="border-bottom:#DDDDDD 1px solid;color:#7E7E7E;"><font color="#FF0000" face="Geneva, Arial, Helvetica, sans-serif"><b><?php echo $rows['jjloveb']; ?></b></font><font color="#FF6699" face="Arial, Helvetica, sans-serif"> Love��</font></td>
    </tr>
<?php
}
?></table>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="587" height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
  </tr>
</table>
<?php
} else { ?>
..��������..
<?php }?>
<br />
<br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
      <br />
      <br />
      <br />
      <br />
  </div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>