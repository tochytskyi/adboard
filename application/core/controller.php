<?php

abstract class Controller {
	
	protected $model;
	protected $view;
	
	function __construct($model_name)
	{
		$this->view = new View();
                if($model_name!==""){
                    $this->model = new $model_name();
                }
	}
	
	// действие (action), вызываемое по умолчанию
	abstract function action_index();
	

}
