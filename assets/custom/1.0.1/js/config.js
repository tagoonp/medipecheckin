var conf = {
    domain: 'http://localhost/medipecheckin/',
    api : 'http://localhost/medipecheckin/controller/',
    prefix: 'mdcaw_',
    current_version: '1.0.1',
    os: 'web'
}

var current_user = window.localStorage.getItem(conf.prefix + 'uid')
var current_role = window.localStorage.getItem(conf.prefix + 'role')
var current_session = window.localStorage.getItem(conf.prefix + 'session')
