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
        <div class="flex-center position-ref full-height">

            <div class="content">

                @if ($errors->all())
                    <ul style="color: red;">
                        @foreach ($errors->all() as $message)
                            <li>Error: {{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="post" action="/generate" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3" role="main">
                                <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-5 col-xs-5" for="commonName">Domain:</label>
                                    <div class="col-sm-7 col-xs-7">
                                        <input type="text" class="form-control" id="commonName" name="domain" placeholder="www.website.co.uk" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5 col-xs-5" for="commonName">Confirmation of Domain:</label>
                                    <div class="col-sm-7 col-xs-7">
                                        <input type="text" class="form-control" id="commonName" name="domain_confirmation" placeholder="www.website.co.uk" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5 col-xs-5" for="organizationName">Company:</label>
                                    <div class="col-sm-7 col-xs-7">
                                        <input type="text" class="form-control" id="organizationName" name="organization" placeholder="My Company Ltd" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5 col-xs-5" for="localityName">City:</label>
                                    <div class="col-sm-7 col-xs-7">
                                        <input type="text" class="form-control" id="localityName" name="city" placeholder="Newcasttle under Lyme" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5 col-xs-5" for="stateOrProvinceName">State:</label>
                                    <div class="col-sm-7 col-xs-7">
                                        <input type="text" class="form-control" id="stateOrProvinceName" name="state" placeholder="Staffordshire" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5 col-xs-5" for="emailAddress">Email:</label>
                                    <div class="col-sm-7 col-xs-7">
                                        <input type="text" class="form-control" id="emailAddress" name="email" placeholder="you@email.com" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5 col-xs-5" for="countryName">Country:</label>
                                    <div class="col-sm-7 col-xs-7">
                                        <input type="text" class="form-control" id="countryName" name="country" placeholder="GB" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" id="Submit">Submit</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>
