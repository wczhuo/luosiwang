<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-03 10:13:26
         compiled from "E:\WWW\luosiwang\app\template\admin\admin_makenews.htm" */ ?>
<?php /*%%SmartyHeaderCode:11433560f39c66b7135-14179871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0635033a6d77bb78e088c7240b74ff88a48d152b' => 
    array (
      0 => 'E:\\WWW\\luosiwang\\app\\template\\admin\\admin_makenews.htm',
      1 => 1434528046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11433560f39c66b7135-14179871',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'type' => 0,
    'rows' => 0,
    'v' => 0,
    'pytoken' => 0,
    'classid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_560f39c70ac519_67384647',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560f39c70ac519_67384647')) {function content_560f39c70ac519_67384647($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/admin_public.js" language="javascript"><?php echo '</script'; ?>
>
<title></title>
</head>
<body class="body_ifm">

<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="admin_Prompt">
<div class="admin_Prompt_span">
    ע�����
    1. ������ȷ��Ŀ¼�п�дȨ�ޣ������޷����ɡ�
    2. ���ӵ�����ʱ�����ӿ�����д <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/ ����·��
</div>
<div class="admin_Prompt_close"></div>
</div>
    <div class="infoboxp_top">
        <?php if ($_smarty_tpl->tpl_vars['type']->value=="once") {?>
            <h6>���ɵ�ҳ��</h6>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=="index") {?>
            <h6>������վ��ҳ</h6>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=="news") {?>
            <h6>����������ҳ</h6>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=="newsclass") {?>
            <h6>�����������</h6>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=="archive") {?>
            <h6>����������ϸҳ</h6>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=="all") {?>
            <h6>һ������</h6>
        <?php }?>
    </div>
<iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
<form target="supportiframe" action="" method="post" >
<?php if ($_smarty_tpl->tpl_vars['type']->value=="once") {?>
<table width="100%" class="table_form table_form_bg">
    <tr>
        <th width="40%">ѡ����Ŀ��</th>
        <td>
        <select id="once_class">
            <option value="0">ȫ��</option>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
            <?php } ?>
        </select>
        </td>
    </tr>
    <tr>
    <td class="ud" align="center" colspan="2">
      <input class="admin_submit6" type="button" id="cache_once" value="���µ�ҳ��"/>&nbsp;&nbsp;
    </td>
  </tr>
  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['type']->value=="all") {?>
    <table width="100%" class="table_form table_form_bg">
            <tr>
                <th width="40%">��ҳ����·����</th>
                <td><input class="input-text" type="text" name="index_url" size="40" value="../index.html"/></td>
            </tr>
            <tr>
				<th width="40%">������ҳ����·����</th>
				<td><input class="input-text" type="text" name="news_url" size="40" value="../news.html"/></td>
			</tr>
        <tr class="admin_table_trbg">
            <td class="ud" align="center" colspan="2">
                <input class="admin_submit4" type="submit" id="madeall" value="һ������"/>&nbsp;&nbsp;
            </td>
          </tr>
		  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
  </table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['type']->value=="index") {?>
    <table width="100%" class="table_form table_form_bg">
            <tr>
                <th width="40%">��ҳ����·����</th>
                <td><input class="input-text" type="text" name="url" size="40" value="../index.html"/></td>
            </tr>
        <tr class="admin_table_trbg">
            <td class="ud" align="center" colspan="2">
                <input class="admin_submit4" type="submit" id='madeindex' name="madeall" value="������ҳ"/>&nbsp;&nbsp;
            </td>
          </tr>
		  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
  </table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['type']->value=="news") {?>
<table target="supportiframe" width="100%" class="table_form table_form_bg " action="">
        <tr>
			<th width="40%">������ҳ����·����</th>
			<td><input class="input-text" type="text" name="url" size="40" value="../news.html"/></td>
		</tr>
    <tr>
    	<td class="ud" align="center" colspan="2">
			<input class="admin_submit8" type="submit" id='madenindex' name="madeall" value="����������ҳ"/>&nbsp;&nbsp;
        </td>
      </tr>
	  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
  </table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['type']->value=="newsclass") {?>
<table width="100%" class="table_form table_form_bg">
    <input id="classid" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['classid']->value;?>
">
        <tr>
			<th width="40%">ѡ����Ŀ��</th>
			<td>
            <select name="" id="group">
            	<option value="all">ȫ��</option>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                <?php } ?>
            </select>
            </td>
		</tr>
    	<tr>
    	<td class="ud" align="center" colspan="2">
		  <input class="admin_submit4" type="button" id="newsclass" value="��������"/>&nbsp;&nbsp;
        </td>
      </tr>
	  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
  </table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['type']->value=="archive") {?>
<table width="100%" class="table_form table_form_bg">
        <tr>
			<th width="40%">ѡ����Ŀ��</th>
			<td>
            <select name="" id="group">
            <option value="0">ȫ��</option>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
            <?php } ?>
            </select>
            </td>
		</tr>
        <tr class="admin_table_trbg">
			<th width="40%">��ʼ��ţ�</th>
			<td><input class="input-text" type="text" id="start_id" size="20" value="0"/>0��ͷ��ʼ</td>
		</tr>
        <tr>
			<th width="40%">������ţ�</th>
			<td><input class="input-text" type="text" id="end_id" size="20" value="0"/>0�����һ��</td>
		</tr>
        <tr class="admin_table_trbg">
			<th width="40%">ÿҳ���ɣ�</th>
			<td><input class="input-text" type="text" id="limit" size="20" value="20"/>ע��ÿҳ��������Ҫ����̫��</td>
		</tr>
    <tr>
    	<td class="ud" align="center" colspan="2">
		  <input class="admin_submit4" type="button" id="archive" value="��������"/>&nbsp;&nbsp;
        </td>
      </tr>
	  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">

  </table>
<?php }?>
</form>
</div>
<input type="hidden" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">

<?php echo '<script'; ?>
>
$(document).ready(function(){
	$("#archive").click(function(){
		var group=$("#group").val();
		var startid=$("#start_id").val();
		var endid=$("#end_id").val();
		var limit=$("#limit").val();
		makearchive(group,startid,endid,limit,"archive",0,'���ڻ�ȡ��������');
	})
	$("#madeall").click(function(){
		var index_url=$("input[name=index_url]").val();
		var news_url=$("input[name=news_url]").val();
		make_all(index_url,news_url,"cache",0,'������������');
	})
	$("#newsclass").click(function(){
		var group=$("#group").val();
		makenewsclass(group,"class",0,'���ڻ�ȡ���������Ϣ');
	});
	$("#madeindex").click(function(){
		var ii = parent.layer.load("��������...",0);
	});
	$("#madenindex").click(function(){
		
		var ii = parent.layer.load("��������...",0);
	});
	$("#cache_once").click(function(){
		var desc=$("#once_class").val();
		var pytoken=$("#pytoken").val();
		var ii = parent.layer.load("��������",0);
		$.post("index.php?m=cache&c=once",{desc:desc,pytoken:pytoken,make:1},function(data){
			if(data==1){
				parent.layer.msg("���ɳɹ���",2,9);
			}
		})
	})
})
function make_all(index,news,type,value,msg){
	if(type!="ok"){
		var ii = parent.layer.load(msg,0);
		var pytoken=$("#pytoken").val();
		$.post("index.php?m=cache&c=all",{action:"makeall",index:index,news:news,type:type,value:value,pytoken:pytoken},function(data){
			var data=eval('('+data+')');
			make_all(index,news,data.type,data.value,data.msg);
		})
	}else{
		parent.layer.close(ii);
		parent.layer.alert(msg,9);
	}
}
function makenewsclass(group,type,value,msg){
	if(type!="ok"){
		var ii = parent.layer.load(msg,0);
		var pytoken=$("#pytoken").val();
		$.post("index.php?m=cache&c=newsclass",{action:"makeclass",group:group,type:type,value:value,pytoken:pytoken},function(data){
			var data=eval('('+data+')');
			makenewsclass(group,data.type,data.value,data.msg);
		})
	}else{
		parent.layer.close(ii);
		parent.layer.alert(msg, 9);
	}
}
function makearchive(group,startid,endid,limit,type,value,msg){
	$("#make_l").html(msg);
	if(type!="ok"){
		var ii = parent.layer.load(msg,0);
		var pytoken=$("#pytoken").val();
		$.post("index.php?m=cache&c=archive",{action:"makearchive",group:group,startid:startid,endid:endid,limit:limit,type:type,value:value,pytoken:pytoken},function(data){
			var data=eval('('+data+')');
			makearchive(group,startid,endid,limit,data.type,data.value,data.msg);
		})
	}else{
		parent.layer.close(ii);
		parent.layer.alert(msg, 9);
	}
}
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>