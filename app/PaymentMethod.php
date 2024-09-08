<?php

namespace App;

enum PaymentMethod: string
{
    case BCA = 'BCA';
    case BRI = 'BRI';
    case BNI = 'BNI';
    case QRIS = 'QRIS';
}
