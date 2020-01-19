<?php
# @Author: Andrea F. Daniele <afdaniele>
# @Email:  afdaniele@ttic.edu
# @Last modified by:   afdaniele


namespace system\packages\docker;

use \system\classes\Core;
use \system\classes\Utils;
use \system\classes\Database;
use \system\classes\Configuration;

/**
*   API to Docker
*/
class Docker{

	private static $initialized = false;

	// disable the constructor
	private function __construct() {}

	/** Initializes the module.
     *
     *	@retval array
	 *		a status array of the form
	 *	<pre><code class="php">[
	 *		"success" => boolean, 	// whether the function succeded
	 *		"data" => mixed 		// error message or NULL
	 *	]</code></pre>
	 *		where, the `success` field indicates whether the function succeded.
	 *		The `data` field contains errors when `success` is `FALSE`.
     */
	public static function init(){
		if( !self::$initialized ){
			// do stuff
			//
			self::$initialized = true;
			return ['success' => true, 'data' => null];
		}else{
			return ['success' => true, 'data' => "Module already initialized!"];
		}
	}//init

	/** Returns whether the module is initialized.
     *
     *	@retval boolean
	 *		whether the module is initialized.
     */
	public static function isInitialized(){
		return self::$initialized;
	}//isInitialized

    /** Safely terminates the module.
     *
     *	@retval array
	 *		a status array of the form
	 *	<pre><code class="php">[
	 *		"success" => boolean, 	// whether the function succeded
	 *		"data" => mixed 		// error message or NULL
	 *	]</code></pre>
	 *		where, the `success` field indicates whether the function succeded.
	 *		The `data` field contains errors when `success` is `FALSE`.
     */
	public static function close(){
		// do stuff
		return ['success' => true, 'data' => null];
	}//close



	// =======================================================================================================
	// Public functions

	public static function pull($image, $async=false){
    // do stuff
  }//pull



	// =======================================================================================================
	// Private functions

  //TODO: this should be private
  public static function docker($command){
    // get docker hostname
    $cmd_parts = ['docker'];
    $hostname = Core::getSetting('docker_hostname', 'docker', null);
    if (!is_null($hostname) && strlen(trim($hostname)) > 0) {
      $cmd_parts = array_merge($cmd_parts, ['-H', $hostname]);
    }
    // turn cmd parts into command string
    $cmd_parts = array_merge($cmd_parts, $command);
    $cmd_parts = array_merge($cmd_parts, ['2>&1']);
    $cmd = implode(' ', $cmd_parts);
    // use docker command
    $output = [];
    $exit_code = 0;
    exec($cmd, $output, $exit_code);
    $success = boolval($exit_code == 0);


    echoArray($cmd);
    echoArray($exit_code);
    echoArray($success);
    echoArray($output);


    $output = array_values($output);



    //
    return [
      'success' => $exit_code,
      'data' => $output
    ];
  }//docker

}//Duckiebot
?>
