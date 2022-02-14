<?php
function tabuleiro (): void {
    echo "<h1 class='background_grade'>";
    echo "<br><hr class='linha_horizontal_1'></br>";
    echo $_SESSION['j'][0][0] . "<span class='transparente'>.....</span>" .
        $_SESSION['j'][0][1] . "<span class='transparente'>.....</span>" .
        $_SESSION['j'][0][2]."</br></br>";
    echo "<br><hr class='linha_horizontal_2'></br>";
    echo $_SESSION['j'][1][0] . "<span class='transparente'>.....</span>" .
        $_SESSION['j'][1][1] . "<span class='transparente'>.....</span>" .
        $_SESSION['j'][1][2]."</br></br>";
    echo "<br><hr class='linha_horizontal_3'></br>";
    echo $_SESSION['j'][2][0] . "<span class='transparente'>.....</span>" .
        $_SESSION['j'][2][1] . "<span class='transparente'>.....</span>" .
        $_SESSION['j'][2][2]."</br></br>";
    echo "</h1>";
}//função para exibir o tabuleiro com as posições.

function fim_jogo (): void {
    if (($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>')
        || ($_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>')
        || ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>')
        || ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == '<span class="x">X</span>')
        || ($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>')
        || ($_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>')
        || ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>')
        || ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>')) {
        $_SESSION['x/o'] = 3;
        $_SESSION['ia'] = 3;
        echo "<h2 class='center'>Parabéns jogador de '<span class='x'>X</span>'</br>" . "Você ganhou!!!</h2>";

    } elseif (($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][0][1] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == '<span class="o">O</span>')
        || ($_SESSION['j'][1][0] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == '<span class="o">O</span>')
        || ($_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>')
        || ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][1][0] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == '<span class="o">O</span>')
        || ($_SESSION['j'][0][1] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == '<span class="o">O</span>')
        || ($_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>')
        || ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>')
        || ($_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == '<span class="o">O</span>')) {
        $_SESSION['x/o'] = 3;
        $_SESSION['ia'] = 3;
        echo "<h2 class='center'>Parabéns jogador de '<span class='o'>O</span>'</br>" . "Você ganhou!!!</h2>";

    }elseif ($_SESSION['deu_velha'] == 9) {
        $_SESSION['x/o'] = 3;
        $_SESSION['ia'] = 3;
        echo "<h2 class='center'>Deu Velha</br>" . "<span class='dificuldade'>Ninguém ganhou!!!</span></h2>";
    }
}//faz a validação de fim de partida.

function jogada_invalida (): void {
    echo '<script type="text/javascript">alert("Jogada inválida, o lugar que você escolheu está ocupada!!!");</script>';
    $_SESSION['ia'] = 3;
}//javascript de jogada inválida.

function formulario (): void {
    if ($_SESSION['x/o'] == 1){
        echo "<form class='center' method='post' action='main.php'>
                    <label>
                        Informe o local para '<b><span class='x'>X</span></b>':</br>
                        <input type='number' name='X' placeholder='num.' max='9' min='1' required>
                        <input type='submit' value='Jogar'>
                    </label>
                  </form>
                ";//formulário que captura as jogadas de 'X'.
    }elseif ($_SESSION['x/o'] == 2) {
        echo "<form class='center' method='post' action='main.php' >
                    <label>
                        Informe o local para '<b><span class='o'>O</span></b>':</br>
                        <input type='number' name='O' placeholder='num.' max='9' min='1' required>
                        <input type='submit' value='Jogar' >
                    </label>
                  </form >
                ";//formulário que captura as jogadas de 'O'.
    }//formulários que captura as jogadas de 'X' e 'O'.
}

function jogada_ia (): void {
    if (($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>')
        || ($_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>')
        || ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>')
        || ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == '<span class="x">X</span>')
        || ($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>')
        || ($_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>')
        || ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>')
        || ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>')) {
        $_SESSION['ia'] = 3;
    }

    if ($_SESSION['dif'] == 1) {
        while ($_SESSION['ia'] == 1) {
            $r = rand(1, 9);
            if ($r == 1 && $_SESSION['j'][2][2] == 9) {
                $_SESSION['j'][2][2] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($r == 2 && $_SESSION['j'][0][2] == 3) {
                $_SESSION['j'][0][2] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($r == 3 && $_SESSION['j'][0][0] == 1) {
                $_SESSION['j'][0][0] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($r == 4 && $_SESSION['j'][2][0] == 7) {
                $_SESSION['j'][2][0] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($r == 5 && $_SESSION['j'][1][0] == 4) {
                $_SESSION['j'][1][0] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($r == 6 && $_SESSION['j'][2][1] == 8) {
                $_SESSION['j'][2][1] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($r == 7 && $_SESSION['j'][1][2] == 6) {
                $_SESSION['j'][1][2] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($r == 8 && $_SESSION['j'][0][1] == 2) {
                $_SESSION['j'][0][1] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($r == 9 && $_SESSION['j'][1][1] == 5) {
                $_SESSION['j'][1][1] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][0][0] != 1 &&
                $_SESSION['j'][0][1] != 2 &&
                $_SESSION['j'][0][2] != 3 &&
                $_SESSION['j'][1][0] != 4 &&
                $_SESSION['j'][1][1] != 5 &&
                $_SESSION['j'][1][2] != 6 &&
                $_SESSION['j'][2][0] != 7 &&
                $_SESSION['j'][2][1] != 8 &&
                $_SESSION['j'][2][2] != 9) {
                $_SESSION['ia'] = 3;
            }
        }
    }//final da dificuldade 1 (Burra).

    if ($_SESSION['dif'] == 2 && $_SESSION['ia'] == 1) {
        bloqueia_x();
        if ($_SESSION['ia'] == 1) {
            $r = rand(1, 2);
            if ($r == 1 && $_SESSION['j'][2][2] == 9) {
                $_SESSION['j'][2][2] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($r == 2 && $_SESSION['j'][2][0] == 7) {
                $_SESSION['j'][2][0] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][0][2] == 3) {
                $_SESSION['j'][0][2] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][0][0] == 1) {
                $_SESSION['j'][0][0] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][1][0] == 4) {
                $_SESSION['j'][1][0] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][2][1] == 8) {
                $_SESSION['j'][2][1] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][1][2] == 6) {
                $_SESSION['j'][1][2] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][0][1] == 2) {
                $_SESSION['j'][0][1] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][1][1] == 5) {
                $_SESSION['j'][1][1] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            }
        }
    }//final da dificuldade 2 (Leve).

    if ($_SESSION['dif'] == 3 && $_SESSION['ia'] == 1) {
        ataque_o();
        bloqueia_x();
        if ($_SESSION['ia'] == 1) {
            if ($_SESSION['j'][2][2] == 9) {
                $_SESSION['j'][2][2] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][0][2] == 3) {
                $_SESSION['j'][0][2] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][0][0] == 1) {
                $_SESSION['j'][0][0] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][2][0] == 7) {
                $_SESSION['j'][2][0] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][1][0] == 4) {
                $_SESSION['j'][1][0] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][2][1] == 8) {
                $_SESSION['j'][2][1] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][1][2] == 6) {
                $_SESSION['j'][1][2] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][0][1] == 2) {
                $_SESSION['j'][0][1] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            } elseif ($_SESSION['j'][1][1] == 5) {
                $_SESSION['j'][1][1] = '<span class="o">O</span>';
                $_SESSION['deu_velha']++;
                $_SESSION['x/o'] = 1;
                $_SESSION['ia'] = 3;
            }
        }
    }//final da dificuldade 3 (Pesada).
}//jogadas de 'O'.

function bloqueia_x (): void {
    if ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5 || $_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5 ||
        $_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5 || $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    }elseif ($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    }elseif ($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    }elseif ($_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    }elseif ($_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    }elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][0][1] == 2) {
        $_SESSION['j'][0][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == 6) {
        $_SESSION['j'][1][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][1][0] == 4) {
        $_SESSION['j'][1][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][2][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == 8) {
        $_SESSION['j'][2][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][1][0] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][1][0] == 4) {
        $_SESSION['j'][1][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == 8) {
        $_SESSION['j'][2][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][0][1] == 2) {
        $_SESSION['j'][0][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
        $_SESSION['bx'] = 2;
    } elseif ($_SESSION['j'][0][1] == '<span class="x">X</span>' && $_SESSION['j'][2][1] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][2][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][1][2] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][1][2] == 6) {
        $_SESSION['j'][1][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][9][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][0][0] == '<span class="x">X</span>' && $_SESSION['j'][2][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][1][1] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif ($_SESSION['j'][2][0] == '<span class="x">X</span>' && $_SESSION['j'][0][2] == '<span class="x">X</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    }
} //bloqueio de jogadas X.

function ataque_o (): void {
    if ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][0][1] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][0][1] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][0][1] == 2) {
        $_SESSION['j'][0][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][1][0] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == 6) {
        $_SESSION['j'][1][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == '<span class="o">O</span>' && $_SESSION['j'][1][0] == 4) {
        $_SESSION['j'][1][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][1][0] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][2][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][2][1] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == 8) {
        $_SESSION['j'][2][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][1][0] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][1][0] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][1][0] == 4) {
        $_SESSION['j'][1][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][0][1] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == 8) {
        $_SESSION['j'][2][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == '<span class="o">O</span>' && $_SESSION['j'][0][1] == 2) {
        $_SESSION['j'][0][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][0][1] == '<span class="o">O</span>' && $_SESSION['j'][2][1] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][2][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][1][2] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][1][2] == 6) {
        $_SESSION['j'][1][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == 9) {
        $_SESSION['j'][9][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][0][0] == 1) {
        $_SESSION['j'][0][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][0][0] == '<span class="o">O</span>' && $_SESSION['j'][2][2] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == 3) {
        $_SESSION['j'][0][2] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][1][1] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][2][0] == 7) {
        $_SESSION['j'][2][0] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    } elseif
    ($_SESSION['j'][2][0] == '<span class="o">O</span>' && $_SESSION['j'][0][2] == '<span class="o">O</span>' && $_SESSION['j'][1][1] == 5) {
        $_SESSION['j'][1][1] = '<span class="o">O</span>';
        $_SESSION['deu_velha']++;
        $_SESSION['x/o'] = 1;
        $_SESSION['ia'] = 3;
    }
}//cria ataques contra X.