<?php

namespace Blitzr\ApiClientBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\ResolveParameterPlaceHoldersPass;
use Blitzr\ApiClientBundle\BlitzrApiClientBundle;
use Symfony\Component\DependencyInjection\Compiler\ResolveDefinitionTemplatesPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\KernelInterface;

class BlitzrApiClientExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testLoad()
    {
        $container = $this->getContainerForConfig(array('blitzr_api_client' => array('api_key' => 'your_api_key')));

        $blitzr_api_client = $container->get('blitzr_api_client.client');
    }

    private function getContainerForConfig(array $configs, KernelInterface $kernel = null)
    {
        if (null === $kernel) {
            $kernel = $this->createMock('Symfony\Component\HttpKernel\KernelInterface');
            $kernel
                ->expects($this->any())
                ->method('getBundles')
                ->will($this->returnValue(array()))
            ;
        }

        $bundle = new BlitzrApiClientBundle($kernel);
        $extension = $bundle->getContainerExtension();

        $container = new ContainerBuilder();
        $container->setParameter('kernel.debug', true);
        $container->setParameter('kernel.cache_dir', sys_get_temp_dir().'/serializer');
        $container->setParameter('kernel.bundles', array());
        $container->set('translator', $this->createMock('Symfony\\Component\\Translation\\TranslatorInterface'));
        $container->set('debug.stopwatch', $this->createMock('Symfony\\Component\\Stopwatch\\Stopwatch'));
        $container->registerExtension($extension);
        $extension->load($configs, $container);

        $bundle->build($container);

        $container->getCompilerPassConfig()->setOptimizationPasses(array(
            new ResolveParameterPlaceHoldersPass(),
            new ResolveDefinitionTemplatesPass(),
        ));
        $container->getCompilerPassConfig()->setRemovingPasses(array());
        $container->compile();

        return $container;
    }
}