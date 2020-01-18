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
 * @ORM\Entity(repositoryClass="App\Repository\Forum_categorieRepository")
 * @ORM\Table(name="Forum_categorie")
 */
class Forum_categorie
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
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Forum_categorie
     *
     * @param int $id
     */
    public function setId($id): Forum_categorie
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
     * @return Forum_categorie
     * @param string $name
     */
    public function setName($name): Forum_categorie
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
     * @return Forum_categorie
     * @param string $slug
     */
    public function setSlug($slug): Forum_categorie
    {
        $slugify = new Slugify();
        $this->slug = $slugify->slugify($slug);

        return $this;
    }

}