<?php

/*
 * The MIT License
 *
 * Copyright (c) 2010 Johannes Mueller <circus2(at)web.de>
 * Copyright (c) 2012-2024 Toha <tohenk@yahoo.com>
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

namespace MwbExporter\Buffer;

use Traversable;

class Buffer implements \ArrayAccess, \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    protected $lines = [];

    /**
     * @var string
     */
    protected $eol = "\n";

    /**
     * Get buffer content.
     *
     * @return array
     */
    public function getAll()
    {
        return $this->lines;
    }

    /**
     * Clear buffer content.
     *
     * @return \MwbExporter\Buffer\Buffer
     */
    public function clear()
    {
        $this->lines = [];

        return $this;
    }

    /**
     * Set EOL delimeter.
     *
     * @param string $eol  The EOL delimeter
     * @return \MwbExporter\Buffer\Buffer
     */
    public function setEol($eol)
    {
        $this->eol = $eol;

        return $this;
    }

    /**
     * Get EOL delimeter.
     *
     * @return string
     */
    public function getEol()
    {
        return $this->eol;
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->lines);
    }

    public function offsetGet($offset): mixed
    {
        if ($this->offsetExists($offset)) {
            return $this->lines[$offset];
        }
        return null;
    }

    public function offsetSet($offset, $value): void
    {
        if (null === $offset) {
            $this->lines[] = $value;
        } else {
            $this->lines[$offset] = $value;
        }
    }

    public function offsetUnset($offset): void
    {
        unset($this->lines[$offset]);
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->lines);
    }

    public function count(): int
    {
        return count($this->lines);
    }

    public function __toString()
    {
        return implode($this->eol, $this->lines);
    }
}
