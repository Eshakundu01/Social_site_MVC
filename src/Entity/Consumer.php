<?php

namespace App\Entity;

use App\Repository\ConsumerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsumerRepository::class)]
class Consumer {
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 500)]
  private ?string $fullname = null;

  #[ORM\Column(length: 255)]
  private ?string $email = null;

  #[ORM\Column(length: 20, nullable: true)]
  private ?string $dob = null;

  #[ORM\Column(length: 20, nullable: true)]
  private ?string $gender = null;

  #[ORM\Column(length: 100, nullable: true)]
  private ?string $passcode = null;

  #[ORM\Column(length: 500)]
  private ?string $userpic = null;

  #[ORM\Column(length: 500)]
  private ?string $coverpic = null;

  #[ORM\Column(length: 500, nullable: true)]
  private ?string $place = null;

  #[ORM\Column(length: 500, nullable: true)]
  private ?string $about = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getFullname(): ?string
  {
    return $this->fullname;
  }

  public function setFullname(string $fullname): self
  {
    $this->fullname = $fullname;

    return $this;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(string $email): self
  {
    $this->email = $email;

    return $this;
  }

  public function getDob(): ?string
  {
    return $this->dob;
  }

  public function setDob(?string $dob): self
  {
    $this->dob = $dob;

    return $this;
  }

  public function getGender(): ?string
  {
    return $this->gender;
  }

  public function setGender(?string $gender): self
  {
    $this->gender = $gender;

    return $this;
  }

  public function getPasscode(): ?string
  {
    return $this->passcode;
  }

  public function setPasscode(?string $passcode): self
  {
    $this->passcode = $passcode;

    return $this;
  }

  public function getUserpic(): ?string
  {
    return $this->userpic;
  }

  public function setUserpic(string $userpic): self
  {
    $this->userpic = $userpic;

    return $this;
  }

  public function getCoverpic(): ?string
  {
    return $this->coverpic;
  }

  public function setCoverpic(string $coverpic): self
  {
    $this->coverpic = $coverpic;

    return $this;
  }

  public function getPlace(): ?string
  {
    return $this->place;
  }

  public function setPlace(?string $place): self
  {
    $this->place = $place;

    return $this;
  }

  public function getAbout(): ?string
  {
    return $this->about;
  }

  public function setAbout(?string $about): self
  {
    $this->about = $about;

    return $this;
  }
}
