#!/bin/bash

let count=0;

for f in $(ls ./data.d/*.test); do
 diff -Bw $f  ./data.d/`basename $f .test`.prod > ./data.d/`basename $f .txt.test`.diff;
done

for f in $(ls data.d/*.diff); do
 echo "========================================================";
 echo "FILE:" `basename $f`;
 echo "========================================================";
 if [ -s $f ]; then
     #cat ./data.d/`basename $f .diff`.txt.prod;
     cat $f;
 #echo "--------------------------------------------------------";
 #cat ./data.d/`basename $f .diff`.txt.test;
 else
 count=$((count+1));
 echo "NO ERRORS HERE!";
 fi
done
echo "***************COMPLETED**************";
echo "There are " $count " apps that show no difference";

rm data.d/*.diff

