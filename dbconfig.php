//This file edited on master project 2.49pm
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
class db 

{    

	 //Mysql connection start

     public function open_connection()

     {

          try

          {

			$hostname = "localhost";

			$username = "root";

			$password = "";

			$database = "technician";

			$connect = mysql_connect($hostname,$username,$password);

			$select_db = mysql_select_db($database);

          }

          catch(exception $e)

          {

               return $e;

          }

     }     

	 //Mysql connection close

     public function close_connection()

     {

          try

          {

               mysql_close();

          }

          catch(exception $e)

          {

               return $e;

          }

     }	 

	//Multiple rows fetching

	function fetchArray($get_result){				

		$array = mysql_fetch_array($get_result,MYSQL_ASSOC);

		return $array;

	}

	

	//Get query result

	function get_qresult($get_query){

		$get_result = mysql_query($get_query) or die($get_query.mysql_error());

		return $get_result;

	}

	

	//getting single record

	function fetchRow($select_query){

		$select_result=mysql_query($select_query) or die($select_query.mysql_error());

		$select_row = mysql_fetch_array($select_result);

		return $select_row;

	}	

	

	//getting selected field in a record

	function fetch_field($select_query){
 
		$select_result=mysql_query($select_query) or die($select_query.mysql_error());

		$select_row = mysql_fetch_array($select_result);

		if($select_row) return $select_row[0]; else return 0;

	}	

		

	//count records

	function fetchNum($select_query){

		$select_result=mysql_query($select_query) or die($select_query.mysql_error());

		$get_num = mysql_num_rows($select_result);

		return $get_num;

	}

} // class ending

?>



