<?php
/**
 * Developed by tenthfeet.com
 */
class Class_Masters
{
	/**
	 * @var contain database connection
	 */
	protected $_con;
	/**
	 * it will initalize DBclass
	 */
	public function __construct()
	{
		$db = new Class_DBcon();
		$this->_con = $db->con;
        global $modDate, $curDate;
        $modDate = $curDate  = date('Y-m-d');
	}



}//Class end