<?php
/* Smarty version 3.1.30, created on 2016-08-12 22:48:07
  from "E:\code\phpweb\blog\git\tpl\map.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57ade1a7cc5c73_22320710',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fd51c6a6d30556886d5b74d3681ae70a875f218' => 
    array (
      0 => 'E:\\code\\phpweb\\blog\\git\\tpl\\map.html',
      1 => 1471013273,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ade1a7cc5c73_22320710 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	
	<link rel="stylesheet" href="../theme/map/map.css">
	<?php echo '<script'; ?>
 src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="https://api.map.baidu.com/getscript?v=2.0&ak=HRukRGSbkj7lMvrvPXZI85PG&services="><?php echo '</script'; ?>
>
	<title>地图</title>
</head>
<body>
	<div id="allmap"></div> 



	<div class="toggle">
		<div class="myimg">
			<img  src="../theme/images/cursor.ico" alt="">
		</div>
	</div>
	<div class="myContainer">
		<div class="myimg">
			<img  src="../theme/images/cursor.ico" alt="">
		</div>
		<div class="write">
			<textarea id="iwantsay"  placeholder="我想说的话"></textarea>
		</div>
	</div> 
</body>
</html>
<?php echo '<script'; ?>
 type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");

	map.centerAndZoom("济南",12);                
	map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
	map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
	map.setDefaultCursor("url('bird.cur')");//设置鼠标样式

	callbackgps=function(r){
		var mk = new BMap.Marker(r.point);
		map.addOverlay(mk);
		map.panTo(r.point); 
		alert('您的位置：'+r.point.lng+','+r.point.lat);
		var point = new BMap.Point(r.point.lng,r.point.lat);
		var marker = new BMap.Marker(point);  // 创建标注
		map.addOverlay(marker);              // 将标注添加到地图中   
		var opts = {
		  width : 200,     // 信息窗口宽度
		  height: 100,     // 信息窗口高度
		  title : "海底捞王府井店" , // 信息窗口标题
		  enableMessage:true,//设置允许信息窗发送短息
		  message:"亲耐滴，晚上一起吃个饭吧？戳下面的链接看下地址喔~"
		}
		var infoWindow = new BMap.InfoWindow("地址：北京市东城区王府井大街88号乐天银泰百货八层", opts);  // 创建信息窗口对象 
		marker.addEventListener("click", function(){          
			map.openInfoWindow(infoWindow,point); //开启信息窗口
		});
	}; 
	
	var geolocation = new BMap.Geolocation();
		//通过浏览器获取经纬度
		geolocation.getCurrentPosition( callbackgps ,{enableHighAccuracy: true});

	//设置toggle
	$(".myimg").click(function(){
		var container=$(".myContainer");
		var myimg=$(".myimg");
		var toggle=$(".toggle");
		if(container.css("bottom")=="10px"){
			container.animate({bottom:"-1000px"},"slow");
			toggle.show();
		}else{
			container.animate({bottom:"10px"},"slow");
			toggle.hide();
		}


	});

	
	<?php echo '</script'; ?>
>
<?php }
}
