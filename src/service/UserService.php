<?php

namespace App\Src\Service;

use App\Src\Entity\User;
use App\Src\Repository\UserRepository;
use App\Core\Database;

class UserService
{
    private UserRepository $user_repository;

    public function __construct()
    {
        $this->user_repository = new UserRepository;
    }

    public function login($telephone): ?User
    {
        return $this->user_repository->selectByTelephone($telephone);
    }

    /**
     * Retourne la liste des transactions de l'utilisateur
     */
    public function getTransactions(?int $userId = null): array
    {
        if (!$userId) {
            return [];
        }
        
        try {
            $db = Database::getInstance();
            $sql = "SELECT t.*, c.numerocompte 
                FROM transaction t 
                INNER JOIN compte c ON t.idcompte = c.id 
                WHERE c.idutilisateur = :userId 
                ORDER BY t.date DESC 
                LIMIT 20";
            
            $stmt = $db->getPDO()->prepare($sql);
            $stmt->execute(['userId' => $userId]);
            
            $transactions = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $transactions[] = [
                    'id' => $row['id'],
                    'montant' => $row['montant'],
                    'type' => $row['type'],
                    'dateTransaction' => $row['date'],
                    'statut' => 'Terminé',
                    'numeroCompte' => $row['numerocompte']
                ];
            }
            
            return $transactions;
        } catch (\Exception $e) {
            // Si erreur DB, retourner tableau vide
            return [];
        }
    }

    /**
     * Récupère le compte principal de l'utilisateur
     */
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

    /**
     * Récupère tous les comptes de l'utilisateur
     */
    public function getAllComptesByUserId(int $userId): array
    {
        try {
            $db = Database::getInstance();
            $sql = "SELECT * FROM compte WHERE idutilisateur = :userId ORDER BY id ASC";
            
            $stmt = $db->getPDO()->prepare($sql);
            $stmt->execute(['userId' => $userId]);
            
            $comptes = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $comptes[] = [
                    'id' => $row['id'],
                    'solde' => $row['solde'],
                    'numeroCompte' => $row['numerocompte'],
                    'type' => $row['type'],
                    'dateCreation' => $row['date_creation']
                ];
            }
            
            return $comptes;
            
        } catch (\Exception $e) {
            return [];
        }
    }
}
