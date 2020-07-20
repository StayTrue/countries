<?php

namespace App\Jobs;

use App\CountryHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class UpdateCountriesStatistic implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $country;

    /**
     * UpdateCountriesStatistic constructor.
     *
     * @param array $request
     *
     * @return void
     */
    public function __construct(array $request)
    {
        $this->country = $request['country'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $countryKey = CountryHelper::REDIS_KEY . $this->country;

        if (Redis::exists($countryKey)) {
            return Redis::incr($countryKey);
        }

        return Redis::set($countryKey, 1);
    }
}
