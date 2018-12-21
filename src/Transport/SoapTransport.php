<?php

namespace  Plase\Transport;

use SoapClient;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoapTransport implements TransportInterface
{
    private $version;
    private $client;
    private $options;
    private $wsdl;

    public function __construct(String $wsdl, Array $options)
    {
        if (!extension_loaded('soap')) {
            throw new \Exception('SOAP extension is not loaded.');
        }

        $this->setOption($options);
        $this->client = new SoapClient($wsdl, $this->options);
    }

    private function setOption(Array $options)
    {
        $resolver = new OptionsResolver();

        $resolver->setDefined([
            'classmap', 'typemap', 'encoding', 'soap_version',
            'wsdl', 'uri', 'location', 'style', 'use', 'login',
            'password','proxy_host', 'proxy_login', 'proxy_password',
            'local_cert', 'passphrase', 'connection_timeout', 'trace',
            'stream_context', 'cache_wsdl', 'features', 'user_agent',
            'keep_alive', 'ssl_method'
        ]);

        $resolver->setDefaults([
            'soap_version' => SOAP_1_2,
            'encoding' => 'UTF-8',
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
            'cache_wsdl' => WSDL_CACHE_NONE,
        ]);

        $this->options = $resolver->resolve($options);
    }
     
    public function soapClient()
    {
        return $this->client;
    }

    public function get()
    {

    }
    
}