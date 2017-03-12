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
    
    
    
    class bigcommerce_catalog_progressPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bigcommerce_catalog_progress`');
            $field = new IntegerField('bigcommerce_catalog_progress_ID', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('versions_created');
            $this->dataset->AddField($field, false);
            $field = new StringField('categories_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('categories_complete');
            $this->dataset->AddField($field, false);
            $field = new StringField('products_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('products_complete');
            $this->dataset->AddField($field, false);
            $field = new StringField('skus_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('skus_complete');
            $this->dataset->AddField($field, false);
            $field = new StringField('catalogs_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('catalogs_complete');
            $this->dataset->AddField($field, false);
            $field = new StringField('files_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('files_complete');
            $this->dataset->AddField($field, false);
            $field = new StringField('companies_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('records_completed');
            $this->dataset->AddField($field, false);
            $field = new StringField('records_with_errors');
            $this->dataset->AddField($field, false);
            $field = new StringField('records_pending');
            $this->dataset->AddField($field, false);
            $field = new StringField('records_in_QA');
            $this->dataset->AddField($field, false);
            $field = new StringField('repositories_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('options_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('options_completed');
            $this->dataset->AddField($field, false);
            $field = new StringField('custom_fields_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('custom_fields_completed');
            $this->dataset->AddField($field, false);
            $field = new StringField('businesses_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('users_total');
            $this->dataset->AddField($field, false);
            $field = new StringField('tasks_assigned');
            $this->dataset->AddField($field, false);
            $field = new StringField('tasks_completed');
            $this->dataset->AddField($field, false);
            $field = new StringField('published_records');
            $this->dataset->AddField($field, false);
            $field = new StringField('unpublished_records');
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('date_calculated');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
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
            $grid->SearchControl = new SimpleSearch('bigcommerce_catalog_progressssearch', $this->dataset,
                array('bigcommerce_catalog_progress_ID', 'versions_created', 'categories_total', 'categories_complete', 'products_total', 'products_complete', 'skus_total', 'skus_complete', 'catalogs_total', 'catalogs_complete', 'files_total', 'files_complete', 'companies_total', 'records_completed', 'records_with_errors', 'records_pending', 'records_in_QA', 'repositories_total', 'options_total', 'options_completed', 'custom_fields_total', 'custom_fields_completed', 'businesses_total', 'users_total', 'tasks_assigned', 'tasks_completed', 'published_records', 'unpublished_records', 'date_calculated'),
                array($this->RenderText('Bigcommerce Catalog Progress ID'), $this->RenderText('Versions Created'), $this->RenderText('Categories Total'), $this->RenderText('Categories Complete'), $this->RenderText('Products Total'), $this->RenderText('Products Complete'), $this->RenderText('Skus Total'), $this->RenderText('Skus Complete'), $this->RenderText('Catalogs Total'), $this->RenderText('Catalogs Complete'), $this->RenderText('Files Total'), $this->RenderText('Files Complete'), $this->RenderText('Companies Total'), $this->RenderText('Records Completed'), $this->RenderText('Records With Errors'), $this->RenderText('Records Pending'), $this->RenderText('Records In QA'), $this->RenderText('Repositories Total'), $this->RenderText('Options Total'), $this->RenderText('Options Completed'), $this->RenderText('Custom Fields Total'), $this->RenderText('Custom Fields Completed'), $this->RenderText('Businesses Total'), $this->RenderText('Users Total'), $this->RenderText('Tasks Assigned'), $this->RenderText('Tasks Completed'), $this->RenderText('Published Records'), $this->RenderText('Unpublished Records'), $this->RenderText('Date Calculated')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('bigcommerce_catalog_progressasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('bigcommerce_catalog_progress_ID', $this->RenderText('Bigcommerce Catalog Progress ID')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('versions_created', $this->RenderText('Versions Created')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('categories_total', $this->RenderText('Categories Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('categories_complete', $this->RenderText('Categories Complete')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('products_total', $this->RenderText('Products Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('products_complete', $this->RenderText('Products Complete')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('skus_total', $this->RenderText('Skus Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('skus_complete', $this->RenderText('Skus Complete')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('catalogs_total', $this->RenderText('Catalogs Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('catalogs_complete', $this->RenderText('Catalogs Complete')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('files_total', $this->RenderText('Files Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('files_complete', $this->RenderText('Files Complete')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('companies_total', $this->RenderText('Companies Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('records_completed', $this->RenderText('Records Completed')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('records_with_errors', $this->RenderText('Records With Errors')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('records_pending', $this->RenderText('Records Pending')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('records_in_QA', $this->RenderText('Records In QA')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('repositories_total', $this->RenderText('Repositories Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('options_total', $this->RenderText('Options Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('options_completed', $this->RenderText('Options Completed')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('custom_fields_total', $this->RenderText('Custom Fields Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('custom_fields_completed', $this->RenderText('Custom Fields Completed')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('businesses_total', $this->RenderText('Businesses Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('users_total', $this->RenderText('Users Total')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('tasks_assigned', $this->RenderText('Tasks Assigned')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('tasks_completed', $this->RenderText('Tasks Completed')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('published_records', $this->RenderText('Published Records')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('unpublished_records', $this->RenderText('Unpublished Records')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateDateTimeSearchInput('date_calculated', $this->RenderText('Date Calculated'), 'm-d-Y H:i:s'));
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
            // View column for bigcommerce_catalog_progress_ID field
            //
            $column = new TextViewColumn('bigcommerce_catalog_progress_ID', 'Bigcommerce Catalog Progress ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for versions_created field
            //
            $column = new TextViewColumn('versions_created', 'Versions Created', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for categories_total field
            //
            $column = new TextViewColumn('categories_total', 'Categories Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for categories_complete field
            //
            $column = new TextViewColumn('categories_complete', 'Categories Complete', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for products_total field
            //
            $column = new TextViewColumn('products_total', 'Products Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for products_complete field
            //
            $column = new TextViewColumn('products_complete', 'Products Complete', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for skus_total field
            //
            $column = new TextViewColumn('skus_total', 'Skus Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for skus_complete field
            //
            $column = new TextViewColumn('skus_complete', 'Skus Complete', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for catalogs_total field
            //
            $column = new TextViewColumn('catalogs_total', 'Catalogs Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for catalogs_complete field
            //
            $column = new TextViewColumn('catalogs_complete', 'Catalogs Complete', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for files_total field
            //
            $column = new TextViewColumn('files_total', 'Files Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for files_complete field
            //
            $column = new TextViewColumn('files_complete', 'Files Complete', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for companies_total field
            //
            $column = new TextViewColumn('companies_total', 'Companies Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for records_completed field
            //
            $column = new TextViewColumn('records_completed', 'Records Completed', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for records_with_errors field
            //
            $column = new TextViewColumn('records_with_errors', 'Records With Errors', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for records_pending field
            //
            $column = new TextViewColumn('records_pending', 'Records Pending', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for records_in_QA field
            //
            $column = new TextViewColumn('records_in_QA', 'Records In QA', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for repositories_total field
            //
            $column = new TextViewColumn('repositories_total', 'Repositories Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for options_total field
            //
            $column = new TextViewColumn('options_total', 'Options Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for options_completed field
            //
            $column = new TextViewColumn('options_completed', 'Options Completed', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for custom_fields_total field
            //
            $column = new TextViewColumn('custom_fields_total', 'Custom Fields Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for custom_fields_completed field
            //
            $column = new TextViewColumn('custom_fields_completed', 'Custom Fields Completed', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for businesses_total field
            //
            $column = new TextViewColumn('businesses_total', 'Businesses Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for users_total field
            //
            $column = new TextViewColumn('users_total', 'Users Total', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tasks_assigned field
            //
            $column = new TextViewColumn('tasks_assigned', 'Tasks Assigned', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tasks_completed field
            //
            $column = new TextViewColumn('tasks_completed', 'Tasks Completed', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for published_records field
            //
            $column = new TextViewColumn('published_records', 'Published Records', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for unpublished_records field
            //
            $column = new TextViewColumn('unpublished_records', 'Unpublished Records', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for date_calculated field
            //
            $column = new DateTimeViewColumn('date_calculated', 'Date Calculated', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for bigcommerce_catalog_progress_ID field
            //
            $column = new TextViewColumn('bigcommerce_catalog_progress_ID', 'Bigcommerce Catalog Progress ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for versions_created field
            //
            $column = new TextViewColumn('versions_created', 'Versions Created', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for categories_total field
            //
            $column = new TextViewColumn('categories_total', 'Categories Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for categories_complete field
            //
            $column = new TextViewColumn('categories_complete', 'Categories Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for products_total field
            //
            $column = new TextViewColumn('products_total', 'Products Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for products_complete field
            //
            $column = new TextViewColumn('products_complete', 'Products Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for skus_total field
            //
            $column = new TextViewColumn('skus_total', 'Skus Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for skus_complete field
            //
            $column = new TextViewColumn('skus_complete', 'Skus Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for catalogs_total field
            //
            $column = new TextViewColumn('catalogs_total', 'Catalogs Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for catalogs_complete field
            //
            $column = new TextViewColumn('catalogs_complete', 'Catalogs Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for files_total field
            //
            $column = new TextViewColumn('files_total', 'Files Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for files_complete field
            //
            $column = new TextViewColumn('files_complete', 'Files Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for companies_total field
            //
            $column = new TextViewColumn('companies_total', 'Companies Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for records_completed field
            //
            $column = new TextViewColumn('records_completed', 'Records Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for records_with_errors field
            //
            $column = new TextViewColumn('records_with_errors', 'Records With Errors', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for records_pending field
            //
            $column = new TextViewColumn('records_pending', 'Records Pending', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for records_in_QA field
            //
            $column = new TextViewColumn('records_in_QA', 'Records In QA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for repositories_total field
            //
            $column = new TextViewColumn('repositories_total', 'Repositories Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for options_total field
            //
            $column = new TextViewColumn('options_total', 'Options Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for options_completed field
            //
            $column = new TextViewColumn('options_completed', 'Options Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for custom_fields_total field
            //
            $column = new TextViewColumn('custom_fields_total', 'Custom Fields Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for custom_fields_completed field
            //
            $column = new TextViewColumn('custom_fields_completed', 'Custom Fields Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for businesses_total field
            //
            $column = new TextViewColumn('businesses_total', 'Businesses Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for users_total field
            //
            $column = new TextViewColumn('users_total', 'Users Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tasks_assigned field
            //
            $column = new TextViewColumn('tasks_assigned', 'Tasks Assigned', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tasks_completed field
            //
            $column = new TextViewColumn('tasks_completed', 'Tasks Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for published_records field
            //
            $column = new TextViewColumn('published_records', 'Published Records', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for unpublished_records field
            //
            $column = new TextViewColumn('unpublished_records', 'Unpublished Records', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for date_calculated field
            //
            $column = new DateTimeViewColumn('date_calculated', 'Date Calculated', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for versions_created field
            //
            $editor = new TextEdit('versions_created_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Versions Created', 'versions_created', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for categories_total field
            //
            $editor = new TextEdit('categories_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Categories Total', 'categories_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for categories_complete field
            //
            $editor = new TextEdit('categories_complete_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Categories Complete', 'categories_complete', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for products_total field
            //
            $editor = new TextEdit('products_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Products Total', 'products_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for products_complete field
            //
            $editor = new TextEdit('products_complete_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Products Complete', 'products_complete', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for skus_total field
            //
            $editor = new TextEdit('skus_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Skus Total', 'skus_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for skus_complete field
            //
            $editor = new TextEdit('skus_complete_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Skus Complete', 'skus_complete', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for catalogs_total field
            //
            $editor = new TextEdit('catalogs_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Catalogs Total', 'catalogs_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for catalogs_complete field
            //
            $editor = new TextEdit('catalogs_complete_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Catalogs Complete', 'catalogs_complete', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for files_total field
            //
            $editor = new TextEdit('files_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Files Total', 'files_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for files_complete field
            //
            $editor = new TextEdit('files_complete_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Files Complete', 'files_complete', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for companies_total field
            //
            $editor = new TextEdit('companies_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Companies Total', 'companies_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for records_completed field
            //
            $editor = new TextEdit('records_completed_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Records Completed', 'records_completed', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for records_with_errors field
            //
            $editor = new TextEdit('records_with_errors_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Records With Errors', 'records_with_errors', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for records_pending field
            //
            $editor = new TextEdit('records_pending_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Records Pending', 'records_pending', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for records_in_QA field
            //
            $editor = new TextEdit('records_in_qa_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Records In QA', 'records_in_QA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for repositories_total field
            //
            $editor = new TextEdit('repositories_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Repositories Total', 'repositories_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for options_total field
            //
            $editor = new TextEdit('options_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Options Total', 'options_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for options_completed field
            //
            $editor = new TextEdit('options_completed_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Options Completed', 'options_completed', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for custom_fields_total field
            //
            $editor = new TextEdit('custom_fields_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Custom Fields Total', 'custom_fields_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for custom_fields_completed field
            //
            $editor = new TextEdit('custom_fields_completed_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Custom Fields Completed', 'custom_fields_completed', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for businesses_total field
            //
            $editor = new TextEdit('businesses_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Businesses Total', 'businesses_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for users_total field
            //
            $editor = new TextEdit('users_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Users Total', 'users_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tasks_assigned field
            //
            $editor = new TextEdit('tasks_assigned_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Tasks Assigned', 'tasks_assigned', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tasks_completed field
            //
            $editor = new TextEdit('tasks_completed_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Tasks Completed', 'tasks_completed', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for published_records field
            //
            $editor = new TextEdit('published_records_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Published Records', 'published_records', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for unpublished_records field
            //
            $editor = new TextEdit('unpublished_records_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Unpublished Records', 'unpublished_records', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for date_calculated field
            //
            $editor = new DateTimeEdit('date_calculated_edit', false, 'm-d-Y H:i:s');
            $editColumn = new CustomEditColumn('Date Calculated', 'date_calculated', $editor, $this->dataset);
            $editColumn->SetAllowSetToDefault(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for versions_created field
            //
            $editor = new TextEdit('versions_created_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Versions Created', 'versions_created', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for categories_total field
            //
            $editor = new TextEdit('categories_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Categories Total', 'categories_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for categories_complete field
            //
            $editor = new TextEdit('categories_complete_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Categories Complete', 'categories_complete', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for products_total field
            //
            $editor = new TextEdit('products_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Products Total', 'products_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for products_complete field
            //
            $editor = new TextEdit('products_complete_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Products Complete', 'products_complete', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for skus_total field
            //
            $editor = new TextEdit('skus_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Skus Total', 'skus_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for skus_complete field
            //
            $editor = new TextEdit('skus_complete_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Skus Complete', 'skus_complete', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for catalogs_total field
            //
            $editor = new TextEdit('catalogs_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Catalogs Total', 'catalogs_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for catalogs_complete field
            //
            $editor = new TextEdit('catalogs_complete_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Catalogs Complete', 'catalogs_complete', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for files_total field
            //
            $editor = new TextEdit('files_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Files Total', 'files_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for files_complete field
            //
            $editor = new TextEdit('files_complete_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Files Complete', 'files_complete', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for companies_total field
            //
            $editor = new TextEdit('companies_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Companies Total', 'companies_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for records_completed field
            //
            $editor = new TextEdit('records_completed_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Records Completed', 'records_completed', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for records_with_errors field
            //
            $editor = new TextEdit('records_with_errors_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Records With Errors', 'records_with_errors', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for records_pending field
            //
            $editor = new TextEdit('records_pending_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Records Pending', 'records_pending', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for records_in_QA field
            //
            $editor = new TextEdit('records_in_qa_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Records In QA', 'records_in_QA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for repositories_total field
            //
            $editor = new TextEdit('repositories_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Repositories Total', 'repositories_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for options_total field
            //
            $editor = new TextEdit('options_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Options Total', 'options_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for options_completed field
            //
            $editor = new TextEdit('options_completed_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Options Completed', 'options_completed', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for custom_fields_total field
            //
            $editor = new TextEdit('custom_fields_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Custom Fields Total', 'custom_fields_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for custom_fields_completed field
            //
            $editor = new TextEdit('custom_fields_completed_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Custom Fields Completed', 'custom_fields_completed', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for businesses_total field
            //
            $editor = new TextEdit('businesses_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Businesses Total', 'businesses_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for users_total field
            //
            $editor = new TextEdit('users_total_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Users Total', 'users_total', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tasks_assigned field
            //
            $editor = new TextEdit('tasks_assigned_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Tasks Assigned', 'tasks_assigned', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tasks_completed field
            //
            $editor = new TextEdit('tasks_completed_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Tasks Completed', 'tasks_completed', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for published_records field
            //
            $editor = new TextEdit('published_records_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Published Records', 'published_records', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for unpublished_records field
            //
            $editor = new TextEdit('unpublished_records_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Unpublished Records', 'unpublished_records', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for date_calculated field
            //
            $editor = new DateTimeEdit('date_calculated_edit', false, 'm-d-Y H:i:s');
            $editColumn = new CustomEditColumn('Date Calculated', 'date_calculated', $editor, $this->dataset);
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
            // View column for bigcommerce_catalog_progress_ID field
            //
            $column = new TextViewColumn('bigcommerce_catalog_progress_ID', 'Bigcommerce Catalog Progress ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for versions_created field
            //
            $column = new TextViewColumn('versions_created', 'Versions Created', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for categories_total field
            //
            $column = new TextViewColumn('categories_total', 'Categories Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for categories_complete field
            //
            $column = new TextViewColumn('categories_complete', 'Categories Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for products_total field
            //
            $column = new TextViewColumn('products_total', 'Products Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for products_complete field
            //
            $column = new TextViewColumn('products_complete', 'Products Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for skus_total field
            //
            $column = new TextViewColumn('skus_total', 'Skus Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for skus_complete field
            //
            $column = new TextViewColumn('skus_complete', 'Skus Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for catalogs_total field
            //
            $column = new TextViewColumn('catalogs_total', 'Catalogs Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for catalogs_complete field
            //
            $column = new TextViewColumn('catalogs_complete', 'Catalogs Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for files_total field
            //
            $column = new TextViewColumn('files_total', 'Files Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for files_complete field
            //
            $column = new TextViewColumn('files_complete', 'Files Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for companies_total field
            //
            $column = new TextViewColumn('companies_total', 'Companies Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for records_completed field
            //
            $column = new TextViewColumn('records_completed', 'Records Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for records_with_errors field
            //
            $column = new TextViewColumn('records_with_errors', 'Records With Errors', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for records_pending field
            //
            $column = new TextViewColumn('records_pending', 'Records Pending', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for records_in_QA field
            //
            $column = new TextViewColumn('records_in_QA', 'Records In QA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for repositories_total field
            //
            $column = new TextViewColumn('repositories_total', 'Repositories Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for options_total field
            //
            $column = new TextViewColumn('options_total', 'Options Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for options_completed field
            //
            $column = new TextViewColumn('options_completed', 'Options Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for custom_fields_total field
            //
            $column = new TextViewColumn('custom_fields_total', 'Custom Fields Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for custom_fields_completed field
            //
            $column = new TextViewColumn('custom_fields_completed', 'Custom Fields Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for businesses_total field
            //
            $column = new TextViewColumn('businesses_total', 'Businesses Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for users_total field
            //
            $column = new TextViewColumn('users_total', 'Users Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tasks_assigned field
            //
            $column = new TextViewColumn('tasks_assigned', 'Tasks Assigned', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tasks_completed field
            //
            $column = new TextViewColumn('tasks_completed', 'Tasks Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for published_records field
            //
            $column = new TextViewColumn('published_records', 'Published Records', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for unpublished_records field
            //
            $column = new TextViewColumn('unpublished_records', 'Unpublished Records', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for date_calculated field
            //
            $column = new DateTimeViewColumn('date_calculated', 'Date Calculated', $this->dataset);
            $column->SetDateTimeFormat('m-d-Y H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for bigcommerce_catalog_progress_ID field
            //
            $column = new TextViewColumn('bigcommerce_catalog_progress_ID', 'Bigcommerce Catalog Progress ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for versions_created field
            //
            $column = new TextViewColumn('versions_created', 'Versions Created', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for categories_total field
            //
            $column = new TextViewColumn('categories_total', 'Categories Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for categories_complete field
            //
            $column = new TextViewColumn('categories_complete', 'Categories Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for products_total field
            //
            $column = new TextViewColumn('products_total', 'Products Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for products_complete field
            //
            $column = new TextViewColumn('products_complete', 'Products Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for skus_total field
            //
            $column = new TextViewColumn('skus_total', 'Skus Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for skus_complete field
            //
            $column = new TextViewColumn('skus_complete', 'Skus Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for catalogs_total field
            //
            $column = new TextViewColumn('catalogs_total', 'Catalogs Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for catalogs_complete field
            //
            $column = new TextViewColumn('catalogs_complete', 'Catalogs Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for files_total field
            //
            $column = new TextViewColumn('files_total', 'Files Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for files_complete field
            //
            $column = new TextViewColumn('files_complete', 'Files Complete', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for companies_total field
            //
            $column = new TextViewColumn('companies_total', 'Companies Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for records_completed field
            //
            $column = new TextViewColumn('records_completed', 'Records Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for records_with_errors field
            //
            $column = new TextViewColumn('records_with_errors', 'Records With Errors', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for records_pending field
            //
            $column = new TextViewColumn('records_pending', 'Records Pending', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for records_in_QA field
            //
            $column = new TextViewColumn('records_in_QA', 'Records In QA', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for repositories_total field
            //
            $column = new TextViewColumn('repositories_total', 'Repositories Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for options_total field
            //
            $column = new TextViewColumn('options_total', 'Options Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for options_completed field
            //
            $column = new TextViewColumn('options_completed', 'Options Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for custom_fields_total field
            //
            $column = new TextViewColumn('custom_fields_total', 'Custom Fields Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for custom_fields_completed field
            //
            $column = new TextViewColumn('custom_fields_completed', 'Custom Fields Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for businesses_total field
            //
            $column = new TextViewColumn('businesses_total', 'Businesses Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for users_total field
            //
            $column = new TextViewColumn('users_total', 'Users Total', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for tasks_assigned field
            //
            $column = new TextViewColumn('tasks_assigned', 'Tasks Assigned', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for tasks_completed field
            //
            $column = new TextViewColumn('tasks_completed', 'Tasks Completed', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for published_records field
            //
            $column = new TextViewColumn('published_records', 'Published Records', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for unpublished_records field
            //
            $column = new TextViewColumn('unpublished_records', 'Unpublished Records', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for date_calculated field
            //
            $column = new DateTimeViewColumn('date_calculated', 'Date Calculated', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'bigcommerce_catalog_progress_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'bigcommerce_catalog_progressGrid');
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
            $result->SetCardCountInRow(2);
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
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(false);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(true);
            $this->setPrintOneRecordAvailable(true);
            $this->setExportListAvailable(array('excel','xml','csv'));
            $this->setExportListRecordAvailable(array('xml','csv'));
            $this->setExportOneRecordAvailable(array('excel','xml','csv'));
            $this->setModalViewSize(Modal::SIZE_SM);
            $this->setModalFormSize(Modal::SIZE_SM);
    
            //
            // Http Handlers
            //
    
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
        $Page = new bigcommerce_catalog_progressPage("bigcommerce_catalog_progress.php", "bigcommerce_catalog_progress", GetCurrentUserGrantForDataSource("bigcommerce_catalog_progress"), 'UTF-8');
        $Page->SetTitle('Bigcommerce Catalog Progress');
        $Page->SetMenuLabel('Bigcommerce Catalog Progress');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("bigcommerce_catalog_progress"));
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
	
