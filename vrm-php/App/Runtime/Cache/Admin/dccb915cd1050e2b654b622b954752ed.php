<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>文件管理器</title>
        <link href="__PUBLIC__/admin/style/common.css" rel="stylesheet" type="text/css"/>
        <script language="javascript">
            function Post()
            {
                if (document.form1.filename.value=="")
                {
                    alert("文件名不能为空。");
                    document.form1.filename.focus();
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div class="main">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ECFAD3" style="margin-bottom:8px;">
                <tr>
                    <td height="28" style="border:1px dotted #BFD67C;padding-left:10px;" class="td_title">
                        <a href='<?php echo UOne("filemaster/index");?>&activepath=<?php echo ($activepath); ?>'><b>文件管理</b></a> &gt;&gt; <b>修改/新建文件</b>
                    </td>
                </tr>
            </table>
            <form method="POST" action="<?php echo UOne('filemaster/done');?>" name=form1 onSubmit="return Post()">
                <input type="hidden" name="fmdo" value="edit" />
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#cfcfcf">
                    <tr>
                        <td width="100%" bgcolor='#ffffff'>
                            <table width='100%'  border='0' cellpadding='3' cellspacing='1' bgcolor='#cfcfcf'>
                                <tr>
                                    <td colspan='2' class="td_title" height='26' style="padding-left:10px;">
                                        <font color='#666600'><b>修改/新建文件：</b></font>
                                    </td>
                                </tr>
                                <tr class="tr_white">
                                    <td>工作目录</td>
                                    <td>
                                        <input name='activepath' size='40' class='alltxt' value="<?php echo ($activepath); ?>" />
    			（空白表示根目录 ，不允许用 “..” 形式的路径）
                                    </td>
                                </tr>
                                <tr class="tr_white">
                                    <td>文件名称</td>
                                    <td>
                                        <input name=filename size=40 class='alltxt' value="<?php echo ($filename); ?>" />
    		（不允许用 “..” 形式的路径）
                                    </td>
                                </tr>
                                <tr bgcolor='#FFFFFF'>
                                    <td colspan='2'>
		<?php echo ($contentView); ?>
                                    </td>
                                </tr>
                                <tr class="tr_white">
                                    <td colspan='2' height="36" align='center'>
                                        <input type=submit value="  保 存  " name='B1' class="btn1" />
                                        &nbsp;
                                        <input type=reset value="取消修改" name='B2' class="btn1" />
                                        &nbsp;
                                        <input type=button value="不理返回" name='B4' class="btn1" onClick="javascript:history.go(-1);" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>