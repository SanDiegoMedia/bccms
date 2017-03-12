<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */


    include_once dirname(__FILE__) . '/' . 'components/utils/check_utils.php';
    CheckPHPVersion();
    CheckTemplatesCacheFolderIsExistsAndWritable();


    include_once dirname(__FILE__) . '/' . 'phpgen_settings.php';
    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page.php';
    include_once dirname(__FILE__) . '/' . 'authorization.php';

    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthorizationStrategy()->ApplyIdentityToConnectionOptions($result);
        return $result;
    }

    
    // OnGlobalBeforePageExecute event handler
    
    
    // OnBeforePageExecute event handler
    
    
    
    class bigcommerce_catalogPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_catalog`');
            $field = new IntegerField('BigCommerce_Catalog_ID', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Product_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Category_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('BC_Product_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('BC_Category_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Source_Catalog_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('Notes');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('Store_ID', 'stores', new IntegerField('Stores_ID'), new StringField('Store_Name', 'Store_ID_Store_Name', 'Store_ID_Store_Name_stores'), 'Store_ID_Store_Name_stores');
            $this->dataset->AddLookupField('Source_Catalog_ID', 'catalogs', new IntegerField('Catalogs_ID', null, null, true), new StringField('Catalog', 'Source_Catalog_ID_Catalog', 'Source_Catalog_ID_Catalog_catalogs'), 'Source_Catalog_ID_Catalog_catalogs');
            $this->dataset->AddLookupField('Product_ID', 'products', new IntegerField('Products_ID', null, null, true), new StringField('Product_Name', 'Product_ID_Product_Name', 'Product_ID_Product_Name_products'), 'Product_ID_Product_Name_products');
            $this->dataset->AddLookupField('Category_ID', 'categories', new IntegerField('Categories_ID', null, null, true), new StringField('Category_Name', 'Category_ID_Category_Name', 'Category_ID_Category_Name_categories'), 'Category_ID_Category_Name_categories');
            $this->dataset->AddLookupField('BC_Product_ID', 'bcapi_products', new StringField('Product_ID'), new StringField('Product_Name', 'BC_Product_ID_Product_Name', 'BC_Product_ID_Product_Name_bcapi_products'), 'BC_Product_ID_Product_Name_bcapi_products');
            $this->dataset->AddLookupField('BC_Category_ID', 'bcapi_categories', new StringField('Cat_Id'), new StringField('Cat_Name', 'BC_Category_ID_Cat_Name', 'BC_Category_ID_Cat_Name_bcapi_categories'), 'BC_Category_ID_Cat_Name_bcapi_categories');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(10);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function CreateGridSearchControl(Grid $grid)
        {
            $grid->UseFilter = true;
            $grid->SearchControl = new SimpleSearch('bigcommerce_catalogssearch', $this->dataset,
                array('BigCommerce_Catalog_ID', 'Store_ID_Store_Name', 'Source_Catalog_ID_Catalog', 'Product_ID_Product_Name', 'Category_ID_Category_Name', 'BC_Product_ID_Product_Name', 'BC_Category_ID_Cat_Name'),
                array($this->RenderText('BigCommerce Catalog ID'), $this->RenderText('Store '), $this->RenderText('Source Catalog'), $this->RenderText('Product'), $this->RenderText('Category'), $this->RenderText('BC Product ID'), $this->RenderText('BC Category ID')),
                array(
                    '=' => $this->GetLocalizerCaptions()->GetMessageString('equals'),
                    '<>' => $this->GetLocalizerCaptions()->GetMessageString('doesNotEquals'),
                    '<' => $this->GetLocalizerCaptions()->GetMessageString('isLessThan'),
                    '<=' => $this->GetLocalizerCaptions()->GetMessageString('isLessThanOrEqualsTo'),
                    '>' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThan'),
                    '>=' => $this->GetLocalizerCaptions()->GetMessageString('isGreaterThanOrEqualsTo'),
                    'ILIKE' => $this->GetLocalizerCaptions()->GetMessageString('Like'),
                    'STARTS' => $this->GetLocalizerCaptions()->GetMessageString('StartsWith'),
                    'ENDS' => $this->GetLocalizerCaptions()->GetMessageString('EndsWith'),
                    'CONTAINS' => $this->GetLocalizerCaptions()->GetMessageString('Contains')
                    ), $this->GetLocalizerCaptions(), $this, 'CONTAINS'
                );
        }
    
        protected function CreateGridAdvancedSearchControl(Grid $grid)
        {
            $this->AdvancedSearchControl = new AdvancedSearchControl('bigcommerce_catalogasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('BigCommerce_Catalog_ID', $this->RenderText('BigCommerce Catalog ID')));
            
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`stores`');
            $field = new IntegerField('Stores_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Store_Hash');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Store_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Staging_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Production_URL');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Store_Name', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Store_ID', $this->RenderText('Store '), $lookupDataset, 'Stores_ID', 'Store_Name', false, 8));
            
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`catalogs`');
            $field = new IntegerField('Catalogs_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Businesses_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Catalog', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Source_Catalog_ID', $this->RenderText('Source Catalog'), $lookupDataset, 'Catalogs_ID', 'Catalog', false, 8));
            
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`products`');
            $field = new IntegerField('Products_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('BC_Product_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Source_Catalog_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Source_Catalog_Code');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Product_Name', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Product_ID', $this->RenderText('Product'), $lookupDataset, 'Products_ID', 'Product_Name', false, 8));
            
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`categories`');
            $field = new IntegerField('Categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Catalog_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Category_ID');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Parent_Category_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Category_Name', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Category_ID', $this->RenderText('Category'), $lookupDataset, 'Categories_ID', 'Category_Name', false, 8));
            
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_products`');
            $field = new IntegerField('bcapi_products_id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Last_Edit');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Editor');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Item_Type');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Type');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Parent_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Manufacturer_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('ACCPAC_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Bin_Picking_Number');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Option_Set');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Option_Set_Align');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat1_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat2_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat3_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog_Category');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Allow_Purchases?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Visible?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Track_Inventory');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Stock');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Low_Stock_Level');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Tax_Class');
            $lookupDataset->AddField($field, false);
            $field = new StringField('List_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cost_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Retail_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Sale_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Fixed_Shipping_Cost');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Free_Shipping');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Condition');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Show_Product_Condition?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_File_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_ID_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Is_Thumbnail');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Original_HTML_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Original_Image_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Index');
            $lookupDataset->AddField($field, false);
            $field = new StringField('PDF_File');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Brand');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog_Page_Number');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Weight');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Width');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Height');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Depth');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Custom_Fields');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF7');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Product_Name', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('BC_Product_ID', $this->RenderText('BC Product ID'), $lookupDataset, 'Product_ID', 'Product_Name', false, 8));
            
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_categories`');
            $field = new IntegerField('bcapi_categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Cat_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat_Id');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Parent_Id');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url_CLEANED');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_8');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW8');
            $lookupDataset->AddField($field, false);
            $field = new StringField('All_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Views');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Sort_Order');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Keywords_0');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description_No_HTML');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Layout_File');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Image_Url');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Is_Visible');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Default_Product_Sort');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Is_Customized');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Cat_Name', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('BC_Category_ID', $this->RenderText('BC Category ID'), $lookupDataset, 'Cat_Id', 'Cat_Name', false, 8));
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_RIGHT);
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $operation->SetAdditionalAttribute('data-modal-operation', 'delete');
                $operation->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for BigCommerce_Catalog_ID field
            //
            $column = new TextViewColumn('BigCommerce_Catalog_ID', 'BigCommerce Catalog ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store ', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('100px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('100px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_ID_Product_Name', 'Product', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('100px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Category_ID_Category_Name', 'Category', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('200px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('BC_Product_ID_Product_Name', 'BC Product ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('BC_Category_ID_Cat_Name', 'BC Category ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for BigCommerce_Catalog_ID field
            //
            $column = new TextViewColumn('BigCommerce_Catalog_ID', 'BigCommerce Catalog ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store ', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_ID_Product_Name', 'Product', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Category_ID_Category_Name', 'Category', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('BC_Product_ID_Product_Name', 'BC Product ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('BC_Category_ID_Cat_Name', 'BC Category ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Notes field
            //
            $column = new TextViewColumn('Notes', 'Notes', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bigcommerce_catalogGrid_Notes_handler_view');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for Store_ID field
            //
            $editor = new ComboBox('store_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`stores`');
            $field = new IntegerField('Stores_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Store_Hash');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Store_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Staging_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Production_URL');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Store_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Store ', 
                'Store_ID', 
                $editor, 
                $this->dataset, 'Stores_ID', 'Store_Name', $lookupDataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new NumberValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('NumberValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Source_Catalog_ID field
            //
            $editor = new ComboBox('source_catalog_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`catalogs`');
            $field = new IntegerField('Catalogs_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Businesses_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Catalog', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Source Catalog', 
                'Source_Catalog_ID', 
                $editor, 
                $this->dataset, 'Catalogs_ID', 'Catalog', $lookupDataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_ID field
            //
            $editor = new AutocomleteComboBox('product_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`products`');
            $field = new IntegerField('Products_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('BC_Product_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Source_Catalog_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Source_Catalog_Code');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Product_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Product', 'Product_ID', 'Product_ID_Product_Name', 'edit_Product_ID_Product_Name_search', $editor, $this->dataset, $lookupDataset, 'Products_ID', 'Product_Name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Category_ID field
            //
            $editor = new AutocomleteComboBox('category_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`categories`');
            $field = new IntegerField('Categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Catalog_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Category_ID');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Parent_Category_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Category_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Category', 'Category_ID', 'Category_ID_Category_Name', 'edit_Category_ID_Category_Name_search', $editor, $this->dataset, $lookupDataset, 'Categories_ID', 'Category_Name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for BC_Product_ID field
            //
            $editor = new AutocomleteComboBox('bc_product_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_products`');
            $field = new IntegerField('bcapi_products_id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Last_Edit');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Editor');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Item_Type');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Type');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Parent_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Manufacturer_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('ACCPAC_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Bin_Picking_Number');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Option_Set');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Option_Set_Align');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat1_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat2_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat3_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog_Category');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Allow_Purchases?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Visible?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Track_Inventory');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Stock');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Low_Stock_Level');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Tax_Class');
            $lookupDataset->AddField($field, false);
            $field = new StringField('List_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cost_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Retail_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Sale_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Fixed_Shipping_Cost');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Free_Shipping');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Condition');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Show_Product_Condition?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_File_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_ID_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Is_Thumbnail');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Original_HTML_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Original_Image_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Index');
            $lookupDataset->AddField($field, false);
            $field = new StringField('PDF_File');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Brand');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog_Page_Number');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Weight');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Width');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Height');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Depth');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Custom_Fields');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF7');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Product_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('BC Product ID', 'BC_Product_ID', 'BC_Product_ID_Product_Name', 'edit_BC_Product_ID_Product_Name_search', $editor, $this->dataset, $lookupDataset, 'Product_ID', 'Product_Name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for BC_Category_ID field
            //
            $editor = new AutocomleteComboBox('bc_category_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_categories`');
            $field = new IntegerField('bcapi_categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Cat_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat_Id');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Parent_Id');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url_CLEANED');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_8');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW8');
            $lookupDataset->AddField($field, false);
            $field = new StringField('All_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Views');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Sort_Order');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Keywords_0');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description_No_HTML');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Layout_File');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Image_Url');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Is_Visible');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Default_Product_Sort');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Is_Customized');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Cat_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('BC Category ID', 'BC_Category_ID', 'BC_Category_ID_Cat_Name', 'edit_BC_Category_ID_Cat_Name_search', $editor, $this->dataset, $lookupDataset, 'Cat_Id', 'Cat_Name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Notes field
            //
            $editor = new HtmlWysiwygEditor('notes_edit');
            $editColumn = new CustomEditColumn('Notes', 'Notes', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $validator = new MaxLengthValidator(4000, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MaxlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MinLengthValidator(0, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MinlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for Store_ID field
            //
            $editor = new ComboBox('store_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`stores`');
            $field = new IntegerField('Stores_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Store_Hash');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Store_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Staging_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Production_URL');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Store_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Store ', 
                'Store_ID', 
                $editor, 
                $this->dataset, 'Stores_ID', 'Store_Name', $lookupDataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new NumberValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('NumberValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Source_Catalog_ID field
            //
            $editor = new ComboBox('source_catalog_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`catalogs`');
            $field = new IntegerField('Catalogs_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Businesses_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Catalog', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                'Source Catalog', 
                'Source_Catalog_ID', 
                $editor, 
                $this->dataset, 'Catalogs_ID', 'Catalog', $lookupDataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_ID field
            //
            $editor = new AutocomleteComboBox('product_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`products`');
            $field = new IntegerField('Products_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('BC_Product_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Source_Catalog_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Source_Catalog_Code');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Product_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Product', 'Product_ID', 'Product_ID_Product_Name', 'insert_Product_ID_Product_Name_search', $editor, $this->dataset, $lookupDataset, 'Products_ID', 'Product_Name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Category_ID field
            //
            $editor = new AutocomleteComboBox('category_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`categories`');
            $field = new IntegerField('Categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Catalog_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Category_ID');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Parent_Category_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Category_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Category', 'Category_ID', 'Category_ID_Category_Name', 'insert_Category_ID_Category_Name_search', $editor, $this->dataset, $lookupDataset, 'Categories_ID', 'Category_Name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for BC_Product_ID field
            //
            $editor = new AutocomleteComboBox('bc_product_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_products`');
            $field = new IntegerField('bcapi_products_id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Last_Edit');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Editor');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Item_Type');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Type');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Parent_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Manufacturer_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('ACCPAC_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Bin_Picking_Number');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Option_Set');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Option_Set_Align');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat1_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat2_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat3_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog_Category');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Allow_Purchases?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Visible?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Track_Inventory');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Stock');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Low_Stock_Level');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Tax_Class');
            $lookupDataset->AddField($field, false);
            $field = new StringField('List_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cost_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Retail_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Sale_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Fixed_Shipping_Cost');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Free_Shipping');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Condition');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Show_Product_Condition?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_File_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_ID_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Is_Thumbnail');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Original_HTML_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Original_Image_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Index');
            $lookupDataset->AddField($field, false);
            $field = new StringField('PDF_File');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Brand');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog_Page_Number');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Weight');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Width');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Height');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Depth');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Custom_Fields');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF7');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Product_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('BC Product ID', 'BC_Product_ID', 'BC_Product_ID_Product_Name', 'insert_BC_Product_ID_Product_Name_search', $editor, $this->dataset, $lookupDataset, 'Product_ID', 'Product_Name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for BC_Category_ID field
            //
            $editor = new AutocomleteComboBox('bc_category_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_categories`');
            $field = new IntegerField('bcapi_categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Cat_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat_Id');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Parent_Id');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url_CLEANED');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_8');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW8');
            $lookupDataset->AddField($field, false);
            $field = new StringField('All_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Views');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Sort_Order');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Keywords_0');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description_No_HTML');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Layout_File');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Image_Url');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Is_Visible');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Default_Product_Sort');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Is_Customized');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Cat_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('BC Category ID', 'BC_Category_ID', 'BC_Category_ID_Cat_Name', 'insert_BC_Category_ID_Cat_Name_search', $editor, $this->dataset, $lookupDataset, 'Cat_Id', 'Cat_Name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Notes field
            //
            $editor = new HtmlWysiwygEditor('notes_edit');
            $editColumn = new CustomEditColumn('Notes', 'Notes', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $validator = new MaxLengthValidator(4000, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MaxlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MinLengthValidator(0, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MinlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $grid->SetShowAddButton(true);
                $grid->SetShowInlineAddButton(false);
            }
            else
            {
                $grid->SetShowInlineAddButton(false);
                $grid->SetShowAddButton(false);
            }
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for BigCommerce_Catalog_ID field
            //
            $column = new TextViewColumn('BigCommerce_Catalog_ID', 'BigCommerce Catalog ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store ', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_ID_Product_Name', 'Product', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Category_ID_Category_Name', 'Category', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('BC_Product_ID_Product_Name', 'BC Product ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('BC_Category_ID_Cat_Name', 'BC Category ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Notes field
            //
            $column = new TextViewColumn('Notes', 'Notes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for BigCommerce_Catalog_ID field
            //
            $column = new TextViewColumn('BigCommerce_Catalog_ID', 'BigCommerce Catalog ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store ', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_ID_Product_Name', 'Product', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Category_ID_Category_Name', 'Category', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('BC_Product_ID_Product_Name', 'BC Product ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('BC_Category_ID_Cat_Name', 'BC Category ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Notes field
            //
            $column = new TextViewColumn('Notes', 'Notes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        public function ShowEditButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasEditGrant($this->GetDataset());
        }
        
        public function ShowDeleteButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasDeleteGrant($this->GetDataset());
        }
        
        public function GetModalGridDeleteHandler() { return 'bigcommerce_catalog_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'bigcommerce_catalogGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(true);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setTableBordered(true);
            $result->setTableCondensed(true);
            
            $result->SetHighlightRowAtHover(true);
            $result->SetWidth('');
            $this->CreateGridSearchControl($result);
            $this->CreateGridAdvancedSearchControl($result);
    
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddOperationsColumns($result);
            $this->SetShowPageList(true);
            $this->SetSimpleSearchAvailable(true);
            $this->SetAdvancedSearchAvailable(true);
            $this->SetShowTopPageNavigator(false);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(true);
            $this->setPrintOneRecordAvailable(true);
            $this->setExportListAvailable(array('excel','xml','csv'));
            $this->setExportListRecordAvailable(array('xml','csv'));
            $this->setExportOneRecordAvailable(array('excel','xml','csv'));
    
            //
            // Http Handlers
            //
            //
            // View column for Notes field
            //
            $column = new TextViewColumn('Notes', 'Notes', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bigcommerce_catalogGrid_Notes_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`products`');
            $field = new IntegerField('Products_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('BC_Product_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Source_Catalog_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Source_Catalog_Code');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Product_Name', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Product_ID_Product_Name_search', 'Products_ID', 'Product_Name', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`categories`');
            $field = new IntegerField('Categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Catalog_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Category_ID');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Parent_Category_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Category_Name', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Category_ID_Category_Name_search', 'Categories_ID', 'Category_Name', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_products`');
            $field = new IntegerField('bcapi_products_id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Last_Edit');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Editor');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Item_Type');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Type');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Parent_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Manufacturer_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('ACCPAC_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Bin_Picking_Number');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Option_Set');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Option_Set_Align');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat1_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat2_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat3_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog_Category');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Allow_Purchases?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Visible?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Track_Inventory');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Stock');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Low_Stock_Level');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Tax_Class');
            $lookupDataset->AddField($field, false);
            $field = new StringField('List_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cost_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Retail_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Sale_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Fixed_Shipping_Cost');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Free_Shipping');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Condition');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Show_Product_Condition?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_File_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_ID_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Is_Thumbnail');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Original_HTML_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Original_Image_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Index');
            $lookupDataset->AddField($field, false);
            $field = new StringField('PDF_File');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Brand');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog_Page_Number');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Weight');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Width');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Height');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Depth');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Custom_Fields');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF7');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Product_Name', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_BC_Product_ID_Product_Name_search', 'Product_ID', 'Product_Name', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_categories`');
            $field = new IntegerField('bcapi_categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Cat_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat_Id');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Parent_Id');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url_CLEANED');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_8');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW8');
            $lookupDataset->AddField($field, false);
            $field = new StringField('All_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Views');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Sort_Order');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Keywords_0');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description_No_HTML');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Layout_File');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Image_Url');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Is_Visible');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Default_Product_Sort');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Is_Customized');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Cat_Name', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_BC_Category_ID_Cat_Name_search', 'Cat_Id', 'Cat_Name', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`products`');
            $field = new IntegerField('Products_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('BC_Product_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Source_Catalog_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Source_Catalog_Code');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Product_Name', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Product_ID_Product_Name_search', 'Products_ID', 'Product_Name', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`categories`');
            $field = new IntegerField('Categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Catalog_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Category_ID');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Parent_Category_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Category_Name', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Category_ID_Category_Name_search', 'Categories_ID', 'Category_Name', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_products`');
            $field = new IntegerField('bcapi_products_id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Last_Edit');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Editor');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Item_Type');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Type');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Parent_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('SKU7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Manufacturer_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('ACCPAC_SKU');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Bin_Picking_Number');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Option_Set');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Option_Set_Align');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat1_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat2_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat3_ID');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog_Category');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Allow_Purchases?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Visible?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Track_Inventory');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Stock');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Low_Stock_Level');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Tax_Class');
            $lookupDataset->AddField($field, false);
            $field = new StringField('List_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cost_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Retail_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Sale_Price');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Fixed_Shipping_Cost');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Free_Shipping');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Condition');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Show_Product_Condition?');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_File_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_ID_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Is_Thumbnail');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Original_HTML_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Original_Image_Path');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Image_Index');
            $lookupDataset->AddField($field, false);
            $field = new StringField('PDF_File');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Brand');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Catalog_Page_Number');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Weight');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Width');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Height');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Depth');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_URL');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Product_Custom_Fields');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('CF7');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Product_Name', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_BC_Product_ID_Product_Name_search', 'Product_ID', 'Product_Name', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_categories`');
            $field = new IntegerField('bcapi_categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Cat_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Cat_Id');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Parent_Id');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url_CLEANED');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_8');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_1');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_2');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_3');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_4');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW_5');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW6');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW7');
            $lookupDataset->AddField($field, false);
            $field = new StringField('KW8');
            $lookupDataset->AddField($field, false);
            $field = new StringField('All_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Views');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Sort_Order');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Keywords_0');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Description_No_HTML');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Layout_File');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Image_Url');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Is_Visible');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Default_Product_Sort');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Custom_Url_Is_Customized');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Cat_Name', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_BC_Category_ID_Cat_Name_search', 'Cat_Id', 'Cat_Name', null);
            GetApplication()->RegisterHTTPHandler($handler);
            return $result;
        }
        
        public function OpenAdvancedSearchByDefault()
        {
            return false;
        }
    
        protected function DoGetGridHeader()
        {
            return '';
        }
    }

    SetUpUserAuthorization(GetApplication());

    try
    {
        $Page = new bigcommerce_catalogPage("bigcommerce_catalog.php", "bigcommerce_catalog", GetCurrentUserGrantForDataSource("bigcommerce_catalog"), 'UTF-8');
        $Page->SetTitle('Bigcommerce Catalog');
        $Page->SetMenuLabel('Bigcommerce Catalog');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("bigcommerce_catalog"));
        GetApplication()->SetEnableLessRunTimeCompile(GetEnableLessFilesRunTimeCompilation());
        GetApplication()->SetCanUserChangeOwnPassword(
            !function_exists('CanUserChangeOwnPassword') || CanUserChangeOwnPassword());
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e->getMessage());
    }
	
