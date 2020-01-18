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
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\CoursRepo")
 * @ORM\Table(name="Cours")
 */
class Cours
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
     * @ORM\Column(type="text")
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @var User
     *
     * @ManyToOne(targetEntity="User")
     */
    private $uploader;

    /**
     * @var Cours_categorie
     *
     * @ManyToOne(targetEntity="Cours_categorie")
     */
    private $cours_categorie;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $axe;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $validate;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Cours
     *
     * @param int $id
     */
    public function setId($id): Cours
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
     * @return Cours
     * @param string $name
     */
    public function setName($name): Cours
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
     * @return Cours
     * @param string $slug
     */
    public function setSlug($slug): Cours
    {
        $slugify = new Slugify();
        $this->slug = $slugify->slugify($slug);

        return $this;
    }

    /**
     * @return string
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @return Cours
     * @param string $file
     */
    public function setFile($file): Cours
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return Cours
     * @param string $type
     */
    public function setType($type): Cours
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return User
     */
    public function getUploader(): ?User
    {
        return $this->uploader;
    }

    /**
     * @return User
     * @param User $mail
     */
    public function setUploader($mail): Cours
    {
        $this->uploader = $mail;

        return $this;
    }

    /**
     * @return Cours_categorie
     */
    public function getCours_categorie(): ?Cours_categorie
    {
        return $this->cours_categorie;
    }

    /**
     * @return Cours_categorie
     * @param Cours_categorie $name
     */
    public function setCours_categorie($name): Cours
    {
        $this->cours_categorie = $name;

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
     * @return Cours
     * @param string $axe
     */
    public function setAxe($axe): Cours
    {
        $this->axe = $axe;

        return $this;
    }

    /**
     * @return string
     */
    public function getValidate(): ?string
    {
        return $this->validate;
    }

    /**
     * @return Cours
     * @param string $validate
     */
    public function setValidate($validate): Cours
    {
        $this->validate = $validate;

        return $this;
    }

}