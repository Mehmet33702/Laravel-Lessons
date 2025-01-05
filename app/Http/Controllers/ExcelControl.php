<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserImport;
use Excel;

class ExcelControl extends Controller
{
   public function import_excel()
   {
    return view('import_excel');
   }

   public function import_excel_post(Request $request)
   {
    //dd($request->all());
Excel::import(new UserImport, $request->file('excel_file'));


   }
}