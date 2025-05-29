<?php

namespace WebsiteBuilder\Classes\Query;

use PDO;

class Query
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll(string $table)
    {
        if (!$this->isValidTableName($table)) {
            throw new \Exception("Invalid table name: {$table}");
        }

        $statement = $this->db->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function find(string $table, int $id)
    {
        if (!$this->isValidTableName($table)) {
            throw new \Exception("Invalid table name: {$table}");
        }

        $statement = $this->db->prepare("SELECT * FROM {$table} WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_OBJ);
        return $result ? $result : null;
    }

    public function insert(string $table, array $parameters)
    {
        if (!$this->isValidTableName($table)) {
            throw new \Exception("Invalid table name: {$table}");
        }

        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $this->executePreparedSql($sql, $parameters);
    }

    public function update(string $table, int $id, array $parameters)
    {
        if (!$this->isValidTableName($table)) {
            throw new \Exception("Invalid table name: {$table}");
        }

        $columns = [];
        foreach (array_keys($parameters) as $column) {
            $columns[] = "{$column} = :{$column}";
        }

        $sql = sprintf(
            'UPDATE %s SET %s WHERE id = :id',
            $table,
            implode(', ', $columns)
        );

        $parameters['id'] = $id;
        $this->executePreparedSql($sql, $parameters);
    }

    public function delete(string $table, int $id)
    {
        if (!$this->isValidTableName($table)) {
            throw new \Exception("Invalid table name: {$table}");
        }

        $sql = sprintf('DELETE FROM %s WHERE id = :id', $table);

        $this->executePreparedSql($sql, ['id' => $id]);
    }

    protected function executePreparedSql(string $sql, array $parameters)
    {
        try {
            $statement = $this->db->prepare($sql);
            $statement->execute($parameters);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    private function isValidTableName(string $table): bool
    {
        $allowedTables = ['website', 'description', 'contact'];
        return in_array($table, $allowedTables);
    }
}
