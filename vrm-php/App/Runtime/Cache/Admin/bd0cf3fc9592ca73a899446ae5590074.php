<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link href="__PUBLIC__/admin/style/common.css" rel="stylesheet" type="text/css" />
        <script src="__PUBLIC__/common/js/jquery.js" language="javascript" type="text/javascript"></script>
        <script src="__PUBLIC__/common/js/common.js" language="javascript" type="text/javascript"></script>
        <script language="javascript" type="text/javascript">
            //反选
            function ReSel(){
                var myform = document.form1;
                for(i=0;i<myform.tables.length;i++){
                    if(myform.tables[i].checked) myform.tables[i].checked = false;
                    else myform.tables[i].checked = true;
                }
            }

            //全选
            function SelAll(){
                var myform = document.form1;
                for(i=0;i<myform.tables.length;i++){
                    myform.tables[i].checked = true;
                }
            }

            //取消
            function NoneSel(){
                var myform = document.form1;
                for(i=0;i<myform.tables.length;i++){
                    myform.tables[i].checked = false;
                }
            }
            function database(){
                var myform = document.form1;
                var allSel="";
                var max = 0;
                if(myform.tables.value) {
                    max = 1;
                    allSel = myform.tables.value;
                } else{
                    for(i=0;i<myform.tables.length;i++){
                        if(myform.tables[i].checked){
                            max++;
                            if(allSel==""){
                                allSel=myform.tables[i].value;
                            }else{
                                allSel=allSel+","+myform.tables[i].value;
                            }
                        }
                    }
                }
                $("#tbname").val(allSel);
                var tbd = 1;
                if(myform.isstruct.checked == false){
                    tbd = 0;
                }
                $("#dbt").val(tbd);
                $("#max").val(max);
                basestart();
            }
            function basestart(){
                $("#showbox").html("开始数据备份！");
                $.ajax({
                    url:"<?php echo U('database/savedata');?>",
                    type:"POST",
                    dataType:"script",
                    data:{
                        db:$("#tbname").val(),
                        dbt:$("#dbt").val(),
                        dopost:"start"
                    }
                });
            }
            function basetb(){
                $("#showbox").html("正在备份表结构数据！");
                $.ajax({
                    url:"<?php echo U('database/savedata');?>",
                    type:"POST",
                    dataType:"script",
                    data:{
                        db:$("#tbname").val(),
                        dbt:$("#dbt").val(),
                        dopost:"tb"
                    }
                });
            }
            function basedb(n){
                $.ajax({
                    url:"<?php echo U('database/savedata');?>",
                    type:"POST",
                    dataType:"script",
                    data:{
                        db:$("#tbname").val(),
                        dbt:$("#dbt").val(),
                        dopost:"db",
                        now:n,
                        max:$("#max").val()
                    }
                });
            }
        </script>
    </head>
    <body>
        <input type="hidden" id="tbname" value="" />
        <input type="hidden" id="max" value="" />
        <input type="hidden" id="dbt" value="" />
        <div id="indexmian">
            <div id="indextitle">数据库管理-备份 </div>
            <div id="indexmain">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D6D6D6" align="center">
                    <tr>
                        <td height="32"  class="td_title td_head">
                            <span style="text-align: right;"><input type="button" onclick="window.location.href = '<?php echo U('database/bak');?>';" value="数据还原" class="btn2"/></span>
                        </td>
                    </tr>
                </table>
                <form name="form1" method="post">
                    <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D6D6D6">
                        <tr class="tr_white">
                            <td height="26" colspan="8"  style="padding-left: 10px;"><b>默认系统表：</b></td>
                        </tr>
                        <tr class="tr_hui"align="center">
                            <td height="26" width="5%">选择</td>
                            <td width="20%">表名</td>
                            <td width="8%">记录数</td>
                            <td width="17%">操作</td>
                            <td width="5%">选择</td>
                            <td width="20%">表名</td>
                            <td width="8%">记录数</td>
                            <td width="17%">操作</td>
                        </tr>
                        <?php echo ($syshtml); ?>
                        <tr class="tr_white">
                            <td height="26" colspan="8"  style="padding-left: 10px;"><b>其它数据表：</b></td>
                        </tr>
                        <?php echo ($otherhtml); ?>
                        <tr class="tr_white">
                            <td height="28" colspan="8" class="td_p8">
                                <input name="b1" type="button" id="b1" class="btn1" onClick="SelAll();" value="全选" />
                                <input name="b2" type="button" id="b2" class="btn1" onClick="ReSel();" value="反选" />
                                <input name="b3" type="button" id="b3" class="btn1" onClick="NoneSel();" value="取消" />
                            </td>
                        </tr>
                        <tr class="tr_white">
                            <td height="24" class="td_p8" colspan="8"><b>数据备份选项：</b></td>
                        </tr>
                        <tr align="center" class="tr_white">
                            <td height="50" colspan="8">
                                当前数据库版本： <?php echo ($mysql_version); ?>
                                <input name="isstruct" type="checkbox" class="np" id="isstruct" value="1" checked='1' />
                                备份表结构信息
                                <input type="button" onclick="database();" value="提交" class="btn1" />
                            </td>
                        </tr>
                        <tr class="tr_white" align="center" height="40">
                            <td height="24" colspan="8" id="showbox"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>