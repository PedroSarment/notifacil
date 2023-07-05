<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\News;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    private static function render($state = 'index', $categorys = null, $category = null)
    {
       return Inertia::render('Category/Index', [ 'state' => $state, 'categorys' => $categorys, 'category' => $category]);
    }

    public function index()
    {
        $categorys = Category::orderByDesc('created_at')->paginate();
       
        throw_if(!$categorys, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        return self::render('index', $categorys);
    }

    public function create()
    {
        $categorys = Category::orderByDesc('created_at')->paginate();

        throw_if(!$categorys, GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        return self::render('creating', $categorys); 
    }

    public function store(CategoryRequest $request)
    {
        $requestValidated = $request->validated();
        $category = new Category($requestValidated);
        $userCreating = $request->user();
        $userUpdated = $userCreating->Categorys()->save($category);

        throw_if(!$category || !$userUpdated, GeneralException::class, 'Não foi possível salvar a Categoria');

        return redirect()->route('Categorias')->with('message', 'Categoria cadastrada com sucesso!');
    }

    public function delete(Int $id)
    {
        $category = Category::find($id);
        $categorys = Category::all();
        
        throw_if(!$categorys || !$category , GeneralException::class, 'Falha ao tentar acessar o Banco de Dados');

        $categorysArray = [];
        
        foreach($categorys as $category) {
            $categorysArray[] = [
                'title' => $category->title,
                'id' => $category->id
            ];
        }
       
        return self::render('deleting', $categorysArray, $category);
    }

    public function destroy(Int $id, Request $request)
    {   
        $fields = $request->all();
        
        Validator::make($fields, [
            'category_id' => ['required', 'int'],
        ])->validate();

        $newsInDeletedCategory = News::where('category_id', $id);

        foreach($newsInDeletedCategory as $news) {

            $news->update(['category_id', $fields['category_id']]);
        }
       
        $category = Category::find($id);
        $deleted = $category->delete();

        throw_if(!$deleted || !$category || !$newsInDeletedCategory, GeneralException::class, 'Não foi possível excluir a notícia');

        return redirect()->route('Categorias')->with('message', 'A categoria foi excluida.');
    }
}
