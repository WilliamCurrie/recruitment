<?php

namespace Database;

class MysqlAdapter implements DBMSAdapter
{
    // TODO: Move to .env
    const USES_PERSISTENT_CONNECTION = true;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var \mysqli
     */
    protected $link;

    /**
     * @var bool|\mysqli_result
     */
    protected $result;

    /**
     * Constructor
     * @param array $config
     */
    public function __construct(array $config)
    {
        if (count($config) !== 4) {
            throw new \InvalidArgumentException('Invalid number of connection parameters.');
        }

        $this->config = $config;
    }

    /**
     * @return \mysqli
     */
    public function getLink()
    {
        if (self::USES_PERSISTENT_CONNECTION) {
            return PersistentConnection::$connectionLink;
        }

        return $this->link;
    }

    /**
     * @param \mysqli $link
     */
    public function setLink($link)
    {
        if (self::USES_PERSISTENT_CONNECTION) {
            PersistentConnection::$connectionLink = $link;
            return;
        }

        $this->link = $link;
    }

    /**
     * Connect to MySQL
     */
    public function connect()
    {
        // If there is not already available connection
        if (null === $this->getLink()) {
            list($host, $user, $password, $database) = $this->config;
            try {
                $this->setLink(@mysqli_connect($host, $user, $password, $database));
            } catch (\Exception $e) {
                throw new \RuntimeException(
                    'Error connecting to the data server : ' . $e->getMessage() . '::' . mysqli_connect_error()
                );
            }

            unset($host, $user, $password, $database);
        }
    }

    /**
     * Execute the specified query
     * @param string $query
     *
     * @return bool|\mysqli_result
     */
    public function query($query)
    {
        if (!is_string($query) || '' === trim($query)) {
            throw new \InvalidArgumentException('The specified query is not valid.');
        }

        if (!$this->result = mysqli_query($this->getLink(), $query)) {
            throw new \RuntimeException(
                'Error executing the specified query ' . $query . mysqli_error($this->getLink())
            );
        }

        return $this->result;
    }

    /**
     * @param string $table
     * @param string $where
     * @param string $fields
     * @param string $order
     *
     * @return MysqlAdapter
     */
    public function select(
        $table,
        $where = '',
        $fields = '*',
        $order = ''
    )
    {
        $where = '' !== $where ? ' WHERE ' . $where : '';
        $order = '' !== $order ? ' ORDER BY ' . $order : '';

        $query = 'SELECT ' . $fields . ' FROM ' . $table .  $where . $order . ';';
        $this->query($query);

        return $this;
    }

    /**
     * @param string $table
     * @param array $data
     */
    public function insert($table, array $data)
    {
        $fields = implode(',', array_keys($data));
        $values = implode(',', array_map(array($this, 'quoteValue'), array_values($data)));
        $query = 'INSERT INTO ' . $table . ' (' . $fields . ')  ' .  ' VALUES (' . $values . ')';

        $this->query($query);
    }

    /**
     * Escape the specified value
     * @param string|null $value
     *
     * @return string|null
     */
    public function quoteValue($value)
    {
        if ('' === trim($value)) {
            $value = '\'NULL\'';
        } else if (!is_numeric($value)) {
            $value = '\'' . mysqli_real_escape_string($this->getLink(), $value) . '\'';
        }

        return $value;
    }

    /**
     * TODO: Needs implementation
     *
     * @param string $table
     * @param array $data
     * @param string $where
     *
     * @return null
     */
    public function update($table, array $data, $where = '')
    {
        return null;
    }

    /**
     * TODO: Needs implementation
     *
     * @param string $table
     * @param string $where
     * @return int
     */
    public function delete($table, $where = '')
    {
        return null;
    }

    /**
     * Fetch a single row from the current result set (as an associative array)
     * @return array
     */
    public function fetch()
    {
        if ($this->result !== null) {
            if (($row = mysqli_fetch_array($this->result, MYSQLI_ASSOC)) === false) {
                $this->freeResult();
            }
            return $row;
        }

        return [];
    }

    /**
     * Free up the current result set
     */
    public function freeResult()
    {
        if ($this->result === null) {
            return false;
        }

        mysqli_free_result($this->result);
        return true;
    }

    /**
     * Close explicitly the database connection
     */
    public function disconnect()
    {
        if ($this->getLink() === null) {
            return;
        }

        mysqli_close($this->getLink());

        $this->setLink(null);
    }
}
