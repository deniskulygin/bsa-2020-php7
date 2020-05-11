<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Task1\Track;
use App\Task3\CarTrackHtmlPresenter;
use \App\Task1\Car;

$track = new Track(4, 40);

$car1 = new Car(
    1,
    'https://pbs.twimg.com/profile_images/595409436585361408/aFJGRaO6_400x400.jpg',
    'BMW',
    250,
    10,
    5,
    15
);
$car2 = new Car(
    2,
    'https://i.pinimg.com/originals/e4/15/83/e41583f55444b931f4ba2f0f8bce1970.jpg',
    'Tesla',
    200,
    5,
    5.3,
    18
);
$car3 = new Car(
    3,
    'https://fordsalomao.com.br/wp-content/uploads/2019/02/1499441577430-1-1024x542-256x256.jpg',
    'Ford',
    220,
    5,
    6.1,
    18.5
);

$track->add($car1);
$track->add($car2);
$track->add($car3);

$presenter = new CarTrackHtmlPresenter();
$presentation = $presenter->present($track);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Built-in Web Server</title>
    <link rel="stylesheet" href="https://volodymyrkushnir.com/assets/stylesheets/base.css">
</head>
<body>
<?php echo $presentation; ?>
</body>
</html>
