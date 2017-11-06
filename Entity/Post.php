<?php

namespace Ekino\WordpressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posts
 *
 * @ORM\Table(name="wp_posts", indexes={@ORM\Index(name="post_name", columns={"post_name"}), @ORM\Index(name="type_status_date", columns={"post_type", "post_status", "post_date", "ID"}), @ORM\Index(name="post_parent", columns={"post_parent"}), @ORM\Index(name="post_author", columns={"post_author"})})
 * @ORM\Entity
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="post_author", type="bigint", nullable=false)
     */
    private $postAuthor = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_date", type="datetime", nullable=false)
     */
    private $postDate = '1000-01-01 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_date_gmt", type="datetime", nullable=false)
     */
    private $postDateGmt = '1000-01-01 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="post_content", type="text", nullable=false)
     */
    private $postContent;

    /**
     * @var string
     *
     * @ORM\Column(name="post_title", type="text", length=65535, nullable=false)
     */
    private $postTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="post_excerpt", type="text", length=65535, nullable=false)
     */
    private $postExcerpt;

    /**
     * @var string
     *
     * @ORM\Column(name="post_status", type="string", length=20, nullable=false)
     */
    private $postStatus = 'publish';

    /**
     * @var string
     *
     * @ORM\Column(name="comment_status", type="string", length=20, nullable=false)
     */
    private $commentStatus = 'open';

    /**
     * @var string
     *
     * @ORM\Column(name="ping_status", type="string", length=20, nullable=false)
     */
    private $pingStatus = 'open';

    /**
     * @var string
     *
     * @ORM\Column(name="post_password", type="string", length=255, nullable=false)
     */
    private $postPassword = '';

    /**
     * @var string
     *
     * @ORM\Column(name="post_name", type="string", length=200, nullable=false)
     */
    private $postName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="to_ping", type="text", length=65535, nullable=false)
     */
    private $toPing;

    /**
     * @var string
     *
     * @ORM\Column(name="pinged", type="text", length=65535, nullable=false)
     */
    private $pinged;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_modified", type="datetime", nullable=false)
     */
    private $postModified = '1000-01-01 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_modified_gmt", type="datetime", nullable=false)
     */
    private $postModifiedGmt = '1000-01-01 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="post_content_filtered", type="text", nullable=false)
     */
    private $postContentFiltered;

    /**
     * @var integer
     *
     * @ORM\Column(name="post_parent", type="bigint", nullable=false)
     */
    private $postParent = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="guid", type="string", length=255, nullable=false)
     */
    private $guid = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="menu_order", type="integer", nullable=false)
     */
    private $menuOrder = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="post_type", type="string", length=20, nullable=false)
     */
    private $postType = 'post';

    /**
     * @var string
     *
     * @ORM\Column(name="post_mime_type", type="string", length=100, nullable=false)
     */
    private $postMimeType = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="comment_count", type="bigint", nullable=false)
     */
    private $commentCount = '0';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getPostAuthor()
    {
        return $this->postAuthor;
    }

    /**
     * @param int $postAuthor
     */
    public function setPostAuthor($postAuthor)
    {
        $this->postAuthor = $postAuthor;
    }

    /**
     * @return \DateTime
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * @param \DateTime $postDate
     */
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;
    }

    /**
     * @return \DateTime
     */
    public function getPostDateGmt()
    {
        return $this->postDateGmt;
    }

    /**
     * @param \DateTime $postDateGmt
     */
    public function setPostDateGmt($postDateGmt)
    {
        $this->postDateGmt = $postDateGmt;
    }

    /**
     * @return string
     */
    public function getPostContent()
    {
        return $this->postContent;
    }

    /**
     * @param string $postContent
     */
    public function setPostContent($postContent)
    {
        $this->postContent = $postContent;
    }

    /**
     * @return string
     */
    public function getPostTitle()
    {
        return $this->postTitle;
    }

    /**
     * @param string $postTitle
     */
    public function setPostTitle($postTitle)
    {
        $this->postTitle = $postTitle;
    }

    /**
     * @return string
     */
    public function getPostExcerpt()
    {
        return $this->postExcerpt;
    }

    /**
     * @param string $postExcerpt
     */
    public function setPostExcerpt($postExcerpt)
    {
        $this->postExcerpt = $postExcerpt;
    }

    /**
     * @return string
     */
    public function getPostStatus()
    {
        return $this->postStatus;
    }

    /**
     * @param string $postStatus
     */
    public function setPostStatus($postStatus)
    {
        $this->postStatus = $postStatus;
    }

    /**
     * @return string
     */
    public function getCommentStatus()
    {
        return $this->commentStatus;
    }

    /**
     * @param string $commentStatus
     */
    public function setCommentStatus($commentStatus)
    {
        $this->commentStatus = $commentStatus;
    }

    /**
     * @return string
     */
    public function getPingStatus()
    {
        return $this->pingStatus;
    }

    /**
     * @param string $pingStatus
     */
    public function setPingStatus($pingStatus)
    {
        $this->pingStatus = $pingStatus;
    }

    /**
     * @return string
     */
    public function getPostPassword()
    {
        return $this->postPassword;
    }

    /**
     * @param string $postPassword
     */
    public function setPostPassword($postPassword)
    {
        $this->postPassword = $postPassword;
    }

    /**
     * @return string
     */
    public function getPostName()
    {
        return $this->postName;
    }

    /**
     * @param string $postName
     */
    public function setPostName($postName)
    {
        $this->postName = $postName;
    }

    /**
     * @return string
     */
    public function getToPing()
    {
        return $this->toPing;
    }

    /**
     * @param string $toPing
     */
    public function setToPing($toPing)
    {
        $this->toPing = $toPing;
    }

    /**
     * @return string
     */
    public function getPinged()
    {
        return $this->pinged;
    }

    /**
     * @param string $pinged
     */
    public function setPinged($pinged)
    {
        $this->pinged = $pinged;
    }

    /**
     * @return \DateTime
     */
    public function getPostModified()
    {
        return $this->postModified;
    }

    /**
     * @param \DateTime $postModified
     */
    public function setPostModified($postModified)
    {
        $this->postModified = $postModified;
    }

    /**
     * @return \DateTime
     */
    public function getPostModifiedGmt()
    {
        return $this->postModifiedGmt;
    }

    /**
     * @param \DateTime $postModifiedGmt
     */
    public function setPostModifiedGmt($postModifiedGmt)
    {
        $this->postModifiedGmt = $postModifiedGmt;
    }

    /**
     * @return string
     */
    public function getPostContentFiltered()
    {
        return $this->postContentFiltered;
    }

    /**
     * @param string $postContentFiltered
     */
    public function setPostContentFiltered($postContentFiltered)
    {
        $this->postContentFiltered = $postContentFiltered;
    }

    /**
     * @return int
     */
    public function getPostParent()
    {
        return $this->postParent;
    }

    /**
     * @param int $postParent
     */
    public function setPostParent($postParent)
    {
        $this->postParent = $postParent;
    }

    /**
     * @return string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * @param string $guid
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;
    }

    /**
     * @return int
     */
    public function getMenuOrder()
    {
        return $this->menuOrder;
    }

    /**
     * @param int $menuOrder
     */
    public function setMenuOrder($menuOrder)
    {
        $this->menuOrder = $menuOrder;
    }

    /**
     * @return string
     */
    public function getPostType()
    {
        return $this->postType;
    }

    /**
     * @param string $postType
     */
    public function setPostType($postType)
    {
        $this->postType = $postType;
    }

    /**
     * @return string
     */
    public function getPostMimeType()
    {
        return $this->postMimeType;
    }

    /**
     * @param string $postMimeType
     */
    public function setPostMimeType($postMimeType)
    {
        $this->postMimeType = $postMimeType;
    }

    /**
     * @return int
     */
    public function getCommentCount()
    {
        return $this->commentCount;
    }

    /**
     * @param int $commentCount
     */
    public function setCommentCount($commentCount)
    {
        $this->commentCount = $commentCount;
    }
}

