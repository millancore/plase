<?php

namespace Plase\Value;

class Document
{
    private $document;
    private $documentType;
    private $defaultValidTypes = ['CC, CE, TI, PPN','NIT','SSN'];
    
    public function __construct(String $document, string $documentType)
    {
        $this->setDocument($document);
    }

    private function setDocument($document)
    {
        $this->document = $document;
    }

    private function setDocumentType($documentType)
    {
        if (!in_array($documentType, $this->defaultValidTypes)) {
            throw new \InvalidArgumentException();
        }

        $this->documentType = $documentType;
    }

    public function document()
    {
        return $this->document;
    }

    public function type()
    {
        return $this->documentType;
    }
}
