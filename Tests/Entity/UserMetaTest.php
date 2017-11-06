<?php
/*
 * This file is part of the Ekino Wordpress package.
 *
 * (c) 2013 Ekino
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ekino\WordpressBundle\Tests\Entity;

use Ekino\WordpressBundle\Entity\User;
use Ekino\WordpressBundle\Entity\Usermeta;

/**
 * Class UsermetaTest.
 *
 * This is the Wordpress user meta entity test
 *
 * @author Vincent Composieux <composieux@ekino.com>
 */
class UsermetaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test entity getters & setters.
     */
    public function testGettersSetters()
    {
        $entity = new Usermeta();

        $user = new User();
        $user->setDisplayName('display name');
        $entity->setUser($user);

        $entity->setKey('fake key');
        $entity->setValue('fake value');

        $this->assertEquals('display name', $entity->getUser()->getDisplayName());
        $this->assertEquals('fake key', $entity->getKey());
        $this->assertEquals('fake value', $entity->getValue());
    }
}
