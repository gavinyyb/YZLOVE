<?php
require_once 'sub/init.php';$navvar=1;
require_once YZLOVE.'sub/conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.top_login .top_login_c .L,.top_login .top_login_c .R{float:left;height:41px;line-height:41px;color:#FFCCD9}
.top_login .top_login_c .L{width:320px;padding:0 0 0 80px;text-align:left}
.top_login .top_login_c .R{width:497px;padding:0 75px 0 0;text-align:right}
.top_login .top_login_c .R a{text-decoration:underline;color:#ff0;font-weight:bold}
.top_login .top_login_c .R a:hover{color:#cf0}
.main1 {width:922px;height:20px;margin:0px auto;margin-top:15px;background-image:url(images/login1.gif)}
.main2 {width:922px;margin:0px auto;background-image:url(images/login2.gif)}
.main2 .box{width:880px;margin:0px auto;background:#FFF5F9;border:#F7E4ED 1px solid}
.main2 .box .line1{width:880px;height:60px;line-height:60px;padding:20px 0 0 0;font-size:18px;font-family:����,����;color:#6F9F00}
.main2 .box .line2{width:680px;line-height:200%;text-align:left;padding:10px 100px 80px 100px;font-family:Verdana;font-size:14px}
.main3 {width:922px;height:20px;margin:0px auto;background-image:url(images/login3.gif);margin-bottom:20px}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main1"></div>
<div class="main2">
	<div class="box">
		<div class="line1">��<?php echo $Global['m_sitename']; ?>��Աע��������������������</div>
	  <div class="line2">
����ע��ǰ�����Ķ�<?php echo $Global['m_sitename'] ?>(<?php echo $Global['m_siteurl'] ?>)������������� <br>
          ������ӭ����<?php echo $Global['m_sitename'] ?>(<?php echo $Global['m_siteurl'] ?>)������ͥ��Ϊά�����Ϲ������������ȶ��������Ծ������������<br />
          <font color="#2E7CD3">
һ���������ñ�վΣ�����Ұ�ȫ��й¶�������ܣ������ַ�������Ἧ��ĺ͹���ĺϷ�Ȩ�棬��Աͬ�����ء��л����񹲺͹���ͬ���������л����񹲺͹�����Ȩ��������ȫ����������᳣��ίԱ�����ά����������ȫ�ľ����������л����񹲺͹����ع������ܷ��������л����񹲺͹����������������л����񹲺͹��������Ϣϵͳ��ȫ���������������л����񹲺͹��������Ϣ������������������й涨������ʵʩ�취�����������Ϣϵͳ�����������ܹ���涨��������������Ϣ�������취�������������Ϣ�������������ȫ��������취���������������ӹ���������涨��������й����ɷ�����κμ����еĹ涨��
�������ñ�վ���������ƺʹ���������Ϣ��</font> <font color="#666666"><br>
      <font color="#2E7CD3">����(һ)</font>ɿ�����ܡ��ƻ��ܷ��ͷ��ɡ���������ʵʩ�ģ�<br>
      <font color="#2E7CD3">����(��)</font>ɿ���߸�������Ȩ���Ʒ���������ƶȵģ�<br>
      <font color="#2E7CD3">����(��)</font>ɿ�����ѹ��ҡ��ƻ�����ͳһ�ģ�<br>
      <font color="#2E7CD3">����(��)</font>ɿ�������ޡ��������ӣ��ƻ������Ž�ģ�<br>
      <font color="#2E7CD3">����(��)</font>�������������ʵ��ɢ��ҥ�ԣ������������ģ�<br>
      <font color="#2E7CD3">����(��)</font>����⽨���š����ࡢɫ�顢�Ĳ�����������ɱ���ֲ�����������ģ�<br>
      <font color="#2E7CD3">����(��)</font>��Ȼ�������˻���������ʵ�̰����˵ģ����߽����������⹥���ģ�<br>
      <font color="#2E7CD3">����(��)</font>�𺦹��һ��������ģ�<br>
      <font color="#2E7CD3">����(��)</font>����Υ���ܷ��ͷ�����������ģ�<br>
      <font color="#2E7CD3">����(ʮ)</font>������ҵ�����Ϊ�ġ� </font><br>
      <font color="#2E7CD3">�����������أ����Լ������ۺ���Ϊ����</font><br>
      <font color="#2E7CD3">������Ա����</font><font color="#666666"><br>
       ���� 1.���ر���վ����վ�³̡�<br>
       ���� 2.��ʵ����ϸ���ṩ�������ϣ�������ʵ����Ƭ��<br>
       ���� 3.���ع��ҵķ��ɷ��棬�Ͻ����ñ���վ�����ڽ̻������Υ����Υ����<br>
       ���� 4.δ��������ͬ�⣬������й¶������Ա�����ϡ�<br>
       ���� 5.�����μӱ���վ�ĸ�������Ϊ��վ�ĸ����׼��ײߡ�<br>
       ���� 6.��Ա������ά������վ������������������վ������¡�</font><br>
      <font color="#2E7CD3">�ġ�<?php echo $Global['m_sitename'] ?>(<?php echo $Global['m_siteurl'] ?>)���������ʣ����������Ϣ���к�ʵ�����е���˴������κ����Ρ�</font>
	  <br />
	  �� ��<font color="#666666">1.��Ӧ��֤�����ϴ��������������Ϸ���ͬʱ���ַ����˵�Ф��Ȩ������Ȩ��֪ʶ��Ȩ���κκϷ�Ȩ�档<br />
	  �� ��2.��վ�����Ϊ�������ϲ��ʵ�����Ȩɾ�������޸ġ�<br />
	  ���� 3.����1������û�е�¼�Ļ�Ա��������Ȩ�ջء�ɾ�����޸ġ�ע�����ϣ���������֪ͨ��</font><br />
	  </div>
	</div>
	<div class="clear"></div>
</div>
<div class="main3"></div>
<?php require_once YZLOVE.'bottom.php';?>
