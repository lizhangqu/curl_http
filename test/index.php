<?php
	//引入库
	include_once "../function/communication.func.php";
	
	//http get
	$result_get=ihttp_get("http://127.0.0/curl_http/test/get.php?name=李四");
	var_dump($result_get);
	
	//http post
	$data['name']="张三";
	$result_post=ihttp_post("http://127.0.0.1/curl_http/tests/post.php",$data);
	var_dump($result_post);
	
	//https get 
	
	//比如获取公众号的access_token
	//以下两个值是测试公众号的值
	//appID:wx98e7612ddc2b85a1
	//appsecret:60cf8fef8244e76ce3dcd1697c936871
	$APPID="wx98e7612ddc2b85a1";
	$APPSECRET="60cf8fef8244e76ce3dcd1697c936871";
	$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$APPID}&secret={$APPSECRET}";
	$access_token_result=ihttp_get($url);
	$access_token_json=$access_token_result['content'];
	$access_token_obj=json_decode($access_token_json);
	$access_token=$access_token_obj->access_token;
	var_dump($access_token);
	
	//https post
	//创建分组
	$param['group']=array('name'=>urlencode("测试分组"));
	$json=urldecode(json_encode($param));
	echo var_dump($json);
	$url="https://api.weixin.qq.com/cgi-bin/groups/create?access_token={$access_token}";
	$result=ihttp_post($url,$json);
	var_dump($result);
?>