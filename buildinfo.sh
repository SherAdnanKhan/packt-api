#!/bin/bash

git rev-parse --short HEAD
git rev-parse --abbrev-ref HEAD
git log -1 --format=%cd 