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
 * @version    2.1.3
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2018, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Cartalyst\Stripe\Tests\Api;

use Cartalyst\Stripe\Tests\FunctionalTestCase;

class SourcesTest extends FunctionalTestCase
{
    /** @test */
    public function a_source_can_be_created()
    {
        $source = $this->stripe->sources()->create([
            'type'     => 'ach_credit_transfer',
            'currency' => 'usd',
            'owner'    => [
                'email' => 'john@doe.com',
            ],
        ]);

        $this->assertSame('john@doe.com', $source['owner']['email']);

        return $source['id'];
    }

    /**
     * @test
     * @depends a_source_can_be_created
     */
    public function a_source_can_be_found($sourceId)
    {
        $source = $this->stripe->sources()->find($sourceId);

        $this->assertSame('john@doe.com', $source['owner']['email']);
    }

    /**
     * @test
     * @depends a_source_can_be_created
     */
    public function a_source_can_be_updated($sourceId)
    {
        $source = $this->stripe->sources()->update($sourceId, [
            'metadata' => [
                'orderId' => 123456789,
            ],
        ]);

        $this->assertSame('123456789', $source['metadata']['orderId']);
    }
}