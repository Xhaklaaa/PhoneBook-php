<?php
$dataFile = 'contacts.json';

function getContacts() {
    global $dataFile;
    if (!file_exists($dataFile)) {
        return [];
    }
    $json = file_get_contents($dataFile);
    return json_decode($json, true) ?? [];
}

function saveContacts($contacts) {
    global $dataFile;
    $json = json_encode($contacts, JSON_PRETTY_PRINT);
    file_put_contents($dataFile, $json);
}

function validatePhone($phone) {
    // Валидация на номер
    return preg_match('/^\+[0-9]{11}$/', $phone);
}

function addContact($name, $phone) {
    if (!validatePhone($phone)) {
        return 'Номер телефона должен начинаться с + и содержать 11 цифр';
    }
    $contacts = getContacts();
    $contacts[] = ['name' => $name, 'phone' => $phone];
    saveContacts($contacts);
    return true;
}

function deleteContact($index) {
    $contacts = getContacts();
    if (isset($contacts[$index])) {
        array_splice($contacts, $index, 1);
        saveContacts($contacts);
    }
}