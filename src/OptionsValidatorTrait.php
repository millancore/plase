<?php

namespace Plase;

use Symfony\Component\OptionsResolver\OptionsResolver;

trait OptionsValidatorTrait
{
    public function validateData(Array $options, Array $validOptions = [])
    {
        $resolver = new OptionsResolver();

        if (empty($validOptions)) {
            $validOptions = array_keys(get_object_vars($this));    
        }
        
        $resolver->setDefined($validOptions); 
        $resolver->setRequired($validOptions);
        
        return $resolver->resolve($options);
    }
}
