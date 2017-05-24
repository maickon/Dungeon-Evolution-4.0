<?php

class Build_Core {

	function build_schema($table){
		if (is_object($table)) {
			$table = (array)$table;
		}
		$xml = '<?xml version="1.0" encoding="UTF-8"?>';
		$xml .= "<table>";
		foreach ($table as $key => $value) {
			$xml .= "<{$key}>{$value}</{$key}>";
		}
		$xml .= '</table>';
		if(file_put_contents(PATH_BASE."config/db/schema/{$table['table_name']}.xml", $xml)){
			return true;
		} else {
			return false;
		}
	}

	function build_model($table){
		if (is_object($table)) {
			$table = (array)$table;
		}
		$class_name = ucfirst($table['table_name']);
		$file_name 	= strtolower($table['table_name']);
		$year 		= date('Y');
		$file = "<?php
/*
	Classe gerada pelo Build_Core 
	@author Maickon Rangel
	Prodigio Framework - {$year}
	Model: {$file_name}
*/

class {$class_name}_Model extends Dbrecord_Core {

}";
		if (mkdir(PATH_BASE."app/models/{$file_name}/")) {
			if(file_put_contents(PATH_BASE."app/models/{$file_name}/{$file_name}.php", $file)){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function build_controller($controller){
		if (is_object($controller)) {
			$controller = (array)$controller;
		}
		$file_name 	= $controller['class_name'];
		$class_name = ucfirst($controller['class_name']);
		unset($controller['class_name']);
		$year 		= date('Y');
		$file = "<?php
/*
	Classe gerada pelo Build_Core 
	@author Maickon Rangel
	Prodigio Framework - {$year}
	Controller: {$file_name}
*/

class {$class_name}_Controller extends Controller_Core {
";
		foreach ($controller as $key => $value) {
			$render = 'require_once $this->controller_render(\''.$key.'\');';
			$file .= "
	public function {$value}{
		{$render}
	}
	";
		}
		$file .="
}";
		if(file_put_contents(PATH_BASE."app/controllers/{$file_name}.php", $file)){
			return true;
		} else {
			return false;
		}
	}

	function build_view($views, $file_name){
		$file_name 	= strtolower($file_name);
		$year 		= date('Y');
		$file = "<!--  
	Arquivo gerado pelo Build_Core 
	@author Maickon Rangel
	Prodigio Framework - {$year}
	View: {$file_name}
-->
<h1>View</h1>
<?php require_once 'app/views/layout.phtml'; ?>";
		if (!file_exists(PATH_BASE."app/views/{$file_name}")) {
			mkdir(PATH_BASE."app/views/{$file_name}");
		}
		$check = false;
		foreach ($views as $key => $value) {
			if(file_put_contents(PATH_BASE."app/views/{$file_name}/{$value}.phtml", $file)){
				$check = true;
			} else {
				return false;
			}
		}
		return $check;
	}
}