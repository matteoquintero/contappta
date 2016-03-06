angular.module('starter.controllers', [])

.controller('LoginCtrl', function($scope, LoginService, $ionicPopup, $state) {
    $scope.data = {};
    window.localStorage.clear();
    $scope.login = function() {
        window.localStorage.clear();
        LoginService.loginUser($scope.data.username, $scope.data.password).success(function(data) {
            $state.go('tab.dash');
        }).error(function(data) {
            var alertPopup = $ionicPopup.alert({
                title: 'Inicio fallido',
                template: 'Por favor revisa tus credenciales'
            });
        });
    };

})

.controller('EventDetailCtrl', function($scope, $stateParams, events) {

  $scope.fechaevento=$stateParams.dateevent;
  events.date($stateParams.dateevent).then(function(response) { $scope.events=response;});

})

.controller('EventIdDetailCtrl', function($scope, $stateParams, events) {

  events.eventId($stateParams.idEvent).then(function(response) { $scope.events=response; });

})

.controller('DashCtrl', function($scope, news) {

  news.all().then(function(response) { $scope.notices=response; });

  var user = JSON.parse(window.localStorage['user'] || '{}');
  $scope.user=user;

})

.controller('DashDetailCtrl', function($scope, $stateParams,$state, news,respuesta) {

  var user = JSON.parse(window.localStorage['user'] || '{}');

  news.get($stateParams.noticeId).then(function(response) { $scope.notice=response; });

  $scope.sendMessage =  function(sendMessageForm){
      var datanew={
        response:$scope.input.message,
        user:user["idUsuario"],
        nevv:$stateParams.noticeId
      };
      respuesta.create(datanew).then(function(response) { $state.go("tab.dash"); });
  };

  var datanew={
    user:user["idUsuario"],
    nevv:$stateParams.noticeId,
  };

  news.view(datanew).then();

})

.controller('ChatsCtrl', function($scope, chats,$ionicPopup, $timeout,mensaje,$state) {

  chats.all().then(function(response) { $scope.chats=response; });

  $scope.remove = function(chat) {

   var confirmPopup = $ionicPopup.confirm({
     title: 'Confirmar',
     template: 'Esta seguro que desea eliminar este contenido'
   });

   confirmPopup.then(function(res) {
     if(res) {

      var datamessage={
        conversation:chat.idConversacion,
      };

      mensaje.kill(datamessage).then(function(response) { $state.go("tab.dash"); });

      //chats.remove(chat);

     }
   });

  };
})

.controller('ChatDetailCtrl', function($scope, $stateParams, $state,chats, users,mensaje) {

  var user = JSON.parse(window.localStorage['user'] || '{}');

  chats.get($stateParams.chatId).then(function(response) { $scope.messages=response; });
  users.get($stateParams.userId).then(function(response) { $scope.user=response; });

  $scope.sendMessage =  function(sendMessageForm){
      var datamessage={
        message:$scope.input.message,
        transmitter:user["idUsuario"],
        reciver:$stateParams.userId,
        conversation:$stateParams.chatId,
        institution:user["idInstitucion"]
      };
      mensaje.create(datamessage).then(function(response) { $state.go("tab.chats"); });
  };

  var datamessage={
    reciver:user["idUsuario"],
    conversation:$stateParams.chatId,
  };

  mensaje.view(datamessage).then();

})

.controller('Son', function($scope, $stateParams, users, honors) {

  users.get($stateParams.user).then(function(response) { $scope.user=response;});
  honors.get($stateParams.user).then(function(response) { $scope.honors=response;});

})

.controller('Institute', function($scope,institutions) {
  var user = JSON.parse(window.localStorage['user'] || '{}');
  institutions.get(user["idInstitucion"]).then(function(response) { $scope.institution=response; });

})

.controller('DataCtrl', function($scope,institutions) {

  var user = JSON.parse(window.localStorage['user'] || '{}');
  $scope.user=user;
  institutions.get(user["idInstitucion"]).then(function(response) { $scope.institution=response; });

})

.controller('AccountCtrl', function($scope,sons,institutions) {

  sons.all().then(function(response) { $scope.sons=response; });

  var user = JSON.parse(window.localStorage['user'] || '{}');
  $scope.user=user;
  institutions.get(user["idInstitucion"]).then(function(response) { $scope.institution=response; });

})

.controller('DateCtrl', function($scope,$state,$location,events) {

  Array.prototype.containsdate = function(obj) {
      var i = this.length;
      while (i--) {

          if (this[i]["date"].toString() === obj.toString()) {
              return true;
          }
      }
      return false;
  }

  var date= new Date();
  var months=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
  var daysOfTheWeek=['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'];
  var startDate=new Date(2015, 1, 26);
  var endDate=new Date(2024, 1, 26);
  var highlights=[];
  events.calender().then(function(response) {
    for (var i = 0; i < response.length; i++) {
      var fecha=response[i]["fechaInicio"].split("-");
      highlights.push({date: new Date(parseInt(fecha[0]), (parseInt(fecha[1])-1), parseInt(fecha[2]))})
    }
  });
  console.log("asdasd");

  $scope.onezoneDatepicker = {
      date: date, // MANDATORY
      mondayFirst: true,
      months: months,
      daysOfTheWeek: daysOfTheWeek,
      startDate: startDate,
      endDate: endDate,
      disablePastDays: false,
      disableSwipe: false,
      disableWeekend: false,
      showDatepicker: false,
      showTodayButton: true,
      calendarMode: true,
      hideCancelButton: false,
      hideSetButton: false,
      highlights: highlights,
      callback: function(value){

          if (highlights.containsdate(value)) {
            var fechaevento=( ( value.getFullYear() ) + "-" + (value.getMonth() + 1) + "-" + value.getDate() );
            $state.go("tab.event-detail", {dateevent:fechaevento}, {inherit:false});
          }

      }
  };

})

.controller('MagazineCtrl', ['$scope', '$ionicModal', '$ionicSlideBoxDelegate','magazines', function($scope, $ionicModal, $ionicSlideBoxDelegate, magazines) {

  magazines.all().then(function(response) { $scope.magazines=response; });


    $scope.data = {
      allowScroll : false
    }

    $ionicModal.fromTemplateUrl('image-modal.html', {
      scope: $scope,
      animation: 'slide-in-up'
    }).then(function(modal) {
      $scope.modal = modal;
    });

    $scope.openModal = function(id) {

      magazines.pages(id).then(function(response) {

        var pages=Array();
        for (var i = 0; i < response.length; i++) {

          pages.push({
            'src' : response[i].pagina,
          });
        }

        $scope.aImages=pages;

        $ionicSlideBoxDelegate.slide(0);
        $scope.modal.show();

      });

    };

    $scope.closeModal = function() {
      $scope.modal.hide();
    };

    $scope.$on('$destroy', function() {
      $scope.modal.remove();
    });
    $scope.$on('modal.hide', function() {
    });
    $scope.$on('modal.removed', function() {
    });
    $scope.$on('modal.shown', function() {
    });

    $scope.next = function() {
      $ionicSlideBoxDelegate.next();
    };

    $scope.previous = function() {
      $ionicSlideBoxDelegate.previous();
    };

    $scope.goToSlide = function(index) {
      $scope.modal.show();
      $ionicSlideBoxDelegate.slide(index);
    }
    $scope.slideChanged = function(index) {
      $scope.slideIndex = index;
    };
  }
])

;
