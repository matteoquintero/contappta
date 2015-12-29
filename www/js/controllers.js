angular.module('starter.controllers', [])

.controller('DateCtrl', function($scope) {
var date= new Date();
var months=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
var daysOfTheWeek=['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'];
var startDate=new Date(1989, 1, 26);
var endDate=new Date(2024, 1, 26);
var highlights=[
    {
        date: new Date(2015, 12, 12),
        color: '#79BF40',
        textColor: '#79BF40'
    },
    {
        date: new Date(2015, 11, 18)
    },
    {
        date: new Date(2015, 12, 19)
    },
    {
        date: new Date(2015, 12, 20)
    }
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
      console.log(value);
        // your code
    }
};

})

.controller('DashCtrl', function($scope, Notices) {

  $scope.notices = Notices.all();

})

.controller('ChatsCtrl', function($scope, Chats) {
  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //
  //$scope.$on('$ionicView.enter', function(e) {
  //});

  $scope.chats = Chats.all();
  $scope.remove = function(chat) {
    Chats.remove(chat);
  };
})

.controller('DashDetailCtrl', function($scope, $stateParams, Notices) {
  $scope.notice = Notices.get($stateParams.noticeId);
})

.controller('ChatDetailCtrl', function($scope, $stateParams, Chats) {
  $scope.chat = Chats.get($stateParams.chatId);
})

.controller('AccountCtrl', function($scope) {
  $scope.settings = {
    enableFriends: true
  };
});
