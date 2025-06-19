<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - Name [input]
 * - Sku [input]
 * - Color [multiselect]
 * - Image [input]
 * - Category [manyToOneRelation]
 * - URL [link]
 * - Approved [checkbox]
 * - Accessory [manyToManyObjectRelation]
 * - Video [video]
 * - Price [numeric]
 * - StockQuantity [quantityValue]
 * - Platforms [multiselect]
 * - Description [wysiwyg]
 * - Status [select]
 * - CreatedAt [datetime]
 * - UpdatedAt [datetime]
 */

return \Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => '6',
   'name' => 'Products',
   'title' => '',
   'description' => '',
   'creationDate' => NULL,
   'modificationDate' => 1750306157,
   'userOwner' => NULL,
   'userModification' => 2,
   'parentClass' => '',
   'implementsInterfaces' => '',
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => false,
   'allowVariants' => false,
   'showVariants' => false,
   'layoutDefinitions' => 
  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'name' => 'pimcore_root',
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
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => '',
         'height' => '',
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'name' => 'Name',
             'title' => 'Name',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValue' => NULL,
             'columnLength' => 255,
             'regex' => '',
             'regexFlags' => 
            array (
            ),
             'unique' => false,
             'showCharCount' => true,
             'width' => '',
             'defaultValueGenerator' => '',
          )),
          1 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'name' => 'Sku',
             'title' => 'Sku',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValue' => NULL,
             'columnLength' => 190,
             'regex' => '',
             'regexFlags' => 
            array (
            ),
             'unique' => true,
             'showCharCount' => false,
             'width' => '',
             'defaultValueGenerator' => '',
          )),
          2 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
             'name' => 'Color',
             'title' => 'Color',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
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
                'key' => 'blue',
                'value' => 'blue',
              ),
              1 => 
              array (
                'key' => 'red',
                'value' => 'red',
              ),
              2 => 
              array (
                'key' => 'black',
                'value' => 'black',
              ),
            ),
             'maxItems' => NULL,
             'renderType' => 'list',
             'dynamicOptions' => false,
             'defaultValue' => NULL,
             'height' => '',
             'width' => '',
             'defaultValueGenerator' => '',
             'optionsProviderType' => NULL,
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
          )),
          3 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'name' => 'Image',
             'title' => 'Image',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValue' => NULL,
             'columnLength' => 190,
             'regex' => '',
             'regexFlags' => 
            array (
            ),
             'unique' => false,
             'showCharCount' => false,
             'width' => '',
             'defaultValueGenerator' => '',
          )),
          4 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
             'name' => 'Category',
             'title' => 'Category',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => true,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'classes' => 
            array (
              0 => 
              array (
                'classes' => 'Category',
              ),
            ),
             'displayMode' => NULL,
             'pathFormatterClass' => '',
             'assetInlineDownloadAllowed' => false,
             'assetUploadPath' => '',
             'allowToClearRelation' => true,
             'objectsAllowed' => true,
             'assetsAllowed' => false,
             'assetTypes' => 
            array (
            ),
             'documentsAllowed' => false,
             'documentTypes' => 
            array (
            ),
             'width' => '',
          )),
          5 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Link::__set_state(array(
             'name' => 'URL',
             'title' => 'URL',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'allowedTypes' => NULL,
             'allowedTargets' => NULL,
             'disabledFields' => NULL,
          )),
          6 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
             'name' => 'Approved',
             'title' => 'Approved',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValue' => NULL,
             'defaultValueGenerator' => '',
          )),
          7 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
             'name' => 'Accessory',
             'title' => 'Accessory',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => true,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'classes' => 
            array (
              0 => 
              array (
                'classes' => 'AccessoryPart',
              ),
            ),
             'displayMode' => NULL,
             'pathFormatterClass' => '',
             'maxItems' => NULL,
             'visibleFields' => 
            array (
            ),
             'allowToCreateNewObject' => false,
             'allowToClearRelation' => true,
             'optimizedAdminLoading' => false,
             'enableTextSelection' => false,
             'visibleFieldDefinitions' => 
            array (
            ),
             'width' => '',
             'height' => '',
          )),
          8 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
             'name' => 'Video',
             'title' => 'Video',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'uploadPath' => '',
             'allowedTypes' => 
            array (
              0 => 'youtube',
            ),
             'supportedTypes' => 
            array (
              0 => 'asset',
              1 => 'youtube',
              2 => 'vimeo',
              3 => 'dailymotion',
            ),
             'height' => '',
             'width' => '',
          )),
          9 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
             'name' => 'Price',
             'title' => 'Price',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValue' => NULL,
             'integer' => false,
             'unsigned' => false,
             'minValue' => NULL,
             'maxValue' => NULL,
             'unique' => false,
             'decimalSize' => NULL,
             'decimalPrecision' => NULL,
             'width' => '',
             'defaultValueGenerator' => '',
          )),
          10 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'name' => 'StockQuantity',
             'title' => 'Stock Quantity',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'unitWidth' => '',
             'defaultUnit' => NULL,
             'validUnits' => 
            array (
              0 => '1',
              1 => '2',
              2 => '3',
              3 => '4',
              4 => '5',
              5 => '6',
              6 => '7',
              7 => '8',
            ),
             'unique' => false,
             'autoConvert' => false,
             'defaultValueGenerator' => '',
             'width' => '',
             'defaultValue' => NULL,
             'integer' => false,
             'unsigned' => false,
             'minValue' => NULL,
             'maxValue' => NULL,
             'decimalSize' => NULL,
             'decimalPrecision' => NULL,
          )),
          11 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
             'name' => 'Platforms',
             'title' => 'Platforms',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
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
                'key' => 'odoo',
                'value' => 'odoo',
              ),
              1 => 
              array (
                'key' => 'shopify',
                'value' => 'shopify',
              ),
              2 => 
              array (
                'key' => 'elasticsearch',
                'value' => 'elasticsearch',
              ),
              3 => 
              array (
                'key' => 'b2b',
                'value' => 'b2b',
              ),
            ),
             'maxItems' => NULL,
             'renderType' => 'tags',
             'dynamicOptions' => false,
             'defaultValue' => NULL,
             'height' => '',
             'width' => '',
             'defaultValueGenerator' => '',
             'optionsProviderType' => NULL,
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
          )),
          12 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
             'name' => 'Description',
             'title' => 'Description',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'toolbarConfig' => '',
             'excludeFromSearchIndex' => false,
             'maxCharacters' => '',
             'height' => '',
             'width' => '',
          )),
          13 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'name' => 'Status',
             'title' => 'Status',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
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
                'key' => 'active ',
                'value' => 'active ',
              ),
              1 => 
              array (
                'key' => 'inactive ',
                'value' => 'inactive ',
              ),
            ),
             'defaultValue' => '',
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'width' => '',
             'optionsProviderType' => NULL,
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
          )),
          14 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Datetime::__set_state(array(
             'name' => 'CreatedAt',
             'title' => 'Created At',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValue' => NULL,
             'useCurrentDate' => false,
             'respectTimezone' => true,
             'columnType' => 'bigint(20)',
             'defaultValueGenerator' => '',
          )),
          15 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Datetime::__set_state(array(
             'name' => 'UpdatedAt',
             'title' => 'Updated At',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValue' => NULL,
             'useCurrentDate' => false,
             'respectTimezone' => true,
             'columnType' => 'bigint(20)',
             'defaultValueGenerator' => '',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'panel',
         'layout' => NULL,
         'border' => false,
         'icon' => '',
         'labelWidth' => 0,
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
   'icon' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'previewGeneratorReference' => '',
   'compositeIndices' => 
  array (
  ),
   'showFieldLookup' => false,
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'deletedDataComponents' => 
  array (
  ),
   'blockedVarsForExport' => 
  array (
  ),
   'fieldDefinitionsCache' => 
  array (
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
