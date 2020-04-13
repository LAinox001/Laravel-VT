<?php

namespace App\Forms;

use App\Forms\Form;
use phpDocumentor\Reflection\DocBlock\Tag;

class PostForm extends Form
{
    protected $resource = 'posts';

    public function buildForm()
    {
        parent::buildForm();
        $this->add('title', 'text', [
                    'label' => 'Titre',
                    'rules' => 'required|min:5'
                ])
            ->add('slug', 'text', [
                  'label' => 'Slug',
            ])
            ->add('content', 'textarea', [
                  'label' => 'Contenu',
                  'rules' => 'required|min:5'
            ])
            ->add('tags', 'entity', [
                'class' => Tag::class,
                'multiple' => true,
                'property' => 'name'
            ]);
        $this->add('submit', 'submit', ['label' => 'Envoyer']);
    }
}