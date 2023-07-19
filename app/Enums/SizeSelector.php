<?php


namespace App\Enums;



enum SizeSelector: string
{
    case A1 = ['S'];
    case A2 = ['M'];
    case A3 = ['L'];
    case A4 = ['XL'];
    case A5 = ['XXL'];
    case B1 = ['S','M'];
    case B2 = ['S','L'];
    case B3 = ['S','XL'];
    case B4 = ['S','XXL'];
    case C1 = ['M','L'];
    case C2 = ['M','XL'];
    case C3 = ['M','XXL'];
    case D1 = ['L','XL'];
    case D2 = ['L','XXL'];
    case E1 = ['XL','XXL'];
    case F1 = ['S','M','L'];
    case F2 = ['S','L','XL'];
    case F3 = ['S','XL','XXL'];
    case G1 = ['M','L','XL'];
    case G2 = ['M','XL','XXL'];
    case H1 = ['L','XL','XXL'];
    case All = ['S','M','L','XL','XXL'];

    public static function getSizes()
    {
        return [
            self::A1, self::A2, self::A3, self::A4, self::A5,self::B1,self::B2,self::B3,self::B4,self::C1,self::C2,self::C3,self::D1,self::D2,self::E1,self::F1,self::F2,self::F3,self::G1,self::G2,self::H1,self::All
        ];
    }
}