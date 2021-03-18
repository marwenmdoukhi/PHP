<?php

namespace App;

use \PDO;
use \Exception;
use App\Model\Post;

class PaginatedQuery
{
    private $query;
    private $queryCount;
    private $pdo;
    private $perpage;
    private $count;
    private $items;


    public function __construct(
        string $query,
        string $queryCount,
        ?\PDO $pdo = null,
        int $perpage = 12
    ) {
        $this->query = $query;
        $this->queryCount = $queryCount;
        $this->pdo = $pdo ?: Connection::getPDO();
        $this->perpage = $perpage;

    }
    public function getItems(string $classMapping): array
    {
        if($this->items === null){
            $currentPage = $this->getCurrentPage();
            $pages = $this->getPages();
            if ($currentPage > $pages) {
                throw new Exception('Cette page n\'existe pas');
            }
            $offset = $this->perpage * ($currentPage - 1);
            $this->items = $this->pdo->query(
                $this->query .
                    " LIMIT {$this->perpage} OFFSET $offset"
            )
                ->fetchAll(PDO::FETCH_CLASS, $classMapping);
        }
        return $this->items;
    }

    private function getCurrentPage(): int {
        return URL::getPositiveInt('page', 1);
    }

    public function previousLink(string $link): ?string
    {
        $currentPage = $this->getCurrentPage();
        if($currentPage <= 1) return null;
        if($currentPage > 2) $link .= "?page=" . ($currentPage - 1);
        return <<<HTML
        <a href="{$link}" class="btn btn-primary">&laquo; Page précédente</a>

HTML;

    }

    public function nextLink(string $link): ?string
    {
        $currentPage = $this->getCurrentPage();
        $pages = $this->getpages();
        if ($currentPage >= $pages) return null;
       $link .= "?page=" . ($currentPage + 1);

        return <<<HTML
        <a href="{$link}" class="btn btn-primary">Page suivante &raquo;</a>

HTML;
    }

    public function getpages(): int
    {
        if($this->count === null) {
            $this->count = (int) $this->pdo
                ->query($this->queryCount)
                ->fetch(PDO::FETCH_NUM)[0];
        }
        
        return ceil($this->count / $this->perpage);
    }
}
