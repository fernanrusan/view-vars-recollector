<?php 
   
namespace ViewVarsRecollector;

class ViewVarsRecollector {
	
	private $prefix;

	public function __construct($settings)
	{
		$this->$prefix = array_key_exists('prefix', $settings) ? $settings['prefix'] : "_"; // _ por defecto
	}

	public function filter($all_vars)
	{
	    $vars_to_view = array_filter($all_vars, function($variable_content, $variable_name) {
	        // True cuando el nombre de la variable empieze por $this->$prefix
	        return strpos($variable_name, $this->$prefix) === 0;
	    }, ARRAY_FILTER_USE_BOTH);

	    $data_to_view = [];
	    foreach($vars_to_view as $nombre => $contenido) {
	        $data_to_view[ltrim($nombre, $this->$prefix)] = $contenido;
	    }
		return $data_to_view;
	}

}

// EOF