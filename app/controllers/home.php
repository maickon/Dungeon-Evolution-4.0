<?php

class Home_Controller extends Controller_Core{

	function __construct(){
		$this->meta_title = 'Dungeon Evolution';
		$this->meta_description = 'Site oficial do RPG Dungeon Evolution. Venha conhecer este RPG e se divertir.';
		$this->meta_keywords = 'rpg,rpg de mesa,evolução,dungeon evolution';
	}

	function dropar_itens(){
		unset($_REQUEST['url']);
		if (!empty($_REQUEST)) {
			if ($_REQUEST['raridade'] == 'todas_as_raridades') {
				$raridade = null;
			} else {
				$raridade = $_REQUEST['raridade'];
			}

			$nivel_fixo = mt_rand(1, 99);
			for ($i=0; $i < $_REQUEST['qtd']; $i++) {
				if ($_REQUEST['item'] == 'todos_os_itens') {
					$itens= ['aneis','arma_de_duas_maos','arma_de_uma_mao','armaduras','escudos','ombreiras','botas','calcas','capacetes','luvas'];
					$item = $itens[array_rand($itens)];
				} elseif ($_REQUEST['item'] == 'todas_as_armas') {
					$itens= ['arma_de_duas_maos','arma_de_uma_mao'];
					$item = $itens[array_rand($itens)];
				} else {
					$item = $_REQUEST['item'];
				}

				if (isset($_REQUEST['pedras'])) {
					$pedras = $_REQUEST['pedras'];
					if ($pedras == 'nao') {
						$pedras == true;
					} else {
						$pedras = null;
					}
				}

				if ($item == 'aneis') {
					if ($_REQUEST['nivel_fixo'] == 'sim' and ($_REQUEST['nivel'] >= 1)) {
						$nivel = $_REQUEST['nivel'];
					} elseif ($_REQUEST['nivel_fixo'] == 'nao' and ($_REQUEST['nivel'] >= 1 )) {
						$nivel = mt_rand(1, $_REQUEST['nivel']);
					}elseif ($_REQUEST['nivel_fixo'] == 'sim') {
						$nivel = $nivel_fixo;
					} else {
						$nivel = mt_rand(1,99);
					}
					$exibir_itens[] = new Aneis_Model($nivel, $raridade, $pedras);
				} else {
					if ($_REQUEST['nivel_fixo'] == 'sim' and ($_REQUEST['nivel'] >= 1)) {
						$nivel = $_REQUEST['nivel'];
					} elseif ($_REQUEST['nivel_fixo'] == 'nao' and ($_REQUEST['nivel'] >= 1 )) {
						$nivel = mt_rand(1, $_REQUEST['nivel']);
					}elseif ($_REQUEST['nivel_fixo'] == 'sim') {
						$nivel = $nivel_fixo;
					} else {
						$nivel = mt_rand(1,99);
					}
					$exibir_itens[] = new Itens_Model($item, $nivel, $raridade, $pedras);
				}
			}
		} else {
			$exibir_itens = [];
		}

		require $this->controller_render('dropar_itens');
	}

	function error(){
		echo 'erro';
	}

	function tabela_xp(){
		$tabela_esquerda = $tabela_direita = [];

		for ($i=1; $i<=49; $i++) {
			$xp = ($i*(($i+1)*1000))+($i+1)*1000;
			$xp_anterior = (($i-1)*((($i-1	)+1)*1000))+(($i-1)+1)*1000;
			$dif = ($xp - $xp_anterior);
			$n = '<b>'.($i).'</b>';
			if ($i == 1) {
				$xp = 0;
			}
			$tabela_esquerda[] = ['nivel'=> $n, 'xp'=> $xp];
		}

		for ($i=50; $i<=99; $i++) {
			$xp = ($i*(($i+1)*1000))+($i+1)*1000;
			$xp_anterior = (($i-1)*((($i-1	)+1)*1000))+(($i-1)+1)*1000;
			$dif = ($xp - $xp_anterior);
			$n = '<b>'.$i.'</b>';
			$tabela_direita[] = ['nivel'=> $n, 'xp'=> $xp];
		}

		require $this->controller_render('tabela_xp');
	}

	function tabela_xp_inimigos(){
		$tabela_esquerda = $tabela_direita = [];
		$count = 0;
		for($i=1; $i<=49; $i++):
			$count++;
			$xp = (($i*(($i+1)*100))+($i+1)*100)/2;
			$tabela_esquerda[] = ['nivel'=> '<b>'.$i.'</b>', 'xp'=> $xp];
		endfor;

		for($i=$count+1; $i<=($count*2)+1; $i++):
			$xp = (($i*(($i+1)*100))+($i+1)*100)/2;
			$tabela_direita[] = ['nivel'=> '<b>'.$i.'</b>', 'xp'=> $xp];
		endfor;

		require $this->controller_render('tabela_xp_inimigos');
	}

	function calcular_xp(){
		$seu_nivel = isset($_REQUEST['seu_nivel']) ? intval($_REQUEST['seu_nivel']) : 0;
		$oponente_nivel = isset($_REQUEST['oponente_nivel']) ? intval($_REQUEST['oponente_nivel']) : 0;

		$xp_ganho = 0;

		$xp = (($oponente_nivel*(($oponente_nivel+1)*100))+($oponente_nivel+1)*100)/2;
		if ($oponente_nivel > $seu_nivel) {
			$dif = ($oponente_nivel-$seu_nivel);
			$xp_ganho = $xp*$dif;
		} elseif ($oponente_nivel < $seu_nivel) {
			$dif = ($seu_nivel-$oponente_nivel);
			$xp_ganho = (intval($xp/$dif));
		} else{
			$xp_ganho = ($xp);
		}

		require $this->controller_render('calcular_xp');
	}

	function sessao(){
		$msg = '';
		$css_msg = ['valido','invalido'];
		if (isset($_REQUEST['btn_criar'])  and $_REQUEST['btn_criar'] == 'Criar Conta') {
			$pasta = md5($_REQUEST['username']);
			$senha = md5($_REQUEST['password']);
			$confirmar_senha = md5($_REQUEST['passwordConfirm']);

			if ($senha != $confirmar_senha) {
				$msg = 'Senha estão diferentes!';
				$css_msg = $css_msg[1];	
			} elseif (!file_exists(PATH_BASE.'config/db/xml/usuarios/'.$pasta)) {
				$msg = 'Nick válido!';
				$css_msg = $css_msg[0];
				mkdir(PATH_BASE.'config/db/xml/usuarios/'.$pasta);
				mkdir(PATH_BASE.'config/db/xml/usuarios/'.$pasta.'/fichas');
				$xml = "<usuario>\n";
				$xml .= "\t<nick>{$_REQUEST['username']}</nick>\n";
				$xml .= "\t<senha>{$senha}</senha>\n";
				$xml .= "</usuario>";

				file_put_contents(PATH_BASE.'config/db/xml/usuarios/'.$pasta.'/dados.xml', $xml);

				@session_start();
				$_SESSION['nick'] 	= $_REQUEST['username'];
				$_SESSION['chave'] 	= $pasta;
				header("Location:".URL_BASE.'home/painel');
			} else {
				$msg = 'Este nick já esta em uso!';
				$css_msg = $css_msg[1];
			}

		} elseif (isset($_REQUEST['btn_logar']) and $_REQUEST['btn_logar'] == 'Logar') {
			$pasta = md5($_REQUEST['username']);
			$senha = md5($_REQUEST['password']);
			if (file_exists(PATH_BASE.'config/db/xml/usuarios/'.$pasta)) {
				$file =  simplexml_load_file(PATH_BASE.'config/db/xml/usuarios/'.$pasta.'/dados.xml');
				if ($_REQUEST['username'] == $file->nick and $senha == $file->senha) {
					@session_start();
					$_SESSION['nick'] 	= $_REQUEST['username'];
					$_SESSION['chave'] 	= $pasta;
					header("Location:".URL_BASE.'home/painel');
				} else {
					$msg = 'Usuário ou senha incorretos!';
					$css_msg = $css_msg[1];
				}
			}
		}
		
		require $this->controller_render('sessao');
		
	}

	function painel(){
		if (isset($_SESSION['nick'])) {
			$fichas_xml = [];
			$itens_de_inventario = [];

			$fichas = new DirectoryIterator(PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/');
			foreach ($fichas as $fileInfo) {
				if (($fileInfo->getFilename() != '.') and ($fileInfo->getFilename() != '..')) {
					$nome = $fileInfo->getFilename();
					$fichas_xml[] = simplexml_load_file(PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.$nome.'/'.$nome.'.xml');
				}
			}

			if (isset($_SESSION['ficha'])) {
				$inventario = new DirectoryIterator(PATH_BASE.'config/db/xml/usuarios/'.$_SESSION['chave'].'/fichas/'.md5($_SESSION['ficha']).'/inventario/');
				foreach ($inventario as $fileInfo) {
					if (($fileInfo->getFilename() != '.') and ($fileInfo->getFilename() != '..')) {
						$itens_de_inventario[] = $fileInfo->getFilename();
					}
				}
			}

			require $this->controller_render('painel');
		} else {
			header("Location: ".URL_BASE);
		}
	}

	function logout(){
		session_destroy();
		header("Location: ".URL_BASE);
	}
}