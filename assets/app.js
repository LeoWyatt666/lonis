requirejs.config({
    baseUrl:"assets/libraries",
    paths: {            
        "jquery":"jquery/jquery-3.3.1.min",
        "jquery-cookie":"jquery/jquery.cookie.min",
        "semantic-ui":"semantic-ui/semantic.min",
        "table-adaptive":"table-adaptive/table-adaptive",
        "infinite-scroll":"infinite-scroll/infinite-scroll.pkgd.min",
        "script":"../template/default/script"
    },
    shim: {
        // 'jquery': {
        //     exports: '$'
        // },
        'jquery-cookie': {
            deps: ['jquery']
        },    
        'semantic-ui': {
            deps: ['jquery']
        },
        'infinite-scroll': {
            deps: ['jquery']
        },
        'table-adaptive': {
            deps: ['jquery']
        },
        'script': {
            deps: ['jquery', 'semantic-ui','infinite-scroll']
        },
    }   
});

require(["jquery", "jquery-cookie", "semantic-ui", "infinite-scroll", "table-adaptive"], 
    function($, $, sematicui, infintescroll, tableadaptive) {
 
});