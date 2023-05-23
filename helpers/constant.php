<?php
if (!isset($env)) {
    //read .env file
    $env = parse_ini_file('.env');
}
$URL = $env["URL"];

$VEHICLE_TYPE = [
    "CONTRACT CARRIAGE/PASSENGER VEHICLES",
    "PRIVATE SERVICE VEHICLE",
    "GOODS VEHICLE",
    "STAGE CARRIAGE",
    "CONSTRUCTION EQUIPMENT VEHICLE",
    "TEMPORARY REGISTERED VEHICLE"
];

$VEHICLE_CLASS = [
    "MAXI CAB",
    "BUS",
    "MOTOR CAB",
    "OMNI BUS",
    "SLEEPER BUS",
    "LIGHT GOODS VEHICLE",
    "MEDIUM GOODS VEHICLE",
    "HEAVY GOODS VEHICLE"
];

$VEHICLE_SERVICE = [
    "DELUX AIR CONDITIONER",
    "ORDINARY",
    "NOT APPLICABLE",
    "AIR CONDITIONED"
];

$PAYMENT_MODE = [
    "DAYS",
    "MONTHLY",
    "QUARTERLY",
    "YEARLY"
];

$WEIGHT = [
    "Laden Weight",
    "Seating Capacity"
];
