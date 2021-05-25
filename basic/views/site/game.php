<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Game 21';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-game21">

    <?php if ($model->dice == null ) : ?>
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'dice')->label("Enter how many dices you want to play with") ?>
            <?= $form->field($model, 'PP')->hiddenInput(['value'=> 0])->label(false); ?>
            <?= $form->field($model, 'CP')->hiddenInput(['value'=> 0])->label(false); ?>

            <div class="form-group">
                <?= Html::submitButton('Start game', ['class' => 'btn btn-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>

    <?php else :?>
        <div class="game">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php if ($gameOverMessage == "" && $model->stop == null) : ?>
            <p class="dice-utf8">
            <?php if (strlen($message) == 4 ) : ?>
                <i class="dice-<?= $message[0] ?>"></i>
                <i class="dice-<?= $message[2] ?>"></i>
            <?php else :?>
                <i class="dice-<?= $message[0] ?>"></i>
            <?php endif; ?>
            </p>
            
            <h4>Total sum of dices: <b><?= $totalDices ?></b></h4><br>

            <?php $form = ActiveForm::begin(); ?>
                <div class="bet-game">
                    <?php if ( $model->bet == null ) : ?>
                        <h4 style="color: #FDE2B0;"><i>Do you want to make it more intresting?</i></h4><br>
                        <p style="color: #FDE2B0;">Place your bet:</p>
                        <?= $form->field($model, 'bet')->radioList(array('15'=>'15 $','20'=>'20 $','30'=>'30 $','50'=>'50 $','0'=>'Not Interested' ), array('separator'=>'<br>'))->label(false); ?>
                    
                    <?php elseif ( $model->bet == 0 ): ?>
                        <p style="color: #FDE2B0;"><i>You have choosed not to bet.</i></p>
                        <?= $form->field($model, 'bet')->hiddenInput(['value'=> $model->bet])->label(false); ?>
                    <?php else : ?>
                        <h4 style="color: #FDE2B0;"><i>You placed <?= $model->bet ?> $. <br><br>Good Luck!</i></h4>
                        <?= $form->field($model, 'bet')->hiddenInput(['value'=> $model->bet])->label(false); ?>

                    <?php endif ?>
                </div>
                <?= $form->field($model, 'dice')->hiddenInput(['value'=> $model->dice])->label(false); ?>
                <?= $form->field($model, 'summa')->hiddenInput(['value'=> $totalDices])->label(false); ?>
                <?= $form->field($model, 'PP')->hiddenInput(['value'=> $model->PP])->label(false); ?>
                <?= $form->field($model, 'CP')->hiddenInput(['value'=> $model->CP])->label(false); ?>
                <div class="form-group">
                    <?= Html::submitButton('Roll', ['class' => 'btn btn-primary']) ?>               
                </div>
            <?php ActiveForm::end(); ?>

            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'bet')->hiddenInput(['value'=> $model->bet])->label(false); ?>
                <?= $form->field($model, 'dice')->hiddenInput(['value'=> $model->dice])->label(false); ?>
                <?= $form->field($model, 'summa')->hiddenInput(['value'=> $totalDices])->label(false); ?>
                <?= $form->field($model, 'stop')->hiddenInput(['value'=> "stop"])->label(false); ?>
                <?= $form->field($model, 'PP')->hiddenInput(['value'=> $model->PP])->label(false); ?>
                <?= $form->field($model, 'CP')->hiddenInput(['value'=> $model->CP])->label(false); ?>
                <div class="form-group">
                    <?= Html::submitButton('Stop rolling', ['class' => 'btn btn-primary']) ?>               
                </div>
            <?php ActiveForm::end(); ?>
    
        <?php elseif ($model->stop == "stop" || $gameOverMessage !== "") :?>
            <?php if ($model->bet != 0 && $pointsMessage == "You Won") : ?>
                <h3 class="message"><?= $pointsMessage ?> <?= $model->bet * 2 ?> $! </h3>
            <?php elseif ($model->bet != 0 && $pointsMessage == "Computer Won") : ?>
                <h3 class="message"><?= $pointsMessage; ?>!</h3>
                <p>You lost <?= $model->bet ?> $ </p>
            <?php else : ?>
                <h3 class="message"><?= $pointsMessage ?>!</h3>
            <?php endif ?>
            <br>

            <h4>You got total: <b><?= $totalDices ?></b></h4>
            <h4>The computer got: <b><?= $computer ?></b></h4>
            

        <?php endif; ?>
        <h4 class="scoreboard">
        Players point: <b><?=$playerPoint?></b>  |  Computer point: <b><?=$computerPoint?></b>
        </h4>
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'dice')->hiddenInput(['value'=> $model->dice])->label(false); ?>
            <?= $form->field($model, 'PP')->hiddenInput(['value'=> $playerPoint])->label(false); ?>
            <?= $form->field($model, 'CP')->hiddenInput(['value'=> $computerPoint])->label(false); ?>   
            <div class="form-group">
                <?= Html::submitButton('Start new round', ['class' => 'btn btn-primary']) ?>  
                        
            </div>
        <?php ActiveForm::end(); ?>
        <?php $form = ActiveForm::begin(); ?>
            <div class="form-group">
                <?= Html::submitButton('Reset score', ['class' => 'btn btn-primary']) ?>               
            </div>
        <?php ActiveForm::end(); ?>
        </div>
    <?php endif; ?>


    
</div>
