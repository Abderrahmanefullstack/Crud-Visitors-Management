#!/bin/bash

# Attendre que le service soit prêt
# usage: ./wait-for-it.sh <host>:<port> [timeout] [-- command args]
# Exemple : ./wait-for-it.sh db:3306 -- echo "MySQL is ready!"

TIMEOUT=30
HOST="$1"
PORT="$2"
shift 2
COMMAND="$@"

# Vérifier la connectivité avec le service
until nc -z "$HOST" "$PORT"; do
  echo "Attente de $HOST:$PORT..."
  sleep 1
  ((TIMEOUT--))
  if [ "$TIMEOUT" -le 0 ]; then
    echo "Timeout attendu pour $HOST:$PORT"
    exit 1
  fi
done

echo "$HOST:$PORT est prêt"

# Exécuter la commande spécifiée
exec $COMMAND
