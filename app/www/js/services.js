angular.module('starter.services', [])

.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .success(function(){
        })
        .error(function(){
        });
    }
}])

.service('LoginService', function($q,$http) {
    return {
        loginUser: function(name, pw) {
            var deferred = $q.defer();
            var promise = deferred.promise;

            var req = {
             method: 'POST',
             url: 'http://localhost/contappta/dashboard/application/controller/app/login.php',
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
                  window.localStorage['idUser'] = response.data[3];
                  window.localStorage['idRol'] = response.data[4];
                  deferred.resolve('Welcome ' + name + '!');
              } else {
                  deferred.reject('Wrong credentials.');
              }

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
})

.factory('news', function($http) {
  var news = {
    all: function() {

      var req = {
       method: 'POST',
       url: 'http://localhost/contappta/dashboard/application/controller/app/news.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        reciver: window.localStorage['idUser'] ,
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
       url: 'http://localhost/contappta/dashboard/application/controller/app/news.php',
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
    }
  };
  return news;
})

.factory('users', function($http) {

  var users = {
    get: function(id) {

      var req = {
       method: 'POST',
       url: 'http://localhost/contappta/dashboard/application/controller/app/users.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        user: id,
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

  var chats = {
    all: function() {

      var req = {
       method: 'POST',
       url: 'http://localhost/contappta/dashboard/application/controller/app/messages.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        reciver: window.localStorage['idUser'] ,
        mode:"transmitters"
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
       url: 'http://localhost/contappta/dashboard/application/controller/app/messages.php',
       headers: {
         'Content-Type': ' application/json '
       },
       params: {
        transmitter: id,
        reciver: window.localStorage['idUser'] ,
        mode:"transmitter"
        }
      };

      var promise = $http(req).then(function (response) {
        return response.data;
      });
      return promise;
    },
    remove: function(chat) {
      chats.splice(chats.indexOf(chat), 1);
    },
    removeMessage: function(chat) {
      chats.splice(chats.indexOf(chat), 1);
    }
  };
  return chats;
});
