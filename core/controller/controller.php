<?php

class Controller_Core{

	function __construct(){
		$this->name 	= strtolower(str_replace("_Controller", "", get_class($this)));
		$this->css_path	= URL_BASE.'app/views/'.$this->name.'/css/';
		$this->img_path	= URL_BASE.'app/views/'.$this->name.'/img/';
		$this->js_path	= URL_BASE.'app/views/'.$this->name.'/js/';
		$this->trl_file	= URL_BASE.'config/locale/'.$_SESSION['language'].'/'.$this->name.'.trl';
	}

	function controller_check_session(){
		if (isset($_SESSION['id']) and isset($_SESSION['nome']) and isset($_SESSION['email'])) {
			$user = new User_Model;
			$where = "id={$_SESSION['id']} and nome='{$_SESSION['nome']}' and email='{$_SESSION['email']}'";
			if ($user->__count('usuarios', $where) == 0) {
				header("Location:".URL_BASE);
			}
		} else {
			header("Location:".URL_BASE);
		}
	}

	function controller_set_css($css){
		$css_links = '';
		foreach ($css as $value) {
			$css_links .= '<link href="'.$this->css_path.$value.'.css" rel="stylesheet" type="text/css" media="all" />';
		}
		return $css_links;
	}

	function controller_set_base_css($css){
		$css_links = '';
		foreach ($css as $value) {
			$css_links .= '<link href="'.URL_BASE.'app/assets/css/'.$value.'.css" rel="stylesheet" type="text/css" media="all" />';
		}
		return $css_links;
	}

	function controller_set_base_js($js){
		$js_links = '';
		foreach ($js as $value) {
			$js_links .= '<script type="text/javascript" src="'.URL_BASE.'app/assets/js/'.$value.'.js"></script>';
		}
		return $js_links;
	}

	function controller_set_js($js){
		$js_links = '';
		foreach ($js as $value) {
			$js_links .= '<script type="text/javascript" src="'.$this->js_path.$value.'.js"></script>';
		}
		return $js_links;
	}

	function controller_render($action, $layout = true){
		$this->action = $action;
		if ($layout == true && file_exists('app/views/layout.phtml')) {
			return 'app/views/layout.phtml';
		} else {
			return $this->controller_content();
		}
	}

	function controller_content(){
		$actual = get_class($this);
		$singleClassName = strtolower(str_replace("_Controller", "", $actual));
		if (file_exists("app/views/{$singleClassName}/{$this->action}.phtml")) {
			return "app/views/{$singleClassName}/{$this->action}.phtml";
		}
	}

	function controller_load_labels(){
		$actual = get_class($this);
		$class_name = strtolower(str_replace("_Controller", "", $actual));
		$file = file_get_contents("config/locale/{$_SESSION['language']}/{$class_name}.trl");
		$labels = explode("\n",$file);
		foreach ($labels as $key => $value) {
			$text 		= explode("::",$labels[$key]);
			$label 		= strtolower($text[0]);
			$content 	= $text[1];
			$this->$label = $content;
		}
	}
}