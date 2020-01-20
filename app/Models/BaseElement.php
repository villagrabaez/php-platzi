<?php

namespace App\Models;

// require_once 'Printable.php';

use App\Models\Printable;

class BaseElement implements Printable
{
  protected $title;
  protected $description;
  protected $months;
  protected $achiements = [];
  protected $visible = true;

  public function getTitle()
  {
    return $this->title;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getAchiements()
  {
    return $this->achiements;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function setMonths($months)
  {
    $this->months = $months;
  }

  public function setAchiements(array $achiements)
  {
    $this->achiements = $achiements;
  }

  public function getDurationAsString()
  {
    $years = floor($this->months / 12);
    $extraMonths = $this->months % 12;

    return "{$years} años {$extraMonths} meses";
  }
}