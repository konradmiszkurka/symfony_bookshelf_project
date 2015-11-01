<?php

namespace BookshelfProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bookshelf
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BookshelfProjectBundle\Entity\BookshelfRepository")
 */
class Bookshelf
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ManyToMany(targetEntity="Book")
     */
    private $books;

    public function __construct(){
        $this->books = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Bookshelf
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

