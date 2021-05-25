<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Highscore;

class HighscoreController extends Controller
{
    public function actionIndex()
    {
        $query = Highscore::find();
        $highscores = Yii::$app->db->createCommand('SELECT * FROM highscore ORDER BY closest LIMIT 15')
        ->queryAll();

        return $this->render('index', [
            'highscores' => $highscores
        ]);
    }
}