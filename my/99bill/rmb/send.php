<?PHP
require_once "../../../sub/init.php";
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT email FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//����������˻���
///���¼��Ǯϵͳ��ȡ�û���ţ��û���ź��01��Ϊ����������˻��š�
$merchantAcctId="  ";
//�����������Կ
///���ִ�Сд.�����Ǯ��ϵ��ȡ
$key=" ";
//�ַ���.�̶�ѡ��ֵ����Ϊ�ա�
///1����UTF-8; 2����GBK; 3����gb2312
$inputCharset="3";
//����������֧������ĺ�̨��ַ.��[pageUrl]����ͬʱΪ�ա������Ǿ��Ե�ַ��
///��Ǯͨ�����������ӵķ�ʽ�����׽�����͵�[bgUrl]��Ӧ��ҳ���ַ�����̻�������ɺ������<result>���Ϊ1��ҳ���ת��<redirecturl>��Ӧ�ĵ�ַ��
///�����Ǯδ���յ�<redirecturl>��Ӧ�ĵ�ַ����Ǯ����֧�����GET��[pageUrl]��Ӧ��ҳ�档
$bgUrl= $Global['my_2domain']."/99bill/rmb/receive.php";
$version="v2.0";
///1�������ģ�2����Ӣ��
$language="1";
///1����MD5ǩ��
$signType="1";	
//֧��������
///��Ϊ���Ļ�Ӣ���ַ�
$payerName=$payerName;
//֧������ϵ��ʽ����.�̶�ѡ��ֵ
///ֻ��ѡ��1
///1����Email
$payerContactType="1";	
//֧������ϵ��ʽ
///ֻ��ѡ��Email���ֻ���
$payerContact=htmlout(stripslashes($row['email']));
//�̻�������
///����ĸ�����֡���[-][_]���
$orderId=$orderId;		
//�������
///�Է�Ϊ��λ����������������
///�ȷ�2������0.02Ԫ
$orderAmount=$orderAmount*100;//1Ԫ
//�����ύʱ��
///14λ���֡���[4λ]��[2λ]��[2λ]ʱ[2λ]��[2λ]��[2λ]
///�磻20080101010101
$orderTime=date('YmdHis');
//��Ʒ����
///��Ϊ���Ļ�Ӣ���ַ�
$productName=$productName;
//��Ʒ����
///��Ϊ�գ��ǿ�ʱ����Ϊ����
$productNum="1";
//��Ʒ����
///��Ϊ�ַ���������
$productId="";
//��Ʒ����
$productDesc="";
//��չ�ֶ�1
///��֧��������ԭ�����ظ��̻�
$ext1="";
//��չ�ֶ�2
///��֧��������ԭ�����ظ��̻�
$ext2="";
//֧����ʽ.�̶�ѡ��ֵ
///ֻ��ѡ��00��10��11��12��13��14
///00�����֧��������֧��ҳ����ʾ��Ǯ֧�ֵĸ���֧����ʽ���Ƽ�ʹ�ã�10�����п�֧��������֧��ҳ��ֻ��ʾ���п�֧����.11���绰����֧��������֧��ҳ��ֻ��ʾ�绰֧����.12����Ǯ�˻�֧��������֧��ҳ��ֻ��ʾ��Ǯ�˻�֧����.13������֧��������֧��ҳ��ֻ��ʾ����֧����ʽ��
$payType="00";
//ͬһ������ֹ�ظ��ύ��־
///�̶�ѡ��ֵ�� 1��0
///1����ͬһ������ֻ�����ύ1�Σ�0��ʾͬһ��������û��֧���ɹ���ǰ���¿��ظ��ύ��Ρ�Ĭ��Ϊ0����ʵ�ﹺ�ﳵ�������̻�����0�������Ʒ���̻�����1
$redoFlag="0";
//��Ǯ�ĺ��������˻���
///��δ�Ϳ�Ǯǩ���������Э�飬����Ҫ��д������
$pid=""; ///��������ڿ�Ǯ���û����
//���ɼ���ǩ����
///����ذ�������˳��͹�����ɼ��ܴ���
	$signMsgVal=appendParam($signMsgVal,"inputCharset",$inputCharset);
	$signMsgVal=appendParam($signMsgVal,"bgUrl",$bgUrl);
	$signMsgVal=appendParam($signMsgVal,"version",$version);
	$signMsgVal=appendParam($signMsgVal,"language",$language);
	$signMsgVal=appendParam($signMsgVal,"signType",$signType);
	$signMsgVal=appendParam($signMsgVal,"merchantAcctId",$merchantAcctId);
	$signMsgVal=appendParam($signMsgVal,"payerName",$payerName);
	$signMsgVal=appendParam($signMsgVal,"payerContactType",$payerContactType);
	$signMsgVal=appendParam($signMsgVal,"payerContact",$payerContact);
	$signMsgVal=appendParam($signMsgVal,"orderId",$orderId);
	$signMsgVal=appendParam($signMsgVal,"orderAmount",$orderAmount);
	$signMsgVal=appendParam($signMsgVal,"orderTime",$orderTime);
	$signMsgVal=appendParam($signMsgVal,"productName",$productName);
	$signMsgVal=appendParam($signMsgVal,"productNum",$productNum);
	$signMsgVal=appendParam($signMsgVal,"productId",$productId);
	$signMsgVal=appendParam($signMsgVal,"productDesc",$productDesc);
	$signMsgVal=appendParam($signMsgVal,"ext1",$ext1);
	$signMsgVal=appendParam($signMsgVal,"ext2",$ext2);
	$signMsgVal=appendParam($signMsgVal,"payType",$payType);	
	$signMsgVal=appendParam($signMsgVal,"redoFlag",$redoFlag);
	$signMsgVal=appendParam($signMsgVal,"pid",$pid);
	$signMsgVal=appendParam($signMsgVal,"key",$key);
$signMsg= strtoupper(md5($signMsgVal));
	
	//���ܺ�����������ֵ��Ϊ�յĲ�������ַ���
	Function appendParam($returnStr,$paramId,$paramValue){

		if($returnStr!=""){
			
				if($paramValue!=""){
					
					$returnStr.="&".$paramId."=".$paramValue;
				}
			
		}else{
		
			If($paramValue!=""){
				$returnStr=$paramId."=".$paramValue;
			}
		}
		
		return $returnStr;
	}
	//���ܺ�����������ֵ��Ϊ�յĲ�������ַ���������
	
?>

<!doctype html public "-//w3c//dtd html 4.0 transitional//en" >
<html>
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html; charset=gb2312" >
	</head>
	<link href="../../my.css" rel="stylesheet" type="text/css">
	<style type="text/css"> 
font,td{font-family:Verdana;font-size:12px}
	</style>
<BODY>
<table width="700" height="65" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="199" height="65"><a href="../"><img src="../../../images/logo.gif" border="0" /></a></td>
        <td width="412" valign="bottom" style="font-size:10.3pt;font-weight:bold;padding-bottom:8px;">��֧ �� �� ��</td>
        <td width="89" valign="bottom" style="padding-bottom:8px;"><a href="../../../"><u><font color="B970A6"><b>��������ҳ</b></font></u></a></td>
      </tr>
</table>
	<table width="700" height="288" border="0" align="center" cellpadding="4" cellspacing="0" style="border:#EAC0F1 1px solid;">
      <tr>
        <td colspan="2" align="center" bgcolor="FDF5FE" style="padding-bottom:6px;"><br>
          <br>
            <br>
          <table width="438" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" >
			<tr bgcolor="#FFFFFF">
				<td width="80" align="right" bgcolor="#FFFFFF">֧����ʽ:</td>
				<td >��Ǯ[99bill]</td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td align="right" bgcolor="#FFFFFF" >�������:</td>
				<td ><?php echo $orderId; ?></td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td align="right" bgcolor="#FFFFFF">�������:</td>
				<td style="font-size:14px"><font color="#FF0000" style="font-family:Verdana, Arial, Helvetica, sans-serif">��<strong><?php echo intval($orderAmount/100); ?></strong></font> Ԫ��</td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td align="right" bgcolor="#FFFFFF">֧ �� ��:</td>
				<td><?php echo $payerName; ?></td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td align="right" bgcolor="#FFFFFF">��Ʒ����:</td>
				<td><?php echo $productName; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
	  </table>
          <br>
          <form name="kqPay" method="post" action="https://www.99bill.com/gateway/recvMerchantInfoAction.htm">
			<input type="hidden" name="inputCharset" value="<?php echo $inputCharset; ?>"/>
			<input type="hidden" name="bgUrl" value="<?php echo $bgUrl; ?>"/>
			<input type="hidden" name="version" value="<?php echo $version; ?>"/>
			<input type="hidden" name="language" value="<?php echo $language; ?>"/>
			<input type="hidden" name="signType" value="<?php echo $signType; ?>"/>
			<input type="hidden" name="signMsg" value="<?php echo $signMsg; ?>"/>
			<input type="hidden" name="merchantAcctId" value="<?php echo $merchantAcctId; ?>"/>
			<input type="hidden" name="payerName" value="<?php echo $payerName; ?>"/>
			<input type="hidden" name="payerContactType" value="<?php echo $payerContactType; ?>"/>
			<input type="hidden" name="payerContact" value="<?php echo $payerContact; ?>"/>
			<input type="hidden" name="orderId" value="<?php echo $orderId; ?>"/>
			<input type="hidden" name="orderAmount" value="<?php echo $orderAmount; ?>"/>
			<input type="hidden" name="orderTime" value="<?php echo $orderTime; ?>"/>
			<input type="hidden" name="productName" value="<?php echo $productName; ?>"/>
			<input type="hidden" name="productNum" value="<?php echo $productNum; ?>"/>
			<input type="hidden" name="productId" value="<?php echo $productId; ?>"/>
			<input type="hidden" name="productDesc" value="<?php echo $productDesc; ?>"/>
			<input type="hidden" name="ext1" value="<?php echo $ext1; ?>"/>
			<input type="hidden" name="ext2" value="<?php echo $ext2; ?>"/>
			<input type="hidden" name="payType" value="<?php echo $payType; ?>"/>
			<input type="hidden" name="redoFlag" value="<?php echo $redoFlag; ?>"/>
			<input type="hidden" name="pid" value="<?php echo $pid; ?>"/>
			<input type="submit" name="submit" value="��ʼ֧��" class=button>
	  </form>
            <br> <br>
        </td></tr>
    </table>
	<div align="center">
		
	</div>

	<div align="center" style="font-size=12px;font-weight: bold;color=red;">
				
	</div>
	
</BODY>
</HTML>