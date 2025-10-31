<?php

namespace App\Controller;
use App\Service\CategoryService;

class CategoryController extends AbstractController{
        private readonly CategoryService $category_service;
        public function __construct()
        {
            $this->category_service= new CategoryService;
        }
        public function showAllCategory(){

            $data=$this->category_service->getAllCategory();
        }
}