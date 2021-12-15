<?php

class EcAbstractConnectToDb
{
    private PDO $pdo;


    public function connection(string $dbName): void
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=' . $dbName, 'root', '');
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

    /**
     * @param PDO $pdo
     */
    public function setPdo(PDO $pdo): void
    {
        $this->pdo = $pdo;
    }

    public function dateFormat(string|null $date = ''): string|null
    {
        if ($date === null) {
            return null;
        }
        return (new DateTime($date))->format('Y-m-d');
    }

}