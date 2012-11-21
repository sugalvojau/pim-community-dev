<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            // MongoDB storage
            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            // To set up basic data
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            // translatable, timestampable, etc

            // BAP modules
            new Bap\Bundle\FlexibleEntityBundle\BapFlexibleEntityBundle(),
            new Bap\Bundle\UIBundle\BapUIBundle(),

            // PIM modules
            new Pim\Bundle\UIBundle\PimUIBundle(),
            new Pim\Bundle\ConnectorIcecatBundle\PimConnectorIcecatBundle(),
            new Pim\Bundle\DashboardBundle\PimDashboardBundle(),
            new Pim\Bundle\CatalogBundle\PimCatalogBundle(),
            new Pim\Bundle\DataFlowBundle\PimDataFlowBundle(),

            // community bundles
            new APY\DataGridBundle\APYDataGridBundle(),
            new Pim\Bundle\DemoDataBundle\PimDemoDataBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
