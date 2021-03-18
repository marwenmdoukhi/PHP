<?php
namespace  app\Table;


class Article extends Table
{
    protected static $table = 'articles';

    public static function find($id)
    {
        return self::query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie
			FROM articles
			LEFT JOIN categories
			ON category_id = categories.id
			WHERE articles.id = ?
			", [$id], true);
    }


    public static function getLast()
    {
        return self::query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie
			FROM articles
			LEFT JOIN categories
			ON category_id = categories.id
			");
    }

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getUrl()
    {
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0, 100) . ' ...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>'; // ".= veut dire je rajoute cette chaine de caractère, à la précédente"
        return $html;
    }

    public static function lastByCategory($category_id)
    {
        return self::query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre AS categorie
			FROM articles
			LEFT JOIN categories
			ON category_id = categories.id
			WHERE category_id = ?
			ORDER BY articles.date DESC
			", [$category_id]);
    }
}