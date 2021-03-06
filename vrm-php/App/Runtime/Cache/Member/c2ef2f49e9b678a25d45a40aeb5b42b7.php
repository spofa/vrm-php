<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="__PUBLIC__/member/style/common.css" media="screen"/>
        <script type="text/javascript" src="__PUBLIC__/common/js/jquery.js"></script>
        <script type="text/javascript" src="__PUBLIC__/common/js/common.js"></script>
        <script type="text/javascript" src="__PUBLIC__/pano/pano.js"></script>
        <?php echo W("Easyui");?>
        <?php echo W("Uploader");?>
        <script type="text/javascript">
            var playing = 0;
            var pause = 0;
            $(document).ready(function(){
                $('.dd').tooltip({
                    position: 'top'
                });
            });
        </script>
        <style type="text/css">
            .chengbox{
                width: auto; height: 24px; overflow: hidden; border:1px solid #f7db99; border-radius : 5px; text-indent: 10px;
                background: #fffbf3;margin: 5px; font: 12px/24px "微软雅黑"; color: #FFA900; cursor: default;
            }
            .uistore{
                overflow: hidden;
            }
            .lubox{
                width: 360px; height: 105px; overflow: hidden; float: left; border-radius: 4px;
                border:1px solid #bbb; background: #fafafa; margin: 5px;
            }
            .lubox .top{
                width: 360px; height: 60px; overflow: hidden;
            }
            .lubox .down{
                width: 360px; height: 40px; overflow: hidden;
            }
            .info_head{
                width: 48px; height: 22px; overflow: hidden; border:1px solid #bbb; border-radius: 4px; cursor: default;
                text-align: center; margin-left: 5px; float: left; background: #eee;
                font: bold 12px/22px "微软雅黑"; color: #666;
            }
            .info_body{
                width: 282px; height: 32px; overflow: hidden; border:1px solid #bbb; border-radius: 4px; cursor: default;
                float: right; margin-right: 6px; font: 12px/16px "微软雅黑"; color: #666; background: #f3f3f3; padding: 3px 5px;
            }
            .lupic{
                width: 50px; height: 50px; overflow: hidden; border-radius: 4px; float: left;
                background: url(__PUBLIC__/member/images/pano/uigroup.jpg) no-repeat; margin-top: 5px; margin-left: 5px;
            }
            .lutitle{
                width: 160px; height: 48px; overflow: hidden; float: left; margin-top: 5px; margin-left: 5px; border:1px solid #bbb; border-radius: 4px; cursor: default;
            }

            .lutb{
                width: 60px; height: 48px; overflow: hidden; float: left; margin-top: 5px; margin-left: 5px; border:1px solid #bbb; border-radius: 4px; cursor: default;
            }
            .lutop{
                width: auto; height: 24px; overflow: hidden; background: #ddd; text-align: center;
                font: bold 12px/24px "微软雅黑"; color: #333;
            }
            .ludown{
                width: auto; height: 24px; overflow: hidden; background: #f3f3f3; text-align: center;
                font: 12px/24px "微软雅黑"; color: #555;
            }
            .lubtnbox{
                width: 60px; height: 60px; overflow: hidden; float: left; margin-top: 2px; margin-left: 5px;
            }
            .lubtnbox a{
                height: 20px; overflow: hidden; background: #f3f3f3; border:1px solid #999; display: block; border-radius: 4px; text-decoration: none;
                text-align: center;font: 12px/20px "微软雅黑"; color: #555; margin-top: 4px;
            }
            .lubtnbox a:hover{
                background: #666; border-color: #666; color: #fff;
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
                        <div class="title">UI模块管理</div>
                        <div title="关闭" onclick="DoNote('确认返回功能首页？','<?php echo U('main/index');?>');" class="close"></div>
                    </div>
                </div>
                <div class="main_mid">
                    <div class="main_mid_left"></div>
                    <div class="main_mid_right"></div>
                    <div class="main_mid_main">
                        <div class="pano_menu">
                            <span class="pano_menu_bottom me">自定义UI</span>
                            <a href="<?php echo U('sysindex');?>" class="pano_menu_bottom">系统默认UI</a>
                        </div>
                        <div class="none_main">
                            <div class="action_main" style="background:  #f3f3f3;">
                                <a href="<?php echo U('add');?>" class="button_add">添加新UI</a>
                                <div class="pano_table">
                                    <div class="chengbox">添加UI，在制作时调用！</div>
                                    <div class="uistore">
                                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uirow): $mod = ($i % 2 );++$i;?><div class="lubox">
                                                <div class="top">
                                                    <div class="lupic"></div>
                                                    <div class="lutitle">
                                                        <div class="lutop">UI名称</div>
                                                        <div class="ludown"><?php echo ($uirow["title"]); ?></div>
                                                    </div>
                                                    <div class="lutb">
                                                        <div class="lutop">适用</div>
                                                        <div class="ludown"><?php echo ($uirow["devices"]); ?></div>
                                                    </div>
                                                    <div class="lubtnbox">
                                                        <a href="<?php echo U('main',array('uid' => $uirow['id']));?>">修改</a>
                                                        <a href="#" class="delme" data-info="确认删除吗？" data-url="<?php echo U('main_del',array('uid' => $uirow['id']));?>">删除</a>
                                                    </div>
                                                </div>
                                                <div class="down">
                                                    <div class="info_head">注释</div>
                                                    <div class="info_body"><?php echo ($uirow["info"]); ?></div>
                                                </div>
                                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
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