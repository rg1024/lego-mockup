<?php

$data = array();
$data[] = array(
    "5892 Sonic Bomber",
    "http://lego.brickinstructions.com/lego_instructions/set/5892/Sonic_Boom",
    "5892.jpg",
);

$data[] = array(
    "7631 Dumper",
    "http://lego.brickinstructions.com/lego_instructions/set/7631/Dump_Truck",
    "7631.jpg",
    "city",
);

$data[] = array(
    "60017 Dumper",
    "http://lego.brickinstructions.com/lego_instructions/set/60017/Flatbed_Truck",
    "60017.png",
    "city",
);

$data[] = array(
    "31008 Creator",
    "http://lego.brickinstructions.com/lego_instructions/set/60017/Flatbed_Truck",
    "31008.jpg",
    "creator"
);

$data[] = array(
    "7723 Avión Policia",
    "http://lego.brickinstructions.com/lego_instructions/set/7723/Police_Pontoon_Plane",
    "7723.jpg"
);

$data[] = array(
    "6747 Creator",
    "http://lego.brickinstructions.com/lego_instructions/set/6747/Motorbike",
    "6747.jpg",
    "creator"
);

$data[] = array(
    "4709 Castillo Hogwarts",
    "http://lego.brickinstructions.com/lego_instructions/set/4709/Hogwarts_Castle",
    "4709.jpg"
);

$data[] = array(
    "6745 Creator",
    "http://lego.brickinstructions.com/lego_instructions/set/6745/Propeller_Power",
    "6745.jpg",
    "creator"
);

$data[] = array(
    "5928 Bi plano Baron",
    "http://lego.brickinstructions.com/lego_instructions/set/5928/_Bi-Wing_Baron_",
    "5928.jpg"
);

$data[] = array(
    "5652 Ferrari 1:17",
    "http://lego.brickinstructions.com/lego_instructions/set/8652/Enzo_Ferrari_1:17",
    "5652.jpg"
);

$data[] = array(
    "6645 Street sweeper",
    "http://lego.brickinstructions.com/lego_instructions/set/6645/Street_Sweeper",
    "6645.jpg",
    "city"
);

$data[] = array(
    "6743 Street Speeder",
    "http://lego.brickinstructions.com/lego_instructions/set/6743/Street_Speeder",
    "6743.jpg"
);

$data[] = array(
    "4995 Creator",
    "http://lego.brickinstructions.com/lego_instructions/set/4995/Freight_Helicopters",
    "4995.jpg"
);

$data[] = array(
    "7944 Fire Hovercraft",
    "http://lego.brickinstructions.com/lego_instructions/set/7944/Fire_Hovercraft",
    "7944.jpg",
    "bomberos"
);

$data[] = array(
    "60002 Fire Truck",
    "http://lego.brickinstructions.com/lego_instructions/set/60002/Fire_Truck",
    "60002.png",
    "bomberos",
);

$data[] = array(
    "7998 Big Truck",
    "http://lego.brickinstructions.com/lego_instructions/set/7998/Big_Truck",
    "7998.jpg",
    "city"
);

$data[] = array(
    "8164 Extrem Wheelie",
    "http://lego.brickinstructions.com/en/lego_instructions/set/8164/Extreme_Wheelie",
    "8164.jpg"
);

$data[] = array(
    "6765 MAIN STREET (inst.)",
    "http://lego.brickinstructions.com/en/lego_instructions/set/6765/MAIN_STREET",
    "6765.jpg",
    "western"
);

$data[] = array(
    "6769 Legoredo",
    "http://lego.brickinstructions.com/lego_instructions/set/6769/FORT_LEGOREDO",
    "6769.jpg",
    "western"
);

$data[] = array(
    "6435 Coast Guard",
    "http://lego.brickinstructions.com/lego_instructions/set/6435/Coast_Guard",
    "6435.jpg"
);


// Construct the objects.

$kits = new \lego\kits\Kits();
foreach ($data as $kit) {
    $new = lego\kit\Kit::createFromArray($kit);
    $kits->add($new);
}
return $kits;
