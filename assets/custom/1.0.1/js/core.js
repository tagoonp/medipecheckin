var core = {
  init(){
    if(current_token == null){
      console.log('Get new token');
      var jxr = $.post(conf.api + 'jwt?get_token=1', function(){}, 'json')
                 .always(function(snap){
                   console.log(snap);
                   if(fnc.json_exist(snap)){
                     snap.forEach(i=>{
                       if(i.status == 'success'){
                         current_token = i.token
                         window.localStorage.setItem(conf.prefix + 'token', i.token)
                         console.log(current_token);
                       }else{
                         current_token = null
                       }
                     })
                   }else{
                     current_token = null
                   }
                 })
    }else{
      console.log('Check token');
      var jxr = $.post(conf.api + 'jwt?check_token=1', {token: current_token, uid: current_user }, function(){}, 'json')
                 .always(function(snap){
                   console.log(snap);
                   if(fnc.json_exist(snap)){
                     snap.forEach(i=>{
                       if(i.status == 'active'){
                         current_token = i.token
                         window.localStorage.setItem(conf.prefix + 'token', i.token)
                       }
                     })
                   }else{
                     current_token = null
                   }
                 })
    }

  }
}

// core.init()

var fnc = {
  json_exist(snap){
    if((snap != '') && (snap.length > 0)){
      return true;
    }else{
      return false;
    }
  }
}
