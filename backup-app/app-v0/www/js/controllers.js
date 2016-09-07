angular.module('starter.controllers', [])


.controller('InitCtrl', function($state) {

    var appdata={'controller':"http://www.contappta.com/dashboard/application/controller/app/"};
    //var appdata={'controller':"http://localhost:8888/contappta/dashboard/application/controller/app/"};
    localStorage.setItem('app',JSON.stringify(appdata));

    if ( localStorage.getItem('user') !== null ){

      $state.go('tab.dash');

    }else{

      localStorage.removeItem("events");
      localStorage.removeItem('user');
      localStorage.removeItem('devicetoken');
      localStorage.removeItem('idonesignal');
      localStorage.removeItem('institution');
      localStorage.removeItem('photo');
      $state.go('login');

    }

})



.controller('LoginCtrl', function($scope,LoginService, $ionicPopup, $state) {

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

.controller('CloseCtrl', function($state,$timeout,$ionicHistory,$log,$window) {

  localStorage.clear();
  localStorage.removeItem('app');
  localStorage.removeItem("events");
  localStorage.removeItem('user');
  localStorage.removeItem('devicetoken');
  localStorage.removeItem('idonesignal');
  localStorage.removeItem('institution');
  localStorage.removeItem('photo');
  localStorage.clear();

  $timeout(function () {
      $window.localStorage.clear();
      $ionicHistory.clearCache();
      $ionicHistory.clearHistory();
      $log.debug('clearing cache')
      $state.go('init');
  },300);

})

.controller('EventDetailCtrl', function($scope, $stateParams, events) {

  $scope.fechaevento=$stateParams.dateevent;
  events.date($stateParams.dateevent).then(function(response) { $scope.events=response;});


})

.controller('EventIdDetailCtrl', function($scope, $stateParams, events) {
  var user = JSON.parse(localStorage.getItem('user') || '{}');

  events.eventId($stateParams.idEvent).then(function(response) { $scope.events=response; });

  var dataevent={
    user:user["idUsuario"],
    even:$stateParams.idEvent,
  };

  events.view(dataevent).then();
    $scope.doRefresh();

})

.controller('ContactsCtrl', function($scope, users) {

  users.contacts().then(function(response) { $scope.users=response; });

})

.controller('DashCtrl', function($scope, news,perfil) {

  window.plugins.OneSignal.getIds(function(ids) {
    perfil.device(ids.userId,ids.pushToken).then();
  });

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  var institution = JSON.parse(localStorage.getItem('institution') || '{}');

  $scope.institution=institution;

  news.all().then(function(response) { $scope.notices=response; });
    $scope.doRefresh();

})

.controller('TabCtrl', function($scope, $state,$timeout,notifications) {

  $scope.doRefresh = function() {

    $timeout( function() {

      notifications.count().then(function(response) {

          $scope.data = {
            badgeCountNew: response.news,
            badgeCountMessage: response.messages,
            badgeCountEvent: response.events,
            badgeCountMagazine: response.magazines,
            badgeCountRecognition: response.recognitions,
            badgeCountAcount: response.acount
          };

      });

    }, 2000);

  };

  $scope.checkTab = function(place){
    $scope.doRefresh();
    $state.go("tab."+place);
  }

})

.controller('ProfileCtrl', function($scope, $stateParams,$state,perfil) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  console.log(user)
  $scope.name = user["Nombre"] == '' ? "Nombre" : user["nombre"] ;
  $scope.lastname = user["Apellido"] == '' ? "Apellido" : user["apellido"] ;
  $scope.email = user["Correo"] == '' ? "Correo" : user["correo"] ;

  $scope.updateProfile =  function(a){

      var datanew={
        "name":$scope.input.name,
        "lastname":$scope.input.lastname,
        "email":$scope.input.email,
        "password":$scope.input.password,
      };
      perfil.update(datanew).then(function(response) { $state.go("tab.dash"); });
  };


})

.controller('DashDetailCtrl', function($scope, $stateParams,$state, news,respuesta,$cordovaFileTransfer,$cordovaFileOpener2) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');

  news.get($stateParams.noticeId).then(function(response) { $scope.notice=response; });

  $scope.sendMessage =  function(sendMessageForm){
      var datanew={
        response:$scope.input.message,
        user:user["idUsuario"],
        nevv:$stateParams.noticeId
      };
      respuesta.create(datanew).then(function(response) { $state.go("tab.dash"); });
  };

  $scope.downloadFile = function ( mediaDescarga ) {
      var url = "http://www.contappta.com/dashboard/"+mediaDescarga;

      var filename = url.split("/").pop();

      var targetPath = cordova.file.externalRootDirectory +"contappta-files/"+ filename;

      $cordovaFileTransfer.download(url, targetPath, {}, true).then(function (result) {
          console.log('Success');
          $scope.hasil="Descarga completa, el archivo se encuentra en tu SD en una carpeta llamada contappta-files";


          var url = "http://www.contappta.com/dashboard/"+mediaDescarga;

          var filename = url.split("/").pop();

          var targetPath = cordova.file.externalRootDirectory +"contappta-files/"+ filename;

          $cordovaFileOpener2.open(targetPath).then(function() {
              console.log('Success');
          }, function(err) {
              console.log('An error occurred: ' + JSON.stringify(err));
          });

      }, function (error) {
          console.log(error);
          $scope.hasil="Descarga incompleta, intentalo de nuevo mas tarde"
      }, function (progress) {
         $scope.downloadProgress=progress;
      });

  };

  var datanew={
    user:user["idUsuario"],
    nevv:$stateParams.noticeId,
  };

  news.view(datanew).then();
    $scope.doRefresh();

})

.controller('ChatsCtrl', function($scope, chats,$ionicPopup, $timeout,mensaje,$state) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  console.log(user);
  $scope.user=user;

  chats.all().then(function(response) { console.log(response); $scope.chats=response; });

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

.controller('ChatDetailCtrl', function($scope, $stateParams, $state,chats, users,mensaje,$ionicPopup,$cordovaFileTransfer) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  $scope.user=user;
  var app = JSON.parse(localStorage.getItem('app') || '{}');

  chats.get($stateParams.chatId).then(function(response) { $scope.messages=response; });

   $scope.takePhoto = function() {

      navigator.camera.getPicture(onSuccess, onFail,
          {
              sourceType : Camera.PictureSourceType.CAMERA,
              correctOrientation: false,
              quality: 75,
              targetWidth: 200,
              destinationType: Camera.DestinationType.DATA_URL,
              encodingType: Camera.EncodingType.PNG,
              saveToPhotoAlbum:false
          });

      function onSuccess(imageData) {

            var alertPopup = $ionicPopup.alert({
                title: 'Mensaje',
                template: 'Foto cargada envia tu mensaje.'
            });

        localStorage.removeItem('photo');
        localStorage.setItem('photo',imageData);

      }

      function onFail(message) {

      }
  };


  $scope.sendMessage =  function(sendMessageForm){
      var datamessage={
        message:$scope.input.message,
        transmitter:user["idUsuario"],
        reciver:$stateParams.userId,
        conversation:$stateParams.chatId,
        institution:user["idInstitucion"]
      };

        var photo="No";
        if (localStorage.getItem('photo')) { photo="Si"; }

        var imageData="data:image/png;base64,"+localStorage.getItem('photo');
        localStorage.removeItem('photo');

        var server =  app["controller"]+'newmessage.php';
        var trustAllHosts = true;


         var options = {
          'fileKey' :'file',
          'fileName' :'photo',
          'mimeType' :'image/png',
          'httpMethod' :'POST',
          'params':{
            'message': datamessage["message"] ,
            'reciver': datamessage["reciver"] ,
            'transmitter': datamessage["transmitter"] ,
            'conversation': datamessage["conversation"] ,
            'institution': datamessage["institution"],
            'photo': photo
          }
         };

        $cordovaFileTransfer.upload(encodeURI(server), imageData, options, trustAllHosts).then(function(result) {

          $state.go("tab.chats");

          $scope.input.message=null;

          },
          function(err) {
          },
          function (progress) {
        });



  };

  var datamessage={
    reciver:user["idUsuario"],
    conversation:$stateParams.chatId,
  };

  mensaje.view(datamessage).then();

  $scope.doRefresh();


})

.controller('Son', function($scope, $stateParams, users, honors) {

  users.get($stateParams.user).then(function(response) { $scope.user=response;});
  honors.get($stateParams.user).then(function(response) { $scope.honors=response;});

  var datauser={
    son:$stateParams.user,
  };
  users.view(datauser).then();

    $scope.doRefresh();

})

.controller('Institute', function($scope,institutions) {

  var institution = JSON.parse(localStorage.getItem('institution') || '{}');
  $scope.institution=institution;

})

.controller('DataCtrl', function($scope,institutions) {

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  $scope.user=user;

  var institution = JSON.parse(localStorage.getItem('institution') || '{}');
  $scope.institution=institution;

})

.controller('AccountCtrl', function($scope,sons,institutions,events) {

  events.calender();

  sons.all().then(function(response) { $scope.sons=response; });

  var user = JSON.parse(localStorage.getItem('user') || '{}');
  $scope.user=user;

  var institution = JSON.parse(localStorage.getItem('institution') || '{}');
  $scope.institution=institution;

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
  if (localStorage.getItem('events')) {
    var events=JSON.parse(localStorage.getItem('events'));
    for (var i = 0; i < events.length; i++) {
      highlights.push( { date: new Date( events[i].date ) } );
    }
  }

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
      highlights:highlights,
      callback: function(value){

          if (highlights.containsdate(value)) {
            var fechaevento=( ( value.getFullYear() ) + "-" + (value.getMonth() + 1) + "-" + value.getDate() );
            $state.go("tab.event-detail", {dateevent:fechaevento}, {inherit:false});
          }

      }
  };

})

.controller('MagazineCtrl',  function($scope, $stateParams, $ionicSlideBoxDelegate, magazines) {

  magazines.pages($stateParams.magazineId).then(function(response) {
      $scope.magazines=response;
      $ionicSlideBoxDelegate.$getByHandle('image-viewer').update();
  });

    $scope.nextMain = function() {
      $ionicSlideBoxDelegate.$getByHandle('image-viewer').next();
    };

    $scope.previousMain = function() {
      $ionicSlideBoxDelegate.$getByHandle('image-viewer').previous();
    };


    $scope.data = {
      allowScroll : false
    };

  magazines.view($stateParams.magazineId).then();


  }
)



.controller('MagazinesCtrl',  function($scope,  $ionicSlideBoxDelegate, magazines) {

  magazines.all().then(function(response) {
      $scope.magazines=response;
      $ionicSlideBoxDelegate.$getByHandle('image-viewer').update();
  });

    $scope.nextMain = function() {
      $ionicSlideBoxDelegate.$getByHandle('image-viewer').next();
    };

    $scope.previousMain = function() {
      $ionicSlideBoxDelegate.$getByHandle('image-viewer').previous();
    };


    $scope.data = {
      allowScroll : false
    };

  }
)



;
