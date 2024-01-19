<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Article extends Entity
{
  protected $_accessible = [
    'id' => false,
    'created_at' => false,
    'updated_at' => false,
    'published_at' => false,
    '*' => true
  ];
}
