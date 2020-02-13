<?php

class ErrorsManager implements SplObserver
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function update(SplSubject $obj)
    {
        $q = $this->db->prepare('INSERT INTO erreur(id, erreur) VALUES(:id, :erreur)');
        $q->bindValue(':id', 0);
        $q->bindValue(':erreur', $obj->getFormatedError());
        $q->execute();

        var_dump($obj->getFormatedError());
    }
};

