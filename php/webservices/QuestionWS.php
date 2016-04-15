<?php

	require_once('IWebService.php');
	require_once('database/db_connect.php');

	const ACTION_ADD ='add';
        const ACTION_UPDATE ='update';
        const PARAM_ACTION = 'action';
	const PARAM_SURVEY_ID = 'idSurvey';
	const PARAM_QUESTIONS = 'questions';
	const SQL_INSERT_QUESTIONS = "INSERT INTO questionanswer(title, `order`, titleResponse1, titleResponse2, titleResponse3, titleResponse4, counter1, counter2, counter3, counter4, idSurvey) VALUES ('%s', %d, '%s', '%s', '%s', '%s', 0, 0, 0, 0, %d)";
	const SQL_UPDATE_QUESTION_STAT = '';


	class QuestionWS implements IWebService
	{
		public function DoGet()
		{
			return $this->DoPost();
		}

		public function DoPost()
		{
			//Helper::CheckLogin();

			if (!isset($_GET[PARAM_ACTION]))
				Helper::ThrowAccessDenied();

			switch ($_GET[PARAM_ACTION])
			{
				case ACTION_ADD:
					return $this->add();

				default:
					Helper::ThrowAccessDenied();
					break;
			}
		}

		private function add()
                {
	    	if(!isset($_GET[PARAM_SURVEY_ID]) ||
	    	   !isset($_POST[PARAM_QUESTIONS]))
	        	Helper::ThrowAccessDenied();

	        // $questions = array(
	        // 	(object)array('title' => 'test', 'order' => 3, 'titleResponse1' => 'Reponce 1',  'titleResponse2' => 'Reponce 2',  'titleResponse3' => 'Reponce 3',  'titleResponse4' => 'Reponce 4'),
	        // 	(object)array('title' => 'test2', 'order' => 4, 'titleResponse1' => 'Reponce 1',  'titleResponse2' => 'Reponce 2',  'titleResponse3' => 'Reponce 3',  'titleResponse4' => 'Reponce 4'),);
	        $questions = json_decode($_POST[PARAM_QUESTIONS]);

	        for ($i = 0; $i < count($questions); $i++) 
	        {
	        	$question = $questions[$i];

	        	if (!MySQL::Execute(
	        		sprintf(SQL_INSERT_QUESTIONS,
	        		$question->title, $question->order, $question->titleResponse1, $question->titleResponse2,
	        		$question->titleResponse3, $question->titleResponse4, $_GET[PARAM_SURVEY_ID])))
	        	{
	        		return false; 
	        	}

	        	MySQL::GetResult();
	        }

	      	return true;
		}

		public function DoPut()
		{
			Helper::ThrowAccessDenied();
		}

		public function DoDelete()
		{
			Helper::ThrowAccessDenied();
		}
	}
