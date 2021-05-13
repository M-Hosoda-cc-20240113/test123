#!/usr/bin/env bash
git submodule update -i
cp ./sparse-checkout ./.git/modules/app/resources/style_guide/info/
cd app/resources/style_guide
git config core.sparsecheckout true
git read-tree -mu HEAD
