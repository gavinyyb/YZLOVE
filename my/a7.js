var tag_data = {};
tag_data["c8"] = "�ǳ�����,����Ϊ��,����������ҿ���,�������,�ȽϺ��ߡ�����,��Ҫ�Է�����";
tag_data["c9"] = "��Ĭ��Ȥ�İ���,�లȫ���԰�,��ͳ���԰�����,��������,�������,�Ի������,����ḻ�İ���,�԰���ʦ,Ը�����һ�����¶�����,û��ռ����������ʼɵ�,˼�뿪�ŵ�,�����԰�";
tag_data["c10"] = "ħ������,һ�����ʹ,ҡ����,���ƶ���,ԡ��,ͬ����Ҳ���,�ŵ�����,��ζ,��Ħ,���ȵ�ʱ�������۾�,������,��װ���,��׳������,������,�԰���Ӱ,��ɫ����,����,�����ر˴˿���,ʪ��,�ڵƹ���,��������,��͵��,��ֵ�ǰϷ,�������,Ұ��,����ĵط�,��������,����ϸ��,ɫ��С˵,����,�߸���,С����";
tag_data["c11"] = "һ���԰���Ӱ,һҹ��,�����԰�����,�绰�԰�����,��ɫ����,������ͨ�����ķ�ʽ,ֻҪ��̫��ֶ�����,ͬ����";
var oPopup;
oPopup = window.createPopup();
function popw(ctl,content){
	content = "<div id='co' style='height:200px;overflow-y:hidden;overflow-y:auto;'>"+content+"</div>";
	content += "<style>a:link{color:#01297E;text-decoration:underline;}a:visited{color:#01297E;text-decoration:underline;}a:hover{color:red;text-decoration:none;}</style>";
	//ctl = document.getElementById(ctl);
	if (typeof(content)!="string")	{
		content = content.toString();
	}
	if (oPopup==null)	{
		oPopup = window.createPopup();
	}
	var oPopBody = oPopup.document.body;
	var bc,gc;
	gc = "";
	bc = "#ccc";
	oPopBody.style.fontFamily = "Tahoma";
	oPopBody.style.fontSize = "12px";
	oPopBody.style.margin = "4px";
	oPopBody.style.backgroundColor = gc;
	oPopBody.style.border = "solid "+bc+" 1px";
	oPopBody.innerHTML = content; //" ��������.Test";
	with(ctl)	{
		/*
		var h = oPopup.document.body.scrollHeight;
		oPopup.show(findPosX(ctl)+1,findPosY(ctl)+offsetHeight+2, offsetWidth+1, h, document.body);
		h = oPopup.document.body.scrollHeight;
		if (h >200) h=200;
		//*/
		oPopup.show(findPosX(ctl)+1,findPosY(ctl)+offsetHeight+2, offsetWidth+1, 200, document.body);
	}
	//*/
}
//����ѡ��html
function makeSelection(ns,flag){
	var t_html = "";
	if (typeof(tag_data[flag])!="undefined")	{
		var al = tag_data[flag].split(",");
		for(i=0;i<al.length;i++)		{
			if (al[i]!="|")			{
				t_html += "<a href='#' onclick='return setTag(\""+ns+"\", this.innerText);' class=u6699CC>"+al[i]+"</a>��";
			}else{
				t_html +="<br/>";
			}
		}
	}else{
		t_html = "";
	}
	//return "<div id='co' style='height:200px;overflow-y:hidden;overflow-y:auto;'>"+t_html+"</div>";
	return t_html;
}
//����tagֵ
function setTag(ns,tag){
	try	{
		var o = document.all[ns];
		var s = o.value;
		if (s == "") {o.value = tag;}
		else {
			switch(s.indexOf(tag)){
				case -1:
				o.value += " " + tag;
				break;
				case 0:
				if (s.replace(tag,"")!="") o.value = s.replace(tag+" ","") + " "+ tag;
				break;
				default:
				o.value = s.replace(" "+tag,"") + " "+ tag;
				break;
			}
		}
		return false;
	}
	catch(e){
		alert(e.description);
	}
}
function closeTip(){
	for(i=1;i<=4;i++){document.getElementById('tipinfo'+i).style.display = "none";	}
}
//ָ����Ҫ��Ч�Ŀؼ�
function setTagBehavior(obj,ns,div_id){
	if (obj==null) return;
	if (typeof(tag_data[ns])=="undefined") return;
	var tip_obj = document.getElementById(div_id);
	if (tip_obj==null) return;
	obj.onblur = function() { this.style.backgroundColor = "#ffffff"; }
	closeTip();
	obj.style.backgroundColor = "#FFFBD1";
	tip_obj.innerHTML = makeSelection(obj.name,ns);
	tip_obj.style.display = "block";
	//popw(obj,makeSelection(obj.name,flag));
}
function chkform(){
if(document.YZLOVEFORM.c1.value==""){
alert('��ѡ��������ס�ڡ�');
document.YZLOVEFORM.c1.focus();
return false;}
if(document.YZLOVEFORM.c2.value==""){
alert('��ѡ������Ϊ�Լ��Ը���');
document.YZLOVEFORM.c2.focus();
return false;}
if(document.YZLOVEFORM.c3.value==""){
alert('��ѡ�������԰�����ľ��顱');
document.YZLOVEFORM.c3.focus();
return false;}
if(document.YZLOVEFORM.c4.value==""){
alert('��ѡ����Դ��԰���̬���ǡ�');
document.YZLOVEFORM.c4.focus();
return false;}
if(document.YZLOVEFORM.c5.value==""){
alert('��ѡ�������԰������ڳ�����');
document.YZLOVEFORM.c5.focus();
return false;}
if(document.YZLOVEFORM.c6.value==""){
alert('��ѡ������Ϊ�ԺͰ��Ĺ�ϵ�ǡ�');
document.YZLOVEFORM.c6.focus();
return false;}
if(document.YZLOVEFORM.c7.value==""){
alert('��ѡ������Ϊ�Ը���Ҫ�����ڶԷ��ġ�');
document.YZLOVEFORM.c7.focus();
return false;}
if(document.YZLOVEFORM.c8.value.length>127 || document.YZLOVEFORM.c8.value.length<2){
alert('�����԰��У��������ǡ��������2~127������');
document.YZLOVEFORM.c8.focus();
return false;}
if(document.YZLOVEFORM.c9.value.length>127 || document.YZLOVEFORM.c9.value.length<2){
alert('������Ѱ�ҡ��������2~127������');
document.YZLOVEFORM.c9.focus();
return false;}
if(document.YZLOVEFORM.c10.value.length>127 || document.YZLOVEFORM.c10.value.length<2){
alert('��ʲô�Ƚ��ܵ���������¡��������2~127������');
document.YZLOVEFORM.c10.focus();
return false;}
if(document.YZLOVEFORM.c11.value.length>127 || document.YZLOVEFORM.c11.value.length<2){
alert('�����ܹ�����(����İ���)���������2~127������');
document.YZLOVEFORM.c11.focus();
return false;}
}