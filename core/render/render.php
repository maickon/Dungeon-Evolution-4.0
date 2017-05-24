<?php
/*
	class Rende_Lib
	faz require de forma mais elegante
*/

class Render_Core{

	// path to be required
	private $required_path;

	function __construct($view = ''){
		$this->render($view);
	}

	function get_required_path(){
		return $this->required_path;
	}

	/*
		function render()
		faz require de uma view, migra o nome da classe
		para a view correta e chama a action
		@param $view
		Aceita um caminho personalizado para especificar
		em qual parte da view sera o caminho
	*/

	function render($view){
		$get_url = (isset($_GET['url'])) ? $_GET['url'] : '';
	
		if ($get_url == '') {
			$get_url = 'home/';	
		}
		// separa a url por barras
		$url = array_filter(explode('/', $get_url));
	
		$file_name = '';

		
		if (!isset($url[1])) {
			// caminho principal da view
			$partial_path = "{$url[0]}/index.php";
		} elseif ($view != '') {
			// parte do path
			$partial_path = "{$url[0]}/{$view}";
		} elseif (count($url) >= 3) {
			// parte do path
			$partial_path = "{$url[0]}/{$url[1]}/";
		} else {
			$partial_path = "{$url[0]}/{$url[1]}.php";
		}
		
		// define o caminho base da view
		$veiw_path = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'] . "app/view/";

		// completa o cominho add o controller e a view
		$complet_path = "{$veiw_path}{$partial_path}";

		// retira do array o controller e a view
		unset($url[0]);
		unset($url[1]);
		
		// percorre o array e monta a parte do caminho que
		// representa as subpastas
		if ($view == '') {
			foreach ($url as $key => $value) {
				if (end($url) == $value) {
					// subentende se que o ultimo da lista e um arquivo.php
					$file_name .= "{$value}.php";
				} else {
					$file_name .= "{$value}/";
				}
			}
		}

		// redefine o caminho completo
		$complet_path .= $file_name;
	
		// checa sua existencia
		if (file_exists("{$complet_path}.php")) {
			$this->required_path = "{$complet_path}.php";
		} elseif (file_exists("{$complet_path}/index.php")) {
			$this->required_path = "{$complet_path}/index.php";
		} elseif (file_exists("{$complet_path}")){
			$this->required_path = "{$complet_path}";
		} else {
			// caso contratio lanca um erro
			(new Errors_Core())->show("A view {$file_name} não existe.");
		}
	}
}