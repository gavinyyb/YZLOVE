<?php 
/*
+--------------------------------+
+ ����̨�����޸İ�Ȩ���ڱ�������
+ Modified Author����С�ȣ�lyixian@126.com www.linxiaoxian.com��QQ��6154041
+ ���ļ�����޸����ڣ�2010��1��
+ �����޸ģ��뱣��������Ϣ������վû��Ӱ��
+--------------------------------+
*/
require_once '../sub/init.php';$navvar = 2;
if ( (!ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
require_once YZLOVE.'sub/conn.php';
$k=!ereg("^[1-5]{1}$",$k)?$k=3:$k;
$s=!ereg("^[1-6]{1}$",$s)?$s=1:$s;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>���� ������������</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.main {width:980px;margin:0px auto;margin-top:5px}/* height:1300px; */
.main .left{float:left;width:715px}/* ;height:1200px */
.main .left .title{width:715px;height:26px;margin:5px 0 0 0;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.main .left .title .uTli{background-image:url(../images/uTli.gif)}
.main .left .title .uTliSelect{background-image:url(../images/uTliSelect.gif)}
.main .left .title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.main .left .title .uTliSelect a:hover{color:#ff0}
.main .left .title .uTliBlank{float:left;width:135px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.main .left .title .uTliPage{float:left;width:155px;height:26px;text-align:right}
.main .left .title .uTliPage .Pl{float:left}
.main .left .title .uTliPage .Pr{float:right}
.main .left .titleline{width:715px;height:9px;font-size:0;background-image:url(../images/titleline.gif)}
.main .left .Ctop {width:715px;height:34px;border-bottom:#ddd 1px solid;text-align:left;margin:0 0 10px 0}
.main .left .Ctop .L,.main .left .Ctop .M,.main .left .Ctop .R{float:left;height:34px;}
.main .left .Ctop .L{width:85px;height:25px;padding:9px 0 0 0}
.main .left .Ctop .M{width:560px;line-height:34px;color:#ccc;padding:0 0 0 5px}
.main .left .Ctop .R{width:65px;height:28px;padding:6px 0 0 0;text-align:right}
.main .left .Ctop .M a{text-decoration:none;color:#444}
.main .left .Ctop .M a:hover{text-decoration:none;color:#6F9F00;border-bottom:#6F9F00 2px solid}
.main .left .Ctop .M a.aselect{text-decoration:none;color:#6F9F00;border-bottom:#6F9F00 2px solid}
.main .left .Ctop .M a.aselect:hover{color:#f60;border-bottom:#f60 2px solid}
.main .left .box{float:left;width:338px;height:135px;padding:6px;background:#fef7fa;margin-bottom:15px;background-image:url(../images/ulistbg.gif);text-align:left}
.main .left .margin_R{margin-right:15px}
.LL,.RR{float:left;height:135px}
.main .left .box .LL{width:110px;margin:0 10px 0 0;background:#F6DDE8}
.main .left .box .RR{width:218px;font-family:Verdana}
.main .left .box .RR .tt{width:218px;height:23px;border-bottom:#F6DDE8 1px solid;color:#999}
.main .left .box .RR .mm{width:213px;height:82px;line-height:18px;padding:5px 5px 0 0;color:#7e7e7e}
.main .left .box .RR .bb{width:203px;height:24px;padding:0 10px 0 0;text-align:right;color:#999}
.main .left .box .RR .bb a{text-decoration:none;color:#FF5494}
.main .left .box .RR .bb a:hover{color:#DF2C91}
.main .left .box .RR .tt a{font-weight:bold}
.main .left .box .RR .tt span{color:#666}
.main .left .page{width:715px;height:20px;padding:10px 0 0 0;margin:0px auto;margin:0 0 25px 0;text-align:right}
.main .left .page .Pl{float:left}
.main .left .page .Pr{float:right}
.main .right{float:right;width:250px/* ;height:1200px */}
.main .right .T{width:250px;height:32px;background-image:url(../images/g_r_tbg.gif)}
.main .right .T .li1{float:left;width:76px;color:#982E00;font-weight:bold;padding:13px 0 0 9px}
.main .right .T .li2{float:left;width:65px;padding:8px 0 0 0}
.main .right .T .li3{float:left;width:91px;text-align:right;padding:8px 0 0 0}
.main .right .C {width:228px;height:235px;border-left:1px #ddd solid;border-right:1px #ddd solid;border-bottom:1px #ddd solid;padding:10px}
.main .right .C .li{width:206px;height:30px;line-height:30px;text-align:left;background-image:url(../images/dating_libg.gif);padding:0 0 0 22px}
.main .right .C .bgli{background-image:url(../images/g_p_libg.gif)}
.main .right .C .li .li1{float:left;width:173px;color:#666}
.main .right .C .li .li22{float:left;width:33px;height:25px;padding-top:5px}
.main .right .margin5{margin:5px 0 0 0}
.main .right .Csearch {height:400px}
.main .right .Csearch .Sli {width:228px;height:26px;color:#666}
.Sli1,.Sli2{float:left;height:26px;line-height:26px}
.main .right .Csearch .Sli .Sli1{width:63px;text-align:right;padding:0 5px 0 0}
.main .right .Csearch .Sli .Sli2{width:160px;text-align:left;overflow:hidden}
.main .right .Csearch .form{height:20px;padding:10px 0 10px 0}
.main .right .Csearch .Sinput{border:#ddd 1px solid;background:#FAFAFA;height:17px;line-height:17px;color:#999}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main">
<!-- ��� -->
	<div class="left">
		<?php
		switch ($s){ 
		case 1:$tmpsubsql = "";break;
		case 2:$tmpsubsql = " grade>1 AND ";break;
		case 3:$tmpsubsql = " sex=1 AND ";break;
		case 4:$tmpsubsql = " sex=2 AND ";break;
		case 5:$tmpsubsql = " photo_s<>'' AND ";break;
		case 6:$tmpsubsql = " video_s<>'' AND ";break;
		}
		$Tfield = "id,username,nickname,grade,sex,birthday,love,kind,area1,area2,photo_s,video_s,heigh,weigh,house,car,edu,job,pay,ifphoto,ifbirthday,ifedu,iflove,ifpay,zhenghun_jingjia ";
		$tmpsql = "SELECT $Tfield FROM ".__TBL_MAIN__." WHERE kind=$k AND $tmpsubsql flag=1 ORDER BY zhenghun_jingjia DESC,logintime DESC LIMIT 500";
		$rt=$db->query($tmpsql);
		if ($db->num_rows($rt)){
			$total = $db->num_rows($rt);
			require_once YZLOVE.'sub/fundata.php';
			$data = new yzlove_data;
			require_once YZLOVE.'sub/classcool.php';
			$pagesize = 14;
			if ($p<1)$p=1;
			$mypage = new zeaipage($total,$pagesize);
			$pagelistX = $mypage->pagebar(2);
			$pagelist  = $mypage->pagebar();
			mysql_data_seek($rt,($p-1)*$pagesize);
		}
		?>
	 	<div class="title">
			<div class="<?php echo ($k==3)?'uTliSelect':'uTli'; ?>" title="����Ŀ�ģ���������"><a href="./?k=3">��������</a></div>
			<div class="<?php echo ($k==2)?'uTliSelect':'uTli'; ?>" title="����Ŀ�ģ�Լ�ύ��"><a href="./?k=2">Լ�ύ��</a></div>
			<div class="<?php echo ($k==4)?'uTliSelect':'uTli'; ?>" title="����Ŀ�ģ��쳾֪��"><a href="./?k=4">�쳾֪��</a></div>
			<div class="<?php echo ($k==5)?'uTliSelect':'uTli'; ?>" title="����Ŀ�ģ����̻���"><a href="./?k=5">���̻���</a></div>
			<div class="<?php echo ($k==1)?'uTliSelect':'uTli'; ?>" title="����Ŀ�ģ�������"><a href="./?k=1">��������</a></div>
			<div class="uTliBlank">Ĭ����ʾǰ500����Ա</div>
			<div class="uTliPage"><div class="Pl"></div><div class="Pr"><?php echo $pagelistX; ?></div></div>
		</div>
		<div class="titleline"></div>
		<div class="Ctop">
			<div class="L"><img src="../images/g_r_px.gif" align="absmiddle" /> ����ʽ��</div>
			<div class="M"><a href="./?k=<?php echo $k; ?>&s=1" title="Ĭ��������򣺾�������->��Ծ�̶�" <?php echo ($s==1)?'class=aselect':''; ?>>Ĭ������</a>��|��<a href="./?k=<?php echo $k; ?>&s=2"  <?php echo ($s==2)?'class=aselect':''; ?>>�߼���Ա</a>��|��<a href="./?k=<?php echo $k; ?>&s=3" <?php echo ($s==3)?'class=aselect':''; ?>>��ʿ</a>��|��<a href="./?k=<?php echo $k; ?>&s=4" <?php echo ($s==4)?'class=aselect':''; ?>>Ůʿ</a>��|��<a href="./?k=<?php echo $k; ?>&s=5" <?php echo ($s==5)?'class=aselect':''; ?>>����Ƭ</a>��|��<a href="./?k=<?php echo $k; ?>&s=6" <?php echo ($s==6)?'class=aselect':''; ?>>����Ƶ</a></div>
			<div class="R"><a href="search.php"><img src="../images/gdpx.gif" border="0" /></a></div>
		</div>
		<?php	
		if ($total > 0){
			for($i=1;$i<=$pagesize;$i++) {
				$rows = $db->fetch_array($rt);
				if(!$rows) break;
				$uid = $rows['id'];
				$id = $uid*7+8848;
				$username = badstr($rows['username']);
				$nickname = badstr($rows['nickname']);
				$grade = $rows['grade'];
				$sex = $rows['sex'];
				$birthday = $rows['birthday'];
				$love = $rows['love'];
				$kind = $rows['kind'];
				$area1 = $rows['area1'];
				$area2 = $rows['area2'];
				$photo_s = $rows['photo_s'];
				$video_s = $rows['video_s'];
				$heigh = $rows['heigh'];
				$weigh = $rows['weigh'];
				$house = $rows['house'];
				$car = $rows['car'];
				$edu = $rows['edu'];
				$job = $rows['job'];
				$pay = $rows['pay'];
				$ifphoto = $rows['ifphoto'];
				$ifbirthday = $rows['ifbirthday'];
				$ifedu = $rows['ifedu'];
				$iflove = $rows['iflove'];
				$ifpay = $rows['ifpay'];
				$zhenghun_jingjia = $rows['zhenghun_jingjia'];
				$tmpx = 0;
				if ($ifphoto == 1)$tmpx = $tmpx+1;
				if ($ifbirthday == 1)$tmpx = $tmpx+1;
				if ($ifedu == 1)$tmpx = $tmpx+1;
				if ($iflove == 1)$tmpx = $tmpx+1;
				if ($ifpay == 1)$tmpx = $tmpx+1;
				if ($i % 2 !=0){$tmpmargin=' margin_R';}else{$tmpmargin='';}
				if ($zhenghun_jingjia > 0){
					$href = '../bidderuser'.$id.'.html';
				} else {
					$href = $Global['home_2domain'].'/'.$uid;
				}
		?>
		<div class="box<?php echo $tmpmargin; ?>">
			<div class="LL"><a href=<?php echo $href; ?> target=_blank><?php if (empty($photo_s)){?><img src=../images/nopic<?php echo $sex; ?>.gif title="������Ƭ"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?> width="110" height="135" title="<?php echo $nickname.'����Ƭ';?>"><?php }?></a></div>
			<div class="RR">
				<div class="tt"><?php geticon($sex.$grade);echo '<a href='.$href.' target=_blank>'.$nickname.'</a> (<span>'.$username.'</span>)';
if ($tmpx > 0)echo '(';
echo '<a href='.$Global['my_2domain'].'/?k_sfz.php>';
for($x2=1;$x2<=$tmpx;$x2++) {
echo "<image src=../images/sfz_x.gif align=absmiddle vspace=5 title='ʵ����֤�Ǽ�����ǰ".$tmpx."�ǣ���5��'>";
}echo '</a>';if ($tmpx > 0)echo ')';
?></div>
				<div class="mm"><?php echo $data->getbirthday($birthday); ?>��<?php echo $data->getlove($love); ?>��<?php if ($heigh > 140)echo $heigh.'���ף�';?><?php if ($weigh > 20)echo $weigh.'���'; ?><?php echo $area1.$area2; ?>��<?php $tmphouse = $data->gethouse($house);if (!empty($tmphouse))echo $tmphouse.'��'; ?><?php $tmpcar = $data->getcar($car);if (!empty($tmpcar))echo $tmpcar.'��'; ?><?php $tmpedu = $data->getedu($edu);if (!empty($tmpedu))echo $tmpedu.'��'; ?><?php $tmppay = $data->getpay($pay);if (!empty($tmppay))echo $tmppay.'��'; ?><?php $tmpjob = $data->getjob($job);if (!empty($tmpjob))echo $tmpjob.'��'; ?>����Ŀ��Ϊ<?php echo $data->getkind($kind);?></div>
				<div class="bb"><a href=<?php echo $href; ?> target=_blank>+ �鿴��ϸ</a></div>
			</div>
		</div>
		<?php }} else {echo '<h6>������Ϣ</h6>';}?>
		<div class=clear></div>
		<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
	</div>
<!-- �Ҳ� -->
	<div class="right">
	  <div class="T margin5">
			<div class="li1">��������</div>
			<div class="li2"><a href="/my/?e_dating_add.php"></a></div>
			<div class="li3"><a href="/user/search.php"><img src="../images/g_r_detail.gif" border="0" /></a></div>
	  </div>
		<div class="C Csearch">
			<div class="form">
			<form action="searchlist.php" method="get" name="yzloveform">
			<input type="hidden" name="t" value="1" /><input name="k" type="text" class="Sinput" maxlength="50" onClick="javascript:yzloveform.k.value=''" value="���û���/�ǳ�����"> <input type="image" src="../images/sox.gif" align=absmiddle />
			</form>
			</div>
			<form method=get action="searchlist.php" name=myform>
			<div class="Sli">
				<div class="Sli1">��Ҫ��:</div>
				<div class="Sli2"><input type="radio" name="sex" id="sex1" value="1" />
			    <label for="sex1">������</label><input name="sex" id="sex2" type="radio" value="2" checked="checked" /><label for="sex2">Ů����</label></div>
			</div>
			<div class="Sli">
				<div class="Sli1">�ա�Ƭ:</div>
				<div class="Sli2"><input name="photo" id="photo" type="checkbox" value="1" checked="checked" /><label for="photo">����Ƭ</label><script language="javascript" type="text/javascript">
cityArray = new Array();
cityArray[0] = new Array("����","����|����|����|����|����|��̨|ʯ��ɽ|����|��ͷ��|��ɽ|ͨ��|˳��|��ƽ|����|ƽ��|����|����|����");
cityArray[1] = new Array("�Ϻ�","����|¬��|���|����|����|����|բ��|���|����|����|��ɽ|�ζ�|�ֶ�|��ɽ|�ɽ�|����|�ϻ�|����|����");
cityArray[2] = new Array("���","��ƽ|����|�Ӷ�|����|����|����|�Ͽ�|����|�ӱ�|����|����|����|����|���|����|����|����|����");
cityArray[3] = new Array("����","����|����|����|��ɿ�|����|ɳƺ��|������|�ϰ�|����|��ʢ|˫��|�山|����|ǭ��|����|�뽭|����|ͭ�� |����|�ٲ�|��ɽ|��ƽ|�ǿ�|�ᶼ|�潭|��¡|����|����|����|���|��ɽ|��Ϫ|ʯ��|��ɽ|����|��ˮ|����|�ϴ�|����|�ϴ�");
cityArray[4] = new Array("�ӱ�","ʯ��ׯ|����|��̨|����|�żҿ�|�е�|�ȷ�|��ɽ|�ػʵ�|����|��ˮ");
cityArray[5] = new Array("ɽ��","̫ԭ|��ͬ|��Ȫ|����|����|˷��|����|����|����|�ٷ�|�˳�");
cityArray[6] = new Array("���ɹ�","���ͺ���|��ͷ|�ں�|���|���ױ�����|��������|����ľ��|�˰���|�����첼��|���ֹ�����|�����׶���|��������");
cityArray[7] = new Array("����","����|����|��ɽ|��˳|��Ϫ|����|����|Ӫ��|����|����|�̽�|����|����|��«��");
cityArray[8] = new Array("����","����|����|��ƽ|��Դ|ͨ��|��ɽ|��ԭ|�׳�|�ӱ�");
cityArray[9] = new Array("������","������|�������|ĵ����|��ľ˹|����|�绯|�׸�|����|�ں�|˫Ѽɽ|����|��̨��|���˰���");
cityArray[10] = new Array("����","����|����|����|����|��Ӧ|�Ͼ�|��|����|��ͨ|����|�γ�|����|���Ƹ�|����|����|��Ǩ|̩��|����");
cityArray[11] = new Array("�㽭","����|����|����|����|����|����|��|����|��ɽ|̨��|��ˮ");
cityArray[12] = new Array("����","�Ϸ�|�ߺ�|����|��ɽ|����|ͭ��|����|��ɽ|����|����|����|����|����|����|����|����|����");
cityArray[13] = new Array("����","����|����|����|����|Ȫ��|����|��ƽ|����|����");
cityArray[14] = new Array("����","�ϲ�|������|�Ž�|ӥ̶|Ƽ��|����|����|����|�˴�|����|����");
cityArray[15] = new Array("ɽ��","����|�ൺ|�Ͳ�|��ׯ|��Ӫ|��̨|Ϋ��|����|̩��|����|����|����|����|����|�ĳ�|����|����");
cityArray[16] = new Array("����","֣��|����|����|ƽ��ɽ|����|�ױ�|����|����|���|���|���|����Ͽ|����|����|����|�ܿ�|פ���|��Դ");
cityArray[17] = new Array("����","�人|�˲�|����|�差|��ʯ|����|�Ƹ�|ʮ��|��ʩ|Ǳ��|����|����|����|����|Т��|����");
cityArray[18] = new Array("����","��ɳ|����|����|��̶|����|����|����|����|¦��|����|����|����|����|�żҽ�");
cityArray[19] = new Array("�㶫","����|����|�麣|��ͷ|��ݸ|��ɽ|��ɽ|�ع�|����|տ��|ï��|����|����|÷��|��β|��Դ|����|��Զ|����|����|�Ƹ�");
cityArray[20] = new Array("����","����|����|����|����|����|���Ǹ�|����|���|����|��������|���ݵ���|����|��ɫ|�ӳ�");
cityArray[21] = new Array("����","����|����");
cityArray[22] = new Array("�Ĵ�","�ɶ�|����|����|�Թ�|��֦��|��Ԫ|�ڽ�|��ɽ|�ϳ�|�˱�|�㰲|�ﴨ|�Ű�|üɽ|����|��ɽ|����");
cityArray[23] = new Array("����","����|����ˮ|����|��˳|ͭ��|ǭ����|�Ͻ�|ǭ����|ǭ��");
cityArray[24] = new Array("����","����|����|����|��Ϫ|��ͨ|����|���|��ɽ|˼é|��˫����|��ɽ|�º�|����|ŭ��|����|�ٲ�");
cityArray[25] = new Array("����","����|�տ���|ɽ��|��֥|����|����|����");
cityArray[26] = new Array("����","����|����|����|ͭ��|μ��|�Ӱ�|����|����|����|����");
cityArray[27] = new Array("����","����|������|���|����|��ˮ|��Ȫ|��Ҵ|����|����|¤��|ƽ��|����|����|����");
cityArray[28] = new Array("����","����|ʯ��ɽ|����|��ԭ");
cityArray[29] = new Array("�ຣ","����|����|����|����|����|����|����|����");
cityArray[30] = new Array("�½�","��³ľ��|ʯ����|��������|����|��������|����|�������տ¶�����|��������|��³��|����|��ʲ|����|������");
cityArray[31] = new Array("���","����ر�������");
cityArray[32] = new Array("����","�����ر�������");
cityArray[33] = new Array("̨��","̨��|����|̨��|̨��|����|��Ͷ|����|����|�û�|����|����|����|��԰|����|��¡|̨��|����|����|���");
cityArray[34] = new Array("����","����");
function getCity(currProvince){
var currProvince = currProvince;
var i,j,k;
document.getElementsByTagName("*").selCity.length = 0 ;
for (i = 0 ;i <cityArray.length;i++){  
if(cityArray[i][0]==currProvince){  
tmpcityArray = cityArray[i][1].split("|")
for(j=0;j<tmpcityArray.length;j++){
document.getElementsByTagName("*").selCity.options[document.getElementsByTagName("*").selCity.length] = new Option(tmpcityArray[j],tmpcityArray[j]);

}}}}
</script></div>
			</div>
			<div class="Sli">
				<div class="Sli1">�ء���:</div>
				<div class="Sli2">
			    <select id="selProvince" name='province' onChange = "getCity(this.options[this.selectedIndex].value)">
<option value="">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�Ϻ�">�Ϻ�</option>
<option value="���">���</option>
<option value="����">����</option>
<option value="�ӱ�">�ӱ�</option>
<option value="ɽ��">ɽ��</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�㽭">�㽭</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="ɽ��">ɽ��</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�㶫">�㶫</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�Ĵ�">�Ĵ�</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�ຣ">�ຣ</option>
<option value="�½�">�½�</option>
<option value="���ɹ�">���ɹ�</option>
<option value="������">������</option>
<option value="���">���</option>
<option value="����">����</option>
<option value="̨��">̨��</option>
<option value="����">����</option>
</select><select id="selCity" name='city' style="width:62px">
<option>����</option>
</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">�ꡡ��:</div>
				<div class="Sli2"><select name="birthday1" style="width:50px"><option value="">����</option><?php for($i=18;$i<=75;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> �� <select name="birthday2" style="width:50px"><option value="">����</option><?php for($i=18;$i<=75;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> ��</div>
			</div>
			<div class="Sli">
				<div class="Sli1">����:</div>
				<div class="Sli2"><select name="heigh1" style="width:50px"><option value="">����</option><?php for($i=140;$i<=200;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> �� <select name="heigh2" style="width:50px"><option value="">����</option><?php for($i=140;$i<=200;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> ����(cm)</div>
			</div>
			<div class="Sli">
				<div class="Sli1">�塡��:</div>
				<div class="Sli2"><select name="weigh1" style="width:50px"><option value="">����</option><?php for($i=30;$i<=100;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> �� <select name="weigh2" style="width:50px"><option value="">����</option><?php for($i=30;$i<=100;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> ����</div>
			</div>
			<div class="Sli">
				<div class="Sli1">ѧ����:</div>
				<div class="Sli2">
			    <select name="edu" style="width:124px">
                <option value="">����</option>
                <option value="1">���м�����</option>
                <option value="2">���л���ר������</option>
                <option value="3">��ר������</option>
                <option value="4">���Ƽ�����</option>
                <option value="5">˶ʿ������</option>
                <option value="6">��ʿ������</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">�顡��:</div>
				<div class="Sli2">
			    <select name="love" style="width:124px">
                <option value="">����</option>
                <option value="1">δ��</option>
                <option value="2">�ѻ�</option>
                <option value="3">��������Ů</option>
                <option value="4">��������Ů</option>
                <option value="5">ɥż����Ů</option>
                <option value="6">ɥż����Ů</option>
                <option value="7">����</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">ְ��ҵ:</div>
				<div class="Sli2">
			    <select name="job" style="width:124px">
                <option value="">����</option>
                <option value="1">��ҵ������Ա</option>
                <option value="2">ר��/����</option>
                <option value="3">����/������Ա</option>
                <option value="4">�г�/������Ա</option>
                <option value="5">������Ա/��ְ����</option>
                <option value="6">��ְͨԱ</option>
                <option value="7">���ظɲ�/������Ա</option>
                <option value="8">������/��Ա</option>
                <option value="9">��ʦ</option>
                <option value="10">����</option>
                <option value="11">ũ��</option>
                <option value="12">����</option>
                <option value="13">ѧ��</option>
                <option value="14">����ְҵ��</option>
                <option value="15">��/������Ա</option>
                <option value="16">ʧҵ/��ҵ</option>
                <option value="17">����</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">�ա���:</div>
				<div class="Sli2">
				<select name="pay" style="width:124px">
				<option value="">����</option>
				<option value="1">600Ԫ����</option>
				<option value="2">600-799Ԫ</option>
				<option value="3">800-999Ԫ</option>
				<option value="4">1000-1499Ԫ</option>
				<option value="5">1500-1999Ԫ</option>
				<option value="6">2000-2999Ԫ</option>
				<option value="7">3000-3999Ԫ</option>
				<option value="8">4000-4999Ԫ</option>
				<option value="9">5000-5999Ԫ</option>
				<option value="10">6000-6999Ԫ</option>
				<option value="11">7000-9999Ԫ</option>
				<option value="12">10000-19999Ԫ</option>
				<option value="13">20000Ԫ����</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">ס����:</div>
				<div class="Sli2">
			    <select name=house style="width:124px">
                <option value="">����</option>
                <option value="1">�л鷿</option>
                <option value="2">����������</option>
                <option value="3">�޻鷿</option>
                <option value="4">�޻鷿���ɽ��</option>
                <option value="5">�޻鷿ϣ���Է����</option>
                <option value="6">�޻鷿ϣ��˫�����</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">Ŀ����:</div>
				<div class="Sli2">
				<select name="kind" style="width:124px">
				<option value="">����</option>
				<option value="1">������</option>
				<option value="2">Լ�ύ��</option>
				<option value="3">��������</option>
				<option value="4">��������</option>
				<option value="5">���̻���</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1"></div>
				<div class="Sli2" style="padding:5px 0 0 0"><input type="image" src="../images/so.gif"></div>
			</div>
			</form>
		</div>
  </div>
</div>
<div class="clear"></div>









<?php require_once YZLOVE.'bottom.php';?>
