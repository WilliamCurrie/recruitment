<?php

class Customers extends Controller {

    private $model;

    /**
     * Posts constructor.
     */
    public function __construct() {
        $this->model = $this->loadModel("Customer");
    }

    /**
     * Default page.
     */
    public function index() {
        $customers = $this->model->getCustomers();

        $data = [
            "customers" => $customers,
        ];

        $this->loadView("customers/index", $data);
    }

    /**
     * Adds a Customer.
     */
    public function addCustomer() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "first_name" => trim($_POST["first_name"]),
                "last_name" => trim($_POST["last_name"]),
                "address" => trim($_POST["address"]),
                "twitter_alias" => trim($_POST["twitter_alias"])
            ];

            //Validate name
            if (empty($data["first_name"]) || empty($data["last_name"])) {
                $data["nameError"] = "Please enter a name.";
            }

            //Validate address
            if (empty($data["address"])) {
                $data["addressError"] = "Please enter valid address.";
            }

            //Make sure no errors
            if (empty($data["nameError"]) && empty($data["addressError"])) {
                //Validated
                if ($this->model->saveCustomer($data)) {
                    echo "New Customer Is Added!";
                    redirect("/");
                } else {
                    die("Something went wrong when trying to add a new customer.");
                }
            } else {
                die("Something went wrong when trying to add a new customer.");
            }
        } else {
            $data = [
                "first_name" => "",
                "last_name" => "",
                "address" => "",
                "twitter_aliass" => ""
            ];
        }

        $data = [
            "first_name" => "",
            "last_name" => "",
            "address" => "",
            "twitter_aliass" => ""
        ];

        $this->loadView("customers/index", $data);
    }

    public function show($surname) {
        $pathFragments = explode('/', $_SERVER["QUERY_STRING"]);
        $surname = end($pathFragments);

        if (!empty($this->model->getCustomerBySurname($surname))) {
            $user = $this->model->getCustomerBySurname($surname);

            $data = [
                "user" => $user
            ];

            $this->loadView("customers/show", $data);
        } else {
            redirect("/");
        }
    }

}
