<?php


namespace App\Enums;



enum OrderStatus: string
{
    case Unpaid = 'no pagado';
    case Paid = 'pagado';
    case Cancelled = 'cancelado';
    case Shipped = 'enviado';
    case Completed = 'completado';

    public static function getStatuses()
    {
        return [
            self::Paid, self::Unpaid, self::Cancelled, self::Shipped, self::Completed
        ];
    }
}