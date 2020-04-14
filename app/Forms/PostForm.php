<?php

namespace App\Forms;

use App\Category;
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
            ->add('category_id', 'entity', [
                'class' => 'App\Category',
                'property' => 'name',
            ])
            ->add('content', 'textarea', [
                  'label' => 'Contenu',
                  'rules' => 'required|min:5'
            ])
            ->add('online', 'checkbox');
        $this->add('submit', 'submit', ['label' => 'Envoyer']);
    }
}