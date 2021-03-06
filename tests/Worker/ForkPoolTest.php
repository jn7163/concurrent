<?php
namespace Icicle\Tests\Concurrent\Worker;

use Icicle\Concurrent\Worker\{DefaultPool, WorkerFactory, WorkerFork};

/**
 * @group forking
 * @requires extension pcntl
 */
class ForkPoolTest extends AbstractPoolTest
{
    protected function createPool($min = null, $max = null)
    {
        $factory = $this->getMock(WorkerFactory::class);
        $factory->method('create')->will($this->returnCallback(function () {
            return new WorkerFork();
        }));

        return new DefaultPool($min, $max, $factory);
    }
}
