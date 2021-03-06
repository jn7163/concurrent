<?php
namespace Icicle\Concurrent\Worker;

use Icicle\Loop;

interface Environment extends \ArrayAccess, \Countable
{
    /**
     * @param string $key
     *
     * @return bool
     */
    public function exists(string $key);

    /**
     * @param string $key
     *
     * @return mixed|null Returns null if the key does not exist.
     */
    public function get(string $key);

    /**
     * @param string $key
     * @param mixed $value Using null for the value deletes the key.
     * @param int $ttl Number of seconds until data is automatically deleted. Use 0 for unlimited TTL.
     */
    public function set(string $key, $value, int $ttl = 0);

    /**
     * @param string $key
     */
    public function delete(string $key);

    /**
     * Removes all values.
     */
    public function clear();
}
