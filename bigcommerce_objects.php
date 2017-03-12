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
    
    
    
    class bigcommerce_objectsPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_objects`');
            $field = new IntegerField('BigCommerce_Objects_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Object_Type_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Parent_Object_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('Object');
            $this->dataset->AddField($field, false);
            $field = new StringField('Notes');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('Object_Type_ID', 'bigcommerce_object_types', new IntegerField('BigCommerce_Object_Types_ID'), new StringField('Object_Type', 'Object_Type_ID_Object_Type', 'Object_Type_ID_Object_Type_bigcommerce_object_types'), 'Object_Type_ID_Object_Type_bigcommerce_object_types');
            $this->dataset->AddLookupField('Parent_Object_ID', 'bigcommerce_objects', new IntegerField('BigCommerce_Objects_ID'), new StringField('Object', 'Parent_Object_ID_Object', 'Parent_Object_ID_Object_bigcommerce_objects'), 'Parent_Object_ID_Object_bigcommerce_objects');
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
            $grid->SearchControl = new SimpleSearch('bigcommerce_objectsssearch', $this->dataset,
                array('Object_Type_ID_Object_Type', 'Parent_Object_ID_Object', 'Object', 'Notes'),
                array($this->RenderText('Object Type'), $this->RenderText('Parent Object ID'), $this->RenderText('Object'), $this->RenderText('Notes')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('bigcommerce_objectsasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_object_types`');
            $field = new IntegerField('BigCommerce_Object_Types_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Object_Type');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Object_Type', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Object_Type_ID', $this->RenderText('Object Type'), $lookupDataset, 'BigCommerce_Object_Types_ID', 'Object_Type', false, 8));
            
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_objects`');
            $field = new IntegerField('BigCommerce_Objects_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Object_Type_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Parent_Object_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Object');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Object', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Parent_Object_ID', $this->RenderText('Parent Object ID'), $lookupDataset, 'BigCommerce_Objects_ID', 'Object', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Object', $this->RenderText('Object')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Notes', $this->RenderText('Notes')));
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
            // View column for Object_Type field
            //
            $column = new TextViewColumn('Object_Type_ID_Object_Type', 'Object Type', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Object field
            //
            $column = new TextViewColumn('Parent_Object_ID_Object', 'Parent Object ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('100px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Object field
            //
            $column = new TextViewColumn('Object', 'Object', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bigcommerce_objectsGrid_Object_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('150px');
            $grid->AddViewColumn($column);
            
            //
            // View column for Notes field
            //
            $column = new TextViewColumn('Notes', 'Notes', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bigcommerce_objectsGrid_Notes_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth('300px');
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for Object_Type field
            //
            $column = new TextViewColumn('Object_Type_ID_Object_Type', 'Object Type', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Object field
            //
            $column = new TextViewColumn('Parent_Object_ID_Object', 'Parent Object ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Object field
            //
            $column = new TextViewColumn('Object', 'Object', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bigcommerce_objectsGrid_Object_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Notes field
            //
            $column = new TextViewColumn('Notes', 'Notes', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bigcommerce_objectsGrid_Notes_handler_view');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for Object_Type_ID field
            //
            $editor = new AutocomleteComboBox('object_type_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_object_types`');
            $field = new IntegerField('BigCommerce_Object_Types_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Object_Type');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Object_Type', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Object Type', 'Object_Type_ID', 'Object_Type_ID_Object_Type', 'edit_Object_Type_ID_Object_Type_search', $editor, $this->dataset, $lookupDataset, 'BigCommerce_Object_Types_ID', 'Object_Type', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Parent_Object_ID field
            //
            $editor = new AutocomleteComboBox('parent_object_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_objects`');
            $field = new IntegerField('BigCommerce_Objects_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Object_Type_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Parent_Object_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Object');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Object', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Parent Object ID', 'Parent_Object_ID', 'Parent_Object_ID_Object', 'edit_Parent_Object_ID_Object_search', $editor, $this->dataset, $lookupDataset, 'BigCommerce_Objects_ID', 'Object', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Object field
            //
            $editor = new TextEdit('object_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Object', 'Object', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            // Edit column for Object_Type_ID field
            //
            $editor = new AutocomleteComboBox('object_type_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_object_types`');
            $field = new IntegerField('BigCommerce_Object_Types_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Object_Type');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Object_Type', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Object Type', 'Object_Type_ID', 'Object_Type_ID_Object_Type', 'insert_Object_Type_ID_Object_Type_search', $editor, $this->dataset, $lookupDataset, 'BigCommerce_Object_Types_ID', 'Object_Type', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Parent_Object_ID field
            //
            $editor = new AutocomleteComboBox('parent_object_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_objects`');
            $field = new IntegerField('BigCommerce_Objects_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Object_Type_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Parent_Object_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Object');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Object', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Parent Object ID', 'Parent_Object_ID', 'Parent_Object_ID_Object', 'insert_Parent_Object_ID_Object_search', $editor, $this->dataset, $lookupDataset, 'BigCommerce_Objects_ID', 'Object', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Object field
            //
            $editor = new TextEdit('object_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Object', 'Object', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            // View column for Object_Type field
            //
            $column = new TextViewColumn('Object_Type_ID_Object_Type', 'Object Type', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Object field
            //
            $column = new TextViewColumn('Parent_Object_ID_Object', 'Parent Object ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Object field
            //
            $column = new TextViewColumn('Object', 'Object', $this->dataset);
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
            // View column for BigCommerce_Objects_ID field
            //
            $column = new TextViewColumn('BigCommerce_Objects_ID', 'BigCommerce Objects ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Object_Type field
            //
            $column = new TextViewColumn('Object_Type_ID_Object_Type', 'Object Type', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Object field
            //
            $column = new TextViewColumn('Parent_Object_ID_Object', 'Parent Object ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Object field
            //
            $column = new TextViewColumn('Object', 'Object', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'bigcommerce_objects_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'bigcommerce_objectsGrid');
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
            // View column for Object field
            //
            $column = new TextViewColumn('Object', 'Object', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bigcommerce_objectsGrid_Object_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Notes field
            //
            $column = new TextViewColumn('Notes', 'Notes', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bigcommerce_objectsGrid_Notes_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for Object field
            //
            $column = new TextViewColumn('Object', 'Object', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bigcommerce_objectsGrid_Object_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Notes field
            //
            $column = new TextViewColumn('Notes', 'Notes', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bigcommerce_objectsGrid_Notes_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_object_types`');
            $field = new IntegerField('BigCommerce_Object_Types_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Object_Type');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Object_Type', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Object_Type_ID_Object_Type_search', 'BigCommerce_Object_Types_ID', 'Object_Type', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_objects`');
            $field = new IntegerField('BigCommerce_Objects_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Object_Type_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Parent_Object_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Object');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Object', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Parent_Object_ID_Object_search', 'BigCommerce_Objects_ID', 'Object', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_object_types`');
            $field = new IntegerField('BigCommerce_Object_Types_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Object_Type');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Object_Type', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Object_Type_ID_Object_Type_search', 'BigCommerce_Object_Types_ID', 'Object_Type', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_objects`');
            $field = new IntegerField('BigCommerce_Objects_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Object_Type_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('Parent_Object_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Object');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Object', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Parent_Object_ID_Object_search', 'BigCommerce_Objects_ID', 'Object', null);
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
        $Page = new bigcommerce_objectsPage("bigcommerce_objects.php", "bigcommerce_objects", GetCurrentUserGrantForDataSource("bigcommerce_objects"), 'UTF-8');
        $Page->SetTitle('Bigcommerce Objects');
        $Page->SetMenuLabel('Bigcommerce Objects');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("bigcommerce_objects"));
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
	
