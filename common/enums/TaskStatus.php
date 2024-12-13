<?php

namespace common\enums;

enum TaskStatus: string
{
    case WAIT = 'waiting';
    case IN_DEV = 'in_dev';
    case CLOSE = 'close';
}
