<?php

namespace Ekino\WordpressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Ekino\WordpressBundle\Model\WordpressEntityInterface;

/**
 * Links
 *
 * @ORM\Table(name="links", indexes={@ORM\Index(name="link_visible", columns={"link_visible"})})
 * @ORM\Entity
 */
class Links implements WordpressEntityInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="link_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $linkId;

    /**
     * @var string
     *
     * @ORM\Column(name="link_url", type="string", length=255, nullable=false)
     */
    private $linkUrl = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_name", type="string", length=255, nullable=false)
     */
    private $linkName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_image", type="string", length=255, nullable=false)
     */
    private $linkImage = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_target", type="string", length=25, nullable=false)
     */
    private $linkTarget = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_description", type="string", length=255, nullable=false)
     */
    private $linkDescription = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_visible", type="string", length=20, nullable=false)
     */
    private $linkVisible = 'Y';

    /**
     * @var integer
     *
     * @ORM\Column(name="link_owner", type="bigint", nullable=false)
     */
    private $linkOwner = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="link_rating", type="integer", nullable=false)
     */
    private $linkRating = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="link_updated", type="datetime", nullable=false)
     */
    private $linkUpdated = '1000-01-01 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="link_rel", type="string", length=255, nullable=false)
     */
    private $linkRel = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_notes", type="text", length=16777215, nullable=false)
     */
    private $linkNotes;

    /**
     * @var string
     *
     * @ORM\Column(name="link_rss", type="string", length=255, nullable=false)
     */
    private $linkRss = '';

    /**
     * @return int
     */
    public function getLinkId()
    {
        return $this->linkId;
    }

    /**
     * @param int $linkId
     */
    public function setLinkId($linkId)
    {
        $this->linkId = $linkId;
    }

    /**
     * @return string
     */
    public function getLinkUrl()
    {
        return $this->linkUrl;
    }

    /**
     * @param string $linkUrl
     */
    public function setLinkUrl($linkUrl)
    {
        $this->linkUrl = $linkUrl;
    }

    /**
     * @return string
     */
    public function getLinkName()
    {
        return $this->linkName;
    }

    /**
     * @param string $linkName
     */
    public function setLinkName($linkName)
    {
        $this->linkName = $linkName;
    }

    /**
     * @return string
     */
    public function getLinkImage()
    {
        return $this->linkImage;
    }

    /**
     * @param string $linkImage
     */
    public function setLinkImage($linkImage)
    {
        $this->linkImage = $linkImage;
    }

    /**
     * @return string
     */
    public function getLinkTarget()
    {
        return $this->linkTarget;
    }

    /**
     * @param string $linkTarget
     */
    public function setLinkTarget($linkTarget)
    {
        $this->linkTarget = $linkTarget;
    }

    /**
     * @return string
     */
    public function getLinkDescription()
    {
        return $this->linkDescription;
    }

    /**
     * @param string $linkDescription
     */
    public function setLinkDescription($linkDescription)
    {
        $this->linkDescription = $linkDescription;
    }

    /**
     * @return string
     */
    public function getLinkVisible()
    {
        return $this->linkVisible;
    }

    /**
     * @param string $linkVisible
     */
    public function setLinkVisible($linkVisible)
    {
        $this->linkVisible = $linkVisible;
    }

    /**
     * @return int
     */
    public function getLinkOwner()
    {
        return $this->linkOwner;
    }

    /**
     * @param int $linkOwner
     */
    public function setLinkOwner($linkOwner)
    {
        $this->linkOwner = $linkOwner;
    }

    /**
     * @return int
     */
    public function getLinkRating()
    {
        return $this->linkRating;
    }

    /**
     * @param int $linkRating
     */
    public function setLinkRating($linkRating)
    {
        $this->linkRating = $linkRating;
    }

    /**
     * @return \DateTime
     */
    public function getLinkUpdated()
    {
        return $this->linkUpdated;
    }

    /**
     * @param \DateTime $linkUpdated
     */
    public function setLinkUpdated($linkUpdated)
    {
        $this->linkUpdated = $linkUpdated;
    }

    /**
     * @return string
     */
    public function getLinkRel()
    {
        return $this->linkRel;
    }

    /**
     * @param string $linkRel
     */
    public function setLinkRel($linkRel)
    {
        $this->linkRel = $linkRel;
    }

    /**
     * @return string
     */
    public function getLinkNotes()
    {
        return $this->linkNotes;
    }

    /**
     * @param string $linkNotes
     */
    public function setLinkNotes($linkNotes)
    {
        $this->linkNotes = $linkNotes;
    }

    /**
     * @return string
     */
    public function getLinkRss()
    {
        return $this->linkRss;
    }

    /**
     * @param string $linkRss
     */
    public function setLinkRss($linkRss)
    {
        $this->linkRss = $linkRss;
    }
}

