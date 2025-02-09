<?php


include_once 'C:/laragon/www/cabinetmedical/app/models/rendezvous.php';
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

class RendezVousController {
    private $user;

    public function __construct($db) {
        $this->user = new Patient($db);
    }
}