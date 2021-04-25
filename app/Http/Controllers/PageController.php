<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Information;
use App\Models\News;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Index(){
        $data ['news'] = News::limit(8)
            ->join('users' , 'news.created_by' , '=' , 'users.id')
            ->select(
                'news.title' , 'news.desc', 'news.thumb' , 'news_slug', 'news.created_at as NewsCreated',
                'news.id as NewsId', 'users.name'
            )
            ->get();
        return view ('index', $data);
    }
    public function News(){
        $data ['news'] = News::join('categories' , 'news.cat_id' , '=' , 'categories.id')
            ->join('users' , 'news.created_by' , '=' , 'users.id')
            ->select(
                'news.title' , 'news.desc', 'news.thumb' , 'news_slug', 'news.created_by as NewsCreated',
                'news.id as NewsId', 'users.name'
            )
            ->get();
        return view ('pages.news.news', $data);
    }

    public function DetailNews($slug){
        $data ['news'] = News::whereNewsSlug($slug)
            ->join('users' , 'news.created_by' , '=' , 'users.id')
            ->select(
                'news.title' , 'news.desc', 'news.thumb' , 'news_slug', 'news.created_at as NewsCreated',
                'news.id as NewsId', 'users.name'
            )
            ->first();
        $newsId = $data ['news']->NewsId;
        $data ['comment'] = Comment::whereNewsId($newsId)
            ->join('users' , 'comments.comment_usr_id' , '=' , 'users.id')
            ->orderBy('comments.created_at' , 'DESC')
            ->get();

        return  view ('pages.news.detail-new', $data);

    }



    public function slider(){
        return view('slider');
    }


}
