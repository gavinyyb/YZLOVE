<?php require_once 'pubT.php';
$rt=$db->query("SELECT id,title,kind,num_n,num_r,flag,jzbmtime,bmnum,picurl_s FROM ".__TBL_GROUP_CLUB__." WHERE flag>0 ORDER BY flag,ifjh DESC,id DESC LIMIT 6");
if (!$db->num_rows($rt)){
	echo '<h6>������Ϣ</h6>';
} else {
	$rows = $db->fetch_array($rt);
	$d1  = strtotime("now");
	$d2  = strtotime($rows[6]);
	$totals  = ($d2-$d1);
	$day     = intval( $totals/86400 );
	$hour    = intval(($totals % 86400)/3600);
	$hourmod = ($totals % 86400)/3600 - $hour;
	$minute  = intval($hourmod*60);
	$totals = ($rows[5] >1)?-1:1;
	if (($totals) > 0) {
		$outtime = ($day > 0)?"��������<span class=timestyle>$day</span>��":"���������";
		$outtime .= "<span>$hour</span>Сʱ<span>$minute</span>����";
	} else {
		$outtime = "[��Ѿ�����]";
	}
?>
	<div class="L"><?php if (!empty($rows[8])){ ?><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank"><img src="<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows[8]; ?>" /></a><?php }else{echo '������Ƭ';}?></div>
  <div class="R" title="<?php echo $rows[1]; ?>">
		<h4><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank"><?php echo gylsubstr($rows[1],22); ?></a></h4>
		<?php echo ''.$outtime.'';?><br />
		��������<span><?php echo $rows[3]+$rows[4]; ?></span>�ˣ���<span><?php echo $rows[7]; ?></span>�˱���<br />
	  �� ������ ����<img src="images/Pd.gif" width="16" height="16" hspace="3" vspace="5" align="absmiddle" /><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank" class="Pjhbm">��Ҫ����</a></div>
	<div class="clear"></div>
	<div class="pul">
	<?php 
	$total = $db->num_rows($rt);
	for($i=1;$i<=$total;$i++) {
		$rows = $db->fetch_array($rt);
		if(!$rows) break;
		$d1  = strtotime("now");
		$d2  = strtotime($rows[6]);
		$totals  = ($d2-$d1);
		$day     = intval( $totals/86400 );
		$hour    = intval(($totals % 86400)/3600);
		$hourmod = ($totals % 86400)/3600 - $hour;
		$minute  = intval($hourmod*60);
		if ($rows[5] >2)$totals = -1;
		if (($totals) > 0) {
			$outtime = ($day > 0)?'��������'.$day.'��':'��������';
			$outtime .= $hour.'Сʱ'.$minute.'����';
			$outPbt = '��Ҫ����';
		} else {
			$outtime = '[��Ѿ�����]';
			$outPbt = '�鿴����';
		}
		?>
		<div class="pli1" title="����<?php echo $rows[3]+$rows[4]; ?>�ˣ��ѱ���<?php echo $rows[7]; ?>�ˣ�<?php echo $outtime;?>"><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank"><?php echo gylsubstr($rows[1],32); ?></a></div>
		<div class="pli2" title="����<?php echo $rows[3]+$rows[4]; ?>�ˣ��ѱ���<?php echo $rows[7]; ?>�ˣ�<?php echo $outtime;?>"><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank"><?php echo $outPbt; ?></a></div>
	<?php }?>
	<div class="clear"></div>
	</div>
<?php }require_once 'pubB.php';?>