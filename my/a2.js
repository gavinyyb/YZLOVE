var tag_data = {};
tag_data["gexin"] = "ð��/���,����,����/����,�ö�,��Ĭ/����,����,����,����,����/����,ˬ��,��,��������,���/�Ե�,�嶯,����/Բ��,����,���,��������/��������,̤ʵ/ʵ��,����,��Ȼ/����,����/���,��ɢ,����,�Ź�/����,����/����,��̸,��������";
tag_data["xinrong"] = "���ʱ����,����ţ����,����˧����,���������,����������,��׳�ߴ���,��ʵ�޻���,����������,׷��̼�/ð�շ���,����ר��,���ɵ�˼����,һ��������,����������,��ʵ������,��Ծ����,��������/���ҷ�Դ,�˾�,�ܼ���,��ǿ���,����ʰ����,�ٿ�ȫ��,С��,ð�շ���,��Ĭ���Ե���,��������,������ʿ,����,���ڱ����Լ�,��ִ��ǿ,������,���м���,�����ͻ�,����������,�ֹ�������,��������/��������,�е�ɫ";

tag_data["youshi"] = "��ò,���,ѧʶ,��ҵ�ɾ�,��������,����Ƣ��,��ͥ����,ǰ;,���,���/����,��Ĭ��,������";

tag_data["xinqu"] = "����,����,����,Ӱ��,����,����,���Լ�����,����,����,��Ϸ,�滭�鷨,����,д��,�����˶�,���,����,����,�ڽ�,��Ӱ,����,չ��,Ϸ��,�ֹ���,����";

tag_data["huoban"] = "׷��̼�,����ר��,���ɵ�˼����,һ��������,��������/���ҷ�Դ,�˾�,�ܼ���,��ǿ���,����ʰ����,�ٿ�ȫ��,ð�շ���,����,������,���м���,�����ͻ�,�е�ɫ";

var oPopup;
oPopup = window.createPopup();
function popw(ctl,content)
{
	content = "<div id='co' style='height:200px;overflow-y:hidden;overflow-y:auto;'>"+content+"</div>";
	content += "<style>a:link{color:#01297E;text-decoration:underline;}a:visited{color:#01297E;text-decoration:underline;}a:hover{color:red;text-decoration:none;}</style>";
	//ctl = document.getElementById(ctl);
	if (typeof(content)!="string")
	{
		content = content.toString();
	}
	if (oPopup==null)
	{
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

	//*
	oPopBody.innerHTML = content; //" ��������.Test";
	with(ctl)
	{
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
function makeSelection(ns,flag)
{
	var t_html = "";
	if (typeof(tag_data[flag])!="undefined")
	{
		var al = tag_data[flag].split(",");
		for(i=0;i<al.length;i++)
		{
			if (al[i]!="|")
			{
				t_html += "<a href='#' onclick='return setTag(\""+ns+"\", this.innerText);' class=u6699CC>"+al[i]+"</a>��";
			}
			else
			{
				t_html +="<br/>";
			}
		}
	}
	else
	{
		t_html = "";
	}
	//return "<div id='co' style='height:200px;overflow-y:hidden;overflow-y:auto;'>"+t_html+"</div>";
	return t_html;
}

//����tagֵ
function setTag(ns,tag)
{
	try
	{
		var o = document.all[ns];
		var s = o.value;
		if (s == "") {
			o.value = tag;
		}
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
	catch(e)
	{
		alert(e.description);
	}
}

function closeTip()
{
	for(i=1;i<=5;i++)
	{
		document.getElementById('tipinfo'+i).style.display = "none";
	}
}

//ָ����Ҫ��Ч�Ŀؼ�
function setTagBehavior(obj,ns,div_id)
{
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
