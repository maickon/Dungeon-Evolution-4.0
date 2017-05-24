<?php

class Console_Core{

	function __construct(){
		do{
			$op = readline('[ProdigioFramework]>> ');
			if ($op != 'exit') {
				$this->menu($op);
			}
		} while($op != 'exit');
	}

	function menu($option){
		$actions = [
		'help' 					=> 'help',	
		'new model'				=> 'new_model',
		'new controller'		=> 'new_controller',
		'new view'				=> 'new_view',

		'del model'				=> 'del_model',
		'del controller'		=> 'del_controller',
		'del view'				=> 'del_view',
		
		'prodigio scaffold' 	=> 'prodigio_scaffold'
		];

		$comand = explode('::', $option);
		if (!isset($actions[$comand[0]])) {
		} else {
			if ($option == 'help') {
				$this->help();
			} else {
				$method = $actions[$comand[0]];
				$this->$method($comand[1]);
			}
		}
	}

	function new_model($params){
		$data_model = explode(" ", $params);
		$model_name = $data_model[0];
		unset($data_model[0]);
		$fields = $data_model;
		$table = new StdClass;
		$table->table_name = strtolower($model_name);

		foreach ($fields as $key => $value) {
			$field = explode(':', $value);
			$field_name = $field[0];  
			$field_type = $field[1];
			$table->$field_name = $field_type; 
		}

		$build 	= new Build_Core;
		global $console_db_model, $console_xml_model;

		if ($console_db_model == true) {
			$db 	= new Dbcreate_Core;
			if ($db->__createTable($table)) {
				echo("[OK!]Tabela {$table->table_name} criada com sucesso!");
			} else {
				echo("[FALHA!]Tabela {$table->table_name} não foi criada!");
			}
		}

		if ($console_xml_model == true) {
			if ($build->build_schema($table)) {
				echo("\n[OK!]Arquivo {$table->table_name}.xml atualizado com sucesso!");
			} else {
				echo("\n[FALHA!]Arquivo {$table->table_name}.xml não atualizado!");
			}
		}

		if ($build->build_model($table)) {
			echo("\n[OK!]Arquivo {$table->table_name}.php atualizado com sucesso!");
		} else {
			echo("\n[FALHA!]Arquivo {$table->table_name}.php não atualizado!");
		}
		system("PAUSE");
	}

	function new_controller($params){
		$data_controller = explode(" ", $params);
		$controller_name = $data_controller[0];
		unset($data_controller[0]);
		$methods = $data_controller;

		$controller = new StdClass;
		$controller->class_name = lcfirst($controller_name);

		foreach ($methods as $key => $value) {
			if ($value == 'crud:ok') {
				$controller->index 	= 'index()';
				$controller->create = 'create()';
				$controller->update = 'update($table, $fields)';
				$controller->delete = 'delete($table,$id)';
			} else {
				$method = explode(':', $value);
				if (!isset($method[1])) {
					echo("\n[FALHA!]Arquivo {$controller->class_name}.php não atualizado!");
					break;
				} else {
					$method_name 						= $method[1];
					$method_atribute_name				= explode('(', $method_name)[0];
					$controller->$method_atribute_name 	= $method_name;
				}
			}
		}

		$build = new Build_Core;
		if($build->build_controller($controller)){
			echo("\n[OK!]Arquivo {$controller->class_name}.php atualizado com sucesso!");
		} else {
			echo("\n[FALHA!]Arquivo {$controller->class_name}.php não atualizado!");
		}
		system("PAUSE");
	}

	function new_view($params){
		$data_view = explode("::", $params);
		$methods = get_class_methods("{$data_view[0]}_Controller");
		if (empty($methods)) {
			echo("\n[FALHA!]Controller não existe! Não é possível criar a view.");
		} else {
			$view_methods = [];
			foreach ($methods as $key => $value) {
				$compare = stripos($value, 'controller_');
				if ($compare != ' ') {
					$view_methods[] = $value;
				}
			}
			unset($view_methods[count($view_methods)-1]);
			$build = new Build_Core;
			$data_view[0] = strtolower($data_view[0]);
			if($build->build_view($view_methods, $data_view[0])){
				echo("\n[OK!]Todos os arquivos da view foram atualizado com sucesso!");
			} else {
				echo("\n[FALHA!]Arquivo de view não atualizado!");
			}
		}
		system("PAUSE");
	}

	function del_model($params){
		$data_model = explode("::", $params);		
		$data_model = explode(' ', $data_model[0]);
		if (count($data_model) > 1) {
			foreach ($data_model as $key => $value) {
				$value = strtolower($value);
				if (file_exists(PATH_BASE."app/models/{$value}.php")) {
					if(unlink(PATH_BASE."app/models/{$value}.php")) {
						echo("\n[OK!]Arquivo {$value}.php apagado com sucesso!");
					} else {
						echo("\n[FALHA!]Arquivo {$value}.php não apagado!");
					}
				} else {
					echo("\n[FALHA!]Arquivo {$value}.php não existe!");
				}
			}
		} else {
			$file = strtolower($data_model[0]);
			if (file_exists(PATH_BASE."app/models/{$file}.php")) {
				if(unlink(PATH_BASE."app/models/{$file}.php")){
					echo("\n[OK!]Arquivo {$file}.php apagado com sucesso!");
				} else {
					echo("\n[FALHA!]Arquivo {$file}.php não foi apagado!");
				}
			} else {
				echo("\n[FALHA!]Arquivo {$file}.php não existe!");
			}

		}
		system("PAUSE");
	}

	function del_controller($params){
		$data_controller = explode("::", $params);		
		$data_controller = explode(' ', $data_controller[0]);
		if (count($data_controller) > 1) {
			foreach ($data_controller as $key => $value) {
				$value = strtolower($value);
				if (file_exists(PATH_BASE."app/controllers/{$value}.php")) {
					if(unlink(PATH_BASE."app/controllers/{$value}.php")) {
						echo("\n[OK!]Arquivo {$value}.php apagado com sucesso!");
					} else {
						echo("\n[FALHA!]Arquivo {$value}.php não apagado!");
					}
				} else {
					echo("\n[FALHA!]Arquivo {$value}.php não existe!");
				}
			}
		} else {
			$file = strtolower($data_controller[0]);
			if (file_exists(PATH_BASE."app/controllers/{$file}.php")) {
				if(unlink(PATH_BASE."app/controllers/{$file}.php")){
					echo("\n[OK!]Arquivo {$file}.php apagado com sucesso!");
				} else {
					echo("\n[FALHA!]Arquivo {$file}.php não foi apagado!");
				}
			} else {
				echo("\n[FALHA!]Arquivo {$file}.php não existe!");
			}

		}
		system("PAUSE");
	}

	function del_view($params){
		$data_model = explode("::", $params);		
		$data_model = explode(' ', $data_model[0]);
		if (count($data_model) > 1) {
			$view = $data_model[0]; 
			unset($data_model[0]);
			$flag = false;
			foreach ($data_model as $key => $value) {
				$value = strtolower($value);
				if (file_exists(PATH_BASE."app/views/{$view}/{$value}.phtml")) {
					if(unlink(PATH_BASE."app/views/{$view}/{$value}.phtml")){
						$flag = true;
					} else {
						echo("\n[FALHA!]Arquivo {$value} nao apagado!");
					}
				} else {
					echo("\n[FALHA!]Arquivo {$value} nao existe!");
				}
			}
			
			if($flag){
				echo("\n[OK!]Arquivos apagados com sucesso!");
			}
		} else {
			$file = strtolower($data_model[0]);
			if (file_exists(PATH_BASE."app/views/{$file}/")) {
				if($this->obliterate_directory(PATH_BASE."app/views/{$file}/")){
					echo("\n[OK!]Pasta {$file}/ apagado com sucesso!");
				} else {
					echo("\n[FALHA!]Pasta {$file}/ nao foi apagado!");
				}
			} else {
				echo("\n[FALHA!]Pasta {$file}/ nao existe!");
			}

		}
		system("PAUSE");
	}

	function help(){
		echo('
Comandos básicos
[new model] => Cria uma novo modelo. Gera a classe e a respectiva tabela no DB.
Exemplos: 
	new model::Usuarios nome:varchar(255) login:varchar(255) email:varchar(255)
	new model::Livros nome:varchar(255) isbn:integer preco:decimal(10,2)
---------------------------------------------------------------------------------------------------
[new controller] => Cria uma nova classe controller. Voce pode passar metodos como parametro.
Os metodos seguem o padrão (function:nome do metodo + parametros). Se quiser, pode chamar
o comando crud:ok. Com isso metodos base como index (create, update e delete) 
já serão criados automaticamente.
Exemplos:
	new controller::Usuarios crud:ok function:relatorio() function:calcular($valor)
	new controller::Livros function:calcular_frete()
---------------------------------------------------------------------------------------------------
[new view] => Cria um arquivo de view para cada método no seu controller. Os arquivos 
vão ficar dentro de uma pasta com o nome do módulo.
Exemplo: 
	new view::Livros //cria a pasta livros/ dentro de view com um arquivo correspondente
para cada método do controller.
---------------------------------------------------------------------------------------------------
[del model] => Apaga um arquivo de classe de modelo.
Exemplo:
	del model::Livros //vai apagar o arquivo em app/models/livros.php
---------------------------------------------------------------------------------------------------
[del controller] => Apaga um arquivo de classe de controller.
Exemplo:
	del controller::Livros //vai apagar o arquivo em app/controllers/livros.php
---------------------------------------------------------------------------------------------------
[del view] => Apaga a pasta com todos os arquivos dentro da view selecionada ou apaga apenas um
único ou mais arquivos dentro do modulo selecionado.
Exemplos:
	del view::Livros //vai apagar a pasta em app/views/livros com tudo que estiver dentro.
	del view::Livros index //vai apagar o arquivo index.phtml dentro app/views/livros/index.phtml
	del view::Livros index show //apaga os arquivos index.phtml e show.phtml
---------------------------------------------------------------------------------------------------
[prodigio scaffold] => Cria o model, a view, o controller e a tabela de banco de dados
referente ao comando.
Exemplo:
	prodigio scaffold::Carros nome:varchar(255) modelo:varchar(255) preco:decimal(10,2) 
	descricao:text
	Este comando vai criar a tabela carros com os campos que foram definidos mais id(PK) e 
	created_at(timestamp). Estes dois campos são padra para qualquer tabela criada.
	Com base neste modelo de tabela, o model, controller e view serão criados.
---------------------------------------------------------------------------------------------------			');
		system("PAUSE");
	}

	function obliterate_directory($dir) {
		$iter = new RecursiveDirectoryIterator($dir);
		foreach (new RecursiveIteratorIterator($iter,
			RecursiveIteratorIterator::CHILD_FIRST) as $f) {
			if ($f->isDir()) {
				@rmdir($f->getPathname());
			} else {
				unlink($f->getPathname());
			}
		}
		if (rmdir($dir)) {
			return true;
		} else {
			return false;
		}
	}
}