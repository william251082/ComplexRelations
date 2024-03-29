<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 12/2/18
 * Time: 1:34 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="genus_scientist")
 * @UniqueEntity(
 *     fields={"genus", "user"},
 *     message="This user is already studying this genus.",
 *     errorPath="user"
 * )
 */
class GenusScientist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Genus",
     *                inversedBy="genusScientists"
     *              )
     * @ORM\JoinColumn(nullable=false)
     */
    private $genus;

    /**
     * @ORM\ManyToOne(targetEntity="User",
     *                inversedBy="studiedGenuses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $yearsStudied;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getGenus()
    {
        return $this->genus;
    }

    /**
     * @param mixed $genus
     */
    public function setGenus($genus): void
    {
        $this->genus = $genus;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getYearsStudied()
    {
        return $this->yearsStudied;
    }

    /**
     * @param mixed $yearsStudied
     */
    public function setYearsStudied($yearsStudied): void
    {
        $this->yearsStudied = $yearsStudied;
    }

}
