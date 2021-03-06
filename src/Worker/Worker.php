<?php
namespace Icicle\Concurrent\Worker;

/**
 * An interface for a parallel worker thread that runs a queue of tasks.
 */
interface Worker
{
    /**
     * Checks if the worker is running.
     *
     * @return bool True if the worker is running, otherwise false.
     */
    public function isRunning(): bool;

    /**
     * Checks if the worker is currently idle.
     *
     * @return bool
     */
    public function isIdle(): bool;

    /**
     * Starts the context execution.
     */
    public function start();

    /**
     * @coroutine
     *
     * Enqueues a task to be executed by the worker.
     *
     * @param Task $task The task to enqueue.
     *
     * @return \Generator
     *
     * @resolve mixed Task return value.
     */
    public function enqueue(Task $task): \Generator;

    /**
     * @coroutine
     *
     * @return \Generator
     *
     * @resolve int Exit code.
     */
    public function shutdown(): \Generator;

    /**
     * Immediately kills the context.
     */
    public function kill();
}
