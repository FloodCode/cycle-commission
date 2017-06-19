<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function blank()
    {
        return view('blank');
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
        $path = array_has($urlData, 'path') ? $urlData['path'] : '/';
        $query = array_has($urlData, 'query') ? '?' . $urlData['query'] : '';

        $redirectUrl = sprintf('%s://%s%s%s', $protocol, $localeDomain, $path, $query);

        return redirect($redirectUrl);
    }
}
