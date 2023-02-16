<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\XlsxExport;

class Typicode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $urlTemplate;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->urlTemplate = 'https://jsonplaceholder.typicode.com/photos';
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->get($this->urlTemplate);

        $body = json_decode ($response->body());

        if(!$body){
            return;
        }

        Excel::store(new XlsxExport($body), 'photos'.time().'.xlsx');

        return;
        //
    }
}
