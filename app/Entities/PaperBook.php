<?php

namespace App\Entities;

use App\Repositories\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class PaperBook
{

}
