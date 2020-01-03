import './bootstrap';
import 'angular';

var app = angular.module('DeliverX', [],
  ['httpProvider', function ($httpProvider){
    $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
  }]);

app.controller('DeliveryController', ['$scope', '$http', function ($scope, $http){
  $scope.deliveries = [];

   // List tasks
   $scope.loadDeliveries = function () {
     $http.get('/delivery')
       .then(function success(e) {
           $scope.deliveries = e.data.deliveries;
       });
   };
   $scope.loadDeliveries();
}])
