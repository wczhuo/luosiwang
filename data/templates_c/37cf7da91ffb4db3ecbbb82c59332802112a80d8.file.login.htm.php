<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-02 10:42:02
         compiled from "E:\WWW\luosiwang\\app\template\default\public_search\login.htm" */ ?>
<?php /*%%SmartyHeaderCode:13123560deefa106b81-21626391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37cf7da91ffb4db3ecbbb82c59332802112a80d8' => 
    array (
      0 => 'E:\\WWW\\luosiwang\\\\app\\template\\default\\public_search\\login.htm',
      1 => 1434681804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13123560deefa106b81-21626391',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_560deefa252c50_81010515',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560deefa252c50_81010515')) {function content_560deefa252c50_81010515($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include 'E:\\WWW\\luosiwang\\app\\include\\libs\\plugins\\function.url.php';
?><!---��ǰ��¼--->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/tck_logoin.css" type="text/css">
<div style="display:none" id="onlogin">
  <div class="logoin_tck_left" style="margin-top: 25px;padding-left: 25px;">
    <div class="logoin_tck_text" > <i class="logoin_tck_text_icon"></i>
      <input type="text" id="login_username" placeholder="�������û���" tabindex="1" name="username" class="logoin_tck_text_t1">
    </div>
    <div class="logoin_tck_text" style="margin-top:20px;"> <i class="logoin_tck_text_icon logoin_tck_text_icon_p"></i>
      <input type="password" id="login_password" tabindex="2" name="password" placeholder="����������"class="logoin_tck_text_t1">
    </div>
    <div class="logoin_tck_text logoin_tck_text_yzm" style="margin-top:20px;"> <i class="logoin_tck_text_icon logoin_tck_text_icon_y"></i>
      <input id="login_authcode" type="text" tabindex="3"  maxlength="4" name="authcode" class="logoin_tck_text_t1" placeholder="��������֤��"  style="width:80px;">
    </div>
    <div class=" logoin_tck_text_yzm_r" style="margin-top: 20px;"> <img id="vcode_img" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" onclick="check_code()" style="margin-right:5px; margin-left:5px;cursor:pointer;">&nbsp;<a href="javascript:void(0);" onclick="check_code()">������?</a> </div>
    <div class="Pop-up_logoin_list">
      <div id="msg"></div>
    
    <input type="hidden" id="login_usertype" />
    <input id="loginsubmit" class="logoin_tck_bth_sub" type="button" name="loginsubmit" onclick="checkajaxlogin()" value="��¼" ></div>
  </div>
  <div class="logoin_tck_right" style="margin-top: 35px;padding-left: 20px;">
    <div class="logoin_tck_reg">��ûû���˺ţ�<a href="" id="onregister" class="Orange">����ע��</a></div>
  </div>
</div>
<?php echo '<script'; ?>
>
function showlogin(usertype){
	$("#login_usertype").val(usertype);
	if(usertype==1 || usertype==""){
		var url='<?php echo smarty_function_url(array('m'=>'register','usertype'=>1),$_smarty_tpl);?>
';
	}else if(usertype==2){
		var url='<?php echo smarty_function_url(array('m'=>'register','usertype'=>2),$_smarty_tpl);?>
';
	}
	$("#onregister").attr("href",url);
	$.layer({
		type : 1,
		title :'���ٵ�¼', 
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['480px','300px'],
		page : {dom :"#onlogin"}
	});
}
function checkajaxlogin(){
	var username = $.trim($("#login_username").val());
	var password = $.trim($("#login_password").val());
	var authcode = $.trim($("#login_authcode").val());
	var usertype = $.trim($("#login_usertype").val());
	if(username == "" || password=="" || authcode==""){
		layer.closeAll();
		layer.msg('��������д�û��������룬��֤�룡', 2, 8,function(){showlogin(usertype);});return false;
	}
	$.post("<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
",{comid:1,username:username,password:password,authcode:authcode,usertype:usertype},function(data){
		var data=eval('('+data+')');
		if(data.error==1){
			location.reload();
		}else{
			layer.msg(data.msg, 2, 8);return false;
		}
	});
}
<?php echo '</script'; ?>
><?php }} ?>