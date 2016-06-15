// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
angular.module('starter', ['ionic','starter.controllers', 'starter.services','starter.directives', 'onezone-datepicker','youtube-embed','ngCordova'])

.run(function($ionicPlatform,$cordovaBadge,notifications,$rootScope, $state, $stateParams) {

 $rootScope.$state = $state;
  $rootScope.$stateParams = $stateParams;

  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);

    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }

    // then override any default you want
    window.plugins.nativepagetransitions.globalOptions.duration = 500;
    window.plugins.nativepagetransitions.globalOptions.iosdelay = 350;
    window.plugins.nativepagetransitions.globalOptions.androiddelay = 350;
    window.plugins.nativepagetransitions.globalOptions.winphonedelay = 350;
    window.plugins.nativepagetransitions.globalOptions.slowdownfactor = 4;
    // these are used for slide left/right only currently
    window.plugins.nativepagetransitions.globalOptions.fixedPixelsTop = 0;
    window.plugins.nativepagetransitions.globalOptions.fixedPixelsBottom = 0;

    var push = PushNotification.init({
        "android": {
            "senderID": "1046886258974",
            "icon": "icon",
            "badge": "true"
        },
        "ios": {
            "alert": "true",
            "badge": "true",
            "sound": "true"
        }
    });

    push.on('registration', function(data) {

      localStorage.setItem("devicetoken",data.registrationId);

    });

    push.on('notification', function(data) {

      var dataone=data.additionalData.dataone;
      switch(data.additionalData.page){

        case 'noticias':
            $state.go("tab.dash-detail", {noticeId:dataone});
        break;

        case 'mensajes':
            $state.go("tab.chat-detail", {chatId:dataone});
        break;

        case 'eventos':
            $state.go("tab.event-id", {idEvent:dataone});
        break;

        case 'reconocimientos':
            $state.go("tab.son", {user:dataone});
        break;

        case 'revistas':
            $state.go("tab.magazine", {magazineId:dataone});
        break;

      }

    });

    push.on('error', function(e) {
    });

    /*notifications.count().then(function(response) {
        var badges=0;
        badges=parseInt(response.news)+parseInt(response.messages)+parseInt(response.events);

        $cordovaBadge.promptForPermission();

        $cordovaBadge.hasPermission().then(function(result) {
            $cordovaBadge.set(badges);
        }, function(error) {
            console.log(error);
        });

    });*/


  });

})

.config(function($stateProvider, $urlRouterProvider,$ionicConfigProvider, $sceDelegateProvider, $httpProvider) {

   $ionicConfigProvider.tabs.position('bottom');
   $ionicConfigProvider.views.maxCache(0);
   $ionicConfigProvider.backButton.text('').icon('ion-ios-arrow-left');
   $ionicConfigProvider.views.transition('none');
   $sceDelegateProvider.resourceUrlWhitelist(['self','https://www.youtube.com/**']);

    $httpProvider.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];


    // Ionic uses AngularUI Router which uses the concept of states
    // Learn more here: https://github.com/angular-ui/ui-router
    // Set up the various states which the app can be in.
    // Each state's controller can be found in controllers.js
    $stateProvider

    // setup an abstract state for the tabs directive

    .state('login', {
        url: '/login',
        templateUrl: 'templates/login.html',
        controller: 'LoginCtrl'
    })

    .state('cerrar', {
        url: '/cerrar',
        controller: 'CloseCtrl'
    })

    .state('init', {
        url: '/init',
        controller: 'InitCtrl'
    })

    .state('tab', {
      url: '/tab',
      abstract: true,
      cache: false,
      templateUrl: 'templates/tabs.html'
    })

    .state('tab.dash', {
      url: '/dash',
      views: {
        'tab-dash': {
            cache: false,
          templateUrl: 'templates/tab-dash.html',
          controller: 'DashCtrl'
        }
      }
    })

    // Each tab has its own nav history stack:

    .state('tab.profile', {
      url: '/profile',
      views: {
        'tab-account': {
            cache: false,
          templateUrl: 'templates/profile.html',
          controller: 'ProfileCtrl'
        }
      }
    })

    .state('tab.calender', {
      url: '/calender',
      views: {
        'tab-account': {
            cache: false,
          templateUrl: 'templates/date.html',
          controller: 'DateCtrl'
        }
      }
    })

    .state('tab.dash-detail', {
      url: '/dash-detail',
      params:{noticeId:null},
      views: {
        'tab-dash': {
          cache: false,
          templateUrl: 'templates/dash-detail.html',
          controller: 'DashDetailCtrl',

        }
      },
    })

    .state('tab.event-detail', {
      url: '/event-detail',
      params:{dateevent:null},
      views: {
        'tab-account': {
          cache: false,
          templateUrl: 'templates/event-detail.html',
          controller: 'EventDetailCtrl'
        }
      }
    })

    .state('tab.event-id', {
      url: '/event-id',
      params:{idEvent:null},
      views: {
        'tab-account': {
          cache: false,
          templateUrl: 'templates/event-id.html',
          controller: 'EventIdDetailCtrl'
        }
      }
    })

    .state('tab.chats', {
        url: '/chats',
        views: {
          'tab-chats': {
              cache: false,
            templateUrl: 'templates/tab-chats.html',
            controller: 'ChatsCtrl'
          }
        }
    })

    .state('tab.contacts', {
        url: '/contacts',
        views: {
          'tab-chats': {
              cache: false,
            templateUrl: 'templates/contacts.html',
            controller: 'ContactsCtrl'
          }
        }
    })

    .state('tab.chat-detail', {
      url: '/chat-detail',
      params:{chatId:null},
      views: {
        'tab-chats': {
            cache: false,
          templateUrl: 'templates/chat-detail.html',
          controller: 'ChatDetailCtrl'
        }
      }
    })

    .state('tab.institute', {
      url: '/institute',
      views: {
        'tab-account': {
            cache: false,
          templateUrl: 'templates/institute.html',
          controller: 'Institute'
        }
      }
    })

    .state('tab.son', {
      url: '/son',
      params:{user:null},
      views: {
        'tab-account': {
            cache: false,
            templateUrl: 'templates/son.html',
            controller: 'Son'
        }
      }
    })

    .state('tab.magazines', {
      url: '/magazines',
      views: {
        'tab-account': {
            cache: false,
          templateUrl: 'templates/magazines.html',
          controller: 'MagazinesCtrl'
        }
      }
    })

    .state('tab.magazine', {
      url: '/magazines',
      params:{magazineId:null},
      views: {
        'tab-account': {
            cache: false,
          templateUrl: 'templates/magazine.html',
          controller: 'MagazineCtrl'
        }
      }
    })


    .state('tab.account', {
      url: '/account',
      views: {
        'tab-account': {
            cache: false,
          templateUrl: 'templates/tab-account.html',
          controller: 'AccountCtrl'
        }
      }
    });

    // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/init');
});
