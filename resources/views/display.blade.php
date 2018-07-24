<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSR Generator</title>

        <link href="/css/app.css" rel="stylesheet" type="text/css">

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106156366-3"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments)};
          gtag('js', new Date());
          gtag('config', 'UA-106156366-3');
        </script>
    </head>
    <body>
        <div class="content">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <h2>Private Key:</h2>
                    <textarea class="col-md-12 form-control">{{ session("private_key") }}</textarea><br>
                    <a href="/download/key">
                        <br><i class="fa fa-fw fa-2x fa-key"></i><br>
                        Download Private Key
                    </a>
                </div>
                <div class="col-md-5">
                    <h3>CSR:</h3>
                    <textarea class="col-md-12 form-control">{{ session("csr") }}</textarea>
                    <a href="/download/csr">
                        <i class="fa fa-fw fa-2x fa-download"></i><br>
                        Download CSR
                    </a>
                </div>
            </div>
            <div class="row">
                <br>
                To verify, make sure the output of these three commands match:<br>
                <em>You'll likely need to change {{ trim(session()->get('domain')).'-ssl.key' }}.crt to your actual certificate name.</em>
                <br>
                <br>
                <code>
                    openssl x509 -noout -modulus -in {{ trim(session()->get('domain')).'-ssl.key' }}.crt | openssl md5<br>
                    openssl rsa -noout -modulus -in {{ trim(session()->get('domain')).'-ssl.key' }} | openssl md5<br>
                    openssl req -noout -modulus -in {{ trim(session()->get('domain')).'-ssl.csr' }} | openssl md5
                </code>
            </div>
            <div class="row">
                <br>
                <a href="/">
                    <i class="fa fa-fw fa-2x fa-play-circle"></i><br>
                    Create New CSR
                </a>
            </div>
        </div>
    </body>
</html>
