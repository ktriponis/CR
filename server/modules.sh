#!/bin/sh

install_module () {
  if [ ! -d "/etc/puppetlabs/code/environments/production/modules/$1" ]; then
    puppet module install $2
  fi
}

install_module apache puppetlabs-apache
