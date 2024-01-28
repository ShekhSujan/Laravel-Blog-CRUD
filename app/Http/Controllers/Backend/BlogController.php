<?php

namespace App\Http\Controllers\Backend;

use App\Enums\StatusEnum;
use App\Enums\TrashActionEnum;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class BlogController extends Controller
{

    use SlugTrait, UploadTrait;

    public function index()
    {

        $data['title'] = "All Blog";
        $data['allBlog'] = Blog::latest('id')->get();
        return view("backend.pages.blog.index")->with($data);
    }
    public function inactive()
    {

        $data['title'] = "All Inactive Blog";
        $data['allBlog'] = Blog::whereHas('category', function ($query) {
            $query->active();
        })
            ->active()
            ->latest('id')
            ->get();
        return view("backend.pages.blog.inactive")->with($data);
    }

    public function create()
    {
        $data['title'] = "New Blog";
        $data['allCategory'] = Category::active()->get();
        return view("backend.pages.blog.create")->with($data);
    }

    public function store(BlogRequest $request)
    {

        try {
            $image = $request->file('image');
            if ($image) {
                $image_thumnail = $this->uploadImage($image, "assets/uploads/blog/", [450, 250]);
                $image_cover = $this->uploadImage($image, "assets/uploads/blog/", [1920, 1080]);
            }
            $slug = $this->uniqueSlug(Blog::class, $request->input("title"), 'slug');


            $arr = [
                "title" => $request->input("title"),
                "slug" => $slug,
                "short_description" => $request->input("short_description"),
                "description" => $request->input("description"),
                "content_source" => $request->input("content_source"),
                "image_source" => $request->input("image_source"),
                "category_id" => $request->input("category_id"),
                "tag" => $request->input("tag"),
                "meta" => [
                    "meta_title" => $request->input("meta_title"),
                    "meta_keyword" => $request->input("meta_keyword"),
                    "meta_description" => $request->input("meta_description"),
                ],
                'created_by' => auth()->user()->id,
                "status" => StatusEnum::Active,
                "image" => [
                    "thumnail" => $image_thumnail ?? '',
                    "cover" => $image_cover ?? '',
                ],
            ];
            Blog::create($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update Blog";
        $data['selected'] = Blog::findOrFail($id);
        $data['allCategory'] = Category::active()->get();
        return view("backend.pages.blog.edit")->with($data);
    }

    public function update(BlogRequest $request)
    {
        try {
            $data = Blog::where('id', $request->input("id"))->first();
            $thumnail = $data->image['thumnail'] ?? '';
            $cover = $data->image['cover'] ?? '';

            $image = $request->file('image');
            if ($image) {
                $image_thumnail = $this->uploadImage($image, "assets/uploads/blog/", [450, 250], $thumnail);
                $image_cover = $this->uploadImage($image, "assets/uploads/blog/", [1920, 1080], $cover);
            }
            $slug = $this->uniqueSlug(Blog::class, $request->input("title"), 'slug');

            $arr = [
                "title" => $request->input("title"),
                "slug" => $slug,
                "short_description" => $request->input("short_description"),
                "description" => $request->input("description"),
                "content_source" => $request->input("content_source"),
                "image_source" => $request->input("image_source"),
                "category_id" => $request->input("category_id"),
                "tag" => $request->input("tag"),
                "meta" => [
                    "meta_title" => $request->input("meta_title"),
                    "meta_keyword" => $request->input("meta_keyword"),
                    "meta_description" => $request->input("meta_description"),
                ],
                'created_by' => auth()->user()->id,
                "status" => $request->input("status"),
                "image" => [
                    "thumnail" => $image_thumnail ?? $thumnail,
                    "cover" => $image_cover ?? $cover,
                ],

            ];


            $data->update($arr);
            Toastr::success('Save Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }

    public function trash_list()
    {
        $data['title'] = 'Trash List';
        $data['allBlog'] = Blog::onlyTrashed()->latest()->get();
        return view('backend.pages.blog.trash-list')->with($data);
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (Blog::where("id", $id)->delete()) {
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
            $data = Blog::onlyTrashed()->whereIn("id", $id)->get();
            foreach ($data as $value) {
                $thumnail = $value->image['thumnail'] ?? '';
                $cover = $value->image['cover'] ?? '';
                $this->deleteOldFileIfExists($thumnail);
                $this->deleteOldFileIfExists($cover);
                Blog::where("id", $value->id)->forceDelete();
            }
            Toastr::success('Deleted Successfully', 'Success');
        } elseif ($type == TrashActionEnum::Restore->value && $id) {
            Blog::whereIn("id", $id)->restore();
            Toastr::success('Restored Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
}
