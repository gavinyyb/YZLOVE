<?php
/*
+--------------------------------+
+ ����̨�����޸İ�Ȩ���ڱ�������
+ Modified Author����С�ȣ�lyixian@126.com www.linxiaoxian.com��QQ��6154041
+ ���ļ�����޸����ڣ�2010��1��
+ �����޸ģ��뱣��������Ϣ������վû��Ӱ��
+--------------------------------+
*/
class yzlove_data{
	function getbirthday($str){
		$tmpbirthday1 = substr($str,0,4);
		$tmpbirthday2 = date("Y");
		$tmpbirthday  = $tmpbirthday2 - $tmpbirthday1;
		return $tmpbirthday.'��';
	}
	function getlove($str){
		switch ($str){ 
		case 1:$tmpstr = "δ��";break;
		case 2:$tmpstr = "�ѻ�";break;
		case 3:$tmpstr = "��������Ů";break;
		case 4:$tmpstr = "��������Ů";break;
		case 5:$tmpstr = "ɥż����Ů";break;
		case 6:$tmpstr = "ɥż����Ů";break;
		case 7:$tmpstr = "��������";break;
		}
		return $tmpstr;
	}
	function getloveX($str){
		switch ($str){ 
		case 1:$tmpstr = "δ��";break;
		case 2:$tmpstr = "�ѻ�";break;
		case 3:$tmpstr = "��������Ů";break;
		case 4:$tmpstr = "��������Ů";break;
		case 5:$tmpstr = "ɥż����Ů";break;
		case 6:$tmpstr = "ɥż����Ů";break;
		case 7:$tmpstr = "����";break;
		}
		return $tmpstr;
	}
	function getkind($str){
		switch ($str){ 
		case 1:$tmpstr = "������";break;
		case 2:$tmpstr = "Լ�ύ��";break;
		case 3:$tmpstr = "��������";break;
		case 4:$tmpstr = "�쳾֪��";break;
		case 5:$tmpstr = "���̻���";break;
		}
		return $tmpstr;
	}
	function gethouse($str){
		switch ($str){ 
		case 1:$tmpstr = "�л鷿";break;
		case 2:$tmpstr = "����������";break;
		case 3:$tmpstr = "�޻鷿";break;
		case 4:$tmpstr = "�޻鷿���ɽ��";break;
		case 5:$tmpstr = "�޻鷿ϣ���Է����";break;
		case 6:$tmpstr = "�޻鷿ϣ��˫�����";break;
		}
		return $tmpstr;
	}
	function getcar($str){
		switch ($str){ 
		case 1:$tmpstr = "����";break;
		case 2:$tmpstr = "�е�����";break;
		case 3:$tmpstr = "�ߵ�����";break;
		case 4:$tmpstr = "������������";break;
		}
		return $tmpstr;
	}
	function getedu($str){
		switch ($str){ 
		case 1:$tmpstr = "���м�����";break;
		case 2:$tmpstr = "���л���ר������";break;
		case 3:$tmpstr = "��ר������";break;
		case 4:$tmpstr = "���Ƽ�����";break;
		case 5:$tmpstr = "˶ʿ������";break;
		case 6:$tmpstr = "��ʿ������";break;
		}
		return $tmpstr;
	}
	function getpay($str){
		switch ($str){ 
		case 1:$tmpstr = "600Ԫ����";break;
		case 2:$tmpstr = "600-799Ԫ";break;
		case 3:$tmpstr = "800-999Ԫ";break;
		case 4:$tmpstr = "1000-1499Ԫ";break;
		case 5:$tmpstr = "1500-1999Ԫ";break;
		case 6:$tmpstr = "2000-2999Ԫ";break;
		case 7:$tmpstr = "3000-3999Ԫ";break;
		case 8:$tmpstr = "4000-4999Ԫ";break;
		case 9:$tmpstr = "5000-5999Ԫ";break;
		case 10:$tmpstr = "6000-6999Ԫ";break;
		case 11:$tmpstr = "7000-9999Ԫ";break;
		case 12:$tmpstr = "10000-19999Ԫ";break;
		case 13:$tmpstr = "20000Ԫ����";break;
		}
		return $tmpstr;
	}
	function getjob($str){
		switch ($str){ 
		case 1:$tmpstr = "��ҵ������Ա";break;
		case 2:$tmpstr = "ר��/����";break;
		case 3:$tmpstr = "����/������Ա";break;
		case 4:$tmpstr = "�г�/������Ա";break;
		case 5:$tmpstr = "������Ա/��ְ����";break;
		case 6:$tmpstr = "��ְͨԱ";break;
		case 7:$tmpstr = "���ظɲ�/������Ա";break;
		case 8:$tmpstr = "������/��Ա";break;
		case 9:$tmpstr = "��ʦ";break;
		case 10:$tmpstr = "����";break;
		case 11:$tmpstr = "ũ��";break;
		case 12:$tmpstr = "����";break;
		case 13:$tmpstr = "ѧ��";break;
		case 14:$tmpstr = "����ְҵ��";break;
		case 15:$tmpstr = "��/������Ա";break;
		case 16:$tmpstr = "ʧҵ/��ҵ";break;
		case 17:$tmpstr = "����";break;
		}
		return $tmpstr;
	}
}
?>