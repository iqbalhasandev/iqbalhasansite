<?php

namespace App\Models\Admin;

use App\Traits\WithCache;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitorCounter extends Model
{
    use HasFactory, WithCache;

    protected static $cacheKey = '__visitor__';
    protected $fillable = ['ip', 'details'];



    public static function visitors()
    {
        return self::orderByDesc('id')->first()->id ?? 0;
    }
    public static function newVisitor(): void
    {
        $visitor = self::create([
            'ip' => request()->ip(),
            'details' => request()->userAgent()
        ]);

        $visitor->forgetCache();
    }

    public static function uniqueVisitor(): void
    {
        if (!Session::has('_visitor_count_' . request()->ip())) {
            $start = Carbon::now();
            $start->hour(00);
            $start->minute(00);
            $end =  Carbon::now();
            $end->hour(23);
            $end->minute(59);
            if (self::where('ip', request()->ip())->whereBetween('created_at', [$start, $end])->count() == 0) {
                self::newVisitor();
            }
            Session::put('_visitor_count_' . request()->ip(), request()->ip());
        }
    }
}
