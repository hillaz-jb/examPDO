<?php

class EcAbstractConnectToDb
{
    private PDO $pdo;

    public function connection(string $dbName = 'exam_pdo'): void
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=$dbName", 'root', '');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}