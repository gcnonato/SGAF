<?php
namespace SpedRestFull;
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once 'bootstrap.php';
require_once 'EmissorNFe.php';

//tanto o config.json como o certificado.pfx podem estar
//armazenados em uma base de dados, então não é necessário
///trabalhar com arquivos, este script abaixo serve apenas como
//exemplo durante a fase de desenvolvimento e testes.
$arr = [
    "atualizacao" => "2017-11-27 21:25:00",
    "tpAmb" => 2,
    "razaosocial" => "FERNANDA WITZGALL ME",
    "cnpj" => "21996226000164",
    "siglaUF" => "RS",
    "schemes" => "PL008i2",
    "versao" => '3.10',
    "tokenIBPT" => "",
    "CSC" => "58E0883A-CFE4-45B6-8249-5BD63D8F6832", //58E0883A-CFE4-45B6-8249-5BD63D8F6832 Homologação
    "CSCid" => "000001",
    "proxyConf" => [
        "proxyIp" => "",
        "proxyConf" => "",
        "proxyUser" => "",
        "proxyPass" => ""
    ]
];

$dadosNfe = [
    "tpAmb" => "2",
    "cDV" => "",
    "id" => null,
    "mod" => "65",
    "cNF" => "12346789",
    "cUF" => "43",
    "natOp" => "VENDA",
    "indPag" => "1",
    "serie" => "1",
    "nNF" => "1003",
    "dhEmi" => "2018-04-15T11:52:00-03:00",
    "dhSaiEnt" => null,
    "tpNF" => "1",
    "idDest" => "1",
    "cMunFG" => "4307005",
    "tpImp" => "4",
    "tpEmis" => "1",
    "finNFe" => "1",
    "indFinal" => "1",
    "indPres" => "1",
    "procEmi" => "0",
    "verProc" => "1.0.0",
    "xNome" => "FERNANDA WITZGALL ME",
    "xFant" => "Clínica Veterinária Fernanda Witzgall",
    "IE" => "0390174319",
    "IEST" => null,
    "IM" => null,
    "CNAE" => null,
    "CRT" => 1,
    "xLgr" => "Rua Torres Gonçalves",
    "nro" => "156",
    "xCpl" => null,
    "xBairro" => "Centro",
    "cMun" => "4307005",
    "xMun" => "Erechim",
    "UF" => "RS",
    "CEP" => "99700422",
    "cPais" => "1058",
    "xPais" => "Brasil",
    "fone" => "5499683888",
    "vBC" => null,
    "vICMS" => null,
    "vICMSDesonv" => null,
    "vBCST" => null,
    "vST" => null,
    "vProd" => 55.00,
    "vFrete" => null,
    "vSeg" => null,
    "vDesc" => null,
    "vII" => null,
    "vIPI" => null,
    "vPIS" => null,
    "vCOFINS" => null,
    "vOutro" => null,
    "vNF" => 55.00,
    "vTotTrib" => null,
    "vFCP" => null,
    "vFCPST" => null,
    "vFCPSTRet" => null,
    "vIPIDevol" => null,
    "modFrete" => 9,
    "tPag" => "01",
    "vPag" => 55.00,
    "tpIntegra" => 2,
    "vTroco" => null,
    "doctoNfe" => [
      "doc" => "CNPJ",
      "CNPJ" => "21996226000164",
      "CPF" => null,
    ],
    "usaNfeCartaoCredito" => [
      "Cartao" => false,
      "CNPJ" => null,
      "tBand" => "02",
      "cAut" => null,
    ],
    "destinatario" => [
      "xNome" => null,
      "indIEDest" => "9",
      "IE" => null,
      "ISUF" => null,
      "IM" => null,
      "email" => null,
      "idEstrangeiro" => null,
      "xLgr" => null,
      "nro" => null,
      "xCpl" => null,
      "xBairro" => null,
      "cMun" => null,
      "xMun" => null,
      "UF" => null,
      "CEP" => null,
      "cPais" => null,
      "xPais" => null,
      "fone" => null,
      "doctoNfe" => [
        "doc" => "CPF",
        "CNPJ" => null,
        "CPF" => null,
      ],
      "endEntrega" => [
        "xLgr" => null,
        "nro" => null,
        "xCpl" => null,
        "xBairro" => null,
        "cMun" => null,
        "xMun" => null,
        "UF" => null,
        "doctoNfe" => [
          "doc" => "CPF",
          "CNPJ" => null,
          "CPF" => null,
        ],
      ],
      "endRetirada" => [
        "retirada" => false,
        "xLgr" => null,
        "nro" => null,
        "xCpl" => null,
        "xBairro" => null,
        "cMun" => null,
        "xMun" => null,
        "UF" => null,
        "doctoNfe" => [
          "doc" => null,
          "CNPJ" => null,
          "CPF" => null,
        ],
      ],
    ],
    "usaNfContingencia" => [
      "contingencia" => false,
      "dhCont" => null,
      "xJust" => null,
    ],
    "usaNfReferenciada" => [
      "referenciada" => false,
      "refNFe" => null,
    ],
    "usaNfISSQN" => [
      "ISSQN" => false,
    ],
    "usaNfRetTributos" => [
      "RetTributos" => false,
    ],
    "usaNfTransportadora" => [
      "Transportadora" => false,
      "xNome" => null,
      "IE" => null,
      "xEnder" => null,
      "xMun" => null,
      "UF" => null,
      "CNPJ" => null,
      "CPF" => null,
      "usaNfVolumeTransportadora" => [
        "Volume" => false,
        1 => [
          "item" => "1",
          "qVol" => "2",
          "esp" => "caixa",
          "marca" => null,
          "nVol" => null,
          "pesoL" => null,
          "pesoB" => null,
        ],
      ],
    ],
    "usaNfDetalheVeicTransportadora" => [
      "Veiculo" => false,
    ],
    "usaNfReboqueVeicTransportadora" => [
      "Reboque" => false,
    ],
    "usaNfDadosFatura" => [
      "Fatura" => false,
      "nFat" => null,
      "vOrig" => null,
      "vDesc" => null,
      "vLiq" => null,
    ],
    "usaNfDadosDuplicata" => [
      "Duplicata" => false,
      "nDup" => null,
      "dVenc" => null,
      "vDup" => null,
    ],
    "usaNfExportacao" => [
      "Exportacao" => false,
    ],
    "infAdFisco" => null,
    "infCpl" => null,
    "qtdItens" => "1",
];

$dadosNfeItens = [
  1 => [
    "item" => 1,
    "cProd" => 1,
    "cEAN" => null,
    "xProd" => "Vanguard Plus 1DS",
    "NCM" => "30023090",
    "EXTIPI" => null,
    "CFOP" => "5102",
    "uCom" => "UN",
    "qCom" => 1,
    "vUnCom" => 55.00,
    "vProd" => 55.00,
    "cEANTrib" => null,
    "uTrib" => "UN",
    "qTrib" => 1,
    "vUnTrib" => 55.00,
    "vFrete" => null,
    "vSeg" => null,
    "vDesc" => null,
    "vOutro" => null,
    "indTot" => 1,
    "xPed" => null,
    "nItemPed" => null,
    "nFCI" => null,
    "infAdProd" => "Informações adicionais do produto.",
    "CEST" => null,
    "indEscala" => null,
    "CNPJFab" => null,
    "nLote" => null,
    "qLote" => null,
    "dFab" => null,
    "dVal" => null,
    "cAgreg" => null,
    "vTotTrib" => 0.00,
    "orig" => "0",
    "CST" => "40",
    "modBC" => null,
    "vBC" => null,
    "pICMS" => null,
    "vICMS" => null,
    "pFCP" => null,
    "vFCP" => null,
    "vBCFCP" => null,
    "modBCST" => null,
    "pMVAST" => null,
    "pRedBCST" => null,
    "vBCST" => null,
    "pICMSST" => null,
    "vICMSST" => null,
    "vBCFCPST" => null,
    "pFCPST" => null,
    "vFCPST" => null,
    "vICMSDeson" => null,
    "motDesICMS" => null,
    "pRedBC" => null,
    "vICMSOp" => null,
    "pDif" => null,
    "vICMSDif" => null,
    "vBCSTRet" => null,
    "pST" => null,
    "vICMSSTRet" => null,
    "vBCFCPSTRet" => null,
    "pFCPSTRet" => null,
    "vFCPSTRet" => null,
    "pBCOp" => null,
    "UFST" => null,
    "vBCSTDest" => null,
    "vICMSSTDest" => null,
    "CSOSN" => "400",
    "pCredSN" => null,
    "vCredICMSSN" => null,
    "vBCUFDest" => null,
    "vBCFCPUFDest" => null,
    "pFCPUFDest" => null,
    "pICMSUFDest" => null,
    "pICMSInter" => null,
    "pICMSInterPart" => null,
    "vFCPUFDest" => 0.00,
    "vICMSUFDest" => null,
    "vICMSUFRemet" => null,
    "pPIS" => null,
    "vPIS" => null,
    "qBCProd" => null,
    "vAliqProd" => null,
    "pCOFINS" => null,
    "vCOFINS" => null,
    "qBCProd" => null,
    "vAliqProd" => null,
    "pDevol" => null,
    "vIPIDevol" => null,
    "usaNfDevolucao" => [
      "Devolucao" => false,
    ],
    "usaNfISSQN" => [
      "ISSQN" => false,
    ],
    "usaNfCOFINSST" => [
      "cofinsST" => false,
    ],
    "usaNfTributacaoCOFINS" => [
      "cofins" => false,
    ],
    "usaNfPISST" => [
      "pisST" => false,
    ],
    "usaNfPIS" => [
      "PIS" => false,
    ],
    "usaNfIPI" => [
      "IPI" => false,
    ],
    "usaNfII" => [
      "ImpostoImportacao" => false,
    ],
    "usaNfTributacaoSN" => [
      "TributaSN" => true,
    ],
    "usaNfICMSInterestadual" => [
      "ICMSInter" => false,
    ],
    "usaNfICMSRetido" => [
      "RetemICMS" => false,
    ],
    "usaNfPartilhaUF" => [
      "PartilhaUF" => false,
    ],
    "usaNfRecopi" => [
      "Recopi" => false,
    ],
    "usaNfDI" => [
      "DI" => false,
    ],
    "usaNfExportacao" => [
      "Exportacao" => false,
    ],
    "usaNfVeiculo" => [
      "Veiculo" => false,
    ],
    "usaNfMedicamentos" => [
      "Medicamento" => false,
      "nLote" => null,
      "qLote" => null,
      "dFab" => null,
      "dVal" => null,
      "vPMC" => null,
      "cProdANVISA" => null,
    ],
    "usaNfArmamento" => [
      "Armamento" => false,
    ],
    "usaNfCombustivel" => [
      "Combustivel" => false,
    ],
  ],
];

try { 
   $configJson = json_encode($arr);
   $dadosNfeJson = json_encode($dadosNfe);
   $dadosNfeItensJson = json_encode($dadosNfeItens);
  $emissor = new EmissorNFe($configJson, $dadosNfeJson, $dadosNfeItensJson);
  $emissor->emiteNfe();

  $retorno = $emissor->geraXML();

  if (isset($retorno["chave"])) {
    //$venda = Nfe::find($idNFe)->update(['chave_nfe' => $retorno["chave"],'xml' => $retorno["xml"]]);
    $emissor->geraPDF('1002');
    //echo "Nota Gerada com Sucesso: ".$retorno["chave"];
  }
  else {
    echo "<br><br>".$retorno["error"];
  }
} catch (Exception $ex) {
    echo "ERROR: $ex";
}


