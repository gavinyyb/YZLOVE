<?php require_once '../sub/init.php';$navvar = 6;
if ( (!preg_match("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
require_once YZLOVE.'sub/conn.php';
$t=!preg_match("^[0-7]{1}$",$t)?0:$t;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>Լ�� ˽��Լ����</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(../images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(../images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:258px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliPage{float:left;width:212px;height:26px;text-align:right}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(../images/titleline.gif)}
.title .uTliPage .Sinput{width:154px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.main .left{float:left;width:732px;padding:5px;border:#ccc 1px solid}/* 744px */
.main .center{float:left;width:24px;height:440px;background-image:url(images/centerbg.gif);background-repeat:no-repeat}/* 24px */
.main .right{float:left;width:200px;height:440px;padding:5px;border:#ccc 1px solid}/* 212px */
.main .right .rbox{width:200px;height:419px;background-image:url(images/rightbg.gif);color:#666;padding:25px 0 0 0}
.main .right .rbox .Sli {width:200px;height:30px;color:#666}
.Sli1,.Sli2{float:left;height:30px}
.main .right .rbox .Sli .Sli1{width:84px;height:27px;text-align:right;padding:3px 5px 0 0;color:#FF3399}
.main .right .rbox .Sli .Sli2{width:111px;text-align:left;overflow:hidden}
.main .right .rbox .Sli .Sli2 select{width:85px}
.main .right .rbox .BB1 {width:200px;height:50px;padding:40px 0 0 0}
.main .right .rbox .BB2 {width:200px;height:40px;line-height:25px}
.main .right .rbox .BB2 a{text-decoration:underline;color:#f39}
.main .right .rbox .BB2 a:hover{color:#6F9F00}
.main .left .hr{width:710px;height:1px;margin:0px auto;font-size:0;overflow:hidden;background:#ddd;margin-top:10px;margin-bottom:10px;}
.main .left .ul{width:710px;min-height:135px;color:#444;margin:0px auto}/* height:135px; */
.DL,.DC,.DR{float:left}
.main .left .ul .DL{width:110px;height:135px;margin:0 10px 0 0;background:#fff;border:#ddd 1px solid;padding:2px}
.main .left .ul .DL img{width:110px;height:135px}
.main .left .ul .DC{width:460px;margin:0 10px 0 0}
.main .left .ul .DR{width:110px;height:135px;background-image:url(images/datebg.gif)}
.DC dl{text-align:left;font-family:Verdana}
.DC dl dd{line-height:22px}
.DC dl dt{height:22px;color:#666;font-weight:bold}
.DC dl dt a{color:#DF2C91;text-decoration:underline}
.DC dl dt a:hover{color:#6F9F00}
.DC dl dd a{text-decoration:underline}
.DC dl dt .red{color:#6F9F00}
.DC dl dd span{float:left;width:60px;text-align:right;padding:0 5px 0 0;color:#666}
.DC dl dd em{float:left;width:395px;color:#666}
.DR h1,.DR h2,.DR h3,.DR h4{display:block;font-weight:normal;color:#666;font-size:12px;font-family:Verdana}
.DR h1{height:30px;line-height:30px;margin:15px 0 0 0}
.DR h2{height:20px;line-height:20px}
.DR h3{height:24px;line-height:24px}
.DR h4{height:20px;margin:5px 0 0 0}
.DR h1 span{font-family:Verdana;color:#DF2C91;font-size:18px;font-weight:bold}
.DR h1 p{font-family:Verdana;color:#DF2C91;font-size:11px;font-weight:bold;display:inline}
.DR a{font-family:Verdana;text-decoration:underline;color:#DF2C91;font-size:11px;}
.DR a:hover{color:#6F9F00}
a.sex1{color:#06c}
a.sex2{color:#FF5494}
.main .left .page{width:710px;height:20px;padding:20px 0 0 0;margin:0px auto;margin:0 0 30px 0;text-align:right}
.main .left .page .Pl{float:left}
.main .left .page .Pr{float:right}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="title">
	<div class="<?php echo ($t==0 || $t==6 || $t==7)?'uTliSelect':'uTli'; ?>"><a href="./">Լ��1+1</a></div>
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="./?t=1">�Ȳ�С��</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="./?t=2">�������</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTli'; ?>"><a href="./?t=3">��Լ����</a></div>
	<div class="<?php echo ($t==4)?'uTliSelect':'uTli'; ?>"><a href="./?t=4">����Ӱ</a></div>
	<div class="<?php echo ($t==5)?'uTliSelect':'uTli'; ?>"><a href="./?t=5">����K��</a></div>
	<div class="uTliBlank">����Լ������(֧��ģ����ѯ)��</div>
	<div class="uTliPage">
	<script language="javascript">
		function chk(){
			if(document.yzloveform.k.value==""){
			alert('������Լ������!');
			document.yzloveform.k.focus();
			return false;
			}
		}
	</script>
	<form action="./" method="get" name=yzloveform onsubmit="return chk()"><input name="k" type="text" class="Sinput" maxlength="20"><input type="image" src="../images/sox.gif" align=absmiddle /><input type="hidden" name="t" value="6" /></form>
	</div>
</div>
<div class="titleline"></div>
<div class=clear></div>
<br style="line-height:0"/>
<div class="main">
	<div class="left">
		<img src="images/bnr.jpg" />
<!--loop start -->
		<?php 
		switch ($t){ 
			case 1:$tmpsubsql = " a.kind=1 AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 2:$tmpsubsql = " a.kind=2 AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 3:$tmpsubsql = " a.kind=3 AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 4:$tmpsubsql = " a.kind=4 AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 5:$tmpsubsql = " a.kind=5 AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 6:$k  = trimm($k);$tmpsubsql = " a.title LIKE '%".$k."%' AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 7:
			$tmpsubsql = '';
			$tmpsubsql .= preg_match("^[1-2]{1}$",$Ssex)?" b.sex=$Ssex AND ":'';
			if (preg_match("^[1-3]{1}$",$Syhtime)){
			if ($Syhtime == 1){
			$Syhtime = $Syhtime*86400*3;
			} elseif ($Syhtime == 2){
			$Syhtime = $Syhtime*86400*7;
			} elseif ($Syhtime == 3){
			$Syhtime = $Syhtime*86400*30;
			}
			$tmpsubsql .= " (a.yhtime - unix_timestamp()) <= $Syhtime AND ";
			}
			$tmpsubsql .= preg_match("^[1-5]{1}$",$Skind)?" a.kind=$Skind AND ":'';
			if (!empty($province) && !empty($city))$tmpsubsql .= " a.area1='$province' AND a.area2='$city' AND ";
			$tmpsubsql .= preg_match("^[1-4]{1}$",$Sprice)?" a.price=$Sprice AND ":'';
			$tmpsubsql .= preg_match("^[1-3]{1}$",$Smaidian)?" a.maidian=$Smaidian AND ":'';
			$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";
			break;
			default:$tmpsubsql = "";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
		}
		$rt=$db->query("SELECT a.id,a.userid,a.kind,a.title,a.area1,a.area2,a.price,a.yhtime,a.maidian,a.sex as sex2,a.birthday1,a.birthday2,a.heigh1,a.heigh2,a.love,a.edu,a.area3,a.area4,a.bmnum,a.click,a.flag,a.jjloveb,b.nickname,b.grade,b.sex,b.photo_s FROM ".__TBL_DATING__." a,".__TBL_MAIN__." b WHERE $tmpsubsql a.flag>0 AND a.userid=b.id AND b.flag=1 $tmpsort");
		if (!$db->num_rows($rt)){
			echo '<h6>������Ϣ</h6>';
		} else {
			$total = $db->num_rows($rt);
			require_once YZLOVE.'sub/classcool.php';
			$pagesize = 10;
			if ($p<1)$p=1;
			$mypage = new zeaipage($total,$pagesize);
			$pagelist  = $mypage->pagebar();
			mysql_data_seek($rt,($p-1)*$pagesize);
			for($i=1;$i<=$pagesize;$i++) {
				$rows = $db->fetch_array($rt);
				if(!$rows) break;
				$id = $rows[0];
				$userid = $rows[1];
				$kind = $rows[2];
				$title = badstr(stripslashes($rows[3]));
				$title = htmlout($title);
				if ($t == 6 && !empty($k))$title = str_replace($k,"<span class=red>".$k."</span>",$title);
				$area1 = $rows[4];
				$area2 = $rows[5];
				$price = $rows[6];
				$yhtime = $rows[7];
				$maidian = $rows[8];
				$sex2 = $rows[9];
				$birthday1 = $rows[10];
				$birthday2 = $rows[11];
				$heigh1 = $rows[12];
				$heigh2 = $rows[13];
				$love = $rows[14];
				$edu = $rows[15];
				$area3 = $rows[16];
				$area4 = $rows[17];
				$bmnum = $rows[18];
				$click = $rows[19];
				$flag = $rows[20];
				$jjloveb = $rows[21];
				$grade = $rows[23];
				$sex = $rows[24];
				$photo_s = $rows[25];
				$uhref = $Global['home_2domain']."/$userid";
				$nickname = "<a href=".$Global['home_2domain']."/$userid target=_blank class=sex$sex>".badstr($rows[22])."</a>";
				if ($flag == 1){
					$d1  = strtotime("now");
					$d2  = $yhtime;
					$totals  = ($d2-$d1);
					$day     = intval( $totals/86400 );
					$hour    = intval(($totals % 86400)/3600);
					$hourmod = ($totals % 86400)/3600 - $hour;
					$minute  = intval($hourmod*60);
					if (($totals) > 0) {
					if ($day > 0){
					$outtime = "��������<span>$day</span>��";
					} else {
					$outtime = "����<p>$hour</p>Сʱ<p>$minute</p> ��";
					}
					} else {
					$outtime = "Լ���ѽ���";
					}
					$did = $id*7+8848;
					if ($jjloveb > 0){
						$href = '../bidderdating'.$did.'.html';
					} else {
						$href = $Global['home_2domain']."/dating$id.html";
					}
				} else {
					$outtime = "Լ���ѽ���";
					$href = $Global['home_2domain']."/dating$id.html";
				}
		?>
		<div class="ul">
 			<div class="DL"><a href=<?php echo $uhref; ?> target=_blank><?php if (empty($photo_s)){?><img src=../images/nopic<?php echo $sex; ?>.gif title="������Ƭ"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?>><?php }?></a></div>
			<div class="DC">
				<dl>
					<dt>Լ�����⣺<a href="<?php echo $href; ?>" target=_blank><?php echo $title; ?></a></dt>
					<dd style="line-height:normal"><span>�� �� ��:</span><em><?php geticon($sex.$grade);?><?php echo $nickname; ?></em></dd>
					<dd><span>Լ��ʱ��:</span><em><?php echo date_format2($yhtime,'%Y��%m��%d�� %Hʱ%M��').' '.getweek(date_format2($yhtime,'%Y-%m-%d'));?></em></dd>
					<dd><span>Լ�����:</span><em><?php echo $area1.$area2 ?></em></dd>
					<dd><span>����Ԥ��:</span><em><?php
	switch ($price){ 
	case 1:echo "100Ԫ����";break;
	case 2:echo "100��300Ԫ";break;
	case 3:echo "300--500Ԫ";break;
	case 4:echo "500Ԫ����";break;
	default :echo "Լ����ò���";break;
	}?>  <?php
	switch ($maidian){ 
	case 1:echo "������";break;
	case 2:echo "ӦԼ����";break;
	case 3:echo "AA��";break;
	default :echo "˭������ν";break;
	}?></em></dd>
					<dd><span>Լ�����:</span><em><?php if ($sex2==0){echo '�Ա���';}elseif ($sex2 == 1){echo '����';}else{echo 'Ů��';} ?>��<?php if (!empty($birthday1) && !empty($birthday2)){echo $birthday1.'-'.$birthday2.'��';}else{echo '���䲻��';} ?>��<?php echo $area3.$area4; ?>�����<?php if (!empty($heigh1) && !empty($heigh2)){echo $heigh1.'-'.$heigh2.'����(cm)';}else{echo '����';} ?>��<?php
	switch ($love){ 
	case 1:echo "δ��";break;
	case 2:echo "�ѻ�";break;
	case 3:echo "��������Ů";break;
	case 4:echo "��������Ů";break;
	case 5:echo "ɥż����Ů";break;
	case 6:echo "ɥż����Ů";break;
	case 7:echo "��������";break;
	default :echo "��������";break;
	}?>��<?php
	switch ($edu){ 
	case 1:echo "���м�����";break;
	case 2:echo "���л���ר������";break;
	case 3:echo "��ר������";break;
	case 4:echo "���Ƽ�����";break;
	case 5:echo "˶ʿ������";break;
	case 6:echo "��ʿ������";break;
	default:echo "ѧ������";break;
	}?></em></dd>
				</dl>
			</div>
			<div class="DR">
				<h1><?php echo $outtime; ?></h1>
				<h2>��<a href="<?php echo $href; ?>" target=_blank><?php echo $bmnum ?></a>����ϵTA</h2>
				<h3>��<a href="<?php echo $href; ?>" target=_blank><?php echo $click ?></a>�˹�עTA</h3>
				<h4><a href="<?php echo $href; ?>" target=_blank><img src="images/detail.gif" /></a></h4>
			</div>
		</div>
		<div class="clear"></div>
		<div class="hr"></div>
		<?php }?>
		<div class=clear></div>
		<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
		<?php }?>
<!--loop end -->		
	</div>
	<div class="center"></div>
	<div class="right">
	<form method=get action="./" name=myform>
		<div class="rbox">
			<div class="Sli">
				<div class="Sli1">Լ�ᷢ����:</div>
				<div class="Sli2"><select name="Ssex">
					<option value="0"<?php echo (empty($Ssex))?'selected':''; ?>>�Ա���</option>
					<option value="1"<?php echo ($Ssex == 1)?'selected':''; ?>>����</option>
					<option value="2"<?php echo ($Ssex == 2)?'selected':''; ?>>Ů��</option>
					</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">Լ��ʱ��:</div>
				<div class="Sli2">
					<select name="Syhtime">
					<option value="0"<?php echo (empty($Syhtime))?'selected':''; ?>>����</option>
					<option value="1"<?php echo ($Syhtime == 1)?'selected':''; ?>>3����</option>
					<option value="2"<?php echo ($Syhtime == 2)?'selected':''; ?>>1����</option>
					<option value="3"<?php echo ($Syhtime == 3)?'selected':''; ?>>1����</option>
					</select><script language="javascript" type="text/javascript">
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
</script>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">Լ������:</div>
				<div class="Sli2">
					<select name="Skind">
					<option value="0"<?php echo (empty($Skind))?'selected':''; ?>>����</option>
					<option value="1"<?php echo ($Skind == 1)?'selected':''; ?>>�Ȳ�С��</option>
					<option value="2"<?php echo ($Skind == 2)?'selected':''; ?>>�������</option>
					<option value="3"<?php echo ($Skind == 3)?'selected':''; ?>>��Լ����</option>
					<option value="4"<?php echo ($Skind == 4)?'selected':''; ?>>����Ӱ</option>
					<option value="5"<?php echo ($Skind == 5)?'selected':''; ?>>����K��</option>
					</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">Լ�����:</div>
				<div class="Sli2">
					<select id="selProvince" name='province' onChange = "getCity(this.options[this.selectedIndex].value)">
<option value="">����</option>
<option value="����"<?php echo ($province == '����')?'selected':''; ?>>����</option>
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
</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1"></div>
				<div class="Sli2">
					<select id="selCity" name='city'>
					<option>����</option>
					</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">����Ԥ��:</div>
				<div class="Sli2">
					<select name="Sprice">
					<option value="0"<?php echo (empty($Sprice))?'selected':''; ?>>����</option>
					<option value="1"<?php echo ($Sprice == 1)?'selected':''; ?>>100Ԫ����</option>
					<option value="2"<?php echo ($Sprice == 2)?'selected':''; ?>>100--300Ԫ</option>
					<option value="3"<?php echo ($Sprice == 3)?'selected':''; ?>>300--500Ԫ</option>
					<option value="4"<?php echo ($Sprice == 4)?'selected':''; ?>>500Ԫ����</option>
					</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">˭����:</div>
				<div class="Sli2">
					<select name="Smaidian"> 
					<option value=0<?php echo (empty($Smaidian))?'selected':''; ?>>����</option>
					<option value=1<?php echo ($Smaidian == 1)?'selected':''; ?>>����</option>
					<option value=2<?php echo ($Smaidian == 2)?'selected':''; ?>>ӦԼ����</option>
					<option value=3<?php echo ($Smaidian == 3)?'selected':''; ?>>AA��</option>
					</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1"><input type="hidden" name="t" value="7" /></div>
				<div class="Sli2" style="padding:5px 0 0 0"><input type="image" src="images/so.gif"></div>
			</div>
			<div class="BB1"><a href="../my/?e_dating_add.php"><img src="images/fb.gif" border="0" /></a></div>
			<div class="BB2"><a href="../my/?e_dating_list.php">�ҷ�����Լ��</a><br><a href="../my/?e_dating_join.php">�Ҳμӵ�Լ��</a></div>
		</div>
	</form>
	</div>
	
	
	
</div>
<div class=clear></div>
<br style="line-height:1"/>
<div class=clear></div>
<?php require_once YZLOVE.'bottom.php';
function getweek($date) {
$dateArr = explode("-", $date);
$weeknum = date("w", mktime(0,0,0,$dateArr[1],$dateArr[2],$dateArr[0]));
switch ($weeknum){
case 0:$xingqi='������';break;
case 1:$xingqi='����һ';break;
case 2:$xingqi='���ڶ�';break;
case 3:$xingqi='������';break;
case 4:$xingqi='������';break;
case 5:$xingqi='������';break;
case 6:$xingqi='������';break;
}return $xingqi;}
?>
