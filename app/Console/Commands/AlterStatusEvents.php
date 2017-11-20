<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AlterStatusEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alter:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Alterar status na data de início do evento';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $to = Carbon::now()->format('Y-m-d H:m:s');
        $from = Carbon::now()->addDay(1)->format('Y-m-d H:m:s');
        Event::where('startDate', '>=', $to)
            ->where('startDate', '<=', $from)
            ->update(['status' => 3]);
    }
}
