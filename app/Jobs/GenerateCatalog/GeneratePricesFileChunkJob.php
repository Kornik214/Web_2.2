<?php

namespace App\Jobs\GenerateCatalog;

class GeneratePricesFileChunkJob extends AbstractJob
{
    /**
     * @var mixed
     */
    private $chunk;

    /**
     * @var int
     */
    private $fileNum;

    public function __construct($chunk = null, $fileNum = null)
    {
        parent::__construct();

        $this->chunk = $chunk;
        $this->fileNum = $fileNum;
    }
}
