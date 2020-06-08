var authen = {
  signout(){
    window.localStorage.removeItem(conf.prefix + 'token')
    window.localStorage.removeItem(conf.prefix + 'uid')
    window.localStorage.removeItem(conf.prefix + 'role')
    window.location = conf.domain
  }
}
