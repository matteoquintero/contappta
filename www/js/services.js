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

.factory('Notices', function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var notices = [{
    id: 0,
    title: 'Vacaciones recreativas',
    date: 'Diciembre 12, 2015',
    descriptionshort: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones...',
    description: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones donde viviremos una experiencia.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos earum nemo dolorum, optio maiores voluptatibus perspiciatis tenetur doloribus praesentium necessitatibus molestias, autem tempore sit ipsa. Delectus sint magnam illum suscipit.',
    media:'https://www.youtube.com/embed/OZHmYC2ubU8?rel=0',
    avatar:'img/mcfly.jpg',
    stylecard:'card-one',
    typecard:2,
    answer: false
  }, {
    id: 1,
    title: 'Entrega de notas',
    date: 'Noviembre 05, 2018',
    descriptionshort: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones...',
    description: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones donde viviremos una experiencia.',
    media:'img/notice-1.jpg',
    avatar:'img/mcfly.jpg',
    stylecard:'card-two',
    typecard:1,
    answer: true
  }, {
    id: 2,
    title: 'Profesor nuevo',
    date: 'Noviembre 05, 2018',
    descriptionshort: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones...',
    description: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones donde viviremos una experiencia.',
    media:'img/notice-2.jpg',
    avatar:'img/mcfly.jpg',
    stylecard:'card-one',
    typecard:1,
    answer: false
  }, {
    id: 3,
    title: 'Vacaciones recreativas',
    date: 'Noviembre 05, 2018',
    descriptionshort: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones...',
    description: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones donde viviremos una experiencia.',
    media:'img/notice-0.jpg',
    avatar:'img/mcfly.jpg',
    stylecard:'card-two',
    typecard:1,
    answer: false
  }, {
    id: 4,
    title: 'Vacaciones recreativas',
    date: 'Noviembre 05, 2018',
    descriptionshort: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones...',
    description: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones donde viviremos una experiencia.',
    media:'https://www.youtube.com/embed/OZHmYC2ubU8?rel=0',
    avatar:'img/mcfly.jpg',
    stylecard:'card-one',
    typecard:2,
    answer: true
  }];

  return {
    all: function() {
      return notices;
    },
    remove: function(notice) {
      notices.splice(notices.indexOf(notice), 1);
    },
    get: function(noticeId) {
      for (var i = 0; i < notices.length; i++) {
        if (notices[i].id === parseInt(noticeId)) {
          return notices[i];
        }
      }
      return null;
    }
  };
})

.factory('Chats', function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var chats = [{
    id: 0,
    name: 'Luis (Director)',
    date: "05/01/2016",
    lastText: 'Su hijo reprobo 3 materias',
    face: 'img/ben.png',
    messages:[
    {
      description:"Su hijo reprobo 3 materias las cuales fueron",
      date:"05/01/2016 09:59 am"
    },
    {
      description:"Su hijo ha ganado 4 reconocimiento",
      date:"05/01/2016 07:59 am"
    }
    ]
  }, {
    id: 1,
    name: 'Andres (Profesor)',
    date: "30/12/2015",
    lastText: 'Reunion',
    face: 'img/max.png'
  }, {
    id: 2,
    name: 'Mariana (Profesora)',
    date: "30/11/2015",
    lastText: 'Su hijo',
    face: 'img/adam.jpg',
    messages:[
    {
      description:"Su hijo esta enfermo",
      date:"30/11/2015 07:59 am"
     },
    {
      description:"Su hijo reprobo 3 materias las cuales fueron",
      date:"30/11/2015 07:59 am"
     },
    ]
  }, {
    id: 3,
    name: 'Gullermo (Profesor)',
    date: "30/04/2015",
    lastText: 'No hay clase',
    face: 'img/perry.png'
  }, {
    id: 4,
    name: 'Luis (Profesor)',
    date: "30/04/2014",
    lastText: 'Me despido',
    face: 'img/mike.png'
  }];

  return {
    all: function() {
      return chats;
    },
    remove: function(chat) {
      console.log(chat);
      //chats.splice(chats.indexOf(chat), 1);
    },
    get: function(chatId) {
      for (var i = 0; i < chats.length; i++) {
        if (chats[i].id === parseInt(chatId)) {
          return chats[i];
        }
      }
      return null;
    },
    getMessage: function(chatId) {
      for (var i = 0; i < chats.length; i++) {
        if (chats[i].id === parseInt(chatId)) {
          return chats[i].messages;
        }
      }
      return null;
    },
    removeMessage: function(chat) {
      chats.splice(chats.indexOf(chat), 1);
    }
  };
});
