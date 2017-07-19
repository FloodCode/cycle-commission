<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Page;

class PagesController extends Controller
{
    public function view($pageName)
    {
        $pageItem = Page::findOrFail($pageName);

        return view('layouts.pages.view', ['pageItem' => $pageItem]);
    }

    public function add(Request $request)
    {
        if ($request->method() === 'POST')
        {
            return $this->actionAdd($request);
        }

        return view('layouts.pages.editor', [
            'request' => $request,
            'mode' => 'add',
            'postUrl' => '/pages/add'
        ]);
    }

    protected function actionAdd(Request $request)
    {
        $this->validate($request, $this->getValidationRules(), $this->getValidationMessages());

        $pageItem = new Page();
        $pageItem->title = $request->input('title');
        $pageItem->name = $request->input('name');
        $pageItem->content = $request->input('content');
        $pageItem->user_id = Auth::user()->id;
        $pageItem->save();

        return redirect()->to('/pages/view/' . $pageItem->name);
    }

    public function edit(Request $request, $pageName)
    {
        $pageItem = Page::findOrFail($pageName);

        if ($request->method() === 'POST')
        {
            return $this->actionEdit($request, $pageItem);
        }

        return view('layouts.pages.editor', [
            'request' => $request,
            'mode' => 'edit',
            'pageItem' => $pageItem,
            'postUrl' => '/pages/edit/' . $pageItem->name
        ]);
    }

    protected function actionEdit(Request $request, $pageItem)
    {
        $this->validate($request, $this->getValidationRules(), $this->getValidationMessages());

        $pageItem->title = $request->input('title');
        $pageItem->name = $request->input('name');
        $pageItem->content = $request->input('content');
        $pageItem->save();

        return redirect()->to('/pages/view/' . $pageItem->name);
    }

    public function delete(Request $request)
    {
        if (!$request->has('name'))
        {
            abort(404);
        }

        $newsItem = Page::findOrFail($request->input('name'));
        $newsItem->delete();

        return redirect()->to('/pages/list');
    }

    public function listPages()
    {
        $pagesData = Page::orderBy('created_at', 'desc')->paginate(30);

        return view('layouts.pages.list', ['pagesData' => $pagesData]);
    }

    protected function getValidationRules()
    {
        return [
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'content' => 'required'
        ];
    }

    protected function getValidationMessages()
    {
        return [
            'title.required' => __('news.r_title'),
            'name.required' => __('news.r_title'),
            'content.required' => __('news.r_message')
        ];
    }

    protected function pageNameExists($name)
    {
        return Page::where('name', $name)->count() > 0;
    }
}
