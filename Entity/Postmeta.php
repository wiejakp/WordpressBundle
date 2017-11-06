<?php

namespace Ekino\WordpressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Ekino\WordpressBundle\Model\WordpressEntityInterface;

/**
 * Postmeta
 *
 * @ORM\Table(name="postmeta", indexes={@ORM\Index(name="post_id", columns={"post_id"}), @ORM\Index(name="meta_key", columns={"meta_key"})})
 * @ORM\Entity
 */
class Postmeta implements WordpressEntityInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="meta_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $metaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="post_id", type="bigint", nullable=false)
     */
    private $postId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="meta_key", type="string", length=255, nullable=true)
     */
    private $metaKey;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_value", type="text", nullable=true)
     */
    private $metaValue;

    /**
     * @return int
     */
    public function getMetaId()
    {
        return $this->metaId;
    }

    /**
     * @param int $metaId
     * @return Postmeta
     */
    public function setMetaId($metaId)
    {
        $this->metaId = $metaId;
        return $this;
    }
}

