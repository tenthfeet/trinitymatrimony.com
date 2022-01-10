<?php
/**
 * Developed by tenthfeet.com
 */
//ob_start();
//session_start();
// Turn off all error reporting
error_reporting(1);
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

//echo 
$fy = $_SESSION['fy'] = 2021;

                            
/* online db */
//define( 'DB_HOST', 'localhost'); define( 'DB_NAME', 'minierpdemo'); define( 'DB_USERNAME', 'minierpdemo'); define( 'DB_PASSWORD', 'Mini@rpdemo');

/* local db */
define( 'DB_HOST', 'localhost'); define( 'DB_USERNAME', 'root'); define( 'DB_PASSWORD', ''); define( 'DB_NAME', 'admin_lte_material');
//define( 'DB_HOST', 'localhost'); define( 'DB_USERNAME', 'softlab'); define( 'DB_PASSWORD', 'softlab'); define( 'DB_NAME', 'softlab');
/* onlinel db */
//define( 'DB_HOST', 'localhost'); define( 'DB_NAME', 'freedbs'); define( 'DB_USERNAME', 'freedbs'); define( 'DB_PASSWORD', 'Freedbs@123');


define( 'Admin', 'tferp_admin_lte_1admin_users');
define( 'cities', 'tferp_admin_lte_1cities');
define( 'config', 'tferp_admin_lte_1config');
define( 'consignees', 'tferp_admin_lte_1consignees');
define( 'customers', 'tferp_admin_lte_1customers');
define( 'gst', 'tferp_admin_lte_1gst');
define( 'itemtype', 'tferp_admin_lte_1itemtypes');
define( 'settings', 'tferp_admin_lte_1settings');
define( 'suppliers', 'tferp_admin_lte_1suppliers');
define( 'uom', 'tferp_admin_lte_1uom');
define( 'users', 'tferp_admin_lte_1users');
define( 'items', 'tferp_admin_lte_2items_'.$fy);

require_once "Classes/DBcon.php";
require_once "Classes/Admin.php";
require_once "Classes/User.php";
require_once "Classes/Masters.php";

define( 'RETAILERSALESDETAILS', '');
//define( 'COPYRIGHTNAME', 'tenthfeet.com');
//define( 'COPYRIGHTURL', 'http://tenthfeet.com');
define( 'COPYRIGHTNAME', 'trinitymatrimony.com');
define( 'COPYRIGHTURL', 'http://trinitymatrimony.com');

require_once "Classes/DBcon.php";
$db = new Class_DBcon();
$con = $db->con;

$qryconfig = "SELECT * FROM ".config." WHERE 1=1";
$resultconfig = mysqli_query($con, $qryconfig);
$rowconfig = $resultconfig->fetch_assoc();

define( 'GENAME', $rowconfig['gename']); 
define( 'RETAILERS', $rowconfig['RETAILERS']);
define( 'RETAILERSbyline', $rowconfig['RETAILERSbyline']);
define( 'RETAILERSBOLD', $rowconfig['RETAILERSBOLD']);
define( 'RETAILERSNORMAL', $rowconfig['RETAILERSNORMAL']);
define( 'RETAILERSBOLDMINI', $rowconfig['RETAILERSBOLDMINI']);
define( 'RETAILERSNORMALMINI', $rowconfig['RETAILERSNORMALMINI']);
define( 'RETAILERADDRESS1', $rowconfig['RETAILERADDRESS1']);
define( 'RETAILERADDRESS2', $rowconfig['RETAILERADDRESS2']);
define( 'RETAILERADDRESS3', $rowconfig['RETAILERADDRESS3']);
define( 'RETAILEREMAIL', $rowconfig['RETAILEREMAIL']);
define( 'RETAILERPHONE', $rowconfig['RETAILERPHONE']);
define( 'RETAILERGSTIN', $rowconfig['RETAILERGSTIN']);
define( 'RETAILERPAN', $rowconfig['RETAILERPAN']);
define( 'RETAILERWEBSITE', $rowconfig['RETAILERWEBSITE']);
define( 'BANKNAME', $rowconfig['BANKNAME']);
define( 'BANKACCOUNTNO', $rowconfig['BANKACCOUNTNO']);
define( 'BANKIFSC', $rowconfig['BANKIFSC']);
define( 'BANKBRANCH', $rowconfig['BANKBRANCH']);
define( 'CSSFILENAME', $rowconfig['CSSFILENAME']);
define( 'HEADERTITLE', $rowconfig['HEADERTITLE']);
define( 'LOGO', $rowconfig['LOGO']);
define( 'LOGO2', $rowconfig['LOGO2']);
define( 'LOGO3', $rowconfig['LOGO3']);
define( 'CSSSKIN', $rowconfig['CSSSKIN']);


define( 'invoice_particulars_nooflines',9);
define( 'single_retailer_address','T');
define( 'double_retailer_address','F');


if(double_retailer_address == T){ 
  define( 'RETAILERFACTORY', $rowconfig['RETAILERFACTORY']);
  define( 'RETAILEROFFICE', $rowconfig['RETAILEROFFICE']);
  define( 'RETAILERFACTORYADDRESS1', $rowconfig['RETAILERFACTORYADDRESS1']);
  define( 'RETAILERFACTORYADDRESS2', $rowconfig['RETAILERFACTORYADDRESS2']);
  define( 'RETAILERFACTORYADDRESS3', $rowconfig['RETAILERFACTORYADDRESS3']);
  define( 'RETAILERFACTORYPHONE', $rowconfig['RETAILERFACTORYPHONE']);
  define( 'RETAILERFACTORYEMAIL', $rowconfig['RETAILERFACTORYEMAIL']);
  define( 'RETAILERFACTORYWEBSITE', $rowconfig['RETAILERFACTORYWEBSITE']); 
}




$bodyclass='class="hold-transition '.CSSSKIN.' sidebar-mini fixed"';  
//$bodyclass='class="hold-transition skin-blue sidebar-mini"';  

$qrysettings = "SELECT * FROM ".settings." WHERE status ='Active' ";
$resultsettings = mysqli_query($con, $qrysettings);

while($rowsettings = $resultsettings->fetch_assoc()) {
  define( $rowsettings['name'], $rowsettings['value'] );
  define( $rowsettings['invoicecoloumname'], $rowsettings['invoicecoloumvalue'] );
}                    

mysqli_close($con);

//define( 'invoice_termsandconditions',  '<ol><li>Goods once sold cannot taken back</li><li>Subject to COIMBATORE juridiction only</li><li>Checque return charges 500/- </li></ol>');

//define( 'invoice_termsandconditions',  '<ol><li>Payment with in 30 days is must</li><li>No Return will be accepted</li><li>Bill to Bill Clearance in Payment is Must<li>Late Payment will be charged 24% per annum</li><li>Subject to Coimbatore Jurisdiction only</li> </ol>');

//mec
define( 'invoice_termsandconditions',  '<ol><li>Goods are securely packed and delivered in good condition to the carriers and clear receipts are obtained claim for any loss or damage should be made to the carriers</li><li>Interest at 18% will be charged on accounts unpaid one month after delivery</li><li>All Disputes are to be settled in Coimbatore Court only</li> </ol>');

define( 'invoice_declaration', 'F');
define( 'invoice_declaration_statement',  '<strong>Declaration:</strong> We declare that this '.$pageheading.' shows the actual price of the Goods described and that all particulars are True and Correct.'); 