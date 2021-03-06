<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>跳转提示</title>
        <link rel="stylesheet" href="__PUBLIC__/member/style/jump.css" media="screen"/>
        <script type="text/javascript" src="__PUBLIC__/common/js/jquery.js"></script>
    </head>
    <body>
        <?php echo W("Bg");?>
        <div id="upmain">
            <div class="main">
                <div class="main_head">
                    <div class="main_head_left"></div>
                    <div class="main_head_right"></div>
                    <div class="main_head_main">
                        <?php if(isset($message)): ?><div class="title">小提示</div>
                            <?php else: ?>
                            <div class="title">错误提示</div><?php endif; ?>
                    </div>
                </div>
                <div class="main_mid">
                    <div class="main_mid_left"></div>
                    <div class="main_mid_right"></div>
                    <div class="main_mid_main">

                        <!--                            内容正式开始的部分                            -->
                        <div class="webpage">
                            <table width="100%">
                                <tr>
                                    <td height="160" align="center">
                                        <?php if(isset($message)): ?><span class="word"><?php echo($message); ?></span>
                                            <?php else: ?>
                                            <span class="word"><?php echo($error); ?></span><?php endif; ?>
                                        <br/>
                                        <span class="hui">页面自动<a id="href" href="<?php echo($jumpUrl); ?>">跳转</a>，等待时间： <b id="wait"><?php echo($waitSecond); ?></b></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--                            内容正式结束的部分                            -->

                    </div>
                </div>
                <div class="main_foot">
                    <div class="main_foot_left"></div>
                    <div class="main_foot_right"></div>
                    <div class="main_foot_main"></div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            (function(){
                var wait = document.getElementById('wait'),href = document.getElementById('href').href;
                var interval = setInterval(function(){
                    var time = --wait.innerHTML;
                    if(time <= 0) {
                        location.href = href;
                        clearInterval(interval);
                    };
                }, 1000);
            })();
        </script>
    </body>
</html>