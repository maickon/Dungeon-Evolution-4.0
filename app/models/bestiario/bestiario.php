<?php


class Bestiario_Model{

	private $tamanho;
	private $altura;
	private $tipo;
	private $nivel;

	private $dano;
	private $vida;
	private $mana;
	private $defesa;

	private $pontos_total;

	private $esquiva;
	private $critico_nat;
	private $critico_indz;

	private $raridade;

	private $deslocamento;
	private $exemplo;

	private $descricao;
	private $caracteristicas;
	private $habilidades;
	private $indice_raridade;

	function _indice(){
		$indice = 0;
		switch ($this->raridade) {
			case 'unico': $indice = 5;
			break;

			case 'lendario': $indice = 4;
			break;

			case 'raro': $indice = 3;
			break;

			case 'magico': $indice = 2;
			break;

			case 'comum': $indice = 1;
			break;
		}
		return $indice;
	}

	function _set($atributo, $valor){
		$this->$atributo = $valor;
	}

	function _get($atributo){
		return $this->$atributo;
	}

	function tamanhos(){
		$tamanhos = [
			'infimo'=> [
				'dano'=>mt_rand(1,2), 	
				'defesa'=>mt_rand(2,3), 	
				'vida'=>mt_rand(4,8), 		
				'esquiva'=>mt_rand(50,60), 	
				'critico_nat'=>mt_rand(1,4)+intval($this->nivel/4),
				'critico_indz'=>mt_rand(1,4)+intval($this->nivel/4),
				'deslocamento'=>mt_rand(20,50)."m + nível",
				'exemplo'=>'mosca',
				'altura'=>mt_rand(1, 15).' cm'
				],

			'diminuto'=> [
				'dano'=>mt_rand(3,4), 	
				'defesa'=>mt_rand(4,6), 	
				'vida'=>mt_rand(8,14), 	
				'esquiva'=>mt_rand(40,50), 	
				'critico_nat'=>mt_rand(1,7)+intval($this->nivel/4),
				'critico_indz'=>mt_rand(1,7)+intval($this->nivel/4),
				'deslocamento'=>mt_rand(20,30)."m + nível",
				'exemplo'=>'sapo',
				'altura'=>mt_rand(16, 30). 'cm'
				],

			'minimo'=> [
				'dano'=>mt_rand(5,6), 	
				'defesa'=>mt_rand(6,7), 	
				'vida'=>mt_rand(15,23), 	
				'esquiva'=>mt_rand(30,40), 	
				'critico_nat'=>mt_rand(1,10)+intval($this->nivel/4),
				'critico_indz'=>mt_rand(1,10)+intval($this->nivel/4),
				'deslocamento'=>mt_rand(20,30)."m + nível",
				'exemplo'=>'gato, sprite',
				'altura'=>mt_rand(31, 59). 'cm'
				],

			'pequeno'=> [
				'dano'=>mt_rand(7,8), 	
				'defesa'=>mt_rand(8,9), 	
				'vida'=>mt_rand(24,34), 	
				'esquiva'=>mt_rand(20,30), 	
				'critico_nat'=>mt_rand(1,13)+intval($this->nivel/4),
				'critico_indz'=>mt_rand(1,13)+intval($this->nivel/4),
				'deslocamento'=>mt_rand(10,20)."m + nível",
				'exemplo'=>'halfling, goblin',
				'altura'=> "1." . mt_rand(0, 20)."m"
				],

			'medio'=> [
				'dano'=>mt_rand(9,14), 
				'defesa'=>mt_rand(10,17), 	
				'vida'=>mt_rand(35,47), 	
				'esquiva'=>mt_rand(10,20), 	
				'critico_nat'=>mt_rand(1,16)+intval($this->nivel/4),
				'critico_indz'=>mt_rand(1,16)+intval($this->nivel/4),
				'deslocamento'=> 9 + $this->nivel."m",
				'exemplo'=>'humano',
				'altura'=>mt_rand(1,2). "." . mt_rand(0, 59)."m"
				],

			'grande'=> [
				'dano'=>mt_rand(15,22),
				 'defesa'=>mt_rand(18,25), 	
				 'vida'=>mt_rand(48,62), 	
				 'esquiva'=>mt_rand(5,10), 	
				 'critico_nat'=>mt_rand(1,20)+intval($this->nivel/4),
				 'critico_indz'=>mt_rand(1,20)+intval($this->nivel/4),
				 'deslocamento'=>mt_rand(10,20)."m + nível",
				 'exemplo'=>'ogro, troll',
				 'altura'=>mt_rand(3,4). "." . mt_rand(0, 59)."m"
				],

			'enorme'=> [
				'dano'=>mt_rand(23,33),
				 'defesa'=>mt_rand(26,38), 	
				 'vida'=>mt_rand(63,81), 	
				 'esquiva'=>mt_rand(4,8), 	
				 'critico_nat'=>mt_rand(1,24)+intval($this->nivel/4),
				 'critico_indz'=>mt_rand(1,24)+intval($this->nivel/4),
				 'deslocamento'=>mt_rand(20,30)."m + nível",
				 'exemplo'=>'ente',
				 'altura'=>mt_rand(5,9). "." . mt_rand(0, 59)."m"
				],

			'descomunal'=> [
				'dano'=>mt_rand(34,48),
				 'defesa'=>mt_rand(39,55), 	
				 'vida'=>mt_rand(82,107), 	
				 'esquiva'=>mt_rand(3,6), 	
				 'critico_nat'=>mt_rand(1,29)+intval($this->nivel/4),
				 'critico_indz'=>mt_rand(1,29)+intval($this->nivel/4),
				 'deslocamento'=>mt_rand(20,40)."m + nível",
				 'exemplo'=>'dragão jovem',
				 'altura'=>mt_rand(10,18). "." . mt_rand(0, 59)."m"
				],

			'colossal'=> [
				'dano'=>mt_rand(49,68),
				 'defesa'=>mt_rand(56,80), 	
				 'vida'=>mt_rand(108,140), 	
				 'esquiva'=>mt_rand(2,4), 	
				 'critico_nat'=>mt_rand(1,36)+intval($this->nivel/4),
				 'critico_indz'=>mt_rand(1,36)+intval($this->nivel/4),
				 'deslocamento'=>mt_rand(20,50)."m + nível",
				 'exemplo'=>'titãn',
				 'altura'=>mt_rand(19,50). "." . mt_rand(0, 59)."m"
				]
			];

		return $tamanhos[$this->tamanho];
	}

	function set_dano(){
		$dano = $this->tamanhos();
		$this->dano += $dano['dano'] * $this->nivel; 
	}

	function set_vida(){
		$vida = $this->tamanhos();
		$this->vida += $vida['vida'] * $this->nivel; 
	}

	function set_defesa(){
		$defesa = $this->tamanhos();
		$this->defesa += $defesa['defesa'] * $this->nivel; 
	}

	function set_esquiva(){
		$esquiva = $this->tamanhos();
		$this->esquiva = $esquiva['esquiva']; 
	}

	function set_critico_nat(){
		$critico_nat = $this->tamanhos();
		$this->critico_nat = $critico_nat['critico_nat']; 
	}

	function set_critico_indz(){
		$critico_indz = $this->tamanhos();
		$this->critico_indz = $critico_indz['critico_indz']; 
	}

	function set_altura(){
		$altura = $this->tamanhos();
		$this->altura = $altura['altura']; 
	}

	function set_deslocamento(){
		$deslocamento = $this->tamanhos();
		$this->deslocamento = $deslocamento['deslocamento']; 
	}

	function set_exemplo(){
		$exemplo = $this->tamanhos();
		$this->exemplo = $exemplo['exemplo']; 
	}

	function set_raridade($indice){
		$this->dano 		*= $indice;
		$this->vida 		*= $indice;
		$this->defesa 		*= $indice;
		$this->mana 		*= $indice;
		$this->esquiva 		*= $indice;
		$this->critico_nat 	*= $indice;
		$this->critico_indz *= $indice;
	}

	function set_progressao($rolagem_fixa, $distribuicao_fixa, $dado_de_rolagem){
		$pv = $def = $dano = $mana = $total = 0;
		for ($i=1; $i < $this->nivel; $i++) { 
			if ($rolagem_fixa == 'sim') {
		 		$valor = (5*$dado_de_rolagem);
		 	} else {
		 		$valor_acumulado_por_rolagem = 0;
		 		for ($j=0; $j < 5; $j++) { 
		 			$valor_acumulado_por_rolagem += mt_rand(1,$dado_de_rolagem);
		 		}
		 		$valor = $valor_acumulado_por_rolagem;
		 	}

		 	if ($distribuicao_fixa == 'sim') {
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
		 	$total += $valor;
		 }

 		$this->pontos_total = ($total);
 		$this->vida 	= $pv;
 		$this->dano 	= $dano;
 		$this->defesa 	= $def;
 		$this->mana 	= $mana;
	}

	function set_criatura($raridade, $rolagem_fixa = 'nao', $distribuicao_fixa = 'sim', $dado_de_rolagem = 6){
		$this->raridade = $raridade;
		// seta atributos baseado nas rolagens de dados da progressao
		$this->set_progressao($rolagem_fixa, $distribuicao_fixa, $dado_de_rolagem);
		
		// seta atributos baseado no tamanho
		$this->set_dano();
		$this->set_vida();
		$this->set_defesa();
		$this->set_esquiva();
		$this->set_altura();
		$this->set_exemplo();
		$this->set_deslocamento();
		$this->set_critico_nat();
		$this->set_critico_indz();

		// seta atributos baseado no tipo de criatura
		$criatura = simplexml_load_file(PATH_BASE.'config/locale/pt-br/bestiario.xml');
		$tipo = $this->tipo;
		$criatura = ($criatura->$tipo);
		$this->vida 			+= $this->nivel * $criatura->vida;
		$this->dano 			+= $this->nivel * $criatura->dano;
		$this->defesa 			+= $this->nivel * $criatura->defesa;
		$this->mana 			+= $this->nivel * $criatura->mana;	
		$this->descricao		= $criatura->descricao;
		$this->caracteristicas 	= $criatura->caracteristicas->detalhes;
		
		
		// seta atributos baseado na raridade da criatura
		$this->set_raridade($this->_indice());
	}

	function set_habilidades(){
		$habilidades = simplexml_load_file(PATH_BASE.'config/locale/pt-br/habilidades.xml');
		$qtd_habilidades = mt_rand(0,3);
		$novas_habilidades = [];
		$escolhidos = [];

		foreach ($habilidades as $key => $value) {
			$novas_habilidades[] = ['nome'=>$value->nome, 'descricao'=>$value->descricao];	
		}

		if ($qtd_habilidades > 0) {
			for ($i=0; $i < $qtd_habilidades; $i++) { 
				$indice = array_rand($novas_habilidades);
				$escolhidos[] = $novas_habilidades[$indice];
				unset($novas_habilidades[$indice]);		
			}
		}

		$this->habilidades = ($escolhidos);

	}
}