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
    
    
    
    class bcapi_categoriesPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_categories`');
            $field = new IntegerField('bcapi_categories_ID', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Cat_Name');
            $this->dataset->AddField($field, false);
            $field = new StringField('Status');
            $this->dataset->AddField($field, false);
            $field = new StringField('Cat_Id');
            $this->dataset->AddField($field, false);
            $field = new StringField('Parent_Id');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url_CLEANED');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_1');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_2');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_3');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_4');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_5');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_6');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_7');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_8');
            $this->dataset->AddField($field, false);
            $field = new StringField('KW_1');
            $this->dataset->AddField($field, false);
            $field = new StringField('KW_2');
            $this->dataset->AddField($field, false);
            $field = new StringField('KW_3');
            $this->dataset->AddField($field, false);
            $field = new StringField('KW_4');
            $this->dataset->AddField($field, false);
            $field = new StringField('KW_5');
            $this->dataset->AddField($field, false);
            $field = new StringField('KW6');
            $this->dataset->AddField($field, false);
            $field = new StringField('KW7');
            $this->dataset->AddField($field, false);
            $field = new StringField('KW8');
            $this->dataset->AddField($field, false);
            $field = new StringField('All_Keywords');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_Url');
            $this->dataset->AddField($field, false);
            $field = new StringField('Description');
            $this->dataset->AddField($field, false);
            $field = new StringField('Views');
            $this->dataset->AddField($field, false);
            $field = new StringField('Sort_Order');
            $this->dataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $this->dataset->AddField($field, false);
            $field = new StringField('Meta_Keywords_0');
            $this->dataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $this->dataset->AddField($field, false);
            $field = new StringField('Description_No_HTML');
            $this->dataset->AddField($field, false);
            $field = new StringField('Layout_File');
            $this->dataset->AddField($field, false);
            $field = new StringField('Image_Url');
            $this->dataset->AddField($field, false);
            $field = new StringField('Is_Visible');
            $this->dataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $this->dataset->AddField($field, false);
            $field = new StringField('Default_Product_Sort');
            $this->dataset->AddField($field, false);
            $field = new StringField('Custom_Url_Is_Customized');
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
            $grid->SearchControl = new SimpleSearch('bcapi_categoriesssearch', $this->dataset,
                array('Cat_Name', 'Status', 'Cat_Id', 'Parent_Id', 'Custom_Url_Url_CLEANED', 'Custom_Url_1', 'Custom_Url_2', 'Custom_Url_3', 'Custom_Url_4', 'Custom_Url_5', 'Custom_Url_6', 'Custom_Url_7', 'Custom_Url_8', 'KW_1', 'KW_2', 'KW_3', 'KW_4', 'KW_5', 'KW6', 'KW7', 'KW8', 'All_Keywords', 'Custom_Url_Url', 'Description', 'Views', 'Sort_Order', 'Page_Title', 'Meta_Keywords_0', 'Meta_Description', 'Description_No_HTML', 'Layout_File', 'Image_Url', 'Is_Visible', 'Search_Keywords', 'Default_Product_Sort', 'Custom_Url_Is_Customized'),
                array($this->RenderText('Cat Name'), $this->RenderText('Status'), $this->RenderText('Cat Id'), $this->RenderText('Parent Id'), $this->RenderText('Custom Url Url CLEANED'), $this->RenderText('Custom Url 1'), $this->RenderText('Custom Url 2'), $this->RenderText('Custom Url 3'), $this->RenderText('Custom Url 4'), $this->RenderText('Custom Url 5'), $this->RenderText('Custom Url 6'), $this->RenderText('Custom Url 7'), $this->RenderText('Custom Url 8'), $this->RenderText('KW 1'), $this->RenderText('KW 2'), $this->RenderText('KW 3'), $this->RenderText('KW 4'), $this->RenderText('KW 5'), $this->RenderText('KW6'), $this->RenderText('KW7'), $this->RenderText('KW8'), $this->RenderText('All Keywords'), $this->RenderText('Custom Url Url'), $this->RenderText('Description'), $this->RenderText('Views'), $this->RenderText('Sort Order'), $this->RenderText('Page Title'), $this->RenderText('Meta Keywords 0'), $this->RenderText('Meta Description'), $this->RenderText('Description No HTML'), $this->RenderText('Layout File'), $this->RenderText('Image Url'), $this->RenderText('Is Visible'), $this->RenderText('Search Keywords'), $this->RenderText('Default Product Sort'), $this->RenderText('Custom Url Is Customized')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('bcapi_categoriesasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cat_Name', $this->RenderText('Cat Name')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Status', $this->RenderText('Status')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cat_Id', $this->RenderText('Cat Id')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Parent_Id', $this->RenderText('Parent Id')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_Url_CLEANED', $this->RenderText('Custom Url Url CLEANED')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_1', $this->RenderText('Custom Url 1')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_2', $this->RenderText('Custom Url 2')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_3', $this->RenderText('Custom Url 3')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_4', $this->RenderText('Custom Url 4')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_5', $this->RenderText('Custom Url 5')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_6', $this->RenderText('Custom Url 6')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_7', $this->RenderText('Custom Url 7')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_8', $this->RenderText('Custom Url 8')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('KW_1', $this->RenderText('KW 1')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('KW_2', $this->RenderText('KW 2')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('KW_3', $this->RenderText('KW 3')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('KW_4', $this->RenderText('KW 4')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('KW_5', $this->RenderText('KW 5')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('KW6', $this->RenderText('KW6')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('KW7', $this->RenderText('KW7')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('KW8', $this->RenderText('KW8')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('All_Keywords', $this->RenderText('All Keywords')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_Url', $this->RenderText('Custom Url Url')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Description', $this->RenderText('Description')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Views', $this->RenderText('Views')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Sort_Order', $this->RenderText('Sort Order')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Page_Title', $this->RenderText('Page Title')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Meta_Keywords_0', $this->RenderText('Meta Keywords 0')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Meta_Description', $this->RenderText('Meta Description')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Description_No_HTML', $this->RenderText('Description No HTML')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Layout_File', $this->RenderText('Layout File')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Image_Url', $this->RenderText('Image Url')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Is_Visible', $this->RenderText('Is Visible')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Search_Keywords', $this->RenderText('Search Keywords')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Default_Product_Sort', $this->RenderText('Default Product Sort')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Custom_Url_Is_Customized', $this->RenderText('Custom Url Is Customized')));
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
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('Cat_Name', 'Cat Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Cat_Name_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cat_Id field
            //
            $column = new TextViewColumn('Cat_Id', 'Cat Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Parent_Id field
            //
            $column = new TextViewColumn('Parent_Id', 'Parent Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_Url_CLEANED field
            //
            $column = new TextViewColumn('Custom_Url_Url_CLEANED', 'Custom Url Url CLEANED', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_Url_CLEANED_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_1 field
            //
            $column = new TextViewColumn('Custom_Url_1', 'Custom Url 1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_1_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_2 field
            //
            $column = new TextViewColumn('Custom_Url_2', 'Custom Url 2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_2_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_3 field
            //
            $column = new TextViewColumn('Custom_Url_3', 'Custom Url 3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_3_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_4 field
            //
            $column = new TextViewColumn('Custom_Url_4', 'Custom Url 4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_4_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_5 field
            //
            $column = new TextViewColumn('Custom_Url_5', 'Custom Url 5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_5_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_6 field
            //
            $column = new TextViewColumn('Custom_Url_6', 'Custom Url 6', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_6_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_7 field
            //
            $column = new TextViewColumn('Custom_Url_7', 'Custom Url 7', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_7_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_8 field
            //
            $column = new TextViewColumn('Custom_Url_8', 'Custom Url 8', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_8_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for KW_1 field
            //
            $column = new TextViewColumn('KW_1', 'KW 1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW_1_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for KW_2 field
            //
            $column = new TextViewColumn('KW_2', 'KW 2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW_2_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for KW_3 field
            //
            $column = new TextViewColumn('KW_3', 'KW 3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW_3_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for KW_4 field
            //
            $column = new TextViewColumn('KW_4', 'KW 4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW_4_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for KW_5 field
            //
            $column = new TextViewColumn('KW_5', 'KW 5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW_5_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for KW6 field
            //
            $column = new TextViewColumn('KW6', 'KW6', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW6_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for KW7 field
            //
            $column = new TextViewColumn('KW7', 'KW7', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW7_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for KW8 field
            //
            $column = new TextViewColumn('KW8', 'KW8', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW8_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for All_Keywords field
            //
            $column = new TextViewColumn('All_Keywords', 'All Keywords', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_All_Keywords_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_Url field
            //
            $column = new TextViewColumn('Custom_Url_Url', 'Custom Url Url', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_Url_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Description_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Views field
            //
            $column = new TextViewColumn('Views', 'Views', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Sort_Order field
            //
            $column = new TextViewColumn('Sort_Order', 'Sort Order', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Page_Title_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Meta_Keywords_0 field
            //
            $column = new TextViewColumn('Meta_Keywords_0', 'Meta Keywords 0', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Meta_Keywords_0_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Meta_Description field
            //
            $column = new TextViewColumn('Meta_Description', 'Meta Description', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Description_No_HTML field
            //
            $column = new TextViewColumn('Description_No_HTML', 'Description No HTML', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Description_No_HTML_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Layout_File field
            //
            $column = new TextViewColumn('Layout_File', 'Layout File', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Layout_File_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Image_Url field
            //
            $column = new TextViewColumn('Image_Url', 'Image Url', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Image_Url_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Is_Visible field
            //
            $column = new TextViewColumn('Is_Visible', 'Is Visible', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Is_Visible_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Search_Keywords_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Default_Product_Sort field
            //
            $column = new TextViewColumn('Default_Product_Sort', 'Default Product Sort', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Default_Product_Sort_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Custom_Url_Is_Customized field
            //
            $column = new TextViewColumn('Custom_Url_Is_Customized', 'Custom Url Is Customized', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_Is_Customized_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('Cat_Name', 'Cat Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Cat_Name_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat_Id field
            //
            $column = new TextViewColumn('Cat_Id', 'Cat Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Parent_Id field
            //
            $column = new TextViewColumn('Parent_Id', 'Parent Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_Url_CLEANED field
            //
            $column = new TextViewColumn('Custom_Url_Url_CLEANED', 'Custom Url Url CLEANED', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_Url_CLEANED_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_1 field
            //
            $column = new TextViewColumn('Custom_Url_1', 'Custom Url 1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_1_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_2 field
            //
            $column = new TextViewColumn('Custom_Url_2', 'Custom Url 2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_2_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_3 field
            //
            $column = new TextViewColumn('Custom_Url_3', 'Custom Url 3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_3_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_4 field
            //
            $column = new TextViewColumn('Custom_Url_4', 'Custom Url 4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_4_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_5 field
            //
            $column = new TextViewColumn('Custom_Url_5', 'Custom Url 5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_5_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_6 field
            //
            $column = new TextViewColumn('Custom_Url_6', 'Custom Url 6', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_6_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_7 field
            //
            $column = new TextViewColumn('Custom_Url_7', 'Custom Url 7', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_7_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_8 field
            //
            $column = new TextViewColumn('Custom_Url_8', 'Custom Url 8', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_8_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KW_1 field
            //
            $column = new TextViewColumn('KW_1', 'KW 1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW_1_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KW_2 field
            //
            $column = new TextViewColumn('KW_2', 'KW 2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW_2_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KW_3 field
            //
            $column = new TextViewColumn('KW_3', 'KW 3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW_3_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KW_4 field
            //
            $column = new TextViewColumn('KW_4', 'KW 4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW_4_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KW_5 field
            //
            $column = new TextViewColumn('KW_5', 'KW 5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW_5_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KW6 field
            //
            $column = new TextViewColumn('KW6', 'KW6', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW6_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KW7 field
            //
            $column = new TextViewColumn('KW7', 'KW7', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW7_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for KW8 field
            //
            $column = new TextViewColumn('KW8', 'KW8', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_KW8_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for All_Keywords field
            //
            $column = new TextViewColumn('All_Keywords', 'All Keywords', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_All_Keywords_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_Url field
            //
            $column = new TextViewColumn('Custom_Url_Url', 'Custom Url Url', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_Url_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Description_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Views field
            //
            $column = new TextViewColumn('Views', 'Views', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Sort_Order field
            //
            $column = new TextViewColumn('Sort_Order', 'Sort Order', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Page_Title_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Meta_Keywords_0 field
            //
            $column = new TextViewColumn('Meta_Keywords_0', 'Meta Keywords 0', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Meta_Keywords_0_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Meta_Description field
            //
            $column = new TextViewColumn('Meta_Description', 'Meta Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Description_No_HTML field
            //
            $column = new TextViewColumn('Description_No_HTML', 'Description No HTML', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Description_No_HTML_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Layout_File field
            //
            $column = new TextViewColumn('Layout_File', 'Layout File', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Layout_File_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Image_Url field
            //
            $column = new TextViewColumn('Image_Url', 'Image Url', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Image_Url_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Is_Visible field
            //
            $column = new TextViewColumn('Is_Visible', 'Is Visible', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Is_Visible_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Search_Keywords_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Default_Product_Sort field
            //
            $column = new TextViewColumn('Default_Product_Sort', 'Default Product Sort', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Default_Product_Sort_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Custom_Url_Is_Customized field
            //
            $column = new TextViewColumn('Custom_Url_Is_Customized', 'Custom Url Is Customized', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_categoriesGrid_Custom_Url_Is_Customized_handler_view');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for Cat_Name field
            //
            $editor = new TextEdit('cat_name_edit');
            $editColumn = new CustomEditColumn('Cat Name', 'Cat_Name', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Status field
            //
            $editor = new TextEdit('status_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Status', 'Status', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Cat_Id field
            //
            $editor = new TextEdit('cat_id_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Cat Id', 'Cat_Id', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Parent_Id field
            //
            $editor = new TextEdit('parent_id_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Parent Id', 'Parent_Id', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_Url_CLEANED field
            //
            $editor = new TextAreaEdit('custom_url_url_cleaned_edit', 50, 8);
            $editColumn = new CustomEditColumn('Custom Url Url CLEANED', 'Custom_Url_Url_CLEANED', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_1 field
            //
            $editor = new TextEdit('custom_url_1_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 1', 'Custom_Url_1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_2 field
            //
            $editor = new TextEdit('custom_url_2_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 2', 'Custom_Url_2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_3 field
            //
            $editor = new TextEdit('custom_url_3_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 3', 'Custom_Url_3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_4 field
            //
            $editor = new TextEdit('custom_url_4_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 4', 'Custom_Url_4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_5 field
            //
            $editor = new TextEdit('custom_url_5_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 5', 'Custom_Url_5', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_6 field
            //
            $editor = new TextEdit('custom_url_6_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 6', 'Custom_Url_6', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_7 field
            //
            $editor = new TextEdit('custom_url_7_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 7', 'Custom_Url_7', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_8 field
            //
            $editor = new TextEdit('custom_url_8_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 8', 'Custom_Url_8', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KW_1 field
            //
            $editor = new TextEdit('kw_1_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW 1', 'KW_1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KW_2 field
            //
            $editor = new TextEdit('kw_2_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW 2', 'KW_2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KW_3 field
            //
            $editor = new TextEdit('kw_3_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW 3', 'KW_3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KW_4 field
            //
            $editor = new TextEdit('kw_4_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW 4', 'KW_4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KW_5 field
            //
            $editor = new TextEdit('kw_5_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW 5', 'KW_5', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KW6 field
            //
            $editor = new TextEdit('kw6_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW6', 'KW6', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KW7 field
            //
            $editor = new TextEdit('kw7_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW7', 'KW7', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for KW8 field
            //
            $editor = new TextEdit('kw8_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW8', 'KW8', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for All_Keywords field
            //
            $editor = new TextAreaEdit('all_keywords_edit', 50, 8);
            $editColumn = new CustomEditColumn('All Keywords', 'All_Keywords', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_Url field
            //
            $editor = new TextAreaEdit('custom_url_url_edit', 50, 8);
            $editColumn = new CustomEditColumn('Custom Url Url', 'Custom_Url_Url', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Description field
            //
            $editor = new TextAreaEdit('description_edit', 50, 8);
            $editColumn = new CustomEditColumn('Description', 'Description', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Views field
            //
            $editor = new TextEdit('views_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Views', 'Views', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Sort_Order field
            //
            $editor = new TextEdit('sort_order_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Sort Order', 'Sort_Order', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Page_Title field
            //
            $editor = new TextEdit('page_title_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Page Title', 'Page_Title', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Meta_Keywords_0 field
            //
            $editor = new TextEdit('meta_keywords_0_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Meta Keywords 0', 'Meta_Keywords_0', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Meta_Description field
            //
            $editor = new TextEdit('meta_description_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Meta Description', 'Meta_Description', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Description_No_HTML field
            //
            $editor = new TextAreaEdit('description_no_html_edit', 50, 8);
            $editColumn = new CustomEditColumn('Description No HTML', 'Description_No_HTML', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Layout_File field
            //
            $editor = new TextEdit('layout_file_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Layout File', 'Layout_File', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Image_Url field
            //
            $editor = new TextEdit('image_url_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Image Url', 'Image_Url', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Is_Visible field
            //
            $editor = new TextEdit('is_visible_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Is Visible', 'Is_Visible', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Search_Keywords field
            //
            $editor = new TextEdit('search_keywords_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Search Keywords', 'Search_Keywords', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Default_Product_Sort field
            //
            $editor = new TextEdit('default_product_sort_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Default Product Sort', 'Default_Product_Sort', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Custom_Url_Is_Customized field
            //
            $editor = new TextEdit('custom_url_is_customized_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url Is Customized', 'Custom_Url_Is_Customized', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for Cat_Name field
            //
            $editor = new TextEdit('cat_name_edit');
            $editColumn = new CustomEditColumn('Cat Name', 'Cat_Name', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Status field
            //
            $editor = new TextEdit('status_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Status', 'Status', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Cat_Id field
            //
            $editor = new TextEdit('cat_id_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Cat Id', 'Cat_Id', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Parent_Id field
            //
            $editor = new TextEdit('parent_id_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Parent Id', 'Parent_Id', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_Url_CLEANED field
            //
            $editor = new TextAreaEdit('custom_url_url_cleaned_edit', 50, 8);
            $editColumn = new CustomEditColumn('Custom Url Url CLEANED', 'Custom_Url_Url_CLEANED', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_1 field
            //
            $editor = new TextEdit('custom_url_1_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 1', 'Custom_Url_1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_2 field
            //
            $editor = new TextEdit('custom_url_2_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 2', 'Custom_Url_2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_3 field
            //
            $editor = new TextEdit('custom_url_3_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 3', 'Custom_Url_3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_4 field
            //
            $editor = new TextEdit('custom_url_4_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 4', 'Custom_Url_4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_5 field
            //
            $editor = new TextEdit('custom_url_5_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 5', 'Custom_Url_5', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_6 field
            //
            $editor = new TextEdit('custom_url_6_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 6', 'Custom_Url_6', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_7 field
            //
            $editor = new TextEdit('custom_url_7_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 7', 'Custom_Url_7', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_8 field
            //
            $editor = new TextEdit('custom_url_8_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url 8', 'Custom_Url_8', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KW_1 field
            //
            $editor = new TextEdit('kw_1_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW 1', 'KW_1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KW_2 field
            //
            $editor = new TextEdit('kw_2_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW 2', 'KW_2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KW_3 field
            //
            $editor = new TextEdit('kw_3_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW 3', 'KW_3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KW_4 field
            //
            $editor = new TextEdit('kw_4_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW 4', 'KW_4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KW_5 field
            //
            $editor = new TextEdit('kw_5_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW 5', 'KW_5', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KW6 field
            //
            $editor = new TextEdit('kw6_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW6', 'KW6', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KW7 field
            //
            $editor = new TextEdit('kw7_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW7', 'KW7', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for KW8 field
            //
            $editor = new TextEdit('kw8_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('KW8', 'KW8', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for All_Keywords field
            //
            $editor = new TextAreaEdit('all_keywords_edit', 50, 8);
            $editColumn = new CustomEditColumn('All Keywords', 'All_Keywords', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_Url field
            //
            $editor = new TextAreaEdit('custom_url_url_edit', 50, 8);
            $editColumn = new CustomEditColumn('Custom Url Url', 'Custom_Url_Url', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Description field
            //
            $editor = new TextAreaEdit('description_edit', 50, 8);
            $editColumn = new CustomEditColumn('Description', 'Description', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Views field
            //
            $editor = new TextEdit('views_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Views', 'Views', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Sort_Order field
            //
            $editor = new TextEdit('sort_order_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Sort Order', 'Sort_Order', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Page_Title field
            //
            $editor = new TextEdit('page_title_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Page Title', 'Page_Title', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Meta_Keywords_0 field
            //
            $editor = new TextEdit('meta_keywords_0_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Meta Keywords 0', 'Meta_Keywords_0', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Meta_Description field
            //
            $editor = new TextEdit('meta_description_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Meta Description', 'Meta_Description', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Description_No_HTML field
            //
            $editor = new TextAreaEdit('description_no_html_edit', 50, 8);
            $editColumn = new CustomEditColumn('Description No HTML', 'Description_No_HTML', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Layout_File field
            //
            $editor = new TextEdit('layout_file_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Layout File', 'Layout_File', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Image_Url field
            //
            $editor = new TextEdit('image_url_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Image Url', 'Image_Url', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Is_Visible field
            //
            $editor = new TextEdit('is_visible_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Is Visible', 'Is_Visible', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Search_Keywords field
            //
            $editor = new TextEdit('search_keywords_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Search Keywords', 'Search_Keywords', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Default_Product_Sort field
            //
            $editor = new TextEdit('default_product_sort_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Default Product Sort', 'Default_Product_Sort', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Custom_Url_Is_Customized field
            //
            $editor = new TextEdit('custom_url_is_customized_edit');
            $editor->SetMaxLength(500);
            $editColumn = new CustomEditColumn('Custom Url Is Customized', 'Custom_Url_Is_Customized', $editor, $this->dataset);
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
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('Cat_Name', 'Cat Name', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cat_Id field
            //
            $column = new TextViewColumn('Cat_Id', 'Cat Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Parent_Id field
            //
            $column = new TextViewColumn('Parent_Id', 'Parent Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_Url_CLEANED field
            //
            $column = new TextViewColumn('Custom_Url_Url_CLEANED', 'Custom Url Url CLEANED', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_1 field
            //
            $column = new TextViewColumn('Custom_Url_1', 'Custom Url 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_2 field
            //
            $column = new TextViewColumn('Custom_Url_2', 'Custom Url 2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_3 field
            //
            $column = new TextViewColumn('Custom_Url_3', 'Custom Url 3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_4 field
            //
            $column = new TextViewColumn('Custom_Url_4', 'Custom Url 4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_5 field
            //
            $column = new TextViewColumn('Custom_Url_5', 'Custom Url 5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_6 field
            //
            $column = new TextViewColumn('Custom_Url_6', 'Custom Url 6', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_7 field
            //
            $column = new TextViewColumn('Custom_Url_7', 'Custom Url 7', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_8 field
            //
            $column = new TextViewColumn('Custom_Url_8', 'Custom Url 8', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KW_1 field
            //
            $column = new TextViewColumn('KW_1', 'KW 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KW_2 field
            //
            $column = new TextViewColumn('KW_2', 'KW 2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KW_3 field
            //
            $column = new TextViewColumn('KW_3', 'KW 3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KW_4 field
            //
            $column = new TextViewColumn('KW_4', 'KW 4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KW_5 field
            //
            $column = new TextViewColumn('KW_5', 'KW 5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KW6 field
            //
            $column = new TextViewColumn('KW6', 'KW6', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KW7 field
            //
            $column = new TextViewColumn('KW7', 'KW7', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for KW8 field
            //
            $column = new TextViewColumn('KW8', 'KW8', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for All_Keywords field
            //
            $column = new TextViewColumn('All_Keywords', 'All Keywords', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_Url field
            //
            $column = new TextViewColumn('Custom_Url_Url', 'Custom Url Url', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Views field
            //
            $column = new TextViewColumn('Views', 'Views', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Sort_Order field
            //
            $column = new TextViewColumn('Sort_Order', 'Sort Order', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Meta_Keywords_0 field
            //
            $column = new TextViewColumn('Meta_Keywords_0', 'Meta Keywords 0', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Meta_Description field
            //
            $column = new TextViewColumn('Meta_Description', 'Meta Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Description_No_HTML field
            //
            $column = new TextViewColumn('Description_No_HTML', 'Description No HTML', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Layout_File field
            //
            $column = new TextViewColumn('Layout_File', 'Layout File', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Image_Url field
            //
            $column = new TextViewColumn('Image_Url', 'Image Url', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Is_Visible field
            //
            $column = new TextViewColumn('Is_Visible', 'Is Visible', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Default_Product_Sort field
            //
            $column = new TextViewColumn('Default_Product_Sort', 'Default Product Sort', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Custom_Url_Is_Customized field
            //
            $column = new TextViewColumn('Custom_Url_Is_Customized', 'Custom Url Is Customized', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for bcapi_categories_ID field
            //
            $column = new TextViewColumn('bcapi_categories_ID', 'Bcapi Categories ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('Cat_Name', 'Cat Name', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat_Id field
            //
            $column = new TextViewColumn('Cat_Id', 'Cat Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Parent_Id field
            //
            $column = new TextViewColumn('Parent_Id', 'Parent Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_Url_CLEANED field
            //
            $column = new TextViewColumn('Custom_Url_Url_CLEANED', 'Custom Url Url CLEANED', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_1 field
            //
            $column = new TextViewColumn('Custom_Url_1', 'Custom Url 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_2 field
            //
            $column = new TextViewColumn('Custom_Url_2', 'Custom Url 2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_3 field
            //
            $column = new TextViewColumn('Custom_Url_3', 'Custom Url 3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_4 field
            //
            $column = new TextViewColumn('Custom_Url_4', 'Custom Url 4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_5 field
            //
            $column = new TextViewColumn('Custom_Url_5', 'Custom Url 5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_6 field
            //
            $column = new TextViewColumn('Custom_Url_6', 'Custom Url 6', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_7 field
            //
            $column = new TextViewColumn('Custom_Url_7', 'Custom Url 7', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_8 field
            //
            $column = new TextViewColumn('Custom_Url_8', 'Custom Url 8', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KW_1 field
            //
            $column = new TextViewColumn('KW_1', 'KW 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KW_2 field
            //
            $column = new TextViewColumn('KW_2', 'KW 2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KW_3 field
            //
            $column = new TextViewColumn('KW_3', 'KW 3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KW_4 field
            //
            $column = new TextViewColumn('KW_4', 'KW 4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KW_5 field
            //
            $column = new TextViewColumn('KW_5', 'KW 5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KW6 field
            //
            $column = new TextViewColumn('KW6', 'KW6', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KW7 field
            //
            $column = new TextViewColumn('KW7', 'KW7', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for KW8 field
            //
            $column = new TextViewColumn('KW8', 'KW8', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for All_Keywords field
            //
            $column = new TextViewColumn('All_Keywords', 'All Keywords', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_Url field
            //
            $column = new TextViewColumn('Custom_Url_Url', 'Custom Url Url', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Views field
            //
            $column = new TextViewColumn('Views', 'Views', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Sort_Order field
            //
            $column = new TextViewColumn('Sort_Order', 'Sort Order', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Meta_Keywords_0 field
            //
            $column = new TextViewColumn('Meta_Keywords_0', 'Meta Keywords 0', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Meta_Description field
            //
            $column = new TextViewColumn('Meta_Description', 'Meta Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Description_No_HTML field
            //
            $column = new TextViewColumn('Description_No_HTML', 'Description No HTML', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Layout_File field
            //
            $column = new TextViewColumn('Layout_File', 'Layout File', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Image_Url field
            //
            $column = new TextViewColumn('Image_Url', 'Image Url', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Is_Visible field
            //
            $column = new TextViewColumn('Is_Visible', 'Is Visible', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Default_Product_Sort field
            //
            $column = new TextViewColumn('Default_Product_Sort', 'Default Product Sort', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Custom_Url_Is_Customized field
            //
            $column = new TextViewColumn('Custom_Url_Is_Customized', 'Custom Url Is Customized', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'bcapi_categories_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'bcapi_categoriesGrid');
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
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('Cat_Name', 'Cat Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Cat_Name_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_Url_CLEANED field
            //
            $column = new TextViewColumn('Custom_Url_Url_CLEANED', 'Custom Url Url CLEANED', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_Url_CLEANED_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_1 field
            //
            $column = new TextViewColumn('Custom_Url_1', 'Custom Url 1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_1_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_2 field
            //
            $column = new TextViewColumn('Custom_Url_2', 'Custom Url 2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_2_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_3 field
            //
            $column = new TextViewColumn('Custom_Url_3', 'Custom Url 3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_3_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_4 field
            //
            $column = new TextViewColumn('Custom_Url_4', 'Custom Url 4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_4_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_5 field
            //
            $column = new TextViewColumn('Custom_Url_5', 'Custom Url 5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_5_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_6 field
            //
            $column = new TextViewColumn('Custom_Url_6', 'Custom Url 6', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_6_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_7 field
            //
            $column = new TextViewColumn('Custom_Url_7', 'Custom Url 7', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_7_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_8 field
            //
            $column = new TextViewColumn('Custom_Url_8', 'Custom Url 8', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_8_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW_1 field
            //
            $column = new TextViewColumn('KW_1', 'KW 1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW_1_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW_2 field
            //
            $column = new TextViewColumn('KW_2', 'KW 2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW_2_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW_3 field
            //
            $column = new TextViewColumn('KW_3', 'KW 3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW_3_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW_4 field
            //
            $column = new TextViewColumn('KW_4', 'KW 4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW_4_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW_5 field
            //
            $column = new TextViewColumn('KW_5', 'KW 5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW_5_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW6 field
            //
            $column = new TextViewColumn('KW6', 'KW6', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW6_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW7 field
            //
            $column = new TextViewColumn('KW7', 'KW7', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW7_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW8 field
            //
            $column = new TextViewColumn('KW8', 'KW8', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW8_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for All_Keywords field
            //
            $column = new TextViewColumn('All_Keywords', 'All Keywords', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_All_Keywords_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_Url field
            //
            $column = new TextViewColumn('Custom_Url_Url', 'Custom Url Url', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_Url_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Description_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Page_Title_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Meta_Keywords_0 field
            //
            $column = new TextViewColumn('Meta_Keywords_0', 'Meta Keywords 0', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Meta_Keywords_0_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Description_No_HTML field
            //
            $column = new TextViewColumn('Description_No_HTML', 'Description No HTML', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Description_No_HTML_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Layout_File field
            //
            $column = new TextViewColumn('Layout_File', 'Layout File', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Layout_File_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Image_Url field
            //
            $column = new TextViewColumn('Image_Url', 'Image Url', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Image_Url_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Is_Visible field
            //
            $column = new TextViewColumn('Is_Visible', 'Is Visible', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Is_Visible_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Search_Keywords_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Default_Product_Sort field
            //
            $column = new TextViewColumn('Default_Product_Sort', 'Default Product Sort', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Default_Product_Sort_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_Is_Customized field
            //
            $column = new TextViewColumn('Custom_Url_Is_Customized', 'Custom Url Is Customized', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_Is_Customized_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for Cat_Name field
            //
            $column = new TextViewColumn('Cat_Name', 'Cat Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Cat_Name_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_Url_CLEANED field
            //
            $column = new TextViewColumn('Custom_Url_Url_CLEANED', 'Custom Url Url CLEANED', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_Url_CLEANED_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_1 field
            //
            $column = new TextViewColumn('Custom_Url_1', 'Custom Url 1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_1_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_2 field
            //
            $column = new TextViewColumn('Custom_Url_2', 'Custom Url 2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_2_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_3 field
            //
            $column = new TextViewColumn('Custom_Url_3', 'Custom Url 3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_3_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_4 field
            //
            $column = new TextViewColumn('Custom_Url_4', 'Custom Url 4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_4_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_5 field
            //
            $column = new TextViewColumn('Custom_Url_5', 'Custom Url 5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_5_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_6 field
            //
            $column = new TextViewColumn('Custom_Url_6', 'Custom Url 6', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_6_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_7 field
            //
            $column = new TextViewColumn('Custom_Url_7', 'Custom Url 7', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_7_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_8 field
            //
            $column = new TextViewColumn('Custom_Url_8', 'Custom Url 8', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_8_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW_1 field
            //
            $column = new TextViewColumn('KW_1', 'KW 1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW_1_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW_2 field
            //
            $column = new TextViewColumn('KW_2', 'KW 2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW_2_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW_3 field
            //
            $column = new TextViewColumn('KW_3', 'KW 3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW_3_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW_4 field
            //
            $column = new TextViewColumn('KW_4', 'KW 4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW_4_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW_5 field
            //
            $column = new TextViewColumn('KW_5', 'KW 5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW_5_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW6 field
            //
            $column = new TextViewColumn('KW6', 'KW6', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW6_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW7 field
            //
            $column = new TextViewColumn('KW7', 'KW7', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW7_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for KW8 field
            //
            $column = new TextViewColumn('KW8', 'KW8', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_KW8_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for All_Keywords field
            //
            $column = new TextViewColumn('All_Keywords', 'All Keywords', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_All_Keywords_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_Url field
            //
            $column = new TextViewColumn('Custom_Url_Url', 'Custom Url Url', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_Url_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Description_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Page_Title_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Meta_Keywords_0 field
            //
            $column = new TextViewColumn('Meta_Keywords_0', 'Meta Keywords 0', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Meta_Keywords_0_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Description_No_HTML field
            //
            $column = new TextViewColumn('Description_No_HTML', 'Description No HTML', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Description_No_HTML_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Layout_File field
            //
            $column = new TextViewColumn('Layout_File', 'Layout File', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Layout_File_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Image_Url field
            //
            $column = new TextViewColumn('Image_Url', 'Image Url', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Image_Url_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Is_Visible field
            //
            $column = new TextViewColumn('Is_Visible', 'Is Visible', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Is_Visible_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Search_Keywords_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Default_Product_Sort field
            //
            $column = new TextViewColumn('Default_Product_Sort', 'Default Product Sort', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Default_Product_Sort_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Custom_Url_Is_Customized field
            //
            $column = new TextViewColumn('Custom_Url_Is_Customized', 'Custom Url Is Customized', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_categoriesGrid_Custom_Url_Is_Customized_handler_view', $column);
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
        $Page = new bcapi_categoriesPage("bcapi_categories.php", "bcapi_categories", GetCurrentUserGrantForDataSource("bcapi_categories"), 'UTF-8');
        $Page->SetTitle('Bcapi Categories');
        $Page->SetMenuLabel('Bcapi Categories');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("bcapi_categories"));
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
	
