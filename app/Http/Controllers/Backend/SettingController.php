<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use App\Models\HomeSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\UploadTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class SettingController extends Controller
{
    use UploadTrait;
    public function index()
    {
        $data['title'] = 'Settings';
        $data['selected'] = Setting::first();

        return view('backend.pages.setting.setting')->with($data);
    }
    public function update(Request $request)
    {
        try {
            $data = Setting::first();

            $logo = $request->file("logo");
            $wlogo = $request->file("white_logo");
            $fav = $request->file("favicon");

            if ($logo) {
                $logo_name = $this->uploadFile($logo, "assets/uploads/logo/", $data->logo);
            }
            if ($wlogo) {
                $wlogo_name = $this->uploadFile($wlogo, "assets/uploads/logo/", $data->white_logo);
            }
            if ($fav) {
                $fav_name = $this->uploadFile($fav, "assets/uploads/logo/", $data->favicon);
            }

            $arr = [
                "logo" => $logo_name,
                "white_logo" => $wlogo_name,
                "favicon" => $fav_name,
            ];

            $data->update($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }
    public function email(Request $request)
    {
        try {
            $data = Setting::first();
            $arr = [
                "address" => $request->input('address'),
                "phone" => $request->input('phone'),
                "map" => $request->input('map'),
                "site_email" => $request->input('site_email'),
                "email" => $request->input('email'),
                "cc" => $request->input('cc'),
                "bcc" => $request->input('bcc'),
            ];
            $data->update($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }
    public function copyright(Request $request)
    {
        try {
            $data = Setting::first();
            $arr = [
                "copyright" => $request->input('copyright'),
                "copyright_url" => $request->input('copyright_url'),
            ];
            $data->update($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }
    public function color(Request $request)
    {
        try {
            $data = Setting::first();
            $arr = [
                "color" => $request->input('color'),
            ];
            $data->update($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }
    public function homepage()
    {
        $data['title'] = 'HomePages';
        $data['home'] = HomeSetting::first();
        return view('backend.pages.setting.homepage')->with($data);
    }
    public function home_update(Request $request)
    {
        try {
            $data = HomeSetting::first();
            $data_about = $data->images['about'] ?? '';
            $data_bio = $data->images['bio'] ?? '';

            $about = $request->file("about");
            $bio = $request->file("bio");
            if ($about) {
                $about_image = $this->uploadImage($about, "assets/uploads/home/", [750, 625], $data_about);
            }
            if ($bio) {
                $bio_name = $this->uploadImage($bio, "assets/uploads/home/", [560, 500], $data_bio);
            }
            $arr = [

                "about_title" => $request->input("about_title"),
                "about_subtitle" => $request->input("about_subtitle"),
                "about_tag" => $request->input("about_tag"),
                "service_title1" => $request->input("service_title1"),
                "service_title2" => $request->input("service_title2"),
                "service_title3" => $request->input("service_title3"),
                "service_title4" => $request->input("service_title4"),
                "title1_description" => $request->input("title1_description"),
                "title2_description" => $request->input("title2_description"),
                "title3_description" => $request->input("title3_description"),
                "title4_description" => $request->input("title4_description"),
                "name" => $request->input("name"),
                "designation" => $request->input("designation"),
                "bio_title" => $request->input("bio_title"),
                "bio_description" => $request->input("bio_description"),
                "images" => [
                    "about" => $about_image ?? $data_about,
                    "bio" => $bio_name ?? $data_bio,
                ],

            ];
            $data->update($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

}
