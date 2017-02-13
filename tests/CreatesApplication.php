<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use PHPUnit\Framework\Assert as PHPUnit;
use Illuminate\Foundation\Testing\TestResponse;

trait CreatesApplication {

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();


        TestResponse::macro('assertJsonContains', function (array $data, $negate = false)
        {
            $method = $negate ? 'assertFalse' : 'assertTrue';

            $actual = json_encode(Arr::sortRecursive((array) $this->decodeResponseJson()));

            $data = Arr::sortRecursive($data);

            foreach ($data as $key => $value)
            {
                $expected = json_encode([ $key => $value ]);

                if (Str::startsWith($expected, '{'))
                {
                    $expected = substr($expected, 1);
                }

                if (Str::endsWith($expected, '}'))
                {
                    $expected = substr($expected, 0, - 1);
                }

                $expected = trim($expected);

                PHPUnit::{
                $method}(Str::contains($actual, $expected),
                ($negate ? 'Found unexpected' : 'Unable to find').' JSON fragment'.PHP_EOL."[{$expected}]".PHP_EOL.'within'.PHP_EOL."[{$actual}]."
            );
        }

            return $this;
        });

        return $app;
    }
}
