<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $newsData = \App\Models\News::orderBy('id', 'desc')->limit(5)->get();

        return view('home', ['newsData' => $newsData]);
    }

    public function blank()
    {
        return view('blank');
    }

    public function trainingMaterials()
    {
        return view('pages.training_materials');
    }

    public function locale($code)
    {
        try
        {
            $localeDomain = \App\Core\Locale::getSubdomain($code);
        }
        catch (\Exception $ex)
        {
            abort(404);
        }

        $urlData = parse_url(url()->previous());
        $urlData = $urlData ? $urlData : [];

        $protocol = array_has($urlData, 'scheme') ? $urlData['scheme'] : config('app.primary_protocol');
        $port = array_has($urlData, 'port') ? ':' . $urlData['port'] : ':' . config('app.primary_port');
        $path = array_has($urlData, 'path') ? $urlData['path'] : '/';
        $query = array_has($urlData, 'query') ? '?' . $urlData['query'] : '';

        $redirectUrl = sprintf('%s://%s%s%s', $protocol, $localeDomain, $port, $path, $query);

        return redirect($redirectUrl);
    }
}
