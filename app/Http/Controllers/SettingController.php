<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{   
    public function index(){
        $settings = Setting::all()->pluck('value','key');
        return view('pages.setting.index',compact('settings'));
    }

    public function store(Request $request){
        Setting::setValue('site_name',$request->site_name);
        Setting::setValue('email', $request->email);
        Setting::setValue('address', $request->address);
        Setting::setValue('phone', $request->phone);
        Setting::setValue('kepala', $request->kepala);
        Setting::setValue('nip_kepala', $request->nip_kepala);

          foreach (['logo', 'favicon'] as $key) {
                if ($request->hasFile($key)) {

                    $file = $request->file($key);
                    // Hapus file lama jika ada
                    $oldPath = Setting::getValue($key);
                   
                    if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }

                    // Simpan file baru ke storage/app/public/setting/
                    $path = Storage::disk('public')->put('setting', $file);

                    // Simpan path ke DB (relatif dari public)
                    Setting::setValue($key, $path);
                }
            }

        return back()->with('success',"Berhasil Di Update");
    }
}
