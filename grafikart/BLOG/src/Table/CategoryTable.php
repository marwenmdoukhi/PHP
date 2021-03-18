<?php

namespace App\Table;

use \PDO;
use App\Model\Category;
use App\Table\Exception\NotFoundException;

final class CategoryTable extends Table
{
    protected $table = 'category';
    protected $class = Category::class;

/**
 * @param App\Model\Post[] $posts
 */
    public function hydratePosts(array $posts): void
    {
        $postByID = [];
        foreach ($posts as $post) {
            $post->setCategories([]);
            $postByID[$post->getID()] = $post;
        }
        $categories =
            $this->pdo->query(
                'SELECT c.*, pc.post_id
                FROM post_category pc
                JOIN category c ON c.id = pc.category_id
                WHERE pc.post_id IN (' . implode(',', array_keys($postByID)) . ')'
            )->fetchAll(PDO::FETCH_CLASS, $this->class);
        foreach ($categories as $category) {
            $postByID[$category->getPostID()]->addCategory($category);
        }
    }



    public function all(): array
    {
       return $this->queryAndFetchAll("SELECT * FROM {$this->table} ORDER BY id ASC");
      
    }

    public function list(): array
    {
       $categories = $this->queryAndFetchAll("SELECT * FROM {$this->table} ORDER BY name ASC");
       $results = [];
       foreach ($categories as $category) {
           $results[$category->getID()] = $category->getName();
       }
       return $results;
    }


    

    
}
