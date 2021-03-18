<?php

namespace App;

use Exception;
use PDO;

class QueryBuilder
{
    private $from;
    private $order = [];
    private $limit;
    private $offset;
    private $where;
    private $fields = ["*"];
    private $params = [];
    private $pdo;

    public function __construct(?PDO $pdo = null)
    {
        $this->pdo = $pdo;
    }

    public function from(string $table, string $alias = null): self
    {
        $this->from = $alias === null ? $table : "$table $alias";
        return $this;
    }

    public function orderBy(string $key, string $direction): self
    {
        $direction = strtoupper($direction);
        if (!in_array($direction, ['ASC', 'DESC'])) {
            $this->order[] = $key;
        } else {
            $this->order[] = "$key $direction";
        }
        return $this;
    }


    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset(int $offset): self
    {
        if ($this->limit === null) {
            throw new Exception("Impossible de définir un offset sans définir de limit");
        }
        $this->offset = $offset;
        return $this;
    }

    public function setParam(string $key, $value): self
    {
        $this->params[$key] = $value;
        return $this;
    }

    public function fetch(string $field): ?string
    {
        $query = $this->pdo->prepare($this->toSQL());
        $query->execute($this->params);
        $result = $query->fetch();
        if ($result === false) {
            return null;
        }
        return $result[$field] ?? null;
    }

    public function fetchAll(): array
    {
        try {
            $query = $this->pdo->prepare($this->toSQL());
            $query->execute($this->params);
            return $query->fetchAll();
        } catch (\Exception $e) {
            throw new Exception("Impossible d'effectuer la requte" . $this->toSQL() . " : " . $e->getMessage());
        }
    }



    public function count(): int
    {

        return (int) (clone $this)->select('COUNT(id) count')->fetch('count');
    }
    public function toSQL(): string
    {
        $fields = implode(', ', $this->fields);
        $sql = "SELECT $fields FROM {$this->from}";
        if ($this->where) {
            $sql .= " WHERE " . $this->where;
        }
        if (!empty($this->order)) {
            $sql .= " ORDER BY " . implode(', ', $this->order);
        }
        if ($this->limit > 0) {
            $sql .= " LIMIT " . $this->limit;
        }
        if ($this->offset !== null) {
            $sql .= " OFFSET " . $this->offset;
        }
        return $sql;
    }

    public function page(int $page): self
    {
        $this->offset = ($this->limit * ($page - 1));
        return $this;
    }
    public function where(string $where): self
    {
        $this->where = $where;
        return $this;
    }
    public function select(...$fields): self
    {
        if (is_array($fields[0])) {
            $fields = $fields[0];
        }
        if ($this->fields === ['*']) {
            $this->fields = $fields;
        } else {
            $this->fields = array_merge($this->fields, $fields);
        }

        return $this;
    }
}
