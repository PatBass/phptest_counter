<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 11/21/13
 * Time: 8:51 PM
 */

class UploadManager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function add(Upload $upload)
    {
        $requete = $this->db->prepare('INSERT INTO upload SET extension=:extension, agent=:agent, ip=:ip, datetime=:datetime, hits=:hits');
        $requete->bindValue(':extension', $upload->getExtension());
        $requete->bindValue(':hits', $upload->getHits());
        $requete->bindValue(':ip', $upload->getIp());
        $requete->bindValue(':agent', $upload->getAgent());
        $requete->bindValue(':agent', $upload->getDatetime());
        $requete->execute();

       if($requete->execute())
       {
           return $this->db->lastInsertId();
       }
       return errorInfo();

    }

    public function getUnique($ip)
    {
        $req = $this->db->prepare("SELECT id, extension, agent, hits, datetime, ip FROM upload WHERE ip=:ip");
        $req->bindValue(':ip',$ip);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Upload');

        return $req->fetch();
    }

    public function count($ip)
    {
        return $this->db->query("SELECT COUNT(ip) FROM product WHERE ip='$ip'")->fetchColumn();
    }

    public function getList($start=-1, $limit=-1)
    {
        $sql = "SELECT id, extension, ip, agent, datetime, hits FROM upload ORDER BY id DESC";

        if($start!=-1 || $limit!=-1)
        {
            $sql.=" LIMIT ".(int) $limit." OFFSET ".(int) $start;
        }

        $req = $this->db->query($sql) or die(print_r($this->db->errorInfo()));

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Upload');

        $list = $req->fetchAll();

        $req->closeCursor();

        return $list;

    }
} 