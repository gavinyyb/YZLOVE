var lastname = "";
var tmpimg = "<img src=images/error.gif align=absmiddle>";
var msg=new Array(
tmpimg+"�û���������3~12λСдӢ����ĸ��СдӢ����ĸ��������϶��ɣ�������ĸ��ͷ��ע��֮�󲻿����޸ġ�<br><br>��ע�������û����� <a href=help/ class=u000>��ϵ�ͷ�</a><br><br>",
tmpimg+"���û����������ɽ����ַ��򱻹���Ա����,��ѡ�������û���",
tmpimg+"Ϊ�˱��⽻�����û�������,�û����н�ֹʹ�ô�д��ĸ,��ʹ��Сд��ĸ",
tmpimg+"���û����Ѿ���ע�ᣬ��ѡ�������û�����",
"<img src=images/ok.gif align=absmiddle><font color=\"green\"> ��ϲ�������û�����δ��ע�ᣬ������ʹ������û�����</font>"
);
function ReloadCode(){
	var dt = new Date().getTime();
	document.getElementById('gylverify' ).src='sub/authcode.php?dt='+dt;
}
function namecheck() {
	a = document.getElementById('warn');
	a.className="warn1";
	var username = document.getElementById("form_username").value;
	if (username == "") {
		alert('�������û�����');
		document.FORM.form_username.focus();
		return false;
	}
	if (username == lastname) {
		return false;
	}
	lastname = username;
	document.checkForm.username.value = username;
	document.getElementById("check_info").innerHTML = "����У����Ե�...";
	document.checkForm.submit();
	return true;
}
function retmsg(id,str){
	document.getElementById("check_info").innerHTML = msg[id]+str;
	if (id == 1){
		a = document.getElementById('warn');
		a.className="warn2";
	}
}
function chkform(){
	if(document.FORM.form_username.value==""){
	alert('�������û�����');
	document.FORM.form_username.focus();
	return false;}
	

	if(document.FORM.form_password1.value==""){
	alert('���������룡');
	document.FORM.form_password1.focus();
	return false;}
	if(document.FORM.form_password1.value.length>20 || document.FORM.form_password1.value.length<6)	{
	alert('�����������6~20���ֽ��ڣ�');
	document.FORM.form_password1.focus();
	return false;
	}
	if(document.FORM.form_password2.value==""){
	alert('������ȷ�����룡');
	document.FORM.form_password2.focus();
	return false;
	}
	if(document.FORM.form_password2.value.length>20 || document.FORM.form_password2.value.length<6)	{
	alert('ȷ�������������6~20���ֽ��ڣ�');
	document.FORM.form_password2.focus();
	return false;
	}
	if(document.FORM.form_password1.value!=document.FORM.form_password2.value) {
	alert("�������벻һ��");
	document.FORM.form_password2.focus();
	return false;		
	}
	var resualt=false;
	for(var i=0;i<document.FORM.form_sex.length;i++){
		if(document.FORM.form_sex[i].checked){
		  resualt=true;
		}
	}
	if(!resualt){
		alert("��ѡ���Ա�");
		return false;
	}
	if(document.FORM.form_love.value==""){
	alert('��ѡ�����״����');
	document.FORM.form_love.focus();
	return false;
	}
	if(document.FORM.province.value==""){
	alert('��ѡ�����ڵ����ġ�ʡ�ݡ���');
	document.FORM.province.focus();
	return false;
	}
	if(document.FORM.city.value==""){
	alert('��ѡ�����ڵ����ġ����С���');
	document.FORM.city.focus();
	return false;
	}
	var strm = document.FORM.form_email.value;
	if(strm!=""){
		var regm = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
		if (!strm.match(regm)){
		alert("�����ַ��ʽ������зǷ��ַ�!\n���飡");
		document.FORM.form_email.focus();   
		return false;
		} 
	}
	if(document.FORM.yctel.value==""){
	alert('�����롰��ϵ�绰����');
	document.FORM.yctel.focus();
	return false;
	}
	if(document.FORM.regverify.value==""){
	alert('��������֤�룡');
	document.FORM.regverify.focus();
	return false;
	}
	var b= /^[\u4e00-\u9fa5\_]+$/; 
	if(!b.test(document.FORM.regverify.value)){ 
		alert('����ұߵ�4λ��������˿�');
		document.FORM.regverify.focus();
		return false; 
	}
	if(document.FORM.agree.checked == false){
	alert('��ͬ�Ȿվ�������ע�ᡷ');
	document.FORM.agree.focus();
	return false;
	}
}