ENV=`cat .env | grep "NETWORK" | cut -d= -f2`
NET=`docker network ls | grep  $ENV | cut -d" " -f1`

docker network ls | grep $ENV

if [ ! $? -eq 0 ]
then
	echo "Network $NET doesn't exist"
	echo "Creation of $NET"
	docker network create --attachable $ENV
else
	echo "$NET exist -->  don't do anything"
fi


