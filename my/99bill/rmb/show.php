<?PHP
/*
 * @Description: ��Ǯ�����֧�����ؽӿڷ���
 * @Copyright (c) �Ϻ���Ǯ��Ϣ�������޹�˾
 * @version 2.0
 */

/*
�ڱ��ļ��У��̼�Ӧ�����ݿ��У���ѯ��������״̬��Ϣ�Լ������Ĵ�����������֧������Ӧ����ʾ��

������������򵥵�ģʽ��ֱ�Ӵ�receiveҳ���ȡ֧��״̬��ʾ���û���
*/

$orderId=trim($_REQUEST['orderId']);
$orderAmount=trim($_REQUEST['orderAmount']);
$msg=trim($_REQUEST['msg']);


?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en" >
<html>
	<head>
		<title>��Ǯ֧�����</title>
		<meta http-equiv="content-type" content="text/html; charset=gb2312" >
	</head>
	
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
        <td colspan="2" align="center" bgcolor="FDF5FE" style="padding-bottom:6px;"><table width="583" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" >
          <tr bgcolor="#FFFFFF">
            <td width="105" align="right" bgcolor="#FFFFFF">֧����ʽ:</td>
            <td width="435" >��Ǯ[99bill]</td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td align="right" bgcolor="#FFFFFF" >�������:</td>
            <td ><?php echo $orderId; ?></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td align="right" bgcolor="#FFFFFF">�������:</td>
            <td><font color="#FF0000" style="font-family:Verdana, Arial, Helvetica, sans-serif">��<strong><?php echo intval($orderAmount/100); ?></strong></font> Ԫ��</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </table>
          <br>
            <br>
            <br>

        ������ϵ<a target="blank" href="http://wpa.qq.com/msgrd?V=1&Uin=7144100&amp;Site=������Ե&Menu=yes"><img src="../../images/qq.gif" alt="�������Ϣ���ͷ�QQ" border="0" /></a>QQ:8437645�򷢶�������<strong>13862511478</strong>�����뿪ͨ��
          <br>
            <br>
        </td>
      </tr>
    </table>
    <script language="javascript" src="/ajax/zeai2kefu.js"></script>
</BODY>
</HTML>