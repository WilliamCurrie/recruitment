<?php


namespace Model\Helpers\Http;

use Klein\DataCollection\ServerDataCollection;
use Klein\Request as KRequest;

trait CORSTrait
{
    /**
     * @var array How do allow known friends to use our services
     */
    private static $defaultHeaders = [
        "Access-Control-Allow-Origin" => "*",
        "Access-Control-Allow-Credentials" => true,
        "Access-Control-Allow-Methods" => "OPTIONS, GET, POST, PUT",
        "Access-Control-Allow-Headers" =>
            "Content-Type, Depth, User-Agent, X-File-Size, " .
            "X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control"
    ];

    /**
     * @var array Defined the remote domains that we allow to make queries.
     * Notation is <remote_ip>:<port>, or <remote_domain>:<port>
     */
    private static $allowedDomains = [
        "localhost:8080"
    ];

    /**
     * Returns the CORs headers if the request comes from a white listed domain or client
     * @param KRequest $request
     * @return array
     */
    public static function getCorsHeadersForRequest(KRequest $request): array
    {

        /** @var ServerDataCollection $tmp */
        $tmp = $request->headers();
        $remoteHost = $tmp->get('host');

        $result = [];

        if (in_array($remoteHost, self::$allowedDomains)) {
            $result = self::$defaultHeaders;
        }

        return $result;
    }
}