<?php
/*
 * This file is part of the Ekino Wordpress package.
 *
 * (c) 2013 Ekino
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ekino\WordpressBundle\DependencyInjection;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class EkinoWordpressExtension.
 *
 * This is the bundle Symfony extension class
 *
 * @author Vincent Composieux <composieux@ekino.com>
 */
class EkinoWordpressExtension extends Extension
{
    /**
     * @var array
     */
    protected static $entities = [
        'comment',
        'comment_meta',
        'link',
        'option',
        'post',
        'post_meta',
        'term',
        'term_relationships',
        'term_taxonomy',
        'user',
        'user_meta',
    ];

    /**
     * Loads configuration.
     *
     * @param array            $configs   A configuration array
     * @param ContainerBuilder $container Symfony container builder
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter('ekino.wordpress.install_directory', $config['wordpress_directory'] ?: $container->getParameter('kernel.root_dir').'/../../');
        $this->loadWordpressGlobals($container, $config['globals']);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('manager.xml');
        $loader->load('services.xml');
        $loader->load('hooks.xml');

        $container->setParameter('ekino.wordpress.repositories', $config['services']);
        $this->loadEntities($container, $config['services']);
        $this->loadManagers($container, $config['services']);

        if (isset($config['table_prefix'])) {
            $this->loadTablePrefix($container, $config['table_prefix']);
        }

        if (isset($config['entity_manager'])) {
            $this->loadEntityManager($container, $config['entity_manager']);
        }

        if ($config['load_twig_extension']) {
            $loader->load('twig.xml');
        }

        if ($config['i18n_cookie_name']) {
            $container->setParameter('ekino.wordpress.i18n_cookie_name', $config['i18n_cookie_name']);
            $loader->load('i18n.xml');
        }

        $container->setParameter('ekino.wordpress.cookie_hash', $config['cookie_hash']);
        $container->setParameter('ekino.wordpress.firewall_name', $config['security']['firewall_name']);
        $container->setParameter('ekino.wordpress.login_url', $config['security']['login_url']);
        $container->setParameter($this->getAlias().'.backend_type_orm', true);
    }

    /**
     * @param ContainerBuilder $container
     * @param array            $config
     */
    protected function loadEntities(ContainerBuilder $container, $config)
    {
        foreach (static::$entities as $entityName) {
            $container->setParameter(sprintf('ekino.wordpress.entity.%s.class', $entityName), $config[$entityName]['class']);
        }
    }

    /**
     * @param ContainerBuilder $container
     * @param array            $config
     */
    protected function loadManagers(ContainerBuilder $container, $config)
    {
        foreach (static::$entities as $entityName) {
            $container->setAlias(sprintf('ekino.wordpress.manager.%s', $entityName), $config[$entityName]['manager']);
        }
    }

    /**
     * Loads table prefix from configuration to doctrine table prefix subscriber event.
     *
     * @param ContainerBuilder $container Symfony dependency injection container
     * @param string           $prefix    Wordpress table prefix
     */
    protected function loadTablePrefix(ContainerBuilder $container, $prefix)
    {
        $identifier = 'ekino.wordpress.subscriber.table_prefix_subscriber';

        $serviceDefinition = $container->getDefinition($identifier);
        $serviceDefinition->setArguments([$prefix]);

        $container->setDefinition($identifier, $serviceDefinition);
    }

    /**
     * Sets Doctrine entity manager for Wordpress.
     *
     * @param ContainerBuilder       $container
     * @param EntityManagerInterface $em
     */
    protected function loadEntityManager(ContainerBuilder $container, $em)
    {
        $container->setParameter('ekino_wordpress.model_manager_name', $em);

        $reference = new Reference(sprintf('doctrine.orm.%s_entity_manager', $em));

        foreach (static::$entities as $entityName) {
            $container->findDefinition(sprintf('ekino.wordpress.manager.%s', $entityName))->replaceArgument(0, $reference);
        }
    }

    /**
     * Sets global variables array to load.
     *
     * @param ContainerBuilder $container
     * @param array            $globals
     */
    protected function loadWordpressGlobals(ContainerBuilder $container, $globals)
    {
        $coreGlobals = ['wp', 'wp_the_query', 'wpdb', 'wp_query', 'allowedentitynames'];
        $globals = array_merge($globals, $coreGlobals);

        $container->setParameter('ekino.wordpress.globals', $globals);
    }

    /**
     * Returns bundle alias name.
     *
     * @return string
     */
    public function getAlias()
    {
        return 'ekino_wordpress';
    }
}
