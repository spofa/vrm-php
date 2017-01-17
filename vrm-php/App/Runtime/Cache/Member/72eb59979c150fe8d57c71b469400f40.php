<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="__PUBLIC__/member/style/common.css" media="screen"/>
        <script type="text/javascript" src="__PUBLIC__/common/js/jquery.js"></script>
        <script type="text/javascript" src="__PUBLIC__/common/js/common.js"></script>
        <?php echo W("Easyui");?>
        <?php echo W("Boluoui");?>
        <?php echo W("Uploader");?>
        <script type="text/javascript">
            function checksb(){
                boluo_loadding("正在提交中...");
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
                $("#one2six").uploader("image","one2six");
                $("#ball2six").uploader("image","ball2six");
            });
            var loadbar_num = 0;
            var loadon = 0;
            function one2six(data){   
                loadon = 1;
                boluo_showloadbar("条形图转化进度");
                $.ajax({
                    url:"<?php echo U('ajax/pano');?>",
                    type:"POST",
                    dataType:"script",
                    data:{
                        dopost:"one2six",
                        photofile:data
                    }
                });
            }
            function ball2six(data){
                loadon = 1;
                boluo_showloadbar("球形图转化进度");
                $.ajax({
                    url:"<?php echo U('ajax/pano');?>",
                    type:"POST",
                    dataType:"script",
                    data:{
                        dopost:"ball2six",
                        photofile:data
                    }
                });
            }
            function one2sixdo(imgtype,linetype,n){                
                $.ajax({
                    url:"<?php echo U('ajax/pano');?>",
                    type:"POST",
                    dataType:"script",
                    data:{
                        dopost:"one2sixdo",
                        imgtype:imgtype,
                        linetype:linetype,
                        n:n
                    }
                });
            }
            function ball2sixdo(n){                
                $.ajax({
                    url:"<?php echo U('ajax/pano');?>",
                    type:"POST",
                    dataType:"script",
                    data:{
                        dopost:"ball2sixdo",
                        n:n
                    }
                });
            }
            function loadbar(){
                if(loadon == 1){
                    loadbar_num++;
                    boluo_loadbar(loadbar_num,6);
                    if(loadbar_num == 6){
                        loadon = 0;
                    }
                }
            }

            function getlookat(){
                var hlookat = $("#hlookat").val();
                var vlookat = $("#vlookat").val();
                var link = "<?php echo UOne('lookat',array('view_id'=>$view_id));?>";
                for(i=0;i<6;i++){
                    link += "&pic"+i+"="+$(".pano_box").eq(i).children("img").attr("src");
                }
                link += "&hlookat="+hlookat + "&vlookat="+vlookat;
                openwin("获取初始方向",link,720,500);
            }
            function targetback(h,v){
                $("#hlookat").val(h);
                $("#vlookat").val(v);
                closewin();
            }
            $(function(){
                $("#musicup").uploader("audio","musicback");
            });
            function musicback(data){
                $("#musicfile").val(data);
            }
        </script>
        <style>
            .thumbbox{
                width: 200px; height: 100px; overflow: hidden; margin-right: 10px; border:1px solid #ccc; box-shadow: 2px 2px 2px #eee;
                background: url(__PUBLIC__/member/images/pano/quanjingbg.png) no-repeat; float: left; cursor: pointer;
            }
            .pano_box{
                width: 100px; height: 100px; overflow: hidden; margin-right: 10px; border:1px solid #ccc; box-shadow: 2px 2px 2px #eee;
                background: url(__PUBLIC__/member/images/pano/quanjingbg.png) no-repeat; float: left; cursor: pointer;
            }
            .pano_font{
                width: 102px; height: 20px; overflow: hidden; margin-right: 10px; color: #206A9B;
                float: left; cursor: default; text-align: center; font: bold 14px/20px "微软雅黑";
            }
            .proxy{
                width: 100px; height: 100px; overflow: hidden; background: #f00;
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
                        <div title="关闭" data-url="<?php echo U('main/index');?>" data-info="确认返回功能首页" class="close delme"></div>
                        <div title="返回上级" onclick="LinkTo('<?php echo ($backurl); ?>');" class="goback"></div>
                    </div>
                </div>
                <div class="main_mid">
                    <div class="main_mid_left"></div>
                    <div class="main_mid_right"></div>
                    <div class="main_mid_main">
                        <div class="pano_menu">
                            <?php echo W("Panomenu",array("pano_id"=>$pano_id,"num"=>2));?>
                        </div>
                        <div class="none_main">
                            <div class="action_main">
                                <div class="action_title"><a href="<?php echo U('index',array('pano_id'=>$pano_id));?>">全景场景</a> - 添加</div>
                                <form name="form1" action="" onsubmit="return checksb();" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="dopost" value="save" />
                                    <input type="hidden" name="pano_id" value="<?php echo ($pano_id); ?>" />
                                    <table width="100%" border="0" cellpadding="4" cellspacing="1" align="center">
                                        <tr class="tr_white" height="40">
                                            <td align="right" width="120"><b>全景场景名称：</b></td>
                                            <td align="left">
                                                <input type="text" id="title" name="title" sbname="全景场景名称" class="inputcube cs"/>
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="20">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right" width="120">
											<b>场景缩略图：</b><br><b>建议尺寸(500*500)</b>
											</td>
                                            <td align="left">
                                                <div class="thumbbox">
                                                    <img id="thumb_pic" src="__PUBLIC__/member/images/pano/pano.jpg" onload="swichimg2w(this,200);"/>
                                                </div>
                                                <input type="hidden" id="thumb" name="thumb" value="__PUBLIC__/member/images/pano/pano.jpg" />
                                            </td>
                                        </tr>
                                        <?php echo uploadSend(".thumbbox","#thumb","#thumb_pic");?>

                                        <tr class="tr_white" height="20">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right" width="120"><b>快捷上传：</b></td>
                                            <td align="left">
                                                <input type="button" id="one2six" class="btn" value="条形图转化" />
                                                <?php if(($os) == "windows"): ?><input type="button" id="ball2six" class="btn" value="球形图转化" /><?php endif; ?>
												<span style="margin-left:30px;"><a style="color:blue;text-decoration:underline;" href="http://www.360vr.cn/ptgui/" target="_blank">如何制作条形图</a></span>
                                            </td>
                                        </tr>

                                        <tr class="tr_white" height="40">
                                            <td align="right" width="110"><b>全景图上传：</b></td>
                                            <td align="left">
                                                <div class="pano_box" id="front_pic"></div>
                                                <input id="front" name="front" class="cs" type="hidden" sbname="前视图" value="" />
                                                <?php echo uploadFill("#front_pic","#front","#front_pic");?>

                                                <div class="pano_box" id="back_pic"></div>
                                                <input id="back" name="back" class="cs" type="hidden" sbname="后视图" value="" />
                                                <?php echo uploadFill("#back_pic","#back","#back_pic");?>

                                                <div class="pano_box" id="left_pic"></div>
                                                <input id="left" name="left" class="cs" type="hidden" sbname="左视图" value="" />
                                                <?php echo uploadFill("#left_pic","#left","#left_pic");?>

                                                <div class="pano_box" id="right_pic"></div>
                                                <input id="right" name="right" class="cs" type="hidden" sbname="右视图" value="" />
                                                <?php echo uploadFill("#right_pic","#right","#right_pic");?>

                                                <div class="pano_box" id="up_pic"></div>
                                                <input id="up" name="up" class="cs" type="hidden" sbname="上视图" value="" />
                                                <?php echo uploadFill("#up_pic","#up","#up_pic");?>

                                                <div class="pano_box" id="down_pic"></div>
                                                <input id="down" name="down" class="cs" type="hidden" sbname="底视图" value="" />
                                                <?php echo uploadFill("#down_pic","#down","#down_pic");?>
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="20">
                                            <td align="right" width="120"></td>
                                            <td align="left">
                                                <div class="pano_font">前</div>
                                                <div class="pano_font">后</div>
                                                <div class="pano_font">左</div>
                                                <div class="pano_font">右</div>
                                                <div class="pano_font">上</div>
                                                <div class="pano_font">下</div>
                                            </td>
                                        </tr>

                                        <tr class="tr_white" height="40">
                                            <td align="right" width="120"><b>镜头景深FOV：</b></td>
                                            <td align="left">
                                                <input type="text" id="fov" name="fov" value="80" class="shortinputcube"/>
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right" width="120"><b>景深FOV限制：</b></td>
                                            <td align="left">
                                                <input type="text" id="fovmin" name="fovmin" value="60" class="shortinputcube"/> 至
                                                <input type="text" id="fovmax" name="fovmax" value="150" class="shortinputcube"/>
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right" width="120"><b>镜头初始方向：</b></td>
                                            <td align="left">
                                                <input type="text" id="hlookat" name="hlookat" value="0" class="shortinputcube"/>
                                                <input type="text" id="vlookat" name="vlookat" value="0" class="shortinputcube"/>
                                                <input type="button" id="getlook" name="getlook" class="btn3" onclick="getlookat();" value="抓取方向" />
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="20">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right"><b>开启镜头限制：</b></td>
                                            <td>
                                                <span class="onoff" target="open_limit" value="0"></span>
                                                <input type="hidden" id="open_limit" name="open_limit" value="0" />
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right" width="100"><b>限制方式：</b></td>
                                            <td align="left">
                                                <select name="limitview" id="limitview" class="selectstyle">
                                                    <option value="lookat" selected="true">视角中心</option>
                                                    <option value="range" >视野边缘</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right"><b>横向最小角度：</b></td>
                                            <td>
                                                <input type="text" id="hlookatmin" name="hlookatmin" style="width: 60px;" value="0" class="inputstyle"/>
                                                <input type="button" class="btn" value="抓取" onclick="getHat();" />
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right"><b>横向最大角度：</b></td>
                                            <td>
                                                <input type="text" id="hlookatmax" name="hlookatmax" style="width: 60px;" value="0" class="inputstyle"/>
                                                <input type="button" class="btn" value="抓取" onclick="getHat();" />
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right"><b>纵向最小角度：</b></td>
                                            <td>
                                                <input type="text" id="vlookatmin" name="vlookatmin" style="width: 60px;" value="-90" class="inputstyle"/>
                                                <input type="button" class="btn" value="抓取" onclick="getVat();" />
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right"><b>纵向最大角度：</b></td>
                                            <td>
                                                <input type="text" id="vlookatmax" name="vlookatmax" style="width: 60px;" value="90" class="inputstyle"/>
                                                <input type="button" class="btn" value="抓取" onclick="getVat();" />
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="20">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right"><b>开启场景音效：</b></td>
                                            <td>
                                                <span class="onoff easyui-tooltip dd" title="场景音效开关" target="openmusic" value="0"></span>
                                                <input type="hidden" id="openmusic" name="openmusic" value="0" />
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right"><b>音频MP3文件：</b></td>
                                            <td>
                                                <input type="text" id="musicfile" name="musicfile" value="<?php echo ($viewrow['musicfile']); ?>" class="longinputcube"/>
                                                <input type="button" class="btn1" id="musicup" value="点击上传" />
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right"><b>播放次数：</b></td>
                                            <td>
                                                <input type="text" id="musictimes" name="musictimes" value="0" class="shortinputcube"/>（如果要循环播放，请填0）
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right"><b>音量大小：</b></td>
                                            <td>
                                                <input type="text" id="musicvolume" name="musicvolume" value="1" class="shortinputcube"/>（0~1的小数）
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="20">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="tr_white" height="40">
                                            <td align="right" width="120"></td>
                                            <td align="left">
                                                <input type="submit" class="blackbutton" value="提交" />
                                            </td>
                                        </tr>
                                        <tr class="tr_white" height="10">
                                            <td colspan="2"></td>
                                        </tr>
                                    </table>
                                </form>
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