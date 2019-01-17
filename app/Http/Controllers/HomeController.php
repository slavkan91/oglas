<?php

namespace App\Http\Controllers;

use App\Kategorija;
use App\Oglas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use KubAT\PhpSimple\HtmlDomParser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategorije = Kategorija::pluck('name', 'id')->all();
        foreach ($kategorije as $key => $value){
            if(strtolower($value)=='audi'){
                unset($kategorije[$key]);
            }
        }

        return view('home', compact('kategorije'));
    }

    public function create(){
        $file_name = "https://www.polovniautomobili.com/auto-oglasi/pretraga?brand=audi&model=&price_from=40000&price_to=&year_from=&year_to=&door_num=&submit_1=&without_price=1&date_limit=&showOldNew=all&modeltxt=&engine_volume_from=&engine_volume_to=&power_from=&power_to=&mileage_from=&mileage_to=&emission_class=&seat_num=&wheel_side=&registration=&country=&city=&page=&sort=";

        $dom = HtmlDomParser::file_get_html( $file_name );

        $kategorija = Kategorija::where('name', strtolower('audi'))->first();

        Oglas::where('kategorija_id', $kategorija->id)->delete();

        foreach ($dom->find('article') as $article) {

            if (is_object($article->find('a.classified-link', 0))) {

                $price = $article->find('span.price', 0)->innertext();
                $year = $article->find('span', 3)->innertext();
                $mileage = $article->find('span', 4)->innertext();

                $item['ime'] = $article->find('a.classified-link', 0)->innertext();
                $item['cijena'] = preg_replace("/[^0-9]/", "", $price);
                $item['slika'] = $article->find('img', 0)->src;
                $item['godiste'] = preg_replace("/[^0-9]/", "", $year);
                $item['kilometraza'] = preg_replace("/[^0-9]/", "", $mileage);

            } elseif (is_object($article->find('a.ga-title', 0))) {

                $price = $article->find('span.price', 0)->innertext();
                $year = $article->find('div.inline-block', 0)->innertext();
                $mileage = $article->find('div.inline-block', 1)->innertext();

                $item['ime'] = $article->find('a.ga-title', 0)->title;
                $item['cijena'] = preg_replace("/[^0-9]/", "", $price);

                if ($article->find("img", 0)->getAttribute('data-src')) {
                    $item['slika'] = $article->find("img", 0)->getAttribute('data-src');
                } else {
                    $item['slika'] = $article->find('img', 0)->src;
                }

                $item['godiste'] = preg_replace("/[^0-9]/", "", $year);
                $item['kilometraza'] = preg_replace("/[^0-9]/", "", $mileage);

            }

            $item['odobreno'] = 1;
            $item['user_id'] = Auth::user()->id;
            $item['kategorija_id'] = $kategorija->id;

            Oglas::create($item);
        }

        return redirect()->back();
    }
}
