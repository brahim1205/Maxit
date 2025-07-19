<?php

namespace App\Src\Entity;

use App\Core\abstract\AbstractEntity;

class User extends AbstractEntity
{ 
    private string $nom;
    private string $prenom;
    private int $id;
    private string $tel;
    private string $photo_recto;
    private string $photo_verso;
    private string $adresse;
    private string $numero_cni;
    private string $login;
    private string $password;


    public function __construct($id=0, $nom="",$prenom="",$tel="", $login="",$password="", $photo_recto="",$photo_verso="",$numero_cni='',)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->id=$id;
        $this->tel=$tel;
        $this->photo_recto=$photo_recto;
        $this->photo_verso=$photo_verso;
        $this->numero_cni=$numero_cni;  
        $this->login=$login;
        $this->password=$password;
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
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

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

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of photo_recto
     */ 
    public function getPhoto_recto()
    {
        return $this->photo_recto;
    }

    /**
     * Set the value of photo_recto
     *
     * @return  self
     */ 
    public function setPhoto_recto($photo_recto)
    {
        $this->photo_recto = $photo_recto;

        return $this;
    }

    /**
     * Get the value of photo_verso
     */ 
    public function getPhoto_verso()
    {
        return $this->photo_verso;
    }

    /**
     * Set the value of photo_verso
     *
     * @return  self
     */ 
    public function setPhoto_verso($photo_verso)
    {
        $this->photo_verso = $photo_verso;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of numero_cni
     */ 
    public function getNumero_cni()
    {
        return $this->numero_cni;
    }

    /**
     * Set the value of numero_cni
     *
     * @return  self
     */ 
    public function setNumero_cni($numero_cni)
    {
        $this->numero_cni = $numero_cni;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public static function toObject($data):static
    {
         return new static (
            $data['id']??0,
            $data['nom']??"",
            $data['prenom']??"",
            $data['numerotelephone']??"",
            $data['login ']??"",
            $data['password ']??"",
            $data['photorecto']??"",
            $data['photoverso']??"",
            $data['adresse']??"",
            $data['numeroidentite']??"",
        );
    }

    public function toArray(): array
    {
        return
        [
            'id'=>$this ->id,
            'nom'=> $this ->nom,
            'tel'=> $this ->tel,
            'login'=> $this ->login,
            'photo_recto'=>$this ->photo_recto,
            'photo_verso'=> $this ->photo_verso,
            'adresse'=> $this ->adresse,
            'login'=> $this ->login,
            'password'=> $this ->password,
            'numero_cni'=> $this ->numero_cni
            
        ];
    }
}
