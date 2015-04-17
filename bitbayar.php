<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2015 BitBayar
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

function bitbayar_config()
{
    $configarray = array(
        'FriendlyName' => array(
            'Type' => 'System',
            'Value'=>'Bitcoin (BitBayar)'
        ),
        'apiKey' => array(
            'FriendlyName' => 'Token from your bitbayar.com merchant account.',
            'Type'         => 'text'
        )
    );

    return $configarray;
}

/**
 * Returns html form.
 *
 * @param  array  $params
 * @return string
 */
function bitbayar_link($params)
{
    if (false === isset($params) || true === empty($params)) {
        die('[ERROR] In modules/gateways/bitbayar.php::bitbayar_link() function: Missing or invalid $params data.');
    }

    // Invoice Variables
    $invoiceid = $params['invoiceid'];

    // Client Variables
    //~ $firstname = $params['clientdetails']['firstname'];
    //~ $lastname  = $params['clientdetails']['lastname'];
    //~ $email     = $params['clientdetails']['email'];
    //~ $address1  = $params['clientdetails']['address1'];
    //~ $address2  = $params['clientdetails']['address2'];
    //~ $city      = $params['clientdetails']['city'];
    //~ $state     = $params['clientdetails']['state'];
    //~ $postcode  = $params['clientdetails']['postcode'];
    //~ $country   = $params['clientdetails']['country'];
    //~ $phone     = $params['clientdetails']['phonenumber'];

    // System Variables
    $systemurl = $params['systemurl'];

    $post = array(
        'invoice_id'     => $invoiceid,
        'systemURL'     => $systemurl
    );

    $form = '<form action="' . $systemurl . '/modules/gateways/bit-bayar/createinvoice.php" method="POST">';

    foreach ($post as $key => $value) {
        $form .= '<input type="hidden" name="' . $key . '" value = "' . $value . '" />';
    }

    $form .= '<input type="submit" value="' . $params['langpaynow'] . '" />';
    $form .= '</form>';

    return $form;
}