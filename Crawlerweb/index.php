<?php

include "config.php";






/***************************�ϴ�ģ���ദ��******************************/





if(!empty($_GET["up"]))
{


if(!empty($_POST["model_name"])){

 mysql_query("INSERT INTO crawler_model_category (`model_id`,`category_id`,`model_name`,`model_class`) VALUES (NULL,'".$_POST["category_id"]."','".$_POST["model_name"]."','".$_POST["model_class"]."')");

}
if(!empty($_FILES[upfile][name])){
					/*************************/
						   $filepath="com/nupt/model/upload/";//����ϴ����ļ���

							$filename=$filepath.$_FILES[upfile][name];

							if(copy($_FILES[upfile][tmp_name],$filename))
							{
								// echo $filename;
								unlink($_FILES[upfile][tmp_name]);
							  echo "����ɹ�<br>������Զ���ת";
					          echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\">";


	                        }
							else{
							  echo "����ʧ��<br>������Զ���ת";
					          echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\">";
							}
 }




exit(0);

}

?>






<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=gbk"> 
        <title>����</title> 
        <link rel="stylesheet" type="text/css" href="ext/resources/css/ext-all.css" /> 
        <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script> 
        <script type="text/javascript" src="ext/adapter/jquery/ext-jquery-adapter.js"></script> 
        <script type="text/javascript" src="ext/ext-all.js"></script> 
        
        <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
        <script src="js/comsenz.js" type="text/javascript"></script>
        
        
		<style type="text/css">
        .top{
        font-size:16px;
        font-family:"����";
        font-weight:bold;
        text-align:center;
        color:#FF0000;
        }
        
        .pai{
        width:100%;
        text-align:center;
        }
        .pai td{
        font-family:"����";
        }
        
        .inp{
            display:none;
        }
		
		.usemodelclass{
			
			margin-left:20px;
			font-family:Verdana, Geneva, sans-serif;
			font-size:16px;
			color:#09F;	
			
		}
        </style>
    
        
        
        
        
        <script type="text/javascript"> 
		
		var str1;

function get(str1){
//alert("wwww"+str1);
$.get("reajax.php?isf=2&insid="+str1+"&temp="+Math.random(),{}, function(data){

//alert(data);
if(data=="1"){

clearInterval(My);

window.location.href="app/index.php?id="+str1;

}


});


}

function startF(theForm)
{
		
	 var urltemp="";//��ȡ���е�ģ�������ԣ��ŷָ�
	
	$("input[name='model_class']").each(function(){
		 if($(this).attr("checked")==true){
			 
		  urltemp += "."+$(this).attr("value");
		 }
	 });
	
	var urlstr="reajax.php?isf=1&key="+$("#key").val()+"&username="+$("#username").val()+"&pwd="+$("#pwd").val()+"&cid="+$("#cid_one").val()+"&model_class="+urltemp+"&temp="+Math.random();
//alert(urlstr);	
	
$.get(urlstr,{}, function(data){

str1 = data.substring(data.indexOf("<&&>")+4,data.length);
//alert(str1);

});
$("#prossbar").show();
Ext.Msg.alert('��ʾ��Ϣ��','���ڷ������Ժ򡣡�����');
My = setInterval("get(str1)",1000);


}


function sechange(){
var cid = $("#cid_one").val();







$(".inp").children().val("");
/******ajax����********/

$.get("reajax.php?category="+cid+"&temp="+Math.random(),{}, function(data){
 // alert("JSON Data: " + data[0].model_name);
//alert(data.length);

$(".usemodelclass").remove();
for(var i=0;i < data.length;i++){

//alert(data[i].model_name);
//$("#use_class").append("<option value='"+data[i].model_class+"' class='semodel'>"+data[i].model_name+"</option>")
$("#usemodel").append("<span  class='usemodelclass'><input name='model_class' type='checkbox' value='"+data[i].model_class+"'>"+data[i].model_name+"</span>");
}


$("#ks").show();

},"json");


/********����仯******/

if(cid==1){
//alert("11111111111");
$("#key").parent().show("fast",function(){
  $("#username").parent().hide(1000);
  $("#pwd").parent().hide(1000);

 });
$("#modelinfo").html("��һ��ģ����һЩ��������վ����Ҫ�Ի�ȡ��ϢΪ����");

}else if(cid==2){
$("#key").parent().hide("fast",function(){
  $("#username").parent().show(1000);
  $("#pwd").parent().show(1000);

 });
//alert("2222222222");
$("#modelinfo").html("�ڶ���ģ����һЩsns����̳��΢�����ʵ���վ����ȡ����Ϣ�Ƚ϶�Ԫ��");
}else if(cid==3){

//alert("3333333333333");
$("#key").parent().show("fast",function(){
  $("#username").parent().hide(1000);
  $("#pwd").parent().hide(1000);

 });
$("#modelinfo").html("������ģ����Ҫ��ָ����һЩ���������ȡ���Ľ����"); 
 
}

}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
Ext.onReady(function(){
 
    var con = new Ext.Panel({
        region: 'center',
        margins:'3 3 3 0',
        defaults:{autoScroll:true},
 
        items:[{contentEl:'1'},{contentEl:'2'}]
    });
 
    var nav = new Ext.Panel({
        title: '����',
        region: 'west',
		split: true,
        width: 200,
        collapsible: true,
        margins:'3 0 3 3',
        cmargins:'3 3 3 3',
		items: [{
			xtype:'button',
			text: 'java�������',
			listeners:{//��Ӽ����¼� ���Խ��handler�����������¼��ĸ�����ִ��
                  "click":function(){
                      // Ext.Msg.alert('��ʾ��Ϣ��','����Button�����listeners�¼���');
                $('#1').show();
				 $('#2').hide();
				
				
                  }
              },
			width:200
		},{
			xtype:'button',
			text: '����ģ�����',
			listeners:{//��Ӽ����¼� ���Խ��handler�����������¼��ĸ�����ִ��
                  "click":function(){
                      // Ext.Msg.alert('��ʾ��Ϣ��','����Button�����listeners�¼���');
                 $('#2').show();
				 $('#1').hide();
				
                  }
              },
			width:200
		}]
  /**      split: true,
        width: 200,
        collapsible: true,
        margins:'3 0 3 3',
        cmargins:'3 3 3 3',
		items:[{contentEl:'haha',draggable:true},{contentEl:'22',draggable:true}]**/
    });
 
    var win = new Ext.Window({
        title: '��ӭʹ���������ϵͳ',
		plain:true,
        closable:true,
        width:900,
        height:450,
        border:false,
        layout: 'border',
 
        items: [nav, con]
    });
 
    win.show();
 
});
        </script> 
    </head> 
    <body> 
     
    
    <div id="1" style="display:block; margin-top:60px;">
   <div id="modelinfo" style=" border:#09F 1px dashed;margin-top:-30px; margin-bottom:30px; font-size:14px;"></div>
    
    <form style="overflow:hidden;">
	 <select name="category_id" id="cid_one" onChange="sechange()">
          <option value=""  selected="selected">��ѡ���ѯ����</option>
          <option value="1">����һ</option>
		  <option value="2">���Ͷ�</option>
		  <option value="3">������</option>
     </select>
    <span class="inp">�ؼ��֣�<input id="key" type="text" name="key" /></span>
    <span class="inp"> �û�����<input id="username" type="text" name="username" /></span>
    <span class="inp">  ���룺<input id="pwd" type="text" name="pwd" /></span>
<!-- <select name="use_class" id="use_class">
          <option value=""  selected="selected">��ѡ��ģ����</option>
          <option value="1" class="semodel">������</option>
		  <option value="2" class="semodel">����</option>
		  <option value="3" class="semodel">����</option>
 </select>-->
 
 
 
 
<br><br><br>
��ѡ����Ҫʹ�õ�ģ�档������<br><br><br>
<div id="usemodel">


</div>
<br><br><br>
<input id="ks" type="button" style=" display:none" value="��ʼ����" onClick="return startF(this)" />
 </form>
 <br>
 <div id="prossbar" style="display:none">���ڷ������Ժ򡣡�������</div>
    
    
    
    </div>
     <div id="2" style="display:none;margin-top:60px;">
     
     <form method="post" ENCTYPE="multipart/form-data" action="index.php?up=1">
	��ϢԴ���ƣ�<input type="text" name="model_name" />
    ģ����������<input type="text" name="model_class" />
	 <select name="category_id">
          <option value=""  selected="selected">��ѡ����������</option>
          <option value="1">����һ</option>
		  <option value="2">���Ͷ�</option>
		  <option value="3">������</option>
     </select>
  <br><br>   ���ϴ�ģ�����ļ���<input name="upfile" type="file" ><br><br>
<input type="submit" value="�ύ" />
 </form>
     
     
     
     </div>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

</body> 
</html> 