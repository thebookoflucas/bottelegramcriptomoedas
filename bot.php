<?php

//trocar ##bot-token## pelo token passado pelo botfather, deixar as aspas
define('BOT_TOKEN', '##bot-token##');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');


function processMessage($message) {
  // processa a mensagem recebida
  $message_id = $message['message_id'];
  $chat_id = $message['chat']['id'];
  if (isset($message['text'])) {

    $text = $message['text'];//texto recebido na mensagem
    
    
	//testar o bot para ver se esta respondendo
    if (strpos($text, "/testarbot") === 0) {
  //envia a mensagem ao usuário
      sendMessage("sendMessage", array('reply' => true, 'parse_mode' => HTML, 'chat_id' => $chat_id, "text" => 'Olá, <b>'. $message['from']['first_name'].
  '</b>, estou Respondendo!' . "\r\n"));
    }

	//mostra as top 10 moedas no site coinmaketcap.com
     }if (strpos($text, "/top10") === 0) {

$url = "https://api.coinmarketcap.com/v1/ticker/?limit=10";
$result = file_get_contents($url);
$final2 = json_decode($result, true);
$moeda1 = $final2[0]['name'];
$moeda2 = $final2[1]['name'];
$moeda3 = $final2[2]['name'];
$moeda4 = $final2[3]['name'];
$moeda5 = $final2[4]['name'];
$moeda6 = $final2[5]['name'];
$moeda7 = $final2[6]['name'];
$moeda8 = $final2[7]['name'];
$moeda9 = $final2[8]['name'];
$moeda10 = $final2[9]['name'];
$valormoeda1 = $final2[0]['price_usd'];
$valormoeda2 = $final2[1]['price_usd'];
$valormoeda3 = $final2[2]['price_usd'];
$valormoeda4 = $final2[3]['price_usd'];
$valormoeda5 = $final2[4]['price_usd'];
$valormoeda6 = $final2[5]['price_usd'];
$valormoeda7 = $final2[6]['price_usd'];
$valormoeda8 = $final2[7]['price_usd'];
$valormoeda9 = $final2[8]['price_usd'];
$valormoeda10 = $final2[9]['price_usd'];
$ultimahora1 = $final2[0]['percent_change_1h'];
$ultimahora2 = $final2[1]['percent_change_1h'];
$ultimahora3 = $final2[2]['percent_change_1h'];
$ultimahora4 = $final2[3]['percent_change_1h'];
$ultimahora5 = $final2[4]['percent_change_1h'];
$ultimahora6 = $final2[5]['percent_change_1h'];
$ultimahora7 = $final2[6]['percent_change_1h'];
$ultimahora8 = $final2[7]['percent_change_1h'];
$ultimahora9 = $final2[8]['percent_change_1h'];
$ultimahora10 = $final2[9]['percent_change_1h'];

$mensagem = "Top 10 Ultima Hora
$moeda1: $valormoeda1 ($ultimahora1 %)
$moeda2: $valormoeda2 ($ultimahora2 %)
$moeda3: $valormoeda3 ($ultimahora3 %)
$moeda4: $valormoeda4 ($ultimahora4 %)
$moeda5: $valormoeda5 ($ultimahora5 %)
$moeda6: $valormoeda6 ($ultimahora6 %)
$moeda7: $valormoeda7 ($ultimahora7 %)
$moeda8: $valormoeda8 ($ultimahora8 %)
$moeda9: $valormoeda9 ($ultimahora9 %)
$moeda10: $valormoeda10 ($ultimahora10 %)

";
$mensagem = urlencode($mensagem);
$url = "https://api.telegram.org/bot".$token. "/sendMessage?chat_id=".$chat_id."&text=".$mensagem;

$execucao = file_get_contents($url);
    }
    
    //traz resultado sobre o bitcoin
	if (strpos($text, "/btc") === 0) {

$urlbrl = "https://api.coinmarketcap.com/v1/ticker/bitcoin/?convert=BRL";
$resultreal = file_get_contents($urlbrl);
$finalreal = json_decode($resultreal, true);
$real = $finalreal[0]['price_brl'];
$url = "https://api.coinmarketcap.com/v1/ticker/bitcoin/";
$result = file_get_contents($url);
$final2 = json_decode($result, true);
$final3 = $final2[0]['price_usd'];
$mudanca24 = $final2[0]['percent_change_24h'];
$mudanca1 = $final2[0]['percent_change_1h'];
$mudanca7d = $final2[0]['percent_change_7d'];



      sendMessage("sendMessage", array('reply' => true, 'parse_mode' => HTML, 'chat_id' => $chat_id, "text" => '<b>Bitcoin</b>' . "\r\n" . 'Valor: $ ' . $final3 . "\r\n"
      . 'Valor BRL: R$ ' . $real . "\r\n"
      . 'Mudança ultima hora: ' . $mudanca1 . '% ' . "\r\n"
      . 'Ultimas 24h: ' . $mudanca24 . '% ' . "\r\n"
		. 'Ultimos 7 dias: ' . $mudanca7d . '%'
      ));
    }


	//procura moeda no site coinmaketcap pelo nome da moeda
    if (strpos($text, "/moeda") === 0) {

$texto = $message['text'];
$texto2 =  substr($texto, 7, 22);
$urlmercado = "https://api.coinmarketcap.com/v1/ticker/";
$urltotal = $urlmercado . $texto2 ;
$resultado = file_get_contents($urltotal);
$finalmercado = json_decode($resultado, true);
$nome = $finalmercado[0]['name'];
$simobolo = $finalmercado[0]['symbol'];
$rank = $finalmercado[0]['rank'];
$valorusd = $finalmercado[0]['price_usd'];
$valorbtc = $finalmercado[0]['price_btc'];
$volume = $finalmercado[0]['24h_volume_usd'];
$porcentagem1 = $finalmercado[0]['percent_change_1h'];
$porcentagem24h = $finalmercado[0]['percent_change_24h'];
$porcentagem7d = $finalmercado[0]['percent_change_7d'];


      sendMessage("sendMessage", array('reply' => true, 'parse_mode' => HTML, 'chat_id' => $chat_id, "text" => 'Nome: ' . $nome . "\r\n"
		. 'Simbolo: ' . $simobolo . "\r\n"
		. 'Rank: ' . $rank . "\r\n"
      . 'Ultimo Valor: $ ' . $valorusd . "\r\n"
      . 'Valor BTC : ' . $valorbtc . "\r\n"
      . 'Mudança Ultima hora: ' . $porcentagem1 . "%" . "\r\n"
      . '24 horas: ' . $porcentagem24h . "%" . "\r\n"
      . 'Ultimos 7 dias: ' . $porcentagem7d . "%" . "\r\n"
      . 'Volume 24h: ' . $volume . "\r\n"

      ));

    }
    
}
}

 //manda a mensagem
function sendMessage($method, $parameters) {
  $options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode($parameters),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);

$context  = stream_context_create( $options );
file_get_contents(API_URL.$method, false, $context );
}

$update_response = file_get_contents("php://input");

$update = json_decode($update_response, true);

if (isset($update["message"])) {
  processMessage($update["message"]);
}

?>
