<?php
/*
+--------------------------------+
+ ����̨�����Ȩ���ڱ�������
+ Author����С�ȣ�lyixian@126.com www.linxiaoxian.com��QQ��6154041
+ ���ļ�����޸����ڣ�2010��1��
+ �����޸ģ��뱣��������Ϣ������վû��Ӱ��
+--------------------------------+
*/
/**
* ������֤�����
*
*/
class code{
var $str;     //������ɵ��ַ���
var $width = 85;   //��֤��ͼƬ�Ŀ��
var $height = 20;  //��֤��ͼƬ�ĸ߶�
/**
  * ���캯��
  *
  * @param String $width    ��֤��ͼƬ�Ŀ��
  * @param String $height   ��֤��ͼƬ�ĸ߶�
  * @param String $size     �ַ�����
  */
function code($width = 50,$height = 25,$size = 4){
  $this->str = $this->random($size);
  $this->width = $width;
  $this->height = $height;
  //session_register("code");
  $_SESSION["code"] = $this->str;
}
/**
  * �漴�����ַ��ĺ���
  *
  * @param int $len    Ҫ���ɵ��ַ��ĸ���
  * @return ���ɵ��ַ���
  */
function random($len){ 
  $srcstr="abcdefghijklmnopqrstuvwxyz0123456789"; 
  mt_srand(); 
  $strs=""; 
  for($i=0;$i<$len;$i++){ 
   $strs.=$srcstr[mt_rand(0,35)]; 
  } 
  return $strs; 
} 

/**
  * ������֤�벢���
  *
  */#7CD3E7
function genimg(){ 
  //@header("Content-Type:image/png"); 
  $im=imagecreate($this->width,$this->height); 
  
  //����ɫ 
  $back=imagecolorallocate($im,0xFF,0xFF,0xFF); 
  //ģ������ɫ 
  $pix=imagecolorallocate($im,187,230,247); 
  //����ɫ 
  $font=imagecolorallocate($im,41,163,238); 
  
  //��ģ�����õĵ� 
  mt_srand(); 
  for($i=0;$i<1000;$i++){ 
   imagesetpixel($im,mt_rand(0,$this->width),mt_rand(0,$this->height),$pix); 
  } 
  
  
  //д��,ѡ��ComicSansMS���� 
  //imagettftext($im,20,0,3,25,$font,"comic.ttf",$this->str);
  //$x = mt_rand(1,20);
  //$y = mt_rand(0,18); 
  imagestring($im, 8, 10, 5,$this->str, $font);
  imagerectangle($im,0,0,$this->width-1,$this->height-1,$font); 
  
  
  imagepng($im,"imcode.png"); 
  imagedestroy($im);
} 
}
?>
