var tag_data = {};
tag_data["a3"] = "����,��̲,�������,�Ȳ�,����,Ӣ���,����,��ӰԺ,���,����OK,�μӹ���,���Ѿۻ�,չ����,��Ժ,���,������,����,������,���ݳ���,ͼ���,���ݾƵ�,�����,��԰,����,����,�ư�,ҹ�ܻ�,�����,�������������ı���������";
tag_data["a4"] = "����,����,���,ҡ��,�ŵ�,��ʿ,DJ/����,Ϸ��,���,ԭ��,������";
tag_data["a5"] = "����,����,��ë��,����,������,����,����,�ܲ�,����,��Ӿ,����,̽��,�����г�,ɢ��,��ɽ,������,������,��ѩ,����,ɢ��,��ȭ��,����,����,ȭ��,��ȭ��,���";
tag_data["a6"] = "ʲô����̸,���Ҵ���,�߿Ƽ�,����,����,����,����,ʱװ/���,����/����,��Ʊ,װ��,����/����,��������,ʱ��/����,��Ӱ,����,�ҵ�С��,�ҵ���,�ҵ�����,�ҵĹ���,����/����,��һ������,����,��ѧ,���ж���,��ѧ/ʫ��,�ڽ�,�ƶ���,�����˶�,���ӽ�Ŀ,ûʲô�ر��";
tag_data["a7"] = "д����,С����,�����ӵ��������,ǣ��,���ճ������䣩,����,ͬ��һ�׸�,һ���ݳ�,һ����ʫ,�������,�¹�������,Ұ��,һ�����ܵ�Լ���,��ҹ��,���ֿ�,һ����ϲ,������,ɳ̲��Ϸ,������,����Ҫ���ɵ��ʻ�,һ������,���ڶ���";
var oPopup;
oPopup = window.createPopup();
function popw(ctl,content){
content = "<div id='co' style='height:200px;overflow-y:hidden;overflow-y:auto;'>"+content+"</div>";
content += "<style>a:link{color:#01297E;text-decoration:underline;}a:visited{color:#01297E;text-decoration:underline;}a:hover{color:red;text-decoration:none;}</style>";
//ctl = document.getElementById(ctl);
if (typeof(content)!="string")	{
content = content.toString();}
if (oPopup==null)	{
oPopup = window.createPopup();}
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
}}}else{
t_html = "";
}return t_html;}
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
}}
return false;
}
catch(e){
alert(e.description);
}}
function closeTip(){
for(i=1;i<=5;i++){document.getElementById('tipinfo'+i).style.display = "none";	}
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
if(document.YZLOVEFORM.a1.value==""){
alert('��ѡ�񡰵�һ��Լ����ϣ��˫������ʲô����');
document.YZLOVEFORM.a1.focus();
return false;}
if(document.YZLOVEFORM.a2.value==""){
alert('��ѡ��Լ���и�˭�򵥡���');
document.YZLOVEFORM.a2.focus();
return false;}
if(document.YZLOVEFORM.a3.value.length>127 || document.YZLOVEFORM.a3.value.length<2){
alert('����ϲ����Լ�᳡�����������2~127�����ڣ�');
document.YZLOVEFORM.a3.focus();
return false;}
if(document.YZLOVEFORM.a4.value.length>127 || document.YZLOVEFORM.a4.value.length<2){
alert('����ϲ�������֡��������2~127�����ڣ�');
document.YZLOVEFORM.a4.focus();
return false;}
if(document.YZLOVEFORM.a5.value.length>127 || document.YZLOVEFORM.a5.value.length<2){
alert('���㳣�������������������2~127�����ڣ�');
document.YZLOVEFORM.a5.focus();
return false;}
if(document.YZLOVEFORM.a6.value.length>127 || document.YZLOVEFORM.a6.value.length<2){
alert('����ϲ��̸�ۡ��������2~127�����ڣ�');
document.YZLOVEFORM.a6.focus();
return false;}
if(document.YZLOVEFORM.a7.value.length>127 || document.YZLOVEFORM.a7.value.length<2){
alert('������Ϊ�����ǡ��������2~127�����ڣ�');
document.YZLOVEFORM.a7.focus();
return false;}
}