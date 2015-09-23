<?php
class Smarty_Internal_Compile_Carslist extends Smarty_Internal_CompileBase{
    public $required_attributes = array('item');
    public $optional_attributes = array('name', 'key', 't_len', 'limit', 'rec', 'limit', 'pic', 'd_len', 'type', 'urlstatic','print','order','sort','ispage','nid','islt','cache','pinpai','leixing','fuzai','dongliyuan','gongzuochangdi','tishenggaodu','tishenggaodu_min','fuzai_min');
    public $shorttag_order = array('from', 'item', 'key', 'name');
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        $from = $_attr['from'];
        $item = $_attr['item'];
        $name = $_attr['item'];
        $name=str_replace('\'','',$name);
        $name=$name?$name:'list';$name='$'.$name;
        if (!strncmp("\$_smarty_tpl->tpl_vars[$item]", $from, strlen($item) + 24)) {
            $compiler->trigger_template_error("item variable {$item} may not be the same variable as at 'from'", $compiler->lex->taglineno);
        }
        $OutputStr='global $db,$db_config,$config;include PLUS_PATH.\'/group.cache.php\';'.$name.'=array();$rs=null;$nids=null;eval(\'$paramer='.str_replace('\'','\\\'',ArrayToString($_attr,true)).';\');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[\'arr\'];
		$Purl =  $ParamerArr[\'purl\'];
        if($paramer[cache]){
			$Purl="{{page}}.html";
		}
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }$where=1;
		if($_SESSION[\'did\']){
			$where.=" and (FIND_IN_SET(\'".$_SESSION[\'did\']."\',did) or FIND_IN_SET(\'0\',did))";
		}else{
			$where.=" and `did`=\'0\'";
		}
        if($paramer[\'g\']!=""){
			$where .=" AND find_in_set($paramer[nid],`nid`)";
			//$nids = @explode(\',\',$paramer[\'nid\']);
		}/*else{
			$where .=" AND `nid`=\'\'";
		}*/
		include PLUS_PATH."/group.cache.php";
		if(is_array($paramer)){
			if($paramer[\'nid\']!=""){
				$where .=" AND find_in_set($paramer[nid],`nid`)";
				//$nids = @explode(\',\',$paramer[\'nid\']);$paramer[\'nid\']=$paramer[\'nid\'];
			}else if($paramer[\'rec\']!=""){
				//$where .=" AND `nid`=\'\'";
			}
			/*if($paramer[\'nid\']){
				$nid_s = @explode(\',\',$paramer[nid]);				
				foreach($nid_s as $v){
					if($group_type[$v]){
						$paramer[nid] = $paramer[nid].",".@implode(\',\',$group_type[$v]);
					}
				}
			}	*/		
			if($paramer[\'type\']){
				$type = str_replace("\"","",$paramer[type]);
				$type_arr =	@explode(",",$type);
				if(is_array($type_arr) && !empty($type_arr))
				{
					foreach($type_arr as $key=>$value)
					{
						$where .=" AND FIND_IN_SET(\'".$value."\',`describe`)";
						if(count($nids)>0)
						{
							$picwhere .=" AND FIND_IN_SET(\'".$value."\',`describe`)";
						}
					}
				}
			}
			if($paramer[\'pic\']!=""){
				$where .=" AND `newsphoto`<>\'\'";
			}
            if($paramer[\'pinpai\']!=""){
				$where .=" AND `pinpai`=\'".$paramer[\'pinpai\']."\'";
			}
            if($paramer[\'leixing\']!=""){
				$where .=" AND `leixing`=\'".$paramer[\'leixing\']."\'";
			}
            if($paramer[\'fuzai\']!=""){
				$where .=" AND `fuzai`<=\'".$paramer[\'fuzai\']."\'";
			}
            if($paramer[\'fuzai_min\']!=""){
				$where .=" AND `fuzai`>=\'".$paramer[\'fuzai_min\']."\'";
			}
            if($paramer[\'dongliyuan\']!=""){
				$where .=" AND `dongliyuan`=\'".$paramer[\'dongliyuan\']."\'";
			}
            if($paramer[\'gongzuochangdi\']!=""){
				$where .=" AND FIND_IN_SET(\'".$paramer[\'gongzuochangdi\']."\',`gongzuochangdi`)";
			}
            if($paramer[\'tishenggaodu\']!=""){
				$where .=" AND `tishenggaodu`<=\'".$paramer[\'tishenggaodu\']."\'";
			}
            if($paramer[\'tishenggaodu_min\']!=""){
				$where .=" AND `tishenggaodu`>=\'".$paramer[\'tishenggaodu_min\']."\'";
			}
			if($paramer[\'order\']!=""){
				$order = str_replace("\'","",$paramer[\'order\']);
				$where .=" ORDER BY $order";
			}else{
				$where .=" ORDER BY `datetime`";
			}
			if($paramer[\'sort\']){
				$where.=" ".$paramer[sort];
			}else{
				$where.=" DESC";
			}
			if(intval($paramer[\'limit\'])>0){
				$limit = intval($paramer[\'limit\']);
				$limit = " limit ".$limit;
			}
			if($paramer[\'ispage\']){
				$limit = PageNav($paramer,$_GET,"cars_base",$where,$Purl,"","5",$_smarty_tpl);
			}
		}
		if(!intval($paramer[\'ispage\']) && count($nids)>0){
			$where = " and nid IN ($paramer[nid])";
			if($paramer[\'pic\']){
				if(!$paramer[\'piclimit\']){
					$piclimit = 1;
				}else{
					$piclimit = $paramer[\'piclimit\'];
				}
				$db->query("set @f=0,@n=0");
				$query = $db->query("select * from (select id,title,color,datetime,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]cars_base  WHERE `nid` IN ($paramer[nid]) AND `newsphoto` <>\'\'  order by nid asc,datetime desc) a where aid <=".$piclimit);
				while($rs = $db->fetch_array($query)){
					if(intval($paramer[t_len])>0){
						$len = intval($paramer[t_len]);
						if($rs[color]){
							$rs[title] = "<font color=\'".$rs[color]."\'>".mb_substr($rs[title],0,$len,"GBK")."</font>";
						}else{
							$rs[title] = mb_substr($rs[title],0,$len,"GBK");
						}
					}
					if(intval($paramer[d_len])>0)
					{
						$len = intval($paramer[d_len]);
						$rs[description] = mb_substr($rs[description],0,$len,"GBK");
					}
					$rs[\'name\'] = $group_name[$rs[\'nid\']];
					if($config[sy_news_rewrite]=="2"){
						$rs["url"]=$config[\'sy_weburl\']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
					}else{
						$rs["url"] = Url("cars",array("c"=>"show","id"=>$rs[id]),"1");
					}
					$rs[time]=date("Y-m-d",$rs[datetime]);
					$rs[\'datetime\']=date("m-d",$rs[datetime]);
					'.$name.'[$rs[\'nid\']][\'pic\'][] = $rs;
				}
			}
			
            $db->query("set @f=0,@n=0");
            $query = $db->query("select * from (select id,title,datetime,color,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]cars_base  WHERE `nid` IN ($paramer[nid]) order by nid asc,datetime desc) a where aid <=$paramer[limit]");

            while($rs = $db->fetch_array($query)){
                if(intval($paramer[t_len])>0){
                    $len = intval($paramer[t_len]);
                    if($rs[color]){
                        $rs[title] = "<font color=\'".$rs[color]."\'>".mb_substr($rs[title],0,$len,"GBK")."</font>";
                    }else{
                        $rs[title] = mb_substr($rs[title],0,$len,"GBK");
                    }
                }
                if(intval($paramer[d_len])>0){
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                $rs[\'name\'] = $group_name[$rs[\'nid\']];
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config[\'sy_weburl\']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("cars",array("c"=>"show","id"=>$rs[id]),"1");
                }
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
                '.$name.'[$rs[\'nid\']][\'arclist\'][] = $rs;
            }
		}else{
			$query = $db->query("SELECT * FROM `$db_config[def]cars_base` WHERE ".$where.$limit);
			while($rs = $db->fetch_array($query)){
                if(intval($paramer[t_len])>0)
                {
                    $len = intval($paramer[t_len]);
                    $rs[title] = mb_substr($rs[title],0,$len,"GBK");
                }
                if(intval($paramer[d_len])>0)
                {
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                $rs[\'name\'] = $group_name[$rs[\'nid\']];
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config[\'sy_weburl\']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("cars",array("c"=>"show","id"=>$rs[id]),"1");
                }
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
                '.$name.'[] = $rs;
            }
		}';
        global $DiyTagOutputStr;
        $DiyTagOutputStr[]=$OutputStr;
        return SmartyOutputStr($this,$compiler,$_attr,'carslist',$name,'',$name);
    }
}
class Smarty_Internal_Compile_Carslistelse extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        list($openTag, $nocache, $item, $key) = $this->closeTag($compiler, array('carslist'));
        $this->openTag($compiler, 'carslistelse', array('carslistelse', $nocache, $item, $key));

        return "<?php }\nif (!\$_smarty_tpl->tpl_vars[$item]->_loop) {\n?>";
    }
}
class Smarty_Internal_Compile_Carslistclose extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);
        if ($compiler->nocache) {
            $compiler->tag_nocache = true;
        }

        list($openTag, $compiler->nocache, $item, $key) = $this->closeTag($compiler, array('carslist', 'carslistelse'));

        return "<?php } ?>";
    }
}
