<?php

//Verifica se o usuário tem permissão para acessar este conteúdo
require "login_verifica.php";
if ($permissao_caixas_cadastrar <> 1) {
    header("Location: permissoes_semacesso.php");
    exit;
}

$tipopagina = "caixas";
include "includes.php";


$operacao = $_POST['operacao'];
$codigo = $_POST['codigo']; //Para edicão
$nome = $_POST['nome'];
$local = $_POST['local'];
$datahoraatual=date("Y-m-d H:i:s");


//TÍTULO PRINCIPAL
$tpl_titulo = new Template("templates/titulos.html");
$tpl_titulo->TITULO = "CAIXAS";
$tpl_titulo->SUBTITULO = "CADASTRO";
$tpl_titulo->ICONES_CAMINHO = "$icones";
$tpl_titulo->NOME_ARQUIVO_ICONE = "caixas.png";
$tpl_titulo->show();


//OPERAÇÕES
//Estrutura da notificação
$tpl_notificacao = new Template("templates/notificacao.html");
$tpl_notificacao->ICONES = $icones;
$tpl_notificacao->DESTINO = "caixas.php";


//Se a operação for cadastro então
if ($operacao == 'cadastrar') {
    //Verifica se já existe um caixa com mesmo nome    
    $sql = "SELECT cai_nome FROM caixas WHERE cai_nome='$nome'";
    $query = mysql_query($sql);
    if (mysql_num_rows($query) > 0) {
        $tpl_notificacao->block("BLOCK_ERRO");
        $tpl_notificacao->block("BLOCK_NAOCADASTRADO");
        $tpl_notificacao->block("BLOCK_MOTIVO_JAEXISTE");
        $tpl_notificacao->block("BLOCK_BOTAO_VOLTAR");
        $tpl_notificacao->show();
        exit;
    } else {
        //Insere novo registro
        $sql2 = "
        INSERT INTO 
            caixas (
                cai_nome,
                cai_local,
                cai_quiosque,
                cai_situacao,
                cai_datahoracadastro,
                cai_status
            )
        VALUES (
            '$nome',
            '$local',
            '$usuario_quiosque',
            '2',
            '$datahoraatual',
            '1'    
        )";
        $query2 = mysql_query($sql2);
        if (!$query2)
            die("Erro de SQL:" . mysql_error());
        
        $tpl_notificacao->MOTIVO_COMPLEMENTO = "";
        $tpl_notificacao->block("BLOCK_CONFIRMAR");
        $tpl_notificacao->block("BLOCK_CADASTRADO");
        $tpl_notificacao->block("BLOCK_BOTAO");
        $tpl_notificacao->show();
    }
}

//Se a operação for edição então
if ($operacao == 'editar') {
    //Verifica se já existe registro com o mesmo nome
    $sql = "SELECT cai_nome FROM caixas WHERE cai_codigo='$codigo'";
    $query = mysql_query($sql);
    $dados = mysql_fetch_assoc($query);
    $nome_banco = $dados["tax_nome"];
    echo "(strtolower($nome) != strtolower($nome_banco))";
    if (strtolower($nome) != strtolower($nome_banco)) {
        $sql2 = "SELECT cai_nome FROM caixas WHERE cai_nome='$nome'";
        $query2 = mysql_query($sql2);
        if (mysql_num_rows($query2) > 0) {
            $tpl_notificacao->block("BLOCK_ERRO");
            $tpl_notificacao->block("BLOCK_NAOCADASTRADO");
            $tpl_notificacao->block("BLOCK_MOTIVO_JAEXISTE");
            $tpl_notificacao->block("BLOCK_BOTAO_VOLTAR");
            $tpl_notificacao->show();
            exit;
        }
    }

    $sql = "
    UPDATE
        caixas
    SET            
        cai_nome='$nome',
        cai_local='$local'
    WHERE
        cai_codigo='$codigo'
    ";
    if (!mysql_query($sql))
        die("Erro: " . mysql_error());
    $tpl_notificacao->block("BLOCK_CONFIRMAR");
    $tpl_notificacao->block("BLOCK_EDITADO");
    $tpl_notificacao->block("BLOCK_BOTAO");
    $tpl_notificacao->show();
}
?>

