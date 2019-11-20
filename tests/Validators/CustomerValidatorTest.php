<?php

namespace WilliamCurrie\Tests\Validators;

use LogicException;
use PHPUnit\Framework\TestCase;
use WilliamCurrie\Recruitment\Helpers\UserFeedback;
use WilliamCurrie\Recruitment\Validators\CustomerValidator;

final class CustomerValidatorTest extends TestCase
{
    /**
     * @var CustomerValidator
     */
    protected $validator;
    /**
     * @var UserFeedback
     */
    protected $mockUserFeedback;

    public function setUp()
    {
        $this->mockUserFeedback = $this->createMock(UserFeedback::class);
        $this->validator = new CustomerValidator();
    }

    public function testThrowsExceptionWhenUserFeedbackNotSet()
    {
        $this->expectException(LogicException::class);

        $this->validator->getUserFeedback();
    }

    public function testReturnsUserFeedbackObjectWhenSet()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $this->assertEquals($this->mockUserFeedback, $this->validator->getUserFeedback());
    }

    public function testAllowsIntegerCustomerId()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $this->assertEquals(true, $this->validator->validateCustomerId(1));
    }

    public function testAllowsStringIntegerCustomerId()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $this->assertEquals(true, $this->validator->validateCustomerId('1'));
    }

    public function testDoesNotAllowNonIntegerStringCustomerId()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $userFeedbackValues = ['Value given for customerId must be an integer.', 2];

        $this->mockUserFeedback
             ->expects($this->once())
             ->method('add')
             ->with(...$userFeedbackValues);

        $this->assertEquals(false, $this->validator->validateCustomerId('c1'));
    }

    public function testChecksCustomerIdBoundaries()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $userFeedbackValues = ['Value given for customerId outside of allowable range.', 2];

        $this->mockUserFeedback
            ->expects($this->exactly(2))
            ->method('add')
            ->with(...$userFeedbackValues);

        $this->assertEquals(false, $this->validator->validateCustomerId(-1));
        $this->assertEquals(false, $this->validator->validateCustomerId(0));
    }

    public function testDoesNotAllowBlankFirstName()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $userFeedbackValues = ['Customer first name must include one or more characters.', 2];

        $this->mockUserFeedback
            ->expects($this->exactly(2))
            ->method('add')
            ->with(...$userFeedbackValues);

        $this->assertEquals(false, $this->validator->validateName(' ', 'Smith'));
        $this->assertEquals(false, $this->validator->validateName('', 'Smith'));
    }

    public function testDoesNotAllowBlankSecondName()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $userFeedbackValues = ['Customer second name must include one or more characters.', 2];

        $this->mockUserFeedback
            ->expects($this->exactly(2))
            ->method('add')
            ->with(...$userFeedbackValues);

        $this->assertEquals(false, $this->validator->validateName('Jane', ' '));
        $this->assertEquals(false, $this->validator->validateName('Jane', ''));
    }

    public function testDoesNotAllowFirstNameExceedingThirtyChars()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $userFeedbackValues = ['Customer first name must be no more than 30 characters long.', 2];

        $this->mockUserFeedback
            ->expects($this->once())
            ->method('add')
            ->with(...$userFeedbackValues);

        $this->assertEquals(false, $this->validator->validateName('abcdefghijklmnopqrstuvwxyzABCDE', 'Smith'));
    }

    public function testDoesNotAllowSecondNameExceedingThirtyChars()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $userFeedbackValues = ['Customer second name must be no more than 30 characters long.', 2];

        $this->mockUserFeedback
            ->expects($this->once())
            ->method('add')
            ->with(...$userFeedbackValues);


        $this->assertEquals(false, $this->validator->validateName('Jane', 'abcdefghijklmnopqrstuvwxyzABCDE'));
    }

    public function testDoesNotAllowUnexpectedCharsInFirstName()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $userFeedbackValues = ['Customer name includes unsupported characters.', 2];

        $this->mockUserFeedback
            ->expects($this->once())
            ->method('add')
            ->with(...$userFeedbackValues);

        $this->assertEquals(false, $this->validator->validateName('Jane?A', 'Smith'));
    }

    public function testDoesNotAllowUnexpectedCharsInSecondName()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $userFeedbackValues = ['Customer name includes unsupported characters.', 2];

        $this->mockUserFeedback
            ->expects($this->once())
            ->method('add')
            ->with(...$userFeedbackValues);

        $this->assertEquals(false, $this->validator->validateName('Jane', 'Smith:s'));
    }

    public function testAllowsLessCommonNames()
    {
        $this->validator->setUserFeedback($this->mockUserFeedback);

        $this->mockUserFeedback
            ->expects($this->never())
            ->method('add');

        $this->assertEquals(true, $this->validator->validateName('Amelié', 'O\'Reilly'));
        $this->assertEquals(true, $this->validator->validateName('Fred', 'Patric-Smith'));
        $this->assertEquals(true, $this->validator->validateName('Frederik', 'von Scholten'));
    }
}
