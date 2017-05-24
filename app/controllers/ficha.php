<?php
/*
	Classe gerada pelo Build_Core 
	@author Maickon Rangel
	Prodigio Framework - 2017
	Controller: ficha
*/

class Ficha_Controller extends Controller_Core {

	function __construct(){
		$this->meta_title = 'Dungeon Evolution';
		$this->meta_description = 'Site oficial do RPG Dungeon Evolution. Venha conhecer este RPG e se divertir.';
		$this->meta_keywords = 'rpg,rpg de mesa,evolução,dungeon evolution';
	}

	function index(){
		$msg = '';
		$css_msg = ['valido','invalido'];

		if (isset($_SESSION['nick'])) {
			$itens = [
				'arma1'		=>'Arma 1',
				'arma2'		=>'Arma 2',
				'armadura'	=>'Armadura',
				'bota'		=>'Bota',
				'calca'		=>'Calça',
				'capacete'	=>'Capacete',
				'escudo'	=>'Escudo',
				'luva'		=>'Luva',
				'ombreira'	=>'Ombreira',
				'anel1'		=>'Anel 1',
				'anel2'		=>'Anel 2'
				];
			

			if (isset($_REQUEST)) {
				$dom = "<ficha>\n";

				foreach ($_REQUEST as $key => $value) {
					if (is_array($_REQUEST[$key])) {
						$dom .= "\t<{$key}>\n";
						foreach ($_REQUEST[$key] as $key2 => $value2) {
							if (is_array($_REQUEST[$key][$key2])) {
								$dom .= "\t\t<{$key2}>\n";
								foreach ($_REQUEST[$key][$key2] as $key3 => $value3) {
									$dom .= "\t\t\t<{$key3}>{$value3}</{$key3}>\n";
								}
								$dom .= "\t\t</{$key2}>\n";
							} else {
								$dom .= "\t\t<{$key2}>{$value2}</{$key2}>\n";
							}
						}
						$dom .= "\t</{$key}>\n";
					} else {
						$dom .= "\t<{$key}>{$value}</{$key}>\n";
					}
				}
				$dom .= '</ficha>';
				
				if (isset($_REQUEST['ficha_nome'])) {
					$file = md5($_REQUEST['ficha_nome']);
					if (isset($_REQUEST['atualizar']) and $_REQUEST['atualizar'] == 'true') {
						$msg = 'Personagem atualizado com sucesso!';
						$css_msg = $css_msg[0];
						file_put_contents(PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.$file.'/'.$file.'.xml', $dom);
						header("Location: " . URL_BASE.'ficha/visualizar/'.$_REQUEST['ficha_nome']);
					} else {
						if (file_exists(PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.$file.'/'.$file.'.xml')) {
							$msg = 'Este personagem já existe!';
							$css_msg = $css_msg[1];
						} else {
							$msg = 'Personagem criado com sucesso!';
							$css_msg = $css_msg[0];
							mkdir(PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.$file);
							file_put_contents(PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.$file.'/'.$file.'.xml', $dom);
							mkdir(PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.$file.'/inventario');
							header("Location: " . URL_BASE.'ficha/visualizar/'.$_REQUEST['ficha_nome']);
						}
					}
				}
			}
			require_once $this->controller_render('index');
		} else {
			header("Location:" . URL_BASE);
		}
	}

	function visualizar($ficha){
		@session_start();
		if (isset($_SESSION['nick'])) {
			$nome = md5($ficha);
			if (file_exists(PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.$nome.'/'.$nome.'.xml')) {
				$ficha_xml = simplexml_load_file(PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.$nome.'/'.$nome.'.xml');
		
				$_SESSION['ficha'] = $ficha;

				$ficha_itens['arma1']['arma1'] = $ficha_xml->arma1;
				$ficha_itens['arma1']['pedras'] = $ficha_xml->arma1_pedras;

				$ficha_itens['arma2']['arma2'] = $ficha_xml->arma2;
				$ficha_itens['arma2']['pedras'] = $ficha_xml->arma2_pedras;

				$ficha_itens['armadura']['armadura'] = $ficha_xml->armadura;
				$ficha_itens['armadura']['pedras'] = $ficha_xml->armadura_pedras;

				$ficha_itens['bota']['bota'] = $ficha_xml->bota;
				$ficha_itens['bota']['pedras'] = $ficha_xml->bota_pedras;

				$ficha_itens['calca']['calca'] = $ficha_xml->calca;
				$ficha_itens['calca']['pedras'] = $ficha_xml->calca_pedras;

				$ficha_itens['capacete']['capacete'] = $ficha_xml->capacete;
				$ficha_itens['capacete']['pedras'] = $ficha_xml->capacete_pedras;

				$ficha_itens['escudo']['escudo'] = $ficha_xml->escudo;
				$ficha_itens['escudo']['pedras'] = $ficha_xml->escudo_pedras;

				$ficha_itens['luva']['luva'] = $ficha_xml->luva;
				$ficha_itens['luva']['pedras'] = $ficha_xml->luva_pedras;

				$ficha_itens['ombreira']['ombreira'] = $ficha_xml->ombreira;
				$ficha_itens['ombreira']['pedras'] = $ficha_xml->ombreira_pedras;

				$ficha_itens['anel1']['anel1'] = $ficha_xml->anel1;
				$ficha_itens['anel1']['pedras'] = $ficha_xml->anel1_pedras;

				$ficha_itens['anel2']['anel2'] = $ficha_xml->anel2;
				$ficha_itens['anel2']['pedras'] = $ficha_xml->anel2_pedras;
			
				require_once $this->controller_render('visualizar');
			} else {
				header("Location:" . URL_BASE);
			}

		}  else {
			header("Location:" . URL_BASE);
		}
	}
	
	function inventario(){
		if (isset($_REQUEST['item']['tipo'])) {
			$nome_tipo = 'item';
		} elseif (isset($_REQUEST['pedras']['tipo'])) {
			$nome_tipo = 'pedras';
		} elseif (isset($_REQUEST['pocao']['tipo'])) {
			$nome_tipo = 'pocao';
		}
		
		$tipo = strtolower($_REQUEST[$nome_tipo]['tipo']);
		$id = strtolower($_REQUEST[$nome_tipo]['id']);

		$caminho = PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.md5($_SESSION['ficha']).'/inventario/'.$tipo.'/';
		
		if (isset($_SESSION['nick'])) {
			if ($tipo == 'arma de uma mao' || $tipo == 'arma de duas maos') { $tipo = 'armas'; }
			if (!file_exists($caminho)){
				mkdir($caminho);
			}

			$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
			$xml .= "<inventario>\n";
			unset($_REQUEST['url']);
			unset($_REQUEST['add']);
			foreach ($_REQUEST as $key => $value) {
				if (is_array($_REQUEST[$key])) {
					$xml .= "\t<{$key}>\n";
					foreach ($_REQUEST[$key] as $key2 => $value2) {
						if (is_array($_REQUEST[$key][$key2])) {
							$xml .= "\t\t<{$key2}>\n";
							foreach ($_REQUEST[$key][$key2] as $key3 => $value3) {
								$xml .= "\t\t\t<{$key3}>{$value3}</{$key3}>\n";
							}
							$xml .= "\t\t</{$key2}>\n";
						} else {
							$xml .= "\t\t<{$key2}>{$value2}</{$key2}>\n";
						}
					}
					$xml .= "\t</{$key}>\n";
				} else {
					$xml .= "\t<{$key}>{$value}</{$key}>\n";
				}
			}
			$xml .= '</inventario>';
			
			if (!file_exists($caminho.$_REQUEST[$nome_tipo]['id'].'.xml')) {
				echo $caminho.$_REQUEST[$nome_tipo]['id'].'.xml';
				file_put_contents($caminho.$_REQUEST[$nome_tipo]['id'].'.xml', $xml);
				header("Location:" . URL_BASE.'ficha/visualizar_inventario');
			}
		} else {
			header("Location:" . URL_BASE);
		}
	}

	function visualizar_inventario(){
		@session_start();
		if (isset($_SESSION['nick'])) {
			$caminho = PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.md5($_SESSION['ficha']).'/inventario/';
			if (file_exists($caminho)) {
				$inventario_xml = [];
				$inventarios = new DirectoryIterator($caminho);
				foreach ($inventarios as $fileInfo) {
					$indice = 0;
					if (($fileInfo->getFilename() != '.') and ($fileInfo->getFilename() != '..')) {
						$pastas = $fileInfo->getFilename();
						$inventario = new DirectoryIterator($caminho.$pastas);
						foreach ($inventario as $inventarioInfo) {
							$pasta = $inventarioInfo->getFilename();
							if (($pasta != '.') and ($pasta != '..')) {
								$inventario_xml[$pastas.$indice] = simplexml_load_file($caminho.$pastas.'/'.$pasta);
								$indice++;
							}
						}
					}
				}
				require_once $this->controller_render('visualizar_inventario');
			}
		} else {
			header("Location:" . URL_BASE);
		}
	}

	function vender_item_inventario($params){
		@session_start();
		if (isset($_SESSION['nick'])) {
			$valor 	= $params[1];
			$id 	= $params[2];
			$tipo 	= $params[0];
			$caminho_item = PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.md5($_SESSION['ficha']).'/inventario/'.$tipo.'/'.$id.'.xml';
			$caminho_ficha = PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.md5($_SESSION['ficha']).'/'.md5($_SESSION['ficha']).'.xml';
			
			$ficha = simplexml_load_file($caminho_ficha);
			$ficha->ficha_dinheiro += $valor;
			$ficha->asXml($caminho_ficha);

			if (file_exists($caminho_item)) {
				unlink($caminho_item);
				header("Location: ".URL_BASE.'ficha/visualizar_inventario');
			} else {
				header("Location: ".URL_BASE.'ficha/visualizar_inventario');
			}
		} else {
			header("Location:" . URL_BASE);
		}
	}

	function deletar_item_inventario($params){
		@session_start();
		if (isset($_SESSION['nick'])) {
			$id 	= $params[1];
			$tipo 	= $params[0];
			$caminho = PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.md5($_SESSION['ficha']).'/inventario/'.$tipo.'/'.$id.'.xml';
			if (file_exists($caminho)) {
				unlink($caminho);
				header("Location: ".URL_BASE.'ficha/visualizar_inventario');
			} else {
				header("Location: ".URL_BASE.'ficha/visualizar_inventario');
			}
		} else {
			header("Location:" . URL_BASE);
		}
	}
}