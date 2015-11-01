<?php

namespace BookshelfProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BookshelfProjectBundle\Entity\BookRepository")
 */
class Book
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
     * @ManyToOne(targetEntity="Author", inversedBy="books")
     */
    private $author;

    /**
     * @OneToMany(targetEntity="Review", mappedBy="book")
     */
    private $reviews;

    public function __construct(){
        $this->reviews = new ArrayCollection();
    }


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="raiting", type="decimal")
     */
    private $raiting;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * @return Book
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

    /**
     * Set raiting
     *
     * @param string $raiting
     *
     * @return Book
     */
    public function setRaiting($raiting)
    {
        $this->raiting = $raiting;

        return $this;
    }

    /**
     * Get raiting
     *
     * @return string
     */
    public function getRaiting()
    {
        return $this->raiting;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Book
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

