<?php

namespace App\Http\Controllers;
use App\ImportData;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('userData');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    /*public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }*/

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new UsersImport,request()->file('file'));

        return back();
    }
}
