<?php

namespace Baikov\Work9;
require 'vendor/autoload.php';
use Baikov\Work9\BankAccount;
use Baikov\Work9\InvalidAmountException;
use Baikov\Work9\InsufficientFundsException;
function main() {
    try {
        $account = new BankAccount(100.0);
        echo "Текущий баланс: " . $account->getBalance() . PHP_EOL;

        $account->deposit(50.0);
        echo "Баланс после депозита: " . $account->getBalance() . PHP_EOL;

        $account->withdraw(30.0);
        echo "Баланс после снятия: " . $account->getBalance() . PHP_EOL;

        $account->withdraw(150.0);
    } catch (InvalidAmountException $e) {
        echo "Ошибка: " . $e->getMessage() . PHP_EOL;
    } catch (InsufficientFundsException $e) {
        echo "Ошибка: " . $e->getMessage() . PHP_EOL;
    }
}

main();
