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
    
    
    
    class bcapi_productsPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                new MySqlIConnectionFactory(),
                GetConnectionOptions(),
                '`bcapi_products`');
            $field = new IntegerField('bcapi_products_id', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('Status');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_SKU');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Name');
            $this->dataset->AddField($field, false);
            $field = new StringField('Last_Edit');
            $this->dataset->AddField($field, false);
            $field = new StringField('Editor');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_ID');
            $this->dataset->AddField($field, false);
            $field = new StringField('Item_Type');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Type');
            $this->dataset->AddField($field, false);
            $field = new StringField('Parent_SKU');
            $this->dataset->AddField($field, false);
            $field = new StringField('SKU1');
            $this->dataset->AddField($field, false);
            $field = new StringField('SKU2');
            $this->dataset->AddField($field, false);
            $field = new StringField('SKU3');
            $this->dataset->AddField($field, false);
            $field = new StringField('SKU4');
            $this->dataset->AddField($field, false);
            $field = new StringField('SKU5');
            $this->dataset->AddField($field, false);
            $field = new StringField('SKU6');
            $this->dataset->AddField($field, false);
            $field = new StringField('SKU7');
            $this->dataset->AddField($field, false);
            $field = new StringField('Manufacturer_SKU');
            $this->dataset->AddField($field, false);
            $field = new StringField('ACCPAC_SKU');
            $this->dataset->AddField($field, false);
            $field = new StringField('Bin_Picking_Number');
            $this->dataset->AddField($field, false);
            $field = new StringField('Option_Set');
            $this->dataset->AddField($field, false);
            $field = new StringField('Option_Set_Align');
            $this->dataset->AddField($field, false);
            $field = new StringField('Category');
            $this->dataset->AddField($field, false);
            $field = new StringField('Catalog');
            $this->dataset->AddField($field, false);
            $field = new StringField('Cat1_ID');
            $this->dataset->AddField($field, false);
            $field = new StringField('Cat2_ID');
            $this->dataset->AddField($field, false);
            $field = new StringField('Cat3_ID');
            $this->dataset->AddField($field, false);
            $field = new StringField('Category_Path');
            $this->dataset->AddField($field, false);
            $field = new StringField('Cat1');
            $this->dataset->AddField($field, false);
            $field = new StringField('Cat2');
            $this->dataset->AddField($field, false);
            $field = new StringField('Cat3');
            $this->dataset->AddField($field, false);
            $field = new StringField('Cat4');
            $this->dataset->AddField($field, false);
            $field = new StringField('Cat5');
            $this->dataset->AddField($field, false);
            $field = new StringField('Catalog_Category');
            $this->dataset->AddField($field, false);
            $field = new StringField('Allow_Purchases?');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Visible?');
            $this->dataset->AddField($field, false);
            $field = new StringField('Track_Inventory');
            $this->dataset->AddField($field, false);
            $field = new StringField('Stock');
            $this->dataset->AddField($field, false);
            $field = new StringField('Low_Stock_Level');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Tax_Class');
            $this->dataset->AddField($field, false);
            $field = new StringField('List_Price');
            $this->dataset->AddField($field, false);
            $field = new StringField('Cost_Price');
            $this->dataset->AddField($field, false);
            $field = new StringField('Retail_Price');
            $this->dataset->AddField($field, false);
            $field = new StringField('Sale_Price');
            $this->dataset->AddField($field, false);
            $field = new StringField('Fixed_Shipping_Cost');
            $this->dataset->AddField($field, false);
            $field = new StringField('Free_Shipping');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Condition');
            $this->dataset->AddField($field, false);
            $field = new StringField('Show_Product_Condition?');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Image_File_1');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Image_ID_1');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Image_URL');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Image_Description');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Image_Is_Thumbnail');
            $this->dataset->AddField($field, false);
            $field = new StringField('Original_HTML_Path');
            $this->dataset->AddField($field, false);
            $field = new StringField('Original_Image_Path');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Image_Index');
            $this->dataset->AddField($field, false);
            $field = new StringField('PDF_File');
            $this->dataset->AddField($field, false);
            $field = new StringField('Brand');
            $this->dataset->AddField($field, false);
            $field = new StringField('Catalog_Page_Number');
            $this->dataset->AddField($field, false);
            $field = new StringField('Description');
            $this->dataset->AddField($field, false);
            $field = new StringField('Weight');
            $this->dataset->AddField($field, false);
            $field = new StringField('Width');
            $this->dataset->AddField($field, false);
            $field = new StringField('Height');
            $this->dataset->AddField($field, false);
            $field = new StringField('Depth');
            $this->dataset->AddField($field, false);
            $field = new StringField('Search_Keywords');
            $this->dataset->AddField($field, false);
            $field = new StringField('Page_Title');
            $this->dataset->AddField($field, false);
            $field = new StringField('Meta_Keywords');
            $this->dataset->AddField($field, false);
            $field = new StringField('Meta_Description');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_URL');
            $this->dataset->AddField($field, false);
            $field = new StringField('Product_Custom_Fields');
            $this->dataset->AddField($field, false);
            $field = new StringField('CF1');
            $this->dataset->AddField($field, false);
            $field = new StringField('CF2');
            $this->dataset->AddField($field, false);
            $field = new StringField('CF3');
            $this->dataset->AddField($field, false);
            $field = new StringField('CF4');
            $this->dataset->AddField($field, false);
            $field = new StringField('CF5');
            $this->dataset->AddField($field, false);
            $field = new StringField('CF6');
            $this->dataset->AddField($field, false);
            $field = new StringField('CF7');
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
            $grid->SearchControl = new SimpleSearch('bcapi_productsssearch', $this->dataset,
                array('Status', 'Product_SKU', 'Product_Name', 'Last_Edit', 'Editor', 'Product_ID', 'Item_Type', 'Product_Type', 'Parent_SKU', 'SKU1', 'SKU2', 'SKU3', 'SKU4', 'SKU5', 'SKU6', 'SKU7', 'Manufacturer_SKU', 'ACCPAC_SKU', 'Bin_Picking_Number', 'Option_Set', 'Option_Set_Align', 'Category', 'Catalog', 'Cat1_ID', 'Cat2_ID', 'Cat3_ID', 'Category_Path', 'Cat1', 'Cat2', 'Cat3', 'Cat4', 'Cat5', 'Catalog_Category', 'Allow_Purchases?', 'Product_Visible?', 'Track_Inventory', 'Stock', 'Low_Stock_Level', 'Product_Tax_Class', 'List_Price', 'Cost_Price', 'Retail_Price', 'Sale_Price', 'Fixed_Shipping_Cost', 'Free_Shipping', 'Product_Condition', 'Show_Product_Condition?', 'Product_Image_File_1', 'Product_Image_ID_1', 'Product_Image_URL', 'Product_Image_Description', 'Product_Image_Is_Thumbnail', 'Original_HTML_Path', 'Original_Image_Path', 'Product_Image_Index', 'PDF_File', 'Brand', 'Catalog_Page_Number', 'Description', 'Weight', 'Width', 'Height', 'Depth', 'Search_Keywords', 'Page_Title', 'Meta_Keywords', 'Meta_Description', 'Product_URL', 'Product_Custom_Fields', 'CF1', 'CF2', 'CF3', 'CF4', 'CF5', 'CF6', 'CF7'),
                array($this->RenderText('Status'), $this->RenderText('Product SKU'), $this->RenderText('Product Name'), $this->RenderText('Last Edit'), $this->RenderText('Editor'), $this->RenderText('Product ID'), $this->RenderText('Item Type'), $this->RenderText('Product Type'), $this->RenderText('Parent SKU'), $this->RenderText('SKU1'), $this->RenderText('SKU2'), $this->RenderText('SKU3'), $this->RenderText('SKU4'), $this->RenderText('SKU5'), $this->RenderText('SKU6'), $this->RenderText('SKU7'), $this->RenderText('Manufacturer SKU'), $this->RenderText('ACCPAC SKU'), $this->RenderText('Bin Picking Number'), $this->RenderText('Option Set'), $this->RenderText('Option Set Align'), $this->RenderText('Category'), $this->RenderText('Catalog'), $this->RenderText('Cat1 ID'), $this->RenderText('Cat2 ID'), $this->RenderText('Cat3 ID'), $this->RenderText('Category Path'), $this->RenderText('Cat1'), $this->RenderText('Cat2'), $this->RenderText('Cat3'), $this->RenderText('Cat4'), $this->RenderText('Cat5'), $this->RenderText('Catalog Category'), $this->RenderText('Allow Purchases?'), $this->RenderText('Product Visible?'), $this->RenderText('Track Inventory'), $this->RenderText('Stock'), $this->RenderText('Low Stock Level'), $this->RenderText('Product Tax Class'), $this->RenderText('List Price'), $this->RenderText('Cost Price'), $this->RenderText('Retail Price'), $this->RenderText('Sale Price'), $this->RenderText('Fixed Shipping Cost'), $this->RenderText('Free Shipping'), $this->RenderText('Product Condition'), $this->RenderText('Show Product Condition?'), $this->RenderText('Product Image File 1'), $this->RenderText('Product Image ID 1'), $this->RenderText('Product Image URL'), $this->RenderText('Product Image Description'), $this->RenderText('Product Image Is Thumbnail'), $this->RenderText('Original HTML Path'), $this->RenderText('Original Image Path'), $this->RenderText('Product Image Index'), $this->RenderText('PDF File'), $this->RenderText('Brand'), $this->RenderText('Catalog Page Number'), $this->RenderText('Description'), $this->RenderText('Weight'), $this->RenderText('Width'), $this->RenderText('Height'), $this->RenderText('Depth'), $this->RenderText('Search Keywords'), $this->RenderText('Page Title'), $this->RenderText('Meta Keywords'), $this->RenderText('Meta Description'), $this->RenderText('Product URL'), $this->RenderText('Product Custom Fields'), $this->RenderText('CF1'), $this->RenderText('CF2'), $this->RenderText('CF3'), $this->RenderText('CF4'), $this->RenderText('CF5'), $this->RenderText('CF6'), $this->RenderText('CF7')),
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
            $this->AdvancedSearchControl = new AdvancedSearchControl('bcapi_productsasearch', $this->dataset, $this->GetLocalizerCaptions(), $this->GetColumnVariableContainer(), $this->CreateLinkBuilder());
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Status', $this->RenderText('Status')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_SKU', $this->RenderText('Product SKU')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Name', $this->RenderText('Product Name')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Last_Edit', $this->RenderText('Last Edit')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Editor', $this->RenderText('Editor')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_ID', $this->RenderText('Product ID')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Item_Type', $this->RenderText('Item Type')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Type', $this->RenderText('Product Type')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Parent_SKU', $this->RenderText('Parent SKU')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('SKU1', $this->RenderText('SKU1')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('SKU2', $this->RenderText('SKU2')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('SKU3', $this->RenderText('SKU3')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('SKU4', $this->RenderText('SKU4')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('SKU5', $this->RenderText('SKU5')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('SKU6', $this->RenderText('SKU6')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('SKU7', $this->RenderText('SKU7')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Manufacturer_SKU', $this->RenderText('Manufacturer SKU')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('ACCPAC_SKU', $this->RenderText('ACCPAC SKU')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Bin_Picking_Number', $this->RenderText('Bin Picking Number')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Option_Set', $this->RenderText('Option Set')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Option_Set_Align', $this->RenderText('Option Set Align')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Category', $this->RenderText('Category')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Catalog', $this->RenderText('Catalog')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cat1_ID', $this->RenderText('Cat1 ID')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cat2_ID', $this->RenderText('Cat2 ID')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cat3_ID', $this->RenderText('Cat3 ID')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Category_Path', $this->RenderText('Category Path')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cat1', $this->RenderText('Cat1')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cat2', $this->RenderText('Cat2')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cat3', $this->RenderText('Cat3')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cat4', $this->RenderText('Cat4')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cat5', $this->RenderText('Cat5')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Catalog_Category', $this->RenderText('Catalog Category')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Allow_Purchases?', $this->RenderText('Allow Purchases?')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Visible?', $this->RenderText('Product Visible?')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Track_Inventory', $this->RenderText('Track Inventory')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Stock', $this->RenderText('Stock')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Low_Stock_Level', $this->RenderText('Low Stock Level')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Tax_Class', $this->RenderText('Product Tax Class')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('List_Price', $this->RenderText('List Price')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Cost_Price', $this->RenderText('Cost Price')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Retail_Price', $this->RenderText('Retail Price')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Sale_Price', $this->RenderText('Sale Price')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Fixed_Shipping_Cost', $this->RenderText('Fixed Shipping Cost')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Free_Shipping', $this->RenderText('Free Shipping')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Condition', $this->RenderText('Product Condition')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Show_Product_Condition?', $this->RenderText('Show Product Condition?')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Image_File_1', $this->RenderText('Product Image File 1')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Image_ID_1', $this->RenderText('Product Image ID 1')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Image_URL', $this->RenderText('Product Image URL')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Image_Description', $this->RenderText('Product Image Description')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Image_Is_Thumbnail', $this->RenderText('Product Image Is Thumbnail')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Original_HTML_Path', $this->RenderText('Original HTML Path')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Original_Image_Path', $this->RenderText('Original Image Path')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Image_Index', $this->RenderText('Product Image Index')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('PDF_File', $this->RenderText('PDF File')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Brand', $this->RenderText('Brand')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Catalog_Page_Number', $this->RenderText('Catalog Page Number')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Description', $this->RenderText('Description')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Weight', $this->RenderText('Weight')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Width', $this->RenderText('Width')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Height', $this->RenderText('Height')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Depth', $this->RenderText('Depth')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Search_Keywords', $this->RenderText('Search Keywords')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Page_Title', $this->RenderText('Page Title')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Meta_Keywords', $this->RenderText('Meta Keywords')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Meta_Description', $this->RenderText('Meta Description')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_URL', $this->RenderText('Product URL')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('Product_Custom_Fields', $this->RenderText('Product Custom Fields')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('CF1', $this->RenderText('CF1')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('CF2', $this->RenderText('CF2')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('CF3', $this->RenderText('CF3')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('CF4', $this->RenderText('CF4')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('CF5', $this->RenderText('CF5')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('CF6', $this->RenderText('CF6')));
            $this->AdvancedSearchControl->AddSearchColumn($this->AdvancedSearchControl->CreateStringSearchInput('CF7', $this->RenderText('CF7')));
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
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Status_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_SKU field
            //
            $column = new TextViewColumn('Product_SKU', 'Product SKU', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_SKU_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Name_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Last_Edit field
            //
            $column = new TextViewColumn('Last_Edit', 'Last Edit', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Last_Edit_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Editor field
            //
            $column = new TextViewColumn('Editor', 'Editor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Editor_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_ID field
            //
            $column = new TextViewColumn('Product_ID', 'Product ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_ID_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Item_Type field
            //
            $column = new TextViewColumn('Item_Type', 'Item Type', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Item_Type_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Type field
            //
            $column = new TextViewColumn('Product_Type', 'Product Type', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Type_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Parent_SKU field
            //
            $column = new TextViewColumn('Parent_SKU', 'Parent SKU', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Parent_SKU_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for SKU1 field
            //
            $column = new TextViewColumn('SKU1', 'SKU1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU1_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for SKU2 field
            //
            $column = new TextViewColumn('SKU2', 'SKU2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU2_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for SKU3 field
            //
            $column = new TextViewColumn('SKU3', 'SKU3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU3_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for SKU4 field
            //
            $column = new TextViewColumn('SKU4', 'SKU4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU4_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for SKU5 field
            //
            $column = new TextViewColumn('SKU5', 'SKU5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU5_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for SKU6 field
            //
            $column = new TextViewColumn('SKU6', 'SKU6', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU6_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for SKU7 field
            //
            $column = new TextViewColumn('SKU7', 'SKU7', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU7_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Manufacturer_SKU field
            //
            $column = new TextViewColumn('Manufacturer_SKU', 'Manufacturer SKU', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Manufacturer_SKU_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for ACCPAC_SKU field
            //
            $column = new TextViewColumn('ACCPAC_SKU', 'ACCPAC SKU', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_ACCPAC_SKU_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Bin_Picking_Number field
            //
            $column = new TextViewColumn('Bin_Picking_Number', 'Bin Picking Number', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Bin_Picking_Number_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Option_Set field
            //
            $column = new TextViewColumn('Option_Set', 'Option Set', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Option_Set_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Option_Set_Align field
            //
            $column = new TextViewColumn('Option_Set_Align', 'Option Set Align', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Option_Set_Align_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Category field
            //
            $column = new TextViewColumn('Category', 'Category', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Category_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog', 'Catalog', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Catalog_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cat1_ID field
            //
            $column = new TextViewColumn('Cat1_ID', 'Cat1 ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat1_ID_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cat2_ID field
            //
            $column = new TextViewColumn('Cat2_ID', 'Cat2 ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat2_ID_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cat3_ID field
            //
            $column = new TextViewColumn('Cat3_ID', 'Cat3 ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat3_ID_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Category_Path field
            //
            $column = new TextViewColumn('Category_Path', 'Category Path', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Category_Path_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cat1 field
            //
            $column = new TextViewColumn('Cat1', 'Cat1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat1_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cat2 field
            //
            $column = new TextViewColumn('Cat2', 'Cat2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat2_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cat3 field
            //
            $column = new TextViewColumn('Cat3', 'Cat3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat3_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cat4 field
            //
            $column = new TextViewColumn('Cat4', 'Cat4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat4_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cat5 field
            //
            $column = new TextViewColumn('Cat5', 'Cat5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat5_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Catalog_Category field
            //
            $column = new TextViewColumn('Catalog_Category', 'Catalog Category', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Catalog_Category_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Allow_Purchases? field
            //
            $column = new TextViewColumn('Allow_Purchases?', 'Allow Purchases?', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Allow_Purchases?_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Visible? field
            //
            $column = new TextViewColumn('Product_Visible?', 'Product Visible?', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Visible?_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Track_Inventory field
            //
            $column = new TextViewColumn('Track_Inventory', 'Track Inventory', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Track_Inventory_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Stock field
            //
            $column = new TextViewColumn('Stock', 'Stock', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Stock_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Low_Stock_Level field
            //
            $column = new TextViewColumn('Low_Stock_Level', 'Low Stock Level', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Low_Stock_Level_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Tax_Class field
            //
            $column = new TextViewColumn('Product_Tax_Class', 'Product Tax Class', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Tax_Class_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for List_Price field
            //
            $column = new TextViewColumn('List_Price', 'List Price', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_List_Price_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Cost_Price field
            //
            $column = new TextViewColumn('Cost_Price', 'Cost Price', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cost_Price_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Retail_Price field
            //
            $column = new TextViewColumn('Retail_Price', 'Retail Price', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Retail_Price_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Sale_Price field
            //
            $column = new TextViewColumn('Sale_Price', 'Sale Price', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Sale_Price_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Fixed_Shipping_Cost field
            //
            $column = new TextViewColumn('Fixed_Shipping_Cost', 'Fixed Shipping Cost', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Fixed_Shipping_Cost_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Free_Shipping field
            //
            $column = new TextViewColumn('Free_Shipping', 'Free Shipping', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Free_Shipping_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Condition field
            //
            $column = new TextViewColumn('Product_Condition', 'Product Condition', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Condition_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Show_Product_Condition? field
            //
            $column = new TextViewColumn('Show_Product_Condition?', 'Show Product Condition?', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Show_Product_Condition?_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Image_File_1 field
            //
            $column = new TextViewColumn('Product_Image_File_1', 'Product Image File 1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_File_1_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Image_ID_1 field
            //
            $column = new TextViewColumn('Product_Image_ID_1', 'Product Image ID 1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_ID_1_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Image_URL field
            //
            $column = new TextViewColumn('Product_Image_URL', 'Product Image URL', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_URL_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Image_Description field
            //
            $column = new TextViewColumn('Product_Image_Description', 'Product Image Description', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_Description_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Image_Is_Thumbnail field
            //
            $column = new TextViewColumn('Product_Image_Is_Thumbnail', 'Product Image Is Thumbnail', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_Is_Thumbnail_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Original_HTML_Path field
            //
            $column = new TextViewColumn('Original_HTML_Path', 'Original HTML Path', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Original_HTML_Path_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Original_Image_Path field
            //
            $column = new TextViewColumn('Original_Image_Path', 'Original Image Path', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Original_Image_Path_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Image_Index field
            //
            $column = new TextViewColumn('Product_Image_Index', 'Product Image Index', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_Index_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for PDF_File field
            //
            $column = new TextViewColumn('PDF_File', 'PDF File', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_PDF_File_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Brand field
            //
            $column = new TextViewColumn('Brand', 'Brand', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Brand_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Catalog_Page_Number field
            //
            $column = new TextViewColumn('Catalog_Page_Number', 'Catalog Page Number', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Catalog_Page_Number_handler_list');
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
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Description_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Weight field
            //
            $column = new TextViewColumn('Weight', 'Weight', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Weight_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Width field
            //
            $column = new TextViewColumn('Width', 'Width', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Width_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Height field
            //
            $column = new TextViewColumn('Height', 'Height', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Height_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Depth field
            //
            $column = new TextViewColumn('Depth', 'Depth', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Depth_handler_list');
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
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Search_Keywords_handler_list');
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
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Page_Title_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Meta_Keywords field
            //
            $column = new TextViewColumn('Meta_Keywords', 'Meta Keywords', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Meta_Keywords_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Meta_Description field
            //
            $column = new TextViewColumn('Meta_Description', 'Meta Description', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Meta_Description_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_URL field
            //
            $column = new TextViewColumn('Product_URL', 'Product URL', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_URL_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Product_Custom_Fields field
            //
            $column = new TextViewColumn('Product_Custom_Fields', 'Product Custom Fields', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Custom_Fields_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CF1 field
            //
            $column = new TextViewColumn('CF1', 'CF1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF1_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CF2 field
            //
            $column = new TextViewColumn('CF2', 'CF2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF2_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CF3 field
            //
            $column = new TextViewColumn('CF3', 'CF3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF3_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CF4 field
            //
            $column = new TextViewColumn('CF4', 'CF4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF4_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CF5 field
            //
            $column = new TextViewColumn('CF5', 'CF5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF5_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CF6 field
            //
            $column = new TextViewColumn('CF6', 'CF6', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF6_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CF7 field
            //
            $column = new TextViewColumn('CF7', 'CF7', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF7_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Status_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_SKU field
            //
            $column = new TextViewColumn('Product_SKU', 'Product SKU', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_SKU_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Name_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Last_Edit field
            //
            $column = new TextViewColumn('Last_Edit', 'Last Edit', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Last_Edit_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Editor field
            //
            $column = new TextViewColumn('Editor', 'Editor', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Editor_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_ID field
            //
            $column = new TextViewColumn('Product_ID', 'Product ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_ID_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Item_Type field
            //
            $column = new TextViewColumn('Item_Type', 'Item Type', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Item_Type_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Type field
            //
            $column = new TextViewColumn('Product_Type', 'Product Type', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Type_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Parent_SKU field
            //
            $column = new TextViewColumn('Parent_SKU', 'Parent SKU', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Parent_SKU_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SKU1 field
            //
            $column = new TextViewColumn('SKU1', 'SKU1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU1_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SKU2 field
            //
            $column = new TextViewColumn('SKU2', 'SKU2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU2_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SKU3 field
            //
            $column = new TextViewColumn('SKU3', 'SKU3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU3_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SKU4 field
            //
            $column = new TextViewColumn('SKU4', 'SKU4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU4_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SKU5 field
            //
            $column = new TextViewColumn('SKU5', 'SKU5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU5_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SKU6 field
            //
            $column = new TextViewColumn('SKU6', 'SKU6', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU6_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for SKU7 field
            //
            $column = new TextViewColumn('SKU7', 'SKU7', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_SKU7_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Manufacturer_SKU field
            //
            $column = new TextViewColumn('Manufacturer_SKU', 'Manufacturer SKU', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Manufacturer_SKU_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ACCPAC_SKU field
            //
            $column = new TextViewColumn('ACCPAC_SKU', 'ACCPAC SKU', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_ACCPAC_SKU_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Bin_Picking_Number field
            //
            $column = new TextViewColumn('Bin_Picking_Number', 'Bin Picking Number', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Bin_Picking_Number_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Option_Set field
            //
            $column = new TextViewColumn('Option_Set', 'Option Set', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Option_Set_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Option_Set_Align field
            //
            $column = new TextViewColumn('Option_Set_Align', 'Option Set Align', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Option_Set_Align_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Category field
            //
            $column = new TextViewColumn('Category', 'Category', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Category_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog', 'Catalog', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Catalog_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat1_ID field
            //
            $column = new TextViewColumn('Cat1_ID', 'Cat1 ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat1_ID_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat2_ID field
            //
            $column = new TextViewColumn('Cat2_ID', 'Cat2 ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat2_ID_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat3_ID field
            //
            $column = new TextViewColumn('Cat3_ID', 'Cat3 ID', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat3_ID_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Category_Path field
            //
            $column = new TextViewColumn('Category_Path', 'Category Path', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Category_Path_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat1 field
            //
            $column = new TextViewColumn('Cat1', 'Cat1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat1_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat2 field
            //
            $column = new TextViewColumn('Cat2', 'Cat2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat2_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat3 field
            //
            $column = new TextViewColumn('Cat3', 'Cat3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat3_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat4 field
            //
            $column = new TextViewColumn('Cat4', 'Cat4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat4_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cat5 field
            //
            $column = new TextViewColumn('Cat5', 'Cat5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cat5_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Catalog_Category field
            //
            $column = new TextViewColumn('Catalog_Category', 'Catalog Category', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Catalog_Category_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Allow_Purchases? field
            //
            $column = new TextViewColumn('Allow_Purchases?', 'Allow Purchases?', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Allow_Purchases?_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Visible? field
            //
            $column = new TextViewColumn('Product_Visible?', 'Product Visible?', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Visible?_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Track_Inventory field
            //
            $column = new TextViewColumn('Track_Inventory', 'Track Inventory', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Track_Inventory_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Stock field
            //
            $column = new TextViewColumn('Stock', 'Stock', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Stock_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Low_Stock_Level field
            //
            $column = new TextViewColumn('Low_Stock_Level', 'Low Stock Level', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Low_Stock_Level_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Tax_Class field
            //
            $column = new TextViewColumn('Product_Tax_Class', 'Product Tax Class', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Tax_Class_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for List_Price field
            //
            $column = new TextViewColumn('List_Price', 'List Price', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_List_Price_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Cost_Price field
            //
            $column = new TextViewColumn('Cost_Price', 'Cost Price', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Cost_Price_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Retail_Price field
            //
            $column = new TextViewColumn('Retail_Price', 'Retail Price', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Retail_Price_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Sale_Price field
            //
            $column = new TextViewColumn('Sale_Price', 'Sale Price', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Sale_Price_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Fixed_Shipping_Cost field
            //
            $column = new TextViewColumn('Fixed_Shipping_Cost', 'Fixed Shipping Cost', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Fixed_Shipping_Cost_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Free_Shipping field
            //
            $column = new TextViewColumn('Free_Shipping', 'Free Shipping', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Free_Shipping_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Condition field
            //
            $column = new TextViewColumn('Product_Condition', 'Product Condition', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Condition_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Show_Product_Condition? field
            //
            $column = new TextViewColumn('Show_Product_Condition?', 'Show Product Condition?', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Show_Product_Condition?_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Image_File_1 field
            //
            $column = new TextViewColumn('Product_Image_File_1', 'Product Image File 1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_File_1_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Image_ID_1 field
            //
            $column = new TextViewColumn('Product_Image_ID_1', 'Product Image ID 1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_ID_1_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Image_URL field
            //
            $column = new TextViewColumn('Product_Image_URL', 'Product Image URL', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_URL_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Image_Description field
            //
            $column = new TextViewColumn('Product_Image_Description', 'Product Image Description', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_Description_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Image_Is_Thumbnail field
            //
            $column = new TextViewColumn('Product_Image_Is_Thumbnail', 'Product Image Is Thumbnail', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_Is_Thumbnail_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Original_HTML_Path field
            //
            $column = new TextViewColumn('Original_HTML_Path', 'Original HTML Path', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Original_HTML_Path_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Original_Image_Path field
            //
            $column = new TextViewColumn('Original_Image_Path', 'Original Image Path', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Original_Image_Path_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Image_Index field
            //
            $column = new TextViewColumn('Product_Image_Index', 'Product Image Index', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Image_Index_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for PDF_File field
            //
            $column = new TextViewColumn('PDF_File', 'PDF File', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_PDF_File_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Brand field
            //
            $column = new TextViewColumn('Brand', 'Brand', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Brand_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Catalog_Page_Number field
            //
            $column = new TextViewColumn('Catalog_Page_Number', 'Catalog Page Number', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Catalog_Page_Number_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Description_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Weight field
            //
            $column = new TextViewColumn('Weight', 'Weight', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Weight_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Width field
            //
            $column = new TextViewColumn('Width', 'Width', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Width_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Height field
            //
            $column = new TextViewColumn('Height', 'Height', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Height_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Depth field
            //
            $column = new TextViewColumn('Depth', 'Depth', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Depth_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Search_Keywords_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Page_Title_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Meta_Keywords field
            //
            $column = new TextViewColumn('Meta_Keywords', 'Meta Keywords', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Meta_Keywords_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Meta_Description field
            //
            $column = new TextViewColumn('Meta_Description', 'Meta Description', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Meta_Description_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_URL field
            //
            $column = new TextViewColumn('Product_URL', 'Product URL', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_URL_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Product_Custom_Fields field
            //
            $column = new TextViewColumn('Product_Custom_Fields', 'Product Custom Fields', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_Product_Custom_Fields_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CF1 field
            //
            $column = new TextViewColumn('CF1', 'CF1', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF1_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CF2 field
            //
            $column = new TextViewColumn('CF2', 'CF2', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF2_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CF3 field
            //
            $column = new TextViewColumn('CF3', 'CF3', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF3_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CF4 field
            //
            $column = new TextViewColumn('CF4', 'CF4', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF4_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CF5 field
            //
            $column = new TextViewColumn('CF5', 'CF5', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF5_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CF6 field
            //
            $column = new TextViewColumn('CF6', 'CF6', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF6_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CF7 field
            //
            $column = new TextViewColumn('CF7', 'CF7', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('bcapi_productsGrid_CF7_handler_view');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for Status field
            //
            $editor = new TextAreaEdit('status_edit', 50, 8);
            $editColumn = new CustomEditColumn('Status', 'Status', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_SKU field
            //
            $editor = new TextAreaEdit('product_sku_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product SKU', 'Product_SKU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Name field
            //
            $editor = new TextAreaEdit('product_name_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Name', 'Product_Name', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Last_Edit field
            //
            $editor = new TextAreaEdit('last_edit_edit', 50, 8);
            $editColumn = new CustomEditColumn('Last Edit', 'Last_Edit', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Editor field
            //
            $editor = new TextAreaEdit('editor_edit', 50, 8);
            $editColumn = new CustomEditColumn('Editor', 'Editor', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_ID field
            //
            $editor = new TextAreaEdit('product_id_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product ID', 'Product_ID', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Item_Type field
            //
            $editor = new TextAreaEdit('item_type_edit', 50, 8);
            $editColumn = new CustomEditColumn('Item Type', 'Item_Type', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Type field
            //
            $editor = new TextAreaEdit('product_type_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Type', 'Product_Type', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Parent_SKU field
            //
            $editor = new TextAreaEdit('parent_sku_edit', 50, 8);
            $editColumn = new CustomEditColumn('Parent SKU', 'Parent_SKU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SKU1 field
            //
            $editor = new TextAreaEdit('sku1_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU1', 'SKU1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SKU2 field
            //
            $editor = new TextAreaEdit('sku2_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU2', 'SKU2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SKU3 field
            //
            $editor = new TextAreaEdit('sku3_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU3', 'SKU3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SKU4 field
            //
            $editor = new TextAreaEdit('sku4_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU4', 'SKU4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SKU5 field
            //
            $editor = new TextAreaEdit('sku5_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU5', 'SKU5', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SKU6 field
            //
            $editor = new TextAreaEdit('sku6_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU6', 'SKU6', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for SKU7 field
            //
            $editor = new TextAreaEdit('sku7_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU7', 'SKU7', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Manufacturer_SKU field
            //
            $editor = new TextAreaEdit('manufacturer_sku_edit', 50, 8);
            $editColumn = new CustomEditColumn('Manufacturer SKU', 'Manufacturer_SKU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ACCPAC_SKU field
            //
            $editor = new TextAreaEdit('accpac_sku_edit', 50, 8);
            $editColumn = new CustomEditColumn('ACCPAC SKU', 'ACCPAC_SKU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Bin_Picking_Number field
            //
            $editor = new TextAreaEdit('bin_picking_number_edit', 50, 8);
            $editColumn = new CustomEditColumn('Bin Picking Number', 'Bin_Picking_Number', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Option_Set field
            //
            $editor = new TextAreaEdit('option_set_edit', 50, 8);
            $editColumn = new CustomEditColumn('Option Set', 'Option_Set', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Option_Set_Align field
            //
            $editor = new TextAreaEdit('option_set_align_edit', 50, 8);
            $editColumn = new CustomEditColumn('Option Set Align', 'Option_Set_Align', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Category field
            //
            $editor = new TextAreaEdit('category_edit', 50, 8);
            $editColumn = new CustomEditColumn('Category', 'Category', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Catalog field
            //
            $editor = new TextAreaEdit('catalog_edit', 50, 8);
            $editColumn = new CustomEditColumn('Catalog', 'Catalog', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Cat1_ID field
            //
            $editor = new TextAreaEdit('cat1_id_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat1 ID', 'Cat1_ID', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Cat2_ID field
            //
            $editor = new TextAreaEdit('cat2_id_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat2 ID', 'Cat2_ID', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Cat3_ID field
            //
            $editor = new TextAreaEdit('cat3_id_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat3 ID', 'Cat3_ID', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Category_Path field
            //
            $editor = new TextAreaEdit('category_path_edit', 50, 8);
            $editColumn = new CustomEditColumn('Category Path', 'Category_Path', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Cat1 field
            //
            $editor = new TextAreaEdit('cat1_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat1', 'Cat1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Cat2 field
            //
            $editor = new TextAreaEdit('cat2_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat2', 'Cat2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Cat3 field
            //
            $editor = new TextAreaEdit('cat3_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat3', 'Cat3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Cat4 field
            //
            $editor = new TextAreaEdit('cat4_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat4', 'Cat4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Cat5 field
            //
            $editor = new TextAreaEdit('cat5_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat5', 'Cat5', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Catalog_Category field
            //
            $editor = new TextAreaEdit('catalog_category_edit', 50, 8);
            $editColumn = new CustomEditColumn('Catalog Category', 'Catalog_Category', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Allow_Purchases? field
            //
            $editor = new TextAreaEdit('allow_purchases?_edit', 50, 8);
            $editColumn = new CustomEditColumn('Allow Purchases?', 'Allow_Purchases?', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Visible? field
            //
            $editor = new TextAreaEdit('product_visible?_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Visible?', 'Product_Visible?', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Track_Inventory field
            //
            $editor = new TextAreaEdit('track_inventory_edit', 50, 8);
            $editColumn = new CustomEditColumn('Track Inventory', 'Track_Inventory', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Stock field
            //
            $editor = new TextAreaEdit('stock_edit', 50, 8);
            $editColumn = new CustomEditColumn('Stock', 'Stock', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Low_Stock_Level field
            //
            $editor = new TextAreaEdit('low_stock_level_edit', 50, 8);
            $editColumn = new CustomEditColumn('Low Stock Level', 'Low_Stock_Level', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Tax_Class field
            //
            $editor = new TextAreaEdit('product_tax_class_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Tax Class', 'Product_Tax_Class', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for List_Price field
            //
            $editor = new TextAreaEdit('list_price_edit', 50, 8);
            $editColumn = new CustomEditColumn('List Price', 'List_Price', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Cost_Price field
            //
            $editor = new TextAreaEdit('cost_price_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cost Price', 'Cost_Price', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Retail_Price field
            //
            $editor = new TextAreaEdit('retail_price_edit', 50, 8);
            $editColumn = new CustomEditColumn('Retail Price', 'Retail_Price', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Sale_Price field
            //
            $editor = new TextAreaEdit('sale_price_edit', 50, 8);
            $editColumn = new CustomEditColumn('Sale Price', 'Sale_Price', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Fixed_Shipping_Cost field
            //
            $editor = new TextAreaEdit('fixed_shipping_cost_edit', 50, 8);
            $editColumn = new CustomEditColumn('Fixed Shipping Cost', 'Fixed_Shipping_Cost', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Free_Shipping field
            //
            $editor = new TextAreaEdit('free_shipping_edit', 50, 8);
            $editColumn = new CustomEditColumn('Free Shipping', 'Free_Shipping', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Condition field
            //
            $editor = new TextAreaEdit('product_condition_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Condition', 'Product_Condition', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Show_Product_Condition? field
            //
            $editor = new TextAreaEdit('show_product_condition?_edit', 50, 8);
            $editColumn = new CustomEditColumn('Show Product Condition?', 'Show_Product_Condition?', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Image_File_1 field
            //
            $editor = new TextAreaEdit('product_image_file_1_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image File 1', 'Product_Image_File_1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Image_ID_1 field
            //
            $editor = new TextAreaEdit('product_image_id_1_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image ID 1', 'Product_Image_ID_1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Image_URL field
            //
            $editor = new TextAreaEdit('product_image_url_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image URL', 'Product_Image_URL', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Image_Description field
            //
            $editor = new TextAreaEdit('product_image_description_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image Description', 'Product_Image_Description', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Image_Is_Thumbnail field
            //
            $editor = new TextAreaEdit('product_image_is_thumbnail_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image Is Thumbnail', 'Product_Image_Is_Thumbnail', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Original_HTML_Path field
            //
            $editor = new TextAreaEdit('original_html_path_edit', 50, 8);
            $editColumn = new CustomEditColumn('Original HTML Path', 'Original_HTML_Path', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Original_Image_Path field
            //
            $editor = new TextAreaEdit('original_image_path_edit', 50, 8);
            $editColumn = new CustomEditColumn('Original Image Path', 'Original_Image_Path', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Image_Index field
            //
            $editor = new TextAreaEdit('product_image_index_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image Index', 'Product_Image_Index', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for PDF_File field
            //
            $editor = new TextAreaEdit('pdf_file_edit', 50, 8);
            $editColumn = new CustomEditColumn('PDF File', 'PDF_File', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Brand field
            //
            $editor = new TextAreaEdit('brand_edit', 50, 8);
            $editColumn = new CustomEditColumn('Brand', 'Brand', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Catalog_Page_Number field
            //
            $editor = new TextAreaEdit('catalog_page_number_edit', 50, 8);
            $editColumn = new CustomEditColumn('Catalog Page Number', 'Catalog_Page_Number', $editor, $this->dataset);
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
            // Edit column for Weight field
            //
            $editor = new TextAreaEdit('weight_edit', 50, 8);
            $editColumn = new CustomEditColumn('Weight', 'Weight', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Width field
            //
            $editor = new TextAreaEdit('width_edit', 50, 8);
            $editColumn = new CustomEditColumn('Width', 'Width', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Height field
            //
            $editor = new TextAreaEdit('height_edit', 50, 8);
            $editColumn = new CustomEditColumn('Height', 'Height', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Depth field
            //
            $editor = new TextAreaEdit('depth_edit', 50, 8);
            $editColumn = new CustomEditColumn('Depth', 'Depth', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Search_Keywords field
            //
            $editor = new TextAreaEdit('search_keywords_edit', 50, 8);
            $editColumn = new CustomEditColumn('Search Keywords', 'Search_Keywords', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Page_Title field
            //
            $editor = new TextAreaEdit('page_title_edit', 50, 8);
            $editColumn = new CustomEditColumn('Page Title', 'Page_Title', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Meta_Keywords field
            //
            $editor = new TextAreaEdit('meta_keywords_edit', 50, 8);
            $editColumn = new CustomEditColumn('Meta Keywords', 'Meta_Keywords', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Meta_Description field
            //
            $editor = new TextAreaEdit('meta_description_edit', 50, 8);
            $editColumn = new CustomEditColumn('Meta Description', 'Meta_Description', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_URL field
            //
            $editor = new TextAreaEdit('product_url_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product URL', 'Product_URL', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Product_Custom_Fields field
            //
            $editor = new TextAreaEdit('product_custom_fields_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Custom Fields', 'Product_Custom_Fields', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CF1 field
            //
            $editor = new TextAreaEdit('cf1_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF1', 'CF1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CF2 field
            //
            $editor = new TextAreaEdit('cf2_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF2', 'CF2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CF3 field
            //
            $editor = new TextAreaEdit('cf3_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF3', 'CF3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CF4 field
            //
            $editor = new TextAreaEdit('cf4_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF4', 'CF4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CF5 field
            //
            $editor = new TextAreaEdit('cf5_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF5', 'CF5', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CF6 field
            //
            $editor = new TextAreaEdit('cf6_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF6', 'CF6', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CF7 field
            //
            $editor = new TextEdit('cf7_edit');
            $editColumn = new CustomEditColumn('CF7', 'CF7', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for Status field
            //
            $editor = new TextAreaEdit('status_edit', 50, 8);
            $editColumn = new CustomEditColumn('Status', 'Status', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_SKU field
            //
            $editor = new TextAreaEdit('product_sku_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product SKU', 'Product_SKU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Name field
            //
            $editor = new TextAreaEdit('product_name_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Name', 'Product_Name', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Last_Edit field
            //
            $editor = new TextAreaEdit('last_edit_edit', 50, 8);
            $editColumn = new CustomEditColumn('Last Edit', 'Last_Edit', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Editor field
            //
            $editor = new TextAreaEdit('editor_edit', 50, 8);
            $editColumn = new CustomEditColumn('Editor', 'Editor', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_ID field
            //
            $editor = new TextAreaEdit('product_id_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product ID', 'Product_ID', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Item_Type field
            //
            $editor = new TextAreaEdit('item_type_edit', 50, 8);
            $editColumn = new CustomEditColumn('Item Type', 'Item_Type', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Type field
            //
            $editor = new TextAreaEdit('product_type_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Type', 'Product_Type', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Parent_SKU field
            //
            $editor = new TextAreaEdit('parent_sku_edit', 50, 8);
            $editColumn = new CustomEditColumn('Parent SKU', 'Parent_SKU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SKU1 field
            //
            $editor = new TextAreaEdit('sku1_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU1', 'SKU1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SKU2 field
            //
            $editor = new TextAreaEdit('sku2_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU2', 'SKU2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SKU3 field
            //
            $editor = new TextAreaEdit('sku3_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU3', 'SKU3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SKU4 field
            //
            $editor = new TextAreaEdit('sku4_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU4', 'SKU4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SKU5 field
            //
            $editor = new TextAreaEdit('sku5_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU5', 'SKU5', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SKU6 field
            //
            $editor = new TextAreaEdit('sku6_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU6', 'SKU6', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for SKU7 field
            //
            $editor = new TextAreaEdit('sku7_edit', 50, 8);
            $editColumn = new CustomEditColumn('SKU7', 'SKU7', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Manufacturer_SKU field
            //
            $editor = new TextAreaEdit('manufacturer_sku_edit', 50, 8);
            $editColumn = new CustomEditColumn('Manufacturer SKU', 'Manufacturer_SKU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ACCPAC_SKU field
            //
            $editor = new TextAreaEdit('accpac_sku_edit', 50, 8);
            $editColumn = new CustomEditColumn('ACCPAC SKU', 'ACCPAC_SKU', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Bin_Picking_Number field
            //
            $editor = new TextAreaEdit('bin_picking_number_edit', 50, 8);
            $editColumn = new CustomEditColumn('Bin Picking Number', 'Bin_Picking_Number', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Option_Set field
            //
            $editor = new TextAreaEdit('option_set_edit', 50, 8);
            $editColumn = new CustomEditColumn('Option Set', 'Option_Set', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Option_Set_Align field
            //
            $editor = new TextAreaEdit('option_set_align_edit', 50, 8);
            $editColumn = new CustomEditColumn('Option Set Align', 'Option_Set_Align', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Category field
            //
            $editor = new TextAreaEdit('category_edit', 50, 8);
            $editColumn = new CustomEditColumn('Category', 'Category', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Catalog field
            //
            $editor = new TextAreaEdit('catalog_edit', 50, 8);
            $editColumn = new CustomEditColumn('Catalog', 'Catalog', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Cat1_ID field
            //
            $editor = new TextAreaEdit('cat1_id_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat1 ID', 'Cat1_ID', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Cat2_ID field
            //
            $editor = new TextAreaEdit('cat2_id_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat2 ID', 'Cat2_ID', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Cat3_ID field
            //
            $editor = new TextAreaEdit('cat3_id_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat3 ID', 'Cat3_ID', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Category_Path field
            //
            $editor = new TextAreaEdit('category_path_edit', 50, 8);
            $editColumn = new CustomEditColumn('Category Path', 'Category_Path', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Cat1 field
            //
            $editor = new TextAreaEdit('cat1_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat1', 'Cat1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Cat2 field
            //
            $editor = new TextAreaEdit('cat2_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat2', 'Cat2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Cat3 field
            //
            $editor = new TextAreaEdit('cat3_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat3', 'Cat3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Cat4 field
            //
            $editor = new TextAreaEdit('cat4_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat4', 'Cat4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Cat5 field
            //
            $editor = new TextAreaEdit('cat5_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cat5', 'Cat5', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Catalog_Category field
            //
            $editor = new TextAreaEdit('catalog_category_edit', 50, 8);
            $editColumn = new CustomEditColumn('Catalog Category', 'Catalog_Category', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Allow_Purchases? field
            //
            $editor = new TextAreaEdit('allow_purchases?_edit', 50, 8);
            $editColumn = new CustomEditColumn('Allow Purchases?', 'Allow_Purchases?', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Visible? field
            //
            $editor = new TextAreaEdit('product_visible?_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Visible?', 'Product_Visible?', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Track_Inventory field
            //
            $editor = new TextAreaEdit('track_inventory_edit', 50, 8);
            $editColumn = new CustomEditColumn('Track Inventory', 'Track_Inventory', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Stock field
            //
            $editor = new TextAreaEdit('stock_edit', 50, 8);
            $editColumn = new CustomEditColumn('Stock', 'Stock', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Low_Stock_Level field
            //
            $editor = new TextAreaEdit('low_stock_level_edit', 50, 8);
            $editColumn = new CustomEditColumn('Low Stock Level', 'Low_Stock_Level', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Tax_Class field
            //
            $editor = new TextAreaEdit('product_tax_class_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Tax Class', 'Product_Tax_Class', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for List_Price field
            //
            $editor = new TextAreaEdit('list_price_edit', 50, 8);
            $editColumn = new CustomEditColumn('List Price', 'List_Price', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Cost_Price field
            //
            $editor = new TextAreaEdit('cost_price_edit', 50, 8);
            $editColumn = new CustomEditColumn('Cost Price', 'Cost_Price', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Retail_Price field
            //
            $editor = new TextAreaEdit('retail_price_edit', 50, 8);
            $editColumn = new CustomEditColumn('Retail Price', 'Retail_Price', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Sale_Price field
            //
            $editor = new TextAreaEdit('sale_price_edit', 50, 8);
            $editColumn = new CustomEditColumn('Sale Price', 'Sale_Price', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Fixed_Shipping_Cost field
            //
            $editor = new TextAreaEdit('fixed_shipping_cost_edit', 50, 8);
            $editColumn = new CustomEditColumn('Fixed Shipping Cost', 'Fixed_Shipping_Cost', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Free_Shipping field
            //
            $editor = new TextAreaEdit('free_shipping_edit', 50, 8);
            $editColumn = new CustomEditColumn('Free Shipping', 'Free_Shipping', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Condition field
            //
            $editor = new TextAreaEdit('product_condition_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Condition', 'Product_Condition', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Show_Product_Condition? field
            //
            $editor = new TextAreaEdit('show_product_condition?_edit', 50, 8);
            $editColumn = new CustomEditColumn('Show Product Condition?', 'Show_Product_Condition?', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Image_File_1 field
            //
            $editor = new TextAreaEdit('product_image_file_1_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image File 1', 'Product_Image_File_1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Image_ID_1 field
            //
            $editor = new TextAreaEdit('product_image_id_1_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image ID 1', 'Product_Image_ID_1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Image_URL field
            //
            $editor = new TextAreaEdit('product_image_url_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image URL', 'Product_Image_URL', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Image_Description field
            //
            $editor = new TextAreaEdit('product_image_description_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image Description', 'Product_Image_Description', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Image_Is_Thumbnail field
            //
            $editor = new TextAreaEdit('product_image_is_thumbnail_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image Is Thumbnail', 'Product_Image_Is_Thumbnail', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Original_HTML_Path field
            //
            $editor = new TextAreaEdit('original_html_path_edit', 50, 8);
            $editColumn = new CustomEditColumn('Original HTML Path', 'Original_HTML_Path', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Original_Image_Path field
            //
            $editor = new TextAreaEdit('original_image_path_edit', 50, 8);
            $editColumn = new CustomEditColumn('Original Image Path', 'Original_Image_Path', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Image_Index field
            //
            $editor = new TextAreaEdit('product_image_index_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Image Index', 'Product_Image_Index', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for PDF_File field
            //
            $editor = new TextAreaEdit('pdf_file_edit', 50, 8);
            $editColumn = new CustomEditColumn('PDF File', 'PDF_File', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Brand field
            //
            $editor = new TextAreaEdit('brand_edit', 50, 8);
            $editColumn = new CustomEditColumn('Brand', 'Brand', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Catalog_Page_Number field
            //
            $editor = new TextAreaEdit('catalog_page_number_edit', 50, 8);
            $editColumn = new CustomEditColumn('Catalog Page Number', 'Catalog_Page_Number', $editor, $this->dataset);
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
            // Edit column for Weight field
            //
            $editor = new TextAreaEdit('weight_edit', 50, 8);
            $editColumn = new CustomEditColumn('Weight', 'Weight', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Width field
            //
            $editor = new TextAreaEdit('width_edit', 50, 8);
            $editColumn = new CustomEditColumn('Width', 'Width', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Height field
            //
            $editor = new TextAreaEdit('height_edit', 50, 8);
            $editColumn = new CustomEditColumn('Height', 'Height', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Depth field
            //
            $editor = new TextAreaEdit('depth_edit', 50, 8);
            $editColumn = new CustomEditColumn('Depth', 'Depth', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Search_Keywords field
            //
            $editor = new TextAreaEdit('search_keywords_edit', 50, 8);
            $editColumn = new CustomEditColumn('Search Keywords', 'Search_Keywords', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Page_Title field
            //
            $editor = new TextAreaEdit('page_title_edit', 50, 8);
            $editColumn = new CustomEditColumn('Page Title', 'Page_Title', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Meta_Keywords field
            //
            $editor = new TextAreaEdit('meta_keywords_edit', 50, 8);
            $editColumn = new CustomEditColumn('Meta Keywords', 'Meta_Keywords', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Meta_Description field
            //
            $editor = new TextAreaEdit('meta_description_edit', 50, 8);
            $editColumn = new CustomEditColumn('Meta Description', 'Meta_Description', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_URL field
            //
            $editor = new TextAreaEdit('product_url_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product URL', 'Product_URL', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Product_Custom_Fields field
            //
            $editor = new TextAreaEdit('product_custom_fields_edit', 50, 8);
            $editColumn = new CustomEditColumn('Product Custom Fields', 'Product_Custom_Fields', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CF1 field
            //
            $editor = new TextAreaEdit('cf1_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF1', 'CF1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CF2 field
            //
            $editor = new TextAreaEdit('cf2_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF2', 'CF2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CF3 field
            //
            $editor = new TextAreaEdit('cf3_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF3', 'CF3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CF4 field
            //
            $editor = new TextAreaEdit('cf4_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF4', 'CF4', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CF5 field
            //
            $editor = new TextAreaEdit('cf5_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF5', 'CF5', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CF6 field
            //
            $editor = new TextAreaEdit('cf6_edit', 50, 8);
            $editColumn = new CustomEditColumn('CF6', 'CF6', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CF7 field
            //
            $editor = new TextEdit('cf7_edit');
            $editColumn = new CustomEditColumn('CF7', 'CF7', $editor, $this->dataset);
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
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_SKU field
            //
            $column = new TextViewColumn('Product_SKU', 'Product SKU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Last_Edit field
            //
            $column = new TextViewColumn('Last_Edit', 'Last Edit', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Editor field
            //
            $column = new TextViewColumn('Editor', 'Editor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_ID field
            //
            $column = new TextViewColumn('Product_ID', 'Product ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Item_Type field
            //
            $column = new TextViewColumn('Item_Type', 'Item Type', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Type field
            //
            $column = new TextViewColumn('Product_Type', 'Product Type', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Parent_SKU field
            //
            $column = new TextViewColumn('Parent_SKU', 'Parent SKU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SKU1 field
            //
            $column = new TextViewColumn('SKU1', 'SKU1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SKU2 field
            //
            $column = new TextViewColumn('SKU2', 'SKU2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SKU3 field
            //
            $column = new TextViewColumn('SKU3', 'SKU3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SKU4 field
            //
            $column = new TextViewColumn('SKU4', 'SKU4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SKU5 field
            //
            $column = new TextViewColumn('SKU5', 'SKU5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SKU6 field
            //
            $column = new TextViewColumn('SKU6', 'SKU6', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for SKU7 field
            //
            $column = new TextViewColumn('SKU7', 'SKU7', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Manufacturer_SKU field
            //
            $column = new TextViewColumn('Manufacturer_SKU', 'Manufacturer SKU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ACCPAC_SKU field
            //
            $column = new TextViewColumn('ACCPAC_SKU', 'ACCPAC SKU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Bin_Picking_Number field
            //
            $column = new TextViewColumn('Bin_Picking_Number', 'Bin Picking Number', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Option_Set field
            //
            $column = new TextViewColumn('Option_Set', 'Option Set', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Option_Set_Align field
            //
            $column = new TextViewColumn('Option_Set_Align', 'Option Set Align', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Category field
            //
            $column = new TextViewColumn('Category', 'Category', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog', 'Catalog', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cat1_ID field
            //
            $column = new TextViewColumn('Cat1_ID', 'Cat1 ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cat2_ID field
            //
            $column = new TextViewColumn('Cat2_ID', 'Cat2 ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cat3_ID field
            //
            $column = new TextViewColumn('Cat3_ID', 'Cat3 ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Category_Path field
            //
            $column = new TextViewColumn('Category_Path', 'Category Path', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cat1 field
            //
            $column = new TextViewColumn('Cat1', 'Cat1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cat2 field
            //
            $column = new TextViewColumn('Cat2', 'Cat2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cat3 field
            //
            $column = new TextViewColumn('Cat3', 'Cat3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cat4 field
            //
            $column = new TextViewColumn('Cat4', 'Cat4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cat5 field
            //
            $column = new TextViewColumn('Cat5', 'Cat5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Catalog_Category field
            //
            $column = new TextViewColumn('Catalog_Category', 'Catalog Category', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Allow_Purchases? field
            //
            $column = new TextViewColumn('Allow_Purchases?', 'Allow Purchases?', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Visible? field
            //
            $column = new TextViewColumn('Product_Visible?', 'Product Visible?', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Track_Inventory field
            //
            $column = new TextViewColumn('Track_Inventory', 'Track Inventory', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Stock field
            //
            $column = new TextViewColumn('Stock', 'Stock', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Low_Stock_Level field
            //
            $column = new TextViewColumn('Low_Stock_Level', 'Low Stock Level', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Tax_Class field
            //
            $column = new TextViewColumn('Product_Tax_Class', 'Product Tax Class', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for List_Price field
            //
            $column = new TextViewColumn('List_Price', 'List Price', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Cost_Price field
            //
            $column = new TextViewColumn('Cost_Price', 'Cost Price', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Retail_Price field
            //
            $column = new TextViewColumn('Retail_Price', 'Retail Price', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Sale_Price field
            //
            $column = new TextViewColumn('Sale_Price', 'Sale Price', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Fixed_Shipping_Cost field
            //
            $column = new TextViewColumn('Fixed_Shipping_Cost', 'Fixed Shipping Cost', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Free_Shipping field
            //
            $column = new TextViewColumn('Free_Shipping', 'Free Shipping', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Condition field
            //
            $column = new TextViewColumn('Product_Condition', 'Product Condition', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Show_Product_Condition? field
            //
            $column = new TextViewColumn('Show_Product_Condition?', 'Show Product Condition?', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Image_File_1 field
            //
            $column = new TextViewColumn('Product_Image_File_1', 'Product Image File 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Image_ID_1 field
            //
            $column = new TextViewColumn('Product_Image_ID_1', 'Product Image ID 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Image_URL field
            //
            $column = new TextViewColumn('Product_Image_URL', 'Product Image URL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Image_Description field
            //
            $column = new TextViewColumn('Product_Image_Description', 'Product Image Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Image_Is_Thumbnail field
            //
            $column = new TextViewColumn('Product_Image_Is_Thumbnail', 'Product Image Is Thumbnail', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Original_HTML_Path field
            //
            $column = new TextViewColumn('Original_HTML_Path', 'Original HTML Path', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Original_Image_Path field
            //
            $column = new TextViewColumn('Original_Image_Path', 'Original Image Path', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Image_Index field
            //
            $column = new TextViewColumn('Product_Image_Index', 'Product Image Index', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for PDF_File field
            //
            $column = new TextViewColumn('PDF_File', 'PDF File', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Brand field
            //
            $column = new TextViewColumn('Brand', 'Brand', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Catalog_Page_Number field
            //
            $column = new TextViewColumn('Catalog_Page_Number', 'Catalog Page Number', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Weight field
            //
            $column = new TextViewColumn('Weight', 'Weight', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Width field
            //
            $column = new TextViewColumn('Width', 'Width', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Height field
            //
            $column = new TextViewColumn('Height', 'Height', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Depth field
            //
            $column = new TextViewColumn('Depth', 'Depth', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Meta_Keywords field
            //
            $column = new TextViewColumn('Meta_Keywords', 'Meta Keywords', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Meta_Description field
            //
            $column = new TextViewColumn('Meta_Description', 'Meta Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_URL field
            //
            $column = new TextViewColumn('Product_URL', 'Product URL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Product_Custom_Fields field
            //
            $column = new TextViewColumn('Product_Custom_Fields', 'Product Custom Fields', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for CF1 field
            //
            $column = new TextViewColumn('CF1', 'CF1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for CF2 field
            //
            $column = new TextViewColumn('CF2', 'CF2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for CF3 field
            //
            $column = new TextViewColumn('CF3', 'CF3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for CF4 field
            //
            $column = new TextViewColumn('CF4', 'CF4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for CF5 field
            //
            $column = new TextViewColumn('CF5', 'CF5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for CF6 field
            //
            $column = new TextViewColumn('CF6', 'CF6', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for CF7 field
            //
            $column = new TextViewColumn('CF7', 'CF7', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for bcapi_products_id field
            //
            $column = new TextViewColumn('bcapi_products_id', 'Bcapi Products Id', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_SKU field
            //
            $column = new TextViewColumn('Product_SKU', 'Product SKU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Last_Edit field
            //
            $column = new TextViewColumn('Last_Edit', 'Last Edit', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Editor field
            //
            $column = new TextViewColumn('Editor', 'Editor', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_ID field
            //
            $column = new TextViewColumn('Product_ID', 'Product ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Item_Type field
            //
            $column = new TextViewColumn('Item_Type', 'Item Type', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Type field
            //
            $column = new TextViewColumn('Product_Type', 'Product Type', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Parent_SKU field
            //
            $column = new TextViewColumn('Parent_SKU', 'Parent SKU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SKU1 field
            //
            $column = new TextViewColumn('SKU1', 'SKU1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SKU2 field
            //
            $column = new TextViewColumn('SKU2', 'SKU2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SKU3 field
            //
            $column = new TextViewColumn('SKU3', 'SKU3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SKU4 field
            //
            $column = new TextViewColumn('SKU4', 'SKU4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SKU5 field
            //
            $column = new TextViewColumn('SKU5', 'SKU5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SKU6 field
            //
            $column = new TextViewColumn('SKU6', 'SKU6', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for SKU7 field
            //
            $column = new TextViewColumn('SKU7', 'SKU7', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Manufacturer_SKU field
            //
            $column = new TextViewColumn('Manufacturer_SKU', 'Manufacturer SKU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ACCPAC_SKU field
            //
            $column = new TextViewColumn('ACCPAC_SKU', 'ACCPAC SKU', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Bin_Picking_Number field
            //
            $column = new TextViewColumn('Bin_Picking_Number', 'Bin Picking Number', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Option_Set field
            //
            $column = new TextViewColumn('Option_Set', 'Option Set', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Option_Set_Align field
            //
            $column = new TextViewColumn('Option_Set_Align', 'Option Set Align', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Category field
            //
            $column = new TextViewColumn('Category', 'Category', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog', 'Catalog', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat1_ID field
            //
            $column = new TextViewColumn('Cat1_ID', 'Cat1 ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat2_ID field
            //
            $column = new TextViewColumn('Cat2_ID', 'Cat2 ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat3_ID field
            //
            $column = new TextViewColumn('Cat3_ID', 'Cat3 ID', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Category_Path field
            //
            $column = new TextViewColumn('Category_Path', 'Category Path', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat1 field
            //
            $column = new TextViewColumn('Cat1', 'Cat1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat2 field
            //
            $column = new TextViewColumn('Cat2', 'Cat2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat3 field
            //
            $column = new TextViewColumn('Cat3', 'Cat3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat4 field
            //
            $column = new TextViewColumn('Cat4', 'Cat4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cat5 field
            //
            $column = new TextViewColumn('Cat5', 'Cat5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Catalog_Category field
            //
            $column = new TextViewColumn('Catalog_Category', 'Catalog Category', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Allow_Purchases? field
            //
            $column = new TextViewColumn('Allow_Purchases?', 'Allow Purchases?', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Visible? field
            //
            $column = new TextViewColumn('Product_Visible?', 'Product Visible?', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Track_Inventory field
            //
            $column = new TextViewColumn('Track_Inventory', 'Track Inventory', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Stock field
            //
            $column = new TextViewColumn('Stock', 'Stock', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Low_Stock_Level field
            //
            $column = new TextViewColumn('Low_Stock_Level', 'Low Stock Level', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Tax_Class field
            //
            $column = new TextViewColumn('Product_Tax_Class', 'Product Tax Class', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for List_Price field
            //
            $column = new TextViewColumn('List_Price', 'List Price', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Cost_Price field
            //
            $column = new TextViewColumn('Cost_Price', 'Cost Price', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Retail_Price field
            //
            $column = new TextViewColumn('Retail_Price', 'Retail Price', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Sale_Price field
            //
            $column = new TextViewColumn('Sale_Price', 'Sale Price', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Fixed_Shipping_Cost field
            //
            $column = new TextViewColumn('Fixed_Shipping_Cost', 'Fixed Shipping Cost', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Free_Shipping field
            //
            $column = new TextViewColumn('Free_Shipping', 'Free Shipping', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Condition field
            //
            $column = new TextViewColumn('Product_Condition', 'Product Condition', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Show_Product_Condition? field
            //
            $column = new TextViewColumn('Show_Product_Condition?', 'Show Product Condition?', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Image_File_1 field
            //
            $column = new TextViewColumn('Product_Image_File_1', 'Product Image File 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Image_ID_1 field
            //
            $column = new TextViewColumn('Product_Image_ID_1', 'Product Image ID 1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Image_URL field
            //
            $column = new TextViewColumn('Product_Image_URL', 'Product Image URL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Image_Description field
            //
            $column = new TextViewColumn('Product_Image_Description', 'Product Image Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Image_Is_Thumbnail field
            //
            $column = new TextViewColumn('Product_Image_Is_Thumbnail', 'Product Image Is Thumbnail', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Original_HTML_Path field
            //
            $column = new TextViewColumn('Original_HTML_Path', 'Original HTML Path', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Original_Image_Path field
            //
            $column = new TextViewColumn('Original_Image_Path', 'Original Image Path', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Image_Index field
            //
            $column = new TextViewColumn('Product_Image_Index', 'Product Image Index', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for PDF_File field
            //
            $column = new TextViewColumn('PDF_File', 'PDF File', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Brand field
            //
            $column = new TextViewColumn('Brand', 'Brand', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Catalog_Page_Number field
            //
            $column = new TextViewColumn('Catalog_Page_Number', 'Catalog Page Number', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Weight field
            //
            $column = new TextViewColumn('Weight', 'Weight', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Width field
            //
            $column = new TextViewColumn('Width', 'Width', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Height field
            //
            $column = new TextViewColumn('Height', 'Height', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Depth field
            //
            $column = new TextViewColumn('Depth', 'Depth', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Meta_Keywords field
            //
            $column = new TextViewColumn('Meta_Keywords', 'Meta Keywords', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Meta_Description field
            //
            $column = new TextViewColumn('Meta_Description', 'Meta Description', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_URL field
            //
            $column = new TextViewColumn('Product_URL', 'Product URL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Product_Custom_Fields field
            //
            $column = new TextViewColumn('Product_Custom_Fields', 'Product Custom Fields', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for CF1 field
            //
            $column = new TextViewColumn('CF1', 'CF1', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for CF2 field
            //
            $column = new TextViewColumn('CF2', 'CF2', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for CF3 field
            //
            $column = new TextViewColumn('CF3', 'CF3', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for CF4 field
            //
            $column = new TextViewColumn('CF4', 'CF4', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for CF5 field
            //
            $column = new TextViewColumn('CF5', 'CF5', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for CF6 field
            //
            $column = new TextViewColumn('CF6', 'CF6', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for CF7 field
            //
            $column = new TextViewColumn('CF7', 'CF7', $this->dataset);
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
        
        public function GetModalGridDeleteHandler() { return 'bcapi_products_modal_delete'; }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset, 'bcapi_productsGrid');
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
            $this->SetViewFormTitle($this->RenderText('%Product_Name%'));
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
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Status_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_SKU field
            //
            $column = new TextViewColumn('Product_SKU', 'Product SKU', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_SKU_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Name_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Last_Edit field
            //
            $column = new TextViewColumn('Last_Edit', 'Last Edit', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Last_Edit_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Editor field
            //
            $column = new TextViewColumn('Editor', 'Editor', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Editor_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_ID field
            //
            $column = new TextViewColumn('Product_ID', 'Product ID', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_ID_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Item_Type field
            //
            $column = new TextViewColumn('Item_Type', 'Item Type', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Item_Type_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Type field
            //
            $column = new TextViewColumn('Product_Type', 'Product Type', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Type_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Parent_SKU field
            //
            $column = new TextViewColumn('Parent_SKU', 'Parent SKU', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Parent_SKU_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU1 field
            //
            $column = new TextViewColumn('SKU1', 'SKU1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU1_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU2 field
            //
            $column = new TextViewColumn('SKU2', 'SKU2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU2_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU3 field
            //
            $column = new TextViewColumn('SKU3', 'SKU3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU3_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU4 field
            //
            $column = new TextViewColumn('SKU4', 'SKU4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU4_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU5 field
            //
            $column = new TextViewColumn('SKU5', 'SKU5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU5_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU6 field
            //
            $column = new TextViewColumn('SKU6', 'SKU6', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU6_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU7 field
            //
            $column = new TextViewColumn('SKU7', 'SKU7', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU7_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Manufacturer_SKU field
            //
            $column = new TextViewColumn('Manufacturer_SKU', 'Manufacturer SKU', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Manufacturer_SKU_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for ACCPAC_SKU field
            //
            $column = new TextViewColumn('ACCPAC_SKU', 'ACCPAC SKU', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_ACCPAC_SKU_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Bin_Picking_Number field
            //
            $column = new TextViewColumn('Bin_Picking_Number', 'Bin Picking Number', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Bin_Picking_Number_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Option_Set field
            //
            $column = new TextViewColumn('Option_Set', 'Option Set', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Option_Set_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Option_Set_Align field
            //
            $column = new TextViewColumn('Option_Set_Align', 'Option Set Align', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Option_Set_Align_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Category field
            //
            $column = new TextViewColumn('Category', 'Category', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Category_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog', 'Catalog', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Catalog_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat1_ID field
            //
            $column = new TextViewColumn('Cat1_ID', 'Cat1 ID', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat1_ID_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat2_ID field
            //
            $column = new TextViewColumn('Cat2_ID', 'Cat2 ID', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat2_ID_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat3_ID field
            //
            $column = new TextViewColumn('Cat3_ID', 'Cat3 ID', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat3_ID_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Category_Path field
            //
            $column = new TextViewColumn('Category_Path', 'Category Path', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Category_Path_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat1 field
            //
            $column = new TextViewColumn('Cat1', 'Cat1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat1_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat2 field
            //
            $column = new TextViewColumn('Cat2', 'Cat2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat2_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat3 field
            //
            $column = new TextViewColumn('Cat3', 'Cat3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat3_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat4 field
            //
            $column = new TextViewColumn('Cat4', 'Cat4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat4_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat5 field
            //
            $column = new TextViewColumn('Cat5', 'Cat5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat5_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Catalog_Category field
            //
            $column = new TextViewColumn('Catalog_Category', 'Catalog Category', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Catalog_Category_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Allow_Purchases? field
            //
            $column = new TextViewColumn('Allow_Purchases?', 'Allow Purchases?', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Allow_Purchases?_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Visible? field
            //
            $column = new TextViewColumn('Product_Visible?', 'Product Visible?', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Visible?_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Track_Inventory field
            //
            $column = new TextViewColumn('Track_Inventory', 'Track Inventory', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Track_Inventory_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Stock field
            //
            $column = new TextViewColumn('Stock', 'Stock', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Stock_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Low_Stock_Level field
            //
            $column = new TextViewColumn('Low_Stock_Level', 'Low Stock Level', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Low_Stock_Level_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Tax_Class field
            //
            $column = new TextViewColumn('Product_Tax_Class', 'Product Tax Class', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Tax_Class_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for List_Price field
            //
            $column = new TextViewColumn('List_Price', 'List Price', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_List_Price_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cost_Price field
            //
            $column = new TextViewColumn('Cost_Price', 'Cost Price', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cost_Price_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Retail_Price field
            //
            $column = new TextViewColumn('Retail_Price', 'Retail Price', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Retail_Price_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Sale_Price field
            //
            $column = new TextViewColumn('Sale_Price', 'Sale Price', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Sale_Price_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Fixed_Shipping_Cost field
            //
            $column = new TextViewColumn('Fixed_Shipping_Cost', 'Fixed Shipping Cost', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Fixed_Shipping_Cost_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Free_Shipping field
            //
            $column = new TextViewColumn('Free_Shipping', 'Free Shipping', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Free_Shipping_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Condition field
            //
            $column = new TextViewColumn('Product_Condition', 'Product Condition', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Condition_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Show_Product_Condition? field
            //
            $column = new TextViewColumn('Show_Product_Condition?', 'Show Product Condition?', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Show_Product_Condition?_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_File_1 field
            //
            $column = new TextViewColumn('Product_Image_File_1', 'Product Image File 1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_File_1_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_ID_1 field
            //
            $column = new TextViewColumn('Product_Image_ID_1', 'Product Image ID 1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_ID_1_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_URL field
            //
            $column = new TextViewColumn('Product_Image_URL', 'Product Image URL', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_URL_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_Description field
            //
            $column = new TextViewColumn('Product_Image_Description', 'Product Image Description', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_Description_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_Is_Thumbnail field
            //
            $column = new TextViewColumn('Product_Image_Is_Thumbnail', 'Product Image Is Thumbnail', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_Is_Thumbnail_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Original_HTML_Path field
            //
            $column = new TextViewColumn('Original_HTML_Path', 'Original HTML Path', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Original_HTML_Path_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Original_Image_Path field
            //
            $column = new TextViewColumn('Original_Image_Path', 'Original Image Path', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Original_Image_Path_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_Index field
            //
            $column = new TextViewColumn('Product_Image_Index', 'Product Image Index', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_Index_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for PDF_File field
            //
            $column = new TextViewColumn('PDF_File', 'PDF File', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_PDF_File_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Brand field
            //
            $column = new TextViewColumn('Brand', 'Brand', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Brand_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Catalog_Page_Number field
            //
            $column = new TextViewColumn('Catalog_Page_Number', 'Catalog Page Number', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Catalog_Page_Number_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Description_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Weight field
            //
            $column = new TextViewColumn('Weight', 'Weight', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Weight_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Width field
            //
            $column = new TextViewColumn('Width', 'Width', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Width_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Height field
            //
            $column = new TextViewColumn('Height', 'Height', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Height_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Depth field
            //
            $column = new TextViewColumn('Depth', 'Depth', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Depth_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Search_Keywords_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Page_Title_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Meta_Keywords field
            //
            $column = new TextViewColumn('Meta_Keywords', 'Meta Keywords', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Meta_Keywords_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Meta_Description field
            //
            $column = new TextViewColumn('Meta_Description', 'Meta Description', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Meta_Description_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_URL field
            //
            $column = new TextViewColumn('Product_URL', 'Product URL', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_URL_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Custom_Fields field
            //
            $column = new TextViewColumn('Product_Custom_Fields', 'Product Custom Fields', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Custom_Fields_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF1 field
            //
            $column = new TextViewColumn('CF1', 'CF1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF1_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF2 field
            //
            $column = new TextViewColumn('CF2', 'CF2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF2_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF3 field
            //
            $column = new TextViewColumn('CF3', 'CF3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF3_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF4 field
            //
            $column = new TextViewColumn('CF4', 'CF4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF4_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF5 field
            //
            $column = new TextViewColumn('CF5', 'CF5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF5_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF6 field
            //
            $column = new TextViewColumn('CF6', 'CF6', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF6_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF7 field
            //
            $column = new TextViewColumn('CF7', 'CF7', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF7_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);//
            // View column for Status field
            //
            $column = new TextViewColumn('Status', 'Status', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Status_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_SKU field
            //
            $column = new TextViewColumn('Product_SKU', 'Product SKU', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_SKU_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Name field
            //
            $column = new TextViewColumn('Product_Name', 'Product Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Name_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Last_Edit field
            //
            $column = new TextViewColumn('Last_Edit', 'Last Edit', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Last_Edit_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Editor field
            //
            $column = new TextViewColumn('Editor', 'Editor', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Editor_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_ID field
            //
            $column = new TextViewColumn('Product_ID', 'Product ID', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_ID_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Item_Type field
            //
            $column = new TextViewColumn('Item_Type', 'Item Type', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Item_Type_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Type field
            //
            $column = new TextViewColumn('Product_Type', 'Product Type', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Type_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Parent_SKU field
            //
            $column = new TextViewColumn('Parent_SKU', 'Parent SKU', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Parent_SKU_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU1 field
            //
            $column = new TextViewColumn('SKU1', 'SKU1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU1_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU2 field
            //
            $column = new TextViewColumn('SKU2', 'SKU2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU2_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU3 field
            //
            $column = new TextViewColumn('SKU3', 'SKU3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU3_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU4 field
            //
            $column = new TextViewColumn('SKU4', 'SKU4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU4_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU5 field
            //
            $column = new TextViewColumn('SKU5', 'SKU5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU5_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU6 field
            //
            $column = new TextViewColumn('SKU6', 'SKU6', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU6_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for SKU7 field
            //
            $column = new TextViewColumn('SKU7', 'SKU7', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_SKU7_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Manufacturer_SKU field
            //
            $column = new TextViewColumn('Manufacturer_SKU', 'Manufacturer SKU', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Manufacturer_SKU_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for ACCPAC_SKU field
            //
            $column = new TextViewColumn('ACCPAC_SKU', 'ACCPAC SKU', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_ACCPAC_SKU_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Bin_Picking_Number field
            //
            $column = new TextViewColumn('Bin_Picking_Number', 'Bin Picking Number', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Bin_Picking_Number_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Option_Set field
            //
            $column = new TextViewColumn('Option_Set', 'Option Set', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Option_Set_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Option_Set_Align field
            //
            $column = new TextViewColumn('Option_Set_Align', 'Option Set Align', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Option_Set_Align_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Category field
            //
            $column = new TextViewColumn('Category', 'Category', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Category_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Catalog field
            //
            $column = new TextViewColumn('Catalog', 'Catalog', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Catalog_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat1_ID field
            //
            $column = new TextViewColumn('Cat1_ID', 'Cat1 ID', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat1_ID_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat2_ID field
            //
            $column = new TextViewColumn('Cat2_ID', 'Cat2 ID', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat2_ID_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat3_ID field
            //
            $column = new TextViewColumn('Cat3_ID', 'Cat3 ID', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat3_ID_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Category_Path field
            //
            $column = new TextViewColumn('Category_Path', 'Category Path', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Category_Path_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat1 field
            //
            $column = new TextViewColumn('Cat1', 'Cat1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat1_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat2 field
            //
            $column = new TextViewColumn('Cat2', 'Cat2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat2_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat3 field
            //
            $column = new TextViewColumn('Cat3', 'Cat3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat3_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat4 field
            //
            $column = new TextViewColumn('Cat4', 'Cat4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat4_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cat5 field
            //
            $column = new TextViewColumn('Cat5', 'Cat5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cat5_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Catalog_Category field
            //
            $column = new TextViewColumn('Catalog_Category', 'Catalog Category', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Catalog_Category_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Allow_Purchases? field
            //
            $column = new TextViewColumn('Allow_Purchases?', 'Allow Purchases?', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Allow_Purchases?_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Visible? field
            //
            $column = new TextViewColumn('Product_Visible?', 'Product Visible?', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Visible?_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Track_Inventory field
            //
            $column = new TextViewColumn('Track_Inventory', 'Track Inventory', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Track_Inventory_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Stock field
            //
            $column = new TextViewColumn('Stock', 'Stock', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Stock_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Low_Stock_Level field
            //
            $column = new TextViewColumn('Low_Stock_Level', 'Low Stock Level', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Low_Stock_Level_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Tax_Class field
            //
            $column = new TextViewColumn('Product_Tax_Class', 'Product Tax Class', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Tax_Class_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for List_Price field
            //
            $column = new TextViewColumn('List_Price', 'List Price', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_List_Price_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Cost_Price field
            //
            $column = new TextViewColumn('Cost_Price', 'Cost Price', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Cost_Price_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Retail_Price field
            //
            $column = new TextViewColumn('Retail_Price', 'Retail Price', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Retail_Price_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Sale_Price field
            //
            $column = new TextViewColumn('Sale_Price', 'Sale Price', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Sale_Price_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Fixed_Shipping_Cost field
            //
            $column = new TextViewColumn('Fixed_Shipping_Cost', 'Fixed Shipping Cost', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Fixed_Shipping_Cost_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Free_Shipping field
            //
            $column = new TextViewColumn('Free_Shipping', 'Free Shipping', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Free_Shipping_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Condition field
            //
            $column = new TextViewColumn('Product_Condition', 'Product Condition', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Condition_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Show_Product_Condition? field
            //
            $column = new TextViewColumn('Show_Product_Condition?', 'Show Product Condition?', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Show_Product_Condition?_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_File_1 field
            //
            $column = new TextViewColumn('Product_Image_File_1', 'Product Image File 1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_File_1_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_ID_1 field
            //
            $column = new TextViewColumn('Product_Image_ID_1', 'Product Image ID 1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_ID_1_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_URL field
            //
            $column = new TextViewColumn('Product_Image_URL', 'Product Image URL', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_URL_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_Description field
            //
            $column = new TextViewColumn('Product_Image_Description', 'Product Image Description', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_Description_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_Is_Thumbnail field
            //
            $column = new TextViewColumn('Product_Image_Is_Thumbnail', 'Product Image Is Thumbnail', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_Is_Thumbnail_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Original_HTML_Path field
            //
            $column = new TextViewColumn('Original_HTML_Path', 'Original HTML Path', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Original_HTML_Path_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Original_Image_Path field
            //
            $column = new TextViewColumn('Original_Image_Path', 'Original Image Path', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Original_Image_Path_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Image_Index field
            //
            $column = new TextViewColumn('Product_Image_Index', 'Product Image Index', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Image_Index_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for PDF_File field
            //
            $column = new TextViewColumn('PDF_File', 'PDF File', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_PDF_File_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Brand field
            //
            $column = new TextViewColumn('Brand', 'Brand', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Brand_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Catalog_Page_Number field
            //
            $column = new TextViewColumn('Catalog_Page_Number', 'Catalog Page Number', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Catalog_Page_Number_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Description field
            //
            $column = new TextViewColumn('Description', 'Description', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Description_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Weight field
            //
            $column = new TextViewColumn('Weight', 'Weight', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Weight_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Width field
            //
            $column = new TextViewColumn('Width', 'Width', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Width_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Height field
            //
            $column = new TextViewColumn('Height', 'Height', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Height_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Depth field
            //
            $column = new TextViewColumn('Depth', 'Depth', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Depth_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Search_Keywords field
            //
            $column = new TextViewColumn('Search_Keywords', 'Search Keywords', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Search_Keywords_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Page_Title field
            //
            $column = new TextViewColumn('Page_Title', 'Page Title', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Page_Title_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Meta_Keywords field
            //
            $column = new TextViewColumn('Meta_Keywords', 'Meta Keywords', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Meta_Keywords_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Meta_Description field
            //
            $column = new TextViewColumn('Meta_Description', 'Meta Description', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Meta_Description_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_URL field
            //
            $column = new TextViewColumn('Product_URL', 'Product URL', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_URL_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for Product_Custom_Fields field
            //
            $column = new TextViewColumn('Product_Custom_Fields', 'Product Custom Fields', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_Product_Custom_Fields_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF1 field
            //
            $column = new TextViewColumn('CF1', 'CF1', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF1_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF2 field
            //
            $column = new TextViewColumn('CF2', 'CF2', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF2_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF3 field
            //
            $column = new TextViewColumn('CF3', 'CF3', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF3_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF4 field
            //
            $column = new TextViewColumn('CF4', 'CF4', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF4_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF5 field
            //
            $column = new TextViewColumn('CF5', 'CF5', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF5_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF6 field
            //
            $column = new TextViewColumn('CF6', 'CF6', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF6_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            //
            // View column for CF7 field
            //
            $column = new TextViewColumn('CF7', 'CF7', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'bcapi_productsGrid_CF7_handler_view', $column);
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
        $Page = new bcapi_productsPage("bcapi_products.php", "bcapi_products", GetCurrentUserGrantForDataSource("bcapi_products"), 'UTF-8');
        $Page->SetTitle('Bcapi Products');
        $Page->SetMenuLabel('Bcapi Products');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("bcapi_products"));
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
	
