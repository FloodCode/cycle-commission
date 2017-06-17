<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class NewsController extends Controller
{

    public function index()
    {
        $newsData = News::orderBy('id', 'desc')->paginate(15);

        return view('layouts.news.list', ['newsData' => $newsData]);
    }

    public function add(Request $request)
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            abort(403);
        }

        if ($request->method() === 'POST')
        {
            return $this->actionAdd($request);
        }

        return view('layouts.news.editor', [
            'request' => $request,
            'mode' => 'add',
            'postUrl' => '/news/add'
        ]);
    }

    protected function actionAdd(Request $request)
    {
        $validationMessages = [
            'title.required' => __('news.r_title'),
            'short_message.required' => __('news.r_short_message'),
            'message.required' => __('news.r_message')
        ];

        $this->validate($request, [
            'title' => 'required|max:255',
            'short_message' => 'required',
            'message' => 'required'
        ], $validationMessages);

        $newsItem = new News();
        $newsItem->title = $request->input('title');
        $newsItem->short_message = $request->input('short_message');
        $newsItem->message = $request->input('message');
        $newsItem->user_id = Auth::user()->id;
        $newsItem->save();

        return redirect()->to('/news/view/' . $newsItem->id);
    }

    public function edit(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            abort(403);
        }

        try
        {
            $newsItem = News::findOrFail($id);
        }
        catch (ModelNotFoundException $ex)
        {
            abort(404);
        }

        if ($request->method() === 'POST')
        {
            return $this->actionEdit($request, $newsItem);
        }

        return view('layouts.news.editor', [
            'request' => $request,
            'mode' => 'edit',
            'newsItem' => $newsItem,
            'postUrl' => '/news/edit/' . $newsItem->id
        ]);
    }

    protected function actionEdit(Request $request, $newsItem)
    {
        $validationMessages = [
            'title.required' => __('news.r_title'),
            'short_message.required' => __('news.r_short_message'),
            'message.required' => __('news.r_message')
        ];

        $this->validate($request, [
            'title' => 'required|max:255',
            'short_message' => 'required',
            'message' => 'required'
        ], $validationMessages);

        $newsItem->title = $request->input('title');
        $newsItem->short_message = $request->input('short_message');
        $newsItem->message = $request->input('message');
        $newsItem->save();

        return redirect()->to('/news/view/' . $newsItem->id);
    }

    public function delete(Request $request)
    {
        if (!$request->has('id'))
        {
            abort(404);
        }

        try
        {
            $newsItem = News::findOrFail($request->input('id'));
        }
        catch (ModelNotFoundException $ex)
        {
            abort(404);
        }

        $newsItem->delete();

        return redirect()->to('/news');
    }

    public function view($id)
    {
        try
        {
            $newsItem = News::findOrFail($id);
        }
        catch (ModelNotFoundException $ex)
        {
            abort(404);
        }

        $newsItem->incrementViews();

        return view('layouts.news.view', ['newsItem' => $newsItem]);
    }

}
