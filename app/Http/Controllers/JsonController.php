<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DetailInformation;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

class JsonController extends Controller
{
    //categories
    public function CatParent(){
        $cat = Category::whereParentId(null)->get();
        return response()->json($cat);
    }

    public function NewsCategories($id = null){
        if($id == null){
            $cat = Category::whereParentId(1)->get();
        } else {
            $cat = Category::whereParentId($id)->get();
        }

        return response()->json($cat);
    }
    public function CatStore(Request $request){
        $cat = Category::create([
            'cat_name' => $request->input('cat_name'),
            'cat_slug' => Str::slug($request->input('cat_name')),
            'parent_id' => 1
        ]);
        return response()->json($cat);
    }


    public function CreateNews(Request $request){
        $title = $request->input('title');
        $thumb_desc = Str::limit($request->input('description'), 150);

        $cek = Information::whereNewsSlug(Str::slug($title))->first();
        if($cek){
            $msg = '<strong>Gagal</strong>'. ', Judul Berita Sudah Tersedia';
        } else {
            $img = $request->file('img');
            $file_name = now()->timestamp.'.png';

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
            //information
            if($request->input('media') == true){
                $video_url = $request->input('video_url');
                $media = 1;
            } else {
                $video_url = '';
                $media = 0;
            }

            $create = Information::create([
                'title' => $request->input('title'),
                'thumb_desc' => $thumb_desc,
                'thumb' => $file_name,
                'cat_id' => $request->input('cat_id'),
                'parent_id' => 1,
                'news_slug' => Str::slug($title),
                'media' => $media
            ]);

            //detail information
            DetailInformation::create([
                'id_info' => $create->id,
                'description' => $request->input('description'),
                'slug' => Str::slug($title),
                'video_url' => $video_url
            ]);

            //update media Information

            $msg = '<strong>Berhasil</strong>'. ', Berita'.' '.$request->input('title').' Berhasil Dibuat';
        }

        return response()->json($msg);
    }

    public function Load(){
        \Cache::forget('my_users');
        $user = \Cache::remember('my_users', now()->addMinutes(5), function () {
            return User::all();
//                ->map(function ($user) {
//                    $user->nik = substr($user->nik, 0, 8);
//                    $user->nik2 = substr($user->nik, 8, 8);
//                    return $user;
//                });
        });
        return response()->json($user);
    }
    public function test(){
        $data ['cat'] = Category::all();
        return view ('test', $data);
    }
    public function Add(Request $request){
        $title = $request->input('title');
        $cek = Information::whereNewsSlug(Str::slug($title))->first();
        if($cek){
            return 'data sudah ada';

        } else {
            $img = $request->file('img');
            $file_name = now()->timestamp.'.png';

            $img = ImageManagerStatic::make($img);
            $upload_img = $img->resize(null, 900, function ($constraint) {
                $constraint->aspectRatio();
            });
            $upload_img->save(public_path("images/news/thumb/{$file_name}"), 80, 'png');

            $create = Information::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'thumb' => $file_name,
                'cat_id' => $request->input('cat_id'),
                'parent_id' => 1,
                'news_slug' => Str::slug($title)
            ]);
            return 'berhasil';
        }

    }
}
