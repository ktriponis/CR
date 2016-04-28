# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "puppetlabs/debian-8.2-32-puppet"

  config.vm.network "private_network", ip: "192.168.16.4"
  config.vm.network "forwarded_port", guest: 80, host: 1234

  config.vm.synced_folder "src", "/var/www/site"

  config.vm.provision "shell", path: "server/modules.sh"

  config.vm.provision :puppet do |puppet|
    puppet.environment = "production"
    puppet.environment_path = "server/environments"
  end
end
