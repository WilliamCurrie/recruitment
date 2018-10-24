<?php


namespace Tests;

use DI\Container;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class TestCaseDB extends TestCase
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * TestCaseDB constructor.
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function __construct()
    {
        parent::__construct();
        /** @var Container $container */
        $container = $GLOBALS['container'];

        $this->em = $container->get('entity.manager');


    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function setUp()
    {
        $this->em->beginTransaction();
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param string $fqdnClass Class' fully qualifid donamin name
     */
    public function deleteAllRecords(string $fqdnClass)
    {
        $qb = $this->em->createQueryBuilder();

        $qb->delete($fqdnClass, 'f');

        $qb->getQuery()->execute();
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function tearDown()
    {
        parent::tearDown();
        $this->em->rollback();
    }
}
