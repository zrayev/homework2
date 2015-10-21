<form action="" method="post">
    <input type="text" name="a" title=""/> <br>
    <select name="task" title="">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select> <br>
    <label>
        <input type="text" name="b"/>
    </label> <br>
    <input type="submit" name="submit" value="="/> <br>
</form>


<?php
require 'vendor/autoload.php';

use Carbon\Carbon;
use AnthonyMartin\GeoLocation\GeoLocation as GeoLocation;
use \Punic\Territory;

if (isset($_POST['submit'])) {
    if (empty($_POST['a'])) {
        $result = 'Число А не заповнене';
    } elseif (empty($_POST['b'])) {
        $result = 'Число В не заповнене';
    } elseif (!preg_match("|^[-0-9\.A-F]{1,12}$|i", $_POST['a'])) {
        $result = 'Введіть в поле А цифру';
    } elseif (!preg_match("|^[-0-9\.A-F]{1,12}$|i", $_POST['b'])) {
        $result = 'Введіть в поле В цифру';
    } else {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $task = $_POST['task'];

        if ($task == '+') {
            $result = $a + $b;
        } elseif ($task == '*') {
            $result = $a * $b;
        } elseif ($task == '/') {
            $result = $a / $b;
        } else {
            $result = $a - $b;
        }
    }
}
echo 'Результат: ' . $result;
echo "<br>";
echo "<br>";

echo "Точна дата:";
printf("Now: %s", Carbon::now());
echo "<br>";

echo "Розташування:";
//punic/punic
echo Territory::getName('UA', 'ua');
echo "<br>";
//GeoLocation
$location = 'Cherkasy City';
$response = GeoLocation::getGeocodeFromGoogle($location);
$latitude = $response->results[0]->geometry->location->lat;
$longitude = $response->results[0]->geometry->location->lng;
echo $latitude . ', ' . $longitude;