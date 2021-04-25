<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardConroller extends Controller
{
    public function Index()
    {
        return view('master.master-admin');
    }

    public function viewCategory()
    {
        $data ['cat'] = Category::all();
        return view('pages.admin.view-category', $data);
    }

    public function addCategory(Request $request)
    {
        $cat_name = request('cat_name');
        $cat = Category::whereCatSlug(Str::slug($cat_name))->first();
        if ($cat) {
            Alert::error('Error', 'Nama Kategori Sudah Tersedia');
            return back();
        }
        Category::create([
            'cat_name' => $cat_name,
            'cat_slug' => Str::slug($cat_name)
        ]);
        return back()->withToastSuccess('Kategori  ' . $cat_name . '  Berhasil Dibuat');

    }

    public function updateCategory($id)
    {
        $cat_name = request('cat_name');
        $cat = Category::whereCatSlug(Str::slug($cat_name))->first();

        if ($cat) {
            Alert::error('Error', 'Nama Kategori Sudah Tersedia');
            return back();
        }
        Category::whereId($id)->update([
            'cat_name' => $cat_name,
            'cat_slug' => Str::slug($cat_name)
        ]);
        return back()->withSuccess('Kategori Berhasil Update');
    }

    public function deleteCategory($id)
    {
        Category::whereId($id)->delete();
        return back()->withSuccess('Data Berhasil Dihapus');
    }


    public function addNews()
    {
        $data ['cat'] = Category::all();
        return view('pages.admin.add-news', $data);
    }

    public function StoreNews(Request $request)
    {
        $title = $request->input('title');
        $cek = News::whereNewsSlug(Str::slug($title))->first();
        if ($cek) {
            Alert::error('Error', 'Judul Berita Sudah Tersedia');
            return back();
        }
        $img = $request->file('img');
        $file_name = now()->timestamp . '.png';

        $img = ImageManagerStatic::make($img);
        $upload_img = $img->resize(null, 700, function ($constraint) {
            $constraint->aspectRatio();
        });
        $upload_img->save(public_path("images/news/origin/{$file_name}"), 80, 'png');

        $img = ImageManagerStatic::make($img);
        $upload_img = $img->resize(null, 300, function ($constraint) {
            $constraint->aspectRatio();
        });
        $upload_img->save(public_path("images/news/thumb/{$file_name}"), 80, 'png');

        $create = News::create([
            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
            'thumb' => $file_name,
            'cat_id' => $request->input('cat_id'),
            'news_slug' => Str::slug($title),
            'created_by' => Auth::user()->id
        ]);

        return back()->withSuccess('BErita Berhsil DIbuat');

    }

    public function viewNews()
    {
        $data ['news'] = News::join('categories', 'news.cat_id', '=', 'categories.id')
            ->select(
                'news.id', 'news.title', 'categories.cat_name'
            )
            ->orderBy('news.created_at', 'DESC')
            ->get();
        return view('pages.admin.view-news', $data);
    }

    public function newsDelete($id)
    {
        News::whereId($id)->delete();
        return back()->withSuccess('Berita Berhasil Dihapus');
    }

    public function newsEdit($id)
    {
        $data ['cat'] = Category::all();
        $data ['news'] = News::whereId($id)->first();
        return view('pages.admin.edit-news', $data);
    }

    public function newsUpdate($id, Request $request)
    {
        $title = $request->input('title');

        $cek  = News::whereId($id)->first();
        if($cek->title != $request->input('title')){
            $cek_slug = News::whereNewsSlug(Str::slug($title))->first();
            if ($cek_slug) {
                Alert::error('Error', 'Judul Berita Sudah Tersedia');
                return back();
            }
        }

        if ($request->file('img')) {
            $img = $request->file('img');
            $file_name = now()->timestamp . '.png';

            $img = ImageManagerStatic::make($img);
            $upload_img = $img->resize(null, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $upload_img->save(public_path("images/news/origin/{$file_name}"), 80, 'png');

            $img = ImageManagerStatic::make($img);
            $upload_img = $img->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            $upload_img->save(public_path("images/news/thumb/{$file_name}"), 80, 'png');

            $create = News::whereId($id)->update([
                'title' => $request->input('title'),
                'desc' => $request->input('desc'),
                'thumb' => $file_name,
                'cat_id' => $request->input('cat_id'),
                'news_slug' => Str::slug($title),
                'created_by' => Auth::user()->id
            ]);
        }   else {
            $create = News::whereId($id)->update([
                'title' => $request->input('title'),
                'desc' => $request->input('desc'),
                'cat_id' => $request->input('cat_id'),
                'news_slug' => Str::slug($title),
                'updated_by' => Auth::user()->id
            ]);
        }
        return back()->withSuccess('Berita Berhsil Diupdate');

    }


}
