FOR number of dices
    roll dice
ENDFOR

FOR dice in game
    Sum dices
ENDFOR

IF dices < 21 THEN
    roll again or stop game
ELSE
    stop game and sum score
ENDIF 

IF stop game
    Computer roll and get score
ENDIF

IF player score closest to 21
    Player Won and gets one point
ELSEIF computer score closest to 21
    Computer Won and gets one point
ENDIF


