<?php

namespace App\Src\Controller;

use App\Src\Service\CompteService;
use App\Core\Abstract\AbstractController;

class CompteController extends AbstractController
{
    private CompteService $compteservice;
    
    public function __construct()
    {
        $this->compteservice = new CompteService();
    }

    public function index(){}
    public function edit(){}
    public function destroy(){}
    public function store(){}
    public function show()
    {
        $this->renderHtml('dashboard/compte.html.php');
    }
    public function create(){}
    public function delete(){}
    public function login(){}
    public function register(){}

    public function createSecondaryAccount()
    {
        session_start();
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numeroCompte = $_POST['numeroCompte'] ?? '';
            $solde = $_POST['solde'] ?? 0;
            $userId = $_SESSION['user']->getId() ?? null;
            
            if ($userId && $numeroCompte) {
                // Créer le compte en base (simulation)
                $success = $this->compteservice->createSecondaryAccount($userId, $numeroCompte, $solde);
                
                if ($success) {
                    echo json_encode(['success' => true, 'message' => 'Compte créé avec succès']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Erreur lors de la création']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Données manquantes']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
        }
    }

    public function switchAccount()
    {
        session_start();
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            $compteId = $input['compteId'] ?? null;
            
            if ($compteId) {
                // Changer le compte actuel en session
                $_SESSION['compteActuel'] = $compteId;
                echo json_encode(['success' => true, 'message' => 'Compte changé avec succès']);
            } else {
                echo json_encode(['success' => false, 'message' => 'ID de compte manquant']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
        }
    }

    public function toggleSolde()
    {
        session_start();
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Basculer l'état d'affichage du solde
            $_SESSION['showSolde'] = !($_SESSION['showSolde'] ?? true);
            
            // Récupérer le solde actuel si nécessaire
            $userId = $_SESSION['user']->getId() ?? null;
            $solde = 0;
            
            if ($userId) {
                $compteService = new CompteService();
                $compte = $compteService->getCompteByUserId($userId);
                $solde = $compte['solde'] ?? 0;
            }
            
            echo json_encode([
                'success' => true,
                'showSolde' => $_SESSION['showSolde'],
                'solde' => $solde
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
        }
    }
}
