<?php


namespace App\Src\Repository;

use App\Core\abstract\AbstractRepository;
use PDO;
use PDOException;

use App\Core\Database;

class CompteRepository extends AbstractRepository
{
    private Database $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function getsoldebyUserId(int $idutilisateur): array
    {
        $sql = "SELECT * FROM compte WHERE idutilisateur =:idutilisateur AND typecompte ='principal' ";
        $stmt = $this->database->getPDO()->prepare($sql);
        $stmt->execute(['idutilisateur' => $idutilisateur]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


     public function selectAll(){}
     public function insert(){}
     public function update(){}
     public function delete(){}
     public function selectById(){}
     public function selectBy(array $filter){}
}
