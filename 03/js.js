<script>
	var pageNo =  1;
    var oPingce = getQueryString("list")=="pingce";
    var oDaogou = getQueryString("list")=="daogou";
    function getNextArticle(){
        pageNo ++;
        var _e = "";
        var _url="http://wap.yesky.com/wap/ajaxarticlelist.jhtml?sitemapId=" + sitemapId + "&pageNo="+pageNo;
        if(oPingce){_url = "http://wap.yesky.com/wap/ajaxarticlelist.jhtml?sitemapId=" + sitemapId + "&pageNo="+pageNo+"&list=pingce";}
        if(oDaogou){_url = "http://wap.yesky.com/wap/ajaxarticlelist.jhtml?sitemapId=" + sitemapId + "&pageNo="+pageNo+"&list=daogou";}
        $.ajax({
            type:"get",
                dataType:"json",
                url:_url,
                success:function(data){
                var list = data.articlelists;
                for(var i = 0; i < 10; i++){
                    _e+='<a href="'+list[i].url+'"><dl><dt><img alt="'+list[i].title3+'" src="'+list[i].image1+'"></dt><dd><h2>'+list[i].title2+'<time>'+list[i].shortTime+'</time></h2><div>'+list[i].digest+'</div></dd></dl></a>';
                }
                $("#newslist section").append(_e);
            }
        });
    }
</script>