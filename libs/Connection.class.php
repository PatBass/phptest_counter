<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 11/28/13
 * Time: 3:50 PM
 */

class Connection
{
    protected   $id,
                $user,
                $pwd,
                $errors=array();

    const INVALID_USER = 1;
    const INVALID_PWD = 2;

    public function __construct($values=array())
    {
        if(!empty($values))
            $this->hydrate($values);
    }

    public function hydrate($data)
    {
        foreach($data as $attribute => $value)
        {
            $method = 'set'.ucfirst($attribute);

            if(is_callable(array($this, $method)))
            {
                $this->$method($value);
            }
        }
    }

    public function isValid()
    {
        return !(empty($this->user) || empty($this->pwd));
    }

    //SETTERS

    public function setId($id)
    {
        $this->id= (int)$id;
    }

    public function setUser($user)
    {
        if(!empty($user) && is_string($user))
            $this->user = $user;
        else
            $this->errors[]=self::INVALID_USER;
    }

    public function setPwd($pwd)
    {
        if(!empty($pwd))
            $this->pwd = $pwd;
        else
            $this->errors[]=self::INVALID_PWD;
    }

    //GETTERS

    public function id()
    {
        return $this->id;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function user()
    {
        return $this->user;
    }

    public function pwd()
    {
        return $this->pwd;
    }


} 