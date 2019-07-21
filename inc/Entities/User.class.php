<?php
class User
{
// +------------+------------------+------+-----+---------+----------------+
// | Field      | Type             | Null | Key | Default | Extra          |
// +------------+------------------+------+-----+---------+----------------+
// | UserID     | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
// | Password   | text             | NO   |     | NULL    |                |
// | Email      | char(100)        | NO   |     | NULL    |                |
// | First_Name | char(30)         | NO   |     | NULL    |                |
// | Last_Name  | char(30)         | NO   |     | NULL    |                |
// | Birthday   | date             | YES  |     | NULL    |                |
// +------------+------------------+------+-----+---------+----------------+

    //Attributes
    private $UserID;
    private $Password;
    private $Email;
    private $First_Name;
    private $Last_Name;
    private $Birthday;

    //Getters
    function getUserID()
    {
        return $this->UserID;
    }
    function getPassword()
    {
        return $this->Password;
    }
    function getEmail()
    {
        return $this->Email;
    }
    function getFirst_Name()
    {
        return $this->First_Name;
    }
    function getLast_Name()
    {
        return $this->Last_Name;
    }
    function getBirthday()
    {
        return $this->Birthday;
    }
    //Setters
    function setUserID($uid)
    {
        $this->UserID = $uid;
    }
    function setPassword($pw)
    {
        $this->Password = $pw;
    }
    function setEmail($email)
    {
        $this->Email = $email;
    }
    function setFirst_Name($fn)
    {
        $this->First_Name = $fn;
    }
    function setLast_Name($ln)
    {
        $this->Last_Name = $ln;
    }
    function setBirthday($bday)
    {
        $this->Birthday = $bday;
    }
}
?>