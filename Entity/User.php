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
 * @ORM\Entity(repositoryClass="App\Repository\UserRepo")
 * @ORM\Table(name="User")
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
    private $cursus;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $admin_level;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
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

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $linkedin;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $allowed;

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
    public function getCursus(): ?string
    {
        return $this->cursus;
    }

    /**
     * @return User
     * @param string $cursus
     */
    public function setCursus($cursus): User
    {
        $this->cursus = $cursus;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdmin_level(): ?string
    {
        return $this->admin_level;
    }

    /**
     * @return User
     * @param string $admin_level
     */
    public function setAdmin_level($admin_level): User
    {
        $this->admin_level = $admin_level;

        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @return User
     * @param string $avatar
     */
    public function setAvatar($avatar): User
    {
        $this->avatar = $avatar;

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

    /**
     * @return string
     */
    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    /**
     * @return User
     * @param string $linkedin
     */
    public function setLinkedin($linkedin): User
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllowed(): ?string
    {
        return $this->allowed;
    }

    /**
     * @return User
     * @param string $allowed
     */
    public function setAllowed($allowed): User
    {
        $this->allowed = $allowed;

        return $this;
    }
}