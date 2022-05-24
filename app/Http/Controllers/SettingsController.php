<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Validator;

class SettingsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function viewSettings()
    {
        $settings = Settings::all('key', 'value')
            ->keyBy('key')
            ->transform(function ($setting) {
                return $setting->value;
            })
            ->toArray();
        if (request()->is('api*')) {
            return apiResponse($settings,true);
        }
        return view('settings.edit',compact('settings'));
    }
    public function StoreSettings(Request $request)
    {
        $data = $request->except('_token');
        $validate = array();
        foreach ($data as $key => $value) {
            $validate[$key] = 'required';
        }
        $validator = Validator::make($request->all(), $validate);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        foreach ($data as $key => $value) {
            $setting = Settings::firstOrCreate(['key' => $key]);
            $setting->value = $value;
            $setting->save();
        }
        return redirect()->route('settings.index')->with('success', 'Success, Settings Has Been Updated.');
    }
    public function StoreSettingsApi(Request $request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            $setting = Settings::firstOrCreate(['key' => $key]);
            $setting->value = $value;
            $setting->save();
        }
    }
}
