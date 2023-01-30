<?php

class Club
{

    ///attribut
private $id;
private $nom;
private $description;

private $adresse;

private $domaine;



///////constructeur
public function __construct(int $id, string $nom, string $description, string $adresse, string $domaine)
{
    $this->id = $id;
    $this->nom = $nom;
    $this->description = $description;
    $this->adresse = $adresse;
    $this->domaine = $domaine;
}
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getDomaine(): string
    {
        return $this->domaine;
    }

    /**
     * @param string $domaine
     */
    public function setDomaine(string $domaine): void
    {
        $this->domaine = $domaine;
    }

    public function setId($id)
    {$this->id=$id;}
    
    
//////méthodes

function afficherClub (){
        echo "<b>id : </b> ".$this->id."<br>";
        echo "<b>Nom:</b> ".$this->nom."<br>";
        echo "<b>Description:</b> ".$this->description."<br>";
        echo "<b>Adresse:</b> ".$this->adresse."<br>";
        echo "<b>Domaine:</b> ".$this->domaine."<br>";
    }


}