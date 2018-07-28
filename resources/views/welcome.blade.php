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
        <div class="flex-center position-ref full-height">

            <div class="content">

                @if ($errors->all())
                    <ul style="color: red;">
                        @foreach ($errors->all() as $message)
                            <li>Error: {{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

              <div class="container">
                <div class="col-md-12 text-center">
                  <br><img width="200" class="align-center" src="ssl.png" alt="SSL">
                </div>

                <div class="col-md-12 text-left">
                  <h2>CSR and Private Key Generator</h2>
                  <p>You can use the form below to easily create a <code>CSR</code> and <code>4096 bit</code> private
                    key to go with it. It is recommended that you run your own version of this project for security.
                    You can find more on the <a href="https://github.com/issetio/csr-generator">project page on Github</a>.</p>
                </div>
              </div>

              <br>
                <form method="post" action="/generate" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-12" role="main">
                                <div class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-5 col-xs-5" for="commonName">Domain:</label>
                                    <div class="col-sm-7 col-xs-7">
                                        <input type="text" class="form-control" id="commonName" name="domain" placeholder="www.website.co.uk" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5 col-xs-5" for="commonName">Confirm Domain:</label>
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
                                        <input type="text" class="form-control" id="localityName" name="city" placeholder="Newcastle under Lyme" required>
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
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" id="Submit">Generate</button>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <footer class="text-center">
                                Built by <a href="https://dor.ky">Scott Robinson</a> &middot; Feedback via <a href="https://github.com/issetio/csr-generator"><img height="50" class="github-img" src="https://assets-cdn.github.com/images/modules/logos_page/GitHub-Mark.png" alt="Github"></a>
                            </footer>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </body>
</html>
