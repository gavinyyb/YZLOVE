<?PHP
/*
 * @Description: ��Ǯ������֧�����ؽӿڷ���
 * @Copyright (c) �Ϻ���Ǯ��Ϣ�������޹�˾
 * @version 2.0
 */


//��ȡ�����������˻���
$merchantAcctId=trim($_REQUEST['merchantAcctId']);

//����������������Կ
///���ִ�Сд
$key=" ";

//��ȡ���ذ汾.�̶�ֵ
///������汾�Ź̶�Ϊv2.0
$version=trim($_REQUEST['version']);

//��ȡ��������.�̶�ѡ��ֵ��
///ֻ��ѡ��1��2
///1�������ģ�2����Ӣ��
$language=trim($_REQUEST['language']);

//��ȡ֧����ʽ
///��ѡ��00��41��42��52
///00 �����ǮĬ��֧����ʽ��ĿǰΪ�����п���֧���Ϳ�Ǯ�˻�֧����41 �����Ǯ�˻�֧����42 ���������п���֧���Ϳ�Ǯ�˻�֧����52 ���������п���֧��
$payType=trim($_REQUEST['payType']);

//�����п����
///���ͨ�������п�ֱ��֧��ʱ����
$cardNumber=trim($_REQUEST['cardNumber']);

//��ȡ�����п�����
///���ͨ�������п�ֱ��֧��ʱ����
$cardPwd=trim($_REQUEST['cardPwd']);

//��ȡ�̻�������
$orderId=trim($_REQUEST['orderId']);


//��ȡԭʼ�������
///�����ύ����Ǯʱ�Ľ���λΪ�֡�
///�ȷ�2 ������0.02Ԫ
$orderAmount=trim($_REQUEST['orderAmount']);

//��ȡ��Ǯ���׺�
///��ȡ�ý����ڿ�Ǯ�Ľ��׺�
$dealId=trim($_REQUEST['dealId']);


//��ȡ�̻��ύ����ʱ��ʱ��
///14λ���֡���[4λ]��[2λ]��[2λ]ʱ[2λ]��[2λ]��[2λ]
///�磺20080101010101
$orderTime=trim($_REQUEST['orderTime']);

//��ȡ��չ�ֶ�1
///���̻��ύ����ʱ����չ�ֶ�1����һ��
$ext1=trim($_REQUEST['ext1']);

//��ȡ��չ�ֶ�2
///���̻��ύ����ʱ����չ�ֶ�2����һ��
$ext2=trim($_REQUEST['ext2']);

//��ȡʵ��֧�����
///��λΪ��
///�ȷ� 2 ������0.02Ԫ
$payAmount=trim($_REQUEST['payAmount']);

//��ȡ��Ǯ����ʱ��
$billOrderTime=trim($_REQUEST['billOrderTime']);

//��ȡ������
///10����֧���ɹ��� 11����֧��ʧ��
$payResult=trim($_REQUEST['payResult']);

//��ȡǩ������
///1����MD5ǩ��
///��ǰ�汾�̶�Ϊ1
$signType=trim($_REQUEST['signType']);

//��ȡ����ǩ����
$signMsg=trim($_REQUEST['signMsg']);





//���ɼ��ܴ������뱣������˳��
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"merchantAcctId",$merchantAcctId);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"version",$version);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"language",$language);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"payType",$payType);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"cardNumber",$cardNumber);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"cardPwd",$cardPwd);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"orderId",$orderId);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"orderAmount",$orderAmount);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"dealId",$dealId);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"orderTime",$orderTime);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"ext1",$ext1);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"ext2",$ext2);	
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"payAmount",$payAmount);
    $merchantSignMsgVal=appendParam($merchantSignMsgVal,"billOrderTime",$billOrderTime);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"payResult",$payResult);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"signType",$signType);
	$merchantSignMsgVal=appendParam($merchantSignMsgVal,"key",$key);
    $merchantSignMsg= md5($merchantSignMsgVal);


//��ʼ���������ַ
$rtnOk=0;
$rtnUrl="";

//�̼ҽ������ݴ�������ת���̼���ʾ֧�������ҳ��
///���Ƚ���ǩ���ַ�����֤
if(strtoupper($signMsg)==strtoupper($merchantSignMsg)){

	switch($payResult){
		  
		  case "10":
			
			/* 
			// �̻���վ�߼������ȷ����¶���֧��״̬Ϊ�ɹ�
			// �ر�ע�⣺ֻ��strtoupper($signMsg)==strtoupper($merchantSignMsg)����payResult=10���ű�ʾ֧���ɹ���
			*/
			
			//�������Ǯ�����������ṩ��Ҫ�ض���ĵ�ַ��
			$rtnOk=1;
			$rtnUrl="http://www.yoursite.com/show.php?msg=success";
			
			break;
		  
		  default:

			$rtnOk=1;
			$rtnUrl="http://www.yoursite.com/show.php?msg=false";

			break;
	}

}Else{

	$rtnOk=1;
	$rtnUrl="http://www.yoursite.com/show.php?msg=error";

} 





	//���ܺ�����������ֵ��Ϊ�ղ�������ַ���
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
	//���ܺ�����������ֵ��Ϊ�ղ�������ַ���������


//���±������Ǯ�����������ṩ��Ҫ�ض���ĵ�ַ
?>
<result><?PHP echo $rtnOk; ?></result><redirecturl><?PHP echo $rtnUrl; ?></redirecturl>