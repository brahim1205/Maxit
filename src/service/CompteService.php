<?php

namespace App\Src\Service;

use App\Src\Repository\CompteRepository;
use App\Core\Database;

class CompteService
{
    private CompteRepository $compteRepository;

    public function __construct()
    {
        $this->compteRepository = new CompteRepository();
    }

    public function getsolde($idutilisateur): mixed
    {
        return $this->compteRepository->getsoldebyUserId($idutilisateur);
    }

    public function getCompteByUserId(int $userId): ?array
    {
        try {
            $db = Database::getInstance();
            $sql = "SELECT * FROM compte WHERE idutilisateur = :userId ORDER BY id ASC LIMIT 1";
            
            $stmt = $db->getPDO()->prepare($sql);
            $stmt->execute(['userId' => $userId]);
            
            $compte = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            if ($compte) {
                return [
                    'id' => $compte['id'],
                    'solde' => $compte['solde'],
                    'numeroCompte' => $compte['numerocompte'],
                    'type' => $compte['type'],
                    'dateCreation' => $compte['date_creation']
                ];
            }
            
            return null;
            
        } catch (\Exception $e) {
            return null;
        }
    }

    public function createSecondaryAccount(int $userId, string $numeroCompte, float $solde): bool
    {
        try {
            $db = Database::getInstance();
            $sql = "INSERT INTO compte (idutilisateur, numerocompte, solde, type, date_creation) 
                    VALUES (:userId, :numeroCompte, :solde, 'SECONDAIRE', NOW())";
            
            $stmt = $db->getPDO()->prepare($sql);
            return $stmt->execute([
                'userId' => $userId,
                'numeroCompte' => $numeroCompte,
                'solde' => $solde
            ]);
            
        } catch (\Exception $e) {
            return false;
        }
    }
}
