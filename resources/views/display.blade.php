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

            body {
              background-color: #ffffff;
background-image: url("data:image/svg+xml,%3Csvg width='84' height='48' viewBox='0 0 84 48' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h12v6H0V0zm28 8h12v6H28V8zm14-8h12v6H42V0zm14 0h12v6H56V0zm0 8h12v6H56V8zM42 8h12v6H42V8zm0 16h12v6H42v-6zm14-8h12v6H56v-6zm14 0h12v6H70v-6zm0-16h12v6H70V0zM28 32h12v6H28v-6zM14 16h12v6H14v-6zM0 24h12v6H0v-6zm0 8h12v6H0v-6zm14 0h12v6H14v-6zm14 8h12v6H28v-6zm-14 0h12v6H14v-6zm28 0h12v6H42v-6zm14-8h12v6H56v-6zm0-8h12v6H56v-6zm14 8h12v6H70v-6zm0 8h12v6H70v-6zM14 24h12v6H14v-6zm14-8h12v6H28v-6zM14 8h12v6H14V8zM0 8h12v6H0V8z' fill='%2370c836' fill-opacity='0.04' fill-rule='evenodd'/%3E%3C/svg%3E");
            }

        </style>

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
