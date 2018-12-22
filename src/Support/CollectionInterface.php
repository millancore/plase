<?php

namespace Plase\Support;

use \Countable;
use \ArrayAccess;
use \IteratorAggregate;

interface CollectionInterface extends ArrayAccess, Countable, IteratorAggregate
{
    
}
