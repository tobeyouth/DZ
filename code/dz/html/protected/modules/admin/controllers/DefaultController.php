<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		//echo "sss";
		$this->render('index');
	}
}