
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nome = $_POST ['nome'];
        $email = $_POST ['email'];
        $assunto = $_POST ['assunto'];
        $mensagem = $_POST ['mensagem'];
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "contactme@johnFrontend.com");
        $subject = "Confirmar email";
        $to = new SendGrid\Email(null, "johnfrontend@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá John Michael, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $email<br>Assunto: $assunto<br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = 'SENDGRID_API_KEY';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo $response->statusCode();
        echo $response->headers();
        echo $response->body();
        ?>
    </body>
</html>
