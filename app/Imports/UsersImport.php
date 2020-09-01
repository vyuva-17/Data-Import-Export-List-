<?php

namespace App\Imports;

use App\ImportData;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ImportData([
            'client_name' => $row[0],
            'document_type' => $row[1],
            'fields' => $row[2],
            'alias_name' => $row[3],
            'entry_type' => $row[4],
            'format' => $row[5],
            'required_status' => $row[6],
            'output_file_name' => $row[7],
            'prefix_text' => $row[8],
            'sufix_text' => $row[9],
            'filename_separator' => $row[10],
            'json' => $row[11],
            'text' => $row[12],
            'text_separator' => $row[13],
            'show_header' => $row[14],
            'csv' => $row[15],
            'xlsx' => $row[16],
            'xml' => $row[17],
            'lst' => $row[18],
        ]);
    }
}
