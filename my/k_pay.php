<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a{width:130px;display:block;text-decoration:none;color:#333;background:#fff}
ul li a:hover{text-decoration:none;color:#6F9F00;background:#F0FAE9}

ul .liselect {float:left;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a{width:130px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{text-decoration:none;color:#DF2C91;background:#F0FAE9;}

.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
font,td{font-family:Verdana}
.title{background:#FDEEF8;color:#FF6600;font-size:20px;font-family:����,����;letter-spacing:1px}
</style>
</head>
<body>

<ul>
	<li class='liselect'><a href="k_pay.php">����֧��</a></li>
<!--	<li><a href="k_pay2.phpt">����ת��</a></li>
	<li><a href="99bill/szx/send.php?orderAmount=1" target="_blank">������֧��</a></li>
	<li><a href="k_pay4.php">������ʽ</a></li> -->
</ul>

<div class="main2">
<div class="main2_frame">
<br />
<?php if (ereg("^[1-9]{1}$",$kind)) {
$addtime=date("YmdHis");
?>

	<table width="690" height="324" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>
	<td height="40" align="left" class="title">����ѡ��֧�����:</td>
	</tr>
	<tr>
	<td height="84" align="center" style="font-size:14px">
	
	
	<?php if ($kind == 1){
	$bz='love�ҳ�ֵ';
	?>
		<br />
		<table width="500" height="38" border="0" cellpadding="10" cellspacing="0" style="border:1px solid #dddddd;">

		<tr>
		<td align="left" valign="bottom" bgcolor="#f8f8f8" style="line-height:200%;font-size:12px" >����Ϊ�˷����������ѣ����������һЩ��ұ���������ʺ�������´�ʹ�á�<br />		    
		  <font color="#FF0066">����һ�����������ڣ�30.00Ԫ���ϣ������������1.00Ԫ = 1000 love��</font></td>
		</tr>
		<tr>
		  <td height="40" align="center" valign="top" bgcolor="#f8f8f8" style="line-height:200%;font-size:14px;font-weight:bold">ѡ���ֵ����
		    <label>
		    <select name="price" id="price" style="font-size:14px;color:#FF0000;background:#ffffff" onchange="window.location.href='k_pay.php?kind=1&bz='+'<?php echo $bz; ?>'+'&price='+this.value">
		      <option value="30" selected="selected" <?php if ($price==30)echo "selected"; ?>>30</option>
		      <option value="50" <?php if ($price==50)echo "selected"; ?>>50</option>
		      <option value="100" <?php if ($price==100)echo "selected"; ?>>100</option>
		      <option value="200" <?php if ($price==200)echo "selected"; ?>>200</option>
		      <option value="500" <?php if ($price==500)echo "selected"; ?>>500</option>
		      </select>
		    </label>
		Ԫ		
		<input name="kind" type="hidden" value="1" /></td>
		  </tr>
		</table>
	<?php }else{?>
		ȷ��֧����Ϣ<?php
		if ( !ereg("^[1-7]{1}$",$kind) || empty($kind))callmsg("�������","-1");
		switch ($kind){ 
		case 2:$price = 29;$bz='���Ż�Ա-����';break;
		case 3:$price = 99;$bz='���Ż�Ա-����';break;
		case 4:$price = 199;$bz='���Ż�Ա-����';break;
		case 5:$price = 49;$bz='��ʯ��Ա-����';break;
		case 6:$price = 199;$bz='��ʯ��Ա-����';break;
		case 7:$price = 299;$bz='��ʯ��Ա-����';break;
		default:$kind = 1;$bz='love�ҳ�ֵ';break;
		}
		?>������֧�� <font color="#FF0000">��<strong><?php echo $price; ?></strong></font> Ԫ��<?php echo $bz; ?>
	<?php }?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:#dddddd 1px solid">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table></td>
	</tr>
	<tr>
	<td height="100" align="center" valign="top">
<?php if (empty($price))$price=30; ?>
	<form action="99bill/rmb/send.php" method="post" name="myform2" target=_blank>
      <br />
      <br />
      <br />
      <input name="orderId" type="hidden" value="<?php echo $addtime.'-'.$cook_userid.'-'.$kind; ?>">
			 <input name="orderAmount" type="hidden" value="<?php echo $price; ?>">
			 <input name="payerName" type="hidden" value="<?php echo $cook_nickname; ?>(<?php echo $cook_username; ?>)">
			  <input name="productName" type="hidden" value="<?php echo $Global['m_sitename'].$bz; ?>">
			 <input name="submitok" type="hidden" value="ok">
			  <input type="image" src="99bill/kq.gif">
	          <br />
	          <strong><br />
              <a href="#" onClick="document.myform2.submit();" style="font-size:14px"><font color="#FF0000">���������һ��</font></a></strong>
	          <br />
	          <br />
	          <br />
	          <br /><span style="line-height:200%;padding:20px;font-family:Verdana"><strong>ת�ʳɹ�����������<font color="#FF0000">��¼�û���</font>��֪����</strong>��<br />
        ��ͨ��<a target="blank" href="http://wpa.qq.com/msgrd?V=1&amp;Uin=8437645&amp;Site=������Ե������&amp;Menu=yes"><img src="images/qq.gif" alt="�������Ϣ���ͷ�QQ" border="0" /></a>QQ:8437645�򷢶�������13862511478 �ֻ��ϡ�</span>
	          <br />
	          <br />
	          <br />
	          <br />
	</form></td>
	</tr>
	</table>
<?php }else{?>
<table width="690" height="170" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" colspan="2" align="left" class="title">����ѡ��֧����Ŀ:</td>
  </tr>
  <tr>
    <td width="171" height="200" align="center">&nbsp; </td>
    <td width="519" align="left" style="font-size:14px;font-weight:bold"><br />
	
	
<br /><br />

<table width="342" border="0" cellspacing="0" cellpadding="10" style="border:#dddddd 1px solid">
<form method=post name=myform action=k_pay.php>
<tr>
    <td width="85" bgcolor="#f8f8f8">&nbsp;</td>
    <td width="215" bgcolor="#f8f8f8"><input name="kind" type="radio" id="kind1" value="1" onClick="document.myform.submit();" /><label for="kind1">��ֵLove��</label></td>
  </tr>
  <tr>
    <td align="right"><img src="../images/grade/12.gif" width="13" height="18" hspace="3" align="absmiddle" /><img src="../images/grade/22.gif" width="13" height="18" hspace="3" align="absmiddle" /></td>
    <td>
<input name="kind" type="radio" id="kind2" value="2" onClick="document.myform.submit();" /><label for="kind2">����-���Ż�Ա</label><br /><br />
<input name="kind" type="radio" id="kind3" value="3" onClick="document.myform.submit();" /><label for="kind3">����-���Ż�Ա</label><br /><br />
<input name="kind" type="radio" id="kind4" value="4" onClick="document.myform.submit();" /><label for="kind4">����-���Ż�Ա</label>
</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#f8f8f8"><img src="../images/grade/13.gif" width="16" height="16" hspace="1" vspace="4" align="absmiddle" /><img src="../images/grade/23.gif" width="17" height="16" hspace="2" vspace="4" align="absmiddle" /></td>
    <td bgcolor="#f8f8f8">
<input name="kind" type="radio" id="kind5" value="5" onClick="document.myform.submit();" /><label for="kind5">����-��ʯ��Ա</label><br /><br />
<input name="kind" type="radio" id="kind6" value="6" onClick="document.myform.submit();" /><label for="kind6">����-��ʯ��Ա</label><br /><br />
<input name="kind" type="radio" id="kind7" value="7" onClick="document.myform.submit();" /><label for="kind7">����-��ʯ��Ա</label>
	  </td>
  </tr>
</form>
</table>
<br />
<br />
<br />
        <br />


	  
	  
	  </td>
    </tr>
</table>
<?php }?>
<br />
<br />
<br />
<br /><br />
<br />
<br />
<br /><br />
<br /><br />
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
<script language="javascript" src="/ajax/zeai2kefu.js"></script>
<div class="clear"></div>
<?php require_once YZLOVE.'my/bottommy.php';?>
