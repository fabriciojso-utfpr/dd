<?php

namespace App\Http\Controllers;

use App\Forms\PersonagemForm;
use App\Personagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class PersonagemController extends Controller
{

    use FormBuilderTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $personagens = Personagem::where('user_id', Auth::id())->get();
        return view("personagem/lista", compact('personagens'));
    }


    public function create()
    {
        $form = $this->form(PersonagemForm::class, [
            'method' => 'POST',
            'url' => route('personagem.store')
        ]);

        return view("personagem/novo")->with(compact('form'))->with(["titulo"=>"Adicionar Personagem"]);
    }


    public function store(Request $request)
    {
        $form = $this->form(PersonagemForm::class);
        $form->validate(['nome'=>'required|unique:personagems,nome'], [
            'title.required' => 'O nome do personagem é obrigatório!',
            'title.unique' => 'O nome do personagem deve ser único'
        ]);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        Personagem::create($request->all());
        return redirect()->route("personagem.index");
    }


    public function edit(Personagem $personagem)
    {
        if($personagem->user_id != Auth::id()){
            return redirect()->route("personagem.index");
        }
        $form = $this->form(PersonagemForm::class, [
            'method' => 'PUT',
            'url' => route('personagem.update',['id'=>$personagem->id]),
            'model'=>$personagem
        ]);

        return view("personagem/novo")->with(compact('form'))->with(["titulo"=>"Editar: {$personagem->nome}"]);
    }


    public function update(Request $request, Personagem $personagem)
    {
        if($personagem->user_id != Auth::id()){
            return redirect()->route("personagem.index");
        }
        $form = $this->form(PersonagemForm::class);
        $form->validate(['nome'=>'required|unique:personagems,nome,'.$personagem->id], [
            'title.required' => 'O nome do personagem é obrigatório!',
            'title.unique' => 'O nome do personagem deve ser único'
        ]);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $personagem->update($request->all());
        return redirect()->route("personagem.index");
    }


    public function destroy(Personagem $personagem)
    {
        if($personagem->user_id != Auth::id()){
            return redirect()->route("personagem.index");
        }
        $personagem->delete();
        return redirect()->route("personagem.index");
    }

    public function show(){
        return [
            'forca'=>rand(3, 18),
            'destreza'=>rand(3, 18),
            'agilidade'=>rand(3, 18),
            'inteligencia'=>rand(3, 18),
            'constituicao'=>rand(3, 18),
            'sabedoria'=>rand(3, 18),
            'carisma'=>rand(3, 18)
        ];
    }
}
