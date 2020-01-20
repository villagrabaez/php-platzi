<?php

require_once 'BaseElement.php';

class Job extends BaseElement
{
  public function getDurationAsString(){
    $years = floor($this->months / 12);
    $extraMonths = $this->months % 12;

    return "Job duration: $years años $extraMonths meses";
  }
}