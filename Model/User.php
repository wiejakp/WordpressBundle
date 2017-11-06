<?php

namespace Ekino\WordpressBundle\Model;

use Doctrine\ORM\Mapping as ORM;

use Ekino\WordpressBundle\Model\WordpressEntityInterface;
use Symfony\Component\Security\Core\User\UserInterface;


abstract class User implements WordpressEntityInterface, UserInterface
{
    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->userLogin;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->roles ? $this->roles : [];
    }
    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->getPass();
    }
    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return;
    }
    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->getLogin();
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        return $this;
    }
}

