<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link href="__PUBLIC__/admin/style/common.css" rel="stylesheet" type="text/css" />
        <script src="__PUBLIC__/common/js/jquery.js" language="javascript" type="text/javascript"></script>
        <script src="__PUBLIC__/common/js/common.js" language="javascript" type="text/javascript"></script>
        <style>
            .databag{
                width: 180px; height: 146px; overflow: hidden; float: left; display: block; margin: 5px;
                border:1px solid #dbdbdb; border-radius: 5px; padding: 15px 5px;
            }
            .databag:hover{
                border-color: #009a70; cursor: pointer;
            }
            .databagimg{
                width: 120px; height: 120px; overflow: hidden; margin: 0 auto;
            }
            .databagtxt{
                height: 20px; overflow: hidden; text-align: center; font: bold 12px/24px "微软雅黑"; color: #666; margin-top: 6px;
            }
        </style>
    </head>
    <body>
        <div id="indexmian">
            <div id="indextitle">数据库管理-还原 </div>
            <div id="indexmain">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D6D6D6" align="center">
                    <tr>
                        <td height="32"  class="td_title td_head">
                            <span style="text-align: right;"><input type="button" onclick="window.location.href = '<?php echo U('database/index');?>';" value="数据备份" class="btn2"/></span>
                        </td>
                    </tr>
                </table>
                <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6">
                    <tr class="tr_white">
                        <td height="26" style="padding-left: 10px;"><b>恢复数据包：</b></td>
                    </tr>
                    <tr class="tr_white">
                        <td height="26" style="padding: 5px;">
                    <?php if(is_array($bag)): foreach($bag as $key=>$vo): ?><a href="<?php echo U('database/baklist',array('dir'=>$vo));?>" class="databag">
                            <div class="databagimg"><img src="__PUBLIC__/admin/images/database/dbbag.jpg" width="120" height="120" /></div>
                            <div class="databagtxt">日期：<?php echo (date('Y-m-d H:i:s',$vo)); ?></div>
                        </a><?php endforeach; endif; ?>
                    </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>