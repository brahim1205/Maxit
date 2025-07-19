<?php
namespace App\Src\Entity;

class TypeUser
{
    private string $nom;
    private int $id;


    public function __construct($nom="",$id=0)
    {
        $this->nom =$nom;
        $this->id =$id;
    }


    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
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

    public static function toObject($data):static
    {
        return new static(
            $data['id']??0,
            $data['nom']??''

        );
    }

    public function toArray():array
    {
        return
        [
            'id'=>$this->id,
            'nom'=>$this->nom
        ];

    }
}
