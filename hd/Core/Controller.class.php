<?php
require HD_PATH.'Org/Smarty/Smarty.class.php';
class Controller extends Smarty{
	//模板目录
	public $template_dir;
	//编译目录
	public $compile_dir;
	public function __construct(){
		$this->template_dir=TEMPLATE_PATH.CONTROLLER;
		$this->compile_dir=$this->template_dir.'/_Compile';
		is_dir($this->template_dir) or mkdir($this->template_dir,0755,true);
		is_dir($this->compile_dir) or mkdir($this->compile_dir,0755,true);
	}
	//操作成功处理方法 
	public function success($msg,$url=null){
		$s= "<div style='font-size:55;font-family:\"微软雅黑\"'>
			:) {$msg}
		</div>";
		$go="";
		if($url){
			$s.="<script>window.setTimeout(function(){
				location.href='{$url}'},2000);</script>";
		}else{
			$s.="<script>window.setTimeout(function(){
				window.history.go(-1)},2000);</script>";
		}
		echo $s;exit;
	}
	//错误处理
	public function error($msg,$url=null){
		$s= "<div style='font-size:55;font-family:\"微软雅黑\"'>
			:( {$msg}
		</div>";
		$go="";
		if($url){
			$s.="<script>window.setTimeout(function(){
				location.href='{$url}'},2000);</script>";
		}else{
			$s.="<script>window.setTimeout(function(){
				window.history.go(-1)},2000);</script>";
		}
		echo $s;exit;
	}
}