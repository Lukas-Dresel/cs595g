#!/bin/bash

export FLAG=$(cat .flag.txt)
rm .flag.txt
python ./flag_server.py localhost 5001 &
unset FLAG

python ./archive_server.py 0.0.0.0 5000


