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
                    'rules' => 'required'
                ])
            ->add('category_id', 'entity', [
                'class' => 'App\Category',
                'property' => 'name',
            ])
            ->add('slug', 'text', [
                  'label' => 'Slug',
                  'rules' => 'required'
            ])
            ->add('tags', 'entity', [
                'class' => 'App\Tag',
                'multiple' => true,
                'property' => 'name',
            ])
            ->add('content', 'textarea', [
                  'label' => 'Contenu',
                  'rules' => 'required|min:10'
            ])
            ->add('online', 'checkbox');
        $this->add('submit', 'submit', ['label' => 'Envoyer']);
    }
}