<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$arParams['B24_APPLICATION_SCOPE'] =;
$arParams['BX24_APLICATION_ID'] = 'local.60ed80d9614835.27511525';
$arParams['B24_APPLICATION_SECRET'] = 'U6rRlmPauD7aslSHRASw8mASGKWKLdDtm9JeRyNVNbdb6mXBm3';

// create a log channel
$log = new Logger('bitrix24');
$log->pushHandler(new StreamHandler('path/to/your.log', Logger::DEBUG));


// init lib
$obB24App = new \Bitrix24\Bitrix24(false, $log);
$obB24App->setApplicationScope($arParams['B24_APPLICATION_SCOPE']);
$obB24App->setApplicationId($arParams['B24_APPLICATION_ID']);
$obB24App->setApplicationSecret($arParams['B24_APPLICATION_SECRET']);

// set user-specific settings
$obB24App->setDomain($arParams['DOMAIN']);
$obB24App->setMemberId($arParams['MEMBER_ID']);
$obB24App->setAccessToken($arParams['AUTH_ID']);
$obB24App->setRefreshToken($arParams['REFRESH_ID']);

// get information about current user from bitrix24
$obB24User = new \Bitrix24\User\User($obB24App);
$arCurrentB24User = $obB24User->current();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Список сотрудников</title>
</head>
<body>
<!--    <table class="table">-->
<!--        <tr>-->
<!--            <th scope="col">ID</th>-->
<!--            <th scope="col">Имя</th>-->
<!--            <th scope="col">Фамилия</th>-->
<!--            <th scope="col">Email</th>-->
<!--            <th scope="col">Дата рождения</th>-->
<!--        </tr>-->
<!--        --><?// foreach ($result['result'] as $value){?>
<!--        <tr>-->
<!--            <td>--><?//echo $value['ID']?><!--</td>-->
<!--            <td>--><?//echo $value['NAME']?><!--</td>-->
<!--            <td>--><?//echo $value['LAST_NAME']?><!--</td>-->
<!--            <td>--><?//echo $value['EMAIL']?><!--</td>-->
<!--            <td>-->
<!--                --><?//
//                    if (strlen($value['PERSONAL_BIRTHDAY']) != 0)
//                    {
//                    echo date('d-m-Y', strtotime($value['PERSONAL_BIRTHDAY']));
//                    }
//                ?>
<!--            </td>-->
<!--        </tr>-->
<!--        --><?// }?>
<!--    </table>-->
<?
echo '<pre>';
var_dump($arCurrentB24User);
echo '</pre>';
?>
</body>
</html>
