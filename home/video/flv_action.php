<?php
/*
+--------------------------------+
+ ����̨�����޸İ�Ȩ���ڱ�������
+ Modified Author����С�ȣ�lyixian@126.com www.linxiaoxian.com��QQ��6154041
+ ���ļ�����޸����ڣ�2010��1��
+ �����޸ģ��뱣��������Ϣ������վû��Ӱ��
+--------------------------------+
*/
require_once '../../sub/init.php';
$fms_ip = $Global['m_siteurl'];
$weburl= $Global['home_2domain']."/video";
$user_id=1;
//���²����벻Ҫ�Ķ�������ᷢ���쳣
$user_name = "YZLOVE";
if($_GET['action']=="get_user_id"){
	echo "fcs_host=".$fms_ip."&action_host=".$weburl."&end=1&copyright=www.zeai.cn,www.yzlove.com";
}
ob_end_flush();
?>