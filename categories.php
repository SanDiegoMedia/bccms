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
    
    
    
    class categoriesPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`categories`');
            $field = new IntegerField('Categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Catalog_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Category_ID');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Parent_Category_ID');
            $this->dataset->AddField($field, false);
            $field = new StringField('Category_Name');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('Record_Created');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('Record_Updated');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('Store_ID', 'stores', new IntegerField('Stores_ID'), new StringField('Store_Name', 'Store_ID_Store_Name', 'Store_ID_Store_Name_stores'), 'Store_ID_Store_Name_stores');
            $this->dataset->AddLookupField('Parent_Category_ID', 'categories', new IntegerField('Category_ID'), new StringField('Category_Name', 'Parent_Category_ID_Category_Name', 'Parent_Category_ID_Category_Name_categories'), 'Parent_Category_ID_Category_Name_categories');
            $this->dataset->AddLookupField('Catalog_ID', 'catalogs', new IntegerField('Catalogs_ID', null, null, true), new StringField('Catalog', 'Catalog_ID_Catalog', 'Catalog_ID_Catalog_catalogs'), 'Catalog_ID_Catalog_catalogs');
            $this->dataset->AddLookupField('Category_Path', 'bcapi_categories', new StringField('Cat_Id'), new StringField('Cat_Name', 'Category_Path_Cat_Name', 'Category_Path_Cat_Name_bcapi_categories'), 'Category_Path_Cat_Name_bcapi_categories');
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
            $grid->SearchControl = new SimpleSearch('categoriesssearch', $this->dataset,
                array('Categories_ID', 'Store_ID_Store_Name', 'Category_ID', 'Parent_Category_ID_Category_Name', 'Record_Created', 'Record_Updated', 'Category_Name', 'Category_Path_Cat_Name', 'Catalog_ID_Catalog'),
                array($this->RenderText('Categories ID'), $this->RenderText('Store'), $this->RenderText('Category ID'), $this->RenderText('Parent Category ID'), $this->RenderText('Record Created'), $this->RenderText('Record Updated'), $this->RenderText('Category Name'), $this->RenderText('Category Path'), $this->RenderText('Catalog ID')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('categoriesasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Categories_ID', $this->RenderText('Categories ID')));
            
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Store_ID', $this->RenderText('Store'), $lookupDataset, 'Stores_ID', 'Store_Name', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Category_ID', $this->RenderText('Category ID')));
            
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Parent_Category_ID', $this->RenderText('Parent Category ID'), $lookupDataset, 'Category_ID', 'Category_Name', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('Record_Created', $this->RenderText('Record Created'), 'm-d-Y H:i:s'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('Record_Updated', $this->RenderText('Record Updated'), 'm-d-Y H:i:s'));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Category_Name', $this->RenderText('Category Name')));
            
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
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Category_Path', $this->RenderText('Category Path'), $lookupDataset, 'Cat_Id', 'Cat_Name', false, 8));
            
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
            // View column for Categories_ID field
            //
            $column = new TextViewColumn('Categories_ID', 'Categories ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('150px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Category_ID field
            //
            $column = new TextViewColumn('Category_ID', 'Category ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Parent_Category_ID_Category_Name', 'Parent Category ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('200px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Category_Name', 'Category Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('categoriesGrid_Category_Name_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('200px');
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
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for Categories_ID field
            //
            $column = new TextViewColumn('Categories_ID', 'Categories ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Category_ID field
            //
            $column = new TextViewColumn('Category_ID', 'Category ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Parent_Category_ID_Category_Name', 'Parent Category ID', $this->dataset);
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
            
            //
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Category_Name', 'Category Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('categoriesGrid_Category_Name_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('Category_Path_Cat_Name', 'Category Path', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('categoriesGrid_Category_Path_Cat_Name_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog_ID_Catalog', 'Catalog ID', $this->dataset);
            $column->SetOrderable(true);
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
                'Store', 
                'Store_ID', 
                $editor, 
                $this->dataset, 'Stores_ID', 'Store_Name', $lookupDataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Category_ID field
            //
            $editor = new TextEdit('category_id_edit');
            $editColumn = new CustomEditColumn('Category ID', 'Category_ID', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Parent_Category_ID field
            //
            $editor = new AutocomleteComboBox('parent_category_id_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Parent Category ID', 'Parent_Category_ID', 'Parent_Category_ID_Category_Name', 'edit_Parent_Category_ID_Category_Name_search', $editor, $this->dataset, $lookupDataset, 'Category_ID', 'Category_Name', '');
            $editColumn->SetAllowSetToNull(true);
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
            // Edit column for Category_Name field
            //
            $editor = new TextEdit('category_name_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Category Name', 'Category_Name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MaxLengthValidator(500, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MaxlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MinLengthValidator(1, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MinlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Category_Path field
            //
            $editor = new AutocomleteComboBox('category_path_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Category Path', 'Category_Path', 'Category_Path_Cat_Name', 'edit_Category_Path_Cat_Name_search', $editor, $this->dataset, $lookupDataset, 'Cat_Id', 'Cat_Name', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Catalog_ID field
            //
            $editor = new ComboBox('catalog_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
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
                'Catalog ID', 
                'Catalog_ID', 
                $editor, 
                $this->dataset, 'Catalogs_ID', 'Catalog', $lookupDataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
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
                'Store', 
                'Store_ID', 
                $editor, 
                $this->dataset, 'Stores_ID', 'Store_Name', $lookupDataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Category_ID field
            //
            $editor = new TextEdit('category_id_edit');
            $editColumn = new CustomEditColumn('Category ID', 'Category_ID', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Parent_Category_ID field
            //
            $editor = new AutocomleteComboBox('parent_category_id_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Parent Category ID', 'Parent_Category_ID', 'Parent_Category_ID_Category_Name', 'insert_Parent_Category_ID_Category_Name_search', $editor, $this->dataset, $lookupDataset, 'Category_ID', 'Category_Name', '');
            $editColumn->SetAllowSetToNull(true);
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
            // Edit column for Category_Name field
            //
            $editor = new TextEdit('category_name_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Category Name', 'Category_Name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MaxLengthValidator(500, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MaxlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MinLengthValidator(1, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MinlengthValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Category_Path field
            //
            $editor = new AutocomleteComboBox('category_path_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Category Path', 'Category_Path', 'Category_Path_Cat_Name', 'insert_Category_Path_Cat_Name_search', $editor, $this->dataset, $lookupDataset, 'Cat_Id', 'Cat_Name', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Catalog_ID field
            //
            $editor = new ComboBox('catalog_id_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
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
                'Catalog ID', 
                'Catalog_ID', 
                $editor, 
                $this->dataset, 'Catalogs_ID', 'Catalog', $lookupDataset);
            $editColumn->SetAllowSetToDefault(true);
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
            // View column for Categories_ID field
            //
            $column = new TextViewColumn('Categories_ID', 'Categories ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Category_ID field
            //
            $column = new TextViewColumn('Category_ID', 'Category ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Parent_Category_ID_Category_Name', 'Parent Category ID', $this->dataset);
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
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Category_Name', 'Category Name', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Category_Path field
            //
            $column = new TextViewColumn('Category_Path', 'Category Path', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog_ID_Catalog', 'Catalog ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for Categories_ID field
            //
            $column = new TextViewColumn('Categories_ID', 'Categories ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Store_Name field
            //
            $column = new TextViewColumn('Store_ID_Store_Name', 'Store', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Category_ID field
            //
            $column = new TextViewColumn('Category_ID', 'Category ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Parent_Category_ID_Category_Name', 'Parent Category ID', $this->dataset);
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
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Category_Name', 'Category Name', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Category_Path field
            //
            $column = new TextViewColumn('Category_Path', 'Category Path', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog_ID_Catalog', 'Catalog ID', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'categories_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'categoriesGrid');
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
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Category_Name', 'Category Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'categoriesGrid_Category_Name_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for Category_Name field
            //
            $column = new TextViewColumn('Category_Name', 'Category Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'categoriesGrid_Category_Name_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('Category_Path_Cat_Name', 'Category Path', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'categoriesGrid_Category_Path_Cat_Name_handler_view', $column);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Parent_Category_ID_Category_Name_search', 'Category_ID', 'Category_Name', null);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Category_Path_Cat_Name_search', 'Cat_Id', 'Cat_Name', null);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Parent_Category_ID_Category_Name_search', 'Category_ID', 'Category_Name', null);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Category_Path_Cat_Name_search', 'Cat_Id', 'Cat_Name', null);
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
        $Page = new categoriesPage("categories.php", "categories", GetCurrentUserGrantForDataSource("categories"), 'UTF-8');
        $Page->SetTitle('Categories');
        $Page->SetMenuLabel('Categories');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("categories"));
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
	
