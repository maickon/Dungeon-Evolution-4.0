<?php


class Planilha_Controller extends Controller_Core{

	function __construct(){
		$this->meta_title = 'Dungeon Evolution';
		$this->meta_description = 'Site oficial do RPG Dungeon Evolution. Planilha de itens mundanos, poções, fichas bases e pedras místicas.';
		$this->meta_keywords = 'rpg,rpg de mesa,evolução,dungeon evolution, ficha de rpg, itens mágicos';
	}

	function index(){
		$tabela = [
		['nome' => 'Roupas - simples', 'descricao'=> 'Vestuário simples de uso humilde.', 'preco'=> '50'],
		['nome' => 'Roupas – normal', 'descricao'=> 'Vestuário comum na sociedade.', 'preco'=> '100'],			
		['nome' => 'Roupas - Gala', 'descricao'=> 'Vestuário chique que indica que você é de família nobre', 'preco'=> '200'],
		['nome' => 'Água', 'descricao'=> 'Água limpa para consumo', 'preco'=> '4'],
		['nome' => 'Pão', 'descricao'=> 'Pão de forno pronto para comer.', 'preco'=> '1'],
		['nome' => 'Café da manhã', 'descricao'=> 'Um pão e um copo de bebida (água ou café).', 'preco'=> '6'],
		['nome' => 'Almoço', 'descricao'=> 'Um prato de comida que enche a barriga de quem está faminto.', 'preco'=> '10'],
		['nome' => 'Bebida alcoólica', 'descricao'=> 'Bebida com alta dosagem de álcool em um copo', 'preco'=> '10'],
		['nome' => 'Garrafa de bebida alcooólica', 'descricao'=> 'Uma garrafa fechada.', 'preco'=> '50'],
		['nome' => 'Bijuterias', 'descricao'=> 'Coisas de enfeite no corpo.', 'preco'=> '2'],
		['nome' => 'Corda', 'descricao'=> 'Uma corda normal de 9 m.', 'preco'=> '10'],
		['nome' => 'Cavalo', 'descricao'=> 'Um cavalo com PV 12 Def 5 Dano 2 nível 100', 'preco'=> '150'],
		['nome' => 'Cachorro', 'descricao'=> 'Um cachorro doméstico com PV 3 Def 2 Dano 1 nível 1', 'preco'=> '50'],
		['nome' => 'Gato', 'descricao'=> 'Um gato com PV 1 Def 1 Dano 1 nível 1', 'preco'=> '30'],
		['nome' => 'Carroça', 'descricao'=> 'Uma carroça com tamanho 4x4 m.', 'preco'=> '100'],
		['nome' => 'Tocha', 'descricao'=> 'Uma pedaço de madeira com pano contarnado na ponta para se atear fogo. A tocha acesa ilumina 9 m', 'preco'=> '10'],
		['nome' => 'Esqueiro', 'descricao'=> 'Uma caixa pequena que acende fogo quando se aperta', 'preco'=> '20'],
		['nome' => 'Mochila', 'descricao'=> 'Uma bolsa simples com alças que pode ser carregada no corpo.', 'preco'=> '20'],
		['nome' => 'Estadia - pobre', 'descricao'=> 'Uma noite de sono num quarto feio, sujo e mal cheiroso.', 'preco'=> '100'],
		['nome' => 'Estadia - média', 'descricao'=> 'Uma noite de sono num quarto de cuidados moderado. Inclui café da manhã.', 'preco'=> '300'],
		['nome' => 'Estadia - luxo', 'descricao'=> 'Uma noite de sono num local bonito, limpo e bem arrumado. Inclui café da manhã e até almoço.', 'preco'=> '600'],
		['nome' => 'Viagem Barco - pobre', 'descricao'=> 'Barco pequeno que cabe no máximo 20 pessoas. Não possui nada para comer. Cada um deve levar seus mantimentos.', 'preco'=> '1000'],
		['nome' => 'Viagem Barco - médio', 'descricao'=> 'Barco grande com boas acomodações, possui comida e água durante a viagem.', 'preco'=> '5000'],
		['nome' => 'Viagem Barco - médio', 'descricao'=> 'Barco grande com luxuosas acomodações, possui comida e água de boa qualidade durante a viagem e possui loja de itens.', 'preco'=> '10000'],
		['nome' => 'Viagem com mago - portal', 'descricao'=> 'Tela para umoutro ponto conhecido pelo mago dentro do mesmo plano. O preço é por pessoa.', 'preco'=> '50000'],
		['nome' => 'Viagem com mago - planar', 'descricao'=> 'Te leva para outros planos que seja conhecido pelo mago ou para um local no mesmo plano. O mago apena toca em você e o leva para o seu destino. O preço é por pessoa.', 'preco'=> '100000'],
		['nome' => 'Casa simples', 'descricao'=> 'Uma casa simples de madeira com dois quartos e um sala. Tamanho de 15 m².', 'preco'=> '100000'],
		['nome' => 'Casa média', 'descricao'=> 'Uma casa de madeira com 4 quartos, uma sala e cozinha. Tamanho de 25 m².', 'preco'=> '400000'],
		['nome' => 'Casa luxo ', 'descricao'=> 'Uma casa de madeira com dois andares, 6 quartos, duas salas, duas cozinhas e quintal. Tamanho de 40 m²', 'preco'=> '1000000'],
		['nome' => 'Barco simples', 'descricao'=> 'Um barco simples de tamanho 5x3m', 'preco'=> '60000'],
		['nome' => 'Navio', 'descricao'=> 'Um navio possui mais aposentos como quartos banheiro e cozinha. Tamanho 20x6m', 'preco'=> '400000'],
		['nome' => 'Barco simples voador', 'descricao'=> 'É um barco simples, porém encantado com magia poderosa que lhe permite navegar entre as nuvens.', 'preco'=> '1800000'],
		['nome' => 'Navio voador', 'descricao'=> 'É a mesma coisa do navio, porém encantado com magia poderosa que lhe permite navegar entre as nuvens.', 'preco'=> '7600000'],
		['nome' => 'Castelo', 'descricao'=> 'Um castelo gigantesco com aproximadamente 32 cômodos. Contém área de treinamento, jardim, vários quarto, salas, cozinhas e banheiros.', 'preco'=> '47000000']
		];
		require_once $this->controller_render('precos');
	}

	function fichas_base(){
		$pv = $def = $dano = $mana = 0;

		if (isset($_REQUEST['nivel'])) {
			$nivel = $_REQUEST['nivel'];
		} else {
			$nivel = mt_rand(1,99);
		}

		if (isset($_REQUEST['dado_de_progressao'])) {
			$dado_de_progressao = $_REQUEST['dado_de_progressao'];
		} else {
			$dado_de_progressao = 6;
		}

		if (isset($_REQUEST['progressao_fixa'])) {
			$progressao_fixa = $_REQUEST['progressao_fixa'];
		} else {
			$progressao_fixa = 'rolado';
		}

		if (isset($_REQUEST['classe'])) {
			$classe = $_REQUEST['classe'];
		} else {
			$classe = 'combatente';
		}

		if ($classe == 'conjurador') {
			$pv 	= 10;
			$def 	= 5;
			$dano 	= 1;
			$mana 	= 10;
		} else {
			$pv 	= 20;
			$def 	= 10;
			$dano 	= 4;
			$mana 	= 5;
		}

		if (isset($_REQUEST['distribuicao'])) {
			$distribuicao = $_REQUEST['distribuicao'];
		} else {
			$distribuicao = 'igual';
		}
		
		$pts = 0;
		$valor = 0;
	 	$html_template = '<div class="col-md-12 fichas">';

	 	for ($i=1; $i < $nivel; $i++) { 
	 		$html_template .= "
	 			<div class=\"row borda\">
		 			<div class=\"col-md-4 pts\">
		 				<b>Lv:{$i}</b> - Pontos: {$pts} 
		 			</div> 
		 			<div class=\"atributos\"> 
		 				<div class=\"col-md-2 pv\">
		 					PV:{$pv} 
		 				</div>
						<div class=\"col-md-2 def\">
		 					DEF:{$def} 
		 				</div>
						<div class=\"col-md-2 dano\">
		 					DANO:{$dano} 
		 				</div>
		 				<div class=\"col-md-2 mana\">
		 					MANA:{$mana}
		 				</div>
		 			</div>
		 		</div>
		 		";

		 	if ($progressao_fixa == 'fixo') {
		 		$valor = (5*$dado_de_progressao);
		 	} else {
		 		$valor_acumulado_por_rolagem = 0;
		 		for ($j=0; $j < 5; $j++) { 
		 			$valor_acumulado_por_rolagem += mt_rand(1,$dado_de_progressao);
		 		}
		 		$valor = $valor_acumulado_por_rolagem;
		 	}

		 	if ($distribuicao == 'igual') {
		 		$pv 	+= intval($valor/4);
		 		$def 	+= intval($valor/4);
		 		$dano 	+= intval($valor/4);
		 		$mana 	+= intval($valor/4);
		 	} else {
		 		$divisores = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1];
		 		$parada = 0;

		 		$porcentagem_pv 	= 0;
		 		$porcentagem_def 	= 0;
		 		$porcentagem_dano 	= 0;
		 		$porcentagem_vida 	= 0;

		 		while ($parada == 0) {
			 		$porcentagem_total = 0;
		 			$novos_divisores = array_rand($divisores, 4);
		 			
		 			foreach ($novos_divisores as $key => $value) {
		 				$porcentagem_total += $divisores[$value];
		 			}

		 			if ($porcentagem_total == 1) {
		 				$parada = 1;
		 				shuffle($divisores);
		 				$porcentagem_pv 	= $divisores[$novos_divisores[0]];
		 				$porcentagem_def 	= $divisores[$novos_divisores[1]];
		 				$porcentagem_dano 	= $divisores[$novos_divisores[2]];
		 				$porcentagem_vida 	= $divisores[$novos_divisores[3]];
		 			}
		 		}

		 		$pv 	+= intval($valor*$porcentagem_pv);
		 		$def 	+= intval($valor*$porcentagem_def);
		 		$dano 	+= intval($valor*$porcentagem_dano);
		 		$mana 	+= intval($valor*$porcentagem_vida);
		 	}

	 		$pts += ($valor);
		}
	 	$html_template .= '</div>';

		require_once $this->controller_render('fichas_base');
	}

	function pocoes(){
		if (isset($_REQUEST['qtd'])) {
			$qtd = $_REQUEST['qtd'];
		} else {
			$qtd = 5;
		}

		$tipos = ['cura','remover_veneno','remover_cegueira','remover_doença','mana'];
		
		for ($i=0; $i < $qtd; $i++) { 
			if (isset($_REQUEST['nivel'])) {
				$nivel = $_REQUEST['nivel'];
			} else {
				$nivel = mt_rand(1,99);
			}

			if (isset($_REQUEST['raridade']) and $_REQUEST['raridade'] == 'todas_as_raridades') {
				$raridade = null;
			} elseif (isset($_REQUEST['raridade'])) {
				$raridade = $_REQUEST['raridade'];
			} else {
				$raridade = null;
			}

			if (isset($_REQUEST['tipo']) and $_REQUEST['tipo'] == 'todas_as_pocoes') {
				$tipo = $tipos[array_rand($tipos)];
			} elseif (isset($_REQUEST['tipo'])) {
				$tipo = $_REQUEST['tipo'];
			} else {
				$tipo = $tipos[array_rand($tipos)];
			}

			if (isset($_REQUEST['nivel']) and $_REQUEST['nivel'] >= 1) {
				if (isset($_REQUEST['nivel_fixo']) and $_REQUEST['nivel_fixo'] == 'sim') {
					$nivel = $_REQUEST['nivel'];
				} elseif (isset($_REQUEST['nivel_fixo']) and $_REQUEST['nivel_fixo'] == 'nao') {
					$nivel = mt_rand(1, $_REQUEST['nivel']);
				}
			} else {
				$nivel = mt_rand(1,99);
			}

			$exibir_pocoes[] = new Pocoes_Model($tipo, $nivel, $raridade);
		}


		require_once $this->controller_render('pocoes');
	}

	function pedras(){
		if (isset($_REQUEST['qtd'])) {
			$qtd = $_REQUEST['qtd'];
		} else {
			$qtd = 5;
		}

		$tipos = ['rubi','esmeralda','safira','topazio','ametista','diamante','opala'];
		
		for ($i=0; $i < $qtd; $i++) { 
			if (isset($_REQUEST['nivel'])) {
				$nivel = $_REQUEST['nivel'];
			} else {
				$nivel = mt_rand(1,99);
			}

			if (isset($_REQUEST['raridade']) and $_REQUEST['raridade'] == 'todas_as_raridades') {
				$raridade = null;
			} elseif (isset($_REQUEST['raridade'])) {
				$raridade = $_REQUEST['raridade'];
			} else {
				$raridade = null;
			}

			if (isset($_REQUEST['tipo']) and $_REQUEST['tipo'] == 'todas_as_pedras') {
				$tipo = $tipos[array_rand($tipos)];
			} elseif (isset($_REQUEST['tipo'])) {
				$tipo = $_REQUEST['tipo'];
			} else {
				$tipo = $tipos[array_rand($tipos)];
			}

			if (isset($_REQUEST['nivel']) and $_REQUEST['nivel'] >= 1) {
				if (isset($_REQUEST['nivel_fixo']) and $_REQUEST['nivel_fixo'] == 'sim') {
					$nivel = $_REQUEST['nivel'];
				} elseif (isset($_REQUEST['nivel_fixo']) and $_REQUEST['nivel_fixo'] == 'nao') {
					$nivel = mt_rand(1, $_REQUEST['nivel']);
				}
			} else {
				$nivel = mt_rand(1,99);
			}

			$pedra = new Pedras_Model();
			$pedra->_set('nivel', $nivel); 
			$pedra->_set('nome', $tipo); 
			
			if ($raridade == null) {
				$pedra->pedra_raridade();
			} else {
				$pedra->_set('raridade', $raridade);
			}


			$habilidades = [
				'rubi'		=> ['dano','experiencia'],
				'esmeralda'	=> ['esquiva','critico_induzido'],
				'safira'	=> ['defesa','vida'],
				'topazio'	=> ['dano','mana'],
				'ametista'	=> ['dano','mana'],
				'diamante'	=> ['dinheiro','drop_level'],
				'opala'		=> ['dano','experiencia','esquiva','critico_induzido','defesa','vida','dinheiro','drop_level']
			];

			$quantidade_habilidades = mt_rand(1,2);
			
			if ($quantidade_habilidades == 1) {
				$metodo = $habilidades[$tipo];
				$metodo = $metodo[array_rand($metodo)];
				$metodo = "pedra_{$metodo}";
				$pedra->$metodo();
				$pedra->pedra_preco();
			} else {
				if ($tipo == 'opala') {
					$metodo1 = "pedra_{$habilidades[$tipo][mt_rand(0,7)]}";
					$metodo2 = "pedra_{$habilidades[$tipo][mt_rand(0,7)]}";		
				}else {
					$metodo1 = "pedra_{$habilidades[$tipo][0]}";
					$metodo2 = "pedra_{$habilidades[$tipo][1]}";
				}
				$pedra->$metodo1();
				$pedra->$metodo2();
				$pedra->pedra_preco();
			}
			

			$exibir_pedras[] = $pedra;
		}

		require_once $this->controller_render('pedras');
	}
}