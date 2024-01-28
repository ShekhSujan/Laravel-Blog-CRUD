<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\User;
use App\Enums\StatusEnum;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Enums\TrashActionEnum;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $data['title'] = "All Admins";
        $data['allAdmin'] = User::latest('id')->get();
        return view("backend.pages.admin.index")->with($data);
    }

    public function create()
    {
        $data['title'] = "New Admins";
        return view("backend.pages.admin.create")->with($data);
    }

    public function store(UserRequest $request)
    {
        try {
            $image = $request->file('image');
            if ($image) {
                $image_name = $this->uploadImage($image, "assets/uploads/users/", [200, 200]);
            }

            $arr = [
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "username" => $request->input("username"),
                "mobile" => $request->input("mobile"),
                "role" => $request->input("role"),
                "status" => StatusEnum::Active,
                "password" => Hash::make($request->input("password")),
                "image" => $image_name ?? '',
            ];

            User::create($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update Admin";
        $data['selected'] = User::findOrFail($id);
        return view("backend.pages.admin.edit")->with($data);
    }

    public function update(UserUpdateRequest $request)
    {
        try {
            $id = $request->input("id");
            $oldimage = $request->input("image_name");
            $image = $request->file("image");

            if ($image) {
                $image_name = $this->uploadImage($image, "assets/uploads/users/", [200, 200], $oldimage);
            }

            $arr = [
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "username" => $request->input("username"),
                "mobile" => $request->input("mobile"),
                "role" => $request->input("role"),
                "status" => $request->input("status"),
                "image" => $image_name ?? $oldimage,
            ];

            User::where('id', $id)->update($arr);
            Toastr::success('Update Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function trash_list()
    {
        $data['title'] = 'Trash List';
        $data['allAdmin'] = User::onlyTrashed()->latest()->get();
        return view('backend.pages.admin.trash-list')->with($data);
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (User::where("id", $id)->delete()) {
            Toastr::error('Moved To Trash Successfully', 'Warning');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }
        return redirect()->back();
    }

    public function bulk_action(Request $request)
    {
        $type = $request->input("type");
        $id = $request->input("chk");

        if ($type == TrashActionEnum::PermanentDelete->value && $id) {
            $data = User::onlyTrashed()->whereIn("id", $id)->get();
            foreach ($data as $value) {
                if (is_file($value->image)) {
                    unlink($value->image);
                }
                User::where("id", $value->id)->forceDelete();
            }
            Toastr::success('Deleted Successfully', 'Success');
        } elseif ($type == TrashActionEnum::Restore->value && $id) {
            User::whereIn("id", $id)->restore();
            Toastr::success('Restored Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }

    public function change_password($id)
    {
        $data['title'] = 'Change Password';
        $data['id'] = $id;
        return view('backend.pages.admin.change-password')->with($data);
    }

    public function changes_password()
    {
        $data['title'] = 'Change Password';
        $data['id'] = Auth::id();
        return view('backend.pages.admin.change-password')->with($data);
    }
    public function profile_edit()
    {
        $data['title'] = 'Profile Update';
        $data['id'] = Auth::id();
        $data['selected'] = User::find(Auth::id());
        return view("backend.pages.admin.profile-edit")->with($data);
    }
    public function profile_update(Request $request)
    {
        try {
            $id = $request->input("id");
            $oldimage = $request->input("image_name");
            $image = $request->file("image");

            if ($image) {
                $image_name = $this->uploadImage($image, "assets/uploads/users/", [200, 200], $oldimage);
            }
            $arr = [
                "name" => $request->input("name"),
                "mobile" => $request->input("mobile"),
                "image" => $image_name ?? $oldimage,
            ];

            User::where('id', $id)->update($arr);
            Toastr::success('Update Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }
    public function update_password(ChangePasswordRequest $request)
    {
        $id = $request->input("id");
        $arr = [
            "password" => Hash::make($request->input("password")),
        ];
        if (User::where("id", $id)->update($arr)) {
            Toastr::success('Password Updated Successfully', 'Success');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }
        return redirect()->back();
    }
}
