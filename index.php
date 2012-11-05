<?php

require 'library/database.php';

require 'library/controller.php';
require 'library/model.php';
require 'library/view.php';
require 'library/bootstrap.php';


$bootstrap = new library\Bootstrap();

$bootstrap->setPathRoot(getcwd());

// $bootstrap->setPathRoot('/' . getcwd());

$bootstrap->setPathController('controller/');
$bootstrap->setPathModel('model/');
$bootstrap->setPathView('view/');
//$bootstrap->setControllerDefault('index');
$bootstrap->init();
