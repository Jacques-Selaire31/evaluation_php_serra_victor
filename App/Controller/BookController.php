<?php

namespace App\Controller;
use App\Service\CategoryService;

class BookController extends AbstractController{
        private readonly CategoryService $categoryService;
        public function __construct()
        {
            $this->categoryService= new CategoryService;
        }


        public function addBookToUser(){

            $data=$this->categoryService->getAllCategory();
            $this->render('add_book', 'ajouter un book', $data ?? []);
            dd($data[0][0]->name);
        }
}