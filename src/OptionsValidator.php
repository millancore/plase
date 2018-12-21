<?php

namespace Plase;

use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionsValidator
{
    public static function resolve(Array $validOptions, Array $options)
    {
        $resolver = new OptionsResolver();
              
        $resolver->setDefined($validOptions); 
        $resolver->setRequired($validOptions);
        
        return $resolver->resolve($options);
    }
}
