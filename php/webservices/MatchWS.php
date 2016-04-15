<?php
/**
 * Created by PhpStorm.
 * User: gomel_000
 * Date: 15/04/2016
 * Time: 10:50
 */

    require_once 'IWebService.php';
    require_once 'database/db_connect.php';

    const GET_MATCH = "match";
    const ADD_MATCH = "addMatch";
    const UPDATE_SCORE = "addScore";

    class MatchWS implements IWebService
    {

        public function DoGet()
        {


            switch ($_GET['action'])
            {
                case ADD_MATCH:
                        return $this->addMatch();
                case UPDATE_SCORE:
                        return $this->addScore();
                case GET_MATCH:
                        return $this->getMatch();
                default:
                    return true;
            }
        }

        private function getMatch()
        {

            $sql = "SELECT te1.tm_id as idTeam1, te1.tm_name as nameTeam1, te2.tm_id as idTeam2, te2.tm_name as nameTeam2,
                    ma_id, ma_date, ma_score1, ma_score2
                    FROM MATCHS
                    INNER JOIN TEAMS te1 ON te1.tm_id = ma_id_tm1
                    INNER JOIN TEAMS te2 ON te2.tm_id = ma_id_tm2";

            MySQL::Execute($sql);

            return MySQL::GetResult()->fetchAll();
        }

        private function addMatch(){

            if (!isset($_GET['tm_id1']) || !isset($_GET['tm_id2']) || !isset($_GET['ma_date']))
                Helper::ThrowAccessDenied();

            $sql = "INSERT INTO MATCHS(ma_date, ma_id_tm1, ma_id_tm2) VALUES ('" .$_GET['ma_date']. "', '" .$_GET['tm_id1']. "', '" .$_GET['tm_id2']. "')";

            MySQL::Execute($sql);

            return true;

        }

        private function addSore(){

            if (!isset($_GET['ma_id']) || !isset($_GET['ma_score1']) || !isset($_GET['ma_score2']))
                Helper::ThrowAccessDenied();

            $sql = "UPDATE MATCHS SET ma_score1 = '" .$_GET['ma_score1']. "' , ma_score2 = '".$_GET['ma_score2']. "'  WHERE ma_id = " .$_GET['ma_id'];

            MySQL::Execute( $sql );

            return true;

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