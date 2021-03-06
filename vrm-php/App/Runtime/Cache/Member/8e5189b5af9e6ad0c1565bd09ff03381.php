<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="__PUBLIC__/member/style/common.css" media="screen"/>
        <script type="text/javascript" src="__PUBLIC__/common/js/jquery.js"></script>
        <script type="text/javascript" src="__PUBLIC__/common/js/common.js"></script>
        <?php echo W("Easyui");?>
        <?php echo W("Uploader");?>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".spot_box").click(function(){
                    var n = $(this).prevAll(".spot_box").length;
                    var m = $(".spot_box.me").prevAll(".spot_box").length;
                    var x = $(".spot_box.me").length;
                    $(".spot_box.me").children(".spot_edit").stop().animate({left:-50}, 500);
                    $(".spot_box.me").children(".spot_del").stop().animate({right:-50}, 500);
                    $(".spot_box").removeClass("me");
                    if(m != n || x == 0){
                        $(this).addClass("me");
                        $(this).children(".spot_edit").stop().animate({left:10}, 500);
                        $(this).children(".spot_del").stop().animate({right:10}, 500);
                    }
                });
            });
        </script>
        <style>
            .sysspot_box{
                width: 182px; height: 205px; overflow: hidden; border:1px solid #f7db99; border-radius : 5px;
                background: #fffbf3; border-bottom: 1px solid #d6b974; float: left; margin: 5px; position: relative;
            }
            .sysspot_cube{
                width: 160px; height: 160px; overflow: hidden; background: url(__PUBLIC__/member/images/common/psbg.png) #fff;
                border:1px solid #f7db99; margin-top: 10px; margin-left: 10px; cursor: default;
            }
            .sysspot_title{
                width: 180px; height: 20px; overflow: hidden; margin: 0 auto; margin-top: 5px;
                text-align: center; font: bold 12px/20px "微软雅黑"; color: #333; cursor: default;
            }

            .spot_box{
                width: 182px; height: 225px; overflow: hidden; border:1px solid #ccc; border-radius : 5px;
                background: #f3f3f3; border-bottom: 1px solid #aaa; float: left; margin: 5px; position: relative;
            }
            .spot_cube{
                width: 160px; height: 160px; overflow: hidden; background: url(__PUBLIC__/member/images/common/psbg.png) #fff;
                border:1px solid #ccc; margin-top: 10px; margin-left: 10px; cursor: pointer;
            }
            .spot_box:hover{
                background: #f4fbfe; border-color :#aad8ee;
            }
            .spot_box:hover .spot_cube{
                border-color :#aad8ee;
            }
            .spot_box:hover .spot_title{
                color: #256786;
            }


            .spot_box.me{
                background: #f4fbfe; border-color :#aad8ee;
            }
            .spot_box.me .spot_cube{
                border-color :#aad8ee;
            }
            .spot_box.me .spot_title{
                color: #256786;
            }


            .spot_title{
                width: 180px; height: 48px; overflow: hidden; margin: 0 auto; margin-top: 5px;
                text-align: center; font: bold 12px/20px "微软雅黑"; color: #333; cursor: pointer;
            }

            .spot_edit{
                width: 40px; height: 40px; overflow: hidden; background: #f00; left: -50px; top: 128px; cursor: pointer;
                position: absolute; background: url(__PUBLIC__/member/images/common/sp_edit.png); display: block;
                filter:alpha(opacity=70); /*IE滤镜，透明度50%*/
                -moz-opacity:0.7; /*Firefox私有，透明度50%*/
                opacity:0.7;/*其他，透明度50%*/
            }
            .spot_edit:hover{
                background-position: 0 -40px;
            }
            .spot_del{
                width: 40px; height: 40px; overflow: hidden; background: #f00; right: -50px; top: 128px; cursor: pointer;
                position: absolute; background: url(__PUBLIC__/member/images/common/sp_del.png); display: block;
                filter:alpha(opacity=70); /*IE滤镜，透明度50%*/
                -moz-opacity:0.7; /*Firefox私有，透明度50%*/
                opacity:0.7;/*其他，透明度50%*/
            }
            .spot_del:hover{
                background-position: 0 -40px;
            }
            .chengbox{
                width: auto; height: 24px; overflow: hidden; border:1px solid #f7db99; border-radius : 5px; text-indent: 10px;
                background: #fffbf3;margin: 5px; font: 12px/24px "微软雅黑"; color: #FFA900; cursor: default;
            }
        </style>
    </head>
    <body>
        <?php echo W("Bg");?>
        <div id="upmain">
            <div class="main">
                <div class="main_head">
                    <div class="main_head_left"></div>
                    <div class="main_head_right"></div>
                    <div class="main_head_main">
                        <div class="title">导航样式管理</div>
                        <div title="关闭" onclick="DoNote('确认返回功能首页？','<?php echo U('main/index');?>');" class="close"></div>
                    </div>
                </div>
                <div class="main_mid">
                    <div class="main_mid_left"></div>
                    <div class="main_mid_right"></div>
                    <div class="main_mid_main">
                        <div class="pano_menu">
                            <a href="<?php echo U('daohang/manage');?>" class="pano_menu_bottom">系统导航</a>
                            <a class="pano_menu_bottom me">我的导航</a>
                        </div>
                        <div class="none_main">
                            <div class="action_main" style="background:  #f3f3f3;">
                                <div class="pano_table">
									<a href="<?php echo U('self_add');?>" class="button_add">添加导航样式</a>
                                    <?php if(is_array($selfrow)): $i = 0; $__LIST__ = $selfrow;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$self): $mod = ($i % 2 );++$i;?><div class="spot_box">
                                            <a href="<?php echo U('self_edit',array('id'=>$self['id']));?>" class="spot_edit"></a>
                                            <a href="<?php echo U('self_del',array('id'=>$self['id']));?>" class="spot_del"></a>
                                            <div class="spot_cube"><img src="<?php echo CC('web_root'); echo ($self["file"]); ?>" onload="photocenterin(this,160,160);" /></div>
                                            <div class="spot_title"><?php echo ($self["bgname"]); ?><br><?php echo ($self["width"]); ?>*<?php echo ($self["height"]); ?></div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main_foot">
                    <div class="main_foot_left"></div>
                    <div class="main_foot_right"></div>
                    <div class="main_foot_main"></div>
                </div>
            </div>
        </div>
    </body>
</html>