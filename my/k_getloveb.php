<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)){header("Location: ".$Global['www_2domain']."/login.php");exit;}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;width:70px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:70px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:70px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:70px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:70px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:70px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
.iframebox {margin:15px 0 0 0;border:#f60 1px solid;display:none}
.iframebox .iframeclose {text-align:right;height:25px;line-height:25px;background:#fc0;font-weight:bold;color:#000}
.iframebox .iframeclose .iframecloseL {float:left;padding:0 0 0 8px;}
.iframebox .iframeclose .iframecloseR {float:right;padding:5px 8px 0 0;height:20px;line-height:15px;}
.iframebox .iframeclose .iframecloseR a:link,.iframecloseR a:active,.iframecloseR a:visited {color:#000;}
.iframebox .iframeclose .iframecloseR a:hover {color:#f00;}
</style>
</head>
<body>
<ul>
<li><a href="k_myloveb.php">�ҵ��ʻ�</a></li>
<li><a href="k_myloveb.php?submitok=list">�����嵥</a></li>
<li><a href="k_vip.php">��Ա����</a></li>
<li><a href="k_bidding.php">��������</a></li>
<li><a href="k_homepage.php">װ����ҳ</a></li>
<li><a href="k_sfz.php">ʵ����֤</a></li>
<li><a href="../news.php" target="_blank">��վ��̬</a></li>
<li class='liselect'><a href="k_getloveb.php">��ȡLove��</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <table width="600" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="752" align="left" style="line-height:200%;color:#666666"><b><font color="FF3366" style="font-size:14px">��λ��Love�ң�</font></b><br>
        ��������<b><font color="#009900">ͨ�����������ֵLove�ҡ�</font></b><font color="#009900">�����������<b><font color="#FF0000">1.00</font></b>Ԫ <b>��</b><b><font color="#FF0000">1000</font> </b>��</font><font color="#FF6699">love��</font></td>
      </tr>
    </table>
    <table width="600" height="63" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="752" align="center"><a href="k_bank.php"><img src="images/saleloveb.gif" alt="����love��" width="121" height="34" border="0" /></a></td>
      </tr>
    </table>
    <table width="600" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="752" align="left" style="line-height:200%;color:#666666">        �������������߼���Ա��������Love��<font color="red">150000</font>������Ϊ�߼���Ա�ݱ�Ч�ʴ����ߣ��ﵽ<font color="red">˫��</font>��<font color="red"><b>10</b></font>��֮�࣬����ȫ�����ѿɴ�<font color="red">3~5</font>�ۣ�����ֱ�Ӳ鿴�Է���ϵ��������������ȡ�</td>
      </tr>
    </table>
    <table width="600" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="752" align="center"><img src="images/diamond.gif" width="20" height="16" hspace="3" vspace="5" border="0" align="absmiddle" /><a href="k_bank.php" class="uDF2C91"><b>������Ϊ�߼���Ա</b></a>��������<img src="images/ok.gif" width="16" height="14" hspace="3" vspace="5" border="0" align="absmiddle" /><a href="k_vip.php" class="uDF2C91"><b>�߼���Ա������Щ��Ȩ</b>��</a></td>
      </tr>
    </table>
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td style="line-height:200%;color:#666666">�������������ݱң�ֻҪ��ÿ���¼��վ����Ҫ�˳���ϵͳ�������¼����һ����ʼ��ʱ��Ȼ��ÿ�����㽫��õ�<font color="red">1~10</font>��Love�ҡ���ʯ��Ա<font color="#FF0000">10</font>�������Ż�Ա<font color="#FF0000">2</font>������ͨ��Ա<font color="#FF0000">1</font>���������˵��˳�Ӵ��Ҫ��Ȼ����ӱҡ�<br />������
          (ע���߼���Ա����Ҫ���˳���ÿ��20�����Զ��ۼ�һ��)<br>
                        ���������ϴ���Ƭ���������գ�¼����Ƶ�������ϴ��������Ч��������<font color="red">1000</font>�����ҵĽ�����ÿ���һ�ε�¼��ϵͳ������<font color="#FF0000"><?php echo $Global['m_firstlogin'] ?></font>��Love�ҵĽ�����<br>      
            �������������ռǡ�������1+1Լ�ᡢȦ�����º�¼����Ƶ�Ȳ�����վ��Ϊ�����ġ�������<font color="red">1000</font>���Ľ�����<br>      
            ��������������Ļش���������Ϊ��Ѵ𰸣�������õ�<font color="red">100~50000</font>���ȵ����ͽ����Լ�ϵͳ���⽱��<font color="#FF0000"><?php echo $Global['m_askloveb']; ?></font>��<br>
      �����������ھ��������֤���Ļ�Ա������Ա������<font color="red">1000~10000</font>��Love�ҵĽ�����<br>
      ������������Ա�վ�кõĵĽ����������������<font color="red">1000~10000</font>�Ľ�����<br />
      <br>
      <b><font color="FF3366" style="font-size:14px">ʲô��Love�ң� </font></b><br>
����Ϊ�˸��õĹ���Ϊ�˸��õ�Ϊ��ҷ������������ˡ�Love�ҡ��������ڱ�վ����������ѵ�������ҡ�<br />
<br>
<b><font color="FF3366" style="font-size:14px">Love��������ʲô�� </font></b><br>
����Love�Ҿ߱����ع��ܡ����ɹ���վ�ṩ����ط���ʹ�շѵķ�������ѷ���<br>
�������ǻᶨ�ھ���һЩ���������Ʒ�ô������Love�Ҵ����������Ȥ��<br>
����Love����Ҫ�����������ԡ����۸�������������Ȧ������������Լ�����������������������Һſ������������䡢Ȧ������Ⱥ������Ȧ�ӲƸ���ֵ������������Ʒ�ȡ�<br>
�����������ع��������ڴ���<br />
<br>
       <b><font color="FF3366" style="font-size:14px">Love�ҳͷ���</font></b><br>
      ����Ϊ��ʹ����ܸ������ܽ��ѵ���Ȥ����������ص�����͹��򡣷�����������ظ��費ͬ��Love�ҳͷ���<br> ����
      <font color="red">ע������1����Love��Ϊ��򳬹�6���²���¼��վ�ģ�ϵͳ������ɾ�����ʺţ����ûָ���<br />
      </font></td>
      </tr>
    </table>
<br /><br />
<br /><br />
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>