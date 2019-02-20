#!/usr/bin/env bash

n=$1;

for i in `seq 0 $n`
do
    php new_task.php Message $i
done