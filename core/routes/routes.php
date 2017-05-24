
<?php
/*
	Class Routes_Lib
	Filtra a URL para o controlador decidir o que fazer
	@author Maickon Rangel
	@copyright help RPG - 2016
*/

class Routes_Core{

	function __construct(){
        $this->router();
    }

    function router(){
        $url = (isset($_GET['url'])) ? $_GET['url'] : '';

        if ($url != '') {
            $url =  array_filter(explode('/', $url));
            // define o nome da classe
            $class = ucfirst("{$url[0]}_Controller");
            $action = 'error';
            $parameters = array();
            // verifica se a classe existe
            if (class_exists("{$class}")) {
                $object = new $class;
                // indice 1 e metodo, verifica-se a posicao 1 nao esta vazia
                // e se tem exatamente dois elementos em $url
                if (isset($url[1]) && count($url) == 2) {
                    if (method_exists($object, $url[1])) {
                        // se nao vaiza, define a acao
                        $action = "{$url[1]}";
                    }
                } elseif (count($url) > 2) {
                    foreach ($url as $key => $value) {
                        if (($key != 1) && ($key != 0)) {
                            $parameters[$key] = $value;
                        }
                    }
                    $parameters = array_values($parameters);
                    $action = "{$url[1]}";
                } elseif (method_exists($object, 'index')) {
                    $action = 'index';
                }
                // chama o metodo definito em action
                if ($action == 'index') {
                    $object->$action();
                } elseif (empty($parameters) and $action != 'index') {
                    if (method_exists($object, $action)) {
                        $object->$action();
                    } elseif (method_exists($object, 'error')) {
                        $object->$action();
                    } else {
                        die("Este controller nao possui nenhuma action base. Crie uma action index() ou error()");
                    }
                } elseif (count($parameters) == 1) {
                    if (method_exists($object, $action)) {
                        $object->$action($parameters[0]);
                    } elseif ((count($parameters) > 1)) {
                        $object->$action($parameters);
                    } else {
                        require 'app/views/error404.phtml';
                    }
                } else {
                    $object->$action($parameters);
                }
            } else {
                require 'app/views/error404.phtml';
            }
        } else {
            global $root_route;
            $class = "{$root_route}_Controller";
            return (new $class)->index();
        }
    }
}