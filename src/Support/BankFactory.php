<?php

namespace Plase\Support;

use Plase\Entity\Bank;

class BankFactory
{
    private $collection;

    public function __construct(CollectionInterface $collection)
    {
        $this->collection = new $collection;
    }

    public function makefromList($rawBankList)
    {
        $bankList = $rawBankList->getBankListResult->item;

        foreach ($bankList as $bank) {
            $bank = new Bank($bank->bankCode, $bank->bankName);
            $this->collection->add($bank);
        }

        return $this->collection;
    }

}