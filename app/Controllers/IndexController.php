<?php

namespace App\Controllers;
use App\Models\Job;

class IndexController
{
  public function indexAction()
  {
    $jobs = Job::all();

    $name = "Bernardino Villagra";
    $profesion = "TIC profesional";

    include '../views/index.php';
  }
}