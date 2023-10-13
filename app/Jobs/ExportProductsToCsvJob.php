<?php

namespace App\Jobs;

use App\Actions\ExportProductsToCsvAction;
use App\Events\CsvReady;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExportProductsToCsvJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected string $uniqId)
    {}

    /**
     * @return void
     * @throws \League\Csv\CannotInsertRecord
     * @throws \League\Csv\Exception
     * @throws \League\Csv\UnavailableStream
     */
    public function handle(): void
    {
        $filePath = (new ExportProductsToCsvAction())->handle($this->uniqId);

        event(new CsvReady($this->uniqId, str_replace(storage_path('app/public'), '/storage', $filePath)));
    }
}
