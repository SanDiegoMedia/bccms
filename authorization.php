<?php

require_once 'phpgen_settings.php';
require_once 'components/security/security_info.php';
require_once 'components/security/datasource_security_info.php';
require_once 'components/security/tablebased_auth.php';
require_once 'components/security/user_grants_manager.php';
require_once 'components/security/table_based_user_grants_manager.php';

include_once 'components/security/user_identity_storage/user_identity_session_storage.php';

require_once 'database_engine/mysql_engine.php';

$grants = array();

$appGrants = array();

$dataSourceRecordPermissions = array();

$tableCaptions = array('stores' => 'Stores',
'store_users' => 'Store Users',
'store_users.contacts' => 'Store Users.Contacts',
'store_users.activity_log' => 'Store Users.Activity Log',
'businesses' => 'Businesses',
'bigcommerce_catalog' => 'Bigcommerce Catalog',
'bcapi_products' => 'Bcapi Products',
'bcapi_categories' => 'Bcapi Categories',
'skus' => 'Skus',
'catalogs' => 'Catalogs',
'catalogs.businesses' => 'Catalogs.Businesses',
'categories' => 'Categories',
'products' => 'Products',
'meta_data' => 'Meta Data',
'contacts' => 'Contacts',
'activity_log' => 'Activity Log',
'activities' => 'Activities',
'statuses' => 'Statuses',
'status_log' => 'Status Log',
'status_objects' => 'Status Objects',
'status_types' => 'Status Types',
'catalog_categories' => 'Catalog Categories',
'catalog_products' => 'Catalog Products',
'files' => 'Files',
'file_types' => 'File Types',
'repositories' => 'Repositories',
'repository_types' => 'Repository Types',
'bigcommerce_catalog_categories' => 'Bigcommerce Catalog Categories',
'bigcommerce_catalog_products' => 'Bigcommerce Catalog Products',
'category_objects' => 'Category Objects',
'objects' => 'Objects',
'object_types' => 'Object Types',
'object_versions' => 'Object Versions',
'product_objects' => 'Product Objects',
'sku_objects' => 'Sku Objects',
'bigcommerce_catalogs' => 'Bigcommerce Catalogs',
'assigned_user_records' => 'Assigned User Records',
'bigcommerce_catalog_progress' => 'Bigcommerce Catalog Progress');

function CreateTableBasedGrantsManager()
{
    global $tableCaptions;
    $usersTable = array('TableName' => 'phpgen_users', 'UserName' => 'user_name', 'UserId' => 'user_id', 'Password' => 'user_password');
    $userPermsTable = array('TableName' => 'phpgen_user_perms', 'UserId' => 'user_id', 'PageName' => 'page_name', 'Grant' => 'perm_name');

    $passwordHasher = HashUtils::CreateHasher('');
    $connectionOptions = GetGlobalConnectionOptions();
    $tableBasedGrantsManager = new TableBasedUserGrantsManager(new MySqlIConnectionFactory(), $connectionOptions,
        $usersTable, $userPermsTable, $tableCaptions, $passwordHasher, true);
    return $tableBasedGrantsManager;
}

function SetUpUserAuthorization()
{
    global $grants;
    global $appGrants;
    global $dataSourceRecordPermissions;
    $hardCodedGrantsManager = new HardCodedUserGrantsManager($grants, $appGrants);
    $tableBasedGrantsManager = CreateTableBasedGrantsManager();
    $grantsManager = new CompositeGrantsManager();
    $grantsManager->AddGrantsManager($hardCodedGrantsManager);
    if (!is_null($tableBasedGrantsManager)) {
        $grantsManager->AddGrantsManager($tableBasedGrantsManager);
        GetApplication()->SetUserManager($tableBasedGrantsManager);
    }
    $userAuthorizationStrategy = new TableBasedUserAuthorization(new UserIdentitySessionStorage(GetIdentityCheckStrategy()), new MySqlIConnectionFactory(), GetGlobalConnectionOptions(), 'phpgen_users', 'user_name', 'user_id', $grantsManager);
    GetApplication()->SetUserAuthorizationStrategy($userAuthorizationStrategy);

    GetApplication()->SetDataSourceRecordPermissionRetrieveStrategy(
        new HardCodedDataSourceRecordPermissionRetrieveStrategy($dataSourceRecordPermissions));
}

function GetIdentityCheckStrategy()
{
    return new TableBasedIdentityCheckStrategy(new MySqlIConnectionFactory(), GetGlobalConnectionOptions(), 'phpgen_users', 'user_name', 'user_password', '');
}

function CanUserChangeOwnPassword()
{
    return true;
}

?>