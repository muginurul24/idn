<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $sitemap = Sitemap::create()->add(Url::create(Str::replace('http://', 'https://', url('/')))->setPriority(1.0));
        collect(['/slots','/casino','/idnpoker','/idnlive','/arcadeGames','/tableGames','/idnraffle','/lottery','/promotion','/referrals','/rtp'])->each(fn($path) => $sitemap->add(Url::create(Str::replace('http://', 'https://', url($path)))->setPriority(0.8)));
        Provider::where('type', 'slot')->get()->each(fn($provider) => $sitemap->add(Url::create(Str::replace('http://', 'https://', url("/slots/{$provider->slug}")))->setLastModificationDate($provider->updated_at)->setPriority(0.6)));
        return $sitemap->toResponse(request());
    }
}
