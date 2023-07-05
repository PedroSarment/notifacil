<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\News;
use App\Models\Category;
use Carbon\Carbon;
use App\Http\Requests\NewsRequest;


class NewsController extends Controller
{
    private static function render($state = 'index', $news = null, $categorys = null)
    {
       return Inertia::render('News/Index', [ 'news' => $news, 'state' => $state, 'categorys' => $categorys ]);
    }

    public function index()
    {
        $news = News::with('Created_by')->with('Category')->orderByDesc('created_at')->paginate();
       
        throw_if(!$news, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        return self::render('index', $news);
    }

    public function mostRecent()
    {
        $news = News::with('Created_by')->with('Category')->orderByDesc('created_at')->paginate();
       
        throw_if(!$news, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        return response()->json($news);
    }

    public function mostViewed()
    {
        $news = News::with('Created_by')->with('Category')->orderByDesc('views')->paginate();
       
        throw_if(!$news, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        return response()->json($news);
    }

    public function single(Int $id)
    {
        $news = News::with('Created_by')->with('Category')->get();
        $news = $news->find($id);
        $news->update([ 'views' => $news->views + 1 ]);
       
        throw_if(!$news, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        return response()->json($news);
    }

    public function create()
    {
        $categorys = Category::all();

        throw_if(!$categorys, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        $categorysArray = [];
        
        foreach($categorys as $category) {
            $categorysArray[] = [
                'title' => $category->title,
                'id' => $category->id
            ];
        }

        return self::render('creating', null, $categorys); 
    }

    public function store(NewsRequest $request)
    {
        $requestValidated = $request->validated();
        $requestValidated['views'] = 0;
        $news = new News($requestValidated);
        $userCreating = $request->user();
        $userUpdated = $userCreating->News()->save($news);

        throw_if(!$news || !$userUpdated, GeneralException::class, 'Não foi possível salvar a Notícia');

        return redirect()->route('Noticias')->with('message', 'Notícia Cadastrada com Sucesso!');
    }

    public function edit(Int $id)
    {
        $categorys = Category::all();
        $news = News::find($id);

        throw_if(!$categorys || !$news , GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        $categorysArray = [];
        
        foreach($categorys as $category) {
            $categorysArray[] = [
                'title' => $category->title,
                'id' => $category->id
            ];
        }

        return self::render('editing', $news, $categorys); 
    }

    public function update(NewsRequest $request, Int $id)
    {
        $requestValidated = $request->validated();
        $requestValidated['updated_by'] = $request->user()->id;
        $news = News::find($id);
        $news->update($request->validated());

        throw_if(!$news, GeneralException::class, 'Não foi possível atualizar a Notícia');

        return redirect()->route('Noticias')->with('message', 'Notícia Atualizada com Sucesso!');
    }

    public function view(Int $id)
    {
        $news = News::with('Created_by')->with('Category')->get();
        $news = $news->find($id);
        $news->update([ 'views' => $news->views + 1 ]);

        throw_if(!$news, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');
       
        return self::render('viewing', $news);
    }

    public function delete(Int $id)
    {
        $news = News::with('Created_by')->with('Category')->get();
        $news = $news->find($id);

        throw_if(!$news, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        return self::render('deleting', $news, null);
    }

    public function destroy(Int $id)
    {
        $news = News::find($id);

        $deleted = $news->delete();

        throw_if(!$deleted, GeneralException::class, 'Não foi possível excluir a notícia');

        return redirect()->route('Noticias')->with('message', 'Noticia excluída com sucesso!');
    }

}
