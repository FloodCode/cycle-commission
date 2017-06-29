<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Announcement;

class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcementsData = Announcement::orderBy('id', 'desc')->paginate(15);

        return view('layouts.announcements.list', ['announcementsData' => $announcementsData]);
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

        return view('layouts.announcements.editor', [
            'request' => $request,
            'mode' => 'add',
            'postUrl' => '/announcements/add'
        ]);
    }

    protected function actionAdd(Request $request)
    {
        $this->validate($request, $this->getValidationRules(), $this->getValidationMessages());

        $announcementsItem = new Announcement();
        $announcementsItem->title = $request->input('title');
        $announcementsItem->message = $request->input('message');
        $announcementsItem->user_id = Auth::user()->id;
        $announcementsItem->save();

        return redirect()->to('/announcements/view/' . $announcementsItem->id);
    }

    public function edit(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->isAdmin())
        {
            abort(403);
        }

        $announcementsItem = Announcement::findOrFail($id);

        if ($request->method() === 'POST')
        {
            return $this->actionEdit($request, $announcementsItem);
        }

        return view('layouts.announcements.editor', [
            'request' => $request,
            'mode' => 'edit',
            'announcementsItem' => $announcementsItem,
            'postUrl' => '/announcements/edit/' . $announcementsItem->id
        ]);
    }

    protected function actionEdit(Request $request, $announcementsItem)
    {
        $this->validate($request, $this->getValidationRules(), $this->getValidationMessages());

        $announcementsItem->title = $request->input('title');
        $announcementsItem->message = $request->input('message');
        $announcementsItem->save();

        return redirect()->to('/announcements/view/' . $announcementsItem->id);
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

        $announcementsItem = Announcement::findOrFail($request->input('id'));
        $announcementsItem->delete();

        return redirect()->to('/announcements');
    }

    public function view($id)
    {
        $announcementsItem = Announcement::findOrFail($id);
        $announcementsItem->incrementViews();

        return view('layouts.announcements.view', ['announcementsItem' => $announcementsItem]);
    }

    protected function getValidationRules()
    {
        return [
            'title' => 'required|max:255',
            'message' => 'required'
        ];
    }

    protected function getValidationMessages()
    {
        return [
            'title.required' => __('announcements.r_title'),
            'short.required' => __('announcements.r_message')
        ];
    }

}
