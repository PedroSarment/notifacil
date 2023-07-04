<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\News;

class NewsController extends Controller
{
    private static function render($state = 'index', $news = null)
    {
       return Inertia::render('News/Index', [ 'news' => $news, 'state' => $state ]);
    }

    public function index()
    {
        $news = News::with('Created_by')->with('Category')->orderByDesc('created_at')->paginate();
       
        throw_if(!$news, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        return self::render('index', $news);
    }

    public function view($id)
    {
        $news = News::with('Created_by')->with('Category')->get();
        $news = $news->find($id);
        $news->update([ 'views' => $news->views + 1 ]);
        $news->created_at = '12/12/12';

        throw_if(!$news, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        return self::render('viewing', $news);
    }

}
