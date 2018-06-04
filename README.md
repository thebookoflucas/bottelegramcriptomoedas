# bottelegramcriptomoedas
Bot para o telegram que traz informações de uma criptomoeda no site coinmaketcap

bot simples em php de uma pagina que traz informações de moedas do site coinmaketcap.com

Crie um bot com o Botfather e pegue a token

Coloque a token no arquivo bot.php, logo no começo onde esta marcado


Agora vamos Ativar seu Bot.
Abra em seu navegador substituindo #token# pelo token e #site# com o endereço completo de onde esta salvo o bot: https://api.telegram.org/bot#token#/setwebhook?url=#site#

lembrando que tem que ter ssl (https://).
Se sua resposta for: {"ok":true,"result":true,"description":"Webhook is way set"}
 

Como usar:

mandar mensagem para o bot:

/top10

recebe as 10 primeiras moedas no coinmarketcap com o valor em dolar e a mudança percentual na ultima hora.

/btc

recebe informações do Bitcoin como valor em dolar, reais, mudança na ultima hora, ultimas 24 horas e ultimos 7 dias

/moeda + nome da moeda

exemplo: /moeda ethereum, /moeda ripple, /moeda dogecoin, /moeda smartcash

recebe informações da moeda como valor em dolar, valor em BTC, mudança na ultima hora, ultimas 24 horas e ultimos 7 dias
