<?php

namespace App\Forms;

use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\Form;

class PersonagemForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text', [
                'label' => 'Nome do Personagem',
            ])
            ->add('classe', 'text',  [
                'label' => 'Classe do Personagem',
                'rules' => 'required',
                'error_messages' => [
                    'title.required' => 'A classe do personagem é obrigatória!'
                ]
            ])
            ->add('alinhamento_moral', 'text', [
                'label' => 'Alinhamento Moral',
                'rules' => 'required',
                'error_messages' => [
                    'title.required' => 'O Alinhamento Moral é obrigatório!'
                ]
            ])

            ->add('hp', 'number', [
                'label' => 'HP',
                'rules' => 'required',
                'error_messages' => [
                    'title.required' => 'O HP é obrigatório!'
                ]
            ])
            ->add('armor', 'number', [
                'label' => 'Armor',
                'rules' => 'required',
                'error_messages' => [
                    'title.required' => 'O Armor é obrigatório!'
                ]
            ])
            ->add('iniciativa', 'number',  [
                'label' => 'Iniciativa',
                'rules' => 'required',
                'error_messages' => [
                    'title.required' => 'A Iniciativa é obrigatória!'
                ]
            ])
            ->add('raca', 'text', [
                'label' => 'Raça',
                'rules' => 'required',
                'error_messages' => [
                    'title.required' => 'A raça é obrigatória!'
                ]
            ])
            ->add('gerar', 'button', [
                'label' => 'Gerar numeros abaixo',
                'attr'=>[
                    'class'=>'btn btn-success',
                    'style'=>'margin-top:20px; margin-bottom:5px;',
                    'id'=>"gerar"
                ]
            ])

            ->add('forca', 'number', [
                'label' => 'Força',
                'rules' => 'required|numeric|min:3|max:18',
                'error_messages' => [
                    'title.required' => 'A força é obrigatória!'
                ]
            ])
            ->add('destreza', 'number',  [
                'label' => 'Destreza',
                'rules' => 'required|numeric|min:3|max:18',
                'error_messages' => [
                    'title.required' => 'A Destreza do personagem é obrigatória!'
                ]
            ])
            ->add('agilidade', 'number', [
                'label' => 'Agilidade',
                'rules' => 'required|numeric|min:3|max:18',
                'error_messages' => [
                    'title.required' => 'A agilidade é obrigatória!'
                ]
            ])
            ->add('inteligencia', 'number', [
                'label' => 'Inteligência',
                'rules' => 'required|numeric|min:3|max:18',
                'error_messages' => [
                    'title.required' => 'A Inteligência é obrigatória!'
                ]
            ])
            ->add('constituicao', 'number', [
                'label' => 'Constituição',
                'rules' => 'required|numeric|min:3|max:18',
                'error_messages' => [
                    'title.required' => 'A Constituição é obrigatória!'
                ]
            ])
            ->add('sabedoria', 'number', [
                'label' => 'Sabedoria',
                'rules' => 'required|numeric|min:3|max:18',
                'error_messages' => [
                    'title.required' => 'A Sabedoria é obrigatória!'
                ]
            ])
            ->add('carisma', 'number', [
                'label' => 'Carisma',
                'rules' => 'required|numeric|min:3|max:18',
                'error_messages' => [
                    'title.required' => 'O Carisma é obrigatório!'
                ]
            ])
            ->add("user_id", "hidden", [
                'value'=>Auth::id()
            ])
            ->add('enviar', 'submit', [
                'attr'=>[
                    'class'=>'btn btn-primary btn-lg btn-block'
                ],
                'label'=>"Salvar Personagem"
            ]);
    }
}
