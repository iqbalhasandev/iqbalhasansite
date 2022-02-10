<?php

namespace App\Models\Admin\BTEB;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BTEBResult extends Model
{
    use HasFactory, WithCache;
    protected static $cacheKey = '__bteb_result__';

    protected $fillable = ['session', 'fourth_semester', 'fifth_semester', 'sixth_semester', 'seventh_semester', 'eighth_semester'];


    protected static $cacheKeys = [
        'sessionDesc',
        'OnlySession'
    ];
    public function url($semester)
    {
        switch ($semester) {
            case '4th':
                if ($this->fourth_semester) return \upload_asset($this->fourth_semester);
                break;
            case '5th':
                if ($this->fifth_semester) return \upload_asset($this->fifth_semester);
                break;
            case '6th':
                if ($this->sixth_semester) return \upload_asset($this->sixth_semester);
                break;
            case '7th':
                if ($this->seventh_semester) return \upload_asset($this->seventh_semester);
                break;
            case '8th':
                if ($this->eighth_semester) return \upload_asset($this->eighth_semester);
                break;
            default:
                # code...
                break;
        }
    }
}
