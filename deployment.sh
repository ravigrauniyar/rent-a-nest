#!/bin/bash

# Check if Docker is installed
if ! command -v docker &> /dev/null; then
    echo "Docker is not installed. Please install Docker before running this script."
    exit 1
fi

# Check if Docker Compose is installed
if ! command -v docker-compose &> /dev/null; then
    echo "Docker Compose is not installed. Please install Docker Compose before running this script."
    exit 1
fi

# Stop and remove Docker containers defined in docker-compose.yml
docker-compose down -v

# Check if the image exists before attempting to remove it
if docker image ls | grep -q "rent-a-nest-php"; then
    # Remove the PHP app image
    docker rmi rent-a-nest-php
else
    echo "The 'rent-a-nest-php' image does not exist, so it was not removed."
fi

# Bring the containers back up
docker-compose up -d
