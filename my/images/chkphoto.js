var img=null; 
function showtype(){ 
if(document.up.title.value=="")
	{alert("��������Ƭ˵����");
	document.up.title.focus();
	return false;
	}
var fsize=0;
if(img)img.removeNode(true); 
img=document.createElement("img"); 
img.style.position="absolute"; 
img.style.visibility="hidden"; 
document.body.insertAdjacentElement("beforeend",img); 
img.src=up.inp.value; 
var ftype=img.src.substring(img.src.length-4,img.src.length) 
ftype=ftype.toUpperCase();
fsize=img.fileSize;
if((ftype.indexOf('JPG',0)==-1) && (ftype.indexOf('GIF', 0)==-1))
	{ alert("Sorry!�ϴ�ʧ�ܣ�\n\n����ѡ����Ҫ�ϴ�����Ƭ\n\n����ֻ����.JPG��.GIFͼƬ���͡�");
	return false;
	}
alert("��ȷ��Ҫ�ϴ����ļ���");
return true;
} 