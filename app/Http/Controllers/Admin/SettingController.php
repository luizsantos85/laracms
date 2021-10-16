<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $settings = [];

        $dbSettings = Setting::get();
        foreach ($dbSettings as $dbSetting) {
            $settings[$dbSetting['name']] = $dbSetting['content'];
        }

        return view('admin.settings.index', [
            'settings' => $settings
        ]);
    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'title' => ['required','string','max:100'],
            'subtitle' => ['string','max:100'],
            'email' => ['string','email'],
            'description' => ['string'],
            'bgcolor' => ['string','regex:/#[A-Z0-9]{6}/i'],
            'textcolor' => ['string','regex:/#[A-Z0-9]{6}/i'],
        ]);
    }

    public function save(Request $request)
    {
        $data = $request->only([
            'title','subtitle','email','description','bgcolor','textcolor'
        ]);

        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect()->route('settings')
                ->withErrors($validator);
        }

        //salvar
        foreach ($data as $item => $value) {
            Setting::where('name', $item)->update(['content'=>$value]);
        }

        return redirect()->route('settings')->with('warning', 'Informações alteradas com sucesso.');
    }
}
