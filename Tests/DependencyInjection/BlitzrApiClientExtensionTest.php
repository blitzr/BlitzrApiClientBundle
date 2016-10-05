<?php

namespace Blitzr\ApiClientBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\ResolveParameterPlaceHoldersPass;
use Blitzr\ApiClientBundle\BlitzrApiClientBundle;
use Symfony\Component\DependencyInjection\Compiler\ResolveDefinitionTemplatesPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\KernelInterface;

class BlitzrApiClientExtensionTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @expectedException        Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     * @expectedExceptionCode 0
     * @expectedExceptionMessage The child node "api_key" at path "blitzr_api_client" must be configured.
     */
    public function testMissingConfig()
    {
        $container = $this->getContainerForConfig();

        $blitzr_api_client = $container->get('blitzr_api_client.client');
    }

    public function testCorrectConfig()
    {
        $container = $this->getContainerForConfig(array('blitzr_api_client' => array('api_key' => 'your_api_key')));

        $blitzr_api_client = $container->get('blitzr_api_client.client');
    }

    public function testMethods()
    {
        $container = $this->getContainerForConfig(array('blitzr_api_client' => array('api_key' => 'your_api_key')));

        $blitzr_api_client = $container->get('blitzr_api_client.client');

        $public_methods = get_class_methods($blitzr_api_client);

        $this->assertGreaterThan(2, count($public_methods));

        foreach ($public_methods as $method) {
            $this->assertTrue(is_callable(array($blitzr_api_client, $method)));
        }


    }


    private function getContainerForConfig(array $configs = array())
    {
        $kernel = $this->getMockBuilder('Symfony\Component\HttpKernel\KernelInterface')->getMock();
        $kernel
            ->expects($this->any())
            ->method('getBundles')
            ->will($this->returnValue(array()))
        ;

        $bundle = new BlitzrApiClientBundle($kernel);
        $extension = $bundle->getContainerExtension();

        $container = new ContainerBuilder();
        $container->setParameter('kernel.debug', true);
        $container->setParameter('kernel.cache_dir', sys_get_temp_dir().'/serializer');
        $container->setParameter('kernel.bundles', array());
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