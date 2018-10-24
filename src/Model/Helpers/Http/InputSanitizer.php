<?php


namespace Model\Helpers\Http;


class InputSanitizer
{
    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param null|string $input
     * @return null|string
     */
    public function sanitizeString(?string $input): ?string
    {
        $result = $input;

        if ($input) {
            $result = strip_tags($result);
            $result = htmlentities($result);
            $result = htmlspecialchars($result);
        }

        return $result;
    }
}
