<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Portfolio\PortfolioSetting;

class PortfolioSettingController extends Controller
{
    public function __construct()
    {
        \config_set('theme.cdata', [
            'title' => 'Portfolio Setting Management',
            'description' => 'Portfolio Setting Management.',

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        $portfolioSetting = new PortfolioSetting;

        // return  PortfolioSetting::TYPES;
        // cache data
        $settings = $portfolioSetting->groups();

        $groups = $portfolioSetting->onlyGroup();
        $active = (request()->session()->has('setting_tab')) ? request()->session()->get('setting_tab') : old('setting_tab', key($settings));

        return \view('pages.admin.portfolio.setting.base', ["S_TYPES" => PortfolioSetting::TYPES, 'settings' => $settings, 'groups' => $groups, 'active' => $active]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request;
        if (!isset($request->group)) {
            $data['group'] = 'general';
        }
        $data['key'] = implode("_", explode(" ", (Str::lower($data->group)))) . '.' . \implode("_", explode(" ", $data->key));
        $data['details'] = (array) \json_decode($request->details);
        $data['details'] = \json_encode($request->details);
        $data->validate([
            'key' => 'required|unique:settings|max:255',
            'display_name' => 'required|max:255',
            'type' => 'required|max:255',
            'group' => 'max:255',
        ]);

        $PortfolioSetting = new PortfolioSetting;

        $data['order'] = $PortfolioSetting->highestOrderSetting($data->group);

        $PortfolioSetting->create($data->all());

        // forget cache
        $PortfolioSetting->forgetCache();


        session()->flash('Success', 'Successfully Create Setting');
        return redirect()->route('admin.portfolio.settings.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $portfolioSetting = new PortfolioSetting;

        foreach ($request->data as $id => $value) {
            // return $value;
            $setting = $portfolioSetting->find($id);
            $setting->group =   $request->group[$id];

            $key = explode(".", $setting->key);
            unset($key[0]);

            $setting->key = implode("_", explode(" ", (Str::lower($setting->group)))) . '.' . \implode("_", $key);

            if ($request->hasFile('data.' . $id)) {
                $value = Storage::putFile('setting', $request->file('data.' . $id));
                Storage::delete($setting->value);
            }
            $setting->value = $value;
            $setting->save();
        }
        // forget cache
        $portfolioSetting->forgetCache();

        request()->flashOnly('setting_tab');

        Session::flash('success', 'Setting Successfully Saved');
        return \redirect()->route('admin.portfolio.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioSetting $portfolioSetting)
    {
        $portfolioSetting->delete();

        // forget cache
        $portfolioSetting->forgetCache();

        Session::flash('success', 'Setting Successfully Deleted');
        return \redirect()->route('admin.portfolio.settings.index');
    }

    /**
     * Order the specified Setting from Settings table.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function move_up(PortfolioSetting $portfolioSetting)
    {

        $swapOrder = $portfolioSetting->order;
        $previousSetting = PortfolioSetting::where('order', '<', $swapOrder)
            ->where('group', $portfolioSetting->group)
            ->orderBy('order', 'DESC')->first();

        if (isset($previousSetting->order)) {
            $portfolioSetting->order = $previousSetting->order;
            $portfolioSetting->save();
            $previousSetting->order = $swapOrder;
            $previousSetting->save();

            // forget cache
            $portfolioSetting->forgetCache();

            Session::flash('success',  $portfolioSetting->display_name . ' Successfully moved up');
        } else {
            Session::flash('error',  $portfolioSetting->display_name . ' Already at top');
        }

        request()->session()->flash('setting_tab', $portfolioSetting->group);

        return \redirect()->route('admin.portfolio.settings.index');
    }

    /**
     * Order the specified Setting from Settings table.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function move_down(PortfolioSetting $portfolioSetting)
    {
        $swapOrder = $portfolioSetting->order;

        $previousSetting = PortfolioSetting::where('order', '>', $swapOrder)
            ->where('group', $portfolioSetting->group)
            ->orderBy('order', 'ASC')->first();

        if (isset($previousSetting->order)) {
            $portfolioSetting->order = $previousSetting->order;
            $portfolioSetting->save();
            $previousSetting->order = $swapOrder;
            $previousSetting->save();

            // forget cache
            $portfolioSetting->forgetCache();

            Session::flash('success',  $portfolioSetting->display_name . ' Moved order down');
        } else {
            Session::flash('error',  $portfolioSetting->display_name . ' Already at bottom');
        }
        request()->session()->flash('setting_tab', $portfolioSetting->group);

        return \redirect()->route('admin.portfolio.settings.index');
    }

    /**
     * unset value the specified Setting from Settings table.
     *
     * @param  \App\Models\Portfolio\PortfolioSetting  $portfolioSetting
     * @return \Illuminate\Http\Response
     */
    public function unsetValue(PortfolioSetting $portfolioSetting)
    {
        Storage::delete($portfolioSetting->value);
        $portfolioSetting->value = \null;
        $portfolioSetting->save();

        // forget cache
        $portfolioSetting->forgetCache();

        return \redirect()->route('admin.portfolio.settings.index');
    }
}
