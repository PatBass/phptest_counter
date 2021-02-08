<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 11/29/13
 * Time: 3:15 AM
 */

class ConnectionManager_PDO
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db=$db;
    }

    public function valid_connection(Connection $connection)
    {
        $req = $this->db->prepare("SELECT id FROM registration WHERE user=:user AND pwd=:pwd");
        $req->bindValue(':user', $connection->user());
        $req->bindValue(':pwd', $connection->pwd());
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Connection');


        if($object = $req->fetch())
        {
           $req->closeCursor();
            return $object->id();

        }

        return false;
    }

    public function read_user_infos($id)
    {
        $req = $this->db->prepare("SELECT id, user, pwd FROM registration WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Connection');


        if($objet = $req->fetch())
        {
            $req->closeCursor();
            return $objet;

        }

        return false;
    }
} 