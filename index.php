<?php

$method = 'user.get';
$queryUrl = 'https://'.$_REQUEST['DOMAIN'].'/rest/'.$method.'.json';
$params = [];
$queryData = http_build_query(array_merge($params, array("auth" => $_REQUEST['AUTH_ID'])));

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $queryUrl,
    CURLOPT_POSTFIELDS => $queryData,
));


$result = json_decode(curl_exec($curl), true);
curl_close($curl);

//echo '<pre>';
//var_dump($result);
//echo '</pre>';

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
    <table class="table">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Email</th>
            <th scope="col">Дата рождения</th>
        </tr>
        <? foreach ($result['result'] as $value){?>
        <tr>
            <td><?echo $value['ID']?></td>
            <td><?echo $value['NAME']?></td>
            <td><?echo $value['LAST_NAME']?></td>
            <td><?echo $value['EMAIL']?></td>
            <td>
                <?
                    if (strlen($value['PERSONAL_BIRTHDAY']) != 0)
                    {
                    echo date('d-m-Y', strtotime($value['PERSONAL_BIRTHDAY']));
                    }
                ?>
            </td>
        </tr>
        <? }?>
    </table>
</body>
</html>
