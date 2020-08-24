<?php

function generateTable(array $customers)
{
    $result = '';
    if (sizeof($customers) === 1) {
        foreach ($customers as $customer){

            $result = $result."<tr>
                        <td>${customer['first_name']}</td>
                        <td>${customer['second_name']}</td>
                        <td>${customer['address']}</td>    
                        <td></td>                                    
                    </tr>";
        }
    } else {
        foreach ($customers as $customer){
            $result = $result. "<tr>
                        <td>${customer['first_name']}</td>
                        <td>${customer['second_name']}</td>
                        <td>${customer['address']}</td> 
                        <td><a class='btn btn-success' href='/customer/${customer["id"]}' role='button'>View Customer</a></td>                                       
                    </tr>";
        }
    }
    return $result;

}

