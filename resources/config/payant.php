<?php

/*
 * This file is part of the Laravel Payant package.
 *
 * (c) Emmanuel Awotunde <awotunde.emmanuel1@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /**
     * Public Key From Payant Dashboard
     *
     */
    'public_key' => getenv('PAYANT_PUBLIC_KEY'),

    /**
     * Private Key From Payant Dashboard
     *
     */
    'private_key' => getenv('PAYANT_PRIVATE_KEY'),

    /**
     * Whether Payant API URL Is DEMO Or Not
     */
    'isdemo' => getenv('IS_DEMO'),
];
