<?php

class EcSong extends EcAbstractConnectToDb
{
    public function selectAllSortByName(): array{
        $query = 'SELECT * FROM song ORDER BY `name` DESC ';
        $resultats = $this->getPdo()->query($query);
        return $resultats->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectArtistSongs(string $idArtist): array{
        $query = "SELECT `song`.`id`, `title`, `time`, `published_at` FROM song JOIN `artist` ON `artist`.`id`=`artist_id` WHERE `artist`.`id`= :idArtist";
        $resultats = $this->getPdo()->prepare($query);
        $resultats->execute([
            ':idArtist' => $idArtist,
        ]);
        return $resultats->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(string $idSong)
    {
        $pdo = $this->getPdo();
        $query = "DELETE FROM `song` WHERE id = :idSong";
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':idSong' => $idSong,
        ]);
    }

    public function dateFormat(string|null $date = ''): string|null
    {
        if ($date === null) {
            return null;
        }
        return (new DateTime($date))->format('Y-m-d');
    }

}