# BlitzrApiClientBundle


This bundle is the official Blitzr client bundle.
It provides you a service to call the Blitzr API as easy as possible. This service implements all the methods from the official Blitzr PHP client. Also you can use the PHP client documentation as a reference for this bundle.

To use this bundle you will need an API key, you can request it at : developer.blitzr.com.


## Installation

First add BlitzrApiClientBundle to your composer requirements.

    $ composer require blitzr/api-client-bundle

Then enable the bundle in the Kernel.

    <?php
    // app/AppKernel.php
    
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new FOS\UserBundle\FOSUserBundle(),
            // ...
        );
    }

Add the API key to your configuration.

    // app/config/config.yml
    
    ...
    
    # BlitzrApiClientBundle
    blitzr_api_client:
        api_key: "your_api_key"

That's all ! 

## Basic usage

This bundle provides you a service, let's take an example of how to get an Artist or a Tag.
    
    // Get the service
    $blitzrClient = $this->get('blitzr_api_client.client');
    
    // Request the artist
    $artist = $blitzrClient->getArtist('year-of-no-light');
    
    // Request a tag
    $tag = $blitzrClient->getTag('rock');
