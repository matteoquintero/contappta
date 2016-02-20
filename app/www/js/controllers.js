angular.module('starter.controllers', [])

.filter('trusted', ['$sce', function ($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
}])

.controller('LoginCtrl', function($scope, LoginService, $ionicPopup, $state) {
    $scope.data = {};

    $scope.login = function() {
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

.controller('DashDetailCtrl', function($scope, $stateParams, news) {

  news.get($stateParams.noticeId).then(function(response) {  $scope.notice=response; });

})

.controller('ChatsCtrl', function($scope, chats,$ionicPopup, $timeout) {

  chats.all().then(function(response) { $scope.chats=response; });

  $scope.remove = function(chat) {

   var confirmPopup = $ionicPopup.confirm({
     title: 'Confirmar',
     template: 'Esta seguro que desea eliminar este contenido'
   });

   confirmPopup.then(function(res) {
     if(res) {
      chats.remove(chat);

       console.log('You are sure');
     } else {
       console.log('You are not sure');
     }
   });

  };
})

.controller('ChatDetailCtrl', function($scope, $stateParams, chats, users) {

  chats.get($stateParams.chatId).then(function(response) { $scope.messages=response; });
  users.get($stateParams.chatId).then(function(response) { $scope.user=response; });

})

.controller('Son', function($scope, $stateParams, users, honors) {

  users.get($stateParams.user).then(function(response) { $scope.user=response;});
  honors.get($stateParams.user).then(function(response) { $scope.honors=response;});

})

.controller('MagazineCtrl', ['$scope', '$ionicModal', '$ionicSlideBoxDelegate', function ($scope, $ionicModal, $ionicSlideBoxDelegate) {

  $scope.data = {
    allowScroll : false
  }

    $scope.aImages = [{
        'src' : 'data/magazine/file-page1.jpg',
        'msg' : 'Delizar a la izquierda - Tap para salir'
      }, {
        'src' : 'data/magazine/file-page2.jpg',
        'msg' : ''
      }, {
        'src' : 'data/magazine/file-page3.jpg',
        'msg' : ''
      }, {
        'src' : 'data/magazine/file-page4.jpg',
        'msg' : ''
      }, {
        'src' : 'data/magazine/file-page5.jpg',
        'msg' : ''
      }, {
        'src' : 'data/magazine/file-page6.jpg',
        'msg' : ''
    }];

    $ionicModal.fromTemplateUrl('image-modal.html', {
      scope: $scope,
      animation: 'slide-in-up'
    }).then(function(modal) {
      $scope.modal = modal;
    });

    $scope.openModal = function() {
      $ionicSlideBoxDelegate.slide(0);
      $scope.modal.show();
    };

    $scope.closeModal = function() {
      $scope.modal.hide();
    };

    // Cleanup the modal when we're done with it!
    $scope.$on('$destroy', function() {
      $scope.modal.remove();
    });
    // Execute action on hide modal
    $scope.$on('modal.hide', function() {
      // Execute action
    });
    // Execute action on remove modal
    $scope.$on('modal.removed', function() {
      // Execute action
    });
    $scope.$on('modal.shown', function() {
      console.log('Modal is shown!');
    });

    // Call this functions if you need to manually control the slides
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

    // Called each time the slide changes
    $scope.slideChanged = function(index) {
      $scope.slideIndex = index;
    };
  }
])


.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){

    $scope.uploadFile = function(){
        var file = $scope.myFile;
        console.log('file is ' );
        console.dir(file);
        var uploadUrl = "_data";
        fileUpload.uploadFileToUrl(file, uploadUrl);
    };

}])

.controller('Institute', function($scope) {

  var institution = JSON.parse(window.localStorage['institution'] || '{}');
  $scope.institution=institution;

})

.controller('DataCtrl', function($scope) {

  var user = JSON.parse(window.localStorage['user'] || '{}');
  var institution = JSON.parse(window.localStorage['institution'] || '{}');
  $scope.user=user;
  $scope.institution=institution;

})

.controller('AccountCtrl', function($scope,sons) {

  sons.all().then(function(response) { $scope.sons=response; });

  var user = JSON.parse(window.localStorage['user'] || '{}');
  var institution = JSON.parse(window.localStorage['institution'] || '{}');
  $scope.user=user;
  $scope.institution=institution;


});
