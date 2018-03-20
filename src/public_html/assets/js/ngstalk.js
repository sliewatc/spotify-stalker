var stalkApp = angular.module('stalkApp', ['ngRoute']);

stalkApp.config(function($routeProvider) {
    $routeProvider
        .when("/overall/", {
            templateUrl : "http://stalkify.me/partials/overall.html",
            controller: 'OverallStats'
        })
        .when("/topsongs/:range", {
            templateUrl : "http://stalkify.me/partials/topsong.html",
            controller : 'TopSongs'
        })
        .when("/recentsongs", {
            templateUrl : "http://stalkify.me/partials/recentsong.html",
            controller : 'RecentSongs'
        })
        .when("/topartists/:range", {
            templateUrl : "http://stalkify.me/partials/topartist.html",
            controller : 'TopArtists'
        })
        .otherwise({
            redirect : 'http://stalkify.me/songable.php#!/overall/'
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
});

stalkApp.run(function($rootScope) {
    $rootScope.openDetails = function(index){
        if ($rootScope.open === index) {
            $rootScope.open = null;
        } else {
            $rootScope.open = index;
        }
    };
});

stalkApp.run(function($rootScope) {

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

stalkApp.filter('rangeToStr', function(){
    return function(timeRange) {
        var rangeStr = "";
        if (timeRange == 'long_term') {
            rangeStr = 'All Time';
        } else if (timeRange == 'medium_term') {
            rangeStr = ' Last 6 Months'
        } else if (timeRange == 'short_term') {
            rangeStr = 'Last Months'
        }
        return rangeStr;
    }
});

stalkApp.controller('RecentSongs', ['$scope', '$http', function($scope, $http) {
    var data = $.param({limit: 20});
    var config = {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}};
    var idAr = [];
    var ids = "";
    $http.post("http://stalkify.me/getrecentsong.php", data, config)
        .then(function(response) {
            $scope.songs = response.data['items'];
            var song;
            for (song of $scope.songs) {
                idAr.push(song.track.id);
            }
            ids = idAr.join(",");
            console.log(response.data);

            data = $.param({addstr: ids});
            $http.post("http://stalkify.me/audiofeatures.php", data, config)
                .then(function(response) {
                    var dance = 0;
                    var energy = 0;
                    var valence = 0;
                    var instrument = 0;
                    var acoustic = 0;
                    $scope.features = response.data['audio_features'];
                    console.log(response.data);
                    for (feature of $scope.features) {
                        dance += feature.danceability;
                        energy += feature.energy;
                        valence += feature.valence;
                        instrument += feature.instrumentalness;
                        acoustic += feature.acousticness;
                    }
                    $scope.dance = dance / 20 * 100;
                    $scope.energy = energy / 20 * 100;
                    $scope.valence = valence / 20 * 100;
                    $scope.instrument = instrument / 20 * 100;
                    $scope.acoustic = acoustic / 20 * 100;

                })
                .catch();
        })
        .catch(function(data) {
            $http.get("http://stalkify.me/tokenrefresh.php")
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(data) {
                    window.location.href = 'http://stalkify.me/login.php';
                })
        });

}]);

stalkApp.controller('TopSongs', ['$scope', '$http', '$routeParams', function($scope, $http, $routeParams) {
    $scope.timeRange = $routeParams.range;

    var data = $.param({type: "tracks", time_range: $scope.timeRange});
    var config = {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}};
    var idAr = [];
    var ids = "";

    $http.post("http://stalkify.me/gettop.php", data, config)
        .then(function(response) {
            $scope.songs = response.data['items'];
            console.log(response.data);
            var song;
            var sumPopular = 0;
            for (song of $scope.songs) {
                idAr.push(song.id);
                sumPopular += song.popularity;
            }
            $scope.hipster = 100 - (sumPopular / 20);

            ids = idAr.join(",");
            data = $.param({addstr: ids});
            $http.post("http://stalkify.me/audiofeatures.php", data, config)
                .then(function(response) {
                    var dance = 0;
                    var energy = 0;
                    var valence = 0;
                    var instrument = 0;
                    var acoustic = 0;
                    $scope.features = response.data['audio_features'];
                    console.log(response.data);
                    for (feature of $scope.features) {
                        dance += feature.danceability;
                        energy += feature.energy;
                        valence += feature.valence;
                        instrument += feature.instrumentalness;
                        acoustic += feature.acousticness;
                    }
                    $scope.dance = dance / 20 * 100;
                    $scope.energy = energy / 20 * 100;
                    $scope.valence = valence / 20 * 100;
                    $scope.instrument = instrument / 20 * 100;
                    $scope.acoustic = acoustic / 20 * 100;

                })
                .catch();
        })
        .catch(function(data) {
            $http.get("http://stalkify.me/tokenrefresh.php")
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(data) {
                    window.location.href = 'http://stalkify.me/login.php';
                })
        });
}]);


stalkApp.controller('TopArtists', ['$scope', '$http', '$routeParams', function($scope, $http, $routeParams) {
    $scope.timeRange = $routeParams.range;

    var data = $.param({type: "artists", time_range: $scope.timeRange});
    var config = {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}};

    $http.post("http://stalkify.me/gettop.php", data, config)
        .then(function(response) {
            $scope.artists = response.data['items'];
            var artist;
            var sumPopular = 0;
            for (artist of $scope.artists) {
                sumPopular += artist.popularity;
            }
            $scope.hipster = 100 - (sumPopular / 20);
            console.log(response.data);
        })
        .catch(function(data) {
            $http.get("http://stalkify.me/tokenrefresh.php")
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(data) {
                    window.location.href = 'http://stalkify.me/login.php';
                })
        });
}]);

stalkApp.controller('OverallStats', ['$scope', '$http', function($scope, $http) {
    var data = $.param({type: "tracks", time_range: "long_term", limit: 3});
    var config = {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}};

    $http.post("http://stalkify.me/gettop.php", data, config)
        .then(function(response) {
            $scope.songs = response.data['items'];
            console.log(response.data);
        })
        .catch(function(data) {
            $http.get("http://stalkify.me/tokenrefresh.php")
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(data) {
                    window.location.href = 'http://stalkify.me/login.php';
                })
        });

    data = $.param({type: "artists", time_range: "long_term", limit: 3});

    $http.post("http://stalkify.me/gettop.php", data, config)
        .then(function(response) {
            $scope.artists = response.data['items'];
            console.log(response.data);
        })
        .catch(function(data) {
            console.error("OOPS");
        });
}]);


stalkApp.directive('activeLink', function($location, $rootScope) {
    var link = function(scope, element, attrs) {
        scope.$watch(function() { return $location.path(); },
            function(path) {
                $rootScope.open = null;
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