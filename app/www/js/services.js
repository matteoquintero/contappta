angular.module('starter.services', [])


.service('LoginService', function($q,$http) {

    var appdata={'controller':"http://www.contappta.com/application/controller/app/"};
    //var appdata={'controller':"http://localhost/contappta/dashboard/application/controller/app/"};
    window.localStorage['app']=JSON.stringify(appdata);
    var app = JSON.parse(window.localStorage['app'] || '{}');

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
              user: name,
              password: pw
              }
            };

            $http(req).then(function (response) {

              if (response.data[0]===true) {
                  window.localStorage.clear();
                  window.localStorage['app']=JSON.stringify(appdata);
                  window.localStorage['user'] = JSON.stringify(response.data[1]);
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

.factory('news', function($http) {

  var user = JSON.parse(window.localStorage['user'] || '{}');
  var app = JSON.parse(window.localStorage['app'] || '{}');
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
        return response.data;
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
        return response.data[0];
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
        user: datanew["user"] ,
        nevv: datanew["nevv"]
        }
      };

      var promise = $http(req).then(function (response) {
        return response.data;
      });
      return promise;
    }
  };
  return news;
})

.factory('magazines', function($http) {

  var user = JSON.parse(window.localStorage['user'] || '{}');
  var app = JSON.parse(window.localStorage['app'] || '{}');
  var idinstitution=user["idInstitucion"];

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
        return response.data;
      });
      return promise;
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
        return response.data;
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
        user: datanew["user"] ,
        nevv: datanew["nevv"]
        }
      };

      var promise = $http(req).then(function (response) {
        return response.data;
      });
      return promise;
    }
  };
  return magazines;
})

.factory('events', function($http) {

  var user = JSON.parse(window.localStorage['user'] || '{}');
  var app = JSON.parse(window.localStorage['app'] || '{}');
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
        return response.data;
      });
      return promise;
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
        return response.data;
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
        return response.data;
      });
      return promise;
    }
  };
  return events;
})

.factory('sons', function($http) {

  var user = JSON.parse(window.localStorage['user'] || '{}');
  var app = JSON.parse(window.localStorage['app'] || '{}');
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
        user:idUser
        }
      };

      var promise = $http(req).then(function (response) {
        return response.data;
      });
      return promise;
    }
  };
  return sons;
})

.factory('honors', function($http) {

  var app = JSON.parse(window.localStorage['app'] || '{}');

  var honors = {
    get: function(id) {

      var req = {
       method: 'POST',
       url: app["controller"]+'honors.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        user: id
        }
      };

      var promise = $http(req).then(function (response) {
        return response.data;
      });
      return promise;
    }
  };
  return honors;
})

.factory('institutions', function($http) {

  var app = JSON.parse(window.localStorage['app'] || '{}');
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
        return response.data;
      });
      return promise;
    }
  };
  return institutions;
})

.factory('users', function($http) {

  var app = JSON.parse(window.localStorage['app'] || '{}');

  var users = {
    get: function(id) {

      var req = {
       method: 'POST',
       url: app["controller"]+'users.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        user: id
        }
      };

      var promise = $http(req).then(function (response) {
        return response.data;
      });
      return promise;
    }
  };
  return users;
})

.factory('chats', function($http) {

  var user = JSON.parse(window.localStorage['user'] || '{}');
  var app = JSON.parse(window.localStorage['app'] || '{}');
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
        user: idUser ,
        mode:"app-all"
        }
      };

      var promise = $http(req).then(function (response) {
        return response.data;
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
        return response.data;
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

.factory('respuesta', function($http) {

  var app = JSON.parse(window.localStorage['app'] || '{}');

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
        user: datanew["user"] ,
        nevv: datanew["nevv"]
        }
      };

      var promise = $http(req).then(function (response) {
        return response.data;
      });
      return promise;
    },

  };
  return respuesta;
})

.factory('mensaje', function($http) {

  var app = JSON.parse(window.localStorage['app'] || '{}');

  var mensaje = {
    create: function(datamessage) {

      var req = {
       method: 'POST',
       url: app["controller"]+'mensaje.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        message: datamessage["message"] ,
        reciver: datamessage["reciver"] ,
        transmitter: datamessage["transmitter"] ,
        conversation: datamessage["conversation"] ,
        institution: datamessage["institution"],
        mode:"create"
        }
      };

      var promise = $http(req).then(function (response) {
        return response.data;
      });
      return promise;
    },
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

      var promise = $http(req).then(function (response) {
        return response.data;
      });
      return promise;
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
        return response.data;
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
})

.directive('goNative', ['$ionicGesture', '$ionicPlatform', function($ionicGesture, $ionicPlatform) {
  return {
    restrict: 'A',

    link: function(scope, element, attrs) {

      $ionicGesture.on('tap', function(e) {

        var direction = attrs.direction;
        var transitiontype = attrs.transitiontype;

        $ionicPlatform.ready(function() {

          switch (transitiontype) {
            case "slide":
              window.plugins.nativepagetransitions.slide({
                  "direction": direction
                },
                function(msg) {
                  console.log("success: " + msg)
                },
                function(msg) {
                  alert("error: " + msg)
                }
              );
              break;
            case "flip":
              window.plugins.nativepagetransitions.flip({
                  "direction": direction
                },
                function(msg) {
                  console.log("success: " + msg)
                },
                function(msg) {
                  alert("error: " + msg)
                }
              );
              break;

            case "fade":
              window.plugins.nativepagetransitions.fade({

                },
                function(msg) {
                  console.log("success: " + msg)
                },
                function(msg) {
                  alert("error: " + msg)
                }
              );
              break;

            case "drawer":
              window.plugins.nativepagetransitions.drawer({
          "origin"         : direction,
          "action"         : "open"
                },
                function(msg) {
                  console.log("success: " + msg)
                },
                function(msg) {
                  alert("error: " + msg)
                }
              );
              break;

            case "curl":
              window.plugins.nativepagetransitions.curl({
          "direction": direction
                },
                function(msg) {
                  console.log("success: " + msg)
                },
                function(msg) {
                  alert("error: " + msg)
                }
              );
              break;

            default:
              window.plugins.nativepagetransitions.slide({
                  "direction": direction
                },
                function(msg) {
                  console.log("success: " + msg)
                },
                function(msg) {
                  alert("error: " + msg)
                }
              );
          }


        });
      }, element);
    }
  };
}])

.directive('hideTabs', function($rootScope) {
  return {
      restrict: 'A',
      link: function($scope, $el) {
          $rootScope.hideTabs = 'tabs-item-hide';
          $scope.$on('$destroy', function() {
              $rootScope.hideTabs = '';
          });
      }
  };
});


