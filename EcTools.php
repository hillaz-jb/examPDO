<?php

class EcTools
{
    public static function dateFormat(string $date = '', string $format = 'Y-m-d'): string
    {
        return (new DateTime($date))->format($format);
    }

    public static function durationFormat(int $duration): string
    {
        $seconds = $duration % 60;
        $min = floor( $duration / 60 );
        if( $min == 0 )
            return $seconds.'s';
        else
            return $min.'min '.$seconds.'s';
    }
}