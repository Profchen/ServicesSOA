<?php
/**
 * Created by PhpStorm.
 * User: gomel_000
 * Date: 15/04/2016
 * Time: 11:11
 */

require_once 'IWebService.php';
require_once 'database/db_connect.php';

const ADD_BET = "addBet";
const BET = "bet";
class BetWS implements IWebService
{

    public function DoGet(){

        switch ($_GET['action'])
        {
            case ADD_BET:
                return $this->addBet();
            case BET:
                return $this->getBet();
            default:
                return true;
        }
    }

    private function addBet(){

        if (!isset($_GET['be_score1']) || !isset($_GET['be_score2']) || !isset($_GET['ma_id']) || !isset($_GET['us_id']))
            Helper::ThrowAccessDenied();

        $sql = "INSERT INTO bets(be_score1, be_score2, ma_id, us_id) VALUES('" .$_GET['be_score1']. "', '".$_GET['be_score2']. "', '" .$_GET['ma_id']. "' '" .$_GET['us_id']. "')";

        MySQL::Execute($sql);

        return true;

    }

    private function getBet(){

        $sql = "SELECT be_score1, be_score2, ma.ma_id, us_id, ma_id_tm1, ma_id_tm2,
            ma.ma_date, te1.tm_id AS idTeam1, te1.tm_name AS nameTeam1,  te2.tm_id AS idTeam2, te2.tm_name AS nameTeam2
            FROM bets be
            INNER JOIN matchs ma ON ma.ma_id = be.ma_id
            INNER JOIN teams te1 ON te1.tm_id = ma_id_tm1
            INNER JOIN teams te2 ON te2.tm_id = ma_id_tm2
            WHERE us_id = 3";

        MySQL::Execute($sql);

        return MySQL::GetResult()->fetchAll();
    }



    public function DoPost()
    {

    }

    public function DoPut()
    {

    }

    public function DoDelete()
    {

    }

}