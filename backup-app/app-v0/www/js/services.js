angular.module('starter.services', [])

.service('LoginService', function($q,$http) {

    var app = JSON.parse(localStorage.getItem('app') || '{}');
    return {
        loginUser: function(name, pw) {
            var deferred = $q.defer();
            var promise = deferred.promise;

            var req = {
             method: 'POST',
             url: app["controller"]+'login.php',
             headers: {
               'Content-Type': ' application/json '
             },
             params: {
              'user': name,
              password: pw,
              devicetoken:localStorage.getItem('devicetoken'),
              idonesignal:localStorage.getItem('idonesignal')
              }
            };

            $http(req).then(function (response) {

              if (response.data[0]===true) {

                  localStorage.setItem('user',JSON.stringify(response.data[1]));
                  localStorage.setItem('institution',JSON.stringify(response.data[2]));

                  deferred.resolve();
              } else { deferred.reject(); }

            });

            promise.success = function(fn) {
                promise.then(fn);
                return promise;
            }
            promise.error = function(fn) {
                promise.then(null, fn);
                return promise;
            }
            return promise;
        }
    }
})

.service('notifications', function($http,$rootScope) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  var app = JSON.parse(localStorage.getItem('app') || '{}');
  var idUser=user["idUsuario"];
  console.log(user,"noti");

  var notifications = {
    count: function() {

      var req = {
       method: 'POST',
       url: app["controller"]+'notifications.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        'user':idUser
        }
      };
      var promise = $http(req).then(function (response) {
        $rootScope.$broadcast('noti');
        return response.data;
      });
      return promise;
    }
  };
  return notifications;
})

.service('news', function($http) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  var app = JSON.parse(localStorage.getItem('app') || '{}');
  var idUser=user["idUsuario"];

  var news = {
    all: function() {

      var req = {
       method: 'POST',
       url: app["controller"]+'news.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        reciver:idUser,
        mode:"news"
        }
      };
      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data;
          }
      });
      return promise;
    },
    get: function(id) {

      var req = {
       method: 'POST',
       url: app["controller"]+'news.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        nevv: id,
        mode:"new"
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data[0];
          }
      });
      return promise;
    },
    view: function(datanew) {

      var req = {
       method: 'POST',
       url: app["controller"]+'new.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        'user': datanew["user"] ,
        nevv: datanew["nevv"]
        }
      };

      return $http(req).then();
    }
  };
  return news;
})

.service('magazines', function($http) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  var app = JSON.parse(localStorage.getItem('app') || '{}');
  var idinstitution=user["idInstitucion"];
  var idUser=user["idUsuario"];

  var magazines = {
    all: function() {

      var req = {
       method: 'POST',
       url: app["controller"]+'magazines.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        institution:idinstitution,
        mode:"magazines"
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data;
          }
      });
      return promise;
    },
    view: function(magazine) {

      var req = {
       method: 'POST',
       url: app["controller"]+'magazines.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        user: idUser,
        magazine: magazine,
        mode:"view"
        }
      };

       return $http(req).then();
    },
    pages: function(id) {

      var req = {
       method: 'POST',
       url: app["controller"]+'magazines.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        magazine: id,
        mode:"pages"
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data;
          }
      });
      return promise;
    }
  };
  return magazines;
})

.service('events', function($http) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  var app = JSON.parse(localStorage.getItem('app') || '{}');
  var idUser=user["idUsuario"];

  var events = {
    calender: function() {

      var req = {
       method: 'POST',
       url: app["controller"]+'events.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        reciver:idUser,
        mode:"app-calender"
        }
      };

      var promise = $http(req).then(function (response) {


          if (response.data[0].data!=false) {

            var dates=[];

            for (var i = 0; i < response.data.length; i++) {
              var fecha=response.data[i]["fechaInicio"].split("-");
              dates.push({date: new Date(parseInt(fecha[0]), (parseInt(fecha[1])-1), parseInt(fecha[2]))});
            }

            localStorage.removeItem("events");
            localStorage.setItem("events", JSON.stringify(dates) );

          }


      });
    },
    date: function(dateevent) {

      var req = {
       method: 'POST',
       url: app["controller"]+'events.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        reciver:idUser,
        dateevent:dateevent,
        mode:"app-date"
        }
      };

      var promise = $http(req).then(function (response) {

          if (response.data[0].data!=false) {
            return response.data;
          }

      });
      return promise;
    },
    eventId: function(even) {

      var req = {
       method: 'POST',
       url: app["controller"]+'events.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        reciver:idUser,
        even:even,
        mode:"app-id"
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0]!=false) {
            return response.data;
          }
      });
      return promise;
    },
    view: function(dataevent) {

      var req = {
       method: 'POST',
       url: app["controller"]+'event.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        'user': dataevent["user"] ,
        even: dataevent["even"]
        }
      };

      return $http(req).then();
    }
  };
  return events;
})

.service('sons', function($http) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  var app = JSON.parse(localStorage.getItem('app') || '{}');
  var idUser=user["idUsuario"];

  var sons = {
    all: function() {

      var req = {
       method: 'POST',
       url: app["controller"]+'sons.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        'user':idUser
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data;
          }
      });
      return promise;
    }
  };
  return sons;
})

.service('honors', function($http) {

  var app = JSON.parse(localStorage.getItem('app') || '{}');

  var honors = {
    get: function(id) {

      var req = {
       method: 'POST',
       url: app["controller"]+'honors.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        'user': id
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data;
          }
      });
      return promise;
    }
  };
  return honors;
})

.service('institutions', function($http) {

  var app = JSON.parse(localStorage.getItem('app') || '{}');
  var institutions = {
    get: function(id) {

      var req = {
       method: 'POST',
       url: app["controller"]+'institutions.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        institution: id
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data;
          }
      });
      return promise;
    }
  };
  return institutions;
})

.service('users', function($http) {

  var app = JSON.parse(localStorage.getItem('app') || '{}');
  var user = JSON.parse(localStorage.getItem('user') || '{}');
  var idUser=user["idUsuario"];

  var users = {
    contacts: function() {

      var req = {
       method: 'POST',
       url: app["controller"]+'users.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        institution: user["idInstitucion"],
        mode: "users",
        'user': idUser
        }
      };

      var promise = $http(req).then(function (response) {
           if (response.data!=false) {
            return response.data;
          }
      });
      return promise;
    },
    view: function(datauser) {

      var req = {
       method: 'POST',
       url: app["controller"]+'users.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        parent: idUser,
        son: datauser["son"],
        mode:"view"
        }
      };

      var promise = $http(req).then(function (response) {
        console.log("asd");
      });
      return promise;
    },
    get: function(id) {

      var req = {
       method: 'POST',
       url: app["controller"]+'users.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        'user': id,
        mode: "user"
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data!=false) {
            return response.data;
          }
      });
      return promise;
    }
  };
  return users;
})

.service('chats', function($http) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  var app = JSON.parse(localStorage.getItem('app') || '{}');
  var idUser=user["idUsuario"];

  var chats = {
    all: function() {

      var req = {
       method: 'POST',
       url: app["controller"]+'chats.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        'user': idUser ,
        mode:"app-all"
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data;
          }
      });
      return promise;
    },
    get: function(id) {

      var req = {
       method: 'POST',
       url: app["controller"]+'messages.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        conversation: id,
        mode:"conversation"
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data;
          }
      });
      return promise;
    },
    remove: function(chats) {
      console.log(chats);
      for( i=chats.length-1; i>=0; i--) {
        console.log(chats[i].field);
          if( chats[i].field == "money") chats.splice(i,1);
      }
    }
  };
  return chats;
})


.service('perfil', function($http) {

  var app = JSON.parse(localStorage.getItem('app') || '{}');

  var user = JSON.parse(localStorage.getItem('user') || '{}');

  var idUser=user["idUsuario"];


  var perfil = {
    update: function(datanew) {

      var req = {
       method: 'POST',
       url: app["controller"]+'perfil.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        "name": datanew["name"] ,
        "lastmane": datanew["lastname"] ,
        "email": datanew["email"],
        "password": datanew["password"],
        "user": idUser,
        }
      };

      return $http(req).then();
    },
    device: function(idonesignal,devicetoken) {
      console.log(idonesignal);
      console.log(devicetoken);
      var req = {
       method: 'POST',
       url: app["controller"]+'device.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        "devicetoken": devicetoken ,
        "idonesignal": idonesignal ,
        "user": idUser,
        }
      };

      return $http(req).then();
    },
  };
  return perfil;
})

.service('respuesta', function($http) {

  var app = JSON.parse(localStorage.getItem('app') || '{}');

  var respuesta = {
    create: function(datanew) {

      var req = {
       method: 'POST',
       url: app["controller"]+'respuesta.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        response: datanew["response"] ,
        'user': datanew["user"] ,
        nevv: datanew["nevv"]
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data;
          }
      });
      return promise;
    },

  };
  return respuesta;
})

.service('mensaje', function($http) {

  var app = JSON.parse(localStorage.getItem('app') || '{}');

  var mensaje = {
    view: function(datamessage) {

      var req = {
       method: 'POST',
       url: app["controller"]+'mensaje.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        reciver: datamessage["reciver"] ,
        conversation: datamessage["conversation"],
        mode:"view"
        }
      };

       return $http(req).then();
    },
    kill: function(datamessage) {

      var req = {
       method: 'POST',
       url: app["controller"]+'mensaje.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        conversation: datamessage["conversation"],
        mode:"remove"
        }
      };

      var promise = $http(req).then(function (response) {
          if (response.data[0].data!=false) {
            return response.data;
          }
      });
      return promise;
    }
  };
  return mensaje;
})

.service('Navigation', function($state) {
  //directly binding events to this context
  this.goNative = function(view, data, direction) {
    $state.go(view, data);
    window.plugins.nativepagetransitions.slide({
        "direction": direction
      },
      function(msg) {
        console.log("success: " + msg)
      }, // called when the animation has finished
      function(msg) {
        alert("error: " + msg)
      } // called in case you pass in weird values
    );
  };
});


