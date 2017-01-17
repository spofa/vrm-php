<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="__PUBLIC__/member/style/mkpreview.css" media="screen"/>
        <script type="text/javascript" src="__PUBLIC__/common/js/jquery.js"></script>
        <script type="text/javascript" src="__PUBLIC__/common/js/common.js"></script>
        <script type="text/javascript">
            function goToor(n){
                if(n == 0){
                    $(".dobox").hide();
                }else{
                    $(".dobox").show();
                }
                var k = 340*n/100;
                $(".dobox").css("width",k+"px");
            }
            $(function(){
                goToor(0);
                startDo(0);
            });
			function create_screen(link)
			{
				$.ajax({
					type:"GET",
					url:link,
					data:"",
					success:function(){}
				});
			}
            function startDo(n){
                k = 100*n/8;
                goToor(k);
                $.ajax({
                    url:"<?php echo U('ajax/pano');?>",
                    type:"POST",
                    dataType:"script",
                    data:{
                        dopost:"creatpreview",
                        view_id:"<?php echo ($view_id); ?>",
                        n:n
                    }
                });
            }
            function finishDo(){
                LinkTo("<?php echo ($backurl); ?>");
            }
			
        </script>
    </head>
    <body>
        <?php echo W("Bg");?>
        <div id="upmain">
            <div class="main">
                <div class="main_head">
                    <div class="main_head_left"></div>
                    <div class="main_head_right"></div>
                    <div class="main_head_main">
                        <div class="title">正在生成项目预览，可能需要花费1分钟左右时间</div>
                    </div>
                </div>
                <div class="main_mid">
                    <div class="main_mid_left"></div>
                    <div class="main_mid_right"></div>
                    <div class="main_mid_main">
                        <!-- 内容正式开始的部分 -->
                        <div class="webpage">
                            <div class="dobox"></div>
                        </div>
                        <!-- 内容正式结束的部分 -->
                    </div>
                </div>
                <div class="main_foot">
                    <div class="main_foot_left"></div>
                    <div class="main_foot_right"></div>
                    <div class="main_foot_main"></div>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>