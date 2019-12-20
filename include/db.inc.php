<?php
class DB
     {
        ///Declaration of variables


       var $host="localhost";
        var $user="root";
        var $pwd="";
        var $persist=false;
        var $database="social_media";

        var $conn1=NULL;
        var $result=false;
        var $fields;
        var $check_fields;
        var $tbname;
        var $addNewFlag=false;
        ///End

      
        function DB($host="",$user="",$pwd="",$dbname="",$open=true)
        {
         if($host!="")
            $this->host=$host;
         if($user!="")
            $this->user=$user;
         if($pwd!="")
            $this->pwd=$pwd;
         if($dbname!="")
            $this->database=$dbname;

         if($open)
           $this->open();
        }
        function open($host="",$user="",$pwd="",$dbname="")
        {
         if($host!="")
            $this->host=$host;
         if($user!="")
            $this->user=$user;
         if($pwd!="")
            $this->pwd=$pwd;
         if($dbname!="")
            $this->database=$dbname;

         $this->connect();
         $this->select_db();
        }
        function set_host($host,$user,$pwd,$dbname)
        {
         $this->host=$host;
         $this->user=$user;
         $this->pwd=$pwd;
         $this->database=$dbname;
        }
        function affectedRows() //-- Get number of affected rows in previous operation
        {
         return @mysqli_affected_rows($this->conn1);
        }
        function close()//Close a connection to a  Server
        {
         return @mysqli_close($this->conn1);
        }
        function connect() //Open a connection to a Server
        {
          // Choose the appropriate connect function
          if ($this->persist)
              $func = 'mysql_pconnect';
          else
              $func = 'mysqli_connect';

          // Connect to the database server
          $this->conn1 = $func($this->host, $this->user, $this->pwd);
          if(!$this->conn1)
             return false;

        }
        function select_db($dbname="") //Select a databse
        {
          if($dbname=="")
             $dbname=$this->database;
          mysqli_select_db($this->conn1,$dbname);
        }
        function create_db($dbname) //Create a database
        {
          return @mysqli_create_db($dbname,$this->conn1);
        }
        function drop_db($dbname) //Drop a database
        {
         return @mysql_drop_db($dbname,$this->conn1);
        }
        function data_seek($row) ///Move internal result pointer
        {
         return mysqli_data_seek($this->result,$row);
        }
        function error() //Get last error
        {
            return (mysqli_error());
        }
        function errorno() //Get error number
        {
            return mysqli_errno();
        }
        function query($sql = '') //Execute the sql query
        {
            $this->result = mysqli_query($this->conn1,$sql);
            return ($this->result != false);
        }
        function numRows() //Return number of rows in selected table
        {
            return (@mysqli_num_rows($this->result));
        }
            function fieldName($field)
        {
           return (@mysqli_field_name($this->result,$field));
        }
                function fieldColumns() {
                        return (@mysqli_num_fields($this->result));
                }
            function insertID()
        {
            return (@mysqli_insert_id($this->conn1));
        }
        function fetchObject()
        {
            return (@mysqli_fetch_object($this->result, MYSQL_BOTH));
        }
        function fetchArray()
        {
            return (@mysqli_fetch_array($this->result));
        }
                function fetchRow()
        {
            return (@mysqli_fetch_row($this->result));
        }
        function fetchAssoc()
        {
            return (@mysqli_fetch_assoc($this->result));
        }
        function freeResult()
        {
            return (@mysqli_free_result($this->result));
        }
		function getSingleResult($sql)
		{
			$this->query($sql);
			$row=$this->fetchArray(MYSQL_NUM);
			$return=$row[0];
			return $return;
		}

     }


$db = new DB(); #######USE THIS CONNECTION INTO THE APPLICATION.
?>