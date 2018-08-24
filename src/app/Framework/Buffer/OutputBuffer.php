<?php

namespace Wranx\Framework\Buffer;

class OutputBuffer
{
    /**
     * @param callable $callback
     * @return string
     */
    public static function capture(callable $callback): string
    {
        ob_start();

        $callback();

        $content = ob_get_contents();

        ob_end_clean();

        return $content ?: '';
    }
}
