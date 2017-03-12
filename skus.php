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
    
    
    
    class skusPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`skus`');
            $field = new IntegerField('SKUs_ID', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Source_Catalog_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Catalog_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('SKU');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('Store_ID', 'stores', new IntegerField('Stores_ID'), new StringField('Store_Name', 'Store_ID_Store_Name', 'Store_ID_Store_Name_stores'), 'Store_ID_Store_Name_stores');
            $this->dataset->AddLookupField('Catalog_ID', 'catalogs', new IntegerField('Catalogs_ID', null, null, true), new StringField('Catalog', 'Catalog_ID_Catalog', 'Catalog_ID_Catalog_catalogs'), 'Catalog_ID_Catalog_catalogs');
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
            $grid->SearchControl = new SimpleSearch('skusssearch', $this->dataset,
                array('SKUs_ID', 'SKU', 'Store_ID_Store_Name', 'Catalog_ID_Catalog', 'Source_Catalog_ID_Catalog', 'Record_Created', 'Record_Updated'),
                array($this->RenderText('SKUs ID'), $this->RenderText('SKU'), $this->RenderText('Store ID'), $this->RenderText('Catalog ID'), $this->RenderText('Source Catalog'), $this->RenderText('Record Created'), $this->RenderText('Record Updated')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('skusasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('SKUs_ID', $this->RenderText('SKUs ID')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('SKU', $this->RenderText('SKU')));
            
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Store_ID', $this->RenderText('Store ID'), $lookupDataset, 'Stores_ID', 'Store_Name', false, 8));
            
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Catalog_ID', $this->RenderText('Catalog ID'), $lookupDataset, 'Catalogs_ID', 'Catalog', false, 8));
            
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('Record_Created', $this->RenderText('Record Created'), 'm-d-Y H:i:s'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('Record_Updated', $this->RenderText('Record Updated'), 'm-d-Y H:i:s'));
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
            // View column for SKUs_ID field
            //
            $column = new TextViewColumn('SKUs_ID', 'SKUs ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for SKU field
            //
            $column = new TextViewColumn('SKU', 'SKU', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('skusGrid_SKU_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('100px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog_ID_Catalog', 'Catalog ID', $this->dataset);
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
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for SKUs_ID field
            //
            $column = new TextViewColumn('SKUs_ID', 'SKUs ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SKU field
            //
            $column = new TextViewColumn('SKU', 'SKU', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('skusGrid_SKU_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog_ID_Catalog', 'Catalog ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
            $column->SetOrderable(true);
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
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for SKU field
            //
            $editor = new TextEdit('sku_edit');
            $editColumn = new CustomEditColumn('SKU', 'SKU', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
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
                'Store ID', 
                'Store_ID', 
                $editor, 
                $this->dataset, 'Stores_ID', 'Store_Name', $lookupDataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Catalog_ID field
            //
            $editor = new AutocomleteComboBox('catalog_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
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
            $editColumn = new DynamicLookupEditColumn('Catalog ID', 'Catalog_ID', 'Catalog_ID_Catalog', 'edit_Catalog_ID_Catalog_search', $editor, $this->dataset, $lookupDataset, 'Catalogs_ID', 'Catalog', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Source_Catalog_ID field
            //
            $editor = new AutocomleteComboBox('source_catalog_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
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
            $editColumn = new DynamicLookupEditColumn('Source Catalog', 'Source_Catalog_ID', 'Source_Catalog_ID_Catalog', 'edit_Source_Catalog_ID_Catalog_search', $editor, $this->dataset, $lookupDataset, 'Catalogs_ID', 'Catalog', '');
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
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for SKU field
            //
            $editor = new AutocomleteComboBox('sku_edit', $this->CreateLinkBuilder());
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
            $lookupDataset->setOrderByField('Product_SKU', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('SKU', 'SKU', 'SKU', 'insert_SKU_Product_SKU_search', $editor, $this->dataset, $lookupDataset, 'Product_ID', 'Product_SKU', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
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
                'Store ID', 
                'Store_ID', 
                $editor, 
                $this->dataset, 'Stores_ID', 'Store_Name', $lookupDataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Catalog_ID field
            //
            $editor = new AutocomleteComboBox('catalog_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
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
            $editColumn = new DynamicLookupEditColumn('Catalog ID', 'Catalog_ID', 'Catalog_ID_Catalog', 'insert_Catalog_ID_Catalog_search', $editor, $this->dataset, $lookupDataset, 'Catalogs_ID', 'Catalog', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Source_Catalog_ID field
            //
            $editor = new AutocomleteComboBox('source_catalog_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
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
            $editColumn = new DynamicLookupEditColumn('Source Catalog', 'Source_Catalog_ID', 'Source_Catalog_ID_Catalog', 'insert_Source_Catalog_ID_Catalog_search', $editor, $this->dataset, $lookupDataset, 'Catalogs_ID', 'Catalog', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
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
            // View column for SKUs_ID field
            //
            $column = new TextViewColumn('SKUs_ID', 'SKUs ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SKU field
            //
            $column = new TextViewColumn('SKU', 'SKU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog_ID_Catalog', 'Catalog ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
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
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for SKUs_ID field
            //
            $column = new TextViewColumn('SKUs_ID', 'SKUs ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SKU field
            //
            $column = new TextViewColumn('SKU', 'SKU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog_ID_Catalog', 'Catalog ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Source_Catalog_ID_Catalog', 'Source Catalog', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'skus_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'skusGrid');
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
            $this->SetViewFormTitle($this->RenderText('%SKU%'));
            $this->SetEditFormTitle($this->RenderText('%SKU%'));
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
            // View column for SKU field
            //
            $column = new TextViewColumn('SKU', 'SKU', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'skusGrid_SKU_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for SKU field
            //
            $column = new TextViewColumn('SKU', 'SKU', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'skusGrid_SKU_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
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
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Catalog_ID_Catalog_search', 'Catalogs_ID', 'Catalog', null);
            GetApplication()->RegisterHTTPHandler($handler);
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
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Source_Catalog_ID_Catalog_search', 'Catalogs_ID', 'Catalog', null);
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
            $lookupDataset->setOrderByField('Product_SKU', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_SKU_Product_SKU_search', 'Product_ID', 'Product_SKU', null);
            GetApplication()->RegisterHTTPHandler($handler);
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
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Catalog_ID_Catalog_search', 'Catalogs_ID', 'Catalog', null);
            GetApplication()->RegisterHTTPHandler($handler);
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
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Source_Catalog_ID_Catalog_search', 'Catalogs_ID', 'Catalog', null);
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
        $Page = new skusPage("skus.php", "skus", GetCurrentUserGrantForDataSource("skus"), 'UTF-8');
        $Page->SetTitle('Skus');
        $Page->SetMenuLabel('Skus');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("skus"));
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
	
