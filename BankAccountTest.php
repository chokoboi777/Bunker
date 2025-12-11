<?php

namespace Baikov\Work9;
use PHPUnit\Framework\TestCase;
use Baikov\Work9\BankAccount;
use Baikov\Work9\InvalidAmountException;
use Baikov\Work9\InsufficientFundsException;
class BankAccountTest extends TestCase {
    public function testInitialBalance() {
        $account = new BankAccount(100.0);
        $this->assertEquals(100.0, $account->getBalance());
    }

    public function testDeposit() {
        $account = new BankAccount(100.0);
        $account->deposit(50.0);
        $this->assertEquals(150.0, $account->getBalance());
    }

    public function testWithdraw() {
        $account = new BankAccount(100.0);
        $account->withdraw(30.0);
        $this->assertEquals(70.0, $account->getBalance());
    }

    public function testWithdrawInsufficientFunds() {
        $this->expectException(InsufficientFundsException::class);
        $account = new BankAccount(100.0);
        $account->withdraw(150.0);
    }

    public function testDepositInvalidAmount() {
        $this->expectException(InvalidAmountException::class);
        $account = new BankAccount(100.0);
        $account->deposit(-50.0);
    }

    public function testWithdrawInvalidAmount() {
        $this->expectException(InvalidAmountException::class);
        $account = new BankAccount(100.0);
        $account->withdraw(-30.0);
    }

    public function testInitialBalanceCannotBeNegative() {
        $this->expectException(InvalidAmountException::class);
        new BankAccount(-10.0);
    }
}
