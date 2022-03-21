<?php

const LF = "\n";

function test1($arg = 1)
{
    echo "arg=${arg}";
    echo LF;
}

test1(null);
test1();
test1('');
test1(0);
