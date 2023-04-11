<?php
$pet1 = array(
    'name' => 'Chew Barka',
    'breed' => 'Bichon',
    'age'  => '2 years',
    'weight' => 8,
    'bio'   => 'The park, The pool or the Playground - I love to go anywhere! I am really great at... SQUIRREL!',
    'filename' => 'pet1.png'
);

$pet2 = array(
    'name' => 'Spark Pug',
    'breed' => 'Pug',
    'age'  => '1.5 years',
    'weight' => 11,
    'bio'   => 'You want to go to the dog park in style? Then I am your pug!',
    'filename' => 'pet2.png'
);

$pet3 = array(
    'name' => 'Pico de Gato',
    'breed' => 'Bengal',
    'age'  => '5 years',
    'weight' => 9,
    'bio'   => 'Oh hai, if you do not have a can of salmon I am not interested.',
    'filename' => 'pet3.png'
);

$pancake = array(
    'name' => 'Pancake the Bulldog',
    'age'  => '1 year',
    'weight' => 9,
    'bio' => 'Lorem Ipsum',
    'filename' => 'pancake.png'
);

$pets = array($pet1, $pet2, $pet3, $pancake);

$pupCount = count($pets);
$pupCountRecursive = count($pets,1);

echo  " defualut pets count: $pupCount".PHP_EOL;
echo  " recursive pets count: ${pupCountRecursive}";

echo $pets[0]['name'];

foreach ($pets as $cutePet) {
    echo '<div class="col-lg-4">';
    echo '<h2>';
    echo $cutePet['name'].PHP_EOL;
    echo '</h2>'.PHP_EOL;
}

$walker1 = 'Kitty';
$walker2 = 'Tiger';
$walker3 = 'Jay';

$dogWalkers = [$walker1, $walker2, $walker3];

foreach ($dogWalkers as $walker){
    echo $walker.PHP_EOL;
}
$waggyPig = [
    'name' => 'Waggy Pig',
    'weight' => 10,
    'age' => 7,
    'bio' => 'Sleepy white fluffy dog',
];

$pets = [
    ['name' => 'Pico de Gato', 'bio' => 'Spicy kitty'],
];

$pets[] = ['name' => 'Waggy Pig', 'bio' => 'Little white dog'];
$pets[] = ['name' => 'Pancake', 'bio' => 'Breakfast is my favorite!'];

foreach ($pets as $pet) {
    echo $pet['name'].PHP_EOL;
}

$contents = file_get_contents('toys.json');
$toys = json_decode($contents, true);

foreach ($toys as $toy) {
    if('' === $toy['color'] ){
        echo "no color"." ";
    }elseif('multiple' === $toy['color'] ) {
        echo "Multiple Colors"." ";;
    }else{
        echo $toy['color']." ";;
    }
    echo $toy['name'].PHP_EOL;
 }

foreach ($toys as $toy) {
        echo $toy['name']." ";
        if (array_key_exists('color', $toy) && 'surprise' === $toy['color'] ) {
            echo 'Surprise Color!'.PHP_EOL;
        } elseif (!array_key_exists('color', $toy)) {
            echo 'no color'."\n";
        } else {
            echo $toy['color'].PHP_EOL;
        }
}


