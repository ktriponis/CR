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

class { 'apache::mod::php':
  before => File['/etc/php5/apache2/conf.d/20-include.ini']
}

file { '/etc/php5/apache2/conf.d/20-include.ini':
  ensure  => file,
  content => "include_path = /usr/share/composer\n"
}
