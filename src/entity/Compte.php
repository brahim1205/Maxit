<?php
namespace App\Src\Entity;

use App\Core\abstract\AbstractEntity;

class Compte extends AbstractEntity
{
    private int $id;
    private float $solde;
    private string $numero_compte;
    private string $statut_compte;
    private string $typecompte;
    private string $dateCreation;
    private array $transaction;
    


    public function __construct($id=0,$solde="",$numero_compte="",$statut_compte="")
    {
        $this->id=$id;
        $this->solde=$solde;
        $this->numero_compte=$numero_compte;
        $this->statut_compte=$statut_compte;
        $this->transaction=[];
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of solde
     */ 
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     *
     * @return  self
     */ 
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * Get the value of numero_compte
     */ 
    public function getNumero_compte()
    {
        return $this->numero_compte;
    }

    /**
     * Set the value of numero_compte
     *
     * @return  self
     */ 
    public function setNumero_compte($numero_compte)
    {
        $this->numero_compte = $numero_compte;

        return $this;
    }

    /**
     * Get the value of statut_compte
     */ 
    public function getStatut_compte()
    {
        return $this->statut_compte;
    }

    /**
     * Set the value of statut_compte
     *
     * @return  self
     */ 
    public function setStatut_compte($statut_compte)
    {
        $this->statut_compte = $statut_compte;

        return $this;
    }

    /**
     * Get the value of typecompte
     */ 
    public function getTypecompte()
    {
        return $this->typecompte;
    }

    /**
     * Set the value of typecompte
     *
     * @return  self
     */ 
    public function setTypecompte($typecompte)
    {
        $this->typecompte = $typecompte;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */ 
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */ 
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }


    /**
     * Get the value of transaction
     */ 
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Set the value of transaction
     *
     * @return  self
     */ 
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;

        return $this;
    }



     public static function toObject($data):static
     {
        return new static(
            $data['id']??0,
            $data['solde']??0.0,
            $data['dateCreation']??"",
            $data['numero_compte']??"",
            $data['statut_compte']?? TypeCompteEnum::PRINCIPALE
        );
     }


    public function toArray():array
    {
        return
        [
            "id"=>$this->id,
            "solde"=>$this->solde,
            "numero_compte"=>$this->numero_compte,
            "statut_compte"=>$this->statut_compte,
            "transaction"=>array_map(fn($t) =>method_exists($t,'toArray') ? $t->toArray() : $t, $this->transaction),

        ];
    }

}
