<?php

namespace App\Models;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportIssue extends Model
{
    use HasFactory, WithCache;
    protected $fillable = ['name', 'email', 'subject', 'message', 'file'];
    protected static $cacheKey = '__report_issue__';



    public function file_url()
    {
        if ($this->file) return \upload_asset($this->file);
        return \config('theme.image.default');
    }
}
