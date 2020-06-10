<?php


namespace App\library\classification;


use App\library\http\Response;

interface IClassificationService
{
    public function classify() : Response;
}
