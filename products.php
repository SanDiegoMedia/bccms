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
    
    
    
    class productsPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`products`');
            $field = new IntegerField('Products_ID', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('BC_Product_ID');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Source_Catalog_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('Source_Catalog_Code');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('BC_Product_ID', 'bcapi_products', new StringField('Product_ID'), new StringField('Product_ID', 'BC_Product_ID_Product_ID', 'BC_Product_ID_Product_ID_bcapi_products'), 'BC_Product_ID_Product_ID_bcapi_products');
            $this->dataset->AddLookupField('Source_Catalog_ID', 'catalogs', new IntegerField('Catalogs_ID', null, null, true), new StringField('Catalog', 'Source_Catalog_ID_Catalog', 'Source_Catalog_ID_Catalog_catalogs'), 'Source_Catalog_ID_Catalog_catalogs');
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
            $grid->SearchControl = new SimpleSearch('productsssearch', $this->dataset,
                array('Products_ID', 'BC_Product_ID_Product_ID', 'Product_Name', 'Record_Created', 'Record_Updated', 'Source_Catalog_ID_Catalog', 'Source_Catalog_Code'),
                array($this->RenderText('Products ID'), $this->RenderText('BC ID'), $this->RenderText('Product Name'), $this->RenderText('Record Created'), $this->RenderText('Record Updated'), $this->RenderText('Source Catalog'), $this->RenderText('Source Catalog Code')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('productsasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Products_ID', $this->RenderText('Products ID')));
            
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
            $lookupDataset->setOrderByField('Product_ID', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('BC_Product_ID', $this->RenderText('BC ID'), $lookupDataset, 'Product_ID', 'Product_ID', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Name', $this->RenderText('Product Name')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('Record_Created', $this->RenderText('Record Created'), 'm-d-Y H:i:s'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('Record_Updated', $this->RenderText('Record Updated'), 'm-d-Y H:i:s'));
            
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Source_Catalog_Code', $this->RenderText('Source Catalog Code')));
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
            // View column for Products_ID field
            //
            $column = new TextViewColumn('Products_ID', 'Products ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_ID field
            //
            $column = new TextViewColumn('BC_Product_ID_Product_ID', 'BC ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('10px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('productsGrid_Product_Name_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('250px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Record_Created field
            //
            $column = new DateTimeViewColumn('Record_Created', 'Record Created', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Record_Updated field
            //
            $column = new DateTimeViewColumn('Record_Updated', 'Record Updated', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Source_Catalog_Code field
            //
            $column = new TextViewColumn('Source_Catalog_Code', 'Source Catalog Code', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('productsGrid_Source_Catalog_Code_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('100px');
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for Products_ID field
            //
            $column = new TextViewColumn('Products_ID', 'Products ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_ID field
            //
            $column = new TextViewColumn('BC_Product_ID_Product_ID', 'BC ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('productsGrid_Product_Name_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Record_Created field
            //
            $column = new DateTimeViewColumn('Record_Created', 'Record Created', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Record_Updated field
            //
            $column = new DateTimeViewColumn('Record_Updated', 'Record Updated', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Source_Catalog_Code field
            //
            $column = new TextViewColumn('Source_Catalog_Code', 'Source Catalog Code', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('productsGrid_Source_Catalog_Code_handler_view');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
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
            $lookupDataset->setOrderByField('Product_ID', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('BC ID', 'BC_Product_ID', 'BC_Product_ID_Product_ID', 'edit_BC_Product_ID_Product_ID_search', $editor, $this->dataset, $lookupDataset, 'Product_ID', 'Product_ID', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new NumberValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('NumberValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Name field
            //
            $editor = new TextEdit('product_name_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Product Name', 'Product_Name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MaxLengthValidator(500, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MaxlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MinLengthValidator(1, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MinlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Record_Created field
            //
            $editor = new DateTimeEdit('record_created_edit', false, 'm-d-Y H:i:s');
            $editColumn = new CustomEditColumn('Record Created', 'Record_Created', $editor, $this->dataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Record_Updated field
            //
            $editor = new DateTimeEdit('record_updated_edit', false, 'm-d-Y H:i:s');
            $editColumn = new CustomEditColumn('Record Updated', 'Record_Updated', $editor, $this->dataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
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
            // Edit column for Source_Catalog_Code field
            //
            $editor = new TextEdit('source_catalog_code_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Source Catalog Code', 'Source_Catalog_Code', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
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
            $lookupDataset->setOrderByField('Product_ID', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('BC ID', 'BC_Product_ID', 'BC_Product_ID_Product_ID', 'insert_BC_Product_ID_Product_ID_search', $editor, $this->dataset, $lookupDataset, 'Product_ID', 'Product_ID', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new NumberValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('NumberValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Name field
            //
            $editor = new TextEdit('product_name_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Product Name', 'Product_Name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MaxLengthValidator(500, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MaxlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MinLengthValidator(1, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MinlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Record_Created field
            //
            $editor = new DateTimeEdit('record_created_edit', false, 'm-d-Y H:i:s');
            $editColumn = new CustomEditColumn('Record Created', 'Record_Created', $editor, $this->dataset);
            $editColumn->SetAllowSetToDefault(true);
            $editColumn->SetInsertDefaultValue($this->RenderText('%CURRENT_DATETIME%'));
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Record_Updated field
            //
            $editor = new DateTimeEdit('record_updated_edit', false, 'm-d-Y H:i:s');
            $editColumn = new CustomEditColumn('Record Updated', 'Record_Updated', $editor, $this->dataset);
            $editColumn->SetAllowSetToDefault(true);
            $editColumn->SetInsertDefaultValue($this->RenderText('%CURRENT_DATETIME%'));
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
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
            // Edit column for Source_Catalog_Code field
            //
            $editor = new TextEdit('source_catalog_code_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Source Catalog Code', 'Source_Catalog_Code', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
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
            // View column for Products_ID field
            //
            $column = new TextViewColumn('Products_ID', 'Products ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_ID field
            //
            $column = new TextViewColumn('BC_Product_ID_Product_ID', 'BC ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Record_Created field
            //
            $column = new DateTimeViewColumn('Record_Created', 'Record Created', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Record_Updated field
            //
            $column = new DateTimeViewColumn('Record_Updated', 'Record Updated', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Source_Catalog_Code field
            //
            $column = new TextViewColumn('Source_Catalog_Code', 'Source Catalog Code', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for Products_ID field
            //
            $column = new TextViewColumn('Products_ID', 'Products ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_ID field
            //
            $column = new TextViewColumn('BC_Product_ID_Product_ID', 'BC ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Record_Created field
            //
            $column = new DateTimeViewColumn('Record_Created', 'Record Created', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Record_Updated field
            //
            $column = new DateTimeViewColumn('Record_Updated', 'Record Updated', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Source_Catalog_Code field
            //
            $column = new TextViewColumn('Source_Catalog_Code', 'Source Catalog Code', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'products_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'productsGrid');
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
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'productsGrid_Product_Name_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Source_Catalog_Code field
            //
            $column = new TextViewColumn('Source_Catalog_Code', 'Source Catalog Code', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'productsGrid_Source_Catalog_Code_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'productsGrid_Product_Name_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Source_Catalog_Code field
            //
            $column = new TextViewColumn('Source_Catalog_Code', 'Source Catalog Code', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'productsGrid_Source_Catalog_Code_handler_view', $column);
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
            $lookupDataset->setOrderByField('Product_ID', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_BC_Product_ID_Product_ID_search', 'Product_ID', 'Product_ID', null);
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
            $lookupDataset->setOrderByField('Product_ID', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_BC_Product_ID_Product_ID_search', 'Product_ID', 'Product_ID', null);
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
        $Page = new productsPage("products.php", "products", GetCurrentUserGrantForDataSource("products"), 'UTF-8');
        $Page->SetTitle('Products');
        $Page->SetMenuLabel('Products');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("products"));
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
	
