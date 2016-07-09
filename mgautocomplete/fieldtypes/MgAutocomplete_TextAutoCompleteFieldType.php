<?php
namespace Craft;

class MgAutocomplete_TextAutoCompleteFieldType extends PlainTextFieldType
{
    public function getName()
    {
        return Craft::t('Autocomplete');
    }

    public function getInputHtml($name, $value)
    {
        craft()->templates->includeCssResource('mgautocomplete/css/style.css');
        craft()->templates->includeJsResource('lib/fileupload/jquery.ui.widget.js');
        craft()->templates->includeJsResource('mgautocomplete/js/jquery.ui.menu.js');
        craft()->templates->includeJsResource('mgautocomplete/js/jquery.ui.autocomplete.js');

        return craft()->templates->render('mgautocomplete/plaintext', array(
            'name' => $name,
            'value' => $value,
            'completions' => $this->_getAllCompletions($name, $this->element),
            'settings' => $this->getSettings()
        ));
    }

    protected function _getAllCompletions($name, $element)
    {
        $completions = array();

        $field = craft()->fields->getFieldByHandle($name);
        if ($field == null or !$field->hasContentColumn()) {
            return $completions;
        }

        $contentTable = craft()->content->contentTable;

        $fieldCol = 'field_' . $name;

        $query = craft()->db->createCommand()
            ->selectDistinct($fieldCol)
            ->from($contentTable)
            ->where(array(
                'locale' => $element->getAttribute('locale')
            ))
            ->andWhere($fieldCol . ' is not null')
            ->queryAll();

        for ($i = 0; $i < count($query); $i++) {
            array_push($completions, $query[$i][$fieldCol]);
        }

        return $completions;
    }

}
