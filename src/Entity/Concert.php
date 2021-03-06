<?php

namespace App\Entity;

use App\Repository\ConcertRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertRepository::class)
 */
class Concert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private string $name;


    /**
     * @ORM\Column(type="boolean")
     */
    private bool $full;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Band", inversedBy="concerts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $bands;

    /**
     * @ORM\ManyToOne (targetEntity=Room::class, inversedBy="concerts")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Room $room;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private string $startTime;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private string $endTime;

    /**
     * @ORM\OneToOne(targetEntity=Picture::class, inversedBy="concerts")
     */
    private ?Picture $picture;

    /**
     * @ORM\Column(type="date")
     */
    private ?DateTimeInterface $day;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlName;


    /**
     *
     */
    public function __construct()
    {
        $this->bands = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return bool|null
     */
    public function getFull(): ?bool
    {
        return $this->full;
    }

    /**
     * @param bool $full
     * @return $this
     */
    public function setFull(bool $full): self
    {
        $this->full = $full;

        return $this;
    }

    /**
     * @return Collection|Band[]
     */
    public function getBands(): Collection
    {
        return $this->bands;
    }

    /**
     * @param Band|null $band
     * @return $this
     */
    public function addBand(?Band $band): self
    {
        if (!$this->bands->contains($band)) {
            $this->bands[] = $band;
        }

        return $this;
    }

    /**
     * @param Band|null $band
     * @return $this
     */
    public function removeBand(?Band $band): self
    {
        $this->bands->removeElement($band);

        return $this;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Concert
     */
    public function setName(string $name): Concert
    {
        $this->name = $name;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

        return $this;
    }

    public function getStartTime(): ?string
    {
        return $this->startTime;
    }

    public function setStartTime(string $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    public function setEndTime(string $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getPicture(): ?Picture
    {
        return $this->picture;
    }

    public function setPicture(?Picture $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDay(): ?DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(DateTimeInterface $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getUrlName(): ?string
    {
        return $this->urlName;
    }

    public function setUrlName(string $urlName): self
    {
        $this->urlName = $urlName;

        return $this;
    }


}
