<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSR Generator</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <style>
            html, body {
                background-color: #fff;
                color: #000000;
                height: 100vh;
                text-align: center;
            }
            .content {
                margin-top: 5%;
            }
        </style>
    </head>
    <body>        
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    Private Key:<br>
                    <textarea class="col-md-12 form-control" style="height: 600px !important">{{ session("private_key") }}</textarea>                    
                </div>  
                <div class="col-md-6">
                    CSR:<br>
                    <textarea class="col-md-12 form-control" style="height: 600px">{{ session("csr") }}</textarea>
                </div>  
            </div>
            <div class="row">
                <br>
                To Verify:<br>
                <br>
                <code>
                    openssl x509 -noout -modulus -in mydomain.crt | openssl md5<br>
                    openssl rsa -noout -modulus -in mydomain.key | openssl md5<br>
                    openssl req -noout -modulus -in mydomain.csr | openssl md5
                </code>
            </div>
        </div>
    </body>
</html>
