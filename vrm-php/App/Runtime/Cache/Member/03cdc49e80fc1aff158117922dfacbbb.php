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
            function checksb(){
                var result = true;
                if(result == true){
                    result = AutoCheckSub(".cs");
                }
                return result;
            }
            $(document).ready(function(){
                onoroff();
                $('.dd').tooltip({
                    position: 'right'
                });
                $('.dd').tooltip({
                    position: 'right'
                });
                $('.leftarrow').tooltip({
                    position: 'top'
                });
                $('.rightarrow').tooltip({
                    position: 'top'
                });
            });
        </script>
        <style>
            .numtext{
                width: 24px; height: 20px; overflow: hidden; background: #ccc; text-align: center; margin-top: 1px; cursor: pointer;
                font: 12px/20px "微软雅黑"; color: #fff; position: absolute; border:1px solid #ccc; border-radius:4px;
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
                        <div class="title">全景项目 - <?php echo ($panorow['title']); ?></div>
                        <div title="关闭" onclick="DoNote('确认返回功能首页？','<?php echo U('main/index');?>');" class="close"></div>
                    </div>
                </div>
                <div class="main_mid">
                    <div class="main_mid_left"></div>
                    <div class="main_mid_right"></div>
                    <div class="main_mid_main">
                        <div class="pano_menu">
                            <?php echo W("Panomenu",array("pano_id"=>$pano_id,"num"=>3));?>
                        </div>
                        <div class="none_main">
                            <div class="action_main" style="background:  #f3f3f3;">
                                <div class="pano_table">
								<?php if(!empty($viewlist)): if(is_array($viewlist)): $i = 0; $__LIST__ = $viewlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ovo): $mod = ($i % 2 );++$i;?><div class="pano_cube">
                                            <div class="pano_up">
                                                <div class="pic"><img src="<?php echo CC('web_root'); echo ($ovo["thumb"]); ?>" onload="photocenterout(this,200,100);" /></div>
                                                <div class="ufo">
                                                    <a href="<?php echo U('roamview',array('view_id'=>$ovo['id']));?>" class="ufo_previewbox">
                                                        <div class="ufo_ico4"></div>
                                                        <div class="ufo_txt">漫游</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="pano_down">
                                                <div class="numtext"><?php echo ($ovo["len"]); ?></div>
                                                <div class="midonlytext"><?php echo ($ovo["title"]); ?></div>
                                            </div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
								<?php else: ?>
								<div class="page_msg mini plugin_update_tips">
									<div class="inner group">尚未添加任何场景&nbsp;&nbsp;请先<a href="/member/view/add/pano_id/<?php echo ($pano_id); ?>" class="a_detail">创建场景</a></div>
								</div><?php endif; ?>
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