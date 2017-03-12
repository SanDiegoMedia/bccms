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
    
    
    
    class repositoriesPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`repositories`');
            $field = new IntegerField('Repositories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('Repository_Type_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Business_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('Contact_ID');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('Root_URL');
            $this->dataset->AddField($field, false);
            $field = new StringField('Notes');
            $this->dataset->AddField($field, false);
            $field = new StringField('Repository');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('Repository_Type_ID', 'repository_types', new IntegerField('Repository_Types_ID', null, null, true), new StringField('Repository_Type', 'Repository_Type_ID_Repository_Type', 'Repository_Type_ID_Repository_Type_repository_types'), 'Repository_Type_ID_Repository_Type_repository_types');
            $this->dataset->AddLookupField('Business_ID', 'businesses', new IntegerField('Businesses_ID', null, null, true), new StringField('Business', 'Business_ID_Business', 'Business_ID_Business_businesses'), 'Business_ID_Business_businesses');
            $this->dataset->AddLookupField('Contact_ID', 'contacts', new IntegerField('Contacts_ID', null, null, true), new StringField('First_Name', 'Contact_ID_First_Name', 'Contact_ID_First_Name_contacts'), 'Contact_ID_First_Name_contacts');
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
            $grid->SearchControl = new SimpleSearch('repositoriesssearch', $this->dataset,
                array('Repositories_ID', 'Repository_Type_ID_Repository_Type', 'Repository', 'Business_ID_Business', 'Contact_ID_First_Name', 'Root_URL'),
                array($this->RenderText('Repositories ID'), $this->RenderText('Repository Type ID'), $this->RenderText('Repository'), $this->RenderText('Business ID'), $this->RenderText('Contact ID'), $this->RenderText('Root URL')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('repositoriesasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Repositories_ID', $this->RenderText('Repositories ID')));
            
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`repository_types`');
            $field = new IntegerField('Repository_Types_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Repository_Type');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Repository_Type', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Repository_Type_ID', $this->RenderText('Repository Type ID'), $lookupDataset, 'Repository_Types_ID', 'Repository_Type', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Repository', $this->RenderText('Repository')));
            
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`businesses`');
            $field = new IntegerField('Businesses_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Contact_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Business');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Logo_Path');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Business', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Business_ID', $this->RenderText('Business ID'), $lookupDataset, 'Businesses_ID', 'Business', false, 8));
            
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`contacts`');
            $field = new IntegerField('Contacts_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('First_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Last_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Email');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Address');
            $lookupDataset->AddField($field, false);
            $field = new StringField('City');
            $lookupDataset->AddField($field, false);
            $field = new StringField('State');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Zip');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Country');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Timezone');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('First_Name', GetOrderTypeAsSQL(otAscending));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateLookupSearchInput('Contact_ID', $this->RenderText('Contact ID'), $lookupDataset, 'Contacts_ID', 'First_Name', false, 8));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Root_URL', $this->RenderText('Root URL')));
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
            // View column for Repositories_ID field
            //
            $column = new TextViewColumn('Repositories_ID', 'Repositories ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Repository_Type field
            //
            $column = new TextViewColumn('Repository_Type_ID_Repository_Type', 'Repository Type ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Repository field
            //
            $column = new TextViewColumn('Repository', 'Repository', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('repositoriesGrid_Repository_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Business field
            //
            $column = new TextViewColumn('Business_ID_Business', 'Business ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for First_Name field
            //
            $column = new TextViewColumn('Contact_ID_First_Name', 'Contact ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Root_URL field
            //
            $column = new TextViewColumn('Root_URL', 'Root URL', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('repositoriesGrid_Root_URL_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for Repositories_ID field
            //
            $column = new TextViewColumn('Repositories_ID', 'Repositories ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Repository_Type field
            //
            $column = new TextViewColumn('Repository_Type_ID_Repository_Type', 'Repository Type ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Repository field
            //
            $column = new TextViewColumn('Repository', 'Repository', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('repositoriesGrid_Repository_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Business field
            //
            $column = new TextViewColumn('Business_ID_Business', 'Business ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for First_Name field
            //
            $column = new TextViewColumn('Contact_ID_First_Name', 'Contact ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Root_URL field
            //
            $column = new TextViewColumn('Root_URL', 'Root URL', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('repositoriesGrid_Root_URL_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Notes field
            //
            $column = new TextViewColumn('Notes', 'Notes', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('repositoriesGrid_Notes_handler_view');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for Repository_Type_ID field
            //
            $editor = new AutocomleteComboBox('repository_type_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`repository_types`');
            $field = new IntegerField('Repository_Types_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Repository_Type');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Repository_Type', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Repository Type ID', 'Repository_Type_ID', 'Repository_Type_ID_Repository_Type', 'edit_Repository_Type_ID_Repository_Type_search', $editor, $this->dataset, $lookupDataset, 'Repository_Types_ID', 'Repository_Type', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Repository field
            //
            $editor = new TextEdit('repository_edit');
            $editor->SetMaxLength(300);
            $editColumn = new CustomEditColumn('Repository', 'Repository', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Business_ID field
            //
            $editor = new AutocomleteComboBox('business_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`businesses`');
            $field = new IntegerField('Businesses_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Contact_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Business');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Logo_Path');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Business', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Business ID', 'Business_ID', 'Business_ID_Business', 'edit_Business_ID_Business_search', $editor, $this->dataset, $lookupDataset, 'Businesses_ID', 'Business', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Contact_ID field
            //
            $editor = new AutocomleteComboBox('contact_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`contacts`');
            $field = new IntegerField('Contacts_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('First_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Last_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Email');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Address');
            $lookupDataset->AddField($field, false);
            $field = new StringField('City');
            $lookupDataset->AddField($field, false);
            $field = new StringField('State');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Zip');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Country');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Timezone');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('First_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Contact ID', 'Contact_ID', 'Contact_ID_First_Name', 'edit_Contact_ID_First_Name_search', $editor, $this->dataset, $lookupDataset, 'Contacts_ID', 'First_Name', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Root_URL field
            //
            $editor = new TextEdit('root_url_edit');
            $editColumn = new CustomEditColumn('Root URL', 'Root_URL', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Notes field
            //
            $editor = new HtmlWysiwygEditor('notes_edit');
            $editColumn = new CustomEditColumn('Notes', 'Notes', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for Repository_Type_ID field
            //
            $editor = new AutocomleteComboBox('repository_type_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`repository_types`');
            $field = new IntegerField('Repository_Types_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Repository_Type');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Repository_Type', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Repository Type ID', 'Repository_Type_ID', 'Repository_Type_ID_Repository_Type', 'insert_Repository_Type_ID_Repository_Type_search', $editor, $this->dataset, $lookupDataset, 'Repository_Types_ID', 'Repository_Type', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Repository field
            //
            $editor = new TextEdit('repository_edit');
            $editor->SetMaxLength(300);
            $editColumn = new CustomEditColumn('Repository', 'Repository', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Business_ID field
            //
            $editor = new AutocomleteComboBox('business_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`businesses`');
            $field = new IntegerField('Businesses_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Contact_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Business');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Logo_Path');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Business', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Business ID', 'Business_ID', 'Business_ID_Business', 'insert_Business_ID_Business_search', $editor, $this->dataset, $lookupDataset, 'Businesses_ID', 'Business', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Contact_ID field
            //
            $editor = new AutocomleteComboBox('contact_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`contacts`');
            $field = new IntegerField('Contacts_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('First_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Last_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Email');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Address');
            $lookupDataset->AddField($field, false);
            $field = new StringField('City');
            $lookupDataset->AddField($field, false);
            $field = new StringField('State');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Zip');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Country');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Timezone');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('First_Name', GetOrderTypeAsSQL(otAscending));
            $editColumn = new DynamicLookupEditColumn('Contact ID', 'Contact_ID', 'Contact_ID_First_Name', 'insert_Contact_ID_First_Name_search', $editor, $this->dataset, $lookupDataset, 'Contacts_ID', 'First_Name', '');
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Root_URL field
            //
            $editor = new TextEdit('root_url_edit');
            $editColumn = new CustomEditColumn('Root URL', 'Root_URL', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Notes field
            //
            $editor = new HtmlWysiwygEditor('notes_edit');
            $editColumn = new CustomEditColumn('Notes', 'Notes', $editor, $this->dataset);
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
            // View column for Repositories_ID field
            //
            $column = new TextViewColumn('Repositories_ID', 'Repositories ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Repository_Type field
            //
            $column = new TextViewColumn('Repository_Type_ID_Repository_Type', 'Repository Type ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Repository field
            //
            $column = new TextViewColumn('Repository', 'Repository', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Business field
            //
            $column = new TextViewColumn('Business_ID_Business', 'Business ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for First_Name field
            //
            $column = new TextViewColumn('Contact_ID_First_Name', 'Contact ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Root_URL field
            //
            $column = new TextViewColumn('Root_URL', 'Root URL', $this->dataset);
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
            // View column for Repositories_ID field
            //
            $column = new TextViewColumn('Repositories_ID', 'Repositories ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Repository_Type field
            //
            $column = new TextViewColumn('Repository_Type_ID_Repository_Type', 'Repository Type ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Repository field
            //
            $column = new TextViewColumn('Repository', 'Repository', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Business field
            //
            $column = new TextViewColumn('Business_ID_Business', 'Business ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for First_Name field
            //
            $column = new TextViewColumn('Contact_ID_First_Name', 'Contact ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Root_URL field
            //
            $column = new TextViewColumn('Root_URL', 'Root URL', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'repositories_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'repositoriesGrid');
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(true);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::CARD);
            $result->SetCardCountInRow(3);
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
            // View column for Repository field
            //
            $column = new TextViewColumn('Repository', 'Repository', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'repositoriesGrid_Repository_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Root_URL field
            //
            $column = new TextViewColumn('Root_URL', 'Root URL', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'repositoriesGrid_Root_URL_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for Repository field
            //
            $column = new TextViewColumn('Repository', 'Repository', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'repositoriesGrid_Repository_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Root_URL field
            //
            $column = new TextViewColumn('Root_URL', 'Root URL', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'repositoriesGrid_Root_URL_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Notes field
            //
            $column = new TextViewColumn('Notes', 'Notes', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'repositoriesGrid_Notes_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`repository_types`');
            $field = new IntegerField('Repository_Types_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Repository_Type');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Repository_Type', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Repository_Type_ID_Repository_Type_search', 'Repository_Types_ID', 'Repository_Type', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`businesses`');
            $field = new IntegerField('Businesses_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Contact_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Business');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Logo_Path');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Business', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Business_ID_Business_search', 'Businesses_ID', 'Business', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`contacts`');
            $field = new IntegerField('Contacts_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('First_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Last_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Email');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Address');
            $lookupDataset->AddField($field, false);
            $field = new StringField('City');
            $lookupDataset->AddField($field, false);
            $field = new StringField('State');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Zip');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Country');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Timezone');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('First_Name', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_Contact_ID_First_Name_search', 'Contacts_ID', 'First_Name', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`repository_types`');
            $field = new IntegerField('Repository_Types_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('Repository_Type');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Repository_Type', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Repository_Type_ID_Repository_Type_search', 'Repository_Types_ID', 'Repository_Type', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`businesses`');
            $field = new IntegerField('Businesses_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new IntegerField('Store_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Contact_ID');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Business');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Notes');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Logo_Path');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('Business', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Business_ID_Business_search', 'Businesses_ID', 'Business', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`contacts`');
            $field = new IntegerField('Contacts_ID', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('First_Name');
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, false);
            $field = new StringField('Last_Name');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Email');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Address');
            $lookupDataset->AddField($field, false);
            $field = new StringField('City');
            $lookupDataset->AddField($field, false);
            $field = new StringField('State');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Zip');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Country');
            $lookupDataset->AddField($field, false);
            $field = new StringField('Timezone');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('First_Name', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_Contact_ID_First_Name_search', 'Contacts_ID', 'First_Name', null);
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
        $Page = new repositoriesPage("repositories.php", "repositories", GetCurrentUserGrantForDataSource("repositories"), 'UTF-8');
        $Page->SetTitle('Repositories');
        $Page->SetMenuLabel('Repositories');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("repositories"));
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
	
