var tag_data = {};
tag_data["b16"] = "���Ժ��Լ���ĸס,���ԺͶԷ���ĸס,�������Լ�ס�������ظ�ĸ�ҿ���,�Լ�ס��������ڲŻؼ�";
tag_data["b17"] = "̹�����,�˴˳���˽�,��Ϊ�Է�����,��������,�˴�����,�໥����һ���Ŀռ�,��������,�����������,��ͬ������,�໥����,�ƴ��Է�,��ͬ������׷��,�ܱ˴˰���,�൱�Ľ���ˮƽ,�Ӳ��໥���,��ͬ�������";
tag_data["b18"] = "��������,ϲ���ʹ��ͥ��һ��,����������,�ܶ�����,���ֱ˴˻�ǰ������Ȧ";
tag_data["b19"] = "��ҵ�ɾ�,��ͥ����,���,�о�,ͷ��,���,��Ĭ��,ǰ;,�ƽ�����,����,����,������,��������,ѧʶ,�Ըе����,ǿ׳������";
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
		oPopup.show(findPosX(ctl)+1,findPosY(ctl)+offsetHeight+2, offsetWidth+1, 200, document.body);
	}
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
if(document.YZLOVEFORM.b1.value==""){
alert('��ѡ��������Ů�𡱣�');
document.YZLOVEFORM.b1.focus();
return false;}
if(document.YZLOVEFORM.b2.value==""){
alert('��ѡ�񡰽�����ҪС���𡱣�');
document.YZLOVEFORM.b2.focus();
return false;}
if(document.YZLOVEFORM.b3.value==""){
alert('��ѡ����Ը��Ϊ����Ǩ�ӱ��𡱣�');
document.YZLOVEFORM.b3.focus();
return false;}
if(document.YZLOVEFORM.b4.value==""){
alert('��ѡ�񡰻�����е����ټ��񡱣�');
document.YZLOVEFORM.b4.focus();
return false;}	
if(document.YZLOVEFORM.b5.value==""){
alert('��ѡ��ϲ�������𡱣�');
document.YZLOVEFORM.b5.focus();
return false;}
if(document.YZLOVEFORM.b6.value==""){
alert('��ѡ�񡰻�����˫���Ĺ�ϵӦ���ǡ���');
document.YZLOVEFORM.b6.focus();
return false;}
if(document.YZLOVEFORM.b7.value==""){
alert('��ѡ����Ļ���̬�ȡ���');
document.YZLOVEFORM.b7.focus();
return false;}
if(document.YZLOVEFORM.b8.value==""){
alert('��ѡ����ľ���״������');
document.YZLOVEFORM.b8.focus();
return false;}	
if(document.YZLOVEFORM.b9.value==""){
alert('��ѡ�񡰶Է��ļ�ͥ��Ҫ�𡱣�');
document.YZLOVEFORM.b9.focus();
return false;}
if(document.YZLOVEFORM.b10.value==""){
alert('��ѡ��������ѹۡ���');
document.YZLOVEFORM.b10.focus();
return false;}
if(document.YZLOVEFORM.b11.value==""){
alert('��ѡ��������ڹ�����̬�ȡ���');
document.YZLOVEFORM.b11.focus();
return false;}
if(document.YZLOVEFORM.b12.value==""){
alert('��ѡ������С���𡱣�');
document.YZLOVEFORM.b12.focus();
return false;}	
if(document.YZLOVEFORM.b13.value==""){
alert('��ѡ�񡰼�ͥ��������');
document.YZLOVEFORM.b13.focus();
return false;}
if(document.YZLOVEFORM.b14.value==""){
alert('��ѡ�񡰰��������𡱣�');
document.YZLOVEFORM.b14.focus();
return false;}
if(document.YZLOVEFORM.b15.value==""){
alert('��ѡ���������ѡ���');
document.YZLOVEFORM.b15.focus();
return false;}	
if(document.YZLOVEFORM.b16.value.length>127 || document.YZLOVEFORM.b16.value.length<2){
alert('��ϣ�����ļ�ͥ��ϵ���������2~127�����ڣ�');
document.YZLOVEFORM.b16.focus();
return false;}
if(document.YZLOVEFORM.b17.value.length>127 || document.YZLOVEFORM.b17.value.length<2){
alert('�����������ദ����Ҫ���ǡ��������2~127�����ڣ�');
document.YZLOVEFORM.b17.focus();
return false;}
if(document.YZLOVEFORM.b18.value.length>127 || document.YZLOVEFORM.b18.value.length<2){
alert('����ϣ���Ľ��������Ȧ���������2~127�����ڣ�');
document.YZLOVEFORM.b18.focus();
return false;}
if(document.YZLOVEFORM.b19.value.length>127 || document.YZLOVEFORM.b19.value.length<2){
alert('������ضԷ��ģ����������2~127�����ڣ�');
document.YZLOVEFORM.b19.focus();
return false;}	
}