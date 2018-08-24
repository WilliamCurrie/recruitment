<?php

namespace Wranx\Bootstrap;

use DI\ContainerBuilder;
use function DI\get;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Illuminate\Database\Connection;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\SQLiteConnection;
use Psr\Container\ContainerInterface;
use Wranx\Application\Http\App\Routing\RouteMapper;
use Wranx\Framework\Routing\Router;

class ContainerFactory
{
    private $config;

    public function create(Config $config): ContainerInterface
    {
        $this->config = $config;

        return (new ContainerBuilder)
            ->useAutowiring(true)
            ->ignorePhpDocErrors(true)
            ->useAnnotations(false)
            ->writeProxiesToFile(false)
            ->addDefinitions($this->getDefinitions())
            ->build();
    }

    /**
     * @return array
     * @throws \UnexpectedValueException
     */
    protected function getDefinitions(): array
    {
        return array_merge(
            $this->defineFramework(),
            $this->defineDomain(),
            $this->defineConnections(),
            $this->defineConfig()
        );
    }

    private function defineConfig(): array
    {
        return [
            Config::class => \DI\factory(function () {
                return $this->config;
            }),
        ];
    }

    private function defineFramework(): array
    {
        return [
            ContainerInterface::class => \DI\factory(function (ContainerInterface $container) {
                return $container;
            }),

            Router::class => \DI\decorate(function (Router $router, ContainerInterface $container) {
                return $router->addRoutes($container->get(RouteMapper::class))
                    ->addRoutes($container->get(\Wranx\Application\Http\Api\Routing\RouteMapper::class));
            }),
        ];
    }

    private function defineDomain(): array
    {
        return [
            \Wranx\Domain\Customer\Persistence\Repository::class => get(\Wranx\Domain\Customer\Persistence\Illuminate\IlluminateRepository::class),

            \Wranx\Domain\Booking\Persistence\Repository::class => get(\Wranx\Domain\Booking\Persistence\Illuminate\IlluminateRepository::class),
        ];
    }

    private function defineConnections(): array
    {
        return [
            AbstractSchemaManager::class => \DI\factory(function (ContainerInterface $container) {
                return $container->get(Connection::class)->getDoctrineSchemaManager();
            }),

            Connection::class => \DI\factory(function (ContainerInterface $container) {

                $config = $container->get(Config::class);

                $dsn = $config->get('database.default.pdo.dsn');

                if (substr($dsn, 0, 5) === 'mysql') {
                    return new MySqlConnection($container->get(\PDO::class));
                }

                if (substr($dsn, 0, 6) === 'sqlite') {
                    return new SQLiteConnection($container->get(\PDO::class));
                }

                throw new \RuntimeException("Unrecognised DNS {$dsn}");
            }),

            \Doctrine\DBAL\Driver\Connection::class => \DI\factory(function (ContainerInterface $container) {
                return $container->get(Connection::class)->getDoctrineConnection();
            }),

            \PDO::class => \DI\factory(function (ContainerInterface $container) {
                $config = $container->get(Config::class);
                $pdo = new \PDO(
                    $config->get('database.default.pdo.dsn'),
                    $config->get('database.default.pdo.user'),
                    $config->get('database.default.pdo.password')
                );
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                return $pdo;
            }),
        ];
    }
}
