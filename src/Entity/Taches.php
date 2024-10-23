<?php

namespace App\Entity;

use App\Repository\TachesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TachesRepository::class)]

class Taches
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  
  private ?int $id = null;
  
  #[ORM\Column(length: 255)]
  private ?string $nom = null;

  #[ORM\Column(length: 255)]
  private ?bool $isFinished = null;

  #[ORM\ManyToOne (
    targetEntity: Todos::class, inversedBy: "taches")]
    private $todos;  

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
   * Get the value of isFinished
   */ 
  public function getIsFinished()
  {
    return $this->isFinished;
  }

  /**
   * Set the value of isFinished
   *
   * @return  self
   */ 
  public function setIsFinished($isFinished)
  {
    $this->isFinished = $isFinished;

    return $this;
  }
  }