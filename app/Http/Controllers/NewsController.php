<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

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
        $this->validate($request, $this->getValidationRules(), $this->getValidationMessages());

        $newsItem = new News();
        $newsItem->title = $request->input('title');
        $newsItem->short_message = $request->input('short_message');
        $newsItem->message = $request->input('message');
        $newsItem->user_id = Auth::user()->id;

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/img/news/' . $filename);
            Image::make($image)->fit(720, 450)->save($location);
            $newsItem->picture = $filename;
        }

        $newsItem->save();

        return redirect()->to('/news/view/' . $newsItem->id);
    }

    public function edit(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            abort(403);
        }

        $newsItem = News::findOrFail($id);

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
        $this->validate($request, $this->getValidationRules(), $this->getValidationMessages());

        $newsItem->title = $request->input('title');
        $newsItem->short_message = $request->input('short_message');
        $newsItem->message = $request->input('message');

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/img/news/' . $filename);
            Image::make($image)->fit(720, 450)->save($location);
            $newsItem->deletePicture();
            $newsItem->picture = $filename;
        }

        $newsItem->save();

        return redirect()->to('/news/view/' . $newsItem->id);
    }

    public function delete(Request $request)
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            abort(403);
        }

        if (!$request->has('id'))
        {
            abort(404);
        }

        $newsItem = News::findOrFail($request->input('id'));
        $newsItem->delete();

        return redirect()->to('/news');
    }

    public function view($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->incrementViews();

        return view('layouts.news.view', ['newsItem' => $newsItem]);
    }

    protected function getValidationRules()
    {
        return [
            'title' => 'required|max:255',
            'short_message' => 'required',
            'message' => 'required',
            'picture' => 'image'
        ];
    }

    protected function getValidationMessages()
    {
        return [
            'title.required' => __('news.r_title'),
            'short_message.required' => __('news.r_short_message'),
            'message.required' => __('news.r_message')
        ];
    }
}
