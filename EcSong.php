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

}