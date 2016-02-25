<?php

require_once 'Conexao.php';

class Validador {

    private $sql;
    private $conexao;

    public function alerta($texto) {
        echo "<div id='msg'>" . $texto . "</div>";
        echo "<script>$(\"#msg\" ).fadeOut( 2000, function() {
  });</script>";
    }

    public function moeda($valor) {
        return number_format(floatval($valor), 2, ',', '.');
    }

    public function ultimoDiaMes($mes, $ano) {
        $ultimo_dia = date("t", mktime(0, 0, 0, $mes, '01', $ano));
        return $ultimo_dia;
    }

    public function DiaMesAno($data) {
        $data = explode("/", $data);
        return $data;
    }

    public function mesExtenco($mes) {
        switch ($mes) {

            case 1: return "Janeiro";
                break;
            case 2: return "Fevereiro";
                break;
            case 3: return "Março";
                break;
            case 4: return "Abril";
                break;
            case 5: return "Maio";
                break;
            case 6: return "Junho";
                break;
            case 7: return "Julho";
                break;
            case 8: return "Agosto";
                break;
            case 9: return "Setembro";
                break;
            case 10: return "Outubro";
                break;
            case 11: return "Novembro";
                break;
            case 12: return "Dezembro";
                break;
        }
    }

    public function dataAtual() {
        $timestamp = mktime(date("H") - 3, date("i"), date("s"), date("m"), date("d"), date("Y"));
        $data = gmdate("d/m/Y", $timestamp);
        return $data;
    }

    public function dataAtualBD() {
        $timestamp = mktime(date("H") - 3, date("i"), date("s"), date("m"), date("d"), date("Y"));
        $data = gmdate("Y-m-d", $timestamp);
        return $data;
    }

    public function diaAtual() {
        $timestamp = mktime(date("H") - 3, date("i"), date("s"), date("m"), date("d"), date("Y"));
        $data = gmdate("d", $timestamp);
        return $data;
    }

    public function geraValidade($data, $dias){
      $datafinal = date('d/m/Y', strtotime("+$dias days",strtotime($data)));
      return $datafinal;
    }

    public function dataAtualBackup() {
        $timestamp = mktime(date("H") - 3, date("i"), date("s"), date("m"), date("d"), date("Y"));
        $data = gmdate("d-m-Y_H-i", $timestamp);
        return $data;
    }
    public function DataHoraMinSeg() {
        $timestamp = mktime(date("H") - 3, date("i"), date("s"), date("m"), date("d"), date("Y"));
        $data = gmdate("d/m/Y H:i:s", $timestamp);
        return $data;
    }
    public function dataHoraAtual() {
        $timestamp = mktime(date("H") - 3, date("i"), date("s"), date("m"), date("d"), date("Y"));
        $data = gmdate("Y-m-d H:i:s", $timestamp);
        return $data;
    }

    public function validaEmail($email) {
        $conta = "^[a-zA-Z0-9\._-]+@";
        $domino = "[a-zA-Z0-9\._-]+.";
        $extensao = "([a-zA-Z]{2,4})$";

        $pattern = $conta . $domino . $extensao;

        if (ereg($pattern, $email))
            return true;
        else
            Validador::alerta("Email inválido");



        return false;
    }

    public function validaEmailCad($email) {
        if (Validador::validaEmail($email)) {
            $this->conexao = new Conexao();
            $this->conexao->conectar();
            $this->sql = "SELECT email FROM usuario WHERE email = '$email'";
            $this->conexao->execSQL($this->sql);
            if ($this->conexao->contarDados() > 0) {
                Validador::alerta("Email já cadastrado <a href=#''>Recupere a senha");
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function dataTimeStampToFormatoBrasil($data) {
        if($data == "0000-00-00 00:00:00"){
          return "--/--/---- --:--:--";
        }
        else
        {
          $hora = date("H:i", strtotime($data));
          $ndata = implode("/", array_reverse(explode("-", date("Y-m-d", strtotime($data)))));
          return $ndata." ".$hora;
        }

    }

    public function validaSenha($senha1, $senha2) {
        if (strlen($senha1) < 8) {
            echo "<script>"
            . "alert('Senha deve conter no minimo 8 digitos');"
            . "</script>";
            return false;
        } else {
            if ($senha1 != $senha2) {
                Validador::alerta("Senhas não conferem");
                return false;
            } else {

                return true;
            }
        }
    }

    public function validaSenhaBranco($senha) {
        if ($senha == "") {
            Validador::alerta("Senha não pode ser em branco");
            return false;
        } else {

            return true;
        }
    }

    public function validaNome($nome) {
        if (strlen($nome) < 4) {
            Validador::alerta("Seu nome deve conter no mínimo 4 letras");
            return false;
        } else {
            return true;
        }
    }

    public function dataBD($data) {
        return implode("-", array_reverse(explode("/", $data)));
    }

    public function dataView($data) {
        return implode("/", array_reverse(explode("-", $data)));
    }

    public function truncaHoraMin($data) {
        return date("H:i", strtotime($data));
    }

}
