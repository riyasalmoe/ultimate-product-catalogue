<?php
/* This file is the action handler. The appropriate function is then called based 
*  on the action that's been selected by the user. The functions themselves are all
* stored either in Prepare_Data_For_Insertion.php or Update_Admin_Databases.php */

function Update_UPCP_Content() {
global $message;
if (isset($_GET['Action'])) {
				switch ($_GET['Action']) {
    				case "EditProduct":
						case "AddProduct":
        				$message = Add_Edit_Product();
								break;
						case "DeleteProduct":
								$message = Delete_UPCP_Product($_GET['Item_ID']);
								break;
						case "MassDeleteProducts":
								$message = Mass_Delete_Products();
								break;
						case "AddProductSpreadsheet":
        				$message = Add_Products_From_Spreadsheet();
								break;
						case "AddProductImage":
								$message = Prepare_Add_Product_Image();
								break;
						case "DeleteProductImage":
								$message = Delete_Product_Image();
								break;
						case "EditCategory":
						case "AddCategory":
        				$message = Add_Edit_Category();
								break;
						case "DeleteCategory":
								$message = Delete_UPCP_Category($_GET['Category_ID']);
								break;
						case "MassDeleteCategories":
								$message = Mass_Delete_Categories();
								break;
						case "EditCatalogue":
						case "AddCatalogue":
        				$message = Add_Edit_Catalogue();
								break;
						case "DeleteCatalogue":
								$message = Delete_UPCP_Catalogue($_GET['Catalogue_ID']);
								break;
						case "MassDeleteCatalogues":
								$message = Mass_Delete_Catalogues();
								break;
						case "DeleteCatalogueItem":
								$message = Delete_Products_Catalogue();
								break;
						case "EditSubCategory":
						case "AddSubCategory":
        				$message = Add_Edit_SubCategory();
								break;
						case "DeleteSubCategory":
								$message = Delete_UPCP_SubCategory($_GET['SubCategory_ID']);
								break;
						case "MassDeleteSubCategories":
								$message = Mass_Delete_SubCategories();
								break;
						case "EditTag":
						case "AddTag":
        				$message = Add_Edit_Tag();
								break;
						case "DeleteTag":
								$message = Delete_UPCP_Tag($_GET['Tag_ID']);
								break;
						case "MassDeleteTags":
								$message = Mass_Delete_UPCP_Tags();
								break;
						case "DeleteTaggedItem":
								$message = Delete_Products_Tags();
								break;
						case "EditCustomField":
						case "AddCustomField":
        				$message = Add_Edit_Custom_Field();
								break;
						case "DeleteCustomField":
								$message = Delete_UPCP_Custom_Field($_GET['Field_ID']);
								break;
						case "MassDeleteCustomFields":
								$message = Mass_Delete_UPCP_Custom_Fields();
								break;		
						case "UpdateOptions":
								$message = Update_UPCP_Options();
								break;
						default:
								$message = __("The form has not worked correctly. Please contact the plugin developer.", 'UPCP');
								break;
				}
		}
}

?>