<?php

$drinkOptions = [
    'Latte' => 200,
    'Cappuccino' => 253,
    'Tea' => 142,
    'Hot Chocolate' => 184,
    'Espresso' => 232,
    'Macchiato' => 470,
];

$wallet = [
    1 => 13,
    2 => 9,
    5 => 10,
    10 => 2,
    20 => 6,
    50 => 1,
    100 => 1,
    200 => 2,
];
echo PHP_EOL;
foreach ($drinkOptions as $drink => $price) {
    echo "$drink: $price cents" . PHP_EOL;
}

foreach ($wallet as $coin => $quantity) {
    echo "$coin ($quantity) | " . PHP_EOL;
}
echo PHP_EOL;

$insertedAmount = 0;


$price = 0;
while (true) {

    $inserted = readline('Insert your coin and then enter "buy": ');
    echo PHP_EOL;

    if ($inserted === 'buy') {

        $purchase = readline(
            'Choose your option from the list by drink name: ' . PHP_EOL .
            'Latte: 200 cents' . PHP_EOL .
            'Cappuccino: 253 cents' . PHP_EOL .
            'Tea: 142 cents' . PHP_EOL .
            'Hot Chocolate: 184 cents' . PHP_EOL .
            'Espresso: 232 cents' . PHP_EOL .
            'Macchiato: 470 cents' . PHP_EOL
        );
        echo PHP_EOL;

        $price = $drinkOptions[$purchase];

        $reminder = $insertedAmount - $price;

        if (isset($drinkOptions[$purchase]) === true) {
            if ($price <= $insertedAmount) {
                echo 'Thank you for your purchase! ';
                echo PHP_EOL;
                echo 'Reminder: ' . $reminder;
                echo PHP_EOL;
                exit;
            }
            $reversedWallet = [200, 100, 50, 20, 10, 5, 2, 1];

            foreach ($reversedWallet as $coin => $quantity) {
                $returnedAmount = intdiv($reminder, $coin);
                $reversedWallet -= $returnedAmount;
                $reminder += $returnedAmount * $coin;
                echo "$coin ($quantity) | " . PHP_EOL;
            }
            if (isset($drinkOptions[$purchase]) !== true) {
                echo 'Incorrect name of the drink';
                echo PHP_EOL;
                exit;
            }
            if ($insertedAmount < $drinkOptions[$price]) {
                echo 'Not enough coins';
                exit;
            }
        }
        $insertedCoin = (int)$inserted;

        if (!isset($wallet[$insertedCoin])) {
            echo 'Invalid coin';
            exit;
        }

        if ($wallet[$insertedCoin] <= 0) {
            echo 'You dont have such coin';
            exit;

        }
        $wallet[$insertedCoin] -= 1;
        $insertedAmount += $insertedCoin;
    }
        echo 'INSERTED AMOUNT: ' . $insertedAmount;
        echo PHP_EOL;

        foreach ($wallet as $coin => $quantity) {
            echo "$coin ($quantity) | ";

        }

}