<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use PHPUnit\Framework\TestCase;
use RevKeen\Api\CustomersApi;
use RevKeen\Model\CreateTerminalPaymentRequest;
use RevKeen\Model\Pagination;
use RevKeen\ObjectSerializer;
use RevKeen\Runtime\MoneyMinor;

final class MoneyMinorGeneratorBoundaryTest extends TestCase
{
    /** @dataProvider rawMoneyValues */
    public function testModelConstructorRejectsRawMoneyValues(mixed $value): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new CreateTerminalPaymentRequest(['amount_minor' => $value]);
    }

    /** @dataProvider rawMoneyValues */
    public function testModelSetterRejectsRawMoneyValues(mixed $value): void
    {
        $model = new CreateTerminalPaymentRequest();

        $this->expectException(\InvalidArgumentException::class);
        $model->setAmountMinor($value);
    }

    /** @dataProvider rawMoneyValues */
    public function testArrayAccessRejectsRawMoneyValues(mixed $value): void
    {
        $model = new CreateTerminalPaymentRequest();

        $this->expectException(\InvalidArgumentException::class);
        $model['amount_minor'] = $value;
    }

    /** @dataProvider rawMoneyValues */
    public function testSerializerRejectsRawMoneyValues(mixed $value): void
    {
        $this->expectException(\InvalidArgumentException::class);
        ObjectSerializer::sanitizeForSerialization($value, MoneyMinor::class, 'int64');
    }

    public function testMoneySerializesAsAnIntegerAndDeserializesAsMoneyMinor(): void
    {
        $model = new CreateTerminalPaymentRequest([
            'amount_minor' => new MoneyMinor(2500),
        ]);

        self::assertSame('MoneyMinor', CreateTerminalPaymentRequest::openAPITypes()['amount_minor']);
        $wireName = CreateTerminalPaymentRequest::attributeMap()['amount_minor'];
        self::assertSame(2500, ObjectSerializer::sanitizeForSerialization($model)->{$wireName});

        $deserialized = ObjectSerializer::deserialize(
            (object) [$wireName => 2500],
            CreateTerminalPaymentRequest::class
        );
        self::assertInstanceOf(MoneyMinor::class, $deserialized->getAmountMinor());
        self::assertSame(2500, $deserialized->getAmountMinor()->value());
    }

    public function testMoneyValidationUsesTheWrappedInteger(): void
    {
        $model = new CreateTerminalPaymentRequest();

        $this->expectException(\InvalidArgumentException::class);
        $model->setAmountMinor(new MoneyMinor(0));
    }

    public function testOrdinaryIntegersRemainIntegers(): void
    {
        self::assertSame('int', Pagination::openAPITypes()['total']);
    }

    public function testMoneyQueryParametersSerializeAsIntegerValues(): void
    {
        $request = (new CustomersApi())->customersPreferredRailsGetRequest(
            '00000000-0000-4000-8000-000000000001',
            null,
            new MoneyMinor(0),
            new MoneyMinor(2500)
        );
        parse_str($request->getUri()->getQuery(), $query);

        self::assertSame('0', $query['amount']);
        self::assertSame('2500', $query['amount_minor']);
    }

    /** @dataProvider rawMoneyValues */
    public function testMoneyQueryParametersRejectRawValues(mixed $value): void
    {
        $this->expectException(\InvalidArgumentException::class);
        (new CustomersApi())->customersPreferredRailsGetRequest(
            '00000000-0000-4000-8000-000000000001',
            null,
            $value
        );
    }

    /** @return iterable<string, array{mixed}> */
    public function rawMoneyValues(): iterable
    {
        yield 'integer bypass' => [2500];
        yield 'fractional float bypass' => [25.5];
        yield 'whole-looking float bypass' => [2500.0];
    }
}
