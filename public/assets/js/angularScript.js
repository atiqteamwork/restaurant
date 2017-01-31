/**
 * Created by teamwork on 18/07/2016.
 */

var myApp = angular.module('myApp', ['ngRoute', 'ngMap','chart.js','googlechart','mappy','chieffancypants.loadingBar', 'ngAnimate']);


/*-----------------controllers-------------------*/





myApp.controller("gbar", function ($scope) {

    $scope.myChartObject = {};

    $scope.myChartObject.type = "BarChart";

    $scope.onions = [
        {v: "Onions"},
        {v: 3},
    ];

    $scope.myChartObject.data = {"cols": [
        {id: "t", label: "Topping", type: "string"},
        {id: "s", label: "Slices", type: "number"}
    ], "rows": [
        {c: [
            {v: "Mushrooms"},
            {v: 3},
        ]},
        {c: $scope.onions},
        {c: [
            {v: "Olives"},
            {v: 31}
        ]},
        {c: [
            {v: "Zucchini"},
            {v: 1},
        ]},
        {c: [
            {v: "Pepperoni"},
            {v: 2},
        ]}
    ]};

    $scope.myChartObject.options = {
        'title': 'How Much Pizza I Ate Last Night'
    };
});

/*google anotation chart*/
myApp.controller("AnnotationChart", function ($scope) {

    $scope.myChartObject = {};

    $scope.secondRow = [
        {v: new Date(2314, 2, 16)},
        {v: 13},
        {v: 'Lalibertines'},
        {v: 'They are very tall'},
        {v: 25},
        {v: 'Gallantors'},
        {v: 'First Encounter'}
    ];


    $scope.myChartObject.type = "AnnotationChart";

    $scope.myChartObject.data = {"cols": [
        {id: "month", label: "Month", type: "date"},
        {id: "kepler-data", label: "Kepler-22b mission", type: "number"},
        {id: "kepler-annot", label: "Kepler-22b Annotation Title", type: "string"},
        {id: "kepler-annot-body", label: "Kepler-22b Annotation Text", type: "string"},
        {id: "desktop-data", label: "Gliese mission", type: "number"},
        {id: "desktop-annot", label: "Gliese Annotation Title", type: "string"},
        {id: "desktop-annot-body", label: "Gliese Annotaioon Text", type: "string"}
    ], "rows": [
        {c: [
            {v: new Date(2314, 2, 15)},
            {v: 19 },
            {v: 'Lalibertines'},
            {v: 'First encounter'},
            {v: 7},
            {v: undefined},
            {v: undefined}
        ]},
        {c: $scope.secondRow},
        {c: [
            {v: new Date(2314, 2, 17)},
            {v: 0},
            {v: 'Lalibertines'},
            {v: 'All crew lost'},
            {v: 28},
            {v: 'Gallantors'},
            {v: 'Omniscience achieved'}

        ]}
    ]};

    $scope.myChartObject.options = {
        displayAnnotations: true
    };
});


/*google column chart*/
myApp.controller("ColumnChart", function ($scope) {

    $scope.myChartObject = {};

    $scope.myChartObject.type = "ColumnChart";

    $scope.onions = [
        {v: "Onions"},
        {v: 3},
    ];

    $scope.myChartObject.data = {"cols": [
        {id: "t", label: "Topping", type: "string"},
        {id: "s", label: "Slices", type: "number"}
    ], "rows": [
        {c: [
            {v: "Mushrooms"},
            {v: 3},
        ]},
        {c: $scope.onions},
        {c: [
            {v: "Olives"},
            {v: 31}
        ]},
        {c: [
            {v: "Zucchini"},
            {v: 1},
        ]},
        {c: [
            {v: "Pepperoni"},
            {v: 2},
        ]}
    ]};

    $scope.myChartObject.options = {
        'title': 'How Much Pizza I Ate Last Night'
    };
});

/*google guage chart*/
myApp.controller("GGauge", function ($scope) {

    $scope.myChartObject = {};
    $scope.myChartObject.type = "Gauge";

    $scope.myChartObject.options = {
        width: 400,
        height: 120,
        redFrom: 90,
        redTo: 100,
        yellowFrom: 75,
        yellowTo: 90,
        minorTicks: 5
    };

    $scope.myChartObject.data = [
        ['Label', 'Value'],
        ['Memory', 80],
        ['CPU', 55],
        ['Network', 68]
    ];
});

/*google pie chart*/
myApp.controller("GPie", function ($scope) {

    $scope.myChartObject = {};

    $scope.myChartObject.type = "PieChart";

    $scope.onions = [
        {v: "Onions"},
        {v: 3},
    ];

    $scope.myChartObject.data = {"cols": [
        {id: "t", label: "Topping", type: "string"},
        {id: "s", label: "Slices", type: "number"}
    ], "rows": [
        {c: [
            {v: "Mushrooms"},
            {v: 3},
        ]},
        {c: $scope.onions},
        {c: [
            {v: "Olives"},
            {v: 31}
        ]},
        {c: [
            {v: "Zucchini"},
            {v: 1},
        ]},
        {c: [
            {v: "Pepperoni"},
            {v: 2},
        ]}
    ]};

    $scope.myChartObject.options = {
        'title': 'How Much Pizza I Ate Last Night'
    };
});


/*line chart */
myApp.controller("LineCtrl", function ($scope) {

    $scope.labels = ["January", "February", "March", "April", "May", "June", "July"];
    $scope.series = ['Series A', 'Series B'];
    $scope.data = [
        [65, 59, 80, 81, 56, 55, 40],
        [28, 48, 40, 19, 86, 27, 90]
    ];
    $scope.onClick = function (points, evt) {
        console.log(points, evt);
    };
    $scope.datasetOverride = [{ yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' }];
    $scope.options = {
        scales: {
            yAxes: [
                {
                    id: 'y-axis-1',
                    type: 'linear',
                    display: true,
                    position: 'left'
                },
                {
                    id: 'y-axis-2',
                    type: 'linear',
                    display: true,
                    position: 'right'
                }
            ]
        }
    };
});

/*bar chart*/
myApp.controller("BarCtrl", function ($scope) {
    $scope.labels = ['2006', '2007', '2008', '2009', '2010', '2011', '2012'];
    $scope.series = ['Series A', 'Series B'];

    $scope.data = [
        [65, 59, 80, 81, 56, 55, 40],
        [28, 48, 40, 19, 86, 27, 90]
    ];
});

/*pie charts*/
myApp.controller("PieCtrl", function ($scope) {
    $scope.labels = ["Download Sales", "In-Store Sales", "Mail-Order Sales"];
    $scope.data = [300, 500, 100];
});

/*PolarAreaCtrl charts*/
myApp.controller("PolarAreaCtrl", function ($scope) {
    $scope.labels = ["Download Sales", "In-Store Sales", "Mail-Order Sales", "Tele Sales", "Corporate Sales"];
    $scope.data = [300, 500, 100, 40, 120];
});

/*MixedChartCtrl charts*/
myApp.controller("MixedChartCtrl",
    function ($scope) {
        $scope.colors = ['#45b7cd', '#ff6384', '#ff8e72'];

        $scope.labels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $scope.data = [
            [65, -59, 80, 81, -56, 55, -40],
            [28, 48, -40, 19, 86, 27, 90]
        ];
        $scope.datasetOverride = [
            {
                label: "Bar chart",
                borderWidth: 1,
                type: 'bar'
            },
            {
                label: "Line chart",
                borderWidth: 3,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
                type: 'line'
            }
        ];
    });

myApp.controller("mapstyle", function ($scope) {

    $scope.data = {
        'GB': {metric: 4},
        'US': {metric: 40},
        'CN': {metric: 50},
        'DE': {metric: 13},
        'BE': {metric: 32},
        'ES': {metric: 23},
        'IR': {metric: 1},
        'AF': {metric: 13},
        'MR': {metric: 14},
        'FR': {metric: 29},
        'IN': {metric: 3},
        'FI': {metric: 15}
    };

    $scope.mapPathData = window._mapPathData; // defined in _mapdata.js

    $scope.mapDataHumanizeFn = function(val) { return val + " units"; };

    $scope.heatmapColors = ['#FFFF00','#FF0000'];

});


myApp.controller('mainController', function ($scope, NgMap) {
    $scope.homeLink = "index.html";
    NgMap.getMap().then(function(map) {
        console.log(map.getCenter());
        console.log('markers', map.markers);
        console.log('shapes', map.shapes);
        map.setOptions({'scrollwheel': false});
    });




});

myApp.controller('CircleSimpleCtrl', function() {
    var vm = this;
    vm.cities = {
        chicago: {population:2714856, position: [41.878113, -87.629798]},
        newyork: {population:8405837, position: [40.714352, -74.005973]},
        losangeles: {population:3857799, position: [34.052234, -118.243684]},
        vancouver: {population:603502, position: [49.25, -123.1]},
    }
    vm.getRadius = function(num) {
        return Math.sqrt(num) * 100;
    }
});

myApp.controller('loadingbar', function ($scope, $http, $timeout, cfpLoadingBar) {
    $scope.posts = [];
    $scope.section = null;
    $scope.subreddit = null;
    $scope.subreddits = ['cats', 'pics', 'funny', 'gaming', 'AdviceAnimals', 'aww'];

    var getRandomSubreddit = function() {
        var sub = $scope.subreddits[Math.floor(Math.random() * $scope.subreddits.length)];

        // ensure we get a new subreddit each time.
        if (sub == $scope.subreddit) {
            return getRandomSubreddit();
        }

        return sub;
    };

    $scope.fetch = function() {
        $scope.subreddit = getRandomSubreddit();
        $http.jsonp('http://www.reddit.com/r/' + $scope.subreddit + '.json?limit=50&jsonp=JSON_CALLBACK').success(function(data) {
            $scope.posts = data.data.children;
        });
    };

    $scope.start = function() {
        cfpLoadingBar.start();
    };

    $scope.complete = function () {
        cfpLoadingBar.complete();
    }


    // fake the initial load so first time users can see it right away:
    $scope.start();
    $scope.fakeIntro = true;
    $timeout(function() {
        $scope.complete();
        $scope.fakeIntro = false;
    }, 750);

});



/*-----------------Configuration-------------------*/
myApp.config(function ($routeProvider) {

    $routeProvider

        .when('/', {
            templateUrl:'html/dashboard/dashboard.html'
        })
        .when('/dashboard2', {
            templateUrl:'html/dashboard/dashboard2.html'
        })
        .when('/mailbox1', {
            templateUrl:'html/email/mailbox1.html'
        })
        .when('/email-detail', {
            templateUrl:'html/email/email-detail.html'
        })
        .when('/mailbox2', {
            templateUrl:'html/email/mailbox2.html'
        })
        .when('/compose', {
            templateUrl:'html/email/compose.html'
        })
        .when('/alerts', {
            templateUrl:'html/ui-components/alerts.html'
        })
        .when('/buttons', {
            templateUrl:'html/ui-components/buttons.html'
        })
        .when('/animations', {
            templateUrl:'html/ui-components/animations.html'
        })
        .when('/breadcrumbs', {
            templateUrl:'html/ui-components/breadcrumbs.html'
        })
        .when('/color-library', {
            templateUrl:'html/ui-components/color-library.html'
        })
        .when('/icons', {
            templateUrl:'html/ui-components/icons.html'
        })
        .when('/modals', {
            templateUrl:'html/ui-components/modals.html'
        })
        .when('/navbars', {
            templateUrl:'html/ui-components/navbars.html'
        })
        .when('/pagination', {
            templateUrl:'html/ui-components/pagination.html'
        })
        .when('/panels', {
            templateUrl:'html/ui-components/panels.html'
        })
        .when('/progress', {
            templateUrl:'html/ui-components/progress.html'
        })
        .when('/tabs', {
            templateUrl:'html/ui-components/tabs.html'
        })
        .when('/tree-view', {
            templateUrl:'html/ui-components/tree-view.html'
        })
        .when('/typography', {
            templateUrl:'html/ui-components/typography.html'
        })
        .when('/widgets', {
            templateUrl:'html/ui-components/widgets.html'
        })
        .when('/calendar', {
            templateUrl:'html/calendar/calendar.html'
        })
        .when('/dashboard3', {
            templateUrl:'html/ecommerce/dashboard.html'
        })
        .when('/products', {
            templateUrl:'html/ecommerce/products.html'
        })
        .when('/edit-products', {
            templateUrl:'html/ecommerce/edit-products.html'
        })
        .when('/profile', {
            templateUrl:'html/pages/profile.html'
        })
        .when('/pricing', {
            templateUrl:'html/pages/pricing.html'
        })
        .when('/sign-in', {
            templateUrl:'html/pages/sign-in.html'
        })
        .when('/register', {
            templateUrl:'html/pages/register.html'
        })
        .when('/reset-password', {
            templateUrl:'html/pages/reset-password.html'
        })
        .when('/lock-screen', {
            templateUrl:'html/pages/lock-screen.html'
        })
        .when('/about', {
            templateUrl:'html/pages/about.html'
        })
        .when('/contact', {
            templateUrl:'html/pages/contact.html'
        })
        .when('/blog', {
            templateUrl:'html/pages/blog.html'
        })
        .when('/blog-post', {
            templateUrl:'html/pages/blog-post.html'
        })
        .when('/faq', {
            templateUrl:'html/pages/faq.html'
        })
        .when('/invoice', {
            templateUrl:'html/pages/invoice.html'
        })
        .when('/page-404', {
            templateUrl:'html/pages/page-404.html'
        })
        .when('/page-500', {
            templateUrl:'html/pages/page-500.html'
        })
        .when('/gallery', {
            templateUrl:'html/pages/gallery.html'
        })
        .when('/search', {
            templateUrl:'html/search/search.html'
        })
        .when('/basic-form', {
            templateUrl:'html/forms/basic-form.html'
        })
        .when('/advance-form', {
            templateUrl:'html/forms/advance-form.html'
        })

        .when('/form-layout', {
            templateUrl:'html/forms/form-layout.html'
        })

        .when('/form-editor', {
            templateUrl:'html/forms/form-editor.html'
        })
        .when('/validation', {
            templateUrl:'html/forms/validation.html'
        })
        .when('/file-upload', {
            templateUrl:'html/forms/file-upload.html'
        })
        .when('/chartjs', {
            templateUrl:'html/charts/chartjs.html'
        })
        .when('/morris-charts', {
            templateUrl:'html/charts/morris-charts.html'
        })
        .when('/google-charts', {
            templateUrl:'html/charts/google-charts.html'
        })
        .when('/basic-table', {
            templateUrl:'html/table/basic-table.html'
        })
        .when('/advance-table', {
            templateUrl:'html/table/advance-table.html'
        })
        .when('/responsive-table', {
            templateUrl:'html/table/responsive-table.html'
        })
        .when('/google-map', {
            templateUrl:'html/maps/google-map.html'
        })
        .when('/vector-maps', {
            templateUrl:'html/maps/vector-maps.html'
        })
        .when('/contacts', {
            templateUrl:'html/contacts/contacts.html'
        })

        .when('/settings', {
            templateUrl:'html/settings/settings.html'
        })
        .otherwise({redirectTo:'dashboard/dashboard.html'});



});

myApp.config(function(cfpLoadingBarProvider) {
    cfpLoadingBarProvider.includeSpinner = true;
});





/*-----------------Derective-------------------*/

myApp.directive('calendar', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $("#adminCalendar, #adminCalendar2").jqxCalendar({ enableTooltips: true, width: 240, height: 220});

            

            }, 100);
        }
    };
});

myApp.directive('graph', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                var neg_data = [
                    {"period": "2016-07-12", "a": 100},
                    {"period": "2016-07-13", "a": 600},
                    {"period": "2016-07-14", "a": 450},
                    {"period": "2016-07-15", "a": 325},
                    {"period": "2016-07-16", "a": 100},
                    {"period": "2016-07-17", "a": 300},
                    {"period": "2016-07-18", "a": 200},
                    {"period": "2016-07-19", "a": 75},
                    {"period": "2016-07-20", "a": 600}
                ];
                Morris.Line({
                    element: 'graph',
                    data: neg_data,
                    xkey: 'period',
                    ykeys: ['a'],
                    labels: ['Series A'],
                    units: ''
                });

            }, 100);
        }
    };
});
/*morris area*/
myApp.directive('morrisarea', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                var neg_data = [
                    {"period": "2016-07-12", "a": 100},
                    {"period": "2016-07-13", "a": 600},
                    {"period": "2016-07-14", "a": 450},
                    {"period": "2016-07-15", "a": 325},
                    {"period": "2016-07-16", "a": 100},
                    {"period": "2016-07-17", "a": 300},
                    {"period": "2016-07-18", "a": 200},
                    {"period": "2016-07-19", "a": 75},
                    {"period": "2016-07-20", "a": 600}
                ];
                Morris.Area({
                    element: 'area',
                    data: [
                        { y: '2006', a: 100, b: 90 },
                        { y: '2007', a: 75,  b: 65 },
                        { y: '2008', a: 50,  b: 40 },
                        { y: '2009', a: 75,  b: 65 },
                        { y: '2010', a: 50,  b: 40 },
                        { y: '2011', a: 75,  b: 65 },
                        { y: '2012', a: 100, b: 90 }
                    ],
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Series A', 'Series B']
                });

            }, 100);
        }
    };
});

/*morris bars*/
myApp.directive('morrisbars', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                var neg_data = [
                    {"period": "2016-07-12", "a": 100},
                    {"period": "2016-07-13", "a": 600},
                    {"period": "2016-07-14", "a": 450},
                    {"period": "2016-07-15", "a": 325},
                    {"period": "2016-07-16", "a": 100},
                    {"period": "2016-07-17", "a": 300},
                    {"period": "2016-07-18", "a": 200},
                    {"period": "2016-07-19", "a": 75},
                    {"period": "2016-07-20", "a": 600}
                ];
                Morris.Bar({
                    element: 'bars',
                    data: [
                        { y: '2006', a: 100, b: 90 },
                        { y: '2007', a: 75,  b: 65 },
                        { y: '2008', a: 50,  b: 40 },
                        { y: '2009', a: 75,  b: 65 },
                        { y: '2010', a: 50,  b: 40 },
                        { y: '2011', a: 75,  b: 65 },
                        { y: '2012', a: 100, b: 90 }
                    ],
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Series A', 'Series B']
                });

            }, 100);
        }
    };
});

/*morrisDonut charts*/
myApp.directive('morrisdonut', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
               
                Morris.Donut({
                    element: 'Donut',
                    data: [
                        {label: "Download Sales", value: 12},
                        {label: "In-Store Sales", value: 30},
                        {label: "Mail-Order Sales", value: 20}
                    ]
                });


            }, 100);
        }
    };
});



myApp.directive('wow', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                wow = new WOW(
                    {
                        animateClass: 'animated',
                        offset:       100,
                        callback:     function(box) {
                            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                        }
                    }
                );
                wow.init();
                document.getElementById('moar').onclick = function() {
                    var section = document.createElement('section');
                    section.className = 'section--purple wow fadeInDown';
                    this.parentNode.insertBefore(section, this);
                };

            }, 100);
        }
    };
});

myApp.directive('revenue', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                var chartData = [
                    {
                        "date": "2012-01-01",
                        "distance": 227,
                        "townName": "New York",
                        "townName2": "New York",
                        "townSize": 25,
                        "latitude": 40.71,
                        "duration": 408
                    },
                    {
                        "date": "2012-01-02",
                        "distance": 371,
                        "townName": "Washington",
                        "townSize": 14,
                        "latitude": 38.89,
                        "duration": 482
                    },
                    {
                        "date": "2012-01-03",
                        "distance": 433,
                        "townName": "Wilmington",
                        "townSize": 6,
                        "latitude": 34.22,
                        "duration": 562
                    },
                    {
                        "date": "2012-01-04",
                        "distance": 345,
                        "townName": "Jacksonville",
                        "townSize": 7,
                        "latitude": 30.35,
                        "duration": 379
                    },
                    {
                        "date": "2012-01-05",
                        "distance": 480,
                        "townName": "Miami",
                        "townName2": "Miami",
                        "townSize": 10,
                        "latitude": 25.83,
                        "duration": 501
                    },
                    {
                        "date": "2012-01-06",
                        "distance": 386,
                        "townName": "Tallahassee",
                        "townSize": 7,
                        "latitude": 30.46,
                        "duration": 443
                    },
                    {
                        "date": "2012-01-07",
                        "distance": 348,
                        "townName": "New Orleans",
                        "townSize": 10,
                        "latitude": 29.94,
                        "duration": 405
                    },
                    {
                        "date": "2012-01-08",
                        "distance": 238,
                        "townName": "Houston",
                        "townName2": "Houston",
                        "townSize": 16,
                        "latitude": 29.76,
                        "duration": 309
                    },
                    {
                        "date": "2012-01-09",
                        "distance": 218,
                        "townName": "Dalas",
                        "townSize": 17,
                        "latitude": 32.8,
                        "duration": 287
                    },
                    {
                        "date": "2012-01-10",
                        "distance": 349,
                        "townName": "Oklahoma City",
                        "townSize": 11,
                        "latitude": 35.49,
                        "duration": 485
                    },
                    {
                        "date": "2012-01-11",
                        "distance": 603,
                        "townName": "Kansas City",
                        "townSize": 10,
                        "latitude": 39.1,
                        "duration": 890
                    },
                    {
                        "date": "2012-01-12",
                        "distance": 534,
                        "townName": "Denver",
                        "townName2": "Denver",
                        "townSize": 18,
                        "latitude": 39.74,
                        "duration": 810
                    },
                    {
                        "date": "2012-01-13",
                        "townName": "Salt Lake City",
                        "townSize": 12,
                        "distance": 425,
                        "duration": 670,
                        "latitude": 40.75,
                        "dashLength": 8,
                        "alpha":0.4
                    },
                    {
                        "date": "2012-01-14",
                        "latitude": 36.1,
                        "duration": 470,
                        "townName": "Las Vegas",
                        "townName2": "Las Vegas"
                    },
                    {
                        "date": "2012-01-15"
                    },
                    {
                        "date": "2012-01-16"
                    },
                    {
                        "date": "2012-01-17"
                    },
                    {
                        "date": "2012-01-18"
                    },
                    {
                        "date": "2012-01-19"
                    }
                ];
                var chart;

                AmCharts.ready(function () {
                    // SERIAL CHART
                    chart = new AmCharts.AmSerialChart();
                    chart.dataProvider = chartData;
                    chart.categoryField = "date";
                    chart.dataDateFormat = "YYYY-MM-DD";
                    chart.color = "#000000";
                    chart.marginLeft = 0;

                    // AXES
                    // category
                    var categoryAxis = chart.categoryAxis;
                    categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
                    categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
                    categoryAxis.autoGridCount = false;
                    categoryAxis.gridCount = 50;
                    categoryAxis.gridAlpha = 0.1;
                    categoryAxis.gridColor = "#FFFFFF";
                    categoryAxis.axisColor = "#555555";
                    // we want custom date formatting, so we change it in next line
                    categoryAxis.dateFormats = [{
                        period: 'DD',
                        format: 'DD'
                    }, {
                        period: 'WW',
                        format: 'MMM DD'
                    }, {
                        period: 'MM',
                        format: 'MMM'
                    }, {
                        period: 'YYYY',
                        format: 'YYYY'
                    }];

                    // as we have data of different units, we create three different value axes
                    // Distance value axis
                    var distanceAxis = new AmCharts.ValueAxis();
                    distanceAxis.title = "distance";
                    distanceAxis.gridAlpha = 0;
                    distanceAxis.axisAlpha = 0;
                    chart.addValueAxis(distanceAxis);

                    // latitude value axis
                    var latitudeAxis = new AmCharts.ValueAxis();
                    latitudeAxis.gridAlpha = 0;
                    latitudeAxis.axisAlpha = 0;
                    latitudeAxis.labelsEnabled = false;
                    latitudeAxis.position = "right";
                    chart.addValueAxis(latitudeAxis);

                    // duration value axis
                    var durationAxis = new AmCharts.ValueAxis();
                    durationAxis.title = "duration";
                    // the following line makes this value axis to convert values to duration
                    // it tells the axis what duration unit it should use. mm - minute, hh - hour...
                    durationAxis.duration = "mm";
                    durationAxis.durationUnits = {
                        DD: "d. ",
                        hh: "h ",
                        mm: "min",
                        ss: ""
                    };
                    durationAxis.gridAlpha = 0;
                    durationAxis.axisAlpha = 0;
                    durationAxis.inside = true;
                    durationAxis.position = "right";
                    chart.addValueAxis(durationAxis);

                    // GRAPHS
                    // distance graph
                    var distanceGraph = new AmCharts.AmGraph();
                    distanceGraph.valueField = "distance";
                    distanceGraph.title = "distance";
                    distanceGraph.type = "column";
                    distanceGraph.fillAlphas = 0.9;
                    distanceGraph.valueAxis = distanceAxis; // indicate which axis should be used
                    distanceGraph.balloonText = "[[value]] miles";
                    distanceGraph.legendValueText = "[[value]] mi";
                    distanceGraph.legendPeriodValueText = "total: [[value.sum]] mi";
                    distanceGraph.lineColor = "#fe5e3a";
                    distanceGraph.dashLengthField = "dashLength";
                    distanceGraph.alphaField = "alpha";
                    chart.addGraph(distanceGraph);

                    // latitude graph
                    var latitudeGraph = new AmCharts.AmGraph();
                    latitudeGraph.valueField = "latitude";
                    latitudeGraph.title = "latitude/city";
                    latitudeGraph.type = "line";
                    latitudeGraph.valueAxis = latitudeAxis; // indicate which axis should be used
                    latitudeGraph.lineColor = "#786c56";
                    latitudeGraph.lineThickness = 1;
                    latitudeGraph.legendValueText = "[[description]]/[[value]]";
                    latitudeGraph.descriptionField = "townName";
                    latitudeGraph.bullet = "round";
                    latitudeGraph.bulletSizeField = "townSize"; // indicate which field should be used for bullet size
                    latitudeGraph.bulletBorderColor = "#FFFFFF";
                    latitudeGraph.bulletBorderAlpha = 1;
                    latitudeGraph.bulletBorderThickness = 2;
                    latitudeGraph.bulletColor = "#ff9501";
                    latitudeGraph.labelText = "[[townName2]]"; // not all data points has townName2 specified, that's why labels are displayed only near some of the bullets.
                    latitudeGraph.labelPosition = "right";
                    latitudeGraph.balloonText = "latitude:[[value]]";
                    latitudeGraph.showBalloon = true;
                    latitudeGraph.dashLengthField = "dashLength";
                    chart.addGraph(latitudeGraph);

                    // duration graph
                    var durationGraph = new AmCharts.AmGraph();
                    durationGraph.title = "duration";
                    durationGraph.valueField = "duration";
                    durationGraph.type = "line";
                    durationGraph.valueAxis = durationAxis; // indicate which axis should be used
                    durationGraph.lineColor = "#515974";
                    durationGraph.balloonText = "[[value]]";
                    durationGraph.lineThickness = 1;
                    durationGraph.legendValueText = "[[value]]";
                    durationGraph.bullet = "square";
                    durationGraph.bulletBorderColor = "#44495c";
                    durationGraph.bulletBorderThickness = 1;
                    durationGraph.bulletBorderAlpha = 1;
                    durationGraph.dashLengthField = "dashLength";
                    chart.addGraph(durationGraph);

                    // CURSOR
                    var chartCursor = new AmCharts.ChartCursor();
                    chartCursor.zoomable = false;
                    chartCursor.categoryBalloonDateFormat = "DD";
                    chartCursor.cursorAlpha = 0;
                    chartCursor.valueBalloonsEnabled = false;
                    chart.addChartCursor(chartCursor);

                    // LEGEND
                    var legend = new AmCharts.AmLegend();
                    legend.bulletType = "round";
                    legend.equalWidths = false;
                    legend.valueWidth = 120;
                    legend.useGraphSettings = true;
                    legend.color = "#000000";
                    chart.addLegend(legend);

                    // WRITE
                    chart.write("chartdiv");
                });

            }, 100);
        }
    };
});


myApp.directive('sparkline1', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $("#sparkline").sparkline([5,6,7,99,78,75,31,2,82,4,16,7], {
                    type: 'line',
                    width: '70%',
                    height: '80px',
                    lineWidth: 2
                });

            }, 100);
        }
    };
});
myApp.directive('sparkline2', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $("#sparkline2").sparkline([5,6,7,9,9,5,3,2,2,4,6,7 ], {
                    type: 'line',
                    width: '70%',
                    height: '80px',
                    lineColor: '#2dc0e8',
                    fillColor: '#ffffff',
                    lineWidth: 4,
                    spotColor: '#4c5e70',
                    spotRadius: 3.5
                });

            }, 100);
        }
    };
});


/*tree view*/
myApp.directive('tree-view', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                function demo_create() {
                    var ref = $('#jstree_demo').jstree(true),
                        sel = ref.get_selected();
                    if(!sel.length) { return false; }
                    sel = sel[0];
                    sel = ref.create_node(sel, {"type":"file"});
                    if(sel) {
                        ref.edit(sel);
                    }
                };
                function demo_rename() {
                    var ref = $('#jstree_demo').jstree(true),
                        sel = ref.get_selected();
                    if(!sel.length) { return false; }
                    sel = sel[0];
                    ref.edit(sel);
                };
                function demo_delete() {
                    var ref = $('#jstree_demo').jstree(true),
                        sel = ref.get_selected();
                    if(!sel.length) { return false; }
                    ref.delete_node(sel);
                };
                $(function () {
                    var to = false;
                    $('#demo_q').keyup(function () {
                        if(to) { clearTimeout(to); }
                        to = setTimeout(function () {
                            var v = $('#demo_q').val();
                            $('#jstree_demo').jstree(true).search(v);
                        }, 250);
                    });

                    $('#jstree_demo')
                        .jstree({
                            "core" : {
                                "animation" : 0,
                                "check_callback" : true,
                                'force_text' : true,
                                "themes" : { "stripes" : true },
                                'data' : {
                                    'url' : function (node) {
                                        return node.id === '#' ? '/static/3.3.1/assets/ajax_demo_roots.json' : '/static/3.3.1/assets/ajax_demo_children.json';
                                    },
                                    'data' : function (node) {
                                        return { 'id' : node.id };
                                    }
                                }
                            },
                            "types" : {
                                "#" : { "max_children" : 1, "max_depth" : 4, "valid_children" : ["root"] },
                                "root" : { "icon" : "/static/3.3.1/assets/images/tree_icon.png", "valid_children" : ["default"] },
                                "default" : { "valid_children" : ["default","file"] },
                                "file" : { "icon" : "glyphicon glyphicon-file", "valid_children" : [] }
                            },
                            "plugins" : [ "contextmenu", "dnd", "search", "state", "types", "wholerow" ]
                        });
                });

            }, 100);
        }
    };
});

/*full calendar*/
myApp.directive('fullcalendar', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                /* initialize the external events
                 -----------------------------------------------------------------*/

                $('#external-events .fc-event').each(function() {

                    // store data so the calendar knows to render an event upon drop
                    $(this).data('event', {
                        title: $.trim($(this).text()), // use the element's text as the event title
                        stick: true // maintain when user navigates (see docs on the renderEvent method)
                    });

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 999,
                        revert: true,      // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    });

                });


                /* initialize the calendar
                 -----------------------------------------------------------------*/

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },
                    defaultDate: '2015-05-12',
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar
                    eventLimit: true, // allow "more" link when too many events
                    events: [
                        {
                            title: 'All Day Event',
                            start: '2015-05-01',
                            color: '#9c27b0'
                        },
                        {
                            title: 'Long Event',
                            start: '2015-05-03',
                            end: '2015-05-07',
                            color: '#e91e63'
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: '2015-05-09T16:00:00',
                            color: '#ff1744'
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: '2015-05-16T16:00:00',
                            color: '#aa00ff'
                        },
                        {
                            title: 'Conference',
                            start: '2015-05-3',
                            end: '2015-05-5',
                            color: '#01579b'
                        },
                        {
                            title: 'Meeting',
                            start: '2015-05-12T10:30:00',
                            end: '2015-05-12T12:30:00',
                            color: '#2196f3'
                        },
                        {
                            title: 'Lunch',
                            start: '2015-05-12T12:00:00',
                            color: '#ff5722'
                        },
                        {
                            title: 'Meeting',
                            start: '2015-05-12T14:30:00',
                            color: '#4caf50'
                        },
                        {
                            title: 'Happy Hour',
                            start: '2015-05-12T17:30:00',
                            color: '#03a9f4'
                        },
                        {
                            title: 'Dinner',
                            start: '2015-05-12T20:00:00',
                            color: '#009688'
                        },
                        {
                            title: 'Birthday Party',
                            start: '2015-05-13T07:00:00',
                            color: '#00bcd4'
                        }
                    ]
                });







            }, 100);
        }
    };
});

/*draggable events*/
myApp.directive('secondcalendar', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(function() {

                    var cal = $( '#calendar2' ).calendario( {
                            onDayClick : function( $el, $contentEl, dateProperties ) {

                                for( var key in dateProperties ) {
                                    console.log( key + ' = ' + dateProperties[ key ] );
                                }

                            },
                            caldata : codropsEvents
                        } ),
                        $month = $( '#custom-month' ).html( cal.getMonthName() ),
                        $year = $( '#custom-year' ).html( cal.getYear() );

                    $( '#custom-next' ).on( 'click', function() {
                        cal.gotoNextMonth( updateMonthYear );
                    } );
                    $( '#custom-prev' ).on( 'click', function() {
                        cal.gotoPreviousMonth( updateMonthYear );
                    } );
                    $( '#custom-current' ).on( 'click', function() {
                        cal.gotoNow( updateMonthYear );
                    } );

                    function updateMonthYear() {
                        $month.html( cal.getMonthName() );
                        $year.html( cal.getYear() );
                    }


                });








            }, 100);
        }
    };
});

/*select 2*/
myApp.directive('select1', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(".basic-select2").select2();

            }, 100);
        }
    };
});

/*select 2 placeholder*/
myApp.directive('select2', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(".select2-placeholder").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });

            }, 100);
        }
    };
});


/*select 2 maximum*/
myApp.directive('select3', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(".maximum-selection").select2({
                    maximumSelectionLength: 2
                });

            }, 100);
        }
    };
});



/*jqwidget input masked*/
myApp.directive('masked', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(function () {
                    // Create jqxMaskedInputs
                    $("#numericInput").jqxMaskedInput();
                    $("#zipCodeInput").jqxMaskedInput({ mask: '#####-####'});
                    $("#ssnInput").jqxMaskedInput({ mask: '###-##-####'});
                    $("#phoneInput").jqxMaskedInput({ mask: '(###)###-####'});
                    $("#regexInput").jqxMaskedInput({ mask: '[0-2][0-5][0-5].[0-2][0-5][0-5].[0-2][0-5][0-5].[0-2][0-5][0-5]'});
                    $("#disabledInput").jqxMaskedInput({disabled: true});


                });


            }, 100);
        }
    };
});


/*jqwidget range selector*/
myApp.directive('range', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(function () {
                    // create jqxRangeSelector.
                    $("#rangeSelector").jqxRangeSelector({ width: '80%', height: 100, min: 0, max: 100, range: { from: 10, to: 50 }, majorTicksInterval: 10, minorTicksInterval: 1 });


                });



            }, 100);
        }
    };
});


/*jqwidget range selector*/
myApp.directive('datetime', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(function () {
                    $("#date").jqxDateTimeInput({width: '50%', height: '35px'});
                    $("#time").jqxDateTimeInput({ width: '50%', height: '35px'});
                    $("#jqxWidget").jqxDateTimeInput({ width: '50%', height: '35px',  formatString: 'F' });


                    $("#jqxWidget2").jqxDateTimeInput({ width: '50%', height: '35px',  selectionMode: 'range' });





                });




            }, 100);
        }
    };
});



/*bootstrap switches*/
myApp.directive('switche', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(function(argument) {
                    $('[type="checkbox"]').bootstrapSwitch({
                        onColor:"success",
                        offColor: "warning"
                    });
                });


            }, 100);
        }
    };
});


/*bootstrap switches*/
myApp.directive('editor', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(function () {
                    $('#editor').jqxEditor({
                        height: 400,
                        width: 800,
                        tools: 'bold italic underline | format font size | left center right | print',
                        createCommand: function (name) {
                            switch (name) {
                                case "print":
                                    return {
                                        type: 'button',
                                        tooltip: 'Print',
                                        init: function (widget) {
                                            widget.jqxButton({ height: 25, width: 40 });
                                            widget.html("<span style='line-height: 23px;'>Print</span>");
                                        },
                                        refresh: function (widget, style) {
                                            // do something here when the selection is changed.
                                        },
                                        action: function (widget, editor) {
                                            // return nothing and perform a custom action.
                                            $('#editor').jqxEditor('print');
                                        }
                                    }
                            }
                        }
                    });
                });

            }, 100);
        }
    };
});


/*form validation*/
myApp.directive('validation', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(function() {
                    $('.errorSumamary').formValidation({
                        message: 'This value is not valid',
                        err: {
                            container: '#errors'
                        },
                        icon: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            Name: {
                                err: '#message',
                                validators: {
                                    notEmpty: {
                                        message: 'Name field is required and cannot be empty'
                                    },
                                    regexp: {
                                        regexp: /^[a-z A-Z]+$/,
                                        message: 'Name only contain alphabets and spaces'
                                    },
                                }
                            },
                            username: {
                                message: 'The username is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'The username is required and cannot be empty'
                                    },
                                    stringLength: {
                                        min: 6,
                                        max: 30,
                                        message: 'The username must be more than 6 and less than 30 characters long'
                                    }
                                }
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: 'The email address is required and can\'t be empty'
                                    },
                                    emailAddress: {
                                        message: 'The input is not a valid email address'
                                    }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: 'The field is required and can\'t be empty'
                                    }
                                }
                            }
                        }
                    });

                    $('.defaultForm').formValidation({
                        message: 'This value is not valid',
                        icon: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            Name: {
                                err: '#message',
                                validators: {
                                    notEmpty: {
                                        message: 'Name field is required and cannot be empty'
                                    },
                                    regexp: {
                                        regexp: /^[a-z A-Z]+$/,
                                        message: 'Name only contain alphabets and spaces'
                                    },
                                }
                            },
                            username: {
                                message: 'The username is not valid',
                                validators: {
                                    notEmpty: {
                                        message: 'The username is required and cannot be empty'
                                    },
                                    stringLength: {
                                        min: 6,
                                        max: 30,
                                        message: 'The username must be more than 6 and less than 30 characters long'
                                    }
                                }
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: 'The email address is required and can\'t be empty'
                                    },
                                    emailAddress: {
                                        message: 'The input is not a valid email address'
                                    }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: 'The field is required and can\'t be empty'
                                    }
                                }
                            },
                            check1: {
                                validators: {
                                    notEmpty: {
                                        message: 'please check this box'
                                    }
                                }
                            },
                            check2: {
                                validators: {
                                    notEmpty: {
                                        message: 'please check this box'
                                    }
                                }
                            },
                            check3: {
                                validators: {
                                    notEmpty: {
                                        message: 'please check this box'
                                    }
                                }
                            },
                            radio1: {
                                validators: {
                                    notEmpty: {
                                        message: 'please check this box'
                                    }
                                }
                            },
                            radio2: {
                                validators: {
                                    notEmpty: {
                                        message: 'please check this box'
                                    }
                                }
                            },
                            radio3: {
                                validators: {
                                    notEmpty: {
                                        message: 'please check this box'
                                    }
                                }
                            },
                            firstFile: {
                                validators: {
                                    file: {
                                        extension: 'pdf',
                                        type: 'application/pdf',
                                        message: 'Please choose a pdf file.'
                                    }
                                }
                            },
                            secondFile: {
                                validators: {
                                    file: {
                                        extension: 'pdf',
                                        type: 'application/pdf',
                                        minSize: 1024*1024,
                                        message: 'Please choose a pdf file with a size more than 1M.'
                                    }
                                }
                            },
                            thirdFile: {
                                validators: {
                                    file: {
                                        extension: 'pdf',
                                        type: 'application/pdf',
                                        maxSize: 10*1024*1024,
                                        message: 'Please choose a pdf file with a size less than 10M.'
                                    }
                                }
                            },
                            fourthFile: {
                                validators: {
                                    file: {
                                        extension: 'pdf',
                                        type: 'application/pdf',
                                        minSize: 1024*1024,
                                        maxSize: 10*1024*1024,
                                        message: 'Please choose a pdf file with a size between 1M and 10M.'
                                    }
                                }
                            }
                        }
                    });
                });

            }, 100);
        }
    };
});


/*dropzone*/
myApp.directive('filedrop', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(function(){
                    $('input[type=file]').drop_uploader({
                        uploader_text: 'Drop files to upload, or',
                        browse_text: 'Browse',
                        browse_css_class: 'button button-primary',
                        browse_css_selector: 'file_browse',
                        uploader_icon: '<i class="pe-7s-cloud-upload"></i>',
                        file_icon: '<i class="pe-7s-file"></i>',
                        time_show_errors: 5,
                        layout: 'thumbnails',
                        method: 'normal',
                        url: 'ajax_upload.php',
                        delete_url: 'ajax_delete.php',
                    });
                });


            }, 100);
        }
    };
});


/*google GeoCharts*/
myApp.directive('gcharts', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {

                google.charts.load('current', {'packages':['geochart']});
                google.charts.setOnLoadCallback(drawRegionsMap);

                function drawRegionsMap() {

                    var data = google.visualization.arrayToDataTable([
                        ['Country', 'Popularity'],
                        ['Germany', 200],
                        ['United States', 300],
                        ['Brazil', 400],
                        ['Canada', 500],
                        ['France', 600],
                        ['RU', 700]
                    ]);

                    var options = {};

                    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

                    chart.draw(data, options);
                }


            }, 100);
        }
    };
});


/*data table*/

myApp.directive('dtable', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(function(){

                    $('#Dtable').DataTable();

                });

            }, 100);
        }
    };
});


myApp.directive('pscroll', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                    var scr = document.querySelector('.scroll-bar');
                    Ps.initialize(scr);

            }, 100);
        }
    };
});

/*verticle scroll*/
myApp.directive('vtable', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                $(function(){
                    $('#Vtable').DataTable( {
                        "scrollY":        "200px",
                        "scrollCollapse": true,
                        "paging":         false
                    } );
                });

            }, 100);
        }
    };
});


/*snazzy maps*/
myApp.directive('snazzy', function($http, $timeout) {
    return {
        restrict: 'A',
        link: function(scope, el, attrs) {
            $timeout(function () {
                google.maps.event.addDomListener(window, 'load', init);
                function init() {
                    var mapOptions = {
                        zoom: 11,
                        center: new google.maps.LatLng(40.6700, -73.9400),

                        styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
                    };

                    var mapElement = document.getElementById('map');
                    var map = new google.maps.Map(mapElement, mapOptions);

                    // Let's also add a marker while we're at it
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(40.6700, -73.9400),
                        map: map,
                        title: 'Snazzy!'
                    });
                }

            }, 100);
        }
    };
});














