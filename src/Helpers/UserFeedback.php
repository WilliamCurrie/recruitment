<?php

declare(strict_types=1);

namespace WilliamCurrie\Recruitment\Helpers;

use LogicException;

class UserFeedback
{
    public const MESSAGE_TYPE_INFO = 1;
    public const MESSAGE_TYPE_WARN = 2;

    protected const MESSAGE_TYPE_INFO_CLASS = 'info';
    protected const MESSAGE_TYPE_WARN_CLASS = 'warn';

    protected $messages = [];

    /**
     * @param string $message a short message to the user
     * @param int $messageClass message class please use UserMessage constants via instance
     *                          e.g. $obj::MESSAGE_TYPE_{INFO,WARN}
     * @return bool
     * @throws LogicException on unknown numeric messageClass
     */
    public function add(string $message, int $messageClass): bool
    {
        switch ($messageClass) {
            case self::MESSAGE_TYPE_INFO:
            case self::MESSAGE_TYPE_WARN:
                break;
            default:
                throw new LogicException('Unknown message class passed');
        }

        array_push($this->messages, ['msg' => $message, 'msg_class' => $messageClass]);
        return true;
    }

    /**
     * @param bool $sortByType Default false. If true messages will be sorted severity descending.
     *             Otherwise by inserted order.
     * @return array of messages in the format ['msg' => 'The message', 'msg_class' = 1]
     */
    public function getMessages(bool $sortByType = false): array
    {
        if (empty($this->messages)) {
            return [];
        }

        $messages = $this->messages;

        if ($sortByType) {
            $messages = $this->sortMessagesBySeverity($messages);
        }

        return $this->convertMessageClassIdsToText($messages);
    }


    /**
     * @param $messages
     * @return mixed
     */
    protected function sortMessagesBySeverity(array $messages): array
    {
        usort($messages, function ($a, $b) {
            $key = 'msg_class';

            if ($a[$key] === $b[$key]) {
                return 0;
            }

            return ($a[$key] > $b[$key]) ? -1 : 1;
        });

        return $messages;
    }

    /**
     * @param array $messages messages in original format with numeric msg_class
     * @return array of messages with string based msg_class for use in css etc
     */
    protected function convertMessageClassIdsToText(array $messages): array
    {
        $key = 'msg_class';

        array_walk($messages, function (&$item) use ($key) {
            switch ($item[$key]) {
                case self::MESSAGE_TYPE_INFO:
                    $item[$key] = self::MESSAGE_TYPE_INFO_CLASS;
                    break;
                case self::MESSAGE_TYPE_WARN:
                    $item[$key] = self::MESSAGE_TYPE_WARN_CLASS;
                    break;
                default:
                    throw new LogicException('Unknown numeric message severity.');
            }
        });

        return $messages;
    }
}
