<?php

include_once 'helpers.php';

spl_autoload_extensions('.php,_interface.php,_abstract.php,_trait.php');
spl_autoload_register();

include_once 'vendor/autoload.php';
include_once 'router.php';