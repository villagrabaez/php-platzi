<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Job;

$capsule = new Capsule;

$capsule->addConnection([
  'driver'    => 'mysql',
  'host'      => 'localhost',
  'database'  => 'php-platzi',
  'username'  => 'root',
  'password'  => '',
  'charset'   => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

if ( ! empty($_POST["title"]) ) {
  $job = new Job();
  $job->title = $_POST["title"];
  $job->description = $_POST["description"];
  $job->months = $_POST["months"];
  if ( ! empty($_POST["visible"]) && $_POST["visible"] == 'on' ) {
    $job->visible = 1;
  } else {
    $job->visible = 0;
  }
  $job->save();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Resume | Add Job</title>
</head>
<body>
  <h1>Add Job</h1>
  <form action="addJob.php" method="POST">
    <label for="title">Title</label>
    <input type="text" name="title" id="title"><br>
    <label for="description">Description</label>
    <input type="text" name="description" id="description"><br>
    <label for="months">Months</label>
    <input type="number" name="months" id="months"><br>
    <label for="visible">Visible</label>
    <input type="checkbox" name="visible" id="visible"><br>
    <input type="submit" value="Enviar">
  </form>
</body>
</html>