<?php

namespace App\Entity;

use App\Repository\TimelineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimelineRepository::class)]
class Timeline
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'timeline', targetEntity: TimelineEvent::class, orphanRemoval: true)]
    private Collection $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, TimelineEvent>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(TimelineEvent $event): static
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setTimeline($this);
        }

        return $this;
    }

    public function removeEvent(TimelineEvent $event): static
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getTimeline() === $this) {
                $event->setTimeline(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
