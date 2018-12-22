<?php

namespace Plase\Support;

class CollectionBank implements CollectionInterface
{
        
    /**
     * An array containing the entries of this collection.
     *
     * @var array
     */
    private $elements;

    /**
     * Initializes a new ArrayCollection.
     *
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    public function toArray()
    {
        return $this->elements;
    }

    public function key()
    {
        return key($this->elements);
    }

    public function next()
    {
        return next($this->elements);
    }

    public function current()
    {
        return current($this->elements);
    }

    public function remove($key)
    {
        if (! isset($this->elements[$key]) && ! array_key_exists($key, $this->elements)) {
            return null;
        }

        $removed = $this->elements[$key];
        unset($this->elements[$key]);

        return $removed;
    }

    public function removeElement($element)
    {
        $key = array_search($element, $this->elements, true);

        if ($key === false) {
            return false;
        }

        unset($this->elements[$key]);

        return true;
    }

    public function offsetExists($offset)
    {
        return $this->containsKey($offset);
    }

    /**
     * Required by interface ArrayAccess.
     *
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Required by interface ArrayAccess.
     *
     */
    public function offsetSet($offset, $value)
    {
        if (! isset($offset)) {
            $this->add($value);
            return;
        }

        $this->set($offset, $value);
    }

    /**
     * Required by interface ArrayAccess.
     *
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    public function containsKey($key)
    {
        return isset($this->elements[$key]) || array_key_exists($key, $this->elements);
    }

    public function get($key)
    {
        if (is_null($this->elements[$key])) {
            return null;
        }
        return $this->elements[$key];
    }


    public function getKeys()
    {
        return array_keys($this->elements);
    }


    public function getValues()
    {
        return array_values($this->elements);
    }

    /**
     * Required by interface Countable.
     *
     */
    public function count()
    {
        return count($this->elements);
    }


    public function set($key, $value)
    {
        $this->elements[$key] = $value;
    }

    public function add($element)
    {
        $this->elements[] = $element;

        return true;
    }


    public function isEmpty()
    {
        return empty($this->elements);
    }

    /**
     * Required by interface IteratorAggregate.
     *
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->elements);
    }

    public function clear()
    {
        $this->elements = [];
    }
}
