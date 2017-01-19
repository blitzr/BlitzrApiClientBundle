Blitzr Official PHP Bundle
================

A PHP API client bundle for the [Blitzr API](https://blitzr.io).

To use this bundle you will need an API key, you can request it at : [https://blitzr.io](https://blitzr.io/#contact).


----------

Documentation
---------------

This service implements all the methods from the [official Blitzr PHP client](https://github.com/blitzr-php-client/). Also you can use the [PHP client documentation](https://blitzr.github.io/blitzr-php-client/) as a reference for this bundle.

You can also refer to the official [Blitzr API reference](https://blitzr.io/doc) to have more informations.
----------


Installation
---------------

First add BlitzrApiClientBundle to your composer requirements.

```bash
$ composer require blitzr/api-client-bundle
```

Then enable the bundle in the Kernel.

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Blitzr\ApiClientBundle\BlitzrApiClientBundle(),
        // ...
    );
}
```

Add the API key to your configuration.

```yaml
// app/config/config.yml

...

# BlitzrApiClientBundle
blitzr_api_client:
    api_key: "your_api_key"
```

That's all !


----------

Getting Started
---------------------


This bundle provides you a service, let's take an example of how to get an Artist or a Tag.

```php
// Get the service
$blitzrClient = $this->get('blitzr_api_client.client');

// Request the artist
$artist = $blitzrClient->getArtist('year-of-no-light');

// Request a tag
$tag = $blitzrClient->getTag('rock');
```
