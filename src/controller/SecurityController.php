<?php

namespace App\Src\Controller;

use App\Core\Abstract\AbstractController;
use App\Src\Service\UserService;

class SecurityController extends AbstractController
{
   private UserService $user_service;

   public function __construct()
   {
      $this->user_service = new UserService;
   }

   public function index() {}
   public function edit() {}
   public function destroy() {}
   public function store() {}
   public function show() {}
   public function create() {}
   public function delete() {}

   public function login()
   {
      require_once '../template/security/login.html.php';
   }

   public function register()
   {
      require_once '../template/security/inscription.html.php';
   }

   public function handleInscription()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         // Traitement de l'inscription
         $errors = [];
         
         // Validation basique (optionnelle maintenant)
         $nom = $_POST['nom'] ?? '';
         $prenom = $_POST['prenom'] ?? '';
         $telephone = $_POST['telephone'] ?? '';
         $password = $_POST['password'] ?? '';
         
         if (empty($errors)) {
            // Créer l'utilisateur (simulation)
            echo "<script>alert('Inscription réussie !'); window.location.href='/';</script>";
            return;
         }
         
         // Si erreurs, réafficher le formulaire
         require_once '../template/security/inscription.html.php';
      } else {
         require_once '../template/security/inscription.html.php';
      }
   }

   public function acceuil()
   {
      session_start();

      $tel = $_POST['telephone'];
      $user = $this->user_service->login($tel);
      $_SESSION["user"] = $user;

      if ($user) {
         // Récupérer les vraies données depuis la base
         $transactions = $this->user_service->getTransactions($user->getId());
         $compte = $this->user_service->getCompteByUserId($user->getId());
         $comptes = $this->user_service->getAllComptesByUserId($user->getId());
         
         // Stocker l'état d'affichage du solde en session
         if (!isset($_SESSION['showSolde'])) {
            $_SESSION['showSolde'] = true;
         }
         
         $this->renderHtml('dashboard/ClientDashboard.html.php', [
            'user' => $user,
            'transactions' => $transactions,
            'compte' => $compte,
            'compteActuel' => $compte,
            'comptes' => $comptes,
            'showSolde' => $_SESSION['showSolde']
         ]);
      } else {
         require_once '../template/security/login.html.php';
      }
   }
}
