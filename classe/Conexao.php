<?php

//CLASSE DE CONFIGURACAO DA CONEXAO
class Conexao {

    //NOME DO HOST
    private $nomeHost;
    //NOME DO USUÁRIO
    private $user;
    //SENHA DO USUÁRIO
    private $pass;
    //NOME DO BANCO DE DADOS
    private $banco;
    private $query;
    private $id;
    private $conexao;

    public function getId() {
        return $this->id;
    }

    /**
     * Parâmetros para poder se conectar ao banco de dados.
     * @param <Sting> $nomeHost Nome da máquina ou computador que possui o servidor HTTP.
     * @param <Sting> $user O nome de usuário, que por padrão é o nome do usuário que é o proprietário do processo do servidor.
     * @param <Sting> $pass A senha, que por padrão a senha vazia.
     * @param <Sting> $banco Nome do banco de dados ao qual vai se conectar.
     */
    public function __construct($nomeHost = "localhost", $user = "root", $pass = "", $banco = "princomar") {
        $this->nomeHost = $nomeHost;
        $this->user = $user;
        $this->pass = $pass;
        $this->banco = $banco;

    }

    /**
     * FUNCAO QUE REALIZA A CONEXAO COM BANCO DE DADOS.
     * Utilizando a função mysql_connect(), que Abre uma conexão com um servidor MySQL.
     * Depois verifica se a conexão nao está vazia ou null, caso seja verdade seleciona
     * o banco usando a funcao mysql_select_db() ou no caso de falso aparecerá a mensagem:
     * Não foi possivel estabelecer conexão com o banco de dados! e mata a função.
     */
    public function conectar() {
        $this->conexao = mysqli_connect("$this->nomeHost", "$this->user", "$this->pass") or die("<h1 align=\"center\">Não foi possível conectar ao servidor mySQL!<h1>");
        if (!empty($this->conexao)) {
            mysqli_select_db($this->conexao, "$this->banco") or die("<h1 align=\"center\">Não foi possivel estabelecer conexão com o banco de dados!<h1>");
        }
    }

    /**
     * FUNÇÃO PARA DESCONECTAR.
     * Usando o mysql_close(), que fecha a conexão MySQL.
     */
    public function desconectar() {
        mysqli_close();
    }

    /**
     * metodo utilizando para executar comandos SQL
     * @param <String> $sql Instrução SQL que deve ser passada, para que o método
     * mysql_query($sql)possa enviar uma consulta ao MySQL.
     * @return <String> $query Caso o que foi executado pela função mysql_query($sql) exista,
     * é retornado a instrução solicitada pelo SQL a $qr, se não a instrução de erro aparecerá.
     * A função mysql_error() retorna um texto com a mensagem de erro da operação MYSQL anterior.
     */
    public function execSQL($sql) {
        $this->query = mysqli_query($this->conexao, $sql) or die
                        (/*"<b><center>Erro ao Executar o Query: $sql - </b></center><br />" .*/"<script> alert(\"Ocorreu um erro no acesso ao banco de dados \\nErro:\\n". mysqli_error($this->conexao)."\");</script>");
        $this->id = mysqli_insert_id($this->conexao);
        return $this->query;
    }

    /**
     * Método que executa e lista dados do banco de dados.
     * PARA FUNCIONAR DEVERAR TER ANTERIOMENTO USADO A FUNÇÃO EXECSQL.
     * @param <String> $query Variável que recebe o que foi retornado pela função execSQL
     * @return <String> $lista retona o que foi gerado pelo mysql_fetch_assoc($qr) e essa função
     * tem o objetivo de obter um linha do resultado como uma matriz associativa.
     */
    public function listarResultados() {
        //obtém um linha do resultado como uma matriz associativa.
        return mysqli_fetch_assoc($this->query);
    }

    /**
     * FUNÇÃO QUE RETORNA A QUANTIDADE DE LINHAS QUE TEM NA INSTRUÇÃO SQL QUE FOI
     * EXECUTADA. PARA FUNCIONAR DEVERAR TER ANTERIOMENTO USADO A FUNÇÃO EXECSQL.
     * @param <String> $query Variável que recebe o que foi retornado pela função execSQL
     * @return <String> $totalReg recebe o numero de linhas que executada pela função
     * mysql_num_rows($qr).
     */
    public function contarDados() {
        //Obtém o número de linhas em um resultado
        $totalReg = mysqli_num_rows($this->query);
        return $totalReg;
    }

}
