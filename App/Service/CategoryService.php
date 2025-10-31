<?php

namespace App\Service;

use App\Repository\CategoryRepository;

use App\Utils\Tools;

class CategoryService{
    private readonly CategoryRepository $categoryRepository;
    public function __construct(){
        $this->categoryRepository= new CategoryRepository;
    }
    public function getAllCategory(){
       return $this->categoryRepository->findAll();
    }
}