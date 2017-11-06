<?php

namespace Ekino\WordpressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TermTaxonomy
 *
 * @ORM\Table(name="wp_term_taxonomy", uniqueConstraints={@ORM\UniqueConstraint(name="term_id_taxonomy", columns={"term_id", "taxonomy"})}, indexes={@ORM\Index(name="taxonomy", columns={"taxonomy"})})
 * @ORM\Entity
 */
class TermTaxonomy
{
    /**
     * @var integer
     *
     * @ORM\Column(name="term_taxonomy_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $termTaxonomyId;

    /**
     * @var integer
     *
     * @ORM\Column(name="term_id", type="bigint", nullable=false)
     */
    private $termId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="taxonomy", type="string", length=32, nullable=false)
     */
    private $taxonomy = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent", type="bigint", nullable=false)
     */
    private $parent = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="count", type="bigint", nullable=false)
     */
    private $count = '0';

    /**
     * @return int
     */
    public function getTermTaxonomyId()
    {
        return $this->termTaxonomyId;
    }

    /**
     * @param int $termTaxonomyId
     */
    public function setTermTaxonomyId($termTaxonomyId)
    {
        $this->termTaxonomyId = $termTaxonomyId;
    }

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
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }

    /**
     * @param string $taxonomy
     */
    public function setTaxonomy($taxonomy)
    {
        $this->taxonomy = $taxonomy;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param int $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }
}

