<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT loveb FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_loveb = $row[0];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="addupdate") {
	if (strlen($title)>80 || strlen($title)<2)callmsg("������ⲻ��Ϊ�գ��������2~80���ֽ�����","-1");
	if (strlen($content)>10000 || strlen($content)<10)callmsg("��ϸ�������ݲ���Ϊ�գ��������10~10000���ֽ�����","-1");
	if (!ereg("^[0-1]{1}$",$ifopen))callmsg("�Ƿ���������","-1");
	if (!ereg("^[0-9]{1,5}$",$num) || empty($num))callmsg("����Love�Ҵ���","-1");
	$addtime=date("Y-m-d H:i:s");
	if ($data_loveb<$num)callmsg("���Love�Ҳ���".$num."��������ʧ�ܣ�","k_getloveb.php");
	$flag = ($cook_grade > 1 )?1:0;
	$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb-".$num." WHERE id=".$cook_userid);
	$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$cook_userid','$cook_username','���������۳�','-$num','$addtime')");
	$db->query("INSERT INTO ".__TBL_ASK__."  (userid,title,content,xsloveb,addtime,ifopen,flag) VALUES ('$cook_userid','$title','$content','$num','$addtime','$ifopen','$flag')");
//
if ($flag == 1 ){
	$tmpid = $db->insert_id();
	$rt = $db->query("SELECT a.userid,b.grade,b.if2 FROM ".__TBL_FRIEND__." a,".__TBL_MAIN__." b WHERE a.senduserid=".$cook_userid." AND a.userid=b.id AND a.ifagree=1 AND b.grade>=3");
	$total = $db->num_rows($rt);
	if ($total > 0 ) {
		for($i=0;$i<$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$uid = $rows[0];
			$ugrade =  $rows[1];
			$uif2 =  $rows[2];
			if ( ($uif2 == 2 || $uif2 == 3 || $uif2 == 4) && $ugrade >= 3 ){
				$content = "�Һſ���������:��".$title."����<a href=".$Global['home_2domain']."/ask".$tmpid.".html target=_blank  class=uDF2C91>����鿴</a>";
				$addtime = strtotime("now");
				$db->query("INSERT INTO ".__TBL_FRIEND_NEWS__."  (userid,senduserid,content,addtime) VALUES ($uid,$cook_userid,'$content',$addtime)");
			}
		}
	}
}
//
	header("Location: h_ask.php?submitok=list");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
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
</style>
</head>
<body>
<ul>
<li <?php if ($submitok == "list")echo "class='liselect'"; ?>><a href="h_ask.php?submitok=list">�ҵĲ���</a></li>
<li <?php if ($submitok == "add")echo "class='liselect'"; ?>><a href="h_ask.php?submitok=add">�Һſ���</a></li>
<li><a href="h_ask_bbsed.php">�����Ĵ���</a></li>
<li><a href="h_ask_favorite.php">�����ղ�  </a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br>
  <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><img src="images/askd.jpg" width="675" height="107" /></td>
    </tr>
  </table>
  <table width="490" height="48" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td style="font-size:10.3pt;line-height:180%;">��<font color="#FF3399">������������Ѷ�ţ������������˾��������ֵģ������ֵģ���������һһ����Ӫҵ��24Сʱȫ������</font></td>
        </tr>
        <tr>
          <td style="line-height:180%;"><font color="#0099CC">�����������Σ�</font><br>
            <font color="#0099CC">��������1. ���(���ΰ��������������ʹ) ��������2. �ڿ�(���ΰ��������������ʹ)<br>
            ��������3. ������(������ʹ��������ؽ�����) ����4. ������(���齡�����)</font><font color="#FF3399">&nbsp; 
            </font></td>
        </tr>
    </table>
<?php if ($submitok=="add") { ?>
      <table width="650" height="204" border="0" align="center" cellpadding="5" cellspacing="0" style="border:#dddddd 0px solid;">
<script language="javascript">
function chkform(){
	if(document.myform.title.value=="")
	{
	alert('�����벡����⣡');
	document.myform.title.focus();
	return false;
	}
	if(document.myform.content.value=="")
	{
	alert('��������ϸ����');
	document.myform.content.focus();
	return false;
	}
}
</script>
        <form action="h_ask.php" method="post" name="myform" onSubmit="return chkform()">
          <tr>
            <td width="107" height="35" align="right">�������:</td>
            <td width="535">              <input name="title" type="text" class="input" id="title" value="<?php echo $keyword; ?>" size="70" maxlength="60" />            </td>
          </tr>
          <tr>
            <td align="right" valign="middle">��ϸ����:<br />                  <br />            </td>
            <td>
              <textarea name="content" cols="80" rows="15" id="content" style="font-size:9pt;"></textarea>            </td>
          </tr>
          <tr>
            <td height="30" align="right">�Ƿ�����:</td>
            <td><input name="ifopen" type="radio" value="1" checked>
������
  <input type="radio" name="ifopen" value="0">
����</td>
          </tr>
          <tr>
            <td align="right" valign="top" style="padding-top:8px">����Love��: </td>
            <td style="line-height:200%;color:666666;">
              <select name="num" id="num">
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="500" selected>500</option>
                <option value="1000">1000</option>
                <option value="2000">2000</option>
                <option value="5000">5000</option>
              </select>��
              ��Ŀǰ��Love��<img src="images/loveb.gif" />:<b><font face="Verdana, Arial, Helvetica, sans-serif" color="#ff0000"><?php echo $data_loveb;?></font></b> ������[<a href="k_getloveb.php" class="uDF2C91"><b>��ȡLove��</b></a>]<br />              
              <img src="images/tips3.gif" width="11" height="15" hspace="3">����Խ�ߣ����������Խ�ܹ�ע���Ӷ��õ����Ѵ𰸡�</td>
          </tr>
          <tr>
            <td align="center" valign="top">&nbsp;</td>
            <td height="27"><input name="submitok" type="hidden" value="addupdate">
              ������������������
            <input type="submit" name="Submit" value=" ��ʼ���� " class="button"></td>
          </tr>
        </form>
    </table>
      <br>
      <table width="656" height="55" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td width="101" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif"></td>
          <td width="535" valign="top" style="line-height:150%;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">�뾡���ù淶�����ԣ�����������Ϣ�ſ��ܱ�����������!<br>
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">����˵��Խ��ϸ���ش�Ҳ��Խ׼ȷ��<br>            
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle"><font color="#FF0000">����� <b>30</b> ���ڲ��������ѵ�������ϵͳ�Զ��۳����ͱҵ� <b>10 </b>����</font><br>            
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle"><font color="#FF0000">��Ϊ��Ѵ������ع�������ƽԭ�򣬷���һ�����ֽ������ط�(���Love����0��ɾ���ʺ�)��</font><br>            <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">����ܾ�û�˻ش������ͨ���������ͱң�����ѡ�������⡢������ش����������ʣ�����ϵͳֻ�۳��������ͱҡ�<br>
          <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" /><?php echo $Global['m_sitename']; ?>��������������Ϣ�������վ���Ȩ��</td>
        </tr>
    </table>
      <br>
      <br>
      <?php } elseif ($submitok=="list") {?>
      <?php
//�б����ʼ
$rt=$db->query("SELECT id,title,addtime,click,hfnum,flag,ifopen,ifjh FROM ".__TBL_ASK__." WHERE  userid='$cook_userid' ORDER BY id DESC");
$total = $db->num_rows($rt);
if ($total <= 0) {
?>
      <br>
      <br>
      <br>
      <table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=dddddd>
  <tr><td align=center bgcolor=efefef><font color=#999999>..������Ϣ..<br>
  </font><br>
    <a href="h_ask.php?submitok=add" class=u666666><b><img src="images/modx.gif" width="13" height="13" hspace="3" border="0" align="absmiddle">��Ҫ�Һſ���</b></a>
</td>
  </tr></table>
<?php
} else {
		$pagesize=15;
		require_once YZLOVE.'sub/class.php';
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
?>
      <table width="100" height="5" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
      </table>
      <table width="650" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF"">
        <tr>
          <td width="380" height="40" align="center" valign="middle" style="border-bottom:#ddd 1px solid;"> �ꡡ����</td>
          <td width="72" align="center" valign="middle" style="border-bottom:#ddd 1px solid;">����/����</td>
          <td width="97" align="center" valign="middle" style="border-bottom:#ddd 1px solid;">�Һ�����</td>
          <td width="93" align="center" valign="middle" style="border-bottom:#ddd 1px solid;">״̬</td>
        </tr>
        <?php
		for($i=0;$i<$pagesize;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			if ($i % 2 == 0){
				$bg="bgcolor=#ffffff";
				$overbg="#ffffcc";
				$outbg="#ffffff";
			} else {
				$bg="bgcolor=#ffffff";
				$overbg="#ffffcc";
				$outbg="#ffffff";
			}
?>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'">
          <td height="35" style="border-bottom:#E9E8E8 1px solid;"><img src="images/qz.gif" hspace="3" align="absmiddle"> 
<?php if ($rows['ifopen'] == 0) {?>
<a href="../clinic/detail<?php echo $rows['id'];?>.html" class=333333 target="_blank">
<?php } else {?>
<a href="<?php echo $Global['home_2domain'];?>/ask<?php echo $rows['id'];?>.html" class=333333 target="_blank">
<?php }?>
<?php echo htmlout(stripslashes($rows['title'])); ?></a>
<?php 
if ($rows['ifopen'] == 0)echo " <img src=images/m.gif alt='��'>";
if ($rows['ifjh'] == 1)echo " <img src=images/jh.gif alt='����'>";
?></td>
          <td height="35" align="center" style="border-bottom:#E9E8E8 1px solid;"><font color="#FF0000"><?php echo $rows['hfnum']; ?></font> <font color="#999999">/</font> <font color="#FF0000"><?php echo $rows['click']; ?></font></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><font color="#999999"><?php echo date_format2($rows['addtime'],'%Y-%m-%d');?></font></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><?php 
switch ($rows['flag']){ 
	case 0:echo "<font color=red>δ��</font>";break;
	case 1:echo "<img src=images/56.gif>";break;
	case 2:echo "<img src=images/57.gif>";break;
	case 3:echo "<img src=images/58.gif>";break;
	case 4:echo "<img src=images/59.gif>";break;
	case 5:echo "<img src=images/60.gif>";break;
}
?></td>
        </tr>
        <?php }?>
    </table>
      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="587" height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        </tr>
    </table>
    <?php //lise end
			 }}?>
    <br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>