<?php
//框架入口文件
final class Hd{
	static public function run(){
		//定义常量
		self::define_const();
		//加载框架运行时文件
		self::load_core_file();
		self::init_App_dir();
		//创建初始控制器
		self::create_test_controller();
		//创建初始配置文件
		self::create_base_config();
		App::run();
	}
	//创建初始配置文件
	static public function create_base_config(){
		$file = CONFIG_PATH.'config.php';
		if(is_file($file))return;
		$data =<<<str
<?php
return array(
	"DB_HOST"		=> "localhost",	//主机
	"DB_USER"		=> "root",		//帐号
	"DB_PASSWORD"	=> "",			//密码
	"DB_NAME"		=> ""			//数据库
)
str;
	file_put_contents($file, $data);
	}
	//加载框架运行时文件
	static public function load_core_file(){
		foreach(array(
			HD_PATH.'Core/functions.php',
			HD_PATH.'Core/App.class.php'
		) as $f){
			require $f;
		}
	}
	//定义常量
	static public function define_const(){
		define("HD_PATH",dirname(__FILE__).'/');
	}
	//创建测试控制器
	static public function create_test_controller(){
		$file =CONTROLLER_PATH.'IndexController.class.php';
		if(is_file($file))return;
		$data=<<<str
<?php 
class IndexController extends Controller{
	public function Index(){
		header("Contet-type:text/html;charset=utf-8");
		echo "<h1>欢迎使用c26框架产品!</h1>";
	}
}
str;
	file_put_contents($file, $data);
	}
	//初始化应用目录
	static public function init_App_dir(){
		//控制器目录 
		define("CONTROLLER_PATH",APP_PATH.'Controller/');
		//应用配置目录
		define("CONFIG_PATH",APP_PATH.'Config/');
		//模板目录
		define("TEMPLATE_PATH",APP_PATH.'Template/');
		foreach(array(
			APP_PATH,
			CONTROLLER_PATH	,
			CONFIG_PATH,
			TEMPLATE_PATH
			) as $d){
			is_dir($d) or mkdir($d,0755,true);
		}

	}
}
Hd::run();










