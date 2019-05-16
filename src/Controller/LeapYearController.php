<?php

namespace App\Controller;

use App\Model\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function index(Request $request, $year)
    {
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            $response = new Response('Yep, this is a leap year! '.rand());
        } else {
            $response = new Response('Nope, this is not a leap year.');
        }

        /*$date = date_create_from_format('Y-m-d H:i:s', '2005-10-15 10:00:00');

        $response->setCache([
            'public'        => true,
            'etag'          => 'abcde',
            'last_modified' => $date,
            'max_age'       => 10,
            's_maxage'      => 10,
        ]);*/

        $response->setTtl(10); // cache for 10 seconds

        return $response;
    }
}