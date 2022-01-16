<?php

namespace App\Models\Portfolio;

use App\Traits\WithCache;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfolioSetting extends Model
{
    use HasFactory, WithCache;
    protected static $cacheKey = '__portfolio_setting__';
    protected static $cacheKeys = [
        '__groups__'
    ];


    protected $fillable = [
        'group',
        'key',
        'display_name',
        'value',
        'type',
        'details',
        'note',
        'order'
    ];

    const TYPES = [
        'text' => 'Text Box',
        'text_area' => 'Text Area',
        'rich_text_box' => 'Rich Textbox',
        'code_editor' => 'Code Editor',
        'checkbox' => 'Check Box',
        'radio_btn' => 'Radio Button',
        'select_dropdown' => 'Select Dropdown',
        'file' => 'File',
        'image' => 'Image',
    ];

    /**
     * Return the Highest Order Menu Item.
     *
     * @param number $parent (Optional) Parent id. Default null
     *
     * @return number Order number
     */
    public function highestOrderSetting($settingGroup = null)
    {
        $order = 1;
        $item = $this->where('group', '=', $settingGroup)->orderBy('order', 'DESC')
            ->first();
        if (!is_null($item)) {
            $order = intval($item->order) + 1;
        }
        return $order;
    }


    /**
     *
     *
     * Short By Group
     *
     * return Group Data
     *
     */
    public function groups($orderBy = 'DESC')
    {
        $settings = $this->all();
        $groupData = [];
        foreach ($settings as $s) {
            $groupData[$s->group][] = $s;
        }
        return $groupData;
    }


    /**
     *
     *
     * Short By Group
     *
     * return only Setting Group
     *
     */
    public function onlyGroup()
    {
        return Cache::rememberForever(self::$cacheKey . '__groups__', function () {
            return $this->select('group')->distinct()->pluck('group');
        });
    }
}
