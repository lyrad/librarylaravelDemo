<?php

namespace App\Contracts;

use App\Entities\ComicBook;
use App\Entities\ElectronicBook;
use App\Entities\PaperBook;

interface BookFactoryInterface
{
    public function createPaperBook(): PaperBook;

    public function createComicBook(): ComicBook;

    public function createElectronicBook(): ElectronicBook;
}
