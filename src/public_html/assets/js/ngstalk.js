var stalkApp = angular.module('stalkApp', ['ngRoute']);

stalkApp.config(function($routeProvider) {
    $routeProvider
        .when("/overall", {
            templateUrl : "http://165.227.45.166/partials/overall.html",
            controller: 'OverallStats'
        })
        .when("/topsongs", {
            templateUrl : "http://165.227.45.166/partials/topsong.html",
            controller : 'TopSongs'
        })
        .when("/recentsongs", {
            templateUrl : "http://165.227.45.166/partials/recentsong.html",
            controller : 'RecentSongs'
        })
        .when("/topartists", {
            templateUrl : "http://165.227.45.166/partials/topartist.html",
            controller : 'TopArtists'
        })
        .otherwise({
            redirect : '/overall'
        });
});

stalkApp.filter("timeago", function () {
    //time: the time
    //local: compared to what time? default: now
    //raw: wheter you want in a format of "5 minutes ago", or "5 minutes"
    return function (time, local, raw) {
        if (!time) return "never";

        if (!local) {
            (local = Date.now())
        }

        if (angular.isDate(time)) {
            time = time.getTime();
        } else if (typeof time === "string") {
            time = new Date(time).getTime();
        }

        if (angular.isDate(local)) {
            local = local.getTime();
        }else if (typeof local === "string") {
            local = new Date(local).getTime();
        }

        if (typeof time !== 'number' || typeof local !== 'number') {
            return;
        }

        var
            offset = Math.abs((local - time) / 1000),
            span = [],
            MINUTE = 60,
            HOUR = 3600,
            DAY = 86400,
            WEEK = 604800,
            MONTH = 2629744,
            YEAR = 31556926,
            DECADE = 315569260;

        if (offset <= MINUTE)              span = [ '', raw ? 'now' : 'less than a minute' ];
        else if (offset < (MINUTE * 60))   span = [ Math.round(Math.abs(offset / MINUTE)), 'min' ];
        else if (offset < (HOUR * 24))     span = [ Math.round(Math.abs(offset / HOUR)), 'hr' ];
        else if (offset < (DAY * 7))       span = [ Math.round(Math.abs(offset / DAY)), 'day' ];
        else if (offset < (WEEK * 52))     span = [ Math.round(Math.abs(offset / WEEK)), 'week' ];
        else if (offset < (YEAR * 10))     span = [ Math.round(Math.abs(offset / YEAR)), 'year' ];
        else if (offset < (DECADE * 100))  span = [ Math.round(Math.abs(offset / DECADE)), 'decade' ];
        else                               span = [ '', 'a long time' ];

        span[1] += (span[0] === 0 || span[0] > 1) ? 's' : '';
        span = span.join(' ');

        if (raw === true) {
            return span;
        }
        return (time <= local) ? span + ' ago' : 'in ' + span;
    }
})

stalkApp.run(function($rootScope) {
    $rootScope.openDetails = function(index){
        if ($rootScope.open === index) {
            $rootScope.open = null;
        } else {
            $rootScope.open = index;
        }
    };
});

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
    var data = $.param({limit: 20});
    var config = {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}};

    $http.post("http://165.227.45.166/getrecentsong.php", data, config)
        .then(function(response) {
            $scope.songs = response.data['items'];
            console.log(response.data);
        })
        .catch(function(data) {
            console.error("OOPS");
        });
}]);

stalkApp.controller('TopSongs', ['$scope', '$http', function($scope, $http) {
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

stalkApp.controller('OverallStats', ['$scope', '$http', function($scope, $http) {
    var data = $.param({type: "tracks", time_range: "long_term", limit: 3});
    var config = {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}};

    $http.post("http://165.227.45.166/gettop.php", data, config)
        .then(function(response) {
            $scope.songs = response.data['items'];
            console.log(response.data);
        })
        .catch(function(data) {
            console.error("OOPS");
        });

    data = $.param({type: "artists", time_range: "long_term", limit: 3});

    $http.post("http://165.227.45.166/gettop.php", data, config)
        .then(function(response) {
            $scope.artists = response.data['items'];
            console.log(response.data);
        })
        .catch(function(data) {
            console.error("OOPS");
        });
}]);


stalkApp.directive('activeLink', function($location) {
    var link = function(scope, element, attrs) {
        scope.$watch(function() { return $location.path(); },
            function(path) {
                var url = element.find('a').attr('href');
                if (url) {
                    url = url.substring(1);
                }
                if ("!"+path == url) {
                    element.addClass("active");
                } else {
                    element.removeClass('active');
                }
            });
    };
    return {
        restrict: 'A',
        link: link
    };
});