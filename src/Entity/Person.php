<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
#[ORM\InheritanceType('SINGLE_TABLE')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(['person' => Person::class, 'kid' => Kid::class])]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\ManyToMany(targetEntity: Activity::class, mappedBy: 'people')]
    private Collection $activities;

    #[ORM\ManyToOne(inversedBy: 'people')]
    private ?Menu $menu = null;

    #[ORM\Column]
    private ?bool $comeToTownHall = null;

    #[ORM\Column]
    private ?bool $replied = null;

    #[ORM\Column]
    private ?bool $comeToParty = null;

    #[ORM\Column]
    private ?bool $isAnnouncementSent = null;

    #[ORM\ManyToOne(inversedBy: 'people')]
    private ?TableDinner $tableDinner = null;

    #[ORM\ManyToOne(inversedBy: 'people')]
    private ?Lodging $lodging = null;

    public function __construct()
    {
        $this->activities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activity $activity): static
    {
        if (!$this->activities->contains($activity)) {
            $this->activities->add($activity);
            $activity->addPerson($this);
        }

        return $this;
    }

    public function removeActivity(Activity $activity): static
    {
        if ($this->activities->removeElement($activity)) {
            $activity->removePerson($this);
        }

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): static
    {
        $this->menu = $menu;

        return $this;
    }

    public function __toString(): string
    {
        $str = $this->getFirstname().' '.$this->getLastname();
        if( $this->getTableDinner() !== null ){
            $str .= ' ('.$this->getTableDinner().')';
        }
        return $str;
    }

    public function isComeToTownHall(): ?bool
    {
        return $this->comeToTownHall;
    }

    public function setComeToTownHall(bool $comeToTownHall): static
    {
        $this->comeToTownHall = $comeToTownHall;

        return $this;
    }

    public function hasReplied(): ?bool
    {
        return $this->replied;
    }

    public function setReplied(bool $replied): static
    {
        $this->replied = $replied;

        return $this;
    }

    public function isComeToParty(): ?bool
    {
        return $this->comeToParty;
    }

    public function setComeToParty(bool $comeToParty): static
    {
        $this->comeToParty = $comeToParty;

        return $this;
    }

    public function isIsAnnouncementSent(): ?bool
    {
        return $this->isAnnouncementSent;
    }

    public function setIsAnnouncementSent(bool $isAnnouncementSent): static
    {
        $this->isAnnouncementSent = $isAnnouncementSent;

        return $this;
    }

    public function getTableDinner(): ?TableDinner
    {
        return $this->tableDinner;
    }

    public function setTableDinner(?TableDinner $tableDinner): static
    {
        $this->tableDinner = $tableDinner;

        return $this;
    }

    public function getLodging(): ?Lodging
    {
        return $this->lodging;
    }

    public function setLodging(?Lodging $lodging): static
    {
        $this->lodging = $lodging;

        return $this;
    }
}
