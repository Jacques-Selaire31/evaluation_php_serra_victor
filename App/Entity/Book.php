<?php

namespace App\Entity;

use App\Entity\Users;
use App\Entity\Category;

class Book{
    private int $id;
    private string $title;
    private string $description;
    private string $date;
    private string $author;
    private Users $user;
    private Category $category;

    

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the value of date
     *
     * @return string
     */
    public function getDate(): string {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @param string $date
     *
     * @return self
     */
    public function setDate(string $date): self {
        $this->date = $date;
        return $this;
    }

    /**
     * Get the value of author
     *
     * @return string
     */
    public function getAuthor(): string {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @param string $author
     *
     * @return self
     */
    public function setAuthor(string $author): self {
        $this->author = $author;
        return $this;
    }

    /**
     * Get the value of user
     *
     * @return Users
     */
    public function getUser(): Users {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @param Users $user
     *
     * @return self
     */
    public function setUser(Users $user): self {
        $this->user = $user;
        return $this;
    }

    /**
     * Get the value of category
     *
     * @return Category
     */
    public function getCategory(): Category {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @param Category $category
     *
     * @return self
     */
    public function setCategory(Category $category): self {
        $this->category = $category;
        return $this;
    }
}