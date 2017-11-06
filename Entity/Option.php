<?php

namespace Ekino\WordpressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Ekino\WordpressBundle\Model\WordpressEntityInterface;

/**
 * Options
 *
 * @ORM\Table(name="options", uniqueConstraints={@ORM\UniqueConstraint(name="option_name", columns={"option_name"})})
 * @ORM\Entity
 */
class Option implements WordpressEntityInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="option_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $optionId;

    /**
     * @var string
     *
     * @ORM\Column(name="option_name", type="string", length=191, nullable=false)
     */
    private $optionName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="option_value", type="text", nullable=false)
     */
    private $optionValue;

    /**
     * @var string
     *
     * @ORM\Column(name="autoload", type="string", length=20, nullable=false)
     */
    private $autoload = 'yes';

    /**
     * @return int
     */
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * @param int $optionId
     */
    public function setOptionId($optionId)
    {
        $this->optionId = $optionId;
    }

    /**
     * @return string
     */
    public function getOptionName()
    {
        return $this->optionName;
    }

    /**
     * @param string $optionName
     */
    public function setOptionName($optionName)
    {
        $this->optionName = $optionName;
    }

    /**
     * @return string
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * @param string $optionValue
     */
    public function setOptionValue($optionValue)
    {
        $this->optionValue = $optionValue;
    }

    /**
     * @return string
     */
    public function getAutoload()
    {
        return $this->autoload;
    }

    /**
     * @param string $autoload
     */
    public function setAutoload($autoload)
    {
        $this->autoload = $autoload;
    }
}

