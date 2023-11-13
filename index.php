
<?php
$cep= "01001000";

$url = "https://viacep.com.br/ws/$cep/json/";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

$resultado = curl_exec($ch); 
curl_close($ch); 

if ($resultado) {
    $dados_cep = json_decode($resultado, true);

    if (!empty($dados_cep['erro'])) {
        echo "CEP não encontrado.";
    } else {
        
        echo "CEP: " . $dados_cep['cep'] . "  ";
        echo "Logradouro: " . $dados_cep['logradouro'] . "  ";
        echo "Bairro: " . $dados_cep['bairro'] . "  ";
        echo "Cidade/Estado: " . $dados_cep['localidade'] . '/' . $dados_cep['uf'] . "  ";
    }
} else {
    echo "Não foi possível obter os dados do CEP.";
}
?>
