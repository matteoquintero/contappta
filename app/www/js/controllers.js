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
          date: new Date(2016, 0, 20),
      },
      {
          date: new Date(2016, 0, 10),
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


        var date=( ( value.getMonth() + 1 ) + "/" + value.getDate() + "/" + value.getFullYear() );

        console.log(date);

        if (date=="1/20/2016") {

          $state.go("tab.event-detail", {a:1, b:2}, {inherit:false});

        }

        if (date=="1/10/2016") {

          $state.go("tab.event-detail", {a:1, b:2}, {inherit:false});

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

.controller('InstituteCtrl', function($scope, $ionicLoading, $compile) {

      function initialize() {
        var myLatlng = new google.maps.LatLng(4.713719,-74.067697);

        var mapOptions = {
          center: myLatlng,
          zoom: 16,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map"),
            mapOptions);

        //Marker + infowindow + angularjs compiled ng-click
        //var contentString = "<div><a ng-click='clickTest()'>Click me!</a></div>";
        var contentString = "<div>Jardín infantíl Kids World</div>";
        var compiled = $compile(contentString)($scope);

        var infowindow = new google.maps.InfoWindow({
          content: compiled[0]
        });

        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Jardín infantíl Kids World'
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
        });

        $scope.map = map;
      }
      google.maps.event.addDomListener(window, 'load', initialize);

      $scope.centerOnMe = function() {
        if(!$scope.map) {
          return;
        }

        $scope.loading = $ionicLoading.show({
          content: 'Getting current location...',
          showBackdrop: false
        });

        navigator.geolocation.getCurrentPosition(function(pos) {
          $scope.map.setCenter(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));
          $scope.loading.hide();
        }, function(error) {
          alert('Unable to get location: ' + error.message);
        });
      };

      $scope.clickTest = function() {
        alert('Example of infowindow with ng-click')
      };


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

.controller('ChatDetailCtrl', function($scope, $stateParams, Chats) {
  $scope.chat = Chats.get($stateParams.chatId);
  $scope.messages = Chats.getMessage($stateParams.chatId);

})

.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){

    $scope.uploadFile = function(){
        var file = $scope.myFile;
        console.log('file is ' );
        console.dir(file);
        var uploadUrl = "_data";
        fileUpload.uploadFileToUrl(file, uploadUrl);
    };

}])

.controller('AccountCtrl', function($scope) {

});
