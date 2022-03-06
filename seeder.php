<?php
/*
 * Call with PHP CLI
 * php seeder.php entries_number
 *
 * */

require_once 'vendor/autoload.php';
require_once 'config.php';


//  Examples of the Faker methods
//
//    "host" => $faker->domainName,
//    "ip" => $faker->ipv4,
//    "hash" => $faker->md5,
//    "user_agent" => $faker->userAgent,
//    "first_name" => $faker->firstName,
//    "last_name" => $faker->lastName,
//    "zip" => (string) $faker->postcode,
//    "city" => $faker->city,
//    "state" => $faker->stateAbbr,
//    "address" => $faker->streetAddress,
//    "email" => $faker->email,
//    "work_place" => $faker->company,
//    "car_state"=> $faker->stateAbbr,
//    "created_at" => date('Y-m-d'),


$dbHandler = \DEM\DB::getInstance();

$provider = new DEM\DataProvider(
    pdo: $dbHandler->connect(),
    tableName: DEM_DB_TABLE
);

$count = $argv[1] ?? 1;

echo "Start seeding...\n";

do {

    $faker = Faker\Factory::create();

    $testData = array(
        "first_name" => $faker->firstName,
        "last_name" => $faker->lastName,
    );

    $provider->saveData($testData);

    echo "Saved person $count \n";

    $count--;

} while ($count > 0);

echo "Seeding complete";