var stalkApp = angular.module('stalkApp', []);

stalkApp.filter('songTime',function(){

    return function (s) {
        var ms = s % 1000;
        s = (s - ms) / 1000;
        var secs = s % 60;
        s = (s - secs) / 60;
        var mins = s % 60;

        return mins + ':' + secs;
    };
});

stalkApp.controller('RecentSongs', ['$scope', '$http', function($scope, $http) {
    console.log('started');

    $http.get("http://165.227.45.166/getrecentsong.php")
        .then(function(response) {
            $scope.songs = response.data['items'];
            console.log(response.data);
        })
        .catch(function(data) {
            console.error("OOPS");
        });
}]);

stalkApp.controller('TopSongs', ['$scope', '$http', function($scope, $http) {
    console.log('started');
    var data = $.param({type: "tracks", time_range: "long_term"});
    var config = {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}};

    $http.post("http://165.227.45.166/gettop.php", data, config)
        .then(function(response) {
            $scope.songs = response.data['items'];
            console.log(response.data);
        })
        .catch(function(data) {
            console.error("OOPS");
        });
}]);


stalkApp.controller('TopArtists', ['$scope', '$http', function($scope, $http) {
    console.log('started');
    var data = $.param({type: "artists", time_range: "long_term"});
    var config = {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}};

    $http.post("http://165.227.45.166/gettop.php", data, config)
        .then(function(response) {
            $scope.artists = response.data['items'];
            console.log(response.data);
        })
        .catch(function(data) {
            console.error("OOPS");
        });
}]);