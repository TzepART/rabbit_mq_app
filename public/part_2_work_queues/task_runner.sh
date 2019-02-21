#!/usr/bin/env bash

n=$1;
delay=$2;

for i in `seq 1 $n`
do
    if (($delay > 0))
    then
        delayStr='';
        for d in `seq 1 $delay`
        do
            delayStr="$delayStr.";
        done
        php new_task.php Message $i$delayStr
    else
        php new_task.php Message $i
    fi
done