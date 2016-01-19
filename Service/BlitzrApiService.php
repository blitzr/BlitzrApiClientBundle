<?php

namespace Blitzr\ApiClientBundle\Service;

use Blitzr\BlitzrClient;

class BlitzrApiService
{
    private $apiKey;
    private $client;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new BlitzrClient($apiKey);
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function request($method, $params = [])
    {
        return $this->client->request($method, $params);
    }

    public function getArtist($slug = null, $uuid = null, $extras = [], $extras_limit = null)
    {
        return $this->client->getArtist($slug, $uuid, $extras, $extras_limit);
    }

    public function getArtistAliases($slug = null, $uuid = null)
    {
        return $this->client->getArtistAliases($slug, $uuid);
    }

    public function getArtistBands($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->client->getArtistBands($slug, $uuid, $start, $limit);
    }

    public function getArtistBiography($slug = null, $uuid = null, $lang = null, $html_format = false, $url_scheme = null)
    {
        return $this->client->getArtistBiography($slug, $uuid, $lang, $html_format, $url_scheme);
    }

    public function getArtistEvents($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->client->getArtistEvents($slug, $uuid, $start, $limit);
    }

    public function getArtistMembers($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->client->getArtistMembers($slug, $uuid, $start, $limit);
    }

    public function getArtistRelated($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->client->getArtistRelated($slug, $uuid, $start, $limit);
    }

    public function getArtistReleases($slug = null, $uuid = null, $start = null, $limit = null, $type = null, $format = null, $credited = false)
    {
        return $this->client->getArtistReleases($slug, $uuid, $start, $limit, $type, $format, $credited);
    }

    public function getArtistSimilars($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->client->getArtistSimilars($slug, $uuid, $start, $limit);
    }

    public function getArtistSummary($slug = null, $uuid = null)
    {
        return $this->client->getArtistSummary($slug, $uuid);
    }

    public function getArtistWebsites($slug = null, $uuid = null)
    {
        return $this->client->getArtistWebsites($slug, $uuid);
    }

    public function getEvent($slug = null, $uuid = null)
    {
        return $this->client->getEvent($slug, $uuid);
    }

    public function getEvents($country_code = null, $latitude = false, $longitude = false, $date_start = null, $date_end = null, $radius = null, $start = null, $limit = null)
    {
        return $this->client->getEvents($country_code, $latitude, $longitude, $date_start, $date_end, $radius, $start, $limit);
    }

    public function getHarmoniaArtist($service_name = null, $service_id = null)
    {
        return $this->client->getHarmoniaArtist($service_name, $service_id);
    }

    public function getHarmoniaRelease($service_name = null, $service_id = null)
    {
        return $this->client->getHarmoniaRelease($service_name, $service_id);
    }

    public function getHarmoniaLabel($service_name = null, $service_id = null)
    {
        return $this->client->getHarmoniaLabel($service_name, $service_id);
    }

    public function getHarmoniaSearchBySource($source_name = null, $source_id = null, $source_filters = [], $strict = false)
    {
        return $this->client->getHarmoniaSearchBySource($source_name, $source_id, $source_filters, $strict);
    }

    public function getLabel($slug = null, $uuid = null, $extras = [], $extras_limit = null)
    {
        return $this->client->getLabel($slug, $uuid, $extras, $extras_limit);
    }

    public function getLabelArtists($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->client->getLabelArtists($slug, $uuid, $start, $limit);
    }

    public function getLabelBiography($slug = null, $uuid = null, $html_format = false, $url_scheme = null)
    {
        return $this->client->getLabelBiography($slug, $uuid, $html_format, $url_scheme);
    }

    public function getLabelReleases($slug = null, $uuid = null, $format = null, $start = null, $limit = null)
    {
        return $this->client->getLabelReleases($slug, $uuid, $format, $start, $limit);
    }

    public function getLabelSimilars($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->client->getLabelSimilars($slug, $uuid, $start, $limit);
    }

    public function getLabelWebsites($slug = null, $uuid = null)
    {
        return $this->client->getLabelWebsites($slug, $uuid);
    }

    public function getRelease($slug = null, $uuid = null)
    {
        return $this->client->getRelease($slug, $uuid);
    }

    public function getReleaseSources($slug = null, $uuid = null)
    {
        return $this->client->getReleaseSources($slug, $uuid);
    }

    public function searchArtist($query = null, $autocomplete = false, $start = null, $limit = null, $extras = false)
    {
        return $this->client->searchArtist($query, $autocomplete, $start, $limit, $extras);
    }

    public function searchLabel($query = null, $autocomplete = false, $start = null, $limit = null, $extras = false)
    {
        return $this->client->searchLabel($query, $autocomplete, $start, $limit, $extras);
    }

    public function searchRelease($query = null, $filters = [], $autocomplete = false, $start = null, $limit = null, $extras = false)
    {
        return $this->client->searchRelease($query, $filters, $autocomplete, $start, $limit, $extras);
    }

    public function searchTrack($query = null, $filters = [], $autocomplete = false, $start = null, $limit = null, $extras = false)
    {
        return $this->client->searchTrack($query, $filters, $autocomplete, $start, $limit, $extras);
    }

    public function getShopArtist($product_type = null, $slug = null, $uuid = null)
    {
        return $this->client->getShopArtist($product_type, $slug, $uuid);
    }

    public function getShopLabel($product_type = null, $slug = null, $uuid = null)
    {
        return $this->client->getShopLabel($product_type, $slug, $uuid);
    }

    public function getShopRelease($product_type = null, $slug = null, $uuid = null)
    {
        return $this->client->getShopRelease($product_type, $slug, $uuid);
    }

    public function getShopTrack($uuid = null)
    {
        return $this->client->getShopTrack($uuid);
    }

    public function getTag($slug = null)
    {
        return $this->client->getTag($slug);
    }

    public function getTagArtists($slug = null, $start = null, $limit = null)
    {
        return $this->client->getTagArtists($slug, $start, $limit);
    }

    public function getTagReleases($slug = null, $start = null, $limit = null)
    {
        return $this->client->getTagReleases($slug, $start, $limit);
    }

    public function getTrack($uuid = null)
    {
        return $this->client->getTrack($uuid);
    }

    public function getTrackSources($uuid = null)
    {
        return $this->client->getTrackSources($uuid);
    }
}
