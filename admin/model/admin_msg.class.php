<?php
/*
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2015 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ����������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
 */
class admin_msg_controller extends common
{
	//���ø߼���������
	function set_search(){
		$search_list[]=array("param"=>"job","name"=>'��Ա����',"value"=>array("1"=>"��ͨ","2"=>"�߼�","3"=>"��ͷ"));
		$lo_time=array('1'=>'����','3'=>'�������','7'=>'�������','15'=>'�������','30'=>'���һ����');
		$search_list[]=array("param"=>"zx","name"=>'��ѯʱ��',"value"=>$lo_time);
		$f_time=array('1'=>'����','3'=>'�������','7'=>'�������','15'=>'�������','30'=>'���һ����');
		$search_list[]=array("param"=>"hf","name"=>'�ظ�ʱ��',"value"=>$f_time);
		$this->yunset("search_list",$search_list);
	}
	function index_action()
	{
		$this->set_search();
		$where=1;
		if($_GET['keyword']!="")
		{
			if($_GET['type']=="1")
			{
				$where.=" and `username` LIKE '%".$_GET['keyword']."%'";
			}elseif($_GET['type']=="2"){
				$where.=" and `job_name` LIKE '%".$_GET['keyword']."%'";
			}elseif($_GET['type']=="3"){
				$where.=" and `com_name` LIKE '%".$_GET['keyword']."%'";
			}elseif ($_GET['type']=="4"){
			    $where.=" and `content` LIKE '%".$_GET['keyword']."%'";
			}elseif ($_GET['type']=="5"){
			    $where.=" and `reply` LIKE '%".$_GET['keyword']."%'";
			}
			$page_url['keyword']=$_GET['keyword'];
			$page_url['type']=$_GET['type'];
		}
		if($_GET['zx']){
			if($_GET['zx']=='1'){
				$where.=" and `datetime` >= '".strtotime(date("Y-m-d 00:00:00"))."'";
			}else{
				$where.=" and `datetime` >= '".strtotime('-'.(int)$_GET['zx'].'day')."'";
			}
			$urlarr['zx']=$_GET['zx'];
		}
		if($_GET['hf']){
			if($_GET['hf']=='1'){
				$where.=" and `reply_time` >= '".strtotime(date("Y-m-d 00:00:00"))."'";
			}else{
				$where.=" and `reply_time` >= '".strtotime('-'.(int)$_GET['hf'].'day')."'";
			}
			$urlarr['hf']=$_GET['hf'];
		}
		if($_GET['job'])
		{
			$where.=" and `type`='".$_GET['job']."'";
			$page_url['job']=$_GET['job'];
		}
		//��վ---
		$wheres=1;
		if($_SESSION['admin_city']){
			$wheres.=" and `cityid`='".$_SESSION['admin_city']."'";
		}
		if($_SESSION['admin_hy']){
			$wheres.=" and `hy`='".$_SESSION['admin_hy']."'";
		}
		if($_SESSION['def_city'] || $_SESSION['def_hy'])
		{
			if($_SESSION['def_city']){
				$session[]="`cityid` in (".$_SESSION['def_city'].")";
			}
			if($_SESSION['def_hy']){
				$session[]="`hy` in (".$_SESSION['def_hy'].")";
			}
			$wheres.=" and (".@implode(" or ",$session).")";
		}
		$com=$this->obj->DB_select_all("company",$wheres,"`uid`");
		$ltwheres=1;
		if($_SESSION['admin_city']){
			$ltwheres.=" and `cityid`='".$_SESSION['admin_city']."'";
		}
		if($_SESSION['admin_tcity']){
			$ltwheres.=" and `three_cityid`='".$_SESSION['admin_tcity']."'";
		}
		if($_SESSION['def_city'] || $_SESSION['def_tcity'])
		{
			if($_SESSION['def_city']){
				$session[]="`cityid` in (".$_SESSION['def_city'].")";
			}
			if($_SESSION['def_tcity']){
				$session[]="`three_cityid` in (".$_SESSION['def_tcity'].")";
			}
			$ltwheres.=" and (".@implode(" or ",$session).")";
		}
		$lt=$this->obj->DB_select_all("lt_info",$ltwheres,"`uid`");
		if(is_array($com))
		{
			foreach($com as $v)
			{
				$uid[]=$v['uid'];
			}
		}
		if(is_array($lt))
		{
			foreach($lt as $v)
			{
				$uid[]=$v['uid'];
			}
		}
		$where.=" AND `job_uid` in (".@implode(",",$uid).")";
		//��վ---
		if($_GET['order'])
		{
			$order=$_GET['order'];
		}else{
			$order="desc";
		}
		$page_url['order']=$_GET['order'];
		$page_url['page']="{{page}}";
		$pageurl=$this->url("index",$_GET['m'],$page_url);
        $M=$this->MODEL();
		$mes_list = $M->get_page("msg",$where." ORDER BY `id` ".$order,$pageurl,$this->config['sy_listnum'],'*','mes_list');
		$this->yunset($mes_list);
		$this->yunset("get_type", $_GET);
		$this->yuntpl(array('admin/admin_msg'));
	}

	function reply_msg_action()
	{
		extract($_GET);
		include(PLUS_PATH."user.cache.php");
		$this->yunset("userdata",$userdata);
		if($id){
			$mes_info = $this->obj->DB_select_once("msg","`id`='$id'");
			$mes_info['class_name'] = $userclass_name[$mes_info['type']];
			$this->yunset("mes_info",$mes_info);
		}
		if($_POST['submit']){
			$this->obj->DB_update_all("msg","`reply`='".$_POST['reply']."',`status`='1'","`id`='$id'");
 			$this->ACT_layer_msg("��ְ��ѯ(ID:".$id.")�ظ��ɹ���",9,"index.php?m=admin_msg",2,1);

		}
		$this->yuntpl(array('admin/admin_msg_reply'));
	}
	function del_action(){
		$this->check_token();
		//����ɾ��
	    if($_GET['del']){
	    	$del=$_GET['del'];
	    	if(is_array($del)){
				$this->obj->DB_delete_all("msg","`id` in(".@implode(',',$del).")","");
	    		$this->layer_msg( "��ְ��ѯ(ID:".@implode(',',$del).")ɾ���ɹ���",9,1,$_SERVER['HTTP_REFERER']);
	    	}else{
				$this->layer_msg( "��ѡ����Ҫɾ������Ϣ��",8,1,$_SERVER['HTTP_REFERER']);
	    	}
	    }
		//ɾ��
	    if(isset($_GET['id'])){
			$result=$this->obj->DB_delete_all("msg","`id`='".$_GET['id']."'" );
			isset($result)?$this->layer_msg('��ְ��ѯ(ID:'.$_GET['id'].')ɾ���ɹ���',9,0,$_SERVER['HTTP_REFERER']):$this->layer_msg('ɾ��ʧ�ܣ�',8,0,$_SERVER['HTTP_REFERER']);
		}else{
			$this->ACT_layer_msg("�Ƿ�������",8,$_SERVER['HTTP_REFERER']);
		}
	}
}