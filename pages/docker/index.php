<?php
use \system\classes\Core;
use \system\classes\Configuration;
use \system\packages\docker\Docker;



echoArray(
  Docker::docker(['images'])
);

?>
