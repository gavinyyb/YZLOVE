<?php require_once '../sub/init.php';$navvar = 9;
if ( (!preg_match("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
require_once YZLOVE.'sub/conn.php';
$t=!preg_match("^[0-4]{1}$",$t)?0:$t;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>��в��� �����ռ�</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect,.uTliK{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(../images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(../images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:343px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliPage{float:left;width:212px;height:26px;text-align:right}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(../images/titleline.gif)}
.title .uTliPage .Sinput{width:154px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.main .left{float:left;width:732px;padding:5px;border:#ccc 1px solid;background-image:url(images/bnr.jpg);background-repeat:no-repeat}/* 744px */
.main .center{float:left;width:24px;height:440px;background-image:url(images/centerbg.gif);background-repeat:no-repeat}/* 24px */

.main .right{float:left;width:200px;height:440px;padding:5px;border:#ccc 1px solid}/* 212px */
.main .right .rbox{width:200px;height:440px;background-image:url(images/rightbg.gif);color:#666}
.main .right .rbox .rb1{width:200px;height:32px;padding:35px 0 0 0}
.main .right .rbox .rb2{width:200px;height:90px;line-height:28px;padding:20px 0 0 0}
.main .right .rbox .rb3{width:160px;height:120px;line-height:28px;padding:10px 20px 0 20px;text-align:left;color:#99825e}

.main .right .rbox .rb2 a,.rb3 a{text-decoration:underline;color:#f39}
.main .right .rbox .rb2 a:hover,.rb3 a:hover{color:#f60}
.rb3 a{font-weight:bold}

.main .left .bnrbox{width:732px;height:100px}
.main .left .ul{width:710px;height:36px;border-bottom:#efefef 1px solid;color:#999;margin:0px auto;font-family:Verdana,����}
.li1,.li2,.li3,.li4,.li5{float:left;height:36px}
.main .left .ul .li1{width:24px;height:30px;padding:6px 0 0 0}
.main .left .ul .li2{width:316px;height:25px;padding:11px 0 0 5px;text-align:left}
.main .left .ul .li3{width:140px;line-height:36px}
.main .left .ul .li4{width:140px;height:26px;padding:10px 0 0 0}
.main .left .ul .li5{width:85px;height:25px;padding:11px 0 0 0;}

.main .left .ul .li2 a{font-size:14px}
.main .left .ul .li2 .red{color:#f00;font-weight:bold;font-family:Verdana,����;font-size:14px}
.main .left .ul .li3 a{color:#666}
.main .left .ul .li3 a:hover{color:#DF2C91}


.main .left .ul:hover{background:#FAF9F7}
.main .left .ul span{color:#f00;font-family:Verdana;font-size:11px}
.main .left .ul .titlee{padding:0px;line-height:36px;color:#666;text-align:center}
.main .left .ul .paddingL5{padding-left:5px}

.main .left .page{width:710px;height:20px;padding:20px 0 0 0;margin:0px auto;margin:0 0 30px 0;text-align:right}
.main .left .page .Pl{float:left}
.main .left .page .Pr{float:right}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="title">
	<div class="<?php echo ($t==0)?'uTliSelect':'uTli'; ?>"><a href="./?t=0">�����ռ�</a></div>
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="./?t=1">��Ʒ�ռ�</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="./?t=2">�����ռ�</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTli'; ?>"><a href="./?t=3">�ȵ��ռ�</a></div>
	<div class="<?php echo ($t==4)?'uTliSelect':'uTliK'; ?>"><?php echo ($t==4)?'�������':''; ?></div>
	<div class="uTliBlank"><--- Ĭ����ʾǰ500ƪ�ռǡ�|�������ռǱ���(֧��ģ����ѯ)��</div>
	<div class="uTliPage">
	<script language="javascript">
		function chk(){
			if(document.yzloveform.k.value==""){
			alert('�������ռǱ��⣡');
			document.yzloveform.k.focus();
			return false;
			}
		}
	</script>
	<form action="./" method="get" name=yzloveform onsubmit="return chk()"><input name="k" type="text" class="Sinput" maxlength="20"><input type="image" src="../images/sox.gif" align=absmiddle /><input type="hidden" name="t" value="4" /></form>
	</div>
</div>
<div class="titleline"></div>
<div class=clear></div>
<br style="line-height:0"/>
<div class="main">
	<div class="left">
		<div class="bnrbox"></div>
		<div class="ul">
			<div class="li1"></div>
			<div class="li2 titlee paddingL5">�ա��ǡ��ꡡ��</div>
			<div class="li3 titlee">������</div>
			<div class="li4 titlee">�� �� �� ��</div>
			<div class="li5 titlee">���� / ����</div>
		</div>
		<?php
		switch ($t){ 
			case 1:
				$tmpsubsql = " a.ifjh=1 AND ";
				$tmpsort   = " ORDER BY a.id DESC";
			break;
			case 2:
				$tmpsubsql = "";
				$tmpsort   = " ORDER BY a.hfnum DESC";
			break;
			case 3:
				$tmpsubsql = "";
				$tmpsort   = " ORDER BY a.click DESC";
			break;
			case 4:
				$k  = trimm($k);
				$tmpsubsql = " a.title LIKE '%".$k."%' AND ";
				$tmpsort   = " ORDER BY a.id DESC";
			break;
			default:
				$tmpsubsql = "";
				$tmpsort   = " ORDER BY a.id DESC";
			break;
		}
		$rt=$db->query("SELECT a.id,a.userid,a.weather,a.feel,a.title,a.ifjh,a.click,a.hfnum,a.stime,b.nickname,b.grade,b.sex FROM ".__TBL_DIARY__." a,".__TBL_MAIN__." b WHERE $tmpsubsql a.flag=1 AND a.diaryopen=1 AND a.userid=b.id AND b.flag=1 $tmpsort LIMIT 500");
		if (!$db->num_rows($rt)){
			echo '<h6>������Ϣ</h6>';
		} else {
			$total = $db->num_rows($rt);
			require_once YZLOVE.'sub/classcool.php';
			$pagesize = 15;
			if ($p<1)$p=1;
			$mypage = new zeaipage($total,$pagesize);
			$pagelist  = $mypage->pagebar();
			mysql_data_seek($rt,($p-1)*$pagesize);
			for($i=1;$i<=$pagesize;$i++) {
				$rows = $db->fetch_array($rt);
				if(!$rows) break;
				$id = $rows['id'];
				$sex = $rows['sex'];
				$title = badstr($rows['title']);
				$title = gylsubstr($title,40);
				if ($t == 4 && !empty($k))$title = str_replace($k,"<span class=red>".$k."</span>",stripslashes($title));
				$userid = $rows['userid'];
				$click = $rows['click'];
				$hfnum = $rows['hfnum'];
				$ifjh = $rows['ifjh'];
				$grade = $rows['grade'];
				$stime = $rows['stime'];
				$stime = date_format2($stime,'%m��%d�� %H:%M').' '.getweek(date_format2($stime,'%Y-%m-%d'));
				$title    = "<a href=".$Global['home_2domain']."/diary$id.html target=_blank>".$title.'</a>';
				$nickname = "<a href=".$Global['home_2domain']."/$userid target=_blank>".badstr($rows['nickname'])."</a>";
				if ($ifjh==1)$title=$title." <img src=images/j.gif align=absmiddle title=��Ʒ�ռ� />";
		?>
		<div class="ul">
			<div class="li1"><img src="images/pen.gif" /></div>
			<div class="li2"><?php echo $title; ?></div>
			<div class="li3"><?php geticon($sex.$grade);?><?php echo $nickname; ?></div>
			<div class="li4"><?php echo $stime; ?></div>
			<div class="li5"><span><?php echo $hfnum; ?></span> / <span><?php echo $click; ?></span></div>
		</div>
		<?php }?>
		<div class=clear></div>
		<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
		<?php }?>
	</div>
	<div class="center"></div>
	<div class="right">
		<div class="rbox">
			<div class="rb1"><a href="../my/?f_diary.php?submitok=add"><img src="images/fb.gif" /></a></div>
			<div class="rb2">
				<a href="../my/?f_diary.php?submitok=list">�ҷ�������ռ�</a><br />
				<a href="../my/?f_diary_bbsed.php">�����۹����ռ�</a><br />
				<a href="../my/?f_diary_favorite.php">���ղع����ռ�</a><br />
			</div>
			<div class="rb3">����¼ÿһ�����������顣�޹��Ĳɣ��������ġ��ں������ˣ��������ÿһ�춼�ڳ�ʲô����ʲô������˯��������ô�򵥡������ռǣ��öԷ����˽�����������жϱ˴��Ƿ���ʡ�[<a href="../my/?f_diary.php?submitok=add">��������</a>]</div>
		</div>
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
