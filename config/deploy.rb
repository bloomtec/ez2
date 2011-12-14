# INITIAL CONFIGURATION
set :application, "ez2.bloomweb.co"
set :export, :remote_cache
set :keep_releases, 5
set :cakephp_app_path, "app"
set :cakephp_core_path, "cake"
#default_run_options[:pty] = true # Para pedir la contraseña de la llave publica de github via consola, sino sale error de llave publica.

# DEPLOYMENT DIRECTORY STRUCTURE
set :deploy_to, "/home/embalao/ez2.bloomweb.co"

# USER & PASSWORD
set :user, 'embalao'
set :password, 'Cobr@Verde'

# ROLES
role :app, "ez2.bloomweb.co"
role :web, "ez2.bloomweb.co"
role :db, "ez2.bloomweb.co", :primary => true

# VERSION TRACKER INFORMATION
set :scm, :git
set :use_sudo, false
set :repository,  "git@github.com:bloomtec/ez2.git"
set :branch, "ez2"

# TASKS
namespace :deploy do
  
  task :start do ; end
  
  task :stop do ; end
  
  task :restart, :roles => :app, :except => { :no_release => true } do
    run "cp /home/embalao/ez2.bloomweb.co/current/. /home/embalao/ez2.bloomweb.co/ -R"
    run "chmod 777 /home/embalao/ez2.bloomweb.co/app/config/database.php"
    run "cp /home/embalao/ez2.bloomweb.co/app/config/database.php.srvr /home/embalao/ez2.bloomweb.co/app/config/database.php"
    run "chmod 777 /home/embalao/ez2.bloomweb.co/app/tmp/ -R"
    run "chmod 777 /home/embalao/ez2.bloomweb.co/app/webroot/img/uploads/ -R"
    run "chmod 777 /home/embalao/ez2.bloomweb.co/app/webroot/files/uploads/ -R"
  end
  
end