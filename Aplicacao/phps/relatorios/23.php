<?php

//Períodos
$tpl_rel->COLUNA_ALINHAMENTO = "right";
$tpl_rel->COLUNA_TAMANHO = "200px";
$tpl_rel->COLUNA_ROWSPAN = "";
$tpl_rel->TITULO = "Período";
$tpl_rel->block("BLOCK_TITULO");
$tpl_rel->block("BLOCK_CONTEUDO");
$tpl_rel->block("BLOCK_COLUNA");
$tpl_rel->COLUNA_ALINHAMENTO = "left";
$tpl_rel->COLUNA_TAMANHO = "";
$tpl_rel->COLUNA_ROWSPAN = "";
$tpl_rel->CAMPO_TIPO = "date";
$tpl_rel->CAMPO_NOME = "datade";
//$tpl_rel->CAMPO_ID = "data_1";
$tpl_rel->CAMPO_TAMANHO = "";
$tpl_rel->CAMPO_VALOR = "";
$tpl_rel->CAMPO_QTDCARACTERES = "8";
$tpl_rel->block("BLOCK_CAMPO_AUTOSELECIONAR");
$tpl_rel->block("BLOCK_CAMPO_HISTORICODESATIVADO");
//$tpl_rel->block("BLOCK_CAMPO_DESABILITADO");
$tpl_rel->block("BLOCK_CAMPO_OBRIGATORIO");
$tpl_rel->CAMPO_CLASSE = " campo_tamanho_5 ";
$tpl_rel->block("BLOCK_CAMPO_PADRAO");
$tpl_rel->block("BLOCK_CAMPO");
$tpl_rel->TEXTO_NOME = "";
$tpl_rel->TEXTO_ID = "";
$tpl_rel->TEXTO_CLASSE = "";
$tpl_rel->TEXTO_VALOR = " até ";
$dataatual = date("Y-m-d");
$tpl_rel->CAMPO_MAX="$dataatual";
$tpl_rel->block("BLOCK_CAMPO_MAX");
$tpl_rel->block("BLOCK_TEXTO");
$tpl_rel->block("BLOCK_CONTEUDO");

$tpl_rel->COLUNA_ALINHAMENTO = "left";
$tpl_rel->COLUNA_TAMANHO = "";
$tpl_rel->COLUNA_ROWSPAN = "";
$tpl_rel->CAMPO_TIPO = "date";
$tpl_rel->CAMPO_NOME = "dataate";
//$tpl_rel->CAMPO_ID = "data_2";
$tpl_rel->CAMPO_TAMANHO = "8";
$tpl_rel->CAMPO_VALOR = "$dataatual";
$tpl_rel->CAMPO_QTDCARACTERES = "8";
$tpl_rel->block("BLOCK_CAMPO_AUTOSELECIONAR");
$tpl_rel->block("BLOCK_CAMPO_HISTORICODESATIVADO");
//$tpl_rel->block("BLOCK_CAMPO_DESABILITADO");
$tpl_rel->block("BLOCK_CAMPO_OBRIGATORIO");
$tpl_rel->block("BLOCK_CAMPO_PADRAO");
$tpl_rel->block("BLOCK_CAMPO");
$tpl_rel->block("BLOCK_CONTEUDO");
$tpl_rel->block("BLOCK_COLUNA");
$tpl_rel->block("BLOCK_LINHA");

//Mostrar dias da semana
$tpl_rel->TITULO = "Mostrar";
$tpl_rel->COLUNA_ALINHAMENTO = "right";
$tpl_rel->block("BLOCK_TITULO");
$tpl_rel->block("BLOCK_CONTEUDO");
$tpl_rel->block("BLOCK_COLUNA");
$tpl_rel->COLUNA_ALINHAMENTO = "left";
$tpl_rel->COLUNA_TAMANHO = "";
$tpl_rel->COLUNA_ROWSPAN = "";
$tpl_rel->SELECT_NOME = "mostrar";
$tpl_rel->SELECT_TAMANHO = "";
$tpl_rel->block("BLOCK_SELECT_PADRAO");
$tpl_rel->OPTION_VALOR = 1;
$tpl_rel->OPTION_TEXTO = "Apenas não devolvidos";
$tpl_rel->block("BLOCK_OPTION_SELECIONADO");
$tpl_rel->block("BLOCK_OPTION");
$tpl_rel->OPTION_VALOR = 2;
$tpl_rel->OPTION_TEXTO = "Devolvidos e não devolvidos";
$tpl_rel->block("BLOCK_OPTION");
$tpl_rel->block("BLOCK_SELECT");
$tpl_rel->block("BLOCK_CONTEUDO");
$tpl_rel->block("BLOCK_COLUNA");
$tpl_rel->block("BLOCK_LINHA");

//Ordenação
$tpl_rel->TITULO = "Classificar/Ordenar por";
$tpl_rel->COLUNA_ALINHAMENTO = "right";
$tpl_rel->block("BLOCK_TITULO");
$tpl_rel->block("BLOCK_CONTEUDO");
$tpl_rel->block("BLOCK_COLUNA");
$tpl_rel->COLUNA_ALINHAMENTO = "left";
$tpl_rel->COLUNA_TAMANHO = "";
$tpl_rel->COLUNA_ROWSPAN = "";
$tpl_rel->SELECT_NOME = "ordenar";
$tpl_rel->SELECT_TAMANHO = "";
$tpl_rel->block("BLOCK_SELECT_PADRAO");
$tpl_rel->OPTION_VALOR = 'consumidor';
$tpl_rel->OPTION_TEXTO = "Consumidor";
$tpl_rel->block("BLOCK_OPTION_SELECIONADO");
$tpl_rel->block("BLOCK_OPTION");
$tpl_rel->OPTION_VALOR = 'produto';
$tpl_rel->OPTION_TEXTO = "Produto";
$tpl_rel->block("BLOCK_OPTION");
$tpl_rel->block("BLOCK_SELECT");
$tpl_rel->block("BLOCK_CONTEUDO");
$tpl_rel->block("BLOCK_COLUNA");
$tpl_rel->block("BLOCK_LINHA");

?>

