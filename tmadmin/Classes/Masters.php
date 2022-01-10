<<<<<<< HEAD
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

  

=======
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

  

>>>>>>> 80ad18a9e8edf8966f3abec631dd834096f06899
}//Class end