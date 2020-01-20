<?php

namespace App\Models;

// require_once 'BaseElement.php';

use App\Models\BaseElement;

class Job extends BaseElement
{
  public function getDurationAsString()
  {
    $years = floor($this->months / 12);
    $extraMonths = $this->months % 12;

    return "Job duration: $years años $extraMonths meses";
  }
}