Exec { path => ['/bin/', '/sbin/', '/usr/bin/', '/usr/sbin/'] }

exec { 'apt-update':
  command => 'apt-get update'
}

Exec['apt-update'] -> Package <| |>

class { 'apache':
  mpm_module    => 'prefork',
  default_vhost => false,
}

apache::vhost { 'cr.softneta.com':
  port    => '80',
  docroot => '/var/www/site',
}

include apache::mod::php
