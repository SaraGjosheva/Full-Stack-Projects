<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$firstForm=[
    'cover'=> $_POST['cover-img'],
    'main'=>  $_POST['main-title'],
    'sub'=> $_POST['sub-title'],
    'about'=> $_POST['about'],
   'phone'=> $_POST['phone'],
   'location'=> $_POST['location'],
   'providing'=> $_POST['providing']
];

$secondForm=[
    'descimg'=>  $_POST['desc-img'],
    'desctext'=> $_POST['desc-text'],
    'descimg2'=>  $_POST['desc-img2'],
    'desctext2'=>$_POST['desc-text2'],
    'descimg3'=>   $_POST['desc-img3'],
    'desctext3'=> $_POST['desc-text3'],
];

$thirdForm=[
   'desccontact' =>  $_POST['desc-contact'],
   'linkedin'=> $_POST['linkedin'],
   'facebook'=> $_POST['facebook'],
   'twitter'=> $_POST['twitter'],
   'google'=> $_POST['google']
];






$conection= new PDO("mysql:host=localhost;dbname=landingpage", 'root', '');

$statment=$conection->prepare('INSERT INTO `firstform`(`coverImg`, `mainTitle`, `subTitle`, `about`, `phone`, `location`, `providing`) VALUES (:cover,:main,:sub,:about,:phone,:location,:providing)');
$statment->execute($firstForm);

$statment2=$conection->prepare('INSERT INTO `secondform`(`descImg`, `descText`, `descImg2`, `descText2`, `descImg3`, `descText3`) VALUES (:descimg,:desctext,:descimg2,:desctext2,:descimg3,:desctext3)');
$statment2->execute($secondForm);

$statment3=$conection->prepare('INSERT INTO `thirdform`(`descContact`, `linkedin`, `facebook`, `twitter`, `google`) VALUES (:desccontact,:linkedin,:facebook,:twitter,:google)');

$statment3->execute($thirdForm);
$statement=$conection->prepare('SELECT * FROM `firstform` ORDER BY `firstform`.`id` DESC LIMIT 1;');
$statement->execute();
$firstForm=$statement->fetchAll(PDO::FETCH_ASSOC);

header('Location: company.php?page='.$firstForm[0]['id'].'');




}else{
    header('Locantion:form.php');
}