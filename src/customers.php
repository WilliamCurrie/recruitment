<?php


class Customer
{

    //public $title;
    public $first_Name;
    public $second_name;
    public $address;
    private $dbc;

    	public function __construct($dbc) {

        $this->dbc = $dbc;
    	}

    	function saveCustomer(){
      
    	//for the sake of this code challenge, just checking first names!
    	$checkuser = 'SELECT first_name FROM customers WHERE first_name=\''.$this->first_Name.'\' ';
    	$sql1 = mysqli_query($this->dbc,$checkuser);
    		if(mysqli_num_rows($sql1)<= 0)
       		{
       		$qs = 'INSERT INTO customers (first_name, second_name) 
       			VALUES (\''.$this->first_Name.'\',\''.$this->second_name.'\')';
       		$sql2 = mysqli_query($this->dbc,$qs);
       		} else

       		{

       		}
       		
     	}
     	
     	function get_our_customers_by_surname(){
        
        
        $db = 'SELECT * FROM customers ORDER BY second_name';

        $res = mysqli_query($this->dbc,$db);
    		while($result= $res->fetch_assoc())
    		{
    			//print_r($result);
        	echo("<p />" . $this->formatNames($result["second_name"], $result["first_name"]));
        	

    		} 
    	}

    	function formatNames($firstName, $surname) {

        $full_name = $firstName .= ' ';
        $full_name .= $surname;
        return $full_name;
    	}

    	function getAllCustomers()
		{
                
                $res = $this->dbc->query('SELECT * FROM customers');
                echo '<table border=1 cellpadding=1 width="90%">';
                while ($result = $res->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'.$result['first_name'].'</ td>';
                    echo '<td>'.$result['second_name'].'</ td>';
                    echo '</tr>';
                }
                echo('</table>');
                
            }
    
}
?>