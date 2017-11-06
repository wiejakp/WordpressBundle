<?php

namespace Ekino\WordpressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Ekino\WordpressBundle\Model\WordpressEntityInterface;

/**
 * Terms
 *
 * @ORM\Table(name="terms", indexes={@ORM\Index(name="slug", columns={"slug"}), @ORM\Index(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Terms implements WordpressEntityInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="term_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $termId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=200, nullable=false)
     */
    private $slug = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="term_group", type="bigint", nullable=false)
     */
    private $termGroup = '0';

    /**
     * @return int
     */
    public function getTermId()
    {
        return $this->termId;
    }

    /**
     * @param int $termId
     */
    public function setTermId($termId)
    {
        $this->termId = $termId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return int
     */
    public function getTermGroup()
    {
        return $this->termGroup;
    }

    /**
     * @param int $termGroup
     */
    public function setTermGroup($termGroup)
    {
        $this->termGroup = $termGroup;
    }
}

