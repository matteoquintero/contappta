angular.module('starter.services', [])

.factory('Notices', function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var notices = [{
    id: 0,
    title: 'Vacaciones recreativas',
    date: 'Noviembre 05, 2018',
    descriptionshort: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones...',
    description: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones donde viviremos una experiencia.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos earum nemo dolorum, optio maiores voluptatibus perspiciatis tenetur doloribus praesentium necessitatibus molestias, autem tempore sit ipsa. Delectus sint magnam illum suscipit.',
    img:'img/notice-0.jpg',
    avatar:'img/mcfly.jpg',
    type:'card-one',
    answer: true
  }, {
    id: 1,
    title: 'Entrega de notas',
    date: 'Noviembre 05, 2018',
    descriptionshort: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones...',
    description: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones donde viviremos una experiencia.',
    img:'img/notice-1.jpg',
    avatar:'img/mcfly.jpg',
    type:'card-two',
    answer: true
  }, {
    id: 2,
    title: 'Profesor nuevo',
    date: 'Noviembre 05, 2018',
    descriptionshort: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones...',
    description: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones donde viviremos una experiencia.',
    img:'img/notice-2.jpg',
    avatar:'img/mcfly.jpg',
    type:'card-one',
    answer: false
  }, {
    id: 3,
    title: 'Vacaciones recreativas',
    date: 'Noviembre 05, 2018',
    descriptionshort: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones...',
    description: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones donde viviremos una experiencia.',
    img:'img/notice-0.jpg',
    avatar:'img/mcfly.jpg',
    type:'card-two',
    answer: false
  }, {
    id: 4,
    title: 'Vacaciones recreativas',
    date: 'Noviembre 05, 2018',
    descriptionshort: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones...',
    description: 'Queremos darle la bienvenida a nuestras actividades de Vacaciones donde viviremos una experiencia.',
    img:'img/notice-0.jpg',
    avatar:'img/mcfly.jpg',
    type:'card-one',
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
    lastText: 'Su hijo reprobo 3 materias',
    face: 'img/ben.png'
  }, {
    id: 1,
    name: 'Andres (Profesor)',
    lastText: 'Su hijo reprobo 3 materias',
    face: 'img/max.png'
  }, {
    id: 2,
    name: 'Mariana (Profesora)',
    lastText: 'Su hijo reprobo 3 materias',
    face: 'img/adam.jpg'
  }, {
    id: 3,
    name: 'Gullermo (Profesor)',
    lastText: 'Su hijo reprobo 3 materias',
    face: 'img/perry.png'
  }, {
    id: 4,
    name: 'Luis (Profesor)',
    lastText: 'Su hijo reprobo 3 materias',
    face: 'img/mike.png'
  }];

  return {
    all: function() {
      return chats;
    },
    remove: function(chat) {
      chats.splice(chats.indexOf(chat), 1);
    },
    get: function(chatId) {
      for (var i = 0; i < chats.length; i++) {
        if (chats[i].id === parseInt(chatId)) {
          return chats[i];
        }
      }
      return null;
    }
  };
});
