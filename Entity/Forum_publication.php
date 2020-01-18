<?php
/**
 * Created by PhpStorm.
 * User: timotheecorrado
 * Date: 15/12/2017
 * Time: 17:23
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="App\Repository\Forum_publicationRepository")
 * @ORM\Table(name="Forum_publication")
 */
class Forum_publication
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
    private $author;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Forum_publication
     *
     * @param int $id
     */
    public function setId($id): Forum_publication
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @return Forum_publication
     * @param string $author
     */
    public function setAuthor($author): Forum_publication
    {
        $this->author = $author;

        return $this;
    }

}