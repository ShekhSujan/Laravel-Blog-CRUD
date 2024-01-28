<?php

namespace App\Enums;

enum TrashActionEnum: int
{
    case PermanentDelete = 0;
    case Restore = 1;
}
