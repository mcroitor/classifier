<?php

include __DIR__ . "/../src/mc/classifier.php";

function test(bool $expression, string $passed = "PASS", string $failed = "FAIL"): void {
    echo $expression ? $passed : $failed;
    echo PHP_EOL;
}

function info(string $message, $object = null): void {
    echo "[info] $message";
    if($object != null){
        echo " - " . json_encode($object);
    }
    echo PHP_EOL;
}

$classifier_file = __DIR__ . "/countries.json";
$classifier_name = "countries";
$classifier_size = 249;
$key = "MDA";
$value = "Moldova (the Republic of)";

info("test2: load classifier from file");

$countries = \Mc\Classifier::load($classifier_file);

info("classifier name: ", $countries->name());

test($classifier_name === $countries->name());

info("total items in classifier: ", $countries->count());
test($countries->count() === $classifier_size);

info("item {$key} in classifier: ", $countries->get($key));
test($countries->get($key) === $value);
