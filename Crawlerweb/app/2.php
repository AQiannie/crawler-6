<?php

$article = getArticles();



///////////////��������б�ֲ�////////////////////


function union($modelid){
	$rowarray=array();
	foreach($modelid as $val){
		//echo $val."---------";
		
		$temp = getFriendslist($val);
		//print_r($temp);
		for($i=0;$i<count($temp);$i++){
			if(!in_array($temp[$i],$rowarray))
			$rowarray[]=$temp[$i];		
		}
		
	}
	return $rowarray;
	
	
}


$modelid = getAllModelId();
$row = union($modelid);

$namearray = array();

$resultarray = array();

foreach($modelid as $idvalue){
	//echo $idvalue;
	$resultrow = array();
	$resultrow[] = getModelName($idvalue);
	$friends = getFriendslist($idvalue);
	foreach($row as $rowvalue){
		//echo $rowvalue;
		//print_r($friends);
		if(in_array($rowvalue,$friends)){
		$resultrow[] = "o";
		}else{
		$resultrow[] = "x";
		}
		//print_r($resultrow);
	}
	$resultarray[]=$resultrow;
	
		
}





?>




<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=gbk"> 
        <title>����</title> 
        <link rel="stylesheet" type="text/css" href="../ext/resources/css/ext-all.css" /> 
        <script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script> 
        <script type="text/javascript" src="../ext/adapter/jquery/ext-jquery-adapter.js"></script> 
        <script type="text/javascript" src="../ext/ext-all.js"></script> 
    
            
    <script type="text/javascript">     		
Ext.onReady(function(){
	
	
	function renderfi(value){
	
		return "<span style='font-size:17px;color:#000000'>"+value+"</span>";
		
	}
	
	 var cm = new Ext.grid.ColumnModel([
	 new Ext.grid.RowNumberer(),
	 <?PHP
        echo "{header:'����Դ',dataIndex:'fenxi',renderer:renderfi}";
		foreach($row as $key => $value){
			echo ",{header:'$value',dataIndex:'$key',width:38}";
			
		}
	
	?>	
    ]);

    var data = [
	<?php
	     function toRow($array){
			$string="['$array[0]'";
			for($i=1;$i<count($array);$i++){
				$string=$string.",'".$array[$i]."'";
				
			}
			$string=$string."]";
	
			return $string; 
			 
		 }
	     foreach($resultarray as $key => $value){
			 if($key==0)
			 echo toRow($value);
			 else
			 echo ",".toRow($value); 
		 }
	?>	
		
    ];

    var store = new Ext.data.Store({
        proxy: new Ext.data.MemoryProxy(data),
        reader: new Ext.data.ArrayReader({}, [
            {name: 'fenxi'}
			<?php 
			for($i=0;$i<count($row);$i++)
			echo ",{name: '$i'}"		
			 ?>
        ])
    });
    store.load();

    var grid = new Ext.grid.GridPanel({
		viewConfig: {forceFit: true,autoFill: true },
        autoHeight: true,
		autoScroll: true,
        width: 940,  
		renderTo: 'grid',
        store: store,
        cm: cm
    });
	
	//grid.getView().getRow().style.backgroundColor="red";
//////////////////////////////////////////////////
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
 
    var con = new Ext.Panel({
        region: 'center',
        margins:'3 3 3 0',
        defaults:{autoScroll:true},
	   layout: 'accordion',
		layoutConfig: {
			titleCollapse: true,
			animate: true,
			activeOnTop: false
		},
        items:[
		{title: '���·���',html: '<?php 
		$valuearray = getArticles();
		foreach($valuearray as $value){
			echo "���⣺".$value[5]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������ڣ�".$value[7]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Դ��".getModelName($value[mc_id])."<br><br>���ģ�".$value[1]."<br><br><hr>";
		}	
		?>'},
		{title: '�����б����',contentEl:"grid"},
		{title: '״̬����',html: '<?php 
		
		//print_r(getSays());
		$valuearray = getSays();
		foreach($valuearray as $value){
			echo "<strong>״̬��Ϣ</strong>��".$value[1]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>����</strong>��".getModelName($value[mc_id])."<br><br>";
		}
	
		
		
		 ?>'}]
    });
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	var win = new Ext.Window({
	title: '��ӭʹ�ô�Ӧ�ã�����<?php echo "��ǰ�ؼ����ǣ�".getHistoryName() ?>',
	plain:true,
	closable:true,
	width:900,
	height:450,
	border:false,
	layout: 'border',

	items: [con]
    });
 
    win.show();
	

});
	
      </script> 
     </head>
     <body>
     
     
     
        
        
         <div id="grid"></div>
        
        
        
        
        
        
        
        
        
        
            

      </body> 
      </html> 
        