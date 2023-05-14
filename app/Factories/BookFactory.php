<?php

use \App\Contracts\BookFactoryInterface;
use App\Entities\ComicBook;
use App\Entities\ElectronicBook;
use App\Entities\PaperBook;

class BookFactory implements BookFactoryInterface
{
    public function create(string $type): Book
    {

    }
    public function createPaperBook(): PaperBook
    {
        return new PaperBook();
    }

    public function createComicBook(): ComicBook
    {
        return new ComicBook();
    }

    public function createElectronicBook(): ElectronicBook
    {
        return new ElectronicBook();
    }
}
