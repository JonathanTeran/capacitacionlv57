<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\CountBookByUser;
class SendCountBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:countbook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia correo que cuenta la cantidad de libros';

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
        $users=\App\User::with('books')->get();
       
        foreach($users as $user){
            $price=0;
            if(is_array($user->book)){
            foreach($user->book as $book){
                $price+=$book->price;
            }}
            Mail::to($user)->send(new CountBookByUser($price));

        }
    }
}
