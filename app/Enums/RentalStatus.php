<?php

namespace App\Enums;

enum RentalStatus: string
{
    case pending = "pending";
    case rented = "rented";
    case returned = "returned";
    case paid = "paid";
    case unpaid = "unpaid";


//    public function toString(): string
//    {
//        return match ($this) {
//            self::pending => "pending",
//            self::rented => "rented",
//            self::returned => "returned",
//            self::paid => "paid",
//            self::unpaid => "unpaid",
//        };
//    }

}
