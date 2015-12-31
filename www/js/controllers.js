angular.module('starter.controllers', [])

.filter('trusted', ['$sce', function ($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
}])

.controller('DateCtrl', function($scope,$state,$location) {

  var date= new Date();
  var months=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
  var daysOfTheWeek=['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'];
  var startDate=new Date(1989, 1, 26);
  var endDate=new Date(2024, 1, 26);
  var highlights=[
      {
          date: new Date(2015, 11, 12),
      },
  ];

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

        if (value=="Sat Dec 12 2015 00:00:00 GMT-0500 (COT)") {

        }
      }
  };



})

.controller('DashCtrl', function($scope, Notices) {

  $scope.notices = Notices.all();



})

.controller('ChatsCtrl', function($scope, Chats,$ionicPopup, $timeout) {
  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //
  //$scope.$on('$ionicView.enter', function(e) {
  //});



  $scope.chats = Chats.all();
  $scope.remove = function(chat) {

   var confirmPopup = $ionicPopup.confirm({
     title: 'Confirmar',
     template: 'Esta seguro que desea eliminar este contenido'
   });

   confirmPopup.then(function(res) {
     if(res) {
      Chats.remove(chat);

       console.log('You are sure');
     } else {
       console.log('You are not sure');
     }
   });

  };
})

.controller('DashDetailCtrl', function($scope, $stateParams, Notices) {
  $scope.notice = Notices.get($stateParams.noticeId);

})

.controller('InstituteCtrl', function($scope) {

  $scope.map = { center: { latitude: 45, longitude: -73 }, zoom: 8 }

})


.controller('MagazineCtrl', function($scope) {

  $scope.data = {
    allowScroll : false
  }

})


.controller('ChatDetailCtrl', function($scope, $stateParams, Chats) {
  $scope.chat = Chats.get($stateParams.chatId);
  $scope.messages = Chats.getMessage($stateParams.chatId);

})

.controller('AccountCtrl', function($scope) {
  $scope.settings = {
    enableFriends: true
  };
});
