#!/bin/bash

DOCKS="numerical_dashboard"
ENV=`cat .env | grep NETWORK | cut -d= -f2`
NET=`docker network ls | grep  $ENV | cut -d" " -f1`

#docker network ls | grep $ENV


        echo -e "\e[91m  ****|| ATTENTION ||****  \n REMOVING: \n   - DOCKERS \n   - IMAGES \e[0m "
        echo -e "\e[91m Are you sure to REMOVE ALL ?  [yYoO] or [nN] \e[0m"
       read  reponse
        case $reponse in
          [yYoO]*) echo "Ok, GO TO DELETE ALL"
                for dock in $DOCKS; do docker kill  $dock; done
                for list in $DOCKS; do docker rm --force $list; done
		echo "delete docker network"
                docker network rm $NET
        ;;
          [nN]*) echo "You're afraid to execute this command, aren't you?"
        exit 0;;
          *) echo "\e[91m INPUT ERROR. The values are: yYoO or nN \e[0m"
                exit 1;;
        esac

