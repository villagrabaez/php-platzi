<?php

require_once 'vendor/autoload.php';

use App\Models\Job;

$job1 = new Job;
$job1->setTitle("PHP Developer");
$job1->setDescription("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, et.");
$job1->setMonths(14);
$job1->setAchiements([
  "Instalación",
  "Configuración",
  "Manteniento",
]);

$job2 = new Job;
$job2->setTitle("Phayton Developer");
$job2->setDescription("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, et.");
$job2->setMonths(6);
$job2->setAchiements([
  "Instalación",
  "Configuración",
  "Manteniento",
]);

$job3 = new Job;
$job3->setTitle("Devops");
$job3->setDescription("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, et.");
$job3->setMonths(36);
$job3->setAchiements([
  "Instalación",
  "Configuración",
  "Manteniento",
]);

$jobs = [
  $job1,
  $job2,
  $job3,
];