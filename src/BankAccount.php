<?php

namespace Baikov\Work9;

use Exception;

class InvalidAmountException extends Exception {}
class InsufficientFundsException extends Exception {}

class BankAccount {
    private float $balance;

    public function __construct(float $initialBalance) {
        if ($initialBalance < 0) {
            throw new InvalidAmountException("Начальный баланс не может быть отрицательным.");
        }
        $this->balance = $initialBalance;
    }

    public function getBalance(): float {
        return $this->balance;
    }

    public function deposit(float $amount): void {
        if ($amount <= 0) {
            throw new InvalidAmountException("Сумма для депозита должна быть положительной.");
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount): void {
        if ($amount <= 0) {
            throw new InvalidAmountException("Сумма для снятия должна быть положительной.");
        }
        if ($amount > $this->balance) {
            throw new InsufficientFundsException("Недостаточно средств на счете.");
        }
        $this->balance -= $amount;
    }
}
