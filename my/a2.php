<?php require_once '../sub/init.php';
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT * FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ($submitok=="modupdate") {
	if ( !ereg("^[0-9]{1,3}$",$weigh) && !empty($weigh) )callmsg("����(��ѡ������λ����)","-1");
	if ( !ereg("^[0-9]{1,2}$",$tx) && !empty($tx) )callmsg("��ѡ�����Σ�","-1");
	if ( !ereg("^[0-9]{1,2}$",$star) && !empty($star) )callmsg("��ѡ��������","-1");
	if ( !ereg("^[0-9]{1,2}$",$blood) && !empty($blood) )callmsg("��ѡ��Ѫ�ͣ�","-1");
	if ( !ereg("^[1-9]{1}$",$zhongjiao) && !empty($zhongjiao) )callmsg("��ѡ���ڽ�������","-1");
	if ( !ereg("^[1-9]{1}$",$house) && !empty($house) )callmsg("��ѡ��ס��״����","-1");
	if ( !ereg("^[1-9]{1}$",$car) && !empty($car) )callmsg("��ѡ��ͨ���ߣ�","-1");
	if ( !ereg("^[1-9]{1}$",$clothing) && !empty($clothing) )callmsg("��ѡ����װ��","-1");
	if ( !ereg("^[1-9]{1}$",$edu) && !empty($edu) )callmsg("��ѡ������̶ȣ�","-1");
	if ( !ereg("^[0-9]{1,2}$",$field) && !empty($field) )callmsg("��ѡ����ҵ��","-1");
	if ( !ereg("^[0-9]{1,2}$",$job) && !empty($job) )callmsg("��ѡ��ְҵ��","-1");
	if ( !ereg("^[0-9]{1,2}$",$pay) && !empty($pay) )callmsg("��ѡ�������룡","-1");
	if ( strlen($school) > 50 )callmsg("��ҵԺУ(������50�ֽ�25��������)","-1");
	if ( strlen($nianwang) > 240 )callmsg("����������(������240�ֽڻ�120��������)","-1");
	if ( strlen($xinyuan) > 240 )callmsg("���ڵ���Ը(������240�ֽڻ�120��������)","-1");
	if ( !ereg("^[1-9]{1}$",$smoking) && !empty($smoking) )callmsg("��ѡ������ϰ�ߣ�","-1");
	if ( !ereg("^[1-9]{1}$",$drink) && !empty($drink) )callmsg("��ѡ������ϰ�ߣ�","-1");
	if ( strlen($gexin) > 240 )callmsg("�ҵĸ���(������240�ֽڻ�120��������)","-1");
	if ( strlen($xinrong) > 240 )callmsg("����������(������240�ֽڻ�120��������)","-1");
	if ( strlen($youshi) > 240 )callmsg("�ҵ�����(������240�ֽڻ�120��������)","-1");
	if ( strlen($xinqu) > 240 )callmsg("��Ȥ����(������240�ֽڻ�120��������)","-1");
	if ( strlen($huoban) > 240 )callmsg("ϣ��Ѱ�ҵĻ��(������240�ֽڻ�120��������)","-1");
	$weigh  = empty($weigh)?0:$weigh;
	$tx  = empty($tx)?0:$tx;
	$star  = empty($star)?0:$star;
	$blood  = empty($blood)?0:$blood;
	$zhongjiao  = empty($zhongjiao)?0:$zhongjiao;
	$house  = empty($house)?0:$house;
	$car  = empty($car)?0:$car;
	$clothing  = empty($clothing)?0:$clothing;
	$edu  = empty($edu)?0:$edu;
	$field  = empty($field)?0:$field;
	$job  = empty($job)?0:$job;
	$pay  = empty($pay)?0:$pay;
	$smoking  = empty($smoking)?0:$smoking;	
	$drink  = empty($drink)?0:$drink;	
	
	
	$db->query("UPDATE ".__TBL_MAIN__." SET weigh='$weigh',tx='$tx',star='$star',blood='$blood',zhongjiao='$zhongjiao',house='$house',car='$car',clothing='$clothing',edu='$edu',field='$field',job='$job',pay='$pay',school='$school',nianwang='$nianwang',xinyuan='$xinyuan',smoking='$smoking',drink='$drink',gexin='$gexin',xinrong='$xinrong',youshi='$youshi',xinqu='$xinqu',huoban='$huoban',ifmod=0 WHERE id='$cook_userid'");
	callmsg("�޸ĳɹ���","a3.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
<!--
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;z-index: 100;}
.main1_tselect {float:left;width:70px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:70px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
--> 
</style>
</head>
<script language="JavaScript" type="text/javascript" src="a2.js"></script>
<body>
<div class="main1">
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a1.php" class="a333">��������</a></div>
	<div class="main1_tselect" >��ϸ����</div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a3.php" class="a333">���Ķ���</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a4.php" class="a333">��ϵ����</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a5.php" class="a333">Լ�ύ��</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a6.php" class="a333">��������</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a7.php" class="a333">�쳾֪��</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a8.php" class="a333">���̻���</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a9.php" class="a333">�޸����� </a></div>

</div>

<div class="main2">
  <div class="main2_frame"><br />
<table width="564" border="0" align="center" cellpadding="2" cellspacing="0" style="color:#666666">
<script language="JavaScript" type="text/javascript">
function chkform(){
	if(document.YZLOVEFORM.weigh.value.length>12 || document.YZLOVEFORM.weigh.value.length<1){
	alert('��������ȷ������');
	document.YZLOVEFORM.weigh.focus();
	return false;}
	if(document.YZLOVEFORM.tx.value==""){
	alert('��ѡ�����Ρ���');
	document.YZLOVEFORM.tx.focus();
	return false;
	}
	if(document.YZLOVEFORM.clothing.value==""){
	alert('��ѡ����װ����');
	document.YZLOVEFORM.clothing.focus();
	return false;
	}
	if(document.YZLOVEFORM.star.value==""){
	alert('��ѡ����������');
	document.YZLOVEFORM.star.focus();
	return false;
	}
	if(document.YZLOVEFORM.blood.value==""){
	alert('��ѡ��Ѫ�͡���');
	document.YZLOVEFORM.blood.focus();
	return false;
	}

	if(document.YZLOVEFORM.zhongjiao.value==""){
	alert('��ѡ���ڽ���������');
	document.YZLOVEFORM.zhongjiao.focus();
	return false;
	}
<?php if ($row['ifhouse'] == 0 ){?>
	if(document.YZLOVEFORM.house.value==""){
	alert('��ѡ��ס������');
	document.YZLOVEFORM.house.focus();
	return false;
	}
<?php }?>
<?php if ($row['ifcar'] == 0 ){?>
	if(document.YZLOVEFORM.car.value==""){
	alert('��ѡ�񡰽�ͨ���ߡ���');
	document.YZLOVEFORM.car.focus();
	return false;
	}
<?php }?>
<?php if ($row['ifedu'] == 0 ){?>
	if(document.YZLOVEFORM.edu.value==""){
	alert('��ѡ��ѧ������');
	document.YZLOVEFORM.edu.focus();
	return false;
	}
<?php }?>
<?php if ($row['ifedu'] == 0 ){?>
	if(document.YZLOVEFORM.edu.value==""){
	alert('��ѡ��ѧ������');
	document.YZLOVEFORM.edu.focus();
	return false;
	}
<?php }?>
	if(document.YZLOVEFORM.field.value==""){
	alert('��ѡ�񡰹�����ҵ����');
	document.YZLOVEFORM.field.focus();
	return false;
	}
	if(document.YZLOVEFORM.job.value==""){
	alert('��ѡ��ְҵ����');
	document.YZLOVEFORM.job.focus();
	return false;
	}	
<?php if ($row['ifpay'] == 0 ){?>
	if(document.YZLOVEFORM.pay.value==""){
	alert('��ѡ�������롱��');
	document.YZLOVEFORM.pay.focus();
	return false;
	}
<?php }?>








}
</script>
        <form action="" method="post" name=YZLOVEFORM onSubmit="return chkform()">
          <tr>
            <td width="164" height="35" align="right">���� / ���� / ��װ��</td>
            <td width="392" style="color:#999999;"><input name="weigh" type="text"  class=input id="weigh" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $row['weigh'];?>" size="3" maxlength="3">
����(kg) /
  <select name="tx">
    <option value="">��ѡ��</option>
    <option value="1" <?php if ($row['tx']==1)echo "selected"; ?>>����</option>
    <option value="2" <?php if ($row['tx']==2)echo "selected"; ?>>����</option>
    <option value="3" <?php if ($row['tx']==3)echo "selected"; ?>>�е�</option>
    <option value="4" <?php if ($row['tx']==4)echo "selected"; ?>>��׳</option>
    <option value="5" <?php if ($row['tx']==5)echo "selected"; ?>>����</option>
    <option value="6" <?php if ($row['tx']==6)echo "selected"; ?>>�ȳ�</option>
    <option value="7" <?php if ($row['tx']==7)echo "selected"; ?>>��С</option>
    <option value="8" <?php if ($row['tx']==8)echo "selected"; ?>>����</option>
    <option value="9" <?php if ($row['tx']==9)echo "selected"; ?>>���</option>
    <option value="10" <?php if ($row['tx']==10)echo "selected"; ?>>����</option>
    <option value="11" <?php if ($row['tx']==11)echo "selected"; ?>>�Ը�</option>
  </select>
/ 
<select name="clothing">
  <option value="">��ѡ��</option>
  <option value="1" <?php if ($row['clothing']==1)echo "selected"; ?>>����</option>
  <option value="2" <?php if ($row['clothing']==2)echo "selected"; ?>>��ͳ</option>
  <option value="3" <?php if ($row['clothing']==3)echo "selected"; ?>>ǰ��</option>
  <option value="4" <?php if ($row['clothing']==4)echo "selected"; ?>>���</option>
</select></td>
          </tr>
          <tr>
            <td height="35" align="right">���� / Ѫ�� / �ڽ�������</td>
            <td style="color:#999999;"><select name="star" size="1" id="select5"  >
                <option value="">��ѡ��</option>
                <option value="1" <?php if ($row['star']==1)echo "selected"; ?>>ħ����(12/22-01/19)</option>
                <option value="2" <?php if ($row['star']==2)echo "selected"; ?>>ˮƿ��(01/20-02/18)</option>
                <option value="3" <?php if ($row['star']==3)echo "selected"; ?>>˫����(02/19-03/20)</option>
                <option value="4" <?php if ($row['star']==4)echo "selected"; ?>>������(03/21-04/19)</option>
                <option value="5" <?php if ($row['star']==5)echo "selected"; ?>>��ţ��(04/20-05/20)</option>
                <option value="6" <?php if ($row['star']==6)echo "selected"; ?>>˫����(05/21-06/21)</option>
                <option value="7" <?php if ($row['star']==7)echo "selected"; ?>>��з��(06/22-07/22)</option>
                <option value="8" <?php if ($row['star']==8)echo "selected"; ?>>ʨ����(07/23-08/22)</option>
                <option value="9" <?php if ($row['star']==9)echo "selected"; ?>>��Ů��(08/23-09/22)</option>
                <option value="10" <?php if ($row['star']==10)echo "selected"; ?>>�����(09/23-10/23)</option>
                <option value="11" <?php if ($row['star']==11)echo "selected"; ?>>��Ы��(10/24-11/22)</option>
                <option value="12" <?php if ($row['star']==12)echo "selected"; ?>>������(11/23-12/21)</option>
              </select>
              /
              <select name="blood" id="blood">
                <option value="">��ѡ��</option>
                <option value="1" <?php if ($row['blood']==1)echo "selected"; ?>>A</option>
                <option value="2" <?php if ($row['blood']==2)echo "selected"; ?>>B</option>
                <option value="3" <?php if ($row['blood']==3)echo "selected"; ?>>AB</option>
                <option value="4" <?php if ($row['blood']==4)echo "selected"; ?>>O</option>
                <option value="5" <?php if ($row['blood']==5)echo "selected"; ?>>������δ֪</option>
              </select>
              /
              <select name="zhongjiao" class="tf43" id="zhongjiao" >
                <option value="">��ѡ��</option>
                <option value="1" <?php if ($row['zhongjiao']==1)echo "selected"; ?>>��������</option>
                <option value="2" <?php if ($row['zhongjiao']==2)echo "selected"; ?>>���</option>
                <option value="3" <?php if ($row['zhongjiao']==3)echo "selected"; ?>>������</option>
                <option value="4" <?php if ($row['zhongjiao']==4)echo "selected"; ?>>����</option>
                <option value="5" <?php if ($row['zhongjiao']==5)echo "selected"; ?>>��˹����</option>
                <option value="6" <?php if ($row['zhongjiao']==6)echo "selected"; ?>>������</option>
                <option value="7" <?php if ($row['zhongjiao']==7)echo "selected"; ?>>��������</option>
                <option value="8" <?php if ($row['zhongjiao']==8)echo "selected"; ?>>����</option>
              </select></td>
          </tr>
          <tr>
            <td height="35" align="right"><img src="images/sfz_x.gif" width="9" height="9" />ס�������� </td>
            <td style="color:#999999;"><?php if ($row['ifhouse'] == 0 ){?><select name=house>
                <option value="">��ѡ��</option>
                <option value="1" <?php if ($row['house']==1)echo "selected"; ?>>�л鷿</option>
                <option value="2" <?php if ($row['house']==2)echo "selected"; ?>>����������</option>
                <option value="3" <?php if ($row['house']==3)echo "selected"; ?>>�޻鷿</option>
                <option value="4" <?php if ($row['house']==4)echo "selected"; ?>>�޻鷿���ɽ��</option>
                <option value="5" <?php if ($row['house']==5)echo "selected"; ?>>�޻鷿ϣ���Է����</option>
                <option value="6" <?php if ($row['house']==6)echo "selected"; ?>>�޻鷿ϣ��˫�����</option>
              </select>
              <font color="#FF0000"><img src="images/delx.gif" width="10" height="10" hspace="3">δ��֤</font>
              <?php }else{ ?>
              <input name="house" type="hidden" value="<?php echo $row['house'];?>">
              <font color="#333333"><?php
switch ($row['house']){ 
case 1:echo "��ס��";break;
case 2:echo "����������";break;
case 3:echo "��ס��";break;
case 4:echo "��ס�����ɽ��";break;
case 5:echo "��ס��ϣ���Է����";break;
case 6:echo "��ס��ϣ��˫�����";break;
}
?></font>��<font color="#009900"><img src="images/ok.gif" hspace="3" align="absmiddle">����֤</font>
              <?php }?></td>
          </tr>
          <tr>
            <td height="35" align="right"> <img src="images/sfz_x.gif" width="9" height="9" />��ͨ���ߣ�</td>
            <td style="color:#999999;"><?php if ($row['ifcar'] == 0 ){?><select name=car>
              <option value="">��ѡ��</option>
              <option value="1" <?php if ($row['car']==1)echo "selected"; ?>>����</option>
              <option value="2" <?php if ($row['car']==2)echo "selected"; ?>>�е�����</option>
              <option value="3" <?php if ($row['car']==3)echo "selected"; ?>>�ߵ�����</option>
              <option value="4" <?php if ($row['car']==4)echo "selected"; ?>>������������</option>
              <option value="5" <?php if ($row['car']==5)echo "selected"; ?>>����</option>
            </select>
              <font color="#FF0000"><img src="images/delx.gif" width="10" height="10" hspace="3">δ��֤</font>
              <?php }else{ ?>
              <input name="car" type="hidden" value="<?php echo $row['car'];?>">
              <font color="#333333">
<?php
switch ($row['car']){ 
case 1:echo "����";break;
case 2:echo "�е�����";break;
case 3:echo "�ߵ�����";break;
case 4:echo "������������";break;
case 5:echo "����";break;
}
?>
              </font>��<font color="#009900"><img src="images/ok.gif" hspace="3" align="absmiddle">����֤</font>
              <?php }?></td>
          </tr>
          <tr>
            <td height="35" align="right"><img src="images/sfz_x.gif" width="9" height="9" />ѧ��������</td>
            <td style="color:#999999;"><?php if ($row['ifedu'] == 0 ){?><select name="edu">
                <option value="">��ѡ��</option>
                <option value="1" <?php if ($row['edu']==1)echo "selected"; ?>>���м�����</option>
                <option value="2" <?php if ($row['edu']==2)echo "selected"; ?>>���л���ר������</option>
                <option value="3" <?php if ($row['edu']==3)echo "selected"; ?>>��ר������</option>
                <option value="4" <?php if ($row['edu']==4)echo "selected"; ?>>���Ƽ�����</option>
                <option value="5" <?php if ($row['edu']==5)echo "selected"; ?>>˶ʿ������</option>
                <option value="6" <?php if ($row['edu']==6)echo "selected"; ?>>��ʿ������</option>
              </select>
              <font color="#FF0000"><img src="images/delx.gif" width="10" height="10" hspace="3">δ��֤</font>
              <?php }else{ ?>
              <input name="edu" type="hidden" value="<?php echo $row['edu'];?>">
              <font color="#333333">
<?php
switch ($row['edu']){ 
case 1:echo "���м�����";break;
case 2:echo "���л���ר������";break;
case 3:echo "��ר������";break;
case 4:echo "���Ƽ�����";break;
case 5:echo "˶ʿ������";break;
case 6:echo "��ʿ������";break;
}
?>
              </font>��<font color="#009900"><img src="images/ok.gif" hspace="3" align="absmiddle">����֤</font>
              <?php }?></td>
          </tr>
          <tr>
            <td height="35" align="right">��ҵԺУ��</td>
            <td style="color:#999999;"><input name="school" type="text"  class=input id="school" value="<?php echo stripslashes($row['school']);?>" size="41" maxlength="40" /></td>
          </tr>
          <tr>
            <td height="35" align="right">������ҵ / ���ְҵ��</td>
            <td style="color:#999999;"><select name="field">
                <option value="">�������µ���ҵ</option>
                <option value="1" <?php if ($row['field']==1)echo "selected"; ?>>�����/������</option>
                <option value="2" <?php if ($row['field']==2)echo "selected"; ?>>�ʵ�/ͨѶ</option>
                <option value="3" <?php if ($row['field']==3)echo "selected"; ?>>����/����/����/֤ȯ</option>
                <option value="4" <?php if ($row['field']==4)echo "selected"; ?>>����/���ز�</option>
                <option value="5" <?php if ($row['field']==5)echo "selected"; ?>>��ҵ/����/����</option>
                <option value="6" <?php if ($row['field']==6)echo "selected"; ?>>Ӱ��/����/����</option>
                <option value="7" <?php if ($row['field']==7)echo "selected"; ?>>����/����/�赸</option>
                <option value="8" <?php if ($row['field']==8)echo "selected"; ?>>���/ý��/����</option>
                <option value="9" <?php if ($row['field']==9)echo "selected"; ?>>����/��װ</option>
                <option value="10" <?php if ($row['field']==10)echo "selected"; ?>>����/����</option>
                <option value="11" <?php if ($row['field']==11)echo "selected"; ?>>����/��ѵ/����</option>
                <option value="12" <?php if ($row['field']==12)echo "selected"; ?>>����/����/��Դ</option>
                <option value="13" <?php if ($row['field']==13)echo "selected"; ?>>����/����/����</option>
                <option value="14" <?php if ($row['field']==14)echo "selected"; ?>>ҽ��/����</option>
                <option value="15" <?php if ($row['field']==15)echo "selected"; ?>>˾��/��ʦ/��ѯ</option>
                <option value="16" <?php if ($row['field']==16)echo "selected"; ?>>����/������֯</option>
                <option value="17" <?php if ($row['field']==17)echo "selected"; ?>>����/����</option>
                <option value="18" <?php if ($row['field']==18)echo "selected"; ?>>���һ���/����</option>
                <option value="19" <?php if ($row['field']==19)echo "selected"; ?>>ũҵ</option>
                <option value="20" <?php if ($row['field']==20)echo "selected"; ?>>��Уѧ��</option>
                <option value="21" <?php if ($row['field']==21)echo "selected"; ?>>����</option>
              </select>
              /
              <select name="job">
                <option value="">����ְҵ</option>
                <option value="1" <?php if ($row['job']==1)echo "selected"; ?>>��ҵ������Ա</option>
                <option value="2" <?php if ($row['job']==2)echo "selected"; ?>>ר��/����</option>
                <option value="3" <?php if ($row['job']==3)echo "selected"; ?>>����/������Ա</option>
                <option value="4" <?php if ($row['job']==4)echo "selected"; ?>>�г�/������Ա</option>
                <option value="5" <?php if ($row['job']==5)echo "selected"; ?>>������Ա/��ְ����</option>
                <option value="6" <?php if ($row['job']==6)echo "selected"; ?>>��ְͨԱ</option>
                <option value="7" <?php if ($row['job']==7)echo "selected"; ?>>���ظɲ�/������Ա</option>
                <option value="8" <?php if ($row['job']==8)echo "selected"; ?>>������/��Ա</option>
                <option value="9" <?php if ($row['job']==9)echo "selected"; ?>>��ʦ</option>
                <option value="10" <?php if ($row['job']==10)echo "selected"; ?>>����</option>
                <option value="11" <?php if ($row['job']==11)echo "selected"; ?>>ũ��</option>
                <option value="12" <?php if ($row['job']==12)echo "selected"; ?>>����</option>
                <option value="13" <?php if ($row['job']==13)echo "selected"; ?>>ѧ��</option>
                <option value="14" <?php if ($row['job']==14)echo "selected"; ?>>����ְҵ��</option>
                <option value="15" <?php if ($row['job']==15)echo "selected"; ?>>��/������Ա</option>
                <option value="16" <?php if ($row['job']==16)echo "selected"; ?>>ʧҵ/��ҵ</option>
                <option value="17" <?php if ($row['job']==17)echo "selected"; ?>>����</option>
          </select>          </tr>
          <tr>
            <td height="35" align="right"><img src="images/sfz_x.gif" width="9" height="9" />�� �� �룺</td>
            <td style="color:#999999;"><?php if ($row['ifpay'] == 0 ){?>
              <select name="pay">
              <option value="">������</option>
              <option value="1" <?php if ($row['pay']==1)echo "selected"; ?>>600Ԫ����</option>
              <option value="2" <?php if ($row['pay']==2)echo "selected"; ?>>600-799Ԫ</option>
              <option value="3" <?php if ($row['pay']==3)echo "selected"; ?>>800-999Ԫ</option>
              <option value="4" <?php if ($row['pay']==4)echo "selected"; ?>>1000-1499Ԫ</option>
              <option value="5" <?php if ($row['pay']==5)echo "selected"; ?>>1500-1999Ԫ</option>
              <option value="6" <?php if ($row['pay']==6)echo "selected"; ?>>2000-2999Ԫ</option>
              <option value="7" <?php if ($row['pay']==7)echo "selected"; ?>>3000-3999Ԫ</option>
              <option value="8" <?php if ($row['pay']==8)echo "selected"; ?>>4000-4999Ԫ</option>
              <option value="9" <?php if ($row['pay']==9)echo "selected"; ?>>5000-5999Ԫ</option>
              <option value="10" <?php if ($row['pay']==10)echo "selected"; ?>>6000-6999Ԫ</option>
              <option value="11" <?php if ($row['pay']==11)echo "selected"; ?>>7000-9999Ԫ</option>
              <option value="12" <?php if ($row['pay']==12)echo "selected"; ?>>10000-19999Ԫ</option>
              <option value="13" <?php if ($row['pay']==13)echo "selected"; ?>>20000Ԫ����</option>
            </select>
              <font color="#FF0000"><img src="images/delx.gif" width="10" height="10" hspace="3">δ��֤</font>
              <?php }else{ ?>
              <input name="pay" type="hidden" value="<?php echo $row['pay'];?>">
              <font color="#333333">
<?php
switch ($row['pay']){ 
case 1:echo "600Ԫ����";break;
case 2:echo "600-799Ԫ";break;
case 3:echo "800-999Ԫ";break;
case 4:echo "1000-1499Ԫ";break;
case 5:echo "1500-1999Ԫ";break;
case 6:echo "2000-2999Ԫ";break;
case 7:echo "3000-3999Ԫ";break;
case 8:echo "4000-4999Ԫ";break;
case 9:echo "5000-5999Ԫ";break;
case 10:echo "6000-6999Ԫ";break;
case 11:echo "7000-9999Ԫ";break;
case 12:echo "10000-19999Ԫ";break;
case 13:echo "20000Ԫ����";break;
}
?>
              </font>��<font color="#009900"><img src="images/ok.gif" hspace="3" align="absmiddle">����֤</font>
              <?php }?>            </tr>
          <tr>
            <td height="35" align="right">���������£�</td>
            <td><input name="nianwang" type="text"  class=input id="nianwang" value="<?php echo htmlout(stripslashes($row['nianwang']));?>" size="60" maxlength="240" /></td>
          </tr>
          <tr>
            <td height="35" align="right">���ڵ���Ը��</td>
            <td><font color="#666666">
              <input name="xinyuan" type="text"  class=input id="xinyuan" value="<?php echo htmlout(stripslashes($row['xinyuan']));?>" size="60" maxlength="240" />
            </font></td>
          </tr>
          <tr>
            <td height="35" align="right">�Ƿ� ���� / �Ⱦƣ�</td>
            <td style="color:#999999;"><select name=smoking>
                <option value="">��ѡ��</option>
                <option value="1" <?php if ($row['smoking']==1)echo "selected"; ?>>����</option>
                <option value="2" <?php if ($row['smoking']==2)echo "selected"; ?>>ż����</option>
                <option value="3" <?php if ($row['smoking']==3)echo "selected"; ?>>һ��һ��</option>
                <option value="4" <?php if ($row['smoking']==4)echo "selected"; ?>>���̾���</option>
                <option value="5" <?php if ($row['smoking']==5)echo "selected"; ?>>���ڽ���</option>
                <option value="6" <?php if ($row['smoking']==6)echo "selected"; ?>>�Ѿ�����</option>
              </select>
              /
              <select name=drink>
                <option value="">��ѡ��</option>
                <option value="1" <?php if ($row['drink']==1)echo "selected"; ?>>�ξƲ�մ</option>
                <option value="2" <?php if ($row['drink']==2)echo "selected"; ?>>��ʱ��һЩ</option>
                <option value="3" <?php if ($row['drink']==3)echo "selected"; ?>>ϲ��������</option>
                <option value="4" <?php if ($row['drink']==4)echo "selected"; ?>>�þ����������</option>
                <option value="5" <?php if ($row['drink']==5)echo "selected"; ?>>���ڽ��</option>
                <option value="6" <?php if ($row['drink']==6)echo "selected"; ?>>�Ѿ�����</option>
              </select></td>
          </tr>
          <tr>
            <td height="35" align="right">�ҵĸ��ԣ�</td>
            <td><input name="gexin" type="text"  class=input id="gexin" onFocus="setTagBehavior(this,'gexin','tipinfo1');" value="<?php echo htmlout(stripslashes($row['gexin']));?>" size="60" maxlength="240" >
                <div id="tipinfo1" style="display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;;overflow:scroll;overflow-x:hidden;"></div></td>
          </tr>
          <tr>
            <td height="35" align="right">���������ң�</td>
            <td><input name="xinrong" type="text"  class=input id="xinrong" onFocus="setTagBehavior(this,'xinrong','tipinfo2');" value="<?php echo htmlout(stripslashes($row['xinrong']));?>" size="60" maxlength="240" >
                <div id="tipinfo2" style="display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;overflow:scroll;overflow-x:hidden;"></div></td>
          </tr>
          <tr>
            <td height="35" align="right">�ҵ����ƣ�</td>
            <td><input name="youshi" type="text"  class=input id="youshi" onFocus="setTagBehavior(this,'youshi','tipinfo3');" value="<?php echo htmlout(stripslashes($row['youshi']));?>" size="60" maxlength="240" >
                <div id="tipinfo3" style="display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;overflow:scroll;overflow-x:hidden;"></div></td>
          </tr>
          <tr>
            <td height="35" align="right">��Ȥ���ã�</td>
            <td><input name="xinqu" type="text"  class=input id="a14" onFocus="setTagBehavior(this,'xinqu','tipinfo4');" value="<?php echo htmlout(stripslashes($row['xinqu']));?>" size="60" maxlength="240" >
                <div id="tipinfo4" style="display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;overflow:scroll;overflow-x:hidden;"></div></td>
          </tr>
          <tr>
            <td height="35" align="right">ϣ��Ѱ�ҵĻ�飺</td>
            <td><input name="huoban" type="text"  class=input id="a14" onFocus="setTagBehavior(this,'huoban','tipinfo5');" value="<?php echo htmlout(stripslashes($row['huoban']));?>" size="60" maxlength="240" >
                <div id="tipinfo5" style="display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;overflow:scroll;overflow-x:hidden;"></div></td>
          </tr>
          <tr>
            <td height="55" colspan="2" align="center"><input type=hidden name=submitok value="modupdate">
                <input type="submit" name="Submit" value=" �� �� " class="button"></td>
          </tr>
        </form>
    </table>
    <br />
  </div></div>



<?php require_once YZLOVE.'my/bottommy.php';?>