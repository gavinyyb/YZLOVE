var tag_data = {};
tag_data["d1"] = "��ְ����,��ְ����,רҵ����,�ڽǶ���,��ҵ���,��ҵ�鱨,ͬҵ��ʿ,��������,��Ȥͬ��,����̻�";
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
}}
function makeSelection(ns,flag){
var t_html = "";
if (typeof(tag_data[flag])!="undefined")	{
var al = tag_data[flag].split(",");
for(i=0;i<al.length;i++)		{
if (al[i]!="|")			{
t_html += "<a href='#' onclick='return setTag(\""+ns+"\", this.innerText);' class=u6699CC>"+al[i]+"</a>��";
}else{
t_html +="<br/>";
}}
}else{
t_html = "";
}
return t_html;
}
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
}}
return false;
}
catch(e){
alert(e.description);
}}
function closeTip(){
for(i=1;i<=1;i++){document.getElementById('tipinfo'+i).style.display = "none";	}
}
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
}
function chkform(){
if(document.YZLOVEFORM.d1.value.length>127 || document.YZLOVEFORM.d1.value.length<2){
alert('�����̻���Ŀ�ġ��������2~127������');
document.YZLOVEFORM.d1.focus();
return false;}
if(document.YZLOVEFORM.d2.value.length>50 || document.YZLOVEFORM.d2.value.length<2){
alert('����˾/�������ơ��������2~50������');
document.YZLOVEFORM.d2.focus();
return false;}
if(document.YZLOVEFORM.d3.value==""){
alert('��ѡ��ְ����ࡱ');
document.YZLOVEFORM.d3.focus();
return false;}
if(document.YZLOVEFORM.d4.value==""){
alert('��ѡ��ְλ�ȼ���');
document.YZLOVEFORM.d4.focus();
return false;}
if(document.YZLOVEFORM.d5.value.length>50 || document.YZLOVEFORM.d5.value.length<2){
alert('��ְ�����ơ��������2~50������');
document.YZLOVEFORM.d5.focus();
return false;}
if(document.YZLOVEFORM.d6.value==""){
alert('��ѡ�񡰲�ҵ���');
document.YZLOVEFORM.d6.focus();
return false;}
if(document.YZLOVEFORM.d7.value.length>50 || document.YZLOVEFORM.d7.value.length<2){
alert('��ѧУ��ϵ���������2~50������');
document.YZLOVEFORM.d7.focus();
return false;}
if(document.YZLOVEFORM.d8.value.length>50 || document.YZLOVEFORM.d8.value.length<2){
alert('����Ϥ�����������2~50������');
document.YZLOVEFORM.d8.focus();
return false;}	
if(document.YZLOVEFORM.d9.value.length>50 || document.YZLOVEFORM.d9.value.length<2){
alert('��ר����Ȥ���������2~50������');
document.YZLOVEFORM.d9.focus();
return false;}		
if(document.YZLOVEFORM.d10.value.length>50 || document.YZLOVEFORM.d10.value.length<2){
alert('�������������������2~50������');
document.YZLOVEFORM.d10.focus();
return false;}		
if(document.YZLOVEFORM.d11.value.length>2000 || document.YZLOVEFORM.d11.value.length<2){
alert('�������������������2~50������');
document.YZLOVEFORM.d11.focus();
return false;}	
}