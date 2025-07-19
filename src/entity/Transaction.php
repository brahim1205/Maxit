<?php
namespace App\Src\Entity;

class Transaction 
{
    private int $id;
    private string $montant;
    private string $compte;
    private string $typeTransaction;

    public function __construct($id=0,$montant="",$compte="")
    {
        $this->id=$id;
        $this->montant=$montant;
        $this->compte=$compte;        
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
     * Get the value of montant
     */ 
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @return  self
     */ 
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get the value of compte
     */ 
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * Set the value of compte
     *
     * @return  self
     */ 
    public function setCompte($compte)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get the value of typeTransaction
     */ 
    public function getTypeTransaction()
    {
        return $this->typeTransaction;
    }

    /**
     * Set the value of typeTransaction
     *
     * @return  self
     */ 
    public function setTypeTransaction($typeTransaction)
    {
        $this->typeTransaction = $typeTransaction;

        return $this;
    }

    public static function toObject($data):static
    {
        return new static (
            $data['id']??0,
            $data['compte']??"",
            $data['montant']??"",
            $data['typeTransaction ']

        );

    }

    public function toArray():array
    {
        return 
        [
            'id'=>$this ->id,
            'compte'=> $this ->compte,
            'montant'=> $this ->montant,
            'typeTransaction'=> $this ->typeTransaction
        ];

    }
}
