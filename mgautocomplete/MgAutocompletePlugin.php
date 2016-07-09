<?php
namespace Craft;


class MgAutocompletePlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('Autocomplete');
    }

    public function getVersion()
    {
        return '2.0.0';
    }

    public function getDeveloper()
    {
        return 'Mildly Geeky, Inc.';
    }

    public function getDeveloperUrl()
    {
        return 'https://mildlygeeky.com';
    }

    public function getSchemaVersion()
    {
        return '2.0.0';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/mildlygeeky/craft-mgautocomplete/master/releases.json';
    }
}
