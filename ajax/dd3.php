<?php
require_once 'pubT.php';
	$rt=$db->query("SELECT id,title,hfnum FROM ".__TBL_DIARY__." WHERE flag=1 AND diaryopen=1 AND ( (unix_timestamp(now()) - unix_timestamp(addtime)) < 2592000 ) ORDER BY hfnum DESC,id DESC LIMIT 9");
	if (!$db->num_rows($rt)){
		echo '<h6>������Ϣ</h6>';
	} else {
		$total = $db->num_rows($rt);
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
?>
<div class="li1"><img src="images/lid.gif" />��<a href=<?php echo $Global['home_2domain'].'/diary'.$rows[0].'.html'; ?> target=_blank><?php echo badstr(htmlout(stripslashes($rows[1]))); ?></a></div>
<div class="li2 hui">�ظ�:<span title="���һ���°��ظ�����"><?php echo $rows[2];?></span>��</div>
<?php }}require_once 'pubB.php';?>