<?php 
class IndexController extends Controller{
	public function Index(){
		header("Contet-type:text/html;charset=utf-8");
		echo "<h1>欢迎使用c26框架产品!</h1>";
	}
}