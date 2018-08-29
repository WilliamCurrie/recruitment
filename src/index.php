<?php
    error_reporting(E_ALL);

    function __autoload( $class_name ) {
	
        /**
         * Note we are just looking for a PHP file with the same name as the class in question.
         * actual usage may require some string operations to specify the filename
         */
        $file_name = 'Controllers/' . $class_name . '.php';
        if( file_exists(  $file_name ) ) {
            require $file_name;
        }
    }
    
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple  App</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<h1>Simple Database App</h1>
<?php
    $customer = new Customer();
    $customer->firstName = "Jim";
    $customer->lastName = "Johnson";
    print $customer->firstName;
    print $customer->lastName;
    $customer->saveCustomer();
?>
<br />
<?php
    $customersSurname = $customer->getCustomersSurname();
    if( $customersSurname ) {
        foreach ( $customersSurname as $key=>$datas ) {
            echo $datas;
            echo '<br />';
        }
    } else {
        echo ' No result';
    }
?>
    <br />
    <?php
    $customer2 = new Customer();
    $customers = $customer2->getAllCustomers();
    if( isset($customers) ) {
?>
    <table>
        <?php 
            foreach ( $customers as $key=>$datas ) {
                echo '<tr>';
                echo '<td>'. $datas['first_name'] .'</td>';
                echo '<td>'. $datas['second_name'] .'</td>';
                echo '</tr>';
            } 
        ?>
    </table>
    <?php
    } else {
        echo 'No customers found';
    }

    if( isset( $_GET['customerId']) && !empty( $_GET['customerId'] )  )
    {
        $bookings = new Booking();
        $results = $bookings->GetBookings($_GET['customerId']);
        if( $results )
        {
            foreach ($results as $result):
                echo $result['booking_reference'] . ' - '. $result['customer_name'] . $result['booking_date'];
                echo '<br />';
            endforeach;
        } else {
            echo "no booking found";
        }
    } else {
        echo 'Please provide an id';
    }
    ?>

</body>
</html>
