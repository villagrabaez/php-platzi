<?php

namespace App\Controllers;

use App\Models\Job;

class JobsController
{
  public function getAddJobAction($request)
  {
    // var_dump($request->getBody());
    // var_dump($request->getParsedBody());
    if ( $request->getMethod() == 'POST' ) {

      $postData = $request->getParsedBody();

      $job = new Job();
      $job->title = $postData["title"];
      $job->description = $postData["description"];
      $job->months = $postData["months"];
      if ( ! empty($postData["visible"]) && $postData["visible"] == 'on' ) {
        $job->visible = 1;
      } else {
        $job->visible = 0;
      }
      $job->save();
    }

    include '../views/addJob.php';
  }
}
