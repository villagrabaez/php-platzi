<?php

namespace App\Controllers;
use App\Models\Job;
use App\Controllers\BaseController;

class IndexController extends BaseController
{
  public function indexAction()
  {
    $jobs = Job::all();

    $name = "Bernardino Villagra";
    $profesion = "TIC profesional";

    echo $this->renderHTML('index.twig');

    // include '../views/index.php';
  }
}