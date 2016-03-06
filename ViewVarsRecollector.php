<?php 
   
namespace Marel\Tools;

class ViewVarsRecollector {
	
	private $prefix;

	public function __construct($settings)
	{
		$this->$prefix = array_key_exists('prefix', $settings) ? $settings['prefix'] : "_"; // _ by default
	}

	public function filterVars($all_vars)
	{
	    $vars_to_parse = array_filter($all_vars, function($variable_content, $variable_name) {
	        // True when variable name begin with $this->$prefix
	        return strpos($variable_name, $this->$prefix) === 0;
	    }, ARRAY_FILTER_USE_BOTH);

	    $vars_to_view = [];
	    foreach($vars_to_parse as $nombre => $contenido) {
	        $vars_to_view[ltrim($nombre, $this->$prefix)] = $contenido;
	    }
		return $vars_to_view;
	}

}

// EOF