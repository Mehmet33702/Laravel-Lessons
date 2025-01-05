<?php

namespace App\Imports;

use App\Models\Ilce; //ilçe models

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel; //Eklendi

class UserImport implements ToCollection, ToModel
{
    private $current =0; //eklendi

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {


    }

    public function model(array $row)
    {
        $this->current++;
        if($this->current > 1)
        {
            $ilcebilgi = new Ilce;
            $ilcebilgi->ilce_adi=$row[0];
            $ilcebilgi->il_adi=$row[1];
            $ilcebilgi->isim=$row[2];
            $ilcebilgi->sayi=$row[3];
            $ilcebilgi->save();

        }
    }
}