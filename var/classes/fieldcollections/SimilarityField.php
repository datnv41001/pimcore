<?php

/**
 * Fields Summary:
 * - field [indexFieldSelectionCombo]
 * - weight [numeric]
 */

return \Pimcore\Model\DataObject\Fieldcollection\Definition::__set_state(array(
   'dao' => NULL,
   'key' => 'SimilarityField',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => '',
   'group' => 'Filter Definition',
   'layoutDefinitions' => 
  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'name' => NULL,
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => 0,
     'height' => 0,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'children' => 
    array (
      0 => 
      \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'name' => 'Layout',
         'type' => '',
         'region' => '',
         'title' => '',
         'width' => '',
         'height' => '',
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'permissions' => '',
         'children' => 
        array (
          0 => 
          \Pimcore\Bundle\EcommerceFrameworkBundle\CoreExtensions\ClassDefinition\IndexFieldSelectionCombo::__set_state(array(
             'name' => 'field',
             'title' => 'Field',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => '',
             'fieldtype' => 'indexFieldSelectionCombo',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'options' => 
            array (
              0 => 
              array (
                'key' => 'categoryIds',
                'value' => 'categoryIds',
              ),
              1 => 
              array (
                'key' => 'name',
                'value' => 'name',
              ),
              2 => 
              array (
                'key' => 'manufacturer_name',
                'value' => 'manufacturer_name',
              ),
              3 => 
              array (
                'key' => 'manufacturer',
                'value' => 'manufacturer',
              ),
              4 => 
              array (
                'key' => 'bodyStyle',
                'value' => 'bodyStyle',
              ),
              5 => 
              array (
                'key' => 'carClass',
                'value' => 'carClass',
              ),
              6 => 
              array (
                'key' => 'color',
                'value' => 'color',
              ),
              7 => 
              array (
                'key' => 'country',
                'value' => 'country',
              ),
              8 => 
              array (
                'key' => 'milage',
                'value' => 'milage',
              ),
              9 => 
              array (
                'key' => 'length',
                'value' => 'length',
              ),
              10 => 
              array (
                'key' => 'width',
                'value' => 'width',
              ),
              11 => 
              array (
                'key' => 'wheelbase',
                'value' => 'wheelbase',
              ),
              12 => 
              array (
                'key' => 'weight',
                'value' => 'weight',
              ),
              13 => 
              array (
                'key' => 'power',
                'value' => 'power',
              ),
              14 => 
              array (
                'key' => 'segments',
                'value' => 'segments',
              ),
            ),
             'defaultValue' => NULL,
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'width' => 300,
             'optionsProviderType' => NULL,
             'optionsProviderClass' => NULL,
             'optionsProviderData' => NULL,
             'specificPriceField' => false,
             'showAllFields' => true,
             'considerTenants' => true,
          )),
          1 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
             'name' => 'weight',
             'title' => 'Weight',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => '',
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValue' => 1,
             'integer' => false,
             'unsigned' => false,
             'minValue' => NULL,
             'maxValue' => NULL,
             'unique' => false,
             'decimalSize' => NULL,
             'decimalPrecision' => NULL,
             'width' => 300,
             'defaultValueGenerator' => '',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'panel',
         'layout' => '',
         'border' => false,
         'icon' => NULL,
         'labelWidth' => 100,
         'labelAlign' => 'left',
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'fieldDefinitionsCache' => NULL,
   'blockedVarsForExport' => 
  array (
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
