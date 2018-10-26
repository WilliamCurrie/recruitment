<?php

namespace App\Controllers;

class Customer extends BaseController
{
    private $table = "customers";

    public $first_name = null;
    public $last_name = null;
    public $title = null;
    public $address = null;

    /**
     * @return string
     */
    private function baseSelectQuery(): string
    {
        return "SELECT * FROM {$this->table}";
    }

    /**
     * @param array $row
     * @return array
     */
    private function transform(array $row): array
    {
        return [
            'first_name' => $row['first_name'],
            'second_name' => $row['second_name'],
        ];
    }

    /**
     * @return bool|\Exception
     */
    public function fieldsAreValid()
    {
        try {
            if (empty($this->first_name)) throw new \Exception("first_name field required", 400);

            if (empty($this->last_name)) throw new \Exception("last_name field required", 400);

            // if (empty($this->title)) throw new \Exception("title field required", 400);
            // if (empty($this->address)) throw new \Exception("address field required", 400);

            return true;
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * @return bool
     */
    public function saveCustomer()
    {
        try {
            if (($validator = $this->fieldsAreValid()) !== true) {
                throw $validator;
            }

            $statement = $this->database()->prepare(
                "INSERT INTO {$this->table} (first_name, second_name) VALUES (?,?)"
            );

            $statement->bind_param("ss", $this->first_name, $this->last_name);
            $statement->execute();

            return $statement->close();

        } catch (\Exception $exception) {
            return false;
        }
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public function findById($id)
    {
        $statement = $this->database()->prepare("{$this->baseSelectQuery()} WHERE id = ?");
        $statement->bind_param("s", $id);
        $statement->execute();

        $result = $statement->get_result();

        if ($result->num_rows === 0) return [];

        return $result->fetch_row();
    }

    /**
     * @param array $options
     * @return array
     * @internal param string $second_name
     */
    public function getCustomers(array $options = []): array
    {
        $conditions = [];
        
        $query = $this->baseSelectQuery();

        if (!empty($options['first_name'])) {
            $conditions[] = sprintf(
                "first_name = '%s'",
                $this->database()->real_escape_string($options['first_name'])
            );
        }

        if (!empty($options['second_name'])) {
            $conditions[] = sprintf(
                "second_name = '%s'",
                $this->database()->real_escape_string($options['second_name'])
            );
        }

        if (!empty($conditions)) {
            $params = implode(" AND ", $conditions);

            $query = "{$query} WHERE $params";
        }

        $query = $this->database()->prepare($query);
        $query->execute();

        $result = $query->get_result();

        if ($result->num_rows === 0) {
            return [];
        }

        $customers = [];

        while ($row = $result->fetch_assoc()) {
            $customers[] = $this->transform($row);
        }

        return $customers;
    }

    /**
     * @param string $first_name
     * @param string $last_name
     * @return string
     */
    public function formatNames(string $first_name, string $last_name): string
    {
        return "{$first_name} {$last_name}";
    }

}