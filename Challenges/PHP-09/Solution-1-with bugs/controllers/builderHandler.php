<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use WebsiteBuilder\Classes\Database\Database;
use WebsiteBuilder\Classes\Database\DatabaseHelper;
use WebsiteBuilder\Classes\Session\SessionManager;
use WebsiteBuilder\Classes\Redirector\Redirector;
use WebsiteBuilder\Classes\Query\Query;
use WebsiteBuilder\Classes\Validator\Validator;

SessionManager::start();

// if (isset($_GET['websiteId'])) {
//     $websiteId = $_GET['websiteId'];

//     try {
//         $query = DatabaseHelper::getQuery();

//         $websiteId = $query->find('website', $websiteId);

//         if ($websiteId) {
//             SessionManager::set('websiteId', $websiteId->id);
//         } else {
//             Redirector::redirect('../public/builder.php');
//         }
//     } catch (Exception $e) {

//         error_log($e->getMessage());
//         Redirector::redirect('../public/builder.php');
//     }
// }

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
    Redirector::redirect('../public/builder.php');
}

$errors = [];
$data = $_POST;
$errors = Validator::validateFormInput($data);

if (!empty($errors)) {
    SessionManager::set('errors', $errors);
    SessionManager::set('oldInput', $_POST);
    Redirector::redirect('../public/builder.php');
}

$website = [
    'coverImg' => htmlspecialchars(($data['coverImg'])),
    'mainTitle' => htmlspecialchars(($data['mainTitle'])),
    'subtitle' => htmlspecialchars(($data['subtitle'])),
    'about' => htmlspecialchars(($data['about'])),
    'phone' => htmlspecialchars(($data['phone'])),
    'location' => htmlspecialchars(($data['location'])),
    'providing' => htmlspecialchars(($data['providing'])),
];

$description = [
    'img1' => htmlspecialchars(($data['img1'])),
    'description1' => htmlspecialchars(($data['description1'])),
    'img2' => htmlspecialchars(($data['img2'])),
    'description2' => htmlspecialchars(($data['description2'])),
    'img3' => htmlspecialchars(($data['img3'])),
    'description3' => htmlspecialchars(($data['description3'])),
];

$contact = [
    'description' => htmlspecialchars(($data['description'])),
    'linkedin' => htmlspecialchars(($data['linkedin'])),
    'facebook' => htmlspecialchars(($data['facebook'])),
    'twitter' => htmlspecialchars(($data['twitter'])),
    'google' => htmlspecialchars(($data['google'])),
];

try {
    $db = DatabaseHelper::getConnection();
    $query = new Query($db);

    $db->beginTransaction();

    $query->insert('website', $website);

    $websiteId = $db->lastInsertId();
    SessionManager::set('websiteId', $websiteId);
    $query->insert('description', $description);
    $query->insert('contact', $contact);

    $db->commit();

    Redirector::redirect('../public/company.php?websiteId=' . $websiteId);
} catch (Exception $e) {
    $db->rollBack();

    error_log($e->getMessage());
    SessionManager::set('errors', ['database' => 'An error occurred while saving your data. Please try again later.']);
    Redirector::redirect('../public/builder.php');
}
