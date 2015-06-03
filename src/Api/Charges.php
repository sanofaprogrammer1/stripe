<?php

/**
 * Part of the Stripe package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Stripe
 * @version    1.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2015, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Cartalyst\Stripe\Api;

class Charges extends Api
{
    /**
     * Creates a new charge.
     *
     * @param  array  $parameters
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function create(array $parameters = [])
    {
        return $this->_post('charges', $parameters);
    }

    /**
     * Retrieves an existing charge.
     *
     * @param  string  $chargeId
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function find($chargeId)
    {
        return $this->_get("charges/{$chargeId}");
    }

    /**
     * Updates an existing charge.
     *
     * @param  string  $chargeId
     * @param  array  $parameters
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function update($chargeId, array $parameters = [])
    {
        return $this->_post("charges/{$chargeId}", $parameters);
    }

    /**
     * Captures an existing charge.
     *
     * @param  string  $chargeId
     * @param  int  $amount
     * @param  array  $parameters
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function capture($chargeId, $amount = null, array $parameters = [])
    {
        $parameters = array_merge($parameters, array_filter(compact('amount')));

        return $this->_post("charges/{$chargeId}/capture", $parameters);
    }

    /**
     * Lists all charges.
     *
     * @param  array  $parameters
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function all(array $parameters = [])
    {
        return $this->_get('charges', $parameters);
    }
}