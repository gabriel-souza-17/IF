<?php

require_once __DIR__ . '/../Config/Database.php';

class Agenda {

    /*
    =====================================
    BARBEIRO
    =====================================
    */

    public static function salvarAgendaSemanal(
        $barbeiro_id,
        $dia_semana,
        $inicio,
        $fim,
        $intervalo = 30
    ){

        global $pdo;

        $sql = $pdo->prepare("
            INSERT INTO barbeiro_agenda(
                barbeiro_id,
                dia_semana,
                hora_inicio,
                hora_fim,
                intervalo_min,
                ativo
            )
            VALUES(
                ?,?,?,?,?,1
            )
        ");

        return $sql->execute([
            $barbeiro_id,
            $dia_semana,
            $inicio,
            $fim,
            $intervalo
        ]);

    }

    public static function abrirHorarioExtra(
        $barbeiro_id,
        $data,
        $inicio,
        $fim
    ){

        global $pdo;

        $sql = $pdo->prepare("
            INSERT INTO barbeiro_excecoes(
                barbeiro_id,
                data_excecao,
                hora_inicio,
                hora_fim,
                tipo
            )
            VALUES(
                ?,?,?,?,
                'abrir'
            )
        ");

        return $sql->execute([
            $barbeiro_id,
            $data,
            $inicio,
            $fim
        ]);

    }

    public static function fecharDia(
        $barbeiro_id,
        $data,
        $motivo = null
    ){

        global $pdo;

        $sql = $pdo->prepare("
            INSERT INTO barbeiro_excecoes(
                barbeiro_id,
                data_excecao,
                tipo
            )
            VALUES(
                ?,
                ?,
                'fechar'
            )
        ");

        return $sql->execute([
            $barbeiro_id,
            $data
        ]);

    }

    public static function bloquearHorario(
        $barbeiro_id,
        $data,
        $inicio,
        $fim,
        $motivo = null
    ){

        global $pdo;

        $sql = $pdo->prepare("
            INSERT INTO barbeiro_excecoes(
                barbeiro_id,
                data_excecao,
                hora_inicio,
                hora_fim,
                tipo
            )
            VALUES(
                ?,?,?,?,
                'bloquear'
            )
        ");

        return $sql->execute([
            $barbeiro_id,
            $data,
            $inicio,
            $fim
        ]);

    }

    /*
    =====================================
    SERVIÇOS
    =====================================
    */

    public static function criarServico(
        $barbeiro_id,
        $nome,
        $tempo,
        $valor
    ){

        global $pdo;

        $sql = $pdo->prepare("
            INSERT INTO servicos(
                barbeiro_id,
                nome,
                tempo,
                valor
            )
            VALUES(
                ?,?,?,?
            )
        ");

        return $sql->execute([
            $barbeiro_id,
            $nome,
            $tempo,
            $valor
        ]);

    }

    public static function buscarServicos(
        $barbeiro_id
    ){

        global $pdo;

        $sql = $pdo->prepare("
            SELECT *
            FROM servicos
            WHERE barbeiro_id=?
        ");

        $sql->execute([
            $barbeiro_id
        ]);

        return $sql->fetchAll();

    }

    /*
    =====================================
    CLIENTE
    =====================================
    */

    public static function agendar(

        $barbeiro_id,
        $cliente_nome,
        $cliente_fone,
        $servico_id,
        $data,
        $hora

    ){

        global $pdo;

        $ocupado = self::horarioOcupado(
            $barbeiro_id,
            $data,
            $hora
        );

        if($ocupado){

            return false;

        }

        $tempo = 30;

        $horaFim = date(
            'H:i',
            strtotime(
                $hora .
                " +{$tempo} minutes"
            )
        );

        $sql = $pdo->prepare("
            INSERT INTO agendamentos(

                barbeiro_id,
                cliente_nome,
                cliente_fone,

                servico_id,

                data_agendamento,

                hora_inicio,
                hora_fim,

                status

            )

            VALUES(
                ?,?,?,?,
                ?,?,?,?
            )
        ");

        return $sql->execute([

            $barbeiro_id,

            $cliente_nome,
            $cliente_fone,

            $servico_id,

            $data,

            $hora,
            $horaFim,

            'confirmado'

        ]);

    }

    public static function cancelar(
        $agendamento_id
    ){

        global $pdo;

        $sql = $pdo->prepare("
            UPDATE agendamentos
            SET status='cancelado'
            WHERE id=?
        ");

        return $sql->execute([
            $agendamento_id
        ]);

    }

    /*
    =====================================
    HORÁRIOS
    =====================================
    */

    public static function horariosDisponiveis(
        $barbeiro_id,
        $data
    ){

        $horarios = [];

        $dia = date(
            'w',
            strtotime($data)
        );

        global $pdo;

        $sql = $pdo->prepare("
            SELECT *
            FROM barbeiro_agenda
            WHERE barbeiro_id=?
            AND dia_semana=?
            AND ativo=1
        ");

        $sql->execute([
            $barbeiro_id,
            $dia
        ]);

        $agenda = $sql->fetch();

        if(!$agenda){

            return [];
        }

        $inicio = strtotime(
            $agenda['hora_inicio']
        );

        $fim = strtotime(
            $agenda['hora_fim']
        );

        $intervalo =
        $agenda['intervalo_min'];

        while(
            $inicio < $fim
        ){

            $hora = date(
                'H:i',
                $inicio
            );

            if(
                !self::horarioOcupado(
                    $barbeiro_id,
                    $data,
                    $hora
                )
            ){

                $horarios[] =
                $hora;

            }

            $inicio +=
            ($intervalo * 60);

        }

        return $horarios;

    }

    public static function horarioOcupado(
        $barbeiro_id,
        $data,
        $hora
    ){

        global $pdo;

        $sql = $pdo->prepare("
            SELECT id

            FROM agendamentos

            WHERE barbeiro_id=?
            AND data_agendamento=?
            AND hora_inicio=?
            AND status!='cancelado'

            LIMIT 1
        ");

        $sql->execute([

            $barbeiro_id,
            $data,
            $hora

        ]);

        return $sql->fetch();

    }

    /*
    =====================================
    LISTAGENS
    =====================================
    */

    public static function agendaDia(
        $barbeiro_id,
        $data
    ){

        global $pdo;

        $sql = $pdo->prepare("
            SELECT *

            FROM agendamentos

            WHERE barbeiro_id=?
            AND data_agendamento=?

            ORDER BY hora_inicio
        ");

        $sql->execute([
            $barbeiro_id,
            $data
        ]);

        return $sql->fetchAll();

    }

    public static function agendaMes(
        $barbeiro_id,
        $mes,
        $ano
    ){

        global $pdo;

        $sql = $pdo->prepare("
            SELECT *

            FROM agendamentos

            WHERE barbeiro_id=?

            AND MONTH(
            data_agendamento
            )=?

            AND YEAR(
            data_agendamento
            )=?

            ORDER BY
            data_agendamento
        ");

        $sql->execute([
            $barbeiro_id,
            $mes,
            $ano
        ]);

        return $sql->fetchAll();

    }

}