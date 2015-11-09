<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="ajax加载,jquery" />
<meta name="description" content="Helloweba演示平台，演示XHTML、CSS、jquery、PHP案例和示例" />
<title>演示：滚屏加载--无刷新动态加载数据技术的应用</title>
<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.7.2/jquery.min.js"></script>

<style type="text/css">
#container{margin:10px auto;width: 660px;  border: 1px solid #999;}               
.single_item{padding: 20px; border-bottom: 1px dotted #d3d3d3;}
.author{position: absolute; left: 0px; font-weight:bold; color:#39f}
.date{position: absolute; right: 0px; color:#999}
.content{line-height:20px; word-break: break-all;}
.element_head{width: 100%; position: relative; height: 20px;}
.nodata{display:none; height:32px; line-height:32px; text-align:center; color:#999; font-size:14px}
</style>
<script type="text/javascript">


$(function(){ 	

	var i = 0;
	//通过$.ajax获取
	$(".btn").click(function(){		
		$.ajax({
			url:"result.php",
			data:{page:i},
			type:"GET",
			cache:"false",
			dataType:"json",
			success:function(data){
				if(data){
					var leg = data.length;
					var str = "";
					$.each(data,function(index,array){
						var str = "<div class=\"single_item\"><div class=\"element_head\">";
						var str = str + "<div class=\"date\">"+array['date']+"</div>";
						var str = str + "<div class=\"author\">"+array['author']+"</div>";
						var str = str + "</div><div class=\"content\">"+array['content']+"</div></div>";
						$("#container").append(str);
					});				
					i++;
					if(i>leg){
						$(".nodata").show().html("别滚动了，已经到底了。。。");
					}
				}else{
					alert("数据加载完毕。。。");
					return false;
				}
			}
		})
	})
	
	//通过$.getJSON获取
	/*var i = 0;
	$(".btn").click(function(){	
		$.getJSON("result.php",{page:i},function(json){
			if(json){
				var leg = json.length;
				var str = "";
				$.each(json,function(index,array){
					var str = "<div class=\"single_item\"><div class=\"element_head\">";
					var str = str + "<div class=\"date\">"+array['date']+"</div>";
					var str = str + "<div class=\"author\">"+array['author']+"</div>";
					var str = str + "</div><div class=\"content\">"+array['content']+"</div></div>";
					$("#container").append(str);
				});
				i++;
				if(i>leg){
					$(".nodata").show().html("别滚动了，已经到底了。。。");
				}
			}else{
				alert("数据加载完毕。。。");
				return false;
			}
		});
	})*/
	
});
</script>
</head>

<body>

<div id="container"></div>  
<div class="nodata"></div> 
<button class="btn">点击我加载</button>

</body>
</html>