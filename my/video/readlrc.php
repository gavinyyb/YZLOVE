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
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT geci FROM oklist WHERE id=".$id);
if($db->num_rows($rt)) {
	$row = $db->fetch_array($rt);
	echo $row['geci'];
}
?>