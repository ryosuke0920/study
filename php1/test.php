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

class Main
{
    public function init()
    {
        $sub = new Sub();
        $this->sep = $sep = "-";

        $sub->loop(function ($index) use ($sep) {
            echo $index . $sep . $this->sep;
        });
    }
}

class Sub
{
    public function loop($func)
    {
        for ($i = 0; $i < 10; $i++) {
            $func($i);
        }
    }
}

$main = new Main();
$main->init();
