<?php namespace TT\Support;

class Lists 
{
    public static function relationships()
    {
        return [
                ''=>'Select a relationship',
                'Mother'=>'Mother',
                'Father'=>'Father',
                'Sister'=>'Sister',
                'Brother'=>'Brother',
                'Aunt'=>'Aunt',
                'Uncle'=>'Uncle',
                'Grandmother'=>'Grandmother',
                'Grandfather'=>'Grandfather'
                ];
    }

    public static function confirm()
    {
        return [
                ''=>'',
                1=>'Yes',
                0=>'No'
                ];
    }

    public static function experience()
    {
        return [
                ''=>'',
                1=>'Fun',
                0=>'Boring'
                ];
    }

}
