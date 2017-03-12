<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

//  error_reporting(E_ALL ^ E_NOTICE);
//  ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('America/Los_Angeles');

function GetGlobalConnectionOptions()
{
    return array(
  'server' => 'localhost',
  'port' => '3306',
  'username' => 'root',
  'password' => '',
  'database' => 'bccms'
);
}

function HasAdminPage()
{
    return true;
}

function GetPageGroups()
{
    $result = array('BigCommerce', 'Settings', 'Sources', 'Manage', 'Catalogs', 'Data');
    return $result;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => 'Stores', 'short_caption' => 'Stores', 'filename' => 'stores.php', 'name' => 'stores', 'group_name' => 'BigCommerce', 'add_separator' => false);
    $result[] = array('caption' => 'Store Users', 'short_caption' => 'Store Users', 'filename' => 'store_users.php', 'name' => 'store_users', 'group_name' => 'Manage', 'add_separator' => false);
    $result[] = array('caption' => 'Businesses', 'short_caption' => 'Businesses', 'filename' => 'businesses.php', 'name' => 'businesses', 'group_name' => 'Manage', 'add_separator' => false);
    $result[] = array('caption' => 'Skus', 'short_caption' => 'Skus', 'filename' => 'skus.php', 'name' => 'skus', 'group_name' => 'Catalogs', 'add_separator' => false);
    $result[] = array('caption' => 'Catalogs', 'short_caption' => 'Catalogs', 'filename' => 'catalogs.php', 'name' => 'catalogs', 'group_name' => 'Catalogs', 'add_separator' => false);
    $result[] = array('caption' => 'Categories', 'short_caption' => 'Categories', 'filename' => 'categories.php', 'name' => 'categories', 'group_name' => 'Catalogs', 'add_separator' => false);
    $result[] = array('caption' => 'Products', 'short_caption' => 'Products', 'filename' => 'products.php', 'name' => 'products', 'group_name' => 'Catalogs', 'add_separator' => false);
    $result[] = array('caption' => 'Meta Data', 'short_caption' => 'Meta Data', 'filename' => 'meta_data.php', 'name' => 'meta_data', 'group_name' => 'Catalogs', 'add_separator' => false);
    $result[] = array('caption' => 'Contacts', 'short_caption' => 'Contacts', 'filename' => 'contacts.php', 'name' => 'contacts', 'group_name' => 'Manage', 'add_separator' => false);
    $result[] = array('caption' => 'Activity Log', 'short_caption' => 'Activity Log', 'filename' => 'activity_log.php', 'name' => 'activity_log', 'group_name' => 'Manage', 'add_separator' => false);
    $result[] = array('caption' => 'Activities', 'short_caption' => 'Activities', 'filename' => 'activities.php', 'name' => 'activities', 'group_name' => 'Settings', 'add_separator' => false);
    $result[] = array('caption' => 'Statuses', 'short_caption' => 'Statuses', 'filename' => 'statuses.php', 'name' => 'statuses', 'group_name' => 'Settings', 'add_separator' => false);
    $result[] = array('caption' => 'Status Log', 'short_caption' => 'Status Log', 'filename' => 'status_log.php', 'name' => 'status_log', 'group_name' => 'Manage', 'add_separator' => false);
    $result[] = array('caption' => 'Status Objects', 'short_caption' => 'Status Objects', 'filename' => 'status_objects.php', 'name' => 'status_objects', 'group_name' => 'Settings', 'add_separator' => false);
    $result[] = array('caption' => 'Status Types', 'short_caption' => 'Status Types', 'filename' => 'status_types.php', 'name' => 'status_types', 'group_name' => 'Settings', 'add_separator' => false);
    $result[] = array('caption' => 'Catalog Categories', 'short_caption' => 'Catalog Categories', 'filename' => 'catalog_categories.php', 'name' => 'catalog_categories', 'group_name' => 'Catalogs', 'add_separator' => false);
    $result[] = array('caption' => 'Catalog Products', 'short_caption' => 'Catalog Products', 'filename' => 'catalog_products.php', 'name' => 'catalog_products', 'group_name' => 'Catalogs', 'add_separator' => false);
    $result[] = array('caption' => 'Files', 'short_caption' => 'Files', 'filename' => 'files.php', 'name' => 'files', 'group_name' => 'Sources', 'add_separator' => false);
    $result[] = array('caption' => 'File Types', 'short_caption' => 'File Types', 'filename' => 'file_types.php', 'name' => 'file_types', 'group_name' => 'Settings', 'add_separator' => false);
    $result[] = array('caption' => 'Repositories', 'short_caption' => 'Repositories', 'filename' => 'repositories.php', 'name' => 'repositories', 'group_name' => 'Sources', 'add_separator' => false);
    $result[] = array('caption' => 'Repository Types', 'short_caption' => 'Repository Types', 'filename' => 'repository_types.php', 'name' => 'repository_types', 'group_name' => 'Settings', 'add_separator' => false);
    $result[] = array('caption' => 'Bigcommerce Catalog Categories', 'short_caption' => 'Bigcommerce Catalog Categories', 'filename' => 'bigcommerce_catalog_categories.php', 'name' => 'bigcommerce_catalog_categories', 'group_name' => 'BigCommerce', 'add_separator' => false);
    $result[] = array('caption' => 'Bigcommerce Catalog Products', 'short_caption' => 'Bigcommerce Catalog Products', 'filename' => 'bigcommerce_catalog_products.php', 'name' => 'bigcommerce_catalog_products', 'group_name' => 'BigCommerce', 'add_separator' => false);
    $result[] = array('caption' => 'Category Objects', 'short_caption' => 'Category Objects', 'filename' => 'category_objects.php', 'name' => 'category_objects', 'group_name' => 'Catalogs', 'add_separator' => false);
    $result[] = array('caption' => 'Objects', 'short_caption' => 'Objects', 'filename' => 'objects.php', 'name' => 'objects', 'group_name' => 'Data', 'add_separator' => false);
    $result[] = array('caption' => 'Object Types', 'short_caption' => 'Object Types', 'filename' => 'object_types.php', 'name' => 'object_types', 'group_name' => 'Data', 'add_separator' => false);
    $result[] = array('caption' => 'Object Versions', 'short_caption' => 'Object Versions', 'filename' => 'object_versions.php', 'name' => 'object_versions', 'group_name' => 'Manage', 'add_separator' => false);
    $result[] = array('caption' => 'Product Objects', 'short_caption' => 'Product Objects', 'filename' => 'product_objects.php', 'name' => 'product_objects', 'group_name' => 'Catalogs', 'add_separator' => false);
    $result[] = array('caption' => 'Sku Objects', 'short_caption' => 'Sku Objects', 'filename' => 'sku_objects.php', 'name' => 'sku_objects', 'group_name' => 'Catalogs', 'add_separator' => false);
    $result[] = array('caption' => 'Bigcommerce Catalogs', 'short_caption' => 'Bigcommerce Catalogs', 'filename' => 'bigcommerce_catalogs.php', 'name' => 'bigcommerce_catalogs', 'group_name' => 'BigCommerce', 'add_separator' => false);
    $result[] = array('caption' => 'Assigned User Records', 'short_caption' => 'Assigned User Records', 'filename' => 'assigned_user_records.php', 'name' => 'assigned_user_records', 'group_name' => 'Manage', 'add_separator' => false);
    $result[] = array('caption' => 'Bigcommerce Catalog Progress', 'short_caption' => 'Bigcommerce Catalog Progress', 'filename' => 'bigcommerce_catalog_progress.php', 'name' => 'bigcommerce_catalog_progress', 'group_name' => 'Manage', 'add_separator' => false);
    return $result;
}

function GetPagesHeader()
{
    return
    '';
}

function GetPagesFooter()
{
    return
        ''; 
    }

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(true);
    $page->OnCustomHTMLHeader->AddListener('Global_CustomHTMLHeaderHandler');
    $page->OnGetCustomTemplate->AddListener('Global_GetCustomTemplateHandler');
    $page->OnGetCustomExportOptions->AddListener('Global_OnGetCustomExportOptions');
    $page->getDataset()->OnGetFieldValue->AddListener('Global_OnGetFieldValue');
    $page->getDataset()->OnGetFieldValue->AddListener('OnGetFieldValue', $page);
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
    $grid->AfterUpdateRecord->AddListener('Global_AfterUpdateHandler');
    $grid->AfterDeleteRecord->AddListener('Global_AfterDeleteHandler');
    $grid->AfterInsertRecord->AddListener('Global_AfterInsertHandler');
}

/*
  Default code page: 1252
*/
function GetAnsiEncoding() { return 'windows-1252'; }

function Global_CustomHTMLHeaderHandler($page, &$customHtmlHeaderText)
{

}

function Global_GetCustomTemplateHandler($part, $mode, &$result, &$params, CommonPage $page = null)
{

}

function Global_OnGetCustomExportOptions($page, $exportType, $rowData, &$options)
{

}

function Global_OnGetFieldValue($fieldName, &$value, $tableName)
{

}

function Global_BeforeUpdateHandler($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
{

}

function Global_BeforeDeleteHandler($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
{

}

function Global_BeforeInsertHandler($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
{

}

function Global_AfterUpdateHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function Global_AfterDeleteHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function Global_AfterInsertHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function GetDefaultDateFormat()
{
    return 'm-d-Y';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetEnableLessFilesRunTimeCompilation()
{
    return false;
}

function GetPageListType()
{
    return PageList::TYPE_MENU;
}

function GetNullLabel()
{
    return null;
}



?>