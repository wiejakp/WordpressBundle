<?php

namespace Ekino\WordpressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentmeta
 *
 * @ORM\Table(name="wp_commentmeta", indexes={@ORM\Index(name="comment_id", columns={"comment_id"}), @ORM\Index(name="meta_key", columns={"meta_key"})})
 * @ORM\Entity
 */
class Commentmeta
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
     * @ORM\Column(name="comment_id", type="bigint", nullable=false)
     */
    private $commentId = '0';

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
     * @return Commentmeta
     */
    public function setMetaId($metaId)
    {
        $this->metaId = $metaId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * @param int $commentId
     * @return Commentmeta
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaKey()
    {
        return $this->metaKey;
    }

    /**
     * @param string $metaKey
     * @return Commentmeta
     */
    public function setMetaKey($metaKey)
    {
        $this->metaKey = $metaKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaValue()
    {
        return $this->metaValue;
    }

    /**
     * @param string $metaValue
     * @return Commentmeta
     */
    public function setMetaValue($metaValue)
    {
        $this->metaValue = $metaValue;
        return $this;
    }
}

