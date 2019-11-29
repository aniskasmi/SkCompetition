<?php
# @Author: Théodore Turpin
# @Date:   2019-03-01T21:49:14+02:00
# @Email:  contact@skyreka.com
# @Filename: index.php
# @Last modified by:   Anis KASMI
# @Last modified time: 2019-05-17T22:39:27+03:00
# @Copyright: Skyreka Studio (skyreka.com)

session_start();

require(__DIR__ . '/vendor/autoload.php');

$application = new Manager\Application();

$application->run();
