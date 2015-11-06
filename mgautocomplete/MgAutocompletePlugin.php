<?php
namespace Craft;


class MgAutocompletePlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Autocomplete');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Mildly Geeky';
    }

    function getDeveloperUrl()
    {
        return 'http://www.mildlygeeky.com';
    }
}
