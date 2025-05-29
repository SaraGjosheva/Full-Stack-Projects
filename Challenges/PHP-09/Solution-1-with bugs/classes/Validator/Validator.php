<?php

namespace WebsiteBuilder\Classes\Validator;

class Validator
{

    public static function validateFormInput(array $data): array
    {
        $errors = [];

        if (empty($data['coverImg']) || !isset($data['coverImg'])) {
            $errors['coverImg'] = 'Cover Image URL is required.';
        } elseif (!filter_var($data['coverImg'], FILTER_VALIDATE_URL)) {
            $errors['coverImg'] = 'Enter a valid URL for the Cover Image.';
        }

        if (empty($data['mainTitle']) || !isset($data['mainTitle'])) {
            $errors['mainTitle'] = 'Main Title is required.';
        } elseif (strlen($data['mainTitle']) < 5) {
            $errors['mainTitle'] = 'Main Title must be at least 5 characters long.';
        } elseif (strlen($data['mainTitle']) > 64) {
            $errors['mainTitle'] = 'Main Title cannot exceed 64 characters.';
        }

        if (empty($data['subtitle']) || !isset($data['subtitle'])) {
            $errors['subtitle'] = 'Subtitle is required.';
        } elseif (strlen($data['subtitle']) < 5) {
            $errors['subtitle'] = 'Subtitle must be at least 5 characters long.';
        } elseif (strlen($data['subtitle']) > 64) {
            $errors['subtitle'] = 'Subtitle cannot exceed 64 characters.';
        }

        if (empty($data['about']) || !isset($data['about'])) {
            $errors['about'] = 'About field is required.';
        } elseif (strlen($data['about']) < 10) {
            $errors['about'] = 'About section must be at least 10 characters long.';
        } elseif (strlen($data['about']) > 500) {
            $errors['about'] = 'About section cannot exceed 500 characters.';
        }

        if (empty($data['phone']) || !isset($data['phone'])) {
            $errors['phone'] = 'Phone number is required.';
        } elseif (!preg_match('/^\+?\d{10,15}$/', $data['phone'])) {
            $errors['phone'] = 'Enter a valid phone number.';
        } elseif (strlen($data['phone']) > 15) {
            $errors['phone'] = 'Phone number cannot exceed 15 characters.';
        }

        if (empty($data['location']) || !isset($data['location'])) {
            $errors['location'] = 'Location is required.';
        } elseif (strlen($data['location']) > 128) {
            $errors['location'] = 'Location cannot exceed 128 characters.';
        }

        if (!isset($data['providing']) || !in_array($data['providing'], ['0', '1'])) {
            $errors['providing'] = 'You must specify whether you provide Services or Products.';
        }

        for ($i = 1; $i <= 3; $i++) {
            if (empty($data["img$i"]) || !isset($data["img$i"])) {
                $errors["img$i"] = "Image URL $i is required.";
            } elseif (!filter_var($data["img$i"], FILTER_VALIDATE_URL)) {
                $errors["img$i"] = "Enter a valid URL for Image $i.";
            }

            if (empty($data["description$i"]) || !isset($data["description$i"])) {
                $errors["description$i"] = "Description $i is required.";
            } elseif (strlen($data["description$i"]) < 10) {
                $errors["description$i"] = "Description $i must be at least 10 characters long.";
            } elseif (strlen($data["description$i"]) > 500) {
                $errors["description$i"] = "Description $i cannot exceed 500 characters.";
            }
        }

        if (empty($data['description']) || !isset($data['description'])) {
            $errors['description'] = 'Company description is required.';
        } elseif (strlen($data['description']) < 20) {
            $errors['description'] = 'Company description must be at least 20 characters long.';
        } elseif (strlen($data['description']) > 1000) {
            $errors['description'] = 'Company description cannot exceed 1000 characters.';
        }

        $socialMediaFields = ['linkedin', 'facebook', 'twitter', 'google'];
        foreach ($socialMediaFields as $field) {
            if (empty($data[$field]) || !isset($data[$field])) {
                $errors[$field] = ucfirst($field) . ' URL is required.';
            } elseif (!filter_var($data[$field], FILTER_VALIDATE_URL)) {
                $errors[$field] = 'Enter a valid URL for ' . ucfirst($field) . '.';
            }
        }

        return $errors;
    }
}
