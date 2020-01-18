<?php
/**
 * Created by PhpStorm.
 * User: timotheecorrado
 * Date: 15/12/2017
 * Time: 17:23
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Cours_categorieRepo")
 * @ORM\Table(name="Cours_categorie")
 */
class Cours_categorie
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $axe;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $annee;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Cours_categorie
     *
     * @param int $id
     */
    public function setId($id): Cours_categorie
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return Cours_categorie
     * @param string $name
     */
    public function setName($name): Cours_categorie
    {
        $this->name = $name;
        /* START Slug */
        $this->setSlug($name);

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): ?string
    {

        return $this->slug;
    }

    /**
     * @return Cours_categorie
     * @param string $slug
     */
    public function setSlug($slug): Cours_categorie
    {
        $slugify = new Slugify();
        $this->slug = $slugify->slugify($slug);

        return $this;
    }

    /**
     * @return string
     */
    public function getAxe(): ?string
    {
        return $this->axe;
    }

    /**
     * @return Cours_categorie
     * @param string $axe
     */
    public function setAxe($axe): Cours_categorie
    {
        $this->axe = $axe;

        return $this;
    }

    /**
     * @return string
     */
    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    /**
     * @return Cours_categorie
     * @param string $annee
     */
    public function setAnnee($annee): Cours_categorie
    {
        $this->annee = $annee;

        return $this;
    }

}