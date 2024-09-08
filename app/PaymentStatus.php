<?php

namespace App;

enum PaymentStatus: string
{
    case Success = 'success';
    case Process = 'process';
    case Failed = 'failed';
}
