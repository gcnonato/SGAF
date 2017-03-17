<?php
$tipopagina = "saidas";

//Verifica se o usuário tem permissão para acessar este conteúdo
require "login_verifica.php";
if ($permissao_saidas_cadastrar <> 1) {
    header("Location: permissoes_semacesso.php");
    exit;
}
include "includes.php";

$saida=$_GET["codigo"];

//Template de Título e Sub-título
$tpl_titulo = new Template("templates/titulos.html");
$tpl_titulo->TITULO = "VENDAS DEVOLUÇÕES";
$tpl_titulo->SUBTITULO = "LISTA DE DEVOLUÇÕES DE UMA VENDA";
$tpl_titulo->ICONES_CAMINHO = "$icones";
$tpl_titulo->NOME_ARQUIVO_ICONE = "vendas.png";
$tpl_titulo->show();


$tpl = new Template("templates/listagem_2.html");

//Pega dados da venda para populas os campos de filtro desabilitados
$sql="SELECT * FROM saidas LEFT JOIN pessoas on sai_consumidor = pes_codigo WHERE sai_codigo=$saida";
if (!$query=mysql_query($sql)) die("Erro SQL Filtros que mostram dados da saída: " . mysql_error());
$dados=mysql_fetch_assoc($query);
$consumidor_nome=$dados["pes_nome"];

//Campo Filtro Código da venda
$tpl->CAMPO_TITULO = "Venda";
$tpl->CAMPO_VALOR = $saida;
$tpl->CAMPO_TAMANHO = "";
$tpl->block("BLOCK_FILTRO_CAMPO_DESABILITADO");
$tpl->block("BLOCK_FILTRO_CAMPO");
$tpl->block("BLOCK_FILTRO_COLUNA");

//Campo Filtro Consumidor Nome
$tpl->CAMPO_TITULO = "Consumidor";
$tpl->CAMPO_VALOR = $consumidor_nome;
$tpl->CAMPO_TAMANHO = "";
$tpl->block("BLOCK_FILTRO_CAMPO_DESABILITADO");
$tpl->block("BLOCK_FILTRO_CAMPO");
$tpl->block("BLOCK_FILTRO_COLUNA");

//Botão Cadastrar nova Devolução
$tpl->LINK = "saidas_devolucoes_cadastrar.php?";
$tpl->BOTAO_NOME = "NOVA DEVOLUÇÃO";
$tpl->block("BLOCK_RODAPE_BOTAO_MODELO");
$tpl->block("BLOCK_FILTRO_COLUNA");
$tpl->block("BLOCK_FILTRO");


//INICIO DA LISTAGEM 

//Numero
$tpl->CABECALHO_COLUNA_TAMANHO="30px";
$tpl->CABECALHO_COLUNA_COLSPAN="";
$tpl->CABECALHO_COLUNA_NOME="Nº";
$tpl->block("BLOCK_LISTA_CABECALHO");

//Data 
$tpl->CABECALHO_COLUNA_TAMANHO="";
$tpl->CABECALHO_COLUNA_COLSPAN="";
$tpl->CABECALHO_COLUNA_NOME="DATA";
$tpl->block("BLOCK_LISTA_CABECALHO");

//Operador
$tpl->CABECALHO_COLUNA_TAMANHO="";
$tpl->CABECALHO_COLUNA_COLSPAN="";
$tpl->CABECALHO_COLUNA_NOME="OPERADOR";
$tpl->block("BLOCK_LISTA_CABECALHO");

//Valor inicial e final
$tpl->CABECALHO_COLUNA_TAMANHO="";
$tpl->CABECALHO_COLUNA_COLSPAN="2";
$tpl->CABECALHO_COLUNA_NOME="QTD. ITENS DEVOLVIDOS";
$tpl->block("BLOCK_LISTA_CABECALHO");

//Nota Fiscal Emitida
$tpl->CABECALHO_COLUNA_TAMANHO="";
$tpl->CABECALHO_COLUNA_COLSPAN="";
$tpl->CABECALHO_COLUNA_NOME="NFE";
$tpl->block("BLOCK_LISTA_CABECALHO");


//SQL Principal
$sql="
    SELECT * 
    FROM saidas_devolucoes 
    LEFT JOIN pessoas on (saidev_usuario=pes_codigo)
    WHERE saidev_saida=$saida 
    ORDER BY saidev_numero DESC
";


//PAGINAÇÃO
$query = mysql_query($sql);
if (!$query)
    die("Erro SQL Principal Paginação:" . mysql_error());
$linhas = mysql_num_rows($query);
$por_pagina = $usuario_paginacao;
$paginaatual = $_POST["paginaatual"];
$paginas = ceil($linhas / $por_pagina);
//Se � a primeira vez que acessa a pagina ent�o come�ar na pagina 1
if (($paginaatual == "") || ($paginas < $paginaatual) || ($paginaatual <= 0)) {
    $paginaatual = 1;
}
$comeco = ($paginaatual - 1) * $por_pagina;
$tpl->PAGINAS = "$paginas";
$tpl->PAGINAATUAL = "$paginaatual";
$tpl->PASTA_ICONES = "$icones";
$tpl->block("BLOCK_PAGINACAO");
$sql = $sql . " LIMIT $comeco,$por_pagina ";

$cont=0;
while ($dados=  mysql_fetch_assoc($query)) {
    $numero= $dados["saidev_numero"];
    $data= $dados["saidev_data"];
    $usuario= $dados["saidev_usuario"];
    $usuario_nome= $dados["pes_nome"];

    
    if ($cont==0) $tpl->TR_CLASSE = "tab_linhas_vermelho negrito";
    else $tpl->TR_CLASSE = "";


    //Nº
    $tpl->LISTA_COLUNA_ALINHAMENTO="";
    $tpl->LISTA_COLUNA_CLASSE="";
    $tpl->LISTA_COLUNA_TAMANHO="";
    $tpl->LISTA_COLUNA_VALOR= "$numero";
    $tpl->block("BLOCK_LISTA_COLUNA");
    
    //Data
    $tpl->LISTA_COLUNA_ALINHAMENTO="right";
    $tpl->LISTA_COLUNA_CLASSE="";
    $tpl->LISTA_COLUNA_TAMANHO="";
    $tpl->LISTA_COLUNA_VALOR=  converte_datahora($data);
    $tpl->block("BLOCK_LISTA_COLUNA");
    
    //Usuário
    $tpl->LISTA_COLUNA_ALINHAMENTO="";
    $tpl->LISTA_COLUNA_CLASSE="";
    $tpl->LISTA_COLUNA_TAMANHO="";
    $tpl->LISTA_COLUNA_VALOR=  "$usuario_nome";
    $tpl->block("BLOCK_LISTA_COLUNA");
    
    //Quantidade de Itens devolvidos
    $tpl->LISTA_COLUNA_ALINHAMENTO="right";
    $tpl->LISTA_COLUNA_CLASSE="";
    $tpl->LISTA_COLUNA_TAMANHO="";
    $sql2="SELECT count(saidevpro_item) as qtd_itens FROM saidas_devolucoes_produtos WHERE saidevpro_saida=$saida AND saidevpro_numero=$numero";
    if (!$query2=mysql_query($sql2)) die("Erro SQL Pegar total de itens: " . mysql_error());
    $dados2=mysql_fetch_assoc($query2);
    $qtd_itens=$dados2["qtd_itens"];    
    $tpl->LISTA_COLUNA_VALOR= "($qtd_itens)";
    $tpl->block("BLOCK_LISTA_COLUNA");
    $tpl->IMAGEM_ALINHAMENTO="left";
    $tpl->IMAGEM_TAMANHO="15px";
    $tpl->IMAGEM_PASTA="$icones";
    $tpl->IMAGEM_TITULO="Ver";
    if ($qtd_itens>0) {
        $tpl->LINK="saidas_devolucoes_produtos.php?saida=$saida&numero=$numero";
        $tpl->IMAGEM_NOMEARQUIVO="procurar.png";
    } else {
        $tpl->LINK=" ";
        $tpl->IMAGEM_NOMEARQUIVO="procurar_desabilitado.png";
    }
    $tpl->block("BLOCK_LISTA_COLUNA_IMAGEM");
    $tpl->block("BLOCK_LISTA_COLUNA_ICONES"); 
        
    //NFE Emitida
    $tpl->IMAGEM_ALINHAMENTO="center";
    $tpl->LINK="";
    $tpl->IMAGEM_TAMANHO="12px";
    $tpl->IMAGEM_PASTA="$icones";
    $tpl->IMAGEM_TITULO="Nota Fiscal";
    //Verificar se foi emitido nota
    $sql3="SELECT * FROM nfe_vendas WHERE nfe_numero=$saida";
    if (!$query3 = mysql_query($sql3)) die("Erro BOTÃO ELIMINAR VENDA: (((" . mysql_error().")))");
    $linhas3 = mysql_num_rows($query3);
    if ($linhas3==0) $temnota=0; 
    else  $temnota=1;
    if ($temnota==1) {
        $tpl->IMAGEM_NOMEARQUIVO="nfe_xml.png";
    } else {
        $tpl->IMAGEM_NOMEARQUIVO="nfe_xml2.png";
    }
    $tpl->block("BLOCK_LISTA_COLUNA_IMAGEM");
    $tpl->block("BLOCK_LISTA_COLUNA_ICONES"); 

   
    $tpl->block("BLOCK_LISTA"); 
    $cont++;
}

if (mysql_num_rows($query) == 0) {
    $tpl->block("BLOCK_LISTA_NADA");
}

//Botão Voltar
$tpl->LINK_VOLTAR="saidas.php";
$tpl->block("BLOCK_RODAPE_BOTAO_VOLTAR");
$tpl->block("BLOCK_RODAPE_BOTAO");
$tpl->block("BLOCK_RODAPE_BOTOES");


$tpl->show();

include "rodape.php";

?>