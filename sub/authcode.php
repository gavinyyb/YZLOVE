<?php
session_start();
Header("Content-type: image/PNG");
$str = "��һ�����˲����д�����������Ϊ�ǵظ��ù�ʱҪ���������ҵ�����������������ѧ�¼�������巢�ɲ���ɳ��ܷ���ͬ����˵�ֹ����ȶ���������С��Ҳ�����߱�����������е��˶���Ϊ���Ѿ����Ƕ�δ��ʼ������Ϊ�Ҹ����˲���ȥ֤�ı궼��Ϊ���㿪ʼ�������Ҵ��ֲ�����ʱ���ѽ����ǵĻ��������Ʋ�֪��û������ȥ��ÿ��Ƭ���Ҷ�û����Ҳ�ú����ڵ��Լ��һ��ڴ���ʲô���ȴ���ʲô�����ҽ����е����ν�������û���뵽�Լ��������Ʋ��ﻻ���˳������ϵĽ�ֻ��ǵøտ�ʼ��ʶ��ʱ�����Į��ĸ߰�������˵���������������ʱ����Ľ�̸Ҳֻ������İ����֮����ʺ������Ҫ�������һ�����������ǽ�������ǧ��֮����һ�����ܵ�����������ȴû�л�ȡ�����Ȩ���ǽ������޴�ѡ���ҳ��Ϻ���˽�ҵ���˽����һ��һ������������ν�ĸ����������ĥ���˼��°������Ϊû�����ҵõ�˿���Ŀ��������Լ����µ��Լ�ȴ������ǵ��������쵽��ҹ�Ҳ�ͣ�����̽������������ȴ�����ڼǵ���Ϊ�������㲢���ó����ֹ���ҵ��󻹱���һ������ȴ��������ǵ��Լ��ո����ξͽӵ�һ���ֵĻ����ȴ�������ҽ�������е�׼����������������ǵ���������������ֻ������������㼸��ڶ���������ҽ�������֪���ҵĸм��ж��ж�����ǵ���Ϊ�ҵĹ�ʧ�����������Ʋ��ϳԷ�����ôȰ�㶼���϶�������Ͷ����һ�θ������򷹲�֪������ת��֮���㵽����ʲô�����ǵö��㽲�����ͬѧ����������Į�Ļش���һ����ˮ�����ȴ��Ҫ��Ū��������ʲô�ı��һ�����������ﲻ֪��ôȴ�������仰�������ڸı���ȴ����ԭ�ز�֪���Ӻ�ʱ��ʼ�Լ���������ȡ���������ֳ�Ů���ı����ѵ����ǲ���α����";
$imgWidth = 110;
$imgHeight = 24;
$authimg = imagecreate($imgWidth,$imgHeight);
$bgColor = ImageColorAllocate($authimg,255,255,255);
$fontfile = "zeai.ttf";
$white=imagecolorallocate($authimg,234,185,95);
imagearc($authimg, 150, 8, 20, 20, 75, 170, $white);
imagearc($authimg, 100, 7,50, 22, 75, 175, $white);
imageline($authimg,20,20,180,30,$white);
imageline($authimg,20,18,170,50,$white);
imageline($authimg,25,50,80,50,$white);
$noise_num = 100;
$line_num = 5;
imagecolorallocate($authimg,0xff,0xff,0xff);
$rectangle_color=imagecolorallocate($authimg,0xAA,0xAA,0xAA);
$noise_color=imagecolorallocate($authimg,0x33,0x33,0x33);
$font_color=imagecolorallocate($authimg,0x00,0x00,0x00);
$line_color=imagecolorallocate($authimg,0x00,0x00,0x00);
for($i=0;$i<$noise_num;$i++){
	imagesetpixel($authimg,mt_rand(0,$imgWidth),mt_rand(0,$imgHeight),$noise_color);
}
for($i=0;$i<$line_num;$i++){
	imageline($authimg,mt_rand(0,$imgWidth),mt_rand(0,$imgHeight),mt_rand(0,$imgWidth),mt_rand(0,$imgHeight),$line_color);
}
$randnum=rand(0,strlen($str)-4);
if($randnum%2)$randnum+=1;
$str = substr($str,$randnum,8);
$_SESSION['supdesverify'] = $str;
$str = iconv("GB2312","UTF-8",$str);
ImageTTFText($authimg, 20, 0, 0, 21, $font_color, $fontfile, $str);
ImagePNG($authimg);
ImageDestroy($authimg);
?>