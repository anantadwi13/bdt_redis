# apt update
# apt install -y htop nano

cp ./redis.conf /etc/redis.conf
cp ./sentinel.conf /etc/sentinel.conf

mkdir -p /var/log/redis

# Setting up redis & sentinel
sed -i "s/.*bind 127.0.0.1.*/bind ${IP}/" /etc/redis.conf
sed -i "s/.*port 6379.*/port ${PORT}/" /etc/redis.conf

if ! [ ${MASTER} -eq 1 ]; then 
    sed -i "s/.*#slaveof 10.52.209.46 6379.*/slaveof ${MASTER_IP} ${MASTER_PORT}/" /etc/redis.conf
    sed -i "s/.*sentinel monitor mymaster 127.0.0.1 6379 2.*/sentinel monitor ${CLUSTER_NAME} ${MASTER_IP} ${MASTER_PORT} ${QUORUM}/" /etc/sentinel.conf
else
    sed -i "s/.*sentinel monitor mymaster 127.0.0.1 6379 2.*/sentinel monitor ${CLUSTER_NAME} ${IP} ${PORT} ${QUORUM}/" /etc/sentinel.conf
fi
sed -i "s/.*sentinel down-after-milliseconds mymaster 30000.*/sentinel down-after-milliseconds ${CLUSTER_NAME} 5000/" /etc/sentinel.conf
sed -i "s/.*sentinel parallel-syncs mymaster 1.*/sentinel parallel-syncs ${CLUSTER_NAME} 1/" /etc/sentinel.conf
sed -i "s/.*sentinel failover-timeout mymaster 180000.*/sentinel failover-timeout ${CLUSTER_NAME} 10000/" /etc/sentinel.conf

cd /data
redis-server /etc/redis.conf &
redis-sentinel /etc/sentinel.conf &