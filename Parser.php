<?php

namespace JayChow\ConfigParser;

class Parser
{
	private $_boolBank = array(
		'yes' 	=>	true,
		'y' 	=>	true,
		'1' 	=>	true,
		'true' 	=>	true,
		'on' 	=>	true,
		'no'	=>	false,
		'n'		=>	false,
		'0'		=>	false,
		'false' =>	false,
		'off'	=>	false
	);

	public function load($file)
	{
		$fh = fopen($file, "r");

		if($fh) {
			while (($line = fgets($fh)) !== false){
				$this->_processLine($line);
			}

			fclose($fh);
		} else {
			error_log("Unable to open file");
		}

		//print_r($this);
	}

	private function _processLine($line){
		//if line is blank skip the line
		if(preg_match("/^\s*$/m",$line)){
			return;
		}

		//if line is comment skip the line
		if(preg_match("/^\#/m",$line)){
			return;
		}

		$this->_loadConfig(explode("=", $line));

	}

	private function _loadConfig($arr){
		if(sizeof($arr) != 2){
			return;
		}

		$key = trim($arr[0]);
		$val = trim($arr[1]);

		//Check to see if it's a valid boolean value
		if(array_key_exists ($val, $this->_boolBank)){
			$val = $this->_boolBank[$val];
		}

		//Check to see if it's numeric
		if(is_numeric($val)){
			if(is_float($val)){
				$val = (float) $val;
			}
			if(is_int($val)){
				$val = (int) $val;
			}

		}

		$this->$key = $val;
	}


}