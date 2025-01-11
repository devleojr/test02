<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ClientController
 *
 * @author matrix
 */
// app/Controllers/ClientController.php
require_once __DIR__ . '/../Models/Client.php';

class ClientController {

    //put your code here

    public function index() {
        $clientModel = new Client();
        $clients = $clientModel->getAll();
        require_once __DIR__ . '/../Views/client/index.php';
    }

    public function store() {
        if (isset($_POST['name'], $_POST['email'])) {
            $clientModel = new Client();
            $clientModel->name = $_POST['name'];
            $clientModel->email = $_POST['email'];
            $clientModel->phone = $_POST['phone'] ?? '';
            $clientModel->create();

            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $clientModel = new Client();
            $clientData = $clientModel->getById($_GET['id']);
            echo json_encode($clientData);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }

    public function update() {
        if (isset($_POST['id'], $_POST['name'], $_POST['email'])) {
            $clientModel = new Client();
            $clientModel->name = $_POST['name'];
            $clientModel->email = $_POST['email'];
            $clientModel->phone = $_POST['phone'] ?? '';
            $clientModel->update($_POST['id']);

            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }

    public function delete() {
        if (isset($_POST['id'])) {
            $clientModel = new Client();
            $clientModel->delete($_POST['id']);
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    }
}
