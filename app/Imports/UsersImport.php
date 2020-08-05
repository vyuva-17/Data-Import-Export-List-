<?php

namespace App\Imports;

use App\UserData;
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
        return new UserData([
            //
            'name'     => $row[0],
            'mobile_number' => $row[1],
            'email_id' => $row[2],
            'company' => $row[3],
            'designation' => $row[4],
        ]);
    }
}
