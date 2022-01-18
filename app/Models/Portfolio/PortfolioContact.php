<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioContact extends Model
{
    use HasFactory, WithCache;
    protected static $cacheKey = '__portfolio_contact__';
    protected $fillable = ['name', 'email', 'subject', 'message', 'product', 'delivery_time', 'development_time', 'budget', 'project_description', 'file', 'type'];


    public static function products()
    {
        return [
            'School Management System',
            'Courier Management System',
            'Vendor Management System',
            'Portfolio Development',
            'SMS Integration',
            'API Control System',
        ];
    }
    public static function developmentTimes()
    {
        return [
            '1 - 3 weeks',
            '1 Month',
            '1 - 3 Months',
            '4 - 6 Months',
            '6 Months+',
        ];
    }
    public static function deliveryTimes()
    {
        return [
            '1 - 3 weeks',
            '1 Month',
            '1 - 3 Months',
            '4 - 6 Months',
            '6 Months+',
        ];
    }
    public static function budgets()
    {
        return [
            '$100 - $200',
            '$200 - $300',
            '$400 - $500',
            '$500 - $600',
            '$700 - $900',
            '$1000+',
        ];
    }
    public static function types()
    {
        return [
            'Pre-Sales',
            'Project Proposal',
            'Others',
        ];
    }

    public function file_url()
    {
        if ($this->file) return \upload_asset($this->file);
        return \config('theme.image.default');
    }
}
