<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Advertiser;
use Illuminate\Database\Eloquent\Builder;
use Carbon\carbon;
use App\Mail\AdReminder;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails to who are having ads the next day';

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
     * @return int
     */
    public function handle()
    {
        $advertisers = Advertiser::select('id','email','name')->whereHas('Ads', function (Builder $query){
            $query->whereDay('start_date', Carbon::tomorrow());
        });
        foreach($advertisers->cursor() as $advertiser){
            Mail::to($advertiser->email)->send(new AdReminder($advertiser));
        }
        dd($advertisers->get());

        return 0;
    }
}
