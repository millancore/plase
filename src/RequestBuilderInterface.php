<?php

namespace Plase;

interface RequestBuilderInterface
{
    public function getRawRequest();

    public function request();
}