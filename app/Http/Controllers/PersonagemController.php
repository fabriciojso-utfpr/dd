<?php

namespace App\Http\Controllers;

use App\Forms\PersonagemForm;
use App\Personagem;
use Illuminate\Http\Request;
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
        $personagens = Personagem::all();
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
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        Personagem::create($request->all());
        return redirect()->route("personagem.index");
    }


    public function edit(Personagem $personagem)
    {
        $form = $this->form(PersonagemForm::class, [
            'method' => 'PUT',
            'url' => route('personagem.update',['id'=>$personagem->id]),
            'model'=>$personagem
        ]);

        return view("personagem/novo")->with(compact('form'))->with(["titulo"=>"Editar: {$personagem->nome}"]);
    }


    public function update(Request $request, Personagem $personagem)
    {
        $personagem->update($request->all());
        return redirect()->route("personagem.index");
    }


    public function destroy(Personagem $personagem)
    {
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
