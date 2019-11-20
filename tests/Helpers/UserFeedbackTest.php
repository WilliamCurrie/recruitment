<?php

namespace WilliamCurrie\Tests\Helpers\UserFeedbackTest;

use LogicException;
use PHPUnit\Framework\TestCase;
use WilliamCurrie\Recruitment\Helpers\UserFeedback;

class UserFeedbackTest extends TestCase
{
    /**
     * @var UserFeedback
     */
    protected $userFeedback;
    /**
     * @var array
     */
    protected $messageClassStrings;

    public function setUp()
    {
        $this->userFeedback = new UserFeedback();
        $this->messageClassStrings = [
            1 => 'info',
            2 => 'warn'
        ];
    }

    public function testMessagesAreAdded()
    {
        $message = 'My message.';
        $messageClass = 'info';

        $actualAddReturn = $this->userFeedback->add('My message.', $this->userFeedback::MESSAGE_TYPE_INFO);

        $expectedMessages = [
            ['msg' => $message, 'msg_class' => $messageClass]
        ];

        $actualGetMessagesReturn = $this->userFeedback->getMessages();

        $this->assertEquals($expectedMessages, $actualGetMessagesReturn);
        $this->assertTrue($actualAddReturn);
    }

    public function testUnknownMessageClassesAreRejectedWithException()
    {
        $this->expectException(LogicException::class);
        $actualAddReturn = $this->userFeedback->add('My message.', 100001);
    }

    public function testEmptyArrayIsReturnedIfThereAreNoMessages()
    {
        $this->assertEquals([], $this->userFeedback->getMessages());
    }

    public function testAllMessagesAreReturnedInOrderAddedByDefault()
    {
        $inputMessages = [
            ['Message 1', $this->userFeedback::MESSAGE_TYPE_INFO],
            ['Message 2', $this->userFeedback::MESSAGE_TYPE_WARN],
            ['Message 3', $this->userFeedback::MESSAGE_TYPE_INFO],
        ];

        foreach ($inputMessages as $msg) {
            $this->userFeedback->add($msg[0], $msg[1]);
        }

        $infoStr = $this->messageClassStrings[$this->userFeedback::MESSAGE_TYPE_INFO];
        $warnStr = $this->messageClassStrings[$this->userFeedback::MESSAGE_TYPE_WARN];

        $expectedMessages = [
            ['msg' => $inputMessages[0][0], 'msg_class' => $infoStr],
            ['msg' => $inputMessages[1][0], 'msg_class' => $warnStr],
            ['msg' => $inputMessages[2][0], 'msg_class' => $infoStr],
        ];

        $actualGetMessagesReturn = $this->userFeedback->getMessages();

        $this->assertEquals($expectedMessages, $actualGetMessagesReturn);
    }

    public function testMessagesAreReturnedInSeverityDescendingOrder()
    {
        $inputMessages = [
            ['Message 1', $this->userFeedback::MESSAGE_TYPE_INFO],
            ['Message 2', $this->userFeedback::MESSAGE_TYPE_WARN],
            ['Message 3', $this->userFeedback::MESSAGE_TYPE_INFO],
        ];

        foreach ($inputMessages as $msg) {
            $this->userFeedback->add($msg[0], $msg[1]);
        }

        $infoStr = $this->messageClassStrings[$this->userFeedback::MESSAGE_TYPE_INFO];
        $warnStr = $this->messageClassStrings[$this->userFeedback::MESSAGE_TYPE_WARN];

        $expectedMessages = [
            ['msg' => $inputMessages[1][0], 'msg_class' => $warnStr],
            ['msg' => $inputMessages[0][0], 'msg_class' => $infoStr],
            ['msg' => $inputMessages[2][0], 'msg_class' => $infoStr],
        ];

        $actualGetMessagesReturn = $this->userFeedback->getMessages(true);

        $this->assertEquals($expectedMessages, $actualGetMessagesReturn);
    }
}
