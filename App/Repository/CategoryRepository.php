<?php

namespace App\Repository;

use App\Database\MySQL;
use App\Entity\Category;

class CategoryRepository
{
    private \PDO $connexion;
    public function __construct()
    {
        $this->connexion = (new MySQL())->connectBDD();
    }
    public function findAll(): array
    {
        $request = "SELECT id_category, name FROM category";
        $req = $this->connexion->prepare($request);
        $req->execute();
        $categoryData[] = $req->fetchAll(\PDO::FETCH_CLASS);
        return $categoryData;
    }
}
