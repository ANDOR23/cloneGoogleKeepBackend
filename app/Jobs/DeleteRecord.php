<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Note;

class DeleteRecord implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $recordId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($recordId)
    {
        $this->recordId = $recordId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /* sleep(10); 
        Note::destroy($this->recordId); */
        $record = Note::find($this->recordId);
        if ($record) {
            $record->delete();
        }
        #Log::info('Eliminando registro con ID: ' . $this->recordId);

    }
}
