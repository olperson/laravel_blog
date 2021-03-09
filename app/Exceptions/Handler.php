<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use MaxMind\Db\Reader;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    //获取用户IP并判断地理位置
    public function realip()
    {
        $reader = new Reader(public_path('lib/GeoLite2-City.mmdb'));
        try {
            $record = $reader->get('59.58.19.72');
            dd($record);//打印结果如下

            //假如要获取时区：
            //$timeZone = $record['location']['time_zone'];
        } catch (Reader\InvalidDatabaseException $e) {
        }
    }
}
