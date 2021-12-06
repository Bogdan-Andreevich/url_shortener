<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShortUrlRequest;
use Symfony\Component\Console\Input\Input;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Psy\Util\Str;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Route;


class UrlShortener extends Controller
{
    public function getUrl(CreateShortUrlRequest $request)
    {
        $url = $request->get('url');
        $key =  uniqid();

        $shortUrl = ShortUrl::create([
            'url' => $url,
            'key' => $key,
        ]);

        if($shortUrl){
            return back()->with('success', route('ShortUrl', ['key' => $key]));
        }else{
            return back()->with('errors', 'Не удалось получить сылку');
        }

    }

    public function getShortUrl(string $key)
    {
        $shortUrl = ShortUrl::where(['key' => $key])->firstOrFail();
        if($shortUrl){
            return redirect($shortUrl->url);
        }
    }

}
