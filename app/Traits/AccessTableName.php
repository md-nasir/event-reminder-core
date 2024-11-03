<?php

namespace App\Traits;


/**
 * Trait AccessTableName
 * @package App\Traits
 */
trait AccessTableName
{
  public static function tableName()
  {
    return with(new static)->getTable();
  }
}
