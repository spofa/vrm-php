<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=100"/>
        <title>系统配置参数</title>
        <link href="__PUBLIC__/admin/style/common.css" rel="stylesheet" type="text/css" />
        <script src="__PUBLIC__/common/js/jquery.js" language="javascript" type="text/javascript"></script>
        <script language="javascript" type="text/javascript">
            function showadd(){
                $("#addvar").show();                
            }
            function ShowConfig(n){
                n--;
                $(".result_back_box").hide();
                $(".result_back_box").eq(n).show();
            }
            $(document).ready(function(){
                $(".result_back_box").first().show();
            });
        </script>
    </head>
    <body>
        <div class="main">
            <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6" align="center">
                <tr>
                    <td height="30" class="td_title td_p8"><b>系统配置选择：</b></td>
                </tr>
                <tr class="tr_hui">
                    <td height="30" align="center"><?php echo ($config_html); ?> | <a onclick="showadd()">自定义参数</a></td>
                </tr>      
                <tr id="addvar" style="display: none;">
                    <td height="24" bgcolor="#ffffff" align="center" class="ptopbom8">
                        <form name="fadd" action="" method="post">
                            <input type='hidden' name='dopost' value='add'/>
                            <table width="98%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="12%" height="26">变量名称：</td>
                                    <td width="38%" align="left"><input name="nvarname" type="text" id="nvarname" class="npvar" style="width:80%" /></td>
                                    <td width="12%" align="center">变量值：</td>
                                    <td width="38%" align="left"><input name="nvarvalue" type="text" id="nvarvalue" class="npvar" style="width:80%" /></td>
                                </tr>
                                <tr>
                                    <td width="10%" height="26">变量类型：</td>
                                    <td colspan='3' align="left"><input name="vartype" type="radio"  value="string" class='np' checked='checked' />
                                        文本
                                        <input name="vartype" type="radio"  value="number" class='np' />
                                        数字
                                        <input type="radio" name="vartype" value="bool" class='np' />
                                        布尔(Y/N)
                                        <input type="radio" name="vartype" value="bstring" class='np' />
                                        多行文本 </td>
                                </tr>
                                <tr>
                                    <td height="26">参数说明：</td>
                                    <td align="left"><input type="text" name="varmsg"  id="varmsg" class="npvar" style="width:80%" /></td>
                                    <td align="center">所属组：</td>
                                    <td align="left">
                                        <select name="vargroup"><?php echo $config_select;?></select>
                                        <input type="submit" name="Submit" value="保存变量" class="btn1" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:10px" bgcolor="#D6D6D6" align="center">
                <tr>
                    <td height="32" align="left" class="td_title td_head">
                        <b>系统配置参数：</b>
                    </td>
                </tr>                
            </table>
            <form action="" method="post" name="form1" style="overflow: hidden; margin: 0px;">
                <input type="hidden" name="dopost" value="save"/>
                <?php echo ($config_tb); ?>
            </form>
            <table width="100%" border="0" cellspacing="1" cellpadding="1"  style="border:1px solid #cfcfcf;border-top:none;">
                <tr>
                    <td height="50" colspan="3">
                        <table width="100%" border="0" cellspacing="1" cellpadding="1">
                            <tr>
                                <td width="11%">&nbsp;</td>
                                <td width="11%"><input type="button" class="btn1" value="确定" onClick="document.form1.submit()"/></td>
                                <td width="78%"><input type="button" class="btn1" value="重置" onClick="document.form1.reset()"/></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>