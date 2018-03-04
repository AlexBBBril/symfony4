<?php
//
//namespace App\Entity;
//
//
//use App\Exception\DinoAreRunningRampantException;
//use App\Exception\NotABuffetException;
//use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\Common\Collections\Collection;
//use Doctrine\ORM\Mapping as ORM;
//
///**
// * @ORM\Entity
// * @ORM\Table(name="enclosure")
// */
//class Enclosure
//{
//    /**
//     * @ORM\Id
//     * @ORM\GeneratedValue(strategy="AUTO")
//     * @ORM\Column(type="integer")
//     */
//    private $id;
//
//    /** @var Collection
//     * @ORM\OneToMany(targetEntity="App\Entity\Dino", mappedBy="enclosure", cascade={"persist"})
//     */
//    private $dinos;
//
//    /**
//     * @var Collection|Security[]
//     * @ORM\OneToMany(targetEntity="App\Entity\Security", mappedBy="enclosure", cascade={"persist"})
//     */
//    private $securities;
//
//    /**
//     * Enclosure constructor.
//     *
//     * @param bool $withBasicSecurity
//     */
//    public function __construct(bool $withBasicSecurity = false)
//    {
//        $this->securities = new ArrayCollection();
//        $this->dinos = new ArrayCollection();
//
//        if ($withBasicSecurity) {
//            $this->addSecurity(new Security('Fence', true, $this));
//        }
//    }
//
//    /**
//     * @return Collection
//     */
//    public function getDinos(): Collection
//    {
//        return $this->dinos;
//    }
//
//    /**
//     * @param Dino $dino
//     *
//     * @throws DinoAreRunningRampantException
//     * @throws NotABuffetException
//     */
//    public function addDino(Dino $dino)
//    {
//        if (!$this->canAddDino($dino)) {
//            throw new NotABuffetException();
//        }
//
//        if (!$this->isSecurityActive()) {
//            throw new DinoAreRunningRampantException('Are you craaazy???!!!');
//        }
//
//        $this->dinos->add($dino);
//    }
//
//    /**
//     * @return bool
//     */
//    public function isSecurityActive(): bool
//    {
//        foreach ($this->securities as $security) {
//            if ($security->getIsActive()) {
//                return true;
//            }
//        }
//
//        return false;
//    }
//
//    /**
//     * @param Dino $dino
//     *
//     * @return bool
//     */
//    public function canAddDino(Dino $dino)
//    {
//        return count($this->dinos) === 0
//            || $this->dinos->first()->isCarnivorous() === $dino->isCarnivorous();
//    }
//
//    public function addSecurity(Security $security)
//    {
//        $this->securities[] = $security;
//    }
//}