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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/display', function () {
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
    $csr = openssl_csr_new($dn, $privkey);

    openssl_csr_export($csr, $csr);

    openssl_pkey_export($privkey, $key_private);

    // Show any errors that occurred here
    while (($e = openssl_error_string()) !== false) {
        echo $e."\n";
    }

    session()->put('private_key', $key_private);
    session()->put('csr', $csr);

    return redirect('/display');
});
