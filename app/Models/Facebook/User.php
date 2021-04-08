<?php

namespace App\Models\Facebook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model {

    use HasFactory;

    protected $guarded = [];

    protected $connection = 'facebook';
    protected $table      = 'palestine_users';

    static function import($line)
    {
        $columns = explode(':', $line);
        $data    = [];
        foreach ($columns as $key => $val)
        {
            $data['column_' . ($key + 1)] = $val;
        }
        self::create($data);


//        $data    = [
//            'mobile'        => $columns[0],
//            'facebook_id'   => $columns[1],
//            'first_name'    => $columns[2],
//            'last_name'     => $columns[3],
//            'gender'        => $columns[4],
//            'city'          => $columns[5],
//            'location'      => $columns[6],
//            'social_status' => $columns[7],
//            'job'           => $columns[8],
//            'graduate_year' => $columns[9],
//            'column_10'     => $columns[10],
//            'column_11'     => $columns[11],
//            'birth_day'     => $columns[12],
//        ];

//        return self::create($data);
    }
}
