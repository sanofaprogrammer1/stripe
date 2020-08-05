<?php

declare(strict_types=1);

/*
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
 * @version    3.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2020, Cartalyst LLC
 * @link       https://cartalyst.com
 */

namespace Cartalyst\Stripe\Api;

use Cartalyst\Stripe\HttpClient\Message\ApiResponse;

class UsageRecords extends AbstractApi
{
    /**
     * Create a usage record.
     *
     * @param string $itemId
     * @param array  $parameters
     *
     * @return \Cartalyst\Stripe\HttpClient\Message\ApiResponse
     */
    public function create(string $itemId, array $parameters): ApiResponse
    {
        return $this->_post("subscription_items/{$itemId}/usage_records", $parameters);
    }

    /**
     * Lists all usage records of a subscription item.
     *
     * @param string $itemId
     * @param array  $parameters
     *
     * @return \Cartalyst\Stripe\HttpClient\Message\ApiResponse
     */
    public function all(string $itemId, array $parameters = []): ApiResponse
    {
        return $this->_get("subscription_items/{$itemId}/usage_record_summaries", $parameters);
    }
}
