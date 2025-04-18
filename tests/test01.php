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

$data = [
    "one",
    "two",
    "three",
    "four"
];
$classifier_name = "enumeration";

info("test1: create a classifier");
info("init data:", $data);

$enumeration = new \Mc\Classifier($classifier_name, $data);

info("classifier name: ", $enumeration->name());

test($classifier_name === $enumeration->name());

info("total items in classifier: ", $enumeration->count());
test($enumeration->count() === count($data));

info("item 1 in classifier: ", $enumeration->get(1));
test($enumeration->get(1) === $data[1]);
