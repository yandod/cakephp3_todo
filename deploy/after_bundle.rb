on_app_master {
  run! "cd #{config.release_path} && ./bin/cake migrations migrate"
}
