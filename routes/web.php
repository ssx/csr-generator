<?php

/*
 * This file is part of ssx/csr-generator
 *
 *  (c) Scott Wilcox <scott@dor.ky>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 */

use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    session()->remove('private_key');
    session()->remove('csr');

    return view('welcome');
});

Route::get('/display', function () {
    if (!session('private_key')) {
        return redirect()->to('/');
    }

    return view('display');
});

Route::post('/generate', function () {
    $validator = Validator::make(request()->all(), [
        'domain'          => 'required|confirmed',
        'organization'    => 'required',
        'city'            => 'required',
        'state'           => 'required',
        'email'           => 'required',
        'country'         => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/')
                ->withErrors($validator)
                ->withInput();
    }

    $dn = [
        'countryName'                 => request()->get('country'),
        'stateOrProvinceName'         => request()->get('state'),
        'localityName'                => request()->get('city'),
        'organizationName'            => request()->get('organization'),
        'commonName'                  => request()->get('domain'),
        'emailAddress'                => request()->get('email'),
    ];

    // Generate a new private (and public) key pair
    $privkey = openssl_pkey_new(['private_key_bits' => 4096]);

    // Generate a certificate signing request
    $csr = openssl_csr_new($dn, $privkey, ['digest_alg' => 'sha256']);

    openssl_csr_export($csr, $csr);

    openssl_pkey_export($privkey, $key_private);

    // Show any errors that occurred here
    while (($e = openssl_error_string()) !== false) {
        error_log($e);
    }

    session()->put('private_key', $key_private);
    session()->put('csr', $csr);
    session()->put('domain', request()->get('domain'));

    return redirect('/display');
});

Route::get('/download/key', function () {
    if (!session('private_key')) {
        abort(400);
    }

    return Response::make(session()->get('private_key'), 200, [
        'Content-type'        => 'text/plain',
        'Content-Disposition' => 'attachment; filename="'.trim(session()->get('domain')).'-ssl.key"',
        'Content-Length'      => strlen(session('private_key')),
    ]);
});

Route::get('/download/csr', function () {
    if (!session('csr')) {
        abort(400);
    }

    return Response::make(session()->get('csr'), 200, [
        'Content-type'        => 'text/plain',
        'Content-Disposition' => 'attachment; filename="'.trim(session()->get('domain')).'-ssl.csr"',
        'Content-Length'      => strlen(session('csr')),
    ]);
});
