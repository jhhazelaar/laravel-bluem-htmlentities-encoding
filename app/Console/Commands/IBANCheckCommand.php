<?php

namespace App\Console\Commands;

use Bluem\BluemPHP\Bluem;
use Illuminate\Console\Command;
use Bluem\BluemPHP\Responses\ErrorBluemResponse;
use Illuminate\Support\Str;

class IBANCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iban:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bluem IBAN-Name check';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->components->info('IBAN-Name check');

        $config = config('services.bluem');
        $config['test_accessToken'] = $config['accessToken'];
        $config['production_accessToken'] = $config['accessToken'];

        $iban = "NL99ABNA1234012428";
        $name = "Hénk de Vries";
        $debtorReference = "1234";

        $client = new Bluem($config);
        $response = $client->IBANNameCheck(
            $iban,
            $name,
            $debtorReference
        );

        if ($response instanceof ErrorBluemResponse) {
            $this->error($response->Error());

            return false;
        }

        dump($response);

        return Command::SUCCESS;
    }
}
