<?php

class EcArtist extends EcAbstractConnectToDb
{
    public function selectAllSortByName(): array
    {
        $query = 'SELECT * FROM artist ORDER BY `name` ASC ';
        $resultats = $this->getPdo()->query($query);
        return $resultats->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOneArtist(int $id): array
    {
        $query = 'SELECT * FROM artist WHERE id= :idArtist';
        $resultats = $this->getPdo()->prepare($query);
        $resultats->execute([
            ':idArtist' => $id,
        ]);

        return $resultats->fetch(PDO::FETCH_ASSOC);
    }

    public function insertArtist(string $name, int $age)
    {
        $pdo = $this->getPdo();
        $query = 'INSERT INTO artist(name, age) VALUES (:name, :age)';
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':name' => $name,
            ':age' => $age,
        ]);
    }

    public function updateArtist(string $idArtist, string $name, int $age)
    {
        $pdo = $this->getPdo();
        $query = "UPDATE artist SET name = :name, age = :age WHERE id= :idArtist";
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':idArtist' => $idArtist,
            ':name' => $name,
            ':age' => $age,
        ]);
    }

    public function delete(string $idArtist)
    {
        $pdo = $this->getPdo();
        $query = "DELETE FROM `artist` WHERE id = :idArtist";
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':idArtist' => $idArtist,
        ]);
    }


}