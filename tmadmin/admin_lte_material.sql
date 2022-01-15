-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 03:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_lte_material`
--

-- --------------------------------------------------------

--
-- Table structure for table `tferp_admin_lte_1config`
--

CREATE TABLE `tferp_admin_lte_1config` (
  `id` int(11) NOT NULL,
  `gename` text NOT NULL,
  `RETAILERS` text NOT NULL,
  `RETAILERSbyline` text NOT NULL,
  `RETAILERSBOLD` text NOT NULL,
  `RETAILERSNORMAL` text NOT NULL,
  `RETAILERSBOLDMINI` text NOT NULL,
  `RETAILERSNORMALMINI` text NOT NULL,
  `RETAILERADDRESS1` text NOT NULL,
  `RETAILERADDRESS2` text NOT NULL,
  `RETAILERADDRESS3` text NOT NULL,
  `RETAILEREMAIL` text NOT NULL,
  `RETAILERPHONE` text NOT NULL,
  `RETAILERGSTIN` text NOT NULL,
  `RETAILERPAN` text NOT NULL,
  `RETAILERWEBSITE` text NOT NULL,
  `BANKNAME` text NOT NULL,
  `BANKACCOUNTNO` text NOT NULL,
  `BANKIFSC` text NOT NULL,
  `BANKBRANCH` text NOT NULL,
  `CSSFILENAME` text NOT NULL,
  `CSSSKIN` text NOT NULL,
  `HEADERTITLE` text NOT NULL,
  `LOGO` text NOT NULL,
  `LOGO2` text NOT NULL,
  `LOGO3` text NOT NULL,
  `RETAILERFACTORY` text NOT NULL,
  `RETAILEROFFICE` text NOT NULL,
  `RETAILERFACTORYADDRESS1` text NOT NULL,
  `RETAILERFACTORYADDRESS2` text NOT NULL,
  `RETAILERFACTORYADDRESS3` text NOT NULL,
  `RETAILERFACTORYPHONE` text NOT NULL,
  `RETAILERFACTORYEMAIL` text NOT NULL,
  `RETAILERFACTORYWEBSITE` text NOT NULL,
  `GST_STATECODE` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tferp_admin_lte_1config`
--

INSERT INTO `tferp_admin_lte_1config` (`id`, `gename`, `RETAILERS`, `RETAILERSbyline`, `RETAILERSBOLD`, `RETAILERSNORMAL`, `RETAILERSBOLDMINI`, `RETAILERSNORMALMINI`, `RETAILERADDRESS1`, `RETAILERADDRESS2`, `RETAILERADDRESS3`, `RETAILEREMAIL`, `RETAILERPHONE`, `RETAILERGSTIN`, `RETAILERPAN`, `RETAILERWEBSITE`, `BANKNAME`, `BANKACCOUNTNO`, `BANKIFSC`, `BANKBRANCH`, `CSSFILENAME`, `CSSSKIN`, `HEADERTITLE`, `LOGO`, `LOGO2`, `LOGO3`, `RETAILERFACTORY`, `RETAILEROFFICE`, `RETAILERFACTORYADDRESS1`, `RETAILERFACTORYADDRESS2`, `RETAILERFACTORYADDRESS3`, `RETAILERFACTORYPHONE`, `RETAILERFACTORYEMAIL`, `RETAILERFACTORYWEBSITE`, `GST_STATECODE`) VALUES
(1, 'simple', 'Trinity Matrimony', '', 'Trinity', 'Matrimony', 'T', 'M', 'Holy Trinity Syro Malabar Cathedral,\r\nTrichy Rd, Palaniappa Nagar, Sowripalayam Pirivu, ', 'Ramanathapuram', 'COIMBATORE - 641045', 'holytrinitycathedal.in@gmail.com', '0422-4221795', 'ABCDEFGHIJKLMNO', 'ABCDEFGHIJ', '', 'AXIS', '50200012977956', 'UTI000', 'Ramanathapuram Branch, Coimbatore', '', 'skin-blue', 'miniERP', 'trinitylogo.jpg', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tferp_admin_lte_1settings`
--

CREATE TABLE `tferp_admin_lte_1settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(1) NOT NULL,
  `status` varchar(10) NOT NULL,
  `invoicecoloumname` text NOT NULL,
  `invoicecoloumvalue` text NOT NULL,
  `ITEMS_purchase_rate` varchar(1) NOT NULL,
  `ITEMS_sales_rate` varchar(1) NOT NULL,
  `ITEMS_gst` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tferp_admin_lte_1settings`
--

INSERT INTO `tferp_admin_lte_1settings` (`id`, `name`, `value`, `status`, `invoicecoloumname`, `invoicecoloumvalue`, `ITEMS_purchase_rate`, `ITEMS_sales_rate`, `ITEMS_gst`) VALUES
(1, 'discount', 'F', 'Active', 'idiscount', 'Discount', 'F', 'F', 'F'),
(2, 'itemwisegst', 'F', 'Active', '', '', 'F', 'F', 'F'),
(3, 'shipping', 'F', 'Active', 'ishipping', 'Shipping', 'F', 'F', 'F'),
(4, 'advance', 'F', 'Active', 'iadvance', 'Advance', 'F', 'F', 'F'),
(5, 'invoice_dcnumber', 'T', 'Active', 'iinvoice_dcnumber', 'DC No', '', '', ''),
(6, 'invoice_ordernumber', 'T', 'Active', 'iinvoice_ordernumber', 'Order No', '', '', ''),
(7, 'invoice_orderdate', 'T', 'Active', 'iinvoice_orderdate', 'Order Date', '', '', ''),
(8, 'invoice_dcdate', 'T', 'Active', 'iinvoice_dcdate', 'DC Date', '', '', ''),
(9, 'invoice_lrnumber', 'T', 'Active', 'iinvoice_lrnumber', 'LR No', '', '', ''),
(10, 'invoice_vehiclenumber', 'F', 'Active', 'iinvoice_vehiclenumber', 'Vehicle No', '', '', ''),
(11, 'invoice_transportname', 'T', 'Active', 'iinvoice_transportname', 'Carrier', '', '', ''),
(12, 'invoice_despatchdocnumber', 'F', 'Active', 'iinvoice_despatchdocnumber', 'Despatch Doc No', '', '', ''),
(13, 'invoice_deliverynote', 'F', 'Active', 'iinvoice_deliverynote', 'Delivery Note', '', '', ''),
(14, 'invoice_deliverynotedate', 'F', 'Active', 'iinvoice_deliverynotedate', 'Delivery Note Date', '', '', ''),
(15, 'invoice_supplierref', 'F', 'Active', 'iinvoice_supplierref', 'Supplier Ref', '', '', ''),
(16, 'invoice_otherref', 'F', 'Active', 'iinvoice_otherref', 'Other Ref', '', '', ''),
(17, 'invoice_consigneeaddress', 'T', 'Active', 'iinvoice_consigneeaddress', 'Consignee Address', '', '', ''),
(18, 'invoice_tod', 'F', 'Active', '', '', '', '', ''),
(19, 'invoice_lrdate', 'T', 'Active', 'iinvoice_lrdate', 'LR Date', '', '', ''),
(20, 'invoice_deliveryat', 'T', 'Active', 'iinvoice_deliveryat', 'Delivery At', '', '', ''),
(21, 'numberofpacks', 'F', 'Active', 'inumberofpacks', 'Tot Wgt', '', '', ''),
(22, 'typeofpack', 'F', 'Active', 'itypeofpack', 'Pack Type', '', '', ''),
(23, 'qtyinkgs', 'F', 'Active', 'iqtyinkgs', 'Qty in Kgs', '', '', ''),
(24, 'itemtype', 'F', 'Active', 'iitemtype', 'Type', '', '', ''),
(25, 'itemunit', 'F', 'Active', 'iitemunit', 'UOM', '', '', ''),
(26, 'cess', 'F', 'Active', 'icess', 'Cess', '', '', ''),
(27, 'menupurchaseordersmain', 'T', 'Active', 'ipurchaseordersmain', 'Purchase Orders', '', '', ''),
(28, 'menupurchaseorderslist', 'T', 'Active', 'ipurchaseorderslist', 'Purchase Orders', '', '', ''),
(29, 'menupurchaseordersdetails', 'T', 'Active', 'ipurchaseordersdetails', 'Purchase Orders', '', '', ''),
(30, 'menusalesmain', 'T', 'Active', '', ' ', '', '', ''),
(31, 'menudeliverychallanslist', 'T', 'Active', '', ' ', '', '', ''),
(32, 'menudeliverychallansdetails', 'T', 'Active', '', ' ', '', '', ''),
(33, 'menuinvoiceslist', 'T', 'Active', '', '', '', '', ''),
(34, 'menuinvoicesdetails', 'T', 'Active', '', '', '', '', ''),
(35, 'menuproformainvoiceslist', 'T', 'Active', '', '', '', '', ''),
(36, 'menuproformainvoicesdetails', 'T', 'Active', '', '', '', '', ''),
(37, 'menulabourinvoiceslist', 'T', 'Active', '', '', '', '', ''),
(38, 'menulabourinvoicesdetails', 'T', 'Active', '', '', '', '', ''),
(39, 'menureportsmain', 'T', 'Active', '', ' ', '', '', ''),
(40, 'menuaccountsmain', 'T', 'Active', '', ' ', '', '', ''),
(41, 'invoiceprint_logo', 'F', 'Active', '', '', '', '', ''),
(42, 'invoiceprint_consignee', 'T', 'Active', '', '', '', '', ''),
(43, 'invoiceprefix', '', 'Active', '', '', '', '', ''),
(44, 'bagno', 'T', 'Active', 'ibagno', 'Bag No.', '', '', ''),
(45, 'liinvoiceprefix', 'F', '', '', 'S - ', '', '', ''),
(46, 'deliveryjoboption', 'T', 'Active', 'ideliveryjoboption', '', '', '', ''),
(47, 'deliverychallanstartno', '5', '', '', '', '', '', ''),
(48, 'printdateandtime', 'F', 'Active', '', '', '', '', ''),
(49, 'buyerORto', 'T', 'Active', 'ibuyerORto', 'To', '', '', ''),
(50, 'consignee\r\n', 'T', 'Active', 'iconsignee', 'Consignee', '', '', ''),
(51, 'ewaybillno', 'T', 'Active', '', '', '', '', ''),
(52, 'ewaybilldate', 'T', 'Active', '', '', '', '', ''),
(53, 'invoicestartno', '2', '', '', '', '', '', ''),
(54, 'invoice_despatchthrough', 'T', 'Active', '', '', '', '', ''),
(55, 'rateperunit', 'T', 'Active', 'irateperunit', 'Rate', '', '', ''),
(56, 'noofunits', 'T', 'Active', 'inoofunits', 'Quantity', '', '', ''),
(57, 'menugrnlist', 'T', 'Active', '', '', '', '', ''),
(58, 'menugrndetails', 'T', 'Active', '', '', '', '', ''),
(59, 'consignee_address', 'T', 'Active', '', '', '', '', ''),
(60, 'invoice_creditdays', 'T', 'Active', 'invoice_creditdays_name', 'Credit Days', '', '', ''),
(61, 'loadingcharge', 'F', 'Active', 'iloadingcharge', 'Loading charge', '', '', ''),
(62, 'deliverycharge', 'F', 'Active', 'ideliverycharge', 'Delivery Charge', '', '', ''),
(63, 'cuttingcharge', 'F', 'Active', 'icuttingcharge', 'Cutting Charge', '', '', ''),
(64, 'rollingcharge', 'F', 'Active', 'irollingcharge', 'Rolling Charge', '', '', ''),
(65, 'scrapless', 'F', 'Active', 'iscrapless', 'Scrap Less', '', '', ''),
(66, 'revisecharges', 'F', 'Active', 'irevisecharges', 'TDS/TCS/Revise Charges', '', '', ''),
(67, 'granddiscount', 'T', 'Active', 'igranddiscount', 'Discount', '', '', ''),
(68, 'invoicepostfix', 'F', 'Active', 'iinvoicepostfix', '', '', '', ''),
(69, 'HSN', 'F', 'Active', 'HSN_Code', 'HSN Code', '', '', ''),
(70, 'description_of_goods', 'T', 'Active', 'idescription_of_goods', 'Item Code - Item Name', '', '', ''),
(71, 'processdropdown', 'T', 'Active', 'iprocess', 'Process', '', '', ''),
(72, 'weight', 'T', 'Active', 'weight', 'Weight', '', '', ''),
(73, 'totalweight', 'T', 'Active', 'itotalweight', 'Tot Wgt', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tferp_admin_lte_1users`
--

CREATE TABLE `tferp_admin_lte_1users` (
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `IMEI` text NOT NULL,
  `pic` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'A',
  `usertype` varchar(20) NOT NULL,
  `trcompany` int(11) NOT NULL,
  `idproof` text NOT NULL,
  `addressproof` text NOT NULL,
  `photo` text NOT NULL,
  `franchiseename` text NOT NULL,
  `merchantname` text NOT NULL,
  `address1` text NOT NULL,
  `latlong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tferp_admin_lte_1users`
--

INSERT INTO `tferp_admin_lte_1users` (`user_id`, `name`, `email`, `password`, `IMEI`, `pic`, `created`, `modified`, `phone`, `status`, `usertype`, `trcompany`, `idproof`, `addressproof`, `photo`, `franchiseename`, `merchantname`, `address1`, `latlong`) VALUES
(1, 'Super Admin', 'admin@gmail.com', 'a57dfc1a18cd43f8201a0bebb8ce3b63', '', '', '2020-02-05 00:00:00', '2020-02-10 00:00:00', '9894414717', 'Active', 'Superadmin', 0, '', '', '', '', '', '', ''),
(20, 'user1', 'admin2@gmail.com', 'a57dfc1a18cd43f8201a0bebb8ce3b63', '', '', '2021-10-12 00:00:00', '0000-00-00 00:00:00', '9876543210', 'Active', '', 0, 'uploadidproof/team4.jpg', '', '', 'fr1', '', 'address', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tferp_admin_lte_1config`
--
ALTER TABLE `tferp_admin_lte_1config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tferp_admin_lte_1settings`
--
ALTER TABLE `tferp_admin_lte_1settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tferp_admin_lte_1users`
--
ALTER TABLE `tferp_admin_lte_1users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tferp_admin_lte_1config`
--
ALTER TABLE `tferp_admin_lte_1config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tferp_admin_lte_1settings`
--
ALTER TABLE `tferp_admin_lte_1settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tferp_admin_lte_1users`
--
ALTER TABLE `tferp_admin_lte_1users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
