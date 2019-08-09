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
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User
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
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $num;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $password;

    const MAX_PER_PAGE       = 10;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return User
     *
     * @param int $id
     */
    public function setId($id): User
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
     * @return User
     * @param string $name
     */
    public function setName($name): User
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @return User
     * @param string $firstname
     */
    public function setFirstname($firstname): User
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getNum(): ?string
    {
        return $this->num;
    }

    /**
     * @return User
     * @param string $num
     */
    public function setNum($num): User
    {
        $this->num = $num;

        return $this;
    }

    /**
     * @return string
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @return User
     * @param string $mail
     */
    public function setMail($mail): User
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return User
     *
     * @param string $password
     */
    public function setPassword($password): User
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }
}